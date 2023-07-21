<div class="tab-pane" id="ouput-tax-project-invoice">
	<table class="table table-bordered table-striped" id="output_tax_project_invoice_table" width="100%">
        <thead>
            <tr>
                <th><?php echo app('translator')->get('messages.date'); ?></th>
                <th><?php echo app('translator')->get('sale.invoice_no'); ?></th>
                <th><?php echo app('translator')->get('contact.customer'); ?></th>
                <th><?php echo app('translator')->get('contact.tax_no'); ?></th>
                <th><?php echo app('translator')->get('sale.total_amount'); ?></th>
                <th><?php echo app('translator')->get('receipt.discount'); ?></th>
                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <th>
                        <?php echo e($tax['name'], false); ?>

                    </th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
        </thead>
        <tfoot>
            <tr class="bg-gray font-17 text-center footer-total">
                <td colspan="4"><strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
                <td><span class="display_currency" id="project_invoice_total" data-currency_symbol ="true"></span></td>
                <td>&nbsp;</td>
                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td>
                        <span class="display_currency" id="total_output_pi_<?php echo e($tax['id'], false); ?>" data-currency_symbol ="true"></span>
                    </td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
        </tfoot>
    </table>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Project/Providers/../Resources/views/tax_report/tab_content.blade.php ENDPATH**/ ?>