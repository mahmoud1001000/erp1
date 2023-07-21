<div class="modal-dialog" role="document">
    <style>
        .flex-container {
            display: flex;
            flex-wrap: wrap;
        }
    </style>
    <div class="modal-content" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">@lang( 'inventory::lang.Inventory_add' )</h4>
        </div>
             <form action="{{action('\Modules\Inventory\Http\Controllers\InventoryController@store')}}" method="POST" id="store_stock">
                @csrf
                 <div class="form-group hidden" style="margin: 15px;min-width: 150px">
                     <label for="formGroupExampleInput"> تاريخ الغلق</label>
                     <input type="text" class="form-control date-picker" name="end_date"  value="" >
                 </div>

                 <div class="flex-container">
                     <div class="form-group" style="margin: 15px;min-width: 160px">
                         <label for="formGroupExampleInput2"> الفرع </label>
                         <select class="form-control" name="location_id">
                             @foreach($business_locations as $key=>$value)
                                 <option value="{{$key}}">{{$value}}</option>
                             @endforeach
                         </select>
                     </div>

                     <div class="form-group " style="margin: 15px;min-width: 150px">
                         <label for="formGroupExampleInput"> تاريخ البدء</label>
                         <input type="text" class="form-control date-picker" name="start_date"  required value="" >
                     </div>
                     <div class="form-group hidden" style="margin: 15px;min-width: 150px">
                         <label for="formGroupExampleInput2"> الحالة</label>
                         <select class="form-control" name="status">
                             <option value="on">فتح </option>
                             <option value="off">غلق</option>
                         </select>
                     </div>

                 </div>


                <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">@lang( 'messages.save' )</button>
                     <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>
                 </div>


            </form>
    </div>
</div>
<script>
    $('.date-picker').datepicker({
        autoclose: true,
    /*    endDate: 'today',*/
        format:'yyyy-m-d',
    });
</script>