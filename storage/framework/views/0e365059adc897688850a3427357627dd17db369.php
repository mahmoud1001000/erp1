<?php $__env->startSection('title', __('lang_v1.add_opening_stock')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('lang_v1.add_opening_stock'); ?></h1>
</section>

<!-- Main content -->
<section class="content">
	<?php echo Form::open(['url' => action('OpeningStockController@save'), 'method' => 'post', 'id' => 'add_opening_stock_form' ]); ?>

	<?php echo Form::hidden('product_id', $product->id); ?>

	<?php echo $__env->make('opening_stock.form-part', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<div class="row">
		<div class="col-sm-12">
			<button type="submit" class="btn btn-primary pull-right"><?php echo app('translator')->get('messages.save'); ?></button>
		</div>
	</div>

	<?php echo Form::close(); ?>

</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('js/opening_stock.js?v=' . $asset_v), false); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/opening_stock/add.blade.php ENDPATH**/ ?>