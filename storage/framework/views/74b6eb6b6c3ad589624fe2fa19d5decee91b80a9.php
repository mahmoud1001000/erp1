<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('TaxRateController@store'), 'method' => 'post', 'id' => 'tax_rate_add_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get( 'tax_rate.add_tax_rate' ); ?></h4>
    </div>

    <div class="modal-body">
      <div class="form-group">
        <?php echo Form::label('name', __( 'tax_rate.name' ) . ':*'); ?>

          <?php echo Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => __( 'tax_rate.name' )]); ?>

      </div>

      <div class="form-group">
        <?php echo Form::label('amount', __( 'tax_rate.rate' ) . ':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.tax_exempt_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
          <?php echo Form::text('amount', null, ['class' => 'form-control input_number', 'required']); ?>

      </div>

      <div class="form-group">
        <div class="checkbox">
          <label>
             <?php echo Form::checkbox('for_tax_group', 1, false, [ 'class' => 'input_icheck']); ?> <?php echo app('translator')->get( 'lang_v1.for_tax_group_only' ); ?>
          </label> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.for_tax_group_only_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'messages.save' ); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/tax_rate/create.blade.php ENDPATH**/ ?>