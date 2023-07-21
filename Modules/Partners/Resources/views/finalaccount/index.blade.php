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
        <h1>الحساب الختامي</h1>
    </section>

    <section class="content">
        @component('components.widget', ['class' => 'box-primary', 'title' =>''])
            @can('assets.create')
                @slot('tool')



                        <div class="row">
                            <div class="col-lg-2 col-md-3">
                                <div class="form-group">
                                    {!! Form::label('startdate','عن المدة من  :') !!}
                                    {!! Form::text('startdate', null, ['class' => 'form-control startdate', 'required', 'placeholder' =>'بداية المدة' ]); !!}
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3">
                                <div class="form-group">
                                    {!! Form::label('enddate','إلي  :') !!}
                                    {!! Form::text('enddate', null, ['class' => 'form-control enddate', 'required', 'placeholder' =>'نهاية المدة' ]); !!}
                                </div>
                            </div>
                        </div>

                    <div class="box-tools">
                        <button type="button" class="btn btn-block btn-primary " onclick="addnew()" >
                            <i class="fa fa-plus"></i> @lang( 'messages.add' )
                        </button>
                    </div>


                @endslot
            @endcan

            @can('assets.view')

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped " >
                            <thead>
                            <tr>
                                <th>قيمة الأرباح</th>
                                <th>الفترة من</th>
                                <th>إلي </th>
                                <th>عدد الأسهم </th>
                                <th> قيمة السهم</th>
                                <th>ملاحظات</th>
                                <th>الإجراء</th>
                            </tr>
                            </thead>
                            <tbody  id="datatable">

                            </tbody>

                        </table>
                    </div>

                <hr>
                <h3>حسابات الشركاء</h3>
                <div class="table-responsive" >
                    <table class="table table-bordered table-striped " >
                        <thead>
                        <tr>
                            <th>الإسم</th>
                            <th>العنوان</th>
                            <th>رقم التليفون </th>
                            <th>عدد الأسهم </th>
                            <th>رصيد دائن </th>
                            <th>رصيد مدين </th>


                        </tr>
                        </thead>
                        <tbody >
                       @foreach($partners as $partner)
                            <tr id="{{$partner->id}}">
                                <td>{{$partner->name}}</td>
                                <td>{{$partner->address }}</td>
                                <td>{{$partner->mobile}}</td>
                                <td>{{$partner->share}}</td>
                                <td>@if($partner-> value<0) {{abs($partner-> value)}} @endif</td>
                                <td>@if($partner-> value>0) {{abs($partner-> value)}} @endif</td>


                            </tr>
                        @endforeach

                      <tr id="0" >
                            <th colspan="3">الإجمالي : </th>

                            <th>{{$totalshare}}</th>
                            <th>{{--{{$totalval}}--}}</th>
                            <th>{{--{{$totalval}}--}}</th>



                        </tr>
                        </tbody>

                    </table>
                </div>


            @endcan
        @endcomponent



    </section>

    <div class="modal fade datamodal" tabindex="-1" role="dialog"
         aria-labelledby="gridSystemModalLabel" id="modeldialog" >
@endsection


@section('javascript')

