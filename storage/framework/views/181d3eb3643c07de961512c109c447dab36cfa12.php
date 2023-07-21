<?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <?php
        $row_index = $loop->index + $index;
    ?>
    <tr>
        <td>
            <?php echo e($product->product_name, false); ?>


            <?php if($product->variation_name != "DUMMY"): ?>
                <b><?php echo e($product->variation_name, false); ?></b>
            <?php endif; ?>
            <input type="hidden" name="products[<?php echo e($loop->index + $index, false); ?>][product_id]" value="<?php echo e($product->product_id, false); ?>">
            <input type="hidden" name="products[<?php echo e($loop->index + $index, false); ?>][variation_id]" value="<?php echo e($product->variation_id, false); ?>">
        </td>
        <td>
            <input type="number" class="form-control" min=1
            name="products[<?php echo e($loop->index + $index, false); ?>][quantity]" value="<?php if(isset($product->quantity)): ?><?php echo e($product->quantity, false); ?><?php else: ?><?php echo e(1, false); ?><?php endif; ?>">
        </td>
        <?php if(request()->session()->get('business.enable_lot_number') == 1): ?>
            <td>
                <input type="text" class="form-control"
                name="products[<?php echo e($loop->index + $index, false); ?>][lot_number]" value="<?php if(isset($product->lot_number)): ?><?php echo e($product->lot_number, false); ?><?php endif; ?>">
            </td>
        <?php endif; ?>
        <?php if(request()->session()->get('business.enable_product_expiry') == 1): ?>
            <td>
                <input type="text" class="form-control label-date-picker"
                name="products[<?php echo e($loop->index + $index, false); ?>][exp_date]" value="<?php if(isset($product->exp_date)): ?><?php echo e(\Carbon::createFromTimestamp(strtotime($product->exp_date))->format(session('business.date_format')), false); ?><?php endif; ?>">
            </td>
        <?php endif; ?>
        <td>
            <input type="text" class="form-control label-date-picker"
            name="products[<?php echo e($loop->index + $index, false); ?>][packing_date]" value="">
        </td>
        <td>
            <?php echo Form::select('products[' . $row_index . '][price_group_id]', $price_groups, null, ['class' => 'form-control', 'placeholder' => __('lang_v1.none')]); ?>

        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

<?php endif; ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/labels/partials/show_table_rows.blade.php ENDPATH**/ ?>