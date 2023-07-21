<div class="modal-dialog" role="document">
    <div class="modal-content">

        {!! Form::open(['url' => action('\Modules\Installment\Http\Controllers\InstallmentSystemController@store'), 'method' => 'post','id'=>'add_installment_system' ]) !!}

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">إضافة نظام تقسيط</h4>
        </div>

        <div class="modal-body">
            <div class="form-group">
                {!! Form::label('name','إسم النظام :*') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' =>'الإسم' ]); !!}
            </div>
            <div class="form-group">
                {!! Form::label('number',' عدد الأقساط :*') !!}
                <div class="row">
                    <div class="col-lg-4">
                {!! Form::text('number', null, ['class' => 'form-control integr', 'required' ]); !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('period',' معدل السداد:') !!}
                <div class="row">
                    <div class="col-lg-4">
                        {!! Form::text('period', null, ['class' => 'form-control integr', 'required' ]); !!}
                    </div>
                    <div class="col-lg-6">
                        <select class="form-control" name="type">
                            <option value="day">@lang('installment::lang.day')</option>
                            <option value="month">@lang('installment::lang.month')</option>
                            <option value="year">@lang('installment::lang.year')</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
               <div class="row">
                    <div class="col-lg-4">
                        {!! Form::label('benefit',' نسبة الفائدة %:') !!}
                        {!! Form::text('benefit', null, ['class' => 'form-control', 'required' ]); !!}
                    </div>
                    <div class="col-lg-4">
                        {!! Form::label('benefit_type','نوع الفائدة :') !!}
                           <select class="form-control" name="benefit_type">
                               <option value="simple">@lang('installment::lang.simple')</option>
                               <option value="complex">@lang('installment::lang.complex')</option>

                           </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('latfines','غرامة التأخير % :') !!}
                <div class="row">
                    <div class="col-lg-4">
                        {!! Form::text('latfines', null, ['class' => 'form-control decimal', 'required' ]); !!}
                    </div>
                    <div class="col-lg-6">
                        <select class="form-control"  name="latfinestype">
                            <option value="day">@lang('installment::lang.day')</option>
                            <option value="month">@lang('installment::lang.month')</option>
                            <option value="year">@lang('installment::lang.year')</option>
                        </select>
                    </div>
                </div>
            </div>



            <div class="form-group">
                {!! Form::label('description','الوصف  :') !!}
                {!! Form::text('description', null, ['class' => 'form-control'  ]); !!}
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