<div class="pos-tab-content">
    <div class="row">
    	<div class="col-xs-12">
            <div class="form-group">
            	<?php echo Form::label('additional_js', __('superadmin::lang.additional_js') . ':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('superadmin::lang.additional_js_instructions') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            	<?php echo Form::textarea('additional_js', !empty($settings['additional_js']) ? $settings['additional_js'] : '', ['class' => 'form-control','placeholder' => __('superadmin::lang.additional_js')]); ?>

            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
            	<?php echo Form::label('additional_css', __('superadmin::lang.additional_css') . ':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('superadmin::lang.additional_css_instructions') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            	<?php echo Form::textarea('additional_css', !empty($settings['additional_css']) ? $settings['additional_css'] : '', ['class' => 'form-control','placeholder' => __('superadmin::lang.additional_css')]); ?>

            </div>
        </div>
    </div>
</div><?php /**PATH /home/u373816316/domains/erp4anyone.com/public_html/4any/Modules/Superadmin/Providers/../Resources/views/superadmin_settings/partials/additional_js_css.blade.php ENDPATH**/ ?>