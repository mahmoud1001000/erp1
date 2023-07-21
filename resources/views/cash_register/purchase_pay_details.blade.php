<div class="row">
  <div class="col-md-12">
    <hr>
    <h3>تفاصيل مدفوعات المشتريات</h3>
    <table class="table">
      <tr>
        <th>#</th>
        <th>الرقم المرجعي </th>
        
        <th>@lang('sale.total_amount')</th>
        <th>رقم  الفاتورة</th>
          <th>اسم المورد</th>
      </tr>
      @php
        $total_amount = 0;
        $total_quantity = 0;
      @endphp
      @foreach($purchases as $detail)
        <tr>
          <td>
            {{$loop->iteration}}.
          </td>
          <td>
            {{$detail->payment_ref_no}}
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
