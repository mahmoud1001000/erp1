<?php
    $custom_labels = json_decode(session('business.custom_labels'), true);
?>
<table class="table table-bordered table-striped ajax_view" id="sell_table">
    <thead>
        <tr>
            <th><?php echo app('translator')->get('messages.action'); ?></th>
            <th><?php echo app('translator')->get('messages.date'); ?></th>
            <th><?php echo app('translator')->get('sale.invoice_no'); ?></th>
            <th><?php echo app('translator')->get('sale.customer_name'); ?></th>
            <th><?php echo app('translator')->get('lang_v1.contact_no'); ?></th>
            <th><?php echo app('translator')->get('sale.location'); ?></th>
            <th><?php echo app('translator')->get('sale.payment_status'); ?></th>
            <th><?php echo app('translator')->get('lang_v1.payment_method'); ?></th>
            <th><?php echo app('translator')->get('sale.total_amount'); ?></th>
            <th><?php echo app('translator')->get('sale.total_paid'); ?></th>
            <th><?php echo app('translator')->get('lang_v1.sell_due'); ?></th>
            <th><?php echo app('translator')->get('lang_v1.sell_return_due'); ?></th>
            <th><?php echo app('translator')->get('lang_v1.shipping_status'); ?></th>
            <th><?php echo app('translator')->get('lang_v1.total_items'); ?></th>
            <th><?php echo app('translator')->get('lang_v1.types_of_service'); ?></th>
            <th><?php echo e($custom_labels['types_of_service']['custom_field_1'] ?? __('lang_v1.service_custom_field_1' ), false); ?></th>
            <th><?php echo app('translator')->get('lang_v1.added_by'); ?></th>
            <th><?php echo app('translator')->get('sale.sell_note'); ?></th>
            <th><?php echo app('translator')->get('sale.staff_note'); ?></th>
            <th><?php echo app('translator')->get('sale.shipping_details'); ?></th>
            <th><?php echo app('translator')->get('restaurant.table'); ?></th>
            <th><?php echo app('translator')->get('restaurant.service_staff'); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr class="bg-gray font-17 footer-total text-center">
            <td colspan="6"><strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
            <td class="footer_payment_status_count"></td>
            <td class="payment_method_count"></td>
            <td class="footer_sale_total"></td>
            <td class="footer_total_paid"></td>
            <td class="footer_total_remaining"></td>
            <td class="footer_total_sell_return_due"></td>
            <td colspan="2"></td>
            <td class="service_type_count"></td>
            <td colspan="7"></td>
        </tr>
    </tfoot>
</table><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/sale_pos/partials/sales_table.blade.php ENDPATH**/ ?>