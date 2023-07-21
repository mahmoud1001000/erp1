
{!! Form::hidden('language', request()->lang); !!}


{{--تفاصيل الشركة --}}


<div class="div-content" >
    <div style="text-align: center;
                    color: #FFF;
                    background-color: #31313C;
                    margin: -11px -15px 0px -15px;
                    border-radius: 10px 10px 0px 0px;
                    padding-top: 1px;
                    padding-bottom: 15px;">

        <h3 style="color: #FFFFFF">{{env('APP_TITLE','AZHA-ERP')}}</h3>

    </div>

    <div class="div-content-titel">
        <p>@lang('business.business_details')</p>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('name', __('business.business_name') . ':*' ) !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-suitcase"></i>
                    </span>
                    {!! Form::text('name', null, ['class' => 'form-control','placeholder' => __('business.business_name'), 'required']); !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('currency_id', __('business.currency') . ':*') !!}
                <div class="input-group">
        <span class="input-group-addon">
            <i class="fas fa-money-bill-alt"></i>
        </span>
                    {!! Form::select('currency_id', $currencies, '', ['class' => 'form-control select2','style'=>'max-width:200px',    'placeholder' => __('business.currency_placeholder'), 'required']); !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6" style="display: none">
            <div class="form-group">
                {!! Form::label('start_date', __('business.start_date') . ':') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                    {!! Form::text('start_date', null, ['class' => 'form-control start-date-picker','placeholder' => __('business.start_date'), 'readonly']); !!}
                </div>
            </div>
        </div>

        <div class="col-md-6" style="display: none">
            <div class="form-group">
                {!! Form::label('business_logo', __('business.upload_logo') . ':') !!}
                {!! Form::file('business_logo', ['accept' => 'image/*']); !!}
            </div>
        </div>
        <div class="col-md-6" style="display: none">
            <div class="form-group">
                {!! Form::label('website', __('lang_v1.website') . ':') !!}
                <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-globe"></i>
            </span>
                    {!! Form::text('website', 'http://azhasoft.com', ['class' => 'form-control','placeholder' => __('lang_v1.website')]); !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('mobile', __('lang_v1.business_telephone') . ':') !!}
                <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-phone"></i>
        </span>
                    {!! Form::text('mobile', null, ['class' => 'form-control','placeholder' => __('lang_v1.business_telephone')]); !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('alternate_number', __('business.alternate_number') . ':') !!}
                <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-phone"></i>
            </span>
                    {!! Form::text('alternate_number', null, ['class' => 'form-control','placeholder' => __('business.alternate_number')]); !!}
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Owner Information -->





<div class="div-content" >
    <div class="div-content-titel">
        <p>@lang('business.owner_info')</p>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('surname', __('business.prefix') . ':') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    {!! Form::text('surname', null, ['class' => 'form-control','placeholder' => __('business.prefix_placeholder')]); !!}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('first_name', __('business.first_name') . ':*') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    {!! Form::text('first_name', null, ['class' => 'form-control','placeholder' => __('business.first_name'), 'required']); !!}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('last_name', __('business.last_name') . ':') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    {!! Form::text('last_name', null, ['class' => 'form-control','placeholder' =>  __('business.last_name')]); !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('username', __('business.username') . ':*') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </span>
                    {!! Form::text('username', null, ['class' => 'form-control','placeholder' => __('business.username'), 'required']); !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('email', __('business.email') . ':') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                    </span>
                    {!! Form::text('email', null, ['class' => 'form-control','placeholder' => __('business.email')]); !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('password', __('business.password') . ':*') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-lock"></i>
                    </span>
                    {!! Form::password('password', ['class' => 'form-control','placeholder' => __('business.password'), 'required']); !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('confirm_password', __('business.confirm_password') . ':*') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-lock"></i>
                    </span>
                    {!! Form::password('confirm_password', ['class' => 'form-control','placeholder' => __('business.confirm_password'), 'required']); !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @if(!empty($system_settings['superadmin_enable_register_tc']))
                <div class="form-group">
                    <label>
                        {!! Form::checkbox('accept_tc', 0, false, ['required', 'class' => 'input-icheck']); !!}
                        <u><a class="terms_condition cursor-pointer" data-toggle="modal" data-target="#tc_modal">
                            @lang('lang_v1.accept_terms_and_conditions') <i></i>
                        </a></u>
                    </label>
                </div>
                @include('business.partials.terms_conditions')
            @endif
        </div>
    </div>
</div>







<div class="col-md-6"  style="display: none">
    <div class="form-group">
        {!! Form::label('country', __('business.country') . ':*') !!}
        <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-globe"></i>
        </span>
            {!! Form::text('country','Egypt', ['class' => 'form-control','placeholder' => __('business.country'), 'required']); !!}
        </div>
    </div>
</div>
<div class="col-md-6"  style="display: none">
    <div class="form-group">
        {!! Form::label('state',__('business.state') . ':*') !!}
        <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-map-marker"></i>
        </span>
            {!! Form::text('state', 'Cairo', ['class' => 'form-control','placeholder' => __('business.state'), 'required']); !!}
        </div>
    </div>
</div>
<div class="col-md-6"  style="display: none">
    <div class="form-group">
        {!! Form::label('city',__('business.city'). ':*') !!}
        <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-map-marker"></i>
        </span>
            {!! Form::text('city', 'Cairo', ['class' => 'form-control','placeholder' => __('business.city'), 'required']); !!}
        </div>
    </div>
</div>
<div class="col-md-6"  style="display: none">
    <div class="form-group">
        {!! Form::label('zip_code', __('business.zip_code') . ':*') !!}
        <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-map-marker"></i>
        </span>
            {!! Form::text('zip_code', '00426', ['class' => 'form-control','placeholder' => __('business.zip_code_placeholder'), 'required']); !!}
        </div>
    </div>
</div>
<div class="col-md-6"  style="display: none">
    <div class="form-group">
        {!! Form::label('landmark', __('business.landmark') . ':*') !!}
        <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-map-marker"></i>
        </span>
            {!! Form::text('landmark','33002', ['class' => 'form-control','placeholder' => __('business.landmark'), 'required']); !!}
        </div>
    </div>
</div>
<div class="col-md-6"  style="display: none">
    <div class="form-group" >
        {!! Form::label('time_zone', __('business.time_zone') . ':*') !!}
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fas fa-clock"></i>
            </span>
            {!! Form::select('time_zone', $timezone_list, config('app.timezone'), ['class' => 'form-control select2_register','placeholder' => __('business.time_zone'), 'required']); !!}
        </div>
    </div>
</div>


<!-- tax details -->

<div style="display: none">
        @lang('business.business_settings')
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('tax_label_1', __('business.tax_1_name') . ':') !!}
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-info"></i>
                </span>
                    {!! Form::text('tax_label_1', null, ['class' => 'form-control','placeholder' => __('business.tax_1_placeholder')]); !!}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('tax_number_1', __('business.tax_1_no') . ':') !!}
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-info"></i>
                </span>
                    {!! Form::text('tax_number_1', null, ['class' => 'form-control']); !!}
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('tax_label_2',__('business.tax_2_name') . ':') !!}
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-info"></i>
                </span>
                    {!! Form::text('tax_label_2', null, ['class' => 'form-control','placeholder' => __('business.tax_1_placeholder')]); !!}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('tax_number_2',__('business.tax_2_no') . ':') !!}
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-info"></i>
                </span>
                    {!! Form::text('tax_number_2', null, ['class' => 'form-control',]); !!}
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('fy_start_month', __('business.fy_start_month') . ':*') !!} @show_tooltip(__('tooltip.fy_start_month'))
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </span>
                    {!! Form::select('fy_start_month', $months, 1, ['class' => 'form-control select2_register', 'required', 'style' => 'width:100%;']); !!}
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::label('accounting_method', __('business.accounting_method') . ':*') !!}
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-calculator"></i>
                </span>
                    {!! Form::select('accounting_method', $accounting_methods, null, ['class' => 'form-control select2_register', 'required', 'style' => 'width:100%;']); !!}
                </div>
            </div>
        </div>

</div>