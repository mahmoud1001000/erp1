<div class="tab-pane 
    <?php if(!empty($view_type) &&  $view_type == 'subscriptions'): ?>
        active
    <?php else: ?>
        ''
    <?php endif; ?>"
id="subscriptions_tab">
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget'); ?>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('subscriptions_filter_date_range', __('report.date_range') . ':'); ?>

                        <?php echo Form::text('subscriptions_filter_date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'readonly']); ?>

                    </div>
                </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php echo $__env->make('sale_pos.partials.subscriptions_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/contact/partials/subscriptions.blade.php ENDPATH**/ ?>