

<script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.3/JsBarcode.all.min.js" integrity="sha512-TLB7v1Y4YHGy/EHUu5VZ2bl6sC/WvXh/NFdjEZ7JmbpsUG87dirXAOFSAS3O6Tn3rsZljFTcTdMz9PDM4mV26g==" crossorigin="anonymous"></script>
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title no-print">
        
      </h4>
      <h4 class="modal-title visible-print-block">
        
      </h4>
    </div>
    <div class="modal-body">
        
        <div class="row">
            <div class="col-md-12">
                @php
                 $business_id = request()->session()->get('user.business_id');
                $business=\DB::table('business')->where('id',$business_id)->first();
                @endphp
               
                
                
              <img style="    width: 142px;"
              src="{{url('/images/card.png')}}">
              
               <img src="{{url('/')}}/uploads/business_logos/{{$business->logo}}" class="img-rounded" alt="Logo" width="150" style="position: absolute;
    right: 48px;
    top: -2px;
    width: 75px;
}">
               
              <label style="position: absolute;
                right: 23px;
                bottom: 130px;
                width: 124px;" >{{$data->first_name}} {{$data->last_name}}</label>
                
                 <label style="position: absolute;
    right: 23px;
    bottom: 84px;
    width: 124px;
    font-size: 10px;" >الباقة  : {{$data->product_name}}</label>
                
               <img  style="max-width:30% !important;height: 50px;max-width: 30% !important;
                height: 44px;
                position: absolute;
                right: 23px;
                bottom: 8px;
                width: 124px;" 
                src="data:image/png;base64,{{DNS1D::getBarcodePNG($sub_no, 'C128', 3,30,array(39, 48, 54), true)}}">
               <label id ="barcode"></label>
            </div>
        </div>
      
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary no-print" 
        aria-label="Print" 
          onclick="$(this).closest('div.modal').printThis();">
        <i class="fa fa-print"></i> @lang( 'messages.print' )
      </button>
      <button type="button" class="btn btn-default no-print" data-dismiss="modal">@lang( 'messages.close' )
      </button>
    </div>
  </div>
</div>
	<script type="text/javascript">
	$("#barcode").JsBarcode("Hi!");
	JsBarcode("#barcode", "Hi!");
var qrcode = new QRCode(document.getElementById("Qrcode"), {
    width:100,
	height : 100
});

function makeCode () {		
	var elText = document.getElementById("Qrcode");
	

	
	qrcode.makeCode({{$sub_no}});
}

makeCode();

$("#sku").
	on("blur", function () {
		makeCode();
	}).
	on("keydown", function (e) {
		if (e.keyCode == 13) {
			makeCode();
		}
	});
</script>