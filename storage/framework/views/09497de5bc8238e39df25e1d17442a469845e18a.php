<?php $__env->startSection('content'); ?>

    <div class="row col-12 dpib-custom-form">
        <div class="col-md-12">
            <div class="card">
                      <div class="card-body">

                       <?php echo e(Form::open(array('route' => array('comparisonpdfdoc',$customerId, $crmId), 'name' => 'form_comparison_pdf_doc','id'=>'form_comparison_pdf_doc','class'=>'form_comparison_pdf_doc' ) )); ?>


 <?php echo csrf_field(); ?>

                    <div class="insly-form">

 <div class="panel panel-default panel-dark">
                            <div class="panel-heading" id="fieldgroup_title_contactinfo">
                                <!-- <div class="blocktitle"> -->
                                <h3 class="panel-title">Insurance Companies</h3>       
                                <!-- </div> -->
                            </div>
                            <div class="panel-body" id="fieldgroup_contactinfo">
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
              </td></tr></tbody></table> 
                            </div>
                        </div>










                        

<div class="panel panel-default panel-dark">
                            <div class="panel-heading" id="fieldgroup_title_contactinfo">
                                <!-- <div class="blocktitle"> -->
                                <h3 class="panel-title">Category count info</h3>       
                                <!-- </div> -->
                            </div>
                            <div class="panel-body" id="fieldgroup_contactinfo">
                                <table class="insly-form panel-body mt-sm-2 mt-lg-4 mt-md-2" style="margin-top: 20px" id='dpib_installment_table'>
    <tbody>
                
                                                                <tr class="installmentschedulerow" style="height: 30px">
                                                                    <th style="font-weight: bold"></th>
                                                                <?php $__currentLoopData = $categoryclasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <th style=" text-align: left; font-weight: bold"><?php echo e($category); ?></th>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                   
                                                                </tr>
                                                            
                                                                <tr class="field installmentschedulerow">
                                                                    <td>
                                                                       
                                                                        <div class="label">Employee:</div>
                                                                    </td>
                                                                     <?php $__currentLoopData = $categoryclasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                      <td class="element" style="text-align: center"><input type="text" autocomplete="off" class="form-control" maxlength="25" id="countDetails_employee_<?php echo e($category); ?>" name="countDetails[employee][<?php echo e($category); ?>]" value="0"></td>
                                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                   

                                                                </tr>


                                                                 <tr class="field installmentschedulerow">
                                                                    <td>
                                                                       
                                                                        <div class="label">Spouse:</div>
                                                                    </td>
                                                                    <?php $__currentLoopData = $categoryclasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                      <td class="element" style="text-align: center"><input type="text" autocomplete="off" class=" form-control" maxlength="25" id="countDetails_spouse_<?php echo e($category); ?>" name="countDetails[spouse][<?php echo e($category); ?>]" value="0"></td>
                                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    
                                                                    

                                                                </tr>

                                                                 <tr class="field installmentschedulerow">
                                                                    <td>
                                                                        <div class="label">Child:</div>
                                                                    </td>
                                                                    <?php $__currentLoopData = $categoryclasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                      <td class="element" style="text-align: center"><input type="text" autocomplete="off" class=" form-control" maxlength="25" id="countDetails_child_<?php echo e($category); ?>" name="countDetails[child][<?php echo e($category); ?>]" value="0"></td>
                                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    

                                                                </tr>

                                                                <tr class="field installmentschedulerow">
                                                                    <td>
                                                                       
                                                                        <div class="label">Senior (65+):</div>
                                                                    </td>
                                                                   <?php $__currentLoopData = $categoryclasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                      <td class="element" style="text-align: center"><input type="text" autocomplete="off" class=" form-control" maxlength="25" id="countDetails_senior_<?php echo e($category); ?>" name="countDetails[senior][<?php echo e($category); ?>]" value="0"></td>
                                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                </tr>
                                                            
                                                            
    </tbody>
            </table> 
                            </div>
                        </div>

                       
    <div id='company_category_premium_details'>
     


    </div>            

             <div class="buttonbar pull-right" >
                            <div class="submit"><button type="submit" id="submit_save" name="submit_save" class="btn waves-effect waves-light btn-rounded btn-success">Create</button><button type="button" id="submit_cancel" class="btn waves-effect waves-light btn-rounded btn-danger" name="submit_cancel" onclick="FORM.cancel()">Cancel</button></div>
                        </div>             



                        
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>

