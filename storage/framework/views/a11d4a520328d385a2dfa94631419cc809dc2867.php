<?php $__env->startSection('title', __('lang_v1.warranties')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('lang_v1.warranties'); ?>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __( 'lang_v1.all_warranties' )]); ?>
        <?php $__env->slot('tool'); ?>
            <div class="box-tools">
                <button type="button" class="btn btn-block btn-primary btn-modal" 
                    data-href="<?php echo e(action('WarrantyController@create'), false); ?>" 
                    data-container=".view_modal">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></button>
            </div>
        <?php $__env->endSlot(); ?>
        <table class="table table-bordered table-striped" id="warranty_table">
            <thead>
                <tr>
                    <th><?php echo app('translator')->get( 'lang_v1.name' ); ?></th>
                    <th><?php echo app('translator')->get( 'lang_v1.description' ); ?></th>
                    <th><?php echo app('translator')->get( 'lang_v1.duration' ); ?></th>
                    <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                </tr>
            </thead>
        </table>
    <?php echo $__env->renderComponent(); ?>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    $(document).ready( function(){
        //Status table
        var warranty_table = $('#warranty_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "<?php echo e(action('WarrantyController@index'), false); ?>",
                columnDefs: [ {
                    "targets": 3,
                    "orderable": false,
                    "searchable": false
                } ],
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'description', name: 'description' },
                    { data: 'duration', name: 'duration' },
                    { data: 'action', name: 'action' },
                ]
            });

        $(document).on('submit', 'form#warranty_form', function(e){
            e.preventDefault();
            $(this).find('button[type="submit"]').attr('disabled', true);
            var data = $(this).serialize();

            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr("action"),
                dataType: "json",
                data: data,
                success: function(result){
                    if(result.success == true){
                        $('div.view_modal').modal('hide');
                        toastr.success(result.msg);
                        warranty_table.ajax.reload();
                    } else {
                        toastr.error(result.msg);
                    }
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/warranties/index.blade.php ENDPATH**/ ?>