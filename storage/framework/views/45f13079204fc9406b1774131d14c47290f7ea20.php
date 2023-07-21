<div class="modal-dialog" role="document">
    <div class="modal-content">

        <?php echo Form::open(['url' => action('\Modules\Partners\Http\Controllers\PartnersController@store'), 'method' => 'post' ]); ?>


        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">إضافة شريك</h4>
        </div>

        <div class="modal-body">
            <div class="form-group">
                <?php echo Form::label('name','إسم الشريك :*'); ?>

                <?php echo Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' =>'الإسم' ]); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('address',' العنوان :*'); ?>

                <?php echo Form::text('address', null, ['class' => 'form-control', 'required', 'placeholder' =>'العنوان' ]); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('mobile',' رقم الموبيل :'); ?>

                <?php echo Form::text('mobile', null, ['class' => 'form-control','placeholder' =>'رقم المبيل']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('capital','قيمة رأس المال :'); ?>

                <?php echo Form::text('capital', null, ['class' => 'form-control','placeholder' =>'قيمة رأس المال']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('share','عدد الأسهم :'); ?>

                <?php echo Form::text('share', null, ['class' => 'form-control','placeholder' =>'عدد الأسهم']); ?>

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
    $('.date-picker').datepicker({
        autoclose: true,
        endDate: 'today',
        format:'yyyy-m-d',
    });
</script><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Partners/Providers/../Resources/views/partners/create.blade.php ENDPATH**/ ?>