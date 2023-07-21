@extends('layouts.app')
@section('title', __( 'الاقساط المتأخرة '))
@section('content')
@include('sell.installment_nav')

<!-- Content Header (Page header) -->
<section class="content-header no-print">
    <h1>@lang(' الاقساط المتأخرة')
    </h1>
</section>

<!-- Main content -->
<section class="content no-print">
    @component('components.filters', ['title' => __('report.filters')])
        
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('sell_list_filter_customer_id',  __('contact.customer') . ':') !!}
                {!! Form::select('sell_list_filter_customer_id', $customers, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); !!}
            </div>
        </div>

        
        
    @endcomponent
    @component('components.widget', ['class' => 'box-primary'])
        @slot('tool')
            
        @endslot
        <div class="table-responsive">
            <table class="table table-bordered table-striped ajax_view" id="sell_table">
                <thead>
                    <tr>
                         <th>الحالة</th>
                        <th>العميل</th>
                        <th>تاريخ الفاتورة</th>
                        <th>رقم الفاتورة)</th>
                        <th>مبلغ القسط</th>
                        <th>غرامة </th>
                         <th>تاريخ الاستحقاق</th>
                         <th>عدد ايام التأخير </th>
                          <th>الحالة</th>
                          <th>تاريخ الدفع</th>
                          
                       
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
                <tfooter>
                    <tr>
                        <th colspan="4">المجموع</th>
                        <th class="footer_total_amount"></th>
                        <th class="fine_total"></th>
                        
                    </tr>
                </tfooter>
            </table>
        </div>
    @endcomponent
</section>
<!-- /.content -->
<div class="modal fade view_modal_details" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

@stop
@section('javascript')
<script type="text/javascript">
 $(document).on('click', '.show_payment_modal', function(e) {
      e.preventDefault();
        var url = $(this).data('href');
        var container = $('.view_modal_details');
        $.ajax({
            method: 'GET',
            url: url,
            dataType: 'html',
            success: function(result) {
                $(container)
                    .html(result)
                    .modal('show');
              //  __currency_convert_recursively(container);
            },
        });
    });
$(document).ready( function(){
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
       $('#sell_list_due_filter_date_range').daterangepicker(
        dateRangeSettings,
        function (start, end) {
            $('#sell_list_due_filter_date_range').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
            sell_table.ajax.reload();
        }
    );
    $('#sell_list_due_filter_date_range').on('cancel.daterangepicker', function(ev, picker) {
        $('#sell_list_due_filter_date_range').val('');
        sell_table.ajax.reload();
    });
    $('#sell_list_paid_filter_date_range').daterangepicker(
        dateRangeSettings,
        function (start, end) {
            $('#sell_list_paid_filter_date_range').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
            sell_table.ajax.reload();
        }
    );
    $('#sell_list_paid_filter_date_range').on('cancel.daterangepicker', function(ev, picker) {
        $('#sell_list_paid_filter_date_range').val('');
        sell_table.ajax.reload();
    });
    
    
     
    
    sell_table = $('#sell_table').DataTable({
        processing: true,
        serverSide: true,
        aaSorting: [[0, 'desc']],
        "ajax": {
            "url": '/sells/getInstallmentsLate',
            "data": function ( d ) {
                if($('#sell_list_filter_date_range').val()) {
                    var start = $('#sell_list_filter_date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
                    var end = $('#sell_list_filter_date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
                    d.start_date = start;
                    d.end_date = end;
                }
                 if($('#sell_list_due_filter_date_range').val()) {
                var start = $('#sell_list_due_filter_date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
                    var end = $('#sell_list_due_filter_date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
                    d.due_start_date = start;
                    d.due_end_date = end;
                }

            if($('#sell_list_paid_filter_date_range').val()) {
                var start = $('#sell_list_paid_filter_date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
                    var end = $('#sell_list_paid_filter_date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
                    d.paid_start_date = start;
                    d.paid_end_date = end;
                }
                if($('#sell_list_filter_location_id').length) {
                    d.location_id = $('#sell_list_filter_location_id').val();
                }
                d.customer_id   =$('#sell_list_filter_customer_id').val();
                d.pay_status    =$('#sell_list_filter_stauts').val();
                d.fine_status   =$("#sell_list_filter_fine").val();
                

                if($('#created_by').length) {
                    d.created_by = $('#created_by').val();
                }
            }
        },
        columnDefs: [ {
            "targets": 4,
            "orderable": false,
            "searchable": false
        } ],
        columns: [
            { data: 'action', name: 'action'},
            { data: 'contact_name', name: 'contact_name'},
            { data: 'transaction_date', name: 'transaction_date'  },
            { data: 'invoice_no', name: 'invoice_no'},
            { data: 'amount', name: 'amount'},
            { data: 'fine', name: 'fine'},
            { data: 'due_at', name: 'due_at'},
            { data: 'days_late', name: 'days_late'},
            { data: 'status', name: 'status'},
            { data: 'paid_at', name: 'paid_at'},
            
        ],
        "fnDrawCallback": function (oSettings) {
            debugger;
            __currency_convert_recursively($('#purchase_table'));
            $(".footer_total_amount").html(this.api().ajax.json().total );
            $(".fine_total").html(this.api().ajax.json().fine_total );
            
        },
               
            
            
        
        
    });
    $(document).on('change', '#sell_list_filter_stauts,#sell_list_filter_location_id, #sell_list_filter_customer_id, #created_by, #sell_list_filter_stauts,#sell_list_filter_fine',  function() {
        sell_table.ajax.reload();
    });
});
</script>
	<script src="{{ asset('js/payment.js?v=' . $asset_v) }}"></script>

@endsection