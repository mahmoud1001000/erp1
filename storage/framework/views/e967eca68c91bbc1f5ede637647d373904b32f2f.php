<?php $__env->startSection('title', __( 'restaurant.tables' )); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get( 'restaurant.tables' ); ?>
        <small><?php echo app('translator')->get( 'restaurant.manage_your_tables' ); ?></small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
        <div class="box-header">
        	<h3 class="box-title"><?php echo app('translator')->get( 'restaurant.all_your_tables' ); ?></h3>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('restaurant.create')): ?>
            	<div class="box-tools">
                    <button type="button" class="btn btn-block btn-primary btn-modal" 
                    	data-href="<?php echo e(action('Restaurant\TableController@create'), false); ?>" 
                    	data-container=".tables_modal">
                    	<i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></button>
                </div>
            <?php endif; ?>
        </div>
        <div class="box-body">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('restaurant.view')): ?>
            	<table class="table table-bordered table-striped" id="tables_table">
            		<thead>
            			<tr>
            				<th><?php echo app('translator')->get( 'restaurant.table' ); ?></th>
                            <th><?php echo app('translator')->get( 'purchase.business_location' ); ?></th>
            				<th><?php echo app('translator')->get( 'restaurant.description' ); ?></th>
            				<th><?php echo app('translator')->get( 'messages.action' ); ?></th>
            			</tr>
            		</thead>
            	</table>
            <?php endif; ?>
        </div>
    </div>

    <div class="modal fade tables_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript">
        $(document).ready(function(){

            $(document).on('submit', 'form#table_add_form', function(e){
                e.preventDefault();
                var data = $(this).serialize();

                $.ajax({
                    method: "POST",
                    url: $(this).attr("action"),
                    dataType: "json",
                    data: data,
                    success: function(result){
                        if(result.success == true){
                            $('div.tables_modal').modal('hide');
                            toastr.success(result.msg);
                            tables_table.ajax.reload();
                        } else {
                            toastr.error(result.msg);
                        }
                    }
                });
            });

            //Brands table
            var tables_table = $('#tables_table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '/modules/tables',
                    columnDefs: [ {
                        "targets": 3,
                        "orderable": false,
                        "searchable": false
                    } ],
                    columns: [
                        { data: 'name', name: 'res_tables.name'  },
                        { data: 'location', name: 'BL.name'},
                        { data: 'description', name: 'description'},
                        { data: 'action', name: 'action'}
                    ],
                });

            $(document).on('click', 'button.edit_table_button', function(){

                $( "div.tables_modal" ).load( $(this).data('href'), function(){

                    $(this).modal('show');

                    $('form#table_edit_form').submit(function(e){
                        e.preventDefault();
                        var data = $(this).serialize();

                        $.ajax({
                            method: "POST",
                            url: $(this).attr("action"),
                            dataType: "json",
                            data: data,
                            success: function(result){
                                if(result.success == true){
                                    $('div.tables_modal').modal('hide');
                                    toastr.success(result.msg);
                                    tables_table.ajax.reload();
                                } else {
                                    toastr.error(result.msg);
                                }
                            }
                        });
                    });
                });
            });

            $(document).on('click', 'button.delete_table_button', function(){
                swal({
                  title: LANG.sure,
                  text: LANG.confirm_delete_table,
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
                                    tables_table.ajax.reload();
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/restaurant/table/index.blade.php ENDPATH**/ ?>