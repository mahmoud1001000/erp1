
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th></th>
        <th>المنتج</th>
        <th>سعر البيع</th>
        <th>مجموعة الأسعار</th>
        <th>مجموعة الأسعار</th>

    </tr>
    </thead>
    <tbody class="ingredient-row-sortable">
    @foreach($products as $product)
     <tr>
         <td>
             <img src="{{$product->image_url}}" alt="Product image" style="width: 50px;height: 50px">
         </td>

         <td> {{$product->product}}
             @if($product->variationname !=='DUMMY')
                 -{{$product->variationname}} </td>
              @endif
         <td> {{number_format($product->max_price,2)}} </td>
         <td> {{$product->groupname}} </td>
         <td>@if($product->groupprice>0)
                 {{number_format($product->groupprice,2)}}
                 @endif
         </td>


     </tr>
    @endforeach
    </tbody>
</table>




