	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">@lang('lang_v1.recent_transactions')</h4>
			</div>
			<div class="modal-body">
			
    
    <button class="btn btn-primary" onClick="window.print();"><i  class="fa fa-print"></i>طباعة</button>
      <h2> {{$contact->name}}</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table_idd">
                    <thead>
                        <tr>
                            <th class="no-print">@lang('messages.action')</th>
                            <th>المبلغ </th>
                            <th>تاريخ الاستحقاق </th>
                            <th>الحالة</th>
                            <th>تاريخ السداد</th>
                        </tr>
                    </thead>
                   <tbody>
                       @foreach($data as $row)
                       <tr>
                           <td class="no-print">
                               @if($row->status=='due')
                               <button class="btn btn-default" onClick="toggle_div({{$row->id}});"><i class="fa fa-dollar-sign">دفع</i></button>
                               <div id="payment_div_{{$row->id}}" style="display:none">
                               <div class="row" style="width:400px">
                                   <div class="col-md-6">
                                       {!! Form::label("" , __('lang_v1.date') . ':') !!}
                                       <input type="date" id="pay_date_{{$row->id}}" onChange='cal_fine({{$row->id}},{{$row->amount}},<?php echo '"'.$row->due_at.'"'?>);' class="form-control" >
                                   </div>
                                   <div class="col-md-6">
                                       <div class="form-group ">
                    			    	{!! Form::label("" , __('lang_v1.payment_account') . ':') !!}
                        				    <div class="input-group">
                            					<span class="input-group-addon">
                            						<i class="fas fa-money-bill-alt"></i>
                            					</span>
                            					{!! Form::select("account", $accounts, null , ['required'=>'required','class' => 'form-control select2 account-dropdown', 'id' => "account_$row->id", 'style' => 'width:100%;']); !!}
                            				</div>
                            			</div>
                                   </div>
                               </div>
                               <div class="row" style="width:400px">
                                   <div class="col-md-6">
                                       {!! Form::label("" , __('قيمة الغرامة') . ':') !!}
                                       <input readonly type="text" id="pay_fine_{{$row->id}}" class="form-control" >
                                   </div>
                                </div>
                                  <div class="row" style="width:400px">
                                   <div class="col-md-6">
                                       {!! Form::label("" , __('نسبة الغرامة') . ':') !!}
                                       <input readonly type="text" id="composite_fine_{{$row->id}}" value="{{$business->composite_fine}}" class="form-control" >
                                   </div>
                                    <div class="col-md-6">
                                       {!! Form::label("" , __(' ايام التأخير') . ':') !!}
                                       <input readonly type="text" id="days_late_{{$row->id}}" value="" class="form-control" >
                                   </div>
                                </div>

                               <button class="btn btn-success" onClick="payInstallment({{$row->id}},{{$row->amount}});">تسديد</button>
                               </div>
                               @else
                                <button type="button" class="btn btn-primary btn-xs view_payment" data-href="{{ action('TransactionPaymentController@viewPayment', [$row->TP_id]) }}">
                                  <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>                               
                               @endif
                               </td>
                           <td>{{$row->amount}}</td>
                           <td>{{$row->due_at}}</td>
                           <td>@php
                           $payment_status=$row->status;
                           @endphp
                                <a href="#" class="view_payment_modal payment-status-label" data-orig-value="{{$payment_status}}" data-status-name="{{__('lang_v1.' . $payment_status)}}"><span class="label @payment_status($payment_status)">{{__('lang_v1.' . $payment_status)}}
                                </span></a>
                            </td>
                           <td>{{$row->paid_at}}</td>
                       </tr>
                      @endforeach
                   </tbody>
                </table>
            </div>
        


<script>
function toggle_div(id){
    $("#payment_div_"+id).toggle();
}
    $(document).ready( function () {
   $('#table_id').DataTable();
  // $('#table_id').dataTable( {
    //        "pagingType": "scrolling"
      //  } );
});
</script>
<script>
    function cal_fine(id,amount,due_at){
        var pay_date=$("#pay_date_"+id).val();
        var days=days_between(pay_date,due_at);
        
        if (days<0){
            days=0;
        }
        var composite = $("#composite_fine_"+id).val();
        $("#days_late_"+id).val(days);
        var fine=0;
        var total=amount;
        for(var i = 1; i<=days ; i++){
             total = total+ (total * composite)/100;
        }
        fine=parseFloat(total) - parseFloat(amount);
        $("#pay_fine_"+id).val(fine.toFixed(2));
    }
    function days_between(date1, date2) {
       
        const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
        const firstDate = new Date(date1);
        const secondDate = new Date(date2);
        
        const diffDays = Math.round((firstDate - secondDate) / oneDay);

        return diffDays
    }
</script>
<script>
         function payInstallment(id,amount) {
             if($("#pay_fine_"+id).val()>0){
                 var pay_fine=$("#pay_fine_"+id).val();
             }else{
                var  pay_fine=0;
             }
             
            $.ajax({
                
               type:'POST',
               url:'/sells/payInstallment',
               data:{
                    '_token' :'<?php echo csrf_token() ?>',
                    'id':id,
                    'amount':amount,
                    'method':'installment',
                    'note':null,
                    'card_number':null,
                    'card_holder_name':null,
                    'card_transaction_number':null, 
                    'card_type':null,
                    'card_month':null,
                    'card_year':null,
                    'card_security':null,
                    'cheque_number':null,
                    'bank_account_number':null,
                    'account_id':$("#account_"+id).val(),
                    'paid_on':$("#pay_date_"+id).val(),
                    'pay_fine':pay_fine,
                    },
               success:function(result) {
                    toastr.success(result.msg);
                    sell_table.ajax.reload();
                    //location.reload(true);
               }
            });
         }
      </script>
			</div>
			<div class="modal-footer">
			    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.close')</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
