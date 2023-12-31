<div class="invoice_line_row hide">
	<div class="col-md-12 il-bg invoice_line">
		<div class="mt-10">
			<div class="col-md-3">
				<div class="form-group">
					<div class="input-group">
						<?php echo Form::text('task[]', null, ['class' => 'form-control', 'required' ]); ?>

						<span class="input-group-btn">
					        <button class="btn btn-default toggle_description" type="button">
								<i class="fa fa-info-circle text-info" data-toggle="tooltip" title="<?php echo app('translator')->get('project::lang.toggle_invoice_task_description'); ?>"></i>
					        </button>
					    </span>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<?php echo Form::text('rate[]', null, ['class' => 'form-control rate input_number', 'required' ]); ?>

				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<?php echo Form::text('quantity[]', null, ['class' => 'form-control quantity input_number', 'required' ]); ?>

				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<?php echo Form::select('tax_rate_id[]', $taxes, null, ['class' => 'form-control tax'], $tax_attributes); ?>

				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<?php echo Form::text('total[]', null, ['class' => 'form-control total input_number', 'required', 'readonly']); ?>

				</div>
			</div>
			<div class="col-md-1">
				<i class="fa fa-trash text-danger cursor-pointer remove_this_row"></i>
			</div>
			<div class="col-md-11">
				<div class="form-group description" style="display: none;">
					<?php echo Form::textarea('description[]', null, ['class' => 'form-control ', 'placeholder' => __('lang_v1.description'), 'rows' => '3']); ?>

				</div>
			</div>
		</div>
	</div>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Project/Providers/../Resources/views/invoice/partials/invoice_line_row.blade.php ENDPATH**/ ?>