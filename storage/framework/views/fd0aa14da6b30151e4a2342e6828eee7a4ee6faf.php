<!-- Edit Order tax Modal -->

<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title"><?php echo app('translator')->get('lang_v1.view_invoice_url'); ?> - <?php echo app('translator')->get('sale.invoice_no'); ?>: <?php echo e($transaction->invoice_no, false); ?></h4>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<input type="text" class="form-control" value="<?php echo e($url, false); ?>" id="invoice_url">
				<p class="help-block"><?php echo app('translator')->get('lang_v1.invoice_url_help'); ?></p>
			</div>
		</div>
		<div class="modal-footer">
		    <button type="button" class="btn btn-default" data-dismiss="modal">
		    	<?php echo app('translator')->get('messages.close'); ?>
		    </button>

		    <a href="<?php echo e($url, false); ?>" id="view_invoice_url" target="_blank" rel="noopener" class="btn btn-primary">
				<?php echo app('translator')->get('messages.view'); ?>
			</a>
		</div>
	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script type="text/javascript">
	$('input#invoice_url').click(function(){
		$(this).select().focus();
	});
</script><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/sale_pos/partials/invoice_url_modal.blade.php ENDPATH**/ ?>