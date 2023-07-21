@extends('layouts.app')
@section('title', __('purchase.purchases'))

@section('content')
    <style>

        .myGridClass {
            border: solid 1px #525252;
            background: #f5f5f5;
            border-collapse: separate;
            box-shadow: inset 0 1px 0 #fff;
            font-size: 12px;
            line-height: 24px;
            margin:10px auto;


        }

        .myGridClass td  {
            padding:10px;
            border: solid 1px #c1c1c1;
            color:black ;
            text-align:right;

        }

        /*header elements*/
        .myGridClass th {
            padding: 4px ;
            color: white;
            background: #424242;
            border-left: solid 1px #525252;
            font-size: 1.2em;
            text-align:center;
        }

        .myGridClass tr:nth-child(even) {
            background-color:white;
        }
        .myGridClass tr:nth-child(odd) {
            background-color:#e7e8ec;
        }

    </style>

<?php
echo $output
?>
@stop
@section('javascript')


@endsection