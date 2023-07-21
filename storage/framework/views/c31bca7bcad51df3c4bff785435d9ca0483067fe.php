<div class="table-responsive">
    <table class="table table-bordered table-striped" id="service_staff_report">
	    <thead>
	        <tr>
	            <th><?php echo app('translator')->get('messages.date'); ?></th>
	            <th><?php echo app('translator')->get('sale.invoice_no'); ?></th>
	            <th><?php echo app('translator')->get('restaurant.service_staff'); ?></th>
	            <th><?php echo app('translator')->get('sale.location'); ?></th>
	            <th><?php echo app('translator')->get('sale.subtotal'); ?></th>
	            <th><?php echo app('translator')->get('lang_v1.total_discount'); ?></th>
	            <th><?php echo app('translator')->get('lang_v1.total_tax'); ?></th>
	            <th><?php echo app('translator')->get('sale.total_amount'); ?></th>
	        </tr>
	    </thead>
	    <tfoot>
	        <tr class="bg-gray font-17 footer-total text-center">
	            <td colspan="4"><strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
	            <td><span class="display_currency" id="footer_subtotal" data-currency_symbol ="true"></span></td>
	            <td><span class="display_currency" id="footer_total_discount" data-currency_symbol ="true"></span></td>
	            <td><span class="display_currency" id="footer_total_tax" data-currency_symbol ="true"></span></td>
	            <td><span class="display_currency" id="footer_total_amount" data-currency_symbol ="true"></span></td>
	        </tr>
	    </tfoot>
	</table>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/report/partials/service_staff_orders_table.blade.php ENDPATH**/ ?>