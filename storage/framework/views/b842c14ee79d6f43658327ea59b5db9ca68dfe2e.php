<?php $__env->startSection('title', __('lang_v1.import_sales')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('lang_v1.import_sales'); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <?php if(session('notification') || !empty($notification)): ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php if(!empty($notification['msg'])): ?>
                        <?php echo e($notification['msg'], false); ?>

                    <?php elseif(session('notification.msg')): ?>
                        <?php echo e(session('notification.msg'), false); ?>

                    <?php endif; ?>
                </div>
            </div>  
        </div>     
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget'); ?>
                <?php echo Form::open(['url' => action('ImportSalesController@preview'), 'method' => 'post', 'enctype' => 'multipart/form-data' ]); ?>

                    <div class="row">
                        <div class="col-sm-6">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <?php echo Form::label('name', __( 'product.file_to_import' ) . ':'); ?>

                                <?php echo Form::file('sales', ['required' => 'required']); ?>

                              </div>
                        </div>
                        <div class="col-sm-4">
                        <br>
                            <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('lang_v1.upload_and_review'); ?></button>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <br>
                            <a href="<?php echo e(asset('files/import_sales_template.xlsx'), false); ?>" class="btn btn-success" download><i class="fa fa-download"></i> <?php echo app('translator')->get('lang_v1.download_template_file'); ?></a>
                        </div>
                    </div>

                <?php echo Form::close(); ?>

            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['title' => __('lang_v1.instructions')]); ?>
            <table class="table table-condensed">
                <tr>
                    <td>1.</td>
                    <td><?php echo app('translator')->get('lang_v1.upload_data_in_excel_format'); ?></td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td><?php echo app('translator')->get('lang_v1.choose_location_and_group_by'); ?></td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td><?php echo app('translator')->get('lang_v1.map_columns_with_respective_sales_fields'); ?></td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>
                        <table class="table table-striped table-slim">
                            <tr>
                                <th><?php echo app('translator')->get('lang_v1.importable_fields'); ?></th>
                                <th><?php echo app('translator')->get('lang_v1.instructions'); ?></th>
                            </tr>
                            <?php $__currentLoopData = $import_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php echo e($value['label'], false); ?>

                                    </td>
                                    <td>
                                        <small><?php echo e($value['instruction'] ?? '', false); ?></small>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </td>
                </tr>
            </table>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['title' => __('lang_v1.imports')]); ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><?php echo app('translator')->get('lang_v1.import_batch'); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.import_time'); ?></th>
                        <th><?php echo app('translator')->get('business.created_by'); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.invoices'); ?></th>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sell.delete')): ?>
                            <th><?php echo app('translator')->get('messages.action'); ?></th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $imported_sales_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key, false); ?></td>
                            <td><?php echo e(\Carbon::createFromTimestamp(strtotime($value['import_time']))->format(session('business.date_format') . ' ' . 'H:i'), false); ?></td>
                            <td><?php echo e($value['created_by'], false); ?></td>
                            <td>
                                <?php echo e(implode(', ', $value['invoices']), false); ?> <br>
                                <p class="text-muted text-right">
                                <small>(<?php echo app('translator')->get('sale.total'); ?>: <?php echo e(count($value['invoices']), false); ?>)</small>
                                </p>
                            </td>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sell.delete')): ?>
                                <td><a href="<?php echo e(action('ImportSalesController@revertSaleImport', $key), false); ?>" class="btn btn-xs btn-danger revert_import"><i class="fas fa-undo"></i> <?php echo app('translator')->get('lang_v1.revert_import'); ?></a></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    $(document).on('click', 'a.revert_import', function(e){
        e.preventDefault();
        swal({
            title: LANG.sure,
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then(willDelete => {
            if (willDelete) {
                window.location = $(this).attr('href');
            } else {
                return false;
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/import_sales/index.blade.php ENDPATH**/ ?>