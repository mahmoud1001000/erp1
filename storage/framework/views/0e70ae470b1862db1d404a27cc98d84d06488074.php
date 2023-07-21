<div class="row">
	<div class="col-md-12">
		<p><strong><?php echo app('translator')->get('sale.invoice_no'); ?>:</strong> <?php echo e($transaction->invoice_no, false); ?></p>
	</div>
	<div class="col-md-4">
		<div class="form-group" style="width: 100% !important">
			<div class="input-group">
				<span class="input-group-addon">
					<i class="fa fa-user"></i>
				</span>
				<input type="hidden" id="default_customer_id" 
				value="<?php echo e($transaction->contact->id, false); ?>" >
				<input type="hidden" id="default_customer_name" 
				value="<?php echo e($transaction->contact->name, false); ?>" >
				<input type="hidden" id="default_customer_balance" 
				value="<?php echo e($transaction->contact->balance, false); ?>" >
				<?php echo Form::select('contact_id', 
					[], null, ['class' => 'form-control mousetrap', 'id' => 'customer_id', 'placeholder' => 'Enter Customer name / phone', 'required', 'style' => 'width: 100%;']); ?>

				<span class="input-group-btn">
					<button type="button" class="btn btn-default bg-white btn-flat add_new_customer" data-name=""  <?php if(!auth()->user()->can('customer.create')): ?> disabled <?php endif; ?>><i class="fa fa-plus-circle text-primary fa-lg"></i></button>
				</span>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-btn">
					<button type="button" class="btn btn-default bg-white btn-flat" data-toggle="modal" data-target="#configure_search_modal" title="<?php echo e(__('lang_v1.configure_product_search'), false); ?>"><i class="fa fa-barcode"></i></button>
				</div>
				<?php echo Form::text('search_product', null, ['class' => 'form-control mousetrap', 'id' => 'search_product', 'placeholder' => __('lang_v1.search_product_placeholder'),
				'autofocus' => true,
				]); ?>

				<span class="input-group-btn">

					<!-- Show button for weighing scale modal -->
					<?php if(isset($pos_settings['enable_weighing_scale']) && $pos_settings['enable_weighing_scale'] == 1): ?>
						<button type="button" class="btn btn-default bg-white btn-flat" id="weighing_scale_btn" data-toggle="modal" data-target="#weighing_scale_modal" 
						title="<?php echo app('translator')->get('lang_v1.weighing_scale'); ?>"><i class="fa fa-digital-tachograph text-primary fa-lg"></i></button>
					<?php endif; ?>

					<button type="button" class="btn btn-default bg-white btn-flat pos_add_quick_product" data-href="<?php echo e(action('ProductController@quickAdd'), false); ?>" data-container=".quick_add_product_modal"><i class="fa fa-plus-circle text-primary fa-lg"></i></button>
				</span>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<?php if(!empty($pos_settings['show_invoice_layout'])): ?>
	<div class="col-md-4">
		<div class="form-group">
		<?php echo Form::select('invoice_layout_id', 
					$invoice_layouts, $transaction->location->invoice_layout_id, ['class' => 'form-control select2', 'placeholder' => __('lang_v1.select_invoice_layout'), 'id' => 'invoice_layout_id']); ?>

		</div>
	</div>
	<?php endif; ?>
	<input type="hidden" name="pay_term_number" id="pay_term_number" value="<?php echo e($transaction->pay_term_number, false); ?>">
	<input type="hidden" name="pay_term_type" id="pay_term_type" value="<?php echo e($transaction->pay_term_type, false); ?>">
	
	<?php if(!empty($commission_agent)): ?>
		<div class="col-sm-4">
			<div class="form-group">
			<?php echo Form::select('commission_agent', 
						$commission_agent, $transaction->commission_agent, ['class' => 'form-control select2', 'placeholder' => __('lang_v1.commission_agent')]); ?>

			</div>
		</div>
		<?php endif; ?>
	<?php if(!empty($pos_settings['enable_transaction_date'])): ?>
		<div class="col-md-4 col-sm-6">
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</span>
					<?php echo Form::text('transaction_date', \Carbon::createFromTimestamp(strtotime($transaction->transaction_date))->format(session('business.date_format') . ' ' . 'H:i'), ['class' => 'form-control', 'readonly', 'required', 'id' => 'transaction_date']); ?>

				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php if(config('constants.enable_sell_in_diff_currency') == true): ?>
		<div class="col-md-4 col-sm-6">
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fas fa-exchange-alt"></i>
					</span>
					<?php echo Form::text('exchange_rate', number_format($transaction->exchange_rate, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input-sm input_number', 'placeholder' => __('lang_v1.currency_exchange_rate'), 'id' => 'exchange_rate']); ?>

				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php if(!empty($transaction->selling_price_group_id)): ?>
		<div class="col-md-4 col-sm-6">
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fas fa-money-bill-alt"></i>
					</span>
					<?php echo Form::hidden('price_group', $transaction->selling_price_group_id, ['id' => 'price_group']); ?>

					<?php echo Form::text('price_group_text', $transaction->price_group->name, ['class' => 'form-control', 'readonly']); ?>

					<span class="input-group-addon">
					<?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.price_group_help_text') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
				</span> 
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php if(in_array('types_of_service', $enabled_modules) && !empty($transaction->types_of_service)): ?>
		<div class="col-md-4 col-sm-6">
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fas fa-external-link-square-alt text-primary service_modal_btn"></i>
					</span>
					<?php echo Form::text('types_of_service_text', $transaction->types_of_service->name, ['class' => 'form-control', 'readonly']); ?>


					<?php echo Form::hidden('types_of_service_id', $transaction->types_of_service_id, ['id' => 'types_of_service_id']); ?>

					<span class="input-group-addon">
						<?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.types_of_service_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
					</span> 
				</div>
				<small><p class="help-block <?php if(empty($transaction->selling_price_group_id)): ?> hide <?php endif; ?>" id="price_group_text"><?php echo app('translator')->get('lang_v1.price_group'); ?>: <span><?php if(!empty($transaction->selling_price_group_id)): ?><?php echo e($transaction->price_group->name, false); ?><?php endif; ?></span></p></small>
			</div>
		</div>
		<div class="modal fade types_of_service_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
			<?php if(!empty($transaction->types_of_service)): ?>
				<?php echo $__env->make('types_of_service.pos_form_modal', ['types_of_service' => $transaction->types_of_service], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	<?php if($transaction->status == 'draft' && !empty($pos_settings['show_invoice_scheme'])): ?>
		<div class="col-sm-3">
			<div class="form-group">
				<?php echo Form::select('invoice_scheme_id', $invoice_schemes, $default_invoice_schemes->id, ['class' => 'form-control', 'placeholder' => __('lang_v1.select_invoice_scheme')]); ?>

			</div>
		</div>
	<?php endif; ?>
	<!-- Call restaurant module if defined -->
    <?php if(in_array('tables' ,$enabled_modules) || in_array('service_staff' ,$enabled_modules)): ?>
    	<span id="restaurant_module_span" 
    		data-transaction_id="<?php echo e($transaction->id, false); ?>">
      		<div class="col-md-3"></div>
    	</span>
    <?php endif; ?>
    <?php if(in_array('subscription', $enabled_modules)): ?>
		<div class="col-md-4 col-sm-6">
			<label>
              <?php echo Form::checkbox('is_recurring', 1, $transaction->is_recurring, ['class' => 'input-icheck', 'id' => 'is_recurring']); ?> <?php echo app('translator')->get('lang_v1.subscribe'); ?>?
            </label><button type="button" data-toggle="modal" data-target="#recurringInvoiceModal" class="btn btn-link"><i class="fa fa-external-link-square-alt"></i></button><?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.recurring_invoice_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
		</div>
	<?php endif; ?>
</div>
<!-- include module fields -->
<?php if(!empty($pos_module_data)): ?>
    <?php $__currentLoopData = $pos_module_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(!empty($value['view_path'])): ?>
            <?php if ($__env->exists($value['view_path'], ['view_data' => $value['view_data']])) echo $__env->make($value['view_path'], ['view_data' => $value['view_data']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<div class="row">
	<div class="col-sm-12 pos_product_div">
		<input type="hidden" name="sell_price_tax" id="sell_price_tax" value="<?php echo e($business_details->sell_price_tax, false); ?>">

		<!-- Keeps count of product rows -->
		<input type="hidden" id="product_row_count" 
			value="<?php echo e(count($sell_details), false); ?>">
		<?php
			$hide_tax = '';
			if( session()->get('business.enable_inline_tax') == 0){
				$hide_tax = 'hide';
			}
		?>
		<table class="table table-condensed table-bordered table-striped table-responsive" id="pos_table">
			<thead>
				<tr>
					<th class="tex-center <?php if(!empty($pos_settings['inline_service_staff'])): ?> col-md-3 <?php else: ?> col-md-4 <?php endif; ?>">	
						<?php echo app('translator')->get('sale.product'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.tooltip_sell_product_column') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
					</th>
					<th class="text-center col-md-3">
						<?php echo app('translator')->get('sale.qty'); ?>
					</th>
					<?php if(!empty($pos_settings['inline_service_staff'])): ?>
						<th class="text-center col-md-2">
							<?php echo app('translator')->get('restaurant.service_staff'); ?>
						</th>
					<?php endif; ?>
					<th class="text-center col-md-2 hidden">
						<?php echo app('translator')->get('sale.price_inc_tax'); ?>
					</th>
					<th class="text-center col-md-2">
						<?php echo app('translator')->get('sale.subtotal'); ?>
					</th>
					<th class="text-center"><i class="fas fa-times" aria-hidden="true"></i></th>
				</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $sell_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sell_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php echo $__env->make('sale_pos.product_row',
					['product' => $sell_line, 
					'row_count' => $loop->index, 
					'tax_dropdown' => $taxes, 
					'sub_units' => !empty($sell_line->unit_details) ? $sell_line->unit_details : [],
					'action' => 'edit'
				], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
	</div>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/sale_pos/partials/pos_form_edit.blade.php ENDPATH**/ ?>