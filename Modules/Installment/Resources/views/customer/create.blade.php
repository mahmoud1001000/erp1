<div class="modal-dialog" role="document">
    <div class="modal-content">
        {!! Form::open(['url' => action('\Modules\Installment\Http\Controllers\CustomerController@createinstallment'), 'method' => 'post','id'=>'add_installment' ]) !!}
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">إضافة تقسيط</h4>
        </div>
        <div class="modal-body">

            <input type="hidden" name="contact_id" value="{{$transaction->contact_id}}">
            <input type="hidden" name="transaction_id" value="{{$transaction->id}}">

            <div class="row">
                <div class="col-lg-5">
                    <div class="form-group">
                        {!! Form::label('contactname','إسم العميل :') !!}
                        <input type="text" name='contactname' id="contactname" value=" {{ $transaction->name}}" class="form-control decimal intallparameter"  >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        {!! Form::label('total_fat','إجمالي الفاتورة :') !!}
                        <input type="text" name='total_fat' id="total_fat" value=" {{ $total}}" class="form-control decimal intallparameter" readonly >
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        {!! Form::label('total_paid','قيمة مسددة :') !!}
                        <input type="text" name='total_paid' id="total_paid" value=" {{ $total_paid}}" class="form-control decimal intallparameter"  readonly >
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        {!! Form::label('total_req','المستحق :') !!}
                        <input type="text" name='total_req' id="total_req" value=" {{ $total-$total_paid}}" class="form-control decimal intallparameter" readonly >
                    </div>
                </div>
            </div>

<hr>

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        {!! Form::label('system_id',' نظام التقسيط:') !!}
                        {!! Form::select('system_id', $systems, null, ['class' => 'form-control select2','id'=>'system_id']); !!}
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        {!! Form::label('advanced',' دفعة مقدمة:') !!}
                        <input type="text" name='advanced' id="advanced" value="0.0" class="form-control decimal intallparameter" required >
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        {!! Form::label('installment_value',' مبلغ القسط:') !!}
                        <input type="text" name='installment_value' id="installment_value" value=" {{ $total-$total_paid}}" class="form-control decimal intallparameter" required >
                    </div>
                </div>



            </div>
            <?php
                $readonly='readonly';
                if(auth()->user()->can('installment.system_edit'))
                   $readonly='';

            ?>


                <div class="row">

                    <div class="col-lg-4">
                        <div class="form-group">
                            {!! Form::label('number',' عدد الأقساط :*') !!}
                            {!! Form::text('number', null, ['class' => 'form-control integr intallparameter', 'required','id'=>'number',$readonly ]); !!}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            {!! Form::label('period',' معدل السداد:') !!}
                            {!! Form::text('period', null, ['class' => 'form-control integr intallparameter', 'required','id'=>'period',$readonly ]); !!}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        {!! Form::label('type',' ') !!}
                        <select class="form-control" name="type" id="type" >
                            <option value="day">@lang('installment::lang.day')</option>
                            <option value="month">@lang('installment::lang.month')</option>
                            <option value="year">@lang('installment::lang.year')</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            {!! Form::label('benefit',' نسبة الفائدة %:') !!}
                            {!! Form::text('benefit', null, ['class' => 'form-control decimal intallparameter', 'required','id'=>'benefit' ,$readonly]); !!}
                            <span style="color: red" id="benefit-type">قيمة الفائدة عن كل سنة</span>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        {!! Form::label('benefit_type','نوع الفائدة :') !!}
                        <select class="form-control" name="benefit_type" id="benefit_type">
                            <option value="simple">@lang('installment::lang.simple')</option>
                            <option value="complex">@lang('installment::lang.complex')</option>
                        </select>
                    </div>
                </div>
                 <div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('latfines','غرامة التأخير % :') !!}
            {!! Form::text('latfines', null, ['class' => 'form-control decimal intallparameter', 'required','id'=>'latfines' ,$readonly]); !!}
        </div>
    </div>
    <div class="col-lg-4">
        {!! Form::label('latfinestype',' ') !!}
        <select class="form-control" name="latfinestype" id="latfinestype">
            <option value="day">@lang('installment::lang.day')</option>
            <option value="month">@lang('installment::lang.month')</option>
            <option value="year">@lang('installment::lang.year')</option>
        </select>
    </div>
