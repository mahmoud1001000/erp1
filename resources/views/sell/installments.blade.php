@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.20/pagination/scrolling.js"></script>

@section('title', __('lang_v1.installment'))
@php
    $api_key = env('GOOGLE_MAP_API_KEY');
@endphp
@if(!empty($api_key))
    @section('css')
     
    @endsection
@endif
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> @lang('lang_v1.installment')
        <small>@lang( '', ['contacts' =>  __('lang_v1.installment') ])</small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
    
    <button class="btn btn-primary" onClick="window.print();"><i  class="fa fa-print"></i>طباعة</button>
      <h2>{{$contact->first_name}} {{$contact->last_name}}</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table_id">
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
                                       <input type="date" id="pay_date_{{$row->id}}" class="form-control" >
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
        

</section>
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
         function payInstallment(id,amount) {
             debugger;
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
               },
               success:function(result) {
                    toastr.success(result.msg);
                    location.reload(true);
               }
            });
         }
      </script>
<!-- /.content -->
<div class="modal fade payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>
<div class="modal fade view_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<div class="modal fade edit_payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>
@php
$is_woocommerce=false;
@endphp
@stop
@section('javascript')
<script type="text/javascript">
$(document).ready( function(){
    //Date range as a button
    $('#sell_list_filter_date_range').daterangepicker(
        dateRangeSettings,
        function (start, end) {
            $('#sell_list_filter_date_range').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
            sell_table.ajax.reload();
        }
    );
    $('#sell_list_filter_date_range').on('cancel.daterangepicker', function(ev, picker) {
        $('#sell_list_filter_date_range').val('');
        sell_table.ajax.reload();
    });

    sell_table = $('#sell_table').DataTable({
        processing: true,
        serverSide: true,
        aaSorting: [[1, 'desc']],
        "ajax": {
            "url": "/sells",
            "data": function ( d ) {
                if($('#sell_list_filter_date_range').val()) {
                    var start = $('#sell_list_filter_date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
                    var end = $('#sell_list_filter_date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
                    d.start_date = start;
                    d.end_date = end;
                }
                d.is_direct_sale = 1;

                d.location_id = $('#sell_list_filter_location_id').val();
                d.customer_id = $('#sell_list_filter_customer_id').val();
                d.payment_status = $('#sell_list_filter_payment_status').val();
                d.created_by = $('#created_by').val();
                d.sales_cmsn_agnt = $('#sales_cmsn_agnt').val();
                d.service_staffs = $('#service_staffs').val();
                
                @if($is_woocommerce)
                    if($('#synced_from_woocommerce').is(':checked')) {
                        d.only_woocommerce_sells = 1;
                    }
                @endif

                if($('#only_subscriptions').is(':checked')) {
                    d.only_subscriptions = 1;
                }

                d = __datatable_ajax_callback(d);
            }
        },
        scrollY:        "500px",
        scrollX:        true,
        scrollCollapse: true,
        columns: [
            { data: 'action', name: 'action', orderable: false, "searchable": false},
            { data: 'transaction_date', name: 'transaction_date'  },
            { data: 'invoice_no', name: 'invoice_no'},
            { data: 'name', name: 'contacts.name'},
            { data: 'mobile', name: 'contacts.mobile'},
            { data: 'business_location', name: 'bl.name'},
            { data: 'payment_status', name: 'payment_status'},
            { data: 'payment_methods', orderable: false, "searchable": false},
            { data: 'final_total', name: 'final_total'},
            { data: 'total_paid', name: 'total_paid', "searchable": false},
            { data: 'total_remaining', name: 'total_remaining'},
            { data: 'return_due', orderable: false, "searchable": false},
            { data: 'shipping_status', name: 'shipping_status'},
            { data: 'total_items', name: 'total_items', "searchable": false},
            { data: 'types_of_service_name', name: 'tos.name', @if(empty($is_types_service_enabled)) visible: false @endif},
            { data: 'service_custom_field_1', name: 'service_custom_field_1', @if(empty($is_types_service_enabled)) visible: false @endif},
            { data: 'added_by', name: 'u.first_name'},
            { data: 'additional_notes', name: 'additional_notes'},
            { data: 'staff_note', name: 'staff_note'},
            { data: 'shipping_details', name: 'shipping_details'},
            { data: 'table_name', name: 'tables.name', @if(empty($is_tables_enabled)) visible: false @endif },
            { data: 'waiter', name: 'ss.first_name', @if(empty($is_service_staff_enabled)) visible: false @endif },
        ],
        "fnDrawCallback": function (oSettings) {
            __currency_convert_recursively($('#sell_table'));
        },
        "footerCallback": function ( row, data, start, end, display ) {
            
            var footer_sale_total = 0;
            var footer_total_paid = 0;
            var footer_total_remaining = 0;
            var footer_total_sell_return_due = 0;
            for (var r in data){
                if(r==22){
                    debugger;
                }
                footer_sale_total += typeof($(data[r].final_total).data('orig-value')) != 'undefined' ? parseFloat($(data[r].final_total).data('orig-value')) : 0;
               
                
                footer_total_paid += typeof($(data[r].total_paid).data('orig-value')) != 'undefined' ? parseFloat($(data[r].total_paid).data('orig-value')) : 0;
                footer_total_remaining += typeof($(data[r].total_remaining).data('orig-value')) != 'undefined' ? parseFloat($(data[r].total_remaining).data('orig-value')) : 0;
                footer_total_sell_return_due += typeof($(data[r].return_due).data('orig-value')) != 'undefined' ? parseFloat($(data[r].return_due).data('orig-value')) : 0;
            }

            $('.footer_total_sell_return_due').html(__currency_trans_from_en(footer_total_sell_return_due));
            $('.footer_total_remaining').html(__currency_trans_from_en(footer_total_remaining));
            footer_total_paid =footer_total_paid ; // parseFloat(footer_total_paid).toFixed(2);//footer_sale_total - footer_total_remaining;
            $('.footer_total_paid').html(footer_total_paid);
            $('.footer_sale_total').html(__currency_trans_from_en(footer_sale_total));

            $('.footer_payment_status_count').html(__count_status(data, 'payment_status'));
            $('.service_type_count').html(__count_status(data, 'types_of_service_name'));
            $('.payment_method_count').html(__count_status(data, 'payment_methods'));
        },
        createdRow: function( row, data, dataIndex ) {
            $( row ).find('td:eq(6)').attr('class', 'clickable_td');
        }
    });

    $(document).on('change', '#sell_list_filter_location_id, #sell_list_filter_customer_id, #sell_list_filter_payment_status, #created_by, #sales_cmsn_agnt, #service_staffs',  function() {
        sell_table.ajax.reload();
    });
    @if($is_woocommerce)
        $('#synced_from_woocommerce').on('ifChanged', function(event){
            sell_table.ajax.reload();
        });
    @endif

    $('#only_subscriptions').on('ifChanged', function(event){
        sell_table.ajax.reload();
    });
});
</script>
<script src="{{ asset('js/payment.js?v=' . $asset_v) }}"></script>

@endsection
