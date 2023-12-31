<?php if($__is_essentials_enabled && $is_employee_allowed): ?>
	<button 
		type="button" 
		class="btn bg-blue btn-flat 
		pull-left m-8 btn-sm mt-10 
		clock_in_btn
		<?php if(!empty($clock_in)): ?>
	    	hide
	    <?php endif; ?>
		"
	    data-type="clock_in"
	    data-toggle="tooltip"
	    data-placement="bottom"
	    title="<?php echo app('translator')->get('essentials::lang.clock_in'); ?>" 
	    >
	    <i class="fas fa-arrow-circle-down"></i>
	</button>

	<button 
		type="button" 
		class="btn bg-yellow btn-flat pull-left m-8 
		 btn-sm mt-10 clock_out_btn
		<?php if(empty($clock_in)): ?>
	    	hide
	    <?php endif; ?>
		" 	
	    data-type="clock_out"
	    data-toggle="tooltip"
	    data-placement="bottom"
	    data-html="true"
	    title="<?php echo app('translator')->get('essentials::lang.clock_out'); ?> <?php if(!empty($clock_in)): ?>
                    <br><small>(<?php echo app('translator')->get('essentials::lang.clocked_in_at'); ?>: <?php echo e(\Carbon::createFromTimestamp(strtotime($clock_in->clock_in_time))->format(session('business.date_format') . ' ' . 'H:i'), false); ?>)</small>
                <?php endif; ?>" 
	    >
	    <i class="fas fa-hourglass-half fa-spin"></i>
	</button>
<?php endif; ?><?php /**PATH /home/u373816316/domains/erp4anyone.com/public_html/4any/Modules/Essentials/Providers/../Resources/views/layouts/partials/header_part.blade.php ENDPATH**/ ?>