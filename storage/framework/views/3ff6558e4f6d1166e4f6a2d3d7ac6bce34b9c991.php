<div class="row">
	<div class="col-md-7">
		<div class="row">
			<div class="col-md-3">
				<div class="box box-solid box-warning">
					<div class="box-header with-border">
						<h4 class="box-title">
							<?php echo app('translator')->get('project::lang.incompleted_tasks'); ?>
						</h4>
						<!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body text-center">
						<span class="fs-20">
							<b><?php echo e($project->incomplete_task, false); ?></b>
						</span>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<?php if(isset($project->settings['enable_notes_documents']) && $project->settings['enable_notes_documents']): ?>
				<div class="col-md-3">
					<div class="box box-solid box-primary">
						<div class="box-header with-border">
							<h4 class="box-title">
								<?php echo app('translator')->get('project::lang.documents_and_notes'); ?>
							</h4>
							<!-- /.box-tools -->
						</div>
						<!-- /.box-header -->
						<div class="box-body text-center">
							<span class="fs-20">
								<b><?php echo e($project->note_and_documents_count, false); ?></b>
							</span>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
			<?php endif; ?>
			<?php if(isset($project->settings['enable_timelog']) && $project->settings['enable_timelog']): ?>
				<div class="col-md-3">
					<div class="box box-solid box-info">
						<div class="box-header with-border">
							<h4 class="box-title">
								<?php echo app('translator')->get('project::lang.total_time'); ?>
							</h4>
							<!-- /.box-tools -->
						</div>
						<!-- /.box-header -->
						<div class="box-body text-center">
							<?php
								$hours = floor($timelog->total_seconds / 3600);
								$minutes = floor(($timelog->total_seconds / 60) % 60);
							?>
							<span>
								<b>
									<?php echo e(sprintf('%02d:%02d', $hours, $minutes), false); ?>

								</b>
							</span>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
			<?php endif; ?>
			<?php if((isset($project->settings['enable_invoice']) && $project->settings['enable_invoice']) && $is_lead_or_admin): ?>
				<div class="col-md-3">
					<div class="box box-solid box-success">
						<div class="box-header with-border">
							<h4 class="box-title">
								<?php echo app('translator')->get('sale.total_paid'); ?>
								<small class="text-white">
									<?php echo app('translator')->get('project::lang.invoice'); ?>
								</small>
							</h4>
							<!-- /.box-tools -->
						</div>
						<!-- /.box-header -->
						<div class="box-body text-center">
							<span>
								<b>
									<span class="subtotal display_currency" data-currency_symbol="true">
										<?php echo e($invoice->paid, false); ?>

									</span>
								</b>
							</span>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
			<?php endif; ?>
		</div>
		<div class="row">
			<?php if((isset($project->settings['enable_invoice']) && $project->settings['enable_invoice']) && $is_lead_or_admin): ?>
				<div class="col-md-3">
					<div class="box box-solid box-danger">
						<div class="box-header with-border">
							<h4 class="box-title">
								<?php echo app('translator')->get('sale.total_remaining'); ?>
								<small class="text-white">
									<?php echo app('translator')->get('project::lang.invoice'); ?>
								</small>
							</h4>
							<!-- /.box-tools -->
						</div>
						<!-- /.box-header -->
						<div class="box-body text-center">
							<span>
								<b>
									<span class="subtotal display_currency" data-currency_symbol="true">
										<?php echo e($transaction->total - $invoice->paid, false); ?>

									</span>
								</b>
							</span>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
			<?php endif; ?>
		</div>
		<?php if(!empty($project->description)): ?>
			<div class="row">
				<div class="col-md-12">
					<div class="box box-solid">
						<div class="box-body">
							<?php echo $project->description; ?>

						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
	<div class="col-md-5">
		<!-- customer -->
		<div class="box box-solid box-default">
			<div class="box-header with-border">
				<h4 class="box-title">
					<i class="fas fa-check-circle"></i>
					<?php echo e(ucFirst($project->name), false); ?>

				</h4>
			</div>
			<div class="box-body">
				<?php if(isset($project->customer->name)): ?>
					<i class="fa fa-briefcase"></i>
					<?php echo e($project->customer->name, false); ?>

				<?php endif; ?> <br>

				<?php if(isset($project->customer->mobile)): ?>
					<i class="fa fa-mobile"></i>
					<?php echo app('translator')->get('contact.mobile'); ?>: <?php echo e($project->customer->mobile, false); ?>

				<?php endif; ?> <br>

				<i class="fa fa-map-marker"></i>
				<?php echo app('translator')->get('business.address'); ?>:
				<?php if(isset($project->customer->landmark)): ?>
			        <?php echo e($project->customer->landmark, false); ?>

			    <?php endif; ?>

			    <?php if(isset($project->customer->city)): ?>
			    	<?php echo e(', ' . $project->customer->city, false); ?>

			    <?php endif; ?>

			    <?php if(isset($project->customer->state)): ?>
			        <?php echo e(', ' . $project->customer->state, false); ?>

			    <?php endif; ?>
			    <?php if(isset($project->customer->country)): ?>
			        <?php echo e(', ' . $project->customer->country, false); ?>

			    <?php endif; ?>
				<br>

				<i class="fas fa-check-circle"></i>
				<?php echo app('translator')->get('sale.status'); ?>:
				<?php echo app('translator')->get('project::lang.'.$project->status); ?>

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
			<!-- /.box-body -->
			<div class="box-footer">
				<?php if ($__env->exists('project::avatar.create', ['max_count' => '10', 'members' => $project->members])) echo $__env->make('project::avatar.create', ['max_count' => '10', 'members' => $project->members], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</div>
			<!-- /.box-footer-->
		</div>
	</div>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Project/Providers/../Resources/views/project/partials/overview.blade.php ENDPATH**/ ?>