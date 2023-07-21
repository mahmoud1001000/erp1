<?php $__env->startSection('title', __('lang_v1.add_purchase_return')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
<br>
    <h1><?php echo app('translator')->get('lang_v1.add_purchase_return'); ?></h1>
</section>

<!-- Main content -->
<section class="content no-print">
	<?php echo Form::open(['url' => action('CombinedPurchaseReturnController@save'), 'method' => 'post', 'id' => 'purchase_return_form', 'files' => true ]); ?>

	<div class="box box-solid">
		<div class="box-body">
			<div class="row">
				<div class="col-sm-3">
					<div class="form-group">
						<?php echo Form::label('supplier_id', __('purchase.supplier') . ':*'); ?>

						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-user"></i>
							</span>
							<?php echo Form::select('contact_id', [], null, ['class' => 'form-control', 'placeholder' => __('messages.please_select'), 'required', 'id' => 'supplier_id']); ?>

						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<?php echo Form::label('location_id', __('purchase.business_location').':*'); ?>

						<?php echo Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required']); ?>

					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<?php echo Form::label('ref_no', __('purchase.ref_no').':'); ?>

						<?php echo Form::text('ref_no', null, ['class' => 'form-control']); ?>

					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<?php echo Form::label('transaction_date', __('messages.date') . ':*'); ?>

						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</span>
							<?php echo Form::text('transaction_date', \Carbon::createFromTimestamp(strtotime('now'))->format(session('business.date_format') . ' ' . 'H:i'), ['class' => 'form-control', 'readonly', 'required']); ?>

						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-sm-3">
	                <div class="form-group">
	                    <?php echo Form::label('document', __('purchase.attach_document') . ':'); ?>

	                    <?php echo Form::file('document', ['id' => 'upload_document', 'accept' => implode(',', array_keys(config('constants.document_upload_mimes_types')))]); ?>

	                    <p class="help-block"><?php echo app('translator')->get('purchase.max_file_size', ['size' => (config('constants.document_size_limit') / 1000000)]); ?>
	                    <?php if ($__env->exists('components.document_help_text')) echo $__env->make('components.document_help_text', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></p>
	                </div>
	            </div>
			</div>
		</div>
	</div> <!--box end-->
	<div class="box box-solid">
		<div class="box-header">
        	<h3 class="box-title"><?php echo e(__('stock_adjustment.search_products'), false); ?></h3>
       	</div>
		<div class="box-body">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-search"></i>
							</span>
							<?php echo Form::text('search_product', null, ['class' => 'form-control', 'id' => 'search_product_for_purchase_return', 'placeholder' => __('stock_adjustment.search_products'), 'disabled']); ?>

						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<input type="hidden" id="product_row_index" value="0">
					<input type="hidden" id="total_amount" name="final_total" value="0">
					<div class="table-responsive">
					<table class="table table-bordered table-striped table-condensed" 
					id="purchase_return_product_table">
						<thead>
							<tr>
								<th class="text-center">	
									<?php echo app('translator')->get('sale.product'); ?>
								</th>
								<?php if(session('business.enable_lot_number')): ?>
									<th>
										<?php echo app('translator')->get('lang_v1.lot_number'); ?>
									</th>
								<?php endif; ?>
								<?php if(session('business.enable_product_expiry')): ?>
									<th>
										<?php echo app('translator')->get('product.exp_date'); ?>
									</th>
								<?php endif; ?>
								<th class="text-center">
									<?php echo app('translator')->get('sale.qty'); ?>
								</th>
								<th class="text-center">
									<?php echo app('translator')->get('sale.unit_price'); ?>
								</th>
								<th class="text-center">
									<?php echo app('translator')->get('sale.subtotal'); ?>
								</th>
								<th class="text-center"><i class="fa fa-trash" aria-hidden="true"></i></th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-md-4">
					<div class="form-group">
						<?php echo Form::label('tax_id', __('purchase.purchase_tax') . ':'); ?>

						<select name="tax_id" id="tax_id" class="form-control select2" placeholder="'Please Select'">
							<option value="" data-tax_amount="0" data-tax_type="fixed" selected><?php echo app('translator')->get('lang_v1.none'); ?></option>
							<?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($tax->id, false); ?>" data-tax_amount="<?php echo e($tax->amount, false); ?>" data-tax_type="<?php echo e($tax->calculation_type, false); ?>"><?php echo e($tax->name, false); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
						<?php echo Form::hidden('tax_amount', 0, ['id' => 'tax_amount']); ?>

					</div>
				</div>
				<div class="col-md-8">
					<div class="pull-right"><b><?php echo app('translator')->get('stock_adjustment.total_amount'); ?>:</b> <span id="total_return">0.00</span></div>
				</div>
			</div>
		</div>
	</div> <!--box end-->
	<div class="row">
		<div class="col-md-12">
			<button type="button" id="submit_purchase_return_form" class="btn btn-primary pull-right btn-flat"><?php echo app('translator')->get('messages.submit'); ?></button>
		</div>
	</div>
	<?php echo Form::close(); ?>

</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('js/purchase_return.js?v=' . $asset_v), false); ?>"></script>
	<script type="text/javascript">
		__page_leave_confirmation('#purchase_return_form');
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/purchase_return/create.blade.php ENDPATH**/ ?>