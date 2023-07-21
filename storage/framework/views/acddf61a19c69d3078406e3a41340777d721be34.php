<script type="text/javascript">
	$(document).ready(function(){
		$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            if ($(e.target).attr('href') == '#ouput-tax-project-invoice') {
                if (typeof (output_tax_project_invoice_datatable) == 'undefined') {
                    output_tax_project_invoice_datatable = $('#output_tax_project_invoice_table').DataTable({
                        processing: true,
                        serverSide: true,
                        aaSorting: [[0, 'desc']],
                        ajax: {
                            url: '/project/project-invoice-tax-report',
                            data: function(d) {
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
                            $('#project_invoice_total').text(
                                sum_table_col($('#output_tax_project_invoice_table'), 'total_before_tax')
                            );
                            <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                $("#total_output_pi_<?php echo e($tax['id'], false); ?>").text(
                                    sum_table_col($('#output_tax_project_invoice_table'), "tax_<?php echo e($tax['id'], false); ?>")
                                );
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            __currency_convert_recursively($('#output_tax_project_invoice_table'));
                        },
                    });
                } else {
                	output_tax_project_invoice_datatable.ajax.reload();
                }
            }
        });

        $('#tax_report_date_range').change( function(){
            if ($("#ouput-tax-project-invoice").hasClass('active')) {
                output_tax_project_invoice_datatable.ajax.reload();
            }
        });
	});
</script><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Project/Providers/../Resources/views/tax_report/tax_report_js.blade.php ENDPATH**/ ?>