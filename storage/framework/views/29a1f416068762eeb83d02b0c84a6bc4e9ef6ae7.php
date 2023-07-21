<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('installment::layouts.partials.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?php echo e(__('installment::lang.installment_report'), false); ?></h1>
    </section>

    <section class="content no-print">
        <div class="row">
            <div class="col-md-12">
                <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>

                <input type="hidden" id="installment_id" value="<?php echo e($installment_id, false); ?>">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo Form::label('customer_id',  __('installment::lang.customers') . ' : '); ?>

                            <?php echo Form::select('customer_id',$customers, null, ['class' => 'form-control select2 getinstallment','id'=>'customer_id','style' => 'width:100%']); ?>

                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <?php echo Form::label('balance_due',' إجمالي المديونية:'); ?>

                            <input type="balance_due" name='balance_due' id="balance_due" value="00.00" class="form-control text-disabled" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo Form::label('installment_status',  __('installment::lang.installment_status') . ' : '); ?>

                            <select name="installment_status" id="installment_status" class="form-control">
                                <option value="0"><?php echo app('translator')->get('installment::lang.all_installment'); ?></option>
                                <option value="1"><?php echo app('translator')->get('installment::lang.paid_installment'); ?></option>
                                <option value="2"><?php echo app('translator')->get('installment::lang.due_installment'); ?></option>
                                <option value="3"><?php echo app('translator')->get('installment::lang.late_installment'); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo Form::label('datefrom',  __('installment::lang.datefrom') . ' : '); ?>

                            <div class="input-group">
                                <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                <input type="text" name="datefrom" id="datefrom" value="<?php echo e(Carbon::now()->startOfYear()->format('Y-m-d'), false); ?>" class="form-control date-picker" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <?php echo Form::label('dateto',  __('installment::lang.datefrom') . ' : '); ?>

                               <div class="input-group">
                                <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                <input type="text" name="dateto" id="dateto" value="<?php echo e(Carbon::now()->endOfYear()->format('Y-m-d'), false); ?>" class="form-control date-picker" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <?php echo $__env->renderComponent(); ?>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
                              <div class="table-responsive">
                                <table class="table table-bordered table-striped " id="installments_table">
                                    <thead>
                                    <tr>
                                        <th style="width: 60px">مسلسل </th>
                                        <th style="width: 160px">العميل </th>
                                        <th style="width: 140px">تاريخ الإستحقاق</th>
                                        <th style="width: 140px">قيمة القسط </th>
                                        <th style="width: 140px">الفائدة</th>
                                        <th style="width: 140px">الإجمالي </th>
                                        <th>أيام التأخير</th>
                                        <th>تاريخ السداد</th>

                                        <th style="width: 150px">Action</th>


                                    </tr>
                                    </thead>

                                </table>
                            </div>
                <?php echo $__env->renderComponent(); ?>
            </div>
        </div>



    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>

<div class="modal fade div_modal" tabindex="-1" role="dialog"
     aria-labelledby="gridSystemModalLabel">
</div>
<section class="invoice print_section" id="installment_section">
</section>

<?php $__env->startSection('javascript'); ?>

    <?php echo $__env->make('installment::layouts.partials.javascripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    $(document).ready(function () {
        installments_table= $('#installments_table').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url:'/installment/installments',
                data:function(d) {
                    d.id= $('#customer_id').val();
                    d.installment_status=$('#installment_status').val();
                    d.datefrom=$('#datefrom').val();
                    d.dateto=$('#dateto').val();
                    d.installment_id=$('#installment_id').val();
                }
            },
            columnDefs: [

                {
                    targets:8,
                    orderable: false,
                    searchable: false,
                },
            ],
        });

        $(document).on('change','#customer_id', function () {
            var customer_id = $('#customer_id').val();

            $.ajax({
                method: 'GET',
                url: '/installment/getcustomerdata/' + customer_id,
                data: {
                        id: customer_id
                      },
                success: function (result) {
                    $('#balance_due').val(result['balance_due']);
                }
            });
            installments_table.ajax.reload();
        });
        $(document).on('change','#installment_status', function () {
            installments_table.ajax.reload();
        });

        $('.date-picker').change(function() {
            installments_table.ajax.reload();
        });

        $(document).on('click','button.getinstallment',function () {
    installments_table.ajax.reload();
});

        $(document).on('click', 'button.installmentdelete', function () {
        swal({
            title: LANG.sure,
            text: 'سوف يتم حذف القسط ',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then(willDelete => {
            if (willDelete) {
                var href = $(this).data('href');

                $.ajax({
                    method: 'GET',
                    url: href,
                    success: function (result) {
                        if (result.success == true) {
                            toastr.success(result.msg);
                            installments_table.ajax.reload();
                        } else {
                            toastr.error(result.msg);
                        }
                    },
                });
            }
        });

    });

        $(document).on('click', 'button.paymentdelete', function () {
            swal({
                title: LANG.sure,
                text: 'سوف يتم حذف القسط ',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then(willDelete => {
                if (willDelete) {
                    var href = $(this).data('href');

                    $.ajax({
                        method: 'GET',
                        url: href,
                        success: function (result) {
                            if (result.success == true) {
                                toastr.success(result.msg);
                                installments_table.ajax.reload();
                            } else {
                                toastr.error(result.msg);
                            }
                        },
                    });
                }
            });

        });
    });



    $(document).on('click', 'button.add_payment', function () {
        var href = $(this).data('href');
        $.ajax({
            method: 'GET',
            url: href,
            dataType: 'html',
            success: function (result) {
                $(".div_modal").html(result).modal('show');
                installments_table.ajax.reload();
            },
        });

    });

    $(document).on('submit', 'form#storepayment', function(e) {
        e.preventDefault();
        var form = $(this);
        var data = form.serialize()
        $.ajax({
            method: 'POST',
            url: '/installment/storepayment',
            dataType: 'json',
            data: data,
            beforeSend: function (xhr) {
                __disable_submit_button(form.find('button[type="submit"]'));
            },
            success: function (result) {
                if (result.success == true) {
                    $('div.div_modal').modal('hide');
                    toastr.success(result.msg);
                    installments_table.ajax.reload();
                } else {
                    toastr.error(result.msg);
                }
            },
        });
    });




    function tprint(id) {

        $.ajax({
            url:'/installment/printinstallment/'+id,
            method:'GET',
            success:function (result) {
                $('#installment_section').html(result);
                __print_receipt('installment_section');
            }
        });




    }
</script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Installment/Providers/../Resources/views/reports/index.blade.php ENDPATH**/ ?>