@extends('layouts.app')
@section('title', __('invoice.invoice_settings'))

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>@lang( 'invoice.invoice_settings' )
        <small>@lang( 'invoice.manage_your_invoices' )</small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">@lang('invoice.invoice_schemes')</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">@lang('invoice.invoice_layouts')</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="row">
                    <div class="col-md-12">
                        <h4>@lang( 'invoice.all_your_invoice_schemes' ) <button type="button" class="btn btn-primary btn-modal pull-right" 
                                data-href="{{action('InvoiceSchemeController@create')}}" 
                                data-container=".invoice_modal">
                                <i class="fa fa-plus"></i> @lang( 'messages.add' )</button></h4>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="invoice_table">
                            <thead>
                                <tr>
                                    <th>@lang( 'invoice.name' ) @show_tooltip(__('tooltip.invoice_scheme_name'))</th>
                                    <th>@lang( 'invoice.prefix' ) @show_tooltip(__('tooltip.invoice_scheme_prefix'))</th>
                                    <th>@lang( 'invoice.start_number' ) @show_tooltip(__('tooltip.invoice_scheme_start_number'))</th>
                                    <th>@lang( 'invoice.invoice_count' ) @show_tooltip(__('tooltip.invoice_scheme_count'))</th>
                                    <th>@lang( 'invoice.total_digits' ) @show_tooltip(__('tooltip.invoice_scheme_total_digits'))</th>
                                    <th>@lang( 'messages.action' )</th>
                                </tr>
                            </thead>
                        </table>
                        </div>
                    </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div class="row">
                    <div class="col-md-12">
                        <h4>@lang( 'invoice.all_your_invoice_layouts' ) <a class="btn btn-primary pull-right" href="{{action('InvoiceLayoutController@create')}}">
                                <i class="fa fa-plus"></i> @lang( 'messages.add' )</a></h4>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-hover ">
                            <thead>
                            <tr class="bg-green" >
                                <td>إسم التصميم</td>
                                <td>@lang('invoice.used_in_locations')</td>
                                <td>@lang('lang_v1.design')</td>
                                <td></td>
                            </tr>
                            </thead>
                        <tbody>
                        @foreach( $invoice_layouts as $layout)
                        <tr>
                            <td>  {{ $layout->name }}</td>
                            <td>
                                @if($layout->locations->count())
                                    <span class="link-des">
                                      @foreach($layout->locations as $location)
                                            {{ $location->name }}
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                            &nbsp;
                                        @endforeach
                                    </span>
                                @endif
                            </td>
                            <td>
                                @lang("lang_v1.".$layout->design)
                            </td>
                            <td>
                                <a href="{{action('InvoiceLayoutController@edit', [$layout->id])}}" class="btn btn-xs btn-primary">
                                    <i class="glyphicon glyphicon-edit"></i> تعديل </a>

                                @if( !$layout->locations->count() || !$layout->is_default )
                                <button class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i>حذف  </button>
                                    @endif
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>

                    </div>
                </div>
                <br>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
    </div>
	
    <div class="modal fade invoice_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade invoice_edit_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

@endsection
