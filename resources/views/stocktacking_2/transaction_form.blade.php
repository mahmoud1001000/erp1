@extends('layouts.app')
@section('title', 'جرد المخازن')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>جرد المخازن
      
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
    @component('components.widget', ['class' => 'box-primary', 'title' => ''])
    <div class="row">
    <div class="col-md-3">
                <div class="form-group">
                {!! Form::label('search_product', __('lang_v1.search_product') . ':') !!}
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-search"></i>
                        </span>
                        <input type="hidden" value="" id="variation_id">
                        {!! Form::text('search_product', null, ['class' => 'form-control', 'id' => 'search_product', 'placeholder' => __('lang_v1.search_product_placeholder'), 'autofocus']); !!}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                {!! Form::label('search_product', __('اخر منتج تم جرده') . ':') !!}
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-clock"></i>
                        </span>
                        <input type="text" readonly="readonly" class="form-control" value="{{$lastproduct->product_name}}" id="lastproduct" >
                    </div>
                </div>
            </div>
    </div>
            <!--
        <div class="form-group">
            <lable>المنتج</lable>
            <div class="form-group">
                <select class="form-control" name="variation_id" id="variation_id">
                    @foreach($variations as $row)
                        <option value="{{$row->id}}">{{$row->product_name }}- {{$row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="_table">
                    <thead>
                        <tr>
                            <th>اسم المنتج </th>
                           @can('stocktacking.show_qty_available')
                           <th>الكمية الحالية </th>
                           @endcan
                           <th>الكمية الموجودة</th>
                           
                            <th>@lang('messages.action' )</th>
                        </tr>
                    </thead>
                    <tbody id="product_form">
                        <tr>
                            <td>
                                <input type="text" class="form-control" id="product_name" >
                            </td>
                             @can('stocktacking.show_qty_available')
                            <td>
                                <input type="text" class="form-control" id="" >
                            </td>
                            @endcan
                            <td>
                                <input type="text" class="form-control" id="real_qty_available" >
                            </td>
                            
                        </tr>
                    </tbody>
                    <tfooter>
                        <tr>
                            <td colspan="3"></td>
                            <td>
                                
                             <button  class="btn btn-primary " id="save_button" > <i class="fa fa-water"></i> حفظ وتسوية</button>
                            </td>
                        </tr>
                    </tfooter>
                </table>
            </div>
       
    @endcomponent

    <div class="modal fade user_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->
@stop
@section('javascript')
<script type="text/javascript">
    //Roles table


  $('#variation_id').change(function(){

       var var_id = $('#variation_id').val();
       var product_name =$("#variation_id option:selected").html();
       //$('#product_name').val(product_name);
        $.ajax({
               type:'GET',
               url:"{{action('StocktackingController@transaction_ajax_get')}}",
               data:{
                     '_token' :' <?php echo csrf_token() ?>',
                     'variation_id':  var_id,
                     'transaction_id':{{$transaction_id}},

               },
               success:function(data) {
                  $("#product_form").html(data);
                  toastr.success('Done');
               }
            });

  });
  
</script>
@if(request()->get('var_id')>0)
<script>
    $(document).ready(function(){
        
        $('#variation_id').val({{request()->get('var_id')}});
         var var_id = $('#variation_id').val();
       var product_name =$("#variation_id option:selected").html();
       //$('#product_name').val(product_name);
        $.ajax({
               type:'GET',
               url:"{{action('StocktackingController@transaction_ajax_get')}}",
               data:{
                     '_token' :' <?php echo csrf_token() ?>',
                     'variation_id':  var_id,
                     'transaction_id':{{$transaction_id}},
               },
               success:function(data) {
                  $("#product_form").html(data);
                  toastr.success('Done');
               }
            });
         
    });
</script>
@endif
<script>
    $("#save_button").on('click',function(){

       var var_id = $('#variation_id').val();
       var product_name =$("#variation_id option:selected").html();
       //$('#product_name').val(product_name);
        $.ajax({
               type:'POST',
               url:"{{action('StocktackingController@transaction_ajax_post')}}",
               data:{
                     '_token' :' <?php echo csrf_token() ?>',
                     'variation_id':  var_id,
                     'transaction_id':{{$transaction_id}},
                     'real_qty_available': $('#real_qty_available').val(),
               },
               success:function(result) {
                 
                 
                  if(result.success == true){
                        toastr.success(result.msg);
                        get_last_product();
                    } else {
                        toastr.error(result.msg);
                    }
               }
            });
         
  }); 
</script>


<script>
    if ($('#search_product').length > 0) {
        $('#search_product').autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: '/purchases/get_products?check_enable_stock=false',
                    dataType: 'json',
                    data: {
                        term: request.term,
                    },
                    success: function(data) {
                        response(
                            $.map(data, function(v, i) {
                                if (v.variation_id) {
                                    return { label: v.text, value: v.variation_id };
                                }
                                return false;
                            })
                        );
                    },
                });
            },
            minLength: 2,
            select: function(event, ui) {
                $('#variation_id')
                    .val(ui.item.value)
                    .change();
                event.preventDefault();
                $(this).val(ui.item.label);
            },
            focus: function(event, ui) {
                event.preventDefault();
                $(this).val(ui.item.label);
            },
        });
    }

</script>
<script>
   function get_last_product(){
        $.ajax({
               type:'POST',
               url:"{{action('StocktackingController@get_last_product')}}",
               data:{
                     '_token' :' <?php echo csrf_token() ?>',
              
                     'transaction_id':{{$transaction_id}},
                   
               },
               success:function(result) {
                 
                     $("#lastproduct").val(result);
                  
               }
            });
         
   } 
</script>
@endsection
