<?php $__env->startSection('title', __( 'essentials::lang.add_payroll' )); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('essentials::layouts.nav_hrm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><?php echo app('translator')->get( 'essentials::lang.add_payroll' ); ?></h1>
</section>

<!-- Main content -->
<section class="content">
<?php echo Form::open(['url' => action('\Modules\Essentials\Http\Controllers\PayrollController@store'), 'method' => 'post', 'id' => 'add_payroll_form' ]); ?>

    <?php echo Form::hidden('expense_for', $employee->id); ?>

    <?php echo Form::hidden('transaction_date', $transaction_date); ?>

    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget'); ?>
                <div class="col-md-12">
                    <h4><?php echo __('essentials::lang.payroll_of_employee', ['employee' => $employee->user_full_name, 'date' => $month_name . ' ' . $year]); ?></h4>
                    <br>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('essentials_duration', __( 'essentials::lang.total_work_duration' ) . ':*'); ?>

                        <?php echo Form::text('essentials_duration', $total_work_duration, ['class' => 'form-control input_number', 'placeholder' => __( 'essentials::lang.total_work_duration' ), 'required' ]); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('essentials_duration_unit', __( 'essentials::lang.duration_unit' ) . ':'); ?>

                        <?php echo Form::text('essentials_duration_unit', 'Hour', ['class' => 'form-control', 'placeholder' => __( 'essentials::lang.duration_unit' ) ]); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('essentials_amount_per_unit_duration', __( 'essentials::lang.amount_per_unit_duartion' ) . ':*'); ?>

                        <?php echo Form::text('essentials_amount_per_unit_duration', 0, ['class' => 'form-control input_number', 'placeholder' => __( 'essentials::lang.amount_per_unit_duartion' ), 'required' ]); ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('total', __( 'sale.total' ) . ':'); ?>

                        <?php echo Form::text('total', 0, ['class' => 'form-control input_number', 'placeholder' => __( 'sale.total' ) ]); ?>

                    </div>
                </div>
            <?php echo $__env->renderComponent(); ?>
            </div>
            <div class="col-md-12">
            <?php $__env->startComponent('components.widget'); ?>
                <h4><?php echo app('translator')->get('essentials::lang.allowances'); ?>:</h4>
                <table class="table table-condenced" id="allowance_table">
                    <thead>
                        <tr>
                            <th class="col-md-5"><?php echo app('translator')->get('essentials::lang.allowance'); ?></th>
                            <th class="col-md-3"><?php echo app('translator')->get('essentials::lang.amount_type'); ?></th>
                            <th class="col-md-3"><?php echo app('translator')->get('sale.amount'); ?></th>
                            <th class="col-md-1">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $total_allowances = 0;
                        ?>
                        <?php if(!empty($allowances)): ?>
                            <?php $__currentLoopData = $allowances['allowance_names']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('essentials::payroll.allowance_and_deduction_row', ['add_button' => $loop->index == 0 ? true : false, 'type' => 'allowance', 'name' => $value, 'value' => $allowances['allowance_amounts'][$key], 'amount_type' => $allowances['allowance_types'][$key],
                                'percent' => $allowances['allowance_percents'][$key] ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <?php
                                    $total_allowances += $allowances['allowance_amounts'][$key];
                                ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <?php echo $__env->make('essentials::payroll.allowance_and_deduction_row', ['add_button' => true, 'type' => 'allowance'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('essentials::payroll.allowance_and_deduction_row', ['type' => 'allowance'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('essentials::payroll.allowance_and_deduction_row', ['type' => 'allowance'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2"><?php echo app('translator')->get('sale.total'); ?></th>
                            <td><span id="total_allowances" class="display_currency" data-currency_symbol="true"><?php echo e($total_allowances, false); ?></span></td>
                            <td>&nbsp;</td>
                        </tr>
                    </tfoot>
                </table>
            <?php echo $__env->renderComponent(); ?>
            </div>
            <div class="col-md-12">
            <?php $__env->startComponent('components.widget'); ?>
                <h4><?php echo app('translator')->get('essentials::lang.deductions'); ?>:</h4>
                <table class="table table-condenced" id="deductions_table">
                    <thead>
                        <tr>
                            <th class="col-md-5"><?php echo app('translator')->get('essentials::lang.deduction'); ?></th>
                            <th class="col-md-3"><?php echo app('translator')->get('essentials::lang.amount_type'); ?></th>
                            <th class="col-md-3"><?php echo app('translator')->get('sale.amount'); ?></th>
                            <th class="col-md-1">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $total_deductions = 0;
                        ?>
                        <?php if(!empty($deductions)): ?>
                        <?php $__currentLoopData = $deductions['deduction_names']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('essentials::payroll.allowance_and_deduction_row', ['add_button' => $loop->index == 0 ? true : false, 'type' => 'deduction', 'name' => $value, 'value' => $deductions['deduction_amounts'][$key], 
                            'amount_type' => $deductions['deduction_types'][$key], 'percent' => $deductions['deduction_percents'][$key]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <?php
                                $total_deductions += $deductions['deduction_amounts'][$key];
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <?php echo $__env->make('essentials::payroll.allowance_and_deduction_row', ['add_button' => true, 'type' => 'deduction'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('essentials::payroll.allowance_and_deduction_row', ['type' => 'deduction'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('essentials::payroll.allowance_and_deduction_row', ['type' => 'deduction'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2"><?php echo app('translator')->get('sale.total'); ?></th>
                            <td><span id="total_deductions" class="display_currency" data-currency_symbol="true"><?php echo e($total_deductions, false); ?></span></td>
                            <td>&nbsp;</td>
                        </tr>
                    </tfoot>
                </table>
            
            <?php echo $__env->renderComponent(); ?>
        </div>
        
        <div class="col-md-12">
            <h4 class="pull-right"><?php echo app('translator')->get('essentials::lang.gross_amount'); ?>: <span id="gross_amount_text">0</span></h4>
            <br>
            <?php echo Form::hidden('final_total', 0, ['id' => 'gross_amount']); ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary pull-right" id="submit_user_button"><?php echo app('translator')->get( 'messages.save' ); ?></button>
        </div>
    </div>
<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<?php if ($__env->exists('essentials::payroll.form_script')) echo $__env->make('essentials::payroll.form_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Essentials/Providers/../Resources/views/payroll/create.blade.php ENDPATH**/ ?>