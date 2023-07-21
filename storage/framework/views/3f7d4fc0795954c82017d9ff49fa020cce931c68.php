<div class="row">
  <div class="col-md-12">
    <hr>
    <h3>تفاصيل مدفوعات المشتريات</h3>
    <table class="table">
      <tr>
        <th>#</th>
        <th>الرقم المرجعي </th>
        
        <th><?php echo app('translator')->get('sale.total_amount'); ?></th>
        <th>رقم  الفاتورة</th>
          <th>اسم المورد</th>
      </tr>
      <?php
        $total_amount = 0;
        $total_quantity = 0;
      ?>
      <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td>
            <?php echo e($loop->iteration, false); ?>.
          </td>
          <td>
            <?php echo e($detail->payment_ref_no, false); ?>

          </td>
          <td>
            <span class="display_currency" data-currency_symbol="true"><?php echo e($detail->amount, false); ?></span>
           <?php
           $total_amount+=$detail->amount;
           ?>
          </td>
          <td>
              <?php echo e($detail->invoice_no, false); ?>

          </td>
          <td>
              <?php echo e($detail->name, false); ?>

          </td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      <tr>
          <td colspan="2">
              <strong>
              اجمالي المدفوعات</strong></td>
          <td><strong><span class="display_currency" data-currency_symbol="true"><?php echo e($total_amount, false); ?></sapn></strong></td>
          <td colspan="2"></td>
      </tr>


      </table>
    </div>
  </div>
<?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/cash_register/purchase_pay_details.blade.php ENDPATH**/ ?>