<?php $__env->startSection('title',  __('barcode.edit_barcode_setting')); ?>

<?php $__env->startSection('content'); ?>
<style type="text/css">



</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('barcode.edit_barcode_setting'); ?></h1>
</section>

<!-- Main content -->
<section class="content">
<?php echo Form::open(['url' => action('BarcodeController@update', [$barcode->id]), 'method' => 'PUT', 
'id' => 'add_barcode_settings_form' ]); ?>

  <div class="box box-solid">
    <div class="box-body">
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <?php echo Form::label('name', __('barcode.setting_name') . ':*'); ?>

              <?php echo Form::text('name', $barcode->name, ['class' => 'form-control', 'required',
              'placeholder' => __('barcode.setting_name')]); ?>

          </div>
        </div>
        <div class="col-sm-12">
          <div class="form-group">
            <?php echo Form::label('description', __('barcode.setting_description') ); ?>

              <?php echo Form::textarea('description', $barcode->description, ['class' => 'form-control',
              'placeholder' => __('barcode.setting_description'), 'rows' => 3]); ?>

          </div>
        </div>
        <div class="col-sm-12">
          <div class="form-group">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('is_continuous', 1, $barcode->is_continuous, ['id' => 'is_continuous']); ?> <?php echo app('translator')->get('barcode.is_continuous'); ?></label>
              </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('top_margin', __('barcode.top_margin') . ' ('. __('barcode.in_in') . '):*'); ?>

            <div class="input-group">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
              </span>
              <?php echo Form::number('top_margin', $barcode->top_margin, ['class' => 'form-control',
              'placeholder' => __('barcode.top_margin'), 'min' => 0,  'required']); ?>

            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('left_margin', __('barcode.left_margin') . ' ('. __('barcode.in_in') . '):*'); ?>

            <div class="input-group">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
              </span>
              <?php echo Form::number('left_margin', $barcode->left_margin, ['class' => 'form-control',
              'placeholder' => __('barcode.left_margin'), 'min' => 0,  'required']); ?>

            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('width', __('barcode.width') . ' ('. __('barcode.in_in') . '):*'); ?>

            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-text-width" aria-hidden="true"></i>
              </span>
              <?php echo Form::number('width', $barcode->width, ['class' => 'form-control',
              'placeholder' => __('barcode.width'), 'min' => 0.1,  'required']); ?>

            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('height', __('barcode.height') . ' ('. __('barcode.in_in') . '):*'); ?>

            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-text-height" aria-hidden="true"></i>
              </span>
              <?php echo Form::number('height', $barcode->height, ['class' => 'form-control',
              'placeholder' => __('barcode.height'), 'min' => 0.1,  'required']); ?>

            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('paper_width', __('barcode.paper_width') . ' ('. __('barcode.in_in') . '):*'); ?>

            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-text-width" aria-hidden="true"></i>
              </span>
              <?php echo Form::number('paper_width', $barcode->paper_width, ['class' => 'form-control',
              'placeholder' => __('barcode.paper_width'), 'min' => 0.1,  'required']); ?>

            </div>
          </div>
        </div>
        <div class="col-sm-6 paper_height_div <?php if( $barcode->is_continuous ): ?> <?php echo e('hide', false); ?> <?php endif; ?>">
          <div class="form-group">
            <?php echo Form::label('paper_height', __('barcode.paper_height') . ' ('. __('barcode.in_in') . '):*'); ?>

            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-text-height" aria-hidden="true"></i>
              </span>
              <?php echo Form::number('paper_height', $barcode->paper_height, ['class' => 'form-control',
              'placeholder' => __('barcode.paper_height'), 'min' => 0.1,  'required']); ?>

            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('stickers_in_one_row', __('barcode.stickers_in_one_row'). ':*'); ?>

            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
              </span>
              <?php echo Form::number('stickers_in_one_row', $barcode->stickers_in_one_row, ['class' => 'form-control',
              'placeholder' => __('barcode.stickers_in_one_row'), 'min' => 1, 'required']); ?>

            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('row_distance', __('barcode.row_distance') . ' ('. __('barcode.in_in') . '):*'); ?>

            <div class="input-group">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-resize-vertical" aria-hidden="true"></span>
              </span>
              <?php echo Form::number('row_distance', $barcode->row_distance, ['class' => 'form-control',
              'placeholder' => __('barcode.row_distance'), 'min' => 0,  'required']); ?>

            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('col_distance', __('barcode.col_distance') . ' ('. __('barcode.in_in') . '):*'); ?>

            <div class="input-group">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-resize-horizontal" aria-hidden="true"></span>
              </span>
              <?php echo Form::number('col_distance', $barcode->col_distance, ['class' => 'form-control',
              'placeholder' => __('barcode.col_distance'), 'min' => 0,  'required']); ?>

            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-6 stickers_per_sheet_div <?php if( $barcode->is_continuous ): ?> <?php echo e('hide', false); ?> <?php endif; ?>">
          <div class="form-group">
            <?php echo Form::label('stickers_in_one_sheet', __('barcode.stickers_in_one_sheet') . ':*'); ?>

            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-th" aria-hidden="true"></i>
              </span>
              <?php echo Form::number('stickers_in_one_sheet', $barcode->stickers_in_one_sheet, ['class' => 'form-control',
              'placeholder' => __('barcode.stickers_in_one_sheet'), 'min' => 1, 'required']); ?>

            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-12">
          <button type="submit" class="btn btn-primary pull-right"><?php echo app('translator')->get('messages.update'); ?></button>
        </div>
      </div>
    </div>
  </div>
  <?php echo Form::close(); ?>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/barcode/edit.blade.php ENDPATH**/ ?>