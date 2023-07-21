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
        <h1>التقدير المالي للشركة</h1>
    </section>

    <section class="content">
        <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' =>'']); ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assets.create')): ?>
                <?php $__env->slot('tool'); ?>
                         <div class="row">
                         <div class="col-md-12">
                                <?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>

                                    <table class="table no-border">
                                        <tr>
                                            <td><?php echo app('translator')->get('report.closing_stock'); ?> (<?php echo app('translator')->get('lang_v1.by_purchase_price'); ?>)</td>
                                            <td><?php echo app('translator')->get('report.closing_stock'); ?> (<?php echo app('translator')->get('lang_v1.by_sale_price'); ?>)</td>
                                            <td><?php echo app('translator')->get('lang_v1.potential_profit'); ?></td>
                                            <td><?php echo app('translator')->get('lang_v1.profit_margin'); ?></td>
                                        </tr>
                                        <tr>
                                            <td><h3  class="mb-0 mt-0"><?php echo e(number_format($closing_stock_by_pp,2), false); ?></h3> </td>
                                            <td><h3  class="mb-0 mt-0"><?php echo e(number_format($closing_stock_by_sp,2), false); ?></h3> </td>
                                            <td><h3  class="mb-0 mt-0"><?php echo e(number_format($potential_profit,2), false); ?></h3> </td>
                                            <td><h3  class="mb-0 mt-0"><?php echo e(number_format($profit_margin,2), false); ?></h3> </td>
                                        </tr>
                                    </table>
                                <?php echo $__env->renderComponent(); ?>
                               
                                <?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
                                    <table class="table no-border">
                                        <tr>
                                            <td>رصيد الخزن والبنوك</td>
                                            <td>مديونيات العملاء</td>
                                            <td>مستحقات الموردين</td>

                                        </tr>
                                        <tr>
                                            <td><h3  class="mb-0 mt-0"><?php echo e(number_format($account_details,2), false); ?></h3> </td>
                                            <td><h3  class="mb-0 mt-0"><?php echo e(number_format($customer,2), false); ?></h3> </td>
                                            <td><h3  class="mb-0 mt-0"><?php echo e(number_format($supplier,2), false); ?></h3> </td>



                                        </tr>
                                    </table>
                                <?php echo $__env->renderComponent(); ?>
                                <?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
                                        <table class="table no-border">
                                            <tr>
                                                <td>الإجمالي بسعر الشراء :</td>
                                                <td>الإجمالي بسعر البيع :</td>

                                               </tr>
                                            <tr>


                                                <td><h3  class="mb-0 mt-0"><?php echo e(number_format($account_details+$closing_stock_by_pp+$assets+$customer-$supplier,2), false); ?></h3> </td>
                                                <td><h3  class="mb-0 mt-0"><?php echo e(number_format($account_details+$closing_stock_by_sp+$assets+$customer-$supplier,2), false); ?></h3> </td>




                                            </tr>
                                        </table>

                                    <?php echo $__env->renderComponent(); ?>
                                    <?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>

                                    <?php echo $__env->renderComponent(); ?>

                                    <?php if($totalshare>0): ?>
                                      <?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
                                        <table class="table no-border">
                                            <tr>
                                                <td>عدد الأسهم </td>
                                                <td>سعر السهم بسعر الشراء :</td>
                                                <td>سعر السهم بسعر البيع :</td>

                                            </tr>
                                            <tr>

                                                <td><h3  class="mb-0 mt-0"><?php echo e(number_format($totalshare,2), false); ?></h3> </td>
                                                <td><h2  class="mb-0 mt-0"><?php echo e(number_format(($account_details+$closing_stock_by_pp+$assets+$customer-$supplier)/$totalshare,2), false); ?></h2> </td>
                                                <td><h2  class="mb-0 mt-0"><?php echo e(number_format(($account_details+$closing_stock_by_sp+$assets+$customer-$supplier)/$totalshare,2), false); ?></h2> </td>




                                            </tr>
                                        </table>
                                    <?php echo $__env->renderComponent(); ?>
                                    <?php endif; ?>
                            </div>
                        </div>
                  <?php $__env->endSlot(); ?>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assets.view')): ?>




            <?php endif; ?>
        <?php echo $__env->renderComponent(); ?>



    </section>

    <div class="modal fade brands_modal" tabindex="-1" role="dialog"
         aria-labelledby="gridSystemModalLabel">
    </div>
<?php $__env->stopSection(); ?>

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

</script>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Partners/Providers/../Resources/views/business/index.blade.php ENDPATH**/ ?>