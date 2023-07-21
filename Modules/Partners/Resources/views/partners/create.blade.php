<div class="modal-dialog" role="document">
    <div class="modal-content">

        {!! Form::open(['url' => action('\Modules\Partners\Http\Controllers\PartnersController@store'), 'method' => 'post' ]) !!}

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">إضافة شريك</h4>
        </div>

        <div class="modal-body">
            <div class="form-group">
                {!! Form::label('name','إسم الشريك :*') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' =>'الإسم' ]); !!}
            </div>

            <div class="form-group">
                {!! Form::label('address',' العنوان :*') !!}
                {!! Form::text('address', null, ['class' => 'form-control', 'required', 'placeholder' =>'العنوان' ]); !!}
            </div>

            <div class="form-group">
                {!! Form::label('mobile',' رقم الموبيل :') !!}
                {!! Form::text('mobile', null, ['class' => 'form-control','placeholder' =>'رقم المبيل']); !!}
            </div>

            <div class="form-group">
                {!! Form::label('capital','قيمة رأس المال :') !!}
                {!! Form::text('capital', null, ['class' => 'form-control','placeholder' =>'قيمة رأس المال']); !!}
            </div>

            <div class="form-group">
                {!! Form::label('share','عدد الأسهم :') !!}
                {!! Form::text('share', null, ['class' => 'form-control','placeholder' =>'عدد الأسهم']); !!}
            </div>


        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">@lang( 'messages.save' )</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>
        </div>

        {!! Form::close() !!}

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script>
    $('.date-picker').datepicker({
        autoclose: true,
        endDate: 'today',
        format:'yyyy-m-d',
    });
</script>