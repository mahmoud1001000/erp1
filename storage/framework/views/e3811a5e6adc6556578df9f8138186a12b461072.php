<!-- Edit Order tax Modal -->
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title"><?php echo app('translator')->get('lang_v1.suspended_sales'); ?></h4>
		</div>
		<div class="modal-body">
			<div class="row">
				<?php
					$c = 0;
					$subtype = '';
				?>
				<?php if(!empty($transaction_sub_type)): ?>
					<?php
						$subtype = '?sub_type='.$transaction_sub_type;
					?>
				<?php endif; ?>
				<?php $__empty_1 = true; $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					<?php if($sale->is_suspend): ?>
						<div class="col-xs-6 col-sm-3">
							<div class="small-box bg-yellow">
								<div class="inner text-center">
									<?php if(!empty($sale->additional_notes)): ?>
										<p><i class="fa fa-edit"></i> <?php echo e($sale->additional_notes, false); ?></p>
									<?php endif; ?>
									<p><?php echo e($sale->invoice_no, false); ?><br>
										<?php echo e(\Carbon::createFromTimestamp(strtotime($sale->transaction_date))->format(session('business.date_format')), false); ?><br>
										<strong><i class="fa fa-user"></i> <?php echo e($sale->name, false); ?></strong></p>
									<p><i class="fa fa-cubes"></i><?php echo app('translator')->get('lang_v1.total_items'); ?>: <?php echo e(count($sale->sell_lines), false); ?><br>
										<i class="fas fa-money-bill-alt"></i> <?php echo app('translator')->get('sale.total'); ?>: <span class="display_currency" data-currency_symbol=true><?php echo e($sale->final_total, false); ?></span>
									</p>
									<?php if($is_tables_enabled && !empty($sale->table->name)): ?>
										<?php echo app('translator')->get('restaurant.table'); ?>: <?php echo e($sale->table->name, false); ?>

									<?php endif; ?>
									<?php if($is_service_staff_enabled && !empty($sale->service_staff)): ?>
										<br><?php echo app('translator')->get('restaurant.service_staff'); ?>: <?php echo e($sale->service_staff->user_full_name, false); ?>

									<?php endif; ?>
								</div>

								<a href="<?php echo e(action('SellPosController@edit',  $sale->id), false); ?>" class="small-box-footer bg-blue p-10">
									<?php echo app('translator')->get('sale.edit_sale'); ?> <i class="fa fa-arrow-circle-right"></i>
								</a>
							<a href="<?php echo e(action('SellPosController@destroy', $sale->id), false); ?>" class="small-box-footer delete-sale bg-red is_suspended">
									<?php echo app('translator')->get('messages.delete'); ?> <i class="fas fa-trash"></i>
								</a>
							</div>
						</div>
						<?php
							$c++;
						?>
					<?php endif; ?>

					<?php if($c%4==0): ?>
						<div class="clearfix"></div>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
					<p class="text-center"><?php echo app('translator')->get('purchase.no_records_found'); ?></p>
				<?php endif; ?>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get('messages.close'); ?></button>
		</div>
	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/sale_pos/partials/suspended_sales_modal.blade.php ENDPATH**/ ?>