@extends('layouts.app')
@section('title', __( 'restaurant.kitchen' ))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>@lang('restaurant.kitchen')</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @component('components.filters', ['title' => __('report.filters')])
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('location_id',  __('purchase.business_location') . ':') !!}
                            {!! Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%']); !!}
                        </div>
                    </div>


                @endcomponent
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @component('components.widget', ['class' => 'box-primary'])

                    @if(auth()->user()->can('kitchen.create'))
                        <button type="button" class="btn btn-block btn-primary btn-modal" onclick="addkitchen()" style="max-width: 150px">
                            <i class="fa fa-plus"></i> @lang( 'messages.add' )</button>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="kitchen_table">
                            <thead>
                            <tr>
                                <th>@lang('business.location')</th>
                                <th>المطبخ</th>
                                <th>الوصف</th>
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
    <script>
 $(document).ready(function(){
            getdata();
        });
       
       function getdata(){
            var location_id=$('#location_id').val();
             $.ajax({
                url: '/modules/kitchen',
                type:'GET',
                data:{
                    location_id:location_id
                     },
                success: function(result) {
                   $('#datatable').html(result);
                }
            });
        }

        $('#location_id').on('change',function () {
            getdata();
        });

        function addkitchen() {
            $.ajax({
                url: '/modules/kitchen/create',
                dataType: 'html',
                success: function(result) {
                    $(".view_model").html(result)
                        .modal('show');
                },
            });
        }

        $(document).on('submit', 'form#kitchen_create', function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                method: 'POST',
                url:'/modules/kitchen/store',
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

        function edit(id) {
            $.ajax({
                url: '/modules/kitchen/edit/'+id,
                dataType: 'html',
                success: function(result) {
                    $(".view_model").html(result)
                        .modal('show');
                },
            });
        }

        $(document).on('submit', 'form#kitchen_edit', function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                method: 'POST',
                url:'/modules/kitchen/update',
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



        function  deleterow(id) {
            swal({
                title: LANG.sure,
                text: 'هل تريد حذف المطبخ',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then(willDelete => {
                if (willDelete) {
                    var href = '/modules/kitchen/delete/'+id;
                    var data = id;
                    $.ajax({
                        method: 'post',
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




@endsection