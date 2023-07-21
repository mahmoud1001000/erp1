<?php $__env->startSection('title', __('lang_v1.product_purchase_report')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(__('lang_v1.product_purchase_report'), false); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
          <?php echo Form::open(['url' => action('ReportController@getStockReport'), 'method' => 'get', 'id' => 'product_purchase_report_form' ]); ?>

            <div class="col-md-3">
                <div class="form-group">
                <?php echo Form::label('search_product', __('lang_v1.search_product') . ':'); ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-search"></i>
                        </span>
                        <input type="hidden" value="" id="variation_id">
                        <?php echo Form::text('search_product', null, ['class' => 'form-control', 'id' => 'search_product', 'placeholder' => __('lang_v1.search_product_placeholder'), 'autofocus']); ?>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('supplier_id', __('purchase.supplier') . ':'); ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <?php echo Form::select('supplier_id', $suppliers, null, ['class' => 'form-control select2', 'placeholder' => __('messages.all'), 'required']); ?>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('location_id', __('purchase.business_location').':'); ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-map-marker"></i>
                        </span>
                        <?php echo Form::select('location_id', $business_locations, null, ['class' => 'form-control select2',  'required']); ?>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">

                    <?php echo Form::label('product_pr_date_filter', __('report.date_range') . ':'); ?>

                    <?php echo Form::text('date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'id' => 'product_pr_date_filter', 'readonly']); ?>

                </div>
            </div>
            <?php echo Form::close(); ?>

            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped"        id="product_purchase_report_table">
                        <thead>
                            <tr>
                                <th>ارتجاع</th>
                                <th><?php echo app('translator')->get('sale.product'); ?></th>
                                <th><?php echo app('translator')->get('product.sku'); ?></th>
                                <th><?php echo app('translator')->get('purchase.supplier'); ?></th>
                                <th><?php echo app('translator')->get('purchase.ref_no'); ?></th>
                                <th><?php echo app('translator')->get('messages.date'); ?></th>
                                <th><?php echo app('translator')->get('sale.qty'); ?></th>
                                <th><?php echo app('translator')->get('lang_v1.total_unit_adjusted'); ?></th>
                                <th><?php echo app('translator')->get('lang_v1.unit_perchase_price'); ?></th>
                                <th><?php echo app('translator')->get('sale.subtotal'); ?></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-gray font-17 footer-total text-center">
                                <td colspan="6"><strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
                                <td id="footer_total_purchase"></td>
                                <td id="footer_total_adjusted"></td>
                                <td></td>
                                <td><span class="display_currency" id="footer_subtotal" data-currency_symbol ="true"></span></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
</section>
<!-- /.content -->
<div class="modal fade view_register" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/report.js?v=' . $asset_v), false); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/report/product_purchase_report.blade.php ENDPATH**/ ?>