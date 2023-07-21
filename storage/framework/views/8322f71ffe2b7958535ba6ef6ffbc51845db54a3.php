<?php $__env->startSection('title', __('woocommerce::lang.woocommerce')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('woocommerce::lang.woocommerce'); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <?php
        $is_superadmin = auth()->user()->can('superadmin');
    ?>
    <div class="row">
        <?php if(!empty($alerts['connection_failed'])): ?>
        <div class="col-sm-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <ul>
                    <li><?php echo e($alerts['connection_failed'], false); ?></li>
                </ul>
            </div>
        </div>
        <?php endif; ?>

        <div class="col-sm-6">
            <?php if($is_superadmin || auth()->user()->can('woocommerce.syc_categories') ): ?>
            <div class="col-sm-12">
               <div class="box box-solid">
                    <div class="box-header">
                        <i class="fa fa-tags"></i>
                        <h3 class="box-title"><?php echo app('translator')->get('woocommerce::lang.sync_product_categories'); ?>:</h3>
                    </div>
                    <div class="box-body">
                        <?php if(!empty($alerts['not_synced_cat']) || !empty($alerts['updated_cat'])): ?>
                        <div class="col-sm-12">
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <ul>
                                    <?php if(!empty($alerts['not_synced_cat'])): ?>
                                        <li><?php echo e($alerts['not_synced_cat'], false); ?></li>
                                    <?php endif; ?>
                                    <?php if(!empty($alerts['updated_cat'])): ?>
                                        <li><?php echo e($alerts['updated_cat'], false); ?></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-primary btn-block" id="sync_product_categories"> <i class="fa fa-refresh"></i> <?php echo app('translator')->get('woocommerce::lang.sync'); ?></button>
                            <span class="last_sync_cat"></span>
                        </div>
                        <div class="col-sm-12">
                            <br>
                            <button type="button" class="btn btn-danger btn-xs" id="reset_categories"> <i class="fa fa-undo"></i> <?php echo app('translator')->get('woocommerce::lang.reset_synced_cat'); ?></button>
                        </div>
                    </div>
               </div>
            </div>
            <?php endif; ?>
            <?php if($is_superadmin || auth()->user()->can('woocommerce.map_tax_rates') ): ?>
            <div class="col-sm-12">
               <div class="box box-solid">
                    <div class="box-header">
                        <i class="fa fa-percent"></i>
                        <h3 class="box-title"><?php echo app('translator')->get('woocommerce::lang.map_tax_rates'); ?>:</h3>
                    </div>
                    <div class="box-body">
                        <?php echo Form::open(['action' => '\Modules\Woocommerce\Http\Controllers\WoocommerceController@mapTaxRates', 'method' => 'post']); ?>

                        <div class="col-xs-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('woocommerce::lang.pos_tax_rate'); ?></th>
                                        <th><?php echo app('translator')->get('woocommerce::lang.equivalent_woocommerce_tax_rate'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($tax_rates)): ?>
                                        <?php $__currentLoopData = $tax_rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax_rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($tax_rate->name, false); ?>:</td>
                                                <td><?php echo Form::select('taxes[' . $tax_rate->id . ']', $woocommerce_tax_rates, $tax_rate->woocommerce_tax_rate_id, ['class' => 'form-control']); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" >
                                            <button type="submit" class="btn btn-danger pull-right">
                                                <?php echo app('translator')->get('messages.save'); ?>
                                            </button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <div class="col-sm-6">
            <?php if($is_superadmin || auth()->user()->can('woocommerce.sync_products') ): ?>
            <div class="col-sm-12">
                <div class="box box-solid">
                    <div class="box-header">
                        <i class="fa fa-cubes"></i>
                        <h3 class="box-title"><?php echo app('translator')->get('woocommerce::lang.sync_products'); ?>:</h3>
                    </div>
                    <div class="box-body">
                        <?php if(!empty($alerts['not_synced_product']) || !empty($alerts['not_updated_product'])): ?>
                        <div class="col-sm-12">
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <ul>
                                    <?php if(!empty($alerts['not_synced_product'])): ?>
                                        <li><?php echo e($alerts['not_synced_product'], false); ?></li>
                                    <?php endif; ?>
                                    <?php if(!empty($alerts['not_updated_product'])): ?>
                                        <li><?php echo e($alerts['not_updated_product'], false); ?></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="col-sm-6">
                            <div style="display: inline-flex; width: 100%;">
                                <button type="button" class="btn btn-warning btn-block sync_products" data-sync-type="new"> <i class="fa fa-refresh"></i> <?php echo app('translator')->get('woocommerce::lang.sync_only_new'); ?></button> &nbsp;<?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('woocommerce::lang.sync_new_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                            </div>
                            <span class="last_sync_new_products"></span>
                        </div>
                        <div class="col-sm-6">
                            <div style="display: inline-flex; width: 100%;">
                                <button type="button" class="btn btn-primary btn-block sync_products" data-sync-type="all"> <i class="fa fa-refresh"></i> <?php echo app('translator')->get('woocommerce::lang.sync_all'); ?></button> &nbsp;<?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('woocommerce::lang.sync_all_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                            </div>
                            <span class="last_sync_all_products"></span>
                        </div>
                        <div class="col-sm-12">
                            <br>
                            <button type="button" class="btn btn-danger btn-xs" id="reset_products"> <i class="fa fa-undo"></i> <?php echo app('translator')->get('woocommerce::lang.reset_synced_products'); ?></button>
                        </div>
                    </div>
               </div>
           </div>
           <?php endif; ?>
           <?php if($is_superadmin || auth()->user()->can('woocommerce.sync_orders') ): ?>
           <div class="col-sm-12">
               <div class="box box-solid">
                    <div class="box-header">
                        <i class="fa fa-cart-plus"></i>
                        <h3 class="box-title"><?php echo app('translator')->get('woocommerce::lang.sync_orders'); ?>:</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-success btn-block" id="sync_orders"> <i class="fa fa-refresh"></i> <?php echo app('translator')->get('woocommerce::lang.sync'); ?></button>
                            <span class="last_sync_orders"></span>
                        </div>
                    </div>
               </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    $(document).ready( function() {
        syncing_text = '<i class="fa fa-refresh fa-spin"></i> ' + "<?php echo e(__('woocommerce::lang.syncing'), false); ?>...";
        update_sync_date();

        //Sync Product Categories
        $('#sync_product_categories').click( function(){
            $(window).bind('beforeunload', function(){
                return true;
            });
            var btn_html = $(this).html(); 
            $(this).html(syncing_text); 
            $(this).attr('disabled', true);
            $.ajax({
                url: "<?php echo e(action('\Modules\Woocommerce\Http\Controllers\WoocommerceController@syncCategories'), false); ?>",
                dataType: "json",
                timeout: 0,
                success: function(result){
                    if(result.success){
                        toastr.success(result.msg);
                        update_sync_date();
                    } else {
                        toastr.error(result.msg);
                    }
                    $('#sync_product_categories').html(btn_html);
                    $('#sync_product_categories').removeAttr('disabled');
                    $(window).unbind('beforeunload');
                }
            });          
        });

        //Sync Products
        $('.sync_products').click( function(){
            $(window).bind('beforeunload', function(){
                return true;
            });
            var btn = $(this);
            var btn_html = btn.html(); 
            btn.html(syncing_text); 
            btn.attr('disabled', true);
            var type = $(this).data('sync-type');

            $.ajax({
                url: "<?php echo e(action('\Modules\Woocommerce\Http\Controllers\WoocommerceController@syncProducts'), false); ?>?type=" + type,
                dataType: "json",
                timeout: 0,
                success: function(result){
                    if(result.success){
                        toastr.success(result.msg);
                        update_sync_date();
                    } else {
                        toastr.error(result.msg);
                    }
                    btn.html(btn_html);
                    btn.removeAttr('disabled');
                    $(window).unbind('beforeunload');
                }
            });          
        });

        //Sync Orders
        $('#sync_orders').click( function(){
            $(window).bind('beforeunload', function(){
                return true;
            });
            var btn = $(this);
            var btn_html = btn.html(); 
            btn.html(syncing_text); 
            btn.attr('disabled', true);

            $.ajax({
                url: "<?php echo e(action('\Modules\Woocommerce\Http\Controllers\WoocommerceController@syncOrders'), false); ?>",
                dataType: "json",
                timeout: 0,
                success: function(result){
                    if(result.success){
                        toastr.success(result.msg);
                        update_sync_date();
                    } else {
                        toastr.error(result.msg);
                    }
                    btn.html(btn_html);
                    btn.removeAttr('disabled');
                    $(window).unbind('beforeunload');
                }
            });            
        });
    });

    function update_sync_date() {
        $.ajax({
            url: "<?php echo e(action('\Modules\Woocommerce\Http\Controllers\WoocommerceController@getSyncLog'), false); ?>",
            dataType: "json",
            timeout: 0,
            success: function(data){
                if(data.categories){
                    $('span.last_sync_cat').html('<small><?php echo e(__("woocommerce::lang.last_synced"), false); ?>: ' + data.categories + '</small>');
                }
                if(data.new_products){
                    $('span.last_sync_new_products').html('<small><?php echo e(__("woocommerce::lang.last_synced"), false); ?>: ' + data.new_products + '</small>');
                }
                if(data.all_products){
                    $('span.last_sync_all_products').html('<small><?php echo e(__("woocommerce::lang.last_synced"), false); ?>: ' + data.all_products + '</small>');
                }
                if(data.orders){
                    $('span.last_sync_orders').html('<small><?php echo e(__("woocommerce::lang.last_synced"), false); ?>: ' + data.orders + '</small>');
                }
                
            }
        });     
    }

    //Reset Synced Categories
    $(document).on('click', 'button#reset_categories', function(){
        var checkbox = document.createElement("div");
        checkbox.setAttribute('class', 'checkbox');
        checkbox.innerHTML = '<label><input type="checkbox" id="yes_reset_cat"> <?php echo e(__("woocommerce::lang.yes_reset"), false); ?></label>';
        swal({
          title: LANG.sure,
          text: "<?php echo e(__('woocommerce::lang.confirm_reset_cat'), false); ?>",
          icon: "warning",
          content: checkbox,
          buttons: true,
          dangerMode: true,
        }).then((confirm) => {
            if(confirm) {
                if($('#yes_reset_cat').is(":checked")) {
                    $(window).bind('beforeunload', function(){
                        return true;
                    });
                    var btn = $(this);
                    btn.attr('disabled', true);
                    $.ajax({
                        url: "<?php echo e(action('\Modules\Woocommerce\Http\Controllers\WoocommerceController@resetCategories'), false); ?>",
                        dataType: "json",
                        success: function(result){
                            if(result.success == true){
                                toastr.success(result.msg);
                            } else {
                                toastr.error(result.msg);
                            }
                            btn.removeAttr('disabled');
                            $(window).unbind('beforeunload');
                            location.reload();
                        }
                    });
                }
            }
        });
    });

    //Reset Synced products
    $(document).on('click', 'button#reset_products', function(){
        var checkbox = document.createElement("div");
        checkbox.setAttribute('class', 'checkbox');
        checkbox.innerHTML = '<label><input type="checkbox" id="yes_reset_product"> <?php echo e(__("woocommerce::lang.yes_reset"), false); ?></label>';
        swal({
          title: LANG.sure,
          text: "<?php echo e(__('woocommerce::lang.confirm_reset_product'), false); ?>",
          icon: "warning",
          content: checkbox,
          buttons: true,
          dangerMode: true,
        }).then((confirm) => {
            if(confirm) {
                if($('#yes_reset_product').is(":checked")) {
                    $(window).bind('beforeunload', function(){
                        return true;
                    });
                    var btn = $(this);
                    btn.attr('disabled', true);
                    $.ajax({
                        url: "<?php echo e(action('\Modules\Woocommerce\Http\Controllers\WoocommerceController@resetProducts'), false); ?>",
                        dataType: "json",
                        success: function(result){
                            if(result.success == true){
                                toastr.success(result.msg);
                            } else {
                                toastr.error(result.msg);
                            }
                            btn.removeAttr('disabled');
                            $(window).unbind('beforeunload');
                            location.reload();
                        }
                    });
                }
            }
        });
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Woocommerce/Providers/../Resources/views/woocommerce/index.blade.php ENDPATH**/ ?>