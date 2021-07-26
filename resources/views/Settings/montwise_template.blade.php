           
@foreach($periods as $key =>$period)

                       
                        
                            
                            <div class="custom-control custom-switch col-md-2" style="margin-bottom:30px">
                                  <input type="checkbox" class="custom-control-input" id="customSwitch{{$period->period_month}}" name="monthSelection[{{$period->period_month}}]" @if($period->period_status ==1)   checked @endif>
                                         <label class="custom-control-label" for="customSwitch{{$period->period_month}}">{{$months[$period->period_month]}} @if($period->period_status ==1) <span class="text-danger">(Closed)</span>  @else <span class="text-success">(Opened)</span>   @endif</label>
                                </div>
                              
                        

@endforeach


            

                       