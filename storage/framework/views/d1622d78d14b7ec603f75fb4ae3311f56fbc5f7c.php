
<?php $__env->startSection('title',__('installment::lang.customer_instalment')); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('installment::layouts.partials.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="content-header">
        <h1><?php echo app('translator')->get('installment::lang.customer_instalment'); ?></h1>
    </section>

    <?php echo csrf_field(); ?>
    <section class="content no-print">
        <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' =>'']); ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('installment.view')): ?>


                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <?php echo Form::label('customer_id',__('installment::lang.customers') .' : '); ?>

                            <?php echo Form::select('customer_id', $customers, null, ['class' => 'form-control select2','id'=>'customer_id']); ?>

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


            <?php endif; ?>

            



            <div class="view-div">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('installment.view')): ?>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped " id="data_table">
                            <thead>
                            <tr>
                                <th >العميل</th>
                                <th>حالة القسط</th>
                                <th >عدد الأقساط</th>
                                <th ></th>


                            </tr>
                            </thead>

                        </table>
                    </div>


                <?php endif; ?>
            </div>



        <?php echo $__env->renderComponent(); ?>



    </section>

    <div class="modal fade div_modal" tabindex="-1" role="dialog"
         aria-labelledby="gridSystemModalLabel">
    </div>

    <section class="invoice print_section" id="installment_section">
    </section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
    
    <?php echo $__env->make('installment::layouts.partials.javascripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <script type="text/javascript">

        $(document).ready(function () {

            data_table = $('#data_table').DataTable({
                processing: true,
                serverSide: true,
                ajax:{
                    url:'/installment/contactwithinstallment',
                    data:function(d) {
                        d.id= $('#customer_id').val();
                        d.installment_status= $('#installment_status').val();
                        d.dateform= $('#datefrom').val();
                        d.dateto= $('#dateto').val();
                    }
                },

                 columnDefs: [
                    {
                        targets:3,
                        orderable: false,
                        searchable: false,
                    },
                ],
            });
            $('#customer_id').on('change',function () {
                var customer_id = $('#customer_id').val();
                $.ajax({
                    method: 'GET',
                    url: '/installment/getcustomerdata/' + customer_id,
                    data: {
                        id: customer_id
                    },
                    success: function (result) {
                        $('#balance_due').val(result['balance_due'].toFixed(2));
                    }
                });
                data_table.ajax.reload();

            });


            $(document).on('change','#installment_status', function () {
                data_table.ajax.reload();
            });

            $('.date-picker').change(function() {
                data_table.ajax.reload();
            });

        });







    </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Installment/Providers/../Resources/views/customer/contacts.blade.php ENDPATH**/ ?>