<div class="row">
	<div class="col-md-12">
		<?php if($stock_details['variation']!='()'): ?>
		  <h4><?php echo e($stock_details['variation'], false); ?></h4>
			<?php else: ?>
			<h4><?php echo app('translator')->get('lang_v1.no_data_found'); ?></h4>
			<?php endif; ?>
	</div>
	<div class="col-md-4 col-xs-4">

		<table class="table table-condensed  ">
			<thead>
			<tr>
				<th><strong><?php echo app('translator')->get('lang_v1.store_quantities_in'); ?></strong></th>
				<th><strong><i class="fa fa-plus-circle"></i> </strong></th>
			</tr>
			</thead>
     	 <tr>
			 <th><?php echo app('translator')->get('lang_v1.opening_stock'); ?></th>
			 <td>
				 <span class="display_currency" data-is_quantity="true"><?php echo e($stock_details['total_opening_stock'], false); ?></span> <?php echo e($stock_details['unit'], false); ?>

			 </td>
		 </tr>
			<tr>
				<th><?php echo app('translator')->get('report.total_purchase'); ?></th>
				<td>
					<span class="display_currency" data-is_quantity="true"><?php echo e($stock_details['total_purchase'], false); ?></span> <?php echo e($stock_details['unit'], false); ?>

				</td>
			</tr>

			<tr>
				<th><?php echo app('translator')->get('lang_v1.total_sell_return'); ?></th>
				<td>
					<span class="display_currency" data-is_quantity="true"><?php echo e($stock_details['total_sell_return'], false); ?></span> <?php echo e($stock_details['unit'], false); ?>

				</td>
			</tr>
			<tr>
				<th><?php echo app('translator')->get('lang_v1.stock_transfers'); ?> (<?php echo app('translator')->get('lang_v1.in'); ?>)</th>
				<td>
					<span class="display_currency" data-is_quantity="true"><?php echo e($stock_details['total_purchase_transfer'], false); ?></span> <?php echo e($stock_details['unit'], false); ?>

				</td>
			</tr>

			<tr>
				<th><?php echo app('translator')->get('lang_v1.production_purchase'); ?></th>
				<td>
					<span class="display_currency" data-is_quantity="true"><?php echo e($stock_details['total_production_purchase'], false); ?></span> <?php echo e($stock_details['unit'], false); ?>

				</td>
			</tr>

			<tfoot>
			<tr>
			<th><?php echo app('translator')->get('stock_adjustment.total_amount'); ?></th>
				<th>
					<span class="display_currency" data-is_quantity="true"><?php echo e($stock_details['total_in'], false); ?></span> <?php echo e($stock_details['unit'], false); ?>

				</th>
			</tr>
			</tfoot>
			<tr>



			</tr>

		</table>
	</div>
	<div class="col-md-4 col-xs-4">

		<table class="table table-condensed">
			<thead>
			<tr>
				<th><strong><?php echo app('translator')->get('lang_v1.store_quantities_out'); ?></strong></th>
				<th><strong><i class="fa fa-minus-circle"></i> </strong></th>
			</tr>
			</thead>

			<tr>
				<th><?php echo app('translator')->get('lang_v1.total_sold'); ?></th>
				<td>
					<span class="display_currency" data-is_quantity="true"><?php echo e($stock_details['total_sold'], false); ?></span> <?php echo e($stock_details['unit'], false); ?>

				</td>
			</tr>
			<tr>
				<th><?php echo app('translator')->get('report.total_stock_adjustment'); ?></th>
				<td>
					<span class="display_currency" data-is_quantity="true"><?php echo e($stock_details['total_adjusted'], false); ?></span> <?php echo e($stock_details['unit'], false); ?>

				</td>
			</tr>
			<tr>
				<th><?php echo app('translator')->get('lang_v1.total_purchase_return'); ?></th>
				<td>
					<span class="display_currency" data-is_quantity="true"><?php echo e($stock_details['total_purchase_return'], false); ?></span> <?php echo e($stock_details['unit'], false); ?>

				</td>
			</tr>
			
			<tr>
				<th><?php echo app('translator')->get('lang_v1.stock_transfers'); ?> (<?php echo app('translator')->get('lang_v1.out'); ?>)</th>
				<td>
					<span class="display_currency" data-is_quantity="true"><?php echo e($stock_details['total_sell_transfer'], false); ?></span> <?php echo e($stock_details['unit'], false); ?>

				</td>
			</tr>

			<tr>
				<th><?php echo app('translator')->get('lang_v1.production_sell'); ?> (<?php echo app('translator')->get('lang_v1.out'); ?>)</th>
				<td>
					<span class="display_currency" data-is_quantity="true"><?php echo e($stock_details['production_sell'], false); ?></span> <?php echo e($stock_details['unit'], false); ?>

				</td>
			</tr>

			<tfoot>
			<tr>
				<th><?php echo app('translator')->get('stock_adjustment.total_amount'); ?></th>
				<th>
					<span class="display_currency" data-is_quantity="true"><?php echo e($stock_details['total_out'], false); ?></span> <?php echo e($stock_details['unit'], false); ?>

				</th>

			</tr>
			</tfoot>
		</table>
	</div>

	<div class="col-md-4 col-xs-4">

		<table class="table table-condensed">
			<thead>
				<th> <strong><?php echo app('translator')->get('lang_v1.totals'); ?></strong></th>
		    	<th></th>
			</thead>
			<tr>
				<th><i class="fa fa-check"></i><?php echo app('translator')->get('report.current_stock'); ?> </th>
				<td>
					<span class="display_currency" data-is_quantity="true"><?php echo e($stock_details['total_in']-$stock_details['total_out'], false); ?></span> <?php echo e($stock_details['unit'], false); ?>

				</td>
			</tr>

			<tr>
				<th><?php echo app('translator')->get('report.current_stock'); ?></th>
				<td>
					<span class="display_currency" data-is_quantity="true"><?php echo e($stock_details['current_stock'], false); ?></span> <?php echo e($stock_details['unit'], false); ?>

				</td>
			</tr>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<hr>
		<table class="table " id="stock_history_table">
			<thead>
			<tr>
				<th><?php echo app('translator')->get('lang_v1.type'); ?></th>
				<th><?php echo app('translator')->get('lang_v1.quantity_change'); ?></th>
				<th><?php echo app('translator')->get('lang_v1.new_quantity'); ?></th>
				<th><?php echo app('translator')->get('lang_v1.date'); ?></th>
				<th><?php echo app('translator')->get('purchase.ref_no'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php $__empty_1 = true; $__currentLoopData = $stock_history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
				<tr>
					<td><?php echo e($history['type_label'], false); ?></td>
					<td><?php if($history['quantity_change'] > 0 ): ?> +<span class="display_currency" data-is_quantity="true"><?php echo e($history['quantity_change'], false); ?></span> <?php else: ?> <span class="display_currency" data-is_quantity="true"><?php echo e($history['quantity_change'], false); ?></span> <?php endif; ?></td>
					<td><span class="display_currency" data-is_quantity="true"><?php echo e($history['stock'], false); ?></span></td>
					<td><?php echo e(\Carbon::createFromTimestamp(strtotime($history['date']))->format(session('business.date_format') . ' ' . 'H:i'), false); ?></td>
					<td><?php echo e($history['ref_no'], false); ?></td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
				<tr><td colspan="5" class="text-center">
					<?php echo app('translator')->get('lang_v1.no_stock_history_found'); ?>
				</td></tr>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/product/stock_history_details.blade.php ENDPATH**/ ?>