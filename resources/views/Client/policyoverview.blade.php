@extends('layouts.elite_client'  )


@section('content')


<!--                  content here  -->
<!--TAB AREA-->
<div class="row">

    
        <div class="col-md-12 card">
        
        
        <ul class="nav nav-tabs policytab" role="tablist" id="policytab">
                                <li id="tab_overview" class="nav-item" onclick="TAB.select('overview', null, 1)"> <a class="nav-link {{ empty($overviewTab) || $overviewTab == 'overview' ? 'active' : '' }}" data-toggle="tab" href="#content_overview" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Overview</span></a> </li>
                                
                                
                                
                                <li id="tab_endorsement" class="nav-item" onclick="TAB.select('endorsement', '{{route('policyendorsement',[$policyDetails->mainId])}}', 0)"> <a class="nav-link {{ empty($overviewTab) || $overviewTab == 'endorsement' ? 'active' : '' }}" data-toggle="tab" href="#content_endorsement" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Endorsement ({{$endorsementCount}})</span></a> </li>
                                
                                <li id="tab_installment" class="nav-item" onclick="TAB.select('installment', null, 0)"> <a class="nav-link {{ empty($overviewTab) || $overviewTab == 'installment' ? 'active' : '' }}" data-toggle="tab" href="#content_installment" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Installment schedule</span></a> </li>
                                
                                
                                <li id="tab_claims" class="nav-item" onclick="TAB.select('claims', '{{route('getclaimdetails',[$policyDetails->mainId])}}', 0)"> <a class="nav-link {{ empty($overviewTab) || $overviewTab == 'claims' ? 'active' : '' }}" data-toggle="tab" href="#content_claims" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Claims ({{$claimCount}})</span></a> </li>
                               
                                <li id="tab_crm" class="nav-item" onclick="TAB.select('crm', '{{route('clientendorsementrequest',[$policyDetails->mainId])}}', 0)"> <a class="nav-link {{ empty($overviewTab) || $overviewTab == 'crm' ? 'active' : '' }}" data-toggle="tab" href="#content_crm" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Requests ({{$policyrequestCount}})</span></a> </li>
                                 
                                <li id="tab_log" class="nav-item" onclick="TAB.select('log', '{{route('policylogdata',[$policyDetails->mainId])}}', 0)"> <a class="nav-link {{ empty($overviewTab) || $overviewTab == 'log' ? 'active' : '' }}" data-toggle="tab" href="#content_log" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Log</span></a> </li>
                                <li id="tab_timeline" class="nav-item" onclick="TAB.select('timeline', '{{route('policytimeline',[$policyDetails->mainId])}}', 0)"> <a class="nav-link {{ empty($overviewTab) || $overviewTab == 'timeline' ? 'active' : '' }}" data-toggle="tab" href="#content_timeline" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="fa fa-th-list"></i></span> <span class="hidden-xs-down">Timeline</span></a> </li>
        </ul>
        

    </div>
    
    
    
    
    
