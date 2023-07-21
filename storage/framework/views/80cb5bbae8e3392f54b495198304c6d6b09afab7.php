
<div class="col-sm-12">
<h4><?php echo app('translator')->get('product.add_variation'); ?>:* <button type="button" class="btn btn-primary" id="add_variation" data-action="add">+</button></h4>
</div>
<div class="col-sm-12">
    <div class="table-responsive">
    <table class="table table-bordered add-product-price-table table-condensed" id="product_variation_form_part">
        <thead>
          <tr>
            <th class="col-sm-2"><?php echo app('translator')->get('lang_v1.variation'); ?></th>
            <th class="col-sm-10"><?php echo app('translator')->get('product.variation_values'); ?></th>
          </tr>
        </thead>
        <tbody>
            <?php if($action == 'add'): ?>
                <?php echo $__env->make('product.partials.product_variation_row', ['row_index' => 0], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>

                <?php $__empty_1 = true; $__currentLoopData = $product_variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php echo $__env->make('product.partials.edit_product_variation_row', ['row_index' => $action == 'edit' ? $product_variation->id : $loop->index], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php echo $__env->make('product.partials.product_variation_row', ['row_index' => 0], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>

            <?php endif; ?>
            
        </tbody>
    </table>
    </div>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/product/partials/variable_product_form_part.blade.php ENDPATH**/ ?>