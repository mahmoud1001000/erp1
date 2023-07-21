<div class="modal-dialog modal-xl" role="document">
	<div class="modal-content">
		<div class="modal-header">
		    <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      <h4 class="modal-title" id="modalTitle"><?php echo e($product->name, false); ?></h4>
	    </div>
	    <div class="modal-body">
      		<div class="row">
      			<div class="col-md-4">
      				<div class="thumbnail">
      					<img src="<?php echo e($product->image_url, false); ?>" alt="Product image">
      					<?php if($product->type == 'single' && !empty($discounts[$product->variations->first()->id])): ?>
      						<span class="label label-warning discount-badge">- <?php echo e(number_format($discounts[$product->variations->first()->id]->discount_amount, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>%</span>
      					<?php endif; ?>
      				</div>
      			</div>
      			<div class="col-md-8">
      				<?php if($product->type == 'single' || $product->type == 'combo'): ?>
      					<div class="col-md-12">
      						<p class="lead"><?php echo app('translator')->get('lang_v1.price'); ?>: &nbsp;&nbsp;&nbsp;<span class="display_currency" data-currency_symbol="true"><?php echo e($product->variations->first()->sell_price_inc_tax, false); ?></span></p><br>
      					</div>
      				<?php endif; ?>
      				<div class="col-md-12">
	      				<table class="table no-border table-slim">
	      					<tr>
	      						<th><?php echo app('translator')->get('product.sku'); ?>:</th>
	      						<td><?php echo e($product->sku, false); ?></td>
	      					</tr>
	      					<tr>
	      						<th><?php echo app('translator')->get('product.category'); ?>:</th>
	      						<td><?php echo e($product->category->name ?? '--', false); ?></td>
	      					</tr>
	      					<tr>
	      						<th><?php echo app('translator')->get('product.sub_category'); ?>:</th>
	      						<td><?php echo e($product->sub_category->name ?? '--', false); ?></td>
	      					</tr>
	      					<tr>
	      						<th><?php echo app('translator')->get('product.brand'); ?>:</th>
	      						<td><?php echo e($product->brand->name ?? '--', false); ?></td>
	      					</tr>
	      					<?php 
	    						$custom_labels = json_decode(session('business.custom_labels'), true);
							?>
							<?php if(!empty($product->product_custom_field1)): ?>
								<tr>
	      							<th><?php echo e($custom_labels['product']['custom_field_1'] ?? __('lang_v1.product_custom_field1'), false); ?>: </th>
									<td><?php echo e($product->product_custom_field1, false); ?></td>
								</tr>
							<?php endif; ?>

							<?php if(!empty($product->product_custom_field2)): ?>
								<tr>
		      						<th><?php echo e($custom_labels['product']['custom_field_2'] ?? __('lang_v1.product_custom_field2'), false); ?>: </th>
									<td><?php echo e($product->product_custom_field2, false); ?></td>
								</tr>
							<?php endif; ?>

							<?php if(!empty($product->product_custom_field3)): ?>
								<tr>
	      							<th><?php echo e($custom_labels['product']['custom_field_3'] ?? __('lang_v1.product_custom_field3'), false); ?>: </th>
									<td><?php echo e($product->product_custom_field3, false); ?></td>
								</tr>
							<?php endif; ?>

							<?php if(!empty($product->product_custom_field4)): ?>
								<tr>
	      							<th><?php echo e($custom_labels['product']['custom_field_4'] ?? __('lang_v1.product_custom_field4'), false); ?>: </th>
									<td><?php echo e($product->product_custom_field4, false); ?></td>
								</tr>
							<?php endif; ?>
	      					<tr>
	      						<td colspan="2"><br><br><?php echo $product->product_description; ?></td>
	      					</tr>
	      				</table>
      				</div>
	      		</div>
      		</div>
      		<?php if($product->type == 'variable'): ?>
      			<?php echo $__env->make('productcatalogue::catalogue.partials.variable_product_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      		<?php elseif($product->type == 'combo'): ?>
      			<?php echo $__env->make('productcatalogue::catalogue.partials.combo_product_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      		<?php endif; ?>
      	</div>
      	<div class="modal-footer">
	      	<button type="button" class="btn btn-default no-print" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
	    </div>
	</div>
</div>
<?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/ProductCatalogue/Providers/../Resources/views/catalogue/show.blade.php ENDPATH**/ ?>