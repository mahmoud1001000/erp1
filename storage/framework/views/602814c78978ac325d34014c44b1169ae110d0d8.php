<tr class="product_row">
    <td>
        <?php echo e($product->product_name, false); ?>

        <br/>
        <?php echo e($product->sub_sku, false); ?>

    </td>
    <?php if(session('business.enable_lot_number')): ?>
        <td>
            <input type="text" name="products[<?php echo e($row_index, false); ?>][lot_number]" class="form-control" value="<?php echo e($product->lot_number ?? '', false); ?>">
        </td>
    <?php endif; ?>
    <?php if(session('business.enable_product_expiry')): ?>
        <td>
            <input type="text" name="products[<?php echo e($row_index, false); ?>][exp_date]" class="form-control expiry_datepicker" value="<?php if(!empty($product->exp_date)): ?><?php echo e(\Carbon::createFromTimestamp(strtotime($product->exp_date))->format(session('business.date_format')), false); ?><?php endif; ?>" readonly>
        </td>
    <?php endif; ?>
    <td>
        <input type="hidden" name="products[<?php echo e($row_index, false); ?>][product_id]" class="form-control product_id" value="<?php echo e($product->product_id, false); ?>">

        <input type="hidden" value="<?php echo e($product->variation_id, false); ?>" 
            name="products[<?php echo e($row_index, false); ?>][variation_id]">

        <input type="hidden" value="<?php echo e($product->enable_stock, false); ?>" 
            name="products[<?php echo e($row_index, false); ?>][enable_stock]">

        <?php if(!empty($edit)): ?>
            <input type="hidden" value="<?php echo e($product->purchase_line_id, false); ?>" 
            name="products[<?php echo e($row_index, false); ?>][purchase_line_id]">
            <?php
                $qty = $product->quantity_returned;
                $purchase_price = $product->purchase_price;
            ?>
        <?php else: ?>
            <?php
                $qty = 1;
                $purchase_price = $product->last_purchased_price;
            ?>
        <?php endif; ?>

        <input type="text" class="form-control product_quantity input_number input_quantity" value="<?php echo e(number_format($qty, config('constants.quantity_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>" name="products[<?php echo e($row_index, false); ?>][quantity]" 
        <?php if($product->unit_allow_decimal == 1): ?> data-decimal=1 <?php else: ?> data-rule-abs_digit="true" data-msg-abs_digit="<?php echo app('translator')->get('lang_v1.decimal_value_not_allowed'); ?>" data-decimal=0 <?php endif; ?>
        data-rule-required="true" data-msg-required="<?php echo app('translator')->get('validation.custom-messages.this_field_is_required'); ?>" <?php if($product->enable_stock): ?> data-rule-max-value="<?php echo e($product->qty_available, false); ?>" data-msg-max-value="<?php echo app('translator')->get('validation.custom-messages.quantity_not_available', ['qty'=> $product->formatted_qty_available, 'unit' => $product->unit  ]); ?>"
        data-qty_available="<?php echo e($product->qty_available, false); ?>" 
        data-msg_max_default="<?php echo app('translator')->get('validation.custom-messages.quantity_not_available', ['qty'=> $product->formatted_qty_available, 'unit' => $product->unit  ]); ?>"
         <?php endif; ?> >
        <?php echo e($product->unit, false); ?>

    </td>
    <td>
        <input type="text" name="products[<?php echo e($row_index, false); ?>][unit_price]" class="form-control product_unit_price input_number" value="<?php echo e(number_format($purchase_price, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>">
    </td>
    <td>
        <input type="text" readonly name="products[<?php echo e($row_index, false); ?>][price]" class="form-control product_line_total" value="<?php echo e(number_format($qty*$purchase_price, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>">
    </td>
    <td class="text-center">
        <i class="fa fa-trash remove_product_row cursor-pointer" aria-hidden="true"></i>
    </td>
</tr><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/purchase_return/partials/product_table_row.blade.php ENDPATH**/ ?>