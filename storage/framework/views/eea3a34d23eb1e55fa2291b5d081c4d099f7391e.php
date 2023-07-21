<div class="modal-dialog" role="document">
    <div class="modal-content">
        <?php echo Form::open(['url' => action('ExpenseController@store'), 'method' => 'post', 'id' => 'add_expense_modal_form', 'files' => true ]); ?>

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><?php echo app('translator')->get( 'expense.add_expense' ); ?></h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <?php if(count($business_locations) == 1): ?>
                    <?php 
                        $default_location = current(array_keys($business_locations->toArray())) 
                    ?>
                <?php else: ?>
                    <?php $default_location = request()->input('location_id'); ?>
                <?php endif; ?>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?php echo Form::label('expense_location_id', __('purchase.business_location').':*'); ?>

                        <?php echo Form::select('location_id', $business_locations, $default_location, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required', 'id' => 'expense_location_id'], $bl_attributes); ?>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?php echo Form::label('expense_category_id', __('expense.expense_category').':'); ?>

                        <?php echo Form::select('expense_category_id', $expense_categories, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select')]); ?>

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?php echo Form::label('expense_ref_no', __('purchase.ref_no').':'); ?>

                        <?php echo Form::text('ref_no', null, ['class' => 'form-control', 'id' => 'expense_ref_no']); ?>

                        <p class="help-block">
                            <?php echo app('translator')->get('lang_v1.leave_empty_to_autogenerate'); ?>
                        </p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?php echo Form::label('expense_transaction_date', __('messages.date') . ':*'); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <?php echo Form::text('transaction_date', \Carbon::createFromTimestamp(strtotime('now'))->format(session('business.date_format') . ' ' . 'H:i'), ['class' => 'form-control', 'readonly', 'required', 'id' => 'expense_transaction_date']); ?>

                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?php echo Form::label('expense_for', __('expense.expense_for').':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.expense_for') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                        <?php echo Form::select('expense_for', $users, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select')]); ?>

                    </div>
                </div>                
                <div class="col-md-6">
                    <div class="form-group">
                        <?php echo Form::label('expense_tax_id', __('product.applicable_tax') . ':' ); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-info"></i>
                            </span>
                            <?php echo Form::select('tax_id', $taxes['tax_rates'], null, ['class' => 'form-control', 'id'=>'expense_tax_id'], $taxes['attributes']); ?>


                            <input type="hidden" name="tax_calculation_amount" id="tax_calculation_amount" 
                            value="0">
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?php echo Form::label('expense_final_total', __('sale.total_amount') . ':*'); ?>

                        <?php echo Form::text('final_total', null, ['class' => 'form-control input_number', 'placeholder' => __('sale.total_amount'), 'required', 'id' => 'expense_final_total']); ?>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <?php echo Form::label('expense_additional_notes', __('expense.expense_note') . ':'); ?>

                                <?php echo Form::textarea('additional_notes', null, ['class' => 'form-control', 'rows' => 3, 'id' => 'expense_additional_notes']); ?>

                    </div>
                </div>
            </div>

            <div class="payment_row">
                <h4><?php echo app('translator')->get('purchase.add_payment'); ?>:</h4>
                <?php echo $__env->make('sale_pos.partials.payment_row_form', ['row_index' => 0, 'show_date' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="pull-right">
                            <strong><?php echo app('translator')->get('purchase.payment_due'); ?>:</strong>
                            <span id="expense_payment_due"><?php echo e(number_format(0, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'messages.save' ); ?></button>
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
        </div>
        <?php echo Form::close(); ?>

    </div>
</div>
<?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/expense/add_expense_modal.blade.php ENDPATH**/ ?>