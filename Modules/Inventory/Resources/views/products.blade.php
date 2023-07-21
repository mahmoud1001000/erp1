
             @foreach($products  as $row)
                 <tr>
                  <td width="70px">{{++$offset}}{{---{{$row->variation_id}}--}}</td>
                  <td width="400px">{{$row->product}}
                  @if($row->type=='variable')
                      - {{$row->var_name}}
                  @endif
                  </td>
                  <td width="100">{{$row->sku}}</td>
                     @can('inventory.showprice')
                  <td>
                    <div style="white-space: nowrap;">@format_currency($row->dpp_inc_tax) </div>
                     </td>
                     <td>
                         <div style="white-space: nowrap;">@format_currency($row->sell_price_inc_tax) </div>
                     </td>
                     @endcan

                  <td width="200px">
                      <span class="success" id="update_{{$row->variation_id}}">
                          {{$row->updated_at}}
                      </span>

                  </td>
                  <td width="200px">{{$row->first_name}} {{$row->last_name}}</td>

                  <td width="200px">
                      <span class="success" id="current_stock_{{$row->variation_id}}">
                           {{number_format($row->current_stock,2,'.','')}}
                      </span>
                       <input type="hidden" class="form-control" id="old_{{$row->id}}" value="{{$row->current_stock}}">
                  </td>
                  {{--<td width="130px">
                      <input type="text" class="form-control" id="new_{{$row->id}}" value="{{number_format($row->current_stock,2,'.','')}}">
                  </td>--}}
                  <td width="100px">
                      <button class="btn btn-danger" onclick="savedata({{$row->id}},{{$row->variation_id}})" ><i class="fa fa-edit"> </i>  @lang('inventory::lang.save_product_inventory')  </button>
                     {{-- <button class="btn btn-danger" onclick="deleterec({{$row->id}},{{$row->variation_id}})" ><i class="fa fa-trash"> </i> حذف  </button>--}}
                      </td>
                 </tr>
             @endforeach

