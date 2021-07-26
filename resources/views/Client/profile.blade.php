
@extends('layouts.elite_client' )


@section('headtitle')
Profile
@endsection




@section('content')
<div class="row">
    <!-- Column -->
 <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
         
                  
                       <center class="m-t-30"> 
                           
                           @if( $details->type ==1)
                           <img src="{{ asset('Images/defaultcompany.png') }}" class="img-circle" width="150">
                          @else
                          <img src="{{ asset('Images/avatar.jpg') }}" class="img-circle" width="150">
                          @endif
                                    <h4 class="card-title m-t-10">{{ $details->name }}</h4>
                                    
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"></div>
                                        <div class="col-4"></div>
                                    </div>
                                </center>     
                         
                         
                    
                   
               
            </div>
           
        </div>
    </div>
    <!-- Column -->
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Info</h4>
                 <div class="d-flex no-block align-items-center m-t-20 m-b-30">
                  
                       <table class="table table-striped dpib_policy_list color-table info-table" style='width:100%;'>
              
                    <tbody>
                        <tr>
                            <td>User name</td>
                            <td>{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <td>User email</td>
                            <td>{{ Auth::user()->email }}</td>
                        </tr>
                        <tr>
                            <td>Company name</td>
                            <td>{{ $details->name }}</td>
                        </tr>
                        <tr>
                            <td>Customer code/Id code</td>
                            <td>{{ $details->customer_code }}</td>
                        </tr>
                        <tr>
                            <td>Active from</td>
                            <td>{{ date("Y-m-d",strtotime( Auth::user()->created_at )) }}</td>
                        </tr>
                        
                        <tr>
                            <td>Address</td>
                            <td>{{ $details->building_no  }} {{ $details->street_name  }} {{ $details->district_name  }}<br />
                            {{ $details->city_name  }}  {{ $details->zip_code  }} {{ $details->additional_no  }}  <br />
                            {{ $details->unit_no  }}
                           </td>
                        </tr>
                         
                        
                   </tbody>
                </table>      
                         
                         
                    
                   
                </div>
            </div>
            <div id="sparkline8" class="sparkchart"></div>
        </div>
    </div>
    <!-- Column -->

<div class="col-lg-6 col-sm-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Company contact details</h4>

                <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                 <table class="table table-striped dpib_policy_list color-table info-table" style='width:100%;'>
              
                    <tbody>
                        <tr>
                            <td>Contact person</td>
                            <td>{{ $details->person_name }}</td>
                        </tr>
                        <tr>
                            <td>Person title</td>
                            <td>{{ $details->person_title }}</td>
                        </tr>
                        <tr>
                            <td>Mobile</td>
                            <td>{{ $details->contactPhone }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $details->contactEmail }}</td>
                        </tr>
                        <tr>
                            <td>Website</td>
                            <td>{{ $details->website }}</td>
                        </tr>
                        <tr>
                            <td>Prefered communication type</td>
                            <td>{{ $details->prefered_communication_type }}</td>
                        </tr>
                    
                         <tr>
                             <td style='border:none;background-color:#fff'>&nbsp;<br /></td>
                             <td style='border:none;background-color:#fff'>&nbsp;<br /></td>
                        </tr>
                       
                        
                        
                   </tbody>
                </table>
                </div>
            </div>
             <div id="sparkline8" class="sparkchart"></div>
        </div>
    </div>
    
    <!-- Column -->
    <!-- Column -->

    <!-- Column -->
</div>









@endsection
@section('customcss')
<link rel="stylesheet" type="text/css" href=" {{ asset('elitedesign/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }} ">
<link rel="stylesheet" type="text/css" href="{{ asset('elitedesign/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') }}"> 


@endsection

@section('customscript')   
<script src="{{ asset('elitedesign/assets/node_modules/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('elitedesign/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/global/datatable/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/global/datatable/datetime.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/dibcustom/dib-quote-request.js') }}" type="text/javascript"></script>

@endsection


@section('pagescript')

<script>

      var roleArray = @json(Auth::user()->roles);
    $(function(){
        
        
    

    
    
    
       
   });

</script>
@endsection

