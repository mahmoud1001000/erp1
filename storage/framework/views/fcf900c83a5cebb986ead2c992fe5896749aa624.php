<?php if($role->id): ?>
    <?php $__env->startSection('title', __('role.edit_role')); ?>
<?php else: ?>
  <?php $__env->startSection('title', __('role.add_role')); ?>
<?php endif; ?>
<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php if($role->id): ?>
          <h1><?php echo app('translator')->get( 'role.edit_role' ); ?></h1>
        <?php else: ?>
            <h1><?php echo app('translator')->get( 'role.add_role' ); ?></h1>
        <?php endif; ?>

    </section>

    <!-- Main content -->
    <section class="content">
        <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
            <?php if($role->id): ?>
                <?php echo Form::open(['url' => action('RoleController@update', [$role->id]), 'id' => 'role_form' ]); ?>

                <input name="_method" type="hidden" value="PUT">
            <?php else: ?>
                <?php echo Form::open(['url' => action('RoleController@store'), 'method' => 'post', 'id' => 'role_add_form' ]); ?>

                <input name="_method" type="hidden" value="post">
            <?php endif; ?>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('name', __( 'user.role_name' ) . ':*'); ?>

                        <?php echo Form::text('name', str_replace( '#' . auth()->user()->business_id, '', $role->name) , ['class' => 'form-control', 'required', 'placeholder' => __( 'user.role_name' ) ]); ?>

                    </div>
                </div>
            </div>
            <?php if(in_array('service_staff', $enabled_modules)): ?>
                <div class="row">
                    <div class="col-md-2">
                        <h4><?php echo app('translator')->get( 'lang_v1.user_type' ); ?></h4>
                    </div>
                    <div class="col-md-9 col-md-offset-1">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('is_service_staff', 1, $role->is_service_staff,
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'restaurant.service_staff' ), false); ?>

                                </label>
                                <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('restaurant.tooltip_service_staff') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>


                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-3">
                    <label><?php echo app('translator')->get( 'user.permissions' ); ?>:</label>
                </div>
            </div>
            <div class="row check_group">
                <div class="col-md-1">
                    <h4><?php echo app('translator')->get( 'role.user' ); ?></h4>
                </div>
                <div class="col-md-2">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

                        </label>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'user.view', in_array('user.view', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.user.view' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'user.create', in_array('user.create', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.user.create' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'user.update', in_array('user.update', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.user.update' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'user.delete', in_array('user.delete', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.user.delete' ), false); ?>

                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row check_group">
                <div class="col-md-1">
                    <h4><?php echo app('translator')->get( 'user.roles' ); ?></h4>
                </div>
                <div class="col-md-2">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

                        </label>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'roles.view', in_array('roles.view', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.view_role' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'roles.create', in_array('roles.create', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.add_role' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'roles.update', in_array('roles.update', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.edit_role' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'roles.delete', in_array('roles.delete', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.delete_role' ), false); ?>

                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row check_group">
                <div class="col-md-1">
                    <h4><?php echo app('translator')->get( 'role.supplier' ); ?></h4>
                </div>
                <div class="col-md-2">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

                        </label>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'supplier.view', in_array('supplier.view', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.view_all_supplier' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'supplier.view_own', in_array('supplier.view_own', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.view_own_supplier' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'supplier.create', in_array('supplier.create', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.supplier.create' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'supplier.update', in_array('supplier.update', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.supplier.update' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'supplier.delete', in_array('supplier.delete', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.supplier.delete' ), false); ?>

                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row check_group">
                <div class="col-md-1">
                    <h4><?php echo app('translator')->get( 'role.customer' ); ?></h4>
                </div>
                <div class="col-md-2">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

                        </label>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'customer.view', in_array('customer.view', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.view_all_customer' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'customer.view_own', in_array('customer.view_own', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.view_own_customer' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'customer.create', in_array('customer.create', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.customer.create' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'customer.update', in_array('customer.update', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.customer.update' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'customer.delete', in_array('customer.delete', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.customer.delete' ), false); ?>

                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row check_group">
                <div class="col-md-1">
                    <h4><?php echo app('translator')->get( 'business.product' ); ?></h4>
                </div>
                <div class="col-md-2">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

                        </label>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'product.view', in_array('product.view', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.product.view' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'product.create', in_array('product.create', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.product.create' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'product.update', in_array('product.update', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.product.update' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'product.delete', in_array('product.delete', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.product.delete' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'product.opening_stock', in_array('product.opening_stock', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.add_opening_stock' ), false); ?>

                            </label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'stcok_compares', in_array('stcok_compares', $role_permissions),
                                [ 'class' => 'input-icheck']); ?>مقارنة المخازن
                            </label>
                        </div>
                    </div>



                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'view_purchase_price', in_array('view_purchase_price', $role_permissions),['class' => 'input-icheck']); ?>

                                <?php echo e(__('lang_v1.view_purchase_price'), false); ?>

                            </label>
                            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.view_purchase_price_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php if(in_array('purchases', $enabled_modules) || in_array('stock_adjustment', $enabled_modules) ): ?>
                <div class="row check_group">
                    <div class="col-md-1">
                        <h4><?php echo app('translator')->get( 'role.purchase' ); ?></h4>
                    </div>
                    <div class="col-md-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-9">




                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'purchase.view', in_array('purchase.view', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> عرض المشتريات
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'purchase.porduct_qty_setting', in_array('purchase.porduct_qty_setting', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> ضبط كمية المنتجات والمخزون الهالك
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'purchase.create', in_array('purchase.create', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.purchase.create' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'purchase.edit_composeit_discount', in_array('purchase.edit_composeit_discount', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> تعديل قيم الخصم المركب اثناء الشراء
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'purchase.update', in_array('purchase.update', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.purchase.update' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'purchase.delete', in_array('purchase.delete', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.purchase.delete' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'purchase.payments', in_array('purchase.payments', $role_permissions),['class' => 'input-icheck']); ?>

                                    اضافة دفع شراء
                                </label>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'purchase_payment.edit', in_array('purchase_payment.edit', $role_permissions),['class' => 'input-icheck']); ?>

                                    تعديل دفع الشراء
                                </label>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'purchase_payment.delete', in_array('purchase_payment.delete', $role_permissions),['class' => 'input-icheck']); ?>

                                    حذف دفغ الشراء
                                </label>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'purchase.update_status', in_array('purchase.update_status', $role_permissions),['class' => 'input-icheck']); ?>

                                    <?php echo e(__('lang_v1.update_status'), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'view_own_purchase', in_array('view_own_purchase', $role_permissions),['class' => 'input-icheck']); ?>

                                    <?php echo e(__('lang_v1.view_own_purchase'), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'purchase_return.view', in_array('purchase_return.view', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> مرتجع المشتريات
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'purchase_return.create', in_array('purchase_return.create', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> اضافة مرتجع المشتريات
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-----------------for stocktransfer -------------------->
                <div class="row check_group">
                    <div class="col-md-1">
                        <h4>تحويلات المخازن </h4>
                    </div>
                    <div class="col-md-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-9">



                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'stock_transfer', in_array('stock_transfer', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?>عرض تحويلات المخازن
                                </label>
                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'stock_transfer.create_pending', in_array('stock_transfer.create_pending', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> انشاء وتعديل  تحويل مخازن -طلب -
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'stock_transfer.create_confirmed', in_array('stock_transfer.create_confirmed', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> انشاء وتعديل  تحويل مخازن -  تأكيد-
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'stock_transfer.create_in_transit', in_array('stock_transfer.create_in_transit', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> انشاء وتعديل  تحويل مخازن - تسليم -

                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'stock_transfer.create_completed', in_array('stock_transfer.create_completed', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> انشاء وتعديل  تحويل مخازن - استلام --

                                </label>
                            </div>
                        </div>

                    </div>
                </div>

            <?php endif; ?>

        
            <div class="row check_group">
                <div class="col-md-1">
                    <h4><?php echo app('translator')->get( 'sale.sale' ); ?></h4>
                </div>
                <div class="col-md-2">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

                        </label>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'sales.print_invoice', in_array('sales.print_invoice', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> طباعة الفاتورة
                            </label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'sales.pos_meswada', in_array('sales.pos_meswada', $role_permissions),
                                [ 'class' => 'input-icheck']); ?>     عمل مسودة
                            </label>
                        </div>
                    </div>


                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'sales.edit_composite_discount', in_array('sales.edit_composite_discount', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?>      تعديل الخصم المركب في نقطة البيع
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'sales.price_offer', in_array('sales.price_offer', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?>    عمل عرض سعر
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'sales.puse_sell', in_array('sales.puse_sell', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?>     تعليق عملية بيع
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'sales.puse_show', in_array('sales.puse_show', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?>عرض عمليات البيع المعلقة
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'sales.sell_agel', in_array('sales.sell_agel', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?>     بيع اجل
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'sales.pay_card', in_array('sales.pay_card', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?>     بطاقة دفع
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'sales.multi_pay_ways', in_array('sales.multi_pay_ways', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?>     طرق تحصيل متعددة
                                </label>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'sales.sell_in_cash', in_array('sales.sell_in_cash', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?>     بيع كاش
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'sales.less_than_purchase_price', in_array('sales.less_than_purchase_price', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?>     البيع باقل من سعر الشراء
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'sales.show', in_array('sales.show', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> عرض قائمة المبيعات
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'sales.show_current_stock_in_pos', in_array('sales.show_current_stock_in_pos', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> عرض المخزون الحالي  في نقطة البيع
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'sales.show_purchase_price_in_pos', in_array('sales.show_purchase_price_in_pos', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> عرض سعر الشراء في نقطة البيع
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'today_sells_total.show', in_array('today_sells_total.show', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> عرض الاجمالي اليومي
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'sell.view', in_array('sell.view', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.sell.view' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'sell.installment', in_array('sell.installment', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> جميع الاقساط
                                </label>
                            </div>
                        </div>
                        <?php if(in_array('pos_sale', $enabled_modules)): ?>
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <?php echo Form::checkbox('permissions[]', 'sell.create', in_array('sell.create', $role_permissions),
                                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.sell.create' ), false); ?>

                                    </label>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'sell.update', in_array('sell.update', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.sell.update' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'sell.delete', in_array('sell.delete', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.sell.delete' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <?php if(in_array('add_sale', $enabled_modules)): ?>
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <?php echo Form::checkbox('permissions[]', 'direct_sell.access', in_array('direct_sell.access', $role_permissions),
                                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.direct_sell.access' ), false); ?>

                                    </label>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'list_drafts', in_array('list_drafts', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.list_drafts' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'list_quotations', in_array('list_quotations', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.list_quotations' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'view_own_sell_only', in_array('view_own_sell_only', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.view_own_sell_only' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'sell.payments', in_array('sell.payments', $role_permissions),['class' => 'input-icheck']); ?>

                                    اضافة دفع بيع
                                </label>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'sell_payment.edit', in_array('sell_payment.edit', $role_permissions),['class' => 'input-icheck']); ?>

                                    تعديل دفع البيع
                                </label>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'sell_payment.delete', in_array('sell_payment.delete', $role_permissions),['class' => 'input-icheck']); ?>

                                    حذف دفغ البيع
                                </label>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'edit_product_price_from_sale_screen', in_array('edit_product_price_from_sale_screen', $role_permissions), ['class' => 'input-icheck']); ?>

                                    <?php echo e(__('lang_v1.edit_product_price_from_sale_screen'), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'edit_product_price_from_pos_screen', in_array('edit_product_price_from_pos_screen', $role_permissions), ['class' => 'input-icheck']); ?>

                                    <?php echo e(__('lang_v1.edit_product_price_from_pos_screen'), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'edit_product_discount_from_sale_screen', in_array('edit_product_discount_from_sale_screen', $role_permissions), ['class' => 'input-icheck']); ?>

                                    <?php echo e(__('lang_v1.edit_product_discount_from_sale_screen'), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'edit_product_discount_from_pos_screen', in_array('edit_product_discount_from_pos_screen', $role_permissions), ['class' => 'input-icheck']); ?>

                                    <?php echo e(__('lang_v1.edit_product_discount_from_pos_screen'), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'discount.access', in_array('discount.access', $role_permissions), ['class' => 'input-icheck']); ?>

                                    <?php echo e(__('lang_v1.discount.access'), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'access_shipping', in_array('access_shipping', $role_permissions), ['class' => 'input-icheck']); ?>

                                    <?php echo e(__('lang_v1.access_shipping'), false); ?>

                                </label>
                            </div>
                        </div>
                        <?php if(in_array('types_of_service', $enabled_modules)): ?>
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <?php echo Form::checkbox('permissions[]', 'access_types_of_service', in_array('access_types_of_service', $role_permissions),
                                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.access_types_of_service' ), false); ?>

                                    </label>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'access_sell_return', in_array('access_sell_return', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'مرتجع المبيعات' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'importsales.create', in_array('importsales.create', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> استيراد مبيعات من نظام اخر
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'recent_transaction.view', in_array('recent_transaction.view', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?>     اخر المعاملات في شاشة نقاط البيع
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'customer_balance_due_in_pos', in_array('customer_balance_due_in_pos', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?>    عرض الرصيد المستحق علي العميل في شاشة نقاط البيع
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'pos_lite',  in_array('pos_lite', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?>    نقطة بيع لايت
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'pos_repair',  in_array('pos_repair', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?>    نقطة بيع الصيانة
                                </label>
                            </div>
                        </div>




                </div>
            </div>


            
            <div class="row check_group">
                <div class="col-md-1">
                    <h4><?php echo app('translator')->get( 'role.expenses' ); ?></h4>
                </div>
                <div class="col-md-2">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

                        </label>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'expenses.view',  in_array('expenses.view', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.expenses.view' ), false); ?>

                            </label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'expense.categories', in_array('expenses.categories', $role_permissions),
                                ['class' => 'input-icheck']); ?> <?php echo e(__('role.expenses.categories'), false); ?>

                            </label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'expense.create', in_array('expenses.create', $role_permissions),
                                ['class' => 'input-icheck']); ?> <?php echo e(__('role.expenses.create'), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'expense.edit',  in_array('expenses.edit', $role_permissions),
                                ['class' => 'input-icheck']); ?> <?php echo e(__('role.expenses.edit'), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'expense.delete',  in_array('expenses.delete', $role_permissions),
                                ['class' => 'input-icheck']); ?> <?php echo e(__('role.expenses.delete'), false); ?>

                            </label>
                        </div>
                    </div>
                </div>
            </div>


            





                <div class="row check_group">
                    <div class="col-md-1">
                        <h4><?php echo app('translator')->get( 'cash_register.cash_register' ); ?></h4>
                    </div>
                    <div class="col-md-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'view_cash_register', in_array('view_cash_register', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.view_cash_register' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'close_cash_register', in_array('close_cash_register', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.close_cash_register' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'register_payment_details.view', in_array('register_payment_details.view', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?>    عرض تفاصيل الدفعات  في كشف الوردية
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'register_product_details.view',in_array('register_product_details.view', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?>     عرض تفاصيل المنتجات المباعة في كشف الوردية
                                </label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row check_group">
                    <div class="col-md-1">
                        <h4><?php echo app('translator')->get( 'role.brand' ); ?></h4>
                    </div>
                    <div class="col-md-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'brand.view', in_array('brand.view', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.brand.view' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'brand.create', in_array('brand.create', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.brand.create' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'brand.update', in_array('brand.update', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.brand.update' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'brand.delete', in_array('brand.delete', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.brand.delete' ), false); ?>

                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row check_group">
                    <div class="col-md-1">
                        <h4><?php echo app('translator')->get( 'role.tax_rate' ); ?></h4>
                    </div>
                    <div class="col-md-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'tax_rate.view', in_array('tax_rate.view', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.tax_rate.view' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'tax_rate.create', in_array('tax_rate.create', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.tax_rate.create' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'tax_rate.update', in_array('tax_rate.update', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.tax_rate.update' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'tax_rate.delete', in_array('tax_rate.delete', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.tax_rate.delete' ), false); ?>

                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row check_group">
                    <div class="col-md-1">
                        <h4><?php echo app('translator')->get( 'role.unit' ); ?></h4>
                    </div>
                    <div class="col-md-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'unit.view', in_array('unit.view', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.unit.view' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'unit.create', in_array('unit.create', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.unit.create' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'unit.update', in_array('unit.update', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.unit.update' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'unit.delete', in_array('unit.delete', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.unit.delete' ), false); ?>

                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row check_group">
                    <div class="col-md-1">
                        <h4><?php echo app('translator')->get( 'category.category' ); ?></h4>
                    </div>
                    <div class="col-md-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'category.view', in_array('category.view', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.category.view' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'category.create', in_array('category.create', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.category.create' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'category.update', in_array('category.update', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.category.update' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'category.delete', in_array('category.delete', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.category.delete' ), false); ?>

                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row check_group">
                    <div class="col-md-1">
                        <h4><?php echo app('translator')->get( 'role.report' ); ?></h4>
                    </div>
                    <div class="col-md-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <?php if(in_array('purchases', $enabled_modules) || in_array('add_sale', $enabled_modules) || in_array('pos_sale', $enabled_modules)): ?>
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <?php echo Form::checkbox('permissions[]', 'purchase_n_sell_report.view', in_array('purchase_n_sell_report.view', $role_permissions),
                                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.purchase_n_sell_report.view' ), false); ?>

                                    </label>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'tax_report.view', in_array('tax_report.view', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.tax_report.view' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'contacts_report.view', in_array('contacts_report.view', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.contacts_report.view' ), false); ?>

                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'profit_loss_report.view', in_array('profit_loss_report.view', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.profit_loss_report.view' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'stock_report.view', in_array('stock_report.view', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.stock_report.view' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'stock_missing_report.view', in_array('stock_missing_report.view', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> تقرير النواقص
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'trending_product_report.view', in_array('trending_product_report.view', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.trending_product_report.view' ), false); ?>

                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'register_report.view', in_array('register_report.view', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> تقرير الوردية
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'sales_representative.view', in_array('sales_representative.view', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.sales_representative.view' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'view_product_stock_value', in_array('view_product_stock_value', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.view_product_stock_value' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'less_trending_product_report.view', in_array('less_trending_product_report.view', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> المنتجات الراكدة
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'sell_purchase_lines_report.view', in_array('sell_purchase_lines_report.view', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> تقرير حركة صنف
                                </label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row check_group">
                    <div class="col-md-1">
                        <h4><?php echo app('translator')->get( 'role.settings' ); ?></h4>
                    </div>
                    <div class="col-md-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-md-9">

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'business_settings.backup_database', in_array('business_settings.backup_database', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> نسخ احتياطي
                                </label>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'business_settings.access', in_array('business_settings.access', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.business_settings.access' ), false); ?>

                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'barcode_settings.access', in_array('barcode_settings.access', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.barcode_settings.access' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'invoice_settings.access', in_array('invoice_settings.access', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.invoice_settings.access' ), false); ?>

                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'access_printers', in_array('access_printers', $role_permissions),['class' => 'input-icheck']); ?>

                                    <?php echo e(__('lang_v1.access_printers'), false); ?>

                                </label>
                            </div>
                        </div>
                    </div>
                </div>

        <div style="display: none">
            
            <div class="row check_group">
                <div class="col-md-3">
                    <h4><?php echo app('translator')->get( 'role.dashboard' ); ?></h4>
                </div>
                <div class="col-md-9">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'dashboard.data', in_array('dashboard.data', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'role.dashboard.data' ), false); ?>

                            </label>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="row check_group">
                <div class="col-md-3">
                    <h4><?php echo app('translator')->get( 'account.account' ); ?></h4>
                </div>
                <div class="col-md-9">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('permissions[]', 'account.access', in_array('account.access', $role_permissions),
                                [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.access_accounts' ), false); ?>

                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>


                <?php if(in_array('booking', $enabled_modules)): ?>
                    <div class="row check_group">
                        <div class="col-md-1">
                            <h4><?php echo app('translator')->get( 'restaurant.bookings' ); ?></h4>
                        </div>
                        <div class="col-md-2">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' ), false); ?>

                                </label>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <?php echo Form::checkbox('permissions[]', 'crud_all_bookings', in_array('crud_all_bookings', $role_permissions),
                                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'restaurant.add_edit_view_all_booking' ), false); ?>

                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <?php echo Form::checkbox('permissions[]', 'crud_own_bookings', in_array('crud_own_bookings', $role_permissions),
                                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'restaurant.add_edit_view_own_booking' ), false); ?>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>
                <div class="row check_group ">
                    <div class="col-md-3">
                        <h4><?php echo app('translator')->get( 'lang_v1.access_selling_price_groups' ); ?></h4>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::checkbox('permissions[]', 'access_default_selling_price', in_array('access_default_selling_price', $role_permissions),
                                    [ 'class' => 'input-icheck']); ?> <?php echo e(__('lang_v1.default_selling_price'), false); ?>

                                </label>
                            </div>
                        </div>
                        <?php if(count($selling_price_groups) > 0): ?>
                            <?php $__currentLoopData = $selling_price_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selling_price_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label>
                                            <?php echo Form::checkbox('spg_permissions[]', 'selling_price_group.' . $selling_price_group->id, in_array('selling_price_group.' . $selling_price_group->id, $role_permissions),
                                            [ 'class' => 'input-icheck']); ?> <?php echo e($selling_price_group->name, false); ?>

                                        </label>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>

            
              
           
            

            
               
                <?php if(in_array('tables', $enabled_modules)): ?>
                    <div class="row">
                        <div class="col-md-3">
                            <h4><?php echo app('translator')->get( 'restaurant.restaurant' ); ?></h4>
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <?php echo Form::checkbox('permissions[]', 'access_tables', in_array('access_tables', $role_permissions),
                                        [ 'class' => 'input-icheck']); ?> <?php echo e(__('lang_v1.access_tables'), false); ?>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php echo $__env->make('role.partials.module_permissions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right"><?php echo app('translator')->get( 'messages.update' ); ?></button>
                    </div>
                </div>

            <?php echo Form::close(); ?>

        <?php echo $__env->renderComponent(); ?>
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/role/edit.blade.php ENDPATH**/ ?>