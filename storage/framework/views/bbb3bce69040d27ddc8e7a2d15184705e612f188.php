<?php $__empty_1 = true; $__currentLoopData = $template->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

    <?php echo $__env->make('product.partials.variation_value_row', ['variation_index' => $row_index, 'value_index' => $loop->index, 'variation_name' => $value->name, 'variation_value_id' => $value->id,  'profit_percent' => $profit_percent], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

    <?php echo $__env->make('product.partials.variation_value_row', ['variation_index' => $row_index, 'value_index' => 0, 'profit_percent' => $profit_percent], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endif; ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/product/partials/product_variation_template.blade.php ENDPATH**/ ?>