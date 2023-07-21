<div class="pos-tab-content">
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label>
                <?php echo Form::checkbox('enable_offline_payment', 1,!empty($settings["enable_offline_payment"]), 
                [ 'class' => 'input-icheck']); ?>

                <?php echo app('translator')->get('superadmin::lang.enable_offline_payment'); ?>
                </label>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <?php echo Form::label('offline_payment_details', __('superadmin::lang.offline_payment_details') . ':'); ?>

                <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('superadmin::lang.offline_payment_details_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                <?php echo Form::textarea('offline_payment_details', !empty($settings["offline_payment_details"]) ? $settings["offline_payment_details"] : null, ['class' => 'form-control','placeholder' => __('superadmin::lang.offline_payment_details'), 'rows' => 3]); ?>

            </div>
        </div>
    </div>
    <div class="row">
    	<h4>Stripe:</h4>
    	<div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('STRIPE_PUB_KEY', __('superadmin::lang.stripe_pub_key') . ':'); ?>

            	<?php echo Form::text('STRIPE_PUB_KEY', $default_values['STRIPE_PUB_KEY'], ['class' => 'form-control','placeholder' => __('superadmin::lang.stripe_pub_key')]); ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('STRIPE_SECRET_KEY', __('superadmin::lang.stripe_secret_key') . ':'); ?>

            	<?php echo Form::text('STRIPE_SECRET_KEY', $default_values['STRIPE_SECRET_KEY'], ['class' => 'form-control','placeholder' => __('superadmin::lang.stripe_secret_key')]); ?>

            </div>
        </div>

        <div class="clearfix"></div>
        
        <h4>Paypal:</h4>
        <div class="col-xs-6">
            <div class="form-group">
            	<?php echo Form::label('PAYPAL_MODE', __('superadmin::lang.paypal_mode') . ':'); ?>

            	<?php echo Form::select('PAYPAL_MODE',['live' => 'Live', 'sandbox' => 'Sandbox'],  $default_values['PAYPAL_MODE'], ['class' => 'form-control','placeholder' => __('messages.please_select')]); ?>

            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('PAYPAL_SANDBOX_API_USERNAME', __('superadmin::lang.paypal_sandbox_api_username') . ':'); ?>

            	<?php echo Form::text('PAYPAL_SANDBOX_API_USERNAME', $default_values['PAYPAL_SANDBOX_API_USERNAME'], ['class' => 'form-control','placeholder' => __('superadmin::lang.paypal_sandbox_api_username')]); ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('PAYPAL_SANDBOX_API_PASSWORD', __('superadmin::lang.paypal_sandbox_api_password') . ':'); ?>

            	<?php echo Form::text('PAYPAL_SANDBOX_API_PASSWORD', $default_values['PAYPAL_SANDBOX_API_PASSWORD'], ['class' => 'form-control','placeholder' => __('superadmin::lang.paypal_sandbox_api_password')]); ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('PAYPAL_SANDBOX_API_SECRET', __('superadmin::lang.paypal_sandbox_api_secret') . ':'); ?>

            	<?php echo Form::text('PAYPAL_SANDBOX_API_SECRET', $default_values['PAYPAL_SANDBOX_API_SECRET'], ['class' => 'form-control','placeholder' => __('superadmin::lang.paypal_sandbox_api_secret')]); ?>

            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('PAYPAL_LIVE_API_USERNAME', __('superadmin::lang.paypal_live_api_username') . ':'); ?>

            	<?php echo Form::text('PAYPAL_LIVE_API_USERNAME', $default_values['PAYPAL_LIVE_API_USERNAME'], ['class' => 'form-control','placeholder' => __('superadmin::lang.paypal_live_api_username')]); ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('PAYPAL_LIVE_API_PASSWORD', __('superadmin::lang.paypal_live_api_password') . ':'); ?>

            	<?php echo Form::text('PAYPAL_LIVE_API_PASSWORD', $default_values['PAYPAL_LIVE_API_PASSWORD'], ['class' => 'form-control','placeholder' => __('superadmin::lang.paypal_live_api_password')]); ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('PAYPAL_LIVE_API_SECRET', __('superadmin::lang.paypal_live_api_secret') . ':'); ?>

            	<?php echo Form::text('PAYPAL_LIVE_API_SECRET', $default_values['PAYPAL_LIVE_API_SECRET'], ['class' => 'form-control','placeholder' => __('superadmin::lang.paypal_live_api_secret')]); ?>

            </div>
        </div>

        <div class="clearfix"></div>
        
        <h4>Razorpay: <small>(For INR India)</small></h4>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('RAZORPAY_KEY_ID', 'Key ID:'); ?>

                <?php echo Form::text('RAZORPAY_KEY_ID', $default_values['RAZORPAY_KEY_ID'], ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('RAZORPAY_KEY_SECRET', 'Key Secret:'); ?>

                <?php echo Form::text('RAZORPAY_KEY_SECRET', $default_values['RAZORPAY_KEY_SECRET'], ['class' => 'form-control']); ?>

            </div>
        </div>




        <div class="clearfix"></div>
        
        <h4>Pesapal: <small>(For KES currency)</small></h4>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('PESAPAL_CONSUMER_KEY', 'Consumer Key:'); ?>

                <?php echo Form::text('PESAPAL_CONSUMER_KEY', $default_values['PESAPAL_CONSUMER_KEY'], ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('PESAPAL_CONSUMER_SECRET', 'Consumer Secret:'); ?>

                <?php echo Form::text('PESAPAL_CONSUMER_SECRET', $default_values['PESAPAL_CONSUMER_SECRET'], ['class' => 'form-control']); ?>

            </div>
        </div>

        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('PESAPAL_LIVE', 'Is Live?'); ?>

                <?php echo Form::select('PESAPAL_LIVE',['false' => 'False', 'true' => 'True'],  $default_values['PESAPAL_LIVE'], ['class' => 'form-control']); ?>

            </div>
        </div>

        <div class="clearfix"></div>
        <div class="col-xs-12">
            <br/>
            <p class="help-block"><i><?php echo app('translator')->get('superadmin::lang.payment_gateway_help'); ?></i></p>
        </div>
    </div>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Superadmin/Providers/../Resources/views/superadmin_settings/partials/payment_gateways.blade.php ENDPATH**/ ?>