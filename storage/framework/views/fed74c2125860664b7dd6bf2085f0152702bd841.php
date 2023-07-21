
<?php $__env->startSection('title', __( 'restaurant.kitchen' )); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .ordermark{
            background-color: #BB6C6C;
            color: #fff9f6;
            text-align: center;
            font-size: 1.6rem;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('kitchen', 'المطبخ' . ':'); ?>

                        <?php echo Form::select('kitchen', $kitchen, null, ['class' => 'form-control select2', 'style' => 'width:100%']); ?>

                    </div>
                </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <!-- Main content -->
    <section class="content ">
     <div class="box">
            <div class="box-header">
                <button type="button" class="btn btn-sm btn-primary pull-right" onclick="getdata()" id="refresh_orders"><i class="fas fa-sync"></i> <?php echo app('translator')->get( 'restaurant.refresh' ); ?></button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" >
                    <thead>
                    <tr style="background-color: #484444;color: #FFF;">
                        <th style="width: 40px">م</th>
                        <th>المطبخ</th>
                        <th>رقم الطلب</th>
                        <th>الطاولة</th>
                        <th>الصنف</th>
                        <th>الإضافات</th>
                        <th>ملاحظات</th>
                        <th>الكمية</th>
                        <th>حالة الطلب</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody  id="datatable">
                    </tbody>
                </table>
            </div>
            <div class="overlay hide">
                <i class="fas fa-sync fa-spin"></i>
            </div>
        </div>

    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script >

        $(document).ready(function () {
            getdata();
        });


        function getdata(){
            var kitchen=$('#kitchen').val();
            $.ajax({
                url: '/modules/kitchen_order',
                type:'GET',
                data:{
                    kitchen:kitchen
                },
                success: function(result) {
                    $('#datatable').html(result);
                }
            });
        }

        $('#kitchen').on('change',function () {
            getdata();
        });


function setstatsu(id,order_id) {

    swal({
        title: LANG.sure,
        text: 'سوف يتم تغيير حالة الطلب ',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
    }).then(willDelete => {
        if (willDelete) {
            $.ajax({
                url: '/modules/setorderstatus',
                type: 'GET',
                data: {
                    id: id
                    , order_id: order_id
                },
                success: function (result) {
                    getdata();
                }
            });
        }

    });

}




    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.restaurant', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/restaurant/kitchen/kitchen_order.blade.php ENDPATH**/ ?>