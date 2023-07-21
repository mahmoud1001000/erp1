
   @foreach($products  as $row)
            <tr>
                <td width="70px">{{++$offset}}{{---{{$row->variation_id}}--}}</td>
                <td width="120px">{{$row->location_name}}</td>
                <td width="200px">
                      <span class="success">
                          {{$row->updated_at}}
                      </span>

                </td>
                <td width="400px">{{$row->product}}
                    @if($row->type=='variable')
                        - {{$row->var_name}}
                    @endif
                </td>
                <td width="200px">{{$row->first_name}} {{$row->last_name}}</td>
                <td width="200px">{{$row->description}} </td>

                <td width="100px">
                      <span class="success" id="current_stock_{{$row->variation_id}}">
                           {{number_format($row->curent_quantity,2,'.','')}}
                      </span>
                </td>
                <td width="100px">
                      <span class="success" id="current_stock_{{$row->variation_id}}">
                           {{number_format($row->new_quantity,2,'.','')}}
                      </span>
                </td>
                <td width="150px">
                      <span class="success" id="current_stock_{{$row->variation_id}}">
                           @format_currency($row->unit_price)
                      </span>
                </td>

                <td width="190px">
                      <span class="@if($row->total_def<0) span_success @else  success @endif">
                           @format_currency($row->total_def)
                      </span>
                </td>

            </tr>
        @endforeach


