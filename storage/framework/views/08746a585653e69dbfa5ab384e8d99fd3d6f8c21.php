<div class="table-responsive">
    <table class="table table-bordered table-striped" id="_table">
        <thead>
        <tr>
            <th>رقم العملية</th>
            <th>بداية الجرد</th>
            <th>تاريخ الغلق</th>
            <th>الحالة</th>
            <th> الفرع</th>
            <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr id="<?php echo e($row->id, false); ?>">
                <td><?php echo e($row->id, false); ?></td>
                <td><?php echo e(date('Y-m-d', strtotime($row->transaction_date)), false); ?></td>
                <td>
                    <?php if($row->status=='off'): ?>
                       <?php echo e(date('Y-m-d', strtotime($row->updated_at)), false); ?>

                     <?php endif; ?>
                </td>
                <td><span class="label <?php if($row->status=='off'): ?> bg-light-red <?php else: ?>  bg-light-green <?php endif; ?>"><?php echo e($row->status, false); ?></span></td>
                <td><?php echo e($row->location_name, false); ?></td>
                <td>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('inventory.stocking_products')): ?>
                        <?php if($row->status=='on'): ?>
                           <a href="<?php echo e(action('\Modules\Inventory\Http\Controllers\InventoryController@stocking',['id'=>$row->id]), false); ?>" class="btn btn-danger ">جرد</a>
                           <?php else: ?>
                           <a href="<?php echo e(action('\Modules\Inventory\Http\Controllers\InventoryController@stocking',['id'=>$row->id]), false); ?>" class="btn btn-danger " disabled="disabled"> جرد</a>
                        <?php endif; ?>
                    <?php endif; ?>

                        <a href="<?php echo e(action('\Modules\Inventory\Http\Controllers\StocktackingController@report',['id'=>$row->id]), false); ?>" class="btn btn-primary"><i class="fa fa-file"></i>تقرير</a>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('inventory.stocking_edit')): ?>
                        <?php if($row->status=='on'): ?>
                            <button type="button" class="btn btn-danger" onclick="changestatus(1,<?php echo e($row->id, false); ?>)"> <i class="fa fa-lock"> </i> غلق  </button>
                        <?php else: ?>
                            <button type="button" class="btn btn-success" onclick="changestatus(0,<?php echo e($row->id, false); ?>)"><i class="fa fa-unlock"></i>   فتح </button>
                        <?php endif; ?>
                    <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('inventory.stocking_delete')): ?>
                            <button type="button" class="btn btn-danger" onclick="deletestock(<?php echo e($row->id, false); ?>)"> <i class="fa fa-trash"> </i> حذف  </button>
                        <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Inventory/Providers/../Resources/views/partials/inventory_transactions.blade.php ENDPATH**/ ?>