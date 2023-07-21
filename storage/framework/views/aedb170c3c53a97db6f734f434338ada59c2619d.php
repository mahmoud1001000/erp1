<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <?php echo Form::open(['url' => action('ProductController@saveQuickProduct'), 'method' => 'post', 'id' => 'quick_add_product_form' ]); ?>


    <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      <h4 class="modal-title" id="modalTitle"><?php echo app('translator')->get( 'product.add_new_product' ); ?></h4>
    </div>
    <div class="modal-body">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <?php echo Form::label('name', __('product.product_name') . ':*'); ?>

              <?php echo Form::text('name', $product_name, ['class' => 'form-control', 'required',
              'placeholder' => __('product.product_name')]); ?>

              <?php echo Form::select('type', ['single' => 'Single', 'variable' => 'Variable'], 'single', ['class' => 'hide', 'id' => 'type']); ?>

          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('sku', __('product.sku') . ':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.sku') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            <?php echo Form::text('sku', null, ['class' => 'form-control',
              'placeholder' => __('product.sku')]); ?>

          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('barcode_type', __('product.barcode_type') . ':*'); ?>

              <?php echo Form::select('barcode_type', $barcode_types, 'C128', ['class' => 'form-control select2', 'required']); ?>

          </div>
        </div>
        <div class="clearfix"></div>

        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('unit_id', __('product.unit') . ':*'); ?>

              <?php echo Form::select('unit_id', $units, null, ['class' => 'form-control select2', 'required']); ?>

          </div>
        </div>

        <div class="col-sm-4 <?php if(!session('business.enable_sub_units')): ?> hide <?php endif; ?>">
          <div class="form-group">
            <?php echo Form::label('sub_unit_ids', __('lang_v1.related_sub_units') . ':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.sub_units_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>

            <?php echo Form::select('sub_unit_ids[]', [], null, ['class' => 'form-control select2', 'multiple', 'id' => 'sub_unit_ids']); ?>

          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('brand_id', __('product.brand') . ':'); ?>

              <?php echo Form::select('brand_id', $brands, null, ['placeholder' => __('messages.please_select'), 'class' => 'form-control select2']); ?>

          </div>
        </div>
        
        <div class="clearfix"></div>
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('category_id', __('product.category') . ':'); ?>

              <?php echo Form::select('category_id', $categories, null, ['placeholder' => __('messages.please_select'), 'class' => 'form-control select2']); ?>

          </div>
        </div>

        <div class="col-sm-4 <?php if(!(session('business.enable_category') && session('business.enable_sub_category'))): ?> hide <?php endif; ?>">
          <div class="form-group">
            <?php echo Form::label('sub_category_id', __('product.sub_category') . ':'); ?>

              <?php echo Form::select('sub_category_id', [], null, ['placeholder' => __('messages.please_select'), 'class' => 'form-control select2']); ?>

          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
          <br>
            <label>
              <?php echo Form::checkbox('enable_stock', 1, true, ['class' => 'input-icheck', 'id' => 'enable_stock']); ?> <strong><?php echo app('translator')->get('product.manage_stock'); ?></strong>
            </label><?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.enable_stock') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?> <p class="help-block"><i><?php echo app('translator')->get('product.enable_stock_help'); ?></i></p>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4" id="alert_quantity_div">
          <div class="form-group">
            <?php echo Form::label('alert_quantity', __('product.alert_quantity') . ':'); ?>

            <?php echo Form::number('alert_quantity', null, ['class' => 'form-control',
            'placeholder' => __('product.alert_quantity'), 'min' => '0']); ?>

          </div>
        </div>
        <?php if(!empty($common_settings['enable_product_warranty'])): ?>
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('warranty_id', __('lang_v1.warranty') . ':'); ?>

            <?php echo Form::select('warranty_id', $warranties, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select')]); ?>

          </div>
        </div>
        <?php endif; ?>
        <?php if(session('business.enable_product_expiry')): ?>
          <?php if(session('business.expiry_type') == 'add_expiry'): ?>
              <?php
                $expiry_period = 12;
                $hide = true;
              ?>
          <?php else: ?>
              <?php
                $expiry_period = null;
                $hide = false;
              ?>
          <?php endif; ?>
        <div class="col-sm-4 <?php if($hide): ?> hide <?php endif; ?>">
          <div class="form-group">
            <div class="multi-input">
              <?php echo Form::label('expiry_period', __('product.expires_in') . ':'); ?><br>
              <?php echo Form::text('expiry_period', $expiry_period, ['class' => 'form-control pull-left input_number',
                'placeholder' => __('product.expiry_period'), 'style' => 'width:60%;']); ?>

              <?php echo Form::select('expiry_period_type', ['months'=>__('product.months'), 'days'=>__('product.days'), '' =>__('product.not_applicable') ], 'months', ['class' => 'form-control select2 pull-left', 'style' => 'width:40%;', 'id' => 'expiry_period_type']); ?>

            </div>
          </div>
        </div>
        <?php endif; ?>
        <?php
          $default_location = null;
          if(count($business_locations) == 1){
            $default_location = array_key_first($business_locations->toArray());
          }
        ?>
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('product_locations', __('business.business_locations') . ':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.product_location_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
              <?php echo Form::select('product_locations[]', $business_locations, $default_location, ['class' => 'form-control select2', 'multiple', 'id' => 'product_locations']); ?>

          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('weight',  __('lang_v1.weight') . ':'); ?>

            <?php echo Form::text('weight', null, ['class' => 'form-control', 'placeholder' => __('lang_v1.weight')]); ?>

          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-8">
          <div class="form-group">
            <?php echo Form::label('product_description', __('lang_v1.product_description') . ':'); ?>

              <?php echo Form::textarea('product_description', null, ['class' => 'form-control']); ?>

          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('tax', __('product.applicable_tax') . ':'); ?>

              <?php echo Form::select('tax', $taxes, null, ['placeholder' => __('messages.please_select'), 'class' => 'form-control select2'], $tax_attributes); ?>

          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('tax_type', __('product.selling_price_tax_type') . ':*'); ?>

              <?php echo Form::select('tax_type', ['inclusive' => __('product.inclusive'), 'exclusive' => __('product.exclusive')], 'exclusive',
              ['class' => 'form-control select2', 'required']); ?>

          </div>
        </div>
        <div class="col-sm-4">
          <div class="checkbox">
          <br>
            <label>
              <?php echo Form::checkbox('enable_sr_no', 1, false, ['class' => 'input-icheck']); ?> <strong><?php echo app('translator')->get('lang_v1.enable_imei_or_sr_no'); ?></strong>
            </label><?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.tooltip_sr_no') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
          </div>
        </div>
        <div class="clearfix"></div>
        <?php
        $custom_labels = json_decode(session('business.custom_labels'), true);
        $product_custom_field1 = !empty($custom_labels['product']['custom_field_1']) ? $custom_labels['product']['custom_field_1'] : __('lang_v1.product_custom_field1');
        $product_custom_field2 = !empty($custom_labels['product']['custom_field_2']) ? $custom_labels['product']['custom_field_2'] : __('lang_v1.product_custom_field2');
        $product_custom_field3 = !empty($custom_labels['product']['custom_field_3']) ? $custom_labels['product']['custom_field_3'] : __('lang_v1.product_custom_field3');
        $product_custom_field4 = !empty($custom_labels['product']['custom_field_4']) ? $custom_labels['product']['custom_field_4'] : __('lang_v1.product_custom_field4');
      ?>
        <div class="col-sm-4">
          <div class="form-group">
            <br>
            <label>
              <?php echo Form::checkbox('not_for_selling', 1, false, ['class' => 'input-icheck']); ?> <strong><?php echo app('translator')->get('lang_v1.not_for_selling'); ?></strong>
            </label> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.tooltip_not_for_selling') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('product_custom_field1',  $product_custom_field1 . ':'); ?>

            <?php echo Form::text('product_custom_field1', null, ['class' => 'form-control', 'placeholder' => $product_custom_field1]); ?>

          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('product_custom_field2',  $product_custom_field2 . ':'); ?>

            <?php echo Form::text('product_custom_field2',null, ['class' => 'form-control', 'placeholder' => $product_custom_field2]); ?>

          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('product_custom_field3',  $product_custom_field3 . ':'); ?>

            <?php echo Form::text('product_custom_field3', null, ['class' => 'form-control', 'placeholder' => $product_custom_field3]); ?>

          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('product_custom_field4',  $product_custom_field4 . ':'); ?>

            <?php echo Form::text('product_custom_field4', null, ['class' => 'form-control', 'placeholder' => $product_custom_field4]); ?>

          </div>
        </div>
        <div class="clearfix"></div>
        <?php if(!empty($module_form_parts)): ?>
          <?php $__currentLoopData = $module_form_parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!empty($value['template_path'])): ?>
              <?php
                $template_data = $value['template_data'] ?: [];
              ?>
              <?php echo $__env->make($value['template_path'], $template_data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
      <div class="row">
        <div class="form-group col-sm-11 col-sm-offset-1">
          <?php echo $__env->make('product.partials.single_product_form_part', ['profit_percent' => $default_profit_percent, 'quick_add' => true ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
      </div>
      <?php if(!empty($product_for) && $product_for == 'pos'): ?>
        <?php echo $__env->make('product.partials.quick_product_opening_stock', ['locations' => $locations], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php endif; ?>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary" id="submit_quick_product"><?php echo app('translator')->get( 'messages.save' ); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script type="text/javascript">
  $(document).ready(function(){
    $("form#quick_add_product_form").validate({
      rules: {
          sku: {
              remote: {
                  url: "/products/check_product_sku",
                  type: "post",
                  data: {
                      sku: function() {
                          return $( "#sku" ).val();
                      },
                      product_id: function() {
                          if($('#product_id').length > 0 ){
                              return $('#product_id').val();
                          } else {
                              return '';
                          }
                      },
                  }
              }
          },
          expiry_period:{
              required: {
                  depends: function(element) {
                      return ($('#expiry_period_type').val().trim() != '');
                  }
              }
          }
      },
      messages: {
          sku: {
              remote: LANG.sku_already_exists
          }
      },
      submitHandler: function (form) {
        
        var form = $("form#quick_add_product_form");
        var url = form.attr('action');
        form.find('button[type="submit"]').attr('disabled', true);
        $.ajax({
            method: "POST",
            url: url,
            dataType: 'json',
            data: $(form).serialize(),
            success: function(data){
                $('.quick_add_product_modal').modal('hide');
                if( data.success){
                    toastr.success(data.msg);
                    if (typeof get_purchase_entry_row !== 'undefined') {
                      var selected_location = $('#location_id').val();
                      var location_check = true;
                      if (data.locations && selected_location && data.locations.indexOf(selected_location) == -1) {
                        location_check = false;
                      }
                      if (location_check) {
                        get_purchase_entry_row( data.product.id, 0 );
                      }
                      
                    }
                    $(document).trigger({type: "quickProductAdded", 'product': data.product, 'variation': data.variation });
                } else {
                    toastr.error(data.msg);
                }
            }
        });
        return false;
      }
    });
  });
</script><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/product/partials/quick_add_product.blade.php ENDPATH**/ ?>