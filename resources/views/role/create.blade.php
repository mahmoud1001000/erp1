@extends('layouts.app')
@section('title', __('role.add_role'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>@lang( 'role.add_role' )</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        @component('components.widget', ['class' => 'box-primary'])
            {!! Form::open(['url' => action('RoleController@store'), 'method' => 'post', 'id' => 'role_add_form' ]) !!}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('name', __( 'user.role_name' ) . ':*') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => __( 'user.role_name' ) ]); !!}
                    </div>
                </div>
            </div>

            @if(in_array('service_staff', $enabled_modules))
                <div class="row">
                    <div class="col-md-2">
                        <h4>@lang( 'lang_v1.user_type' )</h4>
                    </div>
                    <div class="col-md-9 col-md-offset-1">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('is_service_staff', 1, false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'restaurant.service_staff' ) }}
                                </label>
                                @show_tooltip(__('restaurant.tooltip_service_staff'))
                            </div>
                        </div>
                    </div>
                </div>
            @endif


            <div class="row">
                <div class="col-md-3">
                    <label>@lang( 'user.permissions' ):</label>
                </div>
            </div>

            <div class="row check_group">
                <div class="col-md-1">
                    <h4>@lang( 'role.user' )</h4>
                </div>
                <div class="col-md-2">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
                        </label>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'user.view', false,
                                [ 'class' => 'input-icheck']); !!} {{ __( 'role.user.view' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'user.create', false,
                                [ 'class' => 'input-icheck']); !!} {{ __( 'role.user.create' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'user.update', false,
                                [ 'class' => 'input-icheck']); !!} {{ __( 'role.user.update' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'user.delete', false,
                                [ 'class' => 'input-icheck']); !!} {{ __( 'role.user.delete' ) }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row check_group">
                <div class="col-md-1">
                    <h4>@lang( 'user.roles' )</h4>
                </div>
                <div class="col-md-2">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
                        </label>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'roles.view', false,
                                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_role' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'roles.create', false,
                                [ 'class' => 'input-icheck']); !!} {{ __( 'role.add_role' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'roles.update', false,
                                [ 'class' => 'input-icheck']); !!} {{ __( 'role.edit_role' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'roles.delete', false,
                                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.delete_role' ) }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row check_group">
                <div class="col-md-1">
                    <h4>@lang( 'role.supplier' )</h4>
                </div>
                <div class="col-md-2">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
                        </label>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'supplier.view', false,
                                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_all_supplier' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'supplier.view_own', false,
                                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_own_supplier' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'supplier.create', false,
                                [ 'class' => 'input-icheck']); !!} {{ __( 'role.supplier.create' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'supplier.update', false,
                                [ 'class' => 'input-icheck']); !!} {{ __( 'role.supplier.update' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'supplier.delete', false,
                                [ 'class' => 'input-icheck']); !!} {{ __( 'role.supplier.delete' ) }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row check_group">
                <div class="col-md-1">
                    <h4>@lang( 'role.customer' )</h4>
                </div>
                <div class="col-md-2">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
                        </label>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'customer.view', false,
                                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_all_customer' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'customer.view_own', false,
                                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_own_customer' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'customer.create', false,
                                [ 'class' => 'input-icheck']); !!} {{ __( 'role.customer.create' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'customer.update', false,
                                [ 'class' => 'input-icheck']); !!} {{ __( 'role.customer.update' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'customer.delete', false,
                                [ 'class' => 'input-icheck']); !!} {{ __( 'role.customer.delete' ) }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row check_group">
                <div class="col-md-1">
                    <h4>@lang( 'business.product' )</h4>
                </div>
                <div class="col-md-2">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
                        </label>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'product.view', false,
                                [ 'class' => 'input-icheck']); !!} {{ __( 'role.product.view' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'product.create', false,
                                [ 'class' => 'input-icheck']); !!} {{ __( 'role.product.create' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'product.update', false,
                                [ 'class' => 'input-icheck']); !!} {{ __( 'role.product.update' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'product.delete', false,
                                [ 'class' => 'input-icheck']); !!} {{ __( 'role.product.delete' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'product.opening_stock', false,
                                [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.add_opening_stock' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'stcok_compares', false,
                                [ 'class' => 'input-icheck']); !!}مقارنة المخازن
                            </label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'view_purchase_price', false,['class' => 'input-icheck']); !!}
                                {{ __('lang_v1.view_purchase_price') }}
                            </label>
                            @show_tooltip(__('lang_v1.view_purchase_price_tooltip'))
                        </div>
                    </div>
                </div>
            </div>
            <hr>
           {{--purchase--}}
            @if(in_array('purchases', $enabled_modules) || in_array('stock_adjustment', $enabled_modules) )
                <div class="row check_group">
                    <div class="col-md-1">
                        <h4>@lang( 'role.purchase' )</h4>
                    </div>
                    <div class="col-md-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'purchase.view', false,
                                    [ 'class' => 'input-icheck']); !!} عرض المشتريات
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'purchase.porduct_qty_setting', false,
                                    [ 'class' => 'input-icheck']); !!} ضبط كمية المنتجات والمخزون الهالك
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'purchase.create', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.purchase.create' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'purchase.edit_composeit_discount', false,
                                    [ 'class' => 'input-icheck']); !!} تعديل قيم الخصم المركب اثناء الشراء
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'purchase.update', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.purchase.update' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'purchase.delete', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.purchase.delete' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'purchase_payment.create', false,['class' => 'input-icheck']); !!}
                                    اضافة دفع الشراء
                                </label>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'purchase_payment.edit', false,['class' => 'input-icheck']); !!}
                                    تعديل دفع الشراء
                                </label>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'purchase_payment.delete', false,['class' => 'input-icheck']); !!}
                                    حذف دفع الشراء
                                </label>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'purchase.update_status', false,['class' => 'input-icheck']); !!}
                                    {{ __('lang_v1.update_status') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'view_own_purchase', false,['class' => 'input-icheck']); !!}
                                    {{ __('lang_v1.view_own_purchase') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'purchase_return.view',false,
                                    [ 'class' => 'input-icheck']); !!} مرتجع المشتريات
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'purchase_return.create', false,
                                    [ 'class' => 'input-icheck']); !!} اضافة مرتجع المشتريات
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <!-----------------for stocktransfer -------------------->
                <div class="row check_group">
                    <div class="col-md-1">
                        <h4>تحويلات المخازن </h4>
                    </div>
                    <div class="col-md-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-9">



                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'stock_transfer', false,
                                    [ 'class' => 'input-icheck']); !!}عرض تحويلات المخازن
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'stock_transfer.create_pending', false,
                                    [ 'class' => 'input-icheck']); !!} إنشاء وتعديل تحويل مخازن -في الانتظار-
                                </label>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'stock_transfer.create_in_transit',false,
                                    [ 'class' => 'input-icheck']); !!} إنشاء وتعديل تحويل مخازن -اثناء النقل -

                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'stock_transfer.completed', false,
                                    [ 'class' => 'input-icheck']); !!} إنشاء وتعديل تحويل مخازن - منجز--

                                </label>
                            </div>
                        </div>

                    </div>
                </div>
                <hr>
                <!-----------------for stocktacking -------------------->
                <div class="row check_group">
                    <div class="col-md-1">
                        <h4>جرد المخازن</h4>
                    </div>
                    <div class="col-md-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'stocktacking.view', false,
                                    [ 'class' => 'input-icheck']); !!} اظهار صفحة الجرد
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'stocktacking.show_qty_available', false,
                                    [ 'class' => 'input-icheck']); !!} اظهار الكمية الحالية أثناء الجرد
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'stocktacking.create', false,
                                    [ 'class' => 'input-icheck']); !!} انشاء جرد
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'stocktacking.changeStatus', false,
                                    [ 'class' => 'input-icheck']); !!} تغير حالة الجرد
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'stocktacking.products', false,
                                    [ 'class' => 'input-icheck']); !!}  جرد المنتجات
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'stocktacking.delete_form_stocktacking', false,
                                    [ 'class' => 'input-icheck']); !!}  حذف منتج من الجرد
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'stocktacking.report', false,['class' => 'input-icheck']); !!}
                                    عرض تقارير المنتجات المجرودة
                                </label>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'stocktacking.liquidation', false,['class' => 'input-icheck']); !!}
                                    عمل تصفية
                                </label>
                            </div>
                        </div>


                    </div>
                </div>
                <hr>
            @endif

            {{-- sale--}}
            <div class="row check_group">
                <div class="col-md-1">
                    <h4>@lang( 'sale.sale' )</h4>
                </div>
                <div class="col-md-2">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
                        </label>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'sales.pos_meswada', false,
                                [ 'class' => 'input-icheck']); !!}     عمل مسودة
                            </label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'sales.edit_composite_discount',false,
                                    [ 'class' => 'input-icheck']); !!}      تعديل الخصم المركب في نقطة البيع
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'sales.price_offer', false,
                                    [ 'class' => 'input-icheck']); !!}    عمل عرض سعر
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'sales.puse_sell', false,
                                    [ 'class' => 'input-icheck']); !!} تعليق عملية بيع
                                </label>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'sales.puse_showall', false,
                                    [ 'class' => 'input-icheck']); !!}عرض عمليات البيع المعلقة
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'sales.sell_agel',false,
                                    [ 'class' => 'input-icheck']); !!}     بيع اجل
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'sales.pay_card', false,
                                    [ 'class' => 'input-icheck']); !!}     بطاقة دفع
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'sales.multi_pay_ways', false,
                                    [ 'class' => 'input-icheck']); !!}     طرق تحصيل متعددة
                                </label>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'sales.sell_in_cash', false,
                                    [ 'class' => 'input-icheck']); !!}     بيع كاش
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'sales.less_than_purchase_price', false,
                                    [ 'class' => 'input-icheck']); !!}     البيع باقل من سعر الشراء
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'sell.view', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.sell.view' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'sell.installment', false,
                                    [ 'class' => 'input-icheck']); !!} جميع الاقساط
                                </label>
                            </div>
                        </div>
                        @if(in_array('pos_sale', $enabled_modules))
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox('permissions[]', 'sell.create', false,
                                        [ 'class' => 'input-icheck']); !!} {{ __( 'role.sell.create' ) }}
                                    </label>
                                </div>
                            </div>
                        @endif
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'sell.update', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.sell.update' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'sell.delete', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.sell.delete' ) }}
                                </label>
                            </div>
                        </div>
                        @if(in_array('add_sale', $enabled_modules))
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox('permissions[]', 'direct_sell.access', false,
                                        [ 'class' => 'input-icheck']); !!} {{ __( 'role.direct_sell.access' ) }}
                                    </label>
                                </div>
                            </div>
                        @endif
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'list_drafts', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.list_drafts' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'list_quotations', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.list_quotations' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'view_own_sell_only', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_own_sell_only' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'sell_payment.create', false,['class' => 'input-icheck']); !!}
                                    اضافة دفع بيع
                                </label>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'sell_payment.edit', false,['class' => 'input-icheck']); !!}
                                    تعديل دفع البيع
                                </label>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'sell_payment.delete', false,['class' => 'input-icheck']); !!}
                                    حذف دفغ البيع
                                </label>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'edit_product_price_from_sale_screen', false, ['class' => 'input-icheck']); !!}
                                    {{ __('lang_v1.edit_product_price_from_sale_screen') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'edit_product_price_from_pos_screen', false, ['class' => 'input-icheck']); !!}
                                    {{ __('lang_v1.edit_product_price_from_pos_screen') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'edit_product_discount_from_sale_screen', false, ['class' => 'input-icheck']); !!}
                                    {{ __('lang_v1.edit_product_discount_from_sale_screen') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'edit_product_discount_from_pos_screen', false, ['class' => 'input-icheck']); !!}
                                    {{ __('lang_v1.edit_product_discount_from_pos_screen') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'discount.access', false, ['class' => 'input-icheck']); !!}
                                    {{ __('lang_v1.discount.access') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'access_shipping', false, ['class' => 'input-icheck']); !!}
                                    {{ __('lang_v1.access_shipping') }}
                                </label>
                            </div>
                        </div>
                        @if(in_array('types_of_service', $enabled_modules))
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox('permissions[]', 'access_types_of_service', false,
                                        [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.access_types_of_service' ) }}
                                    </label>
                                </div>
                            </div>
                        @endif
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'access_sell_return', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'مرتجع المبيعات' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'importsales.create', false,
                                    [ 'class' => 'input-icheck']); !!} استيراد مبيعات من نظام اخر
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'recent_transaction.view', false,
                                    [ 'class' => 'input-icheck']); !!}     اخر المعاملات في شاشة نقاط البيع
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'customer_balance_due_in_pos', false,
                                    [ 'class' => 'input-icheck']); !!}    عرض الرصيد المستحق علي العميل في شاشة نقاط البيع
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'pos_lite', false,
                                    [ 'class' => 'input-icheck']); !!}    نقطة بيع لايت
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'pos_repair',  false,
                                    [ 'class' => 'input-icheck']); !!}    نقطة بيع الصيانة
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
           <hr>


        {{--Expenses--}}
           <div class="row check_group">
               <div class="col-md-1">
                   <h4>@lang( 'role.expenses' )</h4>
               </div>
               <div class="col-md-2">
                   <div class="checkbox">
                       <label>
                           <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
                       </label>
                   </div>
               </div>
               <div class="col-md-9">
                   <div class="col-md-12">
                       <div class="checkbox">
                           <label>
                               {!! Form::checkbox('permissions[]', 'expenses.view', false,
                               [ 'class' => 'input-icheck']); !!} {{ __( 'role.expenses.view' ) }}
                           </label>
                       </div>
                   </div>

                   <div class="col-md-12">
                       <div class="checkbox">
                           <label>
                               {!! Form::checkbox('permissions[]', 'expense.categories', false,
                               ['class' => 'input-icheck']); !!} {{ __('role.expenses.categories') }}
                           </label>
                       </div>
                   </div>

                   <div class="col-md-12">
                       <div class="checkbox">
                           <label>
                               {!! Form::checkbox('permissions[]', 'expenses.create', false,
                               ['class' => 'input-icheck']); !!} {{ __('role.expenses.create') }}
                           </label>
                       </div>
                   </div>
                   <div class="col-md-12">
                       <div class="checkbox">
                           <label>
                               {!! Form::checkbox('permissions[]', 'expenses.edit', false,
                               ['class' => 'input-icheck']); !!} {{ __('role.expenses.edit') }}
                           </label>
                       </div>
                   </div>
                   <div class="col-md-12">
                       <div class="checkbox">
                           <label>
                               {!! Form::checkbox('permissions[]', 'expenses.delete', false,
                               ['class' => 'input-icheck']); !!} {{ __('role.expenses.delete') }}
                           </label>
                       </div>
                   </div>
               </div>
           </div>
          <hr>

            {{--cash_register    الوردية--}}
                <div class="row check_group">
                    <div class="col-md-1">
                        <h4>@lang( 'cash_register.cash_register' )</h4>
                    </div>
                    <div class="col-md-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'view_cash_register', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_cash_register' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'close_cash_register', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.close_cash_register' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'register_product_details.view', false,
                                    [ 'class' => 'input-icheck']); !!}     عرض تفاصيل المنتجات المباعة في كشف الوردية
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'register_payment_details.view', false,
                                    [ 'class' => 'input-icheck']); !!}    عرض تفاصيل الدفعات  في كشف الوردية
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="row check_group">
                    <div class="col-md-1">
                        <h4>@lang( 'role.brand' )</h4>
                    </div>
                    <div class="col-md-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'brand.view', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.brand.view' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'brand.create', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.brand.create' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'brand.update', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.brand.update' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'brand.delete', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.brand.delete' ) }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row check_group">
                    <div class="col-md-1">
                        <h4>@lang( 'role.tax_rate' )</h4>
                    </div>
                    <div class="col-md-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'tax_rate.view', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.tax_rate.view' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'tax_rate.create', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.tax_rate.create' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'tax_rate.update', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.tax_rate.update' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'tax_rate.delete', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.tax_rate.delete' ) }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row check_group">
                    <div class="col-md-1">
                        <h4>@lang( 'role.unit' )</h4>
                    </div>
                    <div class="col-md-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'unit.view', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.unit.view' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'unit.create', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.unit.create' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'unit.update', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.unit.update' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'unit.delete', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.unit.delete' ) }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row check_group">
                    <div class="col-md-1">
                        <h4>@lang( 'category.category' )</h4>
                    </div>
                    <div class="col-md-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'category.view', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.category.view' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'category.create', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.category.create' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'category.update', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.category.update' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'category.delete', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.category.delete' ) }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row check_group">
                    <div class="col-md-1">
                        <h4>@lang( 'role.report' )</h4>
                    </div>
                    <div class="col-md-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        @if(in_array('purchases', $enabled_modules) || in_array('add_sale', $enabled_modules) || in_array('pos_sale', $enabled_modules))
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox('permissions[]', 'purchase_n_sell_report.view', false,
                                        [ 'class' => 'input-icheck']); !!} {{ __( 'role.purchase_n_sell_report.view' ) }}
                                    </label>
                                </div>
                            </div>
                        @endif
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'tax_report.view', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.tax_report.view' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'contacts_report.view', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.contacts_report.view' ) }}
                                </label>
                            </div>
                        </div>
                        @if(in_array('expenses', $enabled_modules))
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox('permissions[]', 'expense_report.view', false,
                                        [ 'class' => 'input-icheck']); !!} {{ __( 'role.expense_report.view' ) }}
                                    </label>
                                </div>
                            </div>
                        @endif
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'profit_loss_report.view', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.profit_loss_report.view' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'stock_report.view', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.stock_report.view' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'stock_missing_report.view', false,
                                    [ 'class' => 'input-icheck']); !!} تقرير النواقص
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'trending_product_report.view', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.trending_product_report.view' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'register_report.view', false,
                                    [ 'class' => 'input-icheck']); !!} عرض تقرير الوردية
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'sales_representative.view', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.sales_representative.view' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'view_product_stock_value', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.view_product_stock_value' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'less_trending_product_report.view', false,
                                    [ 'class' => 'input-icheck']); !!} المنتجات الراكدة
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'sell_purchase_lines_report.view', false,
                                    [ 'class' => 'input-icheck']); !!} تقرير حركة صنف
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row check_group">
                    <div class="col-md-1">
                        <h4>@lang( 'role.settings' )</h4>
                    </div>

                    <div class="col-md-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('permissions[]', 'business_settings.backup_database', false,
                                [ 'class' => 'input-icheck']); !!} نسخ احتياطي
                            </label>
                        </div>
                    </div>

                    <div class="col-md-9">

                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'business_settings.access', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.business_settings.access' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'barcode_settings.access', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.barcode_settings.access' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'invoice_settings.access', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.invoice_settings.access' ) }}
                                </label>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'access_printers', false,['class' => 'input-icheck']); !!}
                                    {{ __('lang_v1.access_printers') }}
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
                <hr>
                <div class="row check_group">
                    <div class="col-md-3">
                        <h4>@lang( 'role.dashboard' ) @show_tooltip(__('tooltip.dashboard_permission'))</h4>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'dashboard.data', true,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'role.dashboard.data' ) }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row check_group">
                    <div class="col-md-3">
                        <h4>@lang( 'account.account' )</h4>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'account.access', false,
                                    [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.access_accounts' ) }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                @if(in_array('booking', $enabled_modules))
                    <div class="row check_group">
                        <div class="col-md-1">
                            <h4>@lang( 'restaurant.bookings' )</h4>
                        </div>
                        <div class="col-md-2">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="check_all input-icheck" > {{ __( 'role.select_all' ) }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox('permissions[]', 'crud_all_bookings', false,
                                        [ 'class' => 'input-icheck']); !!} {{ __( 'restaurant.add_edit_view_all_booking' ) }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox('permissions[]', 'crud_own_bookings', false,
                                        [ 'class' => 'input-icheck']); !!} {{ __( 'restaurant.add_edit_view_own_booking' ) }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endif
                <div class="row">
                    <div class="col-md-3">
                        <h4> مديول كاتالوج </h4>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'catalouge.show', false,
                                    [ 'class' => 'input-icheck']); !!} عرض الكتالوج
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <h4> مديول الصيانة </h4>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'repair_setting.view', false,
                                    [ 'class' => 'input-icheck']); !!} الاعدادت
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'repair_device_model.create', false,
                                    [ 'class' => 'input-icheck']); !!} اضافة موديل جهاز
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <h4>@lang( 'lang_v1.access_selling_price_groups' )</h4>
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('permissions[]', 'access_default_selling_price', true,
                                    [ 'class' => 'input-icheck']); !!} {{ __('lang_v1.default_selling_price') }}
                                </label>
                            </div>
                        </div>
                        @if(count($selling_price_groups) > 0)
                            @foreach($selling_price_groups as $selling_price_group)
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::checkbox('spg_permissions[]', 'selling_price_group.' . $selling_price_group->id, false,
                                            [ 'class' => 'input-icheck']); !!} {{ $selling_price_group->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                @if(in_array('tables', $enabled_modules))
                    <div class="row">
                        <div class="col-md-3">
                            <h4>@lang( 'restaurant.restaurant' )</h4>
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox('permissions[]', 'access_tables', false,
                                        [ 'class' => 'input-icheck']); !!} {{ __('lang_v1.access_tables') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @include('role.partials.module_permissions')
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right">@lang( 'messages.save' )</button>
                    </div>
                </div>

            {!! Form::close() !!}
        @endcomponent
    </section>
    <!-- /.content -->
@endsection