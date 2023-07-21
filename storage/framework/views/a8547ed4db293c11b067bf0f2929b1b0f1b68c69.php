<?php
	$subtype = '';
?>
<?php if(!empty($transaction_sub_type)): ?>
	<?php
		$subtype = '?sub_type='.$transaction_sub_type;
	?>
<?php endif; ?>
<table class="table table-slim no-border">
<thead>
<tr>
	<th class="table-dark">رقم الفاتورة</th>
	<th class="table-dark">العميل</th>
	<th class="table-dark">القيمة</th>
	<th class="table-dark">خيارات</th>
</tr>
</thead>

<?php if(!empty($transactions)): ?>

		<?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr class="cursor-pointer"
	    		title="Customer: <?php echo e(optional($transaction->contact)->name, false); ?>

		    		<?php if(!empty($transaction->contact->mobile) && $transaction->contact->is_default == 0): ?>
		    			<br/>Mobile: <?php echo e($transaction->contact->mobile, false); ?>

		    		<?php endif; ?>
	    		" >
				<td>
					
					<?php echo e($transaction->invoice_no, false); ?>

				</td>
				<td>
					 (<?php echo e(optional($transaction->contact)->name, false); ?>)
					<?php if(!empty($transaction->table)): ?>
						- <?php echo e($transaction->table->name, false); ?>

					<?php endif; ?>
				</td>
				<td class="display_currency">
					<?php echo e($transaction->final_total, false); ?>

				</td>
				<td>
					<?php if($transaction->status == 'final'): ?>
						<?php if(count($transaction->sell_lines)> 0 && $transaction->sell_lines[0]->quantity_returned > 0): ?>
							<a
									style="padding: 0px;margin:0 15px;color:#2196f3;">
								<small class="label bg-red label-round no-print"><i class="fas fa-undo" title="إضفط هنا لتصفح المرتجع"></i> </small>	</a></a>
						<?php else: ?>
							<a href="/sell-return/add/<?php echo e($transaction->id, false); ?>"   class="recent-transactions-bill-return"
							   style="padding: 0px;margin:0 15px;color:#2e6708  ;">
								<small class="label bg-green label-round no-print"><i class="fas fa-undo" title="إضفط هنا لتصفح المرتجع"></i> </small>	</a>

						<?php endif; ?>
					<?php endif; ?>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sell.update')): ?>
					<a href="<?php echo e(action('SellPosController@edit', [$transaction->id]).$subtype, false); ?>">
	    				<i class="fas fa-pen text-muted" aria-hidden="true" title="<?php echo e(__('lang_v1.click_to_edit'), false); ?>"></i>
	    			</a>
					<?php endif; ?>

	    			<a href="<?php echo e(action('SellPosController@destroy', [$transaction->id]), false); ?>" class="delete-sale" style="padding-left: 20px; padding-right: 20px"><i class="fa fa-trash text-danger" title="<?php echo e(__('lang_v1.click_to_delete'), false); ?>"></i></a>

	    			<a href="<?php echo e(action('SellPosController@printInvoice', [$transaction->id]), false); ?>" class="print-invoice-link">
	    				<i class="fa fa-print text-muted" aria-hidden="true" title="<?php echo e(__('lang_v1.click_to_print'), false); ?>"></i>
	    			</a>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>
<?php else: ?>
	<p><?php echo app('translator')->get('sale.no_recent_transactions'); ?></p>
<?php endif; ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/sale_pos/partials/recent_transactions.blade.php ENDPATH**/ ?>