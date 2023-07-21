@extends('layouts.app')
@section('title', 'جرد المخازن')

@section('content')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>أصناف تم زيادة الرصيد بعد الجرد   </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
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
                            <th>الرصيد الحالي</th>
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
                    ajax: "/stocktacking/report_plus/{{$transaction_id}}",
                    columnDefs: [ {
                        "targets": [4],
                        "orderable": false,
                        "searchable": false
                    } ],
                    //['product_name', 'real_qty_available','variation_name','qty_available','first_name','created_at']
                    "columns":[
                        {"data":"product_name"},
                        {"data":"variation_name"},
                        {"data":"qty_available"},
                        {"data":"current_stock"},
                        {"data":"real_qty_available"},
                        {"data":"compare"},
                        {"data":"first_name"},
                        {"data":"created_at"}
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
        
    });
    
    
</script>
<script></script>
@endsection
