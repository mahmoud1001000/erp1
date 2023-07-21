<!-- business information here -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Receipt-<?php echo e($receipt_details->invoice_no, false); ?></title>
</head>
<?php echo $__env->make('sale_pos.receipts.invoice_style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
<?php
    $numbers = range(0, 9);
    function arToIn($num, $pattern)
    {
        if ($pattern == 'TYPE_DEFAULT') {
            $fmt = numfmt_create('ar', NumberFormatter::TYPE_DEFAULT);
        } elseif ($pattern == 'DECIMAL') {
            $fmt = numfmt_create('ar', NumberFormatter::DECIMAL);
        }
        return numfmt_format($fmt, $num);
    }

    function dateFormate($date)
    {
        $fmt = datefmt_create('ar_EG', IntlDateFormatter::FULL, IntlDateFormatter::FULL, 'Africa/Cairo', IntlDateFormatter::GREGORIAN, 'yyyy / M / d');
        return datefmt_format($fmt, $date);
    }
?>


<div class="ticket">

    
    <?php if(!empty($receipt_details->logo)): ?>
        <div class="text-box centered">
            <img style="max-height: 100px; width: auto;" src="<?php echo e($receipt_details->logo, false); ?>" alt="Logo">
        </div>
    <?php endif; ?>



    <div class="text-box">
        <p class="centered">
            <!-- Header text -->
            <?php if(!empty($receipt_details->header_text)): ?>
                <span class="headings"><?php echo $receipt_details->header_text; ?></span>
            <?php endif; ?>
        </p>
        <div class="text-box">
            <p class="centered">
                <span class="headings"><strong><?php echo $receipt_details->invoice_no_prefix; ?>  <?php echo e($receipt_details->invoice_no, false); ?></strong></span>
            </p>
        </div>

        <!-- business information here -->
        <div>
            <?php if(!empty($receipt_details->display_name)): ?>
                <span class="headings">
			   <p class="centered"><?php echo e($receipt_details->display_name, false); ?></p>
			</span>
            <?php endif; ?>
        </div>
        <?php if(!empty($receipt_details->location_custom_fields)): ?>
            <span class="headings">
            <p class="centered">
                        <?php echo e($receipt_details->location_custom_fields, false); ?>

            </p>
            </span>
        <?php endif; ?>

        
        <?php if(!empty($receipt_details->sub_heading_line1)): ?>
            <p class="centered"><?php echo e($receipt_details->sub_heading_line1, false); ?></p>
        <?php endif; ?>
        
        <?php if(!empty($receipt_details->sub_heading_line2)): ?>
            <p class="centered"><?php echo e($receipt_details->sub_heading_line2, false); ?>  </p>
        <?php endif; ?>

        
        <?php if(!empty($receipt_details->sub_heading_line3)): ?>
            <p class="centered"> <?php echo e($receipt_details->sub_heading_line3, false); ?></p>
        <?php endif; ?>
        
        <?php if(!empty($receipt_details->sub_heading_line4)): ?>
            <p class="centered"><?php echo e($receipt_details->sub_heading_line4, false); ?> </p>
        <?php endif; ?>
        
        <?php if(!empty($receipt_details->sub_heading_line5)): ?>
            <p class="centered"> <?php echo e($receipt_details->sub_heading_line5, false); ?></p>
        <?php endif; ?>

          <?php if(!empty($receipt_details->address)): ?>
            <p class="centered"><?php echo app('translator')->get('lang_v1.loaction_addres'); ?> : <?php echo e($receipt_details->address, false); ?></p>
        <?php endif; ?>



        
        <?php if(!empty($receipt_details->date_label)): ?>
            <p ><strong><?php echo $receipt_details->date_label; ?> :   <?php echo e($receipt_details->invoice_date, false); ?> </strong></p>
        <?php endif; ?>
        


        


            <?php if(!empty($receipt_details->tax_info1)): ?>
            <p>   <b><?php echo e($receipt_details->tax_label1, false); ?></b> <?php echo e($receipt_details->tax_info1, false); ?> </p>
            <?php endif; ?>

            <?php if(!empty($receipt_details->tax_info2)): ?>
            <p>  <b><?php echo e($receipt_details->tax_label2, false); ?></b> <?php echo e($receipt_details->tax_info2, false); ?>  </p>
            <?php endif; ?>
    </div>





    <?php if(!empty($receipt_details->due_date_label)): ?>
        <div class="textbox-info">
            <p class="f-left"><strong><?php echo e($receipt_details->due_date_label, false); ?></strong></p>
            <p class="f-right"><?php echo e($receipt_details->due_date ?? '', false); ?></p>
        </div>
    <?php endif; ?>

    


    <?php if(!empty($receipt_details->sales_person_label)): ?>
        <div class="textbox-info">
            <p class="f-left"><strong><?php echo e($receipt_details->sales_person_label, false); ?></strong></p>
            <p class="f-right"><?php echo e($receipt_details->sales_person, false); ?></p>
        </div>
    <?php endif; ?>


    <?php if(!empty($receipt_details->commission_agent_label)): ?>
        <div class="textbox-info">
            <p class="f-left"><strong><?php echo e($receipt_details->commission_agent_label, false); ?></strong></p>

            <p class="f-right"><?php echo e($receipt_details->commission_agent, false); ?></p>
        </div>
    <?php endif; ?>

    <?php if(!empty($receipt_details->brand_label) || !empty($receipt_details->repair_brand)): ?>
        <div class="textbox-info">
            <p class="f-left"><strong><?php echo e($receipt_details->brand_label, false); ?></strong></p>

            <p class="f-right"><?php echo e($receipt_details->repair_brand, false); ?></p>
        </div>
    <?php endif; ?>

    <?php if(!empty($receipt_details->device_label) || !empty($receipt_details->repair_device)): ?>
        <div class="textbox-info">
            <p class="f-left"><strong><?php echo e($receipt_details->device_label, false); ?></strong></p>

            <p class="f-right"><?php echo e($receipt_details->repair_device, false); ?></p>
        </div>
    <?php endif; ?>

    <?php if(!empty($receipt_details->model_no_label) || !empty($receipt_details->repair_model_no)): ?>
        <div class="textbox-info">
            <p class="f-left"><strong><?php echo e($receipt_details->model_no_label, false); ?></strong></p>

            <p class="f-right"><?php echo e($receipt_details->repair_model_no, false); ?></p>
        </div>
    <?php endif; ?>

    <?php if(!empty($receipt_details->serial_no_label) || !empty($receipt_details->repair_serial_no)): ?>
        <div class="textbox-info">
            <p class="f-left"><strong><?php echo e($receipt_details->serial_no_label, false); ?></strong></p>

            <p class="f-right"><?php echo e($receipt_details->repair_serial_no, false); ?></p>
        </div>
    <?php endif; ?>

    <?php if(!empty($receipt_details->repair_status_label) || !empty($receipt_details->repair_status)): ?>
        <div class="textbox-info">
            <p class="f-left"><strong>
                    <?php echo $receipt_details->repair_status_label; ?>

                </strong></p>
            <p class="f-right">
                <?php echo e($receipt_details->repair_status, false); ?>

            </p>
        </div>
    <?php endif; ?>

    <?php if(!empty($receipt_details->repair_warranty_label) || !empty($receipt_details->repair_warranty)): ?>
        <div class="textbox-info">
            <p class="f-left"><strong>
                    <?php echo $receipt_details->repair_warranty_label; ?>

                </strong></p>
            <p class="f-right">
                <?php echo e($receipt_details->repair_warranty, false); ?>

            </p>
        </div>
    <?php endif; ?>

<!-- Waiter info -->
    <?php if(!empty($receipt_details->service_staff_label) || !empty($receipt_details->service_staff)): ?>
        <div class="textbox-info">
            <p class="f-left"><strong>
                    <?php echo $receipt_details->service_staff_label; ?>

                </strong></p>
            <p class="f-right">
                <?php echo e($receipt_details->service_staff, false); ?>

            </p>
        </div>
    <?php endif; ?>

    <?php if(!empty($receipt_details->table_label) || !empty($receipt_details->table)): ?>
        <div class="textbox-info">
            <p class="f-left"><strong>
                    <?php if(!empty($receipt_details->table_label)): ?>
                        <b><?php echo $receipt_details->table_label; ?></b>
                    <?php endif; ?>
                </strong></p>
            <p class="f-right">
                <?php echo e($receipt_details->table, false); ?>

            </p>
        </div>
    <?php endif; ?>

<!-- customer info -->
    <div class="textbox-info">
        <p style="vertical-align: top;"><strong>
                <?php echo e($receipt_details->customer_label ?? '', false); ?>

            </strong></p>

        <p>
        <?php if(!empty($receipt_details->customer_info)): ?>
            <div class="bw">
                <?php echo $receipt_details->customer_info; ?>

            </div>
            <?php endif; ?>
            </p>
    </div>

    
    <?php if(!empty($receipt_details->client_id_label)): ?>
        <div class="textbox-info">
            <p class="f-left"><strong>
                    <?php echo e($receipt_details->client_id_label, false); ?>

                </strong></p>
            <p class="f-right">
                <?php echo e($receipt_details->client_id, false); ?>

            </p>
        </div>
    <?php endif; ?>

    <?php if(!empty($receipt_details->customer_tax_label)): ?>
        <div class="textbox-info">
            <p class="f-left"><strong>
                    <?php echo e($receipt_details->customer_tax_label, false); ?>

                </strong></p>
            <p class="f-right">
                <?php echo e($receipt_details->customer_tax_number, false); ?>

            </p>
        </div>
    <?php endif; ?>

    <?php if(!empty($receipt_details->customer_custom_fields)): ?>
        <div class="textbox-info">
            <p class="centered">
                <?php echo $receipt_details->customer_custom_fields; ?>

            </p>
        </div>
    <?php endif; ?>

    <?php if(!empty($receipt_details->customer_rp_label)): ?>
        <div class="textbox-info">
            <p class="f-left"><strong>
                    <?php echo e($receipt_details->customer_rp_label, false); ?>

                </strong></p>
            <p class="f-right">
                <?php echo e($receipt_details->customer_total_rp, false); ?>

            </p>
        </div>
    <?php endif; ?>
    <?php if(!empty($receipt_details->shipping_custom_field_1_label)): ?>
        <div class="textbox-info">
            <p class="f-left"><strong>
                    <?php echo $receipt_details->shipping_custom_field_1_label; ?>

                </strong></p>
            <p class="f-right">
                <?php echo $receipt_details->shipping_custom_field_1_value ?? ''; ?>

            </p>
        </div>
    <?php endif; ?>
    <?php if(!empty($receipt_details->shipping_custom_field_2_label)): ?>
        <div class="textbox-info">
            <p class="f-left"><strong>
                    <?php echo $receipt_details->shipping_custom_field_2_label; ?>

                </strong></p>
            <p class="f-right">
                <?php echo $receipt_details->shipping_custom_field_2_value ?? ''; ?>

            </p>
        </div>
    <?php endif; ?>
    <?php if(!empty($receipt_details->shipping_custom_field_3_label)): ?>
        <div class="textbox-info">
            <p class="f-left"><strong>
                    <?php echo $receipt_details->shipping_custom_field_3_label; ?>

                </strong></p>
            <p class="f-right">
                <?php echo $receipt_details->shipping_custom_field_3_value ?? ''; ?>

            </p>
        </div>
    <?php endif; ?>
    <?php if(!empty($receipt_details->shipping_custom_field_4_label)): ?>
        <div class="textbox-info">
            <p class="f-left"><strong>
                    <?php echo $receipt_details->shipping_custom_field_4_label; ?>

                </strong></p>
            <p class="f-right">
                <?php echo $receipt_details->shipping_custom_field_4_value ?? ''; ?>

            </p>
        </div>
    <?php endif; ?>
    <?php if(!empty($receipt_details->shipping_custom_field_5_label)): ?>
        <div class="textbox-info">
            <p class="f-left"><strong>
                    <?php echo $receipt_details->shipping_custom_field_5_label; ?>

                </strong></p>
            <p class="f-right">
                <?php echo $receipt_details->shipping_custom_field_5_value ?? ''; ?>

            </p>
        </div>
    <?php endif; ?>

    <?php if(!empty($receipt_details->sale_orders_invoice_no)): ?>
        <div class="textbox-info">
            <p class="f-left"><strong>
                    <?php echo app('translator')->get('restaurant.order_no'); ?>
                </strong></p>
            <p class="f-right">
                <?php echo $receipt_details->sale_orders_invoice_no ?? ''; ?>

            </p>
        </div>
    <?php endif; ?>

    <?php if(!empty($receipt_details->sale_orders_invoice_date)): ?>
        <div class="textbox-info">
            <p class="f-left"><strong>
                    <?php echo app('translator')->get('lang_v1.order_dates'); ?>
                </strong></p>
            <p class="f-right">
                <?php echo $receipt_details->sale_orders_invoice_date ?? ''; ?>

            </p>
        </div>
    <?php endif; ?>


    <table style="margin-top: 10px !important" class="border-bottom width-100 table-f-12 mb-10">
        <thead class="border-bottom-dotted">
        <tr>
    
            <th class="description" width="30%">
                <?php echo e($receipt_details->table_product_label, false); ?>

            </th>
            <th class="quantity text-right">
                <?php echo e($receipt_details->table_qty_label, false); ?>

            </th>
            <?php if(empty($receipt_details->hide_price)): ?>
                <th class="unit_price text-right">
                    <?php echo e($receipt_details->table_unit_price_label, false); ?>

                </th>
                <?php if(!empty($receipt_details->item_discount_label)): ?>
                    <th class="text-right" width="15%"><?php echo e($receipt_details->item_discount_label, false); ?></th>
                <?php endif; ?>
                <th class="price text-right"><?php echo e($receipt_details->table_subtotal_label, false); ?></th>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $receipt_details->lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                
                <td class="description">
                    <?php echo e($line['name'], false); ?> <?php echo e($line['product_variation'], false); ?> <?php echo e($line['variation'], false); ?>

                    <?php if(!empty($line['sub_sku'])): ?>, <?php echo e($line['sub_sku'], false); ?> <?php endif; ?> <?php if(!empty($line['brand'])): ?>, <?php echo e($line['brand'], false); ?> <?php endif; ?> <?php if(!empty($line['cat_code'])): ?>, <?php echo e($line['cat_code'], false); ?><?php endif; ?>
                    <?php if(!empty($line['product_custom_fields'])): ?>, <?php echo e($line['product_custom_fields'], false); ?> <?php endif; ?>
                    <?php if(!empty($line['sell_line_note'])): ?>
                        <br>
                        <span class="f-8">
	                        	<?php echo e($line['sell_line_note'], false); ?>

	                        	</span>
                    <?php endif; ?>
                    <?php if(!empty($line['lot_number'])): ?><br> <?php echo e($line['lot_number_label'], false); ?>:  <?php echo e($line['lot_number'], false); ?> <?php endif; ?>
                    <?php if(!empty($line['product_expiry'])): ?>, <?php echo e($line['product_expiry_label'], false); ?>:  <?php echo e($line['product_expiry'], false); ?> <?php endif; ?>
                    <?php if(!empty($line['warranty_name'])): ?>
                        <br>
                        <small>
                            <?php echo e($line['warranty_name'], false); ?>

                        </small>
                    <?php endif; ?>
                    <?php if(!empty($line['warranty_exp_date'])): ?>
                        <small>
                            - <?php echo e(\Carbon::createFromTimestamp(strtotime($line['warranty_exp_date']))->format(session('business.date_format')), false); ?>

                        </small>
                    <?php endif; ?>
                    <?php if(!empty($line['warranty_description'])): ?>
                        <small> <?php echo e($line['warranty_description'] ?? '', false); ?></small>
                    <?php endif; ?>
                </td>
                <td class="quantity text-right"><?php echo e($line['quantity'], false); ?> </td>
                <?php if(empty($receipt_details->hide_price)): ?>
                    <td class="unit_price text-right"><?php echo e($line['unit_price_before_discount'], false); ?></td>
                    <?php if(!empty($receipt_details->item_discount_label)): ?>
                        <td class="text-right">
                            <?php echo e($line['line_discount'] ?? '0.00', false); ?>

                        </td>
                    <?php endif; ?>
                    <td class="price text-right"><?php echo e($line['line_total'], false); ?></td>
                <?php endif; ?>
            </tr>
            <?php if(!empty($line['modifiers'])): ?>
                <?php $__currentLoopData = $line['modifiers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modifier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                       <td colspan="5">
                            <?php echo e($modifier['name'], false); ?> <?php echo e($modifier['variation'], false); ?>

                            <?php if(!empty($modifier['sub_sku'])): ?>, <?php echo e($modifier['sub_sku'], false); ?> <?php endif; ?> <?php if(!empty($modifier['cat_code'])): ?>, <?php echo e($modifier['cat_code'], false); ?><?php endif; ?>
                            <?php if(!empty($modifier['sell_line_note'])): ?>(<?php echo e($modifier['sell_line_note'], false); ?>) <?php endif; ?>
                        </td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td <?php if(!empty($receipt_details->item_discount_label)): ?> colspan="6" <?php else: ?> colspan="5" <?php endif; ?>>&nbsp;</td>
            </tr>
        </tbody>
    </table>


    <?php if(!empty($receipt_details->total_quantity_label)): ?>
        <div class="flex-box">
            <p class="">
                <?php echo $receipt_details->total_quantity_label; ?>

            </p>
            <p class="width-50 text-right sub-headings">
                <?php echo e($receipt_details->total_quantity, false); ?>

            </p>
        </div>
    <?php endif; ?>
    <?php if(empty($receipt_details->hide_price)): ?>
        <div class="flex-box">
            <p >
             <?php echo $receipt_details->subtotal_label; ?>

            </p>
            <p class="width-50 text-right sub-headings">
                <?php echo e($receipt_details->subtotal, false); ?>

            </p>
        </div>

        <!-- Shipping Charges -->
        <?php if(!empty($receipt_details->shipping_charges)): ?>
            <div class="flex-box">
                <p >
                    <?php echo $receipt_details->shipping_charges_label; ?>

                </p>
                <p class="width-50 text-right sub-headings">
                    <?php echo e($receipt_details->shipping_charges, false); ?>

                </p>
            </div>
        <?php endif; ?>

        <?php if(!empty($receipt_details->packing_charge)): ?>
            <div class="flex-box">
                <p >
                    <?php echo $receipt_details->packing_charge_label; ?>

                </p>
                <p class="width-50 text-right sub-headings">
                    <?php echo e($receipt_details->packing_charge, false); ?>

                </p>
            </div>
        <?php endif; ?>

    <!-- Discount for invoice  -->
        <?php if( !empty($receipt_details->discount) ): ?>
            <div class="flex-box">
                <p >
                    <?php echo $receipt_details->discount_label; ?>

                </p>

                <p class="width-50 text-right sub-headings">
                    (-) <?php echo e($receipt_details->discount, false); ?>

                </p>
            </div>
        <?php endif; ?>


        
        <?php if( !empty($receipt_details->total_line_discount) && $receipt_details->total_line_discount>0 ): ?>
            <div class="flex-box">
                <p >
                    <?php echo $receipt_details->line_discount_label; ?>

                </p>

                <p class="width-50 text-right sub-headings">
                    (-) <?php echo e($receipt_details->total_line_discount, false); ?>

                </p>
            </div>
        <?php endif; ?>

        <?php if(!empty($receipt_details->reward_point_label) ): ?>
            <div class="flex-box">
                <p >
                    <?php echo $receipt_details->reward_point_label; ?>

                </p>

                <p class="width-50 text-right sub-headings">
                    (-) <?php echo e($receipt_details->reward_point_amount, false); ?>

                </p>
            </div>
        <?php endif; ?>


        
        <?php if( !empty($receipt_details->tax) ): ?>
            <div class="flex-box">
                <p >
                    <?php echo $receipt_details->tax_label; ?>

                </p>
                <p class="width-50 text-right sub-headings">
                    (+) <?php echo e($receipt_details->tax, false); ?>

                </p>
            </div>
        <?php endif; ?>



        <?php if( $receipt_details->round_off_amount > 0): ?>
            <div class="flex-box">
                <p>
                    <?php echo $receipt_details->round_off_label; ?>

                </p>
                <p class="width-50 text-right sub-headings">
                    <?php echo e($receipt_details->round_off, false); ?>

                </p>
            </div>
        <?php endif; ?>


        
        <div class="flex-box">
            <p >
                <?php echo $receipt_details->total_label; ?>

            </p>
            <p class="width-50 text-right sub-headings">
                <?php echo e($receipt_details->total, false); ?>

            </p>
        </div>


        <?php if(!empty($receipt_details->total_in_words)): ?>
            <p colspan="2" class="text-right mb-0">
                <small>
                    (<?php echo e($receipt_details->total_in_words, false); ?>)
                </small>
            </p>
        <?php endif; ?>
        <?php if(!empty($receipt_details->payments)): ?>
            <?php $__currentLoopData = $receipt_details->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex-box">
                    <p class="width-50 text-right"><?php echo e($payment['method'], false); ?> (<?php echo e($payment['date'], false); ?>) </p>
                    <p class="width-50 text-right"><?php echo e($payment['amount'], false); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

    <!-- Total Paid-->
        <?php if(!empty($receipt_details->total_paid_label)): ?>
            <div class="flex-box">
                <p>
                    <?php echo $receipt_details->total_paid_label; ?>

                </p>
                <p class="width-50 text-right sub-headings">
                    <?php echo e($receipt_details->total_paid, false); ?>

                </p>
            </div>
        <?php endif; ?>

    <!-- Total Due-->
        <?php if(!empty($receipt_details->total_due_label)): ?>
            <div class="flex-box">
                <p >
                    <?php echo $receipt_details->total_due_label; ?>

                </p>
                <p class="width-50 text-right sub-headings">
                    <?php echo e($receipt_details->total_due, false); ?>

                </p>
            </div>
        <?php endif; ?>

        <?php if(!empty($receipt_details->all_due)): ?>
            <div class="flex-box">
                <p width-50 text-right sub-headings>
                    <?php echo $receipt_details->all_bal_label; ?>

                </p>
                <p class="width-50 text-right sub-headings">
                    <?php echo e($receipt_details->all_due, false); ?>

                </p>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <div class="border-bottom width-100">&nbsp;</div>
    <?php if(empty($receipt_details->hide_price)): ?>


    <!-- tax on products-->
        
    <?php endif; ?>


    <?php if(!empty($receipt_details->additional_notes)): ?>
        <p class="centered" >
            <?php echo nl2br($receipt_details->additional_notes); ?>

        </p>
    <?php endif; ?>

    
   

    <?php echo $__env->make('sale_pos.partials.qr_code', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(!empty($receipt_details->footer_text)): ?>
        <p class="centered">
            <?php echo $receipt_details->footer_text; ?>

        </p>
    <?php endif; ?>

</div>

</body>
</html>
<?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/sale_pos/receipts/e-invoice2.blade.php ENDPATH**/ ?>