@extends('layouts.app')
@section('title', ' الجرد')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>جرد المخازن وإدارة المخزون</h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>
<style>
    .bg-light-red{
        background-color: #ea2634 !important;
        color: #fff !important
    }
</style>
<!-- Main content -->
<section class="content">
    @component('components.widget', ['class' => 'box-primary', 'title' => 'عمليات الجرد'])
        @can('inventory.stocking_create')
            @slot('tool')
                <div class="box-tools">
                <button type="button" class="btn btn-block btn-primary add_transaction"
                                data-href="{{action('\Modules\Inventory\Http\Controllers\InventoryController@create')}}"
                                data-container=".div_modal">
                            <i class="fa fa-plus"></i> @lang( 'messages.add' )</button>
                </div>
            @endslot
        @endcan

            <div id="inventory_transactions"></div>

    @endcomponent

    <div class="modal fade div_modal" tabindex="-1" role="dialog"
    	aria-labelledby="gridSystemModalLabel">
    </div>


</section>
<!-- /.content -->
@stop
@section('javascript')
<script type="text/javascript">
    //Roles table
    $(document).ready( function(){
        gettransaction();
        
    });

 $(document).on('click', '.add_transaction', function(e) {
        e.preventDefault();
        var container = $(this).data('container');
        $.ajax({
            url: $(this).data('href'),
            dataType: 'html',
            success: function(result) {
                $(container)
                    .html(result)
                    .modal('show');
            },
        });
    });

 $(document).on('submit', 'form#store_stock', function(e) {
        e.preventDefault();
        var form = $(this);
        var data = form.serialize();
        var variation_id=$('#variation_id').val();
        $.ajax({
            method: 'POST',
            url: $(this).attr('action'),
            dataType: 'json',
            data: data,
            beforeSend: function(xhr) {
                __disable_submit_button(form.find('button[type="submit"]'));
            },
            success: function(result) {
                if (result.success == true) {
                    $('div.div_modal').modal('hide');
                    gettransaction();
                    toastr.success(result.msg);
                } else {
                    $('div.div_modal').modal('hide');
                    toastr.error(result.msg);

                }
            },
        });
    });

 function gettransaction() {
     $.ajax({
         type: 'GET',
         dataType: 'html',
         url: "{{action('\Modules\Inventory\Http\Controllers\InventoryController@index')}}",
          data: {
             '_token': ' <?php echo csrf_token() ?>',
         },
         success: function (result) {
               $('#inventory_transactions').html(result);

         }
 });
 }

function deletestock(transaction_id){
     swal({
            title: LANG.sure,
            text:'سوف يتم حذف فترة الجرد هل أنت متأكد',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then(willSave => {
            if (willSave) {
                 $.ajax({
                    type: 'GET',
                    url: "{{action('\Modules\Inventory\Http\Controllers\InventoryController@delete_stock')}}",
                    data: {
                        '_token': ' <?php echo csrf_token() ?>',
                        transaction_id:transaction_id,

                    },
                    success: function (result) {
                        if (result.success) {
                            toastr.success(result.msg);
                            gettransaction();
                        } else {
                            toastr.error(result.msg);
                        }
                    }
                });
            }
        });

    }
function changestatus(stat,transaction_id) {
        var text="سوف يتم غلق فترة الجرد ! هل أنت متأكد";
        if(stat==0)
            text="سوف يتم إعادة فتح فترة الجرد ! هل أنت متأكد";
        swal({
            title: LANG.sure,
            text:text,
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then(willSave => {
            if (willSave) {
                 $.ajax({
                    type: 'GET',
                    url: "{{action('\Modules\Inventory\Http\Controllers\InventoryController@changestatus')}}",
                    data: {
                        '_token': ' <?php echo csrf_token() ?>',
                        transaction_id:transaction_id,
                        status:stat
                    },
                    success: function (result) {
                        if (result.success) {
                             toastr.success(result.msg);
                            gettransaction();
                        } else {
                            toastr.error(result.msg);
                        }
                    }
                });
            }
        });
    }
    
    
</script>
@endsection
