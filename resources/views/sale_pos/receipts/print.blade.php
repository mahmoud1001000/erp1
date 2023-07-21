@extends('sale_pos.partials.print_layouts')
@section('title', __( 'sale.list_pos'))
@section('content')

    <div class="container">
     <?php
        echo  $output['receipt']['html_content'];
     ?>
    </div>

@endsection