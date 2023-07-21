
<?php $__env->startSection('title', __('project::lang.project')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('project::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="content-header">
	<h1>
    	<?php echo app('translator')->get('project::lang.projects'); ?>
    	<small> <?php echo app('translator')->get('project::lang.all_projects'); ?></small>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <?php if($project_view == 'list_view'): ?>
		<div class="row">
			<?php $__currentLoopData = $project_stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-md-3 col-sm-6 col-xs-12 col-custom project_stats">
				<div class="info-box info-box-new-style">
					<span class="info-box-icon
						<?php if($project->status == 'not_started'): ?>
							bg-red
						<?php elseif($project->status == 'on_hold'): ?>
							bg-yellow
						<?php elseif($project->status == 'cancelled'): ?>
							bg-red
						<?php elseif($project->status == 'in_progress'): ?>
							bg-aqua
						<?php elseif($project->status == 'completed'): ?>
							bg-green
						<?php endif; ?>
					">
						<i class="fas
						<?php if($project->status == 'not_started'): ?>
							fa-exclamation
						<?php elseif($project->status == 'on_hold'): ?>
							fa-exclamation-triangle
						<?php elseif($project->status == 'cancelled'): ?>
							fa-times-circle
						<?php elseif($project->status == 'in_progress'): ?>
							fa-sync
						<?php elseif($project->status == 'completed'): ?>
							fa-check
						<?php endif; ?>
						"></i>
					</span>
					<div class="info-box-content">
						<span class="info-box-text">
							<?php echo e($statuses[$project->status], false); ?>

						</span>
						<span class="info-box-number">
							<?php echo e($project->count, false); ?>

						</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	<?php endif; ?>
	<div class="box box-solid">
		<div class="box-header with-border">
			<h3 class="box-title"><?php echo app('translator')->get('project::lang.projects'); ?></h3>
			<div class="box-tools pull-right">
				<div class="btn-group btn-group-toggle" data-toggle="buttons">
				    <label class="btn btn-info btn-sm active list">
				        <input type="radio" name="project_view" value="list_view" class="project_view" data-href="<?php echo e(action('\Modules\Project\Http\Controllers\ProjectController@index').'?project_view=list_view', false); ?>">
				        <?php echo app('translator')->get('project::lang.list_view'); ?>
				    </label>
				    <label class="btn btn-info btn-sm kanban">
				        <input type="radio" name="project_view" value="kanban" class="project_view" data-href="<?php echo e(action('\Modules\Project\Http\Controllers\ProjectController@index').'?project_view=kanban', false); ?>">
				        <?php echo app('translator')->get('project::lang.kanban_board'); ?>
				    </label>
				</div>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('project.create_project')): ?>
					<button type="button" class="btn btn-primary btn-sm add_new_project" data-href="<?php echo e(action('\Modules\Project\Http\Controllers\ProjectController@create'), false); ?>">
						<?php echo app('translator')->get('project::lang.new_project'); ?>&nbsp;
						<i class="fa fa-plus"></i>
					</button>
				<?php endif; ?>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<?php if($project_view == 'list_view'): ?>
					<div class="col-md-3 project_status_filter">
					    <div class="form-group">
					        <?php echo Form::label('project_status_filter', __('sale.status') . ':'); ?>

					        <?php echo Form::select('project_status_filter', $statuses, null, ['class' => 'form-control select2', 'placeholder' => __('messages.all'), 'style' => 'width: 100%;']); ?>

					    </div>
					</div>
				<?php endif; ?>
				<div class="col-md-3">
				    <div class="form-group">
				        <?php echo Form::label('project_end_date_filter', __('project::lang.end_date') . ':'); ?>

				        <?php echo Form::select('project_end_date_filter', $due_dates, null, ['class' => 'form-control select2', 'placeholder' => __('messages.all'), 'style' => 'width: 100%;']); ?>

				    </div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<?php echo Form::label('project_categories_filter', __('project::lang.category') . ':'); ?>

						<?php echo Form::select('project_categories_filter', $categories, null, ['class' => 'form-controll select2', 'placeholder' => __('messages.all'), 'style' => 'width:100%;']); ?>

					</div>
				</div>
			</div>
			<?php if($project_view == 'list_view'): ?>
				<div class="project_html">
				</div>
			<?php endif; ?>
			<!-- project kanban -->
			<?php if($project_view == 'kanban'): ?>
				<div class="project-kanban-board">
				    <div class="page">
				        <div class="main">
				            <div class="meta-tasks-wrapper">
				                <div id="myKanban" class="meta-tasks">
				                </div>
				            </div>
				        </div>
				    </div>
				</div>
			<?php endif; ?>
		</div>			
	</div>
	<!-- /.box -->
	<div class="modal fade" tabindex="-1" role="dialog" id="project_model"></div>
</section>
<link rel="stylesheet" href="<?php echo e(asset('modules/project/sass/project.css?v=' . $asset_v), false); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script src="<?php echo e(asset('modules/project/js/project.js?v=' . $asset_v), false); ?>"></script>
<!-- get list of project on load of page -->
<script type="text/javascript">
	$(document).ready(function() {
		var project_view = urlSearchParam('project_view');

		//if project view is empty, set default to list_view
		if (_.isEmpty(project_view)) {
			project_view = 'list_view';
		}

		if (project_view == 'kanban') {
			$('.kanban').addClass('active');
			$('.list').removeClass('active');
			initializeProjectKanbanBoard();
		} else if(project_view == 'list_view') {
			getProjectList();
		}
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u373816316/domains/erp4anyone.com/public_html/4any/Modules/Project/Providers/../Resources/views/project/index.blade.php ENDPATH**/ ?>