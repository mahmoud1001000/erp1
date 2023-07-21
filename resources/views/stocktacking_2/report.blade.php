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
    @component('components.widget', ['class' => 'box-primary','title' => 'عمليات الجرد : ' .$location->name])
        @can('stocktacking.liquidation')
          
        @endcan
        @can('stocktacking.report')
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="stocktacking_report">
                    <thead>
                        <tr>
                            <th>اسم المنتج  </th>
                            <th>اسم التباين</th>
                            <th>الرصيد الحالي </th>
                            <th>الرصيد عندالجرد </th>

                            <th>الكمية المدخلة في الجرد </th>
                            <th>فرق العدد </th>
                            <th>اسم الموظف</th>
                            <th>تاريخ جرد المنتج </th>
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
                    "url": "/stocktacking/report/{{$transaction_id}}",
                    "data": function ( d ) {
                        
                        d.category_id = $('#product_list_filter_category_id').val();
                        d.brand_id = $('#product_list_filter_brand_id').val();
                        d.current_stock= $("#product_list_filter_current_stock").val();
                       

                        d = __datatable_ajax_callback(d);
                    }
                },
                    columnDefs: [ {
                        "targets": [2],
                        "orderable": false,
                        "searchable": false
                    } ],
                    //['product_name', 'real_qty_available','variation_name','qty_available','first_name','created_at']
                    "columns":[
                       
                        { data: 'name', name: 'products.name'  },
                        
                        { data: 'variation_name', name: 'variations.name'  },
                        {"data":"current_stock"},
                        {"data":"qty_available",name:"vld.qty_available"},
                        {"data":"real_qty_available"},
                        {"data":"compare","searchable": false},
                        {"data":"first_name",name:"users.first_name"},
                        {"data":"created_at","searchable": false}
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

@endsection
