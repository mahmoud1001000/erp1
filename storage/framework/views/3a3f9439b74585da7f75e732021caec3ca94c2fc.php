<div class="modal-dialog" role="document">
  	<div class="modal-content">
  		<?php echo Form::open(['url' => empty($shift) ? action('\Modules\Essentials\Http\Controllers\ShiftController@store') : action('\Modules\Essentials\Http\Controllers\ShiftController@update', [$shift->id]), 'method' => empty($shift) ? 'post' : 'put', 'id' => 'add_shift_form' ]); ?>

  		<div class="modal-header">
	      	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      	<h4 class="modal-title"><?php echo app('translator')->get( 'essentials::lang.add_shift' ); ?></h4>
	    </div>
	    <div class="modal-body">
	    	<div class="form-group">
	        	<?php echo Form::label('name', __( 'user.name' ) . ':*'); ?>

	        	<?php echo Form::text('name', !empty($shift->name) ? $shift->name : null, ['class' => 'form-control', 'placeholder' => __( 'user.name'), 'required']); ?>

	      	</div>
	      	<div class="form-group">
	        	<?php echo Form::label('type', __('essentials::lang.shift_type') . ':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('essentials::lang.shift_type_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
	        	<?php echo Form::select('type', ['fixed_shift' => __('essentials::lang.fixed_shift'), 'flexible_shift' => __('essentials::lang.flexible_shift')],  !empty($shift->type) ? $shift->type : null, ['class' => 'form-control select2', 'required', 'id' => 'shift_type']); ?>

	      	</div>
	      	<div class="form-group time_div">
	        	<?php echo Form::label('start_time', __( 'restaurant.start_time' ) . ':*'); ?>

	        	<div class="input-group date">
	        		<?php echo Form::text('start_time', !empty($shift->start_time) ? \Carbon::createFromTimestamp(strtotime($shift->start_time))->format('H:i') : null, ['class' => 'form-control', 'placeholder' => __( 'restaurant.start_time' ), 'readonly', 'required' ]); ?>

	        		<span class="input-group-addon"><i class="fas fa-clock"></i></span>
	        	</div>
	      	</div>
	      	<div class="form-group time_div">
	        	<?php echo Form::label('end_time', __( 'restaurant.end_time' ) . ':*'); ?>

	        	<div class="input-group date">
	        		<?php echo Form::text('end_time', !empty($shift->end_time) ? \Carbon::createFromTimestamp(strtotime($shift->end_time))->format('H:i') : null, ['class' => 'form-control', 'placeholder' => __( 'restaurant.end_time' ), 'readonly', 'required']); ?>

	        		<span class="input-group-addon"><i class="fas fa-clock"></i></span>
	        	</div>
	      	</div>
	      	<div class="form-group">
	        	<?php echo Form::label('holidays', __( 'essentials::lang.holiday' ) . ':'); ?>

	        	<?php echo Form::select('holidays[]', $days,  !empty($shift->holidays) ? $shift->holidays : null, ['class' => 'form-control select2', 'multiple' ]); ?>

	      	</div>
	    </div>
	    <div class="modal-footer">
	      	<button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'messages.submit' ); ?></button>
	      	<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
	    </div>
	    <?php echo Form::close(); ?>

  	</div>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Essentials/Providers/../Resources/views/attendance/shift_modal.blade.php ENDPATH**/ ?>