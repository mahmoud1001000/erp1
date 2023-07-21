<a href="<?php echo e(action('TransactionPaymentController@show', [$id]), false); ?>" class="view_payment_modal payment-status-label" data-orig-value="<?php echo e($payment_status, false); ?>" data-status-name="<?php echo e(__('lang_v1.' . $payment_status), false); ?>"><span class="label  <?php if($payment_status == 'partial'){
                echo 'bg-aqua';
            }elseif($payment_status == 'due'){
                echo 'bg-yellow';
            }elseif ($payment_status == 'paid') {
                echo 'bg-light-green';
            }elseif ($payment_status == 'overdue') {
                echo 'bg-red';
            }elseif ($payment_status == 'partial-overdue') {
                echo 'bg-red';
            }elseif ($payment_status == 'installment') {
                echo 'bg-red';
            }
            
            
            ?>"><?php echo e(__('lang_v1.' . $payment_status), false); ?>

                        </span></a><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/sell/partials/payment_status.blade.php ENDPATH**/ ?>