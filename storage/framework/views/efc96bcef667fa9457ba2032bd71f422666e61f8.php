

<?php $__env->startSection('title', __('lang_v1.ledger')); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1><?php echo app('translator')->get('lang_v1.ledger'); ?></h1>
</section>
<!-- Main content -->
<section class="content">
	<?php
	    $transaction_types = [];
	    if(in_array($contact->type, ['both', 'supplier'])){
	        $transaction_types['purchase'] = __('lang_v1.purchase');
	        $transaction_types['purchase_return'] = __('lang_v1.purchase_return');
	    }

	    if(in_array($contact->type, ['both', 'customer'])){
	        $transaction_types['sell'] = __('sale.sale');
	        $transaction_types['sell_return'] = __('lang_v1.sell_return');
	    }

	    $transaction_types['opening_balance'] = __('lang_v1.opening_balance');
	?>
	<div class="box box-solid">
		<div class="box-body">
		    <div class="col-md-12">
		        <div class="col-md-3">
		            <div class="form-group">
		                <?php echo Form::label('ledger_date_range', __('report.date_range') . ':'); ?>

		                <?php echo Form::text('ledger_date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'readonly']); ?>

		            </div>
		        </div>
		        <div class="col-md-9 text-right">
		            <button data-href="<?php echo e(action('\Modules\Crm\Http\Controllers\LedgerController@getLedger'), false); ?>?action=pdf" class="btn btn-default btn-xs" id="create_ledger_pdf"><i class="fas fa-file-pdf"></i></button>
		        </div>
		    </div>
		    <div id="contact_ledger_div"></div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('modules/crm/js/crm.js?v=' . $asset_v), false); ?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			getLedger();
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('crm::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Crm/Providers/../Resources/views/ledger/index.blade.php ENDPATH**/ ?>