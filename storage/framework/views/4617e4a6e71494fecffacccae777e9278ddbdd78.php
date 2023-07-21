
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

<tr class="variation_row">
    <td>
        <?php echo Form::select('product_variation[' . $row_index .'][variation_template_id]', $variation_templates, null, ['class' => 'form-control input-sm variation_template', 'required']); ?>

        <input type="hidden" class="row_index" value="<?php echo e($row_index, false); ?>">
    </td>

    <td>
        <table class="table table-condensed table-bordered blue-header variation_value_table">
            <thead>
            <tr>
                <th><?php echo app('translator')->get('product.sku'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.sub_sku') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                <th><?php echo app('translator')->get('product.value'); ?></th>
                <th class="<?php echo e($class, false); ?>"><?php echo app('translator')->get('product.default_purchase_price'); ?>
                    <br/>
                    <span class="pull-left"><small><i><?php echo app('translator')->get('product.exc_of_tax'); ?></i></small></span>

                    <span class="pull-right"><small><i><?php echo app('translator')->get('product.inc_of_tax'); ?></i></small></span>
                </th>
                <th class="<?php echo e($class, false); ?>"><?php echo app('translator')->get('product.profit_percent'); ?></th>
                <th class="<?php echo e($class, false); ?>"><?php echo app('translator')->get('product.default_selling_price'); ?>
                <br/>
                <small><i><span class="dsp_label"></span></i></small>
                    <!-- &nbsp;&nbsp;<b><i class="fa fa-info-circle" aria-hidden="true" data-toggle="popover" data-html="true" data-trigger="hover" data-content="<p class='text-primary'>Drag the mouse over the table cells to copy input values</p>" data-placement="top"></i></b> -->
                </th>
                <th><?php echo app('translator')->get('lang_v1.variation_images'); ?></th>
                <th><button type="button" class="btn btn-success btn-xs add_variation_value_row">+</button></th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>
                    <?php echo Form::text('product_variation[' . $row_index .'][variations][0][sub_sku]', null, ['class' => 'form-control input-sm']); ?>

                </td>
                <td>
                    <?php echo Form::text('product_variation[' . $row_index .'][variations][0][value]', null, ['class' => 'form-control input-sm variation_value_name', 'required']); ?>

                </td>
                <td class="<?php echo e($class, false); ?>">
                    <div class="width-50 f-left">
                        <?php echo Form::text('product_variation[' . $row_index .'][variations][0][default_purchase_price]', $default, ['class' => 'form-control input-sm variable_dpp input_number', 'placeholder' => __('product.exc_of_tax'), 'required']); ?>

                    </div>

                    <div class="width-50 f-left">
                        <div class="input-group">
                            <?php echo Form::text('product_variation[' . $row_index .'][variations][0][dpp_inc_tax]', $default, ['class' => 'form-control input-sm variable_dpp_inc_tax input_number', 'placeholder' => __('product.inc_of_tax'), 'required']); ?>

                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default bg-white btn-flat apply-all btn-sm p-5-5" data-toggle="tooltip" title="<?php echo app('translator')->get('lang_v1.apply_all'); ?>" data-target-class=".variable_dpp_inc_tax"><i class="fas fa-check-double"></i></button>
                            </span>
                        </div>
                    </div>
                </td>
                <td class="<?php echo e($class, false); ?>">
                    <div class="input-group">
                        <?php echo Form::text('product_variation[' . $row_index .'][variations][0][profit_percent]', $profit_percent, ['class' => 'form-control input-sm variable_profit_percent input_number', 'required']); ?>


                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default bg-white btn-flat apply-all btn-sm p-5-5" data-toggle="tooltip" title="<?php echo app('translator')->get('lang_v1.apply_all'); ?>" data-target-class=".variable_profit_percent"><i class="fas fa-check-double"></i></button>
                        </span>
                    </div>
                </td>
                <td class="<?php echo e($class, false); ?>">
                    <?php echo Form::text('product_variation[' . $row_index .'][variations][0][default_sell_price]', $default, ['class' => 'form-control input-sm variable_dsp input_number', 'placeholder' => __('product.exc_of_tax'), 'required']); ?>


                     <?php echo Form::text('product_variation[' . $row_index .'][variations][0][sell_price_inc_tax]', $default, ['class' => 'form-control input-sm variable_dsp_inc_tax input_number', 'placeholder' => __('product.inc_of_tax'), 'required']); ?>

                </td>
                <td><?php echo Form::file('variation_images_' . $row_index .'_0[]', ['class' => 'variation_images', 'accept' => 'image/*', 'multiple']); ?></td>
                <td>
                    <button type="button" class="btn btn-danger btn-xs remove_variation_value_row">-</button>
                    <input type="hidden" class="variation_row_index" value="0">
                </td>
            </tr>
            </tbody>
        </table>
    </td>
</tr><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/product/partials/product_variation_row.blade.php ENDPATH**/ ?>