<?php $__env->startSection('title', __('essentials::lang.holiday')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('essentials::layouts.nav_hrm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="content-header">
    <h1><?php echo app('translator')->get('essentials::lang.holiday'); ?>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
        <?php $__env->startComponent('components.filters', ['title' => __('report.filters'), 'class' => 'box-solid']); ?>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('location_id',  __('purchase.business_location') . ':'); ?>


                    <?php echo Form::select('location_id', $locations, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all') ]); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('holiday_filter_date_range', __('report.date_range') . ':'); ?>

                    <?php echo Form::text('holiday_filter_date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'readonly']); ?>

                </div>
            </div>
        <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-solid', 'title' => __( 'essentials::lang.all_holidays' )]); ?>
                <?php if($is_admin): ?>
                <?php $__env->slot('tool'); ?>
                    <div class="box-tools">
                        <button type="button" class="btn btn-block btn-primary btn-modal" data-href="<?php echo e(action('\Modules\Essentials\Http\Controllers\EssentialsHolidayController@create'), false); ?>" data-container="#add_holiday_modal">
                            <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></button>
                    </div>
                <?php $__env->endSlot(); ?>
                <?php endif; ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="holidays_table">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get( 'lang_v1.name' ); ?></th>
                                <th><?php echo app('translator')->get( 'lang_v1.date' ); ?></th>
                                <th><?php echo app('translator')->get( 'business.business_location' ); ?></th>
                                <th><?php echo app('translator')->get( 'brand.note' ); ?></th>
                                <?php if($is_admin): ?>
                                    <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                    </table>
                </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
</section>
<!-- /.content -->
<div class="modal fade" id="add_holiday_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel"></div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            holidays_table = $('#holidays_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "<?php echo e(action('\Modules\Essentials\Http\Controllers\EssentialsHolidayController@index'), false); ?>",
                    "data" : function(d) {
                        d.location_id = $('#location_id').val();
                        if($('#holiday_filter_date_range').val()) {
                            var start = $('#holiday_filter_date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
                            var end = $('#holiday_filter_date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
                            d.start_date = start;
                            d.end_date = end;
                        }
                    }
                },
                <?php if($is_admin): ?>
                columnDefs: [
                    {
                        targets: 4,
                        orderable: false,
                        searchable: false,
                    },
                ],
                <?php endif; ?>
                columns: [
                    { data: 'name', name: 'essentials_holidays.name' },
                    { data: 'start_date', name: 'start_date'},
                    { data: 'location', name: 'bl.name' },
                    { data: 'note', name: 'note'},
                    <?php if($is_admin): ?>
                    { data: 'action', name: 'action' },
                    <?php endif; ?>
                ],
            });

            $('#holiday_filter_date_range').daterangepicker(
                dateRangeSettings,
                function (start, end) {
                    $('#holiday_filter_date_range').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
                }
            );
            $('#holiday_filter_date_range').on('cancel.daterangepicker', function(ev, picker) {
                $('#holiday_filter_date_range').val('');
                holidays_table.ajax.reload();
            });

            $(document).on( 'change', '#holiday_filter_date_range, #location_id', function() {
                holidays_table.ajax.reload();
            });

            $('#add_holiday_modal').on('shown.bs.modal', function(e) {
                $('#add_holiday_modal .select2').select2();

                $('form#add_holiday_form #start_date, form#add_holiday_form #end_date').datepicker({
                    autoclose: true,
                });
            });

            $(document).on('submit', 'form#add_holiday_form', function(e) {
                e.preventDefault();
                $(this).find('button[type="submit"]').attr('disabled', true);
                var data = $(this).serialize();

                $.ajax({
                    method: $(this).attr('method'),
                    url: $(this).attr('action'),
                    dataType: 'json',
                    data: data,
                    success: function(result) {
                        if (result.success == true) {
                            $('div#add_holiday_modal').modal('hide');
                            toastr.success(result.msg);
                            holidays_table.ajax.reload();
                        } else {
                            toastr.error(result.msg);
                        }
                    },
                });
            });
        });

        $(document).on('click', 'button.delete-holiday', function() {
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
                                holidays_table.ajax.reload();
                            } else {
                                toastr.error(result.msg);
                            }
                        },
                    });
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Essentials/Providers/../Resources/views/holiday/index.blade.php ENDPATH**/ ?>