

<?php $__env->startSection('title', __('crm::lang.campaigns')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('crm::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Content Header (Page header) -->
<section class="content-header no-print">
   <h1>
        <?php echo app('translator')->get('crm::lang.campaigns'); ?>
        <small><?php echo app('translator')->get('lang_v1.create'); ?></small>
    </h1>
</section>
<section class="content no-print">
    <div class="box box-solid">
        <div class="box-body">
            <?php echo Form::open(['url' => action('\Modules\Crm\Http\Controllers\CampaignController@store'), 'method' => 'post', 'id' => 'campaign_form' ]); ?>

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <?php echo Form::label('name', __('crm::lang.campaign_name') . ':*' ); ?>

                            <?php echo Form::text('name', null, ['class' => 'form-control', 'required' ]); ?>

                       </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo Form::label('campaign_type', __('crm::lang.campaign_type') .':*'); ?>

                            <?php echo Form::select('campaign_type', ['sms' => __('crm::lang.sms'), 'email' => __('business.email')], 'email', ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required', 'style' => 'width: 100%;']); ?>

                        </div>
                    </div>
                </div>
                <?php if(!empty($contact_ids)): ?>
                    <?php
                        $default_value = explode(',', $contact_ids);
                        $to = 'contact';
                    ?>
                <?php else: ?>
                    <?php
                        $default_value = null;
                        $to = null;
                    ?>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo Form::label('to', __('crm::lang.to').':*'); ?>

                            <?php echo Form::select('to', ['customer' => __('lang_v1.customers'), 'lead' => __('crm::lang.leads'), 'transaction_activity' => __('crm::lang.transaction_activity'), 'contact' => __('contact.contact')], $to, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required', 'style' => 'width: 100%;']); ?>

                        </div>
                    </div>
                    <div class="col-md-8 customer_div" style="display: none;">
                        <div class="form-group">
                            <?php echo Form::label('contact_id', __('lang_v1.customers') .':*'); ?>

                            <button type="button" class="btn btn-primary btn-xs select-all">
                                <?php echo app('translator')->get('lang_v1.select_all'); ?>
                            </button>
                            <button type="button" class="btn btn-primary btn-xs deselect-all">
                                <?php echo app('translator')->get('lang_v1.deselect_all'); ?>
                            </button>
                            <?php echo Form::select('contact_id[]', $customers, null, ['class' => 'form-control select2', 'multiple', 'id' => 'contact_id', 'style' => 'width: 100%;']); ?>

                        </div>
                    </div>
                    <div class="col-md-8 lead_div" style="display: none;">
                        <div class="form-group">
                            <?php echo Form::label('lead_id', __('crm::lang.leads') .':*'); ?>

                            <button type="button" class="btn btn-primary btn-xs select-all">
                                <?php echo app('translator')->get('lang_v1.select_all'); ?>
                            </button>
                            <button type="button" class="btn btn-primary btn-xs deselect-all">
                                <?php echo app('translator')->get('lang_v1.deselect_all'); ?>
                            </button>
                            <?php echo Form::select('lead_id[]', $leads, null, ['class' => 'form-control select2', 'multiple', 'id' => 'lead_id', 'style' => 'width: 100%;']); ?>

                        </div>
                    </div>
                    <div class="col-md-8 contact_div" style="display: none;">
                        <div class="form-group">
                            <?php echo Form::label('contact', __('contact.contact') .':*'); ?>

                            <button type="button" class="btn btn-primary btn-xs select-all">
                                <?php echo app('translator')->get('lang_v1.select_all'); ?>
                            </button>
                            <button type="button" class="btn btn-primary btn-xs deselect-all">
                                <?php echo app('translator')->get('lang_v1.deselect_all'); ?>
                            </button>
                            <?php echo Form::select('contact[]', $contacts, $default_value, ['class' => 'form-control select2', 'multiple', 'id' => 'contact', 'style' => 'width: 100%;']); ?>

                        </div>
                    </div>
                    <div class="col-md-4 transaction_activity_div" style="display: none;">
                        <div class="form-group">
                            <?php echo Form::label('trans_activity', __('crm::lang.transaction_activity').':*'); ?>

                            <?php echo Form::select('trans_activity', ['has_transactions' => __('crm::lang.has_transactions'), 'has_no_transactions' => __('crm::lang.has_no_transactions')], null, ['class' => 'form-control select2', 'required', 'style' => 'width: 100%;']); ?>

                        </div>
                    </div>
                    <div class="col-md-4 transaction_activity_div" style="display: none;">
                        <div class="form-group">
                            <label for="in_days"><?php echo e(__('crm::lang.in_days'), false); ?>:*</label>
                            <div class="input-group">
                                <div class="input-group-addon"><?php echo e(__('crm::lang.in'), false); ?></div>
                                    <input type="text" class="form-control input_number" id="in_days" placeholder="0" name="in_days" required>
                                <div class="input-group-addon"><?php echo e(__('lang_v1.days'), false); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="row email_div">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo Form::label('subject', __('crm::lang.subject') . ':*' ); ?>

                            <?php echo Form::text('subject', null, ['class' => 'form-control', 'required' ]); ?>

                       </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo Form::label('email_body', __('crm::lang.email_body') . ':*'); ?>

                            <?php echo Form::textarea('email_body', null, ['class' => 'form-control ', 'id' => 'email_body', 'required']); ?>

                        </div>
                    </div>
                </div>
                <div class="row sms_div">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo Form::label('sms_body', __('crm::lang.sms_body') . ':'); ?>

                            <?php echo Form::textarea('sms_body', null, ['class' => 'form-control ', 'id' => 'sms_body', 'rows' => '6', 'required']); ?>

                        </div>
                    </div>
                </div>
                <strong><?php echo app('translator')->get('lang_v1.available_tags'); ?>:</strong>
                <p class="help-block">
                    <?php echo e(implode(', ', $tags), false); ?>

                </p>

                <button type="submit" class="btn btn-primary btn-sm pull-right submit-button draft m-5" name="send_notification" value="0" data-style="expand-right">
                    <span class="ladda-label">
                        <i class="fas fa-save"></i>
                        <?php echo app('translator')->get('sale.draft'); ?>
                    </span>
                </button>

                <button type="submit" class="btn btn-warning btn-sm pull-right submit-button notif m-5" name="send_notification" value="1" data-style="expand-right">
                    <span class="ladda-label">
                        <i class="fas fa-envelope-square"></i>
                        <?php echo app('translator')->get('crm::lang.send_notification'); ?>
                    </span>
                </button>

            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('modules/crm/js/crm.js?v=' . $asset_v), false); ?>"></script>
    <script type="text/javascript">
        $(function () {

            $('select#to').change(function() {
                toggleFieldBasedOnTo($(this).val());
            });

            function toggleFieldBasedOnTo (to) {
                if (to == 'customer') {
                    $('div.customer_div').show();
                    $('div.lead_div').hide();
                    $('div.transaction_activity_div').hide();
                    $('div.contact_div').hide();
                } else if (to == 'lead') {
                    $('div.lead_div').show();
                    $('div.customer_div').hide();
                    $('div.transaction_activity_div').hide();
                    $('div.contact_div').hide();
                } else if (to == 'transaction_activity') {
                    $('div.transaction_activity_div').show();
                    $('div.customer_div').hide();
                    $('div.lead_div').hide();
                    $('div.contact_div').hide();
                } else if (to == 'contact') {
                    $('div.contact_div').show();
                    $('div.transaction_activity_div').hide();
                    $('div.customer_div').hide();
                    $('div.lead_div').hide();
                } else {
                    $('div.transaction_activity_div, div.customer_div, div.lead_div, div.contact_div').hide();
                }
            }

            toggleFieldBasedOnTo($('select#to').val());
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Crm/Providers/../Resources/views/campaign/create.blade.php ENDPATH**/ ?>