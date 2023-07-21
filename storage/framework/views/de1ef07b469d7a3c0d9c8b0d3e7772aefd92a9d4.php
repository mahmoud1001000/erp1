<?php $__env->startSection('title', __('lang_v1.cash_flow')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('lang_v1.cash_flow'); ?>
    </h1>
</section>

<!-- Main content -->
<section class="content no-print">
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-solid">
                <div class="box-header">
                    <h3 class="box-title"> <i class="fa fa-filter" aria-hidden="true"></i> <?php echo app('translator')->get('report.filters'); ?>:</h3>
                </div>
                <div class="box-body">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?php echo Form::label('account_id', __('account.account') . ':'); ?>

                            <?php echo Form::select('account_id', $accounts, '', ['class' => 'form-control', 'placeholder' => __('messages.all')]); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo Form::label('cash_flow_location_id',  __('purchase.business_location') . ':'); ?>

                            <?php echo Form::select('cash_flow_location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%']); ?>

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?php echo Form::label('transaction_date_range', __('report.date_range') . ':'); ?>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <?php echo Form::text('transaction_date_range', null, ['class' => 'form-control', 'readonly', 'placeholder' => __('report.date_range')]); ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?php echo Form::label('transaction_type', __('account.transaction_type') . ':'); ?>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-exchange-alt"></i></span>
                                <?php echo Form::select('transaction_type', ['' => __('messages.all'),'debit' => __('account.debit'), 'credit' => __('account.credit')], '', ['class' => 'form-control']); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
        	<div class="box">
                <div class="box-body">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('account.access')): ?>
                        <div class="table-responsive">
                    	<table class="table table-bordered table-striped" id="cash_flow_table">
                    		<thead>
                    			<tr>
                                    <th><?php echo app('translator')->get( 'messages.date' ); ?></th>
                                    <th><?php echo app('translator')->get( 'account.account' ); ?></th>
                                    <th><?php echo app('translator')->get( 'lang_v1.description' ); ?></th>
                                    <th><?php echo app('translator')->get( 'lang_v1.payment_method' ); ?></th>
                                    <th><?php echo app('translator')->get( 'lang_v1.payment_details' ); ?></th>
                                    <th><?php echo app('translator')->get('account.debit'); ?></th>
                    				<th><?php echo app('translator')->get('account.credit'); ?></th>
                    				<th><?php echo app('translator')->get( 'lang_v1.account_balance' ); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.account_balance_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                                    <th><?php echo app('translator')->get( 'lang_v1.total_balance' ); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.total_balance_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                    			</tr>
                    		</thead>
                            <tfoot>
                                <tr class="bg-gray font-17 footer-total text-center">
                                    <td colspan="5"><strong><?php echo app('translator')->get('sale.total'); ?>:</strong></td>
                                    <td class="footer_total_debit"></td>
                                    <td class="footer_total_credit"></td>
                                    <td colspan="2"></td>
                                </tr>
                            </tfoot>
                    	</table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    

    <div class="modal fade account_model" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script>
    $(document).ready(function(){

        // dateRangeSettings.autoUpdateInput = false
        $('#transaction_date_range').daterangepicker(
            dateRangeSettings,
            function (start, end) {
                $('#transaction_date_range').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
                cash_flow_table.ajax.reload();
            }
        );
        
        // Cash Flow Table
        cash_flow_table = $('#cash_flow_table').DataTable({
            processing: true,
            serverSide: true,
            "ajax": {
                    "url": "<?php echo e(action("AccountController@cashFlow"), false); ?>",
                    "data": function ( d ) {
                        var start = '';
                        var end = '';
                        if($('#transaction_date_range').val() != ''){
                            start = $('#transaction_date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
                            end = $('#transaction_date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
                        }
                        
                        d.account_id = $('#account_id').val();
                        d.type = $('#transaction_type').val();
                        d.start_date = start,
                        d.end_date = end
                        d.location_id = $('#cash_flow_location_id').val();

                    }
                },
            "ordering": false,
            columns: [
                {data: 'operation_date', name: 'operation_date'},
                {data: 'account_name', name: 'A.name'},
                {data: 'sub_type', name: 'sub_type', searchable: false},
                {data: 'method', name: 'TP.method'},
                {data: 'payment_details', name: 'TP.payment_ref_no'},
                {data: 'debit', name: 'amount', searchable: false},
                {data: 'credit', name: 'amount', searchable: false},
                {data: 'balance', name: 'balance', searchable: false},
                {data: 'total_balance', name: 'total_balance', searchable: false},
            ],
            "fnDrawCallback": function (oSettings) {
                __currency_convert_recursively($('#cash_flow_table'));
            },
            "footerCallback": function ( row, data, start, end, display ) {
                var footer_total_debit = 0;
                var footer_total_credit = 0;

                for (var r in data){
                    footer_total_debit += $(data[r].debit).data('orig-value') ? parseFloat($(data[r].debit).data('orig-value')) : 0;
                    footer_total_credit += $(data[r].credit).data('orig-value') ? parseFloat($(data[r].credit).data('orig-value')) : 0;
                }

                $('.footer_total_debit').html(__currency_trans_from_en(footer_total_debit));
                $('.footer_total_credit').html(__currency_trans_from_en(footer_total_credit));
            }
        });
        $('#transaction_type, #account_id, #cash_flow_location_id').change( function(){
            cash_flow_table.ajax.reload();
        });
        $('#transaction_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $('#transaction_date_range').val('').change();
            cash_flow_table.ajax.reload();
        });

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/account/cash_flow.blade.php ENDPATH**/ ?>