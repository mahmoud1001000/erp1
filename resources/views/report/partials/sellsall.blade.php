<div class="row">
    <div class="col-lg-4">
        <table class="table table-dark table-hover table-responsive  bg-gray">
            <thead>
            <tr class="bg-green" style="text-align: center">
                <td colspan="2"> المبيعات </td>
            </tr>
            <tr class="bg-green">
                <th>البيان</th>
                <th>القيمة</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>إجمالي مبيعات الأصناف(+)</td>
                <td>{{number_format($sell_details->total_before_tax,2,'.','')}}</td>
            </tr>
            <tr>
                <td>إجمالي خصومات الفواتير(-)</td>
                <td>{{number_format($sell_details->discount_amount,2,'.','')}}</td>
            </tr>

            <tr>
                <td>إجمالي ضريبة الفواتير(+)</td>
                <td>{{number_format($sell_details->tax_amount,2,'.','')}}</td>
            </tr>

            <tr>
                <td>إجمالي تكلفة الشحن(+)</td>
                <td>{{number_format($sell_details->shipping_charges,2,'.','')}}</td>
            </tr>

            <tr>
                <td>إجمالي تكلفة التوصيل(+)</td>
                <td>{{number_format($sell_details->packing_charge,2,'.','')}}</td>
            </tr>

            <tr>
                <td>إجمالي التقريب(-)</td>
                <td>{{number_format($sell_details->round_off_amount,2,'.','')}}</td>
            </tr>
            <tr class="bg-green">
                <th>الإجمالي المبيعات</th>
                <th>{{number_format($totall_sell,2,'.','')}}</th>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="col-lg-4">
        <table class="table table-dark table-hover table-responsive  bg-gray">
            <thead>
            <tr class="bg-green" style="text-align: center">
                <td colspan="2"> المرتجعات  </td>
            </tr>
            <tr class="bg-green">
                <th>البيان</th>
                <th>القيمة</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>إجمالي مرتجعات الأصناف(+)</td>
                <td>{{number_format($sell_return->total_before_tax,2,'.','')}}</td>
            </tr>
            <tr>
                <td>إجمالي خصومات المرتجعات(-)</td>
                <td>{{number_format($sell_return->discount_amount,2,'.','')}}</td>
            </tr>

            <tr>
                <td>إجمالي ضريبة المرتجعات(+)</td>
                <td>{{number_format($sell_return->tax_amount,2,'.','')}}</td>
            </tr>

            <tr>
                <td>إجمالي تكلفة الشحن(+)</td>
                <td>{{number_format($sell_return->shipping_charges,2,'.','')}}</td>
            </tr>

            <tr>
                <td>إجمالي تكلفة التوصيل(+)</td>
                <td>{{number_format($sell_return->packing_charge,2,'.','')}}</td>
            </tr>

            <tr>
                <td>إجمالي التقريب(-)</td>
                <td>{{number_format($sell_return->round_off_amount,2,'.','')}}</td>
            </tr>
            <tr class="bg-green">
                <th>الإجمالي المرتجعات</th>
                <td>{{number_format($totall_return,2,'.','')}}</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="clearfix"></div>
    <div class="col-lg-8">
        <table class="table table-dark table-hover table-responsive  bg-gray">
            <thead>
            <tr class="bg-green">
                <th>إجمالي الدخل </th>
                <th>{{number_format($totall_sell - $totall_return,2,'.','')}}</th>
            </tr>
            </thead>
        </table>
    </div>
</div>