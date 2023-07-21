<?php $__env->startSection('title', __('manufacturing::lang.production')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('manufacturing::lang.production'); ?> </h1>
</section>

<!-- Main content -->
<section class="content">

	<?php echo Form::open(['url' => action('\Modules\Manufacturing\Http\Controllers\ProductionController@store'), 'method' => 'post', 'id' => 'production_form', 'files' => true ]); ?>

	<?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<?php echo Form::label('ref_no', __('purchase.ref_no').':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('manufacturing::lang.ref_no_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
					<?php echo Form::text('ref_no', null, ['class' => 'form-control']); ?>

				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<?php echo Form::label('transaction_date', __('manufacturing::lang.mfg_date') . ':*'); ?>

					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</span>
						<?php echo Form::text('transaction_date', \Carbon::createFromTimestamp(strtotime('now'))->format(session('business.date_format') . ' ' . 'H:i'), ['class' => 'form-control', 'readonly', 'required']); ?>

					</div>
				</div>
			</div>
			
			<?php if(count($business_locations) == 1): ?>
				<?php 
					$default_location = current(array_keys($business_locations->toArray())) 
				?>
			<?php else: ?>
				<?php $default_location = null; ?>
			<?php endif; ?>
			<div class="col-sm-3">
				<div class="form-group">
					<?php echo Form::label('location_id', __('purchase.business_location').':*'); ?>

					<?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.purchase_location') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
					<?php echo Form::select('location_id', $business_locations, $default_location, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required']); ?>

				</div>
			</div>

			<div class="col-sm-3">
				<div class="form-group">
					<?php echo Form::label('variation_id', __('sale.product').':*'); ?>

					<?php echo Form::select('variation_id', $recipe_dropdown, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required']); ?>

				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="form-group">
					<?php echo Form::label('recipe_quantity', __('lang_v1.quantity').':*'); ?>

					<div class="input-group" id="recipe_quantity_input">
						<?php echo Form::text('quantity', 1, ['class' => 'form-control input_number', 'id' => 'recipe_quantity', 'required', 'data-rule-notEmpty' => 'true', 'data-rule-notEqualToWastedQuantity' => 'true']); ?>

						<span class="input-group-addon" id="unit_html"></span>
					</div>
				</div>
			</div>
		</div>
	<?php echo $__env->renderComponent(); ?>

	<?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __('manufacturing::lang.ingredients')]); ?>
		<div class="row">
			<div class="col-md-12">
				<div id="enter_ingredients_table" class="text-center">
					<i><?php echo app('translator')->get('manufacturing::lang.add_ingredients_tooltip'); ?></i>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<?php if(request()->session()->get('business.enable_lot_number') == 1): ?>
				<div class="col-sm-3">
					<div class="form-group">
						<?php echo Form::label('lot_number', __('lang_v1.lot_number').':'); ?>

						<?php echo Form::text('lot_number', null, ['class' => 'form-control']); ?>

					</div>
				</div>
			<?php endif; ?>
			<?php if(session('business.enable_product_expiry')): ?>
				<div class="col-sm-3">
					<div class="form-group">
						<?php echo Form::label('exp_date', __('product.exp_date').':*'); ?>

						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</span>
							<?php echo Form::text('exp_date', null, ['class' => 'form-control', 'readonly']); ?>

						</div>
					</div>
				</div>
			<?php endif; ?>
			<div class="col-md-3">
				<div class="form-group">
					<?php echo Form::label('mfg_wasted_units', __('manufacturing::lang.waste_units').':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('manufacturing::lang.wastage_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
					<div class="input-group">
						<?php echo Form::text('mfg_wasted_units', 0, ['class' => 'form-control input_number']); ?>

						<span class="input-group-addon" id="wasted_units_text"></span>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<?php echo Form::label('production_cost', __('manufacturing::lang.production_cost').':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('manufacturing::lang.production_cost_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
					<div class="input-group">
						<?php echo Form::text('production_cost', 0, ['class' => 'form-control input_number']); ?>

						<span class="input-group-addon"><i class="fa fa-percent"></i></span>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-md-offset-9">
				<?php echo Form::hidden('final_total', 0, ['id' => 'final_total']); ?>

				<strong>
					<?php echo e(__('manufacturing::lang.total_production_cost'), false); ?>:
				</strong>
				<span id="total_production_cost" class="display_currency" data-currency_symbol="true">0</span><br>
				<strong>
					<?php echo e(__('manufacturing::lang.total_cost'), false); ?>:
				</strong>
				<span id="final_total_text" class="display_currency" data-currency_symbol="true">0</span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-md-offset-9">
				<div class="form-group">
					<br>
					<div class="checkbox">
						<label>
						<?php echo Form::checkbox('finalize', 1, false, ['class' => 'input-icheck', 'id' => 'finalize']); ?> <?php echo app('translator')->get('manufacturing::lang.finalize'); ?>
						</label> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('manufacturing::lang.finalize_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
					</div>
		        </div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary pull-right"><?php echo app('translator')->get('messages.submit'); ?></button>
			</div>
		</div>
	<?php echo $__env->renderComponent(); ?>

<?php echo Form::close(); ?>

</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<?php echo $__env->make('manufacturing::production.production_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Manufacturing/Providers/../Resources/views/production/create.blade.php ENDPATH**/ ?>