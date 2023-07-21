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
                <a class="navbar-brand" href="{{action('SellController@installments_transactions')}}"><i class="fas fa-money-bill-alt"></i>  جميع الاقساط</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                        
                         <li @if(request()->segment(2) == 'installments_transactions_fine') class="active" @endif>
                            <a href="{{action('SellController@installments_transactions_fine')}}">
                            غرامات الاقساط 
                            </a>
                        </li>
                        <li @if(request()->segment(2) == 'installments_transactions_late') class="active" @endif>
                            <a href="{{action('SellController@installments_transactions_late')}}">
                               الاقساط المتأخرة
                            </a>
                        </li>
                        <li @if(request()->segment(2) == 'installments_transactions_customer') class="active" @endif>
                            <a href="{{action('SellController@installments_transactions_customer')}}">
                            اقساط العملاء
                            </a>
                        </li>
                        <li @if(request()->segment(2) == 'installments_settings') class="active" @endif>
                            <a href="{{action('SellController@installments_settings')}}">
                                فوائد القسط
                            </a>
                        </li>
                        <li @if(request()->segment(2) == 'installments_settings_fine') class="active" @endif>
                            <a href="{{action('SellController@installments_settings_fine')}}">
                                غرامات التأخير  
                            </a>
                        </li>
                  
                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</section>