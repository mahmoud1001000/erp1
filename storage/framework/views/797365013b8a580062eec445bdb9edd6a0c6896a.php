<?php $__env->startSection('title', __('superadmin::lang.superadmin') . ' | ' . __('superadmin::lang.packages')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('superadmin::lang.packages'); ?> <small><?php echo app('translator')->get('superadmin::lang.all_packages'); ?></small></h1>
    <!-- <ol class="breadcrumb">
        <a href="#"><i class="fa fa-dashboard"></i> Level</a><br/>
        <li class="active">Here<br/>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
	<?php echo $__env->make('superadmin::layouts.partials.currency', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<div class="box">
        <div class="box-header">
            <h3 class="box-title">&nbsp;</h3>
        	<div class="box-tools">
                <a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\PackagesController@create'), false); ?>" 
                    class="btn btn-block btn-primary">
                	<i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></a>
            </div>
        </div>

        <div class="box-body">
        	<?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                	
					<div class="box box-success hvr-grow-shadow">
						<div class="box-header with-border text-center">
							<h2 class="box-title"><?php echo e($package->name, false); ?></h2>

							<div class="row">
								<?php if($package->is_active == 1): ?>
									<span class="badge bg-green">
										<?php echo app('translator')->get('superadmin::lang.active'); ?>
									</span>
								<?php else: ?>
									<span class="badge bg-red">
									<?php echo app('translator')->get('superadmin::lang.inactive'); ?>
									</span>
								<?php endif; ?>
								

							</div>
						</div>
						<!-- /.box-header -->
						<div class="box-body text-center" style="text-align: right;line-height: initial;">

							<?php if($package->location_count == 0): ?>
								<?php echo app('translator')->get('superadmin::lang.unlimited'); ?>
							<?php else: ?>
								<?php echo e($package->location_count, false); ?>

							<?php endif; ?>

							<?php echo app('translator')->get('business.business_locations'); ?>
							<br/>

							<?php if($package->user_count == 0): ?>
								<?php echo app('translator')->get('superadmin::lang.unlimited'); ?>
							<?php else: ?>
								<?php echo e($package->user_count, false); ?>

							<?php endif; ?>

							<?php echo app('translator')->get('superadmin::lang.users'); ?>
							<br/>
						
							<?php if($package->product_count == 0): ?>
								<?php echo app('translator')->get('superadmin::lang.unlimited'); ?>
							<?php else: ?>
								<?php echo e($package->product_count, false); ?>

							<?php endif; ?>

							<?php echo app('translator')->get('superadmin::lang.products'); ?>
							<br/>

							<?php if($package->invoice_count == 0): ?>
								<?php echo app('translator')->get('superadmin::lang.unlimited'); ?>
							<?php else: ?>
								<?php echo e($package->invoice_count, false); ?>

							<?php endif; ?>

							<?php echo app('translator')->get('superadmin::lang.invoices'); ?>
							<br/>

							<?php if($package->trial_days != 0): ?>
									<?php echo app('translator')->get('superadmin::lang.trial_days'); ?> :<?php echo e($package->trial_days, false); ?>

								<br/>
							<?php endif; ?>

							<?php if(!empty($package->custom_permissions)): ?>
								<?php $__currentLoopData = $package->custom_permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if(isset($permission_formatted[$permission])): ?>
										<?php echo e($permission_formatted[$permission], false); ?>

										<br/>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>
							
							<h3 class="text-center">
								<?php if($package->price != 0): ?>
									<span class="display_currency" >
										<?php echo e($package->price, false); ?>

									</span>

									<small>
										/ <?php echo e($package->interval_count, false); ?> <?php echo e(__('lang_v1.' . $package->interval), false); ?>

									</small>
								<?php else: ?>
									<?php echo app('translator')->get('superadmin::lang.free_for_duration', ['duration' => $package->interval_count . ' ' . __('lang_v1.' . $package->interval)]); ?>
								<?php endif; ?>
							</h3>

						</div>
						<!-- /.box-body -->

						<div class="box-footer text-center">
							<?php echo e($package->description, false); ?>

						</div>
						<div class="packag-footer" style="margin-bottom: 20px;text-align: center;">
						<a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\PackagesController@edit', [$package->id]), false); ?>" class="btn btn-primary" title="edit"><i class="fa fa-edit"></i></a>
							<a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\PackagesController@destroy', [$package->id]), false); ?>" class="btn btn-danger link_confirmation" title="delete"><i class="fa fa-trash"></i></a>
						</div>
					</div>

                </div>
                <?php if($loop->iteration%3 == 0): ?>
    				<div class="clearfix"></div>
    			<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="col-md-12">
                <?php echo e($packages->links(), false); ?>

            </div>
        </div>

    </div>

    <div class="modal fade brands_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Superadmin/Providers/../Resources/views/packages/index.blade.php ENDPATH**/ ?>