<script>

    
$(document).ready(function(){
	   getdata();
});

    /* function to call creat blade*/
    function addnew() {
        $.ajax({
            url: '/partners/finalaccount/create',
            dataType: 'html',
            success: function(result) {
                $('#modeldialog')
                    .html(result)
                    .modal('show');
            },
        });
    }
   /* when submit form in creat balde*/
    $(document).on('submit', 'form#addnew', function(e) {
        e.preventDefault();
        $(this)
            .find('button[type="submit"]')
            .attr('disabled', true);
        var data = $(this).serialize();

        $.ajax({
            method: 'POST',
            url: $(this).attr('action'), //
            dataType: 'json',
            data: data,
            success: function(result) {
                if (result.success == true) {
                    $('#modeldialog').modal('hide');
                    toastr.success(result.msg);
                    getdata();

                } else {
                    toastr.error(result.msg);
                }
            }

        });
    });
   /* End add new*/

     /* Open edit blade*/
     function edit(id) {
         $.ajax({
             url: '/partners/finalaccount/'+id+'/edit',
             dataType: 'html',
             success: function(result) {
                 $("#modeldialog").html(result)
                     .modal('show');
             },
         });
     }
     $(document).on('submit', 'form#edit', function(e) {
         e.preventDefault();
         $(this)
             .find('button[type="submit"]')
             .attr('disabled', true);
         var data = $(this).serialize();

         $.ajax({
             method: 'POST',
             url: $(this).attr('action'), //
             dataType: 'json',
             data: data,
             success: function(result) {
                 if (result.success == true) {
                     $('#modeldialog').modal('hide');
                     toastr.success(result.msg);
                     getdata();

                 } else {
                     toastr.error(result.msg);
                 }
             }

         });
     });
     /* End Edit*/


     /*Delete */
     function deleterec(id) {
         swal({
             title: LANG.sure,
             text: 'هل تريد حذف العملية',
             icon: 'warning',
             buttons: true,
             dangerMode: true,
         }).then(willDelete => {
             if (willDelete) {
                 var href = '/partners/finalaccount/' + id;
                 var data = id;
                 $.ajax({
                     method: 'DELETE',
                     url: href,
                     dataType: 'json',
                     data: {
                         data: data
                     },
                     success: function (result) {
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

     function distribution(id) {
         swal({
             title: LANG.sure,
             text: 'سوف يتم عمل إيداع بالقيمة في حساب كل شريك  هل أنت متأكد ؟',
             icon: 'warning',
             buttons: true,
             dangerMode: true,
         }).then(willDelete => {
             if (willDelete) {
                 var href = '/partners/distribution/'+id;
              $.ajax({
                     method: 'POST',
                     url: href,
                     data: {
                         id: id
                     },
                     success: function (result) {
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



    function getdata(){
        var startdate=$('#startdate').val();
        var enddate=$('#enddate').val();
        $.ajax({
            url:'/partners/finalaccount',
            method: 'GET',
            data:{
                startdate:startdate
                ,enddate:enddate
            },
            success: function(result) {
                  document.getElementById("datatable").innerHTML =result;
         },
            error: function (data) {
                // Something went wrong
                // HERE you can handle asynchronously the response

                // Log in the console
                var errors = data.responseJSON;
                console.log(errors);

                // or, what you are trying to achieve
                // render the response via js, pushing the error in your
                // blade page
                errorsHtml = '<div class="alert alert-danger"><ul>';

                $.each(errors.error, function (key, value) {
                    errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                });
                errorsHtml += '</ul></div>';

                $('#form-errors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            }

        });
    }



    $(document).on('keypress', '.decimal', function (event) {
            "use strict";
            if ($(this).val().includes('.') && event.keyCode === 46)
                return false;
            var key = window.event ? event.keyCode : event.which;
            if (event.keyCode === 8 || event.keyCode === 46) {
                return true;
            } else if (key < 48 || key > 57) {
                return false;
            } else {
                return true;
            }

        });

    function save(id) {

        var value=$('#rem_'+id).val();
        if(value===''){
            toastr.error('عفوا برجاء إدخال القيمة');
            $('#rem_'+id).focus();
            return true;
        }

        //add pyament
        var data='this is data'
            $.ajax({
                url: '/partners/finalaccount',
                method: 'POST',
                 data: {
                     partner_id:id
                     ,value:$('#rem_'+id).val()

                },
                success: function (result) {

                        toastr.success(result.msg);

                },
                error: function (data) {
            // Something went wrong
            // HERE you can handle asynchronously the response

                    toastr.error('عفوا لقد حدث خطأ');
            // Log in the console
            var errors = data.responseJSON;
            console.log(errors);

            // or, what you are trying to achieve
            // render the response via js, pushing the error in your
            // blade page
            errorsHtml = '<div class="alert alert-danger"><ul>';

            $.each(errors.error, function (key, value) {
                errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
            });
            errorsHtml += '</ul></div>';

            $('#form-errors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form


        }
            });


    }

    $(function() {
            $('.startdate, .enddate').datepicker({
                beforeShow: customRange,
                format:'yyyy-m-d',
            });
        });

    function customRange(input) {
          if (input.id == 'enddate') {
                var minDate = new Date($('#startdate').val());
                minDate.setDate(minDate.getDate() + 1)
                return {  minDate: minDate};
            }else{
                var maxDate=new Date($('#enddate').val());
                maxDate.setDate(maxDate.getDate()-1);
                return { maxDate:maxDate};
            }
        }

</script>

@endsection

