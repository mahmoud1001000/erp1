<?php $__env->startSection('title', __('essentials::lang.todo')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('essentials::layouts.nav_essentials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="content">
	<?php $__env->startComponent('components.filters', ['title' => __('report.filters'), 'class' => 'box-solid']); ?>
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('essentials.assign_todos')): ?>
			<div class="col-md-3">
				<div class="form-group">
					<?php echo Form::label('user_id_filter', __('essentials::lang.assigned_to') . ':'); ?>

					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-user"></i>
						</span>
						<?php echo Form::select('user_id_filter', $users, null, ['class' => 'form-control select2', 'placeholder' => __('messages.all')]); ?>

					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="col-md-3">
			<div class="form-group">
				<?php echo Form::label('priority_filter', __('essentials::lang.priority') . ':'); ?>

				<?php echo Form::select('priority_filter', $priorities, null, ['class' => 'form-control select2', 'placeholder' => __('messages.all')]); ?>

			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<?php echo Form::label('status_filter', __('sale.status') . ':'); ?>

				<?php echo Form::select('status_filter', $task_statuses, null, ['class' => 'form-control select2', 'placeholder' => __('messages.all')]); ?>

			</div>
		</div>
		<div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('date_range_filter', __('report.date_range') . ':'); ?>

                <?php echo Form::text('date_range_filter', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'readonly']); ?>

            </div>
        </div>
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('components.widget', ['title' => __('essentials::lang.todo_list'), 'icon' => '<i class="ion ion-clipboard"></i>', 'class' => 'box-solid']); ?>
		<?php $__env->slot('tool'); ?>
			<div class="box-tools">
				<button class="btn btn-block btn-primary btn-modal" data-href="<?php echo e(action('\Modules\Essentials\Http\Controllers\ToDoController@create'), false); ?>" 
				data-container="#task_modal">
					<i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></a>
				</button>
			</div>
		<?php $__env->endSlot(); ?>
		<div class="table-responsive">
			<table class="table table-bordered table-striped" id="task_table">
				<thead>
					<tr>
						<th><?php echo app('translator')->get('lang_v1.added_on'); ?></th>
						<th> <?php echo app('translator')->get('essentials::lang.task_id'); ?></th>
						<th class="col-md-2"> <?php echo app('translator')->get('essentials::lang.task'); ?></th>
						<th> <?php echo app('translator')->get('sale.status'); ?></th>
						<th> <?php echo app('translator')->get('business.start_date'); ?></th>
						<th><?php echo app('translator')->get('essentials::lang.end_date'); ?></th>
						<th> <?php echo app('translator')->get('essentials::lang.assigned_by'); ?></th>
						<th> <?php echo app('translator')->get('essentials::lang.assigned_to'); ?></th>
						<th> <?php echo app('translator')->get('essentials::lang.action'); ?></th>
					</tr>
				</thead>
			</table>
		</div>
	<?php echo $__env->renderComponent(); ?>
</section>
<div class="modal fade" id="task_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
</div>
<?php echo $__env->make('essentials::todo.update_task_status_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		task_table = $('#task_table').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax: {
	        	url: '/essentials/todo',
	        	data: function(d) {
	        		d.user_id = $('#user_id_filter').length ? $('#user_id_filter').val() : '';
	        		d.priority = $('#priority_filter').val();
	        		d.status = $('#status_filter').val();
	        		var start = '';
	                var end = '';
	                if ($('#date_range_filter').val()) {
	                    start = $('input#date_range_filter')
	                        .data('daterangepicker')
	                        .startDate.format('YYYY-MM-DD');
	                    end = $('input#date_range_filter')
	                        .data('daterangepicker')
	                        .endDate.format('YYYY-MM-DD');
	                }
	                d.start_date = start;
	                d.end_date = end;
	        	}
	        },
	        columnDefs: [
	            {
	                targets: [6, 7, 8],
	                orderable: false,
	                searchable: false,
	            },
	        ],
	        aaSorting: [[0, 'desc']],
	        columns: [
	        	{ data: 'created_at', name: 'created_at' },
	        	{ data: 'task_id', name: 'task_id' },
	            { data: 'task', name: 'task' },
	            { data: 'status', name: 'status' },
	            { data: 'date', name: 'date' },
	            { data: 'end_date', name: 'end_date' },
	            { data: 'assigned_by'},
	            { data: 'users'},
	            { data: 'action', name: 'action' },
	        ],
	    });

	    $('#date_range_filter').daterangepicker(
        dateRangeSettings,
	        function (start, end) {
	            $('#date_range_filter').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
	           task_table.ajax.reload();
	        }
	    );
	    $('#date_range_filter').on('cancel.daterangepicker', function(ev, picker) {
	        $('#date_range_filter').val('');
	        task_table.ajax.reload();
	    });

		//delete a task
		$(document).on('click', '.delete_task', function(e){
			e.preventDefault();
			var url = $(this).data('href');
			swal({
		      title: LANG.sure,
		      icon: "warning",
		      buttons: true,
		      dangerMode: true,
		    }).then((confirmed) => {
		        if (confirmed) {
					$.ajax({
						method: "DELETE",
						url: url,
						dataType: "json",
						success: function(result){
							if(result.success == true){
								toastr.success(result.msg);
								task_table.ajax.reload();
							} else {
								toastr.error(result.msg);
							}
						}
					});
				   }	
			  });
		});

	    //event on date chnage
		$(document).on('change', "#priority_filter, #user_id_filter, #status_filter", function(){
			task_table.ajax.reload();
		});
	});

$('#task_modal').on('shown.bs.modal', function() {
	$('form#task_form .datepicker').datepicker({
        autoclose: true,
        format:datepicker_date_format
    });

    $('form#task_form .select2').select2({ dropdownParent: $(this) });

	tinymce.init({
        selector: 'textarea#to_do_description',
    });

	 //form validation
	 $("form#task_form").validate();
});

$('#task_modal').on('hide.bs.modal', function(){
	tinymce.remove("textarea#to_do_description");
});

//form submit
$(document).on('submit', 'form#task_form', function(e){
	e.preventDefault();
	var url = $(this).attr("action");
	var method = $(this).attr("method");
	var data = $("form#task_form").serialize();
	var ladda = Ladda.create(document.querySelector('.ladda-button'));
	ladda.start();
	$.ajax({
		method: method,
		url: url,
		data: data,
		dataType: "json",
		success: function(result){
			ladda.stop();
			if(result.success == true){
				$("#task_modal").modal('hide');
				toastr.success(result.msg);
				task_table.ajax.reload();
			} else {
				toastr.error(result.msg);
			}
		}
	});
});

$(document).on('click', '.change_status', function(e){
	e.preventDefault();
	var task_id = $(this).data('task_id');
	var status = $(this).data('status');

	$('#update_task_status_modal').modal('show');
	$('#update_task_status_modal').find('#updated_status').val(status);
	$('#update_task_status_modal').find('#task_id').val(task_id);
});

$(document).on('click', '#update_status_btn', function(){
	var task_id = $('#update_task_status_modal').find('#task_id').val();
	var status = $('#update_task_status_modal').find('#updated_status').val();

	var url = "/essentials/todo/" + task_id;
	$.ajax({
		method: "PUT",
		url: url,
		data: {status: status, only_status: true},
		dataType: "json",
		success: function(result){
			if(result.success == true){
				toastr.success(result.msg);
				$('#update_task_status_modal').modal('hide');
				task_table.ajax.reload();
			} else {
				toastr.error(result.msg);
			}
		}
	});

});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Essentials/Providers/../Resources/views/todo/index.blade.php ENDPATH**/ ?>