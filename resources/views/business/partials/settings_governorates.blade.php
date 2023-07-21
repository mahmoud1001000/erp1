<div class="pos-tab-content">
     <div class="row">
        <div class="col-sm-4">
            <form action="{{}}"></form>
            <div class="form-group">
                {!! Form::label('stock_expiry_alert_days', __('مناطق الشحن') . ':*') !!}
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fas fa-calendar-times"></i>
                </span>
                {!! Form::text('name', null, ['class' => 'form-control','required']); !!}
                <span class="input-group-addon">
                    @lang('business.days')
                </span>
                </div>
            </div>
        </div>
    </div>
</div>