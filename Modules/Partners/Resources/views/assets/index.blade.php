@extends('layouts.app')
@section('title','الأصول الثابتة')

@section('content')
    <style>
        .table-striped th{
            background-color: #626161;
            color: #ffffff;
        }
    </style>

    @include('partners::layouts.assetnav')

    <section class="content-header">
        <h1>الأصول الثابتة</h1>
    </section>

    <section class="content">
        @component('components.widget', ['class' => 'box-primary', 'title' =>'الأصول الثابتة الموجودة بالشركة'])
            @can('assets.create')
                @slot('tool')
                    <div class="box-tools">


                        {{-- <a href="{{action('\Modules\Partners\Http\Controllers\AssetsController@create')}}" class="btn btn-block btn-primary">
                             <i class="fa fa-plus"></i>@lang( 'messages.add' )
                         </a>--}}

                        <button type="button" class="btn btn-block btn-primary btn-modal"
                                data-href="{{action('\Modules\Partners\Http\Controllers\AssetsController@create')}}"
                                data-container=".brands_modal">
                            <i class="fa fa-plus"></i> @lang( 'messages.add' )</button>
                    </div>
                @endslot
            @endcan
            @can('assets.view')
                @php
                    $status=array(__('partners::lang.asset_Existing'),__('partners::lang.asset_consumed'),__('partners::lang.asset_sold'),__('partners::lang.asset_missing'));
                 @endphp
                <div class="table-responsive">
                    <table class="table table-bordered table-striped " id="assete_table">
                        <thead>
                        <tr>
                            <th>كود الأصل</th>
                            <th>الكمية</th>
                            <th>الوصف</th>
                            <th>تاريخ الإضافة</th>
                            <th>نوع الأصل</th>
                            <th>نسبة الإهلاك/الزيادة</th>
                         {{--   <th>سعر الشراء</th>--}}
                            <th>السعر الحالي</th>
                            <th>تاريخ التعديل</th>
                            <th>القيمة الحالية</th>

                            <th>حالة الأصل</th>
                            <th>الإجراء</th>
                        </tr>
                        </thead>
                        <tbody  id="datatable">
                        <?php $total=0; ?>
                        @foreach($assets as $asset)
                        <?php
                        if($asset->status==0 && $asset->currentvalue>0)
                           $total+=$asset->currentvalue ?>
                            <tr id="{{$asset->id}}">
                                <td>{{$asset->assetcode}}</td>
                                <td>{{$asset->quantity }}</td>
                                <td>{{$asset->description}}</td>
                                <td>{{$asset->purchasedate}}</td>
                                <td>@if($asset->type==1)
                                        @lang('partners::lang.asset_type_up')
                                    @else
                                        @lang('partners::lang.asset_type_consumed')
                                    @endif
                                </td>
                                <td>{{$asset->consume_rate}}%</td>
                                {{--<td>{{number_format($asset->price,2)}}</td>--}}
                                <td>{{number_format($asset->curentprice,2)}}</td>
                                <td>{{$asset->changedate}}</td>
                                <td>
                                    @if($asset->status==0)
                                        @if($asset->currentvalue>0)
                                           {{number_format($asset->currentvalue,2)}}
                                            @else
                                               {{00.00}}
                                            @endif

                                    @endif
                                </td>

                                <td>{{$status[$asset->status]}}</td>
                                <td>
                                    <button onclick="assetedit({{$asset->id}})"  class="btn btn-xs btn-primary btn-modal"><i class="glyphicon glyphicon-edit"></i> @lang("messages.edit")</button>
                                    <button onclick="deleteasset({{$asset->id}})" class="btn btn-xs btn-danger delete_asset_button"><i class="glyphicon glyphicon-trash"></i> @lang("messages.delete")</button>

                                </td>
                            </tr>
                        @endforeach

                        <tr id="0" >
                            <th colspan="6">الإجمالي : </th>

                            {{--<th>{{$price}}</th>--}}
                           <th>{{$curentprice}}</th>
                            <th></th>
                            <th>{{number_format($total,2)}}</th>
                            <th colspan="2"></th>


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
            url: '/partners/assets/'+id+'/edit',
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
            text: 'هل تريد حذف الأصل',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then(willDelete => {
            if (willDelete) {
                var href = '/partners/assets/'+id;
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

