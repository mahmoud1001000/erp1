<?php $__env->startSection('title', __( 'lang_v1.shipments')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header no-print">
    <h1><?php echo app('translator')->get( 'lang_v1.shipments'); ?>
    </h1>
</section>

<!-- Main content -->
<section class="content no-print">
    <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('sell_list_filter_location_id',  __('purchase.business_location') . ':'); ?>


                <?php echo Form::select('sell_list_filter_location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all') ]); ?>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('sell_list_filter_customer_id',  __('contact.customer') . ':'); ?>

                <?php echo Form::select('sell_list_filter_customer_id', $customers, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('sell_list_filter_date_range', __('report.date_range') . ':'); ?>

                <?php echo Form::text('sell_list_filter_date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'readonly']); ?>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('created_by',  __('report.user') . ':'); ?>

                <?php echo Form::select('created_by', $sales_representative, null, ['class' => 'form-control select2', 'style' => 'width:100%']); ?>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('sell_list_filter_payment_status',  __('purchase.payment_status') . ':'); ?>

                <?php echo Form::select('sell_list_filter_payment_status', ['paid' => __('lang_v1.paid'), 'due' => __('lang_v1.due'), 'partial' => __('lang_v1.partial'), 'overdue' => __('lang_v1.overdue')], null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('shipping_status',  __('lang_v1.shipping_status') . ':'); ?>


                <?php echo Form::select('shipping_status', $shipping_statuses, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all') ]); ?>

            </div>
        </div>
        <?php if(!empty($service_staffs)): ?>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('service_staffs', __('restaurant.service_staff') . ':'); ?>

                    <?php echo Form::select('service_staffs', $service_staffs, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

                </div>
            </div>
        <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>
    <?php
        $custom_labels = json_decode(session('business.custom_labels'), true);
    ?>
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
        <?php if(auth()->user()->can('access_shipping') ||
         auth()->user()->can('access_own_shipping') ||
          auth()->user()->can('access_commission_agent_shipping') ): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped ajax_view" id="sell_table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('messages.action'); ?></th>
                            <th><?php echo app('translator')->get('messages.date'); ?></th>
                            <th><?php echo app('translator')->get('sale.invoice_no'); ?></th>
                            <th><?php echo app('translator')->get('sale.customer_name'); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.contact_no'); ?></th>
                            <th><?php echo app('translator')->get('sale.location'); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.shipping_status'); ?></th>
                            <?php if(!empty($custom_labels['shipping']['custom_field_1'])): ?>
                                <th>
                                    <?php echo e($custom_labels['shipping']['custom_field_1'], false); ?>

                                </th>
                            <?php endif; ?>
                            <?php if(!empty($custom_labels['shipping']['custom_field_2'])): ?>
                                <th>
                                    <?php echo e($custom_labels['shipping']['custom_field_2'], false); ?>

                                </th>
                            <?php endif; ?>
                            <?php if(!empty($custom_labels['shipping']['custom_field_3'])): ?>
                                <th>
                                    <?php echo e($custom_labels['shipping']['custom_field_3'], false); ?>

                                </th>
                            <?php endif; ?>
                            <?php if(!empty($custom_labels['shipping']['custom_field_4'])): ?>
                                <th>
                                    <?php echo e($custom_labels['shipping']['custom_field_4'], false); ?>

                                </th>
                            <?php endif; ?>
                            <?php if(!empty($custom_labels['shipping']['custom_field_5'])): ?>
                                <th>
                                    <?php echo e($custom_labels['shipping']['custom_field_5'], false); ?>

                                </th>
                            <?php endif; ?>
                            <th><?php echo app('translator')->get('sale.payment_status'); ?></th>
                            <th><?php echo app('translator')->get('restaurant.service_staff'); ?></th>
                        </tr>
                    </thead>
                </table>
            </div>
        <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>
</section>
<!-- /.content -->
<div class="modal fade payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<div class="modal fade edit_payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<!-- This will be printed -->
<!-- <section class="invoice print_section" id="receipt_section">
</section> -->

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
        }
    );
    $('#sell_list_filter_date_range').on('cancel.daterangepicker', function(ev, picker) {
        $('#sell_list_filter_date_range').val('');
        sell_table.ajax.reload();
    });

    sell_table = $('#sell_table').DataTable({
        processing: true,
        serverSide: true,
        aaSorting: [[1, 'desc']],
        scrollY:        "75vh",
        scrollX:        true,
        scrollCollapse: true,
        "ajax": {
            "url": "/sells",
            "data": function ( d ) {
                if($('#sell_list_filter_date_range').val()) {
                    var start = $('#sell_list_filter_date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
                    var end = $('#sell_list_filter_date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
                    d.start_date = start;
                    d.end_date = end;
                }
                if($('#sell_list_filter_location_id').length) {
                    d.location_id = $('#sell_list_filter_location_id').val();
                }
                d.customer_id = $('#sell_list_filter_customer_id').val();

                if($('#sell_list_filter_payment_status').length) {
                    d.payment_status = $('#sell_list_filter_payment_status').val();
                }
                if($('#created_by').length) {
                    d.created_by = $('#created_by').val();
                }
                if($('#service_staffs').length) {
                    d.service_staffs = $('#service_staffs').val();
                }
                d.only_shipments = true;
                d.shipping_status = $('#shipping_status').val();
            }
        },
        columns: [
            { data: 'action', name: 'action', searchable: false, orderable: false},
            { data: 'transaction_date', name: 'transaction_date'  },
            { data: 'invoice_no', name: 'invoice_no'},
            { data: 'conatct_name', name: 'conatct_name'},
            { data: 'mobile', name: 'contacts.mobile'},
            { data: 'business_location', name: 'bl.name'},
            { data: 'shipping_status', name: 'shipping_status'},
            <?php if(!empty($custom_labels['shipping']['custom_field_1'])): ?>
                { data: 'shipping_custom_field_1', name: 'shipping_custom_field_1'},
            <?php endif; ?>
            <?php if(!empty($custom_labels['shipping']['custom_field_2'])): ?>
                { data: 'shipping_custom_field_2', name: 'shipping_custom_field_2'},
            <?php endif; ?>
            <?php if(!empty($custom_labels['shipping']['custom_field_3'])): ?>
                { data: 'shipping_custom_field_3', name: 'shipping_custom_field_3'},
            <?php endif; ?>
            <?php if(!empty($custom_labels['shipping']['custom_field_4'])): ?>
                { data: 'shipping_custom_field_4', name: 'shipping_custom_field_4'},
            <?php endif; ?>
            <?php if(!empty($custom_labels['shipping']['custom_field_5'])): ?>
                { data: 'shipping_custom_field_5', name: 'shipping_custom_field_5'},
            <?php endif; ?>
            { data: 'payment_status', name: 'payment_status'},
            { data: 'waiter', name: 'ss.first_name', <?php if(empty($is_service_staff_enabled)): ?> visible: false <?php endif; ?> }
        ],
        "fnDrawCallback": function (oSettings) {
            __currency_convert_recursively($('#sell_table'));
        },
        createdRow: function( row, data, dataIndex ) {
            $( row ).find('td:eq(4)').attr('class', 'clickable_td');
        }
    });

    $(document).on('change', '#sell_list_filter_location_id, #sell_list_filter_customer_id, #sell_list_filter_payment_status, #created_by, #shipping_status, #service_staffs',  function() {
        sell_table.ajax.reload();
    });
});
</script>
<script src="<?php echo e(asset('js/payment.js?v=' . $asset_v), false); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/sell/shipments.blade.php ENDPATH**/ ?>