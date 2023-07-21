

<?php $__env->startSection('title', __('crm::lang.contacts_login')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('crm::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Content Header (Page header) -->
<section class="content-header no-print">
   <h1><?php echo app('translator')->get('crm::lang.contacts_login'); ?></h1>
</section>
<section class="content no-print">
	<input type="hidden" id="login_view_type" value="all_contacts_login">
	<?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <?php echo Form::label('contact_id', __('contact.contact') . ':'); ?>

                    <?php echo Form::select('contact_id', $contacts, null, ['class' => 'form-control select2', 'id' => 'contact_id', 'placeholder' => __('messages.all')]); ?>

                </div>    
            </div>
        </div>
    <?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __('crm::lang.all_contacts_login')]); ?>
		<?php $__env->slot('tool'); ?>
			<div class="box-tools">
				<a class="btn btn-sm btn-primary pull-right contact-login-add" data-href="<?php echo e(action('\Modules\Crm\Http\Controllers\ContactLoginController@create'), false); ?>" >
					<i class="fa fa-plus"></i>
					<?php echo app('translator')->get( 'messages.add' ); ?>
				</a>
			</div>
		<?php $__env->endSlot(); ?>
		<div class="table-responsive">
			<table class="table table-bordered table-striped" id="contact_login_table" style="width: 100%;">
				<thead>
					<tr>
						<th><?php echo app('translator')->get('messages.action'); ?></th>
						<th><?php echo app('translator')->get('contact.contact'); ?></th>
						<th><?php echo app('translator')->get('business.username'); ?></th>
		                <th><?php echo app('translator')->get('user.name'); ?></th>
		                <th><?php echo app('translator')->get( 'business.email' ); ?></th>
					</tr>
				</thead>
			</table>
		</div>
	<?php echo $__env->renderComponent(); ?>
	<div class="modal fade contact_login_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel"></div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
	<?php if ($__env->exists('crm::contact_login.contact_login_js')) echo $__env->make('crm::contact_login.contact_login_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Crm/Providers/../Resources/views/contact_login/all_contacts_login.blade.php ENDPATH**/ ?>