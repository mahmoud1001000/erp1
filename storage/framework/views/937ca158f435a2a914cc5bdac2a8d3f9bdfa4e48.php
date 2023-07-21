<?php $__env->startSection('title', __('printer.printers')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('printer.printers'); ?>
        <small><?php echo app('translator')->get('printer.manage_your_printers'); ?></small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __('printer.all_your_printer')]); ?>
        <?php $__env->slot('tool'); ?>
            <div class="box-tools">
                <a class="btn btn-block btn-primary" href="<?php echo e(action('PrinterController@create'), false); ?>">
                <i class="fa fa-plus"></i> <?php echo app('translator')->get('printer.add_printer'); ?></a>
            </div>
        <?php $__env->endSlot(); ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="printer_table">
                <thead>
                    <tr>
                        <th><?php echo app('translator')->get('printer.name'); ?></th>
                        <th><?php echo app('translator')->get('printer.connection_type'); ?></th>
                        <th><?php echo app('translator')->get('printer.capability_profile'); ?></th>
                        <th><?php echo app('translator')->get('printer.character_per_line'); ?></th>
                        <th><?php echo app('translator')->get('printer.ip_address'); ?></th>
                        <th><?php echo app('translator')->get('printer.port'); ?></th>
                        <th><?php echo app('translator')->get('printer.path'); ?></th>
                        <th><?php echo app('translator')->get('messages.action'); ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    <?php echo $__env->renderComponent(); ?>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    $(document).ready( function(){
        var printer_table = $('#printer_table').DataTable({
            processing: true,
            serverSide: true,
            buttons:[],
            ajax: '/printers',
            bPaginate: false,
            columnDefs: [ {
                "targets": 2,
                "orderable": false,
                "searchable": false
            } ]
        });
        $(document).on('click', 'button.delete_printer_button', function(){
            swal({
              title: LANG.sure,
              text: LANG.confirm_delete_printer,
              icon: "warning",
              buttons: true,
              dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var href = $(this).data('href');
                    var data = $(this).serialize();

                    $.ajax({
                        method: "DELETE",
                        url: href,
                        dataType: "json",
                        data: data,
                        success: function(result){
                            if(result.success === true){
                                toastr.success(result.msg);
                                printer_table.ajax.reload();
                            } else {
                                toastr.error(result.msg);
                            }
                        }
                    });
                }
            });
        });
        $(document).on('click', 'button.set_default', function(){
            var href = $(this).data('href');
            var data = $(this).serialize();

            $.ajax({
                method: "get",
                url: href,
                dataType: "json",
                data: data,
                success: function(result){
                    if(result.success === true){
                        toastr.success(result.msg);
                        printer_table.ajax.reload();
                    } else {
                        toastr.error(result.msg);
                    }
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/printer/index.blade.php ENDPATH**/ ?>