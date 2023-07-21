@php
	$subtype = '';
@endphp
@if(!empty($transaction_sub_type))
	@php
		$subtype = '?sub_type='.$transaction_sub_type;
	@endphp
@endif
<table class="table table-slim no-border">
<thead>
<tr>
	<th class="table-dark">رقم الفاتورة</th>
	<th class="table-dark">العميل</th>
	<th class="table-dark">القيمة</th>
	<th class="table-dark">خيارات</th>
</tr>
</thead>

@if(!empty($transactions))

		@foreach ($transactions as $transaction)
			<tr class="cursor-pointer"
	    		title="Customer: {{optional($transaction->contact)->name}}
		    		@if(!empty($transaction->contact->mobile) && $transaction->contact->is_default == 0)
		    			<br/>Mobile: {{$transaction->contact->mobile}}
		    		@endif
	    		" >
				<td>
					{{--{{ $loop->iteration}}.--}}
					{{ $transaction->invoice_no }}
				</td>
				<td>
					 ({{optional($transaction->contact)->name}})
					@if(!empty($transaction->table))
						- {{$transaction->table->name}}
					@endif
				</td>
				<td class="display_currency">
					{{ $transaction->final_total }}
				</td>
				<td>
					@if($transaction->status == 'final')
						@if (count($transaction->sell_lines)> 0 && $transaction->sell_lines[0]->quantity_returned > 0)
							<a
									style="padding: 0px;margin:0 15px;color:#2196f3;">
								<small class="label bg-red label-round no-print"><i class="fas fa-undo" title="إضفط هنا لتصفح المرتجع"></i> </small>	</a></a>
						@else
							<a href="/sell-return/add/{{ $transaction->id }}"   class="recent-transactions-bill-return"
							   style="padding: 0px;margin:0 15px;color:#2e6708  ;">
								<small class="label bg-green label-round no-print"><i class="fas fa-undo" title="إضفط هنا لتصفح المرتجع"></i> </small>	</a>

						@endif
					@endif
					@can('sell.update')
					<a href="{{action('SellPosController@edit', [$transaction->id]).$subtype}}">
	    				<i class="fas fa-pen text-muted" aria-hidden="true" title="{{__('lang_v1.click_to_edit')}}"></i>
	    			</a>
					@endcan

	    			<a href="{{action('SellPosController@destroy', [$transaction->id])}}" class="delete-sale" style="padding-left: 20px; padding-right: 20px"><i class="fa fa-trash text-danger" title="{{__('lang_v1.click_to_delete')}}"></i></a>

	    			<a href="{{action('SellPosController@printInvoice', [$transaction->id])}}" class="print-invoice-link">
	    				<i class="fa fa-print text-muted" aria-hidden="true" title="{{__('lang_v1.click_to_print')}}"></i>
	    			</a>
				</td>
			</tr>
		@endforeach
	</table>
@else
	<p>@lang('sale.no_recent_transactions')</p>
@endif