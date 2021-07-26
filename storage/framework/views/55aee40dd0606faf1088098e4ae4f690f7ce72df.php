<?php $__env->startSection('content'); ?>


<!--                  content here  -->
<!--TAB AREA-->
<div class="row">

    
        <div class="col-md-12 card">
        
        
        <ul class="nav nav-tabs policytab" role="tablist" id="policytab">
                                <li id="tab_overview" class="nav-item" onclick="TAB.select('overview', null, 1)"> <a class="nav-link <?php echo e(empty($overviewTab) || $overviewTab == 'overview' ? 'active' : ''); ?>" data-toggle="tab" href="#content_overview" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Overview</span></a> </li>
                                
                                
                                
                                <li id="tab_endorsement" class="nav-item" onclick="TAB.select('endorsement', '<?php echo e(route('policyendorsement',[$policyDetails->mainId])); ?>', 0)"> <a class="nav-link <?php echo e(empty($overviewTab) || $overviewTab == 'endorsement' ? 'active' : ''); ?>" data-toggle="tab" href="#content_endorsement" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Endorsement (<?php echo e($endorsementCount); ?>)</span></a> </li>
                                
                                <li id="tab_installment" class="nav-item" onclick="TAB.select('installment', null, 0)"> <a class="nav-link <?php echo e(empty($overviewTab) || $overviewTab == 'installment' ? 'active' : ''); ?>" data-toggle="tab" href="#content_installment" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Installment schedule</span></a> </li>
                                
                                
                                <li id="tab_claims" class="nav-item" onclick="TAB.select('claims', '<?php echo e(route('getclaimdetails',[$policyDetails->mainId])); ?>', 0)"> <a class="nav-link <?php echo e(empty($overviewTab) || $overviewTab == 'claims' ? 'active' : ''); ?>" data-toggle="tab" href="#content_claims" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Claims (<?php echo e($claimCount); ?>)</span></a> </li>
                               
                                <li id="tab_crm" class="nav-item" onclick="TAB.select('crm', '<?php echo e(route('clientendorsementrequest',[$policyDetails->mainId])); ?>', 0)"> <a class="nav-link <?php echo e(empty($overviewTab) || $overviewTab == 'crm' ? 'active' : ''); ?>" data-toggle="tab" href="#content_crm" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Requests (<?php echo e($policyrequestCount); ?>)</span></a> </li>
                                 
                                <li id="tab_log" class="nav-item" onclick="TAB.select('log', '<?php echo e(route('policylogdata',[$policyDetails->mainId])); ?>', 0)"> <a class="nav-link <?php echo e(empty($overviewTab) || $overviewTab == 'log' ? 'active' : ''); ?>" data-toggle="tab" href="#content_log" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Log</span></a> </li>
                                <li id="tab_timeline" class="nav-item" onclick="TAB.select('timeline', '<?php echo e(route('policytimeline',[$policyDetails->mainId])); ?>', 0)"> <a class="nav-link <?php echo e(empty($overviewTab) || $overviewTab == 'timeline' ? 'active' : ''); ?>" data-toggle="tab" href="#content_timeline" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="fa fa-th-list"></i></span> <span class="hidden-xs-down">Timeline</span></a> </li>
        </ul>
        

    </div>
    
    
    
    
    
