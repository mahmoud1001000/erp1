<style>
#myProgress {
  width: 100%;
  background-color: grey;
}

#myBar {
  width: 1%;
  height: 30px;
  background-color: green;
}
</style>

<!-- Modal -->
<div class="modal fade" id="update_all_prices" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:10000000;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">تعديل كل اسعار البيع</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
        <form action="{{action('ProductController@update_all_prices')}}" method="POST">
            <lable style="color:red" id=al-message></lable>
            <div class="form-group">
                <label>النسبة</label>
                <div class="input-group">
                    
                    <input class="form-control input_number valid" name="percenet" id="update_percent_prices" type="text" value="0.00" id="precent" aria-invalid="false">
                    <span class="input-group-addon">
                        <i class="fa fa-percent"></i>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label>النوع</label>
                <select name="type" class="form-control" id="update_prices_type">
                    <option value="plus">زيادة</option>
                     <option value="minus">نقص</option>
                </select>
            </div>
        </form>
        <center>
            <img id="loader-gif" style="display:none" width="50" src="{{URL::to('/images/loader.gif')}}">
        </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
        <button type="button" class="btn btn-primary" id="update_all_prices_form"> تحديث</button>
      </div>
    </div>
  </div>
</div>
<script>
    $('#update_all_prices_form').click(function(e){
         
         e.preventDefault();
       $('#loader-gif').show();
       $(this).prop('disabled', true);
         $.ajax({
             type:"post",
             url:"{{action('ProductController@update_all_prices')}}",
             data:{
                 '_token':"{{csrf_token()}}",
                 percent:$('#update_percent_prices').val(),
                  type:$('#update_prices_type').val(),
             },
            
            success: function(result) {
                if (result.success == true) {
                   
                    toastr.success(result.msg);
                    if(typeof(product_table) != "undefined" && product_table !== null){
                        product_table.ajax.reload();
                    }
                } else {
                    toastr.error(result.msg);
                }
            },
            complete: function (){
                 $('#loader-gif').fadeOut('slow');
                  debugger;
                 $('#update_all_prices_form').removeAttr('disabled');
                 $('#bussiness_edit_form').submit();
            },
             
         });

    });
 
      
        var i = 0;
function move() {
  if (i == 0) {
    i = 1;
    var elem = document.getElementById("myBar");
    var width = 1;
    var id = setInterval(frame, 10);
    function frame() {
      if (width >= 100) {
        clearInterval(id);
        i = 0;
      } else {
        width++;
        elem.style.width = width + "%";
      }
    }
  }
}

</script>