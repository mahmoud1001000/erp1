@extends('layouts.app')
@section('title', __( 'فوائد الاقساط' ))
@section('content')
@include('sell.installment_nav')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>@lang( 'فوائد الاقساط' )
        <small>فوائد الاقساط</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    @component('components.widget', ['class' => 'box-primary', 'title' => __( 'فوائد الأقساط' )])
        @can('tax_rate.create')
            @slot('tool')
                <div class="box-tools">
                    <button type="button" class="btn btn-block btn-primary btn-modal" 
                            data-href="{{action('SellController@installment_tax_create')}}" 
                            data-container=".tax_rate_modal">
                            <i class="fa fa-plus"></i> @lang( 'messages.add' )</button>
                </div>
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
