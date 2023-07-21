<?php $__env->startSection('title', __('superadmin::lang.superadmin') . ' | ' . __('superadmin::lang.communicator')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('superadmin::lang.communicator'); ?></h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="box">
				<div class="box-header">
					<i class="fa fa-edit"></i>
					<h3 class="box-title"><?php echo app('translator')->get('superadmin::lang.compose_message'); ?></h3>
				</div>
		        <div class="box-body">
		        	<?php echo Form::open(['url' => action('\Modules\Superadmin\Http\Controllers\CommunicatorController@send'), 'method' => 'post', 'id' => 'communication_form']); ?>

		        		<div class="col-md-12 form-group">
		        			<?php echo Form::label('recipients', __('superadmin::lang.recipients').':*'); ?> <button type="button" class="btn btn-primary btn-xs select-all"><?php echo app('translator')->get('lang_v1.select_all'); ?></button> <button type="button" class="btn btn-primary btn-xs deselect-all"><?php echo app('translator')->get('lang_v1.deselect_all'); ?></button>
							<?php echo Form::select('recipients[]', $businesses, null, ['class' => 'form-control select2', 'required', 'multiple', 'id' => 'recipients']); ?>

		        		</div>
		        		<div class="col-md-12 form-group">
		        			<?php echo Form::label('subject', __('superadmin::lang.subject').':*'); ?>

		        			<?php echo Form::text('subject', null, ['class' => 'form-control', 'required']); ?>

		        		</div>
		        		<div class="col-md-12 form-group">
		        			<?php echo Form::label('message', __('superadmin::lang.message').':*'); ?>

		        			<?php echo Form::textarea('message', null, ['class' => 'form-control', 'required', 'rows' => 6]); ?>

		        		</div>
		        		<div class="col-md-12 form-group">
		        			<button type="submit" class="btn btn-danger pull-right" id="send_message"><?php echo app('translator')->get('superadmin::lang.send'); ?></button>
		        		</div>
		        	<?php echo Form::close(); ?>

		        </div>
		    </div>
		</div>
		<div class="col-sm-12">
			<div class="box">
				<div class="box-header">
					<i class="fa fa-history"></i>
					<h3 class="box-title"><?php echo app('translator')->get('superadmin::lang.message_history'); ?></h3>
				</div>
		        <div class="box-body">
		        	<table class="table" id="message-history">
		        		<thead>
		        			<tr>
		        				<th><?php echo app('translator')->get('superadmin::lang.subject'); ?></th>
		        				<th><?php echo app('translator')->get('superadmin::lang.message'); ?></th>
		        				<th><?php echo app('translator')->get('lang_v1.date'); ?></th>
		        			</tr>
		        		</thead>
		        	</table>
		        </div>
		     </div>
		</div>

	</div>
</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>

<script type="text/javascript">
	$(document).ready( function() {
		$('#send_message').click(function(e){
			e.preventDefault();
			if($('form#communication_form').valid()){
				swal({
	              title: LANG.sure,
	              icon: "warning",
	              buttons: true,
	              dangerMode: false,
	            }).then((sure) => {
	            	if(sure){
	            		$('form#communication_form').submit();
	            	} else {
	            		return false;
	            	}
	            });
	        }
		});

		$('#message-history').DataTable({
			dom:'lfrtip',
			processing: true,
			serverSide: true,
			ajax: '<?php echo e(action("\Modules\Superadmin\Http\Controllers\CommunicatorController@getHistory"), false); ?>'
	    });
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Superadmin/Providers/../Resources/views/communicator/index.blade.php ENDPATH**/ ?>