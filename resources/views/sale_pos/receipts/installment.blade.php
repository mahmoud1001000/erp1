{{--

<div class="installment">
    @if ($transaction->payment_status == 'partial' || $transaction->payment_status == 'due')
        @if (count($transaction->installment) > 0)
            <div style="page-break-after: always;">
                @if (!empty($receipt_details->logo))
                    <div class="text-box centered">
                        <img style="max-height: 100px; width: auto;" src="{{ $receipt_details->logo }}" alt="Logo">
                    </div>
                @endif

                <h1 style="text-align:center">ملف العميل</h1>
                <p>

                    <?php
                    // $num = $transaction->final_total * 1;
                    // $num = numtoarb($num);
                    // echo $num;
                    ?>
                </p>
                <br><br>
                <table class="table table-bordered" id="installmentTable">
                    <tr>
                        <td style="white-space: nowrap;">الإسم</td>
                        <td width="99%"> {{ $transaction->contact->first_name }}
                            {{ $transaction->contact->middle_name }} {{ $transaction->contact->last_name }}</td>
                    </tr>
                    <tr>
                        <td style="white-space: nowrap;">العنوان</td>
                        <td width="99%">{{ $transaction->contact->address_line_1 }}</td>
                    </tr>
                    <tr>
                        <td style="white-space: nowrap;">الرقم القومى</td>
                        <td width="99%">
                            {{ arToIn($transaction->contact->custom_field1, 'TYPE_DEFAULT') }}
                        </td>
                    </tr>
                    <tr>
                        <td style="white-space: nowrap;">رقم الموبايل</td>
                        <td width="99%">
                            {{ arToIn($transaction->contact->mobile, 'TYPE_DEFAULT') }}
                        </td>
                    </tr>
                    <tr>
                        <td style="white-space: nowrap;">سعر السلعة</td>
                        <td width="99%">
                            {{ arToIn($transaction->final_total, 'DECIMAL') }}
                        </td>
                    </tr>
                    <tr>
                        <td style="white-space: nowrap;">المبلغ المدفوع</td>
                        <td width="99%">
                            @php
                                $payment_lines_total = 0;
                            @endphp
                            @foreach ($transaction->payment_lines as $payment_lines)

                                @php
                                    $payment_lines_total = $payment_lines_total + $payment_lines->amount;
                                @endphp

                            @endforeach
                            {{ arToIn($payment_lines_total, 'DECIMAL') }}
                        </td>
                    </tr>
                    <tr>
                        <td style="white-space: nowrap;">المبلغ المتبقى</td>
                        <td width="99%">
                            @php
                                $remaining_payments_total = 0;
                            @endphp
                            @foreach ($transaction->installment as $remaining_installment)
                                @if ($remaining_installment->status == 0)
                                    @php
                                        $remaining_payments_total = $remaining_payments_total + $remaining_installment->amount;
                                    @endphp
                                @endif
                            @endforeach

                            {{ arToIn($transaction->final_total - $payment_lines_total, 'DECIMAL') }}
                        </td>
                    </tr>
                    <tr>
                        <td style="white-space: nowrap;">تحريرا فى</td>
                        <td width="99%" style="direction: rtl;">
                            {{ dateFormate(\Carbon\Carbon::now()) }}
                        </td>
                    </tr>
                </table>
            </div>
            @foreach ($transaction->gurantors as $gurantor)
                <div style="page-break-after: always;">
                    @if (!empty($receipt_details->logo))
                        <div class="text-box centered">
                            <img style="max-height: 100px; width: auto;" src="{{ $receipt_details->logo }}"
                                 alt="Logo">
                        </div>
                    @endif

                    <h1 style="text-align:center">ملف الضامن</h1>

                    <br><br>
                    <table class="table table-bordered" id="installmentTable">
                        <tr>
                            <td style="white-space: nowrap;">الإسم</td>
                            <td width="99%">{{ $gurantor->name }}</td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap;">العنوان</td>
                            <td width="99%">{{ $gurantor->address }}</td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap;">الرقم القومى</td>
                            <td width="99%">
                                {{ arToIn($gurantor->national_id, 'TYPE_DEFAULT') }}
                                --}}
{{-- DECIMAL --}}{{--

                            </td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap;">رقم الموبايل</td>
                            <td width="99%">
                                {{ arToIn($gurantor->phone, 'TYPE_DEFAULT') }}
                                --}}
{{-- DECIMAL --}}{{--

                            </td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap;">سعر السلعة</td>
                            <td width="99%">
                                {{ arToIn($transaction->final_total, 'DECIMAL') }}
                                --}}
{{-- DECIMAL --}}{{--

                            </td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap;">المبلغ المدفوع</td>
                            <td width="99%">
                                @php
                                    $payment_lines_total = 0;
                                @endphp
                                @foreach ($transaction->payment_lines as $payment_lines)

                                    @php
                                        $payment_lines_total = $payment_lines_total + $payment_lines->amount;
                                    @endphp

                                @endforeach
                                {{ arToIn($payment_lines_total, 'DECIMAL') }}
                                --}}
{{-- DECIMAL --}}{{--

                            </td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap;">المبلغ المتبقى</td>
                            <td width="99%">
                                @php
                                    $remaining_payments_total = 0;
                                @endphp
                                @foreach ($transaction->installment as $remaining_installment)
                                    @if ($remaining_installment->status == 0)
                                        @php
                                            $remaining_payments_total = $remaining_payments_total + $remaining_installment->amount;
                                        @endphp
                                    @endif
                                @endforeach
                                {{ arToIn($transaction->final_total - $payment_lines_total, 'DECIMAL') }}
                                --}}
{{-- DECIMAL --}}{{--

                            </td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap;">تحريرا فى</td>
                            <td width="99%">{{ dateFormate(\Carbon\Carbon::now()) }}</td>
                        </tr>
                    </table>
                </div>
            @endforeach
            <div id="endorsement" style="page-break-after: always;width: calc(100% - 100px);margin:auto;">

                <h1 style="text-align:center">إقرار استلام</h1>
                <br><br>
                <br><br>


                <div class="row">
                    <div class="col-xs-6" style="font-size:20px;word-break: keep-all;">أقر أنا /
                        {{ $transaction->contact->first_name }}
                        {{ $transaction->contact->middle_name }} {{ $transaction->contact->last_name }}</div>
                    <div class="col-xs-6" style="font-size:20px;word-break: keep-all;">المقيم /
                        {{ $transaction->contact->address_line_1 }}</div>
                </div>

                <br>
                <br>

                <p style="font-size:20px;word-break: keep-all;">بأنني قد استلمت المبلغ المدون به ايصال الأمان الموقع مني
                    والمحرر علي من السيد / </p>

                <br>
                <br>

                <div class="row">
                    <div class="col-xs-6" style="font-size:20px;word-break: keep-all;">لصالح السيد /</div>
                    <div class="col-xs-6" style="font-size:20px;word-break: keep-all;">المقيم /</div>
                </div>

                <br>
                <br>
                <p style="font-size:20px;word-break: keep-all;text-align: justify;">
                    واننى قد استلمت هذا المبلغ نقدي وليس بضاعة وليس من حقي المنازعة بخصوص انتفاء ركن التسليم وذلك
                    لإستلامي
                    الفعلي لهذا المبلغ وانني ملزم برده نقدا ً - - --- -كما أقر بأن ما دون بالإيصال من بيانات وكذلك
                    التوقيع
                    المنسوب صدوره لي صحيحين ولا يجوز لي الطعن بالتزوير عليهم أمام المحكمة وفي حالة عدم الرد أكون مبددا
                    وخائنا للأمانة ولا يجوز شهادة الشهود في إثبات وجود هذا المبلغ أو الإنقضاء ولا يجوز توجيه اليمين
                    الحاسمة
                    أو اليمين المتممة مني او من وكيلي إلي المستلم مني والدائن ولا تبرأ ذمتي إلا بتقديم دليل كتابي يفيد
                    سداد
                    المبلغ المدون بهذا الإيصال والموقع مني بالبصمة والإمضاء إلي المستفيد وفقا ً لنصوص قانون الإثبات .
                </p>
            </div>
            @foreach ($transaction->gurantors as $gurantor)
                <div id="endorsement" style="page-break-after: always;width: calc(100% - 100px);margin:auto;">

                    <h1 style="text-align:center">إقرار استلام</h1>
                    <br><br>
                    <br><br>


                    <div class="row">
                        <div class="col-xs-6" style="font-size:20px;word-break: keep-all;">أقر أنا /
                            {{ $gurantor->name }}</div>
                        <div class="col-xs-6" style="font-size:20px;word-break: keep-all;">المقيم /
                            {{ $gurantor->address }}</div>
                    </div>

                    <br>
                    <br>

                    <p style="font-size:20px;word-break: keep-all;">بأنني قد استلمت المبلغ المدون به ايصال الأمان الموقع
                        مني
                        والمحرر علي من السيد / </p>

                    <br>
                    <br>

                    <div class="row">
                        <div class="col-xs-6" style="font-size:20px;word-break: keep-all;">لصالح السيد /</div>
                        <div class="col-xs-6" style="font-size:20px;word-break: keep-all;">المقيم /</div>
                    </div>

                    <br>
                    <br>
                    <p style="font-size:20px;word-break: keep-all;text-align: justify;">
                        واننى قد استلمت هذا المبلغ نقدي وليس بضاعة وليس من حقي المنازعة بخصوص انتفاء ركن التسليم وذلك
                        لإستلامي
                        الفعلي لهذا المبلغ وانني ملزم برده نقدا ً - - --- -كما أقر بأن ما دون بالإيصال من بيانات وكذلك
                        التوقيع
                        المنسوب صدوره لي صحيحين ولا يجوز لي الطعن بالتزوير عليهم أمام المحكمة وفي حالة عدم الرد أكون
                        مبددا
                        وخائنا للأمانة ولا يجوز شهادة الشهود في إثبات وجود هذا المبلغ أو الإنقضاء ولا يجوز توجيه اليمين
                        الحاسمة
                        أو اليمين المتممة مني او من وكيلي إلي المستلم مني والدائن ولا تبرأ ذمتي إلا بتقديم دليل كتابي
                        يفيد
                        سداد
                        المبلغ المدون بهذا الإيصال والموقع مني بالبصمة والإمضاء إلي المستفيد وفقا ً لنصوص قانون الإثبات
                        .
                    </p>
                </div>
            @endforeach
            <div style="page-break-after: always;" id="gurantor-receipt">
                <h1>إيصال إستلام نقدية علي سبيل الأمانة</h1>
                <br>
                <br>
                <br>
                <br>
                <p>
                    استلمت انا السيد / {{ $transaction->contact->first_name }}
                    {{ $transaction->contact->middle_name }} {{ $transaction->contact->last_name }}
                </p>
                <br><br>
                <p>
                    المقيم / {{ $transaction->contact->address_line_1 }}
                </p>
                <br><br>
                <p>
                    أحمل رقم قومي : {{ arToIn($transaction->contact->custom_field1, 'TYPE_DEFAULT') }}
                    --}}
{{-- DECIMAL --}}{{--

                </p>
                <br><br>
                <p>
                    من السيد /
                </p>
                <br><br>
                <p>
                    مبلغ وقدرة
                    ( {{ arToIn($transaction->final_total, 'DECIMAL') }} )
                    --}}
{{-- DECIMAL --}}{{--

                    {{ $total_in_words }}
                    --}}
{{-- فقط سبعة ألاف خمسة مائة واربعون جنيه مصري فقط
                لا غير --}}{{--

                    وذلك لرده للطالب حين طلبه واذ أقم برد المبلغ للطالب اعتبر مبددا وخائنا للأمانة وأتحمل المسئولية
                    الجنائية والمدنية نحو إرتكابي
                    الجريمة المعاقب عليها قانونا وهذا اقرار مني بذلك


                </p>

                <br>
                <br>
                <br>
                <br>
                <div class="row">
                    <div class="col-xs-4" style="text-align:center;font-size:20px;">التوقيع</div>
                    <div class="col-xs-4" style="text-align:center;font-size:20px;">البصمة</div>
                    <div class="col-xs-4" style="text-align:center;font-size:20px;">الرقم القومى</div>
                </div>

            </div>
            @foreach ($transaction->gurantors as $gurantor)

                <div style="page-break-after: always;" id="gurantor-receipt">
                    <h1>إيصال إستلام نقدية علي سبيل الأمانة</h1>
                    <br>
                    <br>
                    <br>
                    <br>
                    <p>
                        استلمت انا السيد / {{ $gurantor->name }}
                    </p>
                    <br><br>
                    <p>
                        المقيم / {{ $gurantor->address }}
                    </p>
                    <br><br>
                    <p>
                        أحمل رقم قومي : {{ arToIn($gurantor->national_id, 'TYPE_DEFAULT') }}
                        --}}
{{-- DECIMAL --}}{{--

                    </p>
                    <br><br>
                    <p>
                        من السيد /
                    </p>
                    <br><br>
                    <p>
                        مبلغ وقدرة ( {{ arToIn($transaction->final_total, 'DECIMAL') }} )

                        {{ $total_in_words }}
                        --}}
{{-- فقط سبعة ألاف خمسة مائة واربعون جنيه مصري فقط
                    لا غير --}}{{--

                        وذلك لرده للطالب حين طلبه واذ أقم برد المبلغ للطالب اعتبر مبددا وخائنا للأمانة وأتحمل المسئولية
                        الجنائية والمدنية نحو إرتكابي
                        الجريمة المعاقب عليها قانونا وهذا اقرار مني بذلك


                    </p>

                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-xs-4" style="text-align:center;font-size:20px;">التوقيع</div>
                        <div class="col-xs-4" style="text-align:center;font-size:20px;">البصمة</div>
                        <div class="col-xs-4" style="text-align:center;font-size:20px;">الرقم القومى</div>
                    </div>

                </div>

            @endforeach

            <div style="page-break-after: always;padding:25px;">
                <?php
                // dd($transaction, $transaction->payment_lines, $transaction->installment, $transaction->installmentBenefit);
                ?>
                @if (!empty($receipt_details->logo))
                    <div class="text-box centered">
                        <img style="max-height: 100px; width: auto;" src="{{ $receipt_details->logo }}" alt="Logo">
                    </div>
                @endif

                <h1 style="text-align:center">بيان التقسيط</h1>
                <br><br>


                @php
                    $count_items = 0;
                    $sum_items = 0;
                    $items_discount = 0;
                    $products = '';
                @endphp
                @forelse($receipt_details->lines as $line)
                    @php
                        $count_items++;
                        $sum_items += $line['quantity'];
                        $items_discount += $line['line_discount'];
                        if ($products == '') {
                            $products .= $line['name'];
                        } else {
                            $products .= ', ' . $line['name'];
                        }
                    @endphp
                    @endforeach



                    <table id="installment_calculations">
                        <tr>
                            <td style="white-space: nowrap;">مبلغ الفاتورة</td>
                            <td style="width: 99%;">

                                {{ arToIn($transaction->final_total, 'DECIMAL') }}
                            </td>
                        </tr>

                        <tr>
                            <td style="white-space: nowrap;">عدد الأقساط</td>
                            <td style="width: 99%;">{{ arToIn(count($transaction->installment), 'DECIMAL') }}</td>
                        </tr>

                        <tr>
                            <td style="white-space: nowrap;">المبلغ المدفوع</td>
                            <td style="width: 99%;">{{ arToIn($payment_lines_total, 'DECIMAL') }}</td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap;">المبلغ المتبقى</td>
                            <td style="width: 99%;">
                                {{ arToIn($transaction->final_total - $payment_lines_total, 'DECIMAL') }}
                            </td>
                        </tr>


                    </table>


                    @if (count($transaction->installment) > 0)
                        <div style="margin: 15px auto;border: thin solid #000;font-size:20px;text-align:center;">
                            @php
                                $due_percentage = $transaction->installment[0]->due_percentage;
                                $due_interval = $transaction->installment[0]->due_interval;
                                $due_interval_type = $transaction->installment[0]->due_interval_type;
                                $installment_amount = $transaction->installment[0]->amount;
                                $due_penalty = $installment_amount * ($due_percentage / 100);

                            @endphp
                            @if ($due_interval_type == 'day')
                                @php
                                    $due_interval_type = 'يوم';
                                @endphp
                            @elseif($due_interval_type == 'month')
                                @php
                                    $due_interval_type = 'شهر';
                                @endphp
                            @elseif($due_interval_type == 'year')
                                @php
                                    $due_interval_type = 'سنة';
                                @endphp
                            @endif
                            فى حالة تأخير أى قسط يتم توقيع غرامة مقدارها ({{ arToIn($due_penalty, 'DECIMAL') }}) لكل
                            ({{ arToIn($due_interval, 'DECIMAL') }}:
                            {{ $due_interval_type }}) على العميل
                        </div>

                        <h5>بيان الأقساط تفصيليا</h5>
                        <table class="table table-bordered">
                            <tr>
                                <th>#</th>
                                <th>التوقيت</th>
                                <th>المبلغ</th>
                                <th style="text-align: center;">حالة الدفع</th>
                            </tr>
                            @foreach ($transaction->installment as $installment)


                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ dateFormate($installment->due_date) }}</td>
                                    <td>{{ arToIn($installment->amount, 'DECIMAL') }}</td>
                                    <td style="text-align: center;">
                                        @if ($installment->status == 1)
                                            &#10003;
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>

                            @endforeach
                        </table>
                    @endif


                    <br>
                    <div style="display: flex;justify-content: space-around;">
                        <div>
                            <div>توقيع المستلم /</div>

                        </div>
                        <div>بصمة</div>
                    </div>
            </div>
        @endif

        @if (count($transaction->installment) > 0)
            @foreach ($transaction->gurantors as $gurantor)
                <div style="page-break-after: always;padding:25px;">

                    @if (!empty($receipt_details->logo))
                        <div class="text-box centered">
                            <img style="max-height: 100px; width: auto;" src="{{ $receipt_details->logo }}"
                                 alt="Logo">
                        </div>
                    @endif

                    <h1 style="text-align:center">بيان التقسيط</h1>

                    @php
                        $count_items = 0;
                        $sum_items = 0;
                        $items_discount = 0;
                        $products = '';
                    @endphp
                    @forelse($receipt_details->lines as $line)
                        @php
                            $count_items++;
                            $sum_items += $line['quantity'];
                            $items_discount += $line['line_discount'];
                            if ($products == '') {
                                $products .= $line['name'];
                            } else {
                                $products .= ', ' . $line['name'];
                            }
                        @endphp
                        @endforeach

                        <br><br>

                        <table id="installment_calculations">
                            <tr>
                                <td style="white-space: nowrap;">مبلغ الفاتورة</td>
                                <td style="width: 99%;">
                                    {{ arToIn($transaction->final_total, 'DECIMAL') }}
                                </td>
                            </tr>

                            <tr>
                                <td style="white-space: nowrap;">عدد الأقساط</td>
                                <td style="width: 99%;">{{ arToIn(count($transaction->installment), 'DECIMAL') }}</td>
                            </tr>

                            <tr>
                                <td style="white-space: nowrap;">المبلغ المدفوع</td>
                                <td style="width: 99%;">{{ arToIn($payment_lines_total, 'DECIMAL') }}</td>
                            </tr>
                            <tr>
                                <td style="white-space: nowrap;">المبلغ المتبقى</td>
                                <td style="width: 99%;">

                                    {{ arToIn($transaction->installmentBenefit->installment_amount + $transaction->installmentBenefit->benefits - $payment_lines_total, 'DECIMAL') }}
                                </td>
                            </tr>


                        </table>

                        @if (count($transaction->installment) > 0)
                            <div style="margin: 15px auto;border: thin solid #000;font-size:20px;text-align:center;">
                                @php
                                    $due_percentage = $transaction->installment[0]->due_percentage;
                                    $due_interval = $transaction->installment[0]->due_interval;
                                    $due_interval_type = $transaction->installment[0]->due_interval_type;
                                    $installment_amount = $transaction->installment[0]->amount;

                                    $due_penalty = $installment_amount * ($due_percentage / 100);

                                @endphp
                                @if ($due_interval_type == 'day')
                                    @php
                                        $due_interval_type = 'يوم';
                                    @endphp
                                @elseif($due_interval_type == 'month')
                                    @php
                                        $due_interval_type = 'شهر';
                                    @endphp
                                @elseif($due_interval_type == 'year')
                                    @php
                                        $due_interval_type = 'سنة';
                                    @endphp
                                @endif
                                فى حالة تأخير أى قسط يتم توقيع غرامة مقدارها ({{ arToIn($due_penalty, 'DECIMAL') }}) لكل
                                ({{ arToIn($due_interval, 'DECIMAL') }}:
                                {{ arToIn($due_interval_type, 'DECIMAL') }}) على العميل
                            </div>

                            <h5>بيان الأقساط تفصيليا</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th>#</th>
                                    <th>التوقيت</th>
                                    <th>المبلغ</th>
                                    <th style="text-align: center;">حالة الدفع</th>
                                </tr>
                                @foreach ($transaction->installment as $installment)


                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ dateFormate($installment->due_date) }}</td>
                                        <td>{{ arToIn($installment->amount, 'DECIMAL') }}</td>
                                        <td style="text-align: center;">
                                            @if ($installment->status == 1)
                                                &#10003;
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>

                                @endforeach
                            </table>
                        @endif


                        <br>
                        <div style="display: flex;justify-content: space-around;">
                            <div>
                                <div>توقيع المستلم / </div>

                            </div>
                            <div>بصمة</div>
                        </div>
                </div>
            @endforeach
        @endif

        @if (count($transaction->installment) > 0)
            <div style="page-break-after: always;width: calc(100% - 100px);margin:auto;" id="commodity-sale-statement">
                <h1 style="text-align: center">بيان بيع سلعة</h1>
                <br>
                <br>

                <p>نوع السلعة / {{ $products }}</p>
                <br>

                <p>سعر السلعة / {{ arToIn($transaction->final_total, 'DECIMAL') }}</p>
                <br>
                <p>المبلغ المدفوع / {{ arToIn($payment_lines_total, 'DECIMAL') }}</p>
                <br>
                <p>المبلغ المتبقي /

                    {{ arToIn($transaction->installmentBenefit->installment_amount + $transaction->installmentBenefit->benefits - $payment_lines_total, 'DECIMAL') }}
                </p>
                <br>
                <p>عدد أشهر التقسيط / {{ arToIn(count($transaction->installment), 'DECIMAL') }}</p>
                <br><br>

                <h3>إقرار</h3>

                <br><br>

                <div class="row">
                    <div class="col-xs-6" style="font-size:20px;word-break: keep-all;">أقر أنا /
                        {{ $transaction->contact->first_name }}
                        {{ $transaction->contact->middle_name }} {{ $transaction->contact->last_name }}</div>
                    <div class="col-xs-6" style="font-size:20px;word-break: keep-all;">المقيم /
                        {{ $transaction->contact->address_line_1 }}</div>
                </div>
                <br><br>
                <p>واحمل رقم قومي / {{ arToIn($transaction->contact->custom_field1, 'TYPE_DEFAULT') }}</p>

                <br>
                <br>
                <br>

                <p style="font-size:20px;word-break: keep-all;text-align: justify;">
                    اقر بإستلامي السلعة المبينة أعلاه جديدة وغير مستعملة وبحالة جيدة بعد معاينتها المعاينة التامة
                    النافية
                    للجهالة وقبلتها بحالتها التي هي عليها وقت شراؤها واقر بإلتزامي بسداد جميع الأقساط في موعيدها المحددة
                    واذا لم اقم بالسداد أو التأخير عن سداد الأقساط في مواعيدها أعتبر مبددا ً وخائنا للأمانة بقيمة السلعة
                    المشتراه وهذا إقرار مني بذلك

                </p>

                <br>
                <br>
                <br>
                <div class="row">
                    <div class="col-xs-6">توقيع المستلم</div>
                    <div class="col-xs-6">بصمة المستلم </div>
                </div>

            </div>

            @foreach ($transaction->gurantors as $gurantor)
                <div style="page-break-after: always;width: calc(100% - 100px);margin:auto;"
                     id="commodity-sale-statement">
                    <h1 style="text-align: center">بيان بيع سلعة</h1>
                    <br>
                    <br>

                    <p>نوع السلعة / {{ $products }}</p>
                    <br>

                    <p>سعر السلعة / {{ arToIn($transaction->final_total, 'DECIMAL') }}</p>
                    <br>
                    <p>المبلغ المدفوع / {{ arToIn($payment_lines_total, 'DECIMAL') }}</p>
                    <br>
                    <p>المبلغ المتبقي /
                        {{ arToIn($transaction->installmentBenefit->installment_amount + $transaction->installmentBenefit->benefits - $payment_lines_total, 'DECIMAL') }}
                    </p>
                    <br>
                    <p>عدد أشهر التقسيط / {{ arToIn(count($transaction->installment), 'DECIMAL') }}</p>
                    <br><br>

                    <h3>إقرار</h3>

                    <br><br>

                    <div class="row">
                        <div class="col-xs-6" style="font-size:20px;word-break: keep-all;">أقر أنا /
                            {{ $gurantor->name }}</div>
                        <div class="col-xs-6" style="font-size:20px;word-break: keep-all;">المقيم /
                            {{ $gurantor->address }}</div>
                    </div>
                    <br><br>
                    <p>واحمل رقم قومي / {{ arToIn($gurantor->national_id, 'TYPE_DEFAULT') }}</p>

                    <br>
                    <br>
                    <br>

                    <p style="font-size:20px;word-break: keep-all;text-align: justify;">
                        اقر بإستلامي السلعة المبينة أعلاه جديدة وغير مستعملة وبحالة جيدة بعد معاينتها المعاينة التامة
                        النافية
                        للجهالة وقبلتها بحالتها التي هي عليها وقت شراؤها واقر بإلتزامي بسداد جميع الأقساط في موعيدها
                        المحددة
                        واذا لم اقم بالسداد أو التأخير عن سداد الأقساط في مواعيدها أعتبر مبددا ً وخائنا للأمانة بقيمة
                        السلعة
                        المشتراه وهذا إقرار مني بذلك

                    </p>

                    <br>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-xs-6">توقيع المستلم</div>
                        <div class="col-xs-6">بصمة المستلم </div>
                    </div>

                </div>
            @endforeach
        @endif
    @endif
    --}}
{{--End  partial and due and insatallment  --}}{{--


</div>--}}
