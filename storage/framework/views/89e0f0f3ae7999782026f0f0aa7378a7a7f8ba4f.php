<div class="modal-dialog" role="document">
  	<div class="modal-content">

    <?php echo Form::open(['url' => action('AccountTypeController@store'), 'method' => 'post', 'id' => 'account_type_form' ]); ?>

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get( 'lang_v1.add_account_type' ); ?></h4>
    </div>

    <div class="modal-body">
      	<div class="form-group">
        	<?php echo Form::label('name', __( 'lang_v1.name' ) . ':*'); ?>

          	<?php echo Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => __( 'lang_v1.name' )]); ?>

      	</div>

      <div class="form-group">
        	<?php echo Form::label('parent_account_type_id', __( 'lang_v1.parent_account_type' ) . ':'); ?>

          	<?php echo Form::select('parent_account_type_id', $account_types->pluck('name', 'id'), null, ['class' => 'form-control', 'placeholder' => __( 'messages.please_select' )]); ?>

      </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'messages.save' ); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/account_types/create.blade.php ENDPATH**/ ?>