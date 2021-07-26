<?php $__env->startSection('content'); ?>
<?php if($errormessage = Session::get('error')): ?>
<div class='alert alert-danger alert-block'>
    <button type='button' class='close' data-dismiss='alert'>*</button>
    <strong><?php echo e($errormessage); ?></strong>
</div>
<?php endif; ?>

<form class="form-horizontal form-material text-center" id="loginform" action="<?php echo e(route('checklogin')); ?>" method="post">
      <?php echo csrf_field(); ?>
                    <a href="javascript:void(0)" class="db"><img src="<?php echo e(asset('elitedesign/assets/images/graylogo.png')); ?>" alt="Home" style='height:75px'/></a>
                    <div class="form-group m-t-40">
                        <div class="col-xs-12">
                            <input id="email" type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus placeholder="Username">

                                <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input id="password" type="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" required autocomplete="current-password" placeholder="Password">

                                <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div class="custom-control custom-checkbox">
                                   
                                    <input class="custom-control-input" id="customCheck1" type="checkbox" name="remember"  <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                                </div> 
                                
                            </div>   
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase btn-rounded" type="submit"><?php echo e(__('Login')); ?></button>
                        </div>
                    </div>
                    
                   
                </form>
<?php $__env->stopSection(); ?>








<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp_new\htdocs\inslyportal\resources\views/login.blade.php ENDPATH**/ ?>