<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <?php echo Form::open(['url' => action('CashRegisterController@postCloseRegister'), 'method' => 'post' ]); ?>


    <?php echo Form::hidden('user_id', $register_details->user_id); ?>

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h3 class="modal-title"><?php echo app('translator')->get( 'cash_register.current_register' ); ?> ( <?php echo e(\Carbon::createFromFormat('Y-m-d H:i:s', $register_details->open_time)->format('jS M, Y h:i A'), false); ?> - <?php echo e(\Carbon::now()->format('jS M, Y h:i A'), false); ?>)</h3>
    </div>

    <div class="modal-body">
      <div class="row">
        <div class="col-sm-12">
          <table class="table">
            <tr>
              <td>
                <?php echo app('translator')->get('cash_register.cash_in_hand'); ?>:
              </td>
              <td>
                <span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->cash_in_hand, false); ?></span>
              </td>
            </tr>
            <tr>
              <td>
                <?php echo app('translator')->get('cash_register.cash_payment'); ?>:
              </th>
              <td>
                <span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->total_cash, false); ?></span>
              </td>
            </tr>
             <?php if($register_details->total_cheque != 0): ?>
            <tr>
              <td>
                <?php echo app('translator')->get('cash_register.checque_payment'); ?>:
              </td>
             
              <td>
                <span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->total_cheque, false); ?></span>
              </td>
              
            </tr>
            <?php endif; ?>
            <?php if($register_details->total_card != 0): ?>
            <tr>
              <td>
                <?php echo app('translator')->get('cash_register.card_payment'); ?>:
              </td>
              <td>
                <span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->total_card, false); ?></span>
              </td>
            </tr>
            <?php endif; ?>
            <?php if($register_details->total_bank_transfer != 0): ?>
            <tr>
              <td>
                <?php echo app('translator')->get('cash_register.bank_transfer'); ?>:
              </td>
              <td>
                <span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->total_bank_transfer, false); ?></span>
              </td>
            </tr>
            <?php endif; ?>
            <?php if($register_details->total_advance != 0): ?>
            <tr>
              <td>
                <?php echo app('translator')->get('lang_v1.advance_payment'); ?>:
              </td>
              <td>
                <span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->total_advance, false); ?></span>
              </td>
            </tr>
            <?php endif; ?>
            
            
            <?php if(array_key_exists('custom_pay_1', $payment_types)): ?>
             <?php if($register_details->total_custom_pay_1 != 0): ?>
              <tr>
                <td>
                  <?php echo e($payment_types['custom_pay_1'], false); ?>:
                </td>
                <td>
                  <span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->total_custom_pay_1, false); ?></span>
                </td>
              </tr>
            <?php endif; ?>
            <?php endif; ?>
            <?php if(array_key_exists('custom_pay_2', $payment_types)): ?>
            <?php if($register_details->total_custom_pay_2 != 0): ?>
              <tr>
                <td>
                  <?php echo e($payment_types['custom_pay_2'], false); ?>:
                </td>
                <td>
                  <span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->total_custom_pay_2, false); ?></span>
                </td>
              </tr>
            <?php endif; ?>
            <?php endif; ?>
            <?php if(array_key_exists('custom_pay_3', $payment_types)): ?>
            <?php if($register_details->total_custom_pay_3 != 0): ?>
              <tr>
                <td>
                  <?php echo e($payment_types['custom_pay_3'], false); ?>:
                </td>
                <td>
                  <span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->total_custom_pay_3, false); ?></span>
                </td>
              </tr>
            <?php endif; ?>
            <?php endif; ?>
            <?php if(array_key_exists('custom_pay_4', $payment_types)): ?>
              <tr>
                <td>
                  <?php echo e($payment_types['custom_pay_4'], false); ?>:
                </td>
                <td>
                  <span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->total_custom_pay_4, false); ?></span>
                </td>
              </tr>
            <?php endif; ?>
            <?php if(array_key_exists('custom_pay_5', $payment_types)): ?>
              <tr>
                <td>
                  <?php echo e($payment_types['custom_pay_5'], false); ?>:
                </td>
                <td>
                  <span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->total_custom_pay_5, false); ?></span>
                </td>
              </tr>
            <?php endif; ?>
            <?php if(array_key_exists('custom_pay_6', $payment_types)): ?>
              <tr>
                <td>
                  <?php echo e($payment_types['custom_pay_6'], false); ?>:
                </td>
                <td>
                  <span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->total_custom_pay_6, false); ?></span>
                </td>
              </tr>
            <?php endif; ?>
            <?php if(array_key_exists('custom_pay_7', $payment_types)): ?>
              <tr>
                <td>
                  <?php echo e($payment_types['custom_pay_7'], false); ?>:
                </td>
                <td>
                  <span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->total_custom_pay_7, false); ?></span>
                </td>
              </tr>
            <?php endif; ?>
            <?php if($register_details->total_other != 0): ?>
            <tr>
              <td>
                <?php echo app('translator')->get('cash_register.other_payments'); ?>:
              </td>
              <td>
                <span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->total_other, false); ?></span>
              </td>
            </tr>
            <?php endif; ?>
            <tr>
              <td>
                <?php echo app('translator')->get('cash_register.total_sales'); ?>:
              </td>
              <td>
                <span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->total_sale, false); ?></span>
              </td>
            </tr>
            <tr class="success">
              <th>
                <?php echo app('translator')->get('cash_register.total_refund'); ?>
              </th>
              <td>
                <b><span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->total_refund, false); ?></span></b><br>
                <small>
                <?php if($register_details->total_cash_refund != 0): ?>
                  Cash: <span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->total_cash_refund, false); ?></span><br>
                <?php endif; ?>
                <?php if($register_details->total_cheque_refund != 0): ?> 
                  Cheque: <span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->total_cheque_refund, false); ?></span><br>
                <?php endif; ?>
                <?php if($register_details->total_card_refund != 0): ?> 
                  Card: <span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->total_card_refund, false); ?></span><br> 
                <?php endif; ?>
                <?php if($register_details->total_bank_transfer_refund != 0): ?>
                  Bank Transfer: <span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->total_bank_transfer_refund, false); ?></span><br>
                <?php endif; ?>
                <?php if($register_details->total_advance_refund != 0): ?>
                  <?php echo app('translator')->get('lang_v1.advance'); ?>: <span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->total_advance_refund, false); ?></span><br>
                <?php endif; ?>
                <?php if(array_key_exists('custom_pay_1', $payment_types) && $register_details->total_custom_pay_1_refund != 0): ?>
                    <?php echo e($payment_types['custom_pay_1'], false); ?>: <span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->total_custom_pay_1_refund, false); ?></span>
                <?php endif; ?>
                <?php if(array_key_exists('custom_pay_2', $payment_types) && $register_details->total_custom_pay_2_refund != 0): ?>
                    <?php echo e($payment_types['custom_pay_2'], false); ?>: <span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->total_custom_pay_2_refund, false); ?></span>
                <?php endif; ?>
                <?php if(array_key_exists('custom_pay_3', $payment_types) && $register_details->total_custom_pay_3_refund != 0): ?>
                    <?php echo e($payment_types['custom_pay_3'], false); ?>: <span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->total_custom_pay_3_refund, false); ?></span>
                <?php endif; ?>
                <?php if($register_details->total_other_refund != 0): ?>
                  Other: <span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->total_other_refund, false); ?></span>
                <?php endif; ?>
                </small>
              </td>
            </tr>
            <tr class="success">
              <th>
                <?php echo app('translator')->get('lang_v1.total_payment'); ?>
              </th>
              <td>
                <b><span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->cash_in_hand + $register_details->total_cash - $register_details->total_cash_refund, false); ?></span></b>
              </td>
            </tr>
            <tr class="success">
              <th>
                <?php echo app('translator')->get('lang_v1.credit_sales'); ?>:
              </th>
              <td>
                <b><span class="display_currency" data-currency_symbol="true"><?php echo e($details['transaction_details']->total_sales - $register_details->total_sale, false); ?></span></b>
              </td>
            </tr>
            <tr class="success">
              <th>
                <?php echo app('translator')->get('cash_register.total_sales'); ?>:
              </th>
              <td>
                <b><span class="display_currency" data-currency_symbol="true"><?php echo e($details['transaction_details']->total_sales, false); ?></span></b>
              </td>
            </tr>
            <tr class="success">
              <th>
                <?php echo app('translator')->get('مرتجع المبيعات'); ?>:
              </th>
              <td>
                <b><span class="display_currency" data-currency_symbol="true"><?php echo e($sells_return[0]->amount_paid, false); ?></span></b>
              </td>
            </tr>
            <tr class="success">
              <th>
                <?php echo app('translator')->get('مرتجع المشتريات'); ?>:
              </th>
              <td>
                <b><span class="display_currency" data-currency_symbol="true"><?php echo e($purchases_returns[0]->amount_paid, false); ?></span></b>
              </td>
            </tr>
            
          </table>
        </div>
      </div>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('register_product_details.view')): ?>
        <?php echo $__env->make('cash_register.register_product_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('register_payment_details.view')): ?>
        <?php echo $__env->make('cash_register.payment_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>     
    <?php endif; ?>
    <?php echo $__env->make('cash_register.expense_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
    <?php echo $__env->make('cash_register.purchase_pay_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>     
    <!---========================-->
    <div class="row">
        <div class="col-md-6">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="2">الداخل</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="success">
                            <td>
                                <?php echo app('translator')->get('cash_register.cash_in_hand'); ?>:
                            </td>
                            <td>
                                <span class="display_currency" data-currency_symbol="true"><?php echo e($register_details->cash_in_hand, false); ?></span>
                            </td>
                           
                        </tr>
                         <tr class="success">
                              <th>
                               مدفوعات مرتجع المشتريات
                              </th>
                              <td>
                                <b><span class="display_currency" data-currency_symbol="true"><?php echo e($purchases_returns[0]->amount_paid, false); ?></span></b>
                              </td>
                         </tr>
                            <tr class="success">
                              <th>
                                مدفةعات المبيعات
                              </th>
                              <td>
                                <b><span class="display_currency" data-currency_symbol="true"><?php echo e($sells[0]->amount_paid, false); ?></span></b>
                              </td>
                            </tr>
                    </tbody>
                    <tfooter>
                        <tr>
                            <th>مجموع الداخل</th>
                            <td><?php echo e($total_in=$sells[0]->amount_paid + $purchases_returns[0]->amount_paid + $register_details->cash_in_hand, false); ?></td>
                        </tr>
                    </tfooter>
                </table>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="2">الخارج</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="success">
                        
                            <td>
                                <strong>
                          اجمالي مدفوعات المشتريات</strong>
                            </td>
                            <td>
                                <strong><span class="display_currency" data-currency_symbol="true"><?php echo e($purchases[0]->amount_paid, false); ?></sapn></strong>
                            </td>
                        </tr>
                        <tr class="success">
                          <th>
                            <?php echo app('translator')->get('مرتجع المبيعات'); ?>:
                          </th>
                          <td>
                            <b><span class="display_currency" data-currency_symbol="true"><?php echo e($sells_return[0]->amount_paid, false); ?></span></b>
                          </td>
                        </tr>
                        <tr class="success">
                              <td>
                                  <strong>
                                  اجمالي المدفوعات علي المصروفات</strong></td>
                              <td><strong><span class="display_currency" data-currency_symbol="true"><?php echo e($total_expences, false); ?></sapn></strong>
                              </td>
                              
                          </tr>
                    </tbody>
                     <tfooter>
                        <tr>
                            <th>مجموع الخارج</th>
                            <td><?php echo e($total_out=$total_expences+ $sells_return[0]->amount_paid + $purchases[0]->amount_paid, false); ?></td>
                        </tr>
                    </tfooter>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 success"><h3><span>المتبقي : </span><span  class="display_currency" data-currency_symbol="true"><?php echo e($total_in-$total_out, false); ?></span></h3></div>
        <div class="col-md-4"></div>
    </div>
     <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('closing_amount', __( 'cash_register.total_cash' ) . ':*'); ?>

              <?php echo Form::text('closing_amount', number_format($register_details->cash_in_hand + $register_details->total_cash - $register_details->total_cash_refund, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input_number', 'required', 'placeholder' => __( 'cash_register.total_cash' ) ]); ?>

          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('total_card_slips', __( 'cash_register.total_card_slips' ) . ':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.total_card_slips') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
              <?php echo Form::number('total_card_slips', $register_details->total_card_slips, ['class' => 'form-control', 'required', 'placeholder' => __( 'cash_register.total_card_slips' ), 'min' => 0 ]); ?>

          </div>
        </div> 
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('total_cheques', __( 'cash_register.total_cheques' ) . ':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.total_cheques') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
              <?php echo Form::number('total_cheques', $register_details->total_cheques, ['class' => 'form-control', 'required', 'placeholder' => __( 'cash_register.total_cheques' ), 'min' => 0 ]); ?>

          </div>
        </div> 
        <div class="col-sm-12">
          <div class="form-group">
            <?php echo Form::label('closing_note', __( 'cash_register.closing_note' ) . ':'); ?>

              <?php echo Form::textarea('closing_note', null, ['class' => 'form-control', 'placeholder' => __( 'cash_register.closing_note' ), 'rows' => 3 ]); ?>

          </div>
        </div>
      </div> 
      <div class="row">
        <div class="col-xs-6">
          <b><?php echo app('translator')->get('report.user'); ?>:</b> <?php echo e($register_details->user_name, false); ?><br>
          <b><?php echo app('translator')->get('business.email'); ?>:</b> <?php echo e($register_details->email, false); ?><br>
          <b><?php echo app('translator')->get('business.business_location'); ?>:</b> <?php echo e($register_details->location_name, false); ?><br>
        </div>
        <?php if(!empty($register_details->closing_note)): ?>
          <div class="col-xs-6">
            <strong><?php echo app('translator')->get('cash_register.closing_note'); ?>:</strong><br>
            <?php echo e($register_details->closing_note, false); ?>

          </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.cancel' ); ?></button>
      <button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'cash_register.close_register' ); ?></button>
    </div>
    <?php echo Form::close(); ?>

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/cash_register/close_register_modal.blade.php ENDPATH**/ ?>