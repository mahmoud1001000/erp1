<button type="button" class="btn btn-sm btn-primary btn-modal pull-right" 
    data-href="<?php echo e(action('\Modules\Repair\Http\Controllers\RepairStatusController@create'), false); ?>" 
    data-container=".view_modal">
    <i class="fa fa-plus"></i>
    <?php echo app('translator')->get( 'messages.add' ); ?>
</button>
<br><br>
<table class="table table-bordered table-striped" id="status_table" style="width: 100%">
    <thead>
    <tr>
        <th><?php echo app('translator')->get( 'repair::lang.status_name' ); ?></th>
        <th><?php echo app('translator')->get( 'repair::lang.color' ); ?></th>
        <th><?php echo app('translator')->get( 'repair::lang.sort_order' ); ?></th>
        <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
    </tr>
    </thead>
</table>
<div class="modal fade brands_modal" tabindex="-1" role="dialog" 
aria-labelledby="gridSystemModalLabel">
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Repair/Providers/../Resources/views/status/index.blade.php ENDPATH**/ ?>