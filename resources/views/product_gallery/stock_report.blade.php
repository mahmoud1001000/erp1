@extends('layouts.app')
@section('title', __('sale.products'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>@lang('sale.products')
            <small>@lang('lang_v1.manage_products')</small>
        </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @component('components.filters', ['title' => __('report.filters')])
                    <div class="col-md-3" id="location_filter">
                        <div class="form-group">
                            {!! Form::label('location_id',  __('purchase.business_location') . ':') !!}
                            {!! Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('type', __('product.product_type') . ':') !!}
                            {!! Form::select('type', ['single' => __('lang_v1.single'), 'variable' => __('lang_v1.variable'), 'combo' => __('lang_v1.combo')], null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_type', 'placeholder' => __('lang_v1.all')]); !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('category_id', __('product.category') . ':') !!}
                            {!! Form::select('category_id', $categories, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_category_id', 'placeholder' => __('lang_v1.all')]); !!}
                        </div>
                    </div>
                    <div class="col-md-3 " style="display: none " >
                        <div class="form-group">
                            {!! Form::label('unit_id', __('product.unit') . ':') !!}
                            {!! Form::select('unit_id', $units, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_unit_id', 'placeholder' => __('lang_v1.all')]); !!}
                        </div>
                    </div>
                    <div class="col-md-3" style="display: none " >
                        <div class="form-group">
                            {!! Form::label('tax_id', __('product.tax') . ':') !!}
                            {!! Form::select('tax_id', $taxes, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_tax_id', 'placeholder' => __('lang_v1.all')]); !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('brand_id', __('product.brand') . ':') !!}
                            {!! Form::select('brand_id', $brands, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_brand_id', 'placeholder' => __('lang_v1.all')]); !!}
                        </div>
                    </div>

                    <div class="col-md-3"  >
                        <div class="form-group">
                            {!! Form::label('pricegroup', __('lang_v1.selling_price_group') . ':') !!}
                            {!! Form::select('pricegroup', $price_groups, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'pricegroup']); !!}
                        </div>
                    </div>

                    <div class="col-md-3" style="display: none " >
                        <br>
                        <div class="form-group">
                            {!! Form::select('active_state', ['active' => __('business.is_active'), 'inactive' => __('lang_v1.inactive')], null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'active_state', 'placeholder' => __('lang_v1.all')]); !!}
                        </div>
                    </div>
                    <div class="col-md-3" style="display: none " >
                        <div class="form-group">
                            {!! Form::label('image', __('lang_v1.image') . ':') !!}
                            {!! Form::select('type', ['default' => 'بدون صورة', 'image' => __('lang_v1.image')], null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_image', 'placeholder' => __('lang_v1.all')]); !!}
                        </div>
                    </div>
                    <div class="col-md-3" style="display: none " >
                        <div class="form-group">
                            {!! Form::label('image',__('report.current_stock'). ':') !!}
                            {!! Form::select('current_stock', ['zero' =>'Zero', 'gtzero' => 'اكبر من الصفر','lszero' => 'اقل من الصفر'], null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_current_stock', 'placeholder' => __('lang_v1.all')]); !!}
                        </div>
                    </div>

                    <!-- include module filter -->
                   {{-- @if(!empty($pos_module_data))
                        @foreach($pos_module_data as $key => $value)
                            @if(!empty($value['view_path']))
                                @includeIf($value['view_path'], ['view_data' => $value['view_data']])
                            @endif
                        @endforeach
                    @endif--}}

                    <div class="col-md-3" style="display: none " >
                        <div class="form-group">
                            <br>
                            <label>
                                {!! Form::checkbox('not_for_selling', 1, false, ['class' => 'input-icheck', 'id' => 'not_for_selling']); !!} <strong>@lang('lang_v1.not_for_selling')</strong>
                            </label>
                        </div>
                    </div>
                    @if($is_woocommerce)
                        <div class="col-md-3" style="display: none " >
                            <div class="form-group">
                                <br>
                                <label>
                                    {!! Form::checkbox('woocommerce_enabled', 1, false,
                                    [ 'class' => 'input-icheck', 'id' => 'woocommerce_enabled']); !!} {{ __('lang_v1.woocommerce_enabled') }}
                                </label>
                            </div>
                        </div>
                    @endif

                    <div class="col-md-3"  >
                        <div class="form-group">
                            <label>@lang('lang_v1.search')</label>
                            <div>
                                <input type="text" name="productname" id="productname" class="form-control" style="width: 80%;float: left; ">
                                <button type="button" class="btn-search"><i class="fa fa-search" ></i></button>
                            </div>
                        </div>
                    </div>




                   {{-- <div class="col-md-12">
                        <div class="mt-15">
                            @can('product.create')
                                <a class="btn btn-primary  " href="{{action('ProductController@create')}}">
                                    <i class="fa fa-plus"></i> @lang('product.add_new_product')</a>
                            @endcan
                        </div>
                    </div>--}}
                @endcomponent
            </div>
        </div>


        <input type="hidden" id="rem" name="rem" value="true" >
        <input type="hidden" id="offset" name="offset" value="0" >
        <div class="main-prduct container" id="products">


        </div>

        <div class="loader " id="loader"></div>





    </section>
    <!-- /.content -->

@endsection

@section('javascript')
    <script src="{{ asset('js/product.js?v=' . $asset_v) }}"></script>
    <script src="{{ asset('js/opening_stock.js?v=' . $asset_v) }}"></script>

    {{--  <script src="{{ asset('js/report.js?v=' . $asset_v) }}"></script>--}}

    <script>
        $(document).ready( function() {
            getproducts();
        });

        $('#pricegroup,#location_id ,#product_list_filter_type,#product_list_filter_category_id,#product_list_filter_brand_id').change(function () {
            getproducts();
        });

        $('#productname').keyup(function () {
            getproducts();
        });

        function getproducts() {
             $.ajax({
                url: "/gallery/stock_report",
                type: 'GET',
                data: {
                    type: $('#product_list_filter_type').val(),
                    category_id : $('#product_list_filter_category_id').val(),
                    brand_id : $('#product_list_filter_brand_id').val(),
                    unit_id : $('#product_list_filter_unit_id').val(),
                    tax_id : $('#product_list_filter_tax_id').val(),
                    active_state : $('#active_state').val(),
                    not_for_selling : $('#not_for_selling').is(':checked'),
                    location_id : $('#location_id').val(),
                    current_stock:$("#product_list_filter_current_stock").val(),
                    image_type:$("#product_list_filter_image").val(),
                    productname:$('#productname').val(),
                    pricegroup:$('#pricegroup').val()
                },
                success: function (data) {
                    var products=document.getElementById("products");
                    products.innerHTML =data['product'];


                }
            });

            $('#loader').addClass('hidden');


        }
    </script>

@endsection