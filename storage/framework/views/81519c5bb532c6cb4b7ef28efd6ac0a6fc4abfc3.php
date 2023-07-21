<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('AccountController@postFundTransfer'), 'method' => 'post', 'id' => 'fund_transfer_form', 'files' => true ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get( 'account.fund_transfer' ); ?></h4>
    </div>

    <div class="modal-body">
            <div class="form-group">
                <strong><?php echo app('translator')->get('account.selected_account'); ?></strong>: 
                <?php echo e($from_account->name, false); ?>

                <?php echo Form::hidden('from_account', $from_account->id); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('to_account', __( 'account.transfer_to' ) .":*"); ?>

                <?php echo Form::select('to_account', $to_accounts, null, ['class' => 'form-control', 'required' ]); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('amount', __( 'sale.amount' ) .":*"); ?>

                <?php echo Form::text('amount', 0, ['class' => 'form-control input_number', 'required','placeholder' => __( 'sale.amount' ) ]); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('operation_date', __( 'messages.date' ) .":*"); ?>

                <div class="input-group date" id='od_datetimepicker'>
                  <?php echo Form::text('operation_date', 0, ['class' => 'form-control', 'required','placeholder' => __( 'messages.date' ) ]); ?>

                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
            </div>

            <div class="form-group">
                <?php echo Form::label('note', __( 'brand.note' )); ?>

                <?php echo Form::textarea('note', null, ['class' => 'form-control', 'placeholder' => __( 'brand.note' ), 'rows' => 4]); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('document', __('purchase.attach_document') . ':'); ?>

                <?php echo Form::file('document', ['id' => 'upload_document', 'accept' => implode(',', array_keys(config('constants.document_upload_mimes_types')))]); ?>

                <p class="help-block">
                  <?php echo app('translator')->get('purchase.max_file_size', ['size' => (config('constants.document_size_limit') / 1000000)]); ?>
                  <?php if ($__env->exists('components.document_help_text')) echo $__env->make('components.document_help_text', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </p>
            </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'messages.submit' ); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script type="text/javascript">
  $(document).ready( function(){
    $('#od_datetimepicker').datetimepicker({
      format: moment_date_format + ' ' + moment_time_format
    });
  });
</script><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/account/transfer.blade.php ENDPATH**/ ?>