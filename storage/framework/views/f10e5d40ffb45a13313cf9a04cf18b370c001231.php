<tr class="product_row">
    <td>
        <?php echo e($product->product_name, false); ?>

        <br/>
        <?php echo e($product->sub_sku, false); ?>


        <?php if( session()->get('business.enable_lot_number') == 1 || session()->get('business.enable_product_expiry') == 1): ?>
        <?php
            $lot_enabled = session()->get('business.enable_lot_number');
            $exp_enabled = session()->get('business.enable_product_expiry');
            $lot_no_line_id = '';
            if(!empty($product->lot_no_line_id)){
                $lot_no_line_id = $product->lot_no_line_id;
            }
        ?>
        <?php if(!empty($product->lot_numbers)): ?>
            <select class="form-control lot_number" name="products[<?php echo e($row_index, false); ?>][lot_no_line_id]">
                <option value=""><?php echo app('translator')->get('lang_v1.lot_n_expiry'); ?></option>
                <?php $__currentLoopData = $product->lot_numbers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lot_number): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $selected = "";
                        if($lot_number->purchase_line_id == $lot_no_line_id){
                            $selected = "selected";

                            $max_qty_rule = $lot_number->qty_available;
                            $max_qty_msg = __('lang_v1.quantity_error_msg_in_lot', ['qty'=> $lot_number->qty_formated, 'unit' => $product->unit  ]);
                        }

                        $expiry_text = '';
                        if($exp_enabled == 1 && !empty($lot_number->exp_date)){
                            if( \Carbon::now()->gt(\Carbon::createFromFormat('Y-m-d', $lot_number->exp_date)) ){
                                $expiry_text = '(' . __('report.expired') . ')';
                            }
                        }
                    ?>
                    <option value="<?php echo e($lot_number->purchase_line_id, false); ?>" data-qty_available="<?php echo e($lot_number->qty_available, false); ?>" data-msg-max="<?php echo app('translator')->get('lang_v1.quantity_error_msg_in_lot', ['qty'=> $lot_number->qty_formated, 'unit' => $product->unit  ]); ?>" <?php echo e($selected, false); ?>><?php if(!empty($lot_number->lot_number) && $lot_enabled == 1): ?><?php echo e($lot_number->lot_number, false); ?> <?php endif; ?> <?php if($lot_enabled == 1 && $exp_enabled == 1): ?> - <?php endif; ?> <?php if($exp_enabled == 1 && !empty($lot_number->exp_date)): ?> <?php echo app('translator')->get('product.exp_date'); ?>: <?php echo e(\Carbon::createFromTimestamp(strtotime($lot_number->exp_date))->format(session('business.date_format')), false); ?> <?php endif; ?> <?php echo e($expiry_text, false); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        <?php endif; ?>
    <?php endif; ?>
    </td>
    <td>
        
        <?php if(!empty($product->transaction_sell_lines_id)): ?>
            <input type="hidden" name="products[<?php echo e($row_index, false); ?>][transaction_sell_lines_id]" class="form-control" value="<?php echo e($product->transaction_sell_lines_id, false); ?>">
        <?php endif; ?>

        <input type="hidden" name="products[<?php echo e($row_index, false); ?>][product_id]" class="form-control product_id" value="<?php echo e($product->product_id, false); ?>">

        <input type="hidden" value="<?php echo e($product->variation_id, false); ?>"
            name="products[<?php echo e($row_index, false); ?>][variation_id]">

        <input type="hidden" value="<?php echo e($product->enable_stock, false); ?>"
            name="products[<?php echo e($row_index, false); ?>][enable_stock]">

        <?php if(empty($product->quantity_ordered)): ?>
            <?php
                $product->quantity_ordered = 1;
            ?>
        <?php endif; ?>

        <input type="text" class="form-control product_quantity input_number input_quantity" value="<?php echo e(number_format($product->quantity_ordered, config('constants.quantity_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>" name="products[<?php echo e($row_index, false); ?>][quantity]"
        <?php if($product->unit_allow_decimal == 1): ?> data-decimal=1 <?php else: ?> data-rule-abs_digit="true" data-msg-abs_digit="<?php echo app('translator')->get('lang_v1.decimal_value_not_allowed'); ?>" data-decimal=0 <?php endif; ?>
        data-rule-required="true" data-msg-required="<?php echo app('translator')->get('validation.custom-messages.this_field_is_required'); ?>" <?php if($product->enable_stock): ?> data-rule-max-value="<?php echo e($product->qty_available, false); ?>" data-msg-max-value="<?php echo app('translator')->get('validation.custom-messages.quantity_not_available', ['qty'=> $product->formatted_qty_available, 'unit' => $product->unit  ]); ?>"
        data-qty_available="<?php echo e($product->qty_available, false); ?>"
        data-msg_max_default="<?php echo app('translator')->get('validation.custom-messages.quantity_not_available', ['qty'=> $product->formatted_qty_available, 'unit' => $product->unit  ]); ?>"
         <?php endif; ?> >
        <?php echo e($product->unit, false); ?>

        <input type="hidden" name="products[<?php echo e($row_index, false); ?>][unit_price]" class="form-control product_unit_price input_number" value="<?php echo e(number_format($product->last_purchased_price, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>">
    </td>
    <td>
        <input type="text" readonly name="products[<?php echo e($row_index, false); ?>][price]" class="form-control product_line_total" value="<?php echo e(number_format($product->quantity_ordered*$product->last_purchased_price, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>">
    </td>
    <td class="text-center">
           <i class="fa fa-times remove_product_row  cursor-pointer btn btn-danger" aria-hidden="true"></i>
    </td>
</tr><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/stock_adjustment/partials/product_table_row.blade.php ENDPATH**/ ?>