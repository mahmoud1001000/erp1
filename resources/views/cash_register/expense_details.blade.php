<div class="row">
  <div class="col-md-12">
    <hr>
    <h3>تفاصيل المصروفات</h3>
    <table class="table">
      <tr>
        <th>#</th>
        <th>الرقم المرجعي </th>
        
        <th>@lang('sale.total_amount')</th>
        <th>الحالة  </th>
          <th>مصروف لـ </th>
      </tr>
      @php
        $total_amount = 0;
        $total_quantity = 0;
      @endphp
      @foreach($expenses as $detail)
        <tr>
          <td>
            {{$loop->iteration}}.
          </td>
          <td>
            {{$detail->ref_no}}
          </td>
          <td>
            <span class="display_currency" data-currency_symbol="true">{{$detail->final_total}}</span>
           @php
           $total_amount+=$detail->final_total;
           @endphp
          </td>
          <td>
              {{$detail->payment_status}}
          </td>
          <td>
              {{$detail->expense_for}}
          </td>
        </tr>
      @endforeach

      <tr>
          <td colspan="2">
              <strong>
              اجمالي المدفوعات علي المصروفات</strong></td>
          <td><strong><span class="display_currency" data-currency_symbol="true">{{$expenses[0]->amount_paid ?? 0}}</sapn></strong></td>
          <td colspan="2"></td>
      </tr>


      </table>
    </div>
  </div>
