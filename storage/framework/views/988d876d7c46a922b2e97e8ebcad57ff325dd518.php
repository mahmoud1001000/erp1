<?php
$record_not_available = true;
?>
<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="box box-solid box-success">
		<div class="box-body">
			<div class="table-responsive">
				<caption>
					<span class="font-17 text-bold">
						<?php echo e($user->user_full_name, false); ?>:
					</span>
				</caption>
				<?php $__currentLoopData = $user->projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($project->timeLogs->count() > 0): ?>
						<?php
							$record_not_available = false;
						?>
						<ol>
							<strong><code><?php echo e($project->name, false); ?></code>:</strong>
						</ol>
						<ol>
			    			<table class="table table-striped">
			    				<thead>
			    					<tr>
			    						<th><?php echo app('translator')->get('project::lang.task'); ?></th>
			    						<th>
			    							<?php echo app('translator')->get('project::lang.start_date_time'); ?>
			    						</th>
			    						<th>
			    							<?php echo app('translator')->get('project::lang.end_date_time'); ?>
			    						</th>
			    						<th><?php echo app('translator')->get('project::lang.work_hour'); ?></th>
			    						<th>
			    							<?php echo app('translator')->get('brand.note'); ?>
			    						</th>
			    					</tr>
			    				</thead>
			    				<tbody>
			    					<?php
			    						$total_sec = 0;
			    					?>
				    				<?php $__currentLoopData = $project->timeLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timeLog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				    					<?php
				    						$start_datetime = \Carbon::parse($timeLog->start_datetime);
		        							$end_datetime = \Carbon::parse($timeLog->end_datetime);
		        							$second = $start_datetime->diffInSeconds($end_datetime, true);
		        							$total_sec += $second;
				    					?>
				    					<tr>
				    						<td>
				    							<?php if(isset($timeLog->task)): ?>
				    								<?php echo e($timeLog->task->subject, false); ?>

				    								<small>
				    									<code>
				    										<?php echo e($timeLog->task->task_id, false); ?>

				    									</code>
				    								</small>
				    							<?php endif; ?>
				    						</td>
											<td>
												<?php echo e(\Carbon::createFromTimestamp(strtotime($timeLog->start_datetime))->format(session('business.date_format') . ' ' . 'H:i'), false); ?>

											</td>
											<td>
												<?php echo e(\Carbon::createFromTimestamp(strtotime($timeLog->end_datetime))->format(session('business.date_format') . ' ' . 'H:i'), false); ?>

											</td>
											<td>
												<?php echo e($start_datetime->diffForHumans($end_datetime, true), false); ?>

											</td>
											<td>
												<?php echo e($timeLog->note, false); ?>

											</td>
				    					</tr>
				    				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				    			</tbody>
				    			<tfoot>
				    				<tr class="bg-gray">
				    					<td colspan="3"></td>
				    					<td>
				    						<?php
												$hours = floor($total_sec / 3600);
												$minutes = floor(($total_sec / 60) % 60);
											?>
											<?php echo e(sprintf('%02d:%02d', $hours, $minutes), false); ?>

				    					</td>
				    					<td></td>
				    				</tr>
				    			</tfoot>
			    			</table>
						</ol>
			    	<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php if($record_not_available): ?>
	<div class="callout callout-info">
        <h4>
        	<i class="fa fa-warning"></i>
        	<?php echo app('translator')->get('project::lang.no_record_found'); ?>
        </h4>
    </div>
<?php endif; ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Project/Providers/../Resources/views/reports/partials/employee_timelog.blade.php ENDPATH**/ ?>