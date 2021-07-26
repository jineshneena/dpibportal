
<?php echo e(Form::open(array('route' => array('generateBrokingSlip',$customerId, $crmId), 'name' => 'form_brokingslip_generation','id'=>'form_brokingslip_generation','files'=>'true' ))); ?>

<?php echo csrf_field(); ?>    
<div class="dialogform">
    <table class="insly_dialogform" id='brokenslip_creation_table'>
        <tbody>
            <tr id="field_documenttype_oid" class="field dp_main_tr">
                <td class="">
                    <div class="label ">
                        <span class="text-danger "></span>
                        <span class="title">Insurance company</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <?php echo e(Form::select('insurance_company',  $insuranceCompany, null,array('multiple'=>'multiple','name'=>'insurance_company[]','id' =>'insurance_company','required'=>'required','class'=>'required form-control','error-message' =>"Insurance company field is mandatory" ))); ?>  
                    </div>
                </td>
            </tr>
            <tr id="field_document_comment" class="field dp_main_tr">
                <td class="">
                    <div class="label ">
                        <span class="text-danger "></span>
                        <span class="title">Product</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <?php echo e(Form::select('insurance_product', [''=>'---Select product---']+$insuranceProduct, null,array('id' =>'insurance_product','required'=>'required','class'=>'required form-control','error-message' =>"Product field is mandatory",'openUrl'=> route("brokenslipfields",[$customerId,$crmId]) ))); ?>  
                    </div>
                </td>
            </tr>


        </tbody></table></div>
<?php echo e(Form::close()); ?>

<?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Brokenslip/mainpage.blade.php ENDPATH**/ ?>