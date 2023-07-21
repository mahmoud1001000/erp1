
<div class="row">
  <div class="col-md-12">
    <hr>
    <h3> دفعات غير مرتبطة بالمبيعات </h3>
    <table class="table">
      <tr>
        <th>#</th>
        <th>الرقم المرجعي </th>
        
        <th>@lang('sale.total_amount')</th>
        <th>رقم  الفاتورة</th>
          <th>اسم العميل</th>
      </tr>
      @php
        $total_amount_not_related = 0;
        $total_quantity = 0;
        //dd($not_related_payment_customer);
      @endphp
      @foreach($not_related_payment_customer as $detail)
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
           $total_amount_not_related+=$detail->amount;
           @endphp
          </td>
          <td>
             
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
          <td><strong><span class="display_currency" data-currency_symbol="true">{{$total_amount_not_related}}</sapn></strong></td>
          <td colspan="2"></td>
      </tr>


      </table>
    </div>
  </div>
