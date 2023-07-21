<div class="table-responsive">
    <table class="table table-bordered table-striped" id="profit_by_products_table">
        <thead>
            <tr>
                <th><?php echo app('translator')->get('sale.product'); ?></th>
                <th><?php echo app('translator')->get('lang_v1.gross_profit'); ?></th>
            </tr>
        </thead>
        <tfoot>
            <tr class="bg-gray font-17 footer-total">
                <td><strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
                <td><span class="display_currency footer_total" data-currency_symbol ="true"></span></td>
            </tr>
        </tfoot>
    </table>

    <p class="text-muted">
        <?php echo app('translator')->get('lang_v1.profit_note'); ?>
    </p>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/report/partials/profit_by_products.blade.php ENDPATH**/ ?>