<div class="box box-solid">
    <div class="box-header">
      <h3 class="box-title"><?php echo app('translator')->get('lang_v1.types_of_service_module_settings'); ?></h3>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('types_of_service_label', __('lang_v1.types_of_service_label') . ':' ); ?>

            <?php echo Form::text('module_info[types_of_service][types_of_service_label]', !empty($module_info['types_of_service']['types_of_service_label']) ? $module_info['types_of_service']['types_of_service_label'] : null, ['class' => 'form-control',
              'placeholder' => __('lang_v1.types_of_service_label') ]); ?>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <br>
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('module_info[types_of_service][show_types_of_service]', 1, !empty($module_info['types_of_service']['show_types_of_service']), ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_types_of_service'); ?></label>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <br>
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('module_info[types_of_service][show_tos_custom_fields]', 1, !empty($module_info['types_of_service']['show_tos_custom_fields']), ['class' => 'input-icheck']); ?> <?php echo app('translator')->get('lang_v1.show_tos_custom_fields'); ?></label>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/types_of_service/invoice_layout_settings.blade.php ENDPATH**/ ?>