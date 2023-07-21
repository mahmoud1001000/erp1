<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('WarrantyController@store'), 'method' => 'post', 'id' => 'warranty_form']); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get( 'lang_v1.add_warranty' ); ?></h4>
    </div>

    <div class="modal-body">
      <div class="form-group">
        <?php echo Form::label('name', __( 'lang_v1.name' ) . ':*'); ?>

          <?php echo Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => __( 'lang_v1.name' ) ]); ?>

      </div>

      <div class="form-group">
        <?php echo Form::label('description', __( 'lang_v1.description' ) . ':'); ?>

          <?php echo Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.description' ), 'rows' => 3 ]); ?>

      </div>
      <strong><?php echo Form::label('duration', __( 'lang_v1.duration' ) . ':'); ?>*</strong>
      <div class="form-group">
          <?php echo Form::number('duration', null, ['class' => 'form-control width-40 pull-left', 'placeholder' => __( 'lang_v1.duration' ), 'required' ]); ?>


          <?php echo Form::select('duration_type', ['days' => __('lang_v1.days'), 'months' => __('lang_v1.months'), 'years' => __('lang_v1.years')], '', ['class' => 'form-control width-60 pull-left','placeholder' => __('messages.please_select'), 'required']); ?>

      </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'messages.save' ); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/warranties/create.blade.php ENDPATH**/ ?>