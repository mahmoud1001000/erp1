<style>
    .text-right{
        text-align: left!important;
    }
</style>
  @if(!empty($receipt_details->total_quantity_label))
    <div class="flex-box">
        <p >
            {!! $receipt_details->total_quantity_label !!}
        </p>
        <p class="text-right">
            {{$receipt_details->total_quantity}}
        </p>
    </div>
@endif

    @if(!empty($receipt_details->subtotal_label))
    <div class="flex-box">
        <p >
            {!! $receipt_details->subtotal_label !!} :
        </p>
        <p class="width-50 text-right sub-headings">
            {{$receipt_details->subtotal}}
        </p>
    </div>

    @endif

    <!-- Shipping Charges -->
    @if(!empty($receipt_details->shipping_charges))
        <div class="flex-box">
            <p >
                {!! $receipt_details->shipping_charges_label !!}
            </p>
            <p class="width-50 text-right sub-headings">
                {{$receipt_details->shipping_charges}}
            </p>
        </div>
    @endif

    @if(!empty($receipt_details->packing_charge))
        <div class="flex-box">
            <p >
                {!! $receipt_details->packing_charge_label !!}
            </p>
            <p class="width-50 text-right sub-headings">
                {{$receipt_details->packing_charge}}
            </p>
        </div>
    @endif

    <!-- Discount for invoice  -->
    @if( !empty($receipt_details->discount) )
        <div class="flex-box">
            <p >
                {!! $receipt_details->discount_label !!}
            </p>

            <p class="width-50 text-right sub-headings">
                (-) {{$receipt_details->discount}}
            </p>
        </div>
    @endif


    {{--Discount  on product --}}
    @if( !empty($receipt_details->total_line_discount) && $receipt_details->total_line_discount>0 )
        <div class="flex-box">
            <p >
                {!! $receipt_details->line_discount_label !!}
            </p>

            <p class="width-50 text-right sub-headings">
                (-) {{$receipt_details->total_line_discount}}
            </p>
        </div>
    @endif

    @if(!empty($receipt_details->reward_point_label) )
        <div class="flex-box">
            <p >
                {!! $receipt_details->reward_point_label !!}
            </p>

            <p class="width-50 text-right sub-headings">
                (-) {{$receipt_details->reward_point_amount}}
            </p>
        </div>
    @endif
    @if( $receipt_details->round_off_amount > 0)
        <div class="flex-box">
            <p>
                {!! $receipt_details->round_off_label !!}
            </p>
            <p class="width-50 text-right sub-headings">
                {{$receipt_details->round_off}}
            </p>
        </div>
    @endif


    {{--Total --}}

        <div class="flex-box">
            <p >  {!! $receipt_details->total_label !!}   </p>
            <p class="text-right sub-headings">
                {{$receipt_details->total}}
            </p>
        </div>




    @if(!empty($receipt_details->total_in_words))
        <p colspan="2" class="text-right mb-0">
            <small>
                ({{$receipt_details->total_in_words}})
            </small>
        </p>
    @endif
    @if(!empty($receipt_details->payments))
        @foreach($receipt_details->payments as $payment)
            <div class="flex-box">
                <p class="width-50 text-right">{{$payment['method']}} ({{$payment['date']}}) </p>
                <p class="width-50 text-right">{{$payment['amount']}}</p>
            </div>
        @endforeach
    @endif

    {{--Tax used in invoice  get tax data from Transaction --}}
    @if( !empty($receipt_details->tax) )
        <div class="flex-box">
            <p >
                {!! $receipt_details->tax_label !!}
            </p>
            <p class="width-50 text-right sub-headings">
                (+) {{$receipt_details->tax}}
            </p>
        </div>
    @endif

    <!-- Total Paid-->
    @if(!empty($receipt_details->total_paid_label))
        <div class="flex-box">
            <p>
                {!! $receipt_details->total_paid_label !!}
            </p>
            <p class="width-50 text-right sub-headings">
                {{$receipt_details->total_paid}}
            </p>
        </div>
    @endif

    <!-- Total Due-->
    @if(!empty($receipt_details->total_due))
        <div class="flex-box">
            <p >
                {!! $receipt_details->total_due_label !!}
            </p>
            <p class="width-50 text-right sub-headings">
                {{$receipt_details->total_due}}
            </p>
        </div>
    @endif

    @if(!empty($receipt_details->all_due))
        <div class="flex-box">
            <p width-50 text-right sub-headings>
                {!! $receipt_details->all_bal_label !!}
            </p>
            <p class="width-50 text-right sub-headings">
                {{$receipt_details->all_due}}
            </p>
        </div>
    @endif




    <!-- tax on products-->
    {{--@if(!empty($receipt_details->taxes))
        <table class="border-bottom width-100 table-f-12">
            @foreach($receipt_details->taxes as $key => $val)
                <tr>
                    <td class="left">{{$key}}</td>
                    <td class="right">{{$val}}</td>
                </tr>
            @endforeach
        </table>
    @endif--}}



@if(!empty($receipt_details->additional_notes))
    <p class="centered" >
        {!! nl2br($receipt_details->additional_notes) !!}
    </p>
@endif
