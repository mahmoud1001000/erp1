
	<!-- timeline time label -->
	<?php
		$created_at = null;
		$icon_color = [
			'created' => 'bg-green',
			'updated' => 'bg-blue',
			'deleted' => 'bg-red',
			'settings_updated' => 'bg-blue'
		];

		$label = [
			'subject' => __('project::lang.subject'),
			'description' => __('lang_v1.description'),
			'start_date' => __('business.start_date'),
			'due_date' => __('project::lang.due_date'),
			'priority' => __('project::lang.priority'),
			'status' => __('sale.status'),
			'name' => __('messages.name'),
			'end_date' => __('project::lang.end_date'),
		];

		$status_and_priority = [
			'completed' => __('project::lang.completed'),
			'cancelled' => __('project::lang.cancelled'),
			'on_hold' => __('project::lang.on_hold'),
			'in_progress' => __('project::lang.in_progress'),
			'not_started' => __('project::lang.not_started'),
			'low' => __('project::lang.low'),
			'medium' => __('project::lang.medium'),
			'high' => __('project::lang.high'),
			'urgent' => __('project::lang.urgent'),
		];
	?>
	<?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		<?php if($created_at != $activity->created_at->format('Y-m-d')): ?>
			<li class="time-label">
				<span class="bg-red">
					<?php echo e(\Carbon::createFromTimestamp(strtotime($activity->created_at))->format(session('business.date_format')), false); ?>

				</span>
			</li>
		<?php endif; ?>

		<!-- /.timeline-label -->
		<!-- timeline item -->
		<li>
			<!-- timeline icon -->
			<?php if($activity->subject_type == 'Modules\Project\Entities\Project'): ?>
				<i class="fas fa fa-check-circle
					<?php echo e($icon_color[$activity->description], false); ?>"></i>
			<?php elseif($activity->subject_type == 'Modules\Project\Entities\ProjectTask'): ?>
				<i class="fa fa-tasks <?php echo e($icon_color[$activity->description], false); ?>"></i>
			<?php elseif($activity->subject_type == 'App\DocumentAndNote'): ?>
				<i class="fas fa fa-images <?php echo e($icon_color[$activity->description], false); ?>"></i>
			<?php elseif($activity->subject_type == 'Modules\Project\Entities\ProjectTimeLog'): ?>
				<i class="fas fa fa-clock <?php echo e($icon_color[$activity->description], false); ?>"></i>
			<?php endif; ?>
			<div class="timeline-item">
				<span class="time">
					<i class="fas fa-clock"></i>
					<?php echo e(\Carbon::createFromTimestamp(strtotime($activity->created_at))->format('H:i'), false); ?>

				</span>
				<h3 class="timeline-header timeline-body-custom-color">
					<?php if(($activity->subject_type == 'Modules\Project\Entities\Project') && $activity->description == 'settings_updated'): ?>

						<?php echo app('translator')->get('project::lang.project_settings_updated', [
							'name' => $activity->causer->user_full_name
						]); ?>
					<?php elseif($activity->subject_type == 'Modules\Project\Entities\Project'): ?>

						<?php echo app('translator')->get('project::lang.project_activity', [
							'name' => $activity->causer->user_full_name ,
							'description' => $activity->description
						]); ?>
					<?php elseif($activity->subject_type == 'Modules\Project\Entities\ProjectTask'): ?>

						<?php echo app('translator')->get('project::lang.project_task_activity', [
							'name' => $activity->causer->user_full_name ,
							'description' => $activity->description
						]); ?>
					<?php elseif($activity->subject_type == 'App\DocumentAndNote'): ?>
						
						<?php echo app('translator')->get('project::lang.project_note_activity', [
							'name' => $activity->causer->user_full_name ,
							'description' => $activity->description
						]); ?>

					<?php elseif($activity->subject_type == 'Modules\Project\Entities\ProjectTimeLog'): ?>
						
						<?php echo app('translator')->get('project::lang.project_timelog_activity', [
							'name' => $activity->causer->user_full_name ,
							'description' => $activity->description
						]); ?>

					<?php endif; ?>
				</h3>

				<div class="timeline-body timeline-body-custom-color">
					<?php if($activity->subject_type == 'Modules\Project\Entities\Project'): ?>

						<?php if($activity->description == 'created'): ?>
							<code><?php echo e($activity->properties['attributes']['name'], false); ?></code>
							<!-- check if updated value's key exist or not then create table -->
						<?php elseif(($activity->description == 'updated') && 
						(
							array_key_exists('name', $activity->properties['attributes']) || 
							array_key_exists('status', $activity->properties['attributes']) || array_key_exists('start_date', $activity->properties['attributes']) || array_key_exists('end_date', $activity->properties['attributes']) || array_key_exists('description', $activity->properties['attributes'])
						)): ?>
							<div class="table-responsive">
								<?php if ($__env->exists('project::activity.partials.project_activity')) echo $__env->make('project::activity.partials.project_activity', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							</div>
						<?php elseif($activity->description == 'settings_updated'): ?>
						<?php endif; ?>

					<?php elseif($activity->subject_type == 'Modules\Project\Entities\ProjectTask'): ?>

						<?php if($activity->description == 'created'): ?>
							<a data-href='<?php echo e(action("\Modules\Project\Http\Controllers\TaskController@show", [$activity->subject->id, "project_id" => $activity->subject->project_id]), false); ?>' class="cursor-pointer view_a_project_task text-black">
								<?php echo e($activity->properties['attributes']['subject'], false); ?>

								<code>
									<?php echo e($activity->properties['attributes']['task_id'], false); ?>	
								</code>
							</a>
						<?php elseif($activity->description == 'deleted'): ?>
							<span>
								<?php echo e($activity->properties['attributes']['subject'], false); ?>

								<code>
									<?php echo e($activity->properties['attributes']['task_id'], false); ?>	
								</code>
							</span>
						<?php elseif($activity->description == 'updated'): ?>
							<a data-href='<?php echo e(action("\Modules\Project\Http\Controllers\TaskController@show", [ $activity->subject->id, "project_id" => $activity->subject->project_id]), false); ?>' class="cursor-pointer view_a_project_task text-black">
								<?php echo e($activity->subject->subject, false); ?>

								<code>
									<?php echo e($activity->subject->task_id, false); ?>

								</code>
							</a><br>
							<!-- check if updated value's key exist or not then create table -->
							<?php if(
								array_key_exists('subject', $activity->properties['attributes']) ||
								array_key_exists('start_date', $activity->properties['attributes']) ||
								array_key_exists('due_date', $activity->properties['attributes']) ||
								array_key_exists('priority', $activity->properties['attributes']) || 
								array_key_exists('description', $activity->properties['attributes']) ||
								array_key_exists('status', $activity->properties['attributes'])
							): ?>
								<div class="table-responsive">
									<?php if ($__env->exists('project::activity.partials.task_activity')) echo $__env->make('project::activity.partials.task_activity', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
								</div>
							<?php endif; ?>
						<?php endif; ?>

					<?php elseif($activity->subject_type == 'App\DocumentAndNote'): ?>

						<?php if($activity->description == 'created'): ?>
							
							<a data-href='<?php echo e(action("DocumentAndNoteController@show", ["id" => $activity->subject->id, "notable_id" => $activity->subject->notable_id, "notable_type" => $activity->subject->notable_type]), false); ?>' class="cursor-pointer view_a_docs_note text-black">
							    <code>
							    	<?php echo e($activity->properties['attributes']['heading'], false); ?>

							    </code>
							</a>
						<?php elseif($activity->description == 'updated'): ?>
							
							<a data-href='<?php echo e(action("DocumentAndNoteController@show", ["id" => $activity->subject->id, "notable_id" => $activity->subject->notable_id, "notable_type" => $activity->subject->notable_type]), false); ?>' class="cursor-pointer view_a_docs_note text-black">
							    <code><?php echo e($activity->subject->heading, false); ?></code>
							</a>
						<?php endif; ?>

					<?php elseif($activity->subject_type == 'Modules\Project\Entities\ProjectTimeLog'): ?>

						<?php if($activity->description == 'created'): ?>
							<b><?php echo app('translator')->get('project::lang.work_hour'); ?>:</b>
							<span>
								<?php if ($__env->exists('project::activity.partials.time_log')) echo $__env->make('project::activity.partials.time_log', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							</span> <br>
							<?php echo $activity->properties['attributes']['note']; ?>

						<?php elseif($activity->description == 'updated'): ?>
							<b><?php echo app('translator')->get('project::lang.work_hour'); ?>:</b>
							<span>
								<?php if ($__env->exists('project::activity.partials.time_log')) echo $__env->make('project::activity.partials.time_log', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							</span> <br>
							<?php echo $activity->subject->note; ?>

						<?php endif; ?>

					<?php endif; ?>
				</div>
			</div>
		</li>

		<?php
			$created_at = $activity->created_at->format('Y-m-d');
		?>

	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<!-- END timeline item -->
<?php if($activities->nextPageUrl()): ?>
	<li class="timeline-lode-more-btn">
		<a data-href="<?php echo e($activities->nextPageUrl(), false); ?>" class="btn btn-block btn-sm btn-info load_more_activities">
			<?php echo app('translator')->get('project::lang.load_more'); ?>
		</a>
	</li>
<?php endif; ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Project/Providers/../Resources/views/activity/show.blade.php ENDPATH**/ ?>