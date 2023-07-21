<div class="table-responsive" style="background-color: white">
    <?php
    $total_plus=0;
    $total_minus=0;
    ?>
    <table class="table table-bordered table-striped"  style="width:100%;margin: auto" >
        <thead>
        <tr>
            <th>م </th>
            <th> المنتج</th>
            <th> الكود</th>
            <th> تاريخ الجرد</th>
            <th> المستخدم</th>
            <th> الرصيد </th>
            <th>رصيد الجرد</th>
            <th>تكلفة الوحدة</th>
            <th>الإجمالي</th>
        </tr>
        </thead>
        <tbody id="datatablebody">
        @foreach($products  as $row)
            <?php
            if($row->total_def>0)
                $total_plus=$total_plus+$row->total_def;
            else
                $total_minus= $total_minus+(-1*$row->total_def);
            ?>
            <tr>
                <td width="70px">{{$loop->iteration}}{{---{{$row->variation_id}}--}}</td>
                <td width="400px">{{$row->product}}
                    @if($row->type=='variable')
                        - {{$row->var_name}}
                    @endif
                </td>
                <td width="100">{{$row->sku}}</td>
                <td width="200px">
                      <span class="success" id="update_{{$row->variation_id}}">
                          {{$row->updated_at}}
                      </span>

                </td>
                <td width="200px">{{$row->first_name}} {{$row->last_name}}</td>

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
        <tfoot>
        <tr>
            <th colspan="5">الإجمالي</th>
            <th colspan="2">الزيادة :
                <span>@format_currency($total_plus)</span></th>
            <th colspan="6">العجز :
                <span > @format_currency($total_minus)</span>
            </th>


        </tr>
        </tfoot>

        </tbody>
    </table>
</div>
