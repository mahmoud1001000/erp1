
<?php $__env->startSection('title', $business->name); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header text-center" id="top">
    <h2><?php echo e($business->name, false); ?></h2>
    <h4 class="mb-0"><?php echo e($business_location->name, false); ?></h4>
    <p><?php echo $business_location->location_address; ?></p>
</section>
<section class="no-print">
    <div class="container">
        <!-- Static navbar -->
        <nav class="navbar navbar-default mb-0 bg-white">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand menu" href="#top"><?php echo app('translator')->get('report.products'); ?></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="#category<?php echo e($key, false); ?>" class="menu"><?php echo e($value, false); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        <li><a href="#category0" class="menu">Uncategorized</a></li>           
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>
    </div> <!-- /container -->
</section>
<!-- Main content -->
<section class="content pt-0">
    <div class="container">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-header" id="category<?php echo e($product_category->first()->category->id ?? 0, false); ?>"><?php echo e($product_category->first()->category->name ?? 'Uncategorized', false); ?></h2>
                </div>
            </div>
            <div class="row eq-height-row">
            <?php $__currentLoopData = $product_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3 eq-height-col">
                    <div class="box box-solid product-box">
                        <div class="box-body">
                            <a href="#" class="show-product-details" data-href="<?php echo e(action('\Modules\ProductCatalogue\Http\Controllers\ProductCatalogueController@show',  [$business->id, $product->id]), false); ?>?location_id=<?php echo e($business_location->id, false); ?>">
                            <img src="<?php echo e($product->image_url, false); ?>" class="img-responsive catalogue"></a>

                            <?php
                                $discount = $discounts->firstWhere('brand_id', $product->brand_id);
                                if(empty($discount)){
                                    $discount = $discounts->firstWhere('category_id', $product->category_id);
                                }
                            ?>

                            <?php if(!empty($discount)): ?>
                                <span class="label label-warning discount-badge">- <?php echo e(number_format($discount->discount_amount, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>%</span>
                            <?php endif; ?>

                            <?php
                                $max_price = $product->variations->max('sell_price_inc_tax');
                                $min_price = $product->variations->min('sell_price_inc_tax');
                            ?>
                            <h2 class="catalogue-title">
                                <a href="#" class="show-product-details" data-href="<?php echo e(action('\Modules\ProductCatalogue\Http\Controllers\ProductCatalogueController@show',  [$business->id, $product->id]), false); ?>?location_id=<?php echo e($business_location->id, false); ?>">
                                    <?php echo e($product->name, false); ?>

                                </a>
                            </h2>
                            <table class="table no-border product-info-table">
                                <tr>
                                    <th class="pb-0"> <?php echo app('translator')->get('lang_v1.price'); ?>:</th>
                                    <td class="pb-0">
                                        <span class="display_currency" data-currency_symbol="true"><?php echo e(number_format($max_price, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?></span> <?php if($max_price != $min_price): ?> - <span class="display_currency" data-currency_symbol="true"><?php echo e(number_format($min_price, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?></span> <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="pb-0"> <?php echo app('translator')->get('product.sku'); ?>:</th>
                                    <td class="pb-0"><?php echo e($product->sku, false); ?></td>
                                </tr>
                            <?php if($product->type == 'variable'): ?>
                                <?php
                                    $variations = $product->variations->groupBy('product_variation_id');
                                ?>
                                <?php $__currentLoopData = $variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th><?php echo e($product_variation->first()->product_variation->name, false); ?>:</th>
                                        <td>
                                            <select class="form-control input-sm">
                                            <?php $__currentLoopData = $product_variation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($variation->id, false); ?>"><?php echo e($variation->name, false); ?> (<?php echo e($variation->sub_sku, false); ?>) - <?php echo e(number_format($variation->sell_price_inc_tax, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            </table>
                        </div>
                    </div>
                </div>
            <?php if($loop->iteration%4 == 0): ?>
                <div class="clearfix"></div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<!-- /.content -->
<!-- Add currency related field-->
<input type="hidden" id="__code" value="<?php echo e($business->currency->code, false); ?>">
<input type="hidden" id="__symbol" value="<?php echo e($business->currency->symbol, false); ?>">
<input type="hidden" id="__thousand" value="<?php echo e($business->currency->thousand_separator, false); ?>">
<input type="hidden" id="__decimal" value="<?php echo e($business->currency->decimal_separator, false); ?>">
<input type="hidden" id="__symbol_placement" value="<?php echo e($business->currency->currency_symbol_placement, false); ?>">
<input type="hidden" id="__precision" value="<?php echo e(config('constants.currency_precision', 2), false); ?>">
<input type="hidden" id="__quantity_precision" value="<?php echo e(config('constants.quantity_precision', 2), false); ?>">
<div class="modal fade product_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">

    (function($) {
        "use strict";

    $(document).ready( function() {
        //Set global currency to be used in the application
        __currency_symbol = $('input#__symbol').val();
        __currency_thousand_separator = $('input#__thousand').val();
        __currency_decimal_separator = $('input#__decimal').val();
        __currency_symbol_placement = $('input#__symbol_placement').val();
        if ($('input#__precision').length > 0) {
            __currency_precision = $('input#__precision').val();
        } else {
            __currency_precision = 2;
        }

        if ($('input#__quantity_precision').length > 0) {
            __quantity_precision = $('input#__quantity_precision').val();
        } else {
            __quantity_precision = 2;
        }

        //Set page level currency to be used for some pages. (Purchase page)
        if ($('input#p_symbol').length > 0) {
            __p_currency_symbol = $('input#p_symbol').val();
            __p_currency_thousand_separator = $('input#p_thousand').val();
            __p_currency_decimal_separator = $('input#p_decimal').val();
        }

        __currency_convert_recursively($('.content'));
    });

    $(document).on('click', '.show-product-details', function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).data('href'),
            dataType: 'html',
            success: function(result) {
                $('.product_modal')
                    .html(result)
                    .modal('show');
                __currency_convert_recursively($('.product_modal'));
            },
        });
    });

    $(document).on('click', '.menu', function(e){
        e.preventDefault();
        var cat_id = $(this).attr('href');
        if ($(cat_id).length) {
            $('html, body').animate({
                scrollTop: $(cat_id).offset().top
            }, 1000);
        }
    });

    })(jQuery);

    $(window).scroll(function() {
        var height = $(window).scrollTop();

        if(height  > 180) {
            $('nav').addClass('navbar-fixed-top');
        } else {
            $('nav').removeClass('navbar-fixed-top');
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/ProductCatalogue/Providers/../Resources/views/catalogue/index.blade.php ENDPATH**/ ?>