</div>
<!--TAB CONTENT AREA-->
<div class="row card dpib-custom-form ribbon-wrapper-reverse">
     <div class="ribbon ribbon-bookmark ribbon-right ribbon-primary"><i class="ti-hand-point-right"></i>&nbsp;<?php if($policyDetails->policy_status ==0): ?>
                                            Saved
                                            <?php elseif($policyDetails->policy_status ==2): ?>
                                            Active
                                            <?php elseif($policyDetails->policy_status ==4): ?>
                                            Renewed
                                             <?php elseif($policyDetails->policy_status ==6): ?>
                                             Rejected
                                            <?php else: ?>
                                             Posted
                                            <?php endif; ?></div>
        <div id="content_overview" class="tabcontent col-md-12 card-body">
            
            
            
            
            <div class="row">
                
               
                
                
                  <div id="main-content" class="col-md-8">
                    <div id="panel-customer_overview" class="panel panel-default open">
                        <div class="panel-heading">
                      
                            <h3 class="panel-title">Policy info</h3></div>
                        <div id="customer_overview" class="panel-collapse panel-body">
                            <table class="info-table" width='100%'>
                                <tbody>
                                   
                                    <tr><td>Coverage:</td><td><?php echo e($policyDetails->coverage); ?></td></tr>
                                    <tr><td>Object:</td><td><?php echo e(($policyDetails->coverage_info==null) ? $policyDetails->product_name :  $policyDetails->coverage_info); ?>   </td></tr>

                                    <tr class="subtitle"><th colspan="2">Policy info</th></tr>
                                    <tr><td>Policy type:</td><td>
                                            <?php if($policyDetails->policy_type ==3): ?>
                                            Motor
                                            <?php elseif($policyDetails->policy_type ==2): ?>
                                            Medical                                           
                                            <?php else: ?>
                                            General
                                            <?php endif; ?>
                                        </td></tr>
                                    <tr><td>Insurer:</td><td class="phoneNumber"><?php echo e($policyDetails->insurer_name); ?></td></tr>
                                    <tr><td>Policy number:</td><td class="phoneNumber"><?php if($policyDetails->policy_number !=''): ?>  <span class='text-success' style='font-weight: bold'><?php echo e($policyDetails->policy_number); ?><span> <?php else: ?> <span class='text-danger' style='font-weight: bold'>not issued</span><?php endif; ?></td></tr>
                                    <tr><td>Inception date:</td><td> <?php echo e(date('d.m.Y', strtotime($policyDetails->start_date))); ?>  </td></tr>
                                    <tr><td>End date:</td><td><?php echo e(date('d.m.Y', strtotime($policyDetails->end_date))); ?> </td></tr>
                                    <tr><td>Issue date:</td><td><?php echo e(date('d.m.Y', strtotime($policyDetails->issue_date))); ?> </td></tr>
                                    
                                    <tr><td>Status:</td><td>
                                            <?php if($policyDetails->policy_status ==0): ?>
                                            <span class='text-danger' style='font-weight: bold'>Saved</span>
                                            <?php elseif($policyDetails->policy_status ==2): ?>
                                            <span class='text-success' style='font-weight: bold'> Issued</span>
                                            <?php elseif($policyDetails->policy_status ==4): ?>
                                            <span class='text-success' style='font-weight: bold'> Renewed</span>
                                             <?php elseif($policyDetails->policy_status ==6): ?>
                                            <span class='text-danger' style='font-weight: bold'> Rejected</span>
                                             <?php elseif($policyDetails->policy_status ==3): ?>
                                            <span class='text-danger' style='font-weight: bold'> Locked</span>
                                            <?php else: ?>
                                             Posted
                                            <?php endif; ?>
                                        
                                        </td></tr>
                                          
                                   
                                    <?php if( $policyDetails->renewal_status ==1): ?>
                                    <tr><td>Previous policy number:</td><td><a href="<?php echo e(route('policyoverview',[$policyDetails->previous_policy_id])); ?>"><?php echo e($policyDetails->previusPolicy); ?></a></td></tr>
                                     <?php endif; ?>    
                                    

                                </tbody>
                            </table>
                        </div></div>
                   

               


                </div> 
                
                
                
                
                
                <aside class="col-md-3">
                    <?php 

                    $total =0;
                    $payment=0;
                    ?>   
                    <div id="panel-customer_balance" class="panel panel-default open">
                        <div class="panel-heading"><h3 class="panel-title">Premium</h3></div>
                        <div id="customer_premium" class="panel-collapse panel-body">

                            <table class="info-table">

                                <tbody>
                                    <tr id="signedPremium">
                                        <td>Gross premium:</td>
                                        <td>
                                            <span>
                                                <?php echo e(number_format($policyDetails->total_premium, 2, '.', ',')); ?>  SAR</span>
                                        </td>
                                    </tr>
                                    <?php if($endorsementCount > 0): ?>
                                   <tr id="signedPremium">
                                        <td>Endorsements:</td>
                                        <td>
                                            <span>
                                                <?php if($endorsementamount !=''): ?>
                                                <?php echo e(number_format($endorsementamount, 2, '.', ',')); ?>  SAR
                                                <?php else: ?>
                                                 0.00 SAR
                                                <?php endif; ?>
                                                
                                                </span>
                                        </td>
                                    </tr>
                                    <?php endif; ?>

                                    <tr id="gross_written_premium">
                                        <td>Gross written premium:</td>
                                        <td>
                                            <span>
                                                <?php echo e(number_format(($policyDetails->total_premium + $endorsementamount), 2, '.', ',')); ?> SAR</span>
                                        </td>
                                    </tr>
                                     <tr id="installments">
                                        <td>Installments:</td>
                                        <td>
                                            <span>
                                                <?php echo e(($policyDetails->installment_number !=0) ? $policyDetails->installment_number:''); ?></span>
                                        </td>
                                    </tr>
                                   	

                                    <tr id="collection">
                                        <td>Collection:</td>
                                        <td>
                                            <span>
                                                <?php echo e($policyDetails->collection_type); ?>  </span>
                                        </td>
                                    </tr>

                            
                                    
                                      <tr  class="text-success">
                                        <td >Total premium:</td>
                                        <td>
                                            <span style="font-weight: bold">
                                           
                                                <?php echo e(number_format(($policyDetails->total_premium +  $endorsementamount +$vatAmount->installmentVat), 2, '.', ',')); ?> SAR</span>
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
                                        <td id="total_tax_value"> <?php echo e(number_format(($policyDetails->tax), 2, '.', ',')); ?>%</td>
                                    </tr>
                                    <tr>
                                        <td>Total:</td>
                                        <td id="total_tax_value"> <?php echo e(number_format(($vatAmount->installmentVat), 2, '.', ',')); ?> SAR</td>
                                    </tr>
                                </tbody></table>
                        </div>
                    </div>


                </aside>
             
            </div>
        </div>
    
      
        <div id="content_endorsement" class="tabcontent col-12" rel="<?php echo e(route('listendorsement',[$policyDetails->mainId])); ?>" style="display:none">
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
                                        
                                        <?php echo e(number_format($policyDetails->gross_amount, 2, '.', ',')); ?> SAR
                                    </span>
                                </td>
                                <td style="width: 12%; font-weight: bold">Installments:</td>
                                <td style="width: 30%">
                                    <?php echo e($policyDetails->installment_number); ?>

                                </td>
                                <td style="width: 12%; font-weight: bold"></td>
                                <td style="width: 21%"></td>
                            </tr>
                            <tr>
                                <td style="width: 12%; font-weight: bold">Addition amount:</td>
                                <td style="width: 21%"><?php echo e(number_format($policyDetails->additional_amount, 2, '.', ',')); ?> SAR</td>

                                <td style="width: 12%; font-weight: bold">Collection:</td>
                                <td style="width: 21%">
                                    <?php echo e($policyDetails->collection_type); ?>

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
                <?php if(count($installmentDetails) >0): ?>
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
                            <?php
                            $total = $tax = $customerPayable = 0;
                           
                            $i=0;
                            ?>
                           

                            <?php $__currentLoopData = $installmentDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$installmentDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $total = $total+ floatval($installmentDetail->amount);
                            $tax = $tax + floatval($installmentDetail->vat_amount);
                            $customerPayable = $customerPayable + floatval(($installmentDetail->amount + $installmentDetail->vat_amount));
                            ?>
                            <tr style="font-weight: bold" class="table-striped-row-light">                                
                               
                                
                                <?php if( empty($installmentDetail->endorsement_id)): ?>
                                 <?php
                                 $i++;
                                 ?>
                                <td style="text-align: left;"><?php echo e($i); ?></td>
                                <?php else: ?> 
                                <td style="text-align: left;"><img src="<?php echo e(asset('Images/icon-policy-payment-2.png')); ?>" data-toggle="tooltip" data-original-title="Comment/description: Endorsement <?php echo e($installmentDetail ->endorsement_number); ?>"></td>
                                <?php endif; ?>
                                <td class="nowrap"><?php echo e($installmentDetail ->endorsement_number); ?></td>
                                 <?php if( empty($installmentDetail->endorsement_id)): ?>
                                  <td class="nowrap"><?php echo e(number_format($installmentDetail->amount, 2, '.', ',')); ?> SAR</td>
                                 <?php else: ?>
                                  <td class="nowrap"><?php echo e(number_format($installmentDetail->amount, 2, '.', ',')); ?> SAR</td>
                                 <?php endif; ?>
                                
                                
                                <td><?php echo e(date('d.m.Y', strtotime($installmentDetail->start_date))); ?> - <?php echo e(date('d.m.Y', strtotime($installmentDetail->end_date))); ?></td>
                                <td><?php echo e(date('d.m.Y', strtotime($installmentDetail->due_date))); ?></td>
                                <td><i style="color: #555555"><?php echo e($installmentDetail->collectionString); ?></i></td>
                                

                                <td> <?php echo e(number_format($installmentDetail->vat_amount, 2, '.', ',')); ?> </td>
                                <td class="nowrap"><a onclick=""><?php echo e(number_format( ($installmentDetail->amount + $installmentDetail->vat_amount), 2, '.', ',')); ?> SAR</a></td>
                               


                        
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                           

                            <tr class="table-striped-row-dark">
                             
                                <td><b>TOTAL SAR</b></td>
                                <td><b></b></td>
                                <td><?php echo e(number_format($total, 2, '.', ',')); ?> SAR</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                

                                <td><?php echo e(number_format($tax, 2, '.', ',')); ?> SAR</td>
                                <td><?php echo e(number_format($customerPayable, 2, '.', ',')); ?> SAR</td>
                                <td></td>
                                
                            </tr>
                        </tbody>
                    </table>
                     
                </div>
                <?php endif; ?>
            </div>
              
        </div>
        
        <div id="content_claims" class="tabcontent col-12" rel="<?php echo e(route('getclaimdetails',[$policyDetails->mainId])); ?>" style="display:none">
