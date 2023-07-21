<div class="pos-tab-content">
     <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('stock_expiry_alert_days', __('نسبة الغرامة المركبة للتأخير') . ':*') !!}
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fas fa-dollar-sign"></i>
                </span>
                {!! Form::number('composite_fine', $business->composite_fine, ['class' => 'form-control','required']); !!}
                <span class="input-group-addon">
                    <i class="fa fa-percent"></i>
                </span>
                </div>
            </div>
        </div>
    </div>
</div>