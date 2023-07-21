<?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php if($loop->iteration < $max_count): ?>
		<?php if(isset($member->media->display_url)): ?>
			<img class="user_avatar" src="<?php echo e($member->media->display_url, false); ?>" data-toggle="tooltip" title="<?php echo e($member->user_full_name, false); ?>">
		<?php else: ?>
			<img class="user_avatar" src="https://ui-avatars.com/api/?name=<?php echo e($member->first_name, false); ?>" data-toggle="tooltip" title="<?php echo e($member->user_full_name, false); ?>">
		<?php endif; ?>
	<?php elseif($loop->iteration == $max_count): ?>
		<img class="user_avatar" src="https://ui-avatars.com/api/?name=...." data-toggle="tooltip" title="...">
	<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Project/Providers/../Resources/views/avatar/create.blade.php ENDPATH**/ ?>