
<div class="row">
    @if(!empty($receipt_details->logo))
        <img style="max-height: 120px; width: auto;" src="{{$receipt_details->logo}}" class="img img-responsive center-block">
    @endif
        <div class="col-xs-12 text-center">
            <h2 class="text-center">
                {{$receipt_details->business_name}}
            </h2>
        </div>


        <div class="col-xs-12 text-center">
        <h2 class="text-center">             إيصال إستلام نقدية       </h2>
            <hr>
        </div>


        <div class="col-xs-12 ">
            <span class="pull-left text-left word-wrap"> العميل :</span>
            <b>{!! $client->name !!}</b>
        </div>
<br>
        <div class="col-xs-6 ">
            <span class="pull-left text-left word-wrap"> رقم القسط :</span>
            <b>{!! $receipt_details->installment_number !!}</b>
        </div>

        <div class="col-xs-6 ">
            <span class="pull-left text-left word-wrap">   المبلغ : </span>
            <b>{!!  $receipt_details->total!!}</b>
        </div>
        <div class="col-xs-6 ">
            <span class="pull-left text-left word-wrap"> تاريخ السداد :</span>
            <b>{!!  $receipt_details->paid_date !!}</b>
        </div>
 </div>

                     <br/>





</div>
        <div class="row">
            <div class="col-xs-12">
                <br/>
                <table class="table table-responsive table-slim">
                    <thead>
                    <tr>
                        <th width="20%">رقم القسط</th>
                        <th  width="30%">تاريخ الإستحقاق</th>
                        <th  width="30%">تاريخ السداد</th>
                        <th  width="20%">الحالة</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($installments as $installment)
                        <tr>
                          <td>{{$installment->installment_number}}</td>
                          <td>{{$installment->installmentdate}}</td>
                          <td>{{$installment->paid_date}}</td>
                          <td>@if($installment->payment_id>0)
                              <span> مسدد </span>
                              @endif  </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

