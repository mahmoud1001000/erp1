<div class="col-md-12">
    <?php $__env->startComponent('components.widget', ['class' => 'box-solid', 'title' => __( 'essentials::lang.leaves_summary_for_user', ['user' => $user->user_full_name] )]); ?>
        <div class="table-responsive table-condensed">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th>
                                <?php echo e($status['name'], false); ?>

                            </th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <th><?php echo app('translator')->get('essentials::lang.max_allowed_leaves'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $leave_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th><?php echo e($leave_type->leave_type, false); ?></strong></th>
                            <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td>
                                    <?php if(!empty($leaves_summary[$leave_type->id][$k])): ?>
                                        <?php echo e($leaves_summary[$leave_type->id][$k], false); ?> <?php echo app('translator')->get('lang_v1.days'); ?>
                                    <?php else: ?>
                                        0
                                    <?php endif; ?>
                                </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <td>
                                <?php if(!empty($leave_type->max_leave_count)): ?>
                                    <?php echo e($leave_type->max_leave_count, false); ?> <?php echo app('translator')->get('lang_v1.days'); ?>
                                    <?php if($leave_type->leave_count_interval == 'month'): ?>
                                        (<?php echo app('translator')->get('essentials::lang.within_current_month'); ?>)
                                    <?php elseif($leave_type->leave_count_interval == 'year'): ?>
                                        (<?php echo app('translator')->get('essentials::lang.within_current_fy'); ?>)
                                    <?php endif; ?>
                                <?php else: ?>
                                    N/A
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th><?php echo app('translator')->get('sale.total'); ?></th>
                        <?php $__currentLoopData = $status_summary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td><?php echo e($count, false); ?> <?php echo app('translator')->get('lang_v1.days'); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php echo $__env->renderComponent(); ?>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Essentials/Providers/../Resources/views/leave/user_leave_summary.blade.php ENDPATH**/ ?>