<tr>
	<td>
		<i class="fas fa-sort pull-left handle cursor-pointer" title="<?php echo app('translator')->get('lang_v1.sort_order'); ?>">
		</i>&nbsp;

		<?php echo e($ingredient->full_name, false); ?>

		<input type="hidden" class="ingredient_price" value="<?php echo e($ingredient->dpp_inc_tax, false); ?>">
		<input type="hidden" name="ingredients[<?php echo e($row_index, false); ?>][ingredient_id]" class="ingredient_id" value="<?php echo e($ingredient->id, false); ?>">

		<input type="hidden" name="ingredients[<?php echo e($row_index, false); ?>][sort_order]" class="sort_order" value="
			<?php if(!empty($ingredient->sort_order)): ?>
				<?php echo e($ingredient->sort_order, false); ?>

			<?php elseif(!empty($sort_order)): ?>
				<?php echo e($sort_order, false); ?>

			<?php endif; ?>">

		<?php if(!empty($ingredient->ingredient_line_id)): ?>
			<input type="hidden" name="ingredients[<?php echo e($row_index, false); ?>][ingredient_line_id]" value="<?php echo e($ingredient->ingredient_line_id, false); ?>">
		<?php endif; ?>

		<?php if(!empty($ingredient->mfg_ingredient_group_id)): ?>
			<input type="hidden" name="ingredients[<?php echo e($row_index, false); ?>][mfg_ingredient_group_id]" value="<?php echo e($ingredient->mfg_ingredient_group_id, false); ?>">
		<?php endif; ?>

		<?php if(isset($ig_index)): ?>
			<input type="hidden" name="ingredients[<?php echo e($row_index, false); ?>][ig_index]" value="<?php echo e($ig_index, false); ?>">
		<?php endif; ?>
	</td>
	<td>
		<div class="input-group">
			<?php echo Form::text('ingredients[' . $row_index . '][waste_percent]', !empty($ingredient->waste_percent) ? number_format($ingredient->waste_percent, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']) : 0, ['class' => 'form-control input_number waste_percent input-sm', 'placeholder' => __('lang_v1.waste_percent')]); ?>

			<span class="input-group-addon"><i class="fa fa-percent"></i></span>
		</div>
	</td>
	<td>
		<div class="<?php if(empty($ingredient->sub_units)): ?> input-group <?php else: ?> input_inline <?php endif; ?>">
			<?php echo Form::text('ingredients[' . $row_index . '][quantity]', !empty($ingredient->quantity) ? number_format($ingredient->quantity, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']) : 1, ['class' => 'form-control input_number quantity input-sm', 'placeholder' => __('lang_v1.quantity'), 'required']); ?>

			<span class="<?php if(empty($ingredient->sub_units)): ?> input-group-addon <?php endif; ?>">
				<?php if(!empty($ingredient->sub_units)): ?>
					<select name="ingredients[<?php echo e($row_index, false); ?>][sub_unit_id]" class="form-control input-sm row_sub_unit_id">
						<?php $__currentLoopData = $ingredient->sub_units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option 
								value="<?php echo e($key, false); ?>"
								data-multiplier="<?php echo e($value['multiplier'], false); ?>"
								<?php if(!empty($ingredient->sub_unit_id) && $key == $ingredient->sub_unit_id): ?>
									selected
								<?php endif; ?>
								><?php echo e($value['name'], false); ?>

							</option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				<?php else: ?>
					<?php echo $ingredient->unit; ?>

				<?php endif; ?>
			</span>
		</div>
	</td>
	<?php
		$price = !empty($ingredient->quantity) ? $ingredient->quantity * $ingredient->dpp_inc_tax : $ingredient->dpp_inc_tax;
		$price = $price * $ingredient->multiplier;
	?>
	<td><span class="ingredient_price"><?php echo e(number_format($price, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?></span></td>
	<td><button type="button" class="btn btn-danger btn-xs remove_ingredient"><i class="fas fa-times"></i></button></td>
</tr><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Manufacturing/Providers/../Resources/views/recipe/ingredient_row.blade.php ENDPATH**/ ?>