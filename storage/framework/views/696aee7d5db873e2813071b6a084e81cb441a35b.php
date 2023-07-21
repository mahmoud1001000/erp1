<?php $__env->startSection('title', __('essentials::lang.payroll')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('essentials::layouts.nav_hrm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="content-header">
    <h1><?php echo app('translator')->get('essentials::lang.payroll'); ?>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
        <?php $__env->startComponent('components.filters', ['title' => __('report.filters'), 'class' => 'box-solid']); ?>
            <?php if($is_admin): ?>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('user_id_filter', __('essentials::lang.employee') . ':'); ?>

                    <?php echo Form::select('user_id_filter', $employees, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('department_id', __('essentials::lang.department') . ':'); ?>

                    <?php echo Form::select('department_id', $departments, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('designation_id', __('essentials::lang.designation') . ':'); ?>

                    <?php echo Form::select('designation_id', $designations, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

                </div>
            </div>
            <?php endif; ?>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('month_year_filter', __( 'essentials::lang.month_year' ) . ':'); ?>

                    <div class="input-group">
                        <?php echo Form::text('month_year_filter', null, ['class' => 'form-control', 'placeholder' => __( 'essentials::lang.month_year' ) ]); ?>

                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>
        <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-solid', 'title' => __( 'essentials::lang.all_payrolls' )]); ?>
                <?php if($is_admin): ?>
                    <?php $__env->slot('tool'); ?>
                        <div class="box-tools">
                            <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#payroll_modal">
                                <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></button>
                        </div>
                    <?php $__env->endSlot(); ?>
                <?php endif; ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="payrolls_table">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get( 'essentials::lang.employee' ); ?></th>
                                <th><?php echo app('translator')->get( 'essentials::lang.department' ); ?></th>
                                <th><?php echo app('translator')->get( 'essentials::lang.designation' ); ?></th>
                                <th><?php echo app('translator')->get( 'essentials::lang.month_year' ); ?></th>
                                <th><?php echo app('translator')->get( 'purchase.ref_no' ); ?></th>
                                <th><?php echo app('translator')->get( 'sale.total_amount' ); ?></th>
                                <th><?php echo app('translator')->get( 'sale.payment_status' ); ?></th>
                                <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <?php if($is_admin): ?>
        <?php if ($__env->exists('essentials::payroll.payroll_modal')) echo $__env->make('essentials::payroll.payroll_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

</section>
<!-- /.content -->
<!-- /.content -->
<div class="modal fade payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<div class="modal fade edit_payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript">
        $(document).ready( function(){
            payrolls_table = $('#payrolls_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "<?php echo e(action('\Modules\Essentials\Http\Controllers\PayrollController@index'), false); ?>",
                    data: function (d) {
                        if ($('#user_id_filter').length) {
                            d.user_id = $('#user_id_filter').val();
                        }
                        d.month_year = $('#month_year_filter').val();
                        if ($('#department_id').length) {
                            d.department_id = $('#department_id').val();
                        }
                        if ($('#designation_id').length) {
                            d.designation_id = $('#designation_id').val();
                        }
                    },
                },
                columnDefs: [
                    {
                        targets: 7,
                        orderable: false,
                        searchable: false,
                    },
                ],
                columns: [
                    { data: 'user', name: 'user' },
                    { data: 'department', name: 'dept.name' },
                    { data: 'designation', name: 'dsgn.name' },
                    { data: 'transaction_date', name: 'transaction_date'},
                    { data: 'ref_no', name: 'ref_no'},
                    { data: 'final_total', name: 'final_total'},
                    { data: 'payment_status', name: 'payment_status'},
                    { data: 'action', name: 'action' },
                ],
                fnDrawCallback: function(oSettings) {
                    __currency_convert_recursively($('#payrolls_table'));
                },
            });

            $(document).on('change', '#user_id_filter, #month_year_filter, #department_id, #designation_id', function() {
                payrolls_table.ajax.reload();
            });

            if ($('#add_payroll_step1').length) {
                $('#add_payroll_step1').validate();
                $('#employee_id').select2({
                    dropdownParent: $('#payroll_modal')
                });
            }

            $('div.view_modal').on('shown.bs.modal', function(e) {
                __currency_convert_recursively($('.view_modal'));
            });

            $('#month_year, #month_year_filter').datepicker({
                autoclose: true,
                format: 'mm/yyyy',
                minViewMode: "months"
            });

            $(document).on('click', '.delete-payroll', function(e) {
                e.preventDefault();
                swal({
                    title: LANG.sure,
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                }).then(willDelete => {
                    if (willDelete) {
                        var href = $(this).attr('href');
                        var data = $(this).serialize();

                        $.ajax({
                            method: 'DELETE',
                            url: href,
                            dataType: 'json',
                            data: data,
                            success: function(result) {
                                if (result.success == true) {
                                    toastr.success(result.msg);
                                    payrolls_table.ajax.reload();
                                } else {
                                    toastr.error(result.msg);
                                }
                            },
                        });
                    }
                });
            });
        });
    </script>
    <script src="<?php echo e(asset('js/payment.js?v=' . $asset_v), false); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Essentials/Providers/../Resources/views/payroll/index.blade.php ENDPATH**/ ?>