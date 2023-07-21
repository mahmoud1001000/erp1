@extends('layouts.app')
@section('title', __('lang_v1.forbidden_access'))

@section('content')
@include('errors.style')
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="div-content" >
            <h2>@lang('lang_v1.forbidden_access_msg')</h2>

            <img src="{{asset('img/403.png')}}" class="div-img">
        </div>


    </section>


@stop
@section('javascript')

@endsection