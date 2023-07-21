@extends('layouts.app')
@section('title', __('sale.products'))

@section('content')
    <style>
        .table-bordered th{
            background-color: #626161;
            color: #ffffff;
        }
    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>@lang('lang_v1.morebarcode') : </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
        <input type="hidden" name="productid" id="productid" value="{{$product->id}}" class="form-control">

        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="name">المنتج : </label>
                    <input type="text" name="name" id="name" value="{{$product->name}}" class="form-control">
                </div>
            </div>
         </div>

        <div style="margin: auto; margin-top: auto;margin-top: 20px;border: 1px solid;padding: 20px;border-radius: 10px;background-color: #FFFF;" >
            <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="barcode">الباركود : </label>
                        <input type="text" name="barcode" id="barcode" value="" class="form-control">
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('barcode_type', __('product.barcode_type') . ':*') !!}
                        {!! Form::select('barcode_type', $barcode_types,  $barcode_default, ['class' => 'form-control', 'required']); !!}
                    </div>
                </div>

                <div class="col-md-3">
                    @if($product->type=='single')
                        <input type="hidden" value="{{$variation}}" id="variation">
                    @endif
                    @if($product->type=='variable')
                        <div class="form-group">
                            {!! Form::label('type', __('product.product_type') . ':') !!}
                            {!! Form::select('variation', $variation, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'variation']); !!}
                        </div>
                    @endif
                </div>

            </div>
            <button type="button" onclick="savebarcode(0)"  class="btn  btn-primary btn-modal"><i class="glyphicon glyphicon-new-window"></i> @lang("messages.add")</button>
            <a href="/labels/show?product_id={{$product->id}}" class="btn  btn-danger" data-toggle="tooltip" title="" data-original-title="طباعة الرمز الشريطي / الملصق"><i class="fa fa-print"></i> طباعة الباركود</a>
        </div>
<br><br>
        <div class="table-responsive">
               <table class="table table-bordered  " style="max-width: 600px" >
                   <tr>
                       <th style="max-width: 200px">المنتج</th>
                       <th style="max-width: 100px"> الباركود</th>
                       <th style="max-width: 250px"></th>
                   </tr>
                   <tbody  id="datatable">



                   </tbody>
               </table>

                    </div>
    </section>




@endsection

 @section('javascript')

     <script type="text/javascript">
         $(document).ready( function() {
             getdata();
         });

         function savebarcode(id) {
             var barcode=$('#barcode').val();
             if(barcode.trim()==''){
                 toastr.error('عفوا برجاء إدخال الباركود');
                 return true;
             }
             var barcode_type=$('#barcode_type').val();
             var productid=$('#productid').val();
             var variation=$('#variation').val();
             if(variation==0){
                 toastr.error('عفوا برجاء المنتج');
                 return true;
             }
             $.ajax({
                 url:'/products/savebarcode',
                 type:'GET',
                 data: {
                     barcode:barcode
                     ,id:id
                     ,productid:productid
                     ,barcode_type:barcode_type
                     ,variation:variation
                 },
                 success: function (data) {
                     if(data['success']==1){
                         toastr.success(data['msg']);
                         $('#barcode').val('');
                         getdata();
                     }

                     else
                         toastr.error(data['msg'])
                 },



             });

         }

         function updatebarcode(id) {
           /*Update barcode in variation  */
             var barcode=$('#barcode_'+id).val();
             if(barcode.trim()==''){
                 toastr.error('عفوا برجاء إدخال الباركود');
                 return true;
             }

             var productid=$('#productid').val();
             $.ajax({
                 url:'/products/updatebarcode',
                 type:'GET',
                 data: {
                     barcode:barcode
                     ,id:id
                     ,variation_id:id
                     ,productid:productid

                 },
                 success: function (data) {
                     if(data['success']==1){
                         toastr.success(data['msg']);
                         $('#barcode').val('');
                         getdata();
                     }

                     else
                         toastr.error(data['msg'])
                 },



             });

         }

         function updatebarcode2(id) {

             /*for Product_barcode*/
             var barcode=$('#barcode_'+id).val();
             if(barcode.trim()==''){
                 toastr.error('عفوا برجاء إدخال الباركود');
                 return true;
             }

             var productid=$('#productid').val();
             $.ajax({
                 url:'/products/updatebarcode2',
                 type:'GET',
                 data: {
                     barcode:barcode
                     ,id:id
                     ,variation_id:id
                     ,productid:productid

                 },
                 success: function (data) {
                     if(data['success']==1){
                         toastr.success(data['msg']);
                         $('#barcode').val('');
                         getdata();
                     }

                     else
                         toastr.error(data['msg'])
                 },



             });

         }

         function getdata() {
             var productid=$('#productid').val();

             $.ajax({
                 url:'/products/getproductbarcode',
                 type:'GET',
                 data:{
                     productid:productid

                 },
                 success: function (data){
                     document.getElementById("datatable").innerHTML = data;
                 }
             });
         }

         function deletdata(id) {
             swal({
                 title: LANG.sure,
                 text: 'هل تريد حذف الباركود',
                 icon: 'warning',
                 buttons: true,
                 dangerMode: true,
             }).then(willDelete => {
                 if (willDelete) {
                      $.ajax({
                        type: 'GET',
                         url:'/products/deletebarcode',
                         dataType: 'json',
                         data: {
                            id: id
                         },
                         success: function (result) {
                             if (result.success == 1) {
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