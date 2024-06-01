@extends('web.index')
@section('title', 'Địa chỉ')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/account.css') }}">
@stop
{{-- content of page --}}
@section('content')
    <div class="box-my-account">
        <div class="line-header-menu-page">
            <a href="{{ route('home') }}" class="title-header-menu-page">Trang chủ</a>
            <span style="margin: 0 5px;">/</span>
            <a href="{{ route('my-account') }}" class="title-header-menu-page">Tài khoản của tôi</a>
            <span style="margin: 0 5px;">/</span>
            <a href="{{ route('address-account') }}" class="title-header-menu-page">Địa chỉ</a>
        </div>
        <div class="box-content-my-account">
            <div class="box-left-account">
                <a href="{{ route('my-account') }}" class="link-page-account">Tài khoản của tôi</a>
                <a href="{{ route('edit-account') }}" class="link-page-account">Chỉnh sửa tài khoản</a>
                <p class="title-menu-child-account">Địa chỉ ></p>
                <a href="{{ route('order-history') }}" class="link-page-account">Lịch sử đơn hàng</a>
                <a href="{{ route('logout') }}" class="link-page-account">Đăng xuất</a>
            </div>
            <div class="box-right-account">
                <div class="line-title-my-account">
                    <p class="title-account">Địa chỉ ({{ $addresses->count() }})</p>
                    <span class="create-address" data-bs-toggle="modal" data-bs-target="#staticCreateAddress">TẠO ĐỊA CHỈ
                        MỚI</span>
                </div>
                <div class="box-info-address-account">
                    <div class="box-info-address-book">
                        <div class="box-item-address-book">
                            @forelse ($addresses as $key => $add)
                                <div id="address-{{ $add->id }}">
                                    @if ($key == 0)
                                        <p class="title-item-address-book">Địa chỉ giao hàng mặc định</p>
                                        {{-- <p class="title-item-address-book">Địa chỉ thanh toán mặc định</p> --}}
                                    @endif
                                    <hr>
                                    <p class="content-item-address-book name">{{ $add->name }}</p>
                                    <p class="content-item-address-book full_name">
                                        {{ $add->first_name . ' ' . $add->last_name }}</p>
                                    <p class="content-item-address-book address">{{ $add->address }}</p>
                                    <p class="content-item-address-book city">{{ $add->city }}</p>
                                    <p class="content-item-address-book phone">Số điện thoại:
                                        <strong>{{ $add->phone }}</strong>
                                    </p>
                                    <div class="line-footer-info-address">
                                        <p type="button" data-bs-toggle="modal"
                                            data-bs-target="#staticEditAddress{{ $add->id }}"
                                            class="title-footer-info-address">Sửa</p>
                                        <span class="title-footer-info-address"> | </span>
                                        <a type="button" onclick="deleteAddress({{ $add->id }})"
                                            class="title-footer-info-address">Xóa</a>
                                    </div>
                                </div>
                            @empty
                                <p class="title-item-address-book">Bạn chưa thêm địa chỉ nào</p>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal create address-->
    <form action="{{ route('address-account-store') }}" method="POST">
        @csrf
        <div class="modal fade" id="staticCreateAddress" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header model-header-address">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body modal-body-address">
                        <p class="title-account">THÊM ĐỊA CHỈ</p>
                        <P class="line-child-create-address">Chi tiết địa chỉ <span class="title-more-header-address">*
                                Trường
                                bắt buộc</span></P>
                        <label class="title-lable-info" for="name">Tên địa chỉ</label>
                        <input type="text" class="input-value-reg" id="name" name="name"
                            value="{{ old('name') }}">
                        <label class="title-lable-info" for="first_name">* Tên</label>
                        <input required type="text" class="input-value-reg" id="first_name" name="first_name"
                            value="{{ old('first_name') }}">
                        <label class="title-lable-info" for="last_name">* Họ</label>
                        <input required type="text" class="input-value-reg" id="last_name" name="last_name"
                            value="{{ old('last_name') }}">
                        <label class="title-lable-info" for="address">* Địa chỉ</label>
                        <input required type="text" class="input-value-reg" id="address" name="address"
                            value="{{ old('address') }}">
                        <label class="title-lable-info" for="address_2">Địa chỉ 2</label>
                        <input type="text" class="input-value-reg" id="address_2" name="address_2"
                            value="{{ old('address_2') }}">
                        <label class="title-lable-info" for="city">* Thành phố</label>
                        <input required type="text" class="input-value-reg" id="city" name="city"
                            value="{{ old('city') }}">
                        <label class="title-lable-info" for="phone">* Điện thoại</label>
                        <input required type="text" class="input-value-reg" id="phone" name="phone"
                            value="{{ old('phone') }}">
                        <p class="title-note-create-address">Tại sao điều này là cần thiết?</p>
                        <div class="d-flex align-items-center">
                            <input type="checkbox" id="defaultshipping" name="isDefault"
                                {{ old('isDefault') == 'on' ? 'checked' : '' }}>
                            <label for="defaultshipping" class="lable-create-address">Đặt địa chỉ giao hàng mặc
                                định</label>
                        </div>
                        {{-- <div class="d-flex align-items-center">
                            <input type="checkbox" id="defaultshipping">
                            <label for="defaultshipping" class="lable-create-address">Đặt địa chỉ thanh toán mặc
                                định</label>
                        </div> --}}
                        <div class="box-btn-footer-create-address">
                            <button type="submit" class="btn-add-address">Áp dụng</button>
                            <button type="reset" data-bs-dismiss="modal" class="btn-cancel-address">Hủy bỏ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal edit address-->
    @foreach ($addresses as $add)
        <form action="{{ route('address-account-update', ['id' => $add->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal fade {{ session('update_modal_id') == $add->id ? 'show' : '' }}"
                id="staticEditAddress{{ $add->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header model-header-address">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body modal-body-address">
                            <p class="title-account">THÊM ĐỊA CHỈ</p>
                            <P class="line-child-create-address">Chi tiết địa chỉ <span
                                    class="title-more-header-address">*
                                    Trường
                                    bắt buộc</span></P>
                            <label class="title-lable-info" for="name">Tên địa chỉ</label>
                            <input type="text" class="input-value-reg" id="name" name="name"
                                value="{{ old('name', $add->name) }}">
                            <label class="title-lable-info" for="first_name">* Tên</label>
                            <input required type="text" class="input-value-reg" id="first_name" name="first_name"
                                value="{{ old('first_name', $add->first_name) }}">
                            <label class="title-lable-info" for="last_name">* Họ</label>
                            <input required type="text" class="input-value-reg" id="last_name" name="last_name"
                                value="{{ old('last_name', $add->last_name) }}">
                            <label class="title-lable-info" for="address">* Địa chỉ</label>
                            <input required type="text" class="input-value-reg" id="address" name="address"
                                value="{{ old('address', $add->address) }}">
                            <label class="title-lable-info" for="address_2">Địa chỉ 2</label>
                            <input type="text" class="input-value-reg" id="address_2" name="address_2"
                                value="{{ old('address_2', $add->address_2) }}">
                            <label class="title-lable-info" for="city">* Thành phố</label>
                            <input required type="text" class="input-value-reg" id="city" name="city"
                                value="{{ old('city', $add->city) }}">
                            <label class="title-lable-info" for="phone">* Điện thoại</label>
                            <input required type="text" class="input-value-reg" id="phone" name="phone"
                                value="{{ old('phone', $add->phone) }}">
                            <p class="title-note-create-address">Tại sao điều này là cần thiết?</p>
                            <div class="d-flex align-items-center">
                                <input type="checkbox" id="defaultshipping" name="isDefault"
                                    {{ old('isDefault', $add->isDefault) == 'on' || old('isDefault', $add->isDefault) == 1 ? 'checked' : '' }}>
                                <label for="defaultshipping" class="lable-create-address">Đặt địa chỉ giao hàng mặc
                                    định</label>
                            </div>
                            <div class="box-btn-footer-create-address">
                                <button type="submit" class="btn-add-address">Áp dụng</button>
                                <button type="reset" data-bs-dismiss="modal" class="btn-cancel-address">Hủy bỏ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach
@stop

@section('script_page')
    @if (session('open_store_modal'))
        <script>
            $(document).ready(function() {
                openStoreAddressModal();
            });
        </script>
    @endif

    <script>
        $(document).ready(function() {
            var showModalIds = {!! json_encode(session('show_update_modal_ids', [])) !!};
            showModalIds.forEach(function(modalId) {
                var modal = $('#staticEditAddress' + modalId);
                if (modal.length) {
                    modal.modal('show');
                }
            });
        });
    </script>

    <script>
        function openStoreAddressModal() {
            $('#staticCreateAddress').modal('show');
        }
    </script>

    <script>
        function deleteAddress(id) {
            var addressTr = $('#address-' + id);
            if (confirm("Bạn có muốn xóa địa chỉ này không?")) {
                $.ajax({
                    url: '{{ route('address-account-destroy', ':id') }}'.replace(':id', id),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': `{{ csrf_token() }}`
                    },
                    success: function(response) {
                        if (response.error == 0) {
                            toastr.success(response.message);
                            addressTr.remove();
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr.error(xhr.responseJSON.message);
                    }
                });
            }
        }
    </script>
@endsection
