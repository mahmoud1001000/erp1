
<?php $__env->startSection('title', __('lang_v1.add_stock_transfer')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('lang_v1.add_stock_transfer'); ?></h1>
</section>

<!-- Main content -->
<section class="content no-print">
	<?php echo Form::open(['url' => action('StockTransferController@store'), 'method' => 'post', 'id' => 'stock_transfer_form' ]); ?>

	<div class="box box-solid">
		<div class="box-body">
			<div class="row">
				<div class="col-sm-4">
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
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('ref_no', __('purchase.ref_no').':'); ?>

						<?php echo Form::text('ref_no', null, ['class' => 'form-control']); ?>

					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('status', __('sale.status').':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.completed_status_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
						<?php echo Form::select('status', $statuses, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required', 'id' => 'status']); ?>

					</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-sm-6">
					<div class="form-group">
						<?php echo Form::label('location_id', __('lang_v1.location_from').':*'); ?>

						<?php echo Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required', 'id' => 'location_id']); ?>

					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<?php echo Form::label('transfer_location_id', __('lang_v1.location_to').':*'); ?>

						<?php echo Form::select('transfer_location_id', $business_locations, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required', 'id' => 'transfer_location_id']); ?>

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
							<?php echo Form::text('search_product', null, ['class' => 'form-control', 'id' => 'search_product_for_srock_adjustment', 'placeholder' => __('stock_adjustment.search_product'), 'disabled']); ?>

						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<input type="hidden" id="product_row_index" value="0">
					<input type="hidden" id="total_amount" name="final_total" value="0">
					<div class="table-responsive">
					<table class="table table-bordered table-striped table-condensed"
					id="stock_adjustment_product_table">
						<thead>
							<tr>
								<th class="col-sm-4 text-center">
									<?php echo app('translator')->get('sale.product'); ?>
								</th>
								<th class="col-sm-3 text-center">
									<?php echo app('translator')->get('sale.qty'); ?>
								</th>
								<th class="col-sm-3 text-center">
									<?php echo app('translator')->get('sale.subtotal'); ?>
								</th>
								<th class="col-sm-2 text-center">
									<i class="fa fa-times "></i></th>
							</tr>
						</thead>
						<tbody>
						</tbody>
						<tfoot>
							<tr class="text-center"><td colspan="2"></td>
								<td colspan="2">
									<div class="pull-right">
										<b><?php echo app('translator')->get('stock_adjustment.total_amount'); ?>:</b> <span id="total_adjustment">0.00</span>
									</div>
								</td>

							</tr>
						</tfoot>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div> <!--box end-->
	<div class="box box-solid">
		<div class="box-body">
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
							<?php echo Form::label('shipping_charges', __('lang_v1.shipping_charges') . ':'); ?>

							<?php echo Form::text('shipping_charges', 0, ['class' => 'form-control input_number', 'placeholder' => __('lang_v1.shipping_charges')]); ?>

					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('additional_notes',__('purchase.additional_notes')); ?>

						<?php echo Form::textarea('additional_notes', null, ['class' => 'form-control', 'rows' => 3]); ?>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<button type="submit" id="save_stock_transfer" class="btn btn-primary pull-right"><?php echo app('translator')->get('messages.save'); ?></button>
				</div>
			</div>

		</div>
	</div> <!--box end-->
	<?php echo Form::close(); ?>

</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('js/stock_transfer.js?v=' . $asset_v), false); ?>"></script>
	<script type="text/javascript">
		__page_leave_confirmation('#stock_transfer_form');
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/stock_transfer/create.blade.php ENDPATH**/ ?>