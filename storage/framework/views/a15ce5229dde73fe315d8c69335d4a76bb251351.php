
<?php $__env->startSection('title', __('project::lang.view_project')); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1>
        <i class="fas fa-check-circle"></i>
        <?php echo e(ucFirst($project->name), false); ?>

    </h1>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
           <!-- Custom Tabs -->
           <!-- project_id to be used in datatable -->
           	<input type="hidden" name="project_id" id="project_id" value="<?php echo e($project->id, false); ?>">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="
                        <?php if($tab_view == 'overview'): ?>
                            active
                        <?php else: ?>
                            ''
                        <?php endif; ?>">
                        <a href="#project_overview" data-toggle="tab" aria-expanded="true" data-url="<?php echo e(action('\Modules\Project\Http\Controllers\ProjectController@show', [$project->id]).'?view=overview', false); ?>">
                        	<i class="fas fa-tachometer-alt"></i>
                        	<?php echo app('translator')->get('project::lang.overview'); ?>
                        </a>
                    </li>

                    <li class="
                        <?php if($tab_view == 'activities'): ?>
                            active
                        <?php else: ?>
                            ''
                        <?php endif; ?>">
                        <a href="#activities" data-toggle="tab" aria-expanded="true">
                            <i class="fas fa-chart-line"></i>
                            <?php echo app('translator')->get('lang_v1.activities'); ?>
                        </a>
                    </li>

                    <li class="
                        <?php if($tab_view == 'project_task'): ?>
                            active
                        <?php else: ?>
                            ''
                        <?php endif; ?>">
                        <a href="#project_task" data-toggle="tab" aria-expanded="true">
                        	<i class="fa fa-tasks"></i>
                        	<?php echo app('translator')->get('project::lang.task'); ?>
                        </a>
                    </li>

                    <?php if(isset($project->settings['enable_timelog']) && $project->settings['enable_timelog']): ?>
                        <li class="
                            <?php if($tab_view == 'time_log'): ?>
                                active
                            <?php else: ?>
                                ''
                            <?php endif; ?>">
                        	<a href="#time_log" data-toggle="tab" aria-expanded="true">
                        		<i class="fas fa-clock"></i>
                        		<?php echo app('translator')->get('project::lang.time_logs'); ?>
                        	</a>
                        </li>
                    <?php endif; ?>

                    <?php if(isset($project->settings['enable_notes_documents']) && $project->settings['enable_notes_documents']): ?>
                        <li class="
                            <?php if($tab_view == 'documents_and_notes'): ?>
                                active
                            <?php else: ?>
                                ''
                            <?php endif; ?>">
                            <a href="#documents_and_notes" data-toggle="tab" aria-expanded="true">
                                <i class="fas fa-file-image"></i>
                                <?php echo app('translator')->get('project::lang.documents_and_notes'); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    
                    <?php if((isset($project->settings['enable_invoice']) && $project->settings['enable_invoice']) && $is_lead_or_admin): ?>
                    <li class="
                        <?php if($tab_view == 'project_invoices'): ?>
                            active
                        <?php else: ?>
                            ''
                        <?php endif; ?>">
                        <a href="#project_invoices" data-toggle="tab" aria-expanded="true">
                            <i class="fa fa-file"></i>
                            <?php echo app('translator')->get('project::lang.invoices'); ?>
                        </a>
                    </li>
                    <?php endif; ?>

                    <?php if($is_lead_or_admin): ?>
                    <li class="
                        <?php if($tab_view == 'project_settings'): ?>
                            active
                        <?php else: ?>
                            ''
                        <?php endif; ?>">
                        <a href="#project_settings" data-toggle="tab" aria-expanded="true">
                            <i class="fa fa-cogs"></i>
                            <?php echo app('translator')->get('role.settings'); ?>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane
                        <?php if($tab_view == 'overview'): ?>
                            active
                        <?php else: ?>
                            ''
                        <?php endif; ?>" id="project_overview"> 
                        <?php if ($__env->exists('project::project.partials.overview')) echo $__env->make('project::project.partials.overview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <div class="tab-pane
                        <?php if($tab_view == 'activities'): ?>
                            active
                        <?php else: ?>
                            ''
                        <?php endif; ?>" id="activities">
                        <ul class="timeline">
                        </ul>
                    </div>

                    <div class="tab-pane
                        <?php if($tab_view == 'project_task'): ?>
                            active
                        <?php else: ?>
                            ''
                        <?php endif; ?>" id="project_task">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo Form::label('assigned_to_filter', __('project::lang.assigned_to') . ':'); ?>

                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <?php echo Form::select('assigned_to_filter', $project_members, null, ['class' => 'form-control select2', 'placeholder' => __('messages.all'), 'style' => 'width: 100%;']); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 status_filter
                                <?php if(isset($project->settings['task_view']) &&
                                $project->settings['task_view'] == 'kanban'): ?>
                                    hide
                                <?php endif; ?>">
                                <div class="form-group">
                                    <?php echo Form::label('status_filter', __('sale.status') . ':'); ?>

                                    <?php echo Form::select('status_filter', $statuses, null, ['class' => 'form-control select2', 'placeholder' => __('messages.all'), 'style' => 'width: 100%;']); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo Form::label('priority_filter', __('project::lang.priority') .':'); ?>

                                    <?php echo Form::select('priority_filter', $priorities, null, ['class' => 'form-control select2', 'placeholder' => __('messages.all'), 'style' => 'width: 100%;']); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo Form::label('due_date_filter', __('project::lang.due_date') . ':'); ?>

                                    <?php echo Form::select('due_date_filter', $due_dates, null, ['class' => 'form-control select2', 'placeholder' => __('messages.all'), 'style' => 'width: 100%;']); ?>

                                </div>
                            </div>
                        </div>
                        <?php if ($__env->exists('project::task.index')) echo $__env->make('project::task.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <?php if(isset($project->settings['enable_timelog']) && $project->settings['enable_timelog']): ?>
                        <div class="tab-pane
                            <?php if($tab_view == 'time_log'): ?>
                                active
                            <?php else: ?>
                                ''
                            <?php endif; ?>" id="time_log">
                        	<?php if ($__env->exists('project::time_logs.index')) echo $__env->make('project::time_logs.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endif; ?>

                    <?php if(isset($project->settings['enable_notes_documents']) && $project->settings['enable_notes_documents']): ?>
                        <!-- model id like project_id, user_id -->
                        <input type="hidden" name="notable_id" id="notable_id" value="<?php echo e($project->id, false); ?>">
                        <!-- model name like App\User -->
                        <input type="hidden" name="notable_type" id="notable_type" value="Modules\Project\Entities\Project">
                        <div class="tab-pane document_note_body
                            <?php if($tab_view == 'documents_and_notes'): ?>
                                active
                            <?php else: ?>
                                ''
                            <?php endif; ?>" id="documents_and_notes">
                        </div>
                    <?php endif; ?>

                    <?php if((isset($project->settings['enable_invoice']) && $project->settings['enable_invoice']) && $is_lead_or_admin): ?>
                        <div class="tab-pane
                            <?php if($tab_view == 'project_invoices'): ?>
                                active
                            <?php else: ?>
                                ''
                            <?php endif; ?>" id="project_invoices">
                            <?php if ($__env->exists('project::invoice.index')) echo $__env->make('project::invoice.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endif; ?>
                    <?php if($is_lead_or_admin): ?>
                        <div class="tab-pane
                            <?php if($tab_view == 'project_settings'): ?>
                                active
                            <?php else: ?>
                                ''
                            <?php endif; ?>" id="project_settings">
                            <?php if ($__env->exists('project::settings.create')) echo $__env->make('project::settings.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade project_task_model" tabindex="-1" role="dialog"></div>
    <div class="modal fade" tabindex="-1" role="dialog" id="time_log_model"></div>
    <div class="modal fade view_project_task_model" tabindex="-1" role="dialog"></div>
    <div class="modal fade payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel"></div>
    <div class="modal fade edit_payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel"></div>
</section>
<link rel="stylesheet" href="<?php echo e(asset('modules/project/sass/project.css?v=' . $asset_v), false); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script src="<?php echo e(asset('modules/project/js/project.js?v=' . $asset_v), false); ?>"></script>
<script src="<?php echo e(asset('js/payment.js?v=' . $asset_v), false); ?>"></script>
<script type="text/javascript">
    var tab_view = '<?php echo $tab_view; ?>';

    if (tab_view == 'activities') {
        initializeActivities();
    } else if (tab_view == 'project_task') {
        initializeProjectTaskDatatable();
    } else if (tab_view == 'time_log') {
        initializeTimeLogDatatable();
    } else if (tab_view == 'documents_and_notes') {
        initializeNotesDataTable();
    } else if (tab_view == 'project_invoices') {
        initializeInvoiceDatatable();
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Project/Providers/../Resources/views/project/show.blade.php ENDPATH**/ ?>