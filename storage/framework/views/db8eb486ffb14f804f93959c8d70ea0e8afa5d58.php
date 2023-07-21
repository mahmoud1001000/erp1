<div class="row">
	<div class="col-md-12">
		<a type="button" class="btn btn-sm btn-primary task_btn pull-right" href="<?php echo e(action('\Modules\Project\Http\Controllers\InvoiceController@create', ['project_id' => $project->id]), false); ?>">
		    <?php echo app('translator')->get('messages.add'); ?>&nbsp;
		    <i class="fa fa-plus"></i>
		</a>
	</div> <br><br>
</div>
<div class="table-responsive">
	<table class="table table-bordered table-striped" id="project_invoice_table">
		<thead>
			<tr>
				<th><?php echo app('translator')->get('messages.action'); ?></th>
				<th><?php echo app('translator')->get('sale.invoice_no'); ?></th>
				<th><?php echo app('translator')->get('receipt.date'); ?></th>
				<th><?php echo app('translator')->get('role.customer'); ?></th>
				<th><?php echo app('translator')->get('project::lang.title'); ?></th>
				<th><?php echo app('translator')->get('purchase.payment_status'); ?></th>
				<th><?php echo app('translator')->get('sale.total_amount'); ?></th>
				<th><?php echo app('translator')->get('sale.status'); ?></th>
			</tr>
		</thead>
	</table>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Project/Providers/../Resources/views/invoice/index.blade.php ENDPATH**/ ?>