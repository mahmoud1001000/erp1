<?php $__env->startSection('title', __('invoice.invoice_settings')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get( 'invoice.invoice_settings' ); ?>
        <small><?php echo app('translator')->get( 'invoice.manage_your_invoices' ); ?></small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true"><?php echo app('translator')->get('invoice.invoice_schemes'); ?></a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false"><?php echo app('translator')->get('invoice.invoice_layouts'); ?></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="row">
                    <div class="col-md-12">
                        <h4><?php echo app('translator')->get( 'invoice.all_your_invoice_schemes' ); ?> <button type="button" class="btn btn-primary btn-modal pull-right" 
                                data-href="<?php echo e(action('InvoiceSchemeController@create'), false); ?>" 
                                data-container=".invoice_modal">
                                <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></button></h4>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="invoice_table">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get( 'invoice.name' ); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.invoice_scheme_name') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                                    <th><?php echo app('translator')->get( 'invoice.prefix' ); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.invoice_scheme_prefix') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                                    <th><?php echo app('translator')->get( 'invoice.start_number' ); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.invoice_scheme_start_number') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                                    <th><?php echo app('translator')->get( 'invoice.invoice_count' ); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.invoice_scheme_count') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                                    <th><?php echo app('translator')->get( 'invoice.total_digits' ); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.invoice_scheme_total_digits') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                                    <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                                </tr>
                            </thead>
                        </table>
                        </div>
                    </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div class="row">
                    <div class="col-md-12">
                        <h4><?php echo app('translator')->get( 'invoice.all_your_invoice_layouts' ); ?> <a class="btn btn-primary pull-right" href="<?php echo e(action('InvoiceLayoutController@create'), false); ?>">
                                <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></a></h4>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-hover ">
                            <thead>
                            <tr class="bg-green" >
                                <td>إسم التصميم</td>
                                <td><?php echo app('translator')->get('invoice.used_in_locations'); ?></td>
                                <td><?php echo app('translator')->get('lang_v1.design'); ?></td>
                                <td></td>
                            </tr>
                            </thead>
                        <tbody>
                        <?php $__currentLoopData = $invoice_layouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>  <?php echo e($layout->name, false); ?></td>
                            <td>
                                <?php if($layout->locations->count()): ?>
                                    <span class="link-des">
                                      <?php $__currentLoopData = $layout->locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($location->name, false); ?>

                                            <?php if(!$loop->last): ?>
                                                ,
                                            <?php endif; ?>
                                            &nbsp;
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo app('translator')->get("lang_v1.".$layout->design); ?>
                            </td>
                            <td>
                                <a href="<?php echo e(action('InvoiceLayoutController@edit', [$layout->id]), false); ?>" class="btn btn-xs btn-primary">
                                    <i class="glyphicon glyphicon-edit"></i> تعديل </a>

                                <?php if( !$layout->locations->count() || !$layout->is_default ): ?>
                                <button class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i>حذف  </button>
                                    <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        </table>

                    </div>
                </div>
                <br>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
    </div>
	
    <div class="modal fade invoice_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade invoice_edit_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/invoice_scheme/index.blade.php ENDPATH**/ ?>