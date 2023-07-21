
<?php $__env->startSection('title', __('project::lang.project_report')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('project::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="content-header">
    <h1>
        <?php echo app('translator')->get('report.reports'); ?>
        <small>
            <?php echo app('translator')->get('project::lang.time_logs'); ?> <?php echo app('translator')->get('project::lang.by_employees'); ?>
        </small>
    </h1>
</section>
<section class="content">
    <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
		<div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <?php echo Form::label('employee_timelog_report_user_id', __('role.user') .':'); ?>

                   <?php echo Form::select('user_id[]', $employees, null, ['class' => 'form-control select2', 'id' => 'employee_timelog_report_user_id', 'multiple', 'style' => 'width: 100%;']); ?>

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <?php echo Form::label('employee_timelog_report_project_id', __('project::lang.project') . ':'); ?>

                    <?php echo Form::select('project_id[]', $projects, null, ['class' => 'form-control select2', 'id' => 'employee_timelog_report_project_id', 'multiple', 'style' => 'width: 100%;']); ?>

                </div>    
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <?php echo Form::label('employee_timelog_report_daterange', __('report.date_range') . ':'); ?>

                    <?php echo Form::text('date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'id' => 'employee_timelog_report_daterange', 'readonly']); ?>

                </div>
            </div>
        </div>
    <?php echo $__env->renderComponent(); ?>
    <div class="box box-solid">
    	<div class="box-body employee_time_logs_report">
    	</div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script src="<?php echo e(asset('modules/project/js/project.js?v=' . $asset_v), false); ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        getEmployeeTimeLogReport();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Project/Providers/../Resources/views/reports/employee_timelog.blade.php ENDPATH**/ ?>