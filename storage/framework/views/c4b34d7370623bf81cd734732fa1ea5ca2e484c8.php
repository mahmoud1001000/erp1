
<?php $__env->startSection('title', __('project::lang.my_tasks')); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('project::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="content-header">
	<h3>
		<i class="fa fa-tasks"></i>
		<?php echo app('translator')->get('project::lang.tasks'); ?>
	</h3>
</section>
<section class="content">
	<?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
		<div class="row">
			<div class="col-md-3">
			    <div class="form-group">
			        <?php echo Form::label('project_id', __('project::lang.project') . ':'); ?>

			        <?php echo Form::select('project_id', $projects, null, ['class' => 'form-control select2', 'placeholder' => __('messages.all'), 'style' => 'width: 100%;']); ?>

			    </div>
			</div>
			<?php if($is_admin): ?>
				<div class="col-md-3">
				    <div class="form-group">
				        <?php echo Form::label('assigned_to_filter', __('project::lang.assigned_to') . ':'); ?>

				        <div class="input-group">
				            <span class="input-group-addon">
				                <i class="fa fa-user"></i>
				            </span>
				            <?php echo Form::select('assigned_to_filter', $users, null, ['class' => 'form-control select2', 'placeholder' => __('messages.all'), 'style' => 'width: 100%;']); ?>

				        </div>
				    </div>
				</div>
			<?php endif; ?>
			<div class="col-md-3 status_filter">
			    <div class="form-group">
			        <?php echo Form::label('status_filter', __('sale.status') . ':'); ?>

			        <?php echo Form::select('status_filter', $statuses, null, ['class' => 'form-control select2', 'placeholder' => __('messages.all'), 'style' => 'width: 100%;']); ?>

			    </div>
			</div>
			<div class="col-md-3">
			    <div class="form-group">
			        <?php echo Form::label('priority_filter', __('project::lang.priority') .':'); ?>

			        <?php echo Form::select('priority_filter', $priorities, null, ['class' => 'form-control select2', 'placeholder' => __('messages.all'), 'style' => 'width: 100%;']); ?>

			    </div>
			</div>
			<div class="col-md-3">
			    <div class="form-group">
			        <?php echo Form::label('due_date_filter', __('project::lang.due_date') . ':'); ?>

			        <?php echo Form::select('due_date_filter', $due_dates, null, ['class' => 'form-control select2', 'placeholder' => __('messages.all'), 'style' => 'width: 100%;']); ?>

			    </div>
			</div>
		</div>
	<?php echo $__env->renderComponent(); ?>
	<?php
		$tool = '<div class="btn-group btn-group-toggle pull-right m-5" data-toggle="buttons">
    			<label class="btn btn-info btn-sm active">
        			<input type="radio" name="task_view" value="list_view" class="my_task_view" checked>'
        			. __("project::lang.list_view").'
    			</label>
				<label class="btn btn-info btn-sm">
				    <input type="radio" name="task_view" value="kanban" class="my_task_view">
				    '. __("project::lang.kanban_board").'
				</label>
			</div>';
	?>
	<?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __( 'project::lang.my_tasks'), 'tool' => $tool]); ?>
		<div class="table-responsive">
		    <table class="table table-bordered table-striped" id="my_task_table">
		        <thead>
		            <tr>
		            	<th> <?php echo app('translator')->get('messages.action'); ?></th>
		            	<th class="col-md-2">
		            		<?php echo app('translator')->get('project::lang.project'); ?>
		            	</th>
		                <th class="col-md-3">
		                	<?php echo app('translator')->get('project::lang.subject'); ?>
		                </th>
		                <th class="col-md-2">
		                	<?php echo app('translator')->get('project::lang.assigned_to'); ?>
		                </th>
		                <th> <?php echo app('translator')->get('project::lang.priority'); ?></th>
		                <th> <?php echo app('translator')->get('business.start_date'); ?></th>
		                <th><?php echo app('translator')->get('project::lang.due_date'); ?></th>
		                <th><?php echo app('translator')->get('sale.status'); ?></th>
		                <th> <?php echo app('translator')->get('project::lang.assigned_by'); ?></th>
		                <th><?php echo app('translator')->get('project::lang.task_custom_field_1'); ?></th>
		                <th><?php echo app('translator')->get('project::lang.task_custom_field_2'); ?></th>
		                <th><?php echo app('translator')->get('project::lang.task_custom_field_3'); ?></th>
		                <th><?php echo app('translator')->get('project::lang.task_custom_field_4'); ?></th>
		            </tr>
		        </thead>
		    </table>
		</div>
		<div class="custom-kanban-board hide">
		    <div class="page">
		        <div class="main">
		            <div class="meta-tasks-wrapper">
		                <div id="myKanban" class="meta-tasks"></div>
		            </div>
		        </div>
		    </div>
		</div>
	<?php echo $__env->renderComponent(); ?>
</section>
<div class="modal fade project_task_model" tabindex="-1" role="dialog"></div>
<div class="modal fade view_project_task_model" tabindex="-1" role="dialog"></div>
<link rel="stylesheet" href="<?php echo e(asset('modules/project/sass/project.css?v=' . $asset_v), false); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script src="<?php echo e(asset('modules/project/js/project.js?v=' . $asset_v), false); ?>"></script>
<script type="text/javascript">
	$(document).ready(function () {
		initializeMyTaskDataTable();
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Project/Providers/../Resources/views/my_task/index.blade.php ENDPATH**/ ?>