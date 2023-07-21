<?php $__env->startSection('title', __('essentials::lang.messages')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('essentials::layouts.nav_essentials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="content">
	<!-- Chat box -->
	<div class="box box-solid">
	<div class="box-header">
	  <i class="fa fa-comments-o"></i>

	  <h3 class="box-title"><?php echo app('translator')->get('essentials::lang.messages'); ?></h3>
	</div>
	<div class="box-body" id="chat-box" style="height: 70vh; overflow-y: scroll;">
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('essentials.view_message')): ?>
		  <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		  	<?php echo $__env->make('essentials::messages.message_div', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	  	<?php endif; ?>
	</div>
	<!-- /.chat -->
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('essentials.create_message')): ?>
	<div class="box-footer">
		<?php echo Form::open(['url' => action('\Modules\Essentials\Http\Controllers\EssentialsMessageController@store'), 'method' => 'post', 'id' => 'add_essentials_msg_form']); ?>

			<div class="input-group">
		  		<?php echo Form::textarea('message', null, ['class' => 'form-control', 'required', 'id' => 'chat-msg', 'placeholder' => __('essentials::lang.type_message'), 'rows' => 1]); ?>

		  		<div class="input-group-addon" 
		  		style="width: 137px;padding: 0;border: none;">
		  			<?php echo Form::select('location_id',$business_locations,  null, ['class' => 'form-control', 'placeholder' => __('lang_v1.select_location'), 'style' => 'width: 100%;' ]); ?>

		  		</div>
		  		<div class="input-group-btn">
		  			<button type="submit" class="btn btn-success pull-right ladda-button" data-style="expand-right">
		  				<span class="ladda-label"><i class="fa fa-plus"></i></span>
		  			</button>
		  		</div>
			</div>
		  <?php echo Form::close(); ?>

	</div>
	<?php endif; ?>
	</div>
	<!-- /.box (chat box) -->
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		scroll_down_chat_div();
		$('#chat-msg').focus();
		$('form#add_essentials_msg_form').submit(function(e) {
			e.preventDefault();
			var msg = $('#chat-msg').val().trim();
			if(msg) {
				var data = $(this).serialize();
				var ladda = Ladda.create(document.querySelector('.ladda-button'));
				ladda.start();
				$.ajax({
					url: "<?php echo e(action('\Modules\Essentials\Http\Controllers\EssentialsMessageController@store'), false); ?>",
					data: data,
					method: 'post',
					dataType: "json",
					success: function(result){
						ladda.stop();
						if(result.html) {
							$('div#chat-box').append(result.html);
							scroll_down_chat_div();
							$('#chat-msg').val('').focus();
						}
					}
				});
			}
		});

		$(document).on('click', 'a.chat-delete', function(e) {
			e.preventDefault();
			swal({
	          title: LANG.sure,
	          icon: "warning",
	          buttons: true,
	          dangerMode: true,
	        }).then((willDelete) => {
	            if (willDelete) {
	            	var chat_item = $(this).closest('.post');
					$.ajax({
						url: $(this).attr('href'),
						method: 'DELETE',
						dataType: "json",
						success: function(result){
							if(result.success == true){
								toastr.success(result.msg);
								chat_item.remove();
							} else {
								toastr.error(result.msg);
							}
						}
					});
	            }
	        });
		});
		var chat_refresh_interval = "<?php echo e(config('essentials::config.chat_refresh_interval', 20), false); ?>";
		chat_refresh_interval = parseInt(chat_refresh_interval) * 1000;
		setInterval(function(){ getNewMessages() }, chat_refresh_interval);
	});

	function scroll_down_chat_div() {
		var chat_box    = $('#chat-box');
		var height = chat_box[0].scrollHeight;
		chat_box.scrollTop(height);
	}

	function getNewMessages() {
		var last_chat_time =  $('div.msg-box').length ? $('div.msg-box:last').data('delivered-at') : '';
		$.ajax({
            url: "<?php echo e(action('\Modules\Essentials\Http\Controllers\EssentialsMessageController@getNewMessages'), false); ?>?last_chat_time=" + last_chat_time,
            dataType: 'html',
            global: false,
            success: function(result) {
            	if(result.trim() != ''){
            		$('div#chat-box').append(result);
					scroll_down_chat_div();
            	}
            },
        });
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Essentials/Providers/../Resources/views/messages/index.blade.php ENDPATH**/ ?>