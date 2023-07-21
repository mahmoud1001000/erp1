<div class="modal-dialog" role="document">
    <div class="modal-content">

        {!! Form::open(['url' => action('\Modules\Partners\Http\Controllers\PartnersController@update',$partner->id), 'method' => 'PUT' ]) !!}

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">تعديل بينانات شريك</h4>
        </div>

        <div class="modal-body">
            <div class="form-group">
                {!! Form::label('name','إسم الشريك :*') !!}
                {!! Form::text('name', $partner->name, ['class' => 'form-control', 'required', 'placeholder' =>'الإسم' ]); !!}
            </div>

            <div class="form-group">
                {!! Form::label('address',' العنوان :*') !!}
                {!! Form::text('address', $partner->address, ['class' => 'form-control', 'required', 'placeholder' =>'العنوان' ]); !!}
            </div>

            <div class="form-group">
                {!! Form::label('mobile',' رقم الموبيل :') !!}
                {!! Form::text('mobile', $partner->mobile, ['class' => 'form-control','placeholder' =>'رقم المبيل']); !!}
            </div>

            <div class="form-group">
                {!! Form::label('capital','قيمة رأس المال :') !!}
                {!! Form::text('capital', $partner->capital, ['class' => 'form-control','placeholder' =>'قيمة رأس المال']); !!}
            </div>
            <div class="form-group">
                {!! Form::label('share','عدد الأسهم :') !!}
                {!! Form::text('share', $partner->share, ['class' => 'form-control','placeholder' =>'عدد الأسهم']); !!}
            </div>


        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">@lang( 'messages.save' )</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>
        </div>

        {!! Form::close() !!}

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
