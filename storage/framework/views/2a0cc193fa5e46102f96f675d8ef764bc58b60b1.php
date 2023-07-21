
<?php $__env->startSection('title', __('lang_v1.register')); ?>

<?php $__env->startSection('content'); ?>
    <style>
.div-content{
    background-color: white;
    padding-right: 15px;
    padding-left: 15px;
    padding-top: 10px;
    padding-bottom: 15px;
    border-radius: 10px;
    margin-top: 20px;
}
        .div-content-titel{
            text-align: center;
            font-size: 24px;
            border-bottom: 2px solid;
            margin-bottom: 25px;
            margin-top: 25px;
        }
    </style>
<div style=" max-width: 800px;margin: auto; margin-top: 30px;">

    <p class="form-header text-white"><?php echo app('translator')->get('business.register_and_get_started_in_minutes'); ?></p>
    <?php echo Form::open(['url' => route('business.postRegister'), 'method' => 'post', 'id' => 'business_register_form','files' => true ]); ?>


        <?php echo $__env->make('business.partials.register_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo Form::hidden('package_id', $package_id); ?>


    <div class="form-group"  style="width: 100%;text-align: center;margin-top: -10px;background-color: white;padding-bottom: 10px;padding-top: 20px;border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
        <button type="submit" class="btn btn-primary btn-flat btn-login" style="border-radius: 10px;height: 50px;font-size: 19px;"><?php echo app('translator')->get('lang_v1.register'); ?></button>

    </div>



    <?php echo Form::close(); ?>

</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#change_lang').change( function(){
            window.location = "<?php echo e(route('business.getRegister'), false); ?>?lang=" + $(this).val();
        });
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth2_old', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u373816316/domains/erp4anyone.com/public_html/4any/resources/views/business/register.blade.php ENDPATH**/ ?>