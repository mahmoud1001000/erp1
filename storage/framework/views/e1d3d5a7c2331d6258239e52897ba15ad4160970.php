<br/>
<table style="width:100%;">
	<thead>
		<tr>
			<td>

			<?php if(!empty($receipt_details->invoice_heading)): ?>
				<p class="text-right text-muted-imp" style="font-weight: bold; font-size: 18px !important"><?php echo $receipt_details->invoice_heading; ?></p>
			<?php endif; ?>

			<p class="text-right">
				<?php if(!empty($receipt_details->invoice_no_prefix)): ?>
					<?php echo $receipt_details->invoice_no_prefix; ?>

				<?php endif; ?>

				<?php echo e($receipt_details->invoice_no, false); ?>

			</p>

			</td>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>

<?php if(!empty($receipt_details->header_text)): ?>
	<div class="row invoice-info">
		<div class="col-xs-12">
			<?php echo $receipt_details->header_text; ?>

		</div>
	</div>
<?php endif; ?>

<!-- business information here -->
<div class="row invoice-info">

	<div class="col-md-6 invoice-col width-50 color-555">
		
		<!-- Logo -->
		<?php if(!empty($receipt_details->logo)): ?>
			<img src="<?php echo e($receipt_details->logo, false); ?>" class="img">
			<br/>
		<?php endif; ?>

		<!-- Shop & Location Name  -->
		<?php if(!empty($receipt_details->display_name)): ?>
			<p>
				<?php echo e($receipt_details->display_name, false); ?><br/>
				<?php echo $receipt_details->address; ?>


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
			</p>
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
		<?php if(!empty($receipt_details->waiter_label) || !empty($receipt_details->waiter)): ?>
        	<p>
				<?php if(!empty($receipt_details->waiter_label)): ?>
					<?php echo $receipt_details->waiter_label; ?>

				<?php endif; ?>
				<?php echo e($receipt_details->waiter, false); ?>

			</p>
        <?php endif; ?>
	</div>

	<div class="col-md-6 invoice-col width-50">

		<p class="text-right font-30">
			<?php if(!empty($receipt_details->invoice_no_prefix)): ?>
				<span class="pull-left"><?php echo $receipt_details->invoice_no_prefix; ?></span>
			<?php endif; ?>

			<?php echo e($receipt_details->invoice_no, false); ?>

		</p>


		

		<!-- Total Due-->
		<?php if(!empty($receipt_details->total_due)): ?>
			<p class="bg-light-blue-active text-right font-23 padding-5">
				<span class="pull-left bg-light-blue-active">
					<?php echo $receipt_details->total_due_label; ?>

				</span>

				<?php echo e($receipt_details->total_due, false); ?>

			</p>
		<?php endif; ?>
		
		<!-- Total Paid-->
		<?php if(!empty($receipt_details->total_paid)): ?>
			<p class="text-right font-23 color-555">
				<span class="pull-left"><?php echo $receipt_details->total_paid_label; ?></span>
				<?php echo e($receipt_details->total_paid, false); ?>

			</p>
		<?php endif; ?>

		<!-- Date-->
		<?php if(!empty($receipt_details->date_label)): ?>
			<p class="text-right font-23 color-555">
				<span class="pull-left">
					<?php echo e($receipt_details->date_label, false); ?>

				</span>

				<?php echo e($receipt_details->invoice_date, false); ?>

			</p>
		<?php endif; ?>
	</div>
</div>

<div class="row invoice-info color-555">
	<br/>
	<div class="col-md-6 invoice-col width-50 word-wrap">
		<b><?php echo e($receipt_details->customer_label ?? '', false); ?></b><br/>

		<!-- customer info -->
		<?php if(!empty($receipt_details->customer_name)): ?>
			<?php echo $receipt_details->customer_name; ?><br>
		<?php endif; ?>
		<?php if(!empty($receipt_details->customer_info)): ?>
			<?php echo $receipt_details->customer_info; ?>

		<?php endif; ?>
		<?php if(!empty($receipt_details->client_id_label)): ?>
			<br/>
			<?php echo e($receipt_details->client_id_label, false); ?> <?php echo e($receipt_details->client_id, false); ?>

		<?php endif; ?>
		<?php if(!empty($receipt_details->customer_tax_label)): ?>
			<br/>
			<?php echo e($receipt_details->customer_tax_label, false); ?> <?php echo e($receipt_details->customer_tax_number, false); ?>

		<?php endif; ?>
		<?php if(!empty($receipt_details->customer_custom_fields)): ?>
			<br/><?php echo $receipt_details->customer_custom_fields; ?>

		<?php endif; ?>
	</div>

	
	<div class="col-md-6 invoice-col width-50 word-wrap">
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
	</div>
	
