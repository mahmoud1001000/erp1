<?php $__env->startSection('title', __('messages.settings')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('messages.settings'); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <?php echo Form::open(['url' => action('\Modules\Manufacturing\Http\Controllers\SettingsController@store'), 'method' => 'post', 'id' => 'manufacturing_settings_form' ]); ?>

    <div class="row">
        <div class="col-xs-12">
           <!--  <pos-tab-container> -->
            <div class="col-xs-12 pos-tab-container">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pos-tab-menu">
                    <div class="list-group">
                        <a href="#" class="list-group-item text-center active"><?php echo app('translator')->get('messages.settings'); ?></a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 pos-tab">
                    <div class="pos-tab-content active">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo Form::label('ref_no_prefix', __('manufacturing::lang.mfg_ref_no_prefix') . ':' ); ?>

                                    <?php echo Form::text('ref_no_prefix', !empty($manufacturing_settings['ref_no_prefix']) ? $manufacturing_settings['ref_no_prefix'] : null, ['placeholder' => __('manufacturing::lang.mfg_ref_no_prefix'), 'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <br>
                                    <div class="checkbox">
                                        <label>
                                        <?php echo Form::checkbox('disable_editing_ingredient_qty', 1, !empty($manufacturing_settings['disable_editing_ingredient_qty']), ['class' => 'input-icheck', 'id' => 'disable_editing_ingredient_qty']); ?> <?php echo app('translator')->get('manufacturing::lang.disable_editing_ingredient_qty'); ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <br>
                                    <div class="checkbox">
                                        <label>
                                        <?php echo Form::checkbox('enable_updating_product_price', 1, !empty($manufacturing_settings['enable_updating_product_price']), ['class' => 'input-icheck', 'id' => 'enable_updating_product_price']); ?> <?php echo app('translator')->get('manufacturing::lang.enable_editing_product_price_after_production'); ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!--  </pos-tab-container> -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary pull-right"><?php echo app('translator')->get('messages.update'); ?></button>
        </div>
    </div>

    <div class="col-xs-12">
        <p class="help-block"><i><?php echo __('manufacturing::lang.version_info', ['version' => $version]); ?></i></p>
    </div>
    <?php echo Form::close(); ?>

</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    $(document).ready( function () {
        $(".file-input").fileinput(fileinput_setting);
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Manufacturing/Providers/../Resources/views/settings/index.blade.php ENDPATH**/ ?>