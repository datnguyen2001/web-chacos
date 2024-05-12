@foreach($product_size as $index => $pro_size)
    <div class="item-size-product @if($index == 0) item-size-active @endif" data-value="{{$pro_size->id}}" data-name="{{$pro_size->name}}" onclick="toggleSizeActive(this)">{{$pro_size->name}}</div>
@endforeach
