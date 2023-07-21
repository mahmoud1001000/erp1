<?php if( $contact->type == 'supplier' || $contact->type == 'both'): ?>
    <strong><?php echo app('translator')->get('report.total_purchase'); ?></strong>
    <p class="text-muted">
    <span class="display_currency" data-currency_symbol="true">
    <?php echo e($contact->total_purchase, false); ?></span>
    </p>
    <strong><?php echo app('translator')->get('contact.total_purchase_paid'); ?></strong>
    <p class="text-muted">
    <span class="display_currency" data-currency_symbol="true">
    <?php echo e($contact->purchase_paid, false); ?></span>
    </p>
    <strong><?php echo app('translator')->get('contact.total_purchase_due'); ?></strong>
    <p class="text-muted">
    <span class="display_currency" data-currency_symbol="true">
    <?php echo e($contact->total_purchase - $contact->purchase_paid, false); ?></span>
    </p>
<?php endif; ?>
<?php if( $contact->type == 'customer' || $contact->type == 'both'): ?>
    <strong><?php echo app('translator')->get('report.total_sell'); ?></strong>
    <p class="text-muted">
    <span class="display_currency" data-currency_symbol="true">
    <?php echo e($contact->total_invoice, false); ?></span>
    </p>
    <strong><?php echo app('translator')->get('contact.total_sale_paid'); ?></strong>
    <p class="text-muted">
    <span class="display_currency" data-currency_symbol="true">
    <?php echo e($contact->invoice_received, false); ?></span>
    </p>
    <strong><?php echo app('translator')->get('contact.total_sale_due'); ?></strong>
    <p class="text-muted">
    <span class="display_currency" data-currency_symbol="true">
    <?php echo e($contact->total_invoice - $contact->invoice_received, false); ?></span>
    </p>
<?php endif; ?>
<?php if(!empty($contact->opening_balance) && $contact->opening_balance != '0.00'): ?>
    <strong><?php echo app('translator')->get('lang_v1.opening_balance'); ?></strong>
    <p class="text-muted">
    <span class="display_currency" data-currency_symbol="true">
    <?php echo e($contact->opening_balance, false); ?></span>
    </p>
    <strong><?php echo app('translator')->get('lang_v1.opening_balance_due'); ?></strong>
    <p class="text-muted">
    <span class="display_currency" data-currency_symbol="true">
    <?php echo e($contact->opening_balance - $contact->opening_balance_paid, false); ?></span>
    </p>
<?php endif; ?>

<strong><?php echo app('translator')->get('lang_v1.advance_balance'); ?></strong>
<p class="text-muted">
    <span class="display_currency" data-currency_symbol="true">
    <?php echo e($contact->balance, false); ?></span>
</p><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/contact/contact_payment_info.blade.php ENDPATH**/ ?>