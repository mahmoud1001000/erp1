<?php $__env->startSection('title', __('lang_v1.product_stock_history')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('lang_v1.product_stock_history'); ?></h1>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-12">
    <?php $__env->startComponent('components.widget', ['title' => $product->name]); ?>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('location_id',  __('purchase.business_location') . ':'); ?>

                <?php echo Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%']); ?>

            </div>
        </div>


        <?php if($product->type == 'variable'): ?>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="variation_id"><?php echo app('translator')->get('product.variations'); ?>:</label>
                    <select class="select2 form-control" name="variation_id" id="variation_id">
                        <?php $__currentLoopData = $product->variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($variation->id, false); ?>"><?php echo e($variation->product_variation->name, false); ?> - <?php echo e($variation->name, false); ?> (<?php echo e($variation->sub_sku, false); ?>)</option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        <?php else: ?>
            <input type="hidden" id="variation_id" name="variation_id" value="<?php echo e($product->variations->first()->id, false); ?>">
        <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('components.widget'); ?>
        <div id="product_stock_history" style="display: none;"></div>
    <?php echo $__env->renderComponent(); ?>
    </div>
</div>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

   <script type="text/javascript">
        $(document).ready( function(){

            load_stock_history($('#variation_id').val(), $('#location_id').val());
        });

       function load_stock_history(variation_id, location_id) {
            $('#product_stock_history').fadeOut();
            $.ajax({
                url: '/products/stock-history/' + variation_id + "?location_id=" + location_id,
                dataType: 'html',
                success: function(result) {
                    $('#product_stock_history')
                        .html(result)
                        .fadeIn();

                    __currency_convert_recursively($('#product_stock_history'));

                    $('#stock_history_table').DataTable({
                        searching: false,
                        ordering: false
                    });
                },
            });
       }

       $(document).on('change', '#variation_id, #location_id', function(){
            load_stock_history($('#variation_id').val(), $('#location_id').val());
       });
   </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/product/stock_history.blade.php ENDPATH**/ ?>