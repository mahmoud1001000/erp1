<div class="pos-tab-content">
    <div class="row">
        <div class="col-xs-4">
            <div class="checkbox">
                <label>
                    <br/>
                    <?php echo Form::checkbox('allow_users_for_attendance', 1, !empty($settings['allow_users_for_attendance']), ['class' => 'input-icheck'] ); ?> <?php echo app('translator')->get('essentials::lang.allow_users_for_attendance'); ?>
                </label>
            </div>
        </div>
        <div class="col-xs-12">
            <strong><?php echo app('translator')->get('essentials::lang.grace_time'); ?>:</strong>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <?php echo Form::label('grace_before_checkin',  __('essentials::lang.grace_before_checkin') . ':'); ?>

                <?php echo Form::number('grace_before_checkin', !empty($settings['grace_before_checkin']) ? $settings['grace_before_checkin'] : null, ['class' => 'form-control','placeholder' => __('essentials::lang.grace_before_checkin'), 'step' => 1]); ?>

                <p class="help-block"><?php echo app('translator')->get('essentials::lang.grace_before_checkin_help'); ?></p>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <?php echo Form::label('grace_after_checkin',  __('essentials::lang.grace_after_checkin') . ':'); ?>

                <?php echo Form::number('grace_after_checkin', !empty($settings['grace_after_checkin']) ? $settings['grace_after_checkin'] : null, ['class' => 'form-control','placeholder' => __('essentials::lang.grace_after_checkin'), 'step' => 1]); ?>

                <p class="help-block"><?php echo app('translator')->get('essentials::lang.grace_after_checkin_help'); ?></p>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <?php echo Form::label('grace_before_checkout',  __('essentials::lang.grace_before_checkout') . ':'); ?>

                <?php echo Form::number('grace_before_checkout', !empty($settings['grace_before_checkout']) ? $settings['grace_before_checkout'] : null, ['class' => 'form-control','placeholder' => __('essentials::lang.grace_before_checkout'), 'step' => 1]); ?>

                <p class="help-block"><?php echo app('translator')->get('essentials::lang.grace_before_checkout_help'); ?></p>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <?php echo Form::label('grace_after_checkout',  __('essentials::lang.grace_after_checkout') . ':'); ?>

                <?php echo Form::number('grace_after_checkout', !empty($settings['grace_after_checkout']) ? $settings['grace_after_checkout'] : null, ['class' => 'form-control','placeholder' => __('essentials::lang.grace_after_checkout'), 'step' => 1]); ?>

                <p class="help-block"><?php echo app('translator')->get('essentials::lang.grace_before_checkin_help'); ?></p>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Essentials/Providers/../Resources/views/settings/partials/attendance_settings.blade.php ENDPATH**/ ?>