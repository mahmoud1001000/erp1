<div class="modal-dialog" role="document">
    <div class="modal-content">

        {!! Form::open(['url' => action('Restaurant\KitchenController@update',$kitchen->id), 'method' => 'post','id'=>'kitchen_edit' ]) !!}

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">تعديل بيانات</h4>
        </div>

        <div class="modal-body">

            <div class="form-group">
                <input type="hidden" name="id" value="{{$kitchen->id}}">

                {!! Form::label('name','إسم القسم' . ':*') !!}
                {!! Form::text('name', $kitchen->name, ['class' => 'form-control', 'required' ]); !!}
            </div>
            <div class="form-group">
                {!! Form::label('location_id','الفرع'. ':') !!}
                {!! Form::select('location_id',$business_locations,$kitchen->location_id,['class'=>'form-control']) !!}

            </div>
            <div class="form-group">
                {!! Form::label('description','الوصف' . ':') !!}
                {!! Form::text('description', $kitchen->description, ['class' => 'form-control']); !!}
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

</script>