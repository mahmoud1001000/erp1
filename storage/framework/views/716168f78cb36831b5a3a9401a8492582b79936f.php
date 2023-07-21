<div class="modal fade" id="configure_search_modal" tabindex="-1" role="dialog" 
	aria-labelledby="gridSystemModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">
					<?php echo app('translator')->get('lang_v1.search_products_by'); ?>
				</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="checkbox">
							<label>
				              	<?php echo Form::checkbox('search_fields[]', 'name', true, ['class' => 'input-icheck search_fields']); ?> <?php echo app('translator')->get('product.product_name'); ?>
				            </label>
						</div>
					</div>
					<div class="col-md-12">
						<div class="checkbox">
							<label>
				              	<?php echo Form::checkbox('search_fields[]', 'sku', true, ['class' => 'input-icheck search_fields']); ?> <?php echo app('translator')->get('product.sku'); ?>
				            </label>
						</div>
					</div>
					<?php if(request()->session()->get('business.enable_lot_number') == 1): ?>
					<div class="col-md-12">
						<div class="checkbox">
							<label>
				              	<?php echo Form::checkbox('search_fields[]', 'lot', true, ['class' => 'input-icheck search_fields']); ?> <?php echo app('translator')->get('lang_v1.lot_number'); ?>
				            </label>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="modal-footer">
			    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get('messages.close'); ?></button>
			</div>
		</div>
	</div>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/sale_pos/partials/configure_search_modal.blade.php ENDPATH**/ ?>