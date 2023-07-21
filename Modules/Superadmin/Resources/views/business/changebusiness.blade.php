@extends('layouts.app')
@section('title', __('superadmin::lang.superadmin') . ' | Business')

@section('content')
<div class="box-body">


    <div style="width: 300px ;margin: auto;margin-top: 40px" >
        <div class="form-group">
            {!! Form::label('business','النشاط') !!}
            {!! Form::select('business', $business, null, ['class' => 'form-control select2', 'placeholder' => __( 'messages.please_select' ) ]); !!}
        </div>
        <button class="btn btn-danger" onclick="change()" >حفظ</button>
    </div>


</div>

@endsection

@section('javascript')

    <script type="text/javascript">
            function change() {
                var business_id=$('#business').val();
                if(business_id>0) {
                    swal({
                        title: LANG.sure,
                        text: "سوف يتم نقل إلي هذا النشاط التجاري",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((confirmed) => {
                        if (confirmed) {
                            $.ajax({
                                method: 'get',
                                url: '/superadmin/changebusiness',
                                data: {
                                    business_id: business_id

                                },
                                success: function (result) {
                                    if(result['success']){

                                    }else{
                                        alert('error');
                                    }

                                }
                            });
                        }
                    });
                }

        }
    </script>

@endsection