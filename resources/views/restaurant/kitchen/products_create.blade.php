<div class="modal-dialog" role="document">
    <div class="modal-content">

        {!! Form::open(['url' => action('Restaurant\KitchenController@store'), 'method' => 'post','id'=>'addproduct' ]) !!}

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">إضافة صنف إلي  مطبخ</h4>
        </div>

        <div class="modal-body">


                <input type="hidden" name="product_id" value="{{$product}}">

                <div class="form-group">
                    {!! Form::label('kitchen','المطبخ' . ':') !!}
                    {!! Form::select('kitchen_id', $kitchen, null, ['class' => 'form-control ', 'style' => 'width:80%']); !!}
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