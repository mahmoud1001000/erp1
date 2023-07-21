<?php $__env->startSection('title', __('essentials::lang.document')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('essentials::layouts.nav_essentials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<section class="content">
	<h4>
		<?php echo app('translator')->get('essentials::lang.all_documents'); ?>
		<small> <?php echo app('translator')->get('essentials::lang.manage_document'); ?></small>
	</h4>
		<div class="box box-solid">
			<div class="box-header">
				<h4 class="box-title"><?php echo app('translator')->get('essentials::lang.all_documents'); ?></h4>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-sm btn-primary add_doc">
					<i class="fa fa-plus"></i> 
					<?php echo app('translator')->get( 'messages.add' ); ?>
				</button>
			</div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<?php echo Form::open(['url' => action('\Modules\Essentials\Http\Controllers\DocumentController@store'), 'id' => 'upload_document_form','files' => true, 'style' => 'display:none']); ?>

						<div class="row">
                            <div class="col-sm-12">
	                            <div class="col-sm-6">
	                                <div class="form-group">
                                   		<?php echo Form::label('name', __('essentials::lang.document') . ":*"); ?>


                                   		<?php echo Form::file('name', ['required', 'accept' => implode(',', array_keys(config('constants.document_upload_mimes_types')))]); ?>

                                   		<p class="help-block">
                        					<?php if ($__env->exists('components.document_help_text')) echo $__env->make('components.document_help_text', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        				</p>
	                                 </div>
	                            </div>
	                            <div class="clearfix"></div>
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <?php echo Form::label('description', __('essentials::lang.description') . ":"); ?>

	                                    <?php echo Form::textarea('description', null, ['class' => 'form-control', 'rows' => '4', 'cols' => '50']); ?>

	                                 </div>
	                            </div>
	                            <div class="clearfix"></div>
                        		<div class="col-sm-4">
                                	<button type="submit" class="btn btn-primary btn-sm">
                                		<?php echo app('translator')->get('essentials::lang.submit'); ?>
                                	</button>
                                	&nbsp;
									<button type="button" class="btn btn-danger btn-sm cancel_btn">
										<?php echo app('translator')->get('essentials::lang.cancel'); ?>
									</button>
                        		</div>
                            </div>
                        </div>
                        <br><hr>
					<?php echo Form::close(); ?>

					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-bordered table-striped documents">
								<thead>
									<tr>
										<th> <?php echo app('translator')->get('essentials::lang.name'); ?></th>
										<th> <?php echo app('translator')->get('essentials::lang.description'); ?></th>
										<th> <?php echo app('translator')->get('essentials::lang.uploaded_date'); ?></th>
										<th> <?php echo app('translator')->get('essentials::lang.action'); ?></th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- document share model -->
	<div class="modal fade document" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		
		//document dataTable
		var documents = $(".documents").DataTable({
			processing: true,
			ajax: "/essentials/document"+'?type=document',
			columns: [
						{data: "name", name:"documents.name"},
						{data: "description", name:"documents.description"},
						{data: "created_at", name:"documents.created_at"},
						{data: "action", name:"action", "orderable": false},
					]
		});
		
		//destroy a document
		$(document).on('click', '.delete_doc', function(){
			url = $(this).data("href");
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
					success: function(result)
					{
						if(result.success == true)
						{
							toastr.success(result.msg);
	                        documents.ajax.reload();
						} else {
							toastr.error(result.msg);
						}
					}
				});
			    }
		    });
		});

		//opening share_doc model
		$(document).on('click', '.share_doc', function(){
			var url = $(this).data('href');
			$.ajax({
				method: "GET",
				dataType: "html",
				url: url,
				success: function(result){
					$(".document").html(result).modal("show");
				}
			});
		});

		//sharing document(save in DB)
		$(document).on('submit', 'form#share_document_form', function(e){
			e.preventDefault();
			var url = $(this).attr("action");
			var data = $("form#share_document_form").serialize();
			var ladda = Ladda.create(document.querySelector('.doc-share-btn'));
			ladda.start();
			$.ajax({
				method: "PUT",
				url: url,
				dataType: "json",
				data: data,
				success:function(result){
					ladda.stop();
					if(result.success == true){
						$(".document").html(result).modal("hide");
						toastr.success(result.msg);
					} else {
						toastr.error(result.msg);
					}
				}
			});
		});

		//show a hidden form on add_doc click
		$(document).on('click', '.add_doc', function(){
			$("form#upload_document_form").fadeIn();
		});

		//form cancel_btn
	    $(document).on('click', '.cancel_btn', function(){
	    	$("form#upload_document_form")[0].reset();
			$("form#upload_document_form").fadeOut();
	    });

	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Essentials/Providers/../Resources/views/document/index.blade.php ENDPATH**/ ?>