           
<?php $__currentLoopData = $periods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$period): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                       
                        
                            
                            <div class="custom-control custom-switch col-md-2" style="margin-bottom:30px">
                                  <input type="checkbox" class="custom-control-input" id="customSwitch<?php echo e($period->period_month); ?>" name="monthSelection[<?php echo e($period->period_month); ?>]" <?php if($period->period_status ==1): ?>   checked <?php endif; ?>>
                                         <label class="custom-control-label" for="customSwitch<?php echo e($period->period_month); ?>"><?php echo e($months[$period->period_month]); ?> <?php if($period->period_status ==1): ?> <span class="text-danger">(Closed)</span>  <?php else: ?> <span class="text-success">(Opened)</span>   <?php endif; ?></label>
                                </div>
                              
                        

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            

                       <?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/Settings/montwise_template.blade.php ENDPATH**/ ?>