<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('\Modules\Essentials\Http\Controllers\EssentialsLeaveController@store'), 'method' => 'post', 'id' => 'add_leave_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get( 'essentials::lang.add_leave' ); ?></h4>
    </div>

    <div class="modal-body">
    	<div class="row">
    		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('essentials.approve_leave')): ?>
    		<div class="form-group col-md-12">
		        <?php echo Form::label('employees', __('essentials::lang.select_employee') . ':'); ?>

		        <?php echo Form::select('employees[]', $employees, null, ['class' => 'form-control select2', 'style' => 'width: 100%;', 'id' => 'employees', 'multiple', 'required' ]); ?>

    		</div>
    		<?php endif; ?>
    		<div class="form-group col-md-12">
	        	<?php echo Form::label('essentials_leave_type_id', __( 'essentials::lang.leave_type' ) . ':*'); ?>

	          	<?php echo Form::select('essentials_leave_type_id', $leave_types, null, ['class' => 'form-control select2', 'required', 'placeholder' => __( 'messages.please_select' ) ]); ?>

	      	</div>

	      	<div class="form-group col-md-6">
	        	<?php echo Form::label('start_date', __( 'essentials::lang.start_date' ) . ':*'); ?>

	        	<div class="input-group data">
	        		<?php echo Form::text('start_date', null, ['class' => 'form-control', 'placeholder' => __( 'essentials::lang.start_date' ), 'readonly' ]); ?>

	        		<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
	        	</div>
	      	</div>

	      	<div class="form-group col-md-6">
	        	<?php echo Form::label('end_date', __( 'essentials::lang.end_date' ) . ':*'); ?>

		        	<div class="input-group data">
		          	<?php echo Form::text('end_date', null, ['class' => 'form-control', 'placeholder' => __( 'essentials::lang.end_date' ), 'readonly', 'required' ]); ?>

		          	<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
	        	</div>
	      	</div>

	      	<div class="form-group col-md-12">
	        	<?php echo Form::label('reason', __( 'essentials::lang.reason' ) . ':'); ?>

	          	<?php echo Form::textarea('reason', null, ['class' => 'form-control', 'placeholder' => __( 'essentials::lang.reason' ), 'rows' => 4, 'required' ]); ?>

	      	</div>
	      	<hr>
	      	<div class="col-md-12">
    			<?php echo $instructions; ?>

    		</div>
    	</div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary ladda-button add-leave-btn" data-style="expand-right">
      	<span class="ladda-label"><?php echo app('translator')->get( 'messages.save' ); ?></span>
      </button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Essentials/Providers/../Resources/views/leave/create.blade.php ENDPATH**/ ?>