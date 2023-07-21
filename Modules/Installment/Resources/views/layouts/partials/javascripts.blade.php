
<script >



    //Public function

    $(document).on('keypress','.decimal',function (event) {
        "use strict";
        if($(this).val().includes('.') && event.keyCode===46 )
            return false;
        var key = window.event ? event.keyCode : event.which;
        if (event.keyCode === 8 || event.keyCode === 46) {
            return true;
        } else if ( key < 48 || key > 57 ) {
            return false;
        } else {
            return true;
        }

    });


    $(document).on('keypress','.integr',function (event) {
        "use strict";
        var key = window.event ? event.keyCode : event.which;
        if (event.keyCode === 8 ) {
            return true;
        } else if ( key < 48 || key > 57 ) {
            return false;
        } else {
            return true;
        }

    });


    $('.date-picker').datepicker({
        autoclose: true,
        format:'yyyy-m-d',
    });



    $('.date-picker-from').datepicker({
        autoclose: true,
        endDate: 'today',
        format:'yyyy-m-d',
    });


    $('.date-picker-to').datepicker({
        autoclose: true,
        endDate: 'today',
        format:'yyyy-m-d',
    });






    //End of public function

</script>