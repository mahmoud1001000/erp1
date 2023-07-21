@extends('layouts.app')
@section('title', 'جرد المخازن')

@section('content')
@include('stocktacking.navbar')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


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
    @include('stocktacking.product_filter')
    @component('components.widget', ['class' => 'box-primary', 'title' => ' منتجات لم يتم جردها'])
        @can('stocktacking.liquidation')
           
        @endcan
        
        @can('stocktacking.report')
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="stocktacking_report">
                    <thead>
                        <tr>
                            <th>اجراء</th>
                            <th>اسم المنتج  </th>
                            <th>اسم التباين</th>
                            <th>الكمية الحاليه في المخزون </th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        @endcan
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
    $(document).ready( function(){
        var users_table = $('#stocktacking_report').DataTable({
                    processing: true,
                    serverSide: true,
                  
                    "ajax": {
                    "url": "/stocktacking/not-tacking-report/{{$transaction_id}}",
                    "data": function ( d ) {
                        
                        d.category_id = $('#product_list_filter_category_id').val();
                        d.brand_id = $('#product_list_filter_brand_id').val();
                        d.current_stock= $("#product_list_filter_current_stock").val();
                       

                        d = __datatable_ajax_callback(d);
                        }
                    },
                    columnDefs: [ {
                       
                    } ],
                    //['product_name', 'real_qty_available','variation_name','qty_available','first_name','created_at']
                    "columns":[
                        {"data":"action"},
                        {"data":"name"},
                        {"data":"variation_name","searchable": false},
                        {"data":"qty_available","searchable": false}
                       
                    ]
                });
        $(document).on('click', '#Stock_liquidation', function(){
            swal({
              title: LANG.sure,
              text: 'سيتم تصفية المخزون طبقا للكميات الواردة في الجرد ولن تتمكن من الرجوع مرة اخري',
              icon: "warning",
              buttons: true,
              dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                  debugger;
                    $.ajax({
                        type: "POST",
                          url:"{{action('StocktackingController@Stock_liquidation')}}",
                       
                        data: {
                            '_token' :' <?php echo csrf_token() ?>',
                            'transaction_id':{{$transaction_id}},
                        },
                        success: function(result){
                            if(result.success == true){
                                toastr.success(result.msg);
                                users_table.ajax.reload();
                            } else {
                                toastr.error(result.msg);
                            }
                        }
                    });
                }
             });
        });
        $(document).on('change', '#product_list_filter_current_stock,#product_list_filter_type, #product_list_filter_category_id, #product_list_filter_brand_id, #product_list_filter_unit_id, #product_list_filter_tax_id, #location_id, #active_state, #repair_model_id', 
                function() {
                   
                        users_table.ajax.reload();
                  
            });
        
    });
    
    
</script>
<script></script>
@endsection
