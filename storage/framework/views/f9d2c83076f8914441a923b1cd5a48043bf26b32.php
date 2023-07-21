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
                <a class="navbar-brand" href="<?php echo e(action('\Modules\Crm\Http\Controllers\CrmDashboardController@index'), false); ?>"><i class="fas fa fa-broadcast-tower"></i> <?php echo e(__('crm::lang.crm'), false); ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php if(auth()->user()->can('crm.access_all_leads') || auth()->user()->can('crm.access_own_leads')): ?>
                    <li <?php if(request()->segment(2) == 'leads'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('\Modules\Crm\Http\Controllers\LeadController@index'). '?lead_view=list_view', false); ?>"><?php echo app('translator')->get('crm::lang.leads'); ?></a></li>
                    <?php endif; ?>
                    <?php if(auth()->user()->can('crm.access_all_schedule') || auth()->user()->can('crm.access_own_schedule')): ?>
                    <li <?php if(request()->segment(2) == 'follow-ups'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('\Modules\Crm\Http\Controllers\ScheduleController@index'), false); ?>"><?php echo app('translator')->get('crm::lang.follow_ups'); ?></a></li>
                    <?php endif; ?>
                    <?php if(auth()->user()->can('crm.access_all_campaigns') || auth()->user()->can('crm.access_own_campaigns')): ?>
                        <li <?php if(request()->segment(2) == 'campaigns'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('\Modules\Crm\Http\Controllers\CampaignController@index'), false); ?>"><?php echo app('translator')->get('crm::lang.campaigns'); ?></a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crm.access_contact_login')): ?>
                        <li <?php if(request()->segment(2) == 'all-contacts-login'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('\Modules\Crm\Http\Controllers\ContactLoginController@allContactsLoginList'), false); ?>"><?php echo app('translator')->get('crm::lang.contacts_login'); ?></a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crm.access_sources')): ?>
                        <li <?php if(request()->get('type') == 'source'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('TaxonomyController@index') . '?type=source', false); ?>"><?php echo app('translator')->get('crm::lang.sources'); ?></a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crm.access_life_stage')): ?>
                        <li <?php if(request()->get('type') == 'life_stage'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('TaxonomyController@index') . '?type=life_stage', false); ?>"><?php echo app('translator')->get('crm::lang.life_stage'); ?></a></li>
                    <?php endif; ?>

                    <?php if((auth()->user()->can('crm.view_all_call_log') || auth()->user()->can('crm.view_own_call_log')) && config('constants.enable_crm_call_log')): ?>
                        <li <?php if(request()->segment(2) == 'call-log'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('\Modules\Crm\Http\Controllers\CallLogController@index'), false); ?>"><?php echo app('translator')->get('crm::lang.call_log'); ?></a></li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crm.view_reports')): ?>
                    <li <?php if(request()->segment(2) == 'reports'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action('\Modules\Crm\Http\Controllers\ReportController@index'), false); ?>"><?php echo app('translator')->get('report.reports'); ?></a></li>
                    <?php endif; ?>
                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</section><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Crm/Providers/../Resources/views/layouts/nav.blade.php ENDPATH**/ ?>