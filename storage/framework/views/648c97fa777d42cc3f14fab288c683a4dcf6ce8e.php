<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title no-print">
        <?php echo app('translator')->get( 'lang_v1.view_payment' ); ?>
        <?php if(!empty($single_payment_line->payment_ref_no)): ?>
          ( <?php echo app('translator')->get('purchase.ref_no'); ?>: <?php echo e($single_payment_line->payment_ref_no, false); ?> )
        <?php endif; ?>
      </h4>
      <h4 class="modal-title visible-print-block">
        <?php if(!empty($single_payment_line->payment_ref_no)): ?>
          ( <?php echo app('translator')->get('purchase.ref_no'); ?>: <?php echo e($single_payment_line->payment_ref_no, false); ?> )
        <?php endif; ?>
      </h4>
    </div>
    <div class="modal-body">
      <?php if(!empty($transaction)): ?>
      <div class="row">
        <?php if(in_array($transaction->type, ['purchase', 'purchase_return'])): ?>
            <div class="col-xs-6">
              <?php echo app('translator')->get('purchase.supplier'); ?>:
              <address>
                <strong><?php echo e($transaction->contact->supplier_business_name, false); ?></strong>
                <?php echo e($transaction->contact->name, false); ?>

                <?php echo $transaction->contact->contact_address; ?>

                <?php if(!empty($transaction->contact->tax_number)): ?>
                  <br><?php echo app('translator')->get('contact.tax_no'); ?>: <?php echo e($transaction->contact->tax_number, false); ?>

                <?php endif; ?>
                <?php if(!empty($transaction->contact->mobile)): ?>
                  <br><?php echo app('translator')->get('contact.mobile'); ?>: <?php echo e($transaction->contact->mobile, false); ?>

                <?php endif; ?>
                <?php if(!empty($transaction->contact->email)): ?>
                  <br><?php echo app('translator')->get('business.email'); ?>: <?php echo e($transaction->contact->email, false); ?>

                <?php endif; ?>
              </address>
            </div>
            <div class="col-xs-6">
              <?php echo app('translator')->get('business.business'); ?>:
              <address>
                <strong><?php echo e($transaction->business->name, false); ?></strong>

                <?php if(!empty($transaction->location)): ?>
                  <?php echo e($transaction->location->name, false); ?>

                  <?php if(!empty($transaction->location->landmark)): ?>
                    <br><?php echo e($transaction->location->landmark, false); ?>

                  <?php endif; ?>
                  <?php if(!empty($transaction->location->city) || !empty($transaction->location->state) || !empty($transaction->location->country)): ?>
                    <br><?php echo e(implode(',', array_filter([$transaction->location->city, $transaction->location->state, $transaction->location->country])), false); ?>

                  <?php endif; ?>
                <?php endif; ?>
                
                <?php if(!empty($transaction->business->tax_number_1)): ?>
                  <br><?php echo e($transaction->business->tax_label_1, false); ?>: <?php echo e($transaction->business->tax_number_1, false); ?>

                <?php endif; ?>

                <?php if(!empty($transaction->business->tax_number_2)): ?>
                  <br><?php echo e($transaction->business->tax_label_2, false); ?>: <?php echo e($transaction->business->tax_number_2, false); ?>

                <?php endif; ?>

                <?php if(!empty($transaction->location)): ?>
                  <?php if(!empty($transaction->location->mobile)): ?>
                    <br><?php echo app('translator')->get('contact.mobile'); ?>: <?php echo e($transaction->location->mobile, false); ?>

                  <?php endif; ?>
                  <?php if(!empty($transaction->location->email)): ?>
                    <br><?php echo app('translator')->get('business.email'); ?>: <?php echo e($transaction->location->email, false); ?>

                  <?php endif; ?>
                <?php endif; ?>
              </address>
            </div>
        <?php else: ?>
          <div class="col-xs-6">
            <?php if($transaction->type != 'payroll' && !empty($transaction->contact)): ?>
              <?php echo app('translator')->get('contact.customer'); ?>:
              <address>
                <strong><?php echo e($transaction->contact->name ?? '', false); ?></strong>
               
                <?php echo $transaction->contact->contact_address; ?>

                <?php if(!empty($transaction->contact->tax_number)): ?>
                  <br><?php echo app('translator')->get('contact.tax_no'); ?>: <?php echo e($transaction->contact->tax_number, false); ?>

                <?php endif; ?>
                <?php if(!empty($transaction->contact->mobile)): ?>
                  <br><?php echo app('translator')->get('contact.mobile'); ?>: <?php echo e($transaction->contact->mobile, false); ?>

                <?php endif; ?>
                <?php if(!empty($transaction->contact->email)): ?>
                  <br><?php echo app('translator')->get('business.email'); ?>: <?php echo e($transaction->contact->email, false); ?>

                <?php endif; ?>
              </address>
            <?php else: ?>
            <?php if(!empty($transaction->transaction_for)): ?>
              <?php echo app('translator')->get('essentials::lang.payroll_for'); ?>:
              <address>
                  <strong><?php echo e($transaction->transaction_for->user_full_name, false); ?></strong>
                  <?php if(!empty($transaction->transaction_for->address)): ?>
                      <br><?php echo e($transaction->transaction_for->address, false); ?>

                  <?php endif; ?>
                  <?php if(!empty($transaction->transaction_for->contact_number)): ?>
                      <br><?php echo app('translator')->get('contact.mobile'); ?>: <?php echo e($transaction->transaction_for->contact_number, false); ?>

                  <?php endif; ?>
                  <?php if(!empty($transaction->transaction_for->email)): ?>
                      <br><?php echo app('translator')->get('business.email'); ?>: <?php echo e($transaction->transaction_for->email, false); ?>

                  <?php endif; ?>
              </address>
            <?php endif; ?>
            <?php endif; ?>
          </div>
          <div class="col-xs-6">
            <?php echo app('translator')->get('business.business'); ?>:
            <address>
              <strong><?php echo e($transaction->business->name, false); ?></strong>
              <?php if(!empty($transaction->location)): ?>
                <?php echo e($transaction->location->name, false); ?>

                <?php if(!empty($transaction->location->landmark)): ?>
                  <br><?php echo e($transaction->location->landmark, false); ?>

                <?php endif; ?>
                <?php if(!empty($transaction->location->city) || !empty($transaction->location->state) || !empty($transaction->location->country)): ?>
                  <br><?php echo e(implode(',', array_filter([$transaction->location->city, $transaction->location->state, $transaction->location->country])), false); ?>

                <?php endif; ?>
              <?php endif; ?>
              
              <?php if(!empty($transaction->business->tax_number_1)): ?>
                <br><?php echo e($transaction->business->tax_label_1, false); ?>: <?php echo e($transaction->business->tax_number_1, false); ?>

              <?php endif; ?>

              <?php if(!empty($transaction->business->tax_number_2)): ?>
                <br><?php echo e($transaction->business->tax_label_2, false); ?>: <?php echo e($transaction->business->tax_number_2, false); ?>

              <?php endif; ?>

              <?php if(!empty($transaction->location)): ?>
                <?php if(!empty($transaction->location->mobile)): ?>
                  <br><?php echo app('translator')->get('contact.mobile'); ?>: <?php echo e($transaction->location->mobile, false); ?>

                <?php endif; ?>
                <?php if(!empty($transaction->location->email)): ?>
                  <br><?php echo app('translator')->get('business.email'); ?>: <?php echo e($transaction->location->email, false); ?>

                <?php endif; ?>
              <?php endif; ?>
            </address>
          </div>
        <?php endif; ?>
      </div>
      <?php endif; ?>
      <div class="row">
          <br>
          <div class="col-xs-6">
            <strong><?php echo app('translator')->get('purchase.amount'); ?> :</strong>
            <span class="display_currency" data-currency_symbol="true">
              <?php echo e($single_payment_line->amount, false); ?>

            </span><br>
            <strong><?php echo app('translator')->get('lang_v1.payment_method'); ?> :</strong>
            <?php echo e($payment_types[$single_payment_line->method] ?? '', false); ?><br>
            <?php if($single_payment_line->method == "card"): ?>
              <strong><?php echo app('translator')->get('lang_v1.card_holder_name'); ?> :</strong>
              <?php echo e($single_payment_line->card_holder_name, false); ?> <br>
              <strong><?php echo app('translator')->get('lang_v1.card_number'); ?> :</strong>
              <?php echo e($single_payment_line->card_number, false); ?> <br>
              <strong><?php echo app('translator')->get('lang_v1.card_transaction_number'); ?> :</strong>
              <?php echo e($single_payment_line->card_transaction_number, false); ?>

              
            <?php elseif($single_payment_line->method == "cheque"): ?>
              <strong><?php echo app('translator')->get('lang_v1.cheque_number'); ?> :</strong>
              <?php echo e($single_payment_line->cheque_number, false); ?>

            <?php elseif($single_payment_line->method == "bank_transfer"): ?>

            <?php elseif($single_payment_line->method == "custom_pay_1"): ?>

              <strong><?php echo app('translator')->get('lang_v1.transaction_number'); ?> :</strong>
              <?php echo e($single_payment_line->transaction_no, false); ?>

            <?php elseif($single_payment_line->method == "custom_pay_2"): ?>

              <strong><?php echo app('translator')->get('lang_v1.transaction_number'); ?> :</strong>
              <?php echo e($single_payment_line->transaction_no, false); ?>

            <?php elseif($single_payment_line->method == "custom_pay_3"): ?>

              <strong> <?php echo app('translator')->get('lang_v1.transaction_number'); ?>:</strong>
              <?php echo e($single_payment_line->transaction_no, false); ?>

            <?php endif; ?>
            <strong><?php echo app('translator')->get('purchase.payment_note'); ?> :</strong>
              <?php echo e($single_payment_line->note, false); ?>

          </div>
          <div class="col-xs-6">
            <b><?php echo app('translator')->get('purchase.ref_no'); ?>:</b> 
              <?php if(!empty($single_payment_line->payment_ref_no)): ?>
                <?php echo e($single_payment_line->payment_ref_no, false); ?>

              <?php else: ?>
                --
              <?php endif; ?>
              <br/>
            <b><?php echo app('translator')->get('lang_v1.paid_on'); ?>:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($single_payment_line->paid_on))->format(session('business.date_format') . ' ' . 'H:i'), false); ?><br/>
            <br>
            <?php if(!empty($single_payment_line->document_path)): ?>
              <a href="<?php echo e($single_payment_line->document_path, false); ?>" class="btn btn-success btn-xs no-print" download="<?php echo e($single_payment_line->document_name, false); ?>"><i class="fa fa-download" data-toggle="tooltip" title="<?php echo e(__('purchase.download_document'), false); ?>"></i> <?php echo e(__('purchase.download_document'), false); ?></a>
            <?php endif; ?>
          </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary no-print" 
        aria-label="Print" 
          onclick="$(this).closest('div.modal').printThis();">
        <i class="fa fa-print"></i> <?php echo app('translator')->get( 'messages.print' ); ?>
      </button>
      <button type="button" class="btn btn-default no-print" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?>
      </button>
    </div>
  </div>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/transaction_payment/single_payment_view.blade.php ENDPATH**/ ?>