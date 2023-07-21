@extends('layouts.app')
@section('title', "مقارنة المخازن")

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>مقارنة الفروع</h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            @component('components.filters', ['title' => __('report.filters')])
              {!! Form::open(['url' => action('ReportController@compare_locations'), 'method' => 'get', 'id' => 'stock_report_filter_form' ]) !!}
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('location_id',  __('purchase.business_location') . ':') !!}
                        {!! Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%','id'=>'location1']); !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('location_id2',  __('purchase.business_location') . '2:') !!}
                        {!! Form::select('location_id2', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%','id'=>'location2']); !!}
                    </div>
                </div>
                {!! Form::close() !!}
            @endcomponent
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script>
      $(document).ready(function(){
          debugger;
          $("#location1").val(1);
          $("#location2").val(1);
      })
  </script>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
    <table class="table table-bordered table-striped" id="stock_report_table_compare">
        <thead>
            <tr>
                <th>SKU</th>
                <th>@lang('business.product')</th>
              
                <th>@lang('sale.unit_price')</th>
                <th>@lang('purchase.business_location')</th>
                <th>@lang('purchase.business_location')2</th>
            </tr>
        </thead>
        <tfoot>
            <!--
            <tr class="bg-gray font-17 text-center footer-total">
                <td colspan="4"><strong>@lang('sale.total'):</strong></td>
                <td id="footer_total_stock"></td>
                @can('view_product_stock_value')
                <td><span id="footer_total_stock_price" class="display_currency" data-currency_symbol="true"></span></td>
                <td><span id="footer_stock_value_by_sale_price" class="display_currency" data-currency_symbol="true"></span></td>
                <td><span id="footer_potential_profit" class="display_currency" data-currency_symbol="true"></span></td>
                @endcan
                <td id="footer_total_sold"></td>
                <td id="footer_total_transfered"></td>
                <td id="footer_total_adjusted"></td>
                @if($show_manufacturing_data)
                    <td id="footer_total_mfg_stock"></td>
                @endif
            </tr>
            -->
        </tfoot>
    </table>
</div>
        </div>
    </div>
</section>
<!-- /.content -->

@endsection

@section('javascript')
    <script src="{{ asset('js/report.js?v=' . $asset_v) }}"></script>
@endsection