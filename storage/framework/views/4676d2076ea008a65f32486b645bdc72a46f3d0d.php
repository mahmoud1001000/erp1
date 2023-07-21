<?php
    $variation_name = !empty($variation_name) ? $variation_name : null;
    $variation_value_id = !empty($variation_value_id) ? $variation_value_id : null;

    $name = (empty($row_type) || $row_type == 'add') ? 'product_variation' : 'product_variation_edit';

    $readonly = !empty($variation_value_id) ? 'readonly' : '';
?>

<?php if(!session('business.enable_price_tax')): ?> 
    <?php
        $default = 0;
        $class = 'hide';
    ?>
<?php else: ?>
    <?php
        $default = null;
        $class = '';
    ?>
<?php endif; ?>

<tr>
    <td>
        <?php echo Form::text($name . '[' . $variation_index . '][variations][' . $value_index . '][sub_sku]', null, ['class' => 'form-control input-sm']); ?>


        <?php echo Form::hidden($name . '[' . $variation_index . '][variations][' . $value_index . '][variation_value_id]', $variation_value_id); ?>

    </td>
    <td>
        <?php echo Form::text($name . '[' . $variation_index . '][variations][' . $value_index . '][value]', $variation_name, ['class' => 'form-control input-sm variation_value_name', 'required', $readonly]); ?>

    </td>
    <td class="<?php echo e($class, false); ?>">
        <div class="width-50 f-left">
            <?php echo Form::text($name . '[' . $variation_index . '][variations][' . $value_index . '][default_purchase_price]', $default, ['class' => 'form-control input-sm variable_dpp input_number', 'placeholder' => __('product.exc_of_tax'), 'required']); ?>

        </div>

        <div class="width-50 f-left">
            <div class="input-group">
                <?php echo Form::text($name . '[' . $variation_index . '][variations][' . $value_index . '][dpp_inc_tax]', $default, ['class' => 'form-control input-sm variable_dpp_inc_tax input_number', 'placeholder' => __('product.inc_of_tax'), 'required']); ?>

                <?php if($value_index == 0): ?>
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default bg-white btn-flat apply-all btn-sm p-5-5" data-toggle="tooltip" title="<?php echo app('translator')->get('lang_v1.apply_all'); ?>" data-target-class=".variable_dpp_inc_tax"><i class="fas fa-check-double"></i></button>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </td>
    <td class="<?php echo e($class, false); ?>">
        <div class="input-group">
            <?php echo Form::text($name . '[' . $variation_index . '][variations][' . $value_index . '][profit_percent]', $profit_percent, ['class' => 'form-control input-sm variable_profit_percent input_number', 'required']); ?>

            <?php if($value_index == 0): ?>
                <span class="input-group-btn">
                    <button type="button" class="btn btn-default bg-white btn-flat apply-all btn-sm p-5-5" data-toggle="tooltip" title="<?php echo app('translator')->get('lang_v1.apply_all'); ?>" data-target-class=".variable_profit_percent"><i class="fas fa-check-double"></i></button>
                </span>
            <?php endif; ?>
        </div>
    </td>
    <td class="<?php echo e($class, false); ?>">
        <?php echo Form::text($name . '[' . $variation_index . '][variations][' . $value_index . '][default_sell_price]', $default, ['class' => 'form-control input-sm variable_dsp input_number', 'placeholder' => __('product.exc_of_tax'), 'required']); ?>


        <?php echo Form::text($name . '[' . $variation_index . '][variations][' . $value_index . '][sell_price_inc_tax]', $default, ['class' => 'form-control input-sm variable_dsp_inc_tax input_number', 'placeholder' => __('product.inc_of_tax'), 'required']); ?>

    </td>
    <td><?php echo Form::file('variation_images_' . $variation_index . '_' . $value_index . '[]', ['class' => 'variation_images', 'accept' => 'image/*', 'multiple']); ?></td>
    <td>
        <button type="button" class="btn btn-danger btn-xs remove_variation_value_row">-</button>
        <input type="hidden" class="variation_row_index" value="<?php echo e($value_index, false); ?>">
    </td>
</tr><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/product/partials/variation_value_row.blade.php ENDPATH**/ ?>