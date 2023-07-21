<?php $__env->startSection('title', __('report.register_report')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(__('report.register_report'), false); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
              <?php echo Form::open(['url' => action('ReportController@getStockReport'), 'method' => 'get', 'id' => 'register_report_filter_form' ]); ?>

                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('register_user_id',  __('report.user') . ':'); ?>

                        <?php echo Form::select('register_user_id', $users, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('report.all_users')]); ?>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('register_status',  __('sale.status') . ':'); ?>

                        <?php echo Form::select('register_status', ['open' => __('cash_register.open'), 'close' => __('cash_register.close')], null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('report.all')]); ?>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('register_report_date_range', __('report.date_range') . ':'); ?>

                        <?php echo Form::text('register_report_date_range', null , ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'id' => 'register_report_date_range', 'readonly']); ?>

                    </div>
                </div>
                <?php echo Form::close(); ?>

            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="register_report_table">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('report.open_time'); ?></th>
                                <th><?php echo app('translator')->get('report.close_time'); ?></th>
                                <th><?php echo app('translator')->get('sale.location'); ?></th>
                                <th><?php echo app('translator')->get('report.user'); ?></th>
                                <th><?php echo app('translator')->get('cash_register.total_card_slips'); ?></th>
                                <th><?php echo app('translator')->get('cash_register.total_cheques'); ?></th>
                                <th><?php echo app('translator')->get('cash_register.total_cash'); ?></th>
                                <th><?php echo app('translator')->get('messages.action'); ?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
</section>
<!-- /.content -->
<div class="modal fade view_register" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/report.js?v=' . $asset_v), false); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/report/register_report.blade.php ENDPATH**/ ?>