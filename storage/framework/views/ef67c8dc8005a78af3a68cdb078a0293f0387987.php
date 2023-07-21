<br>
<div class="row">
	<div class="col-md-12">
	    <button type="button" class="btn btn-primary center-block more_btn" data-target="#contact_person_div"><?php echo app('translator')->get('crm::lang.add_contact_persons'); ?> <i class="fa fa-chevron-down"></i></button>
	</div>
</div>
<div id="contact_person_div" class="hide">
	<?php echo $__env->make('crm::contact_login.partial.contact_login_from', ['index' => 0], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('crm::contact_login.partial.contact_login_from', ['index' => 1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('crm::contact_login.partial.contact_login_from', ['index' => 2], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Crm/Providers/../Resources/views/contact_login/partial/contact_form_part.blade.php ENDPATH**/ ?>