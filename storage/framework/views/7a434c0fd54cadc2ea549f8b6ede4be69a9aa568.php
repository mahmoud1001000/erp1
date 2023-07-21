<?php $__env->startSection('title', __('lang_v1.activity_log')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(__('lang_v1.activity_log'), false); ?></h1>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>

                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('al_users_filter', __( 'lang_v1.by' ) . ':'); ?>

                        <?php echo Form::select('al_users_filter', $users, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'al_users_filter', 'placeholder' => __('lang_v1.all')]); ?>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('subject_type', __( 'lang_v1.subject_type' ) . ':'); ?>

                        <?php echo Form::select('subject_type', $transaction_types, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'subject_type', 'placeholder' => __('lang_v1.all')]); ?>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('al_date_filter', __('report.date_range') . ':'); ?>

                        <?php echo Form::text('al_date_filter', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'readonly']); ?>

                    </div>
                </div>

            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="activity_log_table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('lang_v1.date'); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.subject_type'); ?></th>
                            <th><?php echo app('translator')->get('messages.action'); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.by'); ?></th>
                            <th><?php echo app('translator')->get('brand.note'); ?></th>
                        </tr>
                    </thead>
                </table>
            </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    $(document).ready( function(){
        $('#al_date_filter').daterangepicker(dateRangeSettings, function(start, end) {
            $('#al_date_filter').val(
                start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format)
            );
            activity_log_table.ajax.reload();
        });
        $('#al_date_filter').on('cancel.daterangepicker', function(ev, picker) {
            $('#al_date_filter').val('');
            activity_log_table.ajax.reload();
        });

        activity_log_table = $('#activity_log_table').DataTable({
            processing: true,
            serverSide: true,
            aaSorting: [[0, 'desc']],
            "ajax": {
                "url": '<?php echo e(action("ReportController@activityLog"), false); ?>',
                "data": function ( d ) {
                    var start_date = '';
                    var end_date = '';
                    if ($('#al_date_filter').val()) {
                        d.start_date = $('input#al_date_filter')
                            .data('daterangepicker')
                            .startDate.format('YYYY-MM-DD');
                        d.end_date = $('input#al_date_filter')
                            .data('daterangepicker')
                            .endDate.format('YYYY-MM-DD');
                    }

                    d.user_id = $('#al_users_filter').val();
                    d.subject_type = $('#subject_type').val();
                }
            },
            columns: [
                { data: 'created_at', name: 'created_at'  },
                { data: 'subject_type', "orderable": false, "searchable": false},
                { data: 'description', name: 'description'},
                { data: 'created_by', name: 'created_by'},
                { data: 'note', name: 'note'}
            ]
        });  

        $(document).on('change', '#al_users_filter, #subject_type', function(){
            activity_log_table.ajax.reload();
        })
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/report/activity_log.blade.php ENDPATH**/ ?>