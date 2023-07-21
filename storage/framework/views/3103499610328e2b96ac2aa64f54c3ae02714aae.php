<?php $__env->startSection('title', __( 'restaurant.orders' )); ?>

<?php $__env->startSection('content'); ?>

<!-- Main content -->
<section class="content min-height-90hv no-print">
    
    <div class="row">
        <div class="col-md-12 text-center">
            <h3><?php echo app('translator')->get( 'restaurant.all_orders' ); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.tooltip_serviceorder') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></h3>
        </div>
        <div class="col-sm-12">
            <button type="button" class="btn btn-sm btn-primary pull-right" id="refresh_orders"><i class="fas fa-sync"></i> <?php echo app('translator')->get( 'restaurant.refresh' ); ?></button>
        </div>
    </div>
    <br>
    <div class="row">
    <?php if(!$is_service_staff): ?>
        <?php $__env->startComponent('components.widget'); ?>
            <div class="col-sm-6">
                <?php echo Form::open(['url' => action('Restaurant\OrderController@index'), 'method' => 'get', 'id' => 'select_service_staff_form' ]); ?>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user-secret"></i>
                        </span>
                        <?php echo Form::select('service_staff', $service_staff, request()->service_staff, ['class' => 'form-control select2', 'placeholder' => __('restaurant.select_service_staff'), 'id' => 'service_staff_id']); ?>

                    </div>
                </div>
                <?php echo Form::close(); ?>

            </div>
        <?php echo $__env->renderComponent(); ?>
    <?php endif; ?>
    <?php $__env->startComponent('components.widget', ['title' => __( 'lang_v1.line_orders' )]); ?>
        <input type="hidden" id="orders_for" value="waiter">
        <div class="row" id="line_orders_div">
         <?php echo $__env->make('restaurant.partials.line_orders', array('orders_for' => 'waiter'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
        </div>
        <div class="overlay hide">
          <i class="fas fa-sync fa-spin"></i>
        </div>
    <?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('components.widget', ['title' => __( 'restaurant.all_your_orders' )]); ?>
        <input type="hidden" id="orders_for" value="waiter">
        <div class="row" id="orders_div">
         <?php echo $__env->make('restaurant.partials.show_orders', array('orders_for' => 'waiter'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
        </div>
        <div class="overlay hide">
          <i class="fas fa-sync fa-spin"></i>
        </div>
    <?php echo $__env->renderComponent(); ?>
    </div>
</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript">
        $('select#service_staff_id').change( function(){
            $('form#select_service_staff_form').submit();
        });
        $(document).ready(function(){
            $(document).on('click', 'a.mark_as_served_btn', function(e){
                e.preventDefault();
                swal({
                  title: LANG.sure,
                  icon: "info",
                  buttons: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var _this = $(this);
                        var href = _this.data('href');
                        $.ajax({
                            method: "GET",
                            url: href,
                            dataType: "json",
                            success: function(result){
                                if(result.success == true){
                                    refresh_orders();
                                    toastr.success(result.msg);
                                } else {
                                    toastr.error(result.msg);
                                }
                            }
                        });
                    }
                });
            });

            $(document).on('click', 'a.mark_line_order_as_served', function(e){
                e.preventDefault();
                swal({
                  title: LANG.sure,
                  icon: "info",
                  buttons: true,
                }).then((sure) => {
                    if (sure) {
                        var _this = $(this);
                        var href = _this.attr('href');
                        $.ajax({
                            method: "GET",
                            url: href,
                            dataType: "json",
                            success: function(result){
                                if(result.success == true){
                                    refresh_orders();
                                    toastr.success(result.msg);
                                } else {
                                    toastr.error(result.msg);
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.restaurant', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/restaurant/orders/index.blade.php ENDPATH**/ ?>