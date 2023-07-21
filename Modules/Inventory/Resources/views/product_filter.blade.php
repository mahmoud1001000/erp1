

<div class="row">
    <div class="col-md-12">
    @component('components.filters', ['title' => __('report.filters')])
       
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('category_id', __('product.category') . ':') !!}
                {!! Form::select('category_id', $categories, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_category_id', 'placeholder' => __('lang_v1.all')]); !!}
            </div>
        </div>

      
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('brand_id', __('product.brand') . ':') !!}
                {!! Form::select('brand_id', $brands, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_brand_id', 'placeholder' => __('lang_v1.all')]); !!}
            </div>
        </div>
        
       
        
         <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('image',__('report.current_stock'). ':') !!}
                {!! Form::select('current_stock', ['zero' =>'Zero', 'gtzero' => 'اكبر من الصفر','lszero' => 'اقل من الصفر'], null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_current_stock', 'placeholder' => __('lang_v1.all')]); !!}
            </div>
        </div>


       
       
    @endcomponent
    </div>
</div>