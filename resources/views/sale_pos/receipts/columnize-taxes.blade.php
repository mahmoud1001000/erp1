<!-- business information here -->
@php
	$totals = ['taxable_value' => 0];
@endphp
<div class="row">

	<!-- Logo -->
	@if(!empty($receipt_details->logo))
		<img style="max-height: 120px; width: auto;" src="{{$receipt_details->logo}}" class="img img-responsive center-block">
	@endif

<!-- Header text -->
	@if(!empty($receipt_details->header_text))
		<div class="col-xs-12">
			{!! $receipt_details->header_text !!}
		</div>
@endif

<!-- business information here -->
	<div class="col-xs-12 text-center">
		<h2 class="text-center">
			<!-- Shop & Location Name  -->
			@if(!empty($receipt_details->display_name))
				{{$receipt_details->display_name}}
			@endif
		</h2>

		<!-- Address -->
		<p>
			@if(!empty($receipt_details->address))
				<small class="text-center">
					{!! $receipt_details->address !!}
				</small>
			@endif
			@if(!empty($receipt_details->contact))
				<br/>{!! $receipt_details->contact !!}
			@endif
			{{--@if(!empty($receipt_details->contact) && !empty($receipt_details->website))
                ,
            @endif
            @if(!empty($receipt_details->website))
                {{ $receipt_details->website }}
            @endif--}}

			@if(!empty($receipt_details->location_custom_fields))
				<br>{{ $receipt_details->location_custom_fields }}
			@endif
		</p>
		<p>
			@if(!empty($receipt_details->sub_heading_line1))
				{{ $receipt_details->sub_heading_line1 }}
			@endif
			@if(!empty($receipt_details->sub_heading_line2))
				<br>{{ $receipt_details->sub_heading_line2 }}
			@endif
			@if(!empty($receipt_details->sub_heading_line3))
				<br>{{ $receipt_details->sub_heading_line3 }}
			@endif
			@if(!empty($receipt_details->sub_heading_line4))
				<br>{{ $receipt_details->sub_heading_line4 }}
			@endif
			@if(!empty($receipt_details->sub_heading_line5))
				<br>{{ $receipt_details->sub_heading_line5 }}
			@endif
		</p>
		<p>
			@if(!empty($receipt_details->tax_info1))
				<b>{{ $receipt_details->tax_label1 }}</b> {{ $receipt_details->tax_info1 }}
			@endif

			@if(!empty($receipt_details->tax_info2))
				<b>{{ $receipt_details->tax_label2 }}</b> {{ $receipt_details->tax_info2 }}
			@endif
		</p>

		<!-- Title of receipt -->
		@if(!empty($receipt_details->invoice_heading))
			<h3 class="text-center">
				{!! $receipt_details->invoice_heading !!}
			</h3>
	@endif

	<!-- Invoice  number, Date  -->
		<p style="width: 100% !important" class="word-wrap">
			<span class="pull-left text-left word-wrap">
				@if(!empty($receipt_details->invoice_no_prefix))
					<b>{!! $receipt_details->invoice_no_prefix !!}</b>
				@endif
				{{$receipt_details->invoice_no}}

				@if(!empty($receipt_details->types_of_service))
					<br/>
					<span class="pull-left text-left">
						<strong>{!! $receipt_details->types_of_service_label !!}:</strong>
					{{$receipt_details->types_of_service}}
					<!-- Waiter info -->
						@if(!empty($receipt_details->types_of_service_custom_fields))
							@foreach($receipt_details->types_of_service_custom_fields as $key => $value)
								<br><strong>{{$key}}: </strong> {{$value}}
							@endforeach
						@endif
					</span>
				@endif

			<!-- Table information-->
				@if(!empty($receipt_details->table_label) || !empty($receipt_details->table))
					<br/>
					<span class="pull-left text-left">
						@if(!empty($receipt_details->table_label))
							<b>{!! $receipt_details->table_label !!}</b>
					@endif
					{{$receipt_details->table}}

					<!-- Waiter info -->
					</span>
				@endif

			<!-- customer info -->
				@if(!empty($receipt_details->customer_info))
					<br/>
					<b>{{ $receipt_details->customer_label }}</b> <br> {!! $receipt_details->customer_info !!} <br>
				@endif
				@if(!empty($receipt_details->client_id_label))
					<br/>
					<b>{{ $receipt_details->client_id_label }}</b> {{ $receipt_details->client_id }}
				@endif
				@if(!empty($receipt_details->customer_tax_label))
					<br/>
					<b>{{ $receipt_details->customer_tax_label }}</b> {{ $receipt_details->customer_tax_number }}
				@endif
				@if(!empty($receipt_details->customer_custom_fields))
					<br/>{!! $receipt_details->customer_custom_fields !!}
				@endif
				@if(!empty($receipt_details->sales_person_label))
					<br/>
					<b>{{ $receipt_details->sales_person_label }}</b> {{ $receipt_details->sales_person }}
				@endif
				@if(!empty($receipt_details->commission_agent_label))
					<br/>
					<strong>{{ $receipt_details->commission_agent_label }}</strong> {{ $receipt_details->commission_agent }}
				@endif
				@if(!empty($receipt_details->customer_rp_label))
					<br/>
					<strong>{{ $receipt_details->customer_rp_label }}</strong> {{ $receipt_details->customer_total_rp }}
				@endif
			</span>

			<span class="pull-right text-left">
				<b>{{$receipt_details->date_label}}</b> {{$receipt_details->invoice_date}}

				@if(!empty($receipt_details->due_date_label))
					<br><b>{{$receipt_details->due_date_label}}</b> {{$receipt_details->due_date ?? ''}}
				@endif

				@if(!empty($receipt_details->brand_label) || !empty($receipt_details->repair_brand))
					<br>
					@if(!empty($receipt_details->brand_label))
						<b>{!! $receipt_details->brand_label !!}</b>
					@endif
					{{$receipt_details->repair_brand}}
				@endif


				@if(!empty($receipt_details->device_label) || !empty($receipt_details->repair_device))
					<br>
					@if(!empty($receipt_details->device_label))
						<b>{!! $receipt_details->device_label !!}</b>
					@endif
					{{$receipt_details->repair_device}}
				@endif

				@if(!empty($receipt_details->model_no_label) || !empty($receipt_details->repair_model_no))
					<br>
					@if(!empty($receipt_details->model_no_label))
						<b>{!! $receipt_details->model_no_label !!}</b>
					@endif
					{{$receipt_details->repair_model_no}}
				@endif

				@if(!empty($receipt_details->serial_no_label) || !empty($receipt_details->repair_serial_no))
					<br>
					@if(!empty($receipt_details->serial_no_label))
						<b>{!! $receipt_details->serial_no_label !!}</b>
					@endif
					{{$receipt_details->repair_serial_no}}<br>
				@endif
				@if(!empty($receipt_details->repair_status_label) || !empty($receipt_details->repair_status))
					@if(!empty($receipt_details->repair_status_label))
						<b>{!! $receipt_details->repair_status_label !!}</b>
					@endif
					{{$receipt_details->repair_status}}<br>
				@endif

				@if(!empty($receipt_details->repair_warranty_label) || !empty($receipt_details->repair_warranty))
					@if(!empty($receipt_details->repair_warranty_label))
						<b>{!! $receipt_details->repair_warranty_label !!}</b>
					@endif
					{{$receipt_details->repair_warranty}}
					<br>
				@endif

			<!-- Waiter info -->
				@if(!empty($receipt_details->service_staff_label) || !empty($receipt_details->service_staff))
					<br/>
					@if(!empty($receipt_details->service_staff_label))
						<b>{!! $receipt_details->service_staff_label !!}</b>
					@endif
					{{$receipt_details->service_staff}}
				@endif
				@if(!empty($receipt_details->shipping_custom_field_1_label))
					<br><strong>{!!$receipt_details->shipping_custom_field_1_label!!} :</strong> {!!$receipt_details->shipping_custom_field_1_value ?? ''!!}
				@endif

				@if(!empty($receipt_details->shipping_custom_field_2_label))
					<br><strong>{!!$receipt_details->shipping_custom_field_2_label!!}:</strong> {!!$receipt_details->shipping_custom_field_2_value ?? ''!!}
				@endif

				@if(!empty($receipt_details->shipping_custom_field_3_label))
					<br><strong>{!!$receipt_details->shipping_custom_field_3_label!!}:</strong> {!!$receipt_details->shipping_custom_field_3_value ?? ''!!}
				@endif

				@if(!empty($receipt_details->shipping_custom_field_4_label))
					<br><strong>{!!$receipt_details->shipping_custom_field_4_label!!}:</strong> {!!$receipt_details->shipping_custom_field_4_value ?? ''!!}
				@endif

				@if(!empty($receipt_details->shipping_custom_field_5_label))
					<br><strong>{!!$receipt_details->shipping_custom_field_2_label!!}:</strong> {!!$receipt_details->shipping_custom_field_5_value ?? ''!!}
				@endif
				{{-- sale order --}}
				@if(!empty($receipt_details->sale_orders_invoice_no))
					<br>
					<strong>@lang('restaurant.order_no'):</strong> {!!$receipt_details->sale_orders_invoice_no ?? ''!!}
				@endif

				@if(!empty($receipt_details->sale_orders_invoice_date))
					<br>
					<strong>@lang('lang_v1.order_dates'):</strong> {!!$receipt_details->sale_orders_invoice_date ?? ''!!}
				@endif
			</span>
		</p>
	</div>
