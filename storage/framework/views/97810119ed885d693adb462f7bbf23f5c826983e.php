<?php if($receipt_details->show_qr_code && !empty($receipt_details->qr_code_details)): ?>
    <?php
        $qr_code_text = implode(', ', $receipt_details->qr_code_details);
    ?>
    
   

    <img class="center-block mt-5" src="data:image/png;base64,<?php echo e(DNS2D::getBarcodePNG($receipt_details->qr_code_gen, 'QRCODE', 3, 3, [39, 48, 54]), false); ?>">

<?php endif; ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/sale_pos/partials/qr_code.blade.php ENDPATH**/ ?>