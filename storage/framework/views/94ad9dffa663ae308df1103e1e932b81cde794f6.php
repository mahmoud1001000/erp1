<?php $__env->startSection('title', __('lang_v1.purchase_return')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header no-print">
    <h1><?php echo app('translator')->get('lang_v1.purchase_return'); ?>
    </h1>
</section>

<!-- Main content -->
<section class="content no-print">
    <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('purchase_list_filter_location_id',  __('purchase.business_location') . ':'); ?>

                <?php echo Form::select('purchase_list_filter_location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('purchase_list_filter_date_range', __('report.date_range') . ':'); ?>

                <?php echo Form::text('purchase_list_filter_date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'readonly']); ?>

            </div>
        </div>
    <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __('lang_v1.all_purchase_returns')]); ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase.update')): ?>
            <?php $__env->slot('tool'); ?>
                <div class="box-tools">
                    <a class="btn btn-block btn-primary" href="<?php echo e(action('CombinedPurchaseReturnController@create'), false); ?>">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->get('messages.add'); ?></a>
                </div>
            <?php $__env->endSlot(); ?>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase.view')): ?>
            <?php echo $__env->make('purchase_return.partials.purchase_return_list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="modal fade payment_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>

    <div class="modal fade edit_payment_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>

</section>

<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script src="<?php echo e(asset('js/payment.js?v=' . $asset_v), false); ?>"></script>
<script>
    $(document).ready( function(){
        $('#purchase_list_filter_date_range').daterangepicker(
            dateRangeSettings,
            function (start, end) {
                $('#purchase_list_filter_date_range').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
               purchase_return_table.ajax.reload();
            }
        );
        $('#purchase_list_filter_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $('#purchase_list_filter_date_range').val('');
            purchase_return_table.ajax.reload();
        });

        //Purchase table
        purchase_return_table = $('#purchase_return_datatable').DataTable({
            processing: true,
            serverSide: true,
            aaSorting: [[0, 'desc']],
            ajax: {
            url: '/purchase-return',
            data: function(d) {
                if ($('#purchase_list_filter_location_id').length) {
                    d.location_id = $('#purchase_list_filter_location_id').val();
                }

                var start = '';
                var end = '';
                if ($('#purchase_list_filter_date_range').val()) {
                    start = $('input#purchase_list_filter_date_range')
                        .data('daterangepicker')
                        .startDate.format('YYYY-MM-DD');
                    end = $('input#purchase_list_filter_date_range')
                        .data('daterangepicker')
                        .endDate.format('YYYY-MM-DD');
                }
                d.start_date = start;
                d.end_date = end;
            },
        },
            columnDefs: [ {
                "targets": [7, 8],
                "orderable": false,
                "searchable": false
            } ],
            columns: [
                { data: 'transaction_date', name: 'transaction_date'  },
                { data: 'ref_no', name: 'ref_no'},
                { data: 'parent_purchase', name: 'T.ref_no'},
                { data: 'location_name', name: 'BS.name'},
                { data: 'name', name: 'contacts.name'},
                { data: 'payment_status', name: 'payment_status'},
                { data: 'final_total', name: 'final_total'},
                { data: 'payment_due', name: 'payment_due'},
                { data: 'action', name: 'action'}
            ],
            "fnDrawCallback": function (oSettings) {
                var total_purchase = sum_table_col($('#purchase_return_datatable'), 'final_total');
                $('#footer_purchase_return_total').text(total_purchase);
                
                $('#footer_payment_status_count').html(__sum_status_html($('#purchase_return_datatable'), 'payment-status-label'));

                var total_due = sum_table_col($('#purchase_return_datatable'), 'payment_due');
                $('#footer_total_due').text(total_due);
                
                __currency_convert_recursively($('#purchase_return_datatable'));
            },
            createdRow: function( row, data, dataIndex ) {
                $( row ).find('td:eq(5)').attr('class', 'clickable_td');
            }
        });

        $(document).on(
        'change',
            '#purchase_list_filter_location_id',
            function() {
                purchase_return_table.ajax.reload();
            }
        );
    });
</script>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/purchase_return/index.blade.php ENDPATH**/ ?>