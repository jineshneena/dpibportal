<?php $__env->startSection('headtitle'); ?>
Profile
<?php $__env->stopSection(); ?>




<?php $__env->startSection('content'); ?>
<div class="row">
    <!-- Column -->
 <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
         
                  
                       <center class="m-t-30"> 
                           
                           <?php if( $details->type ==1): ?>
                           <img src="<?php echo e(asset('Images/defaultcompany.png')); ?>" class="img-circle" width="150">
                          <?php else: ?>
                          <img src="<?php echo e(asset('Images/avatar.jpg')); ?>" class="img-circle" width="150">
                          <?php endif; ?>
                                    <h4 class="card-title m-t-10"><?php echo e($details->name); ?></h4>
                                    
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"></div>
                                        <div class="col-4"></div>
                                    </div>
                                </center>     
                         
                         
                    
                   
               
            </div>
           
        </div>
    </div>
    <!-- Column -->
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Info</h4>
                 <div class="d-flex no-block align-items-center m-t-20 m-b-30">
                  
                       <table class="table table-striped dpib_policy_list color-table info-table" style='width:100%;'>
              
                    <tbody>
                        <tr>
                            <td>User name</td>
                            <td><?php echo e(Auth::user()->name); ?></td>
                        </tr>
                        <tr>
                            <td>User email</td>
                            <td><?php echo e(Auth::user()->email); ?></td>
                        </tr>
                        <tr>
                            <td>Company name</td>
                            <td><?php echo e($details->name); ?></td>
                        </tr>
                        <tr>
                            <td>Customer code/Id code</td>
                            <td><?php echo e($details->customer_code); ?></td>
                        </tr>
                        <tr>
                            <td>Active from</td>
                            <td><?php echo e(date("Y-m-d",strtotime( Auth::user()->created_at ))); ?></td>
                        </tr>
                        
                        <tr>
                            <td>Address</td>
                            <td><?php echo e($details->building_no); ?> <?php echo e($details->street_name); ?> <?php echo e($details->district_name); ?><br />
                            <?php echo e($details->city_name); ?>  <?php echo e($details->zip_code); ?> <?php echo e($details->additional_no); ?>  <br />
                            <?php echo e($details->unit_no); ?>

                           </td>
                        </tr>
                         
                        
                   </tbody>
                </table>      
                         
                         
                    
                   
                </div>
            </div>
            <div id="sparkline8" class="sparkchart"></div>
        </div>
    </div>
    <!-- Column -->

<div class="col-lg-6 col-sm-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Company contact details</h4>

                <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                 <table class="table table-striped dpib_policy_list color-table info-table" style='width:100%;'>
              
                    <tbody>
                        <tr>
                            <td>Contact person</td>
                            <td><?php echo e($details->person_name); ?></td>
                        </tr>
                        <tr>
                            <td>Person title</td>
                            <td><?php echo e($details->person_title); ?></td>
                        </tr>
                        <tr>
                            <td>Mobile</td>
                            <td><?php echo e($details->contactPhone); ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo e($details->contactEmail); ?></td>
                        </tr>
                        <tr>
                            <td>Website</td>
                            <td><?php echo e($details->website); ?></td>
                        </tr>
                        <tr>
                            <td>Prefered communication type</td>
                            <td><?php echo e($details->prefered_communication_type); ?></td>
                        </tr>
                    
                         <tr>
                             <td style='border:none;background-color:#fff'>&nbsp;<br /></td>
                             <td style='border:none;background-color:#fff'>&nbsp;<br /></td>
                        </tr>
                       
                        
                        
                   </tbody>
                </table>
                </div>
            </div>
             <div id="sparkline8" class="sparkchart"></div>
        </div>
    </div>
    
    <!-- Column -->
    <!-- Column -->

    <!-- Column -->
</div>









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
<script src="<?php echo e(asset('js/dibcustom/dib-quote-request.js')); ?>" type="text/javascript"></script>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('pagescript'); ?>

<script>

      var roleArray = <?php echo json_encode(Auth::user()->roles, 15, 512) ?>;
    $(function(){
        
        
    

    
    
    
       
   });

</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.elite_client' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Client/profile.blade.php ENDPATH**/ ?>