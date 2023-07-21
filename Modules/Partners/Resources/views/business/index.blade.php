@extends('layouts.app')
@section('title','الشركاء')

@section('content')
    <style>
        .table-striped th{
            background-color: #626161;
            color: #ffffff;
        }
    </style>

    @include('partners::layouts.nav')

    <section class="content-header">
        <h1>التقدير المالي للشركة</h1>
    </section>

    <section class="content">
        @component('components.widget', ['class' => 'box-primary', 'title' =>''])
            @can('assets.create')
                @slot('tool')
                         <div class="row">
                         <div class="col-md-12">
                                @component('components.widget', ['class' => 'box-solid'])

                                    <table class="table no-border">
                                        <tr>
                                            <td>@lang('report.closing_stock') (@lang('lang_v1.by_purchase_price'))</td>
                                            <td>@lang('report.closing_stock') (@lang('lang_v1.by_sale_price'))</td>
                                            <td>@lang('lang_v1.potential_profit')</td>
                                            <td>@lang('lang_v1.profit_margin')</td>
                                        </tr>
                                        <tr>
                                            <td><h3  class="mb-0 mt-0">{{ number_format($closing_stock_by_pp,2)}}</h3> </td>
                                            <td><h3  class="mb-0 mt-0">{{ number_format($closing_stock_by_sp,2)}}</h3> </td>
                                            <td><h3  class="mb-0 mt-0">{{ number_format($potential_profit,2)}}</h3> </td>
                                            <td><h3  class="mb-0 mt-0">{{ number_format($profit_margin,2)}}</h3> </td>
                                        </tr>
                                    </table>
                                @endcomponent
                               {{-- @component('components.widget', ['class' => 'box-solid'])
                                        <table class="table no-border">
                                            <tr>
                                                <td>إجمالي المشتريات</td>
                                                <td>إجمالي مرتجع المشتريات</td>
                                                <td>إجمالي دفعات</td>
                                                <td>إجمالي دفعات المرتجعات</td>

                                            </tr>
                                            <tr>
                                                <td><h3  class="mb-0 mt-0">{{ number_format($total_purchase,2)}}</h3> </td>
                                                <td><h3  class="mb-0 mt-0">{{ number_format($purchase_return,2)}}</h3> </td>
                                                <td><h3  class="mb-0 mt-0">{{ number_format($purchase_paid,2)}}</h3> </td>
                                                <td><h3  class="mb-0 mt-0">{{ number_format($purchase_return_paid,2)}}</h3> </td>

                                            </tr>
                                        </table>
                                    @endcomponent

                                @component('components.widget', ['class' => 'box-solid'])
                                        <table class="table no-border">
                                            <tr>
                                                <td>إجمالي المبيعات</td>
                                                <td>إجمالي مرتجع المبيعات</td>
                                                <td>إجمالي دفعات</td>
                                                <td>إجمالي دفعات المرتجعات</td>

                                            </tr>
                                            <tr>
                                                <td><h3  class="mb-0 mt-0">{{ number_format($total_invoice,2)}}</h3> </td>
                                                <td><h3  class="mb-0 mt-0">{{ number_format($total_sell_return,2)}}</h3> </td>
                                                <td><h3  class="mb-0 mt-0">{{ number_format($invoice_received,2)}}</h3> </td>
                                                <td><h3  class="mb-0 mt-0">{{ number_format($invoice_received,2)}}</h3> </td>

                                            </tr>
                                        </table>
                                    @endcomponent--}}
                                @component('components.widget', ['class' => 'box-solid'])
                                    <table class="table no-border">
                                        <tr>
                                            <td>رصيد الخزن والبنوك</td>
                                            <td>مديونيات العملاء</td>
                                            <td>مستحقات الموردين</td>

                                        </tr>
                                        <tr>
                                            <td><h3  class="mb-0 mt-0">{{ number_format($account_details,2)}}</h3> </td>
                                            <td><h3  class="mb-0 mt-0">{{ number_format($customer,2)}}</h3> </td>
                                            <td><h3  class="mb-0 mt-0">{{ number_format($supplier,2)}}</h3> </td>



                                        </tr>
                                    </table>
                                @endcomponent
                                @component('components.widget', ['class' => 'box-solid'])
                                        <table class="table no-border">
                                            <tr>
                                                <td>الإجمالي بسعر الشراء :</td>
                                                <td>الإجمالي بسعر البيع :</td>

                                               </tr>
                                            <tr>


                                                <td><h3  class="mb-0 mt-0">{{ number_format($account_details+$closing_stock_by_pp+$assets+$customer-$supplier,2)}}</h3> </td>
                                                <td><h3  class="mb-0 mt-0">{{ number_format($account_details+$closing_stock_by_sp+$assets+$customer-$supplier,2)}}</h3> </td>




                                            </tr>
                                        </table>

                                    @endcomponent
                                    @component('components.widget', ['class' => 'box-solid'])

                                    @endcomponent

                                    @if($totalshare>0)
                                      @component('components.widget', ['class' => 'box-solid'])
                                        <table class="table no-border">
                                            <tr>
                                                <td>عدد الأسهم </td>
                                                <td>سعر السهم بسعر الشراء :</td>
                                                <td>سعر السهم بسعر البيع :</td>

                                            </tr>
                                            <tr>

                                                <td><h3  class="mb-0 mt-0">{{ number_format($totalshare,2)}}</h3> </td>
                                                <td><h2  class="mb-0 mt-0">{{ number_format(($account_details+$closing_stock_by_pp+$assets+$customer-$supplier)/$totalshare,2)}}</h2> </td>
                                                <td><h2  class="mb-0 mt-0">{{ number_format(($account_details+$closing_stock_by_sp+$assets+$customer-$supplier)/$totalshare,2)}}</h2> </td>




                                            </tr>
                                        </table>
                                    @endcomponent
                                    @endif
                            </div>
                        </div>
                  @endslot
            @endcan
            @can('assets.view')




            @endcan
        @endcomponent



    </section>

    <div class="modal fade brands_modal" tabindex="-1" role="dialog"
         aria-labelledby="gridSystemModalLabel">
    </div>
@endsection

<script>

    function assetedit(id) {
        $.ajax({
            url: '/partners/partners/'+id+'/edit',
            dataType: 'html',
            success: function(result) {
                $(".brands_modal").html(result)
                    .modal('show');
            },
        });
    }


    function  deleteasset(id) {
        swal({
            title: LANG.sure,
            text: 'هل تريد حذف الشريك',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then(willDelete => {
            if (willDelete) {
                var href = '/partners/partners/'+id;
                var data = id;
                $.ajax({
                    method: 'DELETE',
                    url: href,
                    dataType: 'json',
                    data:{
                        data:data
                    },
                    success: function(result) {
                        if (result.success == true) {
                            toastr.success(result.msg);
                            var drow = document.getElementById(id);
                            drow.parentNode.removeChild(drow);
                        } else {
                            toastr.error(result.msg);
                        }
                    },
                });
            }
        });
    }

</script>

