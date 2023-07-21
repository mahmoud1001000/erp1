<div class="table-responsive">
    <table class="table table-bordered table-striped ajax_view" id="purchase_return_datatable">
        <thead>
            <tr>
                <th><?php echo app('translator')->get('messages.date'); ?></th>
                <th><?php echo app('translator')->get('purchase.ref_no'); ?></th>
                <th><?php echo app('translator')->get('lang_v1.parent_purchase'); ?></th>
                <th><?php echo app('translator')->get('purchase.location'); ?></th>
                <th><?php echo app('translator')->get('purchase.supplier'); ?></th>
                <th><?php echo app('translator')->get('purchase.payment_status'); ?></th>
                <th><?php echo app('translator')->get('purchase.grand_total'); ?></th>
                <th><?php echo app('translator')->get('purchase.payment_due'); ?> &nbsp;&nbsp;<i class="fa fa-info-circle text-info" data-toggle="tooltip" data-placement="bottom" data-html="true" data-original-title="<?php echo e(__('messages.purchase_due_tooltip'), false); ?>" aria-hidden="true"></i></th>
                <th><?php echo app('translator')->get('messages.action'); ?></th>
            </tr>
        </thead>
        <tfoot>
            <tr class="bg-gray font-17 text-center footer-total">
                <td colspan="5"><strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
                <td id="footer_payment_status_count"></td>
                <td><span class="display_currency" id="footer_purchase_return_total" data-currency_symbol ="true"></span></td>
                <td><span class="display_currency" id="footer_total_due" data-currency_symbol ="true"></span></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/purchase_return/partials/purchase_return_list.blade.php ENDPATH**/ ?>