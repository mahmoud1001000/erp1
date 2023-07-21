<div class="modal-dialog" role="document">
<div class="modal-content">

    {!! Form::open(['url' => action('SellingPriceGroupController@savecurrency'), 'method' => 'post','id'=>'savecurrency' ]) !!}

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">تغيير العملة :</h4>
    </div>

    <div class="modal-body">

                <div class="form-group">
                    {!! Form::label('app_currency_id', __('business.currency') . ':') !!}
                    <div class="input-group">
                <span class="input-group-addon">
                    <i class="fas fa-money-bill-alt"></i>
                </span>
                        {!! Form::select('app_currency_id', $currencies, $settings["app_currency_id"], ['class' => 'form-control select2','placeholder' => __('business.currency_placeholder'), 'required']); !!}
                    </div>
            </div>



    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >@lang( 'messages.save' )</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>
    </div>

    {!! Form::close() !!}

</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script>

</script>