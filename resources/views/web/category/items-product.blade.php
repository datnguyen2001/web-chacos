@if(isset($product) && count($product) > 0)
    <div class="box-sp w-100 mt-0">
        @foreach ($product as $pro)
            <div class="item-sp-filter">
                <div class="line-add-cart">
                    <img src="{{ asset('assets/image/add-to-cart.png') }}" alt="">
                    <span class="title-quick">Thêm nhanh</span>
                </div>
                <div class="position-relative img-big-sp">
                    {{--                        <span class="tag-hot">NEW ARRIVAL</span> --}}
                    <img src="{{ asset($pro->image) }}" class="w-100 img-big-option">
                    <div class="box-wishlist">
                        <div class="item-wishlist">
                            Danh sách yêu thích
                        </div>
                    </div>
                    <img
                        src="@if($pro->wish) {{asset('assets/image/heart-solid.svg')}} @else {{asset('assets/image/heart.svg')}} @endif"
                        class="icon-heart" data-value="{{$pro->id}}" onclick="toggleHeart(this)"
                        onmouseover="toggleWishlist(this)" onmouseout="hideWishlist(this)">
                </div>
                <div>
                    <a class="link-color">{{ count($pro->color) }} màu sắc</a>
                    <div class="box-option-color-style">
                        <div class="swiper swiperOptionColor">
                            <div class="swiper-wrapper">
                                @foreach ($pro->color as $color_pro)
                                    <div class="swiper-slide"><img src="{{ asset($color_pro->image) }}"
                                                                   class="img-option-color">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="swiper-button-next btn-option-color-next"></div>
                        <div class="swiper-button-prev btn-option-color-prev"></div>
                    </div>
                    <a href="{{ route('detail-product', $pro->slug) }}"
                       class="title-sp">{{ $pro->name }}</a>
                    <div class="d-flex align-items-center mb-1">
                        @if($pro->color[0]->promotional_price != 0 || $pro->color[0]->promotional_price != null)
                            <p class="title-price-sp"
                               style="color: red;margin-right: 10px;">{{number_format($pro->color[0]->promotional_price)}}
                                đ</p>
                            <p class="title-price-sp"
                               style="text-decoration: line-through">{{number_format($pro->color[0]->price)}}
                                đ</p>
                        @else
                            <p class="title-price-sp"
                               style="color: red;margin-right: 10px;">{{number_format($pro->color[0]->price)}}
                                đ</p>
                        @endif
                    </div>
                    <div class="d-flex mb-1">
                        <div class="product-rate">
                            <div class="star-rating" style="--rating:{{$pro->star}}"></div>
                        </div>
                        <div class="ts-star">{{$pro->star}} ({{$pro->count_star}})</div>
                    </div>
{{--                    <img src="{{ asset('assets/image/customize.png') }}" class="w-100">--}}
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-4 content-paginate">
        {{ $product->appends(request()->all())->links('web.partials.pagination') }}
    </div>
@else
    <p style="color: red;text-align: center;font-size: 18px;height: 160px">Không tìm thấy kết quả bạn cần tìm</p>
@endif