</div>
<!--TAB CONTENT AREA-->
<div class="row card dpib-custom-form ribbon-wrapper-reverse">
     <div class="ribbon ribbon-bookmark ribbon-right ribbon-primary"><i class="ti-hand-point-right"></i>&nbsp;@if($policyDetails->policy_status ==0)
                                            Saved
                                            @elseif($policyDetails->policy_status ==2)
                                            Active
                                            @elseif($policyDetails->policy_status ==4)
                                            Renewed
                                             @elseif($policyDetails->policy_status ==6)
                                             Rejected
                                            @else
                                             Posted
                                            @endif</div>
        <div id="content_overview" class="tabcontent col-md-12 card-body">
            
            
            
            
            <div class="row">
                
               
                
                
                  <div id="main-content" class="col-md-8">
                    <div id="panel-customer_overview" class="panel panel-default open">
                        <div class="panel-heading">
                      
                            <h3 class="panel-title">Policy info</h3></div>
                        <div id="customer_overview" class="panel-collapse panel-body">
                            <table class="info-table" width='100%'>
                                <tbody>
                                   
                                    <tr><td>Coverage:</td><td>{{$policyDetails->coverage}}</td></tr>
                                    <tr><td>Object:</td><td>{{ ($policyDetails->coverage_info==null) ? $policyDetails->product_name :  $policyDetails->coverage_info}}   </td></tr>

                                    <tr class="subtitle"><th colspan="2">Policy info</th></tr>
                                    <tr><td>Policy type:</td><td>
                                            @if($policyDetails->policy_type ==3)
                                            Motor
                                            @elseif($policyDetails->policy_type ==2)
                                            Medical                                           
                                            @else
                                            General
                                            @endif
                                        </td></tr>
                                    <tr><td>Insurer:</td><td class="phoneNumber">{{$policyDetails->insurer_name}}</td></tr>
                                    <tr><td>Policy number:</td><td class="phoneNumber">@if($policyDetails->policy_number !='')  <span class='text-success' style='font-weight: bold'>{{$policyDetails->policy_number}}<span> @else <span class='text-danger' style='font-weight: bold'>not issued</span>@endif</td></tr>
                                    <tr><td>Inception date:</td><td> {{date('d.m.Y', strtotime($policyDetails->start_date)) }}  </td></tr>
                                    <tr><td>End date:</td><td>{{date('d.m.Y', strtotime($policyDetails->end_date)) }} </td></tr>
                                    <tr><td>Issue date:</td><td>{{date('d.m.Y', strtotime($policyDetails->issue_date)) }} </td></tr>
                                    
                                    <tr><td>Status:</td><td>
                                            @if($policyDetails->policy_status ==0)
                                            <span class='text-danger' style='font-weight: bold'>Saved</span>
                                            @elseif($policyDetails->policy_status ==2)
                                            <span class='text-success' style='font-weight: bold'> Issued</span>
                                            @elseif($policyDetails->policy_status ==4)
                                            <span class='text-success' style='font-weight: bold'> Renewed</span>
                                             @elseif($policyDetails->policy_status ==6)
                                            <span class='text-danger' style='font-weight: bold'> Rejected</span>
                                             @elseif($policyDetails->policy_status ==3)
                                            <span class='text-danger' style='font-weight: bold'> Locked</span>
                                            @else
                                             Posted
                                            @endif
                                        
                                        </td></tr>
                                          
                                   
                                    @if( $policyDetails->renewal_status ==1)
                                    <tr><td>Previous policy number:</td><td><a href="{{route('policyoverview',[$policyDetails->previous_policy_id])}}">{{$policyDetails->previusPolicy}}</a></td></tr>
                                     @endif    
                                    

                                </tbody>
                            </table>
                        </div></div>
                   

               


                </div> 
                
                
                
                
                
                <aside class="col-md-3">
                    @php 

                    $total =0;
                    $payment=0;
                    @endphp   
                    <div id="panel-customer_balance" class="panel panel-default open">
                        <div class="panel-heading"><h3 class="panel-title">Premium</h3></div>
                        <div id="customer_premium" class="panel-collapse panel-body">

                            <table class="info-table">

                                <tbody>
                                    <tr id="signedPremium">
                                        <td>Gross premium:</td>
                                        <td>
                                            <span>
                                                {{number_format($policyDetails->total_premium, 2, '.', ',') }}  SAR</span>
                                        </td>
                                    </tr>
                                    @if($endorsementCount > 0)
                                   <tr id="signedPremium">
                                        <td>Endorsements:</td>
                                        <td>
                                            <span>
                                                @if($endorsementamount !='')
                                                {{ number_format($endorsementamount, 2, '.', ',') }}  SAR
                                                @else
                                                 0.00 SAR
                                                @endif
                                                
                                                </span>
                                        </td>
                                    </tr>
                                    @endif

                                    <tr id="gross_written_premium">
                                        <td>Gross written premium:</td>
                                        <td>
                                            <span>
                                                {{ number_format(($policyDetails->total_premium + $endorsementamount), 2, '.', ',')  }} SAR</span>
                                        </td>
                                    </tr>
                                     <tr id="installments">
                                        <td>Installments:</td>
                                        <td>
                                            <span>
                                                {{($policyDetails->installment_number !=0) ? $policyDetails->installment_number:''  }}</span>
                                        </td>
                                    </tr>
                                   	

                                    <tr id="collection">
                                        <td>Collection:</td>
                                        <td>
                                            <span>
                                                {{ $policyDetails->collection_type }}  </span>
                                        </td>
                                    </tr>

                            
                                    
                                      <tr  class="text-success">
                                        <td >Total premium:</td>
                                        <td>
                                            <span style="font-weight: bold">
                                           
                                                {{ number_format(($policyDetails->total_premium +  $endorsementamount +$vatAmount->installmentVat), 2, '.', ',')  }} SAR</span>
                                        </td>
                                    </tr>
                                </tbody></table>



                        </div>

                    </div>

                    <div id="panel-customer_salesopportunities" class="panel panel-default open">
                        <div class="panel-heading"><h3 class="panel-title">Taxes</h3></div>
                        <div id="customer_tax" class="panel-collapse panel-body">
                            <table class="info-table">
                                <tbody>
                                    <tr>
                                        <td>Vat:</td>
                                        <td id="total_tax_value"> {{ number_format(($policyDetails->tax), 2, '.', ',')   }}%</td>
                                    </tr>
                                    <tr>
                                        <td>Total:</td>
                                        <td id="total_tax_value"> {{ number_format(($vatAmount->installmentVat), 2, '.', ',')   }} SAR</td>
                                    </tr>
                                </tbody></table>
                        </div>
                    </div>


                </aside>
             
            </div>
        </div>
    
      
        <div id="content_endorsement" class="tabcontent col-12" rel="{{route('listendorsement',[$policyDetails->mainId])}}" style="display:none">
            endorsement  display area

        </div>

        <div id="content_installment" class="tabcontent col-12" rel="" style="display: none;">
            <div id="panel-policy_installment_payment" class="panel panel-default open">
                
                <div class="panel-heading">
           
                    <h3 class="panel-title">Payment</h3>
                </div>
                <div id="policy_installment_payment" class="panel-collapse panel-body">
                    <table class="info-table">
                        <tbody>
                            <tr>
                                <td style="width: 29%; font-weight: bold">Gross Premium:</td>
                                <td style="width: 21%">
                                    <span class="text-danger" style="font-weight: bold">
                                        
                                        {{ number_format($policyDetails->gross_amount, 2, '.', ',') }} SAR
                                    </span>
                                </td>
                                <td style="width: 12%; font-weight: bold">Installments:</td>
                                <td style="width: 30%">
                                    {{$policyDetails->installment_number}}
                                </td>
                                <td style="width: 12%; font-weight: bold"></td>
                                <td style="width: 21%"></td>
                            </tr>
                            <tr>
                                <td style="width: 12%; font-weight: bold">Addition amount:</td>
                                <td style="width: 21%">{{ number_format($policyDetails->additional_amount, 2, '.', ',')  }} SAR</td>

                                <td style="width: 12%; font-weight: bold">Collection:</td>
                                <td style="width: 21%">
                                    {{ $policyDetails->collection_type }}
                                </td>
                            </tr>
                  
                        </tbody>
                    </table>
                </div>
            </div>
             
            <div id="panel-policy_installment_schedule" class="panel panel-default open" style='margin:20px 0px'>
                <div class="panel-heading">
                    
                    <h3 class="panel-title">Installment schedule</h3>
                </div>
                @if(count($installmentDetails) >0)
                <div id="policy_installment_schedule" class="panel-collapse panel-body">
                    
                    <table class="table table-striped table-hovered table-bordered policy_installment_table">
                        <thead>
                            <tr>
                             
                                <th style="width: 10%;">Installment</th>
                                <th style="width: 5%;">Endorsement</th>
                                
                                <th style="width: 10%;">Gross Premium</th>
                                <th style="width: 20%;">Period</th>
                                <th style="width: 20%;">Due date</th>
                                <th style="width: 30%;">Collects</th>
                           

                                <th style="width: 5%;">Tax</th>
                                <th style="width: 10%;">Customer payable</th>
                             
                              
                            </tr>
                        </thead>

                        <tbody>
                            @php
                            $total = $tax = $customerPayable = 0;
                           
                            $i=0;
                            @endphp
                           

                            @foreach($installmentDetails as $key =>$installmentDetail)
                            @php
                            $total = $total+ floatval($installmentDetail->amount);
                            $tax = $tax + floatval($installmentDetail->vat_amount);
                            $customerPayable = $customerPayable + floatval(($installmentDetail->amount + $installmentDetail->vat_amount));
                            @endphp
                            <tr style="font-weight: bold" class="table-striped-row-light">                                
                               
                                
                                @if( empty($installmentDetail->endorsement_id))
                                 @php
                                 $i++;
                                 @endphp
                                <td style="text-align: left;">{{$i}}</td>
                                @else 
                                <td style="text-align: left;"><img src="{{ asset('Images/icon-policy-payment-2.png') }}" data-toggle="tooltip" data-original-title="Comment/description: Endorsement {{$installmentDetail ->endorsement_number}}"></td>
                                @endif
                                <td class="nowrap">{{$installmentDetail ->endorsement_number}}</td>
                                 @if( empty($installmentDetail->endorsement_id))
                                  <td class="nowrap">{{ number_format($installmentDetail->amount, 2, '.', ',')}} SAR</td>
                                 @else
                                  <td class="nowrap">{{ number_format($installmentDetail->amount, 2, '.', ',')}} SAR</td>
                                 @endif
                                
                                
                                <td>{{date('d.m.Y', strtotime($installmentDetail->start_date)) }} - {{ date('d.m.Y', strtotime($installmentDetail->end_date)) }}</td>
                                <td>{{ date('d.m.Y', strtotime($installmentDetail->due_date)) }}</td>
                                <td><i style="color: #555555">{{ $installmentDetail->collectionString }}</i></td>
                                

                                <td> {{ number_format($installmentDetail->vat_amount, 2, '.', ',')  }} </td>
                                <td class="nowrap"><a onclick="">{{ number_format( ($installmentDetail->amount + $installmentDetail->vat_amount), 2, '.', ',')}} SAR</a></td>
                               


                        
                            </tr>
                            @endforeach 
                           

                            <tr class="table-striped-row-dark">
                             
                                <td><b>TOTAL SAR</b></td>
                                <td><b></b></td>
                                <td>{{  number_format($total, 2, '.', ',')  }} SAR</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                

                                <td>{{  number_format($tax, 2, '.', ',')     }} SAR</td>
                                <td>{{ number_format($customerPayable, 2, '.', ',')    }} SAR</td>
                                <td></td>
                                
                            </tr>
                        </tbody>
                    </table>
                     
                </div>
                @endif
            </div>
              
        </div>
        
        <div id="content_claims" class="tabcontent col-12" rel="{{route('getclaimdetails',[$policyDetails->mainId])}}" style="display:none">
