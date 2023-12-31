<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('AccountController@postDeposit'), 'method' => 'post', 'id' => 'deposit_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get( 'account.deposit' ); ?></h4>
    </div>

    <div class="modal-body">
            <div class="form-group">
                <strong><?php echo app('translator')->get('account.selected_account'); ?></strong>: 
                <?php echo e($account->name, false); ?>

                <?php echo Form::hidden('account_id', $account->id); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('amount', __( 'sale.amount' ) .":*"); ?>

                <?php echo Form::text('amount', 0, ['class' => 'form-control input_number', 'required','placeholder' => __( 'sale.amount' ) ]); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('from_account', __( 'account.deposit_from' ) .":"); ?>

                <?php echo Form::select('from_account', $from_accounts, null, ['class' => 'form-control', 'placeholder' => __('messages.please_select') ]); ?>

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
</script><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/account/deposit.blade.php ENDPATH**/ ?>