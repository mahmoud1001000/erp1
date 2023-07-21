<?php $__env->startSection('title', __('home.home')); ?>

<?php $__env->startSection('content'); ?>
    <style>
        @font-face {
            font-family: "icomoon";
        format("svg");
            font-weight: normal;
            font-style: normal;
        }
        .info-box-text {
            color: #01070e;
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 2px;
        }

        h5{
            font-family: 'Cairo', sans-serif;
            color: inherit;

        }
        .row-custom .col-custom {
            display: flex;
            /* margin: 0px; */
            padding: 0px 4px;
            margin: 0px 0px;
        }
        .box, .info-box {
            margin-bottom: 7px;
            box-shadow: 0 0 2rem 0 rgba(136,152,170,.15)!important;
            border-radius: 5px;
        }
        .box-icon{
            color: #40485b !important;
            background:white !important;
            text-align:center;
            border: none;
        }
        .box-icon:hover{
            background: #40485b !important;
            color:white !important;
            text-align:center;
        }
        .parent-box{
            border:1px solid #ddd;
            height: 110px;
            background:white;
            padding-top: 20px;
            color: #40485b;
            text-align: center;
        }

        .parent-box h5{
            font-family: 'Cairo', sans-serif;
            font-size: 13px;
        }
        .parent-box i{
            font-size: 36px;



        }
        .list-group-item {
            position: relative;
            display: block;
            padding: 5px 15px;
            margin-bottom: -1px;
            background: inherit;
            border: none;

        }
        .parent-box:hover{
            font-size: 36px;
            background: #40485b !important;
            color:white !important;

        }
        .list-group-item a{
            color: inherit;
            font-size: 10px;
            text-decoration: inherit;
        }
        .list-group-item a:hover{
            color: inherit;
            font-size: 10px;
            text-decoration: revert;
        }
        .icon-user-tie:before {
            content: "\e976";
        }
        .list-group-item {
            position: relative;
            display: block;
            padding: 9px 15px;
            margin-bottom: -1px;
            background: inherit;
            border: none;
        }
        .list-group{
            color: #40485b !important;
            background:white !important;
            text-decoration: none;
            height: 331px;

        }
        .list-group:hover{
            background: #40485b !important;
            color:white !important;
            text-decoration: revert;
        }
        .row{
            background:#fafafa;
        }
        .info-box-new-style .info-box-content {
            padding: 6px 12px 6px 12px;
            margin-left: 64px;
        }
        .info-box-number{
            float:left;
        }
        .total-labels{
            font-size:20px !important;
            float:right;
        }
        .change-charts{
            z-index: 100;
            position: relative;
            top: 36px;
            left:  -55%;
        }
        .cont{
            background-color: #3c3c4e;
            color: white;
            display: block;
            height: 140px;
            text-align: center;
            padding-top: 2px;
            font-size: 23px;
            border-radius: 10px;
            /*border: 1px solid #590631;*/
            margin: auto;
            margin-bottom: auto;
            margin-bottom: 35px;
            
            transition: all .5s ease;
            /*  border-top: 3px solid #18466f;*/
           /* border-bottom: 9px solid #8c1818;*/
        }

        .cont>h3,h2{
            color: #FFFFFF;
        }
        .cont>h3{
            font-size: 16px;
        }
        .cont:hover{
            background-color: #2084ae;
        }

        .cont:hover h2,.cont:hover h3{
            color: white;
        }
    </style>


    <div style="background-color: white;width: 95%; margin: auto;margin-top: 20px;
                padding: 20px;
                border-top: solid;
                border-top-color: currentcolor;
                border-top-style: solid;
                border-top-width: medium;
                border-radius: 10px 10px 0px 0px; ">
        <div class="row">

            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6 ">
                <a href="<?php echo e(action('SellPosController@create'), false); ?>" class="cont" >
                    <h2><i class="fas fa-dollar-sign"></i></h2>
                    <h3><?php echo app('translator')->get('lang_v1.kasher'); ?>   </h3>

                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                <a href="<?php echo e(action('SellController@index'), false); ?>" class="cont" >
                    <h2><i class="fa fa-registered"></i></h2>
                    <h3><?php echo app('translator')->get('lang_v1.sells'); ?>  </h3>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                <a href="<?php echo e(action('ReportController@getproductSellReturnReport'), false); ?>" class="cont" >
                    <h2><i class="fa fa-undo-alt"></i></h2>
                    <h3><?php echo app('translator')->get('lang_v1.sell_return'); ?>  </h3>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                <a href="<?php echo e(action('PurchaseController@index'), false); ?>" class="cont" >
                    <h2><i class="fa fa-cart-plus"></i></h2>
                    <h3> <?php echo app('translator')->get('lang_v1.purchases'); ?> </h3>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                <a href="<?php echo e(action('ReportController@getproductPurchaseReport'), false); ?>" class="cont" >
                    <h2><i class="fa fa-undo-alt"></i></h2>
                    <h3> <?php echo app('translator')->get('lang_v1.purchase_return'); ?> </h3>
                </a>
            </div>


            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                <a href="<?php echo e(action('ProductController@index'), false); ?>" class="cont" >
                    <h2><i class="fa fas fa-cubes"></i></h2>
                    <h3><?php echo app('translator')->get('lang_v1.list_products'); ?>   </h3>
                </a>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                <a href="<?php echo e(action('ContactController@index', ['type' => 'customer']), false); ?>" class="cont" >
                    <h2><i class="fa fas fa-address-book"></i></h2>
                    <h3>  <?php echo app('translator')->get('lang_v1.customers'); ?></h3>
                </a>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                <a href="<?php echo e(action('ContactController@index', ['type' => 'supplier']), false); ?>" class="cont" >
                    <h2><i class="fa fas fa-address-book"></i></h2>
                    <h3><?php echo app('translator')->get('lang_v1.suppliers'); ?>   </h3>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                <a href="<?php echo e(action('ManageUserController@index'), false); ?>" class="cont" >
                    <h2><i class="fa fas fa-users"></i></h2>
                    <h3><?php echo app('translator')->get('lang_v1.users'); ?>   </h3>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                <a href="<?php echo e(action('ExpenseController@index'), false); ?>" class="cont" >
                    <h2><i class="fa fa-truck"></i></h2>
                    <h3><?php echo app('translator')->get('lang_v1.expense'); ?>   </h3>
                </a>
            </div>
       
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                <a href="/repair/dashboard" class="cont" >
                    <h2><i class="fa fas fa-wrench"></i></h2>
                    <h3>   <?php echo app('translator')->get('lang_v1.repair'); ?></h3>
                </a>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                <a href="manufacturing/recipe" class="cont" >
                    <h2><i class="fa fas fa-industry"></i></h2>
                    <h3><?php echo app('translator')->get('lang_v1.manufacturing'); ?>   </h3>
                </a>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                <a href="reports/stock-report" class="cont" >
                    <h2><i class="fa fas fa-chart-bar"></i></h2>
                    <h3><?php echo app('translator')->get('report.stock_report'); ?>   </h3>
                </a>
            </div>


            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                <a href="<?php echo e(action('ReportController@getproductSellReport'), false); ?>" class="cont" >
                    <h2><i class="fa fas fa-shopping-bag"></i></h2>
                    <h3><?php echo app('translator')->get('lang_v1.product_sell_day'); ?>   </h3>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                <a href="<?php echo e(action('ReportController@getproductPurchaseReport'), false); ?>" class="cont" >
                    <h2><i class="fa fas fa-shopping-bag"></i></h2>
                    <h3><?php echo app('translator')->get('lang_v1.product_purchas_day'); ?>   </h3>
                </a>
            </div>

        </div>


        <br><br>

        <br>
        <div class="row">
            <div class="col-md-8 col-xs-12"style="">
                <div class=" pull-right" data-toggle="buttons">
                    <label class="btn btn-info active">
                        <input type="radio" name="date-filter"
                               data-start="<?php echo e(date('Y-m-d'), false); ?>"
                               data-end="<?php echo e(date('Y-m-d'), false); ?>"
                               checked> <?php echo e(__('home.today'), false); ?>

                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="date-filter"
                               data-start="<?php echo e($date_filters['this_week']['start'], false); ?>"
                               data-end="<?php echo e($date_filters['this_week']['end'], false); ?>"
                        > <?php echo e(__('home.this_week'), false); ?>

                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="date-filter-month"
                               data-start="<?php echo e($date_filters['this_month']['start'], false); ?>"
                               data-end="<?php echo e($date_filters['this_month']['end'], false); ?>"
                               checked> <?php echo e(__('home.this_month'), false); ?>

                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="date-filter-year"
                               data-start="<?php echo e($date_filters['this_fy']['start'], false); ?>"
                               data-end="<?php echo e($date_filters['this_fy']['end'], false); ?>"
                               checked> <?php echo e(__('home.this_fy'), false); ?>

                    </label>
                </div>
            </div>
        </div>
        <br>


        <div class="row row-custom">
            <div class="col-md-12">
                <div class="box box-warning">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-custom">
                                <div class="info-box info-box-new-style">

                                    <div class="info-box-content">
                                        <span class="info-box-text" style="color:#2d91ea"><?php echo e(__('home.total_purchase'), false); ?></span>
                                        <table >
                                            <tr>
                                                <td><span class="total-labels">اليوم : </span></td>
                                                <td><span class="info-box-number total_purchase"><i class="fas fa-sync fa-spin fa-fw margin-bottom"></i> </span></td>
                                            </tr>
                                            <tr>
                                                <td></span><span class="total-labels">الشهر : </span></td>
                                                <td><span class="info-box-number total_purchase_month"><i class="fas fa-sync fa-spin fa-fw margin-bottom"></i></td>
                                            </tr>
                                            <tr>
                                                <td></span><span class="total-labels">السنة  : </span></td>
                                                <td><span class="info-box-number total_purchase_year"><i class="fas fa-sync fa-spin fa-fw margin-bottom"></i></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6 col-sm-6 col-xs-12 col-custom">
                                <div class="info-box info-box-new-style">

                                    <div class="info-box-content">
                                        <span class="info-box-text" style="color:#3ebfbe"><?php echo e(__('home.total_sell'), false); ?></span>
                                        <table >
                                            <tr>
                                                <td><span class="total-labels">اليوم : </span></td>
                                                <td><span class="info-box-number total_sell"><i class="fas fa-sync fa-spin fa-fw margin-bottom"></i> </span></td>
                                            </tr>
                                            <tr>
                                                <td></span><span class="total-labels">الشهر : </span></td>
                                                <td><span class="info-box-number total_sell_month"><i class="fas fa-sync fa-spin fa-fw margin-bottom"></i></td>
                                            </tr>
                                            <tr>
                                                <td></span><span class="total-labels">السنة  : </span></td>
                                                <td><span class="info-box-number total_sell_year"><i class="fas fa-sync fa-spin fa-fw margin-bottom"></i></td>
                                            </tr>
                                        </table>


                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-custom">
                                <div class="info-box info-box-new-style">


                                    <div class="info-box-content">
                                        <span class="info-box-text" style="color:#ffb553">مستحقات مشتريات</span>
                                        <table >
                                            <tr>
                                                <td><span class="total-labels">اليوم : </span></td>
                                                <td><span class="info-box-number purchase_due"><i class="fas fa-sync fa-spin fa-fw margin-bottom"></i> </span></td>
                                            </tr>
                                            <tr>
                                                <td></span><span class="total-labels">الشهر : </span></td>
                                                <td><span class="info-box-number purchase_due_month"><i class="fas fa-sync fa-spin fa-fw margin-bottom"></i></td>
                                            </tr>
                                            <tr>
                                                <td></span><span class="total-labels">السنة  : </span></td>
                                                <td><span class="info-box-number purchase_due_year"><i class="fas fa-sync fa-spin fa-fw margin-bottom"></i></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->

                            <!-- fix for small devices only -->
                            <!-- <div class="clearfix visible-sm-block"></div> -->
                            <div class="col-md-6 col-sm-6 col-xs-12 col-custom">
                                <div class="info-box info-box-new-style">


                                    <div class="info-box-content">
                                        <span class="info-box-text" style="color:#f33e6f">مستحقات مبيعات</span>
                                        <table >
                                            <tr>
                                                <td><span class="total-labels">اليوم : </span></td>
                                                <td><span class="info-box-number invoice_due"><i class="fas fa-sync fa-spin fa-fw margin-bottom"></i> </span></td>
                                            </tr>
                                            <tr>
                                                <td></span><span class="total-labels">الشهر : </span></td>
                                                <td><span class="info-box-number invoice_due_month"><i class="fas fa-sync fa-spin fa-fw margin-bottom"></i></td>
                                            </tr>
                                            <tr>
                                                <td></span><span class="total-labels">السنة  : </span></td>
                                                <td><span class="info-box-number invoice_due_year"><i class="fas fa-sync fa-spin fa-fw margin-bottom"></i></td>
                                            </tr>
                                        </table>

                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="row">
                            <!-- expense -->
                            <div class="col-md-12 col-sm-12 col-xs-12 col-custom">
                                <div class="info-box info-box-new-style">


                                    <div class="info-box-content">
                  <span class="info-box-text" style="color:#64d2e9">
                    <?php echo e(__('lang_v1.expense'), false); ?>

                  </span>
                                        <table >
                                            <tr>
                                                <td><span class="total-labels">اليوم : </span></td>
                                                <td><span class="info-box-number total_expense"><i class="fas fa-sync fa-spin fa-fw margin-bottom"></i> </span></td>
                                            </tr>
                                            <tr>
                                                <td></span><span class="total-labels">الشهر : </span></td>
                                                <td><span class="info-box-number total_expense_month"><i class="fas fa-sync fa-spin fa-fw margin-bottom"></i></span></td>
                                            </tr>
                                            <tr>
                                                <td></span><span class="total-labels">السنة  : </span></td>
                                                <td><span class="info-box-number total_expense_year"><i class="fas fa-sync fa-spin fa-fw margin-bottom"></i></span></td>
                                            </tr>
                                        </table>

                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>

        <div class="row">
            <div class="<?php if((session('business.enable_product_expiry') != 1) && auth()->user()->can('stock_report.view')): ?> col-sm-12 <?php else: ?> col-sm-6 <?php endif; ?>">
                <?php $__env->startComponent('components.widget', ['class' => 'box-warning']); ?>
                    <?php $__env->slot('icon'); ?>
                        <i class="fa fa-exclamation-triangle text-yellow" aria-hidden="true"></i>
                    <?php $__env->endSlot(); ?>
                    <?php $__env->slot('title'); ?>
                        <?php echo e(__('home.product_stock_alert'), false); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.product_stock_alert') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                    <?php $__env->endSlot(); ?>
                    <table class="table table-bordered table-striped" id="stock_alert_table" style="width: 100%;">
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->get( 'sale.product' ); ?></th>
                            <th><?php echo app('translator')->get( 'business.location' ); ?></th>
                            <th><?php echo app('translator')->get( 'report.current_stock' ); ?></th>
                        </tr>
                        </thead>
                    </table>
                <?php echo $__env->renderComponent(); ?>
            </div>
        </div>
    </div>






    <!-- /.content -->
    <div class="modal fade payment_modal" tabindex="-1" role="dialog"
         aria-labelledby="gridSystemModalLabel">
    </div>

    <div class="modal fade edit_payment_modal" tabindex="-1" role="dialog"
         aria-labelledby="gridSystemModalLabel">
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/home.js?v=' . $asset_v), false); ?>"></script>
    <script src="<?php echo e(asset('js/payment.js?v=' . $asset_v), false); ?>"></script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u373816316/domains/erp4anyone.com/public_html/4any/resources/views/home/index.blade.php ENDPATH**/ ?>