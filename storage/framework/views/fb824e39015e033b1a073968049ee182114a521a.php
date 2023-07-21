
<?php $__env->startSection('title',__('installment::lang.installment_plan')); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .table-striped th{
            background-color: #626161;
            color: #ffffff;
        }
    </style>
    <section class="content-header">
        <h1><?php echo app('translator')->get('installment::lang.installment_plan'); ?></h1>
    </section>

    <section class="content">
        <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' =>'']); ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('installment.view')): ?>
                <?php $__env->slot('tool'); ?>
                    <div class="box-tools">

                <?php if(auth()->user()->can('installment.system_add')): ?>
                            <button type="button" class="btn btn-block btn-primary add_button" >
                                <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></button>
                        <?php endif; ?>
                    </div>
                <?php $__env->endSlot(); ?>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('installment.view')): ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped " id="data_table">
                        <thead>
                        <tr>
                            <th>نظام التقسيط</th>
                            <th>عدد الأقساط</th>
                            <th>فترة السداد </th>
                            <th>النوع </th>
                            <th>نسبة الفائدة </th>
                            <th>نوع الفائدة </th>
                            <th>الوصف </th>
                            <th>الإجراء</th>
                        </tr>
                        </thead>

                    </table>
                </div>


            <?php endif; ?>
        <?php echo $__env->renderComponent(); ?>



    </section>

    <div class="modal fade div_modal" tabindex="-1" role="dialog"
         aria-labelledby="gridSystemModalLabel">
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
 <script type="text/javascript">
$(document).ready(function () {
    var data_table = $('#data_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/installment/system',
        columnDefs: [
            {
                targets: 7,
                orderable: false,
                searchable: false,
            },
        ],
    });

    $(document).on('click', 'button.delete_button', function () {
        swal({
            title: LANG.sure,
            text: 'سوف يتم حذف هذا النظام ',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then(willDelete => {
            if (willDelete) {
                var href = $(this).data('href');
                var data = $(this).serialize();
                $.ajax({
                    method: 'DELETE',
                    url: href,
                    dataType: 'json',
                    data: data,
                    success: function (result) {
                        if (result.success == true) {
                            toastr.success(result.msg);
                            data_table.ajax.reload();
                        } else {
                            toastr.error(result.msg);
                        }
                    },
                });
            }
        });

    });

    $(document).on('click', 'button.edit_button', function () {
        $('div.div_modal').load($(this).data('href'), function() {
            $(this).modal('show');
            $('form#edit_installment_system').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                var data = form.serialize();

                $.ajax({
                    method: 'POST',
                    url: $(this).attr('action'),
                    dataType: 'json',
                    data: data,
                    beforeSend: function(xhr) {
                        __disable_submit_button(form.find('button[type="submit"]'));
                    },
                    success: function(result) {
                        if (result.success == true) {
                            $('div.div_modal').modal('hide');

                            toastr.success(result.msg);
                            data_table.ajax.reload();
                        } else {
                            toastr.error(result.msg);
                        }
                    },
                });
            });
        });

    });





    $(document).on('click', 'button.add_button', function () {
        $.ajax({
            method: 'GET',
            url: '/installment/system/create',
            dataType: 'html',
            success: function (result) {
                $(".div_modal").html(result).modal('show');
                data_table.ajax.reload();
            },
        });

    });

    $(document).on('submit', 'form#add_installment_system', function(e) {
        e.preventDefault();
        var form = $(this);
        var data = form.serialize()
        $.ajax({
            method: 'POST',
            url: $(this).attr('action'),
            dataType: 'json',
            data: data,
            beforeSend: function (xhr) {
                __disable_submit_button(form.find('button[type="submit"]'));
            },
            success: function (result) {
                if (result.success == true) {
                    $('div.div_modal').modal('hide');
                    toastr.success(result.msg);
                    data_table.ajax.reload();
                } else {
                    toastr.error(result.msg);
                }
            },
        });
    });



});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Installment/Providers/../Resources/views/systems/index.blade.php ENDPATH**/ ?>