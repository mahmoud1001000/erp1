<table style="width:100%;">
	<thead>
		<tr>
			<td>
				<p class="text-right">
					<small class="text-muted-imp">
						<?php if(!empty($receipt_details->invoice_no_prefix)): ?>
							<?php echo $receipt_details->invoice_no_prefix; ?>

						<?php endif; ?>

						<?php echo e($receipt_details->invoice_no, false); ?>

					</small>
				</p>
			</td>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td class="text-center" style="line-height: 15px !important; padding-bottom: 10px !important">
				<?php if(!empty($receipt_details->header_text)): ?>
					<?php echo $receipt_details->header_text; ?>

				<?php endif; ?>

				<?php
					$sub_headings = implode('<br/>', array_filter([$receipt_details->sub_heading_line1, $receipt_details->sub_heading_line2, $receipt_details->sub_heading_line3, $receipt_details->sub_heading_line4, $receipt_details->sub_heading_line5]));
				?>

				<?php if(!empty($sub_headings)): ?>
					<span><?php echo $sub_headings; ?></span>
				<?php endif; ?>

				<?php if(!empty($receipt_details->invoice_heading)): ?>
					<p class="" style="font-weight: bold; font-size: 35px !important"><?php echo $receipt_details->invoice_heading; ?></p>
				<?php endif; ?>
			</td>
		</tr>

		<tr>
			<td>

