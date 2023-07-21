<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('DiscountController@store'), 'method' => 'post', 'id' => 'discount_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get( 'lang_v1.add_discount' ); ?></h4>
    </div>

    <div class="modal-body">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <?php echo Form::label('name', __( 'unit.name' ) . ':*'); ?>

              <?php echo Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => __( 'unit.name' ) ]); ?>

          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <?php echo Form::label('variation_ids', __('report.products') . ':'); ?>

              <?php echo Form::select('variation_ids[]', [], null, ['id' => "variation_ids", 'class' => 'form-control', 'multiple']); ?>

          </div>
        </div>
        <div class="col-md-6" id="brand_input">
          <div class="form-group">
            <?php echo Form::label('brand_id', __('product.brand') . ':'); ?>

              <?php echo Form::select('brand_id', $brands, null, ['placeholder' => __('messages.please_select'), 'class' => 'form-control select2']); ?>

          </div>
        </div>
        <div class="col-sm-6" id="category_input">
          <div class="form-group">
            <?php echo Form::label('category_id', __('product.category') . ':'); ?>

              <?php echo Form::select('category_id', $categories, null, ['placeholder' => __('messages.please_select'), 'class' => 'form-control select2']); ?>

          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('location_id', __('sale.location') . ':*'); ?>

              <?php echo Form::select('location_id', $locations, null, ['placeholder' => __('messages.please_select'), 'class' => 'form-control select2', 'required']); ?>

          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?php echo Form::label('priority', __( 'lang_v1.priority' ) . ':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.discount_priority_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
              <?php echo Form::text('priority', null, ['class' => 'form-control input_number', 'required', 'placeholder' => __( 'lang_v1.priority' ) ]); ?>

          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('discount_type', __('sale.discount_type') . ':*'); ?>

              <?php echo Form::select('discount_type', ['fixed' => __('lang_v1.fixed'), 'percentage' => __('lang_v1.percentage')], null, ['placeholder' => __('messages.please_select'), 'class' => 'form-control select2', 'required']); ?>

          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?php echo Form::label('discount_amount', __( 'sale.discount_amount' ) . ':*'); ?>

              <?php echo Form::text('discount_amount', null, ['class' => 'form-control input_number', 'required', 'placeholder' => __( 'sale.discount_amount' ) ]); ?>

          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-6">
          <div class="form-group">
            <?php echo Form::label('starts_at', __( 'lang_v1.starts_at' ) . ':'); ?>

              <?php echo Form::text('starts_at', null, ['class' => 'form-control discount_date', 'required', 'placeholder' => __( 'lang_v1.starts_at' ), 'readonly' ]); ?>

          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?php echo Form::label('ends_at', __( 'lang_v1.ends_at' ) . ':'); ?>

              <?php echo Form::text('ends_at', null, ['class' => 'form-control discount_date', 'required', 'placeholder' => __( 'lang_v1.ends_at' ), 'readonly' ]); ?>

          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-6">
          <div class="form-group">
            <br>
            <label>
              <?php echo Form::checkbox('applicable_in_spg', 1, false, ['class' => 'input-icheck']); ?> <strong><?php echo app('translator')->get('lang_v1.applicable_in_cpg'); ?></strong>
            </label>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <br>
            <label>
              <?php echo Form::checkbox('applicable_in_cg', 1, false, ['class' => 'input-icheck']); ?> <strong><?php echo app('translator')->get('lang_v1.applicable_in_cg'); ?></strong>
            </label>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>
              <?php echo Form::checkbox('is_active', 1, true, ['class' => 'input-icheck']); ?> <strong><?php echo app('translator')->get('lang_v1.is_active'); ?></strong>
            </label>
          </div>
        </div>

      </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'messages.save' ); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/discount/create.blade.php ENDPATH**/ ?>