<script id='company_category_premium_template' type='text/template'>

 
<% _.each(companies, function(result, index) { %>

 <div class="panel panel-default panel-dark">
                            <div class="panel-heading" id="fieldgroup_title_contactinfo">
                                <!-- <div class="blocktitle"> -->
                                <h3 class="panel-title">Category premium (<%= result  %>)</h3>       
                                <!-- </div> -->
                            </div>
                            <div class="panel-body" id="fieldgroup_contactinfo">
                                <table class="insly-form panel-body mt-sm-2 mt-lg-4 mt-md-2" style="margin-top: 20px" id='dpib_installment_table'>
    <tbody>
                <input type="hidden" name="company[<%= index %>]" value="<%= result %>">
                                                                <tr class="installmentschedulerow" style="height: 30px">
                                                                    <th style="font-weight: bold"></th>
                                                                 <?php $__currentLoopData = $categoryclasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <th style=" text-align: left; font-weight: bold"><?php echo e($category); ?></th>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    
                                                                   
                                                                </tr>
                                                            
                                                                <tr class="field installmentschedulerow">
                                                                    <td>
                                                                       
                                                                        <div class="label">Employee:</div>
                                                                    </td>
                                                                    <?php $__currentLoopData = $categoryclasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                      <td class="element" style="text-align: center"><input type="text" autocomplete="off" class=" form-control" maxlength="25" id="premium_employee_<%= index %>_<?php echo e($category); ?>" name="premium[employee][<%= index %>][<?php echo e($category); ?>]" value=""></td>
                                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                </tr>


                                                                 <tr class="field installmentschedulerow">
                                                                    <td>
                                                                       
                                                                        <div class="label">Spouse:</div>
                                                                    </td>
                                                                    <?php $__currentLoopData = $categoryclasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                      <td class="element" style="text-align: center"><input type="text" autocomplete="off" class=" form-control" maxlength="25" id="premium_spouse_<%= index %>_<?php echo e($category); ?>" name="premium[spouse][<%= index %>][<?php echo e($category); ?>]" value=""></td>
                                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                </tr>

                                                                 <tr class="field installmentschedulerow">
                                                                    <td>
                                                                       
                                                                        <div class="label">Child:</div>
                                                                    </td>
                                                                    <?php $__currentLoopData = $categoryclasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                      <td class="element" style="text-align: center"><input type="text" autocomplete="off" class=" form-control" maxlength="25" id="premium_child_<%= index %>_<?php echo e($category); ?>" name="premium[child][<%= index %>][<?php echo e($category); ?>]" value=""></td>
                                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                </tr>

                                                                <tr class="field installmentschedulerow">
                                                                    <td>
                                                                       
                                                                        <div class="label">Senior (65+):</div>
                                                                    </td>
                                                                     <?php $__currentLoopData = $categoryclasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                      <td class="element" style="text-align: center"><input type="text" autocomplete="off" class=" form-control" maxlength="25" id="premium_senior_<%= index %>_<?php echo e($category); ?>" name="premium[senior][<%= index %>][<?php echo e($category); ?>]" value=""></td>
                                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                </tr>
                                                            
                                                            
    </tbody>
            </table> 
                            </div>
                        </div>


<% }); %>




</script>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>


<script>
   
   $(function(){

     $(document).on('click','#insurance_company',function(){
             var template = _.template($("#company_category_premium_template").html());
             var data = {'companies':$(this).val()};
             var result = template(data);
             $("#company_category_premium_details").html("");
             $("#company_category_premium_details").html(result);
             

     });

   })
   

</script>
<?php $__env->stopSection(); ?>












<?php echo $__env->make('layouts.elite_fullwidth',['sidemenustatus' => array(),'countDetails'=>array(),'notificationCount'=>array() ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/comparison/comparisonform.blade.php ENDPATH**/ ?>