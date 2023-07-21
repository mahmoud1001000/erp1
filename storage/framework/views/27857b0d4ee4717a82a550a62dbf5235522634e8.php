<?php $__env->startSection('title', __('report.stock_expiry_report')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(__('report.stock_expiry_report'), false); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
              <?php echo Form::open(['url' => action('ReportController@getStockExpiryReport'), 'method' => 'get', 'id' => 'stock_report_filter_form' ]); ?>

                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('location_id',  __('purchase.business_location') . ':'); ?>

                        <?php echo Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%']); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('category_id', __('product.category') . ':'); ?>

                        <?php echo Form::select('category', $categories, null, ['placeholder' => __('lang_v1.all'), 'class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'category_id']); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('sub_category_id', __('product.sub_category') . ':'); ?>

                        <?php echo Form::select('sub_category', array(), null, ['placeholder' => __('lang_v1.all'), 'class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'sub_category_id']); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('brand', __('product.brand') . ':'); ?>

                        <?php echo Form::select('brand', $brands, null, ['placeholder' => __('lang_v1.all'), 'class' => 'form-control select2', 'style' => 'width:100%']); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('unit', __('product.unit') . ':'); ?>

                        <?php echo Form::select('unit', $units, null, ['placeholder' => __('lang_v1.all'), 'class' => 'form-control select2', 'style' => 'width:100%']); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('view_stock_filter', __('report.view_stocks') . ':'); ?>

                        <?php echo Form::select('view_stock_filter', $view_stock_filter, null, ['placeholder' => __('messages.all'), 'class' => 'form-control select2', 'style' => 'width:100%']); ?>

                    </div>
                </div>
                <?php if(Module::has('Manufacturing')): ?>
                    <div class="col-md-3">
                        <div class="form-group">
                            <br>
                            <div class="checkbox">
                                <label>
                                  <?php echo Form::checkbox('only_mfg', 1, false, 
                                  [ 'class' => 'input-icheck', 'id' => 'only_mfg_products']); ?> <?php echo e(__('manufacturing::lang.only_mfg_products'), false); ?>

                                </label>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php echo Form::close(); ?>

            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="stock_expiry_report_table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('business.product'); ?></th>
                            <th>SKU</th>
                            <!-- <th><?php echo app('translator')->get('purchase.ref_no'); ?></th> -->
                            <th><?php echo app('translator')->get('business.location'); ?></th>
                            <th><?php echo app('translator')->get('report.stock_left'); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.lot_number'); ?></th>
                            <th><?php echo app('translator')->get('product.exp_date'); ?></th>
                            <th><?php echo app('translator')->get('product.mfg_date'); ?></th>
                           <!--  <th><?php echo app('translator')->get('messages.edit'); ?></th> -->
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="bg-gray font-17 text-center footer-total">
                            <td colspan="3"><strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
                            <td id="footer_total_stock_left"></td>
                            <td colspan="3"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
</section>
<!-- /.content -->

<div class="modal fade exp_update_modal" tabindex="-1" role="dialog">
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/report.js?v=' . $asset_v), false); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/report/stock_expiry_report.blade.php ENDPATH**/ ?>