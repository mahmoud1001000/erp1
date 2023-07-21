
             <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <tr>
                  <td width="70px"><?php echo e(++$offset, false); ?></td>
                  <td width="400px"><?php echo e($row->product, false); ?>

                  <?php if($row->type=='variable'): ?>
                      - <?php echo e($row->var_name, false); ?>

                  <?php endif; ?>
                  </td>
                  <td width="100"><?php echo e($row->sku, false); ?></td>
                     <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('inventory.showprice')): ?>
                  <td>
                    <div style="white-space: nowrap;"><?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $row->dpp_inc_tax, config("constants.currency_precision",2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?> </div>
                     </td>
                     <td>
                         <div style="white-space: nowrap;"><?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $row->sell_price_inc_tax, config("constants.currency_precision",2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?> </div>
                     </td>
                     <?php endif; ?>

                  <td width="200px">
                      <span class="success" id="update_<?php echo e($row->variation_id, false); ?>">
                          <?php echo e($row->updated_at, false); ?>

                      </span>

                  </td>
                  <td width="200px"><?php echo e($row->first_name, false); ?> <?php echo e($row->last_name, false); ?></td>

                  <td width="200px">
                      <span class="success" id="current_stock_<?php echo e($row->variation_id, false); ?>">
                           <?php echo e(number_format($row->current_stock,2,'.',''), false); ?>

                      </span>
                       <input type="hidden" class="form-control" id="old_<?php echo e($row->id, false); ?>" value="<?php echo e($row->current_stock, false); ?>">
                  </td>
                  
                  <td width="100px">
                      <button class="btn btn-danger" onclick="savedata(<?php echo e($row->id, false); ?>,<?php echo e($row->variation_id, false); ?>)" ><i class="fa fa-edit"> </i>  <?php echo app('translator')->get('inventory::lang.save_product_inventory'); ?>  </button>
                     
                      </td>
                 </tr>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Inventory/Providers/../Resources/views/products.blade.php ENDPATH**/ ?>