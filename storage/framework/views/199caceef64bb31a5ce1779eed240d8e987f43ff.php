<?php $__empty_1 = true; $__currentLoopData = $checklists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="col-xs-4">
        <fieldset>
            <label style="color: #525f7f;"><?php echo e($list, false); ?></label>
            <div class="switch-toggle switch-candy">

                <input id="<?php echo e($key, false); ?>_yes" name="repair_checklist[<?php echo e($list, false); ?>]" type="radio" value="yes"
                    <?php if(!empty($selected_checklist) && $selected_checklist[$list] == 'yes'): ?>
                        checked
                    <?php endif; ?>
                >
                <label for="<?php echo e($key, false); ?>_yes" onclick="" style="color: #228B22;">
                   <span class="font-23"> &#10004;</span>
                </label>
                
                <input id="<?php echo e($key, false); ?>_no" name="repair_checklist[<?php echo e($list, false); ?>]" type="radio" value="no"
                    <?php if((!empty($selected_checklist) && $selected_checklist[$list] == 'no')): ?>
                        checked
                    <?php endif; ?>
                >
                <label for="<?php echo e($key, false); ?>_no" onclick="" style="color: #DC143C;">
                    <span class="font-23">&#10007;</span>
                </label>

                <input id="<?php echo e($key, false); ?>_not_applicable" name="repair_checklist[<?php echo e($list, false); ?>]" type="radio" value="not_applicable"
                    <?php if((!empty($selected_checklist) && $selected_checklist[$list] == 'not_applicable') || empty($selected_checklist)): ?>
                        checked
                    <?php endif; ?>
                >
                <label for="<?php echo e($key, false); ?>_not_applicable" onclick="" style="color: #efe3e6;">
                    <span class="font-17"><?php echo app('translator')->get('repair::lang.not_applicable_key'); ?></span>
                </label>

                <a class="btn btn-flat btn-success"></a>
            </div>
        </fieldset>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="col-xs-4">
        <?php echo app('translator')->get('repair::lang.no_repair_check_list'); ?>
    </div>
<?php endif; ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Repair/Providers/../Resources/views/repair/partials/checklists.blade.php ENDPATH**/ ?>