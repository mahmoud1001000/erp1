@extends('layouts.app')
@section('title',__('installment::lang.installment_plan'))

@section('content')
    <style>
        .table-striped th{
            background-color: #626161;
            color: #ffffff;
        }
    </style>
    <section class="content-header">
        <h1>@lang('installment::lang.installment_plan')</h1>
    </section>

    <section class="content">
        @component('components.widget', ['class' => 'box-primary', 'title' =>''])
            @can('installment.view')
                @slot('tool')
                    <div class="box-tools">

                @if(auth()->user()->can('installment.system_add'))
                            <button type="button" class="btn btn-block btn-primary add_button" >
                                <i class="fa fa-plus"></i> @lang( 'messages.add' )</button>
                        @endif
                    </div>
                @endslot
            @endcan
            @can('installment.view')

                <div class="table-responsive">
                    <table class="table table-bordered table-striped " id="data_table">
                        <thead>
                        <tr>
                            <th>نظام التقسيط</th>
                            <th>عدد الأقساط</th>
                            <th>فترة السداد </th>
                            <th>النوع </th>
                            <th>نسبة الفائدة </th>
                            <th>نوع الفائدة </th>
                            <th>الوصف </th>
                            <th>الإجراء</th>
                        </tr>
                        </thead>

                    </table>
                </div>


            @endcan
        @endcomponent



    </section>

    <div class="modal fade div_modal" tabindex="-1" role="dialog"
         aria-labelledby="gridSystemModalLabel">
    </div>
@endsection


@section('javascript')
 <script type="text/javascript">
$(document).ready(function () {
    var data_table = $('#data_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/installment/system',
        columnDefs: [
            {
                targets: 7,
                orderable: false,
                searchable: false,
            },
        ],
    });

    $(document).on('click', 'button.delete_button', function () {
        swal({
            title: LANG.sure,
            text: 'سوف يتم حذف هذا النظام ',
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
                            data_table.ajax.reload();
                        } else {
                            toastr.error(result.msg);
                        }
                    },
                });
            }
        });

    });

    $(document).on('click', 'button.edit_button', function () {
        $('div.div_modal').load($(this).data('href'), function() {
            $(this).modal('show');
            $('form#edit_installment_system').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                var data = form.serialize();

                $.ajax({
                    method: 'POST',
                    url: $(this).attr('action'),
                    dataType: 'json',
                    data: data,
                    beforeSend: function(xhr) {
                        __disable_submit_button(form.find('button[type="submit"]'));
                    },
                    success: function(result) {
                        if (result.success == true) {
                            $('div.div_modal').modal('hide');

                            toastr.success(result.msg);
                            data_table.ajax.reload();
                        } else {
                            toastr.error(result.msg);
                        }
                    },
                });
            });
        });

    });





    $(document).on('click', 'button.add_button', function () {
        $.ajax({
            method: 'GET',
            url: '/installment/system/create',
            dataType: 'html',
            success: function (result) {
                $(".div_modal").html(result).modal('show');
                data_table.ajax.reload();
            },
        });

    });

    $(document).on('submit', 'form#add_installment_system', function(e) {
        e.preventDefault();
        var form = $(this);
        var data = form.serialize()
        $.ajax({
            method: 'POST',
            url: $(this).attr('action'),
            dataType: 'json',
            data: data,
            beforeSend: function (xhr) {
                __disable_submit_button(form.find('button[type="submit"]'));
            },
            success: function (result) {
                if (result.success == true) {
                    $('div.div_modal').modal('hide');
                    toastr.success(result.msg);
                    data_table.ajax.reload();
                } else {
                    toastr.error(result.msg);
                }
            },
        });
    });



});
</script>

@endsection