</div>



                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            {!! Form::label('installmentdate','تاريخ أول قسط : ') !!}
                            <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                {!! Form::text('installmentdate',Carbon::now()->format('Y-m-d'), ['class' => 'form-control date-picker','required', 'readonly','id'=>'installmentdate' ]); !!}
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            {!! Form::label('benefit_value','إجمالي الفائدة :') !!}
                            {!! Form::text('benefit_value', '00.00', ['class' => 'form-control decimal','id'=>'benefit_value','readonly' ]); !!}
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            {!! Form::label('total','إجمالي السداد :') !!}
                            {!! Form::text('total', '00.00', ['class' => 'form-control decimal','id'=>'total','readonly' ]); !!}
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            {!! Form::label('installment','قيمة القسط :') !!}
                            {!! Form::text('installment', '00.00', ['class' => 'form-control decimal','id'=>'installment' ,'readonly']); !!}
                        </div>
                    </div>

                </div>

            <div class="modal-footer">
             <button type="submit" id="submit" class="btn  btn-primary " > <i class="fa fa-plus"></i> @lang( 'messages.add' )</button>
             <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>
            </div>






    </div><!-- /.modal-content -->
        {!! Form::close() !!}
</div><!-- /.modal-dialog -->
</div>


<script>
    $(document).ready(function () {
        $('#system_id').on('change',function () {
            var system_id=$('#system_id').val();
            $.ajax({
                method: 'GET',
                url: '/installment/getsystemdata',
                data:{
                    id:system_id
                },
                success: function(result) {
                    $('#system_name').val(result['name']);
                    $('#number').val(result['number']);
                    $('#period').val(result['period']);
                    $('#type').val(result['type']);
                    $('#benefit').val(result['benefit']);
                    $('#benefit_type').val(result['benefit_type']);


                    $('#latfines').val(result['latfines']);
                    $('#latfinestype').val(result['latfinestype']);

                    calcinstallment();
                }
            });
        });

        function calcinstallment(){


           var advanced=$('#advanced').val();
           var total_req=$('#total_req').val();
           $('#installment_value').val(total_req*1-advanced*1);


            var installment_value=$('#installment_value').val();
            if(installment_value=='')
                return true;
            var number=$('#number').val();
            if(number=='')
                return true;
            var period=$('#period').val();
            if(period=='')
                return true;

            var type=$('#type').val();

            var benefit=$('#benefit').val();
            if(benefit=='')
                return true;

            var benefit_type=$('#benefit_type').val();

            var benefit_peryear=benefit/1;
            var benefit_permonth=benefit/12;
            var benefit_perday=benefit/365;


            var total_benefit=0;
            if(type=='year')
                total_benefit=period*benefit_peryear*number/100;
            if(type=='month')
                total_benefit=period*benefit_permonth*number/100;

            if(type=='day')
                total_benefit=period*benefit_perday*number/100;


            var benefit_value=installment_value*total_benefit;

            $('#benefit_value').val(benefit_value.toFixed(2));
            var installment=benefit_value/number+installment_value/number;

            $('#installment').val(installment.toFixed(2));

            var total=(installment*number).toFixed(2)
            $('#total').val(total);


        }

        $('.intallparameter').on('keyup',function () {
            calcinstallment();
        });

        $('#type').on('change',function () {
            calcinstallment();
        });



        $('.date-picker').datepicker({
            autoclose: true,
            format:'yyyy-m-d',
        });

        $(document).on('submit', 'form#add_installment', function(e) {
            e.preventDefault();
            if($('#installmentdate').val().trim()==''){
                toastr.error('عفوا برجاء إداخال تاريخ بداية القسط');
               return true;
            }

            if($('#system_id').val()=='')
            {
                toastr.error('عفوا برجاء إختيار نظام التقسيط');
                return true;
            }

            document.getElementById("submit").disabled = true;
            var form = $(this);
            __disable_submit_button(form.find('button[type="submit"]'));

            var data = form.serialize();
            $.ajax({
                method: 'POST',
                url: '/installment/createinstallment',
                dataType: 'json',
                data: data,
                beforeSend: function (xhr) {
                    __disable_submit_button(form.find('button[type="submit"]'));
                },
                success: function (result) {
                    if (result.success == true) {
                        $('div.div_modal').modal('hide');
                        toastr.success(result.msg);
                        sell_table.ajax.reload();
                        } else {
                        toastr.error(result.msg);
                    }
                },
            });
        });
    });





</script>
