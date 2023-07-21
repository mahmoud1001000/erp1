<table class="table table-bordered table-striped ajax_view" id="purchase_table" style="width: 100%;">
    <thead>
        <tr>
            <th><?php echo app('translator')->get('messages.action'); ?></th>
            <th><?php echo app('translator')->get('messages.date'); ?></th>
            <th><?php echo app('translator')->get('purchase.ref_no'); ?></th>
            <th><?php echo app('translator')->get('purchase.location'); ?></th>
            <th><?php echo app('translator')->get('purchase.supplier'); ?></th>
            <th><?php echo app('translator')->get('purchase.purchase_status'); ?></th>
            <th><?php echo app('translator')->get('purchase.payment_status'); ?></th>
            <th><?php echo app('translator')->get('purchase.grand_total'); ?></th>
            <th><?php echo app('translator')->get('purchase.payment_due'); ?> &nbsp;&nbsp;<i class="fa fa-info-circle text-info no-print" data-toggle="tooltip" data-placement="bottom" data-html="true" data-original-title="<?php echo e(__('messages.purchase_due_tooltip'), false); ?>" aria-hidden="true"></i></th>
            <th><?php echo app('translator')->get('lang_v1.added_by'); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr class="bg-gray font-17 text-center footer-total">
            <td colspan="5"><strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
            <td class="footer_status_count"></td>
            <td class="footer_payment_status_count"></td>
            <td class="footer_purchase_total"></td>
            <td class="text-left"><small><?php echo app('translator')->get('report.purchase_due'); ?> - <span class="footer_total_due"></span><br>
            <?php echo app('translator')->get('lang_v1.purchase_return'); ?> - <span class="footer_total_purchase_return_due"></span>
            </small></td>
            <td></td>
        </tr>
    </tfoot>
</table><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/purchase/partials/purchase_table.blade.php ENDPATH**/ ?>