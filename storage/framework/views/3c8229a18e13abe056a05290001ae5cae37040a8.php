<div class="row">
  <div class="col-md-12">
    <hr>
    <h3>تفاصيل الدفعات</h3>
    <table class="table">
      <tr>
        <th>#</th>
        <th>الرقم المرجعي </th>
        
        <th><?php echo app('translator')->get('sale.total_amount'); ?></th>
        <th>رقم  الفاتورة</th>
          <th>اسم العميل</th>
      </tr>
      <?php
        $total_amount = 0;
        $total_quantity = 0;
      ?>
      <?php $__currentLoopData = $payements_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td>
            <?php echo e($loop->iteration, false); ?>.
          </td>
          <td>
            
            
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
  <!-- /.content -->
<div class="modal fade view_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>
<script src="<?php echo e(asset('js/payment.js?v=' . $asset_v), false); ?>"></script>
<?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/cash_register/payment_details.blade.php ENDPATH**/ ?>