<div class="modal-dialog" role="document">
    <div class="modal-content">
        <?php echo Form::open(['url' => action('\Modules\Repair\Http\Controllers\DeviceModelController@store'), 'method' => 'post', 'id' => 'device_model' ]); ?>

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">
                <?php echo app('translator')->get('repair::lang.add_device_model'); ?>
            </h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                   <div class="form-group">
                        <?php echo Form::label('name', __('repair::lang.model_name') . ':*' ); ?>

                        <?php echo Form::text('name', null, ['class' => 'form-control', 'required' ]); ?>

                   </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
                        <?php echo Form::label('brand_id', __('product.brand') .':'); ?>

                        <?php echo Form::select('brand_id', $brands, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'style' => 'width: 100%;', 'id' => 'model_brand_id']); ?>

                   </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                        <?php echo Form::label('device_id', __('repair::lang.device') .':'); ?>

                        <?php echo Form::select('device_id', $devices, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'style' => 'width: 100%;', 'id' => 'model_device_id']); ?>

                   </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <?php echo Form::label('repair_checklist', __('repair::lang.repair_checklist') . ':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('repair::lang.repair_checklist_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                        <?php echo Form::textarea('repair_checklist', 'الكاميرا ,البلوتوث, وايفاي ,البطارية ,الشاشة, تاتش ,الشحن,سوفت وير , بصمة ,الشبكة, بيت الخط بيت, الكرت المومري	', ['class' => 'form-control ', 'id' => 'repair_checklist', 'rows' => '3']); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
                <?php echo app('translator')->get('messages.close'); ?>
            </button>
            <button type="submit" class="btn btn-primary">
                <?php echo app('translator')->get('messages.save'); ?>
            </button>
        </div>
        <?php echo Form::close(); ?>

    </div>
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Repair/Providers/../Resources/views/device_model/create.blade.php ENDPATH**/ ?>