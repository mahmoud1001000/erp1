<?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php if($package->is_private == 1 && !auth()->user()->can('superadmin')): ?>
		<?php
			continue;
		?>
	<?php endif; ?>
    <div class="col-md-4">

		<div class="box box-success hvr-grow-shadow">
			<div class="box-header with-border text-center">
				<h2 class="box-title"><?php echo e($package->name, false); ?></h2>
			</div>
			
			<!-- /.box-header -->
			<div class="box-body text-center">

				<i class="fa fa-check text-success"></i>
				<?php if($package->location_count == 0): ?>
					<?php echo app('translator')->get('superadmin::lang.unlimited'); ?>
				<?php else: ?>
					<?php echo e($package->location_count, false); ?>

				<?php endif; ?>

				<?php echo app('translator')->get('business.business_locations'); ?>
				<br/><br/>

				<i class="fa fa-check text-success"></i>
				<?php if($package->user_count == 0): ?>
					<?php echo app('translator')->get('superadmin::lang.unlimited'); ?>
				<?php else: ?>
					<?php echo e($package->user_count, false); ?>

				<?php endif; ?>

				<?php echo app('translator')->get('superadmin::lang.users'); ?>
				<br/><br/>

				<i class="fa fa-check text-success"></i>
				<?php if($package->product_count == 0): ?>
					<?php echo app('translator')->get('superadmin::lang.unlimited'); ?>
				<?php else: ?>
					<?php echo e($package->product_count, false); ?>

				<?php endif; ?>

				<?php echo app('translator')->get('superadmin::lang.products'); ?>
				<br/><br/>

				<i class="fa fa-check text-success"></i>
				<?php if($package->invoice_count == 0): ?>
					<?php echo app('translator')->get('superadmin::lang.unlimited'); ?>
				<?php else: ?>
					<?php echo e($package->invoice_count, false); ?>

				<?php endif; ?>

				<?php echo app('translator')->get('superadmin::lang.invoices'); ?>
				<br/><br/>

				<?php if(!empty($package->custom_permissions)): ?>
					<?php $__currentLoopData = $package->custom_permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(isset($permission_formatted[$permission])): ?>
							<i class="fa fa-check text-success"></i>
							<?php echo e($permission_formatted[$permission], false); ?>

							<br/><br/>
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>

				<?php if($package->trial_days != 0): ?>
					<i class="fa fa-check text-success"></i>
					 <?php echo app('translator')->get('superadmin::lang.trial_days'); ?> : <?php echo e($package->trial_days, false); ?>    <?php echo app('translator')->get('superadmin::lang.days'); ?>
					<br/><br/>
				<?php endif; ?>
				
				<h3 class="text-center">
				<?php
					$interval_type = !empty($intervals[$package->interval]) ? $intervals[$package->interval] : __('superadmin::lang.' . $package->interval);
				?>
					<?php if($package->price != 0): ?>
						<span class="display_currency" data-currency_symbol="true">
							<?php echo e($package->price, false); ?>

						</span>

						<small>
							/ <?php echo e($package->interval_count, false); ?> <?php echo e($interval_type, false); ?>

						</small>
					<?php else: ?>
						<?php echo app('translator')->get('superadmin::lang.free_for_duration'); ?> : <?php echo e($package->interval_count, false); ?> <?php echo e($interval_type, false); ?>

					<?php endif; ?>
				</h3>
			</div>
			<!-- /.box-body -->

			<div class="box-footer bg-gray disabled text-center">
				<?php if($package->enable_custom_link == 1): ?>
					<a href="<?php echo e($package->custom_link, false); ?>" class="btn btn-block btn-success"><?php echo e($package->custom_link_text, false); ?></a>
				<?php else: ?>
					<?php if(isset($action_type) && $action_type == 'register'): ?>
						<a href="<?php echo e(route('business.getRegister'), false); ?>?package=<?php echo e($package->id, false); ?>" 
						class="btn btn-block btn-success">
		    				<?php if($package->price != 0): ?>
		    					<?php echo app('translator')->get('superadmin::lang.register_subscribe'); ?>
		    				<?php else: ?>
		    					<?php echo app('translator')->get('superadmin::lang.register_free'); ?>
		    				<?php endif; ?>
	    				</a>
					<?php else: ?>
	    				<a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\SubscriptionController@pay', [$package->id]), false); ?>" 
						class="btn btn-block btn-success">
		    				<?php if($package->price != 0): ?>
		    					<?php echo app('translator')->get('superadmin::lang.pay_and_subscribe'); ?>
		    				<?php else: ?>
		    					<?php echo app('translator')->get('superadmin::lang.subscribe'); ?>
		    				<?php endif; ?>
	    				</a>
					<?php endif; ?>
				<?php endif; ?>

    			<?php echo e($package->description, false); ?>

			</div>
		</div>
		<!-- /.box -->
    </div>
    <?php if($loop->iteration%3 == 0): ?>
    	<div class="clearfix"></div>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Superadmin/Providers/../Resources/views/subscription/partials/packages.blade.php ENDPATH**/ ?>