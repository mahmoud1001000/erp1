<?php $__currentLoopData = $variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><span class="sr_number"></span></td>
        <td>
            <?php echo e($product->name, false); ?> (<?php echo e($variation->sub_sku, false); ?>)
            <?php if( $product->type == 'variable' ): ?>
                <br/>
                (<b><?php echo e($variation->product_variation->name, false); ?></b> : <?php echo e($variation->name, false); ?>)
            <?php endif; ?>
            <?php if($product->enable_stock == 1): ?>
                <br>
                <small class="text-muted" style="white-space: nowrap;"><?php echo app('translator')->get('report.current_stock'); ?>: <?php if(!empty($variation->variation_location_details->first())): ?> <?php echo e(number_format($variation->variation_location_details->first()->qty_available, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php else: ?> 0 <?php endif; ?> <?php echo e($product->unit->short_name, false); ?></small>
            <?php endif; ?>
            
        </td>
        <td>
            <?php echo Form::hidden('purchases[' . $row_count . '][product_id]', $product->id ); ?>

            <?php echo Form::hidden('purchases[' . $row_count . '][variation_id]', $variation->id , ['class' => 'hidden_variation_id']); ?>


            <?php
                $check_decimal = 'false';
                if($product->unit->allow_decimal == 0){
                    $check_decimal = 'true';
                }
                $currency_precision = config('constants.currency_precision', 2);
                $quantity_precision = config('constants.quantity_precision', 2);
            ?>
            <?php echo Form::text('purchases[' . $row_count . '][quantity]', number_format(1, $quantity_precision, $currency_details->decimal_separator, $currency_details->thousand_separator), ['class' => 'form-control input-sm purchase_quantity input_number mousetrap', 'required', 'data-rule-abs_digit' => $check_decimal, 'data-msg-abs_digit' => __('lang_v1.decimal_value_not_allowed')]); ?>

            <input type="hidden" class="base_unit_cost" value="<?php echo e($variation->default_purchase_price, false); ?>">
            <input type="hidden" class="base_unit_selling_price" value="<?php echo e($variation->sell_price_inc_tax, false); ?>">

            <input type="hidden" name="purchases[<?php echo e($row_count, false); ?>][product_unit_id]" value="<?php echo e($product->unit->id, false); ?>">
            <?php if(!empty($sub_units)): ?>
                <br>
                <select name="purchases[<?php echo e($row_count, false); ?>][sub_unit_id]" class="form-control input-sm sub_unit">
                    <?php $__currentLoopData = $sub_units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key, false); ?>" data-multiplier="<?php echo e($value['multiplier'], false); ?>">
                            <?php echo e($value['name'], false); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            <?php else: ?> 
                <?php echo e($product->unit->short_name, false); ?>

            <?php endif; ?>
        </td>
        <td>
            <?php echo Form::text('purchases[' . $row_count . '][pp_without_discount]',
            number_format($variation->default_purchase_price, $currency_precision, $currency_details->decimal_separator, $currency_details->thousand_separator), ['class' => 'form-control input-sm purchase_unit_cost_without_discount input_number', 'required']); ?>

        </td>
        <td>
            <?php echo Form::text('purchases[' . $row_count . '][discount_percent]', 0, ['class' => 'form-control input-sm inline_discounts input_number', 'required']); ?>

        </td>
        <td>
            <?php echo Form::text('purchases[' . $row_count . '][purchase_price]',
            number_format($variation->default_purchase_price, $currency_precision, $currency_details->decimal_separator, $currency_details->thousand_separator), ['class' => 'form-control input-sm purchase_unit_cost input_number', 'required']); ?>

        </td>
        <td class="<?php echo e($hide_tax, false); ?>">
            <span class="row_subtotal_before_tax display_currency">0</span>
            <input type="hidden" class="row_subtotal_before_tax_hidden" value=0>
        </td>
        <td class="<?php echo e($hide_tax, false); ?>">
            <div class="input-group">
                <select name="purchases[<?php echo e($row_count, false); ?>][purchase_line_tax_id]" class="form-control select2 input-sm purchase_line_tax_id" placeholder="'Please Select'">
                    <option value="" data-tax_amount="0" <?php if( $hide_tax == 'hide' ): ?>
                    selected <?php endif; ?> ><?php echo app('translator')->get('lang_v1.none'); ?></option>
                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($tax->id, false); ?>" data-tax_amount="<?php echo e($tax->amount, false); ?>" <?php if( $product->tax == $tax->id && $hide_tax != 'hide'): ?> selected <?php endif; ?> ><?php echo e($tax->name, false); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php echo Form::hidden('purchases[' . $row_count . '][item_tax]', 0, ['class' => 'purchase_product_unit_tax']); ?>

                <span class="input-group-addon purchase_product_unit_tax_text">
                    0.00</span>
            </div>
        </td>
        <td class="<?php echo e($hide_tax, false); ?>">
            <?php
                $dpp_inc_tax = number_format($variation->dpp_inc_tax, $currency_precision, $currency_details->decimal_separator, $currency_details->thousand_separator);
                if($hide_tax == 'hide'){
                    $dpp_inc_tax = number_format($variation->default_purchase_price, $currency_precision, $currency_details->decimal_separator, $currency_details->thousand_separator);
                }

            ?>
            <?php echo Form::text('purchases[' . $row_count . '][purchase_price_inc_tax]', $dpp_inc_tax, ['class' => 'form-control input-sm purchase_unit_cost_after_tax input_number', 'required']); ?>

        </td>
        <td>
            <span class="row_subtotal_after_tax display_currency">0</span>
            <input type="hidden" class="row_subtotal_after_tax_hidden" value=0>
        </td>
        <td class="<?php if(!session('business.enable_editing_product_from_purchase')): ?> hide <?php endif; ?>">
            <?php echo Form::text('purchases[' . $row_count . '][profit_percent]', number_format($variation->profit_percent, $currency_precision, $currency_details->decimal_separator, $currency_details->thousand_separator), ['class' => 'form-control input-sm input_number profit_percent', 'required']); ?>

        </td>
        <td>
            <?php if(session('business.enable_editing_product_from_purchase')): ?>
                <?php echo Form::text('purchases[' . $row_count . '][default_sell_price]', number_format($variation->sell_price_inc_tax, $currency_precision, $currency_details->decimal_separator, $currency_details->thousand_separator), ['class' => 'form-control input-sm input_number default_sell_price', 'required']); ?>

            <?php else: ?>
                <?php echo e(number_format($variation->sell_price_inc_tax, $currency_precision, $currency_details->decimal_separator, $currency_details->thousand_separator), false); ?>

            <?php endif; ?>
        </td>
        <?php if(session('business.enable_lot_number')): ?>
            <td>
                <?php echo Form::text('purchases[' . $row_count . '][lot_number]', null, ['class' => 'form-control input-sm']); ?>

            </td>
        <?php endif; ?>
        <?php if(session('business.enable_product_expiry')): ?>
            <td style="text-align: left;">

                
                <?php
                    $expiry_period_type = !empty($product->expiry_period_type) ? $product->expiry_period_type : 'month';
                ?>
                <?php if(!empty($expiry_period_type)): ?>
                <input type="hidden" class="row_product_expiry" value="<?php echo e($product->expiry_period, false); ?>">
                <input type="hidden" class="row_product_expiry_type" value="<?php echo e($expiry_period_type, false); ?>">

                <?php if(session('business.expiry_type') == 'add_manufacturing'): ?>
                    <?php
                        $hide_mfg = false;
                    ?>
                <?php else: ?>
                    <?php
                        $hide_mfg = true;
                    ?>
                <?php endif; ?>

                <b class="<?php if($hide_mfg): ?> hide <?php endif; ?>"><small><?php echo app('translator')->get('product.mfg_date'); ?>:</small></b>
                <div class="input-group <?php if($hide_mfg): ?> hide <?php endif; ?>">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                    <?php echo Form::text('purchases[' . $row_count . '][mfg_date]', null, ['class' => 'form-control input-sm expiry_datepicker mfg_date', 'readonly']); ?>

                </div>
                <b><small><?php echo app('translator')->get('product.exp_date'); ?>:</small></b>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                    <?php echo Form::text('purchases[' . $row_count . '][exp_date]', null, ['class' => 'form-control input-sm expiry_datepicker exp_date', 'readonly']); ?>

                </div>
                <?php else: ?>
                <div class="text-center">
                    <?php echo app('translator')->get('product.not_applicable'); ?>
                </div>
                <?php endif; ?>
            </td>
        <?php endif; ?>
        <?php $row_count++ ;?>

        <td><i class="fa fa-times remove_purchase_entry_row text-danger" title="Remove" style="cursor:pointer;"></i></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<input type="hidden" id="row_count" value="<?php echo e($row_count, false); ?>"><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/purchase/partials/purchase_entry_row.blade.php ENDPATH**/ ?>