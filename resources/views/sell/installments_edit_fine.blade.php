@extends('layouts.app')
@section('title', __( 'غرامة تأخير' ))
@section('content')
@include('sell.installment_nav')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>غرامة تأخير
        <small>غرامة التأخير المركبة</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    @component('components.widget', ['class' => 'box-primary'])
        @can('tax_rate.create')
            @slot('tool')
                <div class="box-tools">
                    <form action="{{action('SellController@installments_update_fine')}}">
                        
                             <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        {!! Form::label('stock_expiry_alert_days', __('نسبة الغرامة المركبة للتأخير') . ':*') !!}
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fas fa-dollar-sign"></i>
                                        </span>
                                        {!! Form::number('composite_fine', $business->composite_fine, ['class' => 'form-control','required']); !!}
                                        <span class="input-group-addon">
                                            <i class="fa fa-percent"></i>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        <button type="submit" class="btn btn-primaray">حفظ</button>
                    </form>
                    
            @endslot
        @endcan
        @can('tax_rate.view')
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="tax_rates_table_ins">
                    <thead>
                        <tr>
                            <th>@lang( 'tax_rate.name' )</th>
                            <th>@lang( 'tax_rate.rate' )</th>
                            <th>@lang( 'messages.action' )</th>
                        </tr>
                    </thead>
                </table>
            </div>
        @endcan
    @endcomponent

    
    <div class="modal fade tax_rate_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade tax_group_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<script>
  

</script>
<!-- /.content -->
@endsection
