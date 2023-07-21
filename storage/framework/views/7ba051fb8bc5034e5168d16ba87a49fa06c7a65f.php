<?php $__env->startSection('title', __( 'report.tax_report' )); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get( 'report.tax_report' ); ?>
        <small><?php echo app('translator')->get( 'report.tax_report_msg' ); ?></small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('tax_report_location_id',  __('purchase.business_location') . ':'); ?>

                        <?php echo Form::select('tax_report_location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%']); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('tax_report_date_range', __('report.date_range') . ':'); ?>

                        <?php echo Form::text('tax_report_date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'id' => 'tax_report_date_range', 'readonly']); ?>

                    </div>
                </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    

    <div class="row">
        <div class="col-xs-12">
            <?php $__env->startComponent('components.widget'); ?>
                <?php $__env->slot('title'); ?>
                    <?php echo e(__('lang_v1.tax_overall'), false); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.tax_overall') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                <?php $__env->endSlot(); ?>
                <h3 class="text-muted">
                    <?php echo e(__('lang_v1.output_tax_minus_input_tax'), false); ?>: 
                    <span class="tax_diff">
                        <i class="fas fa-sync fa-spin fa-fw"></i>
                    </span>
                </h3>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row no-print">
        <div class="col-sm-12">
            <button type="button" class="btn btn-primary pull-right" 
            aria-label="Print" onclick="window.print();"
            ><i class="fa fa-print"></i> <?php echo app('translator')->get( 'messages.print' ); ?></button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
           <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#input_tax_tab" data-toggle="tab" aria-expanded="true"><i class="fa fas fa-arrow-circle-down" aria-hidden="true"></i> <?php echo app('translator')->get('report.input_tax'); ?></a>
                    </li>

                    <li>
                        <a href="#output_tax_tab" data-toggle="tab" aria-expanded="true"><i class="fa fas fa-arrow-circle-up" aria-hidden="true"></i> <?php echo app('translator')->get('report.output_tax'); ?></a>
                    </li>

                    <li>
                        <a href="#expense_tax_tab" data-toggle="tab" aria-expanded="true"><i class="fa fas fa-minus-circle" aria-hidden="true"></i> <?php echo app('translator')->get('lang_v1.expense_tax'); ?></a>
                    </li>
                    <?php if(!empty($tax_report_tabs)): ?>
                        <?php $__currentLoopData = $tax_report_tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tabs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                    <div class="tab-pane active" id="input_tax_tab">
                        <table class="table table-bordered table-striped" id="input_tax_table">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('messages.date'); ?></th>
                                    <th><?php echo app('translator')->get('purchase.ref_no'); ?></th>
                                    <th><?php echo app('translator')->get('purchase.supplier'); ?></th>
                                    <th><?php echo app('translator')->get('contact.tax_no'); ?></th>
                                    <th><?php echo app('translator')->get('sale.total_amount'); ?></th>
                                    <th><?php echo app('translator')->get('receipt.discount'); ?></th>
                                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <th>
                                            <?php echo e($tax['name'], false); ?>

                                        </th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="bg-gray font-17 text-center footer-total">
                                    <td colspan="4"><strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
                                    <td><span class="display_currency" id="sell_total" data-currency_symbol ="true"></span></td>
                                    <td>&nbsp;</td>
                                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td>
                                            <span class="display_currency" id="total_input_<?php echo e($tax['id'], false); ?>" data-currency_symbol ="true"></span>
                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="tab-pane" id="output_tax_tab">
                        <table class="table table-bordered table-striped" id="output_tax_table" width="100%">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('messages.date'); ?></th>
                                    <th><?php echo app('translator')->get('sale.invoice_no'); ?></th>
                                    <th><?php echo app('translator')->get('contact.customer'); ?></th>
                                    <th><?php echo app('translator')->get('contact.tax_no'); ?></th>
                                    <th><?php echo app('translator')->get('sale.total_amount'); ?></th>
                                    <th><?php echo app('translator')->get('receipt.discount'); ?></th>
                                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <th>
                                            <?php echo e($tax['name'], false); ?>

                                        </th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="bg-gray font-17 text-center footer-total">
                                    <td colspan="4"><strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
                                    <td><span class="display_currency" id="purchase_total" data-currency_symbol ="true"></span></td>
                                    <td>&nbsp;</td>
                                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td>
                                            <span class="display_currency" id="total_output_<?php echo e($tax['id'], false); ?>" data-currency_symbol ="true"></span>
                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="tab-pane" id="expense_tax_tab">
                        <table class="table table-bordered table-striped" id="expense_tax_table" width="100%">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('messages.date'); ?></th>
                                    <th><?php echo app('translator')->get('purchase.ref_no'); ?></th>
                                    <th><?php echo app('translator')->get('contact.tax_no'); ?></th>
                                    <th><?php echo app('translator')->get('sale.total_amount'); ?></th>
                                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <th>
                                            <?php echo e($tax['name'], false); ?>

                                        </th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="bg-gray font-17 text-center footer-total">
                                    <td colspan="3"><strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
                                    <td><span class="display_currency" id="expense_total" data-currency_symbol ="true"></span></td>                                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td>
                                            <span class="display_currency" id="total_expense_<?php echo e($tax['id'], false); ?>" data-currency_symbol ="true"></span>
                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <?php if(!empty($tax_report_tabs)): ?>
                        <?php $__currentLoopData = $tax_report_tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tabs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tax_report_date_range').daterangepicker(
            dateRangeSettings, 
            function(start, end) {
                $('#tax_report_date_range').val(
                    start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format)
                );
            }
        );

        input_tax_table = $('#input_tax_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '/reports/tax-details',
                data: function(d) {
                    d.type = 'purchase';
                    d.location_id = $('#tax_report_location_id').val();
                    var start = $('input#tax_report_date_range')
                        .data('daterangepicker')
                        .startDate.format('YYYY-MM-DD');
                    var end = $('input#tax_report_date_range')
                        .data('daterangepicker')
                        .endDate.format('YYYY-MM-DD');
                    d.start_date = start;
                    d.end_date = end;
                }
            },
            columns: [
                { data: 'transaction_date', name: 'transaction_date' },
                { data: 'ref_no', name: 'ref_no' },
                { data: 'contact_name', name: 'c.name' },
                { data: 'tax_number', name: 'c.tax_number' },
                { data: 'total_before_tax', name: 'total_before_tax' },
                { data: 'discount_amount', name: 'discount_amount' },
                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                { data: "tax_<?php echo e($tax['id'], false); ?>", searchable: false, orderable: false },
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ],
            fnDrawCallback: function(oSettings) {
                $('#sell_total').text(
                    sum_table_col($('#input_tax_table'), 'total_before_tax')
                );
                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    $("#total_input_<?php echo e($tax['id'], false); ?>").text(
                        sum_table_col($('#input_tax_table'), "tax_<?php echo e($tax['id'], false); ?>")
                    );
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                __currency_convert_recursively($('#input_tax_table'));
            },
        });
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            if ($(e.target).attr('href') == '#output_tax_tab') {
                if (typeof (output_tax_datatable) == 'undefined') {
                    output_tax_datatable = $('#output_tax_table').DataTable({
                        processing: true,
                        serverSide: true,
                        aaSorting: [[0, 'desc']],
                        ajax: {
                            url: '/reports/tax-details',
                            data: function(d) {
                                d.type = 'sell';
                                d.location_id = $('#tax_report_location_id').val();
                                var start = $('input#tax_report_date_range')
                                    .data('daterangepicker')
                                    .startDate.format('YYYY-MM-DD');
                                var end = $('input#tax_report_date_range')
                                    .data('daterangepicker')
                                    .endDate.format('YYYY-MM-DD');
                                d.start_date = start;
                                d.end_date = end;
                            }
                        },
                        columns: [
                            { data: 'transaction_date', name: 'transaction_date' },
                            { data: 'invoice_no', name: 'invoice_no' },
                            { data: 'contact_name', name: 'c.name' },
                            { data: 'tax_number', name: 'c.tax_number' },
                            { data: 'total_before_tax', name: 'total_before_tax' },
                            { data: 'discount_amount', name: 'discount_amount' },
                            <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            { data: "tax_<?php echo e($tax['id'], false); ?>", searchable: false, orderable: false },
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ],
                        fnDrawCallback: function(oSettings) {
                            $('#purchase_total').text(
                                sum_table_col($('#output_tax_table'), 'total_before_tax')
                            );
                            <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                $("#total_output_<?php echo e($tax['id'], false); ?>").text(
                                    sum_table_col($('#output_tax_table'), "tax_<?php echo e($tax['id'], false); ?>")
                                );
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            __currency_convert_recursively($('#output_tax_table'));
                        },
                    });
                }
            } else if ($(e.target).attr('href') == '#expense_tax_tab') {
                if (typeof (expense_tax_datatable) == 'undefined') {
                    expense_tax_datatable = $('#expense_tax_table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: '/reports/tax-details',
                            data: function(d) {
                                d.type = 'expense';
                                d.location_id = $('#tax_report_location_id').val();
                                var start = $('input#tax_report_date_range')
                                    .data('daterangepicker')
                                    .startDate.format('YYYY-MM-DD');
                                var end = $('input#tax_report_date_range')
                                    .data('daterangepicker')
                                    .endDate.format('YYYY-MM-DD');
                                d.start_date = start;
                                d.end_date = end;
                            }
                        },
                        columns: [
                            { data: 'transaction_date', name: 'transaction_date' },
                            { data: 'ref_no', name: 'ref_no' },
                            { data: 'tax_number', name: 'c.tax_number' },
                            { data: 'total_before_tax', name: 'total_before_tax' },
                            <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            { data: "tax_<?php echo e($tax['id'], false); ?>", searchable: false, orderable: false },
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ],
                        fnDrawCallback: function(oSettings) {
                            $('#expense_total').text(
                                sum_table_col($('#expense_tax_table'), 'total_before_tax')
                            );
                            <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                $("#total_expense_<?php echo e($tax['id'], false); ?>").text(
                                    sum_table_col($('#expense_tax_table'), "tax_<?php echo e($tax['id'], false); ?>")
                                );
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            __currency_convert_recursively($('#expense_tax_table'));
                        },
                    });
                }
            }
        });
        
        $('#tax_report_date_range, #tax_report_location_id').change( function(){
            if ($("#input_tax_tab").hasClass('active')) {
                input_tax_table.ajax.reload();
            }
            if ($("#output_tax_tab").hasClass('active')) {
                output_tax_datatable.ajax.reload();
            }
            if ($("#expense_tax_tab").hasClass('active')) {
                expense_tax_datatable.ajax.reload();
            }
        });
    });
</script>
<?php if(!empty($tax_report_tabs)): ?>
    <?php $__currentLoopData = $tax_report_tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tabs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!empty($value['module_js_path'])): ?>
                <?php echo $__env->make($value['module_js_path'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<script src="<?php echo e(asset('js/report.js?v=' . $asset_v), false); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/report/tax_report.blade.php ENDPATH**/ ?>