<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('TypesOfServiceController@store'), 'method' => 'post', 'id' => 'types_of_service_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get( 'lang_v1.add_type_of_service' ); ?></h4>
    </div>

    <div class="modal-body">
      <div class="row">
      <div class="form-group col-md-12">
        <?php echo Form::label('name', __( 'tax_rate.name' ) . ':*'); ?>

          <?php echo Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => __( 'tax_rate.name' )]); ?>

      </div>

      <div class="form-group col-md-12">
        <?php echo Form::label('description', __( 'lang_v1.description' ) . ':'); ?>

          <?php echo Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.description' ), 'rows' => 3]); ?>

      </div>

      <div class="form-group col-md-12">
      <table class="table table-slim">
        <thead>
          <tr>
            <th><?php echo app('translator')->get('sale.location'); ?></th>
            <th><?php echo app('translator')->get('lang_v1.price_group'); ?></th> 
          </tr>
          <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($value, false); ?></td>
              <td><?php echo Form::select('location_price_group[' . $key . ']', $price_groups, null, ['class' => 'form-control input-sm select2', 'style' => 'width: 100%;']); ?></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </thead>
      </table>
      </div>
       <div class="form-group col-md-6">
        <?php echo Form::label('packing_charge_type', __( 'lang_v1.packing_charge_type' ) . ':'); ?>

          <?php echo Form::select('packing_charge_type', ['fixed' => __('lang_v1.fixed'), 'percent' => __('lang_v1.percentage')], 'fixed', ['class' => 'form-control']); ?>

      </div>
      <div class="form-group col-md-6">
        <?php echo Form::label('packing_charge', __( 'lang_v1.packing_charge' ) . ':'); ?>

          <?php echo Form::text('packing_charge', null, ['class' => 'form-control input_number', 'placeholder' => __( 'lang_v1.packing_charge' )]); ?>

      </div>
      <div class="form-group col-md-12">
          <div class="checkbox">
            <label>
               <?php echo Form::checkbox('enable_custom_fields', 1, false); ?> <?php echo app('translator')->get( 'lang_v1.enable_custom_fields' ); ?>
            </label> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.types_of_service_custom_field_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
          </div>
      </div>
      </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'messages.save' ); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/types_of_service/create.blade.php ENDPATH**/ ?>