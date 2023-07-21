<?php $__env->startSection('title', __('expense.add_expense')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('expense.add_expense'); ?></h1>
</section>

<!-- Main content -->
<section class="content">
	<?php echo Form::open(['url' => action('ExpenseController@store'), 'method' => 'post', 'id' => 'add_expense_form', 'files' => true ]); ?>

	<div class="box box-solid">
		<div class="box-body">
			<div class="row">

				<?php if(count($business_locations) == 1): ?>
					<?php 
						$default_location = current(array_keys($business_locations->toArray())) 
					?>
				<?php else: ?>
					<?php $default_location = null; ?>
				<?php endif; ?>
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('location_id', __('purchase.business_location').':*'); ?>

						<?php echo Form::select('location_id', $business_locations, $default_location, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required'], $bl_attributes); ?>

					</div>
				</div>

				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('expense_category_id', __('expense.expense_category').':'); ?>

						<?php echo Form::select('expense_category_id', $expense_categories, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select')]); ?>

					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('ref_no', __('purchase.ref_no').':'); ?>

						<?php echo Form::text('ref_no', null, ['class' => 'form-control']); ?>

						<p class="help-block">
			                <?php echo app('translator')->get('lang_v1.leave_empty_to_autogenerate'); ?>
			            </p>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('transaction_date', __('messages.date') . ':*'); ?>

						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</span>
							<?php echo Form::text('transaction_date', \Carbon::createFromTimestamp(strtotime('now'))->format(session('business.date_format') . ' ' . 'H:i'), ['class' => 'form-control', 'readonly', 'required', 'id' => 'expense_transaction_date']); ?>

						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('expense_for', __('expense.expense_for').':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.expense_for') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
						<?php echo Form::select('expense_for', $users, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select')]); ?>

					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('contact_id', __('lang_v1.expense_for_contact').':'); ?> 
						<?php echo Form::select('contact_id', $contacts, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select')]); ?>

					</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-sm-4">
                    <div class="form-group">
                        <?php echo Form::label('document', __('purchase.attach_document') . ':'); ?>

                        <?php echo Form::file('document', ['id' => 'upload_document', 'accept' => implode(',', array_keys(config('constants.document_upload_mimes_types')))]); ?>

                        <small><p class="help-block"><?php echo app('translator')->get('purchase.max_file_size', ['size' => (config('constants.document_size_limit') / 1000000)]); ?>
                        <?php if ($__env->exists('components.document_help_text')) echo $__env->make('components.document_help_text', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></p></small>
                    </div>
                </div>
				<div class="col-md-4">
			    	<div class="form-group">
			            <?php echo Form::label('tax_id', __('product.applicable_tax') . ':' ); ?>

			            <div class="input-group">
			                <span class="input-group-addon">
			                    <i class="fa fa-info"></i>
			                </span>
			                <?php echo Form::select('tax_id', $taxes['tax_rates'], null, ['class' => 'form-control'], $taxes['attributes']); ?>


							<input type="hidden" name="tax_calculation_amount" id="tax_calculation_amount" 
							value="0">
			            </div>
			        </div>
			    </div>
			    <div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('final_total', __('sale.total_amount') . ':*'); ?>

						<?php echo Form::text('final_total', null, ['class' => 'form-control input_number', 'placeholder' => __('sale.total_amount'), 'required']); ?>

					</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('additional_notes', __('expense.expense_note') . ':'); ?>

								<?php echo Form::textarea('additional_notes', null, ['class' => 'form-control', 'rows' => 3]); ?>

					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<br>
					<label>
		              <?php echo Form::checkbox('is_refund', 1, false, ['class' => 'input-icheck', 'id' => 'is_refund']); ?> <?php echo app('translator')->get('lang_v1.is_refund'); ?>?
		            </label><?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.is_refund_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
				</div>
			</div>
		</div>
	</div> <!--box end-->
	<?php echo $__env->make('expense.recur_expense_form_part', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php $__env->startComponent('components.widget', ['class' => 'box-solid', 'id' => "payment_rows_div", 'title' => __('purchase.add_payment')]); ?>
	<div class="payment_row">
		<?php echo $__env->make('sale_pos.partials.payment_row_form', ['row_index' => 0, 'show_date' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<hr>
		<div class="row">
			<div class="col-sm-12">
				<div class="pull-right">
					<strong><?php echo app('translator')->get('purchase.payment_due'); ?>:</strong>
					<span id="payment_due"><?php echo e(number_format(0, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?></span>
				</div>
			</div>
		</div>
	</div>
	<?php echo $__env->renderComponent(); ?>
	<div class="col-sm-12">
		<button type="submit" class="btn btn-primary pull-right"><?php echo app('translator')->get('messages.save'); ?></button>
	</div>
<?php echo Form::close(); ?>

</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
	$(document).ready( function(){
		$('.paid_on').datetimepicker({
            format: moment_date_format + ' ' + moment_time_format,
            ignoreReadonly: true,
        });
	});
	
	__page_leave_confirmation('#add_expense_form');
	$(document).on('change', 'input#final_total, input.payment-amount', function() {
		calculateExpensePaymentDue();
	});

	function calculateExpensePaymentDue() {
		var final_total = __read_number($('input#final_total'));
		var payment_amount = __read_number($('input.payment-amount'));
		var payment_due = final_total - payment_amount;
		$('#payment_due').text(__currency_trans_from_en(payment_due, true, false));
	}

	$(document).on('change', '#recur_interval_type', function() {
	    if ($(this).val() == 'months') {
	        $('.recur_repeat_on_div').removeClass('hide');
	    } else {
	        $('.recur_repeat_on_div').addClass('hide');
	    }
	});

	$('#is_refund').on('ifChecked', function(event){
		$('#recur_expense_div').addClass('hide');
	});
	$('#is_refund').on('ifUnchecked', function(event){
		$('#recur_expense_div').removeClass('hide');
	});

	$(document).on('change', '.payment_types_dropdown, #location_id', function(e) {
	    var default_accounts = $('select#location_id').length ? 
	                $('select#location_id')
	                .find(':selected')
	                .data('default_payment_accounts') : [];
	    var payment_types_dropdown = $('.payment_types_dropdown');
	    var payment_type = payment_types_dropdown.val();
	    if (payment_type) {
	        var default_account = default_accounts && default_accounts[payment_type]['account'] ? 
	            default_accounts[payment_type]['account'] : '';
	        var payment_row = payment_types_dropdown.closest('.payment_row');
	        var row_index = payment_row.find('.payment_row_index').val();

	        var account_dropdown = payment_row.find('select#account_' + row_index);
	        if (account_dropdown.length && default_accounts) {
	            account_dropdown.val(default_account);
	            account_dropdown.change();
	        }
	    }
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/expense/create.blade.php ENDPATH**/ ?>