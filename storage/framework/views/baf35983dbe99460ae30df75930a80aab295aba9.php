<?php $__env->startSection('headtitle'); ?>
 <?php echo e($headTitle); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row col-12 dpib-custom-form">
        <div class="col-md-12">
            <div class="card">
                      <div class="card-body">
                    <div class="insly-form">

                        <?php if(isset($customers)): ?>

                        <?php echo e(Form::open(array('route' => array('updatecustomerdata', $customers->customId),'name' => 'customerForm','id'=>'customerForm','class'=>'dpib-custom-form') )); ?>

                        <?php else: ?>
                        <?php echo e(Form::open(array('route' => 'savecustomer', 'name' => 'customerForm','id'=>'customerForm','class'=>'dpib-custom-form' ) )); ?>

                        <?php endif; ?>

                        <?php echo csrf_field(); ?>
                

                        <div class="panel panel-default panel-dark">
                            <div class="panel-heading" id="fieldgroup_title_customer">
                                <!-- <div class="blocktitle"> -->
                                <h3 class="panel-title">Customer</h3>							
                                <!-- </div> -->
                            </div>
                            <div class="panel-body" id="fieldgroup_customer">
                                <table class="insly-form">
                                    <tbody>
                                        <tr id="field_customer_type" class="field"><td class=""><div class="label"><span class="text-danger icon-asterix"></span><span class="title">Customer type</span></div></td>
                                            <td>
                                                 <div class="form-group" >
                                                   
                                                    <div class="custom-control custom-radio" style='min-height:0px;'>
                                                        <div style='float:left;margin-right:35px'> 
                                                         <?php
                                                        $checked = ''
                                                        ?>

                                                        <?php if(isset($customers->type) && $customers->type ==1): ?>
                                                        <?php
                                                        $checked = 'checked=checked';
                                                        ?>

                                                        <?php endif; ?>
                                                        <input type="radio" id="customer_type_11" name="customer_type" value="1" <?php echo e($checked); ?> class="get-outta-here dib_customer_type custom-control-input" data-default-value="0" >
                                                        <label class="custom-control-label" for="customer_type_11" style='line-height: 24px'>Company</label>
                                                        </div>
                                                        <div style='float:left'>
                                                        <?php
                                                        $checked = ''
                                                        ?>

                                                        <?php if(isset($customers->type) && $customers->type ==0): ?>
                                                        <?php
                                                        $checked = 'checked=checked';
                                                        ?> 
                                                        <?php endif; ?>
                                                        <input type="radio" id="customer_type_21" name="customer_type" value="0" <?php echo e($checked); ?> class="get-outta-here dib_customer_type custom-control-input" data-default-value="1" >
                                                        <label class="custom-control-label" for="customer_type_21" style='line-height: 24px'>Individual</label>
                                                        </div>
                                                    </div>
