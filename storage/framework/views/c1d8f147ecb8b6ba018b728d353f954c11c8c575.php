<div class="pos-tab-content">
    <div class="row">
    	<div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('MAIL_DRIVER', __('superadmin::lang.mail_driver') . ':'); ?>

            	<?php echo Form::select('MAIL_DRIVER', $mail_drivers, $default_values['MAIL_DRIVER'], ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('MAIL_HOST', __('superadmin::lang.mail_host') . ':'); ?>

            	<?php echo Form::text('MAIL_HOST', $default_values['MAIL_HOST'], ['class' => 'form-control','placeholder' => __('superadmin::lang.mail_host')]); ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('MAIL_PORT', __('superadmin::lang.mail_port') . ':'); ?>

            	<?php echo Form::text('MAIL_PORT', $default_values['MAIL_PORT'], ['class' => 'form-control','placeholder' => __('superadmin::lang.mail_port')]); ?>

            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('MAIL_USERNAME', __('superadmin::lang.mail_username') . ':'); ?>

                <?php echo Form::text('MAIL_USERNAME', $default_values['MAIL_USERNAME'], ['class' => 'form-control','placeholder' => __('superadmin::lang.mail_username')]); ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('MAIL_PASSWORD', __('superadmin::lang.mail_password') . ':'); ?>

                <?php echo Form::text('MAIL_PASSWORD', $default_values['MAIL_PASSWORD'], ['class' => 'form-control','placeholder' => __('superadmin::lang.mail_password')]); ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('MAIL_ENCRYPTION', __('superadmin::lang.mail_encryption') . ':'); ?>

                <?php echo Form::text('MAIL_ENCRYPTION', $default_values['MAIL_ENCRYPTION'], ['class' => 'form-control','placeholder' => __('superadmin::lang.mail_encryption_place')]); ?>

            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('MAIL_FROM_ADDRESS', __('superadmin::lang.mail_from_address') . ':'); ?>

                <?php echo Form::email('MAIL_FROM_ADDRESS', $default_values['MAIL_FROM_ADDRESS'], ['class' => 'form-control','placeholder' => __('superadmin::lang.mail_from_address')]); ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('MAIL_FROM_NAME', __('superadmin::lang.mail_from_name') . ':'); ?>

                <?php echo Form::text('MAIL_FROM_NAME', $default_values['MAIL_FROM_NAME'], ['class' => 'form-control','placeholder' => __('superadmin::lang.mail_from_name')]); ?>

            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-4">
            <div class="form-group">
                <label>
                <?php echo Form::checkbox('allow_email_settings_to_businesses', 1,!empty($settings["allow_email_settings_to_businesses"]), 
                [ 'class' => 'input-icheck']); ?>

                <?php echo app('translator')->get('superadmin::lang.allow_email_settings_to_businesses'); ?> 
                </label>
                <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('superadmin::lang.allow_email_settings_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>
                <?php echo Form::checkbox('enable_new_business_registration_notification', 1,!empty($settings["enable_new_business_registration_notification"]), 
                [ 'class' => 'input-icheck']); ?>

                <?php echo app('translator')->get('superadmin::lang.enable_new_business_registration_notification'); ?> 
                </label> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('superadmin::lang.new_business_notification_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>
                <?php echo Form::checkbox('enable_new_subscription_notification', 1,!empty($settings["enable_new_subscription_notification"]), 
                [ 'class' => 'input-icheck']); ?>

                <?php echo app('translator')->get('superadmin::lang.enable_new_subscription_notification'); ?> 
                </label> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('superadmin::lang.new_subscription_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-12">
            <hr>
            <div class="form-group">
                <label>
                    <?php echo Form::checkbox('enable_welcome_email', 1, isset($settings["enable_welcome_email"]) ? (int)$settings["enable_welcome_email"] : false, 
                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'superadmin::lang.enable_welcome_email' ), false); ?>

                </label> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('superadmin::lang.new_business_welcome_notification_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            </div>
        </div>
        <div class="col-xs-12">
            <h4><?php echo app('translator')->get('superadmin::lang.welcome_email_template'); ?>:</h4>
            <strong><?php echo app('translator')->get('lang_v1.available_tags'); ?>:</strong> {business_name}, {owner_name} <br><br>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <?php echo Form::label('welcome_email_subject', __('superadmin::lang.welcome_email_subject') . ':'); ?>

                <?php echo Form::text('welcome_email_subject', isset($settings["welcome_email_subject"]) ? $settings["welcome_email_subject"] : '', ['class' => 'form-control','placeholder' => __('superadmin::lang.welcome_email_subject')]); ?>

            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <?php echo Form::label('welcome_email_body', __('superadmin::lang.welcome_email_body') . ':'); ?>

                <?php echo Form::textarea('welcome_email_body', isset($settings["welcome_email_body"]) ? $settings["welcome_email_body"] : '', ['class' => 'form-control','placeholder' => __('superadmin::lang.welcome_email_body')]); ?>

            </div>
        </div>
    </div>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Superadmin/Providers/../Resources/views/superadmin_settings/partials/email_smtp_settings.blade.php ENDPATH**/ ?>