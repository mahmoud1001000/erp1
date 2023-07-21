<table class="table table-bordered table-striped" id="service_staff_line_orders" style="width: 100%;">
    <thead>
        <tr>
            <th><?php echo app('translator')->get('messages.date'); ?></th>
            <th><?php echo app('translator')->get('sale.invoice_no'); ?></th>
            <th><?php echo app('translator')->get('restaurant.service_staff'); ?></th>
            <th><?php echo app('translator')->get('sale.product'); ?></th>
            <th><?php echo app('translator')->get('lang_v1.quantity'); ?></th>
            <th><?php echo app('translator')->get('sale.unit_price'); ?></th>
            <th><?php echo app('translator')->get('sale.discount'); ?></th>
            <th><?php echo app('translator')->get('sale.tax'); ?></th>
            <th><?php echo app('translator')->get('lang_v1.net_price'); ?></th>
            <th><?php echo app('translator')->get('sale.total'); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr class="bg-gray font-17 footer-total text-center">
            <td colspan="4"><strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
            <td id="sslo_quantity"></td>
            <td><span class="display_currency" id="sslo_unit_price" data-currency_symbol ="true"></span></td>
            <td><span class="display_currency" id="sslo_total_discount" data-currency_symbol ="true"></span></td>
            <td><span class="display_currency" id="sslo_total_tax" data-currency_symbol ="true"></span></td>
            <td><span class="display_currency" id="sslo_subtotal" data-currency_symbol ="true"></span></td>
            <td><span class="display_currency" id="sslo_total" data-currency_symbol ="true"></span></td>
        </tr>
    </tfoot>
</table><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/report/partials/service_staff_line_orders_table.blade.php ENDPATH**/ ?>