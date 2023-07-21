<div class="modal-dialog" role="document">
    <div class="modal-content">
        {!! Form::open(['url' => action('\Modules\Installment\Http\Controllers\InstallmentController@storepayment',$data->id), 'method' => 'post','id'=>'storepayment' ]) !!}
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">تحصيل قسط</h4>
        </div>
        <div class="modal-body">

            <input type="hidden" name="contact_id" value="{{$data->contact_id}}" >
            <input type="hidden" name="installment_id" value="{{$data->id}}" >

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        {!! Form::label('number',' إسم العميل :') !!}
                        {!! Form::text('number', $contact->name, ['class' => 'form-control integr ', 'readonly','id'=>'number' ]); !!}
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        {!! Form::label('number',' رقم القسط :') !!}
                        {!! Form::text('number', $data->installment_number, ['class' => 'form-control integr ', 'readonly','id'=>'number' ]); !!}
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        {!! Form::label('number',' تاريخ الأستحقاق:') !!}
                        {!! Form::text('number', $data->installmentdate, ['class' => 'form-control integr ', 'readonly','id'=>'number' ]); !!}
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('installment_value',' قيمة القسط:') !!}
                        <input type="text" name='installment_value' id="installment_value" value="{{$data->installment_value}}" class="form-control decimal intallparameter" readonly >
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('benefit_value',' الفائدة :') !!}
                        {!! Form::text('benefit_value', $data->benefit_value, ['class' => 'form-control integr intallparameter', 'readonly','id'=>'benefit_value' ]); !!}
                    </div>
                </div>


            </div>


            <div class="row">
             <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('period',' التأخير :') !!}
                        {!! Form::text('period', $daylats, ['class' => 'form-control integr ', 'readonly','id'=>'period' ]); !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('period',' مدة :') !!}
                        {!! Form::text('period', __('installment::lang.'.$data->latfinestype), ['class' => 'form-control integr intallparameter', 'readonly','id'=>'period' ]); !!}
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('period','نسبة الغرامة :') !!}
                        {!! Form::text('period', $data->latfines, ['class' => 'form-control integr ', 'readonly','id'=>'period' ]); !!}
                    </div>
                </div>




            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('installmentdate','تاريخ السداد: ') !!}
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                            {!! Form::text('installmentdate',Carbon::now()->format('Y-m-d'), ['class' => 'form-control date-picker','required', 'readonly','id'=>'installmentdate' ]); !!}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('latfines','غرامة التأخير :') !!}
                        {!! Form::text('latfines',$latfines_value, ['class' => 'form-control decimal intallparameter', 'required','id'=>'latfines' ]); !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('totallpaid',' الإجمالي:') !!}
                        {!! Form::text('totallpaid',$latfines_value+$data->benefit_value+$data->installment_value, ['class' => 'form-control decimal intallparameter', 'required','id'=>'totallpaid' ]); !!}

                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('account_id',' الحساب:') !!}
                        {!! Form::select('account_id',$accounts, null, ['class' => 'form-control select2 getinstallment','id'=>'account_id','style' => 'width:100%']); !!}

                    </div>
                </div>
            </div>





            <div class="modal-footer">
                <button type="submit" class="btn  btn-primary " > <i class="fa fa-plus"></i> @lang( 'messages.add' )</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>
            </div>






        </div><!-- /.modal-content -->
        {!! Form::close() !!}
    </div><!-- /.modal-dialog -->
</div>


<script>

$(document).on('keyup','#latfines',function () {
    var latfines=$('#latfines').val();
    var benefit_value=$('#benefit_value').val();
    var installment_value=$('#installment_value').val();

    var total=(installment_value*1+benefit_value*1+latfines*1).toFixed(2);
    $('#totallpaid').val(total);
});


    $('.date-picker').datepicker({
        autoclose: true,
        format:'yyyy-m-d',
    });


</script>
