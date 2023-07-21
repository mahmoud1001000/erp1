<?php $__env->startSection('title', __('repair::lang.add_job_sheet')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('repair::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Content Header (Page header) -->
<section class="content-header no-print">
    <h1>
    	<?php echo app('translator')->get('repair::lang.job_sheet'); ?>
        <small><?php echo app('translator')->get('repair::lang.create'); ?></small>
    </h1>
</section>
<section class="content">
    <?php if(!empty($repair_settings)): ?>
        <?php
            $product_conf = isset($repair_settings['product_configuration']) ? explode(',', $repair_settings['product_configuration']) : [];

            $defects = isset($repair_settings['problem_reported_by_customer']) ? explode(',', $repair_settings['problem_reported_by_customer']) : [];

            $product_cond = isset($repair_settings['product_condition']) ? explode(',', $repair_settings['product_condition']) : [];
        ?>
    <?php else: ?>
        <?php
            $product_conf = [];
            $defects = [];
            $product_cond = [];
        ?>
    <?php endif; ?>
    <?php echo Form::open(['action' => '\Modules\Repair\Http\Controllers\JobSheetController@store', 'id' => 'job_sheet_form', 'method' => 'post', 'files' => true]); ?>

        <?php if ($__env->exists('repair::job_sheet.partials.scurity_modal')) echo $__env->make('repair::job_sheet.partials.scurity_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <?php if(count($business_locations) == 1): ?>
                        <?php 
                            $default_location = current(array_keys($business_locations->toArray()));
                        ?>
                    <?php else: ?>
                        <?php $default_location = null;
                        ?>
                    <?php endif; ?>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('location_id', __('business.business_location') . ':*' ); ?>

                            <?php echo Form::select('location_id', $business_locations, $default_location, ['class' => 'form-control', 'placeholder' => __('messages.please_select'), 'required', 'style' => 'width: 100%;']); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo Form::label('contact_id', __('role.customer') .':*'); ?>

                            <div class="input-group">
                                <input type="hidden" id="default_customer_id" value="<?php echo e($walk_in_customer['id'] ?? '', false); ?>" >
                                <input type="hidden" id="default_customer_name" value="<?php echo e($walk_in_customer['name'] ?? '', false); ?>" >
                                <input type="hidden" id="default_customer_balance" value="<?php echo e($walk_in_customer['balance'] ?? '', false); ?>" >

                                <?php echo Form::select('contact_id', 
                                    [], null, ['class' => 'form-control mousetrap', 'id' => 'customer_id', 'placeholder' => 'Enter Customer name / phone', 'required', 'style' => 'width: 100%;']); ?>

                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default bg-white btn-flat add_new_customer" data-name=""  <?php if(!auth()->user()->can('customer.create')): ?> disabled <?php endif; ?>><i class="fa fa-plus-circle text-primary fa-lg"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <?php echo Form::label('service_type',  __('repair::lang.service_type').':*', ['style' => 'margin-left:20px;']); ?>

                        <br>
                        <label class="radio-inline">
                            <?php echo Form::radio('service_type', 'carry_in', true, [ 'class' => 'input-icheck', 'required']); ?>

                            <?php echo app('translator')->get('repair::lang.carry_in'); ?>
                        </label>
                        <label class="radio-inline">
                            <?php echo Form::radio('service_type', 'pick_up', false, [ 'class' => 'input-icheck']); ?>

                            <?php echo app('translator')->get('repair::lang.pick_up'); ?>
                        </label>
                        <label class="radio-inline radio_btns">
                            <?php echo Form::radio('service_type', 'on_site', false, [ 'class' => 'input-icheck']); ?>

                            <?php echo app('translator')->get('repair::lang.on_site'); ?>
                        </label>
                    </div>
                </div>
                <div class="row pick_up_onsite_addr" style="display: none;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo Form::label('pick_up_on_site_addr', __('repair::lang.pick_up_on_site_addr') . ':'); ?>

                            <?php echo Form::textarea('pick_up_on_site_addr',null, ['class' => 'form-control ', 'id' => 'pick_up_on_site_addr', 'placeholder' => __('repair::lang.pick_up_on_site_addr'), 'rows' => 3]); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?php echo Form::label('brand_id', __('product.brand') . ':'); ?>

                            <?php echo Form::select('brand_id', $brands, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select')]); ?>

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?php echo Form::label('device_id', __('repair::lang.device') . ':'); ?>

                            <?php echo Form::select('device_id', $devices, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select')]); ?>

                        </div>
                    </div>
                    <div class="col-sm-4">
                         <a class="btn btn-sm btn-primary pull-right" data-href="<?php echo e(action('\Modules\Repair\Http\Controllers\DeviceModelController@create'), false); ?>" id="add_device_model">
                        	<i class="fa fa-plus"></i>
                        	<?php echo app('translator')->get('messages.add'); ?>
                        </a>
                        <div class="form-group">
                            <?php echo Form::label('device_model_id', __('repair::lang.device_model') . ':'); ?>

                            <?php echo Form::select('device_model_id', $device_models, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select')]); ?>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h5 class="box-title">
                                    <?php echo app('translator')->get('repair::lang.pre_repair_checklist'); ?>:
                                    <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('repair::lang.prechecklist_help_text') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                                    <small>
                                        <?php echo app('translator')->get('repair::lang.not_applicable_key'); ?> = <?php echo app('translator')->get('repair::lang.not_applicable'); ?>
                                    </small>
                                </h5>
                            </div>
                            <div class="box-body">
                                <div class="append_checklists"></div>  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?php echo Form::label('serial_no', __('repair::lang.serial_no') . ':*'); ?>

                            <?php echo Form::text('serial_no', null, ['class' => 'form-control', 'placeholder' => __('repair::lang.serial_no'), 'required']); ?>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                           <?php echo Form::label('security_pwd', __('repair::lang.repair_passcode') . ':'); ?>

                            <div class="input-group">
                                <?php echo Form::text('security_pwd', null, ['class' => 'form-control', 'placeholder' => __('lang_v1.password')]); ?>

                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#security_pattern">
                                        <i class="fas fa-lock"></i> <?php echo app('translator')->get('repair::lang.pattern_lock'); ?>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo Form::label('product_configuration', __('repair::lang.product_configuration') . ':'); ?> <br>
                           <?php echo Form::textarea('product_configuration', null, ['class' => 'tags-look', 'rows' => 3]); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo Form::label('defects', __('repair::lang.problem_reported_by_customer') . ':'); ?> <br>
                            <?php echo Form::textarea('defects', null, ['class' => 'tags-look', 'rows' => 3]); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo Form::label('product_condition', __('repair::lang.condition_of_product') . ':'); ?> <br>
                            <?php echo Form::textarea('product_condition', null, ['class' => 'tags-look', 'rows' => 3]); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <?php if(in_array('service_staff' ,$enabled_modules)): ?>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?php echo Form::label('service_staff', __('repair::lang.assign_service_staff') . ':'); ?>

                                <?php echo Form::select('service_staff', $technecians, null, ['class' => 'form-control select2', 'placeholder' => __('restaurant.select_service_staff')]); ?>

                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo Form::label('comment_by_ss', __('repair::lang.comment_by_ss') . ':'); ?>

                            <?php echo Form::textarea('comment_by_ss', null, ['class' => 'form-control ', 'rows' => '3']); ?>

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?php echo Form::label('estimated_cost', __('repair::lang.estimated_cost') . ':'); ?>

                            <?php echo Form::text('estimated_cost', null, ['class' => 'form-control input_number', 'placeholder' => __('repair::lang.estimated_cost')]); ?>

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="status_id"><?php echo e(__('sale.status') . ':*', false); ?></label>
                            <select name="status_id" class="form-control status" id="status_id" required>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo Form::label('delivery_date', __('repair::lang.expected_delivery_date') . ':'); ?>

                            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('repair::lang.delivery_date_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <?php echo Form::text('delivery_date', null, ['class' => 'form-control', 'readonly']); ?>

                                <span class="input-group-addon">
                                    <i class="fas fa-times-circle cursor-pointer clear_delivery_date"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?php echo Form::label('images', __('lang_v1.image') . ':'); ?>

                            <?php echo Form::file('images[]', ['id' => 'upload_job_sheet_image', 'accept' => 'image/*', 'multiple']); ?>

                            <small>
                                <p class="help-block">
                                    <?php echo app('translator')->get('purchase.max_file_size', ['size' => (config('constants.document_size_limit') / 1000000)]); ?>
                                </p>
                            </small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><?php echo app('translator')->get('repair::lang.send_notification'); ?></label><br>
                            <div class="checkbox-inline">
                                <label class="cursor-pointer">
                                    <input type="checkbox" name="send_notification[]" value="sms">
                                    <?php echo app('translator')->get('repair::lang.sms'); ?>
                                </label>
                            </div>
                            <div class="checkbox-inline">
                                <label class="cursor-pointer">
                                    <input type="checkbox" name="send_notification[]" value="email">
                                    <?php echo app('translator')->get('business.email'); ?>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right">
                    <?php echo app('translator')->get('messages.save'); ?>
                </button>
            </div>
        </div>
    <?php echo Form::close(); ?> <!-- /form close -->
    <div class="modal fade contact_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        <?php echo $__env->make('contact.create', ['quick_add' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="modal fade" id="device_model_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
<script>
    $(document).on('click', '#add_device_model', function () {
            var url = $(this).data('href');
            $.ajax({
                method: 'GET',
                url: url,
                dataType: 'html',
                success: function(result) {
                    $('#device_model_modal').html(result).modal('show');
                    debugger;
                }
            });
        });
</script>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <?php echo $__env->make('repair::job_sheet.tagify_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/pos.js?v=' . $asset_v), false); ?>"></script>
    <script type="text/javascript">
        $(document).ready( function() {

            $('form#job_sheet_form').validate({
                errorPlacement: function(error, element) {
                    if (element.parent('.iradio_square-blue').length) {
                        error.insertAfter($(".radio_btns"));
                    } else if (element.hasClass('status')) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });

            var data = [{
              id: "",
              text: '<?php echo app('translator')->get("messages.please_select"); ?>',
              html: '<?php echo app('translator')->get("messages.please_select"); ?>',
            }, 
            <?php $__currentLoopData = $repair_statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $repair_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                {
                id: <?php echo e($repair_status->id, false); ?>,
                <?php if(!empty($repair_status->color)): ?>
                    text: '<i class="fa fa-circle" aria-hidden="true" style="color: <?php echo e($repair_status->color, false); ?>;"></i> <?php echo e($repair_status->name, false); ?>',
                    title: '<?php echo e($repair_status->name, false); ?>'
                <?php else: ?>
                    text: "<?php echo e($repair_status->name, false); ?>"
                <?php endif; ?>
                },
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ];

            $("select#status_id").select2({
              data: data,
              escapeMarkup: function(markup) {
                return markup;
              }
            });

            <?php if(!empty($default_status)): ?>
                $("select#status_id").val(<?php echo e($default_status, false); ?>).change();
            <?php endif; ?>

            $('#delivery_date').datetimepicker({
                format: moment_date_format + ' ' + moment_time_format,
                ignoreReadonly: true,
            });

            $(document).on('click', '.clear_delivery_date', function() {
                $('#delivery_date').data("DateTimePicker").clear();
            });

            var lock = new PatternLock("#pattern_container", {
                onDraw:function(pattern){
                    $('input#security_pattern').val(pattern);
                },
                enableSetPattern: true
            });

            //filter device model id based on brand & device
            $(document).on('change', '#brand_id', function() {
                getModelForDevice();
                getModelRepairChecklists();
            });

            // get models for particular device
            $(document).on('change', '#device_id', function() {
                getModelForDevice();
            });
            
            $(document).on('change', '#device_model_id', function() {
                getModelRepairChecklists();
            });
            
            function getModelForDevice() {
                var data = {
                    device_id : $("#device_id").val(),
                    brand_id: $("#brand_id").val()
                };

                $.ajax({
                    method: 'GET',
                    url: '/repair/get-device-models',
                    dataType: 'html',
                    data: data,
                    success: function(result) {
                        $('select#device_model_id').html(result);
                    }
                });
            }

            function getModelRepairChecklists() {
                console.log('here');
                var data = {
                        model_id : $("#device_model_id").val(),
                    };
                $.ajax({
                    method: 'GET',
                    url: '/repair/models-repair-checklist',
                    dataType: 'html',
                    data: data,
                    success: function(result) {
                        $(".append_checklists").html(result);
                    }
                });
            }

            $('input[type=radio][name=service_type]').on('ifChecked', function(){
              if ($(this).val() == 'pick_up' || $(this).val() == 'on_site') {
                $("div.pick_up_onsite_addr").show();
              } else {
                $("div.pick_up_onsite_addr").hide();
              }
            });

            //initialize file input
            $('#upload_job_sheet_image').fileinput({
                showUpload: false,
                showPreview: false,
                browseLabel: LANG.file_browse_label,
                removeLabel: LANG.remove,
                maxFileCount: 2
            });

            //initialize tags input (tagify)
            var product_configuration = document.querySelector('textarea#product_configuration');
            tagify_pc = new Tagify(product_configuration, {
              whitelist: <?php echo json_encode($product_conf); ?>,
              maxTags: 100,
              dropdown: {
                maxItems: 100,           // <- mixumum allowed rendered suggestions
                classname: "tags-look", // <- custom classname for this dropdown, so it could be targeted
                enabled: 0,             // <- show suggestions on focus
                closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
              }
            });

            var product_defects = document.querySelector('textarea#defects');
            tagify_pd = new Tagify(product_defects, {
              whitelist: <?php echo json_encode($defects); ?>,
              maxTags: 100,
              dropdown: {
                maxItems: 100,           // <- mixumum allowed rendered suggestions
                classname: "tags-look", // <- custom classname for this dropdown, so it could be targeted
                enabled: 0,             // <- show suggestions on focus
                closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
              }
            });

            var product_condition = document.querySelector('textarea#product_condition');
            tagify_p_condition = new Tagify(product_condition, {
              whitelist: <?php echo json_encode($product_cond); ?>,
              maxTags: 100,
              dropdown: {
                maxItems: 100,           // <- mixumum allowed rendered suggestions
                classname: "tags-look", // <- custom classname for this dropdown, so it could be targeted
                enabled: 0,             // <- show suggestions on focus
                closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
              }
            });
        });
         $(document).on('submit', 'form#device_model', function(e){
            e.preventDefault();
            var url = $('form#device_model').attr('action');
            var method = $('form#device_model').attr('method');
            var data = $('form#device_model').serialize();
            $.ajax({
                method: method,
                dataType: "json",
                url: url,
                data:data,
                success: function(result){
                    if (result.success) {
                        $('#device_model_modal').modal("hide");
                        toastr.success(result.msg);
                       // model_datatable.ajax.reload();
                        location.reload();


                    } else {
                        toastr.error(result.msg);
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Repair/Providers/../Resources/views/job_sheet/create.blade.php ENDPATH**/ ?>