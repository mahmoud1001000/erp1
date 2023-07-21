<div class="modal fade" id="update_stock_transfer_status_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <?php echo Form::open(['url' => "#", 'method' => 'post', 'id' => 'update_stock_transfer_status_form' ]); ?>


        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><?php echo app('translator')->get( 'lang_v1.update_status' ); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.completed_status_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></h4> 
        </div>

        <div class="modal-body">
            <div class="form-group">
                <?php echo Form::label('update_status', __('sale.status').':*'); ?>

                <?php echo Form::select('status', $statuses, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required', 'id' => 'update_status', 'style' => 'width: 100%;']); ?>

            </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'messages.update' ); ?></button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
        </div>

        <?php echo Form::close(); ?>


      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/stock_transfer/partials/update_status_modal.blade.php ENDPATH**/ ?>