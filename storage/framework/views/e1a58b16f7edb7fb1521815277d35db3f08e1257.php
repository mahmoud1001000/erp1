<?php $__env->startSection('title', __('sale.pos_sale')); ?>

<?php $__env->startSection('content'); ?>
<section class="content no-print">
	<input type="hidden" id="amount_rounding_method" value="<?php echo e($pos_settings['amount_rounding_method'] ?? '', false); ?>">
	<?php if(!empty($pos_settings['allow_overselling'])): ?>
		<input type="hidden" id="is_overselling_allowed">
	<?php endif; ?>
	<?php if(session('business.enable_rp') == 1): ?>
        <input type="hidden" id="reward_point_enabled">
    <?php endif; ?>
    <?php
		$is_discount_enabled = $pos_settings['disable_discount'] != 1 ? true : false;
		$is_rp_enabled = session('business.enable_rp') == 1 ? true : false;
	?>
	<?php echo Form::open(['url' => action('SellPosController@update', [$transaction->id]), 'method' => 'post', 'id' => 'edit_pos_sell_form' ]); ?>

	<?php echo e(method_field('PUT'), false); ?>

	<div class="row mb-12">
		<div class="col-md-12">
			<div class="row">
				<div class="<?php if(empty($pos_settings['hide_product_suggestion'])): ?> col-md-7 <?php else: ?> col-md-10 col-md-offset-1 <?php endif; ?> no-padding pr-12">
					<div class="box box-solid mb-12   ">
						<div class="box-body pb-0">
							<?php echo Form::hidden('location_id', $transaction->location_id, ['id' => 'location_id', 'data-receipt_printer_type' => !empty($location_printer_type) ? $location_printer_type : 'browser', 'data-default_payment_accounts' => $transaction->location->default_payment_accounts]); ?>

							<!-- sub_type -->
							<?php echo Form::hidden('sub_type', isset($sub_type) ? $sub_type : null); ?>

							<input type="hidden" id="item_addition_method" value="<?php echo e($business_details->item_addition_method, false); ?>">
								<?php echo $__env->make('sale_pos.partials.pos_form_edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

								<?php echo $__env->make('sale_pos.partials.pos_form_totals', ['edit' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

								<?php echo $__env->make('sale_pos.partials.payment_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

								<?php if(empty($pos_settings['disable_suspend'])): ?>
									<?php echo $__env->make('sale_pos.partials.suspend_note_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
								<?php endif; ?>

								<?php if(empty($pos_settings['disable_recurring_invoice'])): ?>
									<?php echo $__env->make('sale_pos.partials.recurring_invoice_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php if(empty($pos_settings['hide_product_suggestion'])  && !isMobile()): ?>
					<div class="col-md-5 no-padding">
						<?php echo $__env->make('sale_pos.partials.pos_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php echo $__env->make('sale_pos.partials.pos_form_actions', ['edit' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo Form::close(); ?>

</section>

<!-- This will be printed -->
<section class="invoice print_section" id="receipt_section">
</section>
<div class="modal fade contact_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
	<?php echo $__env->make('contact.create', ['quick_add' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php if(empty($pos_settings['hide_product_suggestion']) && isMobile()): ?>
	<?php echo $__env->make('sale_pos.partials.mobile_product_suggestions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<!-- /.content -->
<div class="modal fade register_details_modal" tabindex="-1" role="dialog" 
	aria-labelledby="gridSystemModalLabel">
</div>
<div class="modal fade close_register_modal" tabindex="-1" role="dialog" 
	aria-labelledby="gridSystemModalLabel">
</div>
<!-- quick product modal -->
<div class="modal fade quick_add_product_modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle"></div>

<?php echo $__env->make('sale_pos.partials.configure_search_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('sale_pos.partials.recent_transactions_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('sale_pos.partials.weighing_scale_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('js/pos.js?v=' . $asset_v), false); ?>"></script>
	<script src="<?php echo e(asset('js/printer.js?v=' . $asset_v), false); ?>"></script>
	<script src="<?php echo e(asset('js/product.js?v=' . $asset_v), false); ?>"></script>
	<script src="<?php echo e(asset('js/opening_stock.js?v=' . $asset_v), false); ?>"></script>
	<?php echo $__env->make('sale_pos.partials.keyboard_shortcuts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<!-- Call restaurant module if defined -->
    <?php if(in_array('tables' ,$enabled_modules) || in_array('modifiers' ,$enabled_modules) || in_array('service_staff' ,$enabled_modules)): ?>
    	<script src="<?php echo e(asset('js/restaurant.js?v=' . $asset_v), false); ?>"></script>
    <?php endif; ?>

    <!-- include module js -->
    <?php if(!empty($pos_module_data)): ?>
	    <?php $__currentLoopData = $pos_module_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!empty($value['module_js_path'])): ?>
                <?php if ($__env->exists($value['module_js_path'], ['view_data' => $value['view_data']])) echo $__env->make($value['module_js_path'], ['view_data' => $value['view_data']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
	<style type="text/css">
		/*CSS to print receipts*/
		.print_section{
		    display: none;
		}
		@media  print{
		    .print_section{
		        display: block !important;
		    }
		}
		@page  {
		    size: 3.1in auto;/* width height */
		    height: auto !important;
		    margin-top: 0mm;
		    margin-bottom: 0mm;
		}
	</style>
	<!-- include module css -->
    <?php if(!empty($pos_module_data)): ?>
        <?php $__currentLoopData = $pos_module_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!empty($value['module_css_path'])): ?>
                <?php if ($__env->exists($value['module_css_path'])) echo $__env->make($value['module_css_path'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/sale_pos/edit.blade.php ENDPATH**/ ?>