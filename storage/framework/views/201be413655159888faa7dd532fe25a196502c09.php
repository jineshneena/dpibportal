<?php $__env->startSection('content'); ?>
<!--                  content here  -->
<!--TAB AREA-->
<div class="row">
    
    <div class="col-md-12 card">
        
        
        <ul class="nav nav-tabs customtab card-body" role="tablist">
                                <li id="tab_overview" class="nav-item" onclick="TAB.select('overview', null, 1)"> <a class="nav-link <?php echo e(empty($overviewTab) || $overviewTab == 'overview' ? 'active' : ''); ?>" data-toggle="tab" href="#content_overview" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Overview</span></a> </li>
                                <li id="tab_payments" class="nav-item" onclick="TAB.select('payments', '<?php echo e(route('paymentdetails',[$claimDetails->id])); ?>', 0)"> <a class="nav-link <?php echo e(!empty($overviewTab) && $overviewTab == 'payments' ? 'active' : ''); ?>" data-toggle="tab" href="#content_payments" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Payments</span></a> </li>
                                <li id="tab_document" class="nav-item" onclick="TAB.select('document', null, 0);customerdocumentTable.columns.adjust().draw();"> <a class="nav-link <?php echo e(!empty($overviewTab) && $overviewTab == 'document' ? 'active' : ''); ?>" data-toggle="tab" href="#content_document" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Documents (<?php echo e(count($documentDetails)); ?>)</span></a> </li>
                                <li id="tab_log" class="nav-item" onclick="TAB.select('log', '<?php echo e(route('claimlogdata',[$claimDetails->id])); ?>', 0)"> <a class="nav-link <?php echo e(!empty($overviewTab) && $overviewTab == 'log' ? 'active' : ''); ?>" data-toggle="tab" href="#content_log" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Log</span></a> </li>
        </ul>
        

    </div>
    
