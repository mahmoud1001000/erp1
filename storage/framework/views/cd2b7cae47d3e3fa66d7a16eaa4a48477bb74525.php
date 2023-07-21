<div class="modal fade" tabindex="-1" role="dialog" id="modal_payment">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><?php echo app('translator')->get('lang_v1.payment'); ?></h4>
			</div>
			<div class="modal-body">
				<div class="row">

					<div class="col-md-12 mb-12">
						<strong><?php echo app('translator')->get('lang_v1.advance_balance'); ?>:</strong> <span id="advance_balance_text"></span>
						<?php echo Form::hidden('advance_balance', null, ['id' => 'advance_balance', 'data-error-msg' => __('lang_v1.required_advance_balance_not_available')]); ?>

					</div>
				<div class="col-md-9">
						<div class="row">
							<div id="payment_rows_div">
								<?php $__currentLoopData = $payment_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

									<?php if($payment_line['is_return'] == 1): ?>
										<?php
											$change_return = $payment_line;
										?>

										<?php continue; ?>
									<?php endif; ?>

									<?php echo $__env->make('sale_pos.partials.payment_row', ['removable' => !$loop->first, 'row_index' => $loop->index, 'payment_line' => $payment_line], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							<input type="hidden" id="payment_row_index" value="<?php echo e(count($payment_lines), false); ?>">
						</div>
						<div class="row">
							<div class="col-md-12">
								<button type="button" class="btn btn-primary btn-block" id="add-payment-row"><?php echo app('translator')->get('sale.add_payment_row'); ?></button>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<?php echo Form::label('sale_note', __('sale.sell_note') . ':'); ?>

									<?php echo Form::textarea('sale_note', !empty($transaction)? $transaction->additional_notes:null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('sale.sell_note')]); ?>

								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<?php echo Form::label('staff_note', __('sale.staff_note') . ':'); ?>

									<?php echo Form::textarea('staff_note',
									!empty($transaction)? $transaction->staff_note:null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('sale.staff_note')]); ?>

								</div>
							</div>
						</div>
					</div>
				<div class="col-md-3">
						<div class="box box-solid bg-orange">
							<div class="box-body">
								<div class="col-md-12">
									<strong>
										<?php echo app('translator')->get('lang_v1.total_items'); ?>:
									</strong>
									<br/>
									<span class="lead text-bold total_quantity">0</span>
								</div>

								<div class="col-md-12">
									<hr>
									<strong>
										<?php echo app('translator')->get('sale.total_payable'); ?>:
									</strong>
									<br/>
									<span class="lead text-bold total_payable_span">0</span>
								</div>

								<div class="col-md-12">
									<hr>
									<strong>
										<?php echo app('translator')->get('lang_v1.total_paying'); ?>:
									</strong>
									<br/>
									<span class="lead text-bold total_paying">0</span>
									<input type="hidden" id="total_paying_input">
								</div>

								<div class="col-md-12">
									<hr>
									<strong>
										<?php echo app('translator')->get('lang_v1.change_return'); ?>:
									</strong>
									<br/>
									<span class="lead text-bold change_return_span">0</span>
								<?php echo Form::hidden("change_return", $change_return['amount'], ['class' => 'form-control change_return input_number', 'required', 'id' => "change_return"]); ?>

								<!-- <span class="lead text-bold total_quantity">0</span> -->
									<?php if(!empty($change_return['id'])): ?>
										<input type="hidden" name="change_return_id"
											   value="<?php echo e($change_return['id'], false); ?>">
									<?php endif; ?>
								</div>

								<div class="col-md-12">
									<hr>
									<strong>
										<?php echo app('translator')->get('lang_v1.balance'); ?>:
									</strong>
									<br/>
									<span class="lead text-bold balance_due">0</span>
									<input type="hidden" id="in_balance_due" value=0>
								</div>



							</div>
							<!-- /.box-body -->
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get('messages.close'); ?></button>
				<button type="submit" class="btn btn-primary" id="pos-save" ><?php echo app('translator')->get('sale.finalize_payment'); ?></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Used for express checkout card transaction -->
<div class="modal fade" tabindex="-1" role="dialog" id="card_details_modal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><?php echo app('translator')->get('lang_v1.card_transaction_details'); ?></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					
					<div style="margin: auto;max-width: 80%;text-align: center">
						<h2><?php echo app('translator')->get('lang_v1.card_payment_model'); ?></h2>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-danger" id="pos-save-card"><?php echo app('translator')->get('sale.finalize_payment'); ?></button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><?php echo app('translator')->get('messages.close'); ?></span></button>

			</div>

		</div>
	</div>
</div>



<?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/sale_pos/partials/payment_modal.blade.php ENDPATH**/ ?>