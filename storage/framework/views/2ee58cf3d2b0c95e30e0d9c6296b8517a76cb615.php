<?php $__env->startSection('title', __('essentials::lang.leave')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('essentials::layouts.nav_hrm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="content-header">
    <h1><?php echo app('translator')->get('essentials::lang.leave'); ?>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
        <?php $__env->startComponent('components.filters', ['title' => __('report.filters'), 'class' => 'box-solid']); ?>
            <?php if(!empty($users)): ?>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('user_id_filter', __('essentials::lang.employee') . ':'); ?>

                    <?php echo Form::select('user_id_filter', $users, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

                </div>
            </div>
            <?php endif; ?>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="status_filter"><?php echo app('translator')->get( 'sale.status' ); ?>:</label>
                    <select class="form-control select2" name="status_filter" required id="status_filter" style="width: 100%;">
                        <option value=""><?php echo app('translator')->get('lang_v1.all'); ?></option>
                        <?php $__currentLoopData = $leave_statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key, false); ?>"><?php echo e($value['name'], false); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('leave_type_filter', __('essentials::lang.leave_type') . ':'); ?>

                    <?php echo Form::select('leave_type_filter', $leave_types, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('leave_filter_date_range', __('report.date_range') . ':'); ?>

                    <?php echo Form::text('leave_filter_date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'readonly']); ?>

                </div>
            </div>
        <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-solid', 'title' => __( 'essentials::lang.all_leaves' )]); ?>
                <?php $__env->slot('tool'); ?>
                    <div class="box-tools">
                        <button type="button" class="btn btn-block btn-primary btn-modal" data-href="<?php echo e(action('\Modules\Essentials\Http\Controllers\EssentialsLeaveController@create'), false); ?>" data-container="#add_leave_modal">
                            <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></button>
                    </div>
                <?php $__env->endSlot(); ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="leave_table">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get( 'purchase.ref_no' ); ?></th>
                                <th><?php echo app('translator')->get( 'essentials::lang.leave_type' ); ?></th>
                                <th><?php echo app('translator')->get('essentials::lang.employee'); ?></th>
                                <th><?php echo app('translator')->get( 'lang_v1.date' ); ?></th>
                                <th><?php echo app('translator')->get( 'essentials::lang.reason' ); ?></th>
                                <th><?php echo app('translator')->get( 'sale.status' ); ?></th>
                                <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row" id="user_leave_summary"></div>
</section>
<!-- /.content -->
<div class="modal fade" id="add_leave_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel"></div>

<?php echo $__env->make('essentials::leave.change_status_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            leaves_table = $('#leave_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "<?php echo e(action('\Modules\Essentials\Http\Controllers\EssentialsLeaveController@index'), false); ?>",
                    "data" : function(d) {
                        if ($('#user_id_filter').length) {
                            d.user_id = $('#user_id_filter').val();
                        }
                        d.status = $('#status_filter').val();
                        d.leave_type = $('#leave_type_filter').val();
                        if($('#leave_filter_date_range').val()) {
                            var start = $('#leave_filter_date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
                            var end = $('#leave_filter_date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
                            d.start_date = start;
                            d.end_date = end;
                        }
                    }
                },
                columnDefs: [
                    {
                        targets: 6,
                        orderable: false,
                        searchable: false,
                    },
                ],
                columns: [
                    { data: 'ref_no', name: 'ref_no' },
                    { data: 'leave_type', name: 'lt.leave_type' },
                    { data: 'user', name: 'user' },
                    { data: 'start_date', name: 'start_date'},
                    { data: 'reason', name: 'essentials_leaves.reason'},
                    { data: 'status', name: 'essentials_leaves.status'},
                    { data: 'action', name: 'action' },
                ],
            });

            $('#leave_filter_date_range').daterangepicker(
                dateRangeSettings,
                function (start, end) {
                    $('#leave_filter_date_range').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
                }
            );
            $('#leave_filter_date_range').on('cancel.daterangepicker', function(ev, picker) {
                $('#leave_filter_date_range').val('');
                leaves_table.ajax.reload();
            });

            $(document).on( 'change', '#user_id_filter, #status_filter, #leave_filter_date_range, #leave_type_filter', function() {
                leaves_table.ajax.reload();
            });

            $('#add_leave_modal').on('shown.bs.modal', function(e) {
                $('#add_leave_modal .select2').select2();

                $('form#add_leave_form #start_date, form#add_leave_form #end_date').datepicker({
                    autoclose: true,
                });
            });

            $(document).on('submit', 'form#add_leave_form', function(e) {
                e.preventDefault();
                $(this).find('button[type="submit"]').attr('disabled', true);
                var data = $(this).serialize();
                var ladda = Ladda.create(document.querySelector('.add-leave-btn'));
                ladda.start();
                $.ajax({
                    method: $(this).attr('method'),
                    url: $(this).attr('action'),
                    dataType: 'json',
                    data: data,
                    success: function(result) {
                        ladda.stop();
                        if (result.success == true) {
                            $('div#add_leave_modal').modal('hide');
                            toastr.success(result.msg);
                            leaves_table.ajax.reload();
                        } else {
                            toastr.error(result.msg);
                        }
                    },
                });
            });
            $(document).on( 'change', '#user_id_filter, #leave_filter_date_range', function() {
                get_leave_summary();
            });

            <?php if(!$is_admin): ?>
                get_leave_summary();
            <?php endif; ?>
        });

        $(document).on('click', 'a.change_status', function(e) {
            e.preventDefault();
            $('#change_status_modal').find('select#status_dropdown').val($(this).data('orig-value')).change();
            $('#change_status_modal').find('#leave_id').val($(this).data('leave-id'));
            $('#change_status_modal').find('#status_note').val($(this).data('status_note'));
            $('#change_status_modal').modal('show');
        });

        $(document).on('submit', 'form#change_status_form', function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            var ladda = Ladda.create(document.querySelector('.update-leave-status'));
            ladda.start();
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                dataType: 'json',
                data: data,
                success: function(result) {
                    ladda.stop();
                    if (result.success == true) {
                        $('div#change_status_modal').modal('hide');
                        toastr.success(result.msg);
                        leaves_table.ajax.reload();
                    } else {
                        toastr.error(result.msg);
                    }
                },
            });
        });

        $(document).on('click', 'button.delete-leave', function() {
            swal({
                title: LANG.sure,
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then(willDelete => {
                if (willDelete) {
                    var href = $(this).data('href');
                    var data = $(this).serialize();

                    $.ajax({
                        method: 'DELETE',
                        url: href,
                        dataType: 'json',
                        data: data,
                        success: function(result) {
                            if (result.success == true) {
                                toastr.success(result.msg);
                                leaves_table.ajax.reload();
                            } else {
                                toastr.error(result.msg);
                            }
                        },
                    });
                }
            });
        });

        function get_leave_summary() {
            $('#user_leave_summary').html('');
            var user_id = $('#user_id_filter').length ? $('#user_id_filter').val() : '';
            var start = $('#leave_filter_date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
            var end = $('#leave_filter_date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
            $.ajax({
                url: '<?php echo e(action("\Modules\Essentials\Http\Controllers\EssentialsLeaveController@getUserLeaveSummary"), false); ?>?user_id=' + user_id + '&start_date=' + start + '&end_date=' + end ,
                dataType: 'html',
                success: function(html) {
                    $('#user_leave_summary').html(html);
                },
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Essentials/Providers/../Resources/views/leave/index.blade.php ENDPATH**/ ?>