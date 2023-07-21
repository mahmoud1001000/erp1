<div class="pos-tab-content">
	<div class="row">
		<div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('payroll_ref_no_prefix',  __('essentials::lang.payroll_ref_no_prefix') . ':'); ?>

                <?php echo Form::text('payroll_ref_no_prefix', !empty($settings['payroll_ref_no_prefix']) ? $settings['payroll_ref_no_prefix'] : null, ['class' => 'form-control','placeholder' => __('essentials::lang.payroll_ref_no_prefix')]); ?>

            </div>
        </div>
	</div>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Essentials/Providers/../Resources/views/settings/partials/payroll_settings.blade.php ENDPATH**/ ?>