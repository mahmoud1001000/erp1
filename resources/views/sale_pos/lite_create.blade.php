@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.20/pagination/scrolling.js"></script>

@section('title', __('sale.pos_sale'))
<script>
   {
    product_id:"John",
   lastName:"Doe", 
   age:46};
</script>
<!--
            [product_id] => 421
            [name] => كونكتور شبكه 1*1
            [type] => single
            [enable_stock] => 1
            [variation_id] => 421
            [variation] => DUMMY
            [qty_available] => 257.0000
            [variation_group_price] => 0.9100
            [sub_sku] => 000513
            [unit] => ق
-->
<? //dd($result[0]) ?>
<?php
 $price_g_id=Request::segment(3);
 
  $price_groups = \App\SellingPriceGroup::where('id', $price_g_id)
                                    ->active()
                                    ->get();
if(sizeof($price_groups)>0)
    $current_price_option=$price_groups[0]->name;
else
$current_price_option='سعر البيع الافتراضي';
?>
@section('content')
<section class="content no-print">
	<input type="hidden" id="amount_rounding_method" value="{{$pos_settings['amount_rounding_method'] ?? ''}}">
	@if(!empty($pos_settings['allow_overselling']))
		<input type="hidden" id="is_overselling_allowed">
	@endif
	@if(session('business.enable_rp') == 1)
        <input type="hidden" id="reward_point_enabled">
    @endif
    @php
		$is_discount_enabled = $pos_settings['disable_discount'] != 1 ? true : false;
		$is_rp_enabled = session('business.enable_rp') == 1 ? true : false;
	@endphp
	{!! Form::open(['url' => action('SellPosController@store'), 'method' => 'post', 'id' => 'add_pos_sell_form' ]) !!}
	<div class="row mb-12">
		<div class="col-md-12">
			<div class="row">
				<div class="@if(empty($pos_settings['hide_product_suggestion'])) col-md-7 @else col-md-10 col-md-offset-1 @endif no-padding pr-12">
					<div class="box box-solid mb-12">
						<div class="box-body pb-0">
							{!! Form::hidden('location_id', $default_location->id, ['id' => 'location_id', 'data-receipt_printer_type' => !empty($default_location->receipt_printer_type) ? $default_location->receipt_printer_type : 'browser', 'data-default_accounts' => $default_location->default_payment_accounts]); !!}
							<!-- sub_type -->
							{!! Form::hidden('sub_type', isset($sub_type) ? $sub_type : null) !!}
							<input type="hidden" id="item_addition_method" value="{{$business_details->item_addition_method}}">
								@include('sale_pos.partials.pos_form')
								@include('sale_pos.partials.pos_form_totals')

								@include('sale_pos.partials.payment_modal')

								@if(empty($pos_settings['disable_suspend']))
									@include('sale_pos.partials.suspend_note_modal')
								@endif
								@if(empty($pos_settings['disable_recurring_invoice']))
									@include('sale_pos.partials.recurring_invoice_modal')
								@endif
							</div>
						</div>
					</div>
				@if(empty($pos_settings['hide_product_suggestion']) && !isMobile())
				<div class="col-md-5 no-padding">
				   
			<table id="table_id" class="display " style>
                        <thead>
                            <tr>
                                
                                <th>الاسم</th>
                                <th>SKU</th>
                                <th> {{$current_price_option}}</th>
                          
         <?php
                          if (auth()->user()->can('sales.show_purchase_price_in_pos') ) {
         
        ?>
                                <th> سعر الشراء</th>
                        <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($result as $row)
                            <?php 
                                $name='"'.$row->name.'"';
                                $unit='"'.$row->unit.'"';
                            ?>
                            <tr class="use-address">
                               
                                <td class="name">{{$row->name}}
                                                                
                                </td>
                                <td class="sku">{{$row->sub_sku}}
                                    <span style="display:none" class="product_id">{{$row->product_id}}</span>
                                    <span style="display:none" class="variation_group_price">{{$row->variation_group_price}}</span>
                                    <span style="display:none" class="type">{{$row->type}}</span>
                                    <span style="display:none" class="variation_id">{{$row->variation_id}}</span>
                                    <span style="display:none" class="enable_stock">{{$row->enable_stock}}</span>
                                    <span style="display:none" class="unit">{{$row->unit}}</span>   
                                </td><?php if($price_group_id==0) $price=$row->selling_price; else $price=$row->variation_group_price ?> 
                                <td><span  class="variation_group_price">{{ number_format($price, 2, '.', '')}}</span></td>
                              <?php
                          if (auth()->user()->can('sales.show_purchase_price_in_pos') ) {
         
        ?>
                            <td>{{$row->default_purchase_price}}</td>
                            <?php } ?>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
					
				</div>
				@endif
			</div>
		</div>
	</div>
<script>
    $(document).ready( function () {
   $('#table_id').DataTable();
  // $('#table_id').dataTable( {
    //        "pagingType": "scrolling"
      //  } );
});
</script>
<script>
    $(".use-address").click(function() {
        debugger;
    var $row = $(this).closest("tr");    // Find the row
    var name = $row.find(".name").text(); // Find the text
    var pro_id = $row.find(".product_id").text(); 
    var variation_group_price=$row.find(".variation_group_price").text();
    variation_group_price=parseFloat(variation_group_price).toFixed(2);
    var type=$row.find(".type").text();
    var variation_id=$row.find(".variation_id").text();
    var enable_stock=$row.find(".enable_stock").text();
    var unit=$row.find(".unit").text();
    var rowCount = $("#pos_table tr").length; 
     $(".total_quantity").text(rowCount);
     var to_price=parseFloat($(".price_total").text()) + parseFloat(variation_group_price)
    $(".price_total").text(parseFloat(to_price).toFixed(2));
    $("#total_payable").text($(".price_total").text());
   var add_via_ajax=true;
        //Search for variation id in each row of pos table
       
     $('#pos_table tbody')
            .find('tr')
            .each(function() {
              
                if ($(this).find('input.product_id').length > 0) {
                  
                    if ($(this).find('input.product_id').val()==pro_id){
                        add_via_ajax = false;
                      
                        //Increment product quantity
                        qty_element = $(this).find('.pos_quantity');
                        var qty = __read_number(qty_element);
                        __write_number(qty_element, qty + 1);
                        qty_element.change();
    
                        round_row_to_iraqi_dinnar($(this));
    
                        $('input#search_product')
                            .focus()
                            .select();
                    }
                }
        });
    
    if(add_via_ajax){

    var tr_content='<tr class="product_row" data-row_index="' + rowCount + '"> '+
	'<td>' + name +
		'<input type="hidden" class="enable_sr_no" value="0">'+
		'<input type="hidden" class="product_type" name="products[' + rowCount + '][product_type]" value="' + type + '">'+
		'<input type="hidden" class="product_type" name="products[' + rowCount + '][unit_price]" value="' + variation_group_price + '">'+
		'<input type="hidden" class="product_type" name="products[' + rowCount + '][item_tax]" value="' + 0 + '">'+
		'<input type="hidden" class="product_type" name="products[' + rowCount + '][item_tax]" value="">'+
	'</td>'+
	'<td>'+
		'<input type="hidden" name="products[' + rowCount + '][product_id]" class="form-control product_id" value="' + pro_id + '">' +
		'<input type="hidden" value="' + variation_id + '" name="products[' + rowCount + '][variation_id]" class="row_variation_id">' +

		'<input type="hidden" value="' + enable_stock + '" name="products[' + rowCount + '][enable_stock]">' +
		'<div class="input-group input-number">'+
			'<span class="input-group-btn"><button type="button" class="btn btn-default btn-flat quantity-down"><i class="fa fa-minus text-danger"></i></button></span>' +
		    '<input type="text" data-min="' + 1 + '" class="form-control pos_quantity input_number mousetrap input_quantity" value="' + 1 + '.00" name="products[' + rowCount + '][quantity]" data-allow-overselling="true" data-decimal="0" data-rule-abs_digit="true" data-msg-abs_digit="القيمة العشرية غير مسموح بها" data-rule-required="true" data-msg-required="This field is required">' +
		    '<span class="input-group-btn"><button type="button" class="btn btn-default btn-flat quantity-up"><i class="fa fa-plus text-success"></i></button></span>'+
		'</div>' +
		'<input type="hidden" name="products[' + rowCount + '][product_unit_id]" value="3">'+
			'<br>' +

			'<select name="products[' + rowCount + '][sub_unit_id]" class="form-control input-sm sub_unit">'+
                              
                    '<option value="3" data-multiplier="' + rowCount + '" data-unit_name="قطعة" data-allow_decimal="0">'+
                      'قطعة' +
                '</option>' +
            '</select>' +
		
		'<input type="hidden" class="base_unit_multiplier" name="products[' + rowCount + '][base_unit_multiplier]" value="' + rowCount + '">' +

		'<input type="hidden" class="hidden_base_unit_sell_price" value="' + variation_group_price + '">'+

			'</td>' +

		'<td class="hide">' +
		'<input type="text" name="products[' + rowCount + '][unit_price_inc_tax]" class="form-control pos_unit_price_inc_tax input_number" value="' + variation_group_price + '" data-rule-min-value="' + variation_group_price + '" data-msg-min-value="الحد الأدنى لسعر البيع هو 167.00">'+
	'</td>'+
	'<td class="text-center v-center">' +
				'<input type="hidden" class="form-control pos_line_total " value="' + variation_group_price + '">' +
		'<span class="display_currency pos_line_total_text " data-currency_symbol="true">' + variation_group_price + '</span>'+
	'</td>' +
	'<td class="text-center">' +
		'<i class="fa fa-times text-danger pos_remove_row cursor-pointer" aria-hidden="true"></i>' +
	'</td>' +
'</tr>';
    $('#pos_table tbody').prepend(tr_content);
    }
    
});
</script>
<script>
function send_to_pos(x){
    debugger;
    var pro_id=0;
    
    var name=0;

    
    
  //  var i =x;
    var content='<tr><td>ahmed</td><td>test</td><td>test</td></tr>';
    
    
    var tr_content='<tr class="product_row" data-row_index="1"> '+
	'<td>' + name +
		'<input type="hidden" class="enable_sr_no" value="0">'+
		'<input type="hidden" class="product_type" name="products[1][product_type]" value="' + type + '">'+
	'</td>'+
	'<td>'+
		'<input type="hidden" name="products[1][product_id]" class="form-control product_id" value="' + pro_id + '">' +
		'<input type="hidden" value="' + variation_id + '" name="products[1][variation_id]" class="row_variation_id">' +

		'<input type="hidden" value="' + enable_stock + '" name="products[1][enable_stock]">' +
		'<div class="input-group input-number">'+
			'<span class="input-group-btn"><button type="button" class="btn btn-default btn-flat quantity-down"><i class="fa fa-minus text-danger"></i></button></span>' +
		    '<input type="text" data-min="1" class="form-control pos_quantity input_number mousetrap input_quantity" value="1.00" name="products[1][quantity]" data-allow-overselling="true" data-decimal="0" data-rule-abs_digit="true" data-msg-abs_digit="القيمة العشرية غير مسموح بها" data-rule-required="true" data-msg-required="This field is required">' +
		    '<span class="input-group-btn"><button type="button" class="btn btn-default btn-flat quantity-up"><i class="fa fa-plus text-success"></i></button></span>'+
		'</div>' +
		'<input type="hidden" name="products[1][product_unit_id]" value="3">'+
			'<br>' +

			'<select name="products[1][sub_unit_id]" class="form-control input-sm sub_unit">'+
                              
                    '<option value="3" data-multiplier="1" data-unit_name="قطعة" data-allow_decimal="0">'+
                      'قطعة' +
                '</option>' +
            '</select>' +
		
		'<input type="hidden" class="base_unit_multiplier" name="products[1][base_unit_multiplier]" value="1">' +

		'<input type="hidden" class="hidden_base_unit_sell_price" value="167">'+

			'</td>' +

		'<td class="hide">' +
		'<input type="text" name="products[1][unit_price_inc_tax]" class="form-control pos_unit_price_inc_tax input_number" value="167.00" data-rule-min-value="167" data-msg-min-value="الحد الأدنى لسعر البيع هو 167.00">'+
	'</td>'+
	'<td class="text-center v-center">' +
				'<input type="hidden" class="form-control pos_line_total " value="167.00">' +
		'<span class="display_currency pos_line_total_text " data-currency_symbol="true">EGP 167.00</span>'+
	'</td>' +
	'<td class="text-center">' +
		'<i class="fa fa-times text-danger pos_remove_row cursor-pointer" aria-hidden="true"></i>' +
	'</td>' +
</tr>';
    $('#pos_table tbody').prepend(tr_content);
}

</script>

<script>
$(document).ready(function(){
   // select2 
   
    // $('#price_group').hide();
     var con={ !!$current_price_option!! };
     $('#price_group').html(con);
})
    
</script>
	@include('sale_pos.partials.pos_form_actions')
	{!! Form::close() !!}
</section>

<!-- This will be printed -->
<section class="invoice print_section" id="receipt_section">
</section>
<div class="modal fade contact_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
	@include('contact.create', ['quick_add' => true])
</div>
@if(empty($pos_settings['hide_product_suggestion']) && isMobile())
	@include('sale_pos.partials.mobile_product_suggestions')
@endif
<!-- /.content -->
<div class="modal fade register_details_modal" tabindex="-1" role="dialog" 
	aria-labelledby="gridSystemModalLabel">
</div>
<div class="modal fade close_register_modal" tabindex="-1" role="dialog" 
	aria-labelledby="gridSystemModalLabel">
</div>
<!-- quick product modal -->
<div class="modal fade quick_add_product_modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle"></div>

@include('sale_pos.partials.configure_search_modal')

@include('sale_pos.partials.recent_transactions_modal')

@include('sale_pos.partials.weighing_scale_modal')

@stop
@section('css')
	<!-- include module css -->
    @if(!empty($pos_module_data))
        @foreach($pos_module_data as $key => $value)
            @if(!empty($value['module_css_path']))
                @includeIf($value['module_css_path'])
            @endif
        @endforeach
    @endif
@stop
@section('javascript')
	<script src="{{ asset('js/pos.js?v=' . $asset_v) }}"></script>
	<script src="{{ asset('js/printer.js?v=' . $asset_v) }}"></script>
	<script src="{{ asset('js/product.js?v=' . $asset_v) }}"></script>
	<script src="{{ asset('js/opening_stock.js?v=' . $asset_v) }}"></script>
	@include('sale_pos.partials.keyboard_shortcuts')

	<!-- Call restaurant module if defined -->
    @if(in_array('tables' ,$enabled_modules) || in_array('modifiers' ,$enabled_modules) || in_array('service_staff' ,$enabled_modules))
    	<script src="{{ asset('js/restaurant.js?v=' . $asset_v) }}"></script>
    @endif
    <!-- include module js -->
    @if(!empty($pos_module_data))
	    @foreach($pos_module_data as $key => $value)
            @if(!empty($value['module_js_path']))
                @includeIf($value['module_js_path'], ['view_data' => $value['view_data']])
            @endif
	    @endforeach
	@endif
@endsection