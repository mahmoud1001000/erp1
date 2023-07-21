<?php $__env->startSection('title', __('lang_v1.product_sell_report')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header no-print">
    مرتجع المبيعات
</section>

<!-- Main content -->
<section class="content no-print">
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
              <?php echo Form::open(['url' => action('ReportController@getStockReport'), 'method' => 'get', 'id' => 'product_sell_report_form' ]); ?>

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
                        <?php echo Form::label('customer_id', __('contact.customer') . ':'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php echo Form::select('customer_id', $customers, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required']); ?>

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
                            <?php echo Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">

                        <?php echo Form::label('product_sr_date_filter', __('report.date_range') . ':'); ?>

                        <?php echo Form::text('date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'id' => 'product_sr_date_filter', 'readonly']); ?>

                    </div>
                </div>
                <?php echo Form::close(); ?>

            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        
                    </li>
                   
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="psr_detailed_tab">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" 
                            id="product_sell_report_table">
                                <thead>
                                    <tr>
                                        <th>ارتجاع</th>
                                        <th><?php echo app('translator')->get('sale.product'); ?></th>
                                        <th><?php echo app('translator')->get('product.sku'); ?></th>
                                        <th><?php echo app('translator')->get('sale.customer_name'); ?></th>
                                        <th><?php echo app('translator')->get('lang_v1.contact_id'); ?></th>
                                        <th><?php echo app('translator')->get('sale.invoice_no'); ?></th>
                                        <th><?php echo app('translator')->get('messages.date'); ?></th>
                                        <th><?php echo app('translator')->get('sale.qty'); ?></th>
                                        <th><?php echo app('translator')->get('sale.unit_price'); ?></th>
                                        <th><?php echo app('translator')->get('sale.discount'); ?></th>
                                        <th><?php echo app('translator')->get('sale.tax'); ?></th>
                                        <th><?php echo app('translator')->get('sale.price_inc_tax'); ?></th>
                                        <th><?php echo app('translator')->get('sale.total'); ?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="bg-gray font-17 footer-total text-center">
                                        <td colspan="6"><strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
                                        <td id="footer_total_sold"></td>
                                        <td></td>
                                        <td></td>
                                        <td id="footer_tax"></td>
                                        <td></td>
                                        <td><span class="display_currency" id="footer_subtotal" data-currency_symbol ="true"></span></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="psr_detailed_with_purchase_tab">
                        <div class="table-responsive">
                            <?php if(session('business.enable_lot_number')): ?>
                                <input type="hidden" id="lot_enabled">
                            <?php endif; ?>
                            <table class="table table-bordered table-striped" 
                            id="product_sell_report_with_purchase_table" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('sale.product'); ?></th>
                                        <th><?php echo app('translator')->get('product.sku'); ?></th>
                                        <th><?php echo app('translator')->get('sale.customer_name'); ?></th>
                                        <th><?php echo app('translator')->get('sale.invoice_no'); ?></th>
                                        <th><?php echo app('translator')->get('messages.date'); ?></th>
                                        <th><?php echo app('translator')->get('lang_v1.purchase_ref_no'); ?></th>
                                        <th><?php echo app('translator')->get('lang_v1.lot_number'); ?></th>
                                        <th><?php echo app('translator')->get('lang_v1.supplier_name'); ?></th>
                                        <th><?php echo app('translator')->get('sale.qty'); ?></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane" id="psr_grouped_tab">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" 
                            id="product_sell_grouped_report_table" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('sale.product'); ?></th>
                                        <th><?php echo app('translator')->get('product.sku'); ?></th>
                                        <th><?php echo app('translator')->get('messages.date'); ?></th>
                                        <th><?php echo app('translator')->get('report.current_stock'); ?></th>
                                        <th><?php echo app('translator')->get('report.total_unit_sold'); ?></th>
                                        <th><?php echo app('translator')->get('sale.total'); ?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="bg-gray font-17 footer-total text-center">
                                
                                        <td colspan="4"><strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
                                        <td id="footer_total_grouped_sold"></td>
                                        <td><span class="display_currency" id="footer_grouped_subtotal" data-currency_symbol ="true"></span></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/report/product_sell_return_report.blade.php ENDPATH**/ ?>