<!-- business information here -->
<?php
	$totals = ['taxable_value' => 0];
?>
<div class="row">

	<!-- Logo -->
	<?php if(!empty($receipt_details->logo)): ?>
		<img style="max-height: 120px; width: auto;" src="<?php echo e($receipt_details->logo, false); ?>" class="img img-responsive center-block">
	<?php endif; ?>

<!-- Header text -->
	<?php if(!empty($receipt_details->header_text)): ?>
		<div class="col-xs-12">
			<?php echo $receipt_details->header_text; ?>

		</div>
<?php endif; ?>

<!-- business information here -->
	<div class="col-xs-12 text-center">
		<h2 class="text-center">
			<!-- Shop & Location Name  -->
			<?php if(!empty($receipt_details->display_name)): ?>
				<?php echo e($receipt_details->display_name, false); ?>

			<?php endif; ?>
		</h2>

		<!-- Address -->
		<p>
			<?php if(!empty($receipt_details->address)): ?>
				<small class="text-center">
					<?php echo $receipt_details->address; ?>

				</small>
			<?php endif; ?>
			<?php if(!empty($receipt_details->contact)): ?>
				<br/><?php echo $receipt_details->contact; ?>

			<?php endif; ?>
			

			<?php if(!empty($receipt_details->location_custom_fields)): ?>
				<br><?php echo e($receipt_details->location_custom_fields, false); ?>

			<?php endif; ?>
		</p>
		<p>
			<?php if(!empty($receipt_details->sub_heading_line1)): ?>
				<?php echo e($receipt_details->sub_heading_line1, false); ?>

			<?php endif; ?>
			<?php if(!empty($receipt_details->sub_heading_line2)): ?>
				<br><?php echo e($receipt_details->sub_heading_line2, false); ?>

			<?php endif; ?>
			<?php if(!empty($receipt_details->sub_heading_line3)): ?>
				<br><?php echo e($receipt_details->sub_heading_line3, false); ?>

			<?php endif; ?>
			<?php if(!empty($receipt_details->sub_heading_line4)): ?>
				<br><?php echo e($receipt_details->sub_heading_line4, false); ?>

			<?php endif; ?>
			<?php if(!empty($receipt_details->sub_heading_line5)): ?>
				<br><?php echo e($receipt_details->sub_heading_line5, false); ?>

			<?php endif; ?>
		</p>
		<p>
			<?php if(!empty($receipt_details->tax_info1)): ?>
				<b><?php echo e($receipt_details->tax_label1, false); ?></b> <?php echo e($receipt_details->tax_info1, false); ?>

			<?php endif; ?>

			<?php if(!empty($receipt_details->tax_info2)): ?>
				<b><?php echo e($receipt_details->tax_label2, false); ?></b> <?php echo e($receipt_details->tax_info2, false); ?>

			<?php endif; ?>
		</p>

		<!-- Title of receipt -->
		<?php if(!empty($receipt_details->invoice_heading)): ?>
			<h3 class="text-center">
				<?php echo $receipt_details->invoice_heading; ?>

			</h3>
	<?php endif; ?>

	<!-- Invoice  number, Date  -->
		<p style="width: 100% !important" class="word-wrap">
			<span class="pull-left text-left word-wrap">
				<?php if(!empty($receipt_details->invoice_no_prefix)): ?>
					<b><?php echo $receipt_details->invoice_no_prefix; ?></b>
				<?php endif; ?>
				<?php echo e($receipt_details->invoice_no, false); ?>


				<?php if(!empty($receipt_details->types_of_service)): ?>
					<br/>
					<span class="pull-left text-left">
						<strong><?php echo $receipt_details->types_of_service_label; ?>:</strong>
					<?php echo e($receipt_details->types_of_service, false); ?>

					<!-- Waiter info -->
						<?php if(!empty($receipt_details->types_of_service_custom_fields)): ?>
							<?php $__currentLoopData = $receipt_details->types_of_service_custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<br><strong><?php echo e($key, false); ?>: </strong> <?php echo e($value, false); ?>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
					</span>
				<?php endif; ?>

			<!-- Table information-->
				<?php if(!empty($receipt_details->table_label) || !empty($receipt_details->table)): ?>
					<br/>
					<span class="pull-left text-left">
						<?php if(!empty($receipt_details->table_label)): ?>
							<b><?php echo $receipt_details->table_label; ?></b>
					<?php endif; ?>
					<?php echo e($receipt_details->table, false); ?>


					<!-- Waiter info -->
					</span>
				<?php endif; ?>

			<!-- customer info -->
				<?php if(!empty($receipt_details->customer_info)): ?>
					<br/>
					<b><?php echo e($receipt_details->customer_label, false); ?></b> <br> <?php echo $receipt_details->customer_info; ?> <br>
				<?php endif; ?>
				<?php if(!empty($receipt_details->client_id_label)): ?>
					<br/>
					<b><?php echo e($receipt_details->client_id_label, false); ?></b> <?php echo e($receipt_details->client_id, false); ?>

				<?php endif; ?>
				<?php if(!empty($receipt_details->customer_tax_label)): ?>
					<br/>
					<b><?php echo e($receipt_details->customer_tax_label, false); ?></b> <?php echo e($receipt_details->customer_tax_number, false); ?>

				<?php endif; ?>
				<?php if(!empty($receipt_details->customer_custom_fields)): ?>
					<br/><?php echo $receipt_details->customer_custom_fields; ?>

				<?php endif; ?>
				<?php if(!empty($receipt_details->sales_person_label)): ?>
					<br/>
					<b><?php echo e($receipt_details->sales_person_label, false); ?></b> <?php echo e($receipt_details->sales_person, false); ?>

				<?php endif; ?>
				<?php if(!empty($receipt_details->commission_agent_label)): ?>
					<br/>
					<strong><?php echo e($receipt_details->commission_agent_label, false); ?></strong> <?php echo e($receipt_details->commission_agent, false); ?>

				<?php endif; ?>
				<?php if(!empty($receipt_details->customer_rp_label)): ?>
					<br/>
					<strong><?php echo e($receipt_details->customer_rp_label, false); ?></strong> <?php echo e($receipt_details->customer_total_rp, false); ?>

				<?php endif; ?>
			</span>

			<span class="pull-right text-left">
				<b><?php echo e($receipt_details->date_label, false); ?></b> <?php echo e($receipt_details->invoice_date, false); ?>


				<?php if(!empty($receipt_details->due_date_label)): ?>
					<br><b><?php echo e($receipt_details->due_date_label, false); ?></b> <?php echo e($receipt_details->due_date ?? '', false); ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->brand_label) || !empty($receipt_details->repair_brand)): ?>
					<br>
					<?php if(!empty($receipt_details->brand_label)): ?>
						<b><?php echo $receipt_details->brand_label; ?></b>
					<?php endif; ?>
					<?php echo e($receipt_details->repair_brand, false); ?>

				<?php endif; ?>


				<?php if(!empty($receipt_details->device_label) || !empty($receipt_details->repair_device)): ?>
					<br>
					<?php if(!empty($receipt_details->device_label)): ?>
						<b><?php echo $receipt_details->device_label; ?></b>
					<?php endif; ?>
					<?php echo e($receipt_details->repair_device, false); ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->model_no_label) || !empty($receipt_details->repair_model_no)): ?>
					<br>
					<?php if(!empty($receipt_details->model_no_label)): ?>
						<b><?php echo $receipt_details->model_no_label; ?></b>
					<?php endif; ?>
					<?php echo e($receipt_details->repair_model_no, false); ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->serial_no_label) || !empty($receipt_details->repair_serial_no)): ?>
					<br>
					<?php if(!empty($receipt_details->serial_no_label)): ?>
						<b><?php echo $receipt_details->serial_no_label; ?></b>
					<?php endif; ?>
					<?php echo e($receipt_details->repair_serial_no, false); ?><br>
				<?php endif; ?>
				<?php if(!empty($receipt_details->repair_status_label) || !empty($receipt_details->repair_status)): ?>
					<?php if(!empty($receipt_details->repair_status_label)): ?>
						<b><?php echo $receipt_details->repair_status_label; ?></b>
					<?php endif; ?>
					<?php echo e($receipt_details->repair_status, false); ?><br>
				<?php endif; ?>

				<?php if(!empty($receipt_details->repair_warranty_label) || !empty($receipt_details->repair_warranty)): ?>
					<?php if(!empty($receipt_details->repair_warranty_label)): ?>
						<b><?php echo $receipt_details->repair_warranty_label; ?></b>
					<?php endif; ?>
					<?php echo e($receipt_details->repair_warranty, false); ?>

					<br>
				<?php endif; ?>

			<!-- Waiter info -->
				<?php if(!empty($receipt_details->service_staff_label) || !empty($receipt_details->service_staff)): ?>
					<br/>
					<?php if(!empty($receipt_details->service_staff_label)): ?>
						<b><?php echo $receipt_details->service_staff_label; ?></b>
					<?php endif; ?>
					<?php echo e($receipt_details->service_staff, false); ?>

				<?php endif; ?>
				<?php if(!empty($receipt_details->shipping_custom_field_1_label)): ?>
					<br><strong><?php echo $receipt_details->shipping_custom_field_1_label; ?> :</strong> <?php echo $receipt_details->shipping_custom_field_1_value ?? ''; ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->shipping_custom_field_2_label)): ?>
					<br><strong><?php echo $receipt_details->shipping_custom_field_2_label; ?>:</strong> <?php echo $receipt_details->shipping_custom_field_2_value ?? ''; ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->shipping_custom_field_3_label)): ?>
					<br><strong><?php echo $receipt_details->shipping_custom_field_3_label; ?>:</strong> <?php echo $receipt_details->shipping_custom_field_3_value ?? ''; ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->shipping_custom_field_4_label)): ?>
					<br><strong><?php echo $receipt_details->shipping_custom_field_4_label; ?>:</strong> <?php echo $receipt_details->shipping_custom_field_4_value ?? ''; ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->shipping_custom_field_5_label)): ?>
					<br><strong><?php echo $receipt_details->shipping_custom_field_2_label; ?>:</strong> <?php echo $receipt_details->shipping_custom_field_5_value ?? ''; ?>

				<?php endif; ?>
				
				<?php if(!empty($receipt_details->sale_orders_invoice_no)): ?>
					<br>
					<strong><?php echo app('translator')->get('restaurant.order_no'); ?>:</strong> <?php echo $receipt_details->sale_orders_invoice_no ?? ''; ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->sale_orders_invoice_date)): ?>
					<br>
					<strong><?php echo app('translator')->get('lang_v1.order_dates'); ?>:</strong> <?php echo $receipt_details->sale_orders_invoice_date ?? ''; ?>

				<?php endif; ?>
			</span>
		</p>
	</div>
