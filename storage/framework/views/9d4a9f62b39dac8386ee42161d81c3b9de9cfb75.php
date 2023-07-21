<?php echo Form::open(['action' => '\Modules\Repair\Http\Controllers\RepairSettingsController@store', 'method' => 'post']); ?>

<div class="row">
    <!-- <div class="col-sm-4">
        <div class="form-group">
            <?php echo Form::label('barcode_id', @trans( 'barcode.barcode_setting' ) . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-cog"></i>
                </span>
                <?php echo Form::select('barcode_id', $barcode_settings, !empty($repair_settings['barcode_id']) ? $repair_settings['barcode_id'] : null, ['class' => 'form-control select2']); ?>

            </div>
        </div>
    </div>

    <div class="col-sm-4">
      <div class="form-group">
        <?php echo Form::label('barcode_type', __('product.barcode_type') . ':'); ?>

          <?php echo Form::select('barcode_type', $barcode_types, !empty($repair_settings['barcode_type']) ? $repair_settings['barcode_type'] : null, ['class' => 'form-control select2', 'required']); ?>

      </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <?php echo Form::label('search_product', __('repair::lang.search_default_product') . ':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('repair::lang.default_product_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-search"></i>
                    </span>
                    <input type="hidden" value="" id="variation_id">
                    <?php echo Form::text('search_product', null, ['class' => 'form-control', 'id' => 'search_product', 'placeholder' => __('lang_v1.search_product_placeholder')]); ?> 
                    <?php echo Form::hidden('default_product', !empty($repair_settings['default_product']) ? $repair_settings['default_product'] : null, ['id' => 'default_product']); ?>

                </div>
                <p class="help-block">
                    <strong><?php echo app('translator')->get('repair::lang.selected_default_product'); ?>:</strong>
                    <span id="selected_default_product"><?php echo e($default_product_name, false); ?></span>
                    <br>
                </p>
        </div>
    </div>-->
</div>
<div class="row">    
    <div class="col-md-3">
        <div class="form-group">
            <label for="repair_status_id">
                <?php echo e(__('repair::lang.default_job_sheet_status') . ':', false); ?>

                <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('repair::lang.default_job_sheet_status_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            </label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fas fa-info-circle"></i>
                </span>
                <select name="default_status" class="form-control" id="repair_status_id"></select>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <?php echo Form::label('job_sheet_prefix', __('repair::lang.job_sheet_prefix') . ':'); ?>

            <?php echo Form::text('job_sheet_prefix', !empty($repair_settings['job_sheet_prefix'])? $repair_settings['job_sheet_prefix'] : '', ['class' => 'form-control', 'placeholder' => __('repair::lang.job_sheet_prefix')]); ?>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <?php echo Form::label('product_configuration', __('repair::lang.product_configuration') . ':'); ?>

            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('repair::lang.product_configuration_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
           <?php echo Form::textarea('product_configuration', !empty($repair_settings['product_configuration'])? $repair_settings['product_configuration'] : null, ['class' => 'form-control', 'rows' => 4]); ?>

        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <?php echo Form::label('problem_reported_by_customer', __('repair::lang.problem_reported_by_customer') . ':'); ?>

            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('repair::lang.problem_reported_by_customer_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            <?php echo Form::textarea('problem_reported_by_customer', !empty($repair_settings['problem_reported_by_customer'])? $repair_settings['problem_reported_by_customer'] : null, ['class' => 'form-control', 'rows' => 4]); ?>

        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <?php echo Form::label('product_condition', __('repair::lang.condition_of_product') . ':'); ?>

            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('repair::lang.product_condition_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            <?php echo Form::textarea('product_condition', !empty($repair_settings['product_condition']) ? $repair_settings['product_condition'] : null, ['class' => 'form-control', 'rows' => 4]); ?>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('repair_tc_condition', __('repair::lang.repair_tc_conditions') . ':'); ?>

            <?php echo Form::textarea('repair_tc_condition',!empty($repair_settings['repair_tc_condition'])? $repair_settings['repair_tc_condition'] : '', ['class' => 'form-control ', 'id' => 'repair_tc_condition']); ?>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group pull-right">
        <?php echo e(Form::submit('update', ['class'=>"btn btn-danger"]), false); ?>

        </div>
    </div>
</div>
<?php echo Form::close(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Repair/Providers/../Resources/views/settings/partials/repair_settings_tab.blade.php ENDPATH**/ ?>