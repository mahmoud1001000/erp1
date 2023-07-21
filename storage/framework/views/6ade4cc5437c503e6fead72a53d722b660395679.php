<!-- business information here A4-->
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Receipt-<?php echo e($receipt_details->invoice_no, false); ?></title>
</head>
<?php echo $__env->make('sale_pos.receipts.invoice_style_a4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .div-content{
          border: 2px solid #2b7f12;
          border-radius: 10px 0px;
          margin-top: 5px;
          margin-right:14px ;
          margin-bottom: 5px;
      }
    .div-content-2{
        border: 2px solid #2b7f12;
        border-radius: 10px 0px;
    }
    .sell-div{
        border-right:1px solid #000000;
    }
    .total{
        width: 80%;
        margin: auto;
    }
</style>
<body>


<?php echo $__env->make('sale_pos.receipts.installment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="ticket" style="margin:5px!important;padding: 5px">
    
    <?php if(!empty($receipt_details->logo)): ?>
        <div class="text-box centered">
            <img style="max-height: 100px; width: auto;" src="<?php echo e($receipt_details->logo, false); ?>" alt="Logo">
        </div>
    <?php endif; ?>


    <div class="text-box">
        <p class="centered">
            <!-- Header text -->
            <?php if(!empty($receipt_details->header_text)): ?>
                <span class="headings"><?php echo $receipt_details->header_text; ?></span>
            <?php endif; ?>
        </p>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6 " >
                <div class="row">
                    <div class="col-12 " >
                    <div class="div-content text-center">
                        <h2>فاتورة ضريبية</h2>
                    </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 ">
                        <div class="text-box invoice_no_prefex div-content-2">
                           <p class="centered">
                                <span class="headings"><strong>
                                        <?php echo $receipt_details->invoice_no_prefix; ?>

                                           <br>
                                       <?php echo e($receipt_details->invoice_no, false); ?></strong></span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 ">
                        <div class="text-box invoice_no_prefex div-content-2">
                            <p class="centered">
                                <span class="headings"><strong>
                                    <?php echo $receipt_details->date_label; ?>

                                    <br>
                                    <?php echo e($receipt_details->invoice_date, false); ?> </strong></span>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 " style="padding-left: 40px;padding-top: 5px;padding-bottom: 5px">
                <div style="border:2px solid rgba(126,186,238,0.93);float: left;padding: 5px;border-radius: 10px 0px">
                      <?php echo $__env->make('sale_pos.partials.qr_code', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>

       <div class="row div-content" style=" margin-right:0px ;margin-left: 10px" >
                   <div style="padding-right: 20px">
                    <h4 >معلومات البائع</h4>
                </div>
                   <div class="col-xs-3 ">
                       <p class="centered">
                       <h5>إسم البائع</h5>
                       <h5> <?php echo e($receipt_details->business_name, false); ?></h5>
                       </p>
                   </div>
                   <div class="col-xs-3 sell-div">
                       <p class="centered">
                       <h5>عنوان البائع</h5>
                       <h5><?php echo e($receipt_details->sub_heading_line1, false); ?></h5>
                       </p>
                   </div>
                   <div class="col-xs-3 sell-div">
                       <p class="centered">
                       <?php if(!empty($receipt_details->tax_label1)): ?>
                         <h5><b><?php echo e($receipt_details->tax_label1, false); ?></b></h5>
                         <h5> <?php echo e($receipt_details->tax_info1, false); ?> </h5>
                         <?php else: ?>
                           <h5><b>رقم السجل الضريبي</b></h5>
                           <h5> الرقم غير مسجل </h5>
                       <?php endif; ?>
                       </p>
                   </div>
                   <div class="col-xs-3 sell-div">
                       <p class="centered">
                       <h5><b>رقم السجل التجاري</b></h5>
                       <h5> <?php echo e($receipt_details->commercial_register, false); ?> </h5>
                       </p>
                   </div>
                </div>

        <div class="row div-content" style=" margin-right:0px ;margin-left: 10px" >
            <div style="padding-right: 20px">
                <h4 >معلومات المشتري</h4>
            </div>
            <div class="col-xs-3 ">
                <p class="centered">
                <h5>إسم المشتري</h5>
                <h5>
                    <?php if(!empty($receipt_details->customer_name)): ?>
                    <?php echo e($receipt_details->customer_name, false); ?></h5>
                <?php endif; ?>
                </p>
            </div>
            <div class="col-xs-3 sell-div">
                <p class="centered">
                <h5>عنوان المشتري</h5>
                <?php if(!empty($receipt_details->address_line_1)): ?>
                    <h5><?php echo $receipt_details->address_line_1; ?></h5>
                    <h5><?php echo $receipt_details->address_line_2; ?></h5>
                <?php endif; ?>

                </p>
            </div>
            <div class="col-xs-3 sell-div">
                <p class="centered">
                <h5><b>رقم السجل التجاري</b></h5>
                <h5> <?php echo e($receipt_details->customer_tax_number, false); ?> </h5>
                </p>
            </div>

                <div class="col-xs-3 sell-div">
                    <p class="centered">
                    <?php if(!empty($receipt_details->tax_label1)): ?>
                      <h5><b><?php echo e($receipt_details->tax_label1, false); ?></b></h5>
                      <h5> <?php echo e($receipt_details->tax_info1, false); ?> </h5>
                    <?php else: ?>
                        <h5><b>رقم السجل الضريبي</b></h5>
                        <h5> الرقم غير مسجل </h5>
                        <?php endif; ?>
                    </p>
               </div>


        </div>


    </div>
<?php
$total=0;
$tax=0;
?>
    <br>
    <table style="margin-top: 10px !important;" class="border-bottom  table-f-12 mb-10" >
        <thead class="border-bottom-dotted">
        <tr>
          <th >المنتج
            </th>
             <th class="text-right">
            سعر الوحدة
             </th>
             <th class="text-right">
                الكمية
            </th>
             <th class="text-right">
                  المجموع الفرعي بدون الضريبة
             </th>
             <th class="text-right" >نسبة الضريبة
                    </th>
             <th class="text-right">قيمة الضريبة
                </th>
             <th class="text-right">
                المجموع شامل الضريبة
            </th>

        </tr>
        </thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $receipt_details->lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
               <td class="">
                    <?php echo e($line['name'], false); ?> <?php echo e($line['product_variation'], false); ?> <?php echo e($line['variation'], false); ?>

              </td>
                <td class=" text-right">
                    <?php echo e($line['unit_price'], false); ?>

                </td>
                <td class=" text-right">
                    <?php echo e($line['quantity'], false); ?>

                </td>
                <td class=" text-right">
                    <?php echo e($line['unit_price']* $line['quantity'], false); ?>

                    <?php
                    $total=$total+$line['unit_price']* $line['quantity'];
                    $tax=$tax+$line['tax'];
                    ?>
                </td>
                <td class=" text-right">
                    <?php echo e($line['tax_percent'], false); ?> %
                </td>
                <td class=" text-right">
                    <?php echo e($line['tax'], false); ?>

                </td>
               <td class=" text-right"><?php echo e($line['line_total'], false); ?></td>

            </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>

<table>
    <tr>
        <td>
            <p class="f-right">
                المجموع :
            </p>
        </td>
        <td>
            <?php
            echo ($total);
            ?>
        </td>
    </tr>

<tr>
        <td>
            <p class="f-right">
                ضريبة القيمة المضافة :
            </p>

        </td>
        <td>
            <p>
                <?php
                echo ($tax);
                ?>
            </p>
        </td>
    </tr>
    <tr>
        <td>
            <p class="f-right">
                المجموع شامل الضريبة :
            </p>
           </td>
        <td>
            <p >
                <?php
                echo ($tax+$total);
                ?>
            </p>
        </td>
    </tr>
</table>


    <div class="total">

    </div>

    <?php if(!empty($receipt_details->footer_text)): ?>
        <p class="centered">
            <?php echo $receipt_details->footer_text; ?>

        </p>
    <?php endif; ?>

</div>

</body>
</html>
<?php /**PATH /home/u217138193/domains/mzgr0up.com/public_html/erp1/resources/views/sale_pos/receipts/e-invoice.blade.php ENDPATH**/ ?>