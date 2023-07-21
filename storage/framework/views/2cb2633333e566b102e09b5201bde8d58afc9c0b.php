<?php
    $custom_labels = json_decode(session('business.custom_labels'), true);
?>

<?php if(!empty($contact->custom_field1)): ?>
    <strong><?php echo e($custom_labels['contact']['custom_field_1'] ?? __('lang_v1.contact_custom_field1'), false); ?></strong>
    <p class="text-muted">
        <?php echo e($contact->custom_field1, false); ?>

    </p>
<?php endif; ?>

<?php if(!empty($contact->custom_field2)): ?>
    <strong><?php echo e($custom_labels['contact']['custom_field_2'] ?? __('lang_v1.contact_custom_field2'), false); ?></strong>
    <p class="text-muted">
        <?php echo e($contact->custom_field2, false); ?>

    </p>
<?php endif; ?>

<?php if(!empty($contact->custom_field3)): ?>
    <strong><?php echo e($custom_labels['contact']['custom_field_3'] ?? __('lang_v1.contact_custom_field3'), false); ?></strong>
    <p class="text-muted">
        <?php echo e($contact->custom_field3, false); ?>

    </p>
<?php endif; ?>

<?php if(!empty($contact->custom_field4)): ?>
    <strong><?php echo e($custom_labels['contact']['custom_field_4'] ?? __('lang_v1.contact_custom_field4'), false); ?></strong>
    <p class="text-muted">
        <?php echo e($contact->custom_field4, false); ?>

    </p>
<?php endif; ?>

<?php if(!empty($contact->custom_field5)): ?>
    <strong><?php echo e($custom_labels['contact']['custom_field_5'] ?? __('lang_v1.custom_field', ['number' => 5]), false); ?></strong>
    <p class="text-muted">
        <?php echo e($contact->custom_field5, false); ?>

    </p>
<?php endif; ?>

<?php if(!empty($contact->custom_field6)): ?>
    <strong><?php echo e($custom_labels['contact']['custom_field_6'] ?? __('lang_v1.custom_field', ['number' => 6]), false); ?></strong>
    <p class="text-muted">
        <?php echo e($contact->custom_field6, false); ?>

    </p>
<?php endif; ?>

<?php if(!empty($contact->custom_field7)): ?>
    <strong><?php echo e($custom_labels['contact']['custom_field_7'] ?? __('lang_v1.custom_field', ['number' => 7]), false); ?></strong>
    <p class="text-muted">
        <?php echo e($contact->custom_field7, false); ?>

    </p>
<?php endif; ?>
<?php if(!empty($contact->custom_field8)): ?>
    <strong><?php echo e($custom_labels['contact']['custom_field_8'] ?? __('lang_v1.custom_field', ['number' => 8]), false); ?></strong>
    <p class="text-muted">
        <?php echo e($contact->custom_field8, false); ?>

    </p>
<?php endif; ?>
<?php if(!empty($contact->custom_field9)): ?>
    <strong><?php echo e($custom_labels['contact']['custom_field_9'] ?? __('lang_v1.custom_field', ['number' => 9]), false); ?></strong>
    <p class="text-muted">
        <?php echo e($contact->custom_field9, false); ?>

    </p>
<?php endif; ?>

<?php if(!empty($contact->custom_field10)): ?>
    <strong><?php echo e($custom_labels['contact']['custom_field_10'] ?? __('lang_v1.custom_field', ['number' => 10]), false); ?></strong>
    <p class="text-muted">
        <?php echo e($contact->custom_field10, false); ?>

    </p>
<?php endif; ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/contact/contact_more_info.blade.php ENDPATH**/ ?>