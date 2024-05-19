@extends('web.index')
@section('title', 'Sản phẩm yêu thích')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/css/detail-product.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/account.css') }}">
@stop
{{-- content of page --}}
@section('content')
    <div class="box-wishlist">
        <div class="line-header-menu-page">
            <a href="{{ route('home') }}" class="title-header-menu-page">Trang chủ</a>
            <span style="margin: 0 5px;">/</span>
            <a href="{{ route('my-account') }}" class="title-header-menu-page">Tài khoản của tôi</a>
            <span style="margin: 0 5px;">/</span>
            <a class="title-header-menu-page">Sản phẩm yêu thích</a>
        </div>
        <div class="box-content-my-account">
            <div class="box-left-account box-left-wishlist">
                <p class="title-menu-child-account">Tài khoản của tôi</p>
                <a href="{{ route('edit-account') }}" class="link-page-account">Chỉnh sửa tài khoản</a>
                <a href="{{ route('address-account') }}" class="link-page-account">Địa chỉ</a>
                <a href="{{ route('order-history') }}" class="link-page-account">Lịch sử đơn hàng</a>
                <a href="{{ route('logout') }}" class="link-page-account">Đăng xuất</a>
            </div>
            <div class="box-right-account box-right-wishlist">
                <div class="line-title-my-account d-block">
                    <p class="title-account">DANH SÁCH YÊU THÍCH</p>
                    <p class="title-number-wishlist">{{count($listData)}} sản phẩm</p>
                </div>
                @if(count($listData)>0)
                    <div class="wishlist-header-labels">
                        <span class="wishlist-products-label">Products</span>
                        <span class="wishlist-priority-label">Priority</span>
                    </div>
                    @foreach($listData as $key => $item)
                        <div class="wishlist-product" data-item-id="{{$item->id}}">
                            <div class="wishlist-product-info-wrapper">
                                <div class="wishlist-product-img">
                                    <img
                                        src="{{asset($item->product->image)}}" style="max-width: 300px">
                                </div>
                                <div class="wishlist-product-info">
                                    <a class="name-label"
                                       href="{{route('detail-product',['slug'=>$item->product->slug])}}">{{$item->product->name}}</a>
                                    <p tabindex="0" class="color-label">Color: {{$item->color->name??'Select a color'}}
                                    </p>
                                    <p class="size-label">Size:
                                        <button class="wishlist-size-btn primary-links product-edit-btn" title="">
                                            {{$item->size->name??'Select a size'}}
                                        </button>
                                    </p>
                                    <div class="quantity-wrapper">
                                <span>
                                    <button class="quantity-minus" data-field="quantity"
                                            @if($item->color_id == null) disabled @endif>
                                        <img src="{{ asset('assets/image/cartqty-minus-new.png') }}"
                                             alt="Remove Quantity">
                                    </button>
                                </span>
                                        <input class="input-text quantity-number" type="text" name="Quantity"
                                               maxlength="3"
                                               min="1" value="{{$item->quantity == 0?1:$item->quantity}}">
                                        <span>
                                    <button class="quantity-plus" data-field="quantity"
                                            @if($item->color_id == null) disabled @endif>
                                        <img src="{{ asset('assets/image/cartqty-plus-new.png') }}" alt="Add Quantity">
                                    </button>
                                </span>
                                    </div>
                                    <p class="cost-label">Cost:
                                        <span
                                            class="price-sales">@if($item->color){{number_format($item->color->promotional_price != 0 ?$item->color->promotional_price*$item->quantity:$item->color->price*$item->quantity)}}
                                            đ @else Select a color/size  @endif</span>
                                    </p>
                                    <p class="date-added-label">Date
                                        added: {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</p>
                                </div>
                            </div>
                            <div class="wishlist-product-action-wrapper">
                                <form id="PriorityForm" action="" method="post" name="dwfrm_wishlist"
                                      novalidate="novalidate">
                                    <div class="wishlist-product-priority">
                                        {{--                                <div class="form-row ">--}}
                                        {{--                                    <label for="dwfrm_wishlist_items_i0_priority" class="row-label">--}}
                                        {{--                                        <span class="field-name" id="dwfrm_wishlist_items_i0_priority_label">--}}
                                        {{--                                            Priority--}}
                                        {{--                                        </span>--}}
                                        {{--                                    </label>--}}
                                        {{--                                    <select class="input-select" id="dwfrm_wishlist_items_i0_priority"--}}
                                        {{--                                        name="dwfrm_wishlist_items_i0_priority">--}}
                                        {{--                                        <option class="select-option" label="None" value="">None</option>--}}
                                        {{--                                        <option class="select-option" label="Lowest" value="1">Lowest</option>--}}
                                        {{--                                        <option class="select-option" label="Low" value="2">Low</option>--}}
                                        {{--                                        <option class="select-option" label="Medium" value="3">Medium</option>--}}
                                        {{--                                        <option class="select-option" label="High" value="4" selected="selected">High--}}
                                        {{--                                        </option>--}}
                                        {{--                                        <option class="select-option" label="Highest" value="5">Highest</option>--}}
                                        {{--                                    </select>--}}
                                        {{--                                </div>--}}
                                    </div>
                                    <div class="item-option option-update hide">
                                        <button name="dwfrm_wishlist_items_i0_updateItem"
                                                class="button-text update-item"
                                                type="submit">Update
                                        </button>
                                    </div>
                                </form>
                                <div class="wishlist-product-controls">
                                    @if($item->color_id != null)
                                        <input type="hidden" name="size_id" class="size_id"
                                               value="{{ $item->size_id }}">
                                        <input type="hidden" name="number_quantity"
                                               value="{{ $item->quantity != 0?$item->quantity:1 }}">
                                        <button class="cta-primary product-edit-btn btn-add-to-card">
                                            ADD TO CART
                                        </button>
                                    @else
                                        <button class="cta-primary product-edit-btn" data-bs-toggle="modal"
                                                data-bs-target="#staticEditWishlist{{$key}}">
                                            Select a Color & Size
                                        </button>  @endif
                                    <div class="wishlist-actions justify-content-center">
                                        <button class="wishlist-action-btn primary-links product-edit-btn"
                                                data-bs-toggle="modal"
                                                data-bs-target="#staticEditWishlist{{$key}}">
                                            Edit
                                        </button>
                                        <span class="wishlist-action-spacer px-2">|</span>
                                        <button class="wishlist-action-btn primary-links product-remove-btn"
                                                data-bs-toggle="modal" data-bs-target="#staticDeleteWishlist{{$key}}">
                                            Remove
                                        </button>
                                        {{--                                <span class="wishlist-action-spacer">|</span>--}}
                                        {{--                                <button class="wishlist-action-btn primary-links product-share-btn">Share</button>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <!-- Modal edit select sp-->
    @foreach($listData as $key => $item)
        <div class="modal fade" id="staticEditWishlist{{$key}}" data-bs-backdrop="static" data-bs-keyboard="false"
             tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-content-update">
                <div class="modal-content">
                    <div class="modal-header modal-header-remove">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body body-update-wishlist">
                        <div class="box-img-product box-img-sp-wishlist">
                            <div class="swiper swiperImageSmall">
                                <div class="swiper-wrapper">
                                    @foreach($item->product_image as $img)
                                        <div class="swiper-slide">
                                            <img src="{{ asset($img->image) }}" class="w-100"/>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="swiper swiperImageBig">
                                <div class="swiper-wrapper" id="lightgallery">
                                    @foreach($item->product_image as $img)
                                        <div class="swiper-slide position-relative">
                                            {{--                                    <p class="title-sale-product">NEW</p>--}}
                                            <img src="{{ asset($img->image) }}" class="w-100"/>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                        <div class="box-info-sp-update">
                            @if ($item->product->type != 0)
                                <div class="d-flex align-items-center mt-0">
                                    <p class="title-bold">Type:</p>
                                    <p class="title-light">{{ $item->product->type == 1 ? 'Medium' : 'Wide' }}</p>
                                </div>
                                <div class="d-flex justify-content-between w-100">
                                    @if ($item->product->type == 1)
                                        <div class="item-select-type item-select-type-active">Medium</div>
                                    @else
                                        <div class="item-select-type item-select-type-active">Wide</div>
                                    @endif
                                </div>
                            @endif
                            <div class="d-flex mt-4">
                                <p style="color: #303030;font-weight: bold;margin-bottom: 0;font-size: 14px;">Select a
                                    Color : </p>
                                <p class="text-color" style="margin-bottom: 0;margin-left: 5px;font-size: 14px;">
                                    {{ $item->color?$item->color->name:$item->product_color[0]->name }}</p>
                            </div>
                            <p class="price-item-color">{{number_format($item->product_color[0]->promotional_price != 0 ?$item->product_color[0]->promotional_price:$item->product_color[0]->price)}}
                                đ</p>
                            <div class="box-color-product mt-1">
                                @foreach ($item->product_color as $key => $pro_color)
                                    <div class="item-color-product @if($item->color_id != null) @if($item->color_id == $pro_color->id) item-color-active @endif @elseif($key == 0)item-color-active @endif"
                                         data-value="{{ $pro_color->id }}" data-name="{{ $pro_color->name }}"
                                         onclick="toggleColorActive(this)">
                                        <img src="{{ asset($pro_color->image) }}" class="w-100"
                                             style="height: 97%;object-fit: cover">
                                    </div>
                                @endforeach
                            </div>
                            <div class="d-flex mt-2">
                                <p style="color: #303030;font-weight: bold;margin-bottom: 0;font-size: 14px;">Select a
                                    Width
                                    &
                                    Size
                                    :</p>
                                <p class="text-size"
                                   style="margin-bottom: 0;margin-left: 5px;font-size: 14px;">{{ $item->size?$item->size->name:$item->product_size[0]->name }}
                                    M</p>
                            </div>
                            <div class="box-w-S">M</div>
                            <div class="box-size-product mt-3">
                                @foreach ($item->product_size as $index => $pro_size)
                                    <div class="item-size-product @if($item->size_id != null) @if($item->size_id == $pro_size->id) item-size-active @endif @elseif($index == 0) item-size-active @endif"
                                         data-value="{{ $pro_size->id }}" data-name="{{ $pro_size->name }}"
                                         onclick="toggleSizeActive(this)">{{ $pro_size->name }}</div>
                                @endforeach
                            </div>
                            <form method="post" action="{{route('update.wish.list',['id'=>$item->id])}}">
                                @csrf
                                <div class="d-flex justify-content-between w-100 mt-5 mb-5">
                                    <input type="hidden" id="color_id" name="color_id" class="color_id"
                                           value="{{ $item->product_color[0]->id }}">
                                    <input type="hidden" id="size_id" name="size_id" class="size_id"
                                           value="{{ $item->product_size[0]->id }}">
                                    <input type="hidden" name="number_quantity"
                                           value="{{ $item->quantity != 0?$item->quantity:1 }}">
                                    @if($item->color_id == null)
                                        <button type="submit" class="btn-add-to-select"> Select a Color & Size</button>
                                    @else
                                        <button type="button" class="btn-add-to-card"> ADD TO CART</button> @endif
                                </div>
                            </form>
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item accordion-item-infor">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed btn-infor-more" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                aria-expanded="flase"
                                                aria-controls="collapseOne">
                                            <img
                                                src="https://www.chacos.com/on/demandware.static/Sites-chacos_us-Site/-/default/images/svg/icon-truck.svg"
                                                style="margin-right: 10px;">
                                            Shipping
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse"
                                         data-bs-parent="#accordionExample">
                                        <div class="accordion-body mb-3">
                                            <p style="color: #004c59;margin-bottom: 0;font-size: 15px;">FREE EXPRESS
                                                SHIPPING
                                            </p>
                                            <p style="font-size: 14px;margin-bottom: 0;">Order today to receive by</p>
                                            <a href="{{ route('shipping-info') }}"
                                               style="color: #004c59;font-size: 14px;font-weight: bold;">See
                                                more
                                                details.</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item accordion-item-infor"
                                     style="border-bottom: 1px solid #dcdcdc;">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed btn-infor-more" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false"
                                                aria-controls="collapseTwo">
                                            <img
                                                src="https://www.chacos.com/on/demandware.static/Sites-chacos_us-Site/-/default/images/svg/icon-return.svg"
                                                style="margin-right: 10px;">
                                            Returns
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                         data-bs-parent="#accordionExample">
                                        <div class="accordion-body mb-3">
                                            <p style="font-size: 14px;margin-bottom: 0;">We are happy to offer free
                                                returns
                                                and
                                                exchanges.</p>
                                            <a href="{{ route('easy-free-returns') }}"
                                               style="color: #004c59;font-size: 14px;font-weight: bold;">See
                                                more
                                                details.</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--                        <div class="btn-customize">--}}
                            {{--                            <img src="{{ asset('assets/image/color.png') }}" style="width: 20px;"><span--}}
                            {{--                                style="font-size: 15px;color: #303030;font-weight: 600; margin-left: 6px;">CUSTOMIZE</span>--}}
                            {{--                        </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal delete wishlist-->
    @foreach($listData as $key => $item)
        <div class="modal fade" id="staticDeleteWishlist{{$key}}" data-bs-backdrop="static" data-bs-keyboard="false"
             tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header modal-header-remove">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="title-remove-sp">Loại bỏ sản phẩm?</p>
                        <p class="content-remove-sp">Bạn có muốn xóa sản phẩm khỏi danh sách yêu thích của mình
                            không?</p>
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn-cancel" data-bs-dismiss="modal">Hủy</button>
                            <a href="{{url('xoa-sp-yeu-thich',$item->id)}}" class="btn-delete text-center">Xóa</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@stop

@section('script_page')
    <script src="{{ asset('assets/js/detail-product.js') }}"></script>
    <script>
        function toggleColorActive(item) {
            document.querySelectorAll('.item-color-product').forEach(function (el) {
                el.classList.remove('item-color-active');
            });
            item.classList.toggle('item-color-active');
            $('input[name="color_id"]').val(item.getAttribute('data-value'));
            $('.text-color').html(item.getAttribute('data-name'));
            $.ajax({
                url: window.location.origin + '/select-color',
                data: {
                    'color_id': item.getAttribute('data-value')
                },
                type: 'post',
                dataType: 'json',
                success: function (data) {
                    if (data.status) {
                        $(".box-size-product").html(data.prop);
                        let attr = $('.item-size-active').attr('data-name');
                        let attr_id = $('.item-size-active').attr('data-value');
                        $('input[name="size_id"]').val(attr_id);
                        $('.text-size').html(attr + ' M')
                        $('.price-item-color').html(data.price + ' đ');
                    }
                }
            })
        }

        function toggleSizeActive(item) {
            document.querySelectorAll('.item-size-product').forEach(function (el) {
                el.classList.remove('item-size-active');
            });
            item.classList.toggle('item-size-active');
            $('input[name="size_id"]').val(item.getAttribute('data-value'));
            $('.text-size').html(item.getAttribute('data-name') + ' M')
        }

        $('.quantity-minus').click(function () {
            let input = $(this).closest('.quantity-wrapper').find('.quantity-number');
            let currentQuantity = parseInt(input.val());
            let newQuantity = currentQuantity > 1 ? currentQuantity - 1 : 1;
            input.val(newQuantity);
            let itemId = $(this).closest('.wishlist-product').data('item-id');
            updateQuantityWish(newQuantity, itemId);
        });

        $('.quantity-plus').click(function () {
            let input = $(this).closest('.quantity-wrapper').find('.quantity-number');
            let currentQuantity = parseInt(input.val());
            let newQuantity = currentQuantity + 1;
            input.val(newQuantity);
            let itemId = $(this).closest('.wishlist-product').data('item-id');
            updateQuantityWish(newQuantity, itemId);
        });

        function updateQuantityWish(newQuantity, itemId) {
            $.ajax({
                url: window.location.origin + '/update-quantity-wish',
                type: 'POST',
                data: {
                    id: itemId,
                    quantity: newQuantity
                },
                success: function (response) {
                    if (response.error == 0) {
                        toastr.success(response.message);
                        let productElement = $('.wishlist-product[data-item-id="' + itemId + '"]');
                        productElement.find('.price-sales').text(response.newPrice + ' đ');
                    }
                },
                error: function (xhr) {
                    if (error.responseJSON.error == -1) {
                        toastr.error(error.responseJSON.message)
                    }
                }
            });
        }
    </script>
    <script>
        $(document).ready(function () {
            $('.btn-add-to-card').click(function () {
                var productInfo = $('input[name="size_id"]').val()
                var quantity = $('input[name="number_quantity"]').val()
                if (productInfo == 0) {
                    toastr.error('Something went wrong!! Try again.')
                    return
                }

                // ADD TO CART
                $.ajax({
                    url: '{{ route('add.to.cart') }}',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        product_info: productInfo,
                        quantity: quantity
                    },
                    success: function (response) {
                        if (response.error == 0) {
                            toastr.success(response.message)
                        }
                    },
                    error: function (error) {
                        if (error.responseJSON.error == -1) {
                            toastr.error(error.responseJSON.message)
                        }
                    }
                });
            });
        });
    </script>
@stop
