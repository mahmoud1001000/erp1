@extends('layouts.app')
@section('title','تقرير يومية مبيعات')

@section('content')

    <!-- Content Header (Page header) -->
 <section class="content-header">
        <h1>{{ __('report.sales_representative')}}</h1>
    </section>

    <!-- Main content -->
<section class="content">
        <div class="row">
            <div class="col-md-12">
                @component('components.filters', ['title' =>'تقرير يومية مبيعات'])
                    {!! Form::open(['url' => action('ReportController@getStockReport'), 'method' => 'get', 'id' => 'sales_representative_filter_form' ]) !!}
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('sr_id2',  __('report.user') . ':') !!}
                            {!! Form::select('sr_id2', $users, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('report.all_users')]); !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('sr_business_id2',  __('business.business_location') . ':') !!}
                            {!! Form::select('sr_business_id2', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%']); !!}
                        </div>
                    </div>

                <div class="clearfix"></div>


                    <div class="col-lg-3">
                        <label>من تاريخ :</label>
                        <div class="input-group date" data-provide="datepicker">
                            <input type="text" class="form-control" id="startdate"
                                   value="{{ Carbon\Carbon::now()->toDateString()}}" readonly
                            >
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <label>إلي تاريخ :</label>
                        <div class="input-group date" data-provide="datepicker">
                            <input type="text" class="form-control " id="enddate"
                            value="{{ Carbon\Carbon::now()->toDateString()}}" readonly
                            >
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>






                    {!! Form::close() !!}
                @endcomponent
            </div>
        </div>
<div style="margin: auto" id="sellsalldiv">


</div>


@endsection

@section('javascript')
    <script src="{{ asset('js/report.js?v=' . $asset_v) }}"></script>
    <script src="{{ asset('js/payment.js?v=' . $asset_v) }}"></script>

<script>

    $(document).ready(function() {
        $('.date').datepicker({
            format: 'yyyy-mm-dd',
            /* startDate: '-3d'*/
        });
        salesRepresentativeTotalSales();

        $('select#sr_id2, select#sr_business_id2,#startdate,#enddate').change(function() {
            salesRepresentativeTotalSales()
        });


        function salesRepresentativeTotalSales() {

            var start = $('#startdate').val();
            var end = $('#enddate').val();

            var data_expense = {
                created_by: $('select#sr_id2').val(),
                location_id: $('select#sr_business_id2').val(),
                start_date: start,
                end_date: end,
            };

            $.ajax({
                method: 'GET',
                url: '/reports/getsells',
                data: data_expense,
                success: function (data) {
                       $('#sellsalldiv').html(data);
                }
            });
        }

    });

</script>
@endsection