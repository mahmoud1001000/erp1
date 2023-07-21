<div class="row">
	<input type="hidden" class="payment_row_index" value="<?php echo e($row_index, false); ?>">
	<?php
		$col_class = 'col-md-6';
		if(!empty($accounts)){
			$col_class = 'col-md-4';
		}
		$readonly = $payment_line['method'] == 'advance' ? true : false;
	?>
	<div class="<?php echo e($col_class, false); ?>">
		<div class="form-group">
			<?php echo Form::label("amount_$row_index" ,__('sale.amount') . ':*'); ?>

			<div class="input-group">
				<span class="input-group-addon">
					<i class="fas fa-money-bill-alt"></i>
				</span>
				<?php echo Form::text("payment[$row_index][amount]", number_format($payment_line['amount'], config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control payment-amount input_number', 'required', 'id' => "amount_$row_index", 'placeholder' => __('sale.amount'), 'readonly' => $readonly]); ?>

			</div>
		</div>
	</div>
	<?php if(!empty($show_date)): ?>
	<div class="<?php echo e($col_class, false); ?>">
		<div class="form-group">
			<?php echo Form::label("paid_on_$row_index" , __('lang_v1.paid_on') . ':*'); ?>

			<div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </span>
              <?php echo Form::text("payment[$row_index][paid_on]", isset($payment_line['paid_on']) ? \Carbon::createFromTimestamp(strtotime($payment_line['paid_on']))->format(session('business.date_format') . ' ' . 'H:i') : \Carbon::createFromTimestamp(strtotime('now'))->format(session('business.date_format') . ' ' . 'H:i'), ['class' => 'form-control paid_on', 'readonly', 'required']); ?>

            </div>
		</div>
	</div>
	<?php endif; ?>
	<div class="<?php echo e($col_class, false); ?>">
		<div class="form-group">
			<?php echo Form::label("method_$row_index" , __('lang_v1.payment_method') . ':*'); ?>

			<div class="input-group">
				<span class="input-group-addon">
					<i class="fas fa-money-bill-alt"></i>
				</span>
				<?php
					$_payment_method = empty($payment_line['method']) && array_key_exists('cash', $payment_types) ? 'cash' : $payment_line['method'];
				?>
				<?php echo Form::select("payment[$row_index][method]", $payment_types, $_payment_method, ['class' => 'form-control col-md-12 payment_types_dropdown', 'required', 'id' => !$readonly ? "method_$row_index" : "method_advance_$row_index", 'style' => 'width:100%;', 'disabled' => $readonly]); ?>


				<?php if($readonly): ?>
					<?php echo Form::hidden("payment[$row_index][method]", $payment_line['method'], ['class' => 'payment_types_dropdown', 'required', 'id' => "method_$row_index"]); ?>

				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php if(!empty($accounts)): ?>
		<div class="<?php echo e($col_class, false); ?>">
			<div class="form-group <?php if($readonly): ?> hide <?php endif; ?>">
				<?php echo Form::label("account_$row_index" , __('lang_v1.payment_account') . ':'); ?>

				<div class="input-group">
					<span class="input-group-addon">
						<i class="fas fa-money-bill-alt"></i>
					</span>
					<?php echo Form::select("payment[$row_index][account_id]", $accounts, !empty($payment_line['account_id']) ? $payment_line['account_id'] : '' , ['class' => 'form-control select2 account-dropdown', 'id' => !$readonly ? "account_$row_index" : "account_advance_$row_index", 'style' => 'width:100%;', 'disabled' => $readonly]); ?>

				</div>
			</div>
		</div>
	<?php endif; ?>
	<div class="clearfix"></div>
		<?php echo $__env->make('sale_pos.partials.payment_type_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<div class="col-md-12">
		<div class="form-group">
			<?php echo Form::label("note_$row_index", __('sale.payment_note') . ':'); ?>

			<?php echo Form::textarea("payment[$row_index][note]", $payment_line['note'], ['class' => 'form-control', 'rows' => 3, 'id' => "note_$row_index"]); ?>

		</div>
	</div>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/sale_pos/partials/payment_row_form.blade.php ENDPATH**/ ?>