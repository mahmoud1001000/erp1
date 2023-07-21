@extends('layouts.app')
@section('title', 'جرد المخازن')

@section('content')
<style>
    .bg-light-red{
       background: #ff123d !important;
    }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>جرد المخازن  </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
    @component('components.widget', ['class' => 'box-primary', 'title' => 'عمليات الجرد'])
        @can('stocktacking.create')
            @slot('tool')
                <div class="box-tools">
                    <a class="btn btn-block btn-primary" 
                    href="{{action('StocktackingController@create')}}" >
                    <i class="fa fa-plus"></i> @lang( 'messages.add' )</a>
                 </div>
            @endslot
        @endcan
        @can('stocktacking.view')
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="_table">
                    <thead>
                        <tr>
                            <th>رقم العملية</th>
                            <th>التاريخ</th>
                            <th>تاريخ الغلق</th>
                            <th>الحالة</th>
                            <th>اسم الفرع</th>
                            <th>@lang( 'messages.action' )</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions  as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{date('Y-m-d', strtotime($row->transaction_date))}}</td>
                            <td>{{date('Y-m-d', strtotime($row->end_date))}}</td>
                            <td><span class="label bg-light-green @if($row->status=='off') bg-light-red @endif">{{$row->status}}</span></td>
                            <td>{{$row->location_name}}</td>
                            <td>
                                @can('stocktacking.products')
                                    <a href="{{action('StocktackingController@transaction',['id'=>$row->id])}}" class="btn btn-success">جرد</a>
                                @endcan
                                @can('stocktacking.report')
                                    <a href="{{action('StocktackingController@report',['id'=>$row->id])}}" class="btn btn-primary"><i class="fa fa-file"></i>تقرير</a>
                                    <a href="{{action('StocktackingController@report_plus',['id'=>$row->id])}}" class="btn btn-primary"><i class="fa fa-file"></i>تقرير زيادة</a>
                                    <a href="{{action('StocktackingController@report_minus',['id'=>$row->id])}}" class="btn btn-primary"><i class="fa fa-file"></i>تقرير عجز</a>
                                @endcan
                                @can('stocktacking.changeStatus')
                                    @if($row->status=='on')
                                        <a href="{{action('StocktackingController@changeStatus',['id'=>$row->id,'status'=>'off'])}}" class="btn btn-danger"><i class="fa fa-lock"></i>غلق</a>
                                    @else
                                        <a href="{{action('StocktackingController@changeStatus',['id'=>$row->id,'status'=>'on'])}}" class="btn btn-info"><i class="fa fa-unlock"></i>فتح</a>
                                    @endif
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endcan
    @endcomponent

    <div class="modal fade user_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->
@stop
@section('javascript')
<script type="text/javascript">
    //Roles table
    $(document).ready( function(){

        
    });
    
    
</script>
@endsection
