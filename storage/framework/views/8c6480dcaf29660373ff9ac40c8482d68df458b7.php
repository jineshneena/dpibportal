<?php $__env->startSection('content'); ?>
<?php echo e(Form::open(array('route' => array('savenewendorsementcrmrequest'), 'name' => 'form_endorsement_request_create','id'=>'form_endorsement_request_create','files'=>'true' ))); ?>

    <?php echo csrf_field(); ?>    
    <div class="dialogform"><table class="insly_dialogform">
                <tbody>                    
                    <tr id="field_request_type" class="field">
                        <td class="">
                            <div class="label ">
                                <span class="text-danger "></span>
                                <span class="title">Type</span>
                            </div>
                        </td>
                        <td>
                            
                            <div class="element">
                             <?php echo e(Form::select('request_type',  $typeArray, '',array('id' =>'request_type','required'=>'required','class'=>'required form-control','error-message' =>"Gender field is mandatory" ))); ?>  
                            </div>
                        </td>
                    </tr>
                    
                    <tr id="field_request_type" class="field">
                        <td class="">
                            <div class="label ">
                                <span class="text-danger "></span>
                                <span class="title">Customer</span>
                            </div>
                        </td>
                        <td>
                            
                            <div class="element">
                             <?php echo e(Form::select('request_customer',[''=>'---Select customer---'] + $customers, '',array('id' =>'request_customer','required'=>'required','class'=>'required form-control' ,'error-message' =>"Customer field is mandatory" ))); ?>  
                            </div>
                        </td>
                    </tr>
                    
                    
                       <tr id="field_request_type" class="field">
                        <td class="">
                            <div class="label ">
                                <span class="text-danger "></span>
                                <span class="title">Policy number</span>
                            </div>
                        </td>
                        <td>
                            
                            <div class="element">
                                <select id="request_policy" name="request_policy" selected_id="" class="form-control required" required="required" error-message ="Policy number is mandatory">
                             
                               <option value="" >--Select policy--</option>
                         
                                </select>
                                
                             
                            </div>
                        </td>
                    </tr>
                    
                    
                    <tr id="field_request_comment" class="field">
                        <td class="">
                            <div class="label ">
                                <span class="text-danger "></span>
                                <span class="title">Description</span>
                            </div>
                        </td>
                        <td>
                            <div class="element">
                                <textarea id="request_comment" name="request_comment"  autocomplete="off" maxlength="255" wrap="soft" rows="4" autocomplete="off" maxlength="255" class="form-control"></textarea>
                            </div>
                        </td>
                    </tr>
                    

                </tbody>
        </table>
    </div>
    
    <div class="buttonbar pull-right">
            <div class="submit"><button type="submit" id="submit_save" name="submit_save" class="btn waves-effect waves-light btn-rounded btn-success" >Add</button><button type="button" id="submit_cancel" name="submit_cancel" onclick="FORM.cancel()" class="btn waves-effect waves-light btn-rounded btn-danger">Cancel</button></div>
        </div>
    <?php echo e(Form::close()); ?>

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('pagescript'); ?> 
    <script>
    $(function(){
            $(document).off('change','#request_customer');
                        $(document).on('change','#request_customer',function(){                            
                           $.ajax({
                                 url: "<?php echo route('clientpolicies'); ?>",
                                  headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                 type: "post",
                                 data:{'customer_id':$(this).val(),'selectedoption':''}

                               }).done(function (data) {
                                   if(data.status) {
                                     $("#request_policy").empty().html(data.optionstring);
                                   }
                                       
                                  }); 
              
                        });

      
              
        
        
    })
    
    
    
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.elite_fullwidth',['notificationCount'=>0 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Endorsement/newendorsementrequest.blade.php ENDPATH**/ ?>