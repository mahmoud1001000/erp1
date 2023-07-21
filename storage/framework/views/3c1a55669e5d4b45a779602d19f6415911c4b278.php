<?php $__env->startSection('title', __( 'tax_rate.tax_rates' )); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get( 'tax_rate.tax_rates' ); ?>
        <small><?php echo app('translator')->get( 'tax_rate.manage_your_tax_rates' ); ?></small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __( 'tax_rate.all_your_tax_rates' )]); ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tax_rate.create')): ?>
            <?php $__env->slot('tool'); ?>
                <div class="box-tools">
                    <button type="button" class="btn btn-block btn-primary btn-modal" 
                            data-href="<?php echo e(action('TaxRateController@create'), false); ?>" 
                            data-container=".tax_rate_modal">
                            <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></button>
                </div>
            <?php $__env->endSlot(); ?>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tax_rate.view')): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="tax_rates_table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get( 'tax_rate.name' ); ?></th>
                            <th><?php echo app('translator')->get( 'tax_rate.rate' ); ?></th>
                            <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                        </tr>
                    </thead>
                </table>
            </div>
        <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get( 'tax_rate.tax_groups' ); ?> ( <?php echo app('translator')->get('lang_v1.combination_of_taxes'); ?> ) <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.tax_groups') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
        <?php $__env->endSlot(); ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tax_rate.create')): ?>
            <?php $__env->slot('tool'); ?>
                <div class="box-tools">
                    <button type="button" class="btn btn-block btn-primary btn-modal" 
                    data-href="<?php echo e(action('GroupTaxController@create'), false); ?>" 
                    data-container=".tax_group_modal">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></button>
                </div>
            <?php $__env->endSlot(); ?>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tax_rate.view')): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="tax_groups_table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get( 'tax_rate.name' ); ?></th>
                            <th><?php echo app('translator')->get( 'tax_rate.rate' ); ?></th>
                            <th><?php echo app('translator')->get( 'tax_rate.sub_taxes' ); ?></th>
                            <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                        </tr>
                    </thead>
                </table>
            </div>
        <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>
    
    <div class="modal fade tax_rate_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade tax_group_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/tax_rate/index.blade.php ENDPATH**/ ?>