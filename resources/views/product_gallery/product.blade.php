
@foreach($products as $product)
    <div class="col-md-3 col-sm-12 col-xs-12 produc-div">
        <div style="position: relative">
            <div style="position: relative;list-style-type: none">
                @if($from=='inventory')
                    <a href="/singlproduct/{{$product->id}}/{{$product->product}}" class="a-product">
                        @else
                            <a href="/products/{{$product->id}}/edit" class="a-product">
                        @endif

                   <div class="product-1">

                       <div class="product-2">
                           <div class="product-3">
                               <div class="product-4">
                                   <img src="{{$product->image_url}}" alt="Product image" class="product-image2">
                               </div>
                           </div>
                       </div>
                   </div>

                   <div class="product-footer">
                       <div class="product-name" >
                           <div class="product-name-1" >
                               <div class="product-name-2">
                                   <span class="product-name-span" dir="auto">{{$product->product}}</span>
                               </div>
                           </div>
                       </div>
                       <div class="product-price" >
                           <div class="product-name-1" >
                               <div class="product-name-2">
                                   <span class="product-price-span" dir="auto">{{number_format($product->max_price,2,'.','2')}} </span>
                               </div>
                           </div>

                       </div>
                   </div>



                </a>
            </div>

        </div>
     </div>
    @endforeach