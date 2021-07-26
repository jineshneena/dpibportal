<?php $__env->startSection('content'); ?>

<div class="row col-12 dpib-custom-form">



    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-body" style="margin:50px">
                                     <div class="panel-heading">
            
            <ul class="panel-actions list-inline pull-right">
               
                <li class="dib_add_accounting_period"><button type="button" class="btn btn-success btn-rounded"><i class="fas fa-plus"></i> Add year</button></li>
                 

            </ul>
                   
                            <h3 class="panel-title">Accounting period</h3>
                                     </div>
                    
                    <form method="POST" action="<?php echo e(route('savefinanceperiods')); ?>" >
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <div class="col-md-4"></div>
                         <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Year</label>
                                                   <?php if(count($yearArray) > 0): ?>
                                                    <select class="form-control custom-select dpib_year_change" data-placeholder="Choose a year" tabindex="1" name="selectedyear">
                                                        <?php $__currentLoopData = $yearArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                         <option value="<?php echo e($year->period_year); ?>" <?php if($selectedperiod ==$year->period_year): ?> selected <?php endif; ?>><?php echo e($year->period_year); ?></option>
                                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                   
                                                   <?php else: ?>
                                                   <select class="form-control custom-select" data-placeholder="Choose a year" tabindex="1" name="selectedyear">
                                                        <option value="<?php echo e(date('Y')); ?>" selected><?php echo e(date('Y')); ?></option>
                                                       
                                                    </select>
                                                   <?php endif; ?>
                                                </div>
                                            </div>
                            <div class="col-md-4"></div>
                        
                         </div>

                        
                        
             <div class="form-group row" id="dib_account_period_lock_area">            
<?php $__currentLoopData = $periods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$period): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                       
                        
                            
                            <div class="custom-control custom-switch col-md-2" style="margin-bottom:30px">
                                  <input type="checkbox" class="custom-control-input" id="customSwitch<?php echo e($period->period_month); ?>" name="monthSelection[<?php echo e($period->period_month); ?>]" <?php if($period->period_status ==1): ?>   checked <?php endif; ?>>
                                         <label class="custom-control-label" for="customSwitch<?php echo e($period->period_month); ?>"><?php echo e($months[$period->period_month]); ?> <?php if($period->period_status ==1): ?> <span class="text-danger">(Closed)</span>  <?php else: ?> <span class="text-success">(Opened)</span>   <?php endif; ?></label>
                                </div>
                              
                        

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
            

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Update')); ?>

                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
    

   

    
    <?php $__env->stopSection(); ?>
    
    <?php $__env->startSection('pagescript'); ?>
    <script>
    $(function() {
       $(document).on("click",".dib_add_accounting_period",function(){
            $(".preloader").show(); 
                    $.ajax({
                                                    url: "<?php echo route('addaccountingyear'); ?>",
                                                            type: "GET",
                                                            

                                                    }).done(function (data) {
                                                    if (data.status) {
               $(".preloader").hide();                                          
        window.location.replace(data.returnUrl);
                                                    }
                                                    });
           
       }); 
       
      $(document).on("change",".dpib_year_change",function(){
            $(".preloader").show(); 
            
                    $.ajax({
                                                    url: "<?php echo route('getperioddetails'); ?>",
                                                            type: "GET",
                                                            data :{'selectedYear':$(".dpib_year_change").val()}

                                                    }).done(function (data) {
                                                    if (data.status) {
                                                
$('#dib_account_period_lock_area').html('');
$('#dib_account_period_lock_area').html(data.returnHtml);
 $(".preloader").hide(); 
                                                    }
                                                    });
           
       });  
       
    })
    </script>
     <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.elite' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Settings/financeperiod.blade.php ENDPATH**/ ?>