<!--            claim display area-->

        </div>
        <div id="content_crm" class="tabcontent col-12"  style="display:none" rel="<?php echo e(route('clientendorsementrequest',[$policyDetails->mainId])); ?>" >
<!--            crm display area-->
        </div>
           
        

        <div id="content_log" class="tabcontent col-12"  style="display:none;" rel="<?php echo e(route('policylogdata',[$policyDetails->mainId])); ?>">
<!--            log display area -->

        </div>
    
    <div id="content_timeline" class="tabcontent col-12"  style="display:none;" rel="<?php echo e(route('policytimeline',[$policyDetails->mainId])); ?>">
<!--            timeline display area -->

        </div>

    

</div>











    



   



<?php $__env->stopSection(); ?>
<?php $__env->startSection('customcss'); ?>
<link rel="stylesheet" type="text/css" href=" <?php echo e(asset('elitedesign/dist/css/pages/ribbon-page.css')); ?> ">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('elitedesign/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('elitedesign/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('pagescript'); ?>
<script src="<?php echo e(asset('elitedesign/assets/node_modules/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('elitedesign/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js')); ?>"></script>        
<script src="<?php echo e(asset('js/dibcustom/dib-quote-request.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/dibcustom/dib-policy-add.js')); ?>" type="text/javascript"></script>

<script>
var   seletab = '<?php echo e($overviewTab); ?>';

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.elite_client'  , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Client/policyoverview.blade.php ENDPATH**/ ?>