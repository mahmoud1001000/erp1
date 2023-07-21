<section class="no-print">
    <nav class="navbar navbar-default bg-white m-4">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                     <li @if(request()->segment(2) == 'partners') class="active" @endif>
                            <a href="{{action('\Modules\Partners\Http\Controllers\PartnersController@index')}}">
                                <i class="fa fa-user"></i>
                               الشركاء
                            </a>
                        </li>

                        <li @if(request()->segment(2) == 'payments') class="active" @endif>
                            <a href="{{action('\Modules\Partners\Http\Controllers\PaymentsController@index')}}">
                                <i class="fa fa-map-marker"></i>
                                سجل مدفوعات الشركاء
                            </a>
                        </li>

                            <li @if(request()->segment(2) == 'finalaccount') class="active" @endif>
                                <a href="{{action('\Modules\Partners\Http\Controllers\FinalAccountController@index')}}">
                                    <i class="fa fa-plus-circle"></i>
                                    الحساب الختامي
                                </a>
                            </li>

                            <li @if(request()->segment(2) == 'business') class="active" @endif>
                                <a href="{{action('\Modules\Partners\Http\Controllers\BusinessController@index')}}">
                                    <i class="fa fa-calendar-minus"></i>
                                    التقدير المالي
                                </a>
                            </li>


                   </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</section>