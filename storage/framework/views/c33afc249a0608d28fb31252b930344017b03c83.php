<div class="pos-tab-content">
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
            	<?php echo Form::label('PUSHER_APP_ID', __('superadmin::lang.pusher_app_id') . ':'); ?>

            	<?php echo Form::text('PUSHER_APP_ID', $default_values['PUSHER_APP_ID'], ['class' => 'form-control','placeholder' => __('superadmin::lang.pusher_app_id')]); ?>

            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <?php echo Form::label('PUSHER_APP_KEY', __('superadmin::lang.pusher_app_key') . ':'); ?>

                <?php echo Form::text('PUSHER_APP_KEY', $default_values['PUSHER_APP_KEY'], ['class' => 'form-control','placeholder' => __('superadmin::lang.pusher_app_key')]); ?>


            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <?php echo Form::label('PUSHER_APP_SECRET', __('superadmin::lang.pusher_app_secret') . ':'); ?>

                <?php echo Form::text('PUSHER_APP_SECRET', $default_values['PUSHER_APP_SECRET'], ['class' => 'form-control','placeholder' => __('superadmin::lang.pusher_app_secret')]); ?>


            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <?php echo Form::label('PUSHER_APP_CLUSTER', __('superadmin::lang.pusher_app_cluster') . ':'); ?>

                <?php echo Form::text('PUSHER_APP_CLUSTER', $default_values['PUSHER_APP_CLUSTER'], ['class' => 'form-control','placeholder' => __('superadmin::lang.pusher_app_cluster')]); ?>


            </div>
        </div>
    </div>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Superadmin/Providers/../Resources/views/superadmin_settings/partials/pusher_setting.blade.php ENDPATH**/ ?>