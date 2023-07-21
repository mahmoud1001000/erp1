<?php $__env->startSection('title', __('purchase.add_purchase')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('purchase.add_purchase'); ?> <i class="fa fa-keyboard-o hover-q text-muted" aria-hidden="true" data-container="body" data-toggle="popover" data-placement="bottom" data-content="<?php echo $__env->make('purchase.partials.keyboard_shortcuts_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>" data-html="true" data-trigger="hover" data-original-title="" title=""></i></h1>
</section>

<!-- Main content -->
<section class="content">

	<!-- Page level currency setting -->
	<input type="hidden" id="p_code" value="<?php echo e($currency_details->code, false); ?>">
	<input type="hidden" id="p_symbol" value="<?php echo e($currency_details->symbol, false); ?>">
	<input type="hidden" id="p_thousand" value="<?php echo e($currency_details->thousand_separator, false); ?>">
	<input type="hidden" id="p_decimal" value="<?php echo e($currency_details->decimal_separator, false); ?>">

	<?php echo $__env->make('layouts.partials.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<?php echo Form::open(['url' => action('PurchaseController@store'), 'method' => 'post', 'id' => 'add_purchase_form', 'files' => true ]); ?>

	<?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
		<div class="row">
			<div class="<?php if(!empty($default_purchase_status)): ?> col-sm-4 <?php else: ?> col-sm-3 <?php endif; ?>">
				<div class="form-group">
					<?php echo Form::label('supplier_id', __('purchase.supplier') . ':*'); ?>

					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-user"></i>
						</span>
						<?php echo Form::select('contact_id', [], null, ['class' => 'form-control ', 'placeholder' => __('messages.please_select'), 'required', 'id' => 'supplier_id']); ?>

						<span class="input-group-btn">
							<button type="button" class="btn btn-default bg-white btn-flat add_new_supplier" data-name=""><i class="fa fa-plus-circle text-primary fa-lg"></i></button>
						</span>
					</div>
				</div>
				<strong>
					<?php echo app('translator')->get('business.address'); ?>:
				</strong>
				<div id="supplier_address_div"></div>
			</div>
			<div class="<?php if(!empty($default_purchase_status)): ?> col-sm-4 <?php else: ?> col-sm-3 <?php endif; ?>">
				<div class="form-group">
					<?php echo Form::label('ref_no', __('purchase.ref_no').':'); ?>

					<?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.leave_empty_to_autogenerate') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
					<?php echo Form::text('ref_no', null, ['class' => 'form-control']); ?>

				</div>
			</div>
			<div class="<?php if(!empty($default_purchase_status)): ?> col-sm-4 <?php else: ?> col-sm-3 <?php endif; ?>">
				<div class="form-group">
					<?php echo Form::label('transaction_date', __('purchase.purchase_date') . ':*'); ?>

					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</span>
						<?php echo Form::text('transaction_date', \Carbon::createFromTimestamp(strtotime('now'))->format(session('business.date_format') . ' ' . 'H:i'), ['class' => 'form-control', 'readonly', 'required']); ?>

					</div>
				</div>
			</div>
			<div class="col-sm-3 <?php if(!empty($default_purchase_status)): ?> hide <?php endif; ?>">
				<div class="form-group">
					<?php echo Form::label('status', __('purchase.purchase_status') . ':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.order_status') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
					<?php echo Form::select('status', $orderStatuses, $default_purchase_status, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required']); ?>

				</div>
			</div>			
			<?php if(count($business_locations) == 1): ?>
				<?php 
					$default_location = current(array_keys($business_locations->toArray()));
					$search_disable = false; 
				?>
			<?php else: ?>
				<?php $default_location = null;
				$search_disable = true;
				?>
			<?php endif; ?>
			<div class="col-sm-3">
				<div class="form-group">
					<?php echo Form::label('location_id', __('purchase.business_location').':*'); ?>

					<?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.purchase_location') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
					<?php echo Form::select('location_id', $business_locations, $default_location, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required'], $bl_attributes); ?>

				</div>
			</div>

			<!-- Currency Exchange Rate -->
			<div class="col-sm-3 <?php if(!$currency_details->purchase_in_diff_currency): ?> hide <?php endif; ?>">
				<div class="form-group">
					<?php echo Form::label('exchange_rate', __('purchase.p_exchange_rate') . ':*'); ?>

					<?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.currency_exchange_factor') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-info"></i>
						</span>
						<?php echo Form::number('exchange_rate', $currency_details->p_exchange_rate, ['class' => 'form-control', 'required', 'step' => 0.001]); ?>

					</div>
					<span class="help-block text-danger">
						<?php echo app('translator')->get('purchase.diff_purchase_currency_help', ['currency' => $currency_details->name]); ?>
					</span>
				</div>
			</div>

			<div class="col-md-3">
		          <div class="form-group">
		            <div class="multi-input">
		              <?php echo Form::label('pay_term_number', __('contact.pay_term') . ':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.pay_term') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
		              <br/>
		              <?php echo Form::number('pay_term_number', null, ['class' => 'form-control width-40 pull-left', 'placeholder' => __('contact.pay_term')]); ?>


		              <?php echo Form::select('pay_term_type', 
		              	['months' => __('lang_v1.months'), 
		              		'days' => __('lang_v1.days')], 
		              		null, 
		              	['class' => 'form-control width-60 pull-left','placeholder' => __('messages.please_select'), 'id' => 'pay_term_type']); ?>

		            </div>
		        </div>
		    </div>

			<div class="col-sm-3">
                <div class="form-group">
                    <?php echo Form::label('document', __('purchase.attach_document') . ':'); ?>

                    <?php echo Form::file('document', ['id' => 'upload_document', 'accept' => implode(',', array_keys(config('constants.document_upload_mimes_types')))]); ?>

                    <p class="help-block">
                    	<?php echo app('translator')->get('purchase.max_file_size', ['size' => (config('constants.document_size_limit') / 1000000)]); ?>
                    	<?php if ($__env->exists('components.document_help_text')) echo $__env->make('components.document_help_text', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </p>
                </div>
            </div>
		</div>
	<?php echo $__env->renderComponent(); ?>

	<?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-search"></i>
						</span>
						<?php echo Form::text('search_product', null, ['class' => 'form-control mousetrap', 'id' => 'search_product', 'placeholder' => __('lang_v1.search_product_placeholder'), 'disabled' => $search_disable]); ?>

					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
					<button tabindex="-1" type="button" class="btn btn-link btn-modal"data-href="<?php echo e(action('ProductController@quickAdd'), false); ?>" 
            	data-container=".quick_add_product_modal"><i class="fa fa-plus"></i> <?php echo app('translator')->get( 'product.add_new_product' ); ?> </button>
				</div>
			</div>
		</div>
		<?php
			$hide_tax = '';
			if( session()->get('business.enable_inline_tax') == 0){
				$hide_tax = 'hide';
			}
		?>
		<div class="row">
			<div class="col-sm-12">
				<div class="table-responsive">
					<table class="table table-condensed table-bordered table-th-green text-center table-striped" id="purchase_entry_table">
						<thead>
							<tr>
								<th>#</th>
								<th><?php echo app('translator')->get( 'product.product_name' ); ?></th>
								<th><?php echo app('translator')->get( 'purchase.purchase_quantity' ); ?></th>
								<th><?php echo app('translator')->get( 'lang_v1.unit_cost_before_discount' ); ?></th>
								<th><?php echo app('translator')->get( 'lang_v1.discount_percent' ); ?></th>
								<th><?php echo app('translator')->get( 'purchase.unit_cost_before_tax' ); ?></th>
								<th class="<?php echo e($hide_tax, false); ?>"><?php echo app('translator')->get( 'purchase.subtotal_before_tax' ); ?></th>
								<th class="<?php echo e($hide_tax, false); ?>"><?php echo app('translator')->get( 'purchase.product_tax' ); ?></th>
								<th class="<?php echo e($hide_tax, false); ?>"><?php echo app('translator')->get( 'purchase.net_cost' ); ?></th>
								<th><?php echo app('translator')->get( 'purchase.line_total' ); ?></th>
								<th class="<?php if(!session('business.enable_editing_product_from_purchase')): ?> hide <?php endif; ?>">
									<?php echo app('translator')->get( 'lang_v1.profit_margin' ); ?>
								</th>
								<th>
									<?php echo app('translator')->get( 'purchase.unit_selling_price' ); ?>
									<small>(<?php echo app('translator')->get('product.inc_of_tax'); ?>)</small>
								</th>
								<?php if(session('business.enable_lot_number')): ?>
									<th>
										<?php echo app('translator')->get('lang_v1.lot_number'); ?>
									</th>
								<?php endif; ?>
								<?php if(session('business.enable_product_expiry')): ?>
									<th>
										<?php echo app('translator')->get('product.mfg_date'); ?> / <?php echo app('translator')->get('product.exp_date'); ?>
									</th>
								<?php endif; ?>
								<th><i class="fa fa-trash" aria-hidden="true"></i></th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<hr/>
				<div class="pull-right col-md-5">
					<table class="pull-right col-md-12">
						<tr>
							<th class="col-md-7 text-right"><?php echo app('translator')->get( 'lang_v1.total_items' ); ?>:</th>
							<td class="col-md-5 text-left">
								<span id="total_quantity" class="display_currency" data-currency_symbol="false"></span>
							</td>
						</tr>
						<tr class="hide">
							<th class="col-md-7 text-right"><?php echo app('translator')->get( 'purchase.total_before_tax' ); ?>:</th>
							<td class="col-md-5 text-left">
								<span id="total_st_before_tax" class="display_currency"></span>
								<input type="hidden" id="st_before_tax_input" value=0>
							</td>
						</tr>
						<tr>
							<th class="col-md-7 text-right"><?php echo app('translator')->get( 'purchase.net_total_amount' ); ?>:</th>
							<td class="col-md-5 text-left">
								<span id="total_subtotal" class="display_currency"></span>
								<!-- This is total before purchase tax-->
								<input type="hidden" id="total_subtotal_input" value=0  name="total_before_tax">
							</td>
						</tr>
					</table>
				</div>

				<input type="hidden" id="row_count" value="0">
			</div>
		</div>
	<?php echo $__env->renderComponent(); ?>

	<?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
		<div class="row">
			<div class="col-sm-12">
			<table class="table">
				<tr>
					<td class="col-md-3">
						<div class="form-group">
							<?php echo Form::label('discount_type', __( 'purchase.discount_type' ) . ':'); ?>

							<?php echo Form::select('discount_type', [ '' => __('lang_v1.none'), 'fixed' => __( 'lang_v1.fixed' ), 'percentage' => __( 'lang_v1.percentage' )], '', ['class' => 'form-control select2']); ?>

						</div>
					</td>
					<td class="col-md-3">
						<div class="form-group">
						<?php echo Form::label('discount_amount', __( 'purchase.discount_amount' ) . ':'); ?>

						<?php echo Form::text('discount_amount', 0, ['class' => 'form-control input_number', 'required']); ?>

						</div>
					</td>
					<td class="col-md-3">
						&nbsp;
					</td>
					<td class="col-md-3">
						<b><?php echo app('translator')->get( 'purchase.discount' ); ?>:</b>(-) 
						<span id="discount_calculated_amount" class="display_currency">0</span>
					</td>
				</tr>
				<tr>
					<td>
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
					</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>
						<b><?php echo app('translator')->get( 'purchase.purchase_tax' ); ?>:</b>(+) 
						<span id="tax_calculated_amount" class="display_currency">0</span>
					</td>
				</tr>

				<tr>
					<td>
						<div class="form-group">
						<?php echo Form::label('shipping_details', __( 'purchase.shipping_details' ) . ':'); ?>

						<?php echo Form::text('shipping_details', null, ['class' => 'form-control']); ?>

						</div>
					</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>
						<div class="form-group">
						<?php echo Form::label('shipping_charges','(+) ' . __( 'purchase.additional_shipping_charges' ) . ':'); ?>

						<?php echo Form::text('shipping_charges', 0, ['class' => 'form-control input_number', 'required']); ?>

						</div>
					</td>
				</tr>

				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>
						<?php echo Form::hidden('final_total', 0 , ['id' => 'grand_total_hidden']); ?>

						<b><?php echo app('translator')->get('purchase.purchase_total'); ?>: </b><span id="grand_total" class="display_currency" data-currency_symbol='true'>0</span>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<div class="form-group">
							<?php echo Form::label('additional_notes',__('purchase.additional_notes')); ?>

							<?php echo Form::textarea('additional_notes', null, ['class' => 'form-control', 'rows' => 3]); ?>

						</div>
					</td>
				</tr>

			</table>
			</div>
		</div>
	<?php echo $__env->renderComponent(); ?>

	<?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __('purchase.add_payment')]); ?>
		<div class="box-body payment_row">
			<div class="row">
				<div class="col-md-6">
					<strong><?php echo app('translator')->get('purchase.purchase_total'); ?>:</strong> <span style="color:red;" id="grand_total2">0</span>
				</div>
				<div class="col-md-6">
					<strong><?php echo app('translator')->get('lang_v1.advance_balance'); ?>:</strong> <span id="advance_balance_text">0</span>
					<?php echo Form::hidden('advance_balance', null, ['id' => 'advance_balance', 'data-error-msg' => __('lang_v1.required_advance_balance_not_available')]); ?>

				</div>
			</div>

			<hr>
			<?php echo $__env->make('sale_pos.partials.payment_row_form', ['row_index' => 0, 'show_date' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<hr>
			<div class="row">
				<div class="col-sm-12">
					<div class="pull-right"><strong><?php echo app('translator')->get('purchase.payment_due'); ?>:</strong> <span id="payment_due">0.00</span></div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-12">
					<button type="button" id="submit_purchase_form" class="btn btn-primary pull-right btn-flat"><?php echo app('translator')->get('messages.save'); ?></button>
				</div>
			</div>
		</div>
	<?php echo $__env->renderComponent(); ?>

<?php echo Form::close(); ?>

</section>
<!-- quick product modal -->
<div class="modal fade quick_add_product_modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle"></div>
<div class="modal fade contact_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
	<?php echo $__env->make('contact.create', ['quick_add' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('js/purchase.js?v=' . $asset_v), false); ?>"></script>
	<script src="<?php echo e(asset('js/product.js?v=' . $asset_v), false); ?>"></script>
	<script type="text/javascript">
		$(document).ready( function(){
      		__page_leave_confirmation('#add_purchase_form');
      		$('.paid_on').datetimepicker({
                format: moment_date_format + ' ' + moment_time_format,
                ignoreReadonly: true,
            });
    	});
    	$(document).on('change', '.payment_types_dropdown, #location_id', function(e) {
		    var default_accounts = $('select#location_id').length ? 
		                $('select#location_id')
		                .find(':selected')
		                .data('default_payment_accounts') : [];
		    var payment_types_dropdown = $('.payment_types_dropdown');
		    var payment_type = payment_types_dropdown.val();
		    var payment_row = payment_types_dropdown.closest('.payment_row');
	        var row_index = payment_row.find('.payment_row_index').val();

	        var account_dropdown = payment_row.find('select#account_' + row_index);
		    if (payment_type && payment_type != 'advance') {
		        var default_account = default_accounts && default_accounts[payment_type]['account'] ? 
		            default_accounts[payment_type]['account'] : '';
		        if (account_dropdown.length && default_accounts) {
		            account_dropdown.val(default_account);
		            account_dropdown.change();
		        }
		    }

		    if (payment_type == 'advance') {
		        if (account_dropdown) {
		            account_dropdown.prop('disabled', true);
		            account_dropdown.closest('.form-group').addClass('hide');
		        }
		    } else {
		        if (account_dropdown) {
		            account_dropdown.prop('disabled', false); 
		            account_dropdown.closest('.form-group').removeClass('hide');
		        }    
		    }
		});
	</script>
	<?php echo $__env->make('purchase.partials.keyboard_shortcuts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/purchase/create.blade.php ENDPATH**/ ?>