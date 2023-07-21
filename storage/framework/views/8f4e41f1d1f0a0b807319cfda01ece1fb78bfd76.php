
<?php $__env->startSection('title','تقرير يومية مبيعات'); ?>

<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
 <section class="content-header">
        <h1><?php echo e(__('report.sales_representative'), false); ?></h1>
    </section>

    <!-- Main content -->
<section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php $__env->startComponent('components.filters', ['title' =>'تقرير يومية مبيعات']); ?>
                    <?php echo Form::open(['url' => action('ReportController@getStockReport'), 'method' => 'get', 'id' => 'sales_representative_filter_form' ]); ?>

                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo Form::label('sr_id2',  __('report.user') . ':'); ?>

                            <?php echo Form::select('sr_id2', $users, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('report.all_users')]); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo Form::label('sr_business_id2',  __('business.business_location') . ':'); ?>

                            <?php echo Form::select('sr_business_id2', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%']); ?>

                        </div>
                    </div>

                <div class="clearfix"></div>


                    <div class="col-lg-3">
                        <label>من تاريخ :</label>
                        <div class="input-group date" data-provide="datepicker">
                            <input type="text" class="form-control" id="startdate"
                                   value="<?php echo e(Carbon\Carbon::now()->toDateString(), false); ?>" readonly
                            >
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <label>إلي تاريخ :</label>
                        <div class="input-group date" data-provide="datepicker">
                            <input type="text" class="form-control " id="enddate"
                            value="<?php echo e(Carbon\Carbon::now()->toDateString(), false); ?>" readonly
                            >
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>






                    <?php echo Form::close(); ?>

                <?php echo $__env->renderComponent(); ?>
            </div>
        </div>
<div style="margin: auto" id="sellsalldiv">


</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/report.js?v=' . $asset_v), false); ?>"></script>
    <script src="<?php echo e(asset('js/payment.js?v=' . $asset_v), false); ?>"></script>

<script>

    $(document).ready(function() {
        $('.date').datepicker({
            format: 'yyyy-mm-dd',
            /* startDate: '-3d'*/
        });
        salesRepresentativeTotalSales();

        $('select#sr_id2, select#sr_business_id2,#startdate,#enddate').change(function() {
            salesRepresentativeTotalSales()
        });


        function salesRepresentativeTotalSales() {

            var start = $('#startdate').val();
            var end = $('#enddate').val();

            var data_expense = {
                created_by: $('select#sr_id2').val(),
                location_id: $('select#sr_business_id2').val(),
                start_date: start,
                end_date: end,
            };

            $.ajax({
                method: 'GET',
                url: '/reports/getsells',
                data: data_expense,
                success: function (data) {
                       $('#sellsalldiv').html(data);
                }
            });
        }

    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/report/sellsall.blade.php ENDPATH**/ ?>