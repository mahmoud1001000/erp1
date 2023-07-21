<?php echo app('translator')->get('business.business'); ?>:
<address>
    <strong><?php echo e($transaction->business->name, false); ?></strong>
    <?php echo e($transaction->location->name ?? '', false); ?>

    <?php if(!empty($transaction->location->landmark)): ?>
        <br><?php echo e($transaction->location->landmark, false); ?>

    <?php endif; ?>
    <?php if(!empty($transaction->location->city) || !empty($transaction->location->state) || !empty($transaction->location->country)): ?>
        <br><?php echo e(implode(',', array_filter([$transaction->location->city, $transaction->location->state, $transaction->location->country])), false); ?>

    <?php endif; ?>
  
    <?php if(!empty($transaction->business->tax_number_1)): ?>
        <br><?php echo e($transaction->business->tax_label_1, false); ?>: <?php echo e($transaction->business->tax_number_1, false); ?>

    <?php endif; ?>

    <?php if(!empty($transaction->business->tax_number_2)): ?>
        <br><?php echo e($transaction->business->tax_label_2, false); ?>: <?php echo e($transaction->business->tax_number_2, false); ?>

    <?php endif; ?>

    <?php if(!empty($transaction->location->mobile)): ?>
        <br><?php echo app('translator')->get('contact.mobile'); ?>: <?php echo e($transaction->location->mobile, false); ?>

    <?php endif; ?>
    <?php if(!empty($transaction->location->email)): ?>
        <br><?php echo app('translator')->get('business.email'); ?>: <?php echo e($transaction->location->email, false); ?>

    <?php endif; ?>
</address><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/transaction_payment/payment_business_details.blade.php ENDPATH**/ ?>