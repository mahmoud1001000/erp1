<?php $__env->startSection('title', ' الجرد'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>جرد المخازن وإدارة المخزون</h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>
<style>
    .bg-light-red{
        background-color: #ea2634 !important;
        color: #fff !important
    }
</style>
<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => 'عمليات الجرد']); ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('inventory.stocking_create')): ?>
            <?php $__env->slot('tool'); ?>
                <div class="box-tools">
                <button type="button" class="btn btn-block btn-primary add_transaction"
                                data-href="<?php echo e(action('\Modules\Inventory\Http\Controllers\InventoryController@create'), false); ?>"
                                data-container=".div_modal">
                            <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></button>
                </div>
            <?php $__env->endSlot(); ?>
        <?php endif; ?>

            <div id="inventory_transactions"></div>

    <?php echo $__env->renderComponent(); ?>

    <div class="modal fade div_modal" tabindex="-1" role="dialog"
    	aria-labelledby="gridSystemModalLabel">
    </div>


</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    //Roles table
    $(document).ready( function(){
        gettransaction();
        
    });

 $(document).on('click', '.add_transaction', function(e) {
        e.preventDefault();
        var container = $(this).data('container');
        $.ajax({
            url: $(this).data('href'),
            dataType: 'html',
            success: function(result) {
                $(container)
                    .html(result)
                    .modal('show');
            },
        });
    });

 $(document).on('submit', 'form#store_stock', function(e) {
        e.preventDefault();
        var form = $(this);
        var data = form.serialize();
        var variation_id=$('#variation_id').val();
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
                    gettransaction();
                    toastr.success(result.msg);
                } else {
                    $('div.div_modal').modal('hide');
                    toastr.error(result.msg);

                }
            },
        });
    });

 function gettransaction() {
     $.ajax({
         type: 'GET',
         dataType: 'html',
         url: "<?php echo e(action('\Modules\Inventory\Http\Controllers\InventoryController@index'), false); ?>",
          data: {
             '_token': ' <?php echo csrf_token() ?>',
         },
         success: function (result) {
               $('#inventory_transactions').html(result);

         }
 });
 }

function deletestock(transaction_id){
     swal({
            title: LANG.sure,
            text:'سوف يتم حذف فترة الجرد هل أنت متأكد',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then(willSave => {
            if (willSave) {
                 $.ajax({
                    type: 'GET',
                    url: "<?php echo e(action('\Modules\Inventory\Http\Controllers\InventoryController@delete_stock'), false); ?>",
                    data: {
                        '_token': ' <?php echo csrf_token() ?>',
                        transaction_id:transaction_id,

                    },
                    success: function (result) {
                        if (result.success) {
                            toastr.success(result.msg);
                            gettransaction();
                        } else {
                            toastr.error(result.msg);
                        }
                    }
                });
            }
        });

    }
function changestatus(stat,transaction_id) {
        var text="سوف يتم غلق فترة الجرد ! هل أنت متأكد";
        if(stat==0)
            text="سوف يتم إعادة فتح فترة الجرد ! هل أنت متأكد";
        swal({
            title: LANG.sure,
            text:text,
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then(willSave => {
            if (willSave) {
                 $.ajax({
                    type: 'GET',
                    url: "<?php echo e(action('\Modules\Inventory\Http\Controllers\InventoryController@changestatus'), false); ?>",
                    data: {
                        '_token': ' <?php echo csrf_token() ?>',
                        transaction_id:transaction_id,
                        status:stat
                    },
                    success: function (result) {
                        if (result.success) {
                             toastr.success(result.msg);
                            gettransaction();
                        } else {
                            toastr.error(result.msg);
                        }
                    }
                });
            }
        });
    }
    
    
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Inventory/Providers/../Resources/views/index.blade.php ENDPATH**/ ?>