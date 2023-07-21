<div class="modal-dialog modal-danger" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> <?php echo app('translator')->get('superadmin::lang.subscription_expired'); ?></h4>
    </div>

    <div class="modal-body">
      <?php echo app('translator')->get('superadmin::lang.subscription_expired_modal_content', 
      ['app_name' => env('APP_NAME')]); ?>
    </div>

    <div class="modal-footer">
      <a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\SubscriptionController@index'), false); ?>" class="btn btn-outline btn-default"><i class="fa fa-refresh"></i> <?php echo app('translator')->get( 'superadmin::lang.subscribe'); ?></a>
      <button type="button" class="btn btn-outline" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Superadmin/Providers/../Resources/views/subscription/subscription_expired_modal.blade.php ENDPATH**/ ?>