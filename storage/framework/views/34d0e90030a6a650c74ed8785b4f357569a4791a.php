<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('repair_device_model.create')): ?>
 <a class="btn btn-sm btn-primary pull-right" data-href="<?php echo e(action('\Modules\Repair\Http\Controllers\DeviceModelController@create'), false); ?>" id="add_device_model">
	<i class="fa fa-plus"></i>
	<?php echo app('translator')->get('messages.add'); ?>
</a>
<?php endif; ?>
<br><br>
<div class="table-responsive">
    <table class="table table-bordered table-striped" id="model_table" style="width: 100%">
        <thead>
            <tr>
                <th><?php echo app('translator')->get('messages.action'); ?></th>
                <th><?php echo app('translator')->get('repair::lang.model_name'); ?></th>
                <th><?php echo app('translator')->get('repair::lang.repair_checklist'); ?></th>
                <th><?php echo app('translator')->get('repair::lang.device'); ?></th>
                <th><?php echo app('translator')->get('product.brand'); ?></th>
            </tr>
        </thead>
    </table>
</div>
<div class="modal fade" id="device_model_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Repair/Providers/../Resources/views/device_model/index.blade.php ENDPATH**/ ?>