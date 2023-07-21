@extends('layouts.app')
@section('title', __('business.business_settings'))

@section('content')
<div class="content" style="background: white;">
    <div class="box box-solid">
    <form action="{{action('BusinessController@store_company')}}" method="POST" class="row">
            @csrf
            <div class="form-group col-md-4">
                {!! Form::label('stock_expiry_alert_days', __('اسم شركة الشحن') . ':*') !!}
                <div class="input-group"  style="width: 100%;">
              
                {!! Form::text('name', null, ['class' => 'form-control','required']); !!}
                            
                </div>
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('stock_expiry_alert_days', __(' رقم الموبايل') . ':*') !!}
                <div class="input-group"  style="width: 100%;">
              
                {!! Form::text('mobile', null, ['class' => 'form-control','required']); !!}
                            
                </div>
            </div>
            <div class="form-group col-md-2">
                <br>
                <input class="btn btn-primary" type='submit' value="حفظ">
            </div>
            <div class="col-md-2"></div>
    </form>

<div class="row">
    <div class="col-md-3">
        <input id="txt_searchall" class="form-control" value="" type="text" placeholder="بحث">
    </div>
</div>
</div>
    <div class="box box-primary">
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-striped" >
                        <thead class="thead-dark">
                            <tr style="background: black;color: white;">
                                <td>اسم الشركة</td>
                                <td>رقم الموبايل</td>
                                <td>حذف</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                 <td>{{$row->mobile}}</td>
                                <td><a class="btn btn-danger" href="/business/delete_company/{{$row->id}}" ><i class="fa fa-trash"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function(){

  // Search all columns
  $('#txt_searchall').keyup(function(){
    // Search Text
    var search = $(this).val();

    // Hide all table tbody rows
    $('table tbody tr').hide();

    // Count total search result
    var len = $('table tbody tr:not(.notfound) td:contains("'+search+'")').length;

    if(len > 0){
      // Searching text in columns and show match row
      $('table tbody tr:not(.notfound) td:contains("'+search+'")').each(function(){
        $(this).closest('tr').show();
      });
    }else{
      $('.notfound').show();
    }

  });

  // Search on name column only
  $('#txt_name').keyup(function(){
    // Search Text
    var search = $(this).val();

    // Hide all table tbody rows
    $('table tbody tr').hide();

    // Count total search result
    var len = $('table tbody tr:not(.notfound) td:nth-child(2):contains("'+search+'")').length;

    if(len > 0){
      // Searching text in columns and show match row
      $('table tbody tr:not(.notfound) td:contains("'+search+'")').each(function(){
         $(this).closest('tr').show();
      });
    }else{
      $('.notfound').show();
    }

  });

});

// Case-insensitive searching (Note - remove the below script for Case sensitive search )
$.expr[":"].contains = $.expr.createPseudo(function(arg) {
   return function( elem ) {
     return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
   };
});
</script>
@endsection