<?php $__env->startSection('title', __('report.stock_report')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(__('report.stock_report'), false); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
              <?php echo Form::open(['url' => action('ReportController@getStockReport'), 'method' => 'get', 'id' => 'stock_report_filter_form' ]); ?>

                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('location_id',  __('purchase.business_location') . ':'); ?>

                        <?php echo Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%']); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('category_id', __('category.category') . ':'); ?>

                        <?php echo Form::select('category', $categories, null, ['placeholder' => __('messages.all'), 'class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'category_id']); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('sub_category_id', __('product.sub_category') . ':'); ?>

                        <?php echo Form::select('sub_category', array(), null, ['placeholder' => __('messages.all'), 'class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'sub_category_id']); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('brand', __('product.brand') . ':'); ?>

                        <?php echo Form::select('brand', $brands, null, ['placeholder' => __('messages.all'), 'class' => 'form-control select2', 'style' => 'width:100%']); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('unit',__('product.unit') . ':'); ?>

                        <?php echo Form::select('unit', $units, null, ['placeholder' => __('messages.all'), 'class' => 'form-control select2', 'style' => 'width:100%']); ?>

                    </div>
                </div>
                <?php if($show_manufacturing_data): ?>
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
            <?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
            <table class="table no-border">
                <tr>
                    <td><?php echo app('translator')->get('report.closing_stock'); ?> (<?php echo app('translator')->get('lang_v1.by_purchase_price'); ?>)</td>
                    <td><?php echo app('translator')->get('report.closing_stock'); ?> (<?php echo app('translator')->get('lang_v1.by_sale_price'); ?>)</td>
                    <td><?php echo app('translator')->get('lang_v1.potential_profit'); ?></td>
                    <td><?php echo app('translator')->get('lang_v1.profit_margin'); ?></td>
                </tr>
                <tr>
                    <td><h3 id="closing_stock_by_pp" class="mb-0 mt-0"></h3></td>
                    <td><h3 id="closing_stock_by_sp" class="mb-0 mt-0"></h3></td>
                    <td><h3 id="potential_profit" class="mb-0 mt-0"></h3></td>
                    <td><h3 id="profit_margin" class="mb-0 mt-0"></h3></td>
                </tr>
            </table>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
                <?php echo $__env->make('report.partials.stock_report_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/report.js?v=' . $asset_v), false); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/report/stock_report.blade.php ENDPATH**/ ?>