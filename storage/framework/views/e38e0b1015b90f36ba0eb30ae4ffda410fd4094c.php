<div class="row eq-height-row">
	<?php if($projects->count() > 0): ?>
		<?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-md-4 eq-height-col">
				<div class="box box-solid box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">
							<a href="<?php echo e(action('\Modules\Project\Http\Controllers\ProjectController@show', [$project->id]), false); ?>">
					    		<?php echo e(ucFirst($project->name), false); ?>

					    	</a>
						</h3>
						<div class="box-tools pull-right">
							<div class="dropdown">
								  <button class="btn dropdown-toggle btn-sm btn-default" type="button" id="action" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								  	<i class="fa fa-ellipsis-v"></i>
								  	&nbsp;<?php echo app('translator')->get('messages.action'); ?>
								  </button>
								  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="action">
								    <li>
								    	<a href="<?php echo e(action('\Modules\Project\Http\Controllers\ProjectController@show', [$project->id]), false); ?>">
								    		<i class="fas fa-external-link-alt"></i>
								    		<?php echo app('translator')->get('messages.view'); ?>
								    	</a>
								    </li>
								    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('project.edit_project')): ?>
									    <li>
									    	<a data-href="<?php echo e(action('\Modules\Project\Http\Controllers\ProjectController@edit', [$project->id]), false); ?>" class="cursor-pointer edit_a_project">
									    		<i class="fa fa-edit"></i>
									    		<?php echo app('translator')->get('messages.edit'); ?>
									    	</a>
									    </li>
									<?php endif; ?>
								    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('project.delete_project')): ?>
									    <li>
									    	<a data-href="<?php echo e(action('\Modules\Project\Http\Controllers\ProjectController@destroy', [$project->id]), false); ?>" class="cursor-pointer delete_a_project">
									    		<i class="fas fa-trash"></i>
									    		<?php echo app('translator')->get('messages.delete'); ?>
									    	</a>
									    </li>
									<?php endif; ?>
									<!-- more menus -->
									<li class="divider"></li>
									<li>
								    	<a href="<?php echo e(action('\Modules\Project\Http\Controllers\ProjectController@show', [ $project->id]).'?view=overview', false); ?>">
								    		<i class="fas fa-tachometer-alt"></i>
								    		<?php echo app('translator')->get('project::lang.overview'); ?>
								    	</a>
								    </li>
								    <li>
								    	<a href="<?php echo e(action('\Modules\Project\Http\Controllers\ProjectController@show', [$project->id]).'?view=activities', false); ?>">
								    		<i class="fas fa-chart-line"></i>
								    		<?php echo app('translator')->get('lang_v1.activities'); ?>
								    	</a>
								    </li>
								    <li>
								    	<a href="<?php echo e(action('\Modules\Project\Http\Controllers\ProjectController@show', [$project->id]).'?view=project_task', false); ?>">
								    		<i class="fa fa-tasks"></i>
								    		<?php echo app('translator')->get('project::lang.task'); ?>
								    	</a>
								    </li>
								    <?php if(isset($project->settings['enable_timelog']) && $project->settings['enable_timelog']): ?>
								    	<li>
									    	<a href="<?php echo e(action('\Modules\Project\Http\Controllers\ProjectController@show', [$project->id]).'?view=time_log', false); ?>">
									    		<i class="fas fa-clock"></i>
									    		<?php echo app('translator')->get('project::lang.time_logs'); ?>
									    	</a>
									    </li>
								    <?php endif; ?>

								    <?php if(isset($project->settings['enable_notes_documents']) && $project->settings['enable_notes_documents']): ?>
								    	<li>
									    	<a href="<?php echo e(action('\Modules\Project\Http\Controllers\ProjectController@show', [$project->id]).'?view=documents_and_notes', false); ?>">
									    		<i class="fas fa-file-image"></i>
									    		<?php echo app('translator')->get('project::lang.documents_and_notes'); ?>
									    	</a>
									    </li>
								    <?php endif; ?>

								    <?php if((isset($project->settings['enable_invoice']) && $project->settings['enable_invoice']) && $project->is_lead_or_admin): ?>
								    	<li>
									    	<a href="<?php echo e(action('\Modules\Project\Http\Controllers\ProjectController@show', [$project->id]).'?view=project_invoices', false); ?>">
									    		<i class="fa fa-file"></i>
									    		<?php echo app('translator')->get('project::lang.invoices'); ?>
									    	</a>
									    </li>
								    <?php endif; ?>

								    <?php if($project->is_lead_or_admin): ?>
								    	<li>
								    		<a href="<?php echo e(action('\Modules\Project\Http\Controllers\ProjectController@show', [$project->id]).'?view=project_settings', false); ?>">
									    		<i class="fa fa-cogs"></i>
									    		<?php echo app('translator')->get('role.settings'); ?>
									    	</a>
								    	</li>
								    <?php endif; ?>
								  </ul>
							</div>
						</div>
						<!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="row">
							<div class="col-md-8">
								<?php if(isset($project->customer->name)): ?>
									<i class="fa fa-briefcase"></i>
									<?php echo e($project->customer->name, false); ?>

								<?php endif; ?> <br>
								<i class="fas fa-user-tie"></i>
								<?php echo app('translator')->get('project::lang.lead'); ?>:
							
								<br>
								<i class="fas fa-check-circle"></i>
								<?php echo app('translator')->get('sale.status'); ?>:
								<?php echo app('translator')->get('project::lang.'.$project->status); ?>
								<br>
								<?php if(isset($project->start_date)): ?>
								<i class="fas fa-calendar-check"></i>
									<?php echo app('translator')->get('business.start_date'); ?>:
									<?php echo e(\Carbon::createFromTimestamp(strtotime($project->start_date))->format(session('business.date_format')), false); ?>

								<?php endif; ?> <br>
								<?php if(isset($project->end_date)): ?>
									<i class="fas fa-calendar-check"></i>
									<?php echo app('translator')->get('project::lang.end_date'); ?>:
									<?php echo e(\Carbon::createFromTimestamp(strtotime($project->end_date))->format(session('business.date_format')), false); ?>

								<?php endif; ?>
								<?php if($project->categories->count() > 0): ?>
									<br>
									<i class="fa fas fa-gem"></i>
									<?php echo app('translator')->get('category.categories'); ?>:
									<span>
									<?php $__currentLoopData = $project->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										
										<?php if(!$loop->last): ?>
											<?php echo e($categories->name . ',', false); ?>

										<?php else: ?>
											<?php echo e($categories->name, false); ?>

									    <?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</span>
								<?php endif; ?>
							</div>
							<div class="col-md-4">
								<!-- progress bar -->
							</div>
						</div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<?php if ($__env->exists('project::avatar.create', ['max_count' => '10', 'members' => $project->members])) echo $__env->make('project::avatar.create', ['max_count' => '10', 'members' => $project->members], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</div>
					<!-- box-footer -->
				</div>
				<!-- /.box -->
			</div>
			<?php if($loop->iteration%3 == 0): ?>
				<div class="clearfix"></div>
			<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
		<div class="col-md-12">
			<div class="callout callout-info">
                <h4>
                	<i class="fa fa-warning"></i>
                	<?php echo app('translator')->get('project::lang.project_not_found'); ?>
                </h4>
            </div>
		</div>
	<?php endif; ?>
</div>
<?php if($projects->nextPageUrl()): ?>
    <a data-href="<?php echo e($projects->nextPageUrl(), false); ?>" class="btn btn-block btn-sm btn-info load_more_project">
		<?php echo app('translator')->get('project::lang.load_more'); ?>
	</a>
<?php endif; ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Project/Providers/../Resources/views/project/partials/index.blade.php ENDPATH**/ ?>