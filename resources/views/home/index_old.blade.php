@extends('layouts.app')
@section('title', __('home.home'))

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header content-header-custom">
    <h1>{{ __('home.welcome_message', ['name' => Session::get('user.first_name')]) }}
    </h1>
</section>
<!-- Main content -->
<section class="content content-custom no-print">
	<style>
       		canvas {
			-moz-user-select: none;
			-webkit-user-select: none;
			-ms-user-select: none;
		}
        .box-body{
            padding: 3px!important;
        }
        .btn-danger {
            background: #1e7f89;
            border-color: #f41e4800;
        }
        .col-custom{
            padding-left: 15px;
            padding-right: 15px;
        }

        .info-box-content {
            padding-top: 6px !important;
            padding-right: 10px !important;
            padding-bottom: 6px!important;
            padding-left: 12px!important;
            margin-left: 64px !important;
        }
.row-custom{
    padding-top: 3px;
}
	</style>
  <br>
    @if(auth()->user()->can('dashboard.data'))




        @if(!empty($widgets['after_sale_purchase_totals']))
            @foreach($widgets['after_sale_purchase_totals'] as $widget)
                {!! $widget !!}
            @endforeach
        @endif

    <!-- sales chart start -->

          	<div class="row">
				<div class="col-md-5" style="padding-right: 3px; padding-left: 3px">
					@component('components.widget', ['class' => 'box-primary', 'title' =>'المصروفات عن السنة الحالية'])
     				<div id="canvas-holder" >
						<canvas id="canvas_expnacess" ></canvas>
					</div>
					@endcomponent
				</div>

                <div class="col-md-5" style="padding-right: 3px; padding-left: 3px">
                    @component('components.widget', ['class' => 'box-primary', 'title' =>'المبيعات خلال العام'])
                        <div  >
                            <canvas id="sells" ></canvas>
                        </div>
                    @endcomponent
                </div>

                <div class="col-md-2" style="padding-right: 3px; padding-left: 3px">
                    @component('components.widget', ['class' => 'box-primary', 'title' =>'إضافات'])

                        <button type="button" class="btn btn-block btn-danger btn-modal" style="margin-top: 15px;margin-bottom:15px;"
                                data-href="{{action('ContactController@create', ['type' => 'customer'])}}"
                                data-container=".contact_modal">
                           </i> إضافة عميل</button>

                        <button type="button" class="btn btn-block btn-danger btn-modal" style="margin-top: 15px;margin-bottom:15px;"
                                data-href="{{action('ContactController@create', ['type' => 'supplier'])}}"
                                data-container=".contact_modal">
                             إضافة مورد</button>
                        <a href="{{action('ManageUserController@create')}}" class="btn btn-danger btn-block" style="margin-bottom:15px;"  > إضافة مستخدم</a>
                        <a href="{{action('ProductController@create')}}" class="btn btn-danger btn-block" style="margin-bottom:15px;" >إضافة منتج</a>
                       <a href="{{action('ExpenseController@create')}}" class="btn btn-danger btn-block" style="margin-bottom:15px;" >     إضافة مصروفات</a>
                      {{--   <a href="{{action('SellPosController@create')}}" class="btn btn-danger btn-block" style="margin-bottom:15px;" >الكاشير </a>--}}
                    @endcomponent
                </div>
            </div>

        @component('components.widget', ['class' => 'box-primary', 'title' =>''])
          <div class="row" style=" margin-right: 1px!important;margin-left: 1px!important;">
            <br>
              <div class="row">
                  <div class="col-md-4 col-xs-12">
                      @if(count($all_locations) > 1)
                          {!! Form::select('dashboard_location', $all_locations, null, ['class' => 'form-control select2', 'placeholder' => __('lang_v1.select_location'), 'id' => 'dashboard_location']); !!}
                      @endif
                  </div>
                  <div class="col-md-8 col-xs-12">
                      <div class="btn-group pull-right" data-toggle="buttons">
                          <label class="btn btn-info active">
                              <input type="radio" name="date-filter"
                                     data-start="{{ date('Y-m-d') }}"
                                     data-end="{{ date('Y-m-d') }}"
                                     checked> {{ __('home.today') }}
                          </label>
                          <label class="btn btn-info">
                              <input type="radio" name="date-filter"
                                     data-start="{{ $date_filters['this_week']['start']}}"
                                     data-end="{{ $date_filters['this_week']['end']}}"
                              > {{ __('home.this_week') }}
                          </label>
                          <label class="btn btn-info">
                              <input type="radio" name="date-filter"
                                     data-start="{{ $date_filters['this_month']['start']}}"
                                     data-end="{{ $date_filters['this_month']['end']}}"
                              > {{ __('home.this_month') }}
                          </label>
                          <label class="btn btn-info">
                              <input type="radio" name="date-filter"
                                     data-start="{{ $date_filters['this_fy']['start']}}"
                                     data-end="{{ $date_filters['this_fy']['end']}}"
                              > {{ __('home.this_fy') }}
                          </label>
                      </div>
                  </div>
              </div>
              <br>
            <div class="row row-custom">
            <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
                <div class="info-box info-box-new-style">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-cash"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">{{ __('home.total_purchase') }}</span>
                        <span class="info-box-number total_purchase"><i class="fas fa-sync fa-spin fa-fw margin-bottom"></i></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
                <div class="info-box info-box-new-style">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-cart-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">{{ __('home.total_sell') }}</span>
                        <span class="info-box-number total_sell"><i class="fas fa-sync fa-spin fa-fw margin-bottom"></i></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
                <div class="info-box info-box-new-style">
    	        <span class="info-box-icon bg-yellow">
    	        	<i class="ion ion-ios-paper-outline"></i>
    	        	<i class="fa fa-exclamation"></i>
    	        </span>

                    <div class="info-box-content">
                        <span class="info-box-text">{{ __('home.invoice_due') }}</span>
                        <span class="info-box-number invoice_due"><i class="fas fa-sync fa-spin fa-fw margin-bottom"></i></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
                <div class="info-box info-box-new-style">
                <span class="info-box-icon bg-red">
                  <i class="fas fa-minus-circle"></i>
                </span>

                    <div class="info-box-content">
                  <span class="info-box-text">
                    {{ __('lang_v1.expense') }}
                  </span>
                        <span class="info-box-number total_expense"><i class="fas fa-sync fa-spin fa-fw margin-bottom"></i></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
    </div>
        @endcomponent

    <div class="row">
               <div class="col-lg-10" style="padding-right: 3px; padding-left: 3px">
                        @component('components.widget', ['class' => 'box-primary', 'title' =>'أحدث الفواتير'])
                        <table class="table mytable">
                            <thead>
                            <tr>
                                <th>رقم الفاتورة</th>
                                <th>تاريخ الفاتورة</th>
                                <th>إجمالي قبل الضريبة</th>
                                <th>الخصم</th>
                                <th>الإجمالي</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sells_transaction as $row)
                                <tr>
                                    <td>{{$row->invoice_no}}</td>
                                    <td>{{$row->transaction_date}}</td>
                                    <td>{{number_format($row->total_before_tax,2,'.','')}}</td>
                                    <td>{{number_format($row->discount_amount,2,'.','')}}</td>
                                    <td>{{number_format($row->final_total,2,'.','')}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @endcomponent
                    </div>
                <div class="col-md-2" style="padding-right: 3px; padding-left: 3px">
                    @component('components.widget', ['class' => 'box-primary', 'title' =>'إضافات'])
                        <a href="{{action('SellController@create')}}" class="btn btn-danger btn-block" style="margin-bottom:15px; margin-bottom:15px;" >فاتتورة بيع</a>
                        <a href="{{action('PurchaseController@create')}}" class="btn btn-danger btn-block" style="margin-bottom:15px;" >فاتورة شراء </a>
                        <a href="{{action('SellReturnController@index')}}" class="btn btn-danger btn-block" style="margin-bottom:15px;" >مرتجع مبيعات</a>
                        <a href="{{action('PurchaseReturnController@index')}}" class="btn btn-danger btn-block" style="margin-bottom:15px;" >مرتجع مشتريات</a>
                        <a href="{{action('ReportController@getproductSellReport')}}" class="btn btn-danger btn-block" style="margin-bottom:15px;" >تقرير مبيعات المنتجات</a>
                        <a href="{{action('ReportController@getproductPurchaseReport')}}" class="btn btn-danger btn-block" style="margin-bottom:15px;" >تقرير مشتريات المنتجات</a>

                               @endcomponent
                </div>

                <div class="col-md-12 col-sm-12">
                    @component('components.widget', ['class' => 'box-primary', 'title' => __('home.sells_last_30_days')])
                        {!! $sells_chart_1->container() !!}
                    @endcomponent
                </div>



               {{-- <div class="col-md-6 col-sm-12">
                    @component('components.widget', ['class' => 'box-primary', 'title' => __('home.sells_current_fy')])
                        {!! $sells_chart_2->container() !!}
                    @endcomponent
                </div>--}}


            </div>


       {{-- @if(!empty($widgets['after_sales_last_30_days']))
            @foreach($widgets['after_sales_last_30_days'] as $widget)
                {!! $widget !!}
            @endforeach
        @endif--}}
  	<!-- sales chart end -->






      	<!-- products less than alert quntity -->
      {{--<div class="row">
            <div class="col-sm-6">
                @component('components.widget', ['class' => 'box-warning'])
                  @slot('icon')
                    <i class="fa fa-exclamation-triangle text-yellow" aria-hidden="true"></i>
                  @endslot
                  @slot('title')
                    {{ __('lang_v1.sales_payment_dues') }} @show_tooltip(__('lang_v1.tooltip_sales_payment_dues'))
                  @endslot
                  <table class="table table-bordered table-striped" id="sales_payment_dues_table">
                    <thead>
                      <tr>
                        <th>@lang( 'contact.customer' )</th>
                        <th>@lang( 'sale.invoice_no' )</th>
                        <th>@lang( 'home.due_amount' )</th>
                        <th>@lang( 'messages.action' )</th>
                      </tr>
                    </thead>
                  </table>
                @endcomponent
            </div>
            <div class="col-sm-6">
                @component('components.widget', ['class' => 'box-warning'])
                @slot('icon')
                <i class="fa fa-exclamation-triangle text-yellow" aria-hidden="true"></i>
                @endslot
                @slot('title')
                {{ __('lang_v1.purchase_payment_dues') }} @show_tooltip(__('tooltip.payment_dues'))
                @endslot
                <table class="table table-bordered table-striped" id="purchase_payment_dues_table">
                    <thead>
                      <tr>
                        <th>@lang( 'purchase.supplier' )</th>
                        <th>@lang( 'purchase.ref_no' )</th>
                        <th>@lang( 'home.due_amount' )</th>
                        <th>@lang( 'messages.action' )</th>
                      </tr>
                    </thead>
                </table>
                @endcomponent
            </div>
        </div>--}}
        <div class="row">
            <div class="@if((session('business.enable_product_expiry') != 1) && auth()->user()->can('stock_report.view')) col-sm-12 @else col-sm-6 @endif">
                @component('components.widget', ['class' => 'box-warning'])
                  @slot('icon')
                    <i class="fa fa-exclamation-triangle text-yellow" aria-hidden="true"></i>
                  @endslot
                  @slot('title')
                    {{ __('home.product_stock_alert') }} @show_tooltip(__('tooltip.product_stock_alert'))
                  @endslot
                  <table class="table table-bordered table-striped" id="stock_alert_table" style="width: 100%;">
                    <thead>
                      <tr>
                        <th>@lang( 'sale.product' )</th>
                        <th>@lang( 'business.location' )</th>
                        <th>@lang( 'report.current_stock' )</th>
                      </tr>
                    </thead>
                  </table>
                @endcomponent
            </div>

            {{--@can('stock_report.view')
                @if(session('business.enable_product_expiry') == 1)
                  <div class="col-sm-6">
                      @component('components.widget', ['class' => 'box-warning'])
                          @slot('icon')
                            <i class="fa fa-exclamation-triangle text-yellow" aria-hidden="true"></i>
                          @endslot
                          @slot('title')
                            {{ __('home.stock_expiry_alert') }} @show_tooltip( __('tooltip.stock_expiry_alert', [ 'days' =>session('business.stock_expiry_alert_days', 30) ]) )
                          @endslot
                          <input type="hidden" id="stock_expiry_alert_days" value="{{ \Carbon::now()->addDays(session('business.stock_expiry_alert_days', 30))->format('Y-m-d') }}">
                          <table class="table table-bordered table-striped" id="stock_expiry_alert_table">
                            <thead>
                              <tr>
                                  <th>@lang('business.product')</th>
                                  <th>@lang('business.location')</th>
                                  <th>@lang('report.stock_left')</th>
                                  <th>@lang('product.expires_in')</th>
                              </tr>
                            </thead>
                          </table>
                      @endcomponent
                  </div>
                @endif
            @endcan--}}
      	</div>

       {{-- @if(!empty($widgets['after_dashboard_reports']))
          @foreach($widgets['after_dashboard_reports'] as $widget)
            {!! $widget !!}
          @endforeach
        @endif--}}
    @endif
</section>
<!-- /.content -->
<div class="modal fade payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<div class="modal fade edit_payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>
<div class="modal fade contact_modal" tabindex="-1" role="dialog"
     aria-labelledby="gridSystemModalLabel">
</div>
@stop
@section('javascript')
    <script src="{{ asset('js/home.js?v=' . $asset_v) }}"></script>
    <script src="{{ asset('js/payment.js?v=' . $asset_v) }}"></script>
    <script src="{{ asset('js/chart.min.js') }}"></script>
    <script src="{{ asset('js/utils.js') }}"></script>


	@if(!empty($all_locations))
        {!! $sells_chart_1->script() !!}
     @endif
	<script>
        var randomScalingFactor = function() {
            return Math.round(Math.random() * 100);
        };

/* type:pie,line,bar,doughnut*/
        var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var config = {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                            label: 'المصروفات',
                            data: [{!! $expnacess !!}],
                            backgroundColor: [
                        '#4843ea',
                        '#d23041',
                        '#95ae38',
                        '#6b6b6b',
                        '#469049',
                        '#ea781c',
                        '#cdc6ea',
                        '#eae42d',
                        '#ea2084',
                        '#b3ea1f',
                        '#6fea48',
                        '#ea2634',
                        '#3f38ea',
                    ],
                            fill: false,
                            }]
                     },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'المصروفات'
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    x: {
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    },
                    y: {
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }
                }
            }
        };




        /* type:pie,line,bar,doughnut*/
        var config2 = {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: 'المبيعات',
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.red,
                    data: [{!! $sells !!}],
                    backgroundColor: [
                                   '#0c6cea',
                                   '#d23041',
                                   '#95ae38',
                                   '#6b6b6b',
                                   '#469049',
                                   '#ea781c',
                                   '#cdc6ea',
                                   '#eae42d',
                                   '#ea2084',
                                   '#b3ea1f',
                                   '#6fea48',
                                   '#ea2634',
                                   '#3f38ea',
                                         ],
                    fill: false,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'المبيعات'
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    x: {
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    },
                    y: {
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }
                }
            }
        };

        window.onload = function() {
            var ctx = document.getElementById('canvas_expnacess').getContext('2d');
            window.myLine = new Chart(ctx, config);

            var ctx2 = document.getElementById('sells').getContext('2d');
            window.myLine = new Chart(ctx2, config2);



        };




	</script>

@endsection

