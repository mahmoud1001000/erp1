@extends('layouts.app')
@section('title','222 الشركاء')
@section('content')
                   <div class="box-tools">
                        <button type="button" class="btn btn-block btn-primary btn-modal"
                                data-href="{{action('BrandController@create')}}"
                                data-container=".brands_modal">
                            <i class="fa fa-plus"></i> @lang( 'messages.add' )</button>
                    </div>


        <div class="modal fade brands_modal" tabindex="-1" role="dialog"
             aria-labelledby="gridSystemModalLabel">
        </div>

    </section>
    <!-- /.content -->
@endsection