<!--                                                    <div class="custom-control custom-radio">
                                                         
                                                    </div>-->
                                                </div>
                                             </td>
                                        </tr>
                                        <tr id="field_customer_name" class="field"><td class=""><div class="label"><span class="text-danger icon-asterix"></span>Name</div></td>
                                            <td><div class="element"><input type="text" id="customer_name" name="customer_name" value="<?php echo e(isset($customers->customerName) ? $customers->customerName : ''); ?>"   autocomplete="off" maxlength="255" class="required form-control" required="required" error-message="Name field is mandatory"></div></td>
                                        </tr>
                                        <tr id="field_customer_idcode" class="field">
                                            <td class=""><div class="label"><span class="text-danger icon-asterix"></span><span class="title">ID code / reg no</span></div></td>
                                            <td><div class="element"><input type="text" id="customer_idcode" name="customer_idcode" value="<?php echo e(isset($customers->customer_code) ? $customers->customer_code : ''); ?>" autocomplete="off" maxlength="64" class="required form-control" required="required" error-message="Id code/Reg No field is mandatory"></div></td>
                                        </tr> 
                                        <tr id="field_customer_gender" class="field customertype customertype2" style="display: none;">
                                            <td class="">
                                                <div class="label">
                                                    <span class="text-danger icon-asterix"></span>
                                                    <span class="title">Gender</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="element">
                                                    <?php
                                                    $selected = '';
                                                    ?>

                                                    <?php if(isset($customers->gender) ): ?>
                                                    <?php
                                                    $selected = $customers->gender ;
                                                    ?>                                                            
                                                    <?php endif; ?>

                                                    <?php echo e(Form::select('customer_gender', array('' => '--- not entered ---','male' => 'male','female' => 'female'), $selected,array('id' =>'customer_gender','required'=>'required','class'=>'required form-control custom-select','error-message' =>"Gender field is mandatory" ))); ?>





                                                </div>
                                            </td>
                                        </tr>
             
                                        
                                          <tr id="field_customer_gender" class="field customertype" >
                                            <td class="">
                                                <div class="label">
                                                    <span class="text-danger icon-asterix"></span>
                                                    <span class="title">Sale person</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="element">
                                                    <?php
                                                    $selected = '';
                                                    ?>

                                                    <?php if(isset($customers->sales_person) ): ?>
                                                    <?php
                                                    $selected = $customers->sales_person ;
                                                    ?>                                                            
                                                    <?php endif; ?>

                                                    <?php echo e(Form::select('customer_sales_person', array('' => '--- not entered ---')+$salesperson, $selected,array('id' =>'customer_sales_person','required'=>'required','class'=>'required form-control custom-select','error-message' =>"Sales person field is mandatory" ))); ?>





                                                </div>
                                            </td>
                                        </tr>
        <tr id="field_customer_channel" class="field ">
                                            <td class="">
                                                <div class="label ">
                                                    <span class="text-danger "></span>
                                                    <span class="title">Channel</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="element">
                                                    <?php echo e(Form::select('customer_channel', $channelDetails, '',array('id' =>'customer_channel','class'=>'form-control custom-select required','error-message' =>"Channel field is mandatory"))); ?> 

                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="panel panel-default panel-dark">
                            <div class="panel-heading" id="fieldgroup_title_contactinfo">
                                <!-- <div class="blocktitle"> -->
                                <h3 class="panel-title">Contact info</h3>							
                                <!-- </div> -->
                            </div>
                            <div class="panel-body" id="fieldgroup_contactinfo">
                                <table class="insly-form">
                                    <tbody>
                                        <tr id="field_customer_email" class="field"><td class=""><div class="label"><span class="text-danger icon-asterix"></span><span class="title">E-mail address</span></div></td><td><div class="element">
                                                    <input type="text" id="customer_email" name="customer_email" value="<?php echo e(isset($customers->customerEmail) ? $customers->customerEmail : ''); ?>" autocomplete="off" maxlength="255" class="required form-control <?php if ($errors->has('customer_email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('customer_email'); ?> error <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" required error-message="Customer mail is mandatory"></div></td></tr><tr id="field_customer_phone" class="field"><td class=""><div class="label"><span class="text-danger icon-asterix"></span><span class="title">Phone</span></div></td><td><div class="element">
                                                    <input type="tel" id="customer_phone" name="customer_phone" value="<?php echo e(isset($customers->customerPhone) ? $customers->customerPhone : ''); ?>" autocomplete="off" maxlength="255" required class="required form-control" error-message="Customer phone is mandatory"></div></td></tr><tr id="field_customer_mobile" class="field"><td class=""><div class="label"><span class="text-danger icon-asterix"></span><span class="title">Mobile phone</span></div></td><td><div class="element">
                                                    <input type="text" id="customer_mobile" name="customer_mobile" value="<?php echo e(isset($customers->mobile) ? $customers->mobile : ''); ?>" autocomplete="off" maxlength="255" required class="required form-control" error-message="Customer mobile is mandatory"></div></td></tr>  
                                   

                                    </tbody>
                                </table>
                            </div>
                        </div>







                     


                        <div class="panel panel-default panel-dark" >
                            <div class="panel-heading custom-control custom-checkbox mr-sm-2 mb-3" id="fieldgroup_title_addperson">
                                 <div class="blocktitle"> 
                              <h3 class="panel-title fieldgroup-title-checkable" style='padding-top:0px'>Related customer</h3>
                              					
                                 </div> 
                            </div>
                            <div class="panel-body" id="fieldgroup_addperson" >
                                <table class="insly-form">
                                    <tbody>
                                        <tr id="field_customer_2_oid" class="field"><td class="">
                    <div class="label"><span class="text-danger icon-asterix"></span><span class="title">Related customer</span></div></td>
                <td><div class="element">
                        <?php echo e(Form::select('customer_id',  array('' => '--- not entered ---')+$customerDetails, '',array('name'=>'related_customer_id','id' =>'related_customer_id','class'=>'form-control custom-select','error-message' =>"Insurance company field is mandatory"))); ?>

                    </div>
                </td>
            </tr>   
            <tr id="field_customer_relation_type" class="field ">
                <td class="">
                    <div class="label ">
                        <span class="text-danger icon-asterix"></span>
                        <span class="title">Relation</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <select id="customer_relation_type" name="customer_relation_type" class='form-control custom-select'>
                            <option value="">--- select from here ---</option>
                           
                             <option value="group company">group company</option>
                            <option value="sister company">sister company</option>
                            <option value="manager/owner">manager/owner</option>
                            <option value="key employee">key employee</option>
                            <option value="other">other</option>

                        </select>


                    </div>
                </td>
            </tr>
            <tr id="field_customer_relation_description" class="field relationtype" style="display: table-row; overflow: hidden;">
                <td class="">
                    <div class="label ">
                        <span class="text-danger "></span>
                        <span class="title">Description</span>
                    </div>
                </td>
                <td>
                    <div class="element">
                        <input type="text" id="customer_relation_description" name="customer_relation_description" value="" autocomplete="off" class='form-control'>
                    </div>
                </td>
            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="buttonbar pull-right">
                            <div class="submit"><button type="button" id="submit_save" name="submit_save" class="btn waves-effect waves-light btn-rounded btn-success" ><?php echo e(isset($customers->customerName) ? 'Edit' : 'Add'); ?></button><button type="button" id="submit_cancel" class="btn waves-effect waves-light btn-rounded btn-danger" name="submit_cancel" onclick="FORM.cancel()">Cancel</button></div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>


