<?php $__env->startSection('title', __('superadmin::lang.superadmin') . ' | Business'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get( 'superadmin::lang.view_business' ); ?>
        <small> <?php echo e($business->name, false); ?></small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
        <div class="box-header">
                <h3 class="box-title">
                        <strong><i class="fa fa-briefcase margin-r-5"></i> 
                        <?php echo e($business->name, false); ?></strong>
                </h3>
        </div>

        <div class="box-body">
            <div class="row">
                    <div class="col-sm-3">
                        <div class="well well-sm">
                            <strong><i class="fa fa-briefcase margin-r-5"></i> 
                            <?php echo app('translator')->get('business.business_name'); ?></strong>
                            <p class="text-muted">
                                <?php echo e($business->name, false); ?>

                            </p>

                            <strong><i class="fa fa-money margin-r-5"></i> 
                            <?php echo app('translator')->get('business.currency'); ?></strong>
                            <p class="text-muted">
                                <?php echo e($business->currency->currency, false); ?>

                            </p>

                            <strong><i class="fa fa-file-text-o margin-r-5"></i> 
                            <?php echo app('translator')->get('business.tax_number1'); ?></strong>
                            <p class="text-muted">
                                <?php if(!empty($business->tax_number_1)): ?>
                                    <?php echo e($business->tax_label_1, false); ?>: <?php echo e($business->tax_number_1, false); ?>

                                <?php endif; ?>
                            </p>

                            <strong><i class="fa fa-file-text-o margin-r-5"></i> 
                            <?php echo app('translator')->get('business.tax_number2'); ?></strong>
                            <p class="text-muted">
                                <?php if(!empty($business->tax_number_2)): ?>
                                <?php echo e($business->tax_label_2, false); ?>: <?php echo e($business->tax_number_2, false); ?>

                                <?php endif; ?>
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="well well-sm">
                            <strong><i class="fa fa-location-arrow margin-r-5"></i> 
                            <?php echo app('translator')->get('business.time_zone'); ?></strong>
                            <p class="text-muted">
                            <?php echo e($business->time_zone, false); ?>

                            </p>

                            <strong><i class="fa fa-toggle-on margin-r-5"></i> 
                            <?php echo app('translator')->get('business.is_active'); ?></strong>
                            <?php if($business->is_active == 0): ?>
                                <p class="text-muted">
                                    Inactive
                                </p>
                            <?php else: ?>
                                <p class="text-muted">
                                    Active
                                </p>
                            <?php endif; ?>

                            <strong><i class="fa fa-user-circle-o margin-r-5"></i> 
                            <?php echo app('translator')->get('business.created_by'); ?></strong>
                            <?php if(!empty($created_by)): ?>
                            <p class="text-muted">
                                <?php if(!empty($created_by)): ?>
                            <?php echo e($created_by->surname, false); ?> <?php echo e($created_by->first_name, false); ?> <?php echo e($created_by->last_name, false); ?>

                             <?php endif; ?>
                            </p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="well well-sm">
                            <strong><i class="fa fa-user-circle-o margin-r-5"></i> 
                            <?php echo app('translator')->get('business.owner'); ?></strong>
                            <p class="text-muted">
                                <?php if(!empty($business->owner)): ?>
                            <?php echo e($business->owner->surname, false); ?> <?php echo e($business->owner->first_name, false); ?> <?php echo e($business->owner->last_name, false); ?>

                           <?php endif; ?>
                            </p>

                            <strong><i class="fa fa-envelope margin-r-5"></i> 
                            <?php echo app('translator')->get('business.email'); ?></strong>
                            <p class="text-muted">
                                <?php if(!empty($business->owner)): ?>
                            <?php echo e($business->owner->email, false); ?>

                                    <?php endif; ?>
                            </p>

                            <strong><i class="fa fa-address-book-o margin-r-5"></i> 
                            <?php echo app('translator')->get('business.mobile'); ?></strong>
                            <p class="text-muted">
                                <?php if(!empty($business->owner)): ?>
                            <?php echo e($business->owner->contact_no, false); ?>

                                    <?php endif; ?>
                            </p>

                            <strong><i class="fa fa-map-marker margin-r-5"></i> 
                            <?php echo app('translator')->get('business.address'); ?></strong>
                            <p class="text-muted">
                                <?php if(!empty($business->owner)): ?>
                            <?php echo e($business->owner->address, false); ?>

                                   <?php endif; ?>
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-3">
                            <div>
                                <?php if(!empty($business->logo)): ?>
                                    <img class="img-responsive" src="<?php echo e(url( 'uploads/business_logos/' . $business->logo ), false); ?>" alt="Business Logo">
                                <?php endif; ?>
                            </div>
                    </div> 
                </div> 
    </div>
    </div>

    <div class="box">
        <div class="box-header">
                <h3 class="box-title">
                    <strong><i class="fa fa-map-marker margin-r-5"></i> 
                    <?php echo app('translator')->get( 'superadmin::lang.business_location' ); ?></strong>
                </h3>
        </div>
        <div class="box-body">
                <div class="row">
                    <div class ="col-xs-12">
                    <!-- location table-->
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Location ID</th>
                                    <th>Landmark</th>
                                    <th>city</th>
                                    <th>Zip Code</th>
                                    <th>State</th>
                                    <th>Country</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $__currentLoopData = $business->locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                    <td><?php echo e($location->name, false); ?></td>
                                    <td><?php echo e($location->location_id, false); ?></td>
                                    <td><?php echo e($location->landmark, false); ?></td>
                                    <td><?php echo e($location->city, false); ?></td>
                                    <td><?php echo e($location->zip_code, false); ?></td>
                                    <td><?php echo e($location->state, false); ?></td>
                                    <td><?php echo e($location->country, false); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               
                                </tbody>
                            </table>
                    </div>
                </div>
        </div>
    </div>

    <div class="box">
        <div class="box-header">
                <h3 class="box-title">
                    <strong><i class="fa fa-refresh margin-r-5"></i> 
                    <?php echo app('translator')->get( 'superadmin::lang.package_subscription' ); ?></strong>
                </h3>
        </div>
        <div class="box-body">
                <div class="row">
                    <div class ="col-xs-12">
                    <!-- location table-->
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Package Name</th>
                                    <th>Start Date</th>
                                    <th>Trail End Date</th>
                                    <th>End Date</th>
                                    <th>Paid Via</th>
                                    <th>Payment Transaction ID</th>
                                    <th>Created At</th>
                                    <th>Created By</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $__currentLoopData = $business->subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                    <td><?php echo e($subscription->package_details['name'], false); ?></td>
                                    <td><?php if(!empty($subscription->start_date)): ?><?php echo e(\Carbon::createFromTimestamp(strtotime($subscription->start_date))->format(session('business.date_format')), false); ?><?php endif; ?></td>
                                    <td><?php if(!empty($subscription->trial_end_date)): ?><?php echo e(\Carbon::createFromTimestamp(strtotime($subscription->trial_end_date))->format(session('business.date_format')), false); ?><?php endif; ?></td>
                                    <td><?php if(!empty($subscription->end_date)): ?><?php echo e(\Carbon::createFromTimestamp(strtotime($subscription->end_date))->format(session('business.date_format')), false); ?><?php endif; ?></td>
                                    <td><?php echo e($subscription->paid_via, false); ?></td>
                                    <td><?php echo e($subscription->payment_transaction_id, false); ?></td>
                                    <td><?php echo e($subscription->created_at, false); ?></td>
                                    <td><?php if(!empty($subscription->created_user)): ?> <?php echo e($subscription->created_user->user_full_name, false); ?> <?php endif; ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               
                                </tbody>
                            </table>
                    </div>
                </div>
        </div>
    </div>

    <?php $__env->startComponent('components.widget', ['class' => 'box-default', 'title' => __( 'user.all_users' )]); ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.view')): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="users_table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get( 'business.username' ); ?></th>
                            <th><?php echo app('translator')->get( 'user.name' ); ?></th>
                            <th><?php echo app('translator')->get( 'user.role' ); ?></th>
                            <th><?php echo app('translator')->get( 'business.email' ); ?></th>
                            <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                        </tr>
                    </thead>
                </table>
            </div>
        <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>

<?php echo $__env->make('superadmin::business.update_password_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    //Roles table
    $(document).ready( function(){
        var users_table = $('#users_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/superadmin/users/' + "<?php echo e($business->id, false); ?>",
            columnDefs: [ {
                "targets": [4],
                "orderable": false,
                "searchable": false
            } ],
            "columns":[
                {"data":"username"},
                {"data":"full_name"},
                {"data":"role"},
                {"data":"email"},
                {"data":"action"}
            ]
        });
        
    });

    $(document).on('click', '.update_user_password', function (e) {
        e.preventDefault();
        $('form#password_update_form, #user_id').val($(this).data('user_id'));
        $('span#user_name').text($(this).data('user_name'));
        $('#update_password_modal').modal('show');
    });

    password_update_form_validator = $('form#password_update_form').validate();

    $('#update_password_modal').on('hidden.bs.modal', function() {
        password_update_form_validator.resetForm();
        $('form#password_update_form')[0].reset();
    });

    $(document).on('submit', 'form#password_update_form', function(e) {
        e.preventDefault();
        $(this)
            .find('button[type="submit"]')
            .attr('disabled', true);
        var data = $(this).serialize();
        $.ajax({
            method: 'post',
            url: $(this).attr('action'),
            dataType: 'json',
            data: data,
            success: function(result) {
                if (result.success == true) {
                    $('#update_password_modal').modal('hide');
                    toastr.success(result.msg);
                } else {
                    toastr.error(result.msg);
                }
                $('form#password_update_form')
                .find('button[type="submit"]')
                .attr('disabled', false);
            },
        });
    });

</script>      
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u373816316/domains/erp4anyone.com/public_html/4any/Modules/Superadmin/Providers/../Resources/views/business/show.blade.php ENDPATH**/ ?>