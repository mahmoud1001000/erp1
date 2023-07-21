<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header no-print">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"></h4>
    </div>

    <div class="modal-body">
      <div class="row">
        <div class="col-xs-6">
          <div class="well well-sm">
            <strong><?php echo app('translator')->get('business.business_name'); ?>: </strong> <?php echo e($system["invoice_business_name"], false); ?> <br>
            <strong><?php echo app('translator')->get('business.email'); ?>: </strong> <?php echo e($system["email"], false); ?> <br>
            <strong><?php echo app('translator')->get('business.landmark'); ?>: </strong> <?php echo e($system["invoice_business_landmark"], false); ?> <br>
            <strong><?php echo app('translator')->get('business.city'); ?>: </strong> <?php echo e($system["invoice_business_city"], false); ?>

            <strong><?php echo app('translator')->get('business.zip_code'); ?>: </strong> <?php echo e($system["invoice_business_zip"], false); ?> <br>
            <strong><?php echo app('translator')->get('business.state'); ?>: </strong> <?php echo e($system["invoice_business_state"], false); ?>

            <strong><?php echo app('translator')->get('business.country'); ?>: </strong> <?php echo e($system["invoice_business_country"], false); ?>

          </div>
        </div>
        <div class="col-xs-6">
          <div class="well well-sm">
            <strong><?php echo app('translator')->get('business.business_name'); ?>: </strong> <?php echo e($subscription->business->name, false); ?> <br>
            <?php if(!empty($subscription->business->tax_number_1) && !empty($subscription->business->tax_label_1)): ?>
              <strong><?php echo e($subscription->business->tax_label_1, false); ?>: </strong> <?php echo e($subscription->business->tax_number_1, false); ?> <br>
            <?php endif; ?>
            
            <?php if(!empty($subscription->business->tax_number_2) && !empty($subscription->business->tax_label_2)): ?>
              <strong><?php echo e($subscription->business->tax_label_2, false); ?>: </strong> <?php echo e($subscription->business->tax_number_2, false); ?> <br>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table subscription-details">
            <thead>
              <tr>
                <th>Package</th>
                <th>Quantity</th>
                <th>Price</th>
              </tr>
            </thead>
            <body>
              <tr>
                <td><?php echo e($subscription->package->name, false); ?></td>
                <td>1</td>
                <td><span class="display_currency" data-currency_symbol="true"><?php echo e($subscription->package_price, false); ?></span> </td>
              </tr>
            </body>
          </table>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-xs-12">
          <table class="table">
            <tr>
              <th>Created At:</th>
              <td><?php echo e(\Carbon::createFromTimestamp(strtotime($subscription->created_at))->format(session('business.date_format')), false); ?></td>
              <th>Payment Transaction ID:</th>
              <td><?php echo e($subscription->payment_transaction_id, false); ?></td>
            </tr>
            <tr>
              <th>Created By:</th>
              <td><?php echo e($subscription->created_user->user_full_name, false); ?></td>
              <th>Paid Via:</th>
              <td><?php echo e($subscription->paid_via, false); ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <div class="modal-footer no-print">
      <button type="button" class="btn btn-primary" aria-label="Print" 
      onclick="$(this).closest('div.modal-content').printThis();"><i class="fa fa-print"></i> <?php echo app('translator')->get( 'messages.print' ); ?>
      </button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<script type="text/javascript">
  $(document).ready(function(){
    __currency_convert_recursively($('.subscription-details'));
  })
</script><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Superadmin/Providers/../Resources/views/subscription/show_subscription_modal.blade.php ENDPATH**/ ?>