<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('UnitController@store'), 'method' => 'post', 'id' => $quick_add ? 'quick_add_unit_form' : 'unit_add_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get( 'unit.add_unit' ); ?></h4>
    </div>

    <div class="modal-body">
      <div class="row">
        <div class="form-group col-sm-12">
          <?php echo Form::label('actual_name', __( 'unit.name' ) . ':*'); ?>

            <?php echo Form::text('actual_name', null, ['class' => 'form-control', 'required', 'placeholder' => __( 'unit.name' )]); ?>

        </div>

        <div class="form-group col-sm-12">
          <?php echo Form::label('short_name', __( 'unit.short_name' ) . ':*'); ?>

            <?php echo Form::text('short_name', null, ['class' => 'form-control', 'placeholder' => __( 'unit.short_name' ), 'required']); ?>

        </div>

        <div class="form-group col-sm-12">
          <?php echo Form::label('allow_decimal', __( 'unit.allow_decimal' ) . ':*'); ?>

            <?php echo Form::select('allow_decimal', ['1' => __('messages.yes'), '0' => __('messages.no')], null, ['placeholder' => __( 'messages.please_select' ), 'required', 'class' => 'form-control']); ?>

        </div>
        <?php if(!$quick_add): ?>
          <div class="form-group col-sm-12">
            <div class="form-group">
                <div class="checkbox">
                  <label>
                     <?php echo Form::checkbox('define_base_unit', 1, false,[ 'class' => 'toggler', 'data-toggle_id' => 'base_unit_div' ]); ?> <?php echo app('translator')->get( 'lang_v1.add_as_multiple_of_base_unit' ); ?>
                  </label> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.multi_unit_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                </div>
            </div>
          </div>
          <div class="form-group col-sm-12 hide" id="base_unit_div">
            <table class="table">
              <tr>
                <th style="vertical-align: middle;">1 <span id="unit_name"><?php echo app('translator')->get('product.unit'); ?></span></th>
                <th style="vertical-align: middle;">=</th>
                <td style="vertical-align: middle;">
                  <?php echo Form::text('base_unit_multiplier', null, ['class' => 'form-control input_number', 'placeholder' => __( 'lang_v1.times_base_unit' )]); ?></td>
                <td style="vertical-align: middle;">
                  <?php echo Form::select('base_unit_id', $units, null, ['placeholder' => __( 'lang_v1.select_base_unit' ), 'class' => 'form-control']); ?>

                </td>
              </tr>
            </table>
          </div>
        <?php endif; ?>
      </div>

    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'messages.save' ); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/unit/create.blade.php ENDPATH**/ ?>