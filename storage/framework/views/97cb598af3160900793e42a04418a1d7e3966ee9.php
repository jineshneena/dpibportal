<div class="panel-heading"><h3 class="panel-title"><?php echo e($formtitle); ?></h3></div>
<div class="panel-body" id="fieldgroup_5dac3deae429d">
    <table class="insly-form">  
        <tbody><tr id="field_5dac3deae429d_prop_policysummary" class="field ">
                <td class="">
                    <div class="label ">
                        <span class="text-danger icon-asterix"></span>
                        <span class="title">COMMERCIAL REGISTRATION</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <input type="text" id="product_coverage" name="product_commercial_registration" value="<?php echo e(isset($productData->commercial_registration) ? $productData->commercial_registration : ''); ?>" autocomplete="off" maxlength="255" class='form-control'>
                    </div>
                </td>
            </tr>
            <tr id="field_5dac3deae429d_prop_policyinfo" class="field ">
                <td class="">
                    <div class="label full-height" >
                        <span class="text-danger "></span>
                        <span class="title">NUMBER OF MEMBERS</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                       <input type="text" id="product_no_of_members" name="product_no_of_members" value="<?php echo e(isset($productData->no_of_members) ? $productData->no_of_members : ''); ?>" autocomplete="off" maxlength="255" class='form-control required' error-message="Number of member field is mandatory">
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Policy/medicalinsuranceproductfieldstplform.blade.php ENDPATH**/ ?>