</div>

<div class="row">
	@includeIf('sale_pos.receipts.partial.common_repair_invoice')
</div>

<div class="row">
	<div class="col-xs-12">
		<br/>
		@php
			$p_width = 40;
		@endphp
		@if(!empty($receipt_details->item_discount_label))
			@php
				$p_width -= 15;
			@endphp
		@endif

		{{--Table of products--}}
		<div class="row color-555">
			<div class="col-xs-12">
				<br/>
				<table class="table table-bordered table-no-top-cell-border table-slim">
					<thead>
					<tr style="background-color: #357ca5 !important; color: white !important; font-size: 15px !important font-weight: bold;" class="table-no-side-cell-border table-no-top-cell-border text-center">
						<td style="background-color: #357ca5 !important; color: white !important;"></td>

						<td style="background-color: #357ca5 !important; color: white !important;" class="text-left" width="30%">
							{!! $receipt_details->table_product_label !!}
						</td>

						@if($receipt_details->show_cat_code == 1)
							<td style="background-color: #357ca5 !important; color: white !important;" class="text-right">{!! $receipt_details->cat_code_label !!}</td>
						@endif

						<td style="background-color: #357ca5 !important; color: white !important;" class="text-right">
							{!! $receipt_details->table_qty_label !!}
						</td>
						<td style="background-color: #357ca5 !important; color: white !important;" class="text-right">
							{!! $receipt_details->table_unit_price_label !!} <span class="small color-white"> ({{$receipt_details->currency['symbol']}})</span>
						</td>
					<!-- <td style="background-color: #357ca5 !important; color: white !important;">
                                {!! $receipt_details->line_discount_label !!}
							</td> -->
						<td style="background-color: #357ca5 !important; color: white !important;" class="text-right">
							الإجمالي <span class="small color-white"> ({{$receipt_details->currency['symbol']}})</span>
						</td>

						@if(!empty($receipt_details->table_tax_headings))
							@foreach($receipt_details->table_tax_headings as $tax_heading)
								<td style="background-color: #357ca5 !important; color: white !important;" class="word-wrap text-right">
									{{$tax_heading}} <span class="small color-white"> ({{$receipt_details->currency['symbol']}})</span>
								</td>

								@php
									$totals[$tax_heading] = 0;
								@endphp
							@endforeach

						@endif

						<td style="background-color: #357ca5 !important; color: white !important;" class="text-right">
							{!! $receipt_details->table_subtotal_label !!}  <span class="small color-white"> ({{$receipt_details->currency['symbol']}})</span>
						</td>
					</tr>
					</thead>
					<tbody>
					@foreach($receipt_details->lines as $line)
						<tr>
							<td class="text-center">
								{{$loop->iteration}}
							</td>
							<td class="text-left" style="word-break: break-all;">
								@if(!empty($line['image']))
									<img src="{{$line['image']}}" alt="Image" width="50" style="float: left; margin-right: 8px;">
								@endif
								{{$line['name']}} {{$line['product_variation']}} {{$line['variation']}}
								@if(!empty($line['sub_sku'])), {{$line['sub_sku']}} @endif @if(!empty($line['brand'])), {{$line['brand']}} @endif
								@if(!empty($line['sell_line_note']))
									<br>
									<small class="text-muted">
										{{$line['sell_line_note']}}
									</small>
								@endif
								@if(!empty($line['lot_number']))<br> {{$line['lot_number_label']}}:  {{$line['lot_number']}} @endif
								@if(!empty($line['product_expiry'])), {{$line['product_expiry_label']}}:  {{$line['product_expiry']}} @endif

								@if(!empty($line['warranty_name'])) <br><small>{{$line['warranty_name']}} </small>@endif @if(!empty($line['warranty_exp_date'])) <small>- {{@format_date($line['warranty_exp_date'])}} </small>@endif
								@if(!empty($line['warranty_description'])) <small> {{$line['warranty_description'] ?? ''}}</small>@endif
							</td>

							@if($receipt_details->show_cat_code == 1)
								<td class="text-right">
									@if(!empty($line['cat_code']))
										{{$line['cat_code']}}
									@endif
								</td>
							@endif

							<td class="text-right">
								{{$line['quantity']}} {{$line['units']}}
							</td>
							<td class="text-right">
								{{$line['unit_price_before_discount']}}
							</td>
						<!-- <td class="text-right">
                                {{$line['line_discount']}}
								</td> -->
							<td class="text-right">
							<span class="display_currency" data-currency_symbol="false">
								{{$line['price_exc_tax']}}
							</span>

								@php
									$totals['taxable_value'] += $line['price_exc_tax'];
								@endphp
							</td>

							@if(!empty($receipt_details->table_tax_headings))

								@foreach($receipt_details->table_tax_headings as $tax_heading)
									<td class="text-right word-wrap">
										@if(!empty($line['group_tax_details']))

											@foreach($line['group_tax_details'] as $tax_detail)
												@if(strpos($tax_detail['name'], $tax_heading) !== FALSE)

													@php
														$totals[$tax_heading] += $tax_detail['calculated_tax'];
													@endphp

													<span class="display_currency" data-currency_symbol="false">
										{{$tax_detail['calculated_tax']}}
										</span>
													<br/>
													<span class="small">
											{{$tax_detail['amount']}}%
										</span>
												@endif
											@endforeach

										@else
											@if(strpos($line['tax_name'], $tax_heading) !== FALSE)

												@php
													$totals[$tax_heading] += ($line['tax_unformatted'] * $line['quantity_uf']);
												@endphp

												<span class="display_currency" data-currency_symbol="false">
									{{$line['tax_unformatted'] * $line['quantity_uf']}}
									</span>
												<br/>
												<span class="small">
										{{$line['tax_percent']}}%
									</span>
											@endif
										@endif
									</td>
							@endforeach

						@endif

						<!-- @if(!empty($line->group_tax_details))

							@foreach($line->group_tax_details as $tax_detail)
								<td class="text-right">
{{$line['line_discount']}}
										</td>
