<!-- business information here -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- <link rel="stylesheet" href="style.css"> -->
        <title>Receipt-<?php echo e($receipt_details->invoice_no, false); ?></title>
    </head>
    <style>
    @import  url('https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap');

    @page  {
        margin: 10px !important;
    }

    body {

        justify-content: center;
        padding: 0 !important;
    }

    .container {
        padding: 0 !important
    }

    #company {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #invoice-num {
        margin-top: 4px;
    }

    #invoice-num>div {
        text-align: center
    }

    #datetime {
        margin-top: 0px;
        display: flex;
    }

    #datetime>div {
        /* text-align: center; */
        padding: 0 2px;
    }

    #datetime {
        margin: 6px 0;
    }

    .items-table {
        margin-top: 10px;
    }

    .items-table table th,
    .items-table table td {
        padding: 4px;
        text-align: center;
    }

    #totals {
        display: flex;
        margin-top: 10px;
        direction: rtl;
    }

    #totals>div:nth-of-type(2) {
        width: 100%;
        margin-inline-start: 4px;
        padding-inline-start: 4px;
        border-right: 1px solid rgba(146, 146, 146, 0.152);
    }

    #totals>div>div {
        padding: 4px;
    }

    #totals div {
        /* white-space: nowrap; */
    }

    #totals>div:nth-of-type(1) table {
        white-space: nowrap;
    }

    #totals>div:nth-of-type(2)>tr>td:nth-of-type(2) {
        width: 100%;
    }


    #totals>div:nth-of-type(2) table tr td:nth-of-type(2) {
        white-space: nowrap;
    }

    #total_row>td {
        padding-top: 5px;
    }

    #total_row>td>div {
        border-top: 1px dotted rgba(146, 146, 146, 0.152);
        padding-top: 5px !important;
    }

    #top-table {
        /* margin-bottom: 10px; */
    }

    table {
        width: 100%;
    }



    #logo-wrapper {
        width: 100%;
        text-align: center;
        margin: 10px auto;
    }

    #logo-wrapper img {
        max-height: 60px;
    }

    .text-center {
        text-align: center;
    }

    .ticket {
        width: 98%;
        max-width: 98%;
        margin-left: 6px;
        font-weight: 800;
        color: black;

    }
    

    #header-text {
        padding-top: 10px;
    }

    body {
        padding: 1 !important;
        margin: 0 !important;
        /* background-color: red !important; */
        width: 100% !important;
    }

    #installmentTable {
        font-size: 24px;
        margin: 15px 0 !important;
    }

    #installment_calculations tr>td:nth-of-type(1) {
        padding-inline-end: 10px;

    }

    #installmentTable td {
        font-size: 20px;
    }

    #gurantor-receipt {
        width: calc(100% - 100px);
        margin: auto;
    }

    #gurantor-receipt h1 {
        text-align: center;
    }

    #gurantor-receipt p {
        font-size: 20px;
    }

    #commodity-sale-statement p,
    #commodity-sale-statement div {
        font-size: 20px;
    }

