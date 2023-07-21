
<?php $__env->startSection('title', __('contact.view_contact')); ?>

<?php $__env->startSection('content'); ?>

<!-- Main content -->
<section class="content no-print">
    <div class="row no-print">
        <div class="col-md-4">
            <h3><?php echo app('translator')->get('contact.view_contact'); ?></h3>
        </div>
        <div class="col-md-4 col-xs-12 mt-15 pull-right">
            <?php echo Form::select('contact_id', $contact_dropdown, $contact->id , ['class' => 'form-control select2', 'id' => 'contact_id']); ?>

        </div>
    </div>
    <div class="hide print_table_part">
        <style type="text/css">
            .info_col {
                width: 25%;
                float: left;
                padding-left: 10px;
                padding-right: 10px;
            }
        </style>
        <div style="width: 100%;">
            <div class="info_col">
                <?php echo $__env->make('contact.contact_basic_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="info_col">
                <?php echo $__env->make('contact.contact_more_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <?php if( $contact->type != 'customer'): ?>
                <div class="info_col">
                    <?php echo $__env->make('contact.contact_tax_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endif; ?>
            <div class="info_col">
                <?php echo $__env->make('contact.contact_payment_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
    <input type="hidden" id="sell_list_filter_customer_id" value="<?php echo e($contact->id, false); ?>">
    <input type="hidden" id="purchase_list_filter_supplier_id" value="<?php echo e($contact->id, false); ?>">
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-body">
                    <?php echo $__env->make('contact.partials.contact_info_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs nav-justified">
                    <li class="<?php if(!empty($view_type) &&  $view_type == 'ledger'): ?> active <?php else: ?>  '' <?php endif; ?>">
                        <a href="#ledger_tab" data-toggle="tab" aria-expanded="true"><i class="fas fa-scroll" aria-hidden="true"></i> <?php echo app('translator')->get('lang_v1.ledger'); ?></a>
                    </li>
                    <?php if(in_array($contact->type, ['both', 'supplier'])): ?>
                        <li class="
                            <?php if(!empty($view_type) &&  $view_type == 'purchase'): ?> active  <?php else: ?> '' <?php endif; ?>">
                            <a href="#purchases_tab" data-toggle="tab" aria-expanded="true"><i class="fas fa-arrow-circle-down" aria-hidden="true"></i> <?php echo app('translator')->get( 'purchase.purchases'); ?></a>
                        </li>
                        <li class="<?php if(!empty($view_type) &&  $view_type == 'stock_report'): ?> active  <?php else: ?> '' <?php endif; ?>">
                            <a href="#stock_report_tab" data-toggle="tab" aria-expanded="true"><i class="fas fa-hourglass-half" aria-hidden="true"></i> <?php echo app('translator')->get( 'report.stock_report'); ?></a>
                        </li>
                    <?php endif; ?>
                    <?php if(in_array($contact->type, ['both', 'customer'])): ?>
                        <li class="
                            <?php if(!empty($view_type) &&  $view_type == 'sales'): ?>
                                active
                            <?php else: ?>
                                ''
                            <?php endif; ?>">
                            <a href="#sales_tab" data-toggle="tab" aria-expanded="true"><i class="fas fa-arrow-circle-up" aria-hidden="true"></i> <?php echo app('translator')->get( 'sale.sells'); ?></a>
                        </li>
                        <?php if(in_array('subscription', $enabled_modules)): ?>
                            <li class="
                                <?php if(!empty($view_type) &&  $view_type == 'subscriptions'): ?>
                                    active
                                <?php else: ?>
                                    ''
                                <?php endif; ?>">
                                <a href="#subscriptions_tab" data-toggle="tab" aria-expanded="true"><i class="fas fa-recycle" aria-hidden="true"></i> <?php echo app('translator')->get( 'lang_v1.subscriptions'); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                    <li class="
                       <?php if(!empty($view_type) &&  $view_type == 'documents_and_notes'): ?>
                                active
                            <?php else: ?> ''  <?php endif; ?> ">
                        <a href="#documents_and_notes_tab" data-toggle="tab" aria-expanded="true"><i class="fas fa-paperclip" aria-hidden="true"></i> <?php echo app('translator')->get('lang_v1.documents_and_notes'); ?></a>
                    </li>
                    <li class="
                            <?php if(!empty($view_type) &&  $view_type == 'payments'): ?>  active  <?php else: ?> '' <?php endif; ?>">
                        <a href="#payments_tab" data-toggle="tab" aria-expanded="true"><i class="fas fa-money-bill-alt" aria-hidden="true"></i> <?php echo app('translator')->get('sale.payments'); ?></a>
                    </li>

                    <?php if( in_array($contact->type, ['customer', 'both']) && session('business.enable_rp')): ?>
                        <li class="
                            <?php if(!empty($view_type) &&  $view_type == 'reward_point'): ?> active  <?php else: ?> '' <?php endif; ?>">
                            <a href="#reward_point_tab" data-toggle="tab" aria-expanded="true"><i class="fas fa-gift" aria-hidden="true"></i> <?php echo e(session('business.rp_name') ?? __( 'lang_v1.reward_points'), false); ?></a>
                        </li>
                    <?php endif; ?>

                    <li class="
                        <?php if(!empty($view_type) &&  $view_type == 'activities'): ?>  active <?php else: ?> '' <?php endif; ?>">
                        <a href="#activities_tab" data-toggle="tab" aria-expanded="true"><i class="fas fa-pen-square" aria-hidden="true"></i> <?php echo app('translator')->get('lang_v1.activities'); ?></a>
                        </li>

                    <?php if(!empty($contact_view_tabs)): ?>
                        <?php $__currentLoopData = $contact_view_tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tabs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($value['tab_menu_path'])): ?>
                                    <?php
                                        $tab_data = !empty($value['tab_data']) ? $value['tab_data'] : [];
                                    ?>
                                    <?php echo $__env->make($value['tab_menu_path'], $tab_data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                </ul>

                <div class="tab-content">
                    <div class="tab-pane
                                <?php if(!empty($view_type) &&  $view_type == 'ledger'): ?> active  <?php else: ?> ''  <?php endif; ?>"  id="ledger_tab">
                                     <?php echo $__env->make('contact.partials.ledger_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <?php if(in_array($contact->type, ['both', 'supplier'])): ?>
                        <div class="tab-pane
                            <?php if(!empty($view_type) &&  $view_type == 'purchase'): ?>
                                active
                            <?php else: ?>
                                ''
                            <?php endif; ?>"
                        id="purchases_tab">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo Form::label('purchase_list_filter_date_range', __('report.date_range') . ':'); ?>

                                        <?php echo Form::text('purchase_list_filter_date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'readonly']); ?>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <?php echo $__env->make('purchase.partials.purchase_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane
                            <?php if(!empty($view_type) &&  $view_type == 'stock_report'): ?>
                                active
                            <?php else: ?>
                                ''
                            <?php endif; ?>" id="stock_report_tab">
                            <?php echo $__env->make('contact.partials.stock_report_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endif; ?>
                    <?php if(in_array($contact->type, ['both', 'customer'])): ?>
                        <div class="tab-pane
                            <?php if(!empty($view_type) &&  $view_type == 'sales'): ?>
                                active
                            <?php else: ?>
                                ''
                            <?php endif; ?>"
                        id="sales_tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php $__env->startComponent('components.widget'); ?>
                                        <?php echo $__env->make('sell.partials.sell_list_filters', ['only' => ['sell_list_filter_payment_status', 'sell_list_filter_date_range', 'only_subscriptions']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->renderComponent(); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo $__env->make('sale_pos.partials.sales_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        </div>
                        <?php if(in_array('subscription', $enabled_modules)): ?>
                            <?php echo $__env->make('contact.partials.subscriptions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="tab-pane
                            <?php if(!empty($view_type) &&  $view_type == 'documents_and_notes'): ?>
                                active
                            <?php else: ?>
                                ''
                            <?php endif; ?>"
                        id="documents_and_notes_tab">
                        <?php echo $__env->make('contact.partials.documents_and_notes_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="tab-pane
                        <?php if(!empty($view_type) &&  $view_type == 'payments'): ?>
                            active
                        <?php else: ?>
                            ''
                        <?php endif; ?>" id="payments_tab">
                        <div id="contact_payments_div" style="height: 500px;overflow-y: scroll;"></div>
                    </div>
                    <?php if( in_array($contact->type, ['customer', 'both']) && session('business.enable_rp')): ?>
                        <div class="tab-pane
                            <?php if(!empty($view_type) &&  $view_type == 'reward_point'): ?>
                                active
                            <?php else: ?>
                                ''
                            <?php endif; ?>"
                        id="reward_point_tab">
                        <br>
                            <div class="row">
                            <?php if($reward_enabled): ?>
                                <div class="col-md-3">
                                    <div class="info-box bg-yellow">
                                        <span class="info-box-icon"><i class="fa fa-gift"></i></span>

                                        <div class="info-box-content">
                                          <span class="info-box-text"><?php echo e(session('business.rp_name'), false); ?></span>
                                          <span class="info-box-number"><?php echo e($contact->total_rp ?? 0, false); ?></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped"
                                    id="rp_log_table" width="100%">
                                        <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('messages.date'); ?></th>
                                                <th><?php echo app('translator')->get('sale.invoice_no'); ?></th>
                                                <th><?php echo app('translator')->get('lang_v1.earned'); ?></th>
                                                <th><?php echo app('translator')->get('lang_v1.redeemed'); ?></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>
                    <?php endif; ?>

                    <div class="tab-pane"
                        id="activities_tab">
                        <?php echo $__env->make('activity_log.activities', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <?php if(!empty($contact_view_tabs)): ?>
                        <?php $__currentLoopData = $contact_view_tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tabs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($value['tab_content_path'])): ?>
                                    <?php
                                        $tab_data = !empty($value['tab_data']) ? $value['tab_data'] : [];
                                    ?>
                                    <?php echo $__env->make($value['tab_content_path'], $tab_data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
<div class="modal fade payment_modal" tabindex="-1" role="dialog"
        aria-labelledby="gridSystemModalLabel">
</div>
<div class="modal fade edit_payment_modal" tabindex="-1" role="dialog"
    aria-labelledby="gridSystemModalLabel">
</div>
<div class="modal fade pay_contact_due_modal" tabindex="-1" role="dialog"
        aria-labelledby="gridSystemModalLabel"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
$(document).ready( function(){
    $('#ledger_date_range').daterangepicker(
        dateRangeSettings,
        function (start, end) {
            $('#ledger_date_range').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
        }
    );
    $('#ledger_date_range').change( function(){
        get_contact_ledger();
    });
    get_contact_ledger();

    rp_log_table = $('#rp_log_table').DataTable({
        processing: true,
        serverSide: true,
        aaSorting: [[0, 'desc']],
        ajax: '/sells?customer_id=<?php echo e($contact->id, false); ?>&rewards_only=true',
        columns: [
            { data: 'transaction_date', name: 'transactions.transaction_date'  },
            { data: 'invoice_no', name: 'transactions.invoice_no'},
            { data: 'rp_earned', name: 'transactions.rp_earned'},
            { data: 'rp_redeemed', name: 'transactions.rp_redeemed'},
        ]
    });

    supplier_stock_report_table = $('#supplier_stock_report_table').DataTable({
        processing: true,
        serverSide: true,
        'ajax': {
            url: "<?php echo e(action('ContactController@getSupplierStockReport', [$contact->id]), false); ?>",
            data: function (d) {
                d.location_id = $('#sr_location_id').val();
            }
        },
        columns: [
            { data: 'product_name', name: 'p.name'  },
            { data: 'sub_sku', name: 'v.sub_sku'  },
            { data: 'purchase_quantity', name: 'purchase_quantity', searchable: false},
            { data: 'total_quantity_sold', name: 'total_quantity_sold', searchable: false},
            { data: 'total_quantity_returned', name: 'total_quantity_returned', searchable: false},
            { data: 'current_stock', name: 'current_stock', searchable: false},
            { data: 'stock_price', name: 'stock_price', searchable: false}
        ],
        fnDrawCallback: function(oSettings) {
            __currency_convert_recursively($('#supplier_stock_report_table'));
        },
    });

    $('#sr_location_id').change( function() {
        supplier_stock_report_table.ajax.reload();
    });

    $('#contact_id').change( function() {
        if ($(this).val()) {
            window.location = "<?php echo e(url('/contacts'), false); ?>/" + $(this).val();
        }
    });

    $('a[href="#sales_tab"]').on('shown.bs.tab', function (e) {
        sell_table.ajax.reload();
    });
});

$("input.transaction_types, input#show_payments").on('ifChanged', function (e) {
    get_contact_ledger();
});

$(document).one('shown.bs.tab', 'a[href="#payments_tab"]', function(){
    get_contact_payments();
})

$(document).on('click', '#contact_payments_pagination a', function(e){
    e.preventDefault();
    get_contact_payments($(this).attr('href'));
})

function get_contact_payments(url = null) {
    if (!url) {
        url = "<?php echo e(action('ContactController@getContactPayments', [$contact->id]), false); ?>";
    }
    $.ajax({
        url: url,
        dataType: 'html',
        success: function(result) {
            $('#contact_payments_div').fadeOut(400, function(){
                $('#contact_payments_div')
                .html(result).fadeIn(400);
            });
        },
    });
}

function get_contact_ledger() {

    var start_date = '';
    var end_date = '';
    var transaction_types = $('input.transaction_types:checked').map(function(i, e) {return e.value}).toArray();
    var show_payments = $('input#show_payments').is(':checked');
    if($('#ledger_date_range').val()) {
        start_date = $('#ledger_date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
        end_date = $('#ledger_date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
    }


    $.ajax({
        url: '/contacts/ledger?contact_id=<?php echo e($contact->id, false); ?>&start_date=' + start_date + '&transaction_types=' + transaction_types + '&show_payments=' + show_payments + '&end_date=' + end_date,
        dataType: 'html',
        success: function(result) {
            $('#contact_ledger_div')
                .html(result);
            __currency_convert_recursively($('#contact_ledger_div'));

            $('#ledger_table').DataTable({
                searching: false,
                ordering:false,
                paging:false,
                dom: 't'
            });
        },
    });
}

$(document).on('click', '#send_ledger', function() {
    var start_date = $('#ledger_date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
    var end_date = $('#ledger_date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');

    var url = "<?php echo e(action('NotificationController@getTemplate', [$contact->id, 'send_ledger']), false); ?>" + '?start_date=' + start_date + '&end_date=' + end_date;

    $.ajax({
        url: url,
        dataType: 'html',
        success: function(result) {
            $('.view_modal')
                .html(result)
                .modal('show');
        },
    });
})

$(document).on('click', '#print_ledger_pdf', function() {
    var start_date = $('#ledger_date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
    var end_date = $('#ledger_date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');

    var url = $(this).data('href') + '&start_date=' + start_date + '&end_date=' + end_date;
    window.open(url);
});

</script>
<?php echo $__env->make('sale_pos.partials.sale_table_javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('js/payment.js?v=' . $asset_v), false); ?>"></script>
<?php if(in_array($contact->type, ['both', 'supplier'])): ?>
    <script src="<?php echo e(asset('js/purchase.js?v=' . $asset_v), false); ?>"></script>
<?php endif; ?>

<!-- document & note.js -->
<?php echo $__env->make('documents_and_notes.document_and_note_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if(!empty($contact_view_tabs)): ?>
    <?php $__currentLoopData = $contact_view_tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tabs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!empty($value['module_js_path'])): ?>
                <?php echo $__env->make($value['module_js_path'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<script type="text/javascript">
    $(document).ready( function(){
        $('#purchase_list_filter_date_range').daterangepicker(
            dateRangeSettings,
            function (start, end) {
                $('#purchase_list_filter_date_range').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
               purchase_table.ajax.reload();
            }
        );
        $('#purchase_list_filter_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $('#purchase_list_filter_date_range').val('');
            purchase_table.ajax.reload();
        });
    });
</script>
<?php echo $__env->make('sale_pos.partials.subscriptions_table_javascript', ['contact_id' => $contact->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/contact/show.blade.php ENDPATH**/ ?>