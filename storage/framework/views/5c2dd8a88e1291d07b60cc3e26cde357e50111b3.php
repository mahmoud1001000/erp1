<div class="modal fade register_details_modal" tabindex="-1" role="dialog" 
  aria-labelledby="gridSystemModalLabel" id="checklist_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <?php echo app('translator')->get('repair::lang.pre_repair_checklist'); ?>
                </h4>
                <p class="help-block">
                    <?php echo app('translator')->get('repair::lang.not_applicable_key'); ?> = <?php echo app('translator')->get('repair::lang.not_applicable'); ?>
                </p>
            </div>
            <div class="modal-body">
                <div class="row append_repair_checklists">
                    <div class="col-xs-4">
                        <?php echo app('translator')->get('repair::lang.no_repair_check_list'); ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <?php echo app('translator')->get( 'messages.save' ); ?>
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Repair/Providers/../Resources/views/repair/partials/checklist_modal.blade.php ENDPATH**/ ?>