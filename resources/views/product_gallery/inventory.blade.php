@extends('product_gallery.layouts.app')
@section('title')

    <style>
        .mheader{
            width: 100%;
           /* height: 300px;*/
            background-image: url("/uploads/business_header/slider_1.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }
    </style>

@section('content')
    <!-- Main content -->
<div class="mheader" >

</div>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @component('components.filters', ['title' => __('report.filters')])
                        <div class="col-md-3" id="location_filter">
                            <div class="form-group">
                                {!! Form::label('location_id',  __('purchase.business_location') . ':') !!}
                                {!! Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%']); !!}
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
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('brand_id', __('product.brand') . ':') !!}
                                {!! Form::select('brand_id', $brands, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_brand_id', 'placeholder' => __('lang_v1.all')]); !!}
                            </div>
                        </div>
                        <div class="col-md-3"  >
                            <div class="form-group">
                                <label>@lang('lang_v1.search')</label>
                                <div style="height: 37px">
                                    <input type="text" name="productname" id="productname" class="form-control" style="width: 80%;float: left;height: 100% ">
                                    <button type="button" class="btn-search" style="height:100%"><i class="fa fa-search" ></i></button>
                                </div>
                            </div>
                        </div>





                    @endcomponent
                </div>
            </div>
        </div>



        <input type="hidden" id="rem" name="rem" value="true" >
        <input type="hidden" id="offset" name="offset" value="0" >
        <div class="main-prduct container" id="products">


          </div>

        <div class="loader hidden" id="loader"></div>

        <div style="justify-content: center;display: flex;">
            <button class="btn btn-success" style="background-color:#26252b;" onclick="getproducts()" id="morebtn">المزيد</button>
        </div>

    </section>
    <!-- /.content -->

@endsection

@section('javascript')
    <script src="{{ asset('js/product.js?v=' . $asset_v) }}"></script>

    {{--  <script src="{{ asset('js/report.js?v=' . $asset_v) }}"></script>--}}
    <script type="text/javascript">
        $(document).ready( function(){
            getproducts();

            $(document).on('change', '#product_list_filter_image,#product_list_filter_current_stock,#product_list_filter_current_stock,#product_list_filter_type, #product_list_filter_category_id, #product_list_filter_brand_id, #product_list_filter_unit_id, #product_list_filter_tax_id, #location_id, #active_state, #repair_model_id',
                function() {
                    $('#offset').val(0);
                    $('#morebtn').html('المزيد');
                    var products=document.getElementById("products");
                    products.innerHTML='';
                  getproducts();

                });


        });

        $(document).on('keyup','#productname',function (e) {
           if(e.keyCode==32 )
                return;
            $('#offset').val(0);
            $('#rem').val('true')
            $('#morebtn').html('المزيد');
            var products=document.getElementById("products");
            products.innerHTML='';
            getproducts();

        });

        function getproducts() {
            var offset=$('#offset').val()*1;
            var rem=$('#rem').val();
            if(rem==='false') {
                $('#morebtn').html('finshed');
                return;
            }

            $('#loader').removeClass('hidden');
            $('#offset').val(offset+12);
            $.ajax({
                url: "/product/slug",
                type: 'GET',
                data: {
                         type: $('#product_list_filter_type').val(),
                         category_id : $('#product_list_filter_category_id').val(),
                         brand_id : $('#product_list_filter_brand_id').val(),
                         unit_id : $('#product_list_filter_unit_id').val(),
                         location_id : $('#location_id').val(),
                         offset:offset,
                         productname:$('#productname').val()
                },
                success: function (data) {
                    var products=document.getElementById("products");
                     products.innerHTML +=data['product'];
                     if(data['count']<12){
                         $('#morebtn').html('finshed');
                         $('#rem').val('false');
                     }


                }

            });
            $('#loader').addClass('hidden');

        }
    </script>

@endsection