</style>
    <body>
          <?php
        $numbers = range(0, 9);
        function arToIn($num, $pattern)
        {
            if ($pattern == 'TYPE_DEFAULT') {
                $fmt = numfmt_create('ar', NumberFormatter::TYPE_DEFAULT);
            } elseif ($pattern == 'DECIMAL') {
                $fmt = numfmt_create('ar', NumberFormatter::DECIMAL);
            }
            return numfmt_format($fmt, $num);
        }
        
        function dateFormate($date)
        {
            $fmt = datefmt_create('ar_EG', IntlDateFormatter::FULL, IntlDateFormatter::FULL, 'Africa/Cairo', IntlDateFormatter::GREGORIAN, 'yyyy / M / d');
            return datefmt_format($fmt, $date);
        }
    ?>


    <?php if($transaction->payment_status == 'partial' || $transaction->payment_status == 'due'): ?>
        <?php if(count($transaction->installment) > 0): ?>
            <div style="page-break-after: always;">
                <?php if(!empty($receipt_details->logo)): ?>
                    <div class="text-box centered">
                        <img style="max-height: 100px; width: auto;" src="<?php echo e($receipt_details->logo, false); ?>" alt="Logo">
                    </div>
                <?php endif; ?>

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
                        <td width="99%"> <?php echo e($transaction->contact->first_name, false); ?>

                            <?php echo e($transaction->contact->middle_name, false); ?> <?php echo e($transaction->contact->last_name, false); ?></td>
                    </tr>
                    <tr>
                        <td style="white-space: nowrap;">العنوان</td>
                        <td width="99%"><?php echo e($transaction->contact->address_line_1, false); ?></td>
                    </tr>
                    <tr>
                        <td style="white-space: nowrap;">الرقم القومى</td>
                        <td width="99%">
                            <?php echo e(arToIn($transaction->contact->custom_field1, 'TYPE_DEFAULT'), false); ?>

                        </td>
                    </tr>
                    <tr>
                        <td style="white-space: nowrap;">رقم الموبايل</td>
                        <td width="99%">
                            <?php echo e(arToIn($transaction->contact->mobile, 'TYPE_DEFAULT'), false); ?>

                        </td>
                    </tr>
                    <tr>
                        <td style="white-space: nowrap;">سعر السلعة</td>
                        <td width="99%">
                            <?php echo e(arToIn($transaction->final_total, 'DECIMAL'), false); ?>

                        </td>
                    </tr>
                    <tr>
                        <td style="white-space: nowrap;">المبلغ المدفوع</td>
                        <td width="99%">
                            <?php
                                $payment_lines_total = 0;
                            ?>
                            <?php $__currentLoopData = $transaction->payment_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_lines): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php
                                    $payment_lines_total = $payment_lines_total + $payment_lines->amount;
                                ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e(arToIn($payment_lines_total, 'DECIMAL'), false); ?>

                        </td>
                    </tr>
                    <tr>
                        <td style="white-space: nowrap;">المبلغ المتبقى</td>
                        <td width="99%">
                            <?php
                                $remaining_payments_total = 0;
                            ?>
                            <?php $__currentLoopData = $transaction->installment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $remaining_installment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($remaining_installment->status == 0): ?>
                                    <?php
                                        $remaining_payments_total = $remaining_payments_total + $remaining_installment->amount;
                                    ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php echo e(arToIn($transaction->final_total - $payment_lines_total, 'DECIMAL'), false); ?>

                        </td>
                    </tr>
                    <tr>
                        <td style="white-space: nowrap;">تحريرا فى</td>
                        <td width="99%" style="direction: rtl;">
                            <?php echo e(dateFormate(\Carbon\Carbon::now()), false); ?>

                        </td>
                    </tr>
                </table>
            </div>


            <?php $__currentLoopData = $transaction->gurantors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gurantor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div style="page-break-after: always;">
                    <?php if(!empty($receipt_details->logo)): ?>
                        <div class="text-box centered">
                            <img style="max-height: 100px; width: auto;" src="<?php echo e($receipt_details->logo, false); ?>"
                                alt="Logo">
                        </div>
                    <?php endif; ?>

                    <h1 style="text-align:center">ملف الضامن</h1>

                    <br><br>
                    <table class="table table-bordered" id="installmentTable">
                        <tr>
                            <td style="white-space: nowrap;">الإسم</td>
                            <td width="99%"><?php echo e($gurantor->name, false); ?></td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap;">العنوان</td>
                            <td width="99%"><?php echo e($gurantor->address, false); ?></td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap;">الرقم القومى</td>
                            <td width="99%">
                                <?php echo e(arToIn($gurantor->national_id, 'TYPE_DEFAULT'), false); ?>

                                
                            </td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap;">رقم الموبايل</td>
                            <td width="99%">
                                <?php echo e(arToIn($gurantor->phone, 'TYPE_DEFAULT'), false); ?>

                                
                            </td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap;">سعر السلعة</td>
                            <td width="99%">
                                <?php echo e(arToIn($transaction->final_total, 'DECIMAL'), false); ?>

                                
                            </td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap;">المبلغ المدفوع</td>
                            <td width="99%">
                                <?php
                                    $payment_lines_total = 0;
                                ?>
                                <?php $__currentLoopData = $transaction->payment_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_lines): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php
                                        $payment_lines_total = $payment_lines_total + $payment_lines->amount;
                                    ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e(arToIn($payment_lines_total, 'DECIMAL'), false); ?>

                                
                            </td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap;">المبلغ المتبقى</td>
                            <td width="99%">
                                <?php
                                    $remaining_payments_total = 0;
                                ?>
                                <?php $__currentLoopData = $transaction->installment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $remaining_installment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($remaining_installment->status == 0): ?>
                                        <?php
                                            $remaining_payments_total = $remaining_payments_total + $remaining_installment->amount;
                                        ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e(arToIn($transaction->final_total - $payment_lines_total, 'DECIMAL'), false); ?>

                                
                            </td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap;">تحريرا فى</td>
                            <td width="99%"><?php echo e(dateFormate(\Carbon\Carbon::now()), false); ?></td>
                        </tr>
                    </table>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div id="endorsement" style="page-break-after: always;width: calc(100% - 100px);margin:auto;">

                <h1 style="text-align:center">إقرار استلام</h1>
                <br><br>
                <br><br>


                <div class="row">
                    <div class="col-xs-6" style="font-size:20px;word-break: keep-all;">أقر أنا /
                        <?php echo e($transaction->contact->first_name, false); ?>

                        <?php echo e($transaction->contact->middle_name, false); ?> <?php echo e($transaction->contact->last_name, false); ?></div>
                    <div class="col-xs-6" style="font-size:20px;word-break: keep-all;">المقيم /
                        <?php echo e($transaction->contact->address_line_1, false); ?></div>
                </div>

                <br>
                <br>

                <p style="font-size:20px;word-break: keep-all;">بأنني قد استلمت المبلغ المدون به ايصال الأمان الموقع مني
                    والمحرر علي من السيد / </p>

                <br>
                <br>

                <div class="row">
                    <div class="col-xs-6" style="font-size:20px;word-break: keep-all;">لصالح السيد / </div>
                    <div class="col-xs-6" style="font-size:20px;word-break: keep-all;">المقيم / </div>
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

            <?php $__currentLoopData = $transaction->gurantors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gurantor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div id="endorsement" style="page-break-after: always;width: calc(100% - 100px);margin:auto;">

                    <h1 style="text-align:center">إقرار استلام</h1>
                    <br><br>
                    <br><br>


                    <div class="row">
                        <div class="col-xs-6" style="font-size:20px;word-break: keep-all;">أقر أنا /
                            <?php echo e($gurantor->name, false); ?></div>
                        <div class="col-xs-6" style="font-size:20px;word-break: keep-all;">المقيم /
                            <?php echo e($gurantor->address, false); ?></div>
                    </div>

                    <br>
                    <br>

                    <p style="font-size:20px;word-break: keep-all;">بأنني قد استلمت المبلغ المدون به ايصال الأمان الموقع
                        مني
                        والمحرر علي من السيد / </p>

                    <br>
                    <br>

                    <div class="row">
                        <div class="col-xs-6" style="font-size:20px;word-break: keep-all;">لصالح السيد / </div>
                        <div class="col-xs-6" style="font-size:20px;word-break: keep-all;">المقيم / </div>
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div style="page-break-after: always;" id="gurantor-receipt">
                <h1>إيصال إستلام نقدية علي سبيل الأمانة</h1>
                <br>
                <br>
                <br>
                <br>
                <p>
                    استلمت انا السيد / <?php echo e($transaction->contact->first_name, false); ?>

                    <?php echo e($transaction->contact->middle_name, false); ?> <?php echo e($transaction->contact->last_name, false); ?>

                </p>
                <br><br>
                <p>
                    المقيم / <?php echo e($transaction->contact->address_line_1, false); ?>

                </p>
                <br><br>
                <p>
                    أحمل رقم قومي : <?php echo e(arToIn($transaction->contact->custom_field1, 'TYPE_DEFAULT'), false); ?>

                    
                </p>
                <br><br>
                <p>
                    من السيد /
                </p>
                <br><br>
                <p>
                    مبلغ وقدرة
                    ( <?php echo e(arToIn($transaction->final_total, 'DECIMAL'), false); ?> )
                    
                    <?php echo e($total_in_words, false); ?>

                    
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


            <?php $__currentLoopData = $transaction->gurantors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gurantor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div style="page-break-after: always;" id="gurantor-receipt">
                    <h1>إيصال إستلام نقدية علي سبيل الأمانة</h1>
                    <br>
                    <br>
                    <br>
                    <br>
                    <p>
                        استلمت انا السيد / <?php echo e($gurantor->name, false); ?>

                    </p>
                    <br><br>
                    <p>
                        المقيم / <?php echo e($gurantor->address, false); ?>

                    </p>
                    <br><br>
                    <p>
                        أحمل رقم قومي : <?php echo e(arToIn($gurantor->national_id, 'TYPE_DEFAULT'), false); ?>

                        
                    </p>
                    <br><br>
                    <p>
                        من السيد /
                    </p>
                    <br><br>
                    <p>
                        مبلغ وقدرة ( <?php echo e(arToIn($transaction->final_total, 'DECIMAL'), false); ?> )

                        <?php echo e($total_in_words, false); ?>

                        
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

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            <div style="page-break-after: always;padding:25px;">
                <?php
                // dd($transaction, $transaction->payment_lines, $transaction->installment, $transaction->installmentBenefit);
                ?>
                <?php if(!empty($receipt_details->logo)): ?>
                    <div class="text-box centered">
                        <img style="max-height: 100px; width: auto;" src="<?php echo e($receipt_details->logo, false); ?>" alt="Logo">
                    </div>
                <?php endif; ?>

                <h1 style="text-align:center">بيان التقسيط</h1>
                <br><br>




                <?php
                    $count_items = 0;
                    $sum_items = 0;
                    $items_discount = 0;
                    $products = '';
                ?>
                <?php $__empty_1 = true; $__currentLoopData = $receipt_details->lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $count_items++;
                        $sum_items += $line['quantity'];
                        $items_discount += $line['line_discount'];
                        if ($products == '') {
                            $products .= $line['name'];
                        } else {
                            $products .= ', ' . $line['name'];
                        }
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                <table id="installment_calculations">
                    <tr>
                        <td style="white-space: nowrap;">مبلغ الفاتورة</td>
                        <td style="width: 99%;">

                            <?php echo e(arToIn($transaction->final_total, 'DECIMAL'), false); ?>

                        </td>
                    </tr>

                    <tr>
                        <td style="white-space: nowrap;">عدد الأقساط</td>
                        <td style="width: 99%;"><?php echo e(arToIn(count($transaction->installment), 'DECIMAL'), false); ?></td>
                    </tr>

                    <tr>
                        <td style="white-space: nowrap;">المبلغ المدفوع</td>
                        <td style="width: 99%;"><?php echo e(arToIn($payment_lines_total, 'DECIMAL'), false); ?></td>
                    </tr>
                    <tr>
                        <td style="white-space: nowrap;">المبلغ المتبقى</td>
                        <td style="width: 99%;">
                            <?php echo e(arToIn($transaction->final_total - $payment_lines_total, 'DECIMAL'), false); ?>

                        </td>
                    </tr>


                </table>


                <?php if(count($transaction->installment) > 0): ?>
                    <div style="margin: 15px auto;border: thin solid #000;font-size:20px;text-align:center;">
                        <?php
                            $due_percentage = $transaction->installment[0]->due_percentage;
                            $due_interval = $transaction->installment[0]->due_interval;
                            $due_interval_type = $transaction->installment[0]->due_interval_type;
                            $installment_amount = $transaction->installment[0]->amount;
                            $due_penalty = $installment_amount * ($due_percentage / 100);
                            
                        ?>
                        <?php if($due_interval_type == 'day'): ?>
                            <?php
                                $due_interval_type = 'يوم';
                            ?>
                        <?php elseif($due_interval_type == 'month'): ?>
                            <?php
                                $due_interval_type = 'شهر';
                            ?>
                        <?php elseif($due_interval_type == 'year'): ?>
                            <?php
                                $due_interval_type = 'سنة';
                            ?>
                        <?php endif; ?>
                        فى حالة تأخير أى قسط يتم توقيع غرامة مقدارها (<?php echo e(arToIn($due_penalty, 'DECIMAL'), false); ?>) لكل
                        (<?php echo e(arToIn($due_interval, 'DECIMAL'), false); ?>:
                        <?php echo e($due_interval_type, false); ?>) على العميل
                    </div>

                    <h5>بيان الأقساط تفصيليا</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>#</th>
                            <th>التوقيت</th>
                            <th>المبلغ</th>
                            <th style="text-align: center;">حالة الدفع</th>
                        </tr>
                        <?php $__currentLoopData = $transaction->installment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $installment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                            <tr>
                                <td><?php echo e($loop->index + 1, false); ?></td>
                                <td><?php echo e(dateFormate($installment->due_date), false); ?></td>
                                <td><?php echo e(arToIn($installment->amount, 'DECIMAL'), false); ?></td>
                                <td style="text-align: center;">
                                    <?php if($installment->status == 1): ?>
                                        &#10003;
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </td>
                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                <?php endif; ?>


                <br>
                <div style="display: flex;justify-content: space-around;">
                    <div>
                        <div>توقيع المستلم / </div>

                    </div>
                    <div>بصمة</div>
                </div>
            </div>
        <?php endif; ?>

        <?php if(count($transaction->installment) > 0): ?>

            <?php $__currentLoopData = $transaction->gurantors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gurantor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div style="page-break-after: always;padding:25px;">

                    <?php if(!empty($receipt_details->logo)): ?>
                        <div class="text-box centered">
                            <img style="max-height: 100px; width: auto;" src="<?php echo e($receipt_details->logo, false); ?>"
                                alt="Logo">
                        </div>
                    <?php endif; ?>

                    <h1 style="text-align:center">بيان التقسيط</h1>

                    <?php
                        $count_items = 0;
                        $sum_items = 0;
                        $items_discount = 0;
                        $products = '';
                    ?>
                    <?php $__empty_2 = true; $__currentLoopData = $receipt_details->lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                        <?php
                            $count_items++;
                            $sum_items += $line['quantity'];
                            $items_discount += $line['line_discount'];
                            if ($products == '') {
                                $products .= $line['name'];
                            } else {
                                $products .= ', ' . $line['name'];
                            }
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <br><br>

                    <table id="installment_calculations">
                        <tr>
                            <td style="white-space: nowrap;">مبلغ الفاتورة</td>
                            <td style="width: 99%;">
                                <?php echo e(arToIn($transaction->final_total, 'DECIMAL'), false); ?>

                            </td>
                        </tr>

                        <tr>
                            <td style="white-space: nowrap;">عدد الأقساط</td>
                            <td style="width: 99%;"><?php echo e(arToIn(count($transaction->installment), 'DECIMAL'), false); ?></td>
                        </tr>

                        <tr>
                            <td style="white-space: nowrap;">المبلغ المدفوع</td>
                            <td style="width: 99%;"><?php echo e(arToIn($payment_lines_total, 'DECIMAL'), false); ?></td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap;">المبلغ المتبقى</td>
                            <td style="width: 99%;">

                                <?php echo e(arToIn($transaction->installmentBenefit->installment_amount + $transaction->installmentBenefit->benefits - $payment_lines_total, 'DECIMAL'), false); ?>

                            </td>
                        </tr>


                    </table>

                    <?php if(count($transaction->installment) > 0): ?>
                        <div style="margin: 15px auto;border: thin solid #000;font-size:20px;text-align:center;">
                            <?php
                                $due_percentage = $transaction->installment[0]->due_percentage;
                                $due_interval = $transaction->installment[0]->due_interval;
                                $due_interval_type = $transaction->installment[0]->due_interval_type;
                                $installment_amount = $transaction->installment[0]->amount;
                                
                                $due_penalty = $installment_amount * ($due_percentage / 100);
                                
                            ?>
                            <?php if($due_interval_type == 'day'): ?>
                                <?php
                                    $due_interval_type = 'يوم';
                                ?>
                            <?php elseif($due_interval_type == 'month'): ?>
                                <?php
                                    $due_interval_type = 'شهر';
                                ?>
                            <?php elseif($due_interval_type == 'year'): ?>
                                <?php
                                    $due_interval_type = 'سنة';
                                ?>
                            <?php endif; ?>
                            فى حالة تأخير أى قسط يتم توقيع غرامة مقدارها (<?php echo e(arToIn($due_penalty, 'DECIMAL'), false); ?>) لكل
                            (<?php echo e(arToIn($due_interval, 'DECIMAL'), false); ?>:
                            <?php echo e(arToIn($due_interval_type, 'DECIMAL'), false); ?>) على العميل
                        </div>

                        <h5>بيان الأقساط تفصيليا</h5>
                        <table class="table table-bordered">
                            <tr>
                                <th>#</th>
                                <th>التوقيت</th>
                                <th>المبلغ</th>
                                <th style="text-align: center;">حالة الدفع</th>
                            </tr>
                            <?php $__currentLoopData = $transaction->installment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $installment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                <tr>
                                    <td><?php echo e($loop->index + 1, false); ?></td>
                                    <td><?php echo e(dateFormate($installment->due_date), false); ?></td>
                                    <td><?php echo e(arToIn($installment->amount, 'DECIMAL'), false); ?></td>
                                    <td style="text-align: center;">
                                        <?php if($installment->status == 1): ?>
                                            &#10003;
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    <?php endif; ?>


                    <br>
                    <div style="display: flex;justify-content: space-around;">
                        <div>
                            <div>توقيع المستلم / </div>

                        </div>
                        <div>بصمة</div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <?php if(count($transaction->installment) > 0): ?>
            <div style="page-break-after: always;width: calc(100% - 100px);margin:auto;" id="commodity-sale-statement">
                <h1 style="text-align: center">بيان بيع سلعة</h1>
                <br>
                <br>

                <p>نوع السلعة / <?php echo e($products, false); ?></p>
                <br>

                <p>سعر السلعة / <?php echo e(arToIn($transaction->final_total, 'DECIMAL'), false); ?></p>
                <br>
                <p>المبلغ المدفوع / <?php echo e(arToIn($payment_lines_total, 'DECIMAL'), false); ?></p>
                <br>
                <p>المبلغ المتبقي /

                    <?php echo e(arToIn($transaction->installmentBenefit->installment_amount + $transaction->installmentBenefit->benefits - $payment_lines_total, 'DECIMAL'), false); ?>

                </p>
                <br>
                <p>عدد أشهر التقسيط / <?php echo e(arToIn(count($transaction->installment), 'DECIMAL'), false); ?></p>
                <br><br>

                <h3>إقرار</h3>

                <br><br>

                <div class="row">
                    <div class="col-xs-6" style="font-size:20px;word-break: keep-all;">أقر أنا /
                        <?php echo e($transaction->contact->first_name, false); ?>

                        <?php echo e($transaction->contact->middle_name, false); ?> <?php echo e($transaction->contact->last_name, false); ?></div>
                    <div class="col-xs-6" style="font-size:20px;word-break: keep-all;">المقيم /
                        <?php echo e($transaction->contact->address_line_1, false); ?></div>
                </div>
                <br><br>
                <p>واحمل رقم قومي / <?php echo e(arToIn($transaction->contact->custom_field1, 'TYPE_DEFAULT'), false); ?></p>

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

            <?php $__currentLoopData = $transaction->gurantors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gurantor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div style="page-break-after: always;width: calc(100% - 100px);margin:auto;"
                    id="commodity-sale-statement">
                    <h1 style="text-align: center">بيان بيع سلعة</h1>
                    <br>
                    <br>

                    <p>نوع السلعة / <?php echo e($products, false); ?></p>
                    <br>

                    <p>سعر السلعة / <?php echo e(arToIn($transaction->final_total, 'DECIMAL'), false); ?></p>
                    <br>
                    <p>المبلغ المدفوع / <?php echo e(arToIn($payment_lines_total, 'DECIMAL'), false); ?></p>
                    <br>
                    <p>المبلغ المتبقي /
                        <?php echo e(arToIn($transaction->installmentBenefit->installment_amount + $transaction->installmentBenefit->benefits - $payment_lines_total, 'DECIMAL'), false); ?>

                    </p>
                    <br>
                    <p>عدد أشهر التقسيط / <?php echo e(arToIn(count($transaction->installment), 'DECIMAL'), false); ?></p>
                    <br><br>

                    <h3>إقرار</h3>

                    <br><br>

                    <div class="row">
                        <div class="col-xs-6" style="font-size:20px;word-break: keep-all;">أقر أنا /
                            <?php echo e($gurantor->name, false); ?></div>
                        <div class="col-xs-6" style="font-size:20px;word-break: keep-all;">المقيم /
                            <?php echo e($gurantor->address, false); ?></div>
                    </div>
                    <br><br>
                    <p>واحمل رقم قومي / <?php echo e(arToIn($gurantor->national_id, 'TYPE_DEFAULT'), false); ?></p>

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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    <?php endif; ?>

        <div class="ticket">
        	
        	
        	<?php if(!empty($receipt_details->logo)): ?>
        		<div class="text-box centered">
        			<img style="max-height: 100px; width: auto;" src="<?php echo e($receipt_details->logo, false); ?>" alt="Logo">
        		</div>
        	<?php endif; ?>
        	<div class="text-box">
        	<!-- Logo -->
            <p class="centered">
            	<!-- Header text -->
            	<?php if(!empty($receipt_details->header_text)): ?>
            		<span class="headings"><?php echo $receipt_details->header_text; ?></span>
					<br/>
				<?php endif; ?>

				<!-- business information here -->
				<?php if(!empty($receipt_details->display_name)): ?>
					<span class="headings">
						<?php echo e($receipt_details->display_name, false); ?>

					</span>
					<br/>
				<?php endif; ?>
				
				<?php if(!empty($receipt_details->address)): ?>
					<?php echo $receipt_details->address; ?>

					<br/>
				<?php endif; ?>

				<?php if(!empty($receipt_details->contact)): ?>
					<?php echo $receipt_details->contact; ?>

				<?php endif; ?>
				<?php if(!empty($receipt_details->contact) && !empty($receipt_details->website)): ?>
					, 
				<?php endif; ?>
				<?php if(!empty($receipt_details->website)): ?>
					<?php echo e($receipt_details->website, false); ?>

				<?php endif; ?>
				<?php if(!empty($receipt_details->location_custom_fields)): ?>
					<br><?php echo e($receipt_details->location_custom_fields, false); ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->sub_heading_line1)): ?>
					<?php echo e($receipt_details->sub_heading_line1, false); ?><br/>
				<?php endif; ?>
				<?php if(!empty($receipt_details->sub_heading_line2)): ?>
					<?php echo e($receipt_details->sub_heading_line2, false); ?><br/>
				<?php endif; ?>
				<?php if(!empty($receipt_details->sub_heading_line3)): ?>
					<?php echo e($receipt_details->sub_heading_line3, false); ?><br/>
				<?php endif; ?>
				<?php if(!empty($receipt_details->sub_heading_line4)): ?>
					<?php echo e($receipt_details->sub_heading_line4, false); ?><br/>
				<?php endif; ?>		
				<?php if(!empty($receipt_details->sub_heading_line5)): ?>
					<?php echo e($receipt_details->sub_heading_line5, false); ?><br/>
				<?php endif; ?>

				<?php if(!empty($receipt_details->tax_info1)): ?>
					<br><b><?php echo e($receipt_details->tax_label1, false); ?></b> <?php echo e($receipt_details->tax_info1, false); ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->tax_info2)): ?>
					<b><?php echo e($receipt_details->tax_label2, false); ?></b> <?php echo e($receipt_details->tax_info2, false); ?>

				<?php endif; ?>

				<!-- Title of receipt -->
				<?php if(!empty($receipt_details->invoice_heading)): ?>
					<br/><span class="sub-headings"><?php echo $receipt_details->invoice_heading; ?></span>
				<?php endif; ?>
			</p>
			</div>
			<div class="border-top textbox-info">
				<p class="f-left"><strong><?php echo $receipt_details->invoice_no_prefix; ?></strong></p>
				<p class="f-right">
					<?php echo e($receipt_details->invoice_no, false); ?>

				</p>
			</div>
			<div class="textbox-info">
				<p class="f-left"><strong><?php echo $receipt_details->date_label; ?></strong></p>
				<p class="f-right">
					<?php echo e($receipt_details->invoice_date, false); ?>

				</p>
			</div>
			
			<?php if(!empty($receipt_details->due_date_label)): ?>
				<div class="textbox-info">
					<p class="f-left"><strong><?php echo e($receipt_details->due_date_label, false); ?></strong></p>
					<p class="f-right"><?php echo e($receipt_details->due_date ?? '', false); ?></p>
				</div>
			<?php endif; ?>

			<?php if(!empty($receipt_details->sales_person_label)): ?>
				<div class="textbox-info">
					<p class="f-left"><strong><?php echo e($receipt_details->sales_person_label, false); ?></strong></p>
				
					<p class="f-right"><?php echo e($receipt_details->sales_person, false); ?></p>
				</div>
			<?php endif; ?>
			<?php if(!empty($receipt_details->commission_agent_label)): ?>
				<div class="textbox-info">
					<p class="f-left"><strong><?php echo e($receipt_details->commission_agent_label, false); ?></strong></p>
				
					<p class="f-right"><?php echo e($receipt_details->commission_agent, false); ?></p>
				</div>
			<?php endif; ?>

			<?php if(!empty($receipt_details->brand_label) || !empty($receipt_details->repair_brand)): ?>
				<div class="textbox-info">
					<p class="f-left"><strong><?php echo e($receipt_details->brand_label, false); ?></strong></p>
				
					<p class="f-right"><?php echo e($receipt_details->repair_brand, false); ?></p>
				</div>
			<?php endif; ?>

			<?php if(!empty($receipt_details->device_label) || !empty($receipt_details->repair_device)): ?>
				<div class="textbox-info">
					<p class="f-left"><strong><?php echo e($receipt_details->device_label, false); ?></strong></p>
				
					<p class="f-right"><?php echo e($receipt_details->repair_device, false); ?></p>
				</div>
			<?php endif; ?>
			
			<?php if(!empty($receipt_details->model_no_label) || !empty($receipt_details->repair_model_no)): ?>
				<div class="textbox-info">
					<p class="f-left"><strong><?php echo e($receipt_details->model_no_label, false); ?></strong></p>
				
					<p class="f-right"><?php echo e($receipt_details->repair_model_no, false); ?></p>
				</div>
			<?php endif; ?>
			
			<?php if(!empty($receipt_details->serial_no_label) || !empty($receipt_details->repair_serial_no)): ?>
				<div class="textbox-info">
					<p class="f-left"><strong><?php echo e($receipt_details->serial_no_label, false); ?></strong></p>
				
					<p class="f-right"><?php echo e($receipt_details->repair_serial_no, false); ?></p>
				</div>
			<?php endif; ?>

			<?php if(!empty($receipt_details->repair_status_label) || !empty($receipt_details->repair_status)): ?>
				<div class="textbox-info">
					<p class="f-left"><strong>
						<?php echo $receipt_details->repair_status_label; ?>

					</strong></p>
					<p class="f-right">
						<?php echo e($receipt_details->repair_status, false); ?>

					</p>
				</div>
        	<?php endif; ?>

        	<?php if(!empty($receipt_details->repair_warranty_label) || !empty($receipt_details->repair_warranty)): ?>
	        	<div class="textbox-info">
	        		<p class="f-left"><strong>
	        			<?php echo $receipt_details->repair_warranty_label; ?>

	        		</strong></p>
	        		<p class="f-right">
	        			<?php echo e($receipt_details->repair_warranty, false); ?>

	        		</p>
	        	</div>
        	<?php endif; ?>

        	<!-- Waiter info -->
			<?php if(!empty($receipt_details->service_staff_label) || !empty($receipt_details->service_staff)): ?>
	        	<div class="textbox-info">
	        		<p class="f-left"><strong>
	        			<?php echo $receipt_details->service_staff_label; ?>

	        		</strong></p>
	        		<p class="f-right">
	        			<?php echo e($receipt_details->service_staff, false); ?>

					</p>
	        	</div>
	        <?php endif; ?>

	        <?php if(!empty($receipt_details->table_label) || !empty($receipt_details->table)): ?>
	        	<div class="textbox-info">
	        		<p class="f-left"><strong>
	        			<?php if(!empty($receipt_details->table_label)): ?>
							<b><?php echo $receipt_details->table_label; ?></b>
						<?php endif; ?>
	        		</strong></p>
	        		<p class="f-right">
	        			<?php echo e($receipt_details->table, false); ?>

	        		</p>
	        	</div>
	        <?php endif; ?>

	        <!-- customer info -->
	        <div class="textbox-info">
	        	<p style="vertical-align: top;"><strong>
	        		<?php echo e($receipt_details->customer_label ?? '', false); ?>

	        	</strong></p>

	        	<p>
	        		<?php if(!empty($receipt_details->customer_info)): ?>
	        			<div class="bw">
						<?php echo $receipt_details->customer_info; ?>

						</div>
					<?php endif; ?>
	        	</p>
	        </div>
			
			<?php if(!empty($receipt_details->client_id_label)): ?>
				<div class="textbox-info">
					<p class="f-left"><strong>
						<?php echo e($receipt_details->client_id_label, false); ?>

					</strong></p>
					<p class="f-right">
						<?php echo e($receipt_details->client_id, false); ?>

					</p>
				</div>
			<?php endif; ?>
			
			<?php if(!empty($receipt_details->customer_tax_label)): ?>
				<div class="textbox-info">
					<p class="f-left"><strong>
						<?php echo e($receipt_details->customer_tax_label, false); ?>

					</strong></p>
					<p class="f-right">
						<?php echo e($receipt_details->customer_tax_number, false); ?>

					</p>
				</div>
			<?php endif; ?>

			<?php if(!empty($receipt_details->customer_custom_fields)): ?>
				<div class="textbox-info">
					<p class="centered">
						<?php echo $receipt_details->customer_custom_fields; ?>

					</p>
				</div>
			<?php endif; ?>
			
			<?php if(!empty($receipt_details->customer_rp_label)): ?>
				<div class="textbox-info">
					<p class="f-left"><strong>
						<?php echo e($receipt_details->customer_rp_label, false); ?>

					</strong></p>
					<p class="f-right">
						<?php echo e($receipt_details->customer_total_rp, false); ?>

					</p>
				</div>
			<?php endif; ?>
			<?php if(!empty($receipt_details->shipping_custom_field_1_label)): ?>
				<div class="textbox-info">
					<p class="f-left"><strong>
						<?php echo $receipt_details->shipping_custom_field_1_label; ?> 
					</strong></p>
					<p class="f-right">
						<?php echo $receipt_details->shipping_custom_field_1_value ?? ''; ?>

					</p>
				</div>
			<?php endif; ?>
			<?php if(!empty($receipt_details->shipping_custom_field_2_label)): ?>
				<div class="textbox-info">
					<p class="f-left"><strong>
						<?php echo $receipt_details->shipping_custom_field_2_label; ?> 
					</strong></p>
					<p class="f-right">
						<?php echo $receipt_details->shipping_custom_field_2_value ?? ''; ?>

					</p>
				</div>
			<?php endif; ?>
			<?php if(!empty($receipt_details->shipping_custom_field_3_label)): ?>
				<div class="textbox-info">
					<p class="f-left"><strong>
						<?php echo $receipt_details->shipping_custom_field_3_label; ?> 
					</strong></p>
					<p class="f-right">
						<?php echo $receipt_details->shipping_custom_field_3_value ?? ''; ?>

					</p>
				</div>
			<?php endif; ?>
			<?php if(!empty($receipt_details->shipping_custom_field_4_label)): ?>
				<div class="textbox-info">
					<p class="f-left"><strong>
						<?php echo $receipt_details->shipping_custom_field_4_label; ?> 
					</strong></p>
					<p class="f-right">
						<?php echo $receipt_details->shipping_custom_field_4_value ?? ''; ?>

					</p>
				</div>
			<?php endif; ?>
			<?php if(!empty($receipt_details->shipping_custom_field_5_label)): ?>
				<div class="textbox-info">
					<p class="f-left"><strong>
						<?php echo $receipt_details->shipping_custom_field_5_label; ?> 
					</strong></p>
					<p class="f-right">
						<?php echo $receipt_details->shipping_custom_field_5_value ?? ''; ?>

					</p>
				</div>
			<?php endif; ?>
			<?php if(!empty($receipt_details->sale_orders_invoice_no)): ?>
				<div class="textbox-info">
					<p class="f-left"><strong>
						<?php echo app('translator')->get('restaurant.order_no'); ?>
					</strong></p>
					<p class="f-right">
						<?php echo $receipt_details->sale_orders_invoice_no ?? ''; ?>

					</p>
				</div>
			<?php endif; ?>

			<?php if(!empty($receipt_details->sale_orders_invoice_date)): ?>
				<div class="textbox-info">
					<p class="f-left"><strong>
						<?php echo app('translator')->get('lang_v1.order_dates'); ?>
					</strong></p>
					<p class="f-right">
						<?php echo $receipt_details->sale_orders_invoice_date ?? ''; ?>

					</p>
				</div>
			<?php endif; ?>
            <table style="margin-top: 25px !important" class="border-bottom width-100 table-f-12 mb-10">
                <thead class="border-bottom-dotted">
                    <tr>
                        <th class="serial_number">#</th>
                        <th class="description" width="30%">
                        	<?php echo e($receipt_details->table_product_label, false); ?>

                        </th>
                        <th class="quantity text-right">
                        	<?php echo e($receipt_details->table_qty_label, false); ?>

                        </th>
                        <?php if(empty($receipt_details->hide_price)): ?>
                        <th class="unit_price text-right">
                        	<?php echo e($receipt_details->table_unit_price_label, false); ?>

                        </th>
                        <?php if(!empty($receipt_details->item_discount_label)): ?>
							<th class="text-right" width="15%"><?php echo e($receipt_details->item_discount_label, false); ?></th>
						<?php endif; ?>
                        <th class="price text-right"><?php echo e($receipt_details->table_subtotal_label, false); ?></th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                	<?php $__empty_3 = true; $__currentLoopData = $receipt_details->lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_3 = false; ?>
	                    <tr>
	                        <td class="serial_number" style="vertical-align: top;">
	                        	<?php echo e($loop->iteration, false); ?>

	                        </td>
	                        <td class="description">
	                        	<?php echo e($line['name'], false); ?> <?php echo e($line['product_variation'], false); ?> <?php echo e($line['variation'], false); ?> 
	                        	<?php if(!empty($line['sub_sku'])): ?>, <?php echo e($line['sub_sku'], false); ?> <?php endif; ?> <?php if(!empty($line['brand'])): ?>, <?php echo e($line['brand'], false); ?> <?php endif; ?> <?php if(!empty($line['cat_code'])): ?>, <?php echo e($line['cat_code'], false); ?><?php endif; ?>
	                        	<?php if(!empty($line['product_custom_fields'])): ?>, <?php echo e($line['product_custom_fields'], false); ?> <?php endif; ?>
	                        	<?php if(!empty($line['sell_line_note'])): ?>
	                        	<br>
	                        	<span class="f-8">
	                        	<?php echo e($line['sell_line_note'], false); ?>

	                        	</span>
	                        	<?php endif; ?> 
	                        	<?php if(!empty($line['lot_number'])): ?><br> <?php echo e($line['lot_number_label'], false); ?>:  <?php echo e($line['lot_number'], false); ?> <?php endif; ?> 
	                        	<?php if(!empty($line['product_expiry'])): ?>, <?php echo e($line['product_expiry_label'], false); ?>:  <?php echo e($line['product_expiry'], false); ?> <?php endif; ?>
	                        	<?php if(!empty($line['warranty_name'])): ?>
	                            	<br>
	                            	<small>
	                            		<?php echo e($line['warranty_name'], false); ?>

	                            	</small>
	                            <?php endif; ?>
	                            <?php if(!empty($line['warranty_exp_date'])): ?>
	                            	<small>
	                            		- <?php echo e(\Carbon::createFromTimestamp(strtotime($line['warranty_exp_date']))->format(session('business.date_format')), false); ?>

	                            </small>
	                            <?php endif; ?>
	                            <?php if(!empty($line['warranty_description'])): ?>
	                            	<small> <?php echo e($line['warranty_description'] ?? '', false); ?></small>
	                            <?php endif; ?>
	                        </td>
	                        <td class="quantity text-right"><?php echo e($line['quantity'], false); ?> <?php echo e($line['units'], false); ?></td>
	                        <?php if(empty($receipt_details->hide_price)): ?>
	                        <td class="unit_price text-right"><?php echo e($line['unit_price_before_discount'], false); ?></td>
	                        <?php if(!empty($receipt_details->item_discount_label)): ?>
								<td class="text-right">
									<?php echo e($line['line_discount'] ?? '0.00', false); ?>

								</td>
							<?php endif; ?>
	                        <td class="price text-right"><?php echo e($line['line_total'], false); ?></td>
	                        <?php endif; ?>
	                    </tr>
	                    <?php if(!empty($line['modifiers'])): ?>
							<?php $__currentLoopData = $line['modifiers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modifier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td>
										&nbsp;
									</td>
									<td>
			                            <?php echo e($modifier['name'], false); ?> <?php echo e($modifier['variation'], false); ?> 
			                            <?php if(!empty($modifier['sub_sku'])): ?>, <?php echo e($modifier['sub_sku'], false); ?> <?php endif; ?> <?php if(!empty($modifier['cat_code'])): ?>, <?php echo e($modifier['cat_code'], false); ?><?php endif; ?>
			                            <?php if(!empty($modifier['sell_line_note'])): ?>(<?php echo e($modifier['sell_line_note'], false); ?>) <?php endif; ?> 
			                        </td>
									<td class="text-right"><?php echo e($modifier['quantity'], false); ?> <?php echo e($modifier['units'], false); ?> </td>
									<?php if(empty($receipt_details->hide_price)): ?>
									<td class="text-right"><?php echo e($modifier['unit_price_inc_tax'], false); ?></td>
									<?php if(!empty($receipt_details->item_discount_label)): ?>
										<td class="text-right">0.00</td>
									<?php endif; ?>
									<td class="text-right"><?php echo e($modifier['line_total'], false); ?></td>
									<?php endif; ?>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    	<td <?php if(!empty($receipt_details->item_discount_label)): ?> colspan="6" <?php else: ?> colspan="5" <?php endif; ?>>&nbsp;</td>
                    </tr>
                </tbody>
            </table>
			<?php if(!empty($receipt_details->total_quantity_label)): ?>
				<div class="flex-box">
					<p class="left text-right">
						<?php echo $receipt_details->total_quantity_label; ?>

					</p>
					<p class="width-50 text-right">
						<?php echo e($receipt_details->total_quantity, false); ?>

					</p>
				</div>
			<?php endif; ?>
			<?php if(empty($receipt_details->hide_price)): ?>
                <div class="flex-box">
                    <p class="left text-right sub-headings">
                    	<?php echo $receipt_details->subtotal_label; ?>

                    </p>
                    <p class="width-50 text-right sub-headings">
                    	<?php echo e($receipt_details->subtotal, false); ?>

                    </p>
                </div>

                <!-- Shipping Charges -->
				<?php if(!empty($receipt_details->shipping_charges)): ?>
					<div class="flex-box">
						<p class="left text-right">
							<?php echo $receipt_details->shipping_charges_label; ?>

						</p>
						<p class="width-50 text-right">
							<?php echo e($receipt_details->shipping_charges, false); ?>

						</p>
					</div>
				<?php endif; ?>

				<?php if(!empty($receipt_details->packing_charge)): ?>
					<div class="flex-box">
						<p class="left text-right">
							<?php echo $receipt_details->packing_charge_label; ?>

						</p>
						<p class="width-50 text-right">
							<?php echo e($receipt_details->packing_charge, false); ?>

						</p>
					</div>
				<?php endif; ?>

				<!-- Discount -->
				<?php if( !empty($receipt_details->discount) ): ?>
					<div class="flex-box">
						<p class="width-50 text-right">
							<?php echo $receipt_details->discount_label; ?>

						</p>

						<p class="width-50 text-right">
							(-) <?php echo e($receipt_details->discount, false); ?>

						</p>
					</div>
				<?php endif; ?>

				<?php if( !empty($receipt_details->total_line_discount) ): ?>
					<div class="flex-box">
						<p class="width-50 text-right">
							<?php echo $receipt_details->line_discount_label; ?>

						</p>

						<p class="width-50 text-right">
							(-) <?php echo e($receipt_details->total_line_discount, false); ?>

						</p>
					</div>
				<?php endif; ?>

				<?php if(!empty($receipt_details->reward_point_label) ): ?>
					<div class="flex-box">
						<p class="width-50 text-right">
							<?php echo $receipt_details->reward_point_label; ?>

						</p>

						<p class="width-50 text-right">
							(-) <?php echo e($receipt_details->reward_point_amount, false); ?>

						</p>
					</div>
				<?php endif; ?>

				<?php if( !empty($receipt_details->tax) ): ?>
					<div class="flex-box">
						<p class="width-50 text-right">
							<?php echo $receipt_details->tax_label; ?>

						</p>
						<p class="width-50 text-right">
							(+) <?php echo e($receipt_details->tax, false); ?>

						</p>
					</div>
				<?php endif; ?>

				<?php if( $receipt_details->round_off_amount > 0): ?>
					<div class="flex-box">
						<p class="width-50 text-right">
							<?php echo $receipt_details->round_off_label; ?> 
						</p>
						<p class="width-50 text-right">
							<?php echo e($receipt_details->round_off, false); ?>

						</p>
					</div>
				<?php endif; ?>

				<div class="flex-box">
					<p class="width-50 text-right sub-headings">
						<?php echo $receipt_details->total_label; ?>

					</p>
					<p class="width-50 text-right sub-headings">
						<?php echo e($receipt_details->total, false); ?>

					</p>
				</div>
				<?php if(!empty($receipt_details->total_in_words)): ?>
				<p colspan="2" class="text-right mb-0">
					<small>
					(<?php echo e($receipt_details->total_in_words, false); ?>)
					</small>
				</p>
				<?php endif; ?>
				<?php if(!empty($receipt_details->payments)): ?>
					<?php $__currentLoopData = $receipt_details->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="flex-box">
							<p class="width-50 text-right"><?php echo e($payment['method'], false); ?> (<?php echo e($payment['date'], false); ?>) </p>
							<p class="width-50 text-right"><?php echo e($payment['amount'], false); ?></p>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>

				<!-- Total Paid-->
				<?php if(!empty($receipt_details->total_paid)): ?>
					<div class="flex-box">
						<p class="width-50 text-right">
							<?php echo $receipt_details->total_paid_label; ?>

						</p>
						<p class="width-50 text-right">
							<?php echo e($receipt_details->total_paid, false); ?>

						</p>
					</div>
				<?php endif; ?>

				<!-- Total Due-->
				<?php if(!empty($receipt_details->total_due)): ?>
					<div class="flex-box">
						<p class="width-50 text-right">
							<?php echo $receipt_details->total_due_label; ?>

						</p>
						<p class="width-50 text-right">
							<?php echo e($receipt_details->total_due, false); ?>

						</p>
					</div>
				<?php endif; ?>

				<?php if(!empty($receipt_details->all_due)): ?>
					<div class="flex-box">
						<p class="width-50 text-right">
							<?php echo $receipt_details->all_bal_label; ?>

						</p>
						<p class="width-50 text-right">
							<?php echo e($receipt_details->all_due, false); ?>

						</p>
					</div>
				<?php endif; ?>
			<?php endif; ?>
            <div class="border-bottom width-100">&nbsp;</div>
            <?php if(empty($receipt_details->hide_price)): ?>
	            <!-- tax -->
	            <?php if(!empty($receipt_details->taxes)): ?>
	            	<table class="border-bottom width-100 table-f-12">
	            		<?php $__currentLoopData = $receipt_details->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	            			<tr>
	            				<td class="left"><?php echo e($key, false); ?></td>
	            				<td class="right"><?php echo e($val, false); ?></td>
	            			</tr>
	            		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	            	</table>
	            <?php endif; ?>
            <?php endif; ?>


            <?php if(!empty($receipt_details->additional_notes)): ?>
	            <p class="centered" >
	            	<?php echo nl2br($receipt_details->additional_notes); ?>

	            </p>
            <?php endif; ?>

            
			<?php if($receipt_details->show_barcode): ?>
				<br/>
				<img class="center-block" src="data:image/png;base64,<?php echo e(DNS1D::getBarcodePNG($receipt_details->invoice_no, 'C128', 2,30,array(39, 48, 54), true), false); ?>">
			<?php endif; ?>

			<?php if($receipt_details->show_qr_code && !empty($receipt_details->qr_code_details)): ?>
				<?php
					$qr_code_text = implode(', ', $receipt_details->qr_code_details);
				?>
				<img class="center-block mt-5" src="data:image/png;base64,<?php echo e(DNS2D::getBarcodePNG($qr_code_text, 'QRCODE'), false); ?>">
			<?php endif; ?>
			
			<?php if(!empty($receipt_details->footer_text)): ?>
				<p class="centered">
					<?php echo $receipt_details->footer_text; ?>

				</p>
			<?php endif; ?>
			
        </div>
        <!-- <button id="btnPrint" class="hidden-print">Print</button>
        <script src="script.js"></script> -->
    </body>
</html>

<style type="text/css">
.f-8 {
	font-size: 8px !important;
}
@media  print {
	* {
    	font-size: 12px;
    	font-family: 'Times New Roman';
    	word-break: break-all;
	}
	.f-8 {
		font-size: 8px !important;
	}
	
.headings{
	font-size: 16px;
	font-weight: 700;
	text-transform: uppercase;
	white-space: nowrap;
}

.sub-headings{
	font-size: 15px !important;
	font-weight: 700 !important;
}

.border-top{
    border-top: 1px solid #242424;
}
.border-bottom{
	border-bottom: 1px solid #242424;
}

.border-bottom-dotted{
	border-bottom: 1px dotted darkgray;
}

td.serial_number, th.serial_number{
	width: 5%;
    max-width: 5%;
}

td.description,
th.description {
    width: 35%;
    max-width: 35%;
}

td.quantity,
th.quantity {
    width: 15%;
    max-width: 15%;
    word-break: break-all;
}
td.unit_price, th.unit_price{
	width: 25%;
    max-width: 25%;
    word-break: break-all;
}

td.price,
th.price {
    width: 20%;
    max-width: 20%;
    word-break: break-all;
}

.centered {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 100%;
    max-width: 100%;
}

img {
    max-width: inherit;
    width: auto;
}

    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}
.table-info {
	width: 100%;
}
.table-info tr:first-child td, .table-info tr:first-child th {
	padding-top: 8px;
}
.table-info th {
	text-align: left;
}
.table-info td {
	text-align: right;
}
.logo {
	float: left;
	width:35%;
	padding: 10px;
}

.text-with-image {
	float: left;
	width:65%;
}
.text-box {
	width: 100%;
	height: auto;
}

.textbox-info {
	clear: both;
}
.textbox-info p {
	margin-bottom: 0px
}
.flex-box {
	display: flex;
	width: 100%;
}
.flex-box p {
	width: 50%;
	margin-bottom: 0px;
	white-space: nowrap;
}

.table-f-12 th, .table-f-12 td {
	font-size: 12px;
	word-break: break-word;
}

.bw {
	word-break: break-word;
}
</style><?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/sale_pos/receipts/slim.blade.php ENDPATH**/ ?>