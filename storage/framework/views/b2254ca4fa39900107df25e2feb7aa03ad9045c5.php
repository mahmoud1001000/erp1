<div class="table-responsive">
<table class="table table-bordered table-striped" id="sr_sales_with_commission_table" style="width: 100%;">
    <thead>
        <tr>
            <th><?php echo app('translator')->get('messages.date'); ?></th>
            <th><?php echo app('translator')->get('sale.invoice_no'); ?></th>
            <th><?php echo app('translator')->get('sale.customer_name'); ?></th>
            <th><?php echo app('translator')->get('sale.location'); ?></th>
            <th><?php echo app('translator')->get('sale.payment_status'); ?></th>
            <th><?php echo app('translator')->get('sale.total_amount'); ?></th>
            <th><?php echo app('translator')->get('sale.total_paid'); ?></th>
            <th><?php echo app('translator')->get('sale.total_remaining'); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr class="bg-gray font-17 footer-total text-center">
            <td colspan="4"><strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
            <td id="footer_payment_status_count"></td>
            <td><span class="display_currency" id="footer_sale_total" data-currency_symbol ="true"></span></td>
            <td><span class="display_currency" id="footer_total_paid" data-currency_symbol ="true"></span></td>
            <td class="text-left"><small><?php echo app('translator')->get('lang_v1.sell_due'); ?> - <span class="display_currency" id="footer_total_remaining" data-currency_symbol ="true"></span><br><?php echo app('translator')->get('lang_v1.sell_return_due'); ?> - <span class="display_currency" id="footer_total_sell_return_due" data-currency_symbol ="true"></span></small></td>
        </tr>
    </tfoot>
</table>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/report/partials/sales_representative_commission.blade.php ENDPATH**/ ?>