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
            <h4 class="modal-title"><?php echo app('translator')->get( 'inventory::lang.Inventory_add' ); ?></h4>
        </div>
             <form action="<?php echo e(action('\Modules\Inventory\Http\Controllers\InventoryController@store'), false); ?>" method="POST" id="store_stock">
                <?php echo csrf_field(); ?>
                 <div class="form-group hidden" style="margin: 15px;min-width: 150px">
                     <label for="formGroupExampleInput"> تاريخ الغلق</label>
                     <input type="text" class="form-control date-picker" name="end_date"  value="" >
                 </div>

                 <div class="flex-container">
                     <div class="form-group" style="margin: 15px;min-width: 160px">
                         <label for="formGroupExampleInput2"> الفرع </label>
                         <select class="form-control" name="location_id">
                             <?php $__currentLoopData = $business_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($key, false); ?>"><?php echo e($value, false); ?></option>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                     <button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'messages.save' ); ?></button>
                     <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
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
</script><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Inventory/Providers/../Resources/views/create.blade.php ENDPATH**/ ?>