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
                      <div class="col-md-4 col-sm-12 col-xs-12 produc-div">
                            <div style="position: relative">
                                <div style="position: relative;list-style-type: none">
                              <div class="product-1">

                                                        <div class="product-2">
                                                            <div class="product-3">
                                                                <div class="product-4">
                                                                    <img src="{{$product->image_url}}" alt="Product image" class="product-image2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                              </div>

                            </div>
                        </div>
                      <div class="col-md-8 col-sm-12 col-xs-12">
                          <div class="product-name">
                              {{$product->name}}
                          </div>
                          <div class="product-description">
                           <p>  <?php
                               echo $product->product_description;
                               ?></p>
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
            $('#morebtn').html('المزيد');
            var products=document.getElementById("products");
            products.innerHTML='';
            getproducts();

        });

        function getproducts() {
            var offset=$('#offset').val()*1;
            var total=$('#total').val()*1;
            var rem=total-offset;
            if(rem<12)
                $('#morebtn').html('finshed');
            if(rem<0)
                return;


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