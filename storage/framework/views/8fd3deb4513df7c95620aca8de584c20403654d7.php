<?php $__env->startSection('title', __('lang_v1.add_selling_price_group_prices')); ?>

<?php $__env->startSection('content'); ?>

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?php echo app('translator')->get('lang_v1.add_selling_price_group_prices'); ?></h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<?php echo Form::open(['url' => action('ProductController@saveSellingPrices'), 'method' => 'post', 'id' => 'selling_price_form' ]); ?>

		<?php echo Form::hidden('product_id', $product->id); ?>

		<div class="row">
			<div class="col-xs-12">
				<div class="box box-solid">
					<div class="box-header">
						<h3 class="box-title"><?php echo app('translator')->get('sale.product'); ?>: <?php echo e($product->name, false); ?> (<?php echo e($product->sku, false); ?>)</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-xs-12 col-md-4">
								<div class="table-responsive">
									<h3><?php echo app('translator')->get('lang_v1.default_selling_price_inc_tax'); ?></h3>
									<table class="table table-condensed table-bordered  text-center table-striped">
										<thead>
										<tr>
											<?php if($product->type == 'variable'): ?>
												<th>
													<?php echo app('translator')->get('lang_v1.variation'); ?>
												</th>
											<?php endif; ?>
											<th><?php echo app('translator')->get('lang_v1.default_selling_price_inc_tax'); ?></th>
										</tr>
										</thead>
										<tbody>
										<?php $__currentLoopData = $product->variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<?php if($product->type == 'variable'): ?>
													<td>
														<?php echo e($variation->product_variation->name, false); ?> - <?php echo e($variation->name, false); ?> (<?php echo e($variation->sub_sku, false); ?>)
													</td>
												<?php endif; ?>
												<td><span class="display_currency" data-currency_symbol="true"><?php echo e($variation->sell_price_inc_tax, false); ?></span></td>

											</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</tbody>
									</table>
								</div>
							</div>


							<?php $__currentLoopData = $price_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<div class="col-xs-12 col-md-4">
								<div class="table-responsive">
									<h3><?php echo app('translator')->get('lang_v1.price_group'); ?> :   <?php echo e($price_group->name, false); ?></h3>
									<table class="table table-condensed table-bordered  text-center table-striped">
										<thead>
										<tr>
											<?php if($product->type == 'variable'): ?>
												<th>
													<?php echo app('translator')->get('lang_v1.variation'); ?>
												</th>
											<?php endif; ?>
											<th><?php echo app('translator')->get('lang_v1.price'); ?></th>
										 </tr>
										</thead>
										<tbody>
										<?php $__currentLoopData = $product->variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<?php if($product->type == 'variable'): ?>
													<td>
														<?php echo e($variation->product_variation->name, false); ?> - <?php echo e($variation->name, false); ?> (<?php echo e($variation->sub_sku, false); ?>)
													</td>
												<?php endif; ?>
													<td>
														<?php echo Form::text('group_prices[' . $price_group->id . '][' . $variation->id . ']', !empty($variation_prices[$variation->id][$price_group->id]) ? number_format($variation_prices[$variation->id][$price_group->id], config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']) : 0, ['class' => 'form-control input_number input-sm'] ); ?>

													</td>
											</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</tbody>
									</table>
            					</div>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<?php echo Form::hidden('submit_type', 'save', ['id' => 'submit_type']); ?>

				<div class="text-center">
					<div class="btn-group">
						<button id="opening_stock_button" <?php if($product->enable_stock == 0): ?> disabled <?php endif; ?> type="submit" value="submit_n_add_opening_stock" class="btn bg-purple submit_form"><?php echo app('translator')->get('lang_v1.save_n_add_opening_stock'); ?></button>
						<button type="submit" value="save_n_add_another" class="btn bg-maroon submit_form"><?php echo app('translator')->get('lang_v1.save_n_add_another'); ?></button>
						<button type="submit" value="submit" class="btn btn-primary submit_form"><?php echo app('translator')->get('messages.save'); ?></button>
					</div>
				</div>
			</div>
		</div>

		<?php echo Form::close(); ?>

	</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
	<script type="text/javascript">
        $(document).ready(function(){
            $('button.submit_form').click( function(e){
                e.preventDefault();
                $('input#submit_type').val($(this).attr('value'));

                if($("form#selling_price_form").valid()) {
                    $("form#selling_price_form").submit();
                }
            });
        });
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/product/add-selling-prices.blade.php ENDPATH**/ ?>