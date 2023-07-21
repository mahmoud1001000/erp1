@extends('layouts.app')
@section('title', __('lang_v1.items_report'))

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>تقرير حركة صنف </h1>
</section>


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            @component('components.filters', ['title' => __('report.filters')])

           <div class="col-md-3">
                <div class="form-group">
                {!! Form::label('search_product', __('lang_v1.search_product') . ':') !!}
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-search"></i>
                        </span>
                        <input type="hidden" value="" id="variation_id">
                        {!! Form::text('search_product', null, ['class' => 'form-control', 'id' => 'search_product', 'placeholder' => __('lang_v1.search_product_placeholder'), 'autofocus']); !!}
                    </div>
                </div>
            </div>
           <!---
            <div class="col-md-3">
                <div class="form-group">
                    المنتج
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <
                        <select id="variation_id" class="form-control " name="product_id">
                        <option></option>
                            @foreach($products as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>-->
            <script>
            $("#product_id").change(function(){
               get_product_trans();
            });
           
            $('#search_product').on('select2:select', function(e) {
                get_product_trans();
                
            });

                function get_product_trans(){
                    debugger;
                    
                }
            </script>
            
     <!--       
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('ir_purchase_date_filter', __('purchase.purchase_date') . ':') !!}
                    {!! Form::text('ir_purchase_date_filter', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'readonly']); !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('ir_customer_id', __('contact.customer') . ':') !!}
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        {!! Form::select('ir_customer_id', $customers, null, ['class' => 'form-control select2', 'placeholder' => __('lang_v1.all')]); !!}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('ir_sale_date_filter', __('lang_v1.sell_date') . ':') !!}
                    {!! Form::text('ir_sale_date_filter', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'readonly']); !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('ir_location_id', __('purchase.business_location').':') !!}
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-map-marker"></i>
                        </span>
                        {!! Form::select('ir_location_id', $business_locations, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required']); !!}
                    </div>
                </div>
            </div>
            @if(Module::has('Manufacturing'))
                <div class="col-md-3">
                    <div class="form-group">
                        <br>
                        <div class="checkbox">
                            <label>
                              {!! Form::checkbox('only_mfg', 1, false, 
                              [ 'class' => 'input-icheck', 'id' => 'only_mfg_products']); !!} {{ __('manufacturing::lang.only_mfg_products') }}
                            </label>
                        </div>
                    </div>
                </div>
            @endif
            @endcomponent
        </div>
    </div
    -->
    <div class="row">
        <div class="col-md-12">
            @component('components.widget', ['class' => 'box-primary'])
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" 
                    id="items_report_tablee">
                        <thead>
                            <tr>
                                <th>تاريخ العملية</th>
                                <th> نوع العملية</th>
                                <th> رقم العملية </th>
                                <th> جهة الاتصال  </th>
                                <th>عدد الداخل </th>
                                <th>عدد الخارج</th>
                                <th>الرصيد بعد العملية </th>
                                
                            </tr>
                        </thead>
                       <tbody>
                           
                       </tbody>
                    </table>
                </div>
            @endcomponent
        </div>
    </div>
</section>
<!-- /.content -->
<div class="modal fade view_register" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>
<div class="modal fade view_modal modal-dialog" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>
@endsection

@section('javascript')
    <script src="{{ asset('js/report.js?v=' . $asset_v) }}">
    
    </script>
    <script type="text/javascript">
    $(document).on('shown.bs.modal', '.view_modal', function(e) {
        initAutocomplete();
    });
</script>
<script>
    if ($('#search_product').length > 0) {
        $('#search_product').autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: '/purchases/get_products?check_enable_stock=false',
                    dataType: 'json',
                    data: {
                        term: request.term,
                    },
                    success: function(data) {
                        response(
                            $.map(data, function(v, i) {
                                if (v.variation_id) {
                                    return { label: v.text, value: v.variation_id };
                                }
                                return false;
                            })
                        );
                    },
                });
            },
            minLength: 2,
            select: function(event, ui) {
                $('#variation_id')
                    .val(ui.item.value)
                    .change();
                event.preventDefault();
                $(this).val(ui.item.label);
            },
            focus: function(event, ui) {
                event.preventDefault();
                $(this).val(ui.item.label);
            },
        });
    }

</script>
<script>
                 $("#variation_id").change(function(){
                    var id=$("#variation_id").val();
                     $.ajax({
                    type:'GET',
                    url:'/reports/get_product_trans',
                    data:{
                        '_token' :$('meta[name="_token"]').attr('content'),
                        'variation_id':$("#variation_id").val(),
                    },
                    success:function(data) {
                    $("#items_report_tablee tbody").html(data);
                        }
                    });
                });
            </script>
@endsection