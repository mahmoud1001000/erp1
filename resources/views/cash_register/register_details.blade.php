<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">

    <div class="modal-header">
      <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h3 class="modal-title">@lang( 'cash_register.register_details' ) ( {{ \Carbon::createFromFormat('Y-m-d H:i:s', $register_details->open_time)->format('jS M, Y h:i A') }} -  {{\Carbon::createFromFormat('Y-m-d H:i:s', $close_time)->format('jS M, Y h:i A')}} )</h3>
    </div>

    <div class="modal-body">
      <div class="row">
        <div class="col-sm-12">
          <table class="table">
            <tr>
              <td>
                @lang('cash_register.cash_in_hand'):
              </td>
              <td>
                <span class="display_currency" data-currency_symbol="true">{{ $register_details->cash_in_hand }}</span>
              </td>
            </tr>
            <tr>
              <td>
                @lang('cash_register.cash_payment'):
              </th>
              <td>
                <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_cash }}</span>
              </td>
            </tr>
             @if($register_details->total_cheque != 0)
            <tr>
              <td>
                @lang('cash_register.checque_payment'):
              </td>
             
              <td>
                <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_cheque }}</span>
              </td>
              
            </tr>
            @endif
            @if($register_details->total_card != 0)
            <tr>
              <td>
                @lang('cash_register.card_payment'):
              </td>
              <td>
                <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_card }}</span>
              </td>
            </tr>
            @endif
            @if($register_details->total_bank_transfer != 0)
            <tr>
              <td>
                @lang('cash_register.bank_transfer'):
              </td>
              <td>
                <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_bank_transfer }}</span>
              </td>
            </tr>
            @endif
            @if($register_details->total_advance != 0)
            <tr>
              <td>
                @lang('lang_v1.advance_payment'):
              </td>
              <td>
                <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_advance }}</span>
              </td>
            </tr>
            @endif
            
            
            @if(array_key_exists('custom_pay_1', $payment_types))
             @if($register_details->total_custom_pay_1 != 0)
              <tr>
                <td>
                  {{$payment_types['custom_pay_1']}}:
                </td>
                <td>
                  <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_custom_pay_1 }}</span>
                </td>
              </tr>
            @endif
            @endif
            @if(array_key_exists('custom_pay_2', $payment_types))
            @if($register_details->total_custom_pay_2 != 0)
              <tr>
                <td>
                  {{$payment_types['custom_pay_2']}}:
                </td>
                <td>
                  <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_custom_pay_2 }}</span>
                </td>
              </tr>
            @endif
            @endif
            @if(array_key_exists('custom_pay_3', $payment_types))
            @if($register_details->total_custom_pay_3 != 0)
              <tr>
                <td>
                  {{$payment_types['custom_pay_3']}}:
                </td>
                <td>
                  <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_custom_pay_3 }}</span>
                </td>
              </tr>
            @endif
            @endif
            @if($register_details->total_other != 0)
            <tr>
              <td>
                @lang('cash_register.other_payments'):
              </td>
              <td>
                <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_other }}</span>
              </td>
            </tr>
            @endif
            <tr class="success">
              <th>
                @lang('cash_register.total_refund')
              </th>
              <td>
                <b><span class="display_currency" data-currency_symbol="true">{{ $register_details->total_refund }}</span></b><br>
                <small>
                @if($register_details->total_cash_refund != 0)
                  Cash: <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_cash_refund }}</span><br>
                @endif
                @if($register_details->total_cheque_refund != 0) 
                  Cheque: <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_cheque_refund }}</span><br>
                @endif
                @if($register_details->total_card_refund != 0) 
                  Card: <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_card_refund }}</span><br> 
                @endif
                @if($register_details->total_bank_transfer_refund != 0)
                  Bank Transfer: <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_bank_transfer_refund }}</span><br>
                @endif
                @if($register_details->total_advance_refund != 0)
                  @lang('lang_v1.advance'): <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_advance_refund }}</span><br>
                @endif
                @if(array_key_exists('custom_pay_1', $payment_types) && $register_details->total_custom_pay_1_refund != 0)
                    {{$payment_types['custom_pay_1']}}: <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_custom_pay_1_refund }}</span>
                @endif
                @if(array_key_exists('custom_pay_2', $payment_types) && $register_details->total_custom_pay_2_refund != 0)
                    {{$payment_types['custom_pay_2']}}: <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_custom_pay_2_refund }}</span>
                @endif
                @if(array_key_exists('custom_pay_3', $payment_types) && $register_details->total_custom_pay_3_refund != 0)
                    {{$payment_types['custom_pay_3']}}: <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_custom_pay_3_refund }}</span>
                @endif
                @if($register_details->total_other_refund != 0)
                  Other: <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_other_refund }}</span>
                @endif
                </small>
              </td>
            </tr>
            <tr class="success">
              <th>
                @lang('lang_v1.total_payment')
              </th>
              <td>
                <b><span class="display_currency" data-currency_symbol="true">{{ $register_details->cash_in_hand + $register_details->total_cash - $register_details->total_cash_refund }}</span></b>
              </td>
            </tr>
            <tr class="success">
              <th>
                @lang('lang_v1.credit_sales'):
              </th>
              <td>
                <b><span class="display_currency" data-currency_symbol="true">{{ $details['transaction_details']->total_sales - $register_details->total_sale }}</span></b>
              </td>
            </tr>
            <tr class="success">
              <th>
                @lang('cash_register.total_sales'):
              </th>
              <td>
                <b><span class="display_currency" data-currency_symbol="true">{{ $details['transaction_details']->total_sales }}</span></b>
              </td>
            </tr>
            <tr class="success">
              <th>
                @lang('مرتجع المبيعات'):
              </th>
              <td>
                <b><span class="display_currency" data-currency_symbol="true">{{ $sells_return[0]->amount_paid }}</span></b>
              </td>
            </tr>
            <tr class="success">
              <th>
                @lang('مرتجع المشتريات'):
              </th>
              <td>
                <b><span class="display_currency" data-currency_symbol="true">{{ $purchases_returns[0]->amount_paid }}</span></b>
              </td>
            </tr>
            
          </table>
        </div>
      </div>
    @can('register_product_details.view')
        @include('cash_register.register_product_details')
    @endcan
    @can('register_payment_details.view')
        @include('cash_register.payment_details')     
    @endcan
    @include('cash_register.expense_details')   
    @include('cash_register.purchase_pay_details')
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
                                @lang('cash_register.cash_in_hand'):
                            </td>
                            <td>
                                <span class="display_currency" data-currency_symbol="true">{{ $register_details->cash_in_hand }}</span>
                            </td>
                           
                        </tr>
                         <tr class="success">
                              <th>
                               مدفوعات مرتجع المشتريات
                              </th>
                              <td>
                                <b><span class="display_currency" data-currency_symbol="true">{{ $purchases_returns[0]->amount_paid }}</span></b>
                              </td>
                         </tr>
                            <tr class="success">
                              <th>
                                مدفوعات المبيعات
                              </th>
                              <td>
                                <b><span class="display_currency" data-currency_symbol="true">{{ $sells[0]->amount_paid }}</span></b>
                              </td>
                            </tr>
                        
                    </tbody>
                    <tfooter>
                        <tr>
                            <th>مجموع الداخل</th>
                            <td>{{$total_in=$sells[0]->amount_paid + $purchases_returns[0]->amount_paid + $register_details->cash_in_hand }}</td>
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
                                <strong><span class="display_currency" data-currency_symbol="true">{{$purchases[0]->amount_paid}}</sapn></strong>
                            </td>
                        </tr>
                        <tr class="success">
                          <th>
                            @lang('مرتجع المبيعات'):
                          </th>
                          <td>
                            <b><span class="display_currency" data-currency_symbol="true">{{ $sells_return[0]->amount_paid }}</span></b>
                          </td>
                        </tr>
                        <tr class="success">
                              <td>
                                  <strong>
                                  اجمالي المدفوعات علي المصروفات</strong></td>
                              <td><strong><span class="display_currency" data-currency_symbol="true">{{$expenses[0]->amount_paid ?? 0}}</sapn></strong>
                              </td>
                              
                          </tr>
                    </tbody>
                     <tfooter>
                        <tr>
                            <th>مجموع الخارج</th>
                           @php
                           
                           @endphp
                            <td>{{$total_out= $total_expences+ $sells_return[0]->amount_paid + $purchases[0]->amount_paid}}</td>
                        </tr>
                    </tfooter>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 success"><h3><span>المتبقي : </span><span  class="display_currency" data-currency_symbol="true">{{$total_in-$total_out}}</span></h3></div>
        <div class="col-md-4"></div>
    </div>
      <div class="row">
        <div class="col-xs-6">
          <b>@lang('report.user'):</b> {{ $register_details->user_name}}<br>
          <b>@lang('business.email'):</b> {{ $register_details->email}}<br>
          <b>@lang('business.business_location'):</b> {{ $register_details->location_name}}<br>
        </div>
        @if(!empty($register_details->closing_note))
          <div class="col-xs-6">
            <strong>@lang('cash_register.closing_note'):</strong><br>
            {{$register_details->closing_note}}
          </div>
        @endif
      </div>
    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-primary no-print" 
        aria-label="Print" 
          onclick="$(this).closest('div.modal').printThis();">
        <i class="fa fa-print"></i> @lang( 'messages.print' )
      </button>

      <button type="button" class="btn btn-default no-print" 
        data-dismiss="modal">@lang( 'messages.cancel' )
      </button>
    </div>

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->