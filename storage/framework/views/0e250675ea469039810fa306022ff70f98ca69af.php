
<?php echo e(Form::open(array('route' => array('customerdocdetailedit', $customerId,$documentId), 'name' => 'form_document_edit','id'=>'form_document_edit','files'=>'true' ))); ?>

    <?php echo csrf_field(); ?>    
    <div class="dialogform"><table class="insly_dialogform">
                <tbody>                    
                    <tr id="field_documenttype_oid" class="field ">
                        <td class="">
                            <div class="label ">
                                <span class="text-danger "></span>
                                <span class="title">Type</span>
                            </div>
                        </td>
                        <td>
                            <div class="element">
                             <?php echo e(Form::select('documenttype_oid',[''=>'--- other ---'] +  $documentType, $documentdata->type,array('id' =>'documenttype_oid','required'=>'required','class'=>'required','error-message' =>"Gender field is mandatory" ))); ?>  
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
                                <input type="text" id="document_comment" name="document_comment" value="<?php echo e($documentdata->comment); ?>" autocomplete="off" maxlength="255">
                            </div>
                        </td>
                    </tr>
                    

                </tbody></table></div>
    <?php echo e(Form::close()); ?>

<script>
        


</script>
<?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/customer/editDocument.blade.php ENDPATH**/ ?>