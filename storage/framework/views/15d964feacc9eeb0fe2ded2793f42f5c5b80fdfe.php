<div class="modal-dialog" role="document">
  <div class="modal-content">
    <?php echo Form::open(['url' => action('\Modules\Essentials\Http\Controllers\ToDoController@store'), 'id' => 'task_form', 'method' => 'post']); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get( 'essentials::lang.add_to_do' ); ?></h4>
    </div>

    <div class="modal-body">
    	<div class="row">
    		<div class="col-md-12">
		        <div class="form-group">
		            <?php echo Form::label('task', __('essentials::lang.task') . ":*"); ?>

		            <?php echo Form::text('task', null, ['class' => 'form-control', 'required']); ?>

		         </div>
		    </div>
		    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('essentials.assign_todos')): ?>
			<div class="col-md-12">
		        <div class="form-group">
					<?php echo Form::label('users', __('essentials::lang.assigned_to') . ':*'); ?>

					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-user"></i>
						</span>
						<?php echo Form::select('users[]', $users, null, ['class' => 'form-control select2', 'multiple', 'required', 'style' => 'width: 100%;']); ?>

					</div>
				</div>
			</div>
			<?php endif; ?>
			<div class="clearfix"></div>
			<div class="col-md-6">
		        <div class="form-group">
					<?php echo Form::label('priority', __('essentials::lang.priority') . ':'); ?>

					<?php echo Form::select('priority', $priorities, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'style' => 'width: 100%;']); ?>

				</div>
			</div>
			<div class="col-md-6">
		        <div class="form-group">
					<?php echo Form::label('status', __('sale.status') . ':'); ?>

					<?php echo Form::select('status', $task_statuses, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'style' => 'width: 100%;']); ?>

				</div>
			</div>
			<div class="clearfix"></div>
		    <div class="col-md-6">
		        <div class="form-group">
					<?php echo Form::label('date', __('business.start_date') . ':*'); ?>

					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</span>
						<?php echo Form::text('date', \Carbon::createFromTimestamp(strtotime('now'))->format(session('business.date_format')), ['class' => 'form-control datepicker text-center', 'required', 'readonly']); ?>

					</div>
				</div>
			</div>
			<div class="col-md-6">
		        <div class="form-group">
					<?php echo Form::label('end_date', __('essentials::lang.end_date') . ':'); ?>

					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</span>
						<?php echo Form::text('end_date', '', ['class' => 'form-control datepicker text-center', 'readonly']); ?>

					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="col-md-6">
		        <div class="form-group">
					<?php echo Form::label('estimated_hours', __('essentials::lang.estimated_hours') . ':'); ?>

					<div class="input-group">
						<span class="input-group-addon">
							<i class="fas fa-clock"></i>
						</span>
						<?php echo Form::text('estimated_hours', null, ['class' => 'form-control']); ?>

					</div>
				</div>
			</div>
		    <div class="clearfix"></div>
	    	<div class="col-md-12">
	    		<div class="form-group">
					<?php echo Form::label('to_do_description', __('lang_v1.description') . ':'); ?>

					<?php echo Form::textarea('description', null, ['id' => 'to_do_description']); ?>

				</div>
	    	</div>
    	</div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary ladda-button" data-style="expand-right">
      	<span class="ladda-label"><?php echo app('translator')->get( 'messages.save' ); ?></span>
      </button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Essentials/Providers/../Resources/views/todo/create.blade.php ENDPATH**/ ?>