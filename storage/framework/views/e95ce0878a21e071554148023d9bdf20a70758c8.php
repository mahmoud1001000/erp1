<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('CustomerGroupController@update', [$customer_group->id]), 'method' => 'PUT', 'id' => 'customer_group_edit_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get( 'lang_v1.edit_customer_group' ); ?></h4>
    </div>

    <div class="modal-body">
      <div class="form-group">
        <?php echo Form::label('name', __( 'lang_v1.customer_group_name' ) . ':*'); ?>

        <?php echo Form::text('name', $customer_group->name, ['class' => 'form-control', 'required', 'placeholder' => __( 'lang_v1.customer_group_name' )]); ?>

      </div>
      <div class="form-group">
            <?php echo Form::label('price_calculation_type', __( 'lang_v1.price_calculation_type' ) . ':'); ?>

            <?php echo Form::select('price_calculation_type',['percentage' => __('lang_v1.percentage'), 'selling_price_group' => __('lang_v1.selling_price_group')], $customer_group->price_calculation_type, ['class' => 'form-control']); ?>

      </div>
      <div class="form-group percentage-field <?php if($customer_group->price_calculation_type != 'percentage'): ?> hide <?php endif; ?>">
        <?php echo Form::label('amount', __( 'lang_v1.calculation_percentage' ) . ':'); ?>

        <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.tooltip_calculation_percentage') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
        <?php echo Form::text('amount', number_format($customer_group->amount, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input_number','placeholder' => __( 'lang_v1.calculation_percentage')]); ?>

      </div>

      <div class="form-group selling_price_group-field <?php if($customer_group->price_calculation_type != 'selling_price_group'): ?> hide <?php endif; ?>">
            <?php echo Form::label('selling_price_group_id', __( 'lang_v1.selling_price_group' ) . ':'); ?>

            <?php echo Form::select('selling_price_group_id', $price_groups, $customer_group->selling_price_group_id, ['class' => 'form-control']); ?>

      </div>

    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'messages.update' ); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/customer_group/edit.blade.php ENDPATH**/ ?>