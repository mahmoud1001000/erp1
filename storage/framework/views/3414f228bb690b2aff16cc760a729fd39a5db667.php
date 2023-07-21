

<?php $__env->startSection('title', __('crm::lang.lead')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('crm::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Content Header (Page header) -->
<section class="content-header no-print">
   <h1><?php echo app('translator')->get('crm::lang.leads'); ?></h1>
</section>

<section class="content no-print">
    <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <?php echo Form::label('source', __('crm::lang.source') . ':'); ?>

                    <?php echo Form::select('source', $sources, null, ['class' => 'form-control select2', 'id' => 'source', 'placeholder' => __('messages.all')]); ?>

                </div>    
            </div>
            <?php if($lead_view != 'kanban'): ?>
                <div class="col-md-4">
                    <div class="form-group">
                         <?php echo Form::label('life_stage', __('crm::lang.life_stage') . ':'); ?>

                        <?php echo Form::select('life_stage', $life_stages, null, ['class' => 'form-control select2', 'id' => 'life_stage', 'placeholder' => __('messages.all')]); ?>

                    </div>
                </div>
            <?php endif; ?>
            <?php if(count($users) > 0): ?>
            <div class="col-md-4">
                <div class="form-group">
                    <?php echo Form::label('user_id', __('lang_v1.assigned_to') . ':'); ?>

                    <?php echo Form::select('user_id', $users, null, ['class' => 'form-control select2', 'id' => 'user_id', 'placeholder' => __('messages.all')]); ?>

                </div>    
            </div>
            <?php endif; ?>
        </div>
    <?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __('crm::lang.all_leads')]); ?>
        <?php $__env->slot('tool'); ?>
            <div class="box-tools">
                <button type="button" class="btn btn-sm btn-primary btn-add-lead pull-right m-5" data-href="<?php echo e(action('\Modules\Crm\Http\Controllers\LeadController@create'), false); ?>">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->get('messages.add'); ?>
                </button>

                <div class="btn-group btn-group-toggle pull-right m-5" data-toggle="buttons">
                    <label class="btn btn-info btn-sm active list">
                        <input type="radio" name="lead_view" value="list_view" class="lead_view" data-href="<?php echo e(action('\Modules\Crm\Http\Controllers\LeadController@index').'?lead_view=list_view', false); ?>">
                        <?php echo app('translator')->get('crm::lang.list_view'); ?>
                    </label>
                    <label class="btn btn-info btn-sm kanban">
                        <input type="radio" name="lead_view" value="kanban" class="lead_view" data-href="<?php echo e(action('\Modules\Crm\Http\Controllers\LeadController@index').'?lead_view=kanban', false); ?>">
                        <?php echo app('translator')->get('crm::lang.kanban_board'); ?>
                    </label>
                </div>
            </div>
        <?php $__env->endSlot(); ?>
        <?php if($lead_view == 'list_view'): ?>
        	<table class="table table-bordered table-striped" id="leads_table">
		        <thead>
		            <tr>
		                <th> <?php echo app('translator')->get('messages.action'); ?></th>
		                <th><?php echo app('translator')->get('lang_v1.contact_id'); ?></th>
		                <th><?php echo app('translator')->get('contact.name'); ?></th>
                        <th><?php echo app('translator')->get('contact.mobile'); ?></th>
                        <th><?php echo app('translator')->get('business.email'); ?></th>
                        <th><?php echo app('translator')->get('crm::lang.source'); ?></th>
                        <th style="width: 200px !important">
                            <?php echo app('translator')->get('crm::lang.last_follow_up'); ?>
                        </th>
                        <th style="width: 200px !important">
                            <?php echo app('translator')->get('crm::lang.upcoming_follow_up'); ?>
                        </th>
                        <th><?php echo app('translator')->get('crm::lang.life_stage'); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.assigned_to'); ?></th>
                        <th><?php echo app('translator')->get('business.address'); ?></th>
                        <th><?php echo app('translator')->get('contact.tax_no'); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.added_on'); ?></th>
                        <?php
                            $custom_labels = json_decode(session('business.custom_labels'), true);
                        ?>
                        <th>
                            <?php echo e($custom_labels['contact']['custom_field_1'] ?? __('lang_v1.contact_custom_field1'), false); ?>

                        </th>
                        <th>
                            <?php echo e($custom_labels['contact']['custom_field_2'] ?? __('lang_v1.contact_custom_field2'), false); ?>

                        </th>
                        <th>
                            <?php echo e($custom_labels['contact']['custom_field_3'] ?? __('lang_v1.contact_custom_field3'), false); ?>

                        </th>
                        <th>
                            <?php echo e($custom_labels['contact']['custom_field_4'] ?? __('lang_v1.contact_custom_field4'), false); ?>

                        </th>
                        <th>
                            <?php echo e($custom_labels['contact']['custom_field_5'] ?? __('lang_v1.custom_field', ['number' => 5]), false); ?>

                        </th>
                        <th>
                            <?php echo e($custom_labels['contact']['custom_field_6'] ?? __('lang_v1.custom_field', ['number' => 6]), false); ?>

                        </th>
                        <th>
                            <?php echo e($custom_labels['contact']['custom_field_7'] ?? __('lang_v1.custom_field', ['number' => 7]), false); ?>

                        </th>
                        <th>
                            <?php echo e($custom_labels['contact']['custom_field_8'] ?? __('lang_v1.custom_field', ['number' => 8]), false); ?>

                        </th>
                        <th>
                            <?php echo e($custom_labels['contact']['custom_field_9'] ?? __('lang_v1.custom_field', ['number' => 9]), false); ?>

                        </th>
                        <th>
                            <?php echo e($custom_labels['contact']['custom_field_10'] ?? __('lang_v1.custom_field', ['number' => 10]), false); ?>

                        </th>
		            </tr>
		        </thead>
		    </table>
        <?php endif; ?>
        <?php if($lead_view == 'kanban'): ?>
            <div class="lead-kanban-board">
                <div class="page">
                    <div class="main">
                        <div class="meta-tasks-wrapper">
                            <div id="myKanban" class="meta-tasks">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="modal fade contact_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade schedule" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('modules/crm/js/crm.js?v=' . $asset_v), false); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var lead_view = urlSearchParam('lead_view');

            //if lead view is empty, set default to list_view
            if (_.isEmpty(lead_view)) {
                lead_view = 'list_view';
            }

            if (lead_view == 'kanban') {
                $('.kanban').addClass('active');
                $('.list').removeClass('active');
                initializeLeadKanbanBoard();
            } else if(lead_view == 'list_view') {
                initializeLeadDatatable();
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Crm/Providers/../Resources/views/lead/index.blade.php ENDPATH**/ ?>