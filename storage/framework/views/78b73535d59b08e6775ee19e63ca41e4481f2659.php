<div class="table-responsive" style="background-color: white">
    <?php
    $total_plus=0;
    $total_minus=0;
    ?>
    <table class="table table-bordered table-striped"  style="width:100%;margin: auto" >
        <thead>
        <tr>
            <th>م </th>
            <th> المنتج</th>
            <th> الكود</th>
            <th> تاريخ الجرد</th>
            <th> المستخدم</th>
            <th> الرصيد </th>
            <th>رصيد الجرد</th>
            <th>تكلفة الوحدة</th>
            <th>الإجمالي</th>
        </tr>
        </thead>
        <tbody id="datatablebody">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            if($row->total_def>0)
                $total_plus=$total_plus+$row->total_def;
            else
                $total_minus= $total_minus+(-1*$row->total_def);
            ?>
            <tr>
                <td width="70px"><?php echo e($loop->iteration, false); ?></td>
                <td width="400px"><?php echo e($row->product, false); ?>

                    <?php if($row->type=='variable'): ?>
                        - <?php echo e($row->var_name, false); ?>

                    <?php endif; ?>
                </td>
                <td width="100"><?php echo e($row->sku, false); ?></td>
                <td width="200px">
                      <span class="success" id="update_<?php echo e($row->variation_id, false); ?>">
                          <?php echo e($row->updated_at, false); ?>

                      </span>

                </td>
                <td width="200px"><?php echo e($row->first_name, false); ?> <?php echo e($row->last_name, false); ?></td>

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
        <tfoot>
        <tr>
            <th colspan="5">الإجمالي</th>
            <th colspan="2">الزيادة :
                <span><?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $total_plus, config("constants.currency_precision",2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?></span></th>
            <th colspan="6">العجز :
                <span > <?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $total_minus, config("constants.currency_precision",2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?></span>
            </th>


        </tr>
        </tfoot>

        </tbody>
    </table>
</div>
<?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Inventory/Providers/../Resources/views/partials/products_report.blade.php ENDPATH**/ ?>