@endforeach

						@endif -->

							<td class="text-right">
								{{$line['line_total']}}
							</td>
						</tr>
						{{-- @if(!empty($line['modifiers']))
                        @foreach($line['modifiers'] as $modifier)
                        <tr>
                            <td class="text-center">
                                &nbsp;
                            </td>
                            <td>
                                {{$modifier['name']}} {{$modifier['variation']}}
                                @if(!empty($modifier['sub_sku'])), {{$modifier['sub_sku']}} @endif
                                @if(!empty($modifier['sell_line_note']))({{$modifier['sell_line_note']}}) @endif
                            </td>

                            @if($receipt_details->show_cat_code == 1)
                            <td>
                                @if(!empty($modifier['cat_code']))
                                {{$modifier['cat_code']}}
                                @endif
                            </td>
                            @endif

                            <td class="text-right">
                                {{$modifier['quantity']}} {{$modifier['units']}}
                            </td>
                            <td class="text-right">
                                &nbsp;
                            </td>
                            <td class="text-center">
                                &nbsp;
                            </td>
                            <td class="text-center">
                                &nbsp;
                            </td>
                            <td class="text-center">
                                {{$modifier['unit_price_exc_tax']}}
                            </td>
                            <td class="text-right">
                                {{$modifier['line_total']}}
                            </td>
                        </tr>
                        @endforeach
                        @endif --}}
					@endforeach

					@php
						$lines = count($receipt_details->lines);
					@endphp

					@for ($i = $lines; $i < 5; $i++)
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<!-- <td>&nbsp;</td> -->

							@if(!empty($receipt_details->table_tax_headings))
								@foreach($receipt_details->table_tax_headings as $tax_heading)
									<td>&nbsp;</td>
								@endforeach
							@endif

							@if($receipt_details->show_cat_code == 1)
								<td>&nbsp;</td>
							@endif
						</tr>
					@endfor
					<tr>
						@php
							$colspan = 4;
						@endphp
						@if($receipt_details->show_cat_code == 1)
							@php
								$colspan = 5;
							@endphp
						@endif

						<th colspan="{{$colspan}}" class="text-right"
							style="background-color: #d2d6de !important;">
							Total
						</th>
						<th class="text-right" style="background-color: #d2d6de !important;">
						<span class="display_currency" data-currency_symbol="false">
							{{$totals['taxable_value']}}
						</span>
						</th>

						<!-- <td>&nbsp;</td> -->

						@if(!empty($receipt_details->table_tax_headings))
							@foreach($receipt_details->table_tax_headings as $tax_heading)
								<th class="text-right" style="background-color: #d2d6de !important;">
							<span class="display_currency" data-currency_symbol="false">
							{{$totals[$tax_heading]}}
							</span>
								</th>
							@endforeach
						@endif

						<th class="text-right" style="background-color: #d2d6de !important;">
						<span class="display_currency" data-currency_symbol="false">
							{{$receipt_details->subtotal_unformatted +$totals[$tax_heading] }}
						</span>
						</th>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12"><hr/></div>
	<div class="col-xs-6">

		<table class="table table-slim">
			@if(!empty($receipt_details->payments))
				@foreach($receipt_details->payments as $payment)
					<tr>
						<td>{{$payment['method']}}</td>
						<td class="text-right" >{{$payment['amount']}}</td>
						<td class="text-right">{{$payment['date']}}</td>
					</tr>
				@endforeach
			@endif

		<!-- Total Paid-->
			@if(!empty($receipt_details->total_paid_label))
				<tr>
					<th>
						{!! $receipt_details->total_paid_label !!}
					</th>
					<td class="text-right">
						{{$receipt_details->total_paid}}
					</td>
				</tr>
			@endif

		<!-- Total Due-->
			@if(!empty($receipt_details->total_due_label))
				<tr>
					<th>
						{!! $receipt_details->total_due_label !!}
					</th>
					<td class="text-right">
						{{$receipt_details->total_due}}
					</td>
				</tr>
			@endif

			@if(!empty($receipt_details->all_due))
				<tr>
					<th>
						{!! $receipt_details->all_bal_label !!}
					</th>
					<td class="text-right">
						{{$receipt_details->all_due}}
					</td>
				</tr>
			@endif
		</table>
	</div>

	<div class="col-xs-6">
		<div class="table-responsive">
			<table class="table table-slim">
				<tbody>
				@if(!empty($receipt_details->total_quantity_label))
					<tr class="color-555">
						<th >
							{!! $receipt_details->total_quantity_label !!}
						</th>
						<td class="text-right">
							{{$receipt_details->total_quantity}}
						</td>
					</tr>
				@endif
				<tr>
					<th >
						{!! $receipt_details->subtotal_label !!}
					</th>
					<td class="text-right">
						{{$receipt_details->subtotal}}
					</td>
				</tr>
				@if(!empty($receipt_details->total_exempt_uf))
					<tr>
						<th>
							@lang('lang_v1.exempt')
						</th>
						<td class="text-right">
							{{$receipt_details->total_exempt}}
						</td>
					</tr>
				@endif
				<!-- Shipping Charges -->
				@if(!empty($receipt_details->shipping_charges))
					<tr>
						<th >
							{!! $receipt_details->shipping_charges_label !!}
						</th>
						<td class="text-right">
							{{$receipt_details->shipping_charges}}
						</td>
					</tr>
				@endif

				@if(!empty($receipt_details->packing_charge))
					<tr>
						<th >
							{!! $receipt_details->packing_charge_label !!}
						</th>
						<td class="text-right">
							{{$receipt_details->packing_charge}}
						</td>
					</tr>
				@endif

				<!-- Discount -->
				@if( !empty($receipt_details->discount)  )
					<tr>
						<th>
							{!! $receipt_details->discount_label !!}
						</th>

						<td class="text-right">
							(-) {{$receipt_details->total_discount}}
						</td>
					</tr>
				@endif

				<!-- Tax -->
				@if( !empty($receipt_details->tax_label) )
					<tr>
						<th >
							{!! $receipt_details->tax_label !!}
						</th>
						<td class="text-right">
							(+) {{$receipt_details->tax}}
						</td>
					</tr>
				@endif

				@if( !empty($receipt_details->reward_point_label)  )
					<tr>
						<th>
							{!! $receipt_details->reward_point_label !!}
						</th>

						<td class="text-right">
							(-) {{$receipt_details->reward_point_amount}}
						</td>
					</tr>
				@endif

				@if( !empty($receipt_details->transaction_add) )
					<tr>
						<th>
							{!! $receipt_details->transaction_add !!}
						</th>

						<td class="text-right">
							{{$receipt_details->transaction_add_value}}
						</td>
					</tr>

					{{--<tr>
                        <th>
                            صافي قيمة المستخلص الحالي
                        </th>

                        <td class="text-right">
                            {{ $receipt_details->transaction_add_total}}
                        </td>
                    </tr>--}}


				@endif




				@if( $receipt_details->round_off_amount > 0)
					<tr>
						<th>
							{!! $receipt_details->round_off_label !!}
						</th>
						<td class="text-right">
							{{$receipt_details->round_off}}
						</td>
					</tr>
				@endif

				<!-- Total -->
				<tr>
					<th>
						{!! $receipt_details->total_label !!}
					</th>
					<td class="text-right">
						{{$receipt_details->transaction_add_total}}
						@if(!empty($receipt_details->total_in_words))
							<br>
							<small>({{$receipt_details->total_in_words}})</small>
						@endif
					</td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-xs-12">
		<p>{!! nl2br($receipt_details->additional_notes) !!}</p>
	</div>


</div>

@if($receipt_details->show_barcode )
	<div class="@if(!empty($receipt_details->footer_text)) col-xs-4 @else col-xs-12 @endif text-center">
		@if($receipt_details->show_barcode)
			{{-- Barcode --}}
			<img class="center-block" src="data:image/png;base64,{{DNS1D::getBarcodePNG($receipt_details->invoice_no, 'C128', 2,30,array(39, 48, 54), true)}}">
		@endif

	</div>
@endif

@include('sale_pos.partials.qr_code')
<br>
<div class="row">
	@if(!empty($receipt_details->footer_text))
		<div class="col-xs-12 ">
			{!! $receipt_details->footer_text !!}
		</div>
	@endif

</div>
