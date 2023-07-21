<?php $__env->startSection('title', __( 'unit.units' )); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get( 'unit.units' ); ?>
        <small><?php echo app('translator')->get( 'unit.manage_your_units' ); ?></small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __( 'unit.all_your_units' )]); ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('unit.create')): ?>
            <?php $__env->slot('tool'); ?>
                <div class="box-tools">
                    <button type="button" class="btn btn-block btn-primary btn-modal" 
                        data-href="<?php echo e(action('UnitController@create'), false); ?>" 
                        data-container=".unit_modal">
                        <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></button>
                </div>
            <?php $__env->endSlot(); ?>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('unit.view')): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="unit_table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get( 'unit.name' ); ?></th>
                            <th><?php echo app('translator')->get( 'unit.short_name' ); ?></th>
                            <th><?php echo app('translator')->get( 'unit.allow_decimal' ); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.unit_allow_decimal') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                            <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                        </tr>
                    </thead>
                </table>
            </div>
        <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="modal fade unit_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/unit/index.blade.php ENDPATH**/ ?>