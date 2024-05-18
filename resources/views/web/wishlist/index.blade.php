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
                    <div class="wishlist-product">
                        <div class="wishlist-product-info-wrapper">
                            <div class="wishlist-product-img">
                                <img
                                    src="{{asset($item->product->image)}}" style="max-width: 300px">
                            </div>
                            <div class="wishlist-product-info">
                                <a class="name-label" href="#">{{$item->product->name}}</a>
                                <p tabindex="0" class="color-label">Color: {{$item->color->name??'Select a color'}}
                                </p>
                                <p class="size-label">Size:
                                    <button class="wishlist-size-btn primary-links product-edit-btn" title="">
                                        {{$item->size->name??'Select a size'}}
                                    </button>
                                </p>
                                <div class="quantity-wrapper">
                                <span>
                                    <button class="quantity-minus" data-field="quantity">
                                        <img src="{{ asset('assets/image/cartqty-minus-new.png') }}"
                                             alt="Remove Quantity">
                                    </button>
                                </span>
                                    <input class="input-text quantity-number" type="text" name="Quantity" maxlength="3"
                                           min="1" value="{{$item->quantity == 0?1:$item->quantity}}">
                                    <span>
                                    <button class="quantity-plus" data-field="quantity">
                                        <img src="{{ asset('assets/image/cartqty-plus-new.png') }}" alt="Add Quantity">
                                    </button>
                                </span>
                                </div>
                                <p class="cost-label">Cost:
                                    <span class="price-sales">@if($item->color){{number_format($item->color->promotional_price != 0 || $item->color->promotional_price != null?$item->color->promotional_price:$item->color->price)}} đ @else Select a color/size  @endif</span>
                                </p>
                                <p class="date-added-label">Date added: {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</p>
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
                                    <button name="dwfrm_wishlist_items_i0_updateItem" class="button-text update-item"
                                            type="submit">Update
                                    </button>
                                </div>
                            </form>
                            <div class="wishlist-product-controls">
                                <button class="cta-primary product-edit-btn" data-bs-toggle="modal"
                                        data-bs-target="#staticEditWishlist">
                                    Select a size / color
                                </button>
                                <div class="wishlist-actions justify-content-center">
                                    <button class="wishlist-action-btn primary-links product-edit-btn"
                                            data-bs-toggle="modal"
                                            data-bs-target="#staticEditWishlist">
                                        Edit
                                    </button>
                                    <span class="wishlist-action-spacer px-2">|</span>
                                    <button class="wishlist-action-btn primary-links product-remove-btn"
                                            data-bs-toggle="modal" data-bs-target="#staticDeleteWishlist">Remove
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
    <div class="modal fade" id="staticEditWishlist" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
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
                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/image/detail-sp1.png') }}" class="w-100"/>
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/image/detail-sp1.png') }}" class="w-100"/>
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/image/detail-sp1.png') }}" class="w-100"/>
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/image/detail-sp1.png') }}" class="w-100"/>
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/image/detail-sp1.png') }}" class="w-100"/>
                                </div>
                            </div>
                        </div>
                        <div class="swiper swiperImageBig">
                            <div class="swiper-wrapper" id="lightgallery">
                                <div class="swiper-slide position-relative">
                                    <p class="title-sale-product">NEW</p>
                                    <img src="{{ asset('assets/image/detail-sp1.png') }}" class="w-100"/>
                                </div>
                                <div class="swiper-slide position-relative">
                                    <p class="title-sale-product">NEW</p>
                                    <img src="{{ asset('assets/image/detail-sp1.png') }}" class="w-100"/>
                                </div>
                                <div class="swiper-slide position-relative">
                                    <p class="title-sale-product">NEW</p>
                                    <img src="{{ asset('assets/image/detail-sp1.png') }}" class="w-100"/>
                                </div>
                                <div class="swiper-slide position-relative">
                                    <p class="title-sale-product">NEW</p>
                                    <img src="{{ asset('assets/image/detail-sp1.png') }}" class="w-100"/>
                                </div>
                                <div class="swiper-slide position-relative">
                                    <p class="title-sale-product">NEW</p>
                                    <img src="{{ asset('assets/image/detail-sp1.png') }}" class="w-100"/>
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                    <div class="box-info-sp-update">
                        <div class="d-flex align-items-center mt-4">
                            <p style="font-size: 15px;font-weight: bold;margin-bottom: 0;color: #303030;">Select a Type:
                            </p>
                            <p style="margin-bottom: 0;margin-left: 5px;font-size: 15px;">Medium</p>
                        </div>
                        <div class="d-flex justify-content-between w-100">
                            <div class="item-select-type item-select-type-active">Medium</div>
                            <div class="item-select-type">Wide</div>
                        </div>
                        <div class="d-flex mt-4">
                            <p style="color: #303030;font-weight: bold;margin-bottom: 0;font-size: 14px;">Select a Color
                                :
                            </p>
                            <p style="margin-bottom: 0;margin-left: 5px;font-size: 14px;">Tetra Moss</p>
                        </div>
                        <p class="price-item-color">$105.00 - $110.00</p>
                        <div class="box-color-product mt-1">
                            <div class="item-color-product item-color-active" onclick="toggleColorActive(this)"></div>
                            <div class="item-color-product" onclick="toggleColorActive(this)"></div>
                            <div class="item-color-product" onclick="toggleColorActive(this)"></div>
                            <div class="item-color-product" onclick="toggleColorActive(this)"></div>
                            <div class="item-color-product" onclick="toggleColorActive(this)"></div>
                            <div class="item-color-product" onclick="toggleColorActive(this)"></div>
                        </div>
                        <div class="d-flex mt-2">
                            <p style="color: #303030;font-weight: bold;margin-bottom: 0;font-size: 14px;">Select a Width
                                &
                                Size
                                :</p>
                            <p style="margin-bottom: 0;margin-left: 5px;font-size: 14px;">15 M</p>
                        </div>
                        <div class="box-w-S">M</div>
                        <div class="box-size-product mt-3">
                            <div class="item-size-product item-size-active" onclick="toggleSizeActive(this)">7</div>
                            <div class="item-size-product" onclick="toggleSizeActive(this)">8</div>
                            <div class="item-size-product" onclick="toggleSizeActive(this)">9</div>
                            <div class="item-size-product" onclick="toggleSizeActive(this)">10</div>
                            <div class="item-size-product" onclick="toggleSizeActive(this)">11</div>
                            <div class="item-size-product" onclick="toggleSizeActive(this)">12</div>
                        </div>
                        <div class="d-flex justify-content-between w-100 mt-5 mb-5">
                            <button class="btn-add-to-card">ADD TO CART</button>
                        </div>
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
                                            ON $120+
                                        </p>
                                        <p style="font-size: 14px;margin-bottom: 0;">Order today to receive by <span
                                                style="color: #f65024;">Sat, 4/6</span></p>
                                        <a href="#" style="color: #004c59;font-size: 14px;font-weight: bold;">See
                                            more
                                            details.</a>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item accordion-item-infor" style="border-bottom: 1px solid #dcdcdc;">
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
                                        <p style="font-size: 14px;margin-bottom: 0;">We are happy to offer free returns
                                            and
                                            exchanges.</p>
                                        <a href="#" style="color: #004c59;font-size: 14px;font-weight: bold;">See
                                            more
                                            details.</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-customize">
                            <img src="{{ asset('assets/image/color.png') }}" style="width: 20px;"><span
                                style="font-size: 15px;color: #303030;font-weight: 600; margin-left: 6px;">CUSTOMIZE</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal delete wishlist-->
    <div class="modal fade" id="staticDeleteWishlist" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-header-remove">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="title-remove-sp">Loại bỏ sản phẩm?</p>
                    <p class="content-remove-sp">Bạn có muốn xóa sản phẩm khỏi danh sách yêu thích của mình không?</p>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn-cancel" data-bs-dismiss="modal">Hủy</button>
                        <a href="{{url('delete-sp-yeu-thich')}}" class="btn-delete">Xóa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script_page')
    <script src="{{ asset('assets/js/detail-product.js') }}"></script>
    <script>
        function toggleColorActive(item) {
            document.querySelectorAll('.item-color-product').forEach(function (el) {
                el.classList.remove('item-color-active');
            });
            item.classList.toggle('item-color-active');

        }

        function toggleSizeActive(item) {
            document.querySelectorAll('.item-size-product').forEach(function (el) {
                el.classList.remove('item-size-active');
            });
            item.classList.toggle('item-size-active');

        }
    </script>
@stop
