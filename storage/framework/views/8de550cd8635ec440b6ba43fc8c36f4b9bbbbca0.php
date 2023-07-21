<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('TaxonomyController@store'), 'method' => 'post', 'id' => 'category_add_form' ]); ?>

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get( 'messages.add' ); ?></h4>
    </div>

    <div class="modal-body">
      <input type="hidden" name="category_type" value="<?php echo e($category_type, false); ?>">
      <?php
        $name_label = !empty($module_category_data['taxonomy_label']) ? $module_category_data['taxonomy_label'] : __( 'category.category_name' );
        $cat_code_enabled = isset($module_category_data['enable_taxonomy_code']) && !$module_category_data['enable_taxonomy_code'] ? false : true;

        $cat_code_label = !empty($module_category_data['taxonomy_code_label']) ? $module_category_data['taxonomy_code_label'] : __( 'category.code' );

        $enable_sub_category = isset($module_category_data['enable_sub_taxonomy']) && !$module_category_data['enable_sub_taxonomy'] ? false : true;

        $category_code_help_text = !empty($module_category_data['taxonomy_code_help_text']) ? $module_category_data['taxonomy_code_help_text'] : __('lang_v1.category_code_help');
      ?>
      <div class="form-group">
        <?php echo Form::label('name', $name_label . ':*'); ?>

          <?php echo Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => $name_label]); ?>

      </div>
      <?php if($cat_code_enabled): ?>
      <div class="form-group">
        <?php echo Form::label('short_code', $cat_code_label . ':'); ?>

        <?php echo Form::text('short_code', null, ['class' => 'form-control', 'placeholder' => $cat_code_label]); ?>

        <p class="help-block"><?php echo $category_code_help_text; ?></p>
      </div>
      <?php endif; ?>
      <div class="form-group">
        <?php echo Form::label('description', __( 'lang_v1.description' ) . ':'); ?>

        <?php echo Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.description'), 'rows' => 3]); ?>

      </div>
      <?php if(!empty($parent_categories) && $enable_sub_category): ?>
        <div class="form-group">
            <div class="checkbox">
              <label>
                 <?php echo Form::checkbox('add_as_sub_cat', 1, false,[ 'class' => 'toggler', 'data-toggle_id' => 'parent_cat_div' ]); ?> <?php echo app('translator')->get( 'lang_v1.add_as_sub_txonomy' ); ?>
              </label>
            </div>
        </div>
        <div class="form-group hide" id="parent_cat_div">
          <?php echo Form::label('parent_id', __( 'category.select_parent_category' ) . ':'); ?>

          <?php echo Form::select('parent_id', $parent_categories, null, ['class' => 'form-control']); ?>

        </div>
      <?php endif; ?>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'messages.save' ); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/taxonomy/create.blade.php ENDPATH**/ ?>