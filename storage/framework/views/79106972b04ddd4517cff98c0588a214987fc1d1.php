<section class="no-print">
    <nav class="navbar navbar-default bg-white m-4">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo e(action('\Modules\Project\Http\Controllers\ProjectController@index') . '?project_view=list_view', false); ?>"><i class="fas fa-project-diagram"></i> <?php echo e(__('project::lang.project'), false); ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                        <li <?php if(request()->segment(2) == 'project'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('\Modules\Project\Http\Controllers\ProjectController@index') . '?project_view=list_view', false); ?>"><?php echo app('translator')->get('project::lang.projects'); ?></a></li>

                        <li <?php if(request()->segment(2) == 'project-task'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('\Modules\Project\Http\Controllers\TaskController@index'), false); ?>"><?php echo app('translator')->get('project::lang.my_tasks'); ?></a></li>

                    <?php if($__is_admin): ?>
                        <li <?php if(request()->segment(2) == 'project-reports'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('\Modules\Project\Http\Controllers\ReportController@index'), false); ?>"><?php echo app('translator')->get('report.reports'); ?></a></li>

                        <li <?php if(request()->get('type') == 'project'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('TaxonomyController@index') . '?type=project', false); ?>"><?php echo app('translator')->get('project::lang.project_categories'); ?></a></li>
                    <?php endif; ?>
                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</section><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Project/Providers/../Resources/views/layouts/nav.blade.php ENDPATH**/ ?>