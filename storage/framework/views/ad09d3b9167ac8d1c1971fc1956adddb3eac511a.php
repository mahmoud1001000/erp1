<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('TransactionPaymentController@postPayContactDue'), 'method' => 'post', 'id' => 'pay_contact_due_form', 'files' => true ]); ?>


    <?php echo Form::hidden("contact_id", $contact_details->contact_id); ?>

    <?php echo Form::hidden("due_payment_type", $due_payment_type); ?>

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get( 'purchase.add_payment' ); ?></h4>
    </div>

    <div class="modal-body">
      <div class="row">
        <?php if($due_payment_type == 'purchase'): ?>
        <div class="col-md-6">
          <div class="well">
            <strong><?php echo app('translator')->get('purchase.supplier'); ?>: </strong><?php echo e($contact_details->name, false); ?><br>
            <strong><?php echo app('translator')->get('business.business'); ?>: </strong><?php echo e($contact_details->supplier_business_name, false); ?><br><br>
          </div>
        </div>
        <div class="col-md-6">
          <div class="well">
            <strong><?php echo app('translator')->get('report.total_purchase'); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($contact_details->total_purchase, false); ?></span><br>
            <strong><?php echo app('translator')->get('contact.total_paid'); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($contact_details->total_paid, false); ?></span><br>
            <strong><?php echo app('translator')->get('contact.total_purchase_due'); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($contact_details->total_purchase - $contact_details->total_paid, false); ?></span><br>
             <?php if(!empty($contact_details->opening_balance) || $contact_details->opening_balance != '0.00'): ?>
                  <strong><?php echo app('translator')->get('lang_v1.opening_balance'); ?>: </strong>
                  <span class="display_currency" data-currency_symbol="true">
                  <?php echo e($contact_details->opening_balance, false); ?></span><br>
                  <strong><?php echo app('translator')->get('lang_v1.opening_balance_due'); ?>: </strong>
                  <span class="display_currency" data-currency_symbol="true">
                  <?php echo e($ob_due, false); ?></span>
              <?php endif; ?>
          </div>
        </div>
        <?php elseif($due_payment_type == 'purchase_return'): ?>
        <div class="col-md-6">
          <div class="well">
            <strong><?php echo app('translator')->get('purchase.supplier'); ?>: </strong><?php echo e($contact_details->name, false); ?><br>
            <strong><?php echo app('translator')->get('business.business'); ?>: </strong><?php echo e($contact_details->supplier_business_name, false); ?><br><br>
          </div>
        </div>
        <div class="col-md-6">
          <div class="well">
            <strong><?php echo app('translator')->get('lang_v1.total_purchase_return'); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($contact_details->total_purchase_return, false); ?></span><br>
            <strong><?php echo app('translator')->get('lang_v1.total_purchase_return_paid'); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($contact_details->total_return_paid, false); ?></span><br>
            <strong><?php echo app('translator')->get('lang_v1.total_purchase_return_due'); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($contact_details->total_purchase_return - $contact_details->total_return_paid, false); ?></span>
          </div>
        </div>
        <?php elseif(in_array($due_payment_type, ['sell'])): ?>
          <div class="col-md-6">
            <div class="well">
              <strong><?php echo app('translator')->get('sale.customer_name'); ?>: </strong><?php echo e($contact_details->name, false); ?><br>
              <br><br>
            </div>
          </div>
          <div class="col-md-6">
            <div class="well">
              <strong><?php echo app('translator')->get('report.total_sell'); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($contact_details->total_invoice, false); ?></span><br>
              <strong><?php echo app('translator')->get('contact.total_paid'); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($contact_details->total_paid, false); ?></span><br>
              <strong><?php echo app('translator')->get('contact.total_sale_due'); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($contact_details->total_invoice - $contact_details->total_paid, false); ?></span><br>
              <?php if(!empty($contact_details->opening_balance) || $contact_details->opening_balance != '0.00'): ?>
                  <strong><?php echo app('translator')->get('lang_v1.opening_balance'); ?>: </strong>
                  <span class="display_currency" data-currency_symbol="true">
                  <?php echo e($contact_details->opening_balance, false); ?></span><br>
                  <strong><?php echo app('translator')->get('lang_v1.opening_balance_due'); ?>: </strong>
                  <span class="display_currency" data-currency_symbol="true">
                  <?php echo e($ob_due, false); ?></span>
              <?php endif; ?>
            </div>
          </div>
         <?php elseif(in_array($due_payment_type, ['sell_return'])): ?>
         <div class="col-md-6">
          <div class="well">
            <strong><?php echo app('translator')->get('sale.customer_name'); ?>: </strong><?php echo e($contact_details->name, false); ?><br>
              <br><br>
          </div>
        </div>
        <div class="col-md-6">
          <div class="well">
            <strong><?php echo app('translator')->get('lang_v1.total_sell_return'); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($contact_details->total_sell_return, false); ?></span><br>
            <strong><?php echo app('translator')->get('lang_v1.total_sell_return_paid'); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($contact_details->total_return_paid, false); ?></span><br>
            <strong><?php echo app('translator')->get('lang_v1.total_sell_return_due'); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($contact_details->total_sell_return - $contact_details->total_return_paid, false); ?></span>
          </div>
        </div>
        <?php endif; ?>
      </div>
      <div class="row payment_row">
        <div class="col-md-4">
          <div class="form-group">
            <?php echo Form::label("amount" , __('sale.amount') . ':*'); ?>

            <div class="input-group">
              <span class="input-group-addon">
                <i class="fas fa-money-bill-alt"></i>
              </span>
              <?php if(in_array($due_payment_type, ['sell_return', 'purchase_return'])): ?>
              <?php echo Form::text("amount", number_format($payment_line->amount, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input_number', 'required', 'placeholder' => __('sale.amount'), 'data-rule-max-value' => $payment_line->amount, 'data-msg-max-value' => __('lang_v1.max_amount_to_be_paid_is', ['amount' => $amount_formated])]); ?>

              <?php else: ?>
                <?php echo Form::text("amount", number_format($payment_line->amount, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input_number', 'required', 'placeholder' => __('sale.amount')]); ?>

              <?php endif; ?>
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
        <div class="clearfix"></div>
        <div class="col-md-4">
          <div class="form-group">
            <?php echo Form::label('document', __('purchase.attach_document') . ':'); ?>

            <?php echo Form::file('document', ['accept' => implode(',', array_keys(config('constants.document_upload_mimes_types')))]); ?>

            <p class="help-block">
            <?php if ($__env->exists('components.document_help_text')) echo $__env->make('components.document_help_text', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></p>
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
</div><!-- /.modal-dialog --><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/transaction_payment/pay_supplier_due_modal.blade.php ENDPATH**/ ?>