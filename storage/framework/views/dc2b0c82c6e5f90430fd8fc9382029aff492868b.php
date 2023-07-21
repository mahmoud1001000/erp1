<?php
    $hide_tax = '';
    if( session()->get('business.enable_inline_tax') == 0){
        $hide_tax = 'hide';
    }
    $currency_precision = config('constants.currency_precision', 2);
    $quantity_precision = config('constants.quantity_precision', 2);
?>
<div class="table-responsive">
    <table class="table table-condensed table-bordered table-th-green text-center table-striped" 
    id="purchase_entry_table">
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
                <th><?php echo app('translator')->get( 'purchase.unit_selling_price'); ?> <small>(<?php echo app('translator')->get('product.inc_of_tax'); ?>)</small></th>
                <?php if(session('business.enable_lot_number')): ?>
                    <th>
                        <?php echo app('translator')->get('lang_v1.lot_number'); ?>
                    </th>
                <?php endif; ?>
                <?php if(session('business.enable_product_expiry')): ?>
                    <th><?php echo app('translator')->get('product.mfg_date'); ?> / <?php echo app('translator')->get('product.exp_date'); ?></th>
                <?php endif; ?>
                <th>
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </th>
              </tr>
        </thead>
        <tbody>
    <?php $row_count = 0; ?>
    <?php $__currentLoopData = $purchase->purchase_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><span class="sr_number"></span></td>
            <td>
                <?php echo e($purchase_line->product->name, false); ?> (<?php echo e($purchase_line->variations->sub_sku, false); ?>)
                <?php if( $purchase_line->product->type == 'variable'): ?> 
                    <br/>(<b><?php echo e($purchase_line->variations->product_variation->name, false); ?></b> : <?php echo e($purchase_line->variations->name, false); ?>)
                <?php endif; ?>
            </td>

            <td>
                <?php echo Form::hidden('purchases[' . $loop->index . '][product_id]', $purchase_line->product_id ); ?>

                <?php echo Form::hidden('purchases[' . $loop->index . '][variation_id]', $purchase_line->variation_id ); ?>

                <?php echo Form::hidden('purchases[' . $loop->index . '][purchase_line_id]',
                $purchase_line->id); ?>


                <?php
                    $check_decimal = 'false';
                    if($purchase_line->product->unit->allow_decimal == 0){
                        $check_decimal = 'true';
                    }
                ?>
            
                <?php echo Form::text('purchases[' . $loop->index . '][quantity]', 
                number_format($purchase_line->quantity, $quantity_precision, $currency_details->decimal_separator, $currency_details->thousand_separator),
                ['class' => 'form-control input-sm purchase_quantity input_number mousetrap', 'required', 'data-rule-abs_digit' => $check_decimal, 'data-msg-abs_digit' => __('lang_v1.decimal_value_not_allowed')]); ?> 

                <input type="hidden" class="base_unit_cost" value="<?php echo e($purchase_line->variations->default_purchase_price, false); ?>">
                <?php if(!empty($purchase_line->sub_units_options)): ?>
                    <br>
                    <select name="purchases[<?php echo e($loop->index, false); ?>][sub_unit_id]" class="form-control input-sm sub_unit">
                        <?php $__currentLoopData = $purchase_line->sub_units_options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_units_key => $sub_units_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($sub_units_key, false); ?>" 
                                data-multiplier="<?php echo e($sub_units_value['multiplier'], false); ?>"
                                <?php if($sub_units_key == $purchase_line->sub_unit_id): ?> selected <?php endif; ?>>
                                <?php echo e($sub_units_value['name'], false); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                <?php else: ?>
                    <?php echo e($purchase_line->product->unit->short_name, false); ?>

                <?php endif; ?>

                <input type="hidden" name="purchases[<?php echo e($loop->index, false); ?>][product_unit_id]" value="<?php echo e($purchase_line->product->unit->id, false); ?>">

                <input type="hidden" class="base_unit_selling_price" value="<?php echo e($purchase_line->variations->sell_price_inc_tax, false); ?>">
            </td>
            <td>
                <?php echo Form::text('purchases[' . $loop->index . '][pp_without_discount]', number_format($purchase_line->pp_without_discount/$purchase->exchange_rate, $currency_precision, $currency_details->decimal_separator, $currency_details->thousand_separator), ['class' => 'form-control input-sm purchase_unit_cost_without_discount input_number', 'required']); ?>

            </td>
            <td>
                <?php echo Form::text('purchases[' . $loop->index . '][discount_percent]', number_format($purchase_line->discount_percent, $currency_precision, $currency_details->decimal_separator, $currency_details->thousand_separator), ['class' => 'form-control input-sm inline_discounts input_number', 'required']); ?> <b>%</b>
            </td>
            <td>
                <?php echo Form::text('purchases[' . $loop->index . '][purchase_price]', 
                number_format($purchase_line->purchase_price/$purchase->exchange_rate, $currency_precision, $currency_details->decimal_separator, $currency_details->thousand_separator), ['class' => 'form-control input-sm purchase_unit_cost input_number', 'required']); ?>

            </td>
            <td class="<?php echo e($hide_tax, false); ?>">
                <span class="row_subtotal_before_tax">
                    <?php echo e(number_format($purchase_line->quantity * $purchase_line->purchase_price/$purchase->exchange_rate, $currency_precision, $currency_details->decimal_separator, $currency_details->thousand_separator), false); ?>

                </span>
                <input type="hidden" class="row_subtotal_before_tax_hidden" value="<?php echo e(number_format($purchase_line->quantity * $purchase_line->purchase_price/$purchase->exchange_rate, $currency_precision, $currency_details->decimal_separator, $currency_details->thousand_separator), false); ?>">
            </td>

            <td class="<?php echo e($hide_tax, false); ?>">
                <div class="input-group">
                    <select name="purchases[<?php echo e($loop->index, false); ?>][purchase_line_tax_id]" class="form-control input-sm purchase_line_tax_id" placeholder="'Please Select'">
                        <option value="" data-tax_amount="0" <?php if( empty( $purchase_line->tax_id ) ): ?>
                        selected <?php endif; ?> ><?php echo app('translator')->get('lang_v1.none'); ?></option>
                        <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tax->id, false); ?>" data-tax_amount="<?php echo e($tax->amount, false); ?>" <?php if( $purchase_line->tax_id == $tax->id): ?> selected <?php endif; ?> ><?php echo e($tax->name, false); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <span class="input-group-addon purchase_product_unit_tax_text">
                        <?php echo e(number_format($purchase_line->item_tax/$purchase->exchange_rate, $currency_precision, $currency_details->decimal_separator, $currency_details->thousand_separator), false); ?>

                    </span>
                    <?php echo Form::hidden('purchases[' . $loop->index . '][item_tax]', number_format($purchase_line->item_tax/$purchase->exchange_rate, $currency_precision, $currency_details->decimal_separator, $currency_details->thousand_separator), ['class' => 'purchase_product_unit_tax']); ?>

                </div>
            </td>
            <td class="<?php echo e($hide_tax, false); ?>">
                <?php echo Form::text('purchases[' . $loop->index . '][purchase_price_inc_tax]', number_format($purchase_line->purchase_price_inc_tax/$purchase->exchange_rate, $currency_precision, $currency_details->decimal_separator, $currency_details->thousand_separator), ['class' => 'form-control input-sm purchase_unit_cost_after_tax input_number', 'required']); ?>

            </td>
            <td>
                <span class="row_subtotal_after_tax">
                <?php echo e(number_format($purchase_line->purchase_price_inc_tax * $purchase_line->quantity/$purchase->exchange_rate, $currency_precision, $currency_details->decimal_separator, $currency_details->thousand_separator), false); ?>

                </span>
                <input type="hidden" class="row_subtotal_after_tax_hidden" value="<?php echo e(number_format($purchase_line->purchase_price_inc_tax * $purchase_line->quantity/$purchase->exchange_rate, $currency_precision, $currency_details->decimal_separator, $currency_details->thousand_separator), false); ?>">
            </td>

            <td class="<?php if(!session('business.enable_editing_product_from_purchase')): ?> hide <?php endif; ?>">
                <?php
                    $pp = $purchase_line->purchase_price_inc_tax;
                    $sp = $purchase_line->variations->sell_price_inc_tax;
                    if(!empty($purchase_line->sub_unit->base_unit_multiplier)) {
                        $sp = $sp * $purchase_line->sub_unit->base_unit_multiplier;
                    }
                    if($pp == 0){
                        $profit_percent = 100;
                    } else {
                        $profit_percent = (($sp - $pp) * 100 / $pp);
                    }
                ?>
                
                <?php echo Form::text('purchases[' . $loop->index . '][profit_percent]', 
                number_format($profit_percent, $currency_precision, $currency_details->decimal_separator, $currency_details->thousand_separator), 
                ['class' => 'form-control input-sm input_number profit_percent', 'required']); ?>

            </td>

            <td>
                <?php if(session('business.enable_editing_product_from_purchase')): ?>
                    <?php echo Form::text('purchases[' . $loop->index . '][default_sell_price]', number_format($sp, $currency_precision, $currency_details->decimal_separator, $currency_details->thousand_separator), ['class' => 'form-control input-sm input_number default_sell_price', 'required']); ?>

                <?php else: ?>
                    <?php echo e(number_format($sp, $currency_precision, $currency_details->decimal_separator, $currency_details->thousand_separator), false); ?>

                <?php endif; ?>

            </td>
            <?php if(session('business.enable_lot_number')): ?>
                <td>
                    <?php echo Form::text('purchases[' . $loop->index . '][lot_number]', $purchase_line->lot_number, ['class' => 'form-control input-sm']); ?>

                </td>
            <?php endif; ?>

            <?php if(session('business.enable_product_expiry')): ?>
                <td style="text-align: left;">
                    <?php
                        $expiry_period_type = !empty($purchase_line->product->expiry_period_type) ? $purchase_line->product->expiry_period_type : 'month';
                    ?>
                    <?php if(!empty($expiry_period_type)): ?>
                    <input type="hidden" class="row_product_expiry" value="<?php echo e($purchase_line->product->expiry_period, false); ?>">
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
                    <?php
                        $mfg_date = null;
                        $exp_date = null;
                        if(!empty($purchase_line->mfg_date)){
                            $mfg_date = $purchase_line->mfg_date;
                        }
                        if(!empty($purchase_line->exp_date)){
                            $exp_date = $purchase_line->exp_date;
                        }
                    ?>
                    <div class="input-group <?php if($hide_mfg): ?> hide <?php endif; ?>">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <?php echo Form::text('purchases[' . $loop->index . '][mfg_date]', !empty($mfg_date) ? \Carbon::createFromTimestamp(strtotime($mfg_date))->format(session('business.date_format')) : null, ['class' => 'form-control input-sm expiry_datepicker mfg_date', 'readonly']); ?>

                    </div>
                    <b><small><?php echo app('translator')->get('product.exp_date'); ?>:</small></b>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <?php echo Form::text('purchases[' . $loop->index . '][exp_date]', !empty($exp_date) ? \Carbon::createFromTimestamp(strtotime($exp_date))->format(session('business.date_format')) : null, ['class' => 'form-control input-sm expiry_datepicker exp_date', 'readonly']); ?>

                    </div>
                    <?php else: ?>
                    <div class="text-center">
                        <?php echo app('translator')->get('product.not_applicable'); ?>
                    </div>
                    <?php endif; ?>
                </td>
            <?php endif; ?>

            <td><i class="fa fa-times remove_purchase_entry_row text-danger" title="Remove" style="cursor:pointer;"></i></td>
        </tr>
        <?php $row_count = $loop->index + 1 ; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<input type="hidden" id="row_count" value="<?php echo e($row_count, false); ?>"><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/purchase/partials/edit_purchase_entry_row.blade.php ENDPATH**/ ?>