</div>

<div class="row color-555">
	<div class="col-xs-12">
		<br/>
		<table class="table table-bordered table-no-top-cell-border">
			<thead>
				<tr style="background-color: #357ca5 !important; color: white !important; font-size: 20px !important" class="table-no-side-cell-border table-no-top-cell-border text-center">
					<td style="background-color: #357ca5 !important; color: white !important; width: 5% !important">No</td>
					
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
						<td style="background-color: #357ca5 !important; color: white !important; width: 10% !important"><?php echo e($receipt_details->cat_code_label, false); ?></td>
					<?php endif; ?>
					
					<td style="background-color: #357ca5 !important; color: white !important"; width: 15% !important>
						<?php echo e($receipt_details->table_qty_label, false); ?>

					</td>
					<td style="background-color: #357ca5 !important; color: white !important; width: 15% !important">
						<?php echo e($receipt_details->table_unit_price_label, false); ?>

					</td>
					<td style="background-color: #357ca5 !important; color: white !important; width: 20% !important">
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
						<td>
                            <?php echo e($line['name'], false); ?> <?php echo e($line['variation'], false); ?> 
                            <?php if(!empty($line['sub_sku'])): ?>, <?php echo e($line['sub_sku'], false); ?> <?php endif; ?> <?php if(!empty($line['brand'])): ?>, <?php echo e($line['brand'], false); ?> <?php endif; ?>
                            <?php if(!empty($line['sell_line_note'])): ?>(<?php echo e($line['sell_line_note'], false); ?>) <?php endif; ?> 
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
							<?php echo e($line['unit_price_exc_tax'], false); ?>

						</td>
						<td class="text-right">
							<?php echo e($line['line_total'], false); ?>

						</td>
					</tr>
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
		<b class="pull-left">Authorized Signatory</b>
	</div>

	<div class="col-md-6 invoice-col width-50">
		<table class="table-no-side-cell-border table-no-top-cell-border width-100">
			<tbody>
				<tr class="color-555">
					<td style="width:50%">
						<?php echo $receipt_details->subtotal_label; ?>

					</td>
					<td class="text-right">
						<?php echo e($receipt_details->subtotal, false); ?>

					</td>
				</tr>

				<!-- Tax -->
				<?php if(!empty($receipt_details->taxes)): ?>
					<?php $__currentLoopData = $receipt_details->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr class="color-555">
							<td><?php echo e($k, false); ?></td>
							<td class="text-right"><?php echo e($v, false); ?></td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
				
				<!-- Total -->
				<tr>
					<th style="background-color: #357ca5 !important; color: white !important" class="font-23 padding-10">
						<?php echo $receipt_details->total_label; ?>

					</th>
					<td class="text-right font-23 padding-10" style="background-color: #357ca5 !important; color: white !important">
						<?php echo e($receipt_details->total, false); ?>

					</td>
				</tr>
			</tbody>
        </table>
	</div>
</div>

<div class="row color-555">
	<div class="col-xs-6">
		<?php echo e($receipt_details->additional_notes, false); ?>

	</div>

	
	<?php if($receipt_details->show_barcode): ?>
		<div class="col-xs-6">
			<img class="center-block" src="data:image/png;base64,<?php echo e(DNS1D::getBarcodePNG($receipt_details->invoice_no, 'C128', 2,30,array(39, 48, 54), true), false); ?>">
		</div>
	<?php endif; ?>
</div>

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
</table><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/sell_return/receipt.blade.php ENDPATH**/ ?>