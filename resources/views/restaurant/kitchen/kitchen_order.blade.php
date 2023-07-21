@extends('layouts.restaurant')
@section('title', __( 'restaurant.kitchen' ))

@section('content')
    <style>
        .ordermark{
            background-color: #BB6C6C;
            color: #fff9f6;
            text-align: center;
            font-size: 1.6rem;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            @component('components.filters', ['title' => __('report.filters')])
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('kitchen', 'المطبخ' . ':') !!}
                        {!! Form::select('kitchen', $kitchen, null, ['class' => 'form-control select2', 'style' => 'width:100%']); !!}
                    </div>
                </div>
            @endcomponent
        </div>
    </div>
    <!-- Main content -->
    <section class="content ">
     <div class="box">
            <div class="box-header">
                <button type="button" class="btn btn-sm btn-primary pull-right" onclick="getdata()" id="refresh_orders"><i class="fas fa-sync"></i> @lang( 'restaurant.refresh' )</button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" >
                    <thead>
                    <tr style="background-color: #484444;color: #FFF;">
                        <th style="width: 40px">م</th>
                        <th>المطبخ</th>
                        <th>رقم الطلب</th>
                        <th>الطاولة</th>
                        <th>الصنف</th>
                        <th>الإضافات</th>
                        <th>ملاحظات</th>
                        <th>الكمية</th>
                        <th>حالة الطلب</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody  id="datatable">
                    </tbody>
                </table>
            </div>
            <div class="overlay hide">
                <i class="fas fa-sync fa-spin"></i>
            </div>
        </div>

    </section>
    <!-- /.content -->

@endsection

@section('javascript')
    <script >

        $(document).ready(function () {
            getdata();
        });


        function getdata(){
            var kitchen=$('#kitchen').val();
            $.ajax({
                url: '/modules/kitchen_order',
                type:'GET',
                data:{
                    kitchen:kitchen
                },
                success: function(result) {
                    $('#datatable').html(result);
                }
            });
        }

        $('#kitchen').on('change',function () {
            getdata();
        });


function setstatsu(id,order_id) {

    swal({
        title: LANG.sure,
        text: 'سوف يتم تغيير حالة الطلب ',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
    }).then(willDelete => {
        if (willDelete) {
            $.ajax({
                url: '/modules/setorderstatus',
                type: 'GET',
                data: {
                    id: id
                    , order_id: order_id
                },
                success: function (result) {
                    getdata();
                }
            });
        }

    });

}




    </script>
@endsection