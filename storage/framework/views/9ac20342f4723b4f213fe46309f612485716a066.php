<div class="pos-tab-content">
    <div class="row">
        <div class="col-xs-12">
            <h4><?php echo app('translator')->get('woocommerce::lang.order_created'); ?></h4>
        </div>
    	<div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('woocommerce_wh_oc_secret',  __('woocommerce::lang.webhook_secret') . ':'); ?>

            	<?php echo Form::text('woocommerce_wh_oc_secret', !empty($business->woocommerce_wh_oc_secret) ? $business->woocommerce_wh_oc_secret : null, ['class' => 'form-control','placeholder' => __('woocommerce::lang.webhook_secret')]); ?>

            </div>
        </div>
        <div class="col-xs-8">
            <div class="form-group">
                <strong><?php echo app('translator')->get('woocommerce::lang.webhook_delivery_url'); ?>:</strong>
                <p><?php echo e(action('\Modules\Woocommerce\Http\Controllers\WoocommerceWebhookController@orderCreated', ['business_id' => session()->get('business.id')]), false); ?></p>
            </div>
        </div>

        <div class="col-xs-12">
            <h4><?php echo app('translator')->get('woocommerce::lang.order_updated'); ?></h4>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('woocommerce_wh_ou_secret',  __('woocommerce::lang.webhook_secret') . ':'); ?>

                <?php echo Form::text('woocommerce_wh_ou_secret', !empty($business->woocommerce_wh_oc_secret) ? $business->woocommerce_wh_ou_secret : null, ['class' => 'form-control','placeholder' => __('woocommerce::lang.webhook_secret')]); ?>

            </div>
        </div>
        <div class="col-xs-8">
            <div class="form-group">
                <strong><?php echo app('translator')->get('woocommerce::lang.webhook_delivery_url'); ?>:</strong>
                <p><?php echo e(action('\Modules\Woocommerce\Http\Controllers\WoocommerceWebhookController@orderUpdated', ['business_id' => session()->get('business.id')]), false); ?></p>
            </div>
        </div>

        <div class="col-xs-12">
            <h4><?php echo app('translator')->get('woocommerce::lang.order_deleted'); ?></h4>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('woocommerce_wh_od_secret',  __('woocommerce::lang.webhook_secret') . ':'); ?>

                <?php echo Form::text('woocommerce_wh_od_secret', !empty($business->woocommerce_wh_oc_secret) ? $business->woocommerce_wh_od_secret : null, ['class' => 'form-control','placeholder' => __('woocommerce::lang.webhook_secret')]); ?>

            </div>
        </div>
        <div class="col-xs-8">
            <div class="form-group">
                <strong><?php echo app('translator')->get('woocommerce::lang.webhook_delivery_url'); ?>:</strong>
                <p><?php echo e(action('\Modules\Woocommerce\Http\Controllers\WoocommerceWebhookController@orderDeleted', ['business_id' => session()->get('business.id')]), false); ?></p>
            </div>
        </div>

        <div class="col-xs-12">
            <h4><?php echo app('translator')->get('woocommerce::lang.order_restored'); ?></h4>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('woocommerce_wh_or_secret',  __('woocommerce::lang.webhook_secret') . ':'); ?>

                <?php echo Form::text('woocommerce_wh_or_secret', !empty($business->woocommerce_wh_oc_secret) ? $business->woocommerce_wh_or_secret : null, ['class' => 'form-control','placeholder' => __('woocommerce::lang.webhook_secret')]); ?>

            </div>
        </div>
        <div class="col-xs-8">
            <div class="form-group">
                <strong><?php echo app('translator')->get('woocommerce::lang.webhook_delivery_url'); ?>:</strong>
                <p><?php echo e(action('\Modules\Woocommerce\Http\Controllers\WoocommerceWebhookController@orderRestored', ['business_id' => session()->get('business.id')]), false); ?></p>
            </div>
        </div>

    </div>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Woocommerce/Providers/../Resources/views/woocommerce/partials/webhook_settings.blade.php ENDPATH**/ ?>