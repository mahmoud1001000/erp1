@extends('layouts.app')
@section('title', __( 'restaurant.kitchen' ))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>أصناف المطابخ</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @component('components.filters', ['title' => __('report.filters')])


                    <div class="col-md-2">
                        <div class="form-group">
                            {!! Form::label('kitchen','المطبخ' . ':') !!}
                            {!! Form::select('kitchen', $kitchen, null, ['class' => 'form-control select2', 'style' => 'width:100%']); !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('search','إبحث هنا' . ':') !!}
                          <input type="text" class="form-control " name="search" id="search">
                        </div>
                    </div>




                @endcomponent
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                @component('components.widget', ['class' => 'box-primary'])
           <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="kitchen_table">
                            <thead>
                            <tr>
                                <th>@lang('business.location')</th>
                                <th>المطبخ</th>
                                <th>الصنف</th>
                                 <th></th>

                            </tr>
                            </thead>
                            <tbody  id="datatable">
                            </tbody>
                        </table>
                    </div>
                @endcomponent
            </div>
        </div>

    </section>

    <div class="modal fade  view_model" tabindex="-1" role="dialog"
         aria-labelledby="gridSystemModalLabel">
    </div>


@stop
@section('javascript')
    @php $asset_v = env('APP_VERSION'); @endphp
    <script src="{{ asset('js/product.js?v=' . $asset_v) }}"></script>
    <script>

	 $(document).ready(function(){
           getdata();
        }); 

        
        function getdata(){
            var kitchen_id=$('#kitchen').val();
            var search=$('#search').val();
            $.ajax({
                url: '/modules/kitchen_products',
                type:'GET',
                data:{
                    kitchen_id:kitchen_id
                    ,search:search
                },
                success: function(result) {
                    $('#datatable').html(result);
                }
				
				
            });
        }

        $('#kitchen').on('change',function () {
            getdata();
        });
        $('#search').on('keyup',function () {
            getdata();
        });

        function addproduct(id) {
            $.ajax({
                url: '/modules/kitchen/product_add',
                dataType: 'html',
                data:{
                    id:id
                },

                success: function(result) {
                    $(".view_model").html(result)
                        .modal('show');
                },
            });
        }

        $(document).on('submit', 'form#addproduct', function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                method: 'POST',
                url:'/modules/kitchen/addtokitchen',
                dataType: 'json',
                data: data,
                success: function(result) {
                    if (result.success == true) {
                        $(".view_model").modal('hide');
                        toastr.success(result.msg);
                        getdata();
                    } else {
                        toastr.error(result.msg);
                    }
                },
            });

        });


        function addtokitchen(kitchen_id,product_id) {
             var kitchen_id=$('#kitchen1').val();

            $.ajax({
                url: '/modules/kitchen/addtokitchen',
                type:'GET',
                data:{
                    kitchen_id:kitchen_id
                    ,product_id:product_id
                },
                success: function(result) {
                    toastr.success(result);
                }
            });
        }





        function removefromkitchen(id) {
            swal({
                title: LANG.sure,
                text: 'هل تريد حذف  الصنف المطبخ',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then(willDelete => {
                if (willDelete) {
                    var href = '/modules/kitchen/removefromkitchen/'+id;
                    var data = id;
                    $.ajax({
                        method: 'post',
                        url: href,
                        dataType: 'json',
                        data:{
                            data:id
                        },
                        success: function(result) {
                            if (result.success == true) {
                                toastr.success(result.msg);
                               getdata();
                            } else {
                                toastr.error(result.msg);
                            }
                        },
                    });
                }
            });
        }

    </script>




@endsection