<div class="row">
  <div class="col-md-12">
    <hr>
    <h3>تفاصيل المصروفات</h3>
    <table class="table">
      <tr>
        <th>#</th>
        <th>الرقم المرجعي </th>
        
        <th><?php echo app('translator')->get('sale.total_amount'); ?></th>
        <th>الحالة  </th>
          <th>مصروف لـ </th>
      </tr>
      <?php
        $total_amount = 0;
        $total_quantity = 0;
      ?>
      <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td>
            <?php echo e($loop->iteration, false); ?>.
          </td>
          <td>
            <?php echo e($detail->ref_no, false); ?>

          </td>
          <td>
            <span class="display_currency" data-currency_symbol="true"><?php echo e($detail->final_total, false); ?></span>
           <?php
           $total_amount+=$detail->final_total;
           ?>
          </td>
          <td>
              <?php echo e($detail->payment_status, false); ?>

          </td>
          <td>
              <?php echo e($detail->expense_for, false); ?>

          </td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      <tr>
          <td colspan="2">
              <strong>
              اجمالي المدفوعات علي المصروفات</strong></td>
          <td><strong><span class="display_currency" data-currency_symbol="true"><?php echo e($expenses[0]->amount_paid ?? 0, false); ?></sapn></strong></td>
          <td colspan="2"></td>
      </tr>


      </table>
    </div>
  </div>
<?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/cash_register/expense_details.blade.php ENDPATH**/ ?>