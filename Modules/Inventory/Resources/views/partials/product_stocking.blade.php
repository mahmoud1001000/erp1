<div class="modal-dialog" role="document">
    <style>
        .flex-container {
            display: flex;
            flex-wrap: wrap;
        }
        .disabled{
            background-color: #AE0E0E!important;
            color: white;
            text-align: center;
            font-size: 17px;
            font-weight: bold;
            max-width: 115px;
        }
        .enabled{
           text-align: center;
            font-size: 17px;
            font-weight: bold;
            max-width: 115px;
        }

    </style>
    <div class="modal-content" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">@lang('inventory::lang.inventory')</h4>
        </div>
        <form id="stocking_save" action="{{action('\Modules\Inventory\Http\Controllers\InventoryController@savestocking')}}" method="POST">
            @csrf
            <input type="hidden" name="transaction_id" value="{{$transaction_id}}">
            <input type="hidden" name="location_id" value="{{$location_id}}">
            <input type="hidden" name="variation_id" value="{{$variation_id}}" id="variation_id">

            <div class="form-group ">
              {{--  <h4 class="modal-title">{{$location_name}}</h4>--}}
                <h4><strong> المنتج :
                        {{$product->pro_name}}
                        @if($product->type=='variable')
                            -{{$product->var_name}}
                        @endif

                    </strong></h4>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group " style="margin: 15px;min-width: 150px" >
                        <label >إسم المنتج : </label>
                        <input type="text" class="form-control " id="product_name"
                               value="{{$product->pro_name}}" name="product_name" >
                       </div>
                </div>

                <div class="col-xs-3">
                    <div class="form-group " style="margin: 15px;min-width: 150px">
                        <label for="formGroupExampleInput">@lang('inventory::lang.store_quantity')</label>
                        <input type="text" class="form-control disabled" id="curent_quantity"
                               value="{{@number_format($qty_available,2,'.','')}}" readonly>
                        <input type="hidden" name="curent_quantity" value="{{$qty_available}}">
                        <input type="hidden" name="product_variation_id" value="{{$product->product_variation_id}}">
                    </div>
                </div>

             @can('inventory.showprice')
                <div class="col-xs-3">
                    <div class="form-group " style="margin: 15px;min-width: 150px">
                        <label for="formGroupExampleInput">@lang('inventory::lang.purchase_price')</label>
                        <input type="text" class="form-control disabled" id="purchase_price" name="purchase_price"
                               value="{{@number_format($product->default_purchase_price,2,'.','')}}" >
                        <input type="hidden" value="{{$product->default_purchase_price}}">
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group " style="margin: 15px;min-width: 150px">
                        <label for="formGroupExampleInput">@lang('inventory::lang.selling_price')</label>

                        <input type="text" class="form-control disabled" id="selling_price" name="selling_price"
                               value="{{@number_format($product->sell_price_inc_tax,2,'.','')}}" >

                        <input type="hidden"  value="{{$product->sell_price_inc_tax}}">
                    </div>
                </div>
                @endcan
            </div>

            <div class="row">
                <div class="col-xs-3">
                    <div class="form-group " style="margin: 15px;min-width: 150px">
                        <label for="formGroupExampleInput">@lang('inventory::lang.stock_quantity')</label>
                        <input type="text" class="form-control enabled stock_quantity"  name="stock_quantity" id="stock_quantity"
                               value="{{@number_format($quantity,2,'.','')}}" >
                    </div>
                </div>

                <div class="col-xs-3">
                    <div class="form-group " style="margin: 15px;min-width: 150px">
                        <label for="formGroupExampleInput">@lang('inventory::lang.unit_price')</label>
                        <input type="text" class="form-control enabled" name="unit_price"  id="unit_price"
                               value="{{$unit_price}}" >
                    </div>
                </div>

                <div class="col-xs-3">
                    <div class="form-group " style="margin: 15px;min-width: 150px">
                        <label for="total_price">@lang('inventory::lang.total_price')</label>
                        <input type="text" class="form-control enabled" name="total_price"  id="total_price"
                               value="{{$unit_price*($quantity-$qty_available)}}" >
                    </div>
                </div>

<div class="clearfix"></div>
                <div class="col-xs-12">
                    <div class="form-group " style="margin: 15px;min-width: 150px">
                        <label for="description">@lang('inventory::lang.description')</label>
                        <textarea name="description" class='form-control'></textarea>
                    </div>
                </div>
            </div>


            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">@lang( 'messages.save' )</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>
            </div>


        </form>
    </div>
</div>