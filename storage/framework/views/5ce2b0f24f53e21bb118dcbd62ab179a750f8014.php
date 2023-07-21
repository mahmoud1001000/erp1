<?php $__env->startSection('title','الشركاء'); ?>
<?php $__env->startSection('content'); ?>
    <style>
        .table-striped th{
            background-color: #626161;
            color: #ffffff;
        }
    </style>

    <?php echo $__env->make('partners::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="content-header">
        <h1>الشركاء</h1>
    </section>

    <div style="margin:auto;max-width: 70%;">
        <div class="row" >

            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('capital','رأس المال المعتمد :'); ?>

                    <?php echo Form::text('capital', $business_data->capital, ['class' => 'form-control decimal', 'required', 'placeholder' =>'الإسم' ]); ?>

                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('sharenumber','عدد الأسهم :'); ?>

                    <?php echo Form::text('sharenumber', $business_data->sharenumber, ['class' => 'form-control', 'required', 'placeholder' =>'الإسم' ]); ?>

                </div>


            </div>
            <?php if(auth()->user()->can('partners.create')): ?>
            <div class="col-md-2" style="margin-top: 23px;">
                <button class="btn btn-danger" onclick="savedata()" >حفظ</button>
            </div>
                <?php endif; ?>

        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('capital_rem','الباقي من رأس المال المعتمد'); ?>

                    <?php echo Form::text('capital_rem', $business_data->capital - $totalcapital , ['class' => 'form-control decimal', 'readonly', 'placeholder' =>'الإسم' ]); ?>

                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('sharenumber_rem','الباقي من عدد الأسهم :'); ?>

                    <?php echo Form::text('sharenumber_rem', $business_data->sharenumber - $totalshare, ['class' => 'form-control', 'readonly', 'placeholder' =>'الإسم' ]); ?>

                </div>


            </div>
        </div>
    </div>



    <section class="content">
        <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' =>'']); ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assets.create')): ?>
                <?php $__env->slot('tool'); ?>
                    <div class="box-tools">


                        

                        <?php if(auth()->user()->can('partners.create')): ?>
                        <button type="button" class="btn btn-block btn-primary btn-modal"
                                data-href="<?php echo e(action('\Modules\Partners\Http\Controllers\PartnersController@create'), false); ?>"
                                data-container=".brands_modal">
                            <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></button>
                            <?php endif; ?>
                    </div>
                <?php $__env->endSlot(); ?>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assets.view')): ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped " id="assete_table">
                        <thead>
                        <tr>
                            <th>الإسم</th>
                            <th>العنوان</th>
                            <th>رقم التليفون </th>
                            <th>قيمة رأس المال المدفوع </th>
                            <th>عدد الأسهم </th>
                            <th>رصيد دائن </th>
                            <th>رصيد مدين </th>
                            
                            <th>الإجراء</th>
                        </tr>
                        </thead>
                        <tbody  id="datatable">
                       <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="<?php echo e($partner->id, false); ?>">
                                <td><?php echo e($partner->name, false); ?></td>
                                <td><?php echo e($partner->address, false); ?></td>
                                <td><?php echo e($partner->mobile, false); ?></td>
                                <td><?php echo e($partner->capital, false); ?></td>
                                <td><?php echo e($partner->share, false); ?></td>
                                <td><?php if($partner-> value<0): ?> <?php echo e(abs($partner-> value), false); ?> <?php endif; ?></td>
                                <td><?php if($partner-> value>0): ?> <?php echo e(abs($partner-> value), false); ?> <?php endif; ?></td>
                               
                                <td>
                                    <?php if(auth()->user()->can('partners.edit')): ?>
                                    <button onclick="assetedit(<?php echo e($partner->id, false); ?>)"  class="btn btn-xs btn-primary btn-modal"><i class="glyphicon glyphicon-edit"></i> <?php echo app('translator')->get("messages.edit"); ?></button>
                                    <button onclick="deleteasset(<?php echo e($partner->id, false); ?>)" class="btn btn-xs btn-danger delete_asset_button"><i class="glyphicon glyphicon-trash"></i> <?php echo app('translator')->get("messages.delete"); ?></button>
                                 <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      <tr id="0" >
                            <th colspan="3">الإجمالي : </th>
                             <th><?php echo e($totalcapital, false); ?></th>
                            <th><?php echo e($totalshare, false); ?></th>


                            <th colspan="3"></th>

                        </tr>
                        </tbody>

                    </table>
                </div>


            <?php endif; ?>
        <?php echo $__env->renderComponent(); ?>



    </section>

    <div class="modal fade brands_modal" tabindex="-1" role="dialog"
         aria-labelledby="gridSystemModalLabel">
    </div>
<?php $__env->stopSection(); ?>



<script type="text/javascript" src="<?php echo e(asset('Partners/Resources/assets/js/app.js'), false); ?>"></script>
<script>

    function assetedit(id) {
        $.ajax({
            url: '/partners/partners/'+id+'/edit',
            dataType: 'html',
            success: function(result) {
                $(".brands_modal").html(result)
                    .modal('show');
            },
        });
    }


    function  deleteasset(id) {
        swal({
            title: LANG.sure,
            text: 'هل تريد حذف الشريك',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then(willDelete => {
            if (willDelete) {
                var href = '/partners/partners/'+id;
                var data = id;
                $.ajax({
                    method: 'DELETE',
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


    function  savedata() {
        var capital=$('#capital').val();
        if(capital==''){
            toastr.error('عفوا برجاء إدخال رأس المال');;
            return true;
        }

        var sharenumber=$('#sharenumber').val();
        if(sharenumber==''){
            toastr.error('عفوا برجاء إدخال عدد الأسهم');
            return true;
        }

        swal({
            title: LANG.sure,
            text: 'هل تريد تعديل رأس مال الشركة وعدد الأسهم',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then(willDelete => {
            if (willDelete) {
                var href = '/partners/savecapital';
               $.ajax({
                    method: 'POST',
                    url: href,
                    data:{
                        capital:capital
                        ,sharenumber:sharenumber
                    },
                    success: function(result) {
                        swal({
                            title: result.message,
                            icon: 'info',
                            });



                        if (result.success == true) {
                            toastr.success(result.msg);

                        } else {
                            toastr.error(result.msg);
                        }
                    },
                });
            }
        });
    }




</script>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Partners/Providers/../Resources/views/partners/index.blade.php ENDPATH**/ ?>