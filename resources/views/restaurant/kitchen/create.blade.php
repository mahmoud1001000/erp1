<div class="modal-dialog" role="document">
    <div class="modal-content">

        {!! Form::open(['url' => action('Restaurant\KitchenController@store'), 'method' => 'post','id'=>'kitchen_create' ]) !!}

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">إضافة قسم</h4>
        </div>

        <div class="modal-body">

         <div class="form-group">
                {!! Form::label('name','إسم القسم' . ':*') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required' ]); !!}
            </div>
         <div class="form-group">
                {!! Form::label('location_id','الفرع'. ':') !!}
                {!! Form::select('location_id',$business_locations,null,['class'=>'form-control']) !!}

            </div>
         <div class="form-group">
                {!! Form::label('description','الوصف' . ':') !!}
                {!! Form::text('description', null, ['class' => 'form-control']); !!}
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