<!--            claim display area-->

        </div>
        <div id="content_crm" class="tabcontent col-12"  style="display:none" rel="{{route('clientendorsementrequest',[$policyDetails->mainId])}}" >
<!--            crm display area-->
        </div>
           
        

        <div id="content_log" class="tabcontent col-12"  style="display:none;" rel="{{route('policylogdata',[$policyDetails->mainId])}}">
<!--            log display area -->

        </div>
    
    <div id="content_timeline" class="tabcontent col-12"  style="display:none;" rel="{{route('policytimeline',[$policyDetails->mainId])}}">
<!--            timeline display area -->

        </div>

    

</div>











    



   



@endsection
@section('customcss')
<link rel="stylesheet" type="text/css" href=" {{ asset('elitedesign/dist/css/pages/ribbon-page.css') }} ">
<link rel="stylesheet" type="text/css" href="{{ asset('elitedesign/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('elitedesign/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') }}">
@endsection


@section('pagescript')
<script src="{{ asset('elitedesign/assets/node_modules/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('elitedesign/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>        
<script src="{{ asset('js/dibcustom/dib-quote-request.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/dibcustom/dib-policy-add.js') }}" type="text/javascript"></script>

<script>
var   seletab = '{{$overviewTab}}';

$(function () {

var dibpolicyAddObj = new DibPolicyAdd();
    dibpolicyAddObj.initialSetting();

    
    

    
    
    
    
});


$('#policytab').find('.active').removeClass('active');
$('#tab_'+seletab).trigger('click');
$('#tab_'+seletab+' a[href="#content_'+seletab+'"]').addClass('active');
$('#tab_'+seletab+' a[href="#tab_'+seletab+'"]').attr('aria-selected',true);

$('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
$($.fn.dataTable.tables(true)).DataTable()
.columns.adjust()
.responsive.recalc();
});


</script>

@endsection