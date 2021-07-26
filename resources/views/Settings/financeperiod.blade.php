
@extends('layouts.elite' )



@section('content')

<div class="row col-12 dpib-custom-form">



    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-body" style="margin:50px">
                                     <div class="panel-heading">
            
            <ul class="panel-actions list-inline pull-right">
               
                <li class="dib_add_accounting_period"><button type="button" class="btn btn-success btn-rounded"><i class="fas fa-plus"></i> Add year</button></li>
                 

            </ul>
                   
                            <h3 class="panel-title">Accounting period</h3>
                                     </div>
                    
                    <form method="POST" action="{{ route('savefinanceperiods') }}" >
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-4"></div>
                         <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Year</label>
                                                   @if(count($yearArray) > 0)
                                                    <select class="form-control custom-select dpib_year_change" data-placeholder="Choose a year" tabindex="1" name="selectedyear">
                                                        @foreach($yearArray as $key =>$year)
                                                        
                                                         <option value="{{$year->period_year}}" @if($selectedperiod ==$year->period_year) selected @endif>{{$year->period_year}}</option>
                                                         @endforeach
                                                    </select>
                                                   
                                                   @else
                                                   <select class="form-control custom-select" data-placeholder="Choose a year" tabindex="1" name="selectedyear">
                                                        <option value="{{date('Y')}}" selected>{{date('Y')}}</option>
                                                       
                                                    </select>
                                                   @endif
                                                </div>
                                            </div>
                            <div class="col-md-4"></div>
                        
                         </div>

                        
                        
             <div class="form-group row" id="dib_account_period_lock_area">            
@foreach($periods as $key =>$period)

                       
                        
                            
                            <div class="custom-control custom-switch col-md-2" style="margin-bottom:30px">
                                  <input type="checkbox" class="custom-control-input" id="customSwitch{{$period->period_month}}" name="monthSelection[{{$period->period_month}}]" @if($period->period_status ==1)   checked @endif>
                                         <label class="custom-control-label" for="customSwitch{{$period->period_month}}">{{$months[$period->period_month]}} @if($period->period_status ==1) <span class="text-danger">(Closed)</span>  @else <span class="text-success">(Opened)</span>   @endif</label>
                                </div>
                              
                        

@endforeach

</div>
            

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
    

   

    
    @endsection
    
    @section('pagescript')
    <script>
    $(function() {
       $(document).on("click",".dib_add_accounting_period",function(){
            $(".preloader").show(); 
                    $.ajax({
                                                    url: "{!! route('addaccountingyear') !!}",
                                                            type: "GET",
                                                            

                                                    }).done(function (data) {
                                                    if (data.status) {
               $(".preloader").hide();                                          
        window.location.replace(data.returnUrl);
                                                    }
                                                    });
           
       }); 
       
      $(document).on("change",".dpib_year_change",function(){
            $(".preloader").show(); 
            
                    $.ajax({
                                                    url: "{!! route('getperioddetails') !!}",
                                                            type: "GET",
                                                            data :{'selectedYear':$(".dpib_year_change").val()}

                                                    }).done(function (data) {
                                                    if (data.status) {
                                                
$('#dib_account_period_lock_area').html('');
$('#dib_account_period_lock_area').html(data.returnHtml);
 $(".preloader").hide(); 
                                                    }
                                                    });
           
       });  
       
    })
    </script>
     @endsection