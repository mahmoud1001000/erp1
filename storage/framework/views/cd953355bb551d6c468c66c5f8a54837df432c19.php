<div class="clearfix"></div>
<hr>
<div class="col-md-12">
	<h4><?php echo app('translator')->get('essentials::lang.hrm_details'); ?>:</h4>
</div>
<div class="col-md-4">
	<p><strong><?php echo app('translator')->get('essentials::lang.department'); ?>:</strong> <?php echo e($user_department->name ?? '', false); ?></p>
	<p><strong><?php echo app('translator')->get('essentials::lang.designation'); ?>:</strong> <?php echo e($user_designstion->name ?? '', false); ?></p>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Essentials/Providers/../Resources/views/partials/user_details_part.blade.php ENDPATH**/ ?>