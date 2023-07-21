<?php $__env->startSection('title', __('repair::lang.job_sheets')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('repair::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Content Header (Page header) -->
<section class="content-header no-print">
    <h1>
    	<?php echo app('translator')->get('repair::lang.job_sheets'); ?>
    </h1>
</section>
<!-- Main content -->
<section class="content no-print">
    <?php $__env->startComponent('components.filters', ['title' => __('report.filters'), 'closed' => false]); ?>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('location_id',  __('purchase.business_location') . ':'); ?>

                <?php echo Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('contact_id',  __('role.customer') . ':'); ?>

                <?php echo Form::select('contact_id', $customers, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
        <?php if(in_array('service_staff' ,$enabled_modules) && !$is_user_service_staff): ?>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('technician',  __('repair::lang.technician') . ':'); ?>

                    <?php echo Form::select('technician', $service_staffs, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

                </div>
            </div>
        <?php endif; ?>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('status_id',  __('sale.status') . ':'); ?>

                <?php echo Form::select('status_id', $status_dropdown['statuses'], null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
    <?php echo $__env->renderComponent(); ?>
	<div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#pending_job_sheet_tab" data-toggle="tab" aria-expanded="true">
                            <i class="fas fa-exclamation-circle text-orange"></i>
                            <?php echo app('translator')->get('repair::lang.pending'); ?>
                            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('repair::lang.common_pending_status_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                        </a>
                    </li>
                    <li>
                        <a href="#completed_job_sheet_tab" data-toggle="tab" aria-expanded="true">
                            <i class="fa fas fa-check-circle text-success"></i>
                            <?php echo app('translator')->get('repair::lang.completed'); ?>
                            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('repair::lang.common_completed_status_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="pending_job_sheet_tab">
                        <div class="row">
                            <div class="col-md-12 mb-12">
                                <a type="button" class="btn btn-sm btn-primary pull-right m-5" href="<?php echo e(action('\Modules\Repair\Http\Controllers\JobSheetController@create'), false); ?>" id="add_job_sheet">
                                    <i class="fa fa-plus"></i> <?php echo app('translator')->get('messages.add'); ?>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="pending_job_sheets_table">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('messages.action'); ?></th>
                                         <th>
                                            <?php echo app('translator')->get('role.customer'); ?>
                                        </th>
                                        <th>
                                            <?php echo app('translator')->get('repair::lang.expected_delivery_date'); ?>
                                        </th>
                                        <th><?php echo app('translator')->get('sale.invoice_no'); ?></th>
                                        
                                        <th><?php echo app('translator')->get('sale.status'); ?></th>
                                        <th><?php echo app('translator')->get('repair::lang.estimated_cost'); ?></th>
                                        <th>
                                            <?php echo app('translator')->get('repair::lang.job_sheet_no'); ?>
                                        </th>
                                         <th><?php echo app('translator')->get('sale.total_amount'); ?></th>
                                        <th><?php echo app('translator')->get('sale.total_paid'); ?></th>
                                        <th>المتبقي</th>
                                        <th><?php echo app('translator')->get('repair::lang.device_model'); ?></th>
                                        <th><?php echo app('translator')->get('repair::lang.device'); ?></th>
                                        <th><?php echo app('translator')->get('product.brand'); ?></th>
                                        <th><?php echo app('translator')->get('repair::lang.serial_no'); ?></th>
                                        <!------------------------------------>
                                        
                                        <?php if(in_array('service_staff' ,$enabled_modules)): ?>
                                            <th><?php echo app('translator')->get('repair::lang.technician'); ?></th>
                                        <?php endif; ?>
                                        <th><?php echo app('translator')->get('business.location'); ?></th>
                                        <th><?php echo app('translator')->get('lang_v1.added_by'); ?></th>
                                        <th><?php echo app('translator')->get('lang_v1.created_at'); ?></th>
                                        <th>
                                            <?php echo app('translator')->get('repair::lang.service_type'); ?>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="completed_job_sheet_tab">
                        <div class="row">
                            <div class="col-md-12 mb-12">
                               <a type="button" class="btn btn-sm btn-primary pull-right m-5" href="<?php echo e(action('\Modules\Repair\Http\Controllers\JobSheetController@create'), false); ?>" id="add_job_sheet">
                                    <i class="fa fa-plus"></i> <?php echo app('translator')->get('messages.add'); ?>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="completed_job_sheets_table">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('messages.action'); ?></th>
                                         <th>
                                            <?php echo app('translator')->get('role.customer'); ?>
                                        </th>
                                        <th>
                                            <?php echo app('translator')->get('repair::lang.expected_delivery_date'); ?>
                                        </th>
                                        <th><?php echo app('translator')->get('sale.invoice_no'); ?></th>
                                        
                                        <th><?php echo app('translator')->get('sale.status'); ?></th>
                                        <th><?php echo app('translator')->get('repair::lang.estimated_cost'); ?></th>
                                        <th>
                                            <?php echo app('translator')->get('repair::lang.job_sheet_no'); ?>
                                        </th>
                                         <th><?php echo app('translator')->get('sale.total_amount'); ?></th>
                                        <th><?php echo app('translator')->get('sale.total_paid'); ?></th>
                                        <th>المتبقي</th>
                                        <th><?php echo app('translator')->get('repair::lang.device_model'); ?></th>
                                        <th><?php echo app('translator')->get('repair::lang.device'); ?></th>
                                        <th><?php echo app('translator')->get('product.brand'); ?></th>
                                        <th><?php echo app('translator')->get('repair::lang.serial_no'); ?></th>
                                        <!------------------------------------>
                                        
                                        <?php if(in_array('service_staff' ,$enabled_modules)): ?>
                                            <th><?php echo app('translator')->get('repair::lang.technician'); ?></th>
                                        <?php endif; ?>
                                        <th><?php echo app('translator')->get('business.location'); ?></th>
                                        <th><?php echo app('translator')->get('lang_v1.added_by'); ?></th>
                                        <th><?php echo app('translator')->get('lang_v1.created_at'); ?></th>
                                        <th>
                                            <?php echo app('translator')->get('repair::lang.service_type'); ?>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="status_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel"></div>
</section>
<div class="modal fade payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            pending_job_sheets_datatable = $("#pending_job_sheets_table").DataTable({
                    processing: true,
                    serverSide: true,
                    ajax:{
                        url: '/repair/job-sheet',
                        "data": function ( d ) {
                            d.location_id = $('#location_id').val();
                            d.contact_id = $('#contact_id').val();
                            d.status_id = $('#status_id').val();
                            d.is_completed_status = 0;
                            <?php if(in_array('service_staff' ,$enabled_modules)): ?>
                                d.technician = $('#technician').val();
                            <?php endif; ?>
                        }
                    },
                    columnDefs: [{
                        targets: [0, 4],
                        orderable: false,
                        searchable: false
                    }],
                    aaSorting:[[2, 'asc']],
                    columns:[
                        { data: 'action', name: 'action' },
                         { data: 'customer', name : 'contacts.name', searchable: false},
                         {
                            data: 'delivery_date', name: 'delivery_date'
                        },
                         {
                            data: 'repair_no', name: 'repair_no'
                        },
                        
                         { data:'status', name: 'rs.name' },
                         {
                            data: 'estimated_cost', name: 'estimated_cost'
                        },
                        {
                            data: 'job_sheet_no', name: 'job_sheet_no'
                            
                        },
                         {
                            data: 'final_total', name: 'final_total'
                        },
                        {
                            data: 'total_paid', name: 'total_paid'
                        },
                        {
                            data: 'total_due', name: 'total_due'
                        },
                        { data: 'device_model', name: 'rdm.name' },
                        { data: 'device', name: 'device.name' },
                        { data: 'brand', name: 'b.name' },
                        {
                            data: 'serial_no', name: 'serial_no'
                        },                   
                                               ////===================
                        
                      
                       
                       
                        <?php if(in_array('service_staff' ,$enabled_modules)): ?>
                            { data: 'technecian', name: 'technecian', searchable: false},
                        <?php endif; ?>
                        
                        { data: 'location', name: 'bl.name' },

                       
                        
                        { data: 'added_by', name: 'added_by', searchable: false},
                        { data: 'created_at',
                            name: 'repair_job_sheets.created_at'
                        },
                        { data: 'service_type', name: 'service_type'}
                    ],
                    "fnDrawCallback": function (oSettings) {
                        __currency_convert_recursively($('#pending_job_sheets_table'));
                    }
            });

            completed_job_sheets_datatable = $("#completed_job_sheets_table").DataTable({
                    processing: true,
                    serverSide: true,
                    ajax:{
                        url: '/repair/job-sheet',
                        "data": function ( d ) {
                            d.location_id = $('#location_id').val();
                            d.contact_id = $('#contact_id').val();
                            d.status_id = $('#status_id').val();
                            d.is_completed_status = 1;
                            <?php if(in_array('service_staff' ,$enabled_modules)): ?>
                                d.technician = $('#technician').val();
                            <?php endif; ?>
                        }
                    },
                    columnDefs: [{
                        targets: [0, 4],
                        orderable: false,
                        searchable: false
                    }],
                    aaSorting:[[2, 'asc']],
                    columns:[
                        { data: 'action', name: 'action' },
                         { data: 'customer', name : 'contacts.name', searchable: false},
                         {
                            data: 'delivery_date', name: 'delivery_date'
                        },
                         {
                            data: 'repair_no', name: 'repair_no'
                        },
                        
                         { data:'status', name: 'rs.name' },
                         {
                            data: 'estimated_cost', name: 'estimated_cost'
                        },
                        {
                            data: 'job_sheet_no', name: 'job_sheet_no'
                            
                        },
                         {
                            data: 'final_total', name: 'final_total'
                        },
                        {
                            data: 'total_paid', name: 'total_paid'
                        },
                        {
                            data: 'total_due', name: 'total_due'
                        },
                        { data: 'device_model', name: 'rdm.name' },
                        { data: 'device', name: 'device.name' },
                        { data: 'brand', name: 'b.name' },
                        {
                            data: 'serial_no', name: 'serial_no'
                        },                   
                                               ////===================
                        
                      
                       
                       
                        <?php if(in_array('service_staff' ,$enabled_modules)): ?>
                            { data: 'technecian', name: 'technecian', searchable: false},
                        <?php endif; ?>
                        
                        { data: 'location', name: 'bl.name' },

                       
                        
                        { data: 'added_by', name: 'added_by', searchable: false},
                        { data: 'created_at',
                            name: 'repair_job_sheets.created_at'
                        },
                        { data: 'service_type', name: 'service_type'}

                    ],
                    "fnDrawCallback": function (oSettings) {
                        __currency_convert_recursively($('#completed_job_sheets_table'));
                    }
            });

            $(document).on('click', '#delete_job_sheet', function (e) {
                e.preventDefault();
                var url = $(this).data('href');
                swal({
                    title: LANG.sure,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((confirmed) => {
                    if (confirmed) {
                        $.ajax({
                            method: 'DELETE',
                            url: url,
                            dataType: 'json',
                            success: function(result) {
                                if (result.success) {
                                    toastr.success(result.msg);
                                    pending_job_sheets_datatable.ajax.reload();
                                    completed_job_sheets_datatable.ajax.reload();
                                } else {
                                    toastr.error(result.msg);
                                }
                            }
                        });
                    }
                });
            });

            <?php if(auth()->user()->can('job_sheet.create') || auth()->user()->can('job_sheet.edit')): ?>
                $(document).on('click', '.edit_job_sheet_status', function () {
                    var url = $(this).data('href');
                    $.ajax({
                        method: 'GET',
                        url: url,
                        dataType: 'html',
                        success: function(result) {
                            $('#status_modal').html(result).modal('show');
                        }
                    });
                });
            <?php endif; ?>

            $('#status_modal').on('shown.bs.modal', function (e) {

                //initialize editor
                tinymce.init({
                    selector: 'textarea#email_body',
                });

                $('#send_sms').change(function() {
                    if ($(this). is(":checked")) {
                        $('div.sms_body').fadeIn();
                    } else {
                        $('div.sms_body').fadeOut();
                    }
                });

                $('#send_email').change(function() {
                    if ($(this). is(":checked")) {
                        $('div.email_template').fadeIn();
                    } else {
                        $('div.email_template').fadeOut();
                    }
                });

                if ($('#status_id_modal').length) {
                    ;
                    $("#sms_body").val($("#status_id_modal :selected").data('sms_template'));
                    $("#email_subject").val($("#status_id_modal :selected").data('email_subject'));
                    tinymce.activeEditor.setContent($("#status_id_modal :selected").data('email_body'));  
                }

                $('#status_id_modal').on('change', function() {
                    var sms_template = $(this).find(':selected').data('sms_template');
                    var email_subject = $(this).find(':selected').data('email_subject');
                    var email_body = $(this).find(':selected').data('email_body');

                    $("#sms_body").val(sms_template);
                    $("#email_subject").val(email_subject);
                    tinymce.activeEditor.setContent(email_body);
                });
            });
            
            $('#status_modal').on('hidden.bs.modal', function(){
                tinymce.remove("textarea#email_body");
            });
            
            $(document).on('submit', 'form#update_status_form', function(e){
                e.preventDefault();
                var data = $(this).serialize();
                var ladda = Ladda.create(document.querySelector('.ladda-button'));
                ladda.start();
                $.ajax({
                    method: $(this).attr("method"),
                    url: $(this).attr("action"),
                    dataType: "json",
                    data: data,
                    success: function(result){
                        ladda.stop();
                        if(result.success == true){
                            $('#status_modal').modal('hide');
                            toastr.success(result.msg);
                            pending_job_sheets_datatable.ajax.reload();
                            completed_job_sheets_datatable.ajax.reload();
                        } else {
                            toastr.error(result.msg);
                        }
                    }
                });
            });

            $(document).on('change', '#location_id, #contact_id, #status_id, #technician',  function() {
                pending_job_sheets_datatable.ajax.reload();
                completed_job_sheets_datatable.ajax.reload();
            });
        });
    </script>
    <script src="<?php echo e(asset('js/payment.js?v=' . $asset_v), false); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Repair/Providers/../Resources/views/job_sheet/index.blade.php ENDPATH**/ ?>