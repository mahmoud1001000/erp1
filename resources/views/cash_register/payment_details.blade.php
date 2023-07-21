<div class="row">
  <div class="col-md-12">
    <hr>
    <h3>تفاصيل الدفعات</h3>
    <table class="table">
      <tr>
        <th>#</th>
        <th>الرقم المرجعي </th>
        
        <th>@lang('sale.total_amount')</th>
        <th>رقم  الفاتورة</th>
          <th>اسم العميل</th>
      </tr>
      @php
        $total_amount = 0;
        $total_quantity = 0;
      @endphp
      @foreach($payements_detail as $detail)
        <tr>
          <td>
            {{$loop->iteration}}.
          </td>
          <td>
            {{--  <button type="button" class="btn btn-primary btn-xs view_payment" data-href="{{URL::to('/payments/view-payment/'.$details->tpid)}}">{{$detail->payment_ref_no}}                    </button>--}}
            
          </td>
          <td>
            <span class="display_currency" data-currency_symbol="true">{{$detail->amount}}</span>
           @php
           $total_amount+=$detail->amount;
           @endphp
          </td>
          <td>
              {{$detail->invoice_no}}
          </td>
          <td>
              {{$detail->name}}
          </td>
        </tr>
      @endforeach

      <tr>
          <td colspan="2">
              <strong>
              اجمالي المدفوعات</strong></td>
          <td><strong><span class="display_currency" data-currency_symbol="true">{{$total_amount}}</sapn></strong></td>
          <td colspan="2"></td>
      </tr>


      </table>
    </div>
  </div>
  <!-- /.content -->
<div class="modal fade view_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>
<script src="{{ asset('js/payment.js?v=' . $asset_v) }}"></script>
