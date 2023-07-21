

<?php $__env->startSection('title', __('report.reports')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('crm::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Content Header (Page header) -->
<section class="content-header no-print">
   <h1><?php echo app('translator')->get('report.reports'); ?></h1>
</section>

<section class="content no-print">
    <div class="row">
        <div class="col-md-12">
        	<?php $__env->startComponent('components.widget', ['class' => 'box-solid', 'title' => __('crm::lang.follow_ups_by_user')]); ?>
                <table class="table table-bordered table-striped" id="follow_ups_by_user_table" style="width: 100%;">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('role.user'); ?></th>
                            <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <th>
                                    <?php echo e($value, false); ?>

                                </th>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <th>
                                <?php echo app('translator')->get('lang_v1.others'); ?>
                            </th>
                            <th>
                                <?php echo app('translator')->get('crm::lang.total_follow_ups'); ?>
                            </th>
                        </tr>
                    </thead>
                </table>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-solid', 'title' => __('crm::lang.follow_ups_by_contacts')]); ?>
                <table class="table table-bordered table-striped" id="follow_ups_by_contact_table" style="width: 100%;">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('contact.contact'); ?></th>
                            <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <th>
                                    <?php echo e($value, false); ?>

                                </th>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <th>
                                <?php echo app('translator')->get('lang_v1.others'); ?>
                            </th>
                            <th>
                                <?php echo app('translator')->get('crm::lang.total_follow_ups'); ?>
                            </th>
                        </tr>
                    </thead>
                </table>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-solid', 'title' => __('crm::lang.lead_to_customer_conversion')]); ?>
                <table class="table table-bordered table-striped" id="lead_to_customer_conversion" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th><?php echo app('translator')->get('crm::lang.converted_by'); ?></th>
                            <th><?php echo app('translator')->get('sale.total'); ?></th>
                        </tr>
                    </thead>
                </table>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            var follow_ups_by_user_table = 
            $("#follow_ups_by_user_table").DataTable({
                processing: true,
                serverSide: true,
                scrollY: "75vh",
                scrollX: true,
                scrollCollapse: true,
                fixedHeader: false,
                'ajax': {
                    url: "<?php echo e(action('\Modules\Crm\Http\Controllers\ReportController@followUpsByUser'), false); ?>"
                },
                columns: [
                    { data: 'full_name', name: 'full_name' },
                    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        { data: 'count_<?php echo e($key, false); ?>', searchable: false },
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    { data: 'count_nulled', searchable: false },
                    { data: 'total_follow_ups', searchable: false }
                ],
            });

            var follow_ups_by_contact_table = 
            $("#follow_ups_by_contact_table").DataTable({
                processing: true,
                serverSide: true,
                scrollY: "75vh",
                scrollX: true,
                scrollCollapse: true,
                fixedHeader: false,
                'ajax': {
                    url: "<?php echo e(action('\Modules\Crm\Http\Controllers\ReportController@followUpsContact'), false); ?>"
                },
                columns: [
                    { data: 'contact_name', name: 'contact_name' },
                    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        { data: 'count_<?php echo e($key, false); ?>', searchable: false },
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    { data: 'count_nulled', searchable: false },
                    { data: 'total_follow_ups', searchable: false }
                ],
            });

            var lead_to_customer_conversion = 
            $("#lead_to_customer_conversion").DataTable({
                processing: true,
                serverSide: true,
                scrollY: "75vh",
                scrollX: true,
                scrollCollapse: true,
                fixedHeader: false,
                aaSorting: [[1, 'desc']],
                'ajax': {
                    url: "<?php echo e(action('\Modules\Crm\Http\Controllers\ReportController@leadToCustomerConversion'), false); ?>"
                },
                columns: [
                    {
                        orderable: false,
                        searchable: false,
                        data: null,
                        defaultContent: '',
                    },
                    { data: 'full_name', name: 'full_name' },
                    { data: 'total_conversions', searchable: false }
                ],
                createdRow: function(row, data, dataIndex) {
                    $(row).find('td:eq(0)')
                        .addClass('details-control');
                },
            });

            // Array to track the ids of the details displayed rows
            var ltc_detail_rows = [];

            $('#lead_to_customer_conversion tbody').on('click', 'tr td.details-control', function() {
                var tr = $(this).closest('tr');
                var row = lead_to_customer_conversion.row(tr);
                var idx = $.inArray(tr.attr('id'), ltc_detail_rows);

                if (row.child.isShown()) {
                    tr.removeClass('details');
                    row.child.hide();

                    // Remove from the 'open' array
                    ltc_detail_rows.splice(idx, 1);
                } else {
                    tr.addClass('details');

                    row.child(show_lead_to_customer_details(row.data())).show();

                    // Add to the 'open' array
                    if (idx === -1) {
                        ltc_detail_rows.push(tr.attr('id'));
                    }
                }
            });

            // On each draw, loop over the `detailRows` array and show any child rows
            lead_to_customer_conversion.on('draw', function() {
                $.each(ltc_detail_rows, function(i, id) {
                    $('#' + id + ' td.details-control').trigger('click');
                });
            });

            function show_lead_to_customer_details(rowData) {
                var div = $('<div/>')
                    .addClass('loading')
                    .text('Loading...');
                $.ajax({
                    url: '/crm/lead-to-customer-details/' + rowData.DT_RowId,
                    dataType: 'html',
                    success: function(data) {
                        div.html(data).removeClass('loading');
                    },
                });

                return div;
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Crm/Providers/../Resources/views/reports/index.blade.php ENDPATH**/ ?>