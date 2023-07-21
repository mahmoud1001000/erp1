<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('TransactionPaymentController@store'), 'method' => 'post', 'id' => 'transaction_payment_add_form', 'files' => true ]); ?>

    <?php echo Form::hidden('transaction_id', $transaction->id); ?>

    <?php if(!empty($transaction->location)): ?>
      <?php echo Form::hidden('default_payment_accounts', $transaction->location->default_payment_accounts, ['id' => 'default_payment_accounts']); ?>

    <?php endif; ?>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get( 'purchase.add_payment' ); ?></h4>
    </div>

    <div class="modal-body">
      <div class="row">
      <?php if(!empty($transaction->contact)): ?>
        <div class="col-md-4">
          <div class="well">
            <strong>
            <?php if(in_array($transaction->type, ['purchase', 'purchase_return'])): ?>
              <?php echo app('translator')->get('purchase.supplier'); ?> 
            <?php elseif(in_array($transaction->type, ['sell', 'sell_return'])): ?>
              <?php echo app('translator')->get('contact.customer'); ?> 
            <?php endif; ?>
            </strong>:<?php echo e($transaction->contact->name, false); ?><br>
            <?php if($transaction->type == 'purchase'): ?>
            <strong><?php echo app('translator')->get('business.business'); ?>: </strong><?php echo e($transaction->contact->supplier_business_name, false); ?>

            <?php endif; ?>
          </div>
        </div>
        <?php endif; ?>
        <div class="col-md-4">
          <div class="well">
          <?php if(in_array($transaction->type, ['sell', 'sell_return'])): ?>
            <strong><?php echo app('translator')->get('sale.invoice_no'); ?>: </strong><?php echo e($transaction->invoice_no, false); ?>

          <?php else: ?>
            <strong><?php echo app('translator')->get('purchase.ref_no'); ?>: </strong><?php echo e($transaction->ref_no, false); ?>

          <?php endif; ?>
          <?php if(!empty($transaction->location)): ?>
            <br>
            <strong><?php echo app('translator')->get('purchase.location'); ?>: </strong><?php echo e($transaction->location->name, false); ?>

          <?php endif; ?>
          </div>
        </div>
        <div class="col-md-4">
          <div class="well">
            <strong><?php echo app('translator')->get('sale.total_amount'); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($transaction->final_total, false); ?></span><br>
            <strong><?php echo app('translator')->get('purchase.payment_note'); ?>: </strong>
            <?php if(!empty($transaction->additional_notes)): ?>
            <?php echo e($transaction->additional_notes, false); ?>

            <?php else: ?>
              --
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php if(!empty($transaction->contact)): ?>
            <strong><?php echo app('translator')->get('lang_v1.advance_balance'); ?>:</strong> <span class="display_currency" data-currency_symbol="true"><?php echo e($transaction->contact->balance, false); ?></span>

            <?php echo Form::hidden('advance_balance', $transaction->contact->balance, ['id' => 'advance_balance', 'data-error-msg' => __('lang_v1.required_advance_balance_not_available')]); ?>

          <?php endif; ?>
        </div>
      </div>
      <div class="row payment_row">
        <div class="col-md-4">
          <div class="form-group">
            <?php echo Form::label("amount" , __('sale.amount') . ':*'); ?>

            <div class="input-group">
              <span class="input-group-addon">
                <i class="fas fa-money-bill-alt"></i>
              </span>
              <?php echo Form::text("amount", number_format($payment_line->amount, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input_number', 'required', 'placeholder' => 'Amount', 'data-rule-max-value' => number_format($payment_line->amount, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), 'data-msg-max-value' => __('lang_v1.max_amount_to_be_paid_is', ['amount' => $amount_formated])]); ?>

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <?php echo Form::label("paid_on" , __('lang_v1.paid_on') . ':*'); ?>

            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </span>
              <?php echo Form::text('paid_on', \Carbon::createFromTimestamp(strtotime($payment_line->paid_on))->format(session('business.date_format') . ' ' . 'H:i'), ['class' => 'form-control', 'readonly', 'required']); ?>

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <?php echo Form::label("method" , __('purchase.payment_method') . ':*'); ?>

            <div class="input-group">
              <span class="input-group-addon">
                <i class="fas fa-money-bill-alt"></i>
              </span>
              <?php echo Form::select("method", $payment_types, $payment_line->method, ['class' => 'form-control select2 payment_types_dropdown', 'required', 'style' => 'width:100%;']); ?>

            </div>
          </div>
        </div>
        <?php if(!empty($accounts)): ?>
          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label("account_id" , __('lang_v1.payment_account') . ':'); ?>

              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fas fa-money-bill-alt"></i>
                </span>
                <?php echo Form::select("account_id", $accounts, !empty($payment_line->account_id) ? $payment_line->account_id : '' , ['class' => 'form-control select2', 'id' => "account_id", 'style' => 'width:100%;']); ?>

              </div>
            </div>
          </div>
        <?php endif; ?>
        <div class="col-md-4">
          <div class="form-group">
            <?php echo Form::label('document', __('purchase.attach_document') . ':'); ?>

            <?php echo Form::file('document', ['accept' => implode(',', array_keys(config('constants.document_upload_mimes_types')))]); ?>

            <p class="help-block">
            <?php if ($__env->exists('components.document_help_text')) echo $__env->make('components.document_help_text', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></p>
          </div>
        </div>
        <div class="clearfix"></div>
          <?php echo $__env->make('transaction_payment.payment_type_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-md-12">
          <div class="form-group">
            <?php echo Form::label("note", __('lang_v1.payment_note') . ':'); ?>

            <?php echo Form::textarea("note", $payment_line->note, ['class' => 'form-control', 'rows' => 3]); ?>

          </div>
        </div>
      </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'messages.save' ); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/transaction_payment/payment_row.blade.php ENDPATH**/ ?>