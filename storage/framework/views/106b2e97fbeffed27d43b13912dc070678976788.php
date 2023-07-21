<?php $__env->startSection('title', __('sale.discount')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get( 'sale.discount' ); ?>
    </h1>
    
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
        <div class="box-header">
        	<h3 class="box-title"><?php echo app('translator')->get('lang_v1.all_your_discounts'); ?></h3>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('brand.create')): ?>
            	<div class="box-tools">
                    <button type="button" class="btn btn-block btn-primary btn-modal" 
                    data-href="<?php echo e(action('DiscountController@create'), false); ?>" 
                    data-container=".discount_modal">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></button>
                </div>
            <?php endif; ?>
        </div>
        <div class="box-body">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('brand.view')): ?>
                <div class="table-responsive">
            	<table class="table table-bordered table-striped" id="discounts_table">
            		<thead>
            			<tr>
                            <th><input type="checkbox" id="select-all-row" data-table-id="discounts_table"></th>
            				<th><?php echo app('translator')->get( 'unit.name' ); ?></th>
            				<th><?php echo app('translator')->get( 'lang_v1.starts_at' ); ?></th>
            				<th><?php echo app('translator')->get( 'lang_v1.ends_at' ); ?></th>
                            <th><?php echo app('translator')->get( 'sale.discount_amount' ); ?></th>
                            <th><?php echo app('translator')->get( 'lang_v1.priority' ); ?></th>
                            <th><?php echo app('translator')->get( 'product.brand' ); ?></th>
                            <th><?php echo app('translator')->get( 'product.category' ); ?></th>
                            <th><?php echo app('translator')->get( 'report.products' ); ?></th>
                            <th><?php echo app('translator')->get( 'sale.location' ); ?></th>
                            <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
            			</tr>
            		</thead>
                    <tfoot>
                    <tr>
                        <td colspan="11">
                        <div style="display: flex; width: 100%;">
                            <?php echo Form::open(['url' => action('DiscountController@massDeactivate'), 'method' => 'post', 'id' => 'mass_deactivate_form' ]); ?>

                            <?php echo Form::hidden('selected_discounts', null, ['id' => 'selected_discounts']); ?>

                            <?php echo Form::submit(__('lang_v1.deactivate_selected'), array('class' => 'btn btn-xs btn-warning', 'id' => 'deactivate-selected')); ?>

                            <?php echo Form::close(); ?>

                            </div>
                        </td>
                    </tr>
                </tfoot>
            	</table>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="modal fade discount_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    $(document).on('click', '#deactivate-selected', function(e){
        e.preventDefault();
        var selected_rows = [];
        var i = 0;
        $('.row-select:checked').each(function () {
            selected_rows[i++] = $(this).val();
        }); 
        
        if(selected_rows.length > 0){
            $('input#selected_discounts').val(selected_rows);
            swal({
                title: LANG.sure,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $('form#mass_deactivate_form').submit();
                }
            });
        } else{
            $('input#selected_discounts').val('');
            swal('<?php echo app('translator')->get("lang_v1.no_row_selected"); ?>');
        }    
    });

    $(document).on('click', '.activate-discount', function(e){
        e.preventDefault();
        var href = $(this).data('href');
        $.ajax({
            method: "get",
            url: href,
            dataType: "json",
            success: function(result){
                if(result.success == true){
                    toastr.success(result.msg);
                    discounts_table.ajax.reload();
                } else {
                    toastr.error(result.msg);
                }
            }
        });
    });

    $(document).on('shown.bs.modal', '.discount_modal', function(){
        $('#variation_ids').select2({
            ajax: {
                url: '/purchases/get_products?check_enable_stock=false&only_variations=true',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    var results = [];
                    for (var item in data) {
                        results.push(
                            {
                                id: data[item].variation_id,
                                text: data[item].text,
                            }
                        );
                    }
                    return {
                        results: results,
                    };
                },
            },
            minimumInputLength: 1,
            closeOnSelect: false
        });
    });

    $(document).on('change', '#variation_ids', function(){
        if ($(this).val().length) {
            $('#brand_input').addClass('hide');
            $('#category_input').addClass('hide');
        } else {
            $('#brand_input').removeClass('hide');
            $('#category_input').removeClass('hide');
        }
    });

    $(document).on('hidden.bs.modal', '.discount_modal', function(){
        $("#variation_ids").select2('destroy'); 
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/discount/index.blade.php ENDPATH**/ ?>