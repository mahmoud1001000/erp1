
<?php $__env->startSection('title', 'جرد المخازن'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .span_success{
        color: #A60C0C;
        font-size: 17px;
        font-weight: bold;
    }

</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>  جرد المخزن :
      <?php echo e($transaction->name, false); ?>

    </h1>

</section>

<!-- Main content -->
<section class="content">
    <input type="hidden" id="transaction_id" value="<?php echo e($transaction_id, false); ?>">
    <input type="hidden" id="location_id" value="<?php echo e($location_id, false); ?>">

    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
                <div class="col-md-3" >
                    <div class="form-group">
                        <?php echo Form::label('type', __('product.product_type') . ':'); ?>

                        <?php echo Form::select('type', ['single' => __('lang_v1.single'), 'variable' => __('lang_v1.variable'), 'combo' => __('lang_v1.combo')], null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_type', 'placeholder' => __('lang_v1.all')]); ?>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('category_id', __('product.category') . ':'); ?>

                        <?php echo Form::select('category_id', $categories, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_category_id', 'placeholder' => __('lang_v1.all')]); ?>

                    </div>
                </div>

                <div class="col-md-3"  >
                    <div class="form-group">
                        <?php echo Form::label('unit_id', __('product.unit') . ':'); ?>

                        <?php echo Form::select('unit_id', $units, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_unit_id', 'placeholder' => __('lang_v1.all')]); ?>

                    </div>
                </div>

                <div class="col-md-3" >
                    <div class="form-group">
                        <?php echo Form::label('brand_id', __('product.brand') . ':'); ?>

                        <?php echo Form::select('brand_id', $brands, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_brand_id', 'placeholder' => __('lang_v1.all')]); ?>

                    </div>
                </div>



                <div class="col-md-3" >
                    <div class="form-group">
                        <?php echo Form::label('current_stock',__('report.current_stock'). ':'); ?>

                        <?php echo Form::select('current_stock', ['zero' =>'Zero', 'gtzero' => 'اكبر من الصفر','lszero' => 'اقل من الصفر'], null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_current_stock', 'placeholder' => __('lang_v1.all')]); ?>

                    </div>
                </div>
               <div class="col-md-3 hidden">
                    <div class="form-group">
                        <?php echo Form::label('price',__('lang_v1.default_selling_price'). ':'); ?>

                        <div class="input-group">
                            <input type="text" class="form-control " id="default_selling_price" name="default_selling_price" value="">
                            <span class="input-group-btn">
                        <button type="button" class="btn btn-default bg-white btn-flat btn-modal"  title="<?php echo app('translator')->get('unit.add_unit'); ?>" ><i class="fa fa-search text-primary fa-lg"></i></button>
                    </span>
                        </div>

                    </div>
                </div>
                <div class="col-md-3" >
                    <div class="form-group">
                        <?php echo Form::label('stock_status',__('inventory::lang.stoking_status'). ':'); ?>

                         <select class="form-control select2" name="stock_status" id="stock_status">
                            <option value="0"> الكل</option>
                            <option value="1"><?php echo app('translator')->get('inventory::lang.stoking_product'); ?></option>
                            <option value="2"> <?php echo app('translator')->get('inventory::lang.not_stoking_product'); ?></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 hidden " id="filter_date_range">
                    <div class="form-group">
                        <?php echo Form::label('sell_list_filter_date_range', __('report.date_range') . ':'); ?>

                        <?php echo Form::text('sell_list_filter_date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'readonly']); ?>

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('price','إسم المنتج - الكود'); ?>

                        <div class="input-group" >
                            <span  class="input-group-addon">
                                 <i class="fa fa-search text-primary fa-lg" aria-hidden="true"></i>
                            </span>
                            <input type="text" class="form-control " id="searchtext" name="searchtext" value="">

                        </div>

                        </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <label>عدد العناصر</label>
                       <select class="form-control" id="pagsize">
                           <option value="25">25</option>
                           <option value="50">50</option>
                           <option value="100">100</option>
                           <option value="300">300</option>
                           <option value="999999">الكل</option>
                       </select>
                    </div>
                </div>
            <?php echo $__env->renderComponent(); ?>

        </div>
    </div>

    <div  id="products" style="background-color:white;border-radius: 10px;padding:10px 5px">

        <div class="table-responsive" style="background-color: white">
            <table class="table table-bordered table-striped"  style="width: 1300px;margin: auto" >
                <thead>
                <tr>
                    <th>م </th>
                    <th> المنتج</th>
                    <th> الكود</th>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('inventory.showprice')): ?>
                        <th> سعر الشراء</th>
                        <th> سعر البيع</th>
                    <?php endif; ?>
                    <th> تاريخ الجرد</th>
                    <th> المستخدم</th>
                    <th> الرصيد </th>
                    <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                </tr>
                </thead>
                <tbody id="datatablebody">

                </tbody>
            </table>
        </div>
        <div id="getmore" style="margin: auto;margin-top: 10px" >
            <button class="btn btn-success" onclick="getproducts()"> <?php echo app('translator')->get('inventory::lang.get_more'); ?> </button>
            <button class="btn btn-danger" onclick="getallproducts()"> <?php echo app('translator')->get('inventory::lang.get_all'); ?> </button>
        </div>
    </div>


    <input type="hidden" value="0" id="offset">
    <div class="modal fade user_modal" tabindex="-1" role="dialog"
    	aria-labelledby="gridSystemModalLabel">
    </div>

    <div class="modal fade stocking" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">


    </div>


</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    $(document).ready( function() {
        //Date range as a button
        $('#sell_list_filter_date_range').daterangepicker(
            dateRangeSettings,
            function (start, end) {
                $('#sell_list_filter_date_range').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
                $('#offset').val(0);
                $('#datatablebody').html('');
                getproducts();
            }
        );
        $('#sell_list_filter_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $('#sell_list_filter_date_range').val('');
            $('#offset').val(0);
            $('#datatablebody').html('');
            getproducts();
        });
    });

    $(document).ready( function(){
        getproducts();

    });

    $("#save_button").on('click',function(){
       var var_id = 0;
       var product_name =$("#variation_id option:selected").html();
       //$('#product_name').val(product_name);
        $.ajax({
               type:'POST',
               url:"<?php echo e(action('\Modules\Inventory\Http\Controllers\InventoryController@stock_line_save'), false); ?>",
               data:{
                     '_token' :' <?php echo csrf_token() ?>',
                     'variation_id':  var_id,
                     'transaction_id':<?php echo e($transaction_id, false); ?>,
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

    function getallproducts() {
        $('#pagsize').val(999999).select();
        getproducts();
    }
    function  getproducts() {
        if($('#sell_list_filter_date_range').val()) {
            var start = $('#sell_list_filter_date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
            var end = $('#sell_list_filter_date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');

        }
        var offset=$('#offset').val();
        var pagsize=$('#pagsize').val();
        var searchtext=$('#searchtext').val();

        $.ajax({
            type:'get',
            url:"<?php echo e(action('\Modules\Inventory\Http\Controllers\InventoryController@stocking'), false); ?>",
            data: {
                  type : $('#product_list_filter_type').val(),
                  category_id : $('#product_list_filter_category_id').val(),
                   brand_id : $('#product_list_filter_brand_id').val(),
                   unit_id : $('#product_list_filter_unit_id').val(),
                   current_stock:$("#product_list_filter_current_stock").val(),
                   default_selling_price:$("#default_selling_price").val(),
                   id:<?php echo e($transaction_id, false); ?>,
                   stock_status:$('#stock_status').val(),
                   start_date:start,
                   end_date:end,
                   pagsize:pagsize,
                   offset:offset,
                  searchtext:searchtext

            },
            success:function(result) {
                $('#datatablebody').append(result.html_content);
                $('#offset').val(offset*1+pagsize*1);

               if(result.success == true){
                  //  toastr.success(result.msg);
                      } else {
                   // toastr.error(result.msg);
                }
            }
        });
    }

   function get_last_product(){
        $.ajax({
               type:'POST',
               url:"<?php echo e(action('\Modules\Inventory\Http\Controllers\InventoryController@get_last_product'), false); ?>",
               data:{
                     '_token' :' <?php echo csrf_token() ?>',
                     'transaction_id':<?php echo e($transaction_id, false); ?>,

               },
               success:function(result) {

                     $("#lastproduct").val(result);

               }
            });

   }

    $(document).on('change', '#product_list_filter_current_stock,' +
        '#product_list_filter_current_stock,' +
        '#product_list_filter_type, #product_list_filter_category_id, ' +
        '#product_list_filter_brand_id, #product_list_filter_unit_id, #stock_status, '+
        '#pagsize',
        function() {
        if($('#stock_status').val()==1)
            $('#filter_date_range').removeClass('hidden');
           else
            $('#filter_date_range').addClass('hidden');

            $('#datatablebody').html('');
            $('#offset').val(0);
           getproducts();
        });

    $("#searchtext").on("keyup", function() {
        $('#datatablebody').html('');
        $('#offset').val(0);
        var tex=$("#searchtext").val();
        if(tex.length>0)
            getproducts();
            });


    $("#searchtext_old").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#datatablebody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    function savedata2(product_id,variation_id) {
        swal({
            title: LANG.sure,
            text: 'سوف يتم تعديل رصيد المنتج !',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then(willSave => {
            if (willSave) {
                var new_val = $('#new_' + product_id).val();
                var old_val = $('#old_' + product_id).val();
                $.ajax({
                    type: 'GET',
                    url: "<?php echo e(action('\Modules\Inventory\Http\Controllers\InventoryController@stock_line_save'), false); ?>",
                    data: {
                        '_token': ' <?php echo csrf_token() ?>',
                        transaction_id:<?php echo e($transaction_id, false); ?>,
                        product_id: product_id,
                        variation_id: variation_id,
                        new_val: new_val,
                        old_val: old_val
                    },
                    success: function (result) {
                        if (result.success) {
                            $('#old_' + product_id).val(new_val);
                            toastr.success(result.msg);
                        } else {
                            toastr.error(result.msg);
                        }
                    }
                });
            }
        });


    }

    function savedata(product_id,variation_id){
        var transaction_id=$('#transaction_id').val();
        var location_id=$('#location_id').val();
         $.ajax({
            url:"<?php echo e(action('\Modules\Inventory\Http\Controllers\InventoryController@getproduct'), false); ?>",
            dataType: 'html',
            data:{
                transaction_id:transaction_id
                ,product_id:product_id
                ,variation_id:variation_id
                ,location_id:location_id
            },
            success: function(result) {
                $('.stocking')
                    .html(result)
                    .modal('show');
            },
        });
    }



    $(document).on('submit', 'form#stocking_save', function(e) {
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
                    $('div.stocking').modal('hide');
                    var datetime = new Date();
                    datetime = moment(datetime).format("h:m:s ");
                    $('#update_'+variation_id).text("<?php echo app('translator')->get('inventory::lang.stoking_now'); ?>"+"  - "+datetime);
                    $('#update_'+variation_id).addClass('span_success') ;
                    $('#current_stock_'+variation_id).text($('#stock_quantity').val());
                    $('#current_stock_'+variation_id).addClass('span_success') ;

                    toastr.success(result.msg);
                } else {
                    toastr.error(result.msg);
                }
            },
        });
    });

function deleterec(product_id,variation_id){
    var transaction_id=$('#transaction_id').val();
    var location_id=$('#location_id').val();
    swal({
        title: LANG.sure,
        text: 'سوف يتم حذف الجرد !',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
    }).then(willSave => {
        if (willSave) {
            $.ajax({
                url: "<?php echo e(action('\Modules\Inventory\Http\Controllers\InventoryController@deletstock'), false); ?>",
                dataType: 'html',
                data: {
                    transaction_id: transaction_id
                    , product_id: product_id
                    , variation_id: variation_id
                    , location_id: location_id
                },
                success: function (result) {
                    if(result.success== true){
                        toastr.success(result.msg);
                    }else{
                        toastr.error(result.msg);
                    }
                },
            });
        }
    });
}
$(document).on('change','#stock_quantity,#unit_price',function () {
    var curent_quantity= __read_number($('#curent_quantity'));
    var stock_quantity= __read_number($('#stock_quantity'));
    var unit_price= __read_number($('#unit_price'));
    var def_quantity=(stock_quantity-curent_quantity)*unit_price;
    __write_number($('#total_price'),def_quantity);
});

    $(document).on('change','#total_price',function () {
        var curent_quantity= __read_number($('#curent_quantity'));
        var stock_quantity= __read_number($('#stock_quantity'));
        var total_price= __read_number($('#total_price'));
        var def_quantity=total_price/(stock_quantity-curent_quantity);
        __write_number($('#unit_price'),def_quantity);
    });




</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/Modules/Inventory/Providers/../Resources/views/transaction_form.blade.php ENDPATH**/ ?>