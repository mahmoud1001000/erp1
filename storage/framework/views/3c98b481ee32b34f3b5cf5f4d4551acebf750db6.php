<?php $__env->startSection('title', __('manufacturing::lang.production')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('manufacturing::lang.production'); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
        <?php $__env->slot('tool'); ?>
            <div class="box-tools">
                <a class="btn btn-block btn-primary" href="<?php echo e(action('\Modules\Manufacturing\Http\Controllers\ProductionController@create'), false); ?>">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></a>
            </div>
        <?php $__env->endSlot(); ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="productions_table">
                 <thead>
                    <tr>
                        <th><?php echo app('translator')->get('messages.date'); ?></th>
                        <th><?php echo app('translator')->get('purchase.ref_no'); ?></th>
                        <th><?php echo app('translator')->get('purchase.location'); ?></th>
                        <th><?php echo app('translator')->get('sale.product'); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.quantity'); ?></th>
                        <th><?php echo app('translator')->get('manufacturing::lang.total_cost'); ?></th>
                        <th><?php echo app('translator')->get('messages.action'); ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    <?php echo $__env->renderComponent(); ?>
</section>
<!-- /.content -->
<div class="modal fade" id="recipe_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <?php echo $__env->make('manufacturing::layouts.partials.common_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Manufacturing/Providers/../Resources/views/production/index.blade.php ENDPATH**/ ?>