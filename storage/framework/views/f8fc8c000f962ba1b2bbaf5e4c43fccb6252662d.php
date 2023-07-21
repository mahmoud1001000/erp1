<?php if($can_crud_timelog || $is_lead_or_admin): ?>
    <button type="button" class="btn btn-sm btn-primary time_log_btn pull-right" data-href="<?php echo e(action('\Modules\Project\Http\Controllers\ProjectTimeLogController@create', ['project_id' => $project->id]), false); ?>">
        <?php echo app('translator')->get('messages.add'); ?>&nbsp;
        <i class="fa fa-plus"></i>
    </button> <br><br>
<?php endif; ?>
<div class="table-responsive">
    <table class="table table-bordered table-striped" id="time_logs_table">
        <thead>
            <tr>
                <th> <?php echo app('translator')->get('messages.action'); ?></th>
                <th> <?php echo app('translator')->get('project::lang.task'); ?></th>
                <th> <?php echo app('translator')->get('project::lang.start_date_time'); ?></th>
                <th><?php echo app('translator')->get('project::lang.end_date_time'); ?></th>
                <th><?php echo app('translator')->get('project::lang.work_hour'); ?></th>
                <th><?php echo app('translator')->get('role.user'); ?></th>
                <th><?php echo app('translator')->get('brand.note'); ?></th>
            </tr>
        </thead>
    </table>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Project/Providers/../Resources/views/time_logs/index.blade.php ENDPATH**/ ?>