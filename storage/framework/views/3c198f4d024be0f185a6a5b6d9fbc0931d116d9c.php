
<?php $__env->startSection('title', __( 'productcatalogue::lang.catalogue_qr' )); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get( 'productcatalogue::lang.catalogue_qr' ); ?></h1>
</section>
<section class="content">
    <div class="row">
            <div class="col-md-7">
	<?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
        
                <div class="form-group">
                    <?php echo Form::label('location_id', __('purchase.business_location').':'); ?>

                    <?php echo Form::select('location_id', $business_locations, null, ['class' => 'form-control', 'placeholder' => __('messages.please_select')]); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('color', __('productcatalogue::lang.qr_code_color').':'); ?>

                    <?php echo Form::text('color', '#000000', ['class' => 'form-control']); ?>

                </div>
                <br>
                <button type="button" class="btn btn-primary" id="generate_qr"><?php echo app('translator')->get( 'productcatalogue::lang.generate_qr' ); ?></button>
            
            
        
    <?php echo $__env->renderComponent(); ?>
</div>

<div class="col-md-5">
    <?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>

        <div class="text-center">
            <img src="#" id="qr_img" class="hide">
            <br><span id="catalogue_link"></span>
            <br>
            <a href="#" class="btn btn-success hide" id="download_image" target="_blank" download="QRCode.png"><?php echo app('translator')->get( 'productcatalogue::lang.download_image' ); ?></a>
        </div>
    <?php echo $__env->renderComponent(); ?>
</div>


</div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script src="<?php echo e(asset('modules/productcatalogue/plugins/qrcode/qrcode.js'), false); ?>"></script>
<script type="text/javascript">

    (function($) {
        "use strict";

    $(document).ready( function(){
        $('#color').colorpicker();
    });
    
    $(document).on('click', '#generate_qr', function(e){
        if ($('#location_id').val()) {
            var link = "<?php echo e(url('catalogue/' . session('business.id')), false); ?>/" + $('#location_id').val();
            var color = '#000000';
            if ($('#color').val().trim() != '') {
                color = $('#color').val();
            }
            var opts = {
                errorCorrectionLevel: 'H',
                margin: 4,
                width: 250,
                color: {
                    dark: color,
                    light: "#ffffffff"
                }
            }

            QRCode.toDataURL(link, opts, function (err, url){
                $('#qr_img').attr('src', url);
                $('#download_image').attr('href', url);
                $('#qr_img').removeClass('hide');
                $('#catalogue_link').html('<a target="_blank" href="'+ link +'">Link</a>');
                $('#download_image').removeClass('hide');
            })
            
        } else {
            alert("<?php echo e(__('productcatalogue::lang.select_business_location'), false); ?>")
        }
    });
    })(jQuery);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/ProductCatalogue/Providers/../Resources/views/catalogue/generate_qr.blade.php ENDPATH**/ ?>