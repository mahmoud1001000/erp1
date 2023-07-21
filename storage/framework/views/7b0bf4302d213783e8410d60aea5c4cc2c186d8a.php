<div class="modal-dialog" role="document">
    <style>
        .flex-container {
            display: flex;
            flex-wrap: wrap;
        }
        .disabled{
            background-color: #AE0E0E!important;
            color: white;
            text-align: center;
            font-size: 17px;
            font-weight: bold;
            max-width: 115px;
        }
        .enabled{
           text-align: center;
            font-size: 17px;
            font-weight: bold;
            max-width: 115px;
        }

    </style>
    <div class="modal-content" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><?php echo app('translator')->get('inventory::lang.inventory'); ?></h4>
        </div>
        <form id="stocking_save" action="<?php echo e(action('\Modules\Inventory\Http\Controllers\InventoryController@savestocking'), false); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="transaction_id" value="<?php echo e($transaction_id, false); ?>">
            <input type="hidden" name="location_id" value="<?php echo e($location_id, false); ?>">
            <input type="hidden" name="variation_id" value="<?php echo e($variation_id, false); ?>" id="variation_id">

            <div class="form-group ">
              
                <h4><strong> المنتج :
                        <?php echo e($product->pro_name, false); ?>

                        <?php if($product->type=='variable'): ?>
                            -<?php echo e($product->var_name, false); ?>

                        <?php endif; ?>

                    </strong></h4>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group " style="margin: 15px;min-width: 150px" >
                        <label >إسم المنتج : </label>
                        <input type="text" class="form-control " id="product_name"
                               value="<?php echo e($product->pro_name, false); ?>" name="product_name" >
                       </div>
                </div>

                <div class="col-xs-3">
                    <div class="form-group " style="margin: 15px;min-width: 150px">
                        <label for="formGroupExampleInput"><?php echo app('translator')->get('inventory::lang.store_quantity'); ?></label>
                        <input type="text" class="form-control disabled" id="curent_quantity"
                               value="<?php echo e(@number_format($qty_available,2,'.',''), false); ?>" readonly>
                        <input type="hidden" name="curent_quantity" value="<?php echo e($qty_available, false); ?>">
                        <input type="hidden" name="product_variation_id" value="<?php echo e($product->product_variation_id, false); ?>">
                    </div>
                </div>

             <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('inventory.showprice')): ?>
                <div class="col-xs-3">
                    <div class="form-group " style="margin: 15px;min-width: 150px">
                        <label for="formGroupExampleInput"><?php echo app('translator')->get('inventory::lang.purchase_price'); ?></label>
                        <input type="text" class="form-control disabled" id="purchase_price" name="purchase_price"
                               value="<?php echo e(@number_format($product->default_purchase_price,2,'.',''), false); ?>" >
                        <input type="hidden" value="<?php echo e($product->default_purchase_price, false); ?>">
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group " style="margin: 15px;min-width: 150px">
                        <label for="formGroupExampleInput"><?php echo app('translator')->get('inventory::lang.selling_price'); ?></label>

                        <input type="text" class="form-control disabled" id="selling_price" name="selling_price"
                               value="<?php echo e(@number_format($product->sell_price_inc_tax,2,'.',''), false); ?>" >

                        <input type="hidden"  value="<?php echo e($product->sell_price_inc_tax, false); ?>">
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <div class="row">
                <div class="col-xs-3">
                    <div class="form-group " style="margin: 15px;min-width: 150px">
                        <label for="formGroupExampleInput"><?php echo app('translator')->get('inventory::lang.stock_quantity'); ?></label>
                        <input type="text" class="form-control enabled stock_quantity"  name="stock_quantity" id="stock_quantity"
                               value="<?php echo e(@number_format($quantity,2,'.',''), false); ?>" >
                    </div>
                </div>

                <div class="col-xs-3">
                    <div class="form-group " style="margin: 15px;min-width: 150px">
                        <label for="formGroupExampleInput"><?php echo app('translator')->get('inventory::lang.unit_price'); ?></label>
                        <input type="text" class="form-control enabled" name="unit_price"  id="unit_price"
                               value="<?php echo e($unit_price, false); ?>" >
                    </div>
                </div>

                <div class="col-xs-3">
                    <div class="form-group " style="margin: 15px;min-width: 150px">
                        <label for="total_price"><?php echo app('translator')->get('inventory::lang.total_price'); ?></label>
                        <input type="text" class="form-control enabled" name="total_price"  id="total_price"
                               value="<?php echo e($unit_price*($quantity-$qty_available), false); ?>" >
                    </div>
                </div>

<div class="clearfix"></div>
                <div class="col-xs-12">
                    <div class="form-group " style="margin: 15px;min-width: 150px">
                        <label for="description"><?php echo app('translator')->get('inventory::lang.description'); ?></label>
                        <textarea name="description" class='form-control'></textarea>
                    </div>
                </div>
            </div>


            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'messages.save' ); ?></button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
            </div>


        </form>
    </div>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Inventory/Providers/../Resources/views/partials/product_stocking.blade.php ENDPATH**/ ?>