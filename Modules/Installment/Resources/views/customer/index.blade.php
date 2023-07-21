@extends('layouts.app')
@section('title',__('installment::lang.customer_instalment'))

@section('content')

    @include('installment::layouts.partials.style')

    <section class="content-header">
        <h1>@lang('installment::lang.customer_instalment')</h1>
    </section>

    @csrf
    <section class="content no-print">
        @component('components.widget', ['class' => 'box-primary', 'title' =>''])
            @can('installment.view')


            <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                {!! Form::label('customer_id',__('installment::lang.customers') .' : ') !!}
                                {!! Form::select('customer_id', $customers, null, ['class' => 'form-control select2','id'=>'customer_id']); !!}
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="form-group">
                                {!! Form::label('balance_due',' إجمالي المديونية:') !!}
                                <input type="balance_due" name='balance_due' id="balance_due" value="00.00" class="form-control text-disabled" readonly>
                            </div>
                        </div>


                    </div>



            @endcan

           {{-- <button type="button" class="btn  btn-primary " onclick="tprint(69)"  >
                    <i class="fa fa-plus"></i> @lang( 'messages.add' )</button>--}}

        <div class="view-div">
            @can('installment.view')

                <div class="table-responsive">
                    <table class="table table-bordered table-striped " id="data_table2">
                        <thead>
                        <tr>
                            <th style="width: 140px">تاريخ بداية الأقساط</th>
                            <th style="width: 140px">المبلغ الإجمالي</th>
                            <th>قيمة القسط </th>
                            <th style="width: 100px">عدد الأقساط </th>

                            <th>عدد الأقساط المسددة</th>
                            <th style="width: 150px"></th>


                        </tr>
                        </thead>

                    </table>
                </div>


            @endcan
        </div>



        @endcomponent



    </section>

    <div class="modal fade div_modal" tabindex="-1" role="dialog"
         aria-labelledby="gridSystemModalLabel">
    </div>

    <section class="invoice print_section" id="installment_section">
    </section>
@endsection


@section('javascript')
 {{--   <script  src='{{Module::asset('installment:js/app.js?v=' . $asset_v)}}'></script>--}}
 @include('installment::layouts.partials.javascripts')


<script type="text/javascript">
$(document).ready(function () {

    data_table2 = $('#data_table2').DataTable({
        processing: true,
        serverSide: true,
        ajax:{
            url:'/installment/getinstallment?id=',
            data:function(d) {
                d.id= $('#customer_id').val();
            }
        },
        columnDefs: [
            {
                targets:5,
                orderable: false,
                searchable: false,
            },
        ],
    });
    $('#customer_id').on('change',function () {
        var customer_id = $('#customer_id').val();
        $.ajax({
            method: 'GET',
            url: '/installment/getcustomerdata/' + customer_id,
            data: {
                id: customer_id
            },
            success: function (result) {
                $('#balance_due').val(result['balance_due'].toFixed(2));
            }
        });
        data_table2.ajax.reload();

    });

});





$(document).on('click', 'button.delete_installment_button', function () {
    swal({
        title: LANG.sure,
        text: 'سوف يتم حذف مجموعة الأقساط ',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
    }).then(willDelete => {
        if (willDelete) {
            var href = $(this).data('href');
            var data = $(this).serialize();
            $.ajax({
                method: 'DELETE',
                url: href,
                dataType: 'json',
                data: data,
                success: function (result) {
                    if (result.success == true) {
                        toastr.success(result.msg);
                        data_table2.ajax.reload();
                    } else {
                        toastr.error(result.msg);
                    }
                },
            });
        }
    });

});



</script>

@endsection