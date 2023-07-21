<?php $__env->startSection('title', __('repair::lang.repair')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('repair::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Content Header (Page header) -->
<section class="content-header no-print">
    <h1><?php echo app('translator')->get('repair::lang.invoices'); ?>
    </h1>
</section>

<!-- Main content -->
<section class="content no-print">
    <?php $__env->startComponent('components.filters', ['title' => __('report.filters'), 'closed' => false]); ?>
        <?php echo $__env->make('sell.partials.sell_list_filters', ['only' => ['sell_list_filter_location_id', 'sell_list_filter_customer_id', 'sell_list_filter_payment_status', 'sell_list_filter_date_range', 'created_by']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('repair_status_id',  __('sale.status') . ':'); ?>

                <?php echo Form::select('repair_status_id', $repair_status_dropdown['statuses'], null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
        <?php if(in_array('service_staff' ,$enabled_modules) && !$is_service_staff): ?>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('service_staff_id',  __('repair::lang.technician') . ':'); ?>

                <?php echo Form::select('service_staff_id', $service_staffs, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
        <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#pending_repair_tab" data-toggle="tab" aria-expanded="true">
                            <i class="fas fa-exclamation-circle text-orange"></i>
                            <?php echo app('translator')->get('repair::lang.pending'); ?>
                            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('repair::lang.common_pending_status_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                        </a>
                    </li>
                    <li>
                        <a href="#completed_repair_tab" data-toggle="tab" aria-expanded="true">
                            <i class="fa fas fa-check-circle text-success"></i>
                            <?php echo app('translator')->get('repair::lang.completed'); ?>
                            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('repair::lang.common_completed_status_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="pending_repair_tab">
                        <div class="row">
                            <div class="col-md-12 mb-12">
                                <a target="_blank" class="btn btn-sm btn-primary pull-right" href="<?php echo e(action('SellPosController@create'). '?sub_type=repair', false); ?>">
                                    <i class="fa fa-plus"></i> <?php echo app('translator')->get('messages.add'); ?>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped ajax_view" id="pending_repair_table">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('messages.action'); ?></th>
                                        <th><?php echo app('translator')->get('receipt.date'); ?></th>
                                        <th>
                                            <?php echo app('translator')->get('repair::lang.delivery_date'); ?>
                                            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('repair::lang.repair_due_date_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                                        </th>
                                        <th><?php echo app('translator')->get('repair::lang.job_sheet_no'); ?></th>
                                        <th><?php echo app('translator')->get('sale.invoice_no'); ?></th>
                                        <?php if(in_array('service_staff' ,$enabled_modules)): ?>
                                            <th><?php echo app('translator')->get('repair::lang.technician'); ?></th>
                                        <?php endif; ?>
                                        <th><?php echo app('translator')->get('lang_v1.added_by'); ?></th>
                                        <th><?php echo app('translator')->get('sale.customer_name'); ?></th>
                                        <th><?php echo app('translator')->get('product.brand'); ?></th>
                                        <th><?php echo app('translator')->get('repair::lang.device_model'); ?></th>
                                        <th><?php echo app('translator')->get('repair::lang.serial_no'); ?></th>
                                        <th><?php echo app('translator')->get('sale.status'); ?></th>
                                        <th><?php echo app('translator')->get('sale.location'); ?></th>
                                        <th><?php echo app('translator')->get('repair::lang.repair_warranty'); ?></th>
                                        <th><?php echo app('translator')->get('sale.payment_status'); ?></th>
                                        <th><?php echo app('translator')->get('sale.total_amount'); ?></th>
                                        <th><?php echo app('translator')->get('purchase.payment_due'); ?></th>
                                        <th><?php echo app('translator')->get('lang_v1.sell_return_due'); ?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="bg-gray font-17 footer-total text-center">
                                        <td
                                            <?php if(in_array('service_staff' ,$enabled_modules)): ?>
                                                colspan="11"
                                            <?php else: ?>
                                                colspan="10"
                                            <?php endif; ?>>
                                                <strong><?php echo app('translator')->get('sale.total'); ?>:</strong>
                                        </td>
                                        <td id="footer_pending_repair_status_count"></td>
                                        <td></td>
                                        <td></td>
                                        <td id="pending_repair_footer_payment_status_count"></td>
                                        <td>
                                            <span class="display_currency" id="pending_repair_footer_total" data-currency_symbol ="true"></span>
                                        </td>
                                        <td class="text-left">
                                            <small>
                                                <span class="display_currency" id="pending_repair_footer_total_remaining" data-currency_symbol ="true"></span>
                                            </small>
                                        </td>
                                        <td><span class="display_currency" id="pending_repair_footer_total_sell_return_due" data-currency_symbol ="true"></span></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="completed_repair_tab">
                        <div class="row">
                            <div class="col-md-12 mb-12">
                                <a target="_blank" class="btn btn-sm btn-primary pull-right" href="<?php echo e(action('SellPosController@create'). '?sub_type=repair', false); ?>">
                                    <i class="fa fa-plus"></i> <?php echo app('translator')->get('messages.add'); ?>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped ajax_view" id="sell_table">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('messages.action'); ?></th>
                                        <th><?php echo app('translator')->get('receipt.date'); ?></th>
                                        <th>
                                            <?php echo app('translator')->get('repair::lang.delivery_date'); ?>
                                            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('repair::lang.repair_due_date_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                                        </th>
                                        <th><?php echo app('translator')->get('repair::lang.job_sheet_no'); ?></th>
                                        <th><?php echo app('translator')->get('sale.invoice_no'); ?></th>
                                        <?php if(in_array('service_staff' ,$enabled_modules)): ?>
                                            <th><?php echo app('translator')->get('repair::lang.technician'); ?></th>
                                        <?php endif; ?>
                                        <th><?php echo app('translator')->get('lang_v1.added_by'); ?></th>
                                        <th><?php echo app('translator')->get('sale.customer_name'); ?></th>
                                        <th><?php echo app('translator')->get('product.brand'); ?></th>
                                        <th><?php echo app('translator')->get('repair::lang.device_model'); ?></th>
                                        <th><?php echo app('translator')->get('repair::lang.serial_no'); ?></th>
                                        <th><?php echo app('translator')->get('sale.status'); ?></th>
                                        <th><?php echo app('translator')->get('sale.location'); ?></th>
                                        <th><?php echo app('translator')->get('repair::lang.repair_warranty'); ?></th>
                                        <th><?php echo app('translator')->get('sale.payment_status'); ?></th>
                                        <th><?php echo app('translator')->get('sale.total_amount'); ?></th>
                                        <th><?php echo app('translator')->get('purchase.payment_due'); ?></th>
                                        <th><?php echo app('translator')->get('lang_v1.sell_return_due'); ?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="bg-gray font-17 footer-total text-center">
                                        <td
                                            <?php if(in_array('service_staff' ,$enabled_modules)): ?>
                                                colspan="11"
                                            <?php else: ?>
                                                colspan="10"
                                            <?php endif; ?>>
                                                <strong><?php echo app('translator')->get('sale.total'); ?>:</strong>
                                        </td>
                                        <td id="footer_repair_status_count"></td>
                                        <td></td>
                                        <td></td>
                                        <td id="footer_payment_status_count"></td>
                                        <td>
                                            <span class="display_currency" id="footer_sale_total" data-currency_symbol ="true"></span>
                                        </td>
                                        <td class="text-left">
                                            <small>
                                                <span class="display_currency" id="footer_total_remaining" data-currency_symbol ="true"></span>
                                            </small>
                                        </td>
                                        <td><span class="display_currency" id="footer_total_sell_return_due" data-currency_symbol ="true"></span></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade payment_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>

    <div class="modal fade edit_payment_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>

    <div class="modal fade" id="edit_repair_status_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel"></div>
</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>

<script type="text/javascript">
$(document).ready( function(){
    //Date range as a button
    $('#sell_list_filter_date_range').daterangepicker(
        dateRangeSettings,
        function (start, end) {
            $('#sell_list_filter_date_range').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
            sell_table.ajax.reload();
            pending_repair_table.ajax.reload();
        }
    );
    $('#sell_list_filter_date_range').on('cancel.daterangepicker', function(ev, picker) {
        $('#sell_list_filter_date_range').val('');
        sell_table.ajax.reload();
        pending_repair_table.ajax.reload();
    });

    sell_table = $('#sell_table').DataTable({
        processing: true,
        serverSide: true,
        aaSorting: [[2, 'asc']],
        "ajax": {
            "url": "/repair/repair",
            "data": function ( d ) {
                if($('#sell_list_filter_date_range').val()) {
                    var start = $('#sell_list_filter_date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
                    var end = $('#sell_list_filter_date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
                    d.start_date = start;
                    d.end_date = end;
                }
                d.is_direct_sale = 1;
                d.is_completed_status = 1;
                d.location_id = $('#sell_list_filter_location_id').val();
                d.customer_id = $('#sell_list_filter_customer_id').val();
                d.payment_status = $('#sell_list_filter_payment_status').val();
                d.created_by = $('#created_by').val();
                d.sub_type = 'repair';
                d.repair_status_id = $('#repair_status_id').val();
                <?php if(in_array('service_staff' ,$enabled_modules)): ?>
                    d.service_staff_id = $('#service_staff_id').val();
                <?php endif; ?>
            }
        },
        columns: [
            { data: 'action', name: 'action', orderable: false, searchable: false},
            { data: 'transaction_date', name: 'transaction_date'  },
            { data: 'repair_due_date', name: 'repair_due_date'  },
            { data: 'job_sheet_no', name: 'rjs.job_sheet_no'},
            { data: 'invoice_no', name: 'invoice_no'},
            <?php if(in_array('service_staff' ,$enabled_modules)): ?>
                { data: 'service_staff', name: 'ss.first_name'},
            <?php endif; ?>
            { data: 'added_by', name: 'added_by', orderable: false, searchable: false},
            { data: 'name', name: 'contacts.name'},
            { data: 'brand', name: 'b.name'},
            { data: 'device_model', name: 'rdm.name'},
            { data: 'repair_serial_no', name: 'rs.name'},
            { data: 'repair_status', name: 'rs.name'},
            { data: 'business_location', name: 'bl.name'},
            { data: 'warranty_name', name: 'rw.name'},
            { data: 'payment_status', name: 'payment_status'},
            { data: 'final_total', name: 'final_total', orderable: false, searchable: false},
            { data: 'total_remaining', name: 'total_remaining', orderable: false, searchable: false},
            { data: 'return_due', name: 'return_due', orderable: false, searchable: false}
        ],
        "fnDrawCallback": function (oSettings) {

            $('#footer_sale_total').text(sum_table_col($('#sell_table'), 'final-total'));

            $('#footer_total_remaining').text(sum_table_col($('#sell_table'), 'payment_due'));

            $('#footer_total_sell_return_due').text(sum_table_col($('#sell_table'), 'sell_return_due'));
            
            $('#footer_payment_status_count').html(__sum_status_html($('#sell_table'), 'payment-status-label'));

            $('#footer_repair_status_count').html(__sum_status_html($('#sell_table'), 'edit_repair_status'));

            __currency_convert_recursively($('#sell_table'));
        },
        createdRow: function( row, data, dataIndex ) {
            $( row ).find('td:eq(11)').attr('class', 'clickable_td');
            $( row ).find('td:eq(14)').attr('class', 'clickable_td edit_status_td');
        }
    });

    pending_repair_table = $('#pending_repair_table').DataTable({
        processing: true,
        serverSide: true,
        aaSorting: [[2, 'asc']],
        "ajax": {
            "url": "/repair/repair",
            "data": function ( d ) {
                if($('#sell_list_filter_date_range').val()) {
                    var start = $('#sell_list_filter_date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
                    var end = $('#sell_list_filter_date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
                    d.start_date = start;
                    d.end_date = end;
                }
                d.is_direct_sale = 1;
                d.is_completed_status = 0;
                d.location_id = $('#sell_list_filter_location_id').val();
                d.customer_id = $('#sell_list_filter_customer_id').val();
                d.payment_status = $('#sell_list_filter_payment_status').val();
                d.created_by = $('#created_by').val();
                d.sub_type = 'repair';
                d.repair_status_id = $('#repair_status_id').val();
                <?php if(in_array('service_staff' ,$enabled_modules)): ?>
                    d.service_staff_id = $('#service_staff_id').val();
                <?php endif; ?>
            }
        },
        columns: [
            { data: 'action', name: 'action', orderable: false, searchable: false},
            { data: 'transaction_date', name: 'transaction_date'  },
            { data: 'repair_due_date', name: 'repair_due_date'  },
            { data: 'job_sheet_no', name: 'rjs.job_sheet_no'},
            { data: 'invoice_no', name: 'invoice_no'},
            <?php if(in_array('service_staff' ,$enabled_modules)): ?>
                { data: 'service_staff', name: 'ss.first_name'},
            <?php endif; ?>
            { data: 'added_by', name: 'added_by', orderable: false, searchable: false},
            { data: 'name', name: 'contacts.name'},
            { data: 'brand', name: 'b.name'},
            { data: 'device_model', name: 'rdm.name'},
            { data: 'repair_serial_no', name: 'rs.name'},
            { data: 'repair_status', name: 'rs.name'},
            { data: 'business_location', name: 'bl.name'},
            { data: 'warranty_name', name: 'rw.name'},
            { data: 'payment_status', name: 'payment_status'},
            { data: 'final_total', name: 'final_total', orderable: false, searchable: false},
            { data: 'total_remaining', name: 'total_remaining', orderable: false, searchable: false},
            { data: 'return_due', name: 'return_due', orderable: false, searchable: false}
        ],
        "fnDrawCallback": function (oSettings) {

            $('#pending_repair_footer_total').text(sum_table_col($('#pending_repair_table'), 'final-total'));

            $('#pending_repair_footer_total_remaining').text(sum_table_col($('#pending_repair_table'), 'payment_due'));

            $('#pending_repair_footer_total_sell_return_due').text(sum_table_col($('#pending_repair_table'), 'sell_return_due'));
            
            $('#pending_repair_footer_payment_status_count').html(__sum_status_html($('#pending_repair_table'), 'payment-status-label'));

            $('#footer_pending_repair_status_count').html(__sum_status_html($('#pending_repair_table'), 'edit_repair_status'));

            __currency_convert_recursively($('#pending_repair_table'));
        },
        createdRow: function( row, data, dataIndex ) {
            $( row ).find('td:eq(11)').attr('class', 'clickable_td');
            $( row ).find('td:eq(14)').attr('class', 'clickable_td edit_status_td');
        }
    });

    $(document).on('change', '#sell_list_filter_location_id, #sell_list_filter_customer_id, #sell_list_filter_payment_status, #service_staff_id, #repair_status_id, #created_by',  function() {
        sell_table.ajax.reload();
        pending_repair_table.ajax.reload();
    });
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("repair_status.update")): ?>
        $(document).on('click', '.edit_repair_status', function(e){
            e.preventDefault();
            var url = $(this).data('href');
            $.ajax({
                method: 'GET',
                url: url,
                dataType: 'html',
                success: function(result) {
                    $('#edit_repair_status_modal').html(result).modal('show');
                }
            });
        });
    <?php endif; ?>

    $('#edit_repair_status_modal').on('shown.bs.modal', function (e) {
        $('#send_sms').change(function() {
            if ($(this). is(":checked")) {
                $('div.sms_body').fadeIn();
            } else {
                $('div.sms_body').fadeOut();
            }
        });

        if ($('#repair_status_id_modal').length) {
            ;
            $("#sms_body").val($("#repair_status_id_modal :selected").data('sms_template'));
        }

        $('#repair_status_id_modal').on('change', function() {
            var sms_template = $(this).find(':selected').data('sms_template');
            $("#sms_body").val(sms_template);
        });
    });

    $(document).on('submit', 'form#update_repair_status_form', function(e){
        e.preventDefault();
        var data = $(this).serialize();
        var ladda = Ladda.create(document.querySelector('.ladda-button'));
        ladda.start();
        $.ajax({
            method: $(this).attr("method"),
            url: $(this).attr("action"),
            dataType: "json",
            data: data,
            success: function(result){
                ladda.stop();
                if(result.success == true){
                    $('#edit_repair_status_modal').modal('hide');
                    toastr.success(result.msg);
                    sell_table.ajax.reload();
                    pending_repair_table.ajax.reload();
                } else {
                    toastr.error(result.msg);
                }
            }
        });
    });

    $(document).on('click', '.delete_media', function(e){
        e.preventDefault();
        var this_btn = $(this);
        $.ajax({
            url: $(this).attr("href"),
            dataType: "json",
            success: function(result){
                if(result.success == true){
                    this_btn.closest('tr').remove();
                    toastr.success(result.msg);
                } else {
                    toastr.error(result.msg);
                }
            }
        });
    });
    $(document).on('click', '.collapsed-box-title', function(e){
        if (e.target.tagName == 'BUTTON' || e.target.tagName == 'I') {
            return false;
        }
        $(this).find('.box-tools button').click();
    });

});
</script>
<script src="<?php echo e(asset('js/payment.js?v=' . $asset_v), false); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Repair/Providers/../Resources/views/repair/index.blade.php ENDPATH**/ ?>