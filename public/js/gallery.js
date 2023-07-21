$(document).ready( function(){
    getproducts();

    $(document).on('change', '#product_list_filter_image,#product_list_filter_current_stock,#product_list_filter_current_stock,#product_list_filter_type, #product_list_filter_category_id, #product_list_filter_brand_id, #product_list_filter_unit_id, #product_list_filter_tax_id, #location_id, #active_state, #repair_model_id',
        function() {
            $('#offset').val(0);
            $('#morebtn').html('المزيد');
            $('#rem').val('true');
            var products=document.getElementById("products");
            products.innerHTML='';
            getproducts();

        });


});

$(document).on('keyup','#productname',function (e) {
    if(e.keyCode==32 || $('#productname').val().trim()=='')
        return;
    $('#offset').val(0);
    $('#morebtn').html('المزيد');
    $('#rem').val('true');
    var products=document.getElementById("products");
    products.innerHTML='';
    getproducts();

});

function getproducts() {
    var offset=$('#offset').val()*1;
    var rem=$('#rem').val();
    if(rem==='false') {
        $('#morebtn').html('finshed');
        return;
    }



    $('#offset').val(offset+12);
    $.ajax({
        url: "/gallery/gallery",
        type: 'GET',
        data: {
            type: $('#product_list_filter_type').val(),
            category_id : $('#product_list_filter_category_id').val(),
            brand_id : $('#product_list_filter_brand_id').val(),
            unit_id : $('#product_list_filter_unit_id').val(),
            tax_id : $('#product_list_filter_tax_id').val(),
            active_state : $('#active_state').val(),
            not_for_selling : $('#not_for_selling').is(':checked'),
            location_id : $('#location_id').val(),
            current_stock:$("#product_list_filter_current_stock").val(),
            image_type:$("#product_list_filter_image").val(),
            offset:offset,
            productname:$('#productname').val()
        },
        success: function (data) {
            var products=document.getElementById("products");
            products.innerHTML +=data['product'];
            if(data['count']<12){
                $('#morebtn').html('finshed');
                $('#rem').val('false');
            }

        }
    });

    $('#loader').addClass('hidden');


}