<?php $__env->startSection('title', __('user.roles')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get( 'user.roles' ); ?>
        <small><?php echo app('translator')->get( 'user.manage_roles' ); ?></small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __( 'user.all_roles' )]); ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.create')): ?>
            <?php $__env->slot('tool'); ?>
                <div class="box-tools">
                    <a class="btn btn-block btn-primary" 
                    href="<?php echo e(action('RoleController@create'), false); ?>" >
                    <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></a>
                </div>
            <?php $__env->endSlot(); ?>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.view')): ?>
            <table class="table table-bordered table-striped" id="roles_table">
                <thead>
                    <tr>
                        <th><?php echo app('translator')->get( 'user.roles' ); ?></th>
                        <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                    </tr>
                </thead>
            </table>
        <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    //Roles table
    $(document).ready( function(){
        var roles_table = $('#roles_table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '/roles',
                    buttons:[],
                    columnDefs: [ {
                        "targets": 1,
                        "orderable": false,
                        "searchable": false
                    } ]
                });
        $(document).on('click', 'button.delete_role_button', function(){
            swal({
              title: LANG.sure,
              text: LANG.confirm_delete_role,
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
                            if(result.success == true){
                                toastr.success(result.msg);
                                roles_table.ajax.reload();
                            } else {
                                toastr.error(result.msg);
                            }
                        }
                    });
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/role/index.blade.php ENDPATH**/ ?>