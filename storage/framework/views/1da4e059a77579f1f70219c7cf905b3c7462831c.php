<?php
	if (!empty($status) && $status == 'quotation') {
		$title = __('lang_v1.add_quotation');
	} else if (!empty($status) && $status == 'draft') {
		$title = __('lang_v1.add_draft');
	} else {
		$title = __('sale.add_sale');
	}
?>

<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e($title, false); ?></h1>
</section>
<!-- Main content -->
<section class="content no-print">
<input type="hidden" id="amount_rounding_method" value="<?php echo e($pos_settings['amount_rounding_method'] ?? '', false); ?>">
<?php if(!empty($pos_settings['allow_overselling'])): ?>
	<input type="hidden" id="is_overselling_allowed">
<?php endif; ?>
<?php if(session('business.enable_rp') == 1): ?>
    <input type="hidden" id="reward_point_enabled">
<?php endif; ?>

<?php if(count($business_locations) > 0): ?>
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<i class="fa fa-map-marker"></i>
				</span>
			<?php echo Form::select('select_location_id', $business_locations,  null, ['class' => 'form-control ',
			'id' => 'select_location_id', 
			'required', 'autofocus','placeholder'=>__('lang_v1.select_location')], $bl_attributes); ?>

			<span class="input-group-addon">
					<?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.sale_location') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
				</span> 
			</div>
		</div>
	</div>

</div>
<?php endif; ?>

<?php
	$custom_labels = json_decode(session('business.custom_labels'), true);
?>

