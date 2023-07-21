<?php $__env->startSection('title', __('essentials::lang.leave_type')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('essentials::layouts.nav_hrm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="content-header">
    <h1><?php echo app('translator')->get('essentials::lang.leave_type'); ?>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.widget', ['class' => 'box-solid', 'title' => __( 'essentials::lang.all_leave_types' )]); ?>
        <?php $__env->slot('tool'); ?>
            <div class="box-tools">
                <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#add_leave_type_modal">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></button>
            </div>
        <?php $__env->endSlot(); ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="leave_type_table">
                <thead>
                    <tr>
                        <th><?php echo app('translator')->get( 'essentials::lang.leave_type' ); ?></th>
                        <th><?php echo app('translator')->get( 'essentials::lang.max_leave_count' ); ?></th>
                        <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    <?php echo $__env->renderComponent(); ?>

    <?php echo $__env->make('essentials::leave_type.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript">
        $(document).ready( function(){

            leave_type_table = $('#leave_type_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "<?php echo e(action('\Modules\Essentials\Http\Controllers\EssentialsLeaveTypeController@index'), false); ?>",
                columnDefs: [
                    {
                        targets: 2,
                        orderable: false,
                        searchable: false,
                    },
                ],
            });

        });

        $(document).on('submit', 'form#add_leave_type_form, form#edit_leave_type_form', function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                dataType: 'json',
                data: data,
                success: function(result) {
                    if (result.success == true) {
                        $('div#add_leave_type_modal').modal('hide');
                        $('.view_modal').modal('hide');
                        toastr.success(result.msg);
                        leave_type_table.ajax.reload();
                        $('form#add_leave_type_form')[0].reset();
                    } else {
                        toastr.error(result.msg);
                    }
                },
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Essentials/Providers/../Resources/views/leave_type/index.blade.php ENDPATH**/ ?>