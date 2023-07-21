<?php $__env->startSection('title', __('lang_v1.reset_password')); ?>

<?php $__env->startSection('content'); ?>

<div class="login-form " style="max-width: 350px;background-color: white;margin: auto;margin-top: auto;margin-top: 40px;padding: 20px;border-radius: 10px;">
    <div style="text-align: center;
                    color: #FFF;
                    background-color: #31313C;
                   margin: -20px -20px 30px -20px;
                    border-radius: 10px 10px 0px 0px;
                    padding-top: 1px;
                    padding-bottom: 15px;">

        <h3 style="color: #FFFFFF"><?php echo e(env('APP_TITLE','AZHA-ERP'), false); ?></h3>

    </div>

    <form  method="POST" action="<?php echo e(route('password.email'), false); ?>">
        <?php echo e(csrf_field(), false); ?>

         <div class="form-group has-feedback <?php echo e($errors->has('email') ? ' has-error' : '', false); ?>">
            <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email'), false); ?>" required autofocus placeholder="<?php echo app('translator')->get('lang_v1.email_address'); ?>">
            <span class="fa fa-envelope form-control-feedback"></span>
            <?php if($errors->has('email')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('email'), false); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-flat btn-login" style="border-radius: 10px;height: 45px;font-size: 17px;"> <?php echo app('translator')->get('lang_v1.send_password_reset_link'); ?></button>

        </div>

    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth2_old', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u373816316/domains/erp4anyone.com/public_html/4any/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>