<div class="modal fade" id="update_password_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
	  	<div class="modal-content">
	  	<?php echo Form::open(['url' => action('\Modules\Superadmin\Http\Controllers\BusinessController@updatePassword'), 'method' => 'post', 'id' => 'password_update_form' ]); ?>

	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      <h4 class="modal-title"><span id="user_name"></span> - <?php echo app('translator')->get( 'superadmin::lang.update_password' ); ?></h4>
	    </div>

	    <div class="modal-body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
					    <?php echo Form::label('password', __( 'business.password' ) . ':'); ?>

					    <?php echo Form::password('password', ['class' => 'form-control', 'placeholder' => __( 'business.password' ), 'required' ]); ?>

					    <?php echo Form::hidden('user_id', null, ['id' => 'user_id' ]); ?>

					</div>
				</div>
				<div class="col-md-6">
				    <div class="form-group">
					    <?php echo Form::label('confirm_password', __( 'business.confirm_password' ) . ':'); ?>

					    <?php echo Form::password('confirm_password', ['class' => 'form-control', 'placeholder' => __( 'business.confirm_password' ), 'required', 'data-rule-equalTo' => '#password' ]); ?>

					      
					</div>
				</div>
			</div>
	    </div>

	    <div class="modal-footer">
	      <button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'messages.update' ); ?></button>
	      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
	    </div>
	    <?php echo Form::close(); ?>

	  </div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->	
</div><?php /**PATH /home/u373816316/domains/erp4anyone.com/public_html/4any/Modules/Superadmin/Providers/../Resources/views/business/update_password_modal.blade.php ENDPATH**/ ?>