</div>

<div class="row">
	<?php if ($__env->exists('sale_pos.receipts.partial.common_repair_invoice')) echo $__env->make('sale_pos.receipts.partial.common_repair_invoice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<div class="row">
	<div class="col-xs-12">
		<br/>
		<?php
			$p_width = 40;
		?>
		<?php if(!empty($receipt_details->item_discount_label)): ?>
			<?php
				$p_width -= 15;
			?>
		<?php endif; ?>

		
		<div class="row color-555">
			<div class="col-xs-12">
				<br/>
				<table class="table table-bordered table-no-top-cell-border table-slim">
					<thead>
					<tr style="background-color: #357ca5 !important; color: white !important; font-size: 15px !important font-weight: bold;" class="table-no-side-cell-border table-no-top-cell-border text-center">
						<td style="background-color: #357ca5 !important; color: white !important;"></td>

						<td style="background-color: #357ca5 !important; color: white !important;" class="text-left" width="30%">
							<?php echo $receipt_details->table_product_label; ?>

						</td>

						<?php if($receipt_details->show_cat_code == 1): ?>
							<td style="background-color: #357ca5 !important; color: white !important;" class="text-right"><?php echo $receipt_details->cat_code_label; ?></td>
						<?php endif; ?>

						<td style="background-color: #357ca5 !important; color: white !important;" class="text-right">
							<?php echo $receipt_details->table_qty_label; ?>

						</td>
						<td style="background-color: #357ca5 !important; color: white !important;" class="text-right">
							<?php echo $receipt_details->table_unit_price_label; ?> <span class="small color-white"> (<?php echo e($receipt_details->currency['symbol'], false); ?>)</span>
						</td>
					<!-- <td style="background-color: #357ca5 !important; color: white !important;">
                                <?php echo $receipt_details->line_discount_label; ?>

							</td> -->
						<td style="background-color: #357ca5 !important; color: white !important;" class="text-right">
							الإجمالي <span class="small color-white"> (<?php echo e($receipt_details->currency['symbol'], false); ?>)</span>
						</td>

						<?php if(!empty($receipt_details->table_tax_headings)): ?>
							<?php $__currentLoopData = $receipt_details->table_tax_headings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax_heading): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<td style="background-color: #357ca5 !important; color: white !important;" class="word-wrap text-right">
									<?php echo e($tax_heading, false); ?> <span class="small color-white"> (<?php echo e($receipt_details->currency['symbol'], false); ?>)</span>
								</td>

								<?php
									$totals[$tax_heading] = 0;
								?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						<?php endif; ?>

						<td style="background-color: #357ca5 !important; color: white !important;" class="text-right">
							<?php echo $receipt_details->table_subtotal_label; ?>  <span class="small color-white"> (<?php echo e($receipt_details->currency['symbol'], false); ?>)</span>
						</td>
					</tr>
					</thead>
					<tbody>
					<?php $__currentLoopData = $receipt_details->lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class="text-center">
								<?php echo e($loop->iteration, false); ?>

							</td>
							<td class="text-left" style="word-break: break-all;">
								<?php if(!empty($line['image'])): ?>
									<img src="<?php echo e($line['image'], false); ?>" alt="Image" width="50" style="float: left; margin-right: 8px;">
								<?php endif; ?>
								<?php echo e($line['name'], false); ?> <?php echo e($line['product_variation'], false); ?> <?php echo e($line['variation'], false); ?>

								<?php if(!empty($line['sub_sku'])): ?>, <?php echo e($line['sub_sku'], false); ?> <?php endif; ?> <?php if(!empty($line['brand'])): ?>, <?php echo e($line['brand'], false); ?> <?php endif; ?>
								<?php if(!empty($line['sell_line_note'])): ?>
									<br>
									<small class="text-muted">
										<?php echo e($line['sell_line_note'], false); ?>

									</small>
								<?php endif; ?>
								<?php if(!empty($line['lot_number'])): ?><br> <?php echo e($line['lot_number_label'], false); ?>:  <?php echo e($line['lot_number'], false); ?> <?php endif; ?>
								<?php if(!empty($line['product_expiry'])): ?>, <?php echo e($line['product_expiry_label'], false); ?>:  <?php echo e($line['product_expiry'], false); ?> <?php endif; ?>

								<?php if(!empty($line['warranty_name'])): ?> <br><small><?php echo e($line['warranty_name'], false); ?> </small><?php endif; ?> <?php if(!empty($line['warranty_exp_date'])): ?> <small>- <?php echo e(\Carbon::createFromTimestamp(strtotime($line['warranty_exp_date']))->format(session('business.date_format')), false); ?> </small><?php endif; ?>
								<?php if(!empty($line['warranty_description'])): ?> <small> <?php echo e($line['warranty_description'] ?? '', false); ?></small><?php endif; ?>
							</td>

							<?php if($receipt_details->show_cat_code == 1): ?>
								<td class="text-right">
									<?php if(!empty($line['cat_code'])): ?>
										<?php echo e($line['cat_code'], false); ?>

									<?php endif; ?>
								</td>
							<?php endif; ?>

							<td class="text-right">
								<?php echo e($line['quantity'], false); ?> <?php echo e($line['units'], false); ?>

							</td>
							<td class="text-right">
								<?php echo e($line['unit_price_before_discount'], false); ?>

							</td>
						<!-- <td class="text-right">
                                <?php echo e($line['line_discount'], false); ?>

								</td> -->
							<td class="text-right">
							<span class="display_currency" data-currency_symbol="false">
								<?php echo e($line['price_exc_tax'], false); ?>

							</span>

								<?php
									$totals['taxable_value'] += $line['price_exc_tax'];
								?>
							</td>

							<?php if(!empty($receipt_details->table_tax_headings)): ?>

								<?php $__currentLoopData = $receipt_details->table_tax_headings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax_heading): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<td class="text-right word-wrap">
										<?php if(!empty($line['group_tax_details'])): ?>

											<?php $__currentLoopData = $line['group_tax_details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if(strpos($tax_detail['name'], $tax_heading) !== FALSE): ?>

													<?php
														$totals[$tax_heading] += $tax_detail['calculated_tax'];
													?>

													<span class="display_currency" data-currency_symbol="false">
										<?php echo e($tax_detail['calculated_tax'], false); ?>

										</span>
													<br/>
													<span class="small">
											<?php echo e($tax_detail['amount'], false); ?>%
										</span>
												<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

										<?php else: ?>
											<?php if(strpos($line['tax_name'], $tax_heading) !== FALSE): ?>

												<?php
													$totals[$tax_heading] += ($line['tax_unformatted'] * $line['quantity_uf']);
												?>

												<span class="display_currency" data-currency_symbol="false">
									<?php echo e($line['tax_unformatted'] * $line['quantity_uf'], false); ?>

									</span>
												<br/>
												<span class="small">
										<?php echo e($line['tax_percent'], false); ?>%
									</span>
											<?php endif; ?>
										<?php endif; ?>
									</td>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						<?php endif; ?>

						<!-- <?php if(!empty($line->group_tax_details)): ?>

							<?php $__currentLoopData = $line->group_tax_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<td class="text-right">
<?php echo e($line['line_discount'], false); ?>

										</td>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						<?php endif; ?> -->

							<td class="text-right">
								<?php echo e($line['line_total'], false); ?>

							</td>
						</tr>
						
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					<?php
						$lines = count($receipt_details->lines);
					?>

					<?php for($i = $lines; $i < 5; $i++): ?>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<!-- <td>&nbsp;</td> -->

							<?php if(!empty($receipt_details->table_tax_headings)): ?>
								<?php $__currentLoopData = $receipt_details->table_tax_headings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax_heading): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<td>&nbsp;</td>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>

							<?php if($receipt_details->show_cat_code == 1): ?>
								<td>&nbsp;</td>
							<?php endif; ?>
						</tr>
					<?php endfor; ?>
					<tr>
						<?php
							$colspan = 4;
						?>
						<?php if($receipt_details->show_cat_code == 1): ?>
							<?php
								$colspan = 5;
							?>
						<?php endif; ?>

						<th colspan="<?php echo e($colspan, false); ?>" class="text-right"
							style="background-color: #d2d6de !important;">
							Total
						</th>
						<th class="text-right" style="background-color: #d2d6de !important;">
						<span class="display_currency" data-currency_symbol="false">
							<?php echo e($totals['taxable_value'], false); ?>

						</span>
						</th>

						<!-- <td>&nbsp;</td> -->

						<?php if(!empty($receipt_details->table_tax_headings)): ?>
							<?php $__currentLoopData = $receipt_details->table_tax_headings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax_heading): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<th class="text-right" style="background-color: #d2d6de !important;">
							<span class="display_currency" data-currency_symbol="false">
							<?php echo e($totals[$tax_heading], false); ?>

							</span>
								</th>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>

						<th class="text-right" style="background-color: #d2d6de !important;">
						<span class="display_currency" data-currency_symbol="false">
							<?php echo e($receipt_details->subtotal_unformatted +$totals[$tax_heading], false); ?>

						</span>
						</th>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12"><hr/></div>
	<div class="col-xs-6">

		<table class="table table-slim">
			<?php if(!empty($receipt_details->payments)): ?>
				<?php $__currentLoopData = $receipt_details->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($payment['method'], false); ?></td>
						<td class="text-right" ><?php echo e($payment['amount'], false); ?></td>
						<td class="text-right"><?php echo e($payment['date'], false); ?></td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>

		<!-- Total Paid-->
			<?php if(!empty($receipt_details->total_paid_label)): ?>
				<tr>
					<th>
						<?php echo $receipt_details->total_paid_label; ?>

					</th>
					<td class="text-right">
						<?php echo e($receipt_details->total_paid, false); ?>

					</td>
				</tr>
			<?php endif; ?>

		<!-- Total Due-->
			<?php if(!empty($receipt_details->total_due_label)): ?>
				<tr>
					<th>
						<?php echo $receipt_details->total_due_label; ?>

					</th>
					<td class="text-right">
						<?php echo e($receipt_details->total_due, false); ?>

					</td>
				</tr>
			<?php endif; ?>

			<?php if(!empty($receipt_details->all_due)): ?>
				<tr>
					<th>
						<?php echo $receipt_details->all_bal_label; ?>

					</th>
					<td class="text-right">
						<?php echo e($receipt_details->all_due, false); ?>

					</td>
				</tr>
			<?php endif; ?>
		</table>
	</div>

	<div class="col-xs-6">
		<div class="table-responsive">
			<table class="table table-slim">
				<tbody>
				<?php if(!empty($receipt_details->total_quantity_label)): ?>
					<tr class="color-555">
						<th >
							<?php echo $receipt_details->total_quantity_label; ?>

						</th>
						<td class="text-right">
							<?php echo e($receipt_details->total_quantity, false); ?>

						</td>
					</tr>
				<?php endif; ?>
				<tr>
					<th >
						<?php echo $receipt_details->subtotal_label; ?>

					</th>
					<td class="text-right">
						<?php echo e($receipt_details->subtotal, false); ?>

					</td>
				</tr>
				<?php if(!empty($receipt_details->total_exempt_uf)): ?>
					<tr>
						<th>
							<?php echo app('translator')->get('lang_v1.exempt'); ?>
						</th>
						<td class="text-right">
							<?php echo e($receipt_details->total_exempt, false); ?>

						</td>
					</tr>
				<?php endif; ?>
				<!-- Shipping Charges -->
				<?php if(!empty($receipt_details->shipping_charges)): ?>
					<tr>
						<th >
							<?php echo $receipt_details->shipping_charges_label; ?>

						</th>
						<td class="text-right">
							<?php echo e($receipt_details->shipping_charges, false); ?>

						</td>
					</tr>
				<?php endif; ?>

				<?php if(!empty($receipt_details->packing_charge)): ?>
					<tr>
						<th >
							<?php echo $receipt_details->packing_charge_label; ?>

						</th>
						<td class="text-right">
							<?php echo e($receipt_details->packing_charge, false); ?>

						</td>
					</tr>
				<?php endif; ?>

				<!-- Discount -->
				<?php if( !empty($receipt_details->discount)  ): ?>
					<tr>
						<th>
							<?php echo $receipt_details->discount_label; ?>

						</th>

						<td class="text-right">
							(-) <?php echo e($receipt_details->total_discount, false); ?>

						</td>
					</tr>
				<?php endif; ?>

				<!-- Tax -->
				<?php if( !empty($receipt_details->tax_label) ): ?>
					<tr>
						<th >
							<?php echo $receipt_details->tax_label; ?>

						</th>
						<td class="text-right">
							(+) <?php echo e($receipt_details->tax, false); ?>

						</td>
					</tr>
				<?php endif; ?>

				<?php if( !empty($receipt_details->reward_point_label)  ): ?>
					<tr>
						<th>
							<?php echo $receipt_details->reward_point_label; ?>

						</th>

						<td class="text-right">
							(-) <?php echo e($receipt_details->reward_point_amount, false); ?>

						</td>
					</tr>
				<?php endif; ?>

				<?php if( !empty($receipt_details->transaction_add) ): ?>
					<tr>
						<th>
							<?php echo $receipt_details->transaction_add; ?>

						</th>

						<td class="text-right">
							<?php echo e($receipt_details->transaction_add_value, false); ?>

						</td>
					</tr>

					


				<?php endif; ?>




				<?php if( $receipt_details->round_off_amount > 0): ?>
					<tr>
						<th>
							<?php echo $receipt_details->round_off_label; ?>

						</th>
						<td class="text-right">
							<?php echo e($receipt_details->round_off, false); ?>

						</td>
					</tr>
				<?php endif; ?>

				<!-- Total -->
				<tr>
					<th>
						<?php echo $receipt_details->total_label; ?>

					</th>
					<td class="text-right">
						<?php echo e($receipt_details->transaction_add_total, false); ?>

						<?php if(!empty($receipt_details->total_in_words)): ?>
							<br>
							<small>(<?php echo e($receipt_details->total_in_words, false); ?>)</small>
						<?php endif; ?>
					</td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-xs-12">
		<p><?php echo nl2br($receipt_details->additional_notes); ?></p>
	</div>


</div>

<?php if($receipt_details->show_barcode ): ?>
	<div class="<?php if(!empty($receipt_details->footer_text)): ?> col-xs-4 <?php else: ?> col-xs-12 <?php endif; ?> text-center">
		<?php if($receipt_details->show_barcode): ?>
			
			<img class="center-block" src="data:image/png;base64,<?php echo e(DNS1D::getBarcodePNG($receipt_details->invoice_no, 'C128', 2,30,array(39, 48, 54), true), false); ?>">
		<?php endif; ?>

	</div>
<?php endif; ?>

<?php echo $__env->make('sale_pos.partials.qr_code', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<br>
<div class="row">
	<?php if(!empty($receipt_details->footer_text)): ?>
		<div class="col-xs-12 ">
			<?php echo $receipt_details->footer_text; ?>

		</div>
	<?php endif; ?>

</div>
<?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/sale_pos/receipts/columnize-taxes.blade.php ENDPATH**/ ?>