<!-- business information here -->
<div class="row invoice-info">

	<div class="col-md-6 invoice-col width-50">

		<div class="text-right font-23">
			<?php if(!empty($receipt_details->invoice_no_prefix)): ?>
				<span class="pull-left"><?php echo $receipt_details->invoice_no_prefix; ?></span>
			<?php endif; ?>

			<?php echo e($receipt_details->invoice_no, false); ?>

		</div>

		<!-- Total Due-->
		<?php if(!empty($receipt_details->total_due)): ?>
			<div class="bg-light-blue-active text-right font-23 padding-5">
				<span class="pull-left bg-light-blue-active">
					<?php echo $receipt_details->total_due_label; ?>

				</span>

				<?php echo e($receipt_details->total_due, false); ?>

			</div>
		<?php endif; ?>

		<?php if(!empty($receipt_details->all_due)): ?>
			<div class="bg-light-blue-active text-right font-23 padding-5">
				<span class="pull-left bg-light-blue-active">
					<?php echo $receipt_details->all_bal_label; ?>

				</span>

				<?php echo e($receipt_details->all_due, false); ?>

			</div>
		<?php endif; ?>
		
		<!-- Total Paid-->
		<?php if(!empty($receipt_details->total_paid)): ?>
			<div class="text-right font-23 color-555">
				<span class="pull-left"><?php echo $receipt_details->total_paid_label; ?></span>
				<?php echo e($receipt_details->total_paid, false); ?>

			</div>
		<?php endif; ?>
		<!-- Date-->
		<?php if(!empty($receipt_details->date_label)): ?>
			<div class="text-right font-23 color-555">
				<span class="pull-left">
					<?php echo e($receipt_details->date_label, false); ?>

				</span>

				<?php echo e($receipt_details->invoice_date, false); ?>

			</div>
		<?php endif; ?>
		<?php if(!empty($receipt_details->due_date_label)): ?>
			<div class="text-right font-23 color-555">
				<span class="pull-left">
					<?php echo e($receipt_details->due_date_label, false); ?>

				</span>

				<?php echo e($receipt_details->due_date ?? '', false); ?>

			</div>
		<?php endif; ?>

		<div class="word-wrap">
			<?php if(!empty($receipt_details->customer_label)): ?>
				<b><?php echo e($receipt_details->customer_label, false); ?></b><br/>
			<?php endif; ?>

			<!-- customer info -->
			<?php if(!empty($receipt_details->customer_name)): ?>
				<?php echo e($receipt_details->customer_name, false); ?><br>
			<?php endif; ?>
			<?php if(!empty($receipt_details->customer_info)): ?>
				<?php echo $receipt_details->customer_info; ?>

			<?php endif; ?>
			<?php if(!empty($receipt_details->client_id_label)): ?>
				<br/>
				<strong><?php echo e($receipt_details->client_id_label, false); ?></strong> <?php echo e($receipt_details->client_id, false); ?>

			<?php endif; ?>
			<?php if(!empty($receipt_details->customer_tax_label)): ?>
				<br/>
				<strong><?php echo e($receipt_details->customer_tax_label, false); ?></strong> <?php echo e($receipt_details->customer_tax_number, false); ?>

			<?php endif; ?>
			<?php if(!empty($receipt_details->customer_custom_fields)): ?>
				<br/><?php echo $receipt_details->customer_custom_fields; ?>

			<?php endif; ?>
			<?php if(!empty($receipt_details->sales_person_label)): ?>
				<br/>
				<strong><?php echo e($receipt_details->sales_person_label, false); ?></strong> <?php echo e($receipt_details->sales_person, false); ?>

			<?php endif; ?>

			<?php if(!empty($receipt_details->customer_rp_label)): ?>
				<br/>
				<strong><?php echo e($receipt_details->customer_rp_label, false); ?></strong> <?php echo e($receipt_details->customer_total_rp, false); ?>

			<?php endif; ?>

			<!-- Display type of service details -->
			<?php if(!empty($receipt_details->types_of_service)): ?>
				<span class="pull-left text-left">
					<strong><?php echo $receipt_details->types_of_service_label; ?>:</strong>
					<?php echo e($receipt_details->types_of_service, false); ?>

					<!-- Waiter info -->
					<?php if(!empty($receipt_details->types_of_service_custom_fields)): ?>
						<br>
						<?php $__currentLoopData = $receipt_details->types_of_service_custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<strong><?php echo e($key, false); ?>: </strong> <?php echo e($value, false); ?><?php if(!$loop->last): ?>, <?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
				</span>
			<?php endif; ?>
		</div>

	</div>

	<div class="col-md-6 invoice-col width-50 color-555">
		
		<!-- Logo -->
		<?php if(!empty($receipt_details->logo)): ?>
			<img src="<?php echo e($receipt_details->logo, false); ?>" class="img center-block">
			<br/>
		<?php endif; ?>

		<!-- Shop & Location Name  -->
		<?php if(!empty($receipt_details->display_name)): ?>
			<span>
				<?php echo e($receipt_details->display_name, false); ?>

				<?php if(!empty($receipt_details->address)): ?>
					<br/><?php echo $receipt_details->address; ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->contact)): ?>
					<br/><?php echo e($receipt_details->contact, false); ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->website)): ?>
					<br/><?php echo e($receipt_details->website, false); ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->tax_info1)): ?>
					<br/><?php echo e($receipt_details->tax_label1, false); ?> <?php echo e($receipt_details->tax_info1, false); ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->tax_info2)): ?>
					<br/><?php echo e($receipt_details->tax_label2, false); ?> <?php echo e($receipt_details->tax_info2, false); ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->location_custom_fields)): ?>
					<br/><?php echo e($receipt_details->location_custom_fields, false); ?>

				<?php endif; ?>
			</span>
		<?php endif; ?>
				
		<!-- Table information-->
        <?php if(!empty($receipt_details->table_label) || !empty($receipt_details->table)): ?>
        	<p>
				<?php if(!empty($receipt_details->table_label)): ?>
					<?php echo $receipt_details->table_label; ?>

				<?php endif; ?>
				<?php echo e($receipt_details->table, false); ?>

			</p>
        <?php endif; ?>

		<!-- Waiter info -->
		<?php if(!empty($receipt_details->service_staff_label) || !empty($receipt_details->service_staff)): ?>
        	<p>
				<?php if(!empty($receipt_details->service_staff_label)): ?>
					<?php echo $receipt_details->service_staff_label; ?>

				<?php endif; ?>
				<?php echo e($receipt_details->service_staff, false); ?>

			</p>
        <?php endif; ?>



        <div class="word-wrap">

			<p class="text-right color-555">

			<?php if(!empty($receipt_details->brand_label) || !empty($receipt_details->repair_brand)): ?>
				<?php if(!empty($receipt_details->brand_label)): ?>
					<span class="pull-left">
						<strong><?php echo $receipt_details->brand_label; ?></strong>
					</span>
				<?php endif; ?>
				<?php echo e($receipt_details->repair_brand, false); ?><br>
	        <?php endif; ?>


	        <?php if(!empty($receipt_details->device_label) || !empty($receipt_details->repair_device)): ?>
				<?php if(!empty($receipt_details->device_label)): ?>
					<span class="pull-left">
						<strong><?php echo $receipt_details->device_label; ?></strong>
					</span>
				<?php endif; ?>
				<?php echo e($receipt_details->repair_device, false); ?><br>
	        <?php endif; ?>
	        
			<?php if(!empty($receipt_details->model_no_label) || !empty($receipt_details->repair_model_no)): ?>
				<?php if(!empty($receipt_details->model_no_label)): ?>
					<span class="pull-left">
						<strong><?php echo $receipt_details->model_no_label; ?></strong>
					</span>
				<?php endif; ?>
				<?php echo e($receipt_details->repair_model_no, false); ?> <br>
	        <?php endif; ?>

			<?php if(!empty($receipt_details->serial_no_label) || !empty($receipt_details->repair_serial_no)): ?>
				<?php if(!empty($receipt_details->serial_no_label)): ?>
					<span class="pull-left">
						<strong><?php echo $receipt_details->serial_no_label; ?></strong>
					</span>
				<?php endif; ?>
				<?php echo e($receipt_details->repair_serial_no, false); ?><br>
	        <?php endif; ?>
			<?php if(!empty($receipt_details->repair_status_label) || !empty($receipt_details->repair_status)): ?>
				<?php if(!empty($receipt_details->repair_status_label)): ?>
					<span class="pull-left">
						<strong><?php echo $receipt_details->repair_status_label; ?></strong>
					</span>
				<?php endif; ?>
				<?php echo e($receipt_details->repair_status, false); ?><br>
	        <?php endif; ?>
	        
	        <?php if(!empty($receipt_details->repair_warranty_label) || !empty($receipt_details->repair_warranty)): ?>
				<?php if(!empty($receipt_details->repair_warranty_label)): ?>
					<span class="pull-left">
						<strong><?php echo $receipt_details->repair_warranty_label; ?></strong>
					</span>
				<?php endif; ?>
				<?php echo e($receipt_details->repair_warranty, false); ?>

				<br>
	        <?php endif; ?>
	        </p>
		</div>
	</div>
