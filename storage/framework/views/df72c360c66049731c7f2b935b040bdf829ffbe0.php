<div class="modal-dialog modal-lg" role="document">
    <?php echo Form::open(['action' => 'DocumentAndNoteController@store', 'id' => 'docus_notes_form', 'method' => 'post']); ?>

    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">
                <?php echo app('translator')->get('lang_v1.add_note'); ?>
            </h4>
        </div>
        <!-- model id like project_id, user_id -->
        <?php echo Form::hidden('notable_id', $notable_id, ['class' => 'form-control']); ?>

        <!-- model name like App\User -->
        <?php echo Form::hidden('notable_type', $notable_type, ['class' => 'form-control']); ?>

        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                   <div class="form-group">
                        <?php echo Form::label('heading', __('lang_v1.heading') . ':*' ); ?>

                        <?php echo Form::text('heading', null, ['class' => 'form-control', 'required' ]); ?>

                   </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <?php echo Form::label('description', __('lang_v1.description') . ':'); ?>

                        <?php echo Form::textarea('description', null, ['class' => 'form-control ', 'id' => 'docs_note_description']); ?>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="fileupload">
                            <?php echo app('translator')->get('lang_v1.documents'); ?>:
                        </label>
                        <div class="dropzone" id="docusUpload"></div>
                    </div>
                    <input type="hidden" id="docus_notes_media" name="file_name[]" value="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="is_private" value="1"> <?php echo app('translator')->get('lang_v1.is_private'); ?>
                                <i class="fa fa-info-circle" data-toggle="tooltip" title="<?php echo app('translator')->get('lang_v1.note_will_be_visible_to_u_only'); ?>"></i>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm">
                <?php echo app('translator')->get('messages.save'); ?>
            </button>
             <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
                <?php echo app('translator')->get('messages.close'); ?>
            </button>
        </div>
    </div><!-- /.modal-content -->
    <?php echo Form::close(); ?>

</div><!-- /.modal-dialog --><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/documents_and_notes/create.blade.php ENDPATH**/ ?>