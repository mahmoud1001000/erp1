
<?php $__env->startSection('title', __( 'restaurant.kitchen' )); ?>

<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?php echo app('translator')->get('restaurant.kitchen'); ?></h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('location_id',  __('purchase.business_location') . ':'); ?>

                            <?php echo Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%']); ?>

                        </div>
                    </div>


                <?php echo $__env->renderComponent(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>

                    <?php if(auth()->user()->can('kitchen.create')): ?>
                        <button type="button" class="btn btn-block btn-primary btn-modal" onclick="addkitchen()" style="max-width: 150px">
                            <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></button>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="kitchen_table">
                            <thead>
                            <tr>
                                <th><?php echo app('translator')->get('business.location'); ?></th>
                                <th>المطبخ</th>
                                <th>الوصف</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody  id="datatable">
                            </tbody>
                              </table>
                    </div>
                <?php echo $__env->renderComponent(); ?>
            </div>
        </div>

    </section>

    <div class="modal fade  view_model" tabindex="-1" role="dialog"
         aria-labelledby="gridSystemModalLabel">
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script>
 $(document).ready(function(){
            getdata();
        });
       
       function getdata(){
            var location_id=$('#location_id').val();
             $.ajax({
                url: '/modules/kitchen',
                type:'GET',
                data:{
                    location_id:location_id
                     },
                success: function(result) {
                   $('#datatable').html(result);
                }
            });
        }

        $('#location_id').on('change',function () {
            getdata();
        });

        function addkitchen() {
            $.ajax({
                url: '/modules/kitchen/create',
                dataType: 'html',
                success: function(result) {
                    $(".view_model").html(result)
                        .modal('show');
                },
            });
        }

        $(document).on('submit', 'form#kitchen_create', function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                method: 'POST',
                url:'/modules/kitchen/store',
                dataType: 'json',
                  data: data,
                success: function(result) {
                    if (result.success == true) {
                        $(".view_model").modal('hide');
                        toastr.success(result.msg);
                        getdata();
                    } else {
                        toastr.error(result.msg);
                    }
                },
            });

        });

        function edit(id) {
            $.ajax({
                url: '/modules/kitchen/edit/'+id,
                dataType: 'html',
                success: function(result) {
                    $(".view_model").html(result)
                        .modal('show');
                },
            });
        }

        $(document).on('submit', 'form#kitchen_edit', function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                method: 'POST',
                url:'/modules/kitchen/update',
                dataType: 'json',
                data: data,
                success: function(result) {
                    if (result.success == true) {
                        $(".view_model").modal('hide');
                        toastr.success(result.msg);
                        getdata();
                    } else {
                        toastr.error(result.msg);
                    }
                },
            });

        });



        function  deleterow(id) {
            swal({
                title: LANG.sure,
                text: 'هل تريد حذف المطبخ',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then(willDelete => {
                if (willDelete) {
                    var href = '/modules/kitchen/delete/'+id;
                    var data = id;
                    $.ajax({
                        method: 'post',
                        url: href,
                        dataType: 'json',
                        data:{
                            data:data
                        },
                        success: function(result) {
                            if (result.success == true) {
                                toastr.success(result.msg);
                                var drow = document.getElementById(id);
                                drow.parentNode.removeChild(drow);
                            } else {
                                toastr.error(result.msg);
                            }
                        },
                    });
                }
            });
        }

    </script>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/restaurant/kitchen/view.blade.php ENDPATH**/ ?>