</div>
<div class="row">
	<?php if ($__env->exists('sale_pos.receipts.partial.common_repair_invoice')) echo $__env->make('sale_pos.receipts.partial.common_repair_invoice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<div class="row color-555 mt-5">
	<div class="col-xs-12">
		<table class="table table-bordered table-no-top-cell-border table-slim mb-12">
			<thead>
				<tr style="background-color: #357ca5 !important; color: white !important; font-size: 20px !important" class="table-no-side-cell-border table-no-top-cell-border text-center">
					<td style="background-color: #357ca5 !important; color: white !important; width: 5% !important">#</td>
					
					<?php
						$p_width = 35;
					?>
					<?php if($receipt_details->show_cat_code != 1): ?>
						<?php
							$p_width = 45;
						?>
					<?php endif; ?>
					<td style="background-color: #357ca5 !important; color: white !important; width: <?php echo e($p_width, false); ?>% !important">
						<?php echo e($receipt_details->table_product_label, false); ?>

					</td>

					<?php if($receipt_details->show_cat_code == 1): ?>
						<td style="background-color: #357ca5 !important; color: white !important; width: 10% !important;"><?php echo e($receipt_details->cat_code_label, false); ?></td>
					<?php endif; ?>
					
					<td style="background-color: #357ca5 !important; color: white !important; width: 15% !important;">
						<?php echo e($receipt_details->table_qty_label, false); ?>

					</td>
					<td style="background-color: #357ca5 !important; color: white !important; width: 15% !important;">
						<?php echo e($receipt_details->table_unit_price_label, false); ?>

					</td>
					<td style="background-color: #357ca5 !important; color: white !important; width: 20% !important;">
						<?php echo e($receipt_details->table_subtotal_label, false); ?>

					</td>
				</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $receipt_details->lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td class="text-center">
							<?php echo e($loop->iteration, false); ?>

						</td>
						<td style="word-break: break-all;">
							<?php if(!empty($line['image'])): ?>
								<img src="<?php echo e($line['image'], false); ?>" alt="Image" width="50" style="float: left; margin-right: 8px;">
							<?php endif; ?>
                            <?php echo e($line['name'], false); ?> <?php echo e($line['product_variation'], false); ?> <?php echo e($line['variation'], false); ?> 
                            <?php if(!empty($line['sub_sku'])): ?>, <?php echo e($line['sub_sku'], false); ?> <?php endif; ?> <?php if(!empty($line['brand'])): ?>, <?php echo e($line['brand'], false); ?> <?php endif; ?>
                            <?php if(!empty($line['product_custom_fields'])): ?>, <?php echo e($line['product_custom_fields'], false); ?> <?php endif; ?>
                            <?php if(!empty($line['sell_line_note'])): ?>
                            <br>
                            <small><?php echo e($line['sell_line_note'], false); ?></small>
                            <?php endif; ?>
                            <?php if(!empty($line['lot_number'])): ?><br> <?php echo e($line['lot_number_label'], false); ?>:  <?php echo e($line['lot_number'], false); ?> <?php endif; ?> 
                            <?php if(!empty($line['product_expiry'])): ?>, <?php echo e($line['product_expiry_label'], false); ?>:  <?php echo e($line['product_expiry'], false); ?> <?php endif; ?> 

                            <?php if(!empty($line['warranty_name'])): ?> <br><small><?php echo e($line['warranty_name'], false); ?> </small><?php endif; ?> <?php if(!empty($line['warranty_exp_date'])): ?> <small>- <?php echo e(\Carbon::createFromTimestamp(strtotime($line['warranty_exp_date']))->format(session('business.date_format')), false); ?> </small><?php endif; ?>
                            <?php if(!empty($line['warranty_description'])): ?> <small> <?php echo e($line['warranty_description'] ?? '', false); ?></small><?php endif; ?>
                        </td>

						<?php if($receipt_details->show_cat_code == 1): ?>
	                        <td>
	                        	<?php if(!empty($line['cat_code'])): ?>
	                        		<?php echo e($line['cat_code'], false); ?>

	                        	<?php endif; ?>
	                        </td>
	                    <?php endif; ?>

						<td class="text-right">
							<?php echo e($line['quantity'], false); ?> <?php echo e($line['units'], false); ?>

						</td>
						<td class="text-right">
							<?php echo e($line['unit_price_inc_tax'], false); ?>

						</td>
						<td class="text-right">
							<?php echo e($line['line_total'], false); ?>

						</td>
					</tr>
					<?php if(!empty($line['modifiers'])): ?>
						<?php $__currentLoopData = $line['modifiers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modifier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td class="text-center">
									&nbsp;
								</td>
								<td>
		                            <?php echo e($modifier['name'], false); ?> <?php echo e($modifier['variation'], false); ?> 
		                            <?php if(!empty($modifier['sub_sku'])): ?>, <?php echo e($modifier['sub_sku'], false); ?> <?php endif; ?> 
		                            <?php if(!empty($modifier['sell_line_note'])): ?>(<?php echo e($modifier['sell_line_note'], false); ?>) <?php endif; ?> 
		                        </td>

								<?php if($receipt_details->show_cat_code == 1): ?>
			                        <td>
			                        	<?php if(!empty($modifier['cat_code'])): ?>
			                        		<?php echo e($modifier['cat_code'], false); ?>

			                        	<?php endif; ?>
			                        </td>
			                    <?php endif; ?>

								<td class="text-right">
									<?php echo e($modifier['quantity'], false); ?> <?php echo e($modifier['units'], false); ?>

								</td>
								<td class="text-right">
									<?php echo e($modifier['unit_price_exc_tax'], false); ?>

								</td>
								<td class="text-right">
									<?php echo e($modifier['line_total'], false); ?>

								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				<?php
					$lines = count($receipt_details->lines);
				?>

				<?php for($i = $lines; $i < 7; $i++): ?>
    				<tr>
    					<td>&nbsp;</td>
    					<td>&nbsp;</td>
    					<td>&nbsp;</td>
    					<td>&nbsp;</td>
    					<td>&nbsp;</td>
    					<td>&nbsp;</td>
    				</tr>
				<?php endfor; ?>

			</tbody>
		</table>
	</div>
</div>

<div class="row invoice-info color-555" style="page-break-inside: avoid !important">
	<div class="col-md-6 invoice-col width-50">
		<table class="table table-slim">
			<?php if(!empty($receipt_details->payments)): ?>
				<?php $__currentLoopData = $receipt_details->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($payment['method'], false); ?></td>
						<td><?php echo e($payment['amount'], false); ?></td>
						<td><?php echo e($payment['date'], false); ?></td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
		</table>
		<b class="pull-left"><?php echo app('translator')->get('lang_v1.authorized_signatory'); ?></b>
	</div>

	<div class="col-md-6 invoice-col width-50">
		<table class="table-no-side-cell-border table-no-top-cell-border width-100 table-slim">
			<tbody>
				<?php if(!empty($receipt_details->total_quantity_label)): ?>
					<tr class="color-555">
						<td style="width:50%">
							<?php echo $receipt_details->total_quantity_label; ?>

						</td>
						<td class="text-right">
							<?php echo e($receipt_details->total_quantity, false); ?>

						</td>
					</tr>
				<?php endif; ?>
				<tr class="color-555">
					<td style="width:50%">
						<?php echo $receipt_details->subtotal_label; ?>

					</td>
					<td class="text-right">
						<?php echo e($receipt_details->subtotal, false); ?>

					</td>
				</tr>
				
				<!-- Shipping Charges -->
				<?php if(!empty($receipt_details->shipping_charges)): ?>
					<tr class="color-555">
						<td style="width:50%">
							<?php echo $receipt_details->shipping_charges_label; ?>

						</td>
						<td class="text-right">
							<?php echo e($receipt_details->shipping_charges, false); ?>

						</td>
					</tr>
				<?php endif; ?>

				<?php if(!empty($receipt_details->packing_charge)): ?>
					<tr class="color-555">
						<td style="width:50%">
							<?php echo $receipt_details->packing_charge_label; ?>

						</td>
						<td class="text-right">
							<?php echo e($receipt_details->packing_charge, false); ?>

						</td>
					</tr>
				<?php endif; ?>

	

				<!-- Discount -->
				<?php if( !empty($receipt_details->discount) ): ?>
					<tr class="color-555">
						<td>
							<?php echo $receipt_details->discount_label; ?>

						</td>

						<td class="text-right">
							(-) <?php echo e($receipt_details->discount, false); ?>

						</td>
					</tr>
				<?php endif; ?>
			<!-- Tax -->
				<?php if(!empty($receipt_details->taxes)): ?>
					<?php $__currentLoopData = $receipt_details->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr class="color-555">
							<td><?php echo e($k, false); ?></td>
							<td class="text-right">(+) <?php echo e($v, false); ?></td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
				<?php if( !empty($receipt_details->reward_point_label) ): ?>
					<tr class="color-555">
						<td>
							<?php echo $receipt_details->reward_point_label; ?>

						</td>

						<td class="text-right">
							(-) <?php echo e($receipt_details->reward_point_amount, false); ?>

						</td>
					</tr>
				<?php endif; ?>

				<?php if(!empty($receipt_details->group_tax_details)): ?>
					<?php $__currentLoopData = $receipt_details->group_tax_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr class="color-555">
							<td>
								<?php echo $key; ?>

							</td>
							<td class="text-right">
								(+) <?php echo e($value, false); ?>

							</td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php else: ?>
					<?php if( !empty($receipt_details->tax) ): ?>
						<tr class="color-555">
							<td>
								<?php echo $receipt_details->tax_label; ?>

							</td>
							<td class="text-right">
								(+) <?php echo e($receipt_details->tax, false); ?>

							</td>
						</tr>
					<?php endif; ?>
				<?php endif; ?>

				<?php if( $receipt_details->round_off_amount > 0): ?>
					<tr class="color-555">
						<td>
							<?php echo $receipt_details->round_off_label; ?>

						</td>
						<td class="text-right">
							<?php echo e($receipt_details->round_off, false); ?>

						</td>
					</tr>
				<?php endif; ?>
				
				<!-- Total -->
				<tr>
					<th style="background-color: #357ca5 !important; color: white !important" class="font-23 padding-10">
						<?php echo $receipt_details->total_label; ?>

					</th>
					<td class="text-right font-23 padding-10" style="background-color: #357ca5 !important; color: white !important">
						<?php echo e($receipt_details->total, false); ?>

					</td>
				</tr>
				<?php if(!empty($receipt_details->total_in_words)): ?>
				<tr>
					<td colspan="2" class="text-right">
						<small>(<?php echo e($receipt_details->total_in_words, false); ?>)</small>
					</td>
				</tr>
				<?php endif; ?>
			</tbody>
        </table>
	</div>
</div>

<div class="row color-555">
	<div class="col-xs-12">
		<br>
		<p><?php echo nl2br($receipt_details->additional_notes); ?></p>
	</div>
</div>

<?php if($receipt_details->show_barcode): ?>
<br>
<div class="row">
		<div class="col-xs-12">
			<img class="center-block" src="data:image/png;base64,<?php echo e(DNS1D::getBarcodePNG($receipt_details->invoice_no, 'C128', 2,30,array(39, 48, 54), true), false); ?>">
		</div>
</div>
<?php endif; ?>

<?php if(!empty($receipt_details->footer_text)): ?>
	<div class="row color-555">
		<div class="col-xs-12">
			<?php echo $receipt_details->footer_text; ?>

		</div>
	</div>
<?php endif; ?>

			</td>
		</tr>
	</tbody>
</table><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/sale_pos/receipts/elegant.blade.php ENDPATH**/ ?>