<input type="hidden" id="item_addition_method" value="<?php echo e($business_details->item_addition_method, false); ?>">
	<?php echo Form::open(['url' => action('SellPosController@store'), 'method' => 'post', 'id' => 'add_sell_form', 'files' => true ]); ?>

	<div class="row">
		<div class="col-md-12 col-sm-12">
			<?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
				<?php echo Form::hidden('location_id', !empty($default_location) ? $default_location->id : null , ['id' => 'location_id', 'data-receipt_printer_type' => !empty($default_location->receipt_printer_type) ? $default_location->receipt_printer_type : 'browser', 'data-default_payment_accounts' => !empty($default_location) ? $default_location->default_payment_accounts : '']); ?>



				<?php if(in_array('types_of_service', $enabled_modules) && !empty($types_of_service)): ?>
					<div class="col-md-4 col-sm-6">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-external-link-square-alt text-primary service_modal_btn"></i>
								</span>
								<?php echo Form::select('types_of_service_id', $types_of_service, null, ['class' => 'form-control', 'id' => 'types_of_service_id', 'style' => 'width: 100%;', 'placeholder' => __('lang_v1.select_types_of_service')]); ?>


								<?php echo Form::hidden('types_of_service_price_group', null, ['id' => 'types_of_service_price_group']); ?>


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
							<small><p class="help-block hide" id="price_group_text"><?php echo app('translator')->get('lang_v1.price_group'); ?>: <span></span></p></small>
						</div>
					</div>
					<div class="modal fade types_of_service_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel"></div>
				<?php endif; ?>
				
				<?php if(in_array('subscription', $enabled_modules)): ?>
					<div class="col-md-4  col-sm-6">
						<div class="checkbox">
							<label>
				              <?php echo Form::checkbox('is_recurring', 1, false, ['class' => 'input-icheck', 'id' => 'is_recurring']); ?> <?php echo app('translator')->get('lang_v1.subscribe'); ?>?
				            </label><button type="button" data-toggle="modal" data-target="#recurringInvoiceModal" class="btn btn-link"><i class="fa fa-external-link"></i></button><?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.recurring_invoice_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
						</div>
					</div>
				<?php endif; ?>
				<div class="clearfix"></div>

				<div class="col-sm-3">
					<div class="form-group">
						<?php echo Form::label('contact_id', __('contact.customer') . ':*'); ?>

						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-user"></i>
							</span>
							<input type="hidden" id="default_customer_id" 
							value="<?php echo e($walk_in_customer['id'], false); ?>" >
							<input type="hidden" id="default_customer_name" 
							value="<?php echo e($walk_in_customer['name'], false); ?>" >

							<input type="hidden" id="default_customer_balance" value="<?php echo e($walk_in_customer['balance'] ?? '', false); ?>" >
							<input type="hidden" id="default_customer_address" value="<?php echo e($walk_in_customer['shipping_address'] ?? '', false); ?>" >
							<?php if(!empty($walk_in_customer['price_calculation_type']) && $walk_in_customer['price_calculation_type'] == 'selling_price_group'): ?>
								<input type="hidden" id="default_selling_price_group" 
							value="<?php echo e($walk_in_customer['selling_price_group_id'] ?? '', false); ?>" >
							<?php endif; ?>
							<?php echo Form::select('contact_id',$contacts, null, ['class' => 'form-control mousetrap select2', 'id' => 'customer_id',  'required']); ?>

							<span class="input-group-btn">
								<button type="button" class="btn btn-default bg-white btn-flat add_new_customer" data-name=""><i class="fa fa-plus-circle text-primary fa-lg"></i></button>
							</span>
						</div>
					</div>
					
				</div>

				<?php if(!empty($price_groups)): ?>
					<?php if(count($price_groups) > 0): ?>
						<div class="col-sm-3">
							<?php echo Form::label('pay_term_number', __('lang_v1.pricgroup') . ':'); ?>

							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fas fa-money-bill-alt"></i>
									</span>
									<?php
										reset($price_groups);
									?>
									<?php echo Form::hidden('hidden_price_group', key($price_groups), ['id' => 'hidden_price_group']); ?>

									<?php echo Form::select('price_group', $price_groups, 0, ['class' => 'form-control select2', 'id' => 'price_group','placeholder'=>__('lang_v1.select.pricgroup')]); ?>

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
					<?php else: ?>
						<?php
							reset($price_groups);
						?>
						<?php echo Form::hidden('price_group', key($price_groups), ['id' => 'price_group']); ?>

					<?php endif; ?>
				<?php endif; ?>

				<?php echo Form::hidden('default_price_group', null, ['id' => 'default_price_group']); ?>



				<div class="col-sm-3">
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
		              <?php echo Form::number('pay_term_number', $walk_in_customer['pay_term_number'], ['class' => 'form-control width-40 pull-left', 'placeholder' => __('contact.pay_term')]); ?>


		              <?php echo Form::select('pay_term_type', 
		              	['months' => __('lang_v1.months'), 
		              		'days' => __('lang_v1.days')], 
		              		$walk_in_customer['pay_term_type'], 
		              	['class' => 'form-control width-60 pull-left','placeholder' => __('messages.please_select')]); ?>

		            </div>
		          </div>
		        </div>

				<?php if(!empty($commission_agent)): ?>
				<div class="col-sm-3">
					<div class="form-group">
					<?php echo Form::label('commission_agent', __('lang_v1.commission_agent') . ':'); ?>

					<?php echo Form::select('commission_agent', 
								$commission_agent, null, ['class' => 'form-control select2']); ?>

					</div>
				</div>
				<?php endif; ?>

				<div class="clearfix"></div>
			
				<div class="col-sm-3">
					<div class="form-group">
						<?php echo Form::label('transaction_date', __('sale.sale_date') . ':*'); ?>

						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</span>
							<?php echo Form::text('transaction_date', $default_datetime, ['class' => 'form-control', 'readonly', 'required']); ?>

						</div>
					</div>
				</div>
				<?php if(!empty($status)): ?>
					<input type="hidden" name="status" id="status" value="<?php echo e($status, false); ?>">
				<?php else: ?>
					<div class="<?php if(!empty($commission_agent)): ?> col-sm-3 <?php else: ?> col-sm-4 <?php endif; ?>">
						<div class="form-group">
							<?php echo Form::label('status', __('sale.status') . ':*'); ?>

							
							<?php echo Form::select('status', ['final' => __('sale.final'), 'draft' => __('sale.draft'),'proforma' => __('lang_v1.proforma')], 'final', ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required']); ?>

						</div>
					</div>
				<?php endif; ?>
				<div class="col-sm-3 hide">
					<div class="form-group">
						<?php echo Form::label('invoice_scheme_id', __('invoice.invoice_scheme') . ':'); ?>

						<?php echo Form::select('invoice_scheme_id', $invoice_schemes, $default_invoice_schemes->id, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select')]); ?>

					</div>
				</div>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_invoice_number')): ?>
				<div class="col-sm-3">
					<div class="form-group">
						<?php echo Form::label('invoice_no', __('sale.invoice_no') . ':'); ?>

						<?php echo Form::text('invoice_no', null, ['class' => 'form-control', 'placeholder' => __('sale.invoice_no')]); ?>

						
					</div>
				</div>
				<?php endif; ?>
				<?php
			        $custom_field_1_label = !empty($custom_labels['sell']['custom_field_1']) ? $custom_labels['sell']['custom_field_1'] : '';

			        $is_custom_field_1_required = !empty($custom_labels['sell']['is_custom_field_1_required']) && $custom_labels['sell']['is_custom_field_1_required'] == 1 ? true : false;

			        $custom_field_2_label = !empty($custom_labels['sell']['custom_field_2']) ? $custom_labels['sell']['custom_field_2'] : '';

			        $is_custom_field_2_required = !empty($custom_labels['sell']['is_custom_field_2_required']) && $custom_labels['sell']['is_custom_field_2_required'] == 1 ? true : false;

			        $custom_field_3_label = !empty($custom_labels['sell']['custom_field_3']) ? $custom_labels['sell']['custom_field_3'] : '';

			        $is_custom_field_3_required = !empty($custom_labels['sell']['is_custom_field_3_required']) && $custom_labels['sell']['is_custom_field_3_required'] == 1 ? true : false;

			        $custom_field_4_label = !empty($custom_labels['sell']['custom_field_4']) ? $custom_labels['sell']['custom_field_4'] : '';

			        $is_custom_field_4_required = !empty($custom_labels['sell']['is_custom_field_4_required']) && $custom_labels['sell']['is_custom_field_4_required'] == 1 ? true : false;
		        ?>
		        <?php if(!empty($custom_field_1_label)): ?>
		        	<?php
		        		$label_1 = $custom_field_1_label . ':';
		        		if($is_custom_field_1_required) {
		        			$label_1 .= '*';
		        		}
		        	?>

		        	<div class="col-md-4">
				        <div class="form-group">
				            <?php echo Form::label('custom_field_1', $label_1 ); ?>

				            <?php echo Form::text('custom_field_1', null, ['class' => 'form-control','placeholder' => $custom_field_1_label, 'required' => $is_custom_field_1_required]); ?>

				        </div>
				    </div>
		        <?php endif; ?>
		        <?php if(!empty($custom_field_2_label)): ?>
		        	<?php
		        		$label_2 = $custom_field_2_label . ':';
		        		if($is_custom_field_2_required) {
		        			$label_2 .= '*';
		        		}
		        	?>

		        	<div class="col-md-4">
				        <div class="form-group">
				            <?php echo Form::label('custom_field_2', $label_2 ); ?>

				            <?php echo Form::text('custom_field_2', null, ['class' => 'form-control','placeholder' => $custom_field_2_label, 'required' => $is_custom_field_2_required]); ?>

				        </div>
				    </div>
		        <?php endif; ?>
		        <?php if(!empty($custom_field_3_label)): ?>
		        	<?php
		        		$label_3 = $custom_field_3_label . ':';
		        		if($is_custom_field_3_required) {
		        			$label_3 .= '*';
		        		}
		        	?>

		        	<div class="col-md-4">
				        <div class="form-group">
				            <?php echo Form::label('custom_field_3', $label_3 ); ?>

				            <?php echo Form::text('custom_field_3', null, ['class' => 'form-control','placeholder' => $custom_field_3_label, 'required' => $is_custom_field_3_required]); ?>

				        </div>
				    </div>
		        <?php endif; ?>
		        <?php if(!empty($custom_field_4_label)): ?>
		        	<?php
		        		$label_4 = $custom_field_4_label . ':';
		        		if($is_custom_field_4_required) {
		        			$label_4 .= '*';
		        		}
		        	?>

		        	<div class="col-md-4">
				        <div class="form-group">
				            <?php echo Form::label('custom_field_4', $label_4 ); ?>

				            <?php echo Form::text('custom_field_4', null, ['class' => 'form-control','placeholder' => $custom_field_4_label, 'required' => $is_custom_field_4_required]); ?>

				        </div>
				    </div>
		        <?php endif; ?>
		        <div class="col-sm-3">
	                <div class="form-group">
	                    <?php echo Form::label('upload_document', __('purchase.attach_document') . ':'); ?>

	                    <?php echo Form::file('sell_document', ['id' => 'upload_document', 'accept' => implode(',', array_keys(config('constants.document_upload_mimes_types')))]); ?>

	                   
	                </div>
	            </div>
		        <div class="clearfix"></div>
				<!-- Call restaurant module if defined -->
		        <?php if(in_array('tables' ,$enabled_modules) || in_array('service_staff' ,$enabled_modules)): ?>
		        	<span id="restaurant_module_span">
		        	</span>
		        <?php endif; ?>
			<?php echo $__env->renderComponent(); ?>

			<?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
				<div class="col-sm-10 col-sm-offset-1">
					
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-btn">
								<button type="button" class="btn btn-default bg-white btn-flat" data-toggle="modal" data-target="#configure_search_modal" title="<?php echo e(__('lang_v1.configure_product_search'), false); ?>"><i class="fa fa-barcode"></i></button>
							</div>
							<?php echo Form::text('search_product', null, ['class' => 'form-control mousetrap',
							 'id' => 'search_product',
							  'placeholder' => __('lang_v1.search_product_placeholder'),
							'disabled'=>'true',
							'autofocus' => is_null($default_location)? false : true,
							]); ?>


							<span class="input-group-btn">
								<button type="button" class="btn btn-default bg-white btn-flat pos_add_quick_product" data-href="<?php echo e(action('ProductController@quickAdd'), false); ?>" data-container=".quick_add_product_modal"><i class="fa fa-plus-circle text-primary fa-lg"></i></button>
							</span>
						</div>
					</div>
				</div>

				<div class="row col-sm-12 pos_product_div" style="min-height: 0">

					<input type="hidden" name="sell_price_tax" id="sell_price_tax" value="<?php echo e($business_details->sell_price_tax, false); ?>">

					<!-- Keeps count of product rows -->
					<input type="hidden" id="product_row_count" value="0">
					<?php
						$hide_tax = '';
						if( session()->get('business.enable_inline_tax') == 0){
							$hide_tax = 'hide';
						}
					?>



					
					<div class="table-responsive">
					<table class="table table-condensed table-bordered table-striped table-responsive" id="pos_table">
						<thead>
							<tr>
								<th class="text-center">	
									<?php echo app('translator')->get('sale.product'); ?>
								</th>
								<th class="text-center">
									<?php echo app('translator')->get('sale.qty'); ?>
								</th>
								<?php if(!empty($pos_settings['inline_service_staff'])): ?>
									<th class="text-center">
										<?php echo app('translator')->get('restaurant.service_staff'); ?>
									</th>
								<?php endif; ?>

								<th <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_product_price_from_sale_screen')): ?>) hide <?php endif; ?>>
									<?php echo app('translator')->get('sale.unit_price'); ?>
								</th>

								<th <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_product_discount_from_sale_screen')): ?> hide <?php endif; ?>>
									<?php echo app('translator')->get('receipt.discount'); ?>
								</th>

								<th class="text-center <?php echo e($hide_tax, false); ?>">
									<?php echo app('translator')->get('sale.tax'); ?>
								</th>

								<th class="text-center hide">
									<?php echo app('translator')->get('sale.price_inc_tax'); ?>
								</th>

								<?php if(!empty($warranties)): ?>
									<th><?php echo app('translator')->get('lang_v1.warranty'); ?></th>
								<?php endif; ?>

								<th class="text-center">
									<?php echo app('translator')->get('sale.subtotal'); ?>
								</th>

								<th class="text-center">
									<i class="fas fa-times" aria-hidden="true"></i>
								</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
					</div>


					
					<div class="table-responsive">
				    	<table class="table table-condensed table-bordered table-striped">
						<tr>
							<td>
								<div class="pull-right">
								<b><?php echo app('translator')->get('sale.item'); ?>:</b> 
								<span class="total_quantity">0</span>
								&nbsp;&nbsp;&nbsp;&nbsp;
								<b><?php echo app('translator')->get('sale.total'); ?>: </b>
									<span class="price_total">0</span>
								</div>
							</td>
						</tr>
					</table>
					</div>
				</div>
			<?php echo $__env->renderComponent(); ?>
			<?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
				<div class="col-md-4">
			        <div class="form-group">
			            <?php echo Form::label('discount_type', __('sale.discount_type') . ':*' ); ?>

			            <div class="input-group">
			                <span class="input-group-addon">
			                    <i class="fa fa-info"></i>
			                </span>
			                <?php echo Form::select('discount_type', ['fixed' => __('lang_v1.fixed'), 'percentage' => __('lang_v1.percentage')], 'percentage' , ['class' => 'form-control','placeholder' => __('messages.please_select'), 'required', 'data-default' => 'percentage']); ?>

			            </div>
			        </div>
			    </div>
			    <?php
			    	$max_discount = !is_null(auth()->user()->max_sales_discount_percent) ? auth()->user()->max_sales_discount_percent : '';

			    	//if sale discount is more than user max discount change it to max discount
			    	$sales_discount = $business_details->default_sales_discount;
			    	if($max_discount != '' && $sales_discount > $max_discount) $sales_discount = $max_discount;
			    ?>
			    <div class="col-md-4">
			        <div class="form-group">
			            <?php echo Form::label('discount_amount', __('sale.discount_amount') . ':*' ); ?>

			            <div class="input-group">
			                <span class="input-group-addon">
			                    <i class="fa fa-info"></i>
			                </span>
			                <?php echo Form::text('discount_amount', number_format($sales_discount, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input_number', 'data-default' => $sales_discount, 'data-max-discount' => $max_discount, 'data-max-discount-error_msg' => __('lang_v1.max_discount_error_msg', ['discount' => $max_discount != '' ? number_format($max_discount, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']) : '']) ]); ?>

			            </div>
			        </div>
			    </div>
			    <div class="col-md-4"><br>
			    	<b><?php echo app('translator')->get( 'sale.discount_amount' ); ?>:</b>(-) 
					<span class="display_currency" id="total_discount">0</span>
			    </div>
			    <div class="clearfix"></div>
			    <div class="col-md-12 well well-sm bg-light-gray <?php if(session('business.enable_rp') != 1): ?> hide <?php endif; ?>">
			    	<input type="hidden" name="rp_redeemed" id="rp_redeemed" value="0">
			    	<input type="hidden" name="rp_redeemed_amount" id="rp_redeemed_amount" value="0">
			    	<div class="col-md-12"><h4><?php echo e(session('business.rp_name'), false); ?></h4></div>
			    	<div class="col-md-4">
				        <div class="form-group">
				            <?php echo Form::label('rp_redeemed_modal', __('lang_v1.redeemed') . ':' ); ?>

				            <div class="input-group">
				                <span class="input-group-addon">
				                    <i class="fa fa-gift"></i>
				                </span>
				                <?php echo Form::number('rp_redeemed_modal', 0, ['class' => 'form-control direct_sell_rp_input', 'data-amount_per_unit_point' => session('business.redeem_amount_per_unit_rp'), 'min' => 0, 'data-max_points' => 0, 'data-min_order_total' => session('business.min_order_total_for_redeem') ]); ?>

				                <input type="hidden" id="rp_name" value="<?php echo e(session('business.rp_name'), false); ?>">
				            </div>
				        </div>
				    </div>
				    <div class="col-md-4">
				    	<p><strong><?php echo app('translator')->get('lang_v1.available'); ?>:</strong> <span id="available_rp">0</span></p>
				    </div>
				    <div class="col-md-4">
				    	<p><strong><?php echo app('translator')->get('lang_v1.redeemed_amount'); ?>:</strong> (-)<span id="rp_redeemed_amount_text">0</span></p>
				    </div>
			    </div>
			    <div class="clearfix"></div>
			    <div class="col-md-4">
			    	<div class="form-group">
			            <?php echo Form::label('tax_rate_id', __('sale.order_tax') . ':*' ); ?>

			            <div class="input-group">
			                <span class="input-group-addon">
			                    <i class="fa fa-info"></i>
			                </span>
			                <?php echo Form::select('tax_rate_id', $taxes['tax_rates'], $business_details->default_sales_tax, ['placeholder' => __('messages.please_select'), 'class' => 'form-control', 'data-default'=> $business_details->default_sales_tax], $taxes['attributes']); ?>


							<input type="hidden" name="tax_calculation_amount" id="tax_calculation_amount" 
							value="<?php if(empty($edit)): ?> <?php echo e(number_format($business_details->tax_calculation_amount, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php else: ?> <?php echo e(number_format(optional($transaction->tax)->amount, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php endif; ?>" data-default="<?php echo e($business_details->tax_calculation_amount, false); ?>">
			            </div>
			        </div>
			    </div>
			    <div class="col-md-4 col-md-offset-4">
			    	<b><?php echo app('translator')->get( 'sale.order_tax' ); ?>:</b>(+) 
					<span class="display_currency" id="order_tax">0</span>
			    </div>				
				
			    <div class="col-md-12">
			    	<div class="form-group">
						<?php echo Form::label('sell_note',__('sale.sell_note')); ?>

						<?php echo Form::textarea('sale_note', null, ['class' => 'form-control', 'rows' => 3]); ?>

					</div>
			    </div>
				<input type="hidden" name="is_direct_sale" value="1">
			<?php echo $__env->renderComponent(); ?>
			<?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
			<div class="col-md-4">
				<div class="form-group">
		            <?php echo Form::label('shipping_details', __('sale.shipping_details')); ?>

		            <?php echo Form::textarea('shipping_details',null, ['class' => 'form-control','placeholder' => __('sale.shipping_details') ,'rows' => '3', 'cols'=>'30']); ?>

		        </div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
		            <?php echo Form::label('shipping_address', __('lang_v1.shipping_address')); ?>

		            <?php echo Form::textarea('shipping_address',null, ['class' => 'form-control','placeholder' => __('lang_v1.shipping_address') ,'rows' => '3', 'cols'=>'30']); ?>

		        </div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<?php echo Form::label('shipping_charges', __('sale.shipping_charges')); ?>

					<div class="input-group">
					<span class="input-group-addon">
					<i class="fa fa-info"></i>
					</span>
					<?php echo Form::text('shipping_charges',number_format(0.00, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']),['class'=>'form-control input_number','placeholder'=> __('sale.shipping_charges')]); ?>

					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="col-md-4">
				<div class="form-group">
		            <?php echo Form::label('shipping_status', __('lang_v1.shipping_status')); ?>

		            <?php echo Form::select('shipping_status',$shipping_statuses, null, ['class' => 'form-control','placeholder' => __('messages.please_select')]); ?>

		        </div>
			</div>
			<div class="col-md-4">
		        <div class="form-group">
		            <?php echo Form::label('delivered_to', __('lang_v1.delivered_to') . ':' ); ?>

		            <?php echo Form::text('delivered_to', null, ['class' => 'form-control','placeholder' => __('lang_v1.delivered_to')]); ?>

		        </div>
		    </div>
		    <?php
		        $shipping_custom_label_1 = !empty($custom_labels['shipping']['custom_field_1']) ? $custom_labels['shipping']['custom_field_1'] : '';

		        $is_shipping_custom_field_1_required = !empty($custom_labels['shipping']['is_custom_field_1_required']) && $custom_labels['shipping']['is_custom_field_1_required'] == 1 ? true : false;

		        $shipping_custom_label_2 = !empty($custom_labels['shipping']['custom_field_2']) ? $custom_labels['shipping']['custom_field_2'] : '';

		        $is_shipping_custom_field_2_required = !empty($custom_labels['shipping']['is_custom_field_2_required']) && $custom_labels['shipping']['is_custom_field_2_required'] == 1 ? true : false;

		        $shipping_custom_label_3 = !empty($custom_labels['shipping']['custom_field_3']) ? $custom_labels['shipping']['custom_field_3'] : '';
		        
		        $is_shipping_custom_field_3_required = !empty($custom_labels['shipping']['is_custom_field_3_required']) && $custom_labels['shipping']['is_custom_field_3_required'] == 1 ? true : false;

		        $shipping_custom_label_4 = !empty($custom_labels['shipping']['custom_field_4']) ? $custom_labels['shipping']['custom_field_4'] : '';
		        
		        $is_shipping_custom_field_4_required = !empty($custom_labels['shipping']['is_custom_field_4_required']) && $custom_labels['shipping']['is_custom_field_4_required'] == 1 ? true : false;

		        $shipping_custom_label_5 = !empty($custom_labels['shipping']['custom_field_5']) ? $custom_labels['shipping']['custom_field_5'] : '';
		        
		        $is_shipping_custom_field_5_required = !empty($custom_labels['shipping']['is_custom_field_5_required']) && $custom_labels['shipping']['is_custom_field_5_required'] == 1 ? true : false;
	        ?>

	        <?php if(!empty($shipping_custom_label_1)): ?>
	        	<?php
	        		$label_1 = $shipping_custom_label_1 . ':';
	        		if($is_shipping_custom_field_1_required) {
	        			$label_1 .= '*';
	        		}
	        	?>

	        	<div class="col-md-4">
			        <div class="form-group">
			            <?php echo Form::label('shipping_custom_field_1', $label_1 ); ?>

			            <?php echo Form::text('shipping_custom_field_1', null, ['class' => 'form-control','placeholder' => $shipping_custom_label_1, 'required' => $is_shipping_custom_field_1_required]); ?>

			        </div>
			    </div>
	        <?php endif; ?>
	        <?php if(!empty($shipping_custom_label_2)): ?>
	        	<?php
	        		$label_2 = $shipping_custom_label_2 . ':';
	        		if($is_shipping_custom_field_2_required) {
	        			$label_2 .= '*';
	        		}
	        	?>

	        	<div class="col-md-4">
			        <div class="form-group">
			            <?php echo Form::label('shipping_custom_field_2', $label_2 ); ?>

			            <?php echo Form::text('shipping_custom_field_2', null, ['class' => 'form-control','placeholder' => $shipping_custom_label_2, 'required' => $is_shipping_custom_field_2_required]); ?>

			        </div>
			    </div>
	        <?php endif; ?>
	        <?php if(!empty($shipping_custom_label_3)): ?>
	        	<?php
	        		$label_3 = $shipping_custom_label_3 . ':';
	        		if($is_shipping_custom_field_3_required) {
	        			$label_3 .= '*';
	        		}
	        	?>

	        	<div class="col-md-4">
			        <div class="form-group">
			            <?php echo Form::label('shipping_custom_field_3', $label_3 ); ?>

			            <?php echo Form::text('shipping_custom_field_3', null, ['class' => 'form-control','placeholder' => $shipping_custom_label_3, 'required' => $is_shipping_custom_field_3_required]); ?>

			        </div>
			    </div>
	        <?php endif; ?>
	        <?php if(!empty($shipping_custom_label_4)): ?>
	        	<?php
	        		$label_4 = $shipping_custom_label_4 . ':';
	        		if($is_shipping_custom_field_4_required) {
	        			$label_4 .= '*';
	        		}
	        	?>

	        	<div class="col-md-4">
			        <div class="form-group">
			            <?php echo Form::label('shipping_custom_field_4', $label_4 ); ?>

			            <?php echo Form::text('shipping_custom_field_4', null, ['class' => 'form-control','placeholder' => $shipping_custom_label_4, 'required' => $is_shipping_custom_field_4_required]); ?>

			        </div>
			    </div>
	        <?php endif; ?>
	        <?php if(!empty($shipping_custom_label_5)): ?>
	        	<?php
	        		$label_5 = $shipping_custom_label_5 . ':';
	        		if($is_shipping_custom_field_5_required) {
	        			$label_5 .= '*';
	        		}
	        	?>

	        	<div class="col-md-4">
			        <div class="form-group">
			            <?php echo Form::label('shipping_custom_field_5', $label_5 ); ?>

			            <?php echo Form::text('shipping_custom_field_5', null, ['class' => 'form-control','placeholder' => $shipping_custom_label_5, 'required' => $is_shipping_custom_field_5_required]); ?>

			        </div>
			    </div>
	        <?php endif; ?>
	        <div class="col-md-4">
                <div class="form-group">
                    <?php echo Form::label('shipping_documents', __('lang_v1.shipping_documents') . ':'); ?>

                    <?php echo Form::file('shipping_documents[]', ['id' => 'shipping_documents', 'multiple', 'accept' => implode(',', array_keys(config('constants.document_upload_mimes_types')))]); ?>

                    <p class="help-block">
                    	<?php echo app('translator')->get('purchase.max_file_size', ['size' => (config('constants.document_size_limit') / 1000000)]); ?>
                    	<?php if ($__env->exists('components.document_help_text')) echo $__env->make('components.document_help_text', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </p>
                </div>
            </div>
	        <div class="clearfix"></div>
		    <div class="col-md-4 col-md-offset-8">
		    	<?php if(!empty($pos_settings['amount_rounding_method']) && $pos_settings['amount_rounding_method'] > 0): ?>
		    	<small id="round_off"><br>(<?php echo app('translator')->get('lang_v1.round_off'); ?>: <span id="round_off_text">0</span>)</small>
				<br/>
				<input type="hidden" name="round_off_amount" 
					id="round_off_amount" value=0>
				<?php endif; ?>
		    	<div><b><?php echo app('translator')->get('sale.total_payable'); ?>: </b>
					<input type="hidden" name="final_total" id="final_total_input">
					<span id="total_payable">0</span>
				</div>
		    </div>
			<?php echo $__env->renderComponent(); ?>
		</div>
	</div>
	<?php if(empty($status) || !in_array($status, ['quotation', 'draft'])): ?>
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sell.payments')): ?>
			<?php $__env->startComponent('components.widget', ['class' => 'box-solid', 'id' => "payment_rows_div", 'title' => __('purchase.add_payment')]); ?>
			<div class="payment_row">
				<div class="row">
					<div class="col-md-12 mb-12">
						<strong><?php echo app('translator')->get('lang_v1.advance_balance'); ?>:</strong> <span id="advance_balance_text"></span>
						<?php echo Form::hidden('advance_balance', null, ['id' => 'advance_balance', 'data-error-msg' => __('lang_v1.required_advance_balance_not_available')]); ?>

					</div>
				</div>
				<?php echo $__env->make('sale_pos.partials.payment_row_form', ['row_index' => 0, 'show_date' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<hr>
				<div class="row">
					<div class="col-sm-12">
						<div class="pull-right"><strong><?php echo app('translator')->get('lang_v1.balance'); ?>:</strong> <span class="balance_due">0.00</span></div>
					</div>
				</div>
			</div>
			<?php echo $__env->renderComponent(); ?>
		<?php endif; ?>
	<?php endif; ?>

	<div class="row hide">
		<div class="col-lg-8">
			<div class="form-group">
				<label>بند إضافي :</label>
				<input type="text" name="transaction_add" class="form-control" >
			</div>
		</div>
		<div class="col-lg-2">
			<div class="form-group">
				<label>القيمة :</label>
				<input type="text" name="transaction_add_value" class="form-control" >
			</div>
		</div>

	</div>
	
	<div class="row">
		<?php echo Form::hidden('is_save_and_print', 0, ['id' => 'is_save_and_print']); ?>

		<div class="col-sm-12 text-right">
			<button type="button" id="submit-sell" class="btn btn-primary btn-flat"><?php echo app('translator')->get('messages.save'); ?></button>
			<button type="button" id="save-and-print" class="btn btn-primary btn-flat"><?php echo app('translator')->get('lang_v1.save_and_print'); ?></button>
		</div>
	</div>
	
	<?php if(empty($pos_settings['disable_recurring_invoice'])): ?>
		<?php echo $__env->make('sale_pos.partials.recurring_invoice_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php endif; ?>
	
	<?php echo Form::close(); ?>

</section>

<div class="modal fade contact_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
	<?php echo $__env->make('contact.create', ['quick_add' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<!-- /.content -->
<div class="modal fade register_details_modal" tabindex="-1" role="dialog" 
	aria-labelledby="gridSystemModalLabel">
</div>
<div class="modal fade close_register_modal" tabindex="-1" role="dialog" 
	aria-labelledby="gridSystemModalLabel">
</div>

<!-- quick product modal -->
<div class="modal fade quick_add_product_modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle"></div>

<?php echo $__env->make('sale_pos.partials.configure_search_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('js/pos.js?v=' . $asset_v), false); ?>"></script>
	<script src="<?php echo e(asset('js/product.js?v=' . $asset_v), false); ?>"></script>
	<script src="<?php echo e(asset('js/opening_stock.js?v=' . $asset_v), false); ?>"></script>
	<!-- Call restaurant module if defined -->
    <?php if(in_array('tables' ,$enabled_modules) || in_array('modifiers' ,$enabled_modules) || in_array('service_staff' ,$enabled_modules)): ?>
    	<script src="<?php echo e(asset('js/restaurant.js?v=' . $asset_v), false); ?>"></script>
    <?php endif; ?>
    <script type="text/javascript">
    	$(document).ready( function() {
    		$('#status').change(function(){
    			if ($(this).val() == 'final') {
    				$('#payment_rows_div').removeClass('hide');
    			} else {
    				$('#payment_rows_div').addClass('hide');
    			}
    		});
    		$('.paid_on').datetimepicker({
                format: moment_date_format + ' ' + moment_time_format,
                ignoreReadonly: true,
            });

            $('#shipping_documents').fileinput({
		        showUpload: false,
		        showPreview: false,
		        browseLabel: LANG.file_browse_label,
		        removeLabel: LANG.remove,
		    });
    	});
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/sell/create.blade.php ENDPATH**/ ?>