<script>
   
   var selectedAddressType = []; 
    

   
    $(function () {

        
        
        $(document).on('click', 'input.dib_customer_type', function () {
            $("#field_customer_gender").hide();
            if ($(this).val() == 1) {
//                $("#dib_company_span").removeClass('icon-radio-empty').addClass('icon-radio');
//                $("#dib_individual_span").removeClass('icon-radio').addClass('icon-radio-empty');

            } else {
                $("#field_customer_gender").show();
//                $("#dib_individual_span").removeClass('icon-radio-empty').addClass('icon-radio');
//                $("#dib_company_span").removeClass('icon-radio').addClass('icon-radio-empty');
            }
        });

        $(document).on('click', '.dib_select_box', function () {
//            $("#broker_person_oid").show();
//            $("span.dib_select_box").hide();
//            if ($("#broker_person_oid_showall").is(':checked')) {
//                $("#broker_person_oid").html($("#broker_person_oid_fulllist").html());
//            } else
//            {
//                $("#broker_person_oid").html($("#broker_person_oid_shortlist").html());
//            }

        });


        $(document).on('click', '#addperson', function () {
            if ($(this).is(':checked')) {
                $('#fieldgroup_addperson').show();
            } else {
                $('#fieldgroup_addperson').hide();
            }

        });
        
        <?php if(isset($customers -> address_type) && $customers -> address_type !=''): ?>
           selectedAddressType = <?php echo json_decode(json_encode($customers -> address_type,true)); ?>;
        <?php endif; ?>

       if (_.includes(selectedAddressType, 'legal')) {
            $('tr input[type=checkbox][value=legal]').trigger('click');
        }
        if (_.includes(selectedAddressType, 'office')) {
          
        $('tr input[type=checkbox][value=office]').trigger('click');
        }
        if (_.includes(selectedAddressType, 'home')) {
            $('tr input[type=checkbox][value=home]').trigger('click');
        }
        if (_.includes(selectedAddressType, 'work')) {
            $('tr input[type=checkbox][value=work]').trigger('click');
        }
        if (_.includes(selectedAddressType, 'postal')) {
            $('tr input[type=checkbox][value=postal]').trigger('click');
        }

         <?php if(isset($customers -> person_name) && $customers -> person_name !=''): ?>
          $("input#addperson").trigger('click');   
         <?php endif; ?> 
         
         <?php if(isset($customers -> type) ): ?>
           $("input.dib_customer_type:checked").trigger('click');  
          <?php else: ?>
          $("#customer_type_11").prop('checked','checked');    
         <?php endif; ?>  
         
         
         $(document).on('click','#submit_save',function(e){
             
            var isValid = true;
         var errorMessage = "";
                var i=0;
                $(".required:visible").each(function(){                
                 if($(this).val()=='') {
                    isValid = false; 
                    $(this).addClass('form-control-danger');
                    $(this).parent('.element').addClass('has-danger')
                    if( i==0 ) {
                     errorMessage+="<b>The following errors occurred while validating data:"+"</b><br/>";
                     i++;
                    }
                    errorMessage+="<b>"+ $(this).attr('error-message')+"</b><br/>"
                  
                 } else {
                    $(this).removeClass('error'); 
                    $(this).removeClass('form-control-danger');
                    $(this).parent('.element').removeClass('has-danger')
                 }
                });
                if( !validateEmail($("#customer_email").val()) ) { 
                    isValid = false;
                    errorMessage += "<b> Email format is not correct</b><br/>";
                }

            if(isValid) {
              $("#customerForm").submit();
            } else {
              DIB.alert(errorMessage,'Error!!!!');    
            }
                    
         })
         
         
      
    })
    function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test( $email );
    }

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.elite_fullwidth',['sidemenustatus' => array(),'countDetails'=>array(),'notificationCount'=>array() ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/customer/createlead.blade.php ENDPATH**/ ?>