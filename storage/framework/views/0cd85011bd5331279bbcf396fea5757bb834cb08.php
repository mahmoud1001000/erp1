

<?php $__env->startSection('title', __('crm::lang.campaigns')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('crm::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Content Header (Page header) -->
<section class="content-header no-print">
   <h1><?php echo app('translator')->get('crm::lang.campaigns'); ?></h1>
</section>
<section class="content no-print">
	<?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <?php echo Form::label('campaign_type', __('crm::lang.campaign_type') . ':'); ?>

                    <?php echo Form::select('campaign_type', ['sms' => __('crm::lang.sms'), 'email' => __('business.email')], null, ['class' => 'form-control select2', 'id' => 'campaign_type_filter', 'placeholder' => __('messages.all')]); ?>

                </div>    
            </div>
        </div>
    <?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __('crm::lang.all_campaigns')]); ?>
        <?php $__env->slot('tool'); ?>
        	<div class="box-tools">
                <a class="btn btn-sm btn-primary pull-right m-5" href="<?php echo e(action('\Modules\Crm\Http\Controllers\CampaignController@create'), false); ?>">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->get('messages.add'); ?>
                </a>
            </div>
        <?php $__env->endSlot(); ?>
        <div class="table-responsive">
        	<table class="table table-bordered table-striped" id="campaigns_table">
		        <thead>
		            <tr>
		                <th> <?php echo app('translator')->get('messages.action'); ?></th>
		                <th><?php echo app('translator')->get('crm::lang.campaign_name'); ?></th>
		                <th><?php echo app('translator')->get('crm::lang.campaign_type'); ?></th>
		                <th><?php echo app('translator')->get('business.created_by'); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.created_at'); ?></th>
		            </tr>
		        </thead>
		    </table>
        </div>
    <?php echo $__env->renderComponent(); ?>
    <div class="modal fade campaign_modal" tabindex="-1" role="dialog"></div>
    <div class="modal fade campaign_view_modal" tabindex="-1" role="dialog"></div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('modules/crm/js/crm.js?v=' . $asset_v), false); ?>"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			initializeCampaignDatatable();
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Crm/Providers/../Resources/views/campaign/index.blade.php ENDPATH**/ ?>