<?php $__env->startSection('title', __( 'manufacturing::lang.manufacturing_report' )); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get( 'manufacturing::lang.manufacturing_report' ); ?>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="print_section"><h2><?php echo e(session()->get('business.name'), false); ?> - <?php echo app('translator')->get( 'manufacturing::lang.manufacturing_report' ); ?></h2></div>
    
    <div class="row no-print">
        <div class="col-md-3 col-md-offset-7 col-xs-6">
            <div class="input-group">
                <span class="input-group-addon bg-light-blue"><i class="fa fa-map-marker"></i></span>
                 <select class="form-control select2" id="mfg_report_location_filter">
                    <?php $__currentLoopData = $business_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key, false); ?>"><?php echo e($value, false); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-md-2 col-xs-6">
            <div class="form-group pull-right">
                <div class="input-group">
                  <button type="button" class="btn btn-primary" id="mfg_report_date_filter">
                    <span>
                      <i class="fa fa-calendar"></i> <?php echo e(__('messages.filter_by_date'), false); ?>

                    </span>
                    <i class="fa fa-caret-down"></i>
                  </button>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-6">
            <?php $__env->startComponent('components.widget'); ?>
                <table class="table table-striped">
                    <tr>
                        <th><?php echo e(__('manufacturing::lang.total_production'), false); ?>:</th>
                        <td>
                            <span class="total_production">
                                <i class="fa fa-refresh fa-spin fa-fw"></i>
                            </span>
                        </td>
                    </tr> 
                    <tr>
                        <th><?php echo e(__('manufacturing::lang.total_production_cost'), false); ?>:</th>
                        <td>
                            <span class="total_production_cost">
                                <i class="fa fa-refresh fa-spin fa-fw"></i>
                            </span>
                        </td>
                    </tr>      
                </table>
            <?php echo $__env->renderComponent(); ?>
        </div>

        <div class="col-xs-6">
            <?php $__env->startComponent('components.widget'); ?>
                <table class="table table-striped">
                    <tr>
                        <th><?php echo e(__('lang_v1.total_sold'), false); ?>:</th>
                        <td>
                            <span class="total_sold">
                                <i class="fa fa-refresh fa-spin fa-fw"></i>
                            </span>
                        </td>
                    </tr>
                </table>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <br>
    <div class="row no-print">
        <div class="col-md-3">
            <a href="<?php echo e(action('ReportController@getStockReport'), false); ?>?only_mfg=true" class="btn btn-info btn-flat btn-block"><?php echo app('translator')->get('report.stock_report'); ?></a>
        </div>
        <?php if(session('business.enable_lot_number') == 1): ?>
        <div class="col-md-3">
            <a href="<?php echo e(action('ReportController@getLotReport'), false); ?>?only_mfg=true" class="btn btn-success btn-flat btn-block"><?php echo app('translator')->get('lang_v1.lot_report'); ?></a>
        </div>
        <?php endif; ?>
        <?php if(session('business.enable_product_expiry') == 1): ?>
        <div class="col-md-3">
            <a href="<?php echo e(action('ReportController@getStockExpiryReport'), false); ?>?only_mfg=true" class="btn btn-warning btn-flat btn-block"><?php echo app('translator')->get('report.stock_expiry_report'); ?></a>
        </div>
        <?php endif; ?>
        <div class="col-md-3">
            <a href="<?php echo e(action('ReportController@itemsReport'), false); ?>?only_mfg=true" class="btn btn-danger btn-flat btn-block"><?php echo app('translator')->get('lang_v1.items_report'); ?></a>
        </div>
    </div>
    <br>
    <div class="row no-print">
        <div class="col-sm-12">
            <button type="button" class="btn btn-primary pull-right" 
            aria-label="Print" onclick="window.print();"
            ><i class="fa fa-print"></i> <?php echo app('translator')->get( 'messages.print' ); ?></button>
        </div>
    </div>
	

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    $(document).ready( function() {
        if ($('#mfg_report_date_filter').length == 1) {
            $('#mfg_report_date_filter').daterangepicker(dateRangeSettings, function(start, end) {
                $('#mfg_report_date_filter span').html(
                    start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format)
                );
                updateMfgReport();
            });
            $('#mfg_report_date_filter').on('cancel.daterangepicker', function(ev, picker) {
                $('#mfg_report_date_filter').html(
                    '<i class="fa fa-calendar"></i> ' + LANG.filter_by_date
                );
            });
        }
        updateMfgReport();
        $('#mfg_report_location_filter').change(function() {
            updateMfgReport();
        });

        function updateMfgReport() {
            var start = $('#mfg_report_date_filter')
                .data('daterangepicker')
                .startDate.format('YYYY-MM-DD');
            var end = $('#mfg_report_date_filter')
                .data('daterangepicker')
                .endDate.format('YYYY-MM-DD');
            var location_id = $('#mfg_report_location_filter').val();

            var data = { start_date: start, end_date: end, location_id: location_id };

            var loader = __fa_awesome();
            $(
                '.total_production, .total_sold, .total_production_cost'
            ).html(loader);

            $.ajax({
                method: 'GET',
                url: '/manufacturing/report',
                dataType: 'json',
                data: data,
                success: function(data) {
                    $('.total_production').html(__currency_trans_from_en(data.total_production, true));
                    $('.total_sold').html(__currency_trans_from_en(data.total_sold, true));
                    $('.total_production_cost').html(__currency_trans_from_en(data.total_production_cost, true));
                },
            });
        }
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Manufacturing/Providers/../Resources/views/production/report.blade.php ENDPATH**/ ?>