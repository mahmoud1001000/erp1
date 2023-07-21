<div class="row">
	<div class="col-md-12">
		@if($stock_details['variation']!='()')
		  <h4>{{$stock_details['variation']}}</h4>
			@else
			<h4>@lang('lang_v1.no_data_found')</h4>
			@endif
	</div>
	<div class="col-md-4 col-xs-4">

		<table class="table table-condensed  ">
			<thead>
			<tr>
				<th><strong>@lang('lang_v1.store_quantities_in')</strong></th>
				<th><strong><i class="fa fa-plus-circle"></i> </strong></th>
			</tr>
			</thead>
     	 <tr>
			 <th>@lang('lang_v1.opening_stock')</th>
			 <td>
				 <span class="display_currency" data-is_quantity="true">{{$stock_details['total_opening_stock']}}</span> {{$stock_details['unit']}}
			 </td>
		 </tr>
			<tr>
				<th>@lang('report.total_purchase')</th>
				<td>
					<span class="display_currency" data-is_quantity="true">{{$stock_details['total_purchase']}}</span> {{$stock_details['unit']}}
				</td>
			</tr>

			<tr>
				<th>@lang('lang_v1.total_sell_return')</th>
				<td>
					<span class="display_currency" data-is_quantity="true">{{$stock_details['total_sell_return']}}</span> {{$stock_details['unit']}}
				</td>
			</tr>
			<tr>
				<th>@lang('lang_v1.stock_transfers') (@lang('lang_v1.in'))</th>
				<td>
					<span class="display_currency" data-is_quantity="true">{{$stock_details['total_purchase_transfer']}}</span> {{$stock_details['unit']}}
				</td>
			</tr>

			<tr>
				<th>@lang('lang_v1.production_purchase')</th>
				<td>
					<span class="display_currency" data-is_quantity="true">{{$stock_details['total_production_purchase']}}</span> {{$stock_details['unit']}}
				</td>
			</tr>

			<tfoot>
			<tr>
			<th>@lang('stock_adjustment.total_amount')</th>
				<th>
					<span class="display_currency" data-is_quantity="true">{{$stock_details['total_in']}}</span> {{$stock_details['unit']}}
				</th>
			</tr>
			</tfoot>
			<tr>



			</tr>

		</table>
	</div>
	<div class="col-md-4 col-xs-4">

		<table class="table table-condensed">
			<thead>
			<tr>
				<th><strong>@lang('lang_v1.store_quantities_out')</strong></th>
				<th><strong><i class="fa fa-minus-circle"></i> </strong></th>
			</tr>
			</thead>

			<tr>
				<th>@lang('lang_v1.total_sold')</th>
				<td>
					<span class="display_currency" data-is_quantity="true">{{$stock_details['total_sold']}}</span> {{$stock_details['unit']}}
				</td>
			</tr>
			<tr>
				<th>@lang('report.total_stock_adjustment')</th>
				<td>
					<span class="display_currency" data-is_quantity="true">{{$stock_details['total_adjusted']}}</span> {{$stock_details['unit']}}
				</td>
			</tr>
			<tr>
				<th>@lang('lang_v1.total_purchase_return')</th>
				<td>
					<span class="display_currency" data-is_quantity="true">{{$stock_details['total_purchase_return']}}</span> {{$stock_details['unit']}}
				</td>
			</tr>
			
			<tr>
				<th>@lang('lang_v1.stock_transfers') (@lang('lang_v1.out'))</th>
				<td>
					<span class="display_currency" data-is_quantity="true">{{$stock_details['total_sell_transfer']}}</span> {{$stock_details['unit']}}
				</td>
			</tr>

			<tr>
				<th>@lang('lang_v1.production_sell') (@lang('lang_v1.out'))</th>
				<td>
					<span class="display_currency" data-is_quantity="true">{{$stock_details['production_sell']}}</span> {{$stock_details['unit']}}
				</td>
			</tr>

			<tfoot>
			<tr>
				<th>@lang('stock_adjustment.total_amount')</th>
				<th>
					<span class="display_currency" data-is_quantity="true">{{$stock_details['total_out']}}</span> {{$stock_details['unit']}}
				</th>

			</tr>
			</tfoot>
		</table>
	</div>

	<div class="col-md-4 col-xs-4">

		<table class="table table-condensed">
			<thead>
				<th> <strong>@lang('lang_v1.totals')</strong></th>
		    	<th></th>
			</thead>
			<tr>
				<th><i class="fa fa-check"></i>@lang('report.current_stock') </th>
				<td>
					<span class="display_currency" data-is_quantity="true">{{$stock_details['total_in']-$stock_details['total_out']}}</span> {{$stock_details['unit']}}
				</td>
			</tr>

			<tr>
				<th>@lang('report.current_stock')</th>
				<td>
					<span class="display_currency" data-is_quantity="true">{{$stock_details['current_stock']}}</span> {{$stock_details['unit']}}
				</td>
			</tr>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<hr>
		<table class="table " id="stock_history_table">
			<thead>
			<tr>
				<th>@lang('lang_v1.type')</th>
				<th>@lang('lang_v1.quantity_change')</th>
				<th>@lang('lang_v1.new_quantity')</th>
				<th>@lang('lang_v1.date')</th>
				<th>@lang('purchase.ref_no')</th>
			</tr>
			</thead>
			<tbody>
			@forelse($stock_history as $history)
				<tr>
					<td>{{$history['type_label']}}</td>
					<td>@if($history['quantity_change'] > 0 ) +<span class="display_currency" data-is_quantity="true">{{$history['quantity_change']}}</span> @else <span class="display_currency" data-is_quantity="true">{{$history['quantity_change']}}</span> @endif</td>
					<td><span class="display_currency" data-is_quantity="true">{{$history['stock']}}</span></td>
					<td>{{@format_datetime($history['date'])}}</td>
					<td>{{$history['ref_no']}}</td>
				</tr>
			@empty
				<tr><td colspan="5" class="text-center">
					@lang('lang_v1.no_stock_history_found')
				</td></tr>
			@endforelse
			</tbody>
		</table>
	</div>
</div>