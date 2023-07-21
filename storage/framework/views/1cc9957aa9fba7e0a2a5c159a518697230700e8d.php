<?php $__env->startSection('title', __('essentials::lang.hrm')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('essentials::layouts.nav_hrm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Main content -->
<section class="content">
	<div class="row row-custom">
		<div class="col-md-4 col-sm-6 col-xs-12 col-custom">
			<div class="box box-solid">
                <div class="box-body p-10">
                    <table class="table no-margin">
                    	<thead>
                    		<tr>
                    			<th colspan="2">
                    				<?php echo app('translator')->get('essentials::lang.my_leaves'); ?>
                    			</th>
                    		</tr>
                    		<?php $__empty_1 = true; $__currentLoopData = $users_leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    			<tr>
                    				<td>
                    					<?php echo e(\Carbon::createFromTimestamp(strtotime($user_leave->start_date))->format(session('business.date_format')), false); ?>

                    					- <?php echo e(\Carbon::createFromTimestamp(strtotime($user_leave->end_date))->format(session('business.date_format')), false); ?>

                    				</td>
                    				<td>
                    					<?php echo e($user_leave->leave_type->leave_type, false); ?>

                    				</td>
                    			</tr>
                    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    			<tr>
	                    			<td colspan="2" class="text-center">
	                    				<?php echo app('translator')->get('lang_v1.no_data'); ?>
	                    			</td>
	                    		</tr>
                    		<?php endif; ?>
                    	</thead>
                    </table>
                </div>
	        </div>
		</div>
		<?php if(!$is_admin): ?>
        	<?php echo $__env->make('essentials::dashboard.holidays', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     	<?php endif; ?>
	</div>
	<?php if($is_admin): ?>
	<hr>
	<?php endif; ?>
	<div class="row row-custom">
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.view')): ?>
	    <div class="col-md-4 col-sm-6 col-xs-12 col-custom">
	        <div class="box box-solid">
	            <div class="box-body p-10">
                	<div class="info-box info-box-new-style">
		            	<span class="info-box-icon bg-aqua"><i class="fas fa-users"></i></span>

		            	<div class="info-box-content">
		              		<span class="info-box-text"><?php echo e(__('user.users'), false); ?></span>
		              		<span class="info-box-number"><?php echo e($users->count(), false); ?></span>
		            	</div>
		            	<!-- /.info-box-content -->
		          	</div>
	                <table class="table no-margin">
	                    <thead>
	                        <tr>
	                            <th><?php echo e(__('essentials::lang.department'), false); ?></th>
	                            <th><?php echo e(__('sale.total'), false); ?></th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <?php $__empty_1 = true; $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
	                            <tr>
	                                <td><?php echo e($department->name, false); ?></td>
	                                <td><?php if(!empty($users_by_dept[$department->id])): ?><?php echo e(count($users_by_dept[$department->id]), false); ?> <?php else: ?> 0 <?php endif; ?></td>
	                            </tr>
	                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
	                            <tr>
	                                <td colspan="2" class="text-center"><?php echo app('translator')->get('lang_v1.no_data'); ?></td>
	                            </tr>
	                        <?php endif; ?>
	                    </tbody>
	                </table>
            	</div>
        	</div>
    	</div>
    	<?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('essentials.approve_leave')): ?>
    	<div class="col-md-4 col-sm-6 col-xs-12 col-custom">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fas fa-user-times"></i>
                    <h3 class="box-title"><?php echo app('translator')->get('essentials::lang.leaves'); ?></h3>
                </div>
                <div class="box-body p-10">
                    <table class="table no-margin">
                        <tr>
                            <th class="bg-light-gray" colspan="2"><?php echo app('translator')->get('home.today'); ?></th>
                        </tr>
                        <?php $__empty_1 = true; $__currentLoopData = $todays_leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                			<tr>
                				<td>
                					<?php echo e(\Carbon::createFromTimestamp(strtotime($leave->start_date))->format(session('business.date_format')), false); ?>

                					- <?php echo e(\Carbon::createFromTimestamp(strtotime($leave->end_date))->format(session('business.date_format')), false); ?>

                				</td>
                				<td>
                					<?php echo e($leave->leave_type->leave_type, false); ?>

                				</td>
                			</tr>
                		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                			<tr>
                    			<td colspan="2" class="text-center">
                    				<?php echo app('translator')->get('lang_v1.no_data'); ?>
                    			</td>
                    		</tr>
                		<?php endif; ?>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <th class="bg-light-gray" colspan="2"><?php echo app('translator')->get('lang_v1.upcoming'); ?></th>
                        </tr>
                        <?php $__empty_1 = true; $__currentLoopData = $upcoming_leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                			<tr>
                				<td>
                					<?php echo e(\Carbon::createFromTimestamp(strtotime($leave->start_date))->format(session('business.date_format')), false); ?>

                					- <?php echo e(\Carbon::createFromTimestamp(strtotime($leave->end_date))->format(session('business.date_format')), false); ?>

                				</td>
                				<td>
                					<?php echo e($leave->leave_type->leave_type, false); ?>

                				</td>
                			</tr>
                		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                			<tr>
                    			<td colspan="2" class="text-center">
                    				<?php echo app('translator')->get('lang_v1.no_data'); ?>
                    			</td>
                    		</tr>
                		<?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if($is_admin): ?>
        	<?php echo $__env->make('essentials::dashboard.holidays', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     	<?php endif; ?>
    </div>
    <div class="row row-custom">
    	<?php if($is_admin): ?>
    		<div class="col-md-4 col-sm-6 col-xs-12 col-custom">
	        	<div class="box box-solid">
	        		<div class="box-header with-border">
	                    <i class="fas fa-user-check"></i>
	                    <h3 class="box-title"><?php echo app('translator')->get('essentials::lang.todays_attendance'); ?></h3>
	                </div>
	                <div class="box-body p-10">
	                    <table class="table no-margin">
	                    	<thead>
	                    		<tr>
	                    			<th>
	                    				<?php echo app('translator')->get('essentials::lang.employee'); ?>
	                    			</th>
	                    			<th>
	                    				<?php echo app('translator')->get('essentials::lang.clock_in'); ?>
	                    			</th>
	                    			<th>
	                    				<?php echo app('translator')->get('essentials::lang.clock_out'); ?>
	                    			</th>
	                    		</tr>
	                    	</thead>
	                        <tbody>
		                        <?php $__empty_1 = true; $__currentLoopData = $todays_attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
	                                <tr>
	                                    <td><?php echo e($attendance->employee->user_full_name, false); ?></td>
	                                    <td>
	                                    	<?php echo e(\Carbon::createFromTimestamp(strtotime($attendance->clock_in_time))->format(session('business.date_format') . ' ' . 'H:i'), false); ?>


	                                    	<?php if(!empty($attendance->clock_in_note)): ?>
	                                    		<br><small><?php echo e($attendance->clock_in_note, false); ?></small>
	                                    	<?php endif; ?>
	                                    </td>
	                                    <td>
	                                    	<?php if(!empty($attendance->clock_out_time)): ?>
	                                    		<?php echo e(\Carbon::createFromTimestamp(strtotime($attendance->clock_out_time))->format(session('business.date_format') . ' ' . 'H:i'), false); ?>

	                                    	<?php endif; ?>

	                                    	<?php if(!empty($attendance->clock_out_note)): ?>
	                                    		<br><small><?php echo e($attendance->clock_out_note, false); ?></small>
	                                    	<?php endif; ?>
	                                   	</td>
	                                </tr>
	                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
	                                <tr>
	                                    <td colspan="3" class="text-center"><?php echo app('translator')->get('lang_v1.no_data'); ?></td>
	                                </tr>
	                            <?php endif; ?>
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>
    	<?php endif; ?>
    </div>
    
</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Essentials/Providers/../Resources/views/dashboard/hrm_dashboard.blade.php ENDPATH**/ ?>