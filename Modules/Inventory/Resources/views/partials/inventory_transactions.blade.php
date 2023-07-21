<div class="table-responsive">
    <table class="table table-bordered table-striped" id="_table">
        <thead>
        <tr>
            <th>رقم العملية</th>
            <th>بداية الجرد</th>
            <th>تاريخ الغلق</th>
            <th>الحالة</th>
            <th> الفرع</th>
            <th>@lang( 'messages.action' )</th>
        </tr>
        </thead>
        <tbody>
        @foreach($transactions  as $row)
            <tr id="{{$row->id}}">
                <td>{{$row->id}}</td>
                <td>{{date('Y-m-d', strtotime($row->transaction_date))}}</td>
                <td>
                    @if($row->status=='off')
                       {{date('Y-m-d', strtotime($row->updated_at))}}
                     @endif
                </td>
                <td><span class="label @if($row->status=='off') bg-light-red @else  bg-light-green @endif">{{$row->status}}</span></td>
                <td>{{$row->location_name}}</td>
                <td>
                    @can('inventory.stocking_products')
                        @if($row->status=='on')
                           <a href="{{action('\Modules\Inventory\Http\Controllers\InventoryController@stocking',['id'=>$row->id])}}" class="btn btn-danger ">جرد</a>
                           @else
                           <a href="{{action('\Modules\Inventory\Http\Controllers\InventoryController@stocking',['id'=>$row->id])}}" class="btn btn-danger " disabled="disabled"> جرد</a>
                        @endif
                    @endcan

                        <a href="{{action('\Modules\Inventory\Http\Controllers\StocktackingController@report',['id'=>$row->id])}}" class="btn btn-primary"><i class="fa fa-file"></i>تقرير</a>

                    @can('inventory.stocking_edit')
                        @if($row->status=='on')
                            <button type="button" class="btn btn-danger" onclick="changestatus(1,{{$row->id}})"> <i class="fa fa-lock"> </i> غلق  </button>
                        @else
                            <button type="button" class="btn btn-success" onclick="changestatus(0,{{$row->id}})"><i class="fa fa-unlock"></i>   فتح </button>
                        @endif
                    @endcan

                        @can('inventory.stocking_delete')
                            <button type="button" class="btn btn-danger" onclick="deletestock({{$row->id}})"> <i class="fa fa-trash"> </i> حذف  </button>
                        @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>