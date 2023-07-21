<div class="modal fade" id="change_status_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">

	    <?php echo Form::open(['url' => action('\Modules\Essentials\Http\Controllers\EssentialsLeaveController@changeStatus'), 'method' => 'post', 'id' => 'change_status_form' ]); ?>


	    <div class="modal-header">
	      	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      	<h4 class="modal-title"><?php echo app('translator')->get( 'essentials::lang.change_status' ); ?></h4>
	    </div>

	    <div class="modal-body">
	      	<div class="form-group">
	      		<input type="hidden" name="leave_id" id="leave_id">
	      		<label for="status"><?php echo app('translator')->get( 'sale.status' ); ?>:*</label>
	      		<select class="form-control select2" name="status" required id="status_dropdown" style="width: 100%;">
	      			<?php $__currentLoopData = $leave_statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	      				<option value="<?php echo e($key, false); ?>"><?php echo e($value['name'], false); ?></option>
	      			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	      		</select>
	      	</div>
	      	<div class="form-group">
	      		<label for="status_note"><?php echo app('translator')->get( 'brand.note' ); ?>:</label>
	      		<textarea class="form-control" name="status_note" rows="3" id="status_note"></textarea>
	      	</div>
	    </div>

	    <div class="modal-footer">
	      <button type="submit" class="btn btn-primary ladda-button update-leave-status" data-style="expand-right">
	      	<span class="ladda-label"><?php echo app('translator')->get( 'messages.update' ); ?></span>
	      </button>
	      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
	    </div>

	    <?php echo Form::close(); ?>


	  </div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Essentials/Providers/../Resources/views/leave/change_status_modal.blade.php ENDPATH**/ ?>