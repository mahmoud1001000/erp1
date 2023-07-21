<?php $__env->startSection('title', __('lang_v1.types_of_service')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get( 'lang_v1.types_of_service' ); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.types_of_service_help_long') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
        <?php $__env->slot('tool'); ?>
            <div class="box-tools">
                <button type="button" class="btn btn-block btn-primary btn-modal" 
                    data-href="<?php echo e(action('TypesOfServiceController@create'), false); ?>" 
                    data-container=".type_of_service_modal">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></button>
            </div>
        <?php $__env->endSlot(); ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('brand.view')): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="types_of_service_table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get( 'tax_rate.name' ); ?></th>
                            <th><?php echo app('translator')->get( 'lang_v1.description' ); ?></th>
                            <th><?php echo app('translator')->get( 'lang_v1.packing_charge' ); ?></th>
                            <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                        </tr>
                    </thead>
                </table>
            </div>
        <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="modal fade type_of_service_modal contains_select2" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/types_of_service/index.blade.php ENDPATH**/ ?>