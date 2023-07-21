@extends('layouts.app')

@section('content')

    <div style="max-width: 300px ;margin: auto;text-align: left">
        <h1>Hello Every one </h1>

        <p>
            This view is loaded from module: {!! config('restaurant.name') !!}
            this is a module Template by Eng Mohamed Ali 2021
        </p>
    </div>

@endsection
