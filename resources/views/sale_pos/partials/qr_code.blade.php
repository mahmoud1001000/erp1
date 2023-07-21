@if($receipt_details->show_qr_code && !empty($receipt_details->qr_code_details))
    @php
        $qr_code_text = implode(', ', $receipt_details->qr_code_details);
    @endphp
    {{--<img class="center-block mt-5" src="data:image/png;base64,{{DNS2D::getBarcodePNG($qr_code_text, 'QRCODE')}}">--}}
   {{-- <img class="center-block mt-5" style="image-rendering: pixelated;" src="data:image/png;base64,{{DNS2D::getBarcodePNG($receipt_details->qr_code_gen, 'QRCODE',3,3)}}">--}}

    <img class="center-block mt-5" src="data:image/png;base64,{{DNS2D::getBarcodePNG($receipt_details->qr_code_gen, 'QRCODE', 3, 3, [39, 48, 54])}}">

@endif