<?php $__env->startSection('headtitle'); ?>
Customers
<?php $__env->stopSection(); ?>




<?php $__env->startSection('content'); ?>


  <div class="row mt-1 mb-4 ml-1">

<div id="filter-insly_customer" class="panel-filter open extend-filter col-md-12">
 				 <?php echo e(Form::open(array('route' => array('managementcustomerfilter'), 'name' => 'form_management_customer_filter','id'=>'form_management_customer_filter') )); ?>

                                    <?php echo csrf_field(); ?>
                                    <table class="table-filter filtersperrow4">
                                        <tbody>
                                            <tr>
                                                <td id="filter_customer_name" class=" filterlevel1"><div><label for="filter_customer_name">Name:</label><div><input type="text" autocomplete="off" id="filter_customer_name" name="filter_customer_name" value="<?php echo e(isset($formData['filtername']) ? $formData['filtername']:''); ?>" class=""></div></div></td>
                                                <td id="filter_customer_type" class="extend-filter filterlevel2"><div><label for="filter_customer_type">Customer type:</label><div><select id="filter_customer_type" name="filter_customer_type"><option value="">--- all ---</option><option value="1">company</option><option value="0">individual</option></select></div></div></td>
                                                <td id="filter_customergroup_oid" class="extend-filter filterlevel2"><div><label for="filter_customergroup_oid">Customer group:</label><div>
                                                            <?php echo e(Form::select('filter_customergroup_oid',[''=>'---- not set ----'] +   $usergroup, isset($formData['filtergroup']) ? $formData['filtergroup']:'' ,array('id' =>'filter_customergroup_oid',"error-message"=>'Account manager field is mandatory'))); ?> 
                                                            </div></div></td>
                                            </tr>

                                            <tr>
                                                <td colspan="4" class="panel-buttons"><button type="submit" id="submit_save" name="submit_save" class="submit_policy btn waves-effect waves-light btn-rounded btn-primary">Apply filters</button> <button type="button" id="mg_clear_filter" name="clear_filter" class="submit_policy btn waves-effect waves-light btn-rounded btn-primary">Clear filters</button>  </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php echo e(Form::close()); ?>

 			</div>


  </div>





<div class="row">          
          <?php $__currentLoopData = $customerDatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          
          <?php if($key % 3 ==0): ?>
          </div>
           <div class="row"> 
          <?php endif; ?>
          

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="ribbon-wrapper-reverse card">
                                    <?php
                                     $badgeColor = "ribbon-success";
                                     $customerStatus ='Active';
                                    ?>
                                    
                                    <?php if($customer->policyCount > 0): ?>
                                     <?php
                                     $badgeColor = "ribbon-success";
                                     $customerStatus ='Active';
                                    ?>
                                    
                                    
                                    <?php elseif($customer->policyCount == 0): ?>
                                    
                                     <?php
                                     $badgeColor="ribbon-danger";
                                     $customerStatus ='Inactive';
                                    ?>
                                         
                                    <?php endif; ?>
                                    
                                    <div class="ribbon  ribbon-right <?php echo $badgeColor; ?>"><?php echo e($customerStatus); ?></div>
                                    <h5 ><a href="<?php echo route('customeroverview',$customer->customId); ?>" style='font-size:1.5em'><b><?php echo e(ucfirst(trans($customer->name))); ?></b></a></h5>  
                                  <table style="width:100%">
                        <tbody>
                         <tr>
                            <td> Customer type</td><td><?php echo e(($customer->type==1) ? 'Company':'Individual'); ?></td>                            
                          </tr>
                     
                          <tr>
                            <td> Customer code</td><td><?php echo e(($customer->id_code !='') ? $customer->id_code:'-'); ?>  </td>
                          </tr>
                    
                          <tr>
                            <td> Customer group</td><td><?php echo e(($customer->customer_group !='') ? $customer->customer_group:'-'); ?> </td>
                          </tr>
                    

                          <tr>
                           <td> Phone</td><td> <?php echo e($customer->customerPhone); ?> </td>                            
                          </tr> 
                          <tr>
                            <td> Email</td><td><?php echo e($customer->customerEmail); ?></td>                            
                          </tr> 
                          <tr>
                            <td> Active policy count</td><td><?php echo e($customer->policyCount); ?></td>                            
                          </tr> 
                          <tr class="text-danger">
                            <td>
                                <?php if($customer->policyCount > 0): ?> Policy end date <?php endif; ?>  </td><td><?php if($customer->endpolicyId !='' && ($customer->policyCount > 0)): ?>
                                <a href='<?php echo route("policyoverview",$customer->endpolicyId); ?>'><?php echo e(date('d.m.Y',strtotime($customer->policyEnddate))); ?></a>
                                <?php endif; ?>
                            </td>
                          </tr> 
                         
                         
                        </tbody>
                                </table> 
                                </div>
                            </div>
          
          
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </div>
  
   <div class="row">
       <div class="col-12"  style="float:right"></div>
       <?php echo $customerDatas->links(); ?>

   </div> 


                     

<?php $__env->stopSection(); ?>

 <?php $__env->startSection('customcss'); ?>
  <link rel="stylesheet" type="text/css" href=" <?php echo e(asset('elitedesign/dist/css/pages/ribbon-page.css')); ?> ">
   
<?php $__env->stopSection(); ?>
          

  <?php $__env->startSection('customscript'); ?>
      <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo e(asset('elitedesign/dist/js/perfect-scrollbar.jquery.min.js')); ?>"></script>

    <!--stickey kit -->
    <script src="<?php echo e(asset('elitedesign/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js')); ?>"></script>
     <script src="<?php echo e(asset('elitedesign/assets/node_modules/sparkline/jquery.sparkline.min.js')); ?>"></script>
    <script src="<?php echo e(asset('elitedesign/assets/node_modules/raphael/raphael-min.js')); ?>"></script>
    <script src="<?php echo e(asset('elitedesign/assets/node_modules/morrisjs/morris.min.js')); ?>"></script>

    <!-- This is data table -->
    <script src="<?php echo e(asset('elitedesign/assets/node_modules/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('elitedesign/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js')); ?>"></script>
        <script src="<?php echo e(asset('elitedesign/assets/node_modules/skycons/skycons.js')); ?>"></script>
        <script src="<?php echo e(asset('js/dibcustom/dib_dashboard.js')); ?>"></script>
   
  <?php $__env->stopSection(); ?>






<?php $__env->startSection('pagescript'); ?>
<script>
    
 
   $(function(){

//Claims
    $(document).on('click','#mg_clear_filter',function(){
       window.location.href = "<?php echo route('managementdashboard'); ?>";

    })

   
    
    

   });


   


</script>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.elite',['notificationCount'=>0 ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Management/index.blade.php ENDPATH**/ ?>