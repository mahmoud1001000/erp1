@extends('layouts.app')
@section('title', __('lang_v1.sell_return'))
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header no-print">
    <h1>@lang('lang_v1.sell_return')
    </h1>
    <div class="row">
        @if (\Session::has('erorr'))
            <div class="alert alert-danger">
                <ul>
                    <li><?php $m=\Session::get('erorr') ; echo $m ; ?></li>
                </ul>
            </div>
        @endif
        <div class="col-md-4">
            <form action="/sell-return-transaction" method="get">
                @csrf
                <div class="form-group">
                    <label>رقم الفاتورة</label>
                    <input  name="inv_id" class="form-control" type="text" id="invoice_id" placeholder="رقم الفاتورة ">
                </div>
                <div class="form-group">
                      <input type="submit" class="btn btn-primary" value="مرتجع بيع">

                </div>
            </form>
        </div>
    </div>

</section>
<script>
    $(document).ready(function(){
       $("#invoice_id").keyup(function(){
           debugger;
           var invid=$("#invoice_id").val();
           var newUrl='/sell-return/add/' + invid;
           $("#link_return").attr("href", newUrl);
           
       }); 
    });
</script>
<!-- Main content -->
<section class="content no-print">
    
</section>


	
@endsection