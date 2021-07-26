<?php $__env->startSection('headtitle'); ?>
 Create Policy
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo e(Form::open(array('route' => 'savepolicydetails', 'name' => 'savepolicyForm','id'=>'savepolicyForm','class'=>'dpib-custom-form') )); ?>



<div id="policy_add_form" class="row card policy_tab_form">

    <div class="card-body">
        <div class="vtabs customvtab">


            <ul class="nav nav-tabs tabs-vertical" role="tablist">
                <li  class="nav-item" id='step1'> 

                    <a class="nav-link active" data-toggle="tab" href="#home1" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down"><div class="step">Step 1</div>Customer</span> </a>

                </li>


                <li  class="nav-item" id='step2'> 

                    <a class="nav-link" data-toggle="tab" href="#home2" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down"><div class="step">Step 2</div>Policy</span> </a>

                </li>



                <li  class="nav-item" id='step3'> 

                    <a class="nav-link" data-toggle="tab" href="#home3" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down"><div class="step">Step 3</div>Coverage</span> </a>

                </li>


                <li  class="nav-item" id='step4'> 

                    <a class="nav-link" data-toggle="tab" href="#home4" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down"><div class="step">Step 4</div>Premium & Commisiion</span> </a>

                </li>
            </ul>
            <input type="hidden" name="policy_id" id="policy_id" value="<?php echo e(isset($policyId) ? $policyId : 0); ?>"  />
            <input type="hidden" name="policy_step" id="policy_step" value="1"  />
            <input type="hidden" name="step_type" id="step_type" value="next"  />
            <input type="hidden" name="crmId" id="crmId" value="<?php echo e(isset($crmId) ? $crmId : null); ?>"  />
            <input type="hidden" name="quoteId" id="crmId" value="<?php echo e(isset($quoteId) ? $quoteId : null); ?>"  />


            <div class="tab-content col-12" >

                <div class='col-12 tab-pane active' style='margin-top:40px;' id='home1'>
                    <panel id="policy_step1_section">
                        <div id="panel-customer_select" class="panel panel-default open">
                            <div class="panel-heading"><h3 class="panel-title">Customer</h3></div>
                            <div id="customer_select" class="panel-collapse panel-body">
                                <?php
                                $disabled = ''
                                ?>
                                <?php if($customerId > 0 ): ?>
                                <?php
                                $disabled ='disabled=disabled';
                                ?>

                                <?php endif; ?>
                                <table class="insly-form">
                                    <tbody><tr id="field_customer_oid" class="field"><td class=""><div class="label"><span class="title">Customer</span></div></td><td>
                                                <div class="element">
                                                    <?php if($customerId > 0 ): ?>
                                                    <input type="text" id="customer_name" class='form-control' name="customer_name" value="<?php echo e(isset($customerData) ? $customerData[0] : ''); ?>"  <?php echo e($disabled); ?> >
                                                    <input type="hidden" name="customer_id" id="customer_id" value="<?php echo e($customerId); ?>"  />
                                                    <?php else: ?>
                                                    <?php echo e(Form::select('customer_id',  $allCustomers, $customerId,array('name'=>'customer_id','id' =>'customer_id','required'=>'required','class'=>'required form-control custom-select','error-message' =>"Insurance company field is mandatory"))); ?>

                                                    <?php endif; ?>  
                                                </div>

                                            </td></tr></tbody></table>
                            </div>
                        </div>
                    </panel>


                   



                </div>

                <div class="tab-pane  p-20 col-12" id="home2" role="tabpanel">
                 
                    <panel id="policy_step2_section" >

                    </panel>

                </div>
                <div class="tab-pane p-20 col-12" id="home3" role="tabpanel">
            
                    <panel id="policy_step3_section" >

                    </panel>

                </div>

                <div class="tab-pane p-20 col-12" id="home4" role="tabpanel">
       
                    <panel id="policy_step4_section" >

                    </panel>

                </div>


            </div>
        </div>

        <div class="buttonbar pull-right"><button type="button" class="submit_policy btn waves-effect waves-light btn-rounded btn-success" name="submit_save" id="step-continue" step=1 step-type="next">Continue</button>
            <button type="button" class ="submit_policy btn waves-effect waves-light btn-rounded btn-info"  id="step-backward" name="submit_save" step=1 step-type="back" style="display:none" >Back</button>
            <button type="button" id="submit_cancel" name="submit_cancel" class='btn waves-effect waves-light btn-rounded btn-danger'>Cancel</button>
        </div>
    </div>
</div>
<?php echo e(Form::close()); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('customcss'); ?>
 <link href="<?php echo e(asset('elitedesign/dist/css/pages/tab-page.css')); ?> " rel="stylesheet">
 <?php $__env->stopSection(); ?>
 
<?php $__env->startSection('customscript'); ?>
<script src="<?php echo e(asset('js/global/datatable/moment.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/dibcustom/dib-policy-add.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
<script>

$(function () {

    var dibpolicyAddObj = new DibPolicyAdd();
    dibpolicyAddObj.initialSetting();

    $(".customvtab").tabs({disabled:[ 1, 2, 3 ]});
    <?php if($customerId == 0 ): ?>
   $("#customer_id").select2();
   <?php endif; ?>
    $("#customer_name").autocomplete({
        autoFocus: true,
        minLength: 2,
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: '<?php echo route("seachcustomer",["all"]); ?>',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                dataType: "json",
                data: {
                    search: request.term
                },
                success: function (data) {

                    response($.map(data, function (item)
                    {

                        return{
                            label: item.name,
                            value: item.id
                        }
                    }))

                }

            });
        },
        select: function (event, ui) {
            // Set selection
            $('#customer_name').val(ui.item.label); // display the selected text
            $('#customer_id').val(ui.item.value); // save selected id to input
            return false;
        }
    });



});
</script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.elite_fullwidth',['sidemenustatus' => array(),'countDetails'=>array(),'notificationCount'=>array() ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Policy/addPolicyForm.blade.php ENDPATH**/ ?>