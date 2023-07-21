<!-- Fix for scroll issue in new booking -->
<style type="text/css">
  .modal {
    overflow-y:auto; 
  }
</style>
<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => $notification_template['template_for'] == 'send_ledger' ? action('ContactController@sendLedger') : action('NotificationController@send'), 'method' => 'post', 'id' => 'send_notification_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get( 'lang_v1.send_notification' ); ?> - <?php echo e($template_name, false); ?></h4>
    </div>

    <div class="modal-body">
      <div class="form-group <?php if($notification_template['template_for'] == 'send_ledger'): ?> hide <?php endif; ?>">
        <label class="checkbox-inline">
          <?php echo Form::checkbox('notification_type[]', 'email', true, ['class' => 'input-icheck notification_type']); ?> <?php echo app('translator')->get('lang_v1.send_email'); ?>
        </label>
        <label class="checkbox-inline">
          <?php echo Form::checkbox('notification_type[]', 'sms', false, ['class' => 'input-icheck notification_type']); ?> <?php echo app('translator')->get('lang_v1.send_sms'); ?>
        </label>
        <label class="checkbox-inline">
          <?php echo Form::checkbox('notification_type[]', 'whatsapp', false, ['class' => 'input-icheck notification_type']); ?> <?php echo app('translator')->get('lang_v1.send_whatsapp'); ?>
        </label>
      </div>
      <div id="email_div">
        <div class="form-group">
          <?php echo Form::label('to_email', __('lang_v1.to').':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.notification_email_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
          <?php echo Form::text('to_email', $contact->email, ['class' => 'form-control' , 'placeholder' => __('lang_v1.to')]); ?>

        </div>
        <div class="form-group">
          <?php echo Form::label('subject', __('lang_v1.email_subject').':'); ?>

          <?php echo Form::text('subject', $notification_template['subject'], ['class' => 'form-control' , 'placeholder' => __('lang_v1.email_subject')]); ?>

        </div>
        <div class="form-group">
          <?php echo Form::label('cc', 'CC:'); ?>

          <?php echo Form::email('cc', $notification_template['cc'], ['class' => 'form-control' , 'placeholder' => 'CC']); ?>

        </div>
        <div class="form-group">
          <?php echo Form::label('bcc', 'BCC:'); ?>

          <?php echo Form::email('bcc', $notification_template['bcc'], ['class' => 'form-control' , 'placeholder' => 'BCC']); ?>

        </div>
        <div class="form-group">
          <?php echo Form::label('email_body', __('lang_v1.email_body').':'); ?>

          <?php echo Form::textarea('email_body', $notification_template['email_body'], ['class' => 'form-control', 'placeholder' => __('lang_v1.email_body'), 'rows' => 6]); ?>

        </div>
        <?php if($notification_template['template_for'] == 'send_ledger'): ?>
          <p class="help-block">*<?php echo app('translator')->get('lang_v1.ledger_attacment_help'); ?></p>
        <?php endif; ?>
      </div>
      <div class="form-group">
          <?php echo Form::label('mobile_number', __('lang_v1.mobile_number').':'); ?>

          <?php echo Form::text('mobile_number', $contact->mobile, ['class' => 'form-control', 'placeholder' => __('lang_v1.mobile_number')]); ?>

        </div>
      <div id="sms_div" class="hide">
        <div class="form-group">
          <?php echo Form::label('sms_body', __('lang_v1.sms_body').':'); ?>

          <?php echo Form::textarea('sms_body', $notification_template['sms_body'], ['class' => 'form-control', 'placeholder' => __('lang_v1.sms_body'), 'rows' => 6]); ?>

        </div>
      </div>
      <div id="whatsapp_div" class="hide">
          <?php echo Form::label('whatsapp_text', __('lang_v1.whatsapp_text').':'); ?>

          <?php echo Form::textarea('whatsapp_text', $notification_template['whatsapp_text'], ['class' => 'form-control', 'placeholder' => __('lang_v1.whatsapp_text'), 'rows' => 6]); ?>

      </div>
      <strong><?php echo app('translator')->get('lang_v1.available_tags'); ?>:</strong> <p class="help-block"><?php echo e(implode(', ', $tags), false); ?></p>

      <?php if(!empty($transaction)): ?>
        <?php echo Form::hidden('transaction_id', $transaction->id); ?>

      <?php endif; ?>

      <?php if($notification_template['template_for'] == 'send_ledger'): ?>
        <?php echo Form::hidden('contact_id', $contact->id); ?>

        <?php echo Form::hidden('start_date', $start_date); ?>

        <?php echo Form::hidden('end_date', $end_date); ?>

      <?php endif; ?>

      <?php echo Form::hidden('template_for', $notification_template['template_for']); ?>


    <div class="modal-footer">
      <button type="submit" class="btn btn-primary" id="send_notification_btn"><?php echo app('translator')->get('lang_v1.send'); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get('messages.close'); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script type="text/javascript">
// Fix for not updating textarea value on modal
  // CKEDITOR.on('instanceReady', function(){
  //    $.each( CKEDITOR.instances, function(instance) {
  //     CKEDITOR.instances[instance].on("change", function(e) {
  //         for ( instance in CKEDITOR.instances )
  //         CKEDITOR.instances[instance].updateElement();
  //     });
  //    });
  // });

  if (_.isNull(tinyMCE.activeEditor)) {
        tinymce.init({
            selector: 'textarea#email_body',
        });
    }
    
  $(document).ready(function(){
    //initialize iCheck
    $('input[type="checkbox"].input-icheck, input[type="radio"].input-icheck').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue'
    });
  });

  $(document).on('ifChanged', '.notification_type', function(){
    var notification_type = $(this).val();
    console.log(notification_type);
    if (notification_type == 'email') {
      if ($(this).is(':checked')) {
        $('div#email_div').removeClass('hide');
      } else {
        $('div#email_div').addClass('hide');
      }
    } else if(notification_type == 'sms'){
      if ($(this).is(':checked')) {
        $('div#sms_div').removeClass('hide');
      } else {
        $('div#sms_div').addClass('hide');
      }
    } else if(notification_type == 'whatsapp'){
      if ($(this).is(':checked')) {
        $('div#whatsapp_div').removeClass('hide');
      } else {
        $('div#whatsapp_div').addClass('hide');
      }
    }
  });
  $('#send_notification_form').submit(function(e){
    e.preventDefault();
    tinyMCE.triggerSave();
    var data = $(this).serialize();
    var btn = $('#send_notification_btn');
    btn.text("<?php echo app('translator')->get('lang_v1.sending'); ?>...");
    btn.attr('disabled', 'disabled');
    $.ajax({
      method: "POST",
      url: $(this).attr("action"),
      dataType: "json",
      data: $(this).serialize(),
      beforeSend: function(xhr) {
          __disable_submit_button(btn);
      },
      success: function(result){
        if(result.success == true){
          if (result.whatsapp_link) {
            window.open(result.whatsapp_link);
          }
          $('div.view_modal').modal('hide');
          toastr.success(result.msg);
        } else {
          toastr.error(result.msg);
        }
        $('#send_notification_btn').text("<?php echo app('translator')->get('lang_v1.send'); ?>");
        $('#send_notification_btn').removeAttr('disabled');
      }
    });
  });
</script><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/notification/show_template.blade.php ENDPATH**/ ?>