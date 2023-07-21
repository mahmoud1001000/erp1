<!-- app css -->
@if( in_array(session()->get('user.language', config('app.locale')), config('constants.langs_rtl')) )
	<link rel="stylesheet" href="{{ asset('css/rtl.css?v='.$asset_v) }}">
@endif
@if(!empty($for_pdf))
	<link rel="stylesheet" href="{{ asset('css/app.css?v='.$asset_v) }}">
@endif

<div class="col-md-12 col-sm-12 @if(!empty($for_pdf)) width-100 align-left @endif">
	<p class="text-left align-left"><strong>{{$contact->business->name}}</strong>
        	<br>
        	@if(!empty($location))
        		{!! $location->city !!}-{!! $location->state !!}
        	@else

        	@endif
        </p>
</div>

		<div class="co-md-12 col-sm-12 col-xs-12 ">
			<h4 class="mb-0 blue-heading p-4"
				style="text-align: center;font-size: 20px;padding: 10px 0px !important;">
				@lang('lang_v1.account_summary')</h4>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12 ">
			<p><strong>{{$contact->name}}</strong>
				@if(!empty($contact->address_line_1))
					<br>{{$contact->address_line_1}}
				@endif
				@if(!empty($contact->address_line_2))
					<br>{{$contact->address_line_2}}
				@endif
				@if(!empty($contact->email))
					<br>@lang('business.email'): {{$contact->email}}
				@endif
				    <br>@lang('contact.mobile'): {{$contact->mobile}}
				    @if(!empty($contact->tax_number))
					<br>@lang('contact.tax_no'): {{$contact->tax_number}}
				@endif
			</p>
			<small>@lang('lang_v1.from') {{$ledger_details['start_date']}} @lang('lang_v1.to') {{$ledger_details['end_date']}}</small>

		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<table class="table table-condensed text-right align-right  @if(empty($for_pdf)) table-pdf @endif">
				<tr>
					<td class="align-right">@lang('lang_v1.opening_balance')</td>
					<td class="align-right">@format_currency($ledger_details['beginning_balance'])</td>
				</tr>
				@if( $contact->type == 'supplier' || $contact->type == 'both')
					<tr>
						<td class="align-right">@lang('report.total_purchase')</td>
						<td class="align-right">@format_currency($ledger_details['total_purchase'])</td>
					</tr>
				@endif
				@if( $contact->type == 'customer' || $contact->type == 'both')
					<tr>
						<td class="align-right">@lang('lang_v1.total_invoice')</td>
						<td class="align-right">@format_currency($ledger_details['total_invoice'])</td>
					</tr>
				@endif
				<tr>
					<td class="align-right">@lang('sale.total_paid')</td>
					<td class="align-right">@format_currency($ledger_details['total_paid'])</td>
				</tr>
				@if($contact->balance>0)
				<tr>
					<td class="align-right">@lang('lang_v1.advance_balance')</td>
					<td class="align-right">@format_currency($contact->balance)</td>
				</tr>
				@endif
				<tr>
					<td class="align-right"><strong>@lang('lang_v1.balance_due')</strong></td>
					<td class="align-right">@format_currency($ledger_details['balance_due'])</td>
				</tr>
			</table>
		</div>


<div class="col-md-12 col-sm-12 @if(!empty($for_pdf)) width-100 @endif">
	<p class="text-center" style="text-align: center;">
		<strong>@lang('lang_v1.ledger_table_heading', ['start_date' => $ledger_details['start_date'], 'end_date' => $ledger_details['end_date']])</strong></p>
	<div class="table-responsive">
	<table class="table table-striped @if(!empty($for_pdf)) table-pdf td-border @endif" id="ledger_table">
		<thead>
			<tr class="row-border blue-heading">
				<th width="18%" class="text-center">@lang('lang_v1.date')</th>
				<th width="9%" class="text-center">@lang('purchase.ref_no')</th>
				<th width="8%" class="text-center">@lang('lang_v1.type')</th>
				@if(empty($for_pdf))
				<th width="10%" class="text-center">@lang('sale.location')</th>
				<th width="5%" class="text-center">@lang('sale.payment_status')</th>
				@endif
				{{--<th width="10%" class="text-center">@lang('sale.total')</th>--}}
				<th width="10%" class="text-center">@lang('account.debit')</th>
				<th width="10%" class="text-center">@lang('account.credit')</th>

				<th width="10%" class="text-center">@lang('lang_v1.balance')</th>

				<th width="5%" class="text-center">@lang('lang_v1.payment_method')</th>
				<th width="15%" class="text-center">@lang('report.others')</th>

			</tr>
		</thead>
		<tbody>
			@foreach($ledger_details['ledger'] as $data)
				<tr @if(!empty($for_pdf) && $loop->iteration % 2 == 0) class="odd" @endif>
					<td class="row-border">{{@format_datetime($data['date'])}}</td>
					<td>{{$data['ref_no']}}</td>
					<td>{{$data['type']}}</td>
					@if(empty($for_pdf))
					<td>{{$data['location']}}</td>
					<td>{{$data['payment_status']}}</td>
					@endif

					<td class="ws-nowrap align-right">@if($data['debit'] != '') {{@number_format($data['debit'],2,'.',',')}} @endif</td>
					<td class="ws-nowrap align-right">@if($data['credit'] != '') {{@number_format($data['credit'],2,'.',',')}} @endif</td>

					<td class="ws-nowrap align-right">{{$data['balance']}}</td>

					<td>{{$data['payment_method']}}</td>
					<td>{!! $data['others'] !!}</td>

				</tr>
			@endforeach
		</tbody>
	</table>
	</div>
</div>
