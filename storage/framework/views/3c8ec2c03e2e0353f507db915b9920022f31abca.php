<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('BrandController@store'), 'method' => 'post', 'id' => $quick_add ? 'quick_add_brand_form' : 'brand_add_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get( 'brand.add_brand' ); ?></h4>
    </div>

    <div class="modal-body">
      <div class="form-group">
        <?php echo Form::label('name', __( 'brand.brand_name' ) . ':*'); ?>

          <?php echo Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => __( 'brand.brand_name' ) ]); ?>

      </div>

      <div class="form-group">
        <?php echo Form::label('description', __( 'brand.short_description' ) . ':'); ?>

          <?php echo Form::text('description', null, ['class' => 'form-control','placeholder' => __( 'brand.short_description' )]); ?>

      </div>

        <?php if($is_repair_installed): ?>
          <div class="form-group">
             <label>
                <?php echo Form::checkbox('use_for_repair', 1, false, ['class' => 'input-icheck']); ?>

                <?php echo e(__( 'repair::lang.use_for_repair' ), false); ?>

            </label>
            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('repair::lang.use_for_repair_help_text') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
          </div>
        <?php endif; ?>

    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'messages.save' ); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/brand/create.blade.php ENDPATH**/ ?>