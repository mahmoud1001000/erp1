<div class="modal-dialog" role="document">
    <div class="modal-content">

        <?php echo Form::open(['url' => action('Restaurant\KitchenController@store'), 'method' => 'post','id'=>'kitchen_create' ]); ?>


        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">إضافة قسم</h4>
        </div>

        <div class="modal-body">

         <div class="form-group">
                <?php echo Form::label('name','إسم القسم' . ':*'); ?>

                <?php echo Form::text('name', null, ['class' => 'form-control', 'required' ]); ?>

            </div>
         <div class="form-group">
                <?php echo Form::label('location_id','الفرع'. ':'); ?>

                <?php echo Form::select('location_id',$business_locations,null,['class'=>'form-control']); ?>


            </div>
         <div class="form-group">
                <?php echo Form::label('description','الوصف' . ':'); ?>

                <?php echo Form::text('description', null, ['class' => 'form-control']); ?>

            </div>

        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'messages.save' ); ?></button>
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
        </div>

        <?php echo Form::close(); ?>


    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script>

</script><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/restaurant/kitchen/create.blade.php ENDPATH**/ ?>