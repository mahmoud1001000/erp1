<div class="payment_details_div <?php if( $payment_line->method !== 'card' ): ?> <?php echo e('hide', false); ?> <?php endif; ?>" data-type="card" >
	<div class="col-md-4">
		<div class="form-group">
			<?php echo Form::label("card_number", __('lang_v1.card_no')); ?>

			<?php echo Form::text("card_number", $payment_line->card_number, ['class' => 'form-control', 'placeholder' => __('lang_v1.card_no')]); ?>

		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<?php echo Form::label("card_holder_name", __('lang_v1.card_holder_name')); ?>

			<?php echo Form::text("card_holder_name", $payment_line->card_holder_name, ['class' => 'form-control', 'placeholder' => __('lang_v1.card_holder_name')]); ?>

		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<?php echo Form::label("card_transaction_number",__('lang_v1.card_transaction_no')); ?>

			<?php echo Form::text("card_transaction_number", $payment_line->card_transaction_number, ['class' => 'form-control', 'placeholder' => __('lang_v1.card_transaction_no')]); ?>

		</div>
	</div>
	<div class="clearfix"></div>
	<div class="col-md-3">
		<div class="form-group">
			<?php echo Form::label("card_type", __('lang_v1.card_type')); ?>

			<?php echo Form::select("card_type", ['credit' => 'Credit Card', 'debit' => 'Debit Card', 'visa' => 'Visa', 'master' => 'MasterCard'], $payment_line->card_type,['class' => 'form-control select2']); ?>

		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<?php echo Form::label("card_month", __('lang_v1.month')); ?>

			<?php echo Form::text("card_month", $payment_line->card_month, ['class' => 'form-control', 
			'placeholder' => __('lang_v1.month') ]); ?>

		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<?php echo Form::label("card_year", __('lang_v1.year')); ?>

			<?php echo Form::text("card_year", $payment_line->card_year, ['class' => 'form-control', 'placeholder' => __('lang_v1.year') ]); ?>

		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<?php echo Form::label("card_security",__('lang_v1.security_code')); ?>

			<?php echo Form::text("card_security", $payment_line->card_security, ['class' => 'form-control', 'placeholder' => __('lang_v1.security_code')]); ?>

		</div>
	</div>
	<div class="clearfix"></div>
</div>
<div class="payment_details_div <?php if( $payment_line->method !== 'cheque' ): ?> <?php echo e('hide', false); ?> <?php endif; ?>" data-type="cheque" >
	<div class="col-md-12">
		<div class="form-group">
			<?php echo Form::label("cheque_number",__('lang_v1.cheque_no')); ?>

			<?php echo Form::text("cheque_number", $payment_line->cheque_number, ['class' => 'form-control', 'placeholder' => __('lang_v1.cheque_no')]); ?>

		</div>
	</div>
</div>
<div class="payment_details_div <?php if( $payment_line->method !== 'bank_transfer' ): ?> <?php echo e('hide', false); ?> <?php endif; ?>" data-type="bank_transfer" >
	<div class="col-md-12">
		<div class="form-group">
			<?php echo Form::label("bank_account_number",__('lang_v1.bank_account_number')); ?>

			<?php echo Form::text( "bank_account_number", $payment_line->bank_account_number, ['class' => 'form-control', 'placeholder' => __('lang_v1.bank_account_number')]); ?>

		</div>
	</div>
</div>
<div class="payment_details_div <?php if( $payment_line->method !== 'custom_pay_1' ): ?> <?php echo e('hide', false); ?> <?php endif; ?>" data-type="custom_pay_1" >
	<div class="col-md-12">
		<div class="form-group">
			<?php echo Form::label("transaction_no_1", __('lang_v1.transaction_no')); ?>

			<?php echo Form::text("transaction_no_1", $payment_line->transaction_no, ['class' => 'form-control', 'placeholder' => __('lang_v1.transaction_no')]); ?>

		</div>
	</div>
</div>
<div class="payment_details_div <?php if( $payment_line->method !== 'custom_pay_2' ): ?> <?php echo e('hide', false); ?> <?php endif; ?>" data-type="custom_pay_2" >
	<div class="col-md-12">
		<div class="form-group">
			<?php echo Form::label("transaction_no_2", __('lang_v1.transaction_no')); ?>

			<?php echo Form::text("transaction_no_2", $payment_line->transaction_no, ['class' => 'form-control', 'placeholder' => __('lang_v1.transaction_no')]); ?>

		</div>
	</div>
</div>
<div class="payment_details_div <?php if( $payment_line->method !== 'custom_pay_3' ): ?> <?php echo e('hide', false); ?> <?php endif; ?>" data-type="custom_pay_3" >
	<div class="col-md-12">
		<div class="form-group">
			<?php echo Form::label("transaction_no_3", __('lang_v1.transaction_no')); ?>

			<?php echo Form::text("transaction_no_3", $payment_line->transaction_no, ['class' => 'form-control', 'placeholder' => __('lang_v1.transaction_no')]); ?>

		</div>
	</div>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/transaction_payment/payment_type_details.blade.php ENDPATH**/ ?>