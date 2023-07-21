
   <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td width="70px"><?php echo e(++$offset, false); ?></td>
                <td width="120px"><?php echo e($row->location_name, false); ?></td>
                <td width="200px">
                      <span class="success">
                          <?php echo e($row->updated_at, false); ?>

                      </span>

                </td>
                <td width="400px"><?php echo e($row->product, false); ?>

                    <?php if($row->type=='variable'): ?>
                        - <?php echo e($row->var_name, false); ?>

                    <?php endif; ?>
                </td>
                <td width="200px"><?php echo e($row->first_name, false); ?> <?php echo e($row->last_name, false); ?></td>
                <td width="200px"><?php echo e($row->description, false); ?> </td>

                <td width="100px">
                      <span class="success" id="current_stock_<?php echo e($row->variation_id, false); ?>">
                           <?php echo e(number_format($row->curent_quantity,2,'.',''), false); ?>

                      </span>
                </td>
                <td width="100px">
                      <span class="success" id="current_stock_<?php echo e($row->variation_id, false); ?>">
                           <?php echo e(number_format($row->new_quantity,2,'.',''), false); ?>

                      </span>
                </td>
                <td width="150px">
                      <span class="success" id="current_stock_<?php echo e($row->variation_id, false); ?>">
                           <?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $row->unit_price, config("constants.currency_precision",2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?>
                      </span>
                </td>

                <td width="190px">
                      <span class="<?php if($row->total_def<0): ?> span_success <?php else: ?>  success <?php endif; ?>">
                           <?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $row->total_def, config("constants.currency_precision",2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?>
                      </span>
                </td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Inventory/Providers/../Resources/views/partials/products_report_details.blade.php ENDPATH**/ ?>