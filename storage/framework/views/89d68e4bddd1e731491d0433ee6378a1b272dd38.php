<div class="table-responsive">
    <table class="table table-bordered table-striped ajax_view" id="sell_return_table">
        <thead>
            <tr>
                <th><?php echo app('translator')->get('messages.date'); ?></th>
                <th><?php echo app('translator')->get('sale.invoice_no'); ?></th>
                <th><?php echo app('translator')->get('lang_v1.parent_sale'); ?></th>
                <th><?php echo app('translator')->get('sale.customer_name'); ?></th>
                <th><?php echo app('translator')->get('sale.location'); ?></th>
                <th><?php echo app('translator')->get('purchase.payment_status'); ?></th>
                <th><?php echo app('translator')->get('sale.total_amount'); ?></th>
                <th><?php echo app('translator')->get('purchase.payment_due'); ?></th>
                <th><?php echo app('translator')->get('messages.action'); ?></th>
            </tr>
        </thead>
        <tfoot>
            <tr class="bg-gray font-17 text-center footer-total">
                <td colspan="5"><strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
                <td id="footer_payment_status_count_sr"></td>
                <td><span class="display_currency" id="footer_sell_return_total" data-currency_symbol ="true"></span></td>
                <td><span class="display_currency" id="footer_total_due_sr" data-currency_symbol ="true"></span></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/sell_return/partials/sell_return_list.blade.php ENDPATH**/ ?>