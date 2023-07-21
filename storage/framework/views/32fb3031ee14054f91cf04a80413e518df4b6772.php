<?php
    $changes = $activity->changes;
    $attributes = $changes['attributes'] ?? null;
    $old = $changes['old'] ?? null;
    $status = $attributes['status'] ?? '';
    $payment_status = $attributes['payment_status'] ?? '';
    $sub_status = $attributes['sub_status'] ?? '';
    $shipping_status = $attributes['shipping_status'] ?? '';
    $status = in_array($sub_status, ['quotation', 'proforma']) ? $sub_status : $status;
    $final_total = $attributes['final_total'] ?? 0;

    $old_status = $old['status'] ?? '';
    $old_sub_status = $old['sub_status'] ?? '';
    $old_shipping_status = $old['shipping_status'] ?? '';
    $old_status = in_array($old_sub_status, ['quotation', 'proforma']) ? $old_sub_status : $old_status;
    $old_final_total = $old['final_total'] ?? 0;
    $old_payment_status = $old['payment_status'] ?? '';
    $update_note = $activity->getExtraProperty('update_note');
?>
<table class="no-border table table-slim mb-0">
<?php if(!empty($status) && $status != $old_status): ?>
    <tr>
        <th class="width-50"><?php echo app('translator')->get('sale.status'); ?>: </th> 
        <td class="width-50 text-left">
            <?php if(!empty($old_status)): ?>
                <span class="label bg-info"><?php echo e($statuses[$old_status] ?? '', false); ?></span> --> 
            <?php endif; ?>
            <span class="label bg-info"><?php echo e($statuses[$status] ?? '', false); ?></span>
         </td>
    </tr>
<?php endif; ?>

<?php if(!empty($shipping_status) && $shipping_status != $old_shipping_status): ?>
    <tr>
        <th class="width-50"><?php echo app('translator')->get('lang_v1.shipping_status'); ?>: </th> 
        <td class="width-50 text-left">
            <?php if(!empty($old_shipping_status)): ?>
                <span class="label bg-info"><?php echo e($shipping_statuses[$old_shipping_status] ?? '', false); ?></span> -->
            <?php endif; ?>
            <span class="label bg-info"><?php echo e($shipping_statuses[$shipping_status] ?? '', false); ?></span>
        </td>
     </tr>
<?php endif; ?>

<?php if(!empty($final_total) && $final_total != $old_final_total): ?>
    <tr>
    <th class="width-50"><?php echo app('translator')->get('sale.total'); ?>: </th> 
    <td class="width-50 text-left">
        <?php if(!empty($old_final_total)): ?>
            <span class="label bg-info"><?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $old_final_total, config("constants.currency_precision",2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?></span> --> 
        <?php endif; ?>
         <span class="label bg-info"><?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $final_total, config("constants.currency_precision",2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?></span>
     </td>
    </tr>
<?php endif; ?>

<?php if(!empty($payment_status) && $payment_status != $old_payment_status): ?>
    <tr>
        <th class="width-50"><?php echo app('translator')->get('sale.payment_status'); ?>: </th> 
        <td class="width-50 text-left">
            <?php if(!empty($old_payment_status)): ?>
                <span class="label bg-info"><?php echo app('translator')->get('lang_v1.' . $old_payment_status); ?></span> --> 
            <?php endif; ?>
                <span class="label bg-info"><?php echo app('translator')->get('lang_v1.' . $payment_status); ?></span>
        </td>
    </tr>
<?php endif; ?>

<?php if(!empty($update_note)): ?>
    <?php if(!is_array($update_note)): ?>
        <tr><td colspan="2"><?php echo e($update_note, false); ?></td></tr>
    <?php endif; ?>
<?php endif; ?>
</table><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/sale_pos/partials/activity_row.blade.php ENDPATH**/ ?>