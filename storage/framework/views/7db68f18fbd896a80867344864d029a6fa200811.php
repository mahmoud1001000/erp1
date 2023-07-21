<table align="center" style="border-spacing: <?php echo e($barcode_details->col_distance * 1, false); ?>cm <?php echo e($barcode_details->row_distance * 1, false); ?>cm; overflow: hidden !important;">
<?php $__currentLoopData = $page_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

	<?php if($loop->index % $barcode_details->stickers_in_one_row == 0): ?>
		<!-- create a new row -->
			<tr>
			<!-- <columns column-count="<?php echo e($barcode_details->stickers_in_one_row, false); ?>" column-gap="<?php echo e($barcode_details->col_distance*1, false); ?>"> -->
				<?php endif; ?>
				<td align="center" valign="center">
					<div style="overflow: hidden !important;display: flex; flex-wrap: wrap;align-content: center;width: <?php echo e($barcode_details->width * 1, false); ?>cm; height: <?php echo e($barcode_details->height * 1, false); ?>cm; justify-content: center;">
					  <div style="font-family: Segoe UI Semibold;">
							
							<?php if(!empty($print['business_name'])): ?>
								<b style="display: block !important; font-size: <?php echo e($print['business_name_size'], false); ?>px"><?php echo e($business_name, false); ?></b>
							<?php endif; ?>

							
							<?php if(!empty($print['name'])): ?>
								<span style="display: block !important; font-size: <?php echo e($print['name_size'], false); ?>px">
							<?php echo e($page_product->product_actual_name, false); ?>


									<?php if(!empty($print['lot_number']) && !empty($page_product->lot_number)): ?>
										<span style="font-size: <?php echo e(12*$factor, false); ?>px">
									 (<?php echo e($page_product->lot_number, false); ?>)
								</span>
									<?php endif; ?>
						</span>
							<?php endif; ?>

							
							<?php if(!empty($print['variations']) && $page_product->is_dummy != 1): ?>
								<span style="display: block !important; font-size: <?php echo e($print['variations_size'], false); ?>px">
							<?php echo e($page_product->product_variation_name, false); ?>:<b><?php echo e($page_product->variation_name, false); ?></b>
						</span>
							<?php endif; ?>

							
							<?php if(!empty($print['price'])): ?>
								<span style="font-size: <?php echo e($print['price_size'], false); ?>px;">
						<?php echo app('translator')->get('lang_v1.price'); ?>:
							<b>
						<?php if($print['price_type'] == 'inclusive'): ?>
									<?php echo e(number_format($page_product->sell_price_inc_tax, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>

								<?php else: ?>
									<?php echo e(number_format($page_product->default_sell_price, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>

								<?php endif; ?>
								<?php echo e(session('currency')['symbol'] ?? '', false); ?>	</b>
					</span>
							<?php endif; ?>
							<?php if(!empty($print['exp_date']) && !empty($page_product->exp_date)): ?>
								<br>
								<span style="font-size: <?php echo e($print['exp_date_size'], false); ?>px">
							<b><?php echo app('translator')->get('product.exp_date'); ?>:</b>
									<?php echo e($page_product->exp_date, false); ?>

						</span>
								<?php if($barcode_details->is_continuous): ?>
									<br>
								<?php endif; ?>
							<?php endif; ?>

							<?php if(!empty($print['packing_date']) && !empty($page_product->packing_date)): ?>
								<span style="font-size: <?php echo e($print['packing_date_size'], false); ?>px">
							<b><?php echo app('translator')->get('lang_v1.packing_date'); ?>:</b>
									<?php echo e($page_product->packing_date, false); ?>

						</span>
							<?php endif; ?>
							<br>

							
							<img style="max-width:90% !important;height: 30px !important; display: block;" src="data:image/png;base64,<?php echo e(DNS1D::getBarcodePNG($page_product->sub_sku, $page_product->barcode_type, 1,30, array(0, 0, 0), false), false); ?>">

							<span style="font-size: 10px !important">
						         <?php echo e($page_product->sub_sku, false); ?>

					        </span>
						</div>
					</div>
				</td>

				<?php if($loop->iteration % $barcode_details->stickers_in_one_row == 0): ?>
			        </tr>
		       <?php endif; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

<style type="text/css">

	td{
		border: 1px dotted lightgray;
	}
	@media  print{

		table{
			page-break-after: always;
		}
		@page  {
			/*size: <?php echo e($paper_width, false); ?>in <?php echo e($paper_height, false); ?>in;*/

			/*width: <?php echo e($barcode_details->paper_width, false); ?>in !important;*/
			/*height:<?php if($barcode_details->paper_height != 0): ?><?php echo e($barcode_details->paper_height, false); ?>in !important <?php else: ?> auto <?php endif; ?>;*/
			margin-top: <?php echo e($margin_top, false); ?>in !important;
			margin-bottom: <?php echo e($margin_top, false); ?>in !important;
			margin-left: <?php echo e($margin_left, false); ?>in !important;
			margin-right: <?php echo e($margin_left, false); ?>in !important;
		}
	}
</style><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/labels/partials/preview_2.blade.php ENDPATH**/ ?>