</div>
<!--TAB CONTENT AREA-->
<div class="row card">
  
        <div id="content_overview" class="tabcontent col-md-12 card-body">
            <div class="row">
               
                <div id="main-content" class="col-md-8">
                    <div id="panel-claim_overview" class="panel panel-default open">
                        <div class="panel-heading">
                            <ul class="panel-actions list-inline pull-right">
                                <li >
                                    <a href='<?php echo e(route('editclaim',[$claimDetails->id])); ?>'><span class="fas fa-edit text-blue mr-right" data-toggle="tooltip" title="" data-original-title="Edit claim information"></span></a>
                                </li>
                           
                                <?php if( in_array('CUSTOMER_MANAGER', Auth::user()->roles) ||  in_array('CUSTOMER_OFFICER', Auth::user()->roles) ): ?>
                                     
                                     <?php else: ?>
                                     <li >
                                    <span class="mdi mdi-grease-pencil text-blue dpib_policy_flag_change" data-toggle="tooltip" title="" data-original-title="Edit status"></span>
                                    </li>
                                     <?php endif; ?>
                               
                                
                            </ul>
                            <h3 class="panel-title">Claim information</h3>
                        </div>
                        <div id="claim_overview" class="panel-collapse panel-body">
                            <table class="info-table">
                                <tbody>
                                    <tr>
                                        <td style='width:55%'>Claim ID:</td>
                                        <td><b><?php echo e($claimDetails->id); ?></b></td>
                                    </tr>
                                     <?php if( in_array('CUSTOMER_MANAGER', Auth::user()->roles) ||  in_array('CUSTOMER_OFFICER', Auth::user()->roles) ): ?>
                                     
                                     <?php else: ?>
                                     <tr>
                                        <td>Customer:</td>
                                        <td><a href="<?php echo e(route('customeroverview',$claimDetails->customer_id)); ?>"><?php echo e($claimDetails->customerName); ?></a></td>
                                    </tr>
                                     <?php endif; ?>
                                     
                                    
                                    <tr>
                                        <td>Status:</td>
                                        <td><b><?php echo e($claimDetails->statusString); ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Incident/loss date:</td>
                                        <td><?php echo e(!(empty($claimDetails->incident_date)) ? date('d.m.Y H:i', strtotime($claimDetails->incident_date)) :'-'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Date submitted to broker:</td>
                                        <td> <?php echo e(!(empty($claimDetails->submitted_broker_date)) ? date('d.m.Y', strtotime($claimDetails->submitted_broker_date)) :'-'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Insurance claim number:</td>
                                        <td> <?php echo e(!(empty($claimDetails->insurance_claim_number)) ? $claimDetails->insurance_claim_number :'-'); ?></td>
                                    </tr>
                                    <tr class="subtitle">
                                        <th colspan="2">Policy</th>
                                    </tr>
                                    <tr>
                                        <td>Policy:</td>
                                        <td><a href="<?php echo e(route('policyoverview',$claimDetails->policy_id)); ?>"><?php echo e($claimDetails->policy_number); ?></a></td>
                                    </tr>
                                    <tr>
                                        <td>Insurer:</td>
                                        <td><?php echo e($claimDetails->insuranceName); ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Start date:</td>
                                        <td>  <?php echo e(!(empty($claimDetails->start_date)) ? date('d.m.Y', strtotime($claimDetails->start_date)) :'-'); ?> </td>
                                    </tr>
                                    <tr>
                                        <td>End date:</td>
                                        <td> <?php echo e(!(empty($claimDetails->end_date)) ? date('d.m.Y', strtotime($claimDetails->end_date)) :'-'); ?></td>
                                    </tr>
                                    <tr class="subtitle">
                                        <th colspan="2">Loss information</th>
                                    </tr>
                                    <tr>
                                        <td>Location of loss or incident:</td>
                                        <td><?php echo e($claimDetails->location); ?></td>
                                    </tr>
                                    <tr class="subtitle">
                                        <th colspan="2">Insurer contacts</th>
                                    </tr>
                                    <tr>
                                        <td>Insurer contact name:</td>
                                        <td><?php echo e($claimDetails->insurer_contact_name); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Insurer contact e-mail:</td>
                                        <td><?php echo e($claimDetails->insurer_contact_email); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Insurer contact phone:</td>
                                        <td><?php echo e($claimDetails->insurer_contact_phone); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="panel-claim_claimant" class="panel panel-default open">
                        <div class="panel-heading">
                            <ul class="panel-actions list-inline pull-right">
                                <li>
                                    <div class="btn-group">
                                        <span class="fas fa-plus text-blue"></span>
                                        <ul id="add-menu" class="dropdown-menu" role="menu">
                                            <li><a class='dpib_claimant_create'  claim-id="<?php echo e($claimDetails->id); ?>" create-type="2">Add claimant: Death claim</a></li>
                                            <li><a class='dpib_claimant_create'  claim-id="<?php echo e($claimDetails->id); ?>" create-type="3">Add claimant: Medical Claim</a></li>
                                            <li><a class='dpib_claimant_create'  claim-id="<?php echo e($claimDetails->id); ?>" create-type="4">Add claimant: Motor Claim info</a></li>
                                            <li><a class='dpib_claimant_create'  claim-id="<?php echo e($claimDetails->id); ?>" create-type="5">Add claimant: travel claim</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            <h3 class="panel-title">Claimant(s)</h3>
                        </div>
                        
                        <div id="claim_claimant" class="panel-collapse panel-body">
                            <table class="info-table" width='100%'>
                                <tbody>
                                    
                                    <?php
                                    $claimantDetails = json_decode($claimDetails->claimant, true);
                                    ?>
                                    <?php if($claimantDetails && count($claimantDetails)>0): ?>

                                    <?php $__currentLoopData = $claimantDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="subtitle">
                                        <th colspan="2" style="<?php if($key==0): ?> padding-top: 0 <?php endif; ?>">Claimant #<?php echo e($key+1); ?>

                                            <span class="pull-right" style="margin-right: 15px; font-size: 11px"> 
                                                 <?php if($details['originalType'] !==1): ?>
                                                <a data='<?php echo e(json_encode($details)); ?>' class='dpib_edit_claimant_info mr-right' data-originalType=<?php echo e($details['originalType']); ?>><span class="fas fa-edit text-blue" data-toggle="tooltip" title="" data-original-title="Edit claimant information"></span></a>
                                                <?php endif; ?>
                                                <span class="pull-right" style="margin-right: 15px; font-size: 11px"><a class='dpib_delete_claimant_info' data-url='<?php echo e(route('removeclaimant',$details['id'])); ?>' claim-id='<?php echo e($claimDetails->id); ?>' ><span class="fas fa-archive text-blue" data-toggle="tooltip" title="" data-original-title="Delete claimant"></span></a></span></span>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>Type:</td>
                                    
                                        <td><?php echo e($details['type']); ?></td>
                                    </tr>

                                    <?php if($details['originalType']==1 || $details['originalType']==5): ?>
                                    <tr>
                                        <td>Name:</td>
                                        <td>
                                            <?php if($details['originalType']==1): ?>
                                            <a href="<?php echo e(route('customeroverview',$claimDetails->customer_id)); ?>"><?php echo e($details['name']); ?></a>
                                            <?php else: ?>
                                            <?php echo e($details['name']); ?>

                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php elseif($details['originalType']==3): ?>
                                    <tr>
                                        <td>Name:</td>
                                        <td>
                                          
                                            <?php echo e($details['name']); ?>

                                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Id number:</td>
                                        <td>
                                            
                                            <?php echo e($details['Idnumber']); ?>                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Membership number:</td>
                                        <td>
                                           <?php echo e($details['membershipNumber']); ?>

                                        </td>
                                    </tr>
                                    <?php elseif($details['originalType']==4): ?>
                                    <tr>
                                        <td>Plate number:</td>
                                        <td>
                                           <?php echo e($details['plateNumber']); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Chase number:</td>
                                        <td>
                                            <?php echo e($details['chaseNumber']); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Certificate number:</td>
                                        <td>
                                            <?php echo e($details['certificateNumber']); ?>

                                        </td>
                                    </tr>
                                    <?php endif; ?>


                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                 <aside class="col-md-3">
                 
                    <div id="panel-customer_balance" class="panel panel-default open">
                        <div class="panel-heading"><h3 class="panel-title">Amounts</h3></div>
                        <div id="customer_premium" class="panel-collapse panel-body">

                            <table class="info-table">

                                <tbody>
                                    <tr id="signedPremium">
                                        <td>Excess/deductible:</td>
                                        <td>
                                            <span>
                                                0.00  SAR</span>
                                        </td>
                                    </tr>
                                  
                                    <tr id="signedPremium">
                                        <td>Outstanding reserve:</td>
                                        <td>
                                            <span>
                                                
                                                <?php echo e(number_format($reserveAmount, 2, '.', ',')); ?> SAR
                                                

                                            </span>
                                        </td>
                                    </tr>
                               

                                    <tr id="gross_written_premium">
                                        <td>Total payments made:</td>
                                        <td>
                                            <span>
                                                <?php echo e(number_format($grossPaid, 2, '.', ',')); ?> SAR</span>
                                        </td>
                                    </tr>
                                    <tr id="installments">
                                        <td>Total incurred:</td>
                                        <td>
                                            <span><?php echo e(number_format($grossPaid+$reserveAmount, 2, '.', ',')); ?> SAR </span>
                                        </td>
                                    </tr>


                           
                                </tbody></table>



                        </div>

                    </div>
                   
     


                </aside>
            </div>
        </div>

        <div id="content_payments" class="tabcontent col-12" rel='<?php echo e(route('paymentdetails',[$claimDetails->id])); ?>' style="display:none">
            endorsement  display area

        </div>


        <div id="content_document" class="tabcontent col-12" rel="" style="display:none">

                        <div class="card open">
                             <div class="card-body">
    <div class="panel-heading">
        <ul class="panel-actions list-inline pull-right">
          <li class="dpib_claim_document_add"><span class="panel-action-add"  data-toggle="tooltip" title="Add a document"><span class="fas fa-plus text-blue"></span></span></li>  
        </ul> 
        <h1 class="card-title col-3">Documents<small></small></h1> </div> 
            <div class="table-responsive" style='width:100%;'>
                <table class="display nowrap table table-hover table-striped table-bordered dataTable dpib_request_doc" width='100%'>
                    <thead>
                        <tr>
                            <th style="width: 25%" class="nowrap">File</th>
                            <th style="width: 25%" class="nowrap">Comment</th>                           
                            <th  class="nowrap" style="width: 10%">Type</th>
                            <th  class="nowrap" style="width: 10%">Uploaded By</th>
                            <th  class="nowrap" style="width: 5%">Uploaded at</th>
                             <th  class="nowrap" style="width: 5%">Modified at</th>
                            <th  class="nowrap" >  </th>
                        </tr>
                    </thead>
                    <tbody>
           
                   </tbody>
                </table>
            </div>
        </div> 

</div>
        </div>



        <div id="content_log" class="tabcontent col-12"  style="display:none;" rel="<?php echo e(route('claimlogdata',[$claimDetails->id])); ?>">
            log display area 

        </div>



</div>
<script id='claim_claimant_template' type='text/template'>
        
        <?php echo e(Form::open(array('route' => array('saveclaimant',$claimDetails->id), 'name' => 'form_claimant_add','id'=>'form_claimant_add','files'=>'true' ))); ?>

    <?php echo csrf_field(); ?>   
   
<div class="dialogform">
    <table class="insly_dialogform">
    <tbody><tr style="display:none;">
                    <td></td>
                <td>
                                            
                                    </td>
    </tr>
    <tr style="display:none;">
                    <td></td>
                <td>
                                                <input type="hidden" id="claimanttype" name="claimanttype" value="">
                                    </td>
    </tr>
    <tr id="field_claim_claimant_name" class="field ">
                    <td class="">
    <div class="label ">
                <span class="text-danger icon-asterix"></span>
        <span class="title">Name</span>
    </div>
</td>
                <td>
            <div class="element">
                                                                <input type="text" id="claim_claimant_name" name="claim_claimant_name" value="" autocomplete="off" class="form-control">
                                                                                                                            </div>
        </td>
    </tr>

</tbody></table></div>
  <?php echo e(Form::close()); ?>

</script>

<script id='claim_claimant_template_medical' type='text/template'>
        
        <?php echo e(Form::open(array('route' => array('saveclaimant',$claimDetails->id), 'name' => 'form_claimant_add','id'=>'form_claimant_add','files'=>'true' ))); ?>

    <?php echo csrf_field(); ?>   
   
<div class="dialogform">
    <table class="insly_dialogform">
    <tbody><tr style="display:none;">
                    <td></td>
                <td>
                                            
                                    </td>
    </tr>
    <tr style="display:none;">
                    <td></td>
                <td>
                                                <input type="hidden" id="claimanttype" name="claimanttype" value="">
                                    </td>
    </tr>
    <tr id="field_claim_claimant_name" class="field ">
                    <td class="">
    <div class="label ">
                <span class="text-danger icon-asterix"></span>
        <span class="title">Name</span>
    </div>
</td>
                <td>
            <div class="element">
                                                                <input type="text" id="claim_claimant_name" name="claim_claimant_name" value="" autocomplete="off" class="form-control">
                                                                                                                            </div>
        </td>
    </tr>
     <tr id="field_claim_id_number" class="field ">
                    <td class="">
    <div class="label ">
                <span class="text-danger icon-asterix"></span>
        <span class="title">Id number</span>
    </div>
</td>
                <td>
            <div class="element">
                                                                <input type="text" id="claim_id_number" name="claim_id_number" value="" autocomplete="off" class="form-control">
                                                                                                                            </div>
        </td>
    </tr>
     <tr id="field_claim_membership_number" class="field ">
                    <td class="">
    <div class="label ">
                <span class="text-danger icon-asterix"></span>
        <span class="title">Membership number</span>
    </div>
</td>
                <td>
            <div class="element">
                                                                <input type="text" id="claim_membership_number" name="claim_membership_number" value="" autocomplete="off" class="form-control">
                                                                                                                            </div>
        </td>
    </tr>

</tbody></table></div>
  <?php echo e(Form::close()); ?>

</script>

<script id='claim_claimant_template_motor' type='text/template'>
        
        <?php echo e(Form::open(array('route' => array('saveclaimant',$claimDetails->id), 'name' => 'form_claimant_add','id'=>'form_claimant_add','files'=>'true' ))); ?>

    <?php echo csrf_field(); ?>   
   
<div class="dialogform">
    <table class="insly_dialogform">
    <tbody><tr style="display:none;">
                    <td></td>
                <td>
                                            
                                    </td>
    </tr>
    <tr style="display:none;">
                    <td></td>
                <td>
                                                <input type="hidden" id="claimanttype" name="claimanttype" value="">
                                    </td>
    </tr>
    <tr id="field_claim_plate_number" class="field ">
                    <td class="">
    <div class="label ">
                <span class="text-danger icon-asterix"></span>
        <span class="title">Plate number</span>
    </div>
</td>
                <td>
            <div class="element">
                                                                <input type="text" id="claim_plate_number" name="claim_plate_number" value="" autocomplete="off" class="form-control">
                                                                                                                            </div>
        </td>
    </tr>
     <tr id="field_claim_chase_number" class="field ">
                    <td class="">
    <div class="label ">
                <span class="text-danger icon-asterix"></span>
        <span class="title">Chase number</span>
    </div>
</td>
                <td>
            <div class="element">
                                                                <input type="text" id="claim_chase_number" name="claim_chase_number" value="" autocomplete="off" class="form-control">
                                                                                                                            </div>
        </td>
    </tr>
     <tr id="field_claim_certificate_number" class="field ">
                    <td class="">
    <div class="label ">
                <span class="text-danger icon-asterix"></span>
        <span class="title">Certificate number</span>
    </div>
</td>
                <td>
            <div class="element">
                                                                <input type="text" id="claim_certificate_number" name="claim_certificate_number" value="" autocomplete="off" class="form-control">
                                                                                                                            </div>
        </td>
    </tr>

</tbody></table></div>
  <?php echo e(Form::close()); ?>

</script>










<script id='claim_editclaimant_template' type='text/template'>
        
        <?php echo e(Form::open(array('route' => array('updateclaimant',$claimDetails->id), 'name' => 'form_claimant_add','id'=>'form_claimant_add','files'=>'true' ))); ?>

    <?php echo csrf_field(); ?>   
   
<div class="dialogform">
    <table class="insly_dialogform">
    <tbody><tr style="display:none;">
                    <td></td>
                <td>
                                            
                                    </td>
    </tr>
    <tr style="display:none;">
                    <td></td>
                <td>
                                                <input type="hidden"  name="claimantId" value="<%- claimantId %>">
                                    </td>
    </tr>
    <tr id="field_claim_claimant_name" class="field ">
                    <td class="">
    <div class="label ">
                <span class="text-danger icon-asterix"></span>
        <span class="title">Name</span>
    </div>
</td>
                <td>
            <div class="element">
                                                                <input type="text" id="claim_claimant_name" name="claim_claimant_name" value="<%- claimantName %>" autocomplete="off" class="form-control">
                                                                                                                            </div>
        </td>
    </tr>

</tbody></table></div>
  <?php echo e(Form::close()); ?>

</script>

<script id='claim_editclaimant_template_motor' type='text/template'>
        
        <?php echo e(Form::open(array('route' => array('updateclaimant',$claimDetails->id), 'name' => 'form_claimant_add','id'=>'form_claimant_add','files'=>'true' ))); ?>

    <?php echo csrf_field(); ?>   
   
<div class="dialogform">
    <table class="insly_dialogform">
    <tbody><tr style="display:none;">
                    <td></td>
                <td>
                                            
                                    </td>
    </tr>
    <tr style="display:none;">
                    <td></td>
                <td>
                                                <input type="hidden"  name="claimantId" value="<%- claimantId %>">
                                    </td>
    </tr>
    <tr id="field_claim_claimant_name" class="field ">
                    <td class="">
    <div class="label ">
                <span class="text-danger icon-asterix"></span>
        <span class="title">Plate number</span>
    </div>
</td>
                <td>
            <div class="element">
                                                                <input type="text" id="claim_plate_number" name="claim_plate_number" value="<%- plateNumber %>" autocomplete="off" class="form-control">
                                                                                                                            </div>
        </td>
    </tr>
    <tr id="field_claim_claimant_name" class="field ">
                    <td class="">
    <div class="label ">
                <span class="text-danger icon-asterix"></span>
        <span class="title">Chase number</span>
    </div>
</td>
                <td>
            <div class="element">
                                                                <input type="text" id="claim_chase_number" name="claim_chase_number" value="<%- chaseNumber %>" autocomplete="off" class="form-control">
                                                                                                                            </div>
        </td>
    </tr>
    <tr id="field_claim_claimant_name" class="field ">
                    <td class="">
    <div class="label ">
                <span class="text-danger icon-asterix"></span>
        <span class="title">Certificate number</span>
    </div>
</td>
                <td>
            <div class="element">
                                                                <input type="text" id="claim_certificate_name" name="claim_certificate_name" value="<%- certificateNumber %>" autocomplete="off" class="form-control">
                                                                                                                            </div>
        </td>
    </tr>

</tbody></table></div>
  <?php echo e(Form::close()); ?>

</script>

<script id='claim_editclaimant_template_medical' type='text/template'>
        
        <?php echo e(Form::open(array('route' => array('updateclaimant',$claimDetails->id), 'name' => 'form_claimant_add','id'=>'form_claimant_add','files'=>'true' ))); ?>

    <?php echo csrf_field(); ?>   
   
<div class="dialogform">
    <table class="insly_dialogform">
    <tbody><tr style="display:none;">
                    <td></td>
                <td>
                                            
                                    </td>
    </tr>
    <tr style="display:none;">
                    <td></td>
                <td>
                                                <input type="hidden"  name="claimantId" value="<%- claimantId %>">
                                    </td>
    </tr>
    <tr id="field_claim_claimant_name" class="field ">
                    <td class="">
    <div class="label ">
                <span class="text-danger icon-asterix"></span>
        <span class="title">Name</span>
    </div>
</td>
                <td>
            <div class="element">
                                                                <input type="text" id="claim_claimant_name" name="claim_claimant_name" value="<%- claimantName %>" autocomplete="off" class="form-control">
                                                                                                                            </div>
        </td>
    </tr>
    <tr id="field_claim_claimant_name" class="field ">
                    <td class="">
    <div class="label ">
                <span class="text-danger icon-asterix"></span>
        <span class="title">Id number</span>
    </div>
</td>
                <td>
            <div class="element">
                                                                <input type="text" id="claim_id_number" name="claim_id_number" value="<%- idNumber %>" autocomplete="off" class="form-control">
                                                                                                                            </div>
        </td>
    </tr>
    <tr id="field_claim_claimant_name" class="field ">
                    <td class="">
    <div class="label ">
                <span class="text-danger icon-asterix"></span>
        <span class="title">Membership number</span>
    </div>
</td>
                <td>
            <div class="element">
                                                                <input type="text" id="claim_membership_number" name="claim_membership_number" value="<%- membershipNumber %>" autocomplete="off" class="form-control">
                                                                                                                            </div>
        </td>
    </tr>




</tbody></table></div>
  <?php echo e(Form::close()); ?>

</script>


<script id='claim_updatestatus_template' type='text/template'>
        
        <?php echo e(Form::open(array('route' => array('updatestatus',$claimDetails->id), 'name' => 'form_claimant_add','id'=>'form_claimant_add','files'=>'true' ))); ?>

    <?php echo csrf_field(); ?>   
   
<div class="dialogform">
    <table class="insly_dialogform">
    <tbody><tr id="field_claimstatus_oid" class="field ">
                    <td class="">
    <div class="label ">
                <span class="text-danger "></span>
        <span class="title">Status</span>
    </div>
</td>
                <td>
            <div class="element">
             <?php echo e(Form::select('claim_status',  $claimStatus, $claimDetails->originalStatus,array('name'=>'claim_status','id' =>'claim_status','required'=>'required','class'=>'required custom-select','error-message' =>"Insurance company field is mandatory"))); ?>                                                   

           </div>
        </td>
    </tr>
    <tr id="field_claim_progress_comment" class="field ">
                    <td class="">
    <div class="label ">
                <span class="text-danger "></span>
        <span class="title">Comment/info</span>
    </div>
</td>
                <td>
            <div class="element">
                                                                <input type="text" id="claim_progress_comment" name="claim_progress_comment" value="" autocomplete="off" class="form-control">
                                                                                                                            </div>
        </td>
    </tr>


</tbody></table>
</div>
  <?php echo e(Form::close()); ?>

</script>

<script id='request_document_upload_template' type='text/template'>
<?php echo e(Form::open(array('route' => array('claimdocumentsave', $claimDetails->id), 'name' => 'form_document_add','id'=>'form_document_add','files'=>'true' ))); ?>

    
    <div class="dialogform">
        <table class="insly_dialogform">
                <tbody>
                        <tr id="field_document_file" class="field">
                                <td class="">
                                    <div class="label"><span class="text-danger icon-asterix"></span><span class="title">File</span></div></td>
                                        <td><div class="element">
                                       
                                                                <input type="file" id="document_file"  style="height:auto" name="document_file[]" multiple="multiple" onchange="FORM.validateFile($(this), 128, 'Maximum file upload size 128 MB exceeded!')" class="form-control">
                                                                 
                                                                    </div>
                                                                    </td>
                                                                    </tr>  
                  <tr id="field_documenttype_oid" class="field">
                        <td class="">
                            <div class="label">
                                <span class="text-danger "></span>
                                <span class="title">Type</span>
                            </div>
                        </td>
                        <td>
                            <div class="element">
                                <input type='hidden' name='customer_id' value='<?php echo $claimDetails->customer_id; ?>'>
                                <input type='hidden' name='policy_id' value='<?php echo e($policyId); ?>'>
                             <?php echo e(Form::select('documenttype_oid',[''=>'--- other ---'] +  $documentType, null,array('id' =>'documenttype_oid','required'=>'required','class'=>'required custom-select','error-message' =>"Gender field is mandatory" ))); ?>  
                            </div>
                        </td>
                    </tr>
                    <tr id="field_document_comment" class="field">
                        <td class="">
                            <div class="label">
                                <span class="text-danger "></span>
                                <span class="title">Comment</span>
                            </div>
                        </td>
                        <td>
                            <div class="element">
                                <input type="text" id="document_comment" name="document_comment" value="" autocomplete="off" maxlength="255" class="form-control">
                            </div>
                        </td>
                    </tr>
                    

                </tbody></table></div>
    <?php echo e(Form::close()); ?>

</script>

<script id='request_document_upload_edit_template' type='text/template'>
<?php echo e(Form::open(array('route' => array('claimdocumentedit', $claimDetails->id), 'name' => 'form_document_add','id'=>'form_document_add','files'=>'true' ))); ?>

    


    <div class="dialogform">
        <table class="insly_dialogform">
                <tbody>

                    <tr id="field_documenttype_oid" class="field">
                        <td class="">
                            <div class="label ">
                                <span class="text-danger "></span>
                                <span class="title">Type</span>
                            </div>
                        </td>
                        <td>
                            <div class="element">
                                <input type='hidden' name='customer_id' value='<?php echo $claimDetails->customer_id; ?>'>
                                <input type='hidden' name='policy_id' value='<?php echo e($policyId); ?>'>
                                <input type='hidden' name='doc_id' value='<%= docId %>'>
                                 <input type='hidden' name='claim_id' value='<%= claimId %>'>
                             
                             <?php echo e(Form::select('documenttype_oid',[''=>'--- other ---'] +  $documentType, '',array('id' =>'documenttype_oid','required'=>'required','class'=>'required custom-select' ,'error-message' =>"Gender field is mandatory" ))); ?>  
                            </div>
                        </td>
                    </tr>
                    <tr id="field_document_comment" class="field ">
                        <td class="">
                            <div class="label ">
                                <span class="text-danger "></span>
                                <span class="title">Comment</span>
                            </div>
                        </td>
                        <td>
                            <div class="element">
                                <input type="text" id="document_comment" name="document_comment" value="<%= doccomment %>" autocomplete="off" maxlength="255" class='form-control'>
                            </div>
                        </td>
                    </tr>
                    

                </tbody></table></div>
    <?php echo e(Form::close()); ?>

</script>

    <script id='dpib_claim_payment_add_form' type='text/template'>

    <?php echo e(Form::open(array('route' => array('claimpaymentadd', $claimDetails->id), 'name' => 'form_claim_payment_add','id'=>'form_claim_payment_add','files'=>'true' ))); ?>

   <table class="insly_dialogform">
    <tbody>
        <tr id="field_claim_payment_sum" class="field">
            <td class=""><div class="label"><span class="text-danger icon-asterix"></span><span class="title">Payment sum</span></div></td>
            <td><div class="element"><input type="text" id="claim_payment_sum" name="claim_payment_sum" value="0.00" autocomplete="off" style="width: 490px; width: 50%;" class="numberfield currencyfield form-control" data-m-dec="2">
                    <select id="claim_payment_currency" name="claim_payment_currency" style="margin-left: 10px; width: 80px !important" data-keephiddenvalue="1" class="numberfield custom-select" ><option value="SAR" selected="selected">SAR</option>
                    </select>
                </div>
            </td>
        </tr>
        <tr id="field_claim_payment_date" class="field">
            <td class=""><div class="label"><span class="text-danger icon-asterix"></span><span class="title">Payment date</span></div></td>
            <td><div class="element"><input type="date" class="form-control" id="claim_payment_date" name="claim_payment_date" value="<?php echo e(date('Y-m-d')); ?>" maxlength="10" autocomplete="off" class="datefield" style="margin-right: 0px !important"><div style="float: right; width: 40%; padding-left: 10px; padding-top: 9px; overflow: hidden"><div id="claim_payment_date_comment"></div></div></div>
            </td>
        </tr>  
        <tr id="field_claim_payment_type" class="field ">
            <td class="">
                <div class="label ">
                    <span class="text-danger icon-asterix"></span>
                    <span class="title">Payment type</span>
                </div>
            </td>
            <td>
                <div class="element">
                    <select id="claim_payment_type" name="claim_payment_type" class="custom-select required" error-message="Payment type is mandatory">
                        <option value="">--- select from here ---</option>
                        <option value="1">By Cash</option>

                        <option value="2">By Cheque</option>

                        <option value="3">By Online transfer</option>

                    </select>


                </div>
            </td>
        </tr>
        <tr id="field_claim_payment_description" class="field ">
            <td class="">
                <div class="label ">
                    <span class="text-danger "></span>
                    <span class="title">Payment description</span>
                </div>
            </td>
            <td>
                <div class="element">
                    <input type="text" id="claim_payment_description" name="claim_payment_description" value="" autocomplete="off" class="form-control">
                        <input type='hidden' name='transaction_type' id="transaction_type"  value="<%- selectedType %>"/>
                </div>
            </td>
        </tr>
        <tr id="field_claim_payment_reserve_change" class="field ">
            <td class="">
                <div class="label ">
                    <span class="text-danger "></span>
                    <span class="title">Reserve changes?</span>
                </div>
            </td>
            <td>
                <div class="element custom-control custom-checkbox mr-sm-2">
                    <input type="hidden" name="claim_payment_reserve_change" value="">
                        <input class="custom-control-input"  type="checkbox" id="claim_payment_reserve_change" name="claim_payment_reserve_change" value="1" checked="checked" >
                            <label class="custom-control-label" for="claim_payment_reserve_change">Yes                                               
                                            </label>

                </div>
            </td>
        </tr>
        <tr id="field_claim_payer_subtitle" class="field">
            <td colspan="2" class="subtitle ">Payer</td>
        </tr>

        <tr id="field_claim_payment_payer_type" class="field ">
            <td class="">
                <div class="label ">
                    <span class="text-danger "></span>
                    <span class="title">Payer Type</span>
                </div>
            </td>
            <td>
                <div class="element">
                    <select id="claim_payment_payer_type" name="claim_payment_payer_type" class="custom-select">
                        <option value="">--- none ---</option>
                        <option value="0">Insurer (system-defined)</option>

                        <option value="1">Insurance provider</option>

                    </select>


                </div>
            </td>
        </tr>
        <tr id="field_claim_payment_payer_insurer" class="field hidden">
            <td class="">
                <div class="label ">
                    <span class="text-danger icon-asterix"></span>
                    <span class="title">Insurer (payer)</span>
                </div>
            </td>
            <td>
                <div class="element">
                    <select id="claim_payment_payer_insurer" name="claim_payment_payer_insurer" class="custom-select col-12">
                         <option value="">--- none ---</option>
                         <option value="<?php echo $insuredDetals->id; ?>"><?php echo $insuredDetals->insurer_name; ?></option>

                    </select>


                </div>
            </td>
        </tr>

        <tr id="field_claim_payment_payer_name" class="field ">
            <td class="">
                <div class="label ">
                    <span class="text-danger "></span>
                    <span class="title">Payer name</span>
                </div>
            </td>
            <td>
                <div class="element">
                    <input type="text" id="claim_payment_payer_name" name="claim_payment_payer_name" value="" autocomplete="off" maxlength="255" class="form-control">
                </div>
            </td>
        </tr>
        <tr id="field_claim_payee_subtitle" class="field">
        <td colspan="2" class="subtitle ">Payee</td>
         </tr>
         <tr id="field_claim_payment_payee_type" class="field ">
            <td class="">
                <div class="label ">
                    <span class="text-danger "></span>
                    <span class="title">Payee type</span>
                </div>
            </td>
            <td>
                <div class="element">
                    <select id="claim_payment_payee_type" name="claim_payment_payee_type" class="custom-select">
                        <option value="">--- none ---</option>
                        <option value="0">Insurer (system-defined)</option>

                        <option value="1">Insured</option>

                    </select>


                </div>
            </td>
        </tr>
        <tr id="field_claim_payment_payee_insurer" class="field hidden">
            <td class="">
                <div class="label ">
                    <span class="text-danger icon-asterix"></span>
                    <span class="title">Insurer (payee)</span>
                </div>
            </td>
            <td>
                <div class="element">
                    <select id="claim_payment_payee_insurer" name="claim_payment_payee_insurer" class="custom-select">
                        <option value="">--- none ---</option>
                        <option value="<?php echo $insuredDetals->id; ?>"><?php echo $insuredDetals->insurer_name; ?></option>
                    </select>
                </div>
            </td>
        </tr>

        <tr id="field_claim_payment_payee_name" class="field ">
            <td class="">
                <div class="label ">
                    <span class="text-danger "></span>
                    <span class="title">Payee name</span>
                </div>
            </td>
            <td>
                <div class="element">
                    <input type="text" id="claim_payment_payee_name" name="claim_payment_payee_name" value="" autocomplete="off" maxlength="255" class="form-control">
                </div>
            </td>
        </tr>



    </tbody>
</table>

  <?php echo e(Form::close()); ?>


</script>

<script id='dpib_claim_reserve_add_form' type='text/template'>
   <?php echo e(Form::open(array('route' => array('claimreserveadd', $claimDetails->id), 'name' => 'form_claim_payment_add','id'=>'form_claim_payment_add','files'=>'true' ))); ?> 
<div class="dialogform">
    <table class="insly_dialogform">
        <tbody>
            <tr id="field_claim_reserve_transaction_sum" class="field"><td class=""><div class="label"><span class="text-danger icon-asterix"></span><span class="title">Transaction sum</span></div></td><td><div class="element"><input type="text" id="claim_reserve_transaction_sum" name="claim_reserve_sum" value="0.00" autocomplete="off" style="width: 490px; width: 50%;" class="numberfield currencyfield form-control" data-m-dec="2"><select id="claim_reserve_currency" name="claim_reserve_currency" style="margin-left: 10px; width: 80px !important" data-keephiddenvalue="1" class="numberfield" onchange="FORM.updateCurrency('claim_reserve_currency')"><option value="SAR" selected="selected">SAR</option></select></div></td></tr>
            <tr id="field_claim_reserve_date" class="field"><td class=""><div class="label"><span class="title">Reserve Date</span></div></td>
                <td><div class="element"><input type="date" id="claim_reserve_date" name="claim_reserve_date" value="<?php echo e(date('Y-m-d')); ?>" maxlength="10" autocomplete="off" class="datefield form-control" style="margin-right: 0px !important"><div style="float: right; width: 40%; padding-left: 10px; padding-top: 9px; overflow: hidden"><div id="claim_reserve_date_comment"></div></div></div></td></tr> 
            <tr id="field_claim_reserve_description" class="field ">
                <td class="">
                    <div class="label ">
                        <span class="text-danger "></span>
                        <span class="title">Reserve description</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <input type="text" id="claim_reserve_description" name="claim_reserve_description" value="" autocomplete="off" class="form-control">
                    </div>
                </td>
            </tr>
            <tr id="field_claim_reserve_type" class="field ">
                <td class="">
                    <div class="label ">
                        <span class="text-danger "></span>
                        <span class="title">Reserve Type</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <select id="claim_reserve_type" name="claim_reserve_type">
                            <option value="">--- select from here ---</option>
                            <option value="1">Own damage</option>

                            <option value="2">Third party</option>

                        </select>


                    </div>
                </td>
            </tr>

            <tr style="display:none;">
                <td></td>
                <td>
                    <input type="hidden" id="claim_reserve_transaction_currency" name="claim_reserve_transaction_currency" value="">
                </td>
            </tr>

        </tbody>
    </table>
</div>
    <?php echo e(Form::close()); ?>            
</script>
<script id='request_payment_edit_template' type='text/template'>

    <?php echo e(Form::open(array('route' => array('claimpaymentadd', $claimDetails->id), 'name' => 'form_claim_payment_add','id'=>'form_claim_payment_add','files'=>'true' ))); ?>

   <table class="insly_dialogform">
    <tbody>
        <tr id="field_claim_payment_sum" class="field">
            <td class=""><div class="label"><span class="text-danger icon-asterix"></span><span class="title">Payment sum</span></div></td>
            <td><div class="element"><input type="text" id="claim_payment_sum" name="claim_payment_sum" value="<%= payment_sum  %>" autocomplete="off" style="width: 490px; width: 50%;" class="numberfield currencyfield form-control" data-m-dec="2">
                    <select id="claim_payment_currency" name="claim_payment_currency" style="margin-left: 10px; width: 80px !important" data-keephiddenvalue="1" class="numberfield" ><option value="SAR" selected="selected">SAR</option>
                    </select>
                </div>
            </td>
        </tr>
        <tr id="field_claim_payment_date" class="field">
            <td class=""><div class="label"><span class="text-danger icon-asterix"></span><span class="title">Payment date</span></div></td>
            <td><div class="element"><input type="date" id="claim_payment_date" name="claim_payment_date" value="<%= moment(payment_date).format('dd-mm-YYYY')   %>" maxlength="10" autocomplete="off" class="datefield form-control" style="margin-right: 0px !important"><div style="float: right; width: 40%; padding-left: 10px; padding-top: 9px; overflow: hidden"><div id="claim_payment_date_comment"></div></div></div>
            </td>
        </tr>  
        <tr id="field_claim_payment_type" class="field ">
            <td class="">
                <div class="label ">
                    <span class="text-danger icon-asterix"></span>
                    <span class="title">Payment type</span>
                </div>
            </td>
            <td>
                <div class="element">
                    <select id="claim_payment_type" name="claim_payment_type"  class="custom-select">
                        <option value="">--- select from here ---</option>
                        <option value="1">By Cash</option>

                        <option value="2">By Cheque</option>

                        <option value="3">By Online transfer</option>

                    </select>
                    
                    <input type='hidden' name="claim_payment_reserve_change" value="<%- is_reserve_change_flag %>" />

                        <input type='hidden' name='transaction_type' id="transaction_type"  value="<%- transaction_type %>"/>
                            <input type='hidden' name='payment_id'   value="<%- id %>"/>


                </div>
            </td>
        </tr>
        <tr id="field_claim_payment_description" class="field ">
            <td class="">
                <div class="label ">
                    <span class="text-danger "></span>
                    <span class="title">Payment description</span>
                </div>
            </td>
            <td>
                <div class="element">
                    <input type="text" id="claim_payment_description" name="claim_payment_description" value="<%= payment_description  %>" autocomplete="off" class="form-control">
                        
                </div>
            </td>
        </tr>

        <tr id="field_claim_payer_subtitle" class="field">
            <td colspan="2" class="subtitle ">Payer</td>
        </tr>

        <tr id="field_claim_payment_payer_type" class="field ">
            <td class="">
                <div class="label ">
                    <span class="text-danger "></span>
                    <span class="title">Payer Type</span>
                </div>
            </td>
            <td>
                <div class="element">
                    <select id="claim_payment_payer_type" name="claim_payment_payer_type" class="custom-select">
                        <option value="">--- none ---</option>
                        <option value="0">Insurer (system-defined)</option>

                        <option value="1">Insurance provider</option>

                    </select>


                </div>
            </td>
        </tr>
        <tr id="field_claim_payment_payer_insurer" class="field hidden">
            <td class="">
                <div class="label ">
                    <span class="text-danger icon-asterix"></span>
                    <span class="title">Insurer (payer)</span>
                </div>
            </td>
            <td>
                <div class="element">
                    <select id="claim_payment_payer_insurer" name="claim_payment_payer_insurer">
                         <option value="">--- none ---</option>
                         <option value="<?php echo $insuredDetals->id; ?>"><?php echo $insuredDetals->insurer_name; ?></option>

                    </select>


                </div>
            </td>
        </tr>

        <tr id="field_claim_payment_payer_name" class="field ">
            <td class="">
                <div class="label ">
                    <span class="text-danger "></span>
                    <span class="title">Payer name</span>
                </div>
            </td>
            <td>
                <div class="element">
                    <input type="text" id="claim_payment_payer_name" name="claim_payment_payer_name" value="<%= payer_name  %>" autocomplete="off" maxlength="255" class="form-control">
                </div>
            </td>
        </tr>
        <tr id="field_claim_payee_subtitle" class="field">
        <td colspan="2" class="subtitle ">Payee</td>
         </tr>
         <tr id="field_claim_payment_payee_type" class="field ">
            <td class="">
                <div class="label ">
                    <span class="text-danger "></span>
                    <span class="title">Payee type</span>
                </div>
            </td>
            <td>
                <div class="element">
                    <select id="claim_payment_payee_type" name="claim_payment_payee_type" class="custom-select">
                        <option value="">--- none ---</option>
                        <option value="0">Insurer (system-defined)</option>

                        <option value="1">Insured</option>

                    </select>


                </div>
            </td>
        </tr>
        <tr id="field_claim_payment_payee_insurer" class="field hidden">
            <td class="">
                <div class="label ">
                    <span class="text-danger icon-asterix"></span>
                    <span class="title">Insurer (payee)</span>
                </div>
            </td>
            <td>
                <div class="element">
                    <select id="claim_payment_payee_insurer" name="claim_payment_payee_insurer" class="custom-select">
                        <option value="">--- none ---</option>
                        <option value="<?php echo $insuredDetals->id; ?>"><?php echo $insuredDetals->insurer_name; ?></option>
                    </select>
                </div>
            </td>
        </tr>

        <tr id="field_claim_payment_payee_name" class="field ">
            <td class="">
                <div class="label ">
                    <span class="text-danger "></span>
                    <span class="title">Payee name</span>
                </div>
            </td>
            <td>
                <div class="element">
                    <input type="text" id="claim_payment_payee_name" name="claim_payment_payee_name" value="<%= payee_name  %>" autocomplete="off" maxlength="255" class="form-control">
                </div>
            </td>
        </tr>



    </tbody>
</table>

  <?php echo e(Form::close()); ?>


</script>
  <script id='dpib_claim_reservesum_update_form' type='text/template'>
   <?php echo e(Form::open(array('route' => array('claimreserveadd', $claimDetails->id), 'name' => 'form_claim_payment_add','id'=>'form_claim_payment_add','files'=>'true' ))); ?> 
<div class="dialogform">
    <table class="insly_dialogform">
        <tbody>
           
            <tr id="field_claim_reserve_date" class="field"><td class=""><div class="label"><span class="title">Reserve Date</span></div></td>
                <td><div class="element">
                                <input type="date" id="claim_reserve_date" name="claim_reserve_date" value="<%= moment(reserve_date).format('DD-MM-YYYY')   %>" maxlength="10" autocomplete="off" class="datefield form-control" style="margin-right: 0px !important"><div style="float: right; width: 40%; padding-left: 10px; padding-top: 9px; overflow: hidden"><div id="claim_reserve_date_comment"></div></div></div></td></tr> 
            <tr id="field_claim_reserve_description" class="field ">
                <td class="">
                    <div class="label ">
                        <span class="text-danger "></span>
                        <span class="title">Reserve description</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <input type="text" id="claim_reserve_description" name="claim_reserve_description" value="<%- description %>" autocomplete="off" class="form-control"> 
                            <input type="hidden" name="history_id" value="<%- id %>" />
                                 <input type="hidden" name="claim_reserve_sum" value="<%- amount %>" />
                                     
                    </div>
                </td>
            </tr>
            <tr id="field_claim_reserve_type" class="field ">
                <td class="">
                    <div class="label ">
                        <span class="text-danger "></span>
                        <span class="title">Reserve Type</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <select id="claim_reserve_type" name="claim_reserve_type" class="custom-select">
                            <option value="">--- select from here ---</option>
                            <option value="1">Own damage</option>

                            <option value="2">Third party</option>

                        </select>


                    </div>
                </td>
            </tr>



        </tbody>
    </table>
</div>
    <?php echo e(Form::close()); ?>            
</script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('customcss'); ?>
<link rel="stylesheet" type="text/css" href=" <?php echo e(asset('elitedesign/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')); ?> ">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('elitedesign/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css')); ?>"> 


<?php $__env->stopSection(); ?>


<?php $__env->startSection('customscript'); ?>
<script src="<?php echo e(asset('elitedesign/assets/node_modules/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('elitedesign/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js')); ?>"></script>

<script src="<?php echo e(asset('js/global/datatable/moment.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/global/datatable/datetime.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/dibcustom/dib-claim-add.js')); ?>" type="text/javascript"></script>

<script>
    var columnDefs1 = [];
    var customerId = <?php echo $claimDetails->customer_id; ?>

   var  policyId = <?php echo $policyId; ?>

                    $(function () {
                        var dibclaimObj = new DibClaimAdd();
                        dibclaimObj.initialSetting();
                        
                        columnDefs1.push({"name": 'filename',  "targets": 0, data: function (row, type, val, meta) {
                            var subject = row['file_name'];
                            row.sortData = row['file_name'];
                            linkString = "<a href='<?php echo route('getCustomerDownload',['##CID','0','##FILE']); ?>'>"+subject+"</a>";                             
                            var link = linkString.replace("##CID", customerId).replace("##FILE", subject);

                            row.displayData = link;
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 
        columnDefs1.push({"name": "comment",  "targets": 1, "orderable": false,data: function (row, type, val, meta) {
                            var subject = row['comment'];
                            row.sortData = row['comment'];
                            row.displayData = subject;
                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    
        columnDefs1.push({"name": 'filetype',  "targets": 2,  data: function (row, type, val, meta) {
                            var subject = row['docType'];
                            row.sortData = row['docType'];
                            row.displayData = subject;                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});            
                    
        columnDefs1.push({"name": 'Uploaded by',  "targets": 3, "orderable": false, data: function (row, type, val, meta) {
                            var subject = row['uploadedBy'];
                            row.sortData = row['uploadedBy'];
                            row.displayData = subject;
                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
                    
        columnDefs1.push({"name": 'Uploaded at',  "targets": 4,  data: function (row, type, val, meta) {
                            var subject = moment(row['upload_at']).format('DD.MM.YYYY HH:mm');
                            row.sortData = row['upload_at'];
                            row.displayData = subject;
                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});
        columnDefs1.push({"name": 'Edited at',  "targets": 5,  data: function (row, type, val, meta) {
                            var subject =moment(row['edited_at']).format('DD.MM.YYYY HH:mm');
                            row.sortData = row['edited_at'];
                            row.displayData = subject;
                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}});                
                    
         columnDefs1.push({"name": 'actions',  "targets": 6, "orderable": false, data: function (row, type, val, meta) {
                            var subject = '-';                           
                            row.displayData = '<a class="dpib_claim_document_edit mr-right" docType='+row['type']+'  data-placement="left"  data-toggle="popover"  docId='+row['docId']+' customerId ='+ customerId +' claimId='+row['claim_id']+' policyId='+policyId+' docData="'+row['comment']+'"><span class="fas fa-edit text-blue mr-right" data-toggle="tooltip" data-placement="left" title="" data-original-title="Edit document info"></span></a>'+'<a class="dpib_document_delete" docId='+row['docId']+' customerId ='+ customerId +' claimId='+row['claim_id']+' policyId='+policyId+'><span class="fas fa-archive" data-toggle="tooltip" data-placement="left" title="" data-original-title="Delete document"></span></a>';                           
                            
                            return row;
                        }, render: {"_": 'sortData', "display": 'displayData', 'filter': 'sortData'}}); 
    
    
    
    
    
   customerdocumentTable = $('.dpib_request_doc').DataTable( {
                data: <?php echo $documentDetails; ?>,
                autoWidth: true,
                stateSave: false,
                stateDuration: 60 * 60 * 24,
                responsive: true,
                deferRender: true,
                lengthChange: true,
                pagination: true,
                rowLength: true,
                scrollX: true,
                pagingType: 'full_numbers',
                processing: true,
                serverSide: false,
                destroy: true,
                order: [[5, "desc"]],
                pageLength: 10,
                displayLength: 10,
                autoFill: false,
                search: false,
                columnDefs:columnDefs1,
                language: {

                                paginate: {
                                    "first": '<i class="fa fa-angle-double-left"></i>',
                                    "last": '<i class="fa fa-angle-double-right"></i>',
                                    "next": '<i class="fa fa-angle-right"></i>',
                                    "previous": '<i class="fa fa-angle-left"></i>'
                                }
                            },
                dom: "Blftip"
     
    } ); 
                        
                $(document).off('click','.dpib_claim_document_add');
    $(document).on('click','.dpib_claim_document_add',function(){
        var template = _.template($("#request_document_upload_template").html());
        var data = {};
        var result = template(data);

            $("#db_claim_request_docpopup").remove();
                $('body').append('<div id="db_claim_request_docpopup" title="Add document" style="display:none" >' + result + '</div>');
                var dialogElement = $("#db_claim_request_docpopup");

                dialogElement.dialog({
                    width: 900,
                    modal: true,
                    buttons: {
                        "Add": {                          
                            class: "btn waves-effect waves-light btn-rounded btn-success",
                            text:"Add",
                            click: function () {
                                DIB.progressDialog(LOCALE.get('dib.common.progress.loading'));

                               $("form#form_document_add").submit();
                               

                            }
                        },
                        "cancel": {
                            class: "btn waves-effect waves-light btn-rounded btn-danger",
                            text:"Cancel",
                            click: function () {
                                dialogElement.dialog('close');
                                dialogElement.remove();
                            }
                        }
                    }
                });  
       
    });
    
        
     $(document).off('click','.dpib_claim_document_edit');
    $(document).on('click','.dpib_claim_document_edit',function(){
        var template = _.template($("#request_document_upload_edit_template").html());
        var data = {'docType':$(this).attr('doctype'),'docId':$(this).attr('docid'),'claimId':$(this).attr('claimId'),'doccomment':$(this).attr('docdata')};
       var docType = $(this).attr('doctype');
     
        var result = template(data);

            $("#db_endorsement_request_docpopup").remove();
                $('body').append('<div id="db_endorsement_request_docpopup" title="Edit document details" style="display:none" >' + result + '</div>');
                var dialogElement = $("#db_endorsement_request_docpopup");

                dialogElement.dialog({
                    width: 900,                   
                    modal: true,
                    buttons: {
                        "Update": {
                           
                            class: "btn waves-effect waves-light btn-rounded btn-success",
                            text:"Update",
                            click: function () {
                                DIB.progressDialog(LOCALE.get('dib.common.progress.loading'));

                               $("form#form_document_add").submit();
                               

                            }
                        },
                        "cancel": {
                            class: "btn waves-effect waves-light btn-rounded btn-danger",
                            text:"Cancel",
                            click: function () {
                                dialogElement.dialog('close');
                                dialogElement.remove();
                            }
                        }
                    },
                      open: function (event, ui) {
                        $("#documenttype_oid").val(docType)
                    }
                });  
       
    });
    
    $(document).off('click','.dpib_document_delete');
    $(document).on('click','.dpib_document_delete',function() {
        var formdata = {'docId':$(this).attr('docid'),'claimId':$(this).attr('claimId'),'customerId':$(this).attr('customerid'),'policyId':$(this).attr('policyid')};
       
       
                   $("#db_quote_request_editpopup").remove();
                $('body').append('<div id="db_quote_request_editpopup" title="Delete document" style="display:none" > Do you want to remove document?</div>');
                var dialogElement = $("#db_quote_request_editpopup");

                dialogElement.dialog({
                    width: 900,                    
                    modal: true,
                    buttons: {
                        "Delete": {
                            class: "btn waves-effect waves-light btn-rounded btn-success",
                            text:"Delete",
                            click: function () {
                                DIB.progressDialog(LOCALE.get('dib.common.progress.loading'));

                              $.ajax({
                    url: "<?php echo route('claimdocumentdelete',$claimDetails->id); ?>",
                    type: "GET",
                    data:formdata

            }).done(function (data) {
                if(data.status) {
                 location.reload(true);
                }
            });
                               

                            }
                        },
                        "cancel": {
                           class: "btn waves-effect waves-light btn-rounded btn-danger",
                            text:"Cancel",
                            click: function () {
                                dialogElement.dialog('close');
                                dialogElement.remove();
                            }
                        }
                    }
                });               

            
                  DIB.centerDialog(); 
       
       
    });   
    
                 
    $(document).off('change','#claim_payment_payer_type');
    $(document).on('change','#claim_payment_payer_type',function(){    
        if($(this).val()==1) {
           $("#field_claim_payment_payer_insurer").removeClass('hidden').addClass('hidden');
           $("#field_claim_payment_payer_name").removeClass('hidden');
         } else {
           $("#field_claim_payment_payer_insurer").removeClass('hidden');
           $("#field_claim_payment_payer_name").removeClass('hidden').addClass('hidden');
         }
    });
         
             $(document).off('change','#claim_payment_payee_type');
    $(document).on('change','#claim_payment_payee_type',function(){    
        if($(this).val()==1) {
           $("#field_claim_payment_payee_insurer").removeClass('hidden').addClass('hidden');
           $("#field_claim_payment_payee_name").removeClass('hidden');
         } else {
           $("#field_claim_payment_payee_insurer").removeClass('hidden');
           $("#field_claim_payment_payee_name").removeClass('hidden').addClass('hidden');
         }
    });

    $('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
$($.fn.dataTable.tables(true)).DataTable()
.columns.adjust()
.responsive.recalc();
});

                        
                        
                        
                    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make((in_array('CUSTOMER_MANAGER', Auth::user()->roles) ||  in_array('CUSTOMER_OFFICER', Auth::user()->roles))? 'layouts.elite_client'  :'layouts.elite_fullwidth' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Claims/claimoverview.blade.php ENDPATH**/ ?>