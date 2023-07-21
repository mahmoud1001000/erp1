<?php $__env->startSection('title', __('manufacturing::lang.add_ingredients')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('manufacturing::lang.add_ingredients'); ?></h1>
</section>

<!-- Main content -->
<section class="content">
	<?php echo Form::open(['url' => action('\Modules\Manufacturing\Http\Controllers\RecipeController@store'), 'method' => 'post', 'id' => 'recipe_form' ]); ?>

	<div id="box_group">
	<div class="box box-solid">
		<div class="box-header"> 
			<h4 class="box-title"><strong><?php echo app('translator')->get('sale.product'); ?>: </strong><?php echo e($variation->product_name, false); ?> <?php if($variation->product_type == 'variable'): ?> - <?php echo e($variation->product_variation_name, false); ?> - <?php echo e($variation->name, false); ?> <?php endif; ?></h4>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<button type="button" class="btn btn-success pull-right" id="add_ingredient_group"><?php echo app('translator')->get('manufacturing::lang.add_ingredient_group'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('manufacturing::lang.ingredient_group_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></button>
				</div>
				<div class="col-md-10 col-md-offset-1">
					<div class="form-group">
						<?php echo Form::label('search_product', __('manufacturing::lang.select_ingredient').':'); ?>


						<?php echo Form::text('search_product', null, ['class' => 'form-control', 'id' => 'search_product', 'placeholder' => __('manufacturing::lang.select_ingredient'), 'autofocus' => true ]); ?>


						<?php echo Form::hidden('variation_id', $variation->id); ?>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-striped table-th-green text-center ingredients_table">
						<thead>
							<tr>
								<th><?php echo app('translator')->get('manufacturing::lang.ingredient'); ?></th>
								<th><?php echo app('translator')->get('manufacturing::lang.waste_percent'); ?></th>
								<th><?php echo app('translator')->get('manufacturing::lang.final_quantity'); ?></th>
								<th><?php echo app('translator')->get('lang_v1.price'); ?></th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody class="ingredient-row-sortable">
							<?php
								$row_index = 0;
								$ingredient_groups = [];
								$ingredient_total = 0;
							?>
							<?php if(!empty($ingredients)): ?>
								<?php $__currentLoopData = $ingredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php
										$ingredient_obj = (object) $ingredient;
										$price = !empty($ingredient_obj->quantity) ? $ingredient_obj->quantity * $ingredient_obj->dpp_inc_tax : $ingredient_obj->dpp_inc_tax;
										$price = $price * $ingredient_obj->multiplier;
										$ingredient_total += $price;
									?>
									<?php if(empty($ingredient['mfg_ingredient_group_id'])): ?>
										<?php
											$row_index = $loop->index;
										?>

										<?php echo $__env->make('manufacturing::recipe.ingredient_row', ['ingredient' => (object) $ingredient, 'ig_index' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
										
										<?php
											$row_index++;
										?>
									<?php else: ?>
										<?php
											$ingredient_groups[$ingredient['mfg_ingredient_group_id']][] = $ingredient;
										?>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div> <!--box end-->
	<?php
		$ig_index = 0;
	?>
	<?php $__currentLoopData = $ingredient_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php
			$ig_name = !empty($ingredient_group[0]['ingredient_group_name']) ? $ingredient_group[0]['ingredient_group_name'] : '';
			$ig_description = !empty($ingredient_group[0]['ig_description']) ? $ingredient_group[0]['ig_description'] : '';
		?>
		<?php echo $__env->make('manufacturing::recipe.ingredient_group', ['ingredients' => $ingredient_group, 'ig_index' => $ig_index, 'ig_name' => $ig_name, 'ig_description' => $ig_description], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php
			$ig_index++;
			$row_index += count($ingredient_group);
		?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
	<div class="box box-solid">
		<div class="box-body">
			<div class="row">
				<input type="hidden" id="row_index" value="<?php echo e($row_index, false); ?>">
				<input type="hidden" id="ig_index" value="<?php echo e($ig_index, false); ?>">
				<div class="col-md-12 text-right">
					<strong><?php echo app('translator')->get('manufacturing::lang.ingredients_cost'); ?>: </strong> <span 
									id="ingredients_cost_text" 
									><?php echo e(number_format($ingredient_total, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?></span>
									<input type="hidden" name="ingredients_cost" id="ingredients_cost" value="<?php echo e($recipe->ingredients_cost ?? 0, false); ?>">
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<?php echo Form::label('waste_percent', __('manufacturing::lang.wastage').':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('manufacturing::lang.wastage_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
						<div class="input-group">
							<?php echo Form::text('waste_percent',!empty($recipe->waste_percent) ? number_format($recipe->waste_percent, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']) : 0, ['class' => 'form-control input_number', 'placeholder' => __('manufacturing::lang.wastage') ]); ?>

							<span class="input-group-addon">
								<i class="fa fa-percent"></i>
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<?php echo Form::label('total_quantity', __('manufacturing::lang.total_output_quantity').':'); ?>

						<div class="<?php if(!is_array($unit_html)): ?> input-group <?php else: ?> input_inline <?php endif; ?>">
							<?php echo Form::text('total_quantity',!empty($recipe->total_quantity) ? number_format($recipe->total_quantity, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']) : 1, ['class' => 'form-control input_number', 'placeholder' => __('manufacturing::lang.total_output_quantity') ]); ?>

							<span class="<?php if(!is_array($unit_html)): ?> input-group-addon <?php endif; ?>">
								<?php if(is_array($unit_html)): ?>
									<select name="sub_unit_id" class="form-control" id="sub_unit_id">
										<?php $__currentLoopData = $unit_html; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option 
												value="<?php echo e($key, false); ?>" 
												data-multiplier="<?php echo e($value['multiplier'], false); ?>"
												<?php if(!empty($recipe->sub_unit_id) && $recipe->sub_unit_id == $key): ?>
													selected
												<?php endif; ?>
											><?php echo e($value['name'], false); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								<?php else: ?>
									<?php echo e($unit_html, false); ?>

								<?php endif; ?>
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<?php echo Form::label('extra_cost', __('manufacturing::lang.production_cost').':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('manufacturing::lang.production_cost_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
						<div class="input-group">
							<?php echo Form::text('extra_cost',!empty($recipe->extra_cost) ? number_format($recipe->extra_cost, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']) : 0, ['class' => 'form-control input_number', 'placeholder' => __('manufacturing::lang.extra_cost') ]); ?>

							<span class="input-group-addon">
								<i class="fa fa-percent"></i>	
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<?php echo Form::label('total', __('sale.total').':'); ?>

						<div class="input-group">
							<?php
								$final_price = $ingredient_total;
								if(!empty($recipe->extra_cost)) {
									$final_price = $final_price + ($final_price * $recipe->extra_cost / 100);
								}

							?>
							<?php echo Form::text('total', number_format($final_price, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['id' => 'total', 'class' => "form-control", 'readonly']); ?>

							<span class="input-group-addon">
								<?php echo e($currency_details->symbol, false); ?>

							</span>
						</div>
					</div>
				</div>
			</div>	
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<?php echo Form::label('instructions', __('manufacturing::lang.recipe_instructions').':'); ?>


						<?php echo Form::textarea('instructions',!empty($recipe) ? $recipe->instructions : null, ['class' => 'form-control', 'placeholder' => __('manufacturing::lang.recipe_instructions') ]); ?>

					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-12">
					<button type="submit" class="btn btn-primary pull-right"><?php echo app('translator')->get('messages.save'); ?></button>
				</div>
			</div>
		</div>
	</div>
<?php echo Form::close(); ?>

</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
	<?php echo $__env->make('manufacturing::layouts.partials.common_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<script type="text/javascript">
		$('.ingredient-row-sortable').sortable({
			cursor: "move",
			handle: ".handle",
			update: function(event, ui) {
				$(this).children().each(function(index) {
					$(this).find('input.sort_order').val(++index)
				});
			}
		});
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Manufacturing/Providers/../Resources/views/recipe/add_ingredients.blade.php ENDPATH**/ ?>