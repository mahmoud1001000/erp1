@extends('layouts.app')
@section('title','الشركاء')

@section('content')
    <style>
        .table-striped th{
            background-color: #626161;
            color: #ffffff;
        }
    </style>

    @include('partners::layouts.nav')

    <section class="content-header">
        <h1>الشركاء</h1>
    </section>

    <section class="content">
        @component('components.widget', ['class' => 'box-primary', 'title' =>''])
            @can('assets.create')
                @slot('tool')
                    <div class="box-tools">


                        {{-- <a href="{{action('\Modules\Partners\Http\Controllers\AssetsController@create')}}" class="btn btn-block btn-primary">
                             <i class="fa fa-plus"></i>@lang( 'messages.add' )
                         </a>--}}

                        <button type="button" class="btn btn-block btn-primary btn-modal"
                                data-href="{{action('\Modules\Partners\Http\Controllers\PartnersController@create')}}"
                                data-container=".brands_modal">
                            <i class="fa fa-plus"></i> @lang( 'messages.add' )</button>
                    </div>
                @endslot
            @endcan
            @can('assets.view')
                @php
                    $status=array('','جديد','مستعمل','مستهلك');
                @endphp
                <div class="table-responsive">
                    <table class="table table-bordered table-striped " id="assete_table">
                        <thead>
                        <tr>
                            <th>الإسم</th>
                            <th>العنوان</th>
                            <th>رقم التليفون </th>
                            <th>عدد الأسهم </th>
                            {{--<th> قيمة المسحوبات</th>--}}
                            <th>الإجراء</th>
                        </tr>
                        </thead>
                        <tbody  id="datatable">
                        @foreach($partners as $partner)
                            <tr>
                                <td colspan="6">{{$partner->TABLE_NAME}}</td>

                                {{-- <td>0</td>--}}

                            </tr>
                        @endforeach

                        <tr id="0" >
                            <th colspan="3">الإجمالي : </th>

                            <th></th>
                            {{--<th>0</th>--}}

                            <th colspan="1"></th>

                        </tr>
                        </tbody>

                    </table>
                </div>


            @endcan
        @endcomponent



    </section>

    <div class="modal fade brands_modal" tabindex="-1" role="dialog"
         aria-labelledby="gridSystemModalLabel">
    </div>
@endsection

<script>

    function assetedit(id) {
        $.ajax({
            url: '/partners/partners/'+id+'/edit',
            dataType: 'html',
            success: function(result) {
                $(".brands_modal").html(result)
                    .modal('show');
            },
        });
    }


    function  deleteasset(id) {
        swal({
            title: LANG.sure,
            text: 'هل تريد حذف الشريك',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then(willDelete => {
            if (willDelete) {
                var href = '/partners/partners/'+id;
                var data = id;
                $.ajax({
                    method: 'DELETE',
                    url: href,
                    dataType: 'json',
                    data:{
                        data:data
                    },
                    success: function(result) {
                        if (result.success == true) {
                            toastr.success(result.msg);
                            var drow = document.getElementById(id);
                            drow.parentNode.removeChild(drow);
                        } else {
                            toastr.error(result.msg);
                        }
                    },
                });
            }
        });
    }

</script>

