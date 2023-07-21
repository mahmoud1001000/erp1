@php
 $second_currency_id = request()->session()->get('business.second_currency_id');;
 $currency=\DB::table('currencies')->where('id',$second_currency_id)->first();
@endphp
<div class="table-responsive">
    <table class="table table-bordered " id="stock_report_table">

        <thead>
        <tr>
            <th>SKU</th>
            <th>@lang('business.product')</th>
            <th>@lang('sale.location')</th>
            <th>@lang('sale.unit_price')</th>
            <th>@lang('report.current_stock')</th>
            @can('view_product_stock_value')
                <th class="stock_price">@lang('lang_v1.total_stock_price') <br><small>(@lang('lang_v1.by_purchase_price'))</small></th>
                <th class="">سعر الشراء بالعملة المحلية <span>{{$currency->code ?? ''}}</span></th>
                <th>@lang('lang_v1.total_stock_price') <br><small>(@lang('lang_v1.by_sale_price'))</small></th>
                <th>سعر البيع بالعملة المحلية <br><small>(@lang('lang_v1.by_sale_price'))</small></th>
                <th>@lang('lang_v1.potential_profit')</th>
            @endcan
            <th>@lang('report.total_unit_sold')</th>
            <th>@lang('lang_v1.total_unit_transfered')</th>
            <th>@lang('lang_v1.total_unit_adjusted')</th>
            @if($show_manufacturing_data)
                <th class="current_stock_mfg">@lang('manufacturing::lang.current_stock_mfg') @show_tooltip(__('manufacturing::lang.mfg_stock_tooltip'))</th>
            @endif
        </tr>
        </thead>
        <tfoot>
        <tr class="bg-gray font-17 text-center footer-total">
            <td colspan="4"><strong>@lang('sale.total'):</strong></td>
            <td id="footer_total_stock"></td>
            @can('view_product_stock_value')
                <td id="footer_total_stock_price"></td>
                <td id="footer_total_stock_price_curr"></td>
                <td id="footer_stock_value_by_sale_price"></td>
                <td id="footer_stock_value_by_sale_price_curr"></td>
                <td id="footer_potential_profit"></td>
            @endcan
            <td id="footer_total_sold"></td>
            <td id="footer_total_transfered"></td>
            <td id="footer_total_adjusted"></td>
            @if($show_manufacturing_data)
                <td id="footer_total_mfg_stock"></td>
            @endif
        </tr>
        </tfoot>
    </table>
</div>

