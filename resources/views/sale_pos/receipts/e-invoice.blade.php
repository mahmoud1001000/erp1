<!-- business information here A4-->
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Receipt-{{$receipt_details->invoice_no}}</title>
</head>
@include('sale_pos.receipts.invoice_style_a4')
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

{{--partial and due and insatallment  --}}
@include('sale_pos.receipts.installment')

<div class="ticket" style="margin:5px!important;padding: 5px">
    {{--Logo --}}
    @if(!empty($receipt_details->logo))
        <div class="text-box centered">
            <img style="max-height: 100px; width: auto;" src="{{$receipt_details->logo}}" alt="Logo">
        </div>
    @endif


    <div class="text-box">
        <p class="centered">
            <!-- Header text -->
            @if(!empty($receipt_details->header_text))
                <span class="headings">{!! $receipt_details->header_text !!}</span>
            @endif
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
                                        {!! $receipt_details->invoice_no_prefix !!}
                                           <br>
                                       {{$receipt_details->invoice_no}}</strong></span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 ">
                        <div class="text-box invoice_no_prefex div-content-2">
                            <p class="centered">
                                <span class="headings"><strong>
                                    {!! $receipt_details->date_label !!}
                                    <br>
                                    {{$receipt_details->invoice_date}} </strong></span>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 " style="padding-left: 40px;padding-top: 5px;padding-bottom: 5px">
                <div style="border:2px solid rgba(126,186,238,0.93);float: left;padding: 5px;border-radius: 10px 0px">
                      @include('sale_pos.partials.qr_code')
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
                       <h5> {{$receipt_details->business_name}}</h5>
                       </p>
                   </div>
                   <div class="col-xs-3 sell-div">
                       <p class="centered">
                       <h5>عنوان البائع</h5>
                       <h5>{{$receipt_details->sub_heading_line1}}</h5>
                       </p>
                   </div>
                   <div class="col-xs-3 sell-div">
                       <p class="centered">
                       @if(!empty($receipt_details->tax_label1))
                         <h5><b>{{ $receipt_details->tax_label1 }}</b></h5>
                         <h5> {{ $receipt_details->tax_info1 }} </h5>
                         @else
                           <h5><b>رقم السجل الضريبي</b></h5>
                           <h5> الرقم غير مسجل </h5>
                       @endif
                       </p>
                   </div>
                   <div class="col-xs-3 sell-div">
                       <p class="centered">
                       <h5><b>رقم السجل التجاري</b></h5>
                       <h5> {{$receipt_details->commercial_register}} </h5>
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
                    @if(!empty($receipt_details->customer_name))
                    {{$receipt_details->customer_name}}</h5>
                @endif
                </p>
            </div>
            <div class="col-xs-3 sell-div">
                <p class="centered">
                <h5>عنوان المشتري</h5>
                @if(!empty($receipt_details->address_line_1))
                    <h5>{!! $receipt_details->address_line_1 !!}</h5>
                    <h5>{!! $receipt_details->address_line_2 !!}</h5>
                @endif

                </p>
            </div>
            <div class="col-xs-3 sell-div">
                <p class="centered">
                <h5><b>رقم السجل التجاري</b></h5>
                <h5> {{ $receipt_details->customer_tax_number }} </h5>
                </p>
            </div>

                <div class="col-xs-3 sell-div">
                    <p class="centered">
                    @if(!empty($receipt_details->tax_label1))
                      <h5><b>{{ $receipt_details->tax_label1 }}</b></h5>
                      <h5> {{ $receipt_details->tax_info1 }} </h5>
                    @else
                        <h5><b>رقم السجل الضريبي</b></h5>
                        <h5> الرقم غير مسجل </h5>
                        @endif
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
        @forelse($receipt_details->lines as $line)
            <tr>
               <td class="">
                    {{$line['name']}} {{$line['product_variation']}} {{$line['variation']}}
              </td>
                <td class=" text-right">
                    {{$line['unit_price']}}
                </td>
                <td class=" text-right">
                    {{$line['quantity']}}
                </td>
                <td class=" text-right">
                    {{$line['unit_price']* $line['quantity']}}
                    <?php
                    $total=$total+$line['unit_price']* $line['quantity'];
                    $tax=$tax+$line['tax'];
                    ?>
                </td>
                <td class=" text-right">
                    {{$line['tax_percent']}} %
                </td>
                <td class=" text-right">
                    {{$line['tax']}}
                </td>
               <td class=" text-right">{{$line['line_total']}}</td>

            </tr>
@endforeach

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

    @if(!empty($receipt_details->footer_text))
        <p class="centered">
            {!! $receipt_details->footer_text !!}
        </p>
    @endif

</div>

</body>
</html>
