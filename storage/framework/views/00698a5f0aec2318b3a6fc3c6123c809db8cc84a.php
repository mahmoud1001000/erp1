<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><?php echo e($product->product_name, false); ?> - <?php echo e($product->sub_sku, false); ?></h4>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="form-group col-xs-6 <?php if(!auth()->user()->can('edit_product_price_from_sale_screen')): ?> hide <?php endif; ?>">
					<label><?php echo app('translator')->get('sale.unit_price_no_tax'); ?></label>
						<input type="text" name="products[<?php echo e($row_count, false); ?>][unit_price]" class="form-control pos_unit_price input_number mousetrap" value="<?php echo e(number_format(!empty($product->unit_price_before_discount) ? $product->unit_price_before_discount : $product->default_sell_price, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>">
				</div>
                <div class="form-group col-xs-6 <?php if(!auth()->user()->can('edit_product_price_from_sale_screen')): ?> hide <?php endif; ?>">
                    <label><?php echo app('translator')->get('sale.price_inc_tax'); ?></label>
                    <input type="text" name="products[<?php echo e($row_count, false); ?>][unit_price_inc_tax2]" class="form-control pos_unit_price_inc_tax input_number mousetrap" value="<?php echo e(number_format(!empty($product->unit_price_before_discount) ? $product->unit_price_before_discount : $product->sell_price_inc_tax, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>" readonly>
                </div>

				<?php if(!auth()->user()->can('edit_product_price_from_sale_screen')): ?>
					<div class="form-group col-xs-12">
						<strong><?php echo app('translator')->get('sale.unit_price'); ?>:</strong> <?php echo e(number_format(!empty($product->unit_price_before_discount) ? $product->unit_price_before_discount : $product->default_sell_price, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>

					</div>
				<?php endif; ?>
				<div class="form-group col-xs-12 col-sm-6 <?php if(!$edit_discount): ?> hide <?php endif; ?>">
					<label><?php echo app('translator')->get('sale.discount_type'); ?></label>
						<?php echo Form::select("products[$row_count][line_discount_type]", ['fixed' => __('lang_v1.fixed'), 'percentage' => __('lang_v1.percentage')], $discount_type , ['class' => 'form-control row_discount_type']); ?>

				</div>
				<div class="form-group col-xs-12 col-sm-6 <?php if(!$edit_discount): ?> hide <?php endif; ?>">
					<label><?php echo app('translator')->get('sale.discount_amount'); ?></label>
						<?php echo Form::text("products[$row_count][line_discount_amount]", number_format($discount_amount, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input_number row_discount_amount']); ?>

				</div>
				<?php if(!empty($discount)): ?>
					<div class="form-group col-xs-12">
						<p class="help-block"><?php echo __('lang_v1.applied_discount_text', ['discount_name' => $discount->name, 'starts_at' => $discount->formated_starts_at, 'ends_at' => $discount->formated_ends_at]); ?></p>
					</div>
				<?php endif; ?>
				<div class="form-group col-xs-12 ">
					<label><?php echo app('translator')->get('sale.tax'); ?></label>

					<?php echo Form::hidden("products[$row_count][item_tax]", number_format($item_tax, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'item_tax']); ?>


					<?php echo Form::select("products[$row_count][tax_id]", $tax_dropdown['tax_rates'], $tax_id, [ 'class' => 'form-control tax_id'], $tax_dropdown['attributes']); ?>

				</div>
				<?php if(!empty($warranties)): ?>
					<div class="form-group col-xs-12">
						<label><?php echo app('translator')->get('lang_v1.warranty'); ?></label>
						<?php echo Form::select("products[$row_count][warranty_id]", $warranties, $warranty_id, ['placeholder' => __('messages.please_select'), 'class' => 'form-control']); ?>

					</div>
				<?php endif; ?>
				<div class="form-group col-xs-12">
		      		<label><?php echo app('translator')->get('lang_v1.description'); ?></label>
		      		<textarea class="form-control" name="products[<?php echo e($row_count, false); ?>][sell_line_note]" rows="3"><?php echo e($sell_line_note, false); ?></textarea>
		      		<p class="help-block"><?php echo app('translator')->get('lang_v1.sell_line_description_help'); ?></p>
		      	</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get('messages.close'); ?></button>
		</div>
	</div>
</div>
<?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/sale_pos/partials/row_edit_product_price_modal.blade.php ENDPATH**/ ?>