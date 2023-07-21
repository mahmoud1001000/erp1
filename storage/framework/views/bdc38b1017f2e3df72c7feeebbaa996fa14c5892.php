

<?php $__env->startSection('title', __('crm::lang.crm')); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('crm::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="content no-print">
    <div class="row row-custom">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer.view')): ?>
        <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
          <div class="info-box info-box-new-style">
            <span class="info-box-icon bg-aqua"><i class="fas fa-user-friends"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?php echo e(__('lang_v1.customers'), false); ?></span>
              <span class="info-box-number"><?php echo e($total_customers, false); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <?php endif; ?>
        <!-- /.col -->
        <?php if(auth()->user()->can('crm.access_all_leads') || auth()->user()->can('crm.access_own_leads')): ?>
        <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
          <div class="info-box info-box-new-style">
            <span class="info-box-icon bg-aqua"><i class="fas fa-user-check"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?php echo e(__('crm::lang.leads'), false); ?></span>
              <span class="info-box-number"><?php echo e($total_leads, false); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <?php endif; ?>
        <!-- /.col -->
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crm.access_sources')): ?>
        <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
          <div class="info-box info-box-new-style">
            <span class="info-box-icon bg-yellow">
                <i class="fas fa fa-search"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text"><?php echo e(__('crm::lang.sources'), false); ?></span>
              <span class="info-box-number"><?php echo e($total_sources, false); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <?php endif; ?>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <!-- <div class="clearfix visible-sm-block"></div> -->
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crm.access_life_stage')): ?>
        <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
          <div class="info-box info-box-new-style">
            <span class="info-box-icon bg-yellow">
                <i class="fas fa-life-ring"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text"><?php echo e(__('crm::lang.life_stages'), false); ?></span>
              <span class="info-box-number invoice_due"><?php echo e($total_life_stage, false); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <?php endif; ?>
        <!-- /.col -->
    </div>
    <div class="row">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crm.access_sources')): ?>
        <div class="col-md-3">
            <div class="box box-solid">
                <div class="box-body p-10">
                    <table class="table no-margin">
                        <thead>
                            <tr>
                                <th><?php echo e(__('crm::lang.sources'), false); ?></th>
                                <th><?php echo e(__('sale.total'), false); ?></th>
                                <th><?php echo e(__('crm::lang.conversion'), false); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($source->name, false); ?></td>
                                    <td>
                                        <?php if(!empty($leads_count_by_source[$source->id])): ?>
                                            <?php echo e($leads_count_by_source[$source->id]['count'], false); ?>

                                        <?php else: ?>
                                            0
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(!empty($customers_count_by_source[$source->id]) && !empty($contacts_count_by_source[$source->id])): ?>
                                            <?php
                                                $conversion = ($customers_count_by_source[$source->id]['count']/$contacts_count_by_source[$source->id]['count']) * 100;
                                            ?>
                                            <?php echo e($conversion . '%', false); ?>

                                        <?php else: ?> 
                                            <?php echo e('0 %', false); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="2" class="text-center"><?php echo app('translator')->get('lang_v1.no_data'); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crm.access_life_stage')): ?>
        <div class="col-md-3">
            <div class="box box-solid">
                <div class="box-body p-10">
                    <table class="table no-margin">
                        <thead>
                            <tr>
                                <th><?php echo e(__('crm::lang.life_stages'), false); ?></th>
                                <th><?php echo e(__('sale.total'), false); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $life_stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $life_stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($life_stage->name, false); ?></td>
                                    <td><?php if(!empty($leads_by_life_stage[$life_stage->id])): ?><?php echo e(count($leads_by_life_stage[$life_stage->id]), false); ?> <?php else: ?> 0 <?php endif; ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="2" class="text-center"><?php echo app('translator')->get('lang_v1.no_data'); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fas fa fa-birthday-cake"></i>
                    <h3 class="box-title"><?php echo app('translator')->get('crm::lang.birthdays'); ?></h3>
                    <a data-href="<?php echo e(action('\Modules\Crm\Http\Controllers\CampaignController@create'), false); ?>" class="btn btn-success btn-xs" id="wish_birthday">
                        <i class="fas fa-paper-plane"></i>
                        <?php echo app('translator')->get('crm::lang.send_wishes'); ?>
                    </a>
                </div>
                <div class="box-body p-10">
                    <table class="table no-margin table-striped">
                        <caption><?php echo app('translator')->get('home.today'); ?></caption>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo app('translator')->get('user.name'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $todays_birthdays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $birthday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="contat_id" name="contat_id[]" value="<?php echo e($birthday['id'], false); ?>" id="contat_id_<?php echo e($birthday['id'], false); ?>">
                                    </td>
                                    <td>
                                        <label for="contat_id_<?php echo e($birthday['id'], false); ?>" class="cursor-pointer fw-100">
                                            <?php echo e($birthday['name'], false); ?>

                                        </label>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="2" class="text-center"><?php echo app('translator')->get('lang_v1.no_data'); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <?php if(!empty($upcoming_birthdays)): ?>
                        <hr class="m-2">
                    <?php endif; ?>
                    <table class="table no-margin table-striped">
                        <caption>
                            <?php echo app('translator')->get('crm::lang.upcoming'); ?>
                        </caption>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo app('translator')->get('user.name'); ?></th>
                                <th><?php echo app('translator')->get('crm::lang.birthday_on'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $upcoming_birthdays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $birthday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="contat_id" name="contat_id[]" value="<?php echo e($birthday['id'], false); ?>" id="contat_id_<?php echo e($birthday['id'], false); ?>">
                                    </td>
                                    <td>
                                        <label for="contat_id_<?php echo e($birthday['id'], false); ?>" class="cursor-pointer fw-100">
                                            <?php echo e($birthday['name'], false); ?>

                                        </label>
                                    </td>
                                    <td>
                                        <?php echo e(Carbon::createFromFormat('m-d', $birthday['dob'])->format('jS M'), false); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="3" class="text-center"><?php echo app('translator')->get('lang_v1.no_data'); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<style type="text/css">
    .fw-100 {
        font-weight: 100;
    }
    
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('modules/crm/js/crm.js?v=' . $asset_v), false); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '#wish_birthday', function () {
                var url = $(this).data('href');
                var contact_ids = [];
                $("input.contat_id").each(function(){
                    if ($(this).is(":checked")) {
                        contact_ids.push($(this).val());
                    }
                });

                if (_.isEmpty(contact_ids)) {
                    alert("<?php echo e(__('crm::lang.plz_select_user'), false); ?>");
                } else {
                    location.href = url+'?contact_ids='+contact_ids;
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Crm/Providers/../Resources/views/crm_dashboard/index.blade.php ENDPATH**/ ?>