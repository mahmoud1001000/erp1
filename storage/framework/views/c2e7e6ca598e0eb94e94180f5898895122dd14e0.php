<?php if($can_crud_task || $is_lead_or_admin): ?>
<button type="button" class="btn btn-sm btn-primary task_btn pull-right m-5" data-href="<?php echo e(action('\Modules\Project\Http\Controllers\TaskController@create', ['project_id' => $project->id]), false); ?>">
    <?php echo app('translator')->get('messages.add'); ?>&nbsp;
    <i class="fa fa-plus"></i>
</button>
<?php endif; ?>
<div class="btn-group btn-group-toggle pull-right m-5" data-toggle="buttons">
    <label class="btn btn-info btn-sm 
        <?php if((!empty($project->settings) && !isset($project->settings['task_view'])) || (isset($project->settings['task_view']) &&
                $project->settings['task_view'] == 'list_view')): ?>
            active
        <?php endif; ?>">
        <input type="radio" name="task_view" value="list_view" class="task_view" 
           <?php if((!empty($project->settings) && !isset($project->settings['task_view'])) || (isset($project->settings['task_view']) &&
                $project->settings['task_view'] == 'list_view')): ?>
                checked
            <?php endif; ?>>
        <?php echo app('translator')->get('project::lang.list_view'); ?>
    </label>
    <label class="btn btn-info btn-sm
        <?php if(isset($project->settings['task_view']) &&
        $project->settings['task_view'] == 'kanban'): ?>
            active
        <?php endif; ?>">
        <input type="radio" name="task_view" value="kanban" class="task_view" 
            <?php if(isset($project->settings['task_view']) &&
            $project->settings['task_view'] == 'kanban'): ?>
                checked
            <?php endif; ?>>
        <?php echo app('translator')->get('project::lang.kanban_board'); ?>
    </label>
</div>
<br><br>
<div class="table-responsive
    <?php if(isset($project->settings['task_view']) &&
        $project->settings['task_view'] != 'list_view'): ?>
        hide
    <?php endif; ?>">
    <table class="table table-bordered table-striped" id="project_task_table">
        <thead>
            <tr>
                <th> <?php echo app('translator')->get('messages.action'); ?></th>
                <th class="col-md-4"> <?php echo app('translator')->get('project::lang.subject'); ?></th>
                <th class="col-md-2"> <?php echo app('translator')->get('project::lang.assigned_to'); ?></th>
                <th> <?php echo app('translator')->get('project::lang.priority'); ?></th>
                <th> <?php echo app('translator')->get('business.start_date'); ?></th>
                <th><?php echo app('translator')->get('project::lang.due_date'); ?></th>
                <th><?php echo app('translator')->get('sale.status'); ?></th>
                <th><?php echo app('translator')->get('project::lang.assigned_by'); ?></th>
                <th><?php echo app('translator')->get('project::lang.task_custom_field_1'); ?></th>
                <th><?php echo app('translator')->get('project::lang.task_custom_field_2'); ?></th>
                <th><?php echo app('translator')->get('project::lang.task_custom_field_3'); ?></th>
                <th><?php echo app('translator')->get('project::lang.task_custom_field_4'); ?></th>
            </tr>
        </thead>
    </table>
</div>

<div class="custom-kanban-board
    <?php if(isset($project->settings['task_view']) &&
    $project->settings['task_view'] != 'kanban'): ?>
        hide
    <?php endif; ?>">
    <div class="page">
        <div class="main">
            <div class="meta-tasks-wrapper">
                <div id="myKanban" class="meta-tasks"></div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Project/Providers/../Resources/views/task/index.blade.php ENDPATH**/ ?>