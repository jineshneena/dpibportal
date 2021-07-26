<?php $__env->startSection('content'); ?>

<div id="policy_add_form" class="row">
    <?php echo e(Form::open(array('route' => array('editproductdata',$productData->mainId),'name' => 'objectForm','id'=>'objectForm','class'=>'col-12') )); ?> 

    <div class="col-md-12">
        <div class="panel panel-default panel-dark card">
            <div class="card-body">
        <?php echo $innerHtml; ?>

        <div class="productformblock" id="form_commission">
            <div class="panel-heading">
                <h3 class="panel-title">Commission</h3></div>
            <div class="panel-body" id="fieldgroup_commission">
                <table class="insly-form">    <tbody><tr id="field_policy_commission" class="field ">
                            <td class="">
                                <div class="label ">
                                    <span class="text-danger "></span>
                                    <span class="title">Commission</span>
                                </div>
                            </td>
                            <td>
                                <div class="element">
                                    <input type='hidden' name='policy_id' value='<?php echo e($productData->mainId); ?>' />
                                    <input type='hidden' name='editFlag' value='1' />
                                     <input type='hidden' name='policy_product' value='<?php echo e($productData->product_id); ?>' />
                                    
                                 <?php if($productData->policy_status !=2): ?>
                                     <?php
                                      $disabled = '';
                                     ?>

                                    <?php else: ?>

                                     <?php
                                      
                                      $disabled = 'disabled';
                                     ?>

                                    <?php endif; ?>
                                    <input type="text" id="policy_commission" name="policy_commission" value="<?php echo e(isset($productData->commision) ? $productData->commision : ''); ?>" autocomplete="off" class="with-comment with-comment form-control col-3 required" error-message="Commission field is mandatory" data-m-dec="4" <?php echo e($disabled); ?>>
                                    <small>% &nbsp;&nbsp; <span class="warning">Commission not entered for this insurer/product.</span></small>
                                </div>
                            </td>
                        </tr>
                    </tbody></table></div>
        </div>
        <div class="panel panel-default panel-dark productformblock" id="form_tax">
            <div class="panel-heading">
                <h3 class="panel-title">Tax</h3></div><div class="panel-body" id="fieldgroup_tax">
                    <table class="insly-form">
                        <tbody>
                            <tr id="field_policy_tax" class="field ">
                            <td class="">
                                <div class="label ">
                                    <span class="text-danger icon-asterix"></span>
                                    <span class="title">VAT</span>
                                </div>
                            </td>
                            <td>
                                <div class="element">
                                    <select id="policy_tax" name="policy_tax" data-default-value="5" class='form-control'>
                                        <option value="">--- select from here ---</option>
                                        <option value="0" <?php echo e(isset($productData->tax) ? (($productData->tax=="0")? 'selected':''): ''); ?>>Nil (0%)</option>

                                        <option value="5" <?php echo e(isset($productData->tax) ? (($productData->tax=="5")? 'selected':''): ''); ?>>VAT (5%)</option>
                                        <option value="15" <?php echo e(isset($productData->tax) ? (($productData->tax=="15")? 'selected':''): ''); ?>>VAT (15%)</option>

                                    </select>


                                </div>
                            </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
        </div>

        <div class="buttonbar pull-right">
            <div class="submit"><button type="submit" id="submit_save" name="submit_save"  class="btn waves-effect waves-light btn-success mr-right" >Edit</button><button type="button" id="submit_cancel" name="submit_cancel" onclick="FORM.cancel()" class="btn waves-effect waves-light btn-danger">Cancel</button></div>
        </div>
    </div>
    
</div> 
    </div>
        <?php echo e(Form::close()); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('customscript'); ?>
<script src="<?php echo e(asset('js/dibcustom/dib-policy-add.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
<script>

                                $(function () {

                                    var dibpolicyAddObj = new DibPolicyAdd();
                                    dibpolicyAddObj.initialSetting();





                                });
</script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.elite_fullwidth',['sidemenustatus' => array(),'countDetails'=>array(),'notificationCount'=>array() ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Policy/editCoverageForm.blade.php ENDPATH**/ ?>