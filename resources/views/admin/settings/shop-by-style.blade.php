@extends('admin.layout.index')
@section('title', 'Quản lý Shop By Style')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        .switch {
            --circle-dim: 1.4em;
            font-size: 17px;
            position: relative;
            display: inline-block;
            width: 3.5em;
            height: 2em;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #f5aeae;
            transition: .4s;
            border-radius: 30px;
        }

        .slider-card {
            position: absolute;
            content: "";
            height: var(--circle-dim);
            width: var(--circle-dim);
            border-radius: 20px;
            left: 0.3em;
            bottom: 0.3em;
            transition: .4s;
            pointer-events: none;
        }

        .slider-card-face {
            position: absolute;
            inset: 0;
            backface-visibility: hidden;
            perspective: 1000px;
            border-radius: 50%;
            transition: .4s transform;
        }

        .slider-card-front {
            background-color: #DC3535;
        }

        .slider-card-back {
            background-color: #379237;
            transform: rotateY(180deg);
        }

        input:checked~.slider-card .slider-card-back {
            transform: rotateY(0);
        }

        input:checked~.slider-card .slider-card-front {
            transform: rotateY(-180deg);
        }

        input:checked~.slider-card {
            transform: translateX(1.5em);
        }

        input:checked~.slider {
            background-color: #9ed99c;
        }
    </style>
@endsection

@section('main')
    <main id="main" class="main d-flex flex-column justify-content-center">
        <div class="">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">"Shop by style" Trang chủ</h1>

            <hr>

            <div class="d-flex justify-content-start">
                <a type="button"
                    class="btn btn-outline-primary {{ count(json_decode(json_encode($sbs->list), true)) == 3 ? 'd-none' : '' }}"
                    data-bs-toggle="modal" data-bs-target="#addNewOne"><i
                        class="bi bi-plus-circle-dotted me-2"></i><span>Thêm mới biểu ngữ</span></a>
            </div>

            <table id="sortable-table" class="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">STT</th>
                        <th scope="col" class="text-center">Ảnh</th>
                        <th scope="col" class="text-center">Tiêu đề</th>
                        <th scope="col" class="text-center">Nội dung của nút</th>
                        <th scope="col" class="text-center">Liên kết của nút</th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sbs->list as $key => $list)
                        <tr id="list-{{ $key }}">
                            <td class="text-center">{{ $key }}</td>
                            <td class="text-center">
                                <img src="{{ $list->image }}" width="200">
                            </td>
                            <td class="text-center">{{ $list->title }}</td>
                            <td class="text-center">{{ $list->button_title ?? '' }}</td>
                            <td class="text-center">{{ $list->button_href ?? '#' }}</td>
                            <td class="text-center">
                                <a type="button" data-bs-toggle="modal" data-bs-target="#editList{{ $key }}"
                                    class="btn btn-primary me-3"><i class="bi bi-pencil-square"></i></a>
                                <button onclick="deleteList({{ $key }})" class="btn btn-danger"><i
                                        class="bi bi-trash3-fill"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <form class="mt-5" action="{{ route('admin.settings.shop.by.style.update') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title1" class="form-label">Tiêu đề 1 (Chữ vàng):</label>
                    <input class="form-control" type="text" id="title1" name="title1"
                        value="{{ old('title1', $sbs->title1) }}">
                </div>

                <div class="mb-3">
                    <label for="title2" class="form-label">Tiêu đề 2 (Chữ trắng):</label>
                    <input class="form-control" type="text" id="title2" name="title2"
                        value="{{ old('title2', $sbs->title2) }}">
                </div>

                <div class="mb-3">
                    <label for="isActive" class="form-label me-3">Is active?</label>
                    <label class="switch">
                        <input type="checkbox" id="isActive" name="isActive" value="true"
                            {{ $isActive ? 'checked' : '' }}>
                        <div class="slider"></div>
                        <div class="slider-card">
                            <div class="slider-card-face slider-card-front"></div>
                            <div class="slider-card-face slider-card-back"></div>
                        </div>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>

        </div>

        <!-- Add new modal -->
        <div class="modal fade" id="addNewOne" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form method="POST" action="{{ route('admin.settings.shop.by.style.update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="addNewLabel">Thêm mới biểu ngữ</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="add-image" class="form-label">Ảnh</label>
                                <input name="image" class="form-control" type="file" id="add-image"
                                    accept="image/*, .gif" required>
                                <img class="mt-3" src="" width="200">
                            </div>
                            <div class="mb-3">
                                <label for="add-title" class="form-label">Tiêu đề</label>
                                <input type="text" class="form-control" id="add-title" name="title"
                                    value="{{ old('title') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="add-description" class="form-label">Mô tả</label>
                                <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="add-button-title" class="form-label">Nội dung nút</label>
                                <input type="text" class="form-control" id="add-button-title" name="button_title"
                                    value="{{ old('button_title') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="add-button-href" class="form-label">Liên kết nút</label>
                                <input type="text" class="form-control" id="add-button-href" name="button_href"
                                    value="{{ old('button_href') }}" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @foreach ($sbs->list as $key => $list)
            <!-- Edit list modal -->
            <div class="modal fade" id="editList{{ $key }}" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="editListLabel{{ $key }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form method="POST"
                            action="{{ route('admin.settings.shop.by.style.update.list', ['key' => $key]) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="editListLabel{{ $key }}">Sửa biểu ngữ
                                    {{ $key }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="edit-image{{ $key }}" class="form-label">Ảnh</label>
                                    <input name="image" class="form-control" type="file"
                                        id="edit-image{{ $key }}" accept="image/*, .gif">
                                    <img class="mt-3" src="{{ $list->image }}" width="200">
                                </div>
                                <div class="mb-3">
                                    <label for="edit-title{{ $key }}" class="form-label">Tiêu đề</label>
                                    <input type="text" class="form-control" id="edit-title{{ $key }}"
                                        name="title" value="{{ old('title', $list->title) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="edit-description{{ $key }}" class="form-label">Mô tả</label>
                                    <textarea class="form-control" name="description" id="edit-description{{ $key }}" rows="3">{{ old('description', $list->description) }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="edit-button-title{{ $key }}" class="form-label">Nội dung
                                        nút</label>
                                    <input type="text" class="form-control" id="edit-button-title{{ $key }}"
                                        name="button_title" value="{{ old('button_title', $list->button_title ?? '') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="edit-button-href{{ $key }}" class="form-label">Liên kết
                                        nút</label>
                                    <input type="text" class="form-control" id="edit-button-href{{ $key }}"
                                        name="button_href" value="{{ old('button_href', $list->button_href ?? '#') }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </main>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    @if (session('open_store_modal'))
        <script>
            $(document).ready(function() {
                openStoreSBSModal();
            });
        </script>
    @endif

    <script>
        function openStoreSBSModal() {
            $('#addNewOne').modal('show');
        }
    </script>

    <script>
        $(document).ready(function() {
            $('input[name="image"]').on('change', function(e) {
                var file = e.target.files[0];
                var reader = new FileReader();
                var previewImage = $(this).siblings('img');

                reader.onload = function(e) {
                    previewImage.attr('src', e.target.result);
                };

                reader.readAsDataURL(file);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            var table = $("#sortable-table").DataTable({
                paging: false,
                searching: true,
                ordering: true,
                info: true,
                rowReorder: {
                    selector: 'tr',
                    update: function(evt, ui, $node) {
                        // Perform any logic when a row is reordered
                    }
                }
            });
        });
    </script>

    <script>
        function deleteList(key) {
            var listTr = $('#list-' + key);
            if (confirm("Bạn có chắc chắn muốn xóa biểu ngữ này?")) {
                $.ajax({
                    url: '{{ route('admin.settings.shop.by.style.destroy', ':key') }}'.replace(':key', key),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': `{{ csrf_token() }}`
                    },
                    success: function(response) {
                        if (response.error == 0) {
                            toastr.success(response.message);
                            listTr.remove();

                            setTimeout(function() {
                                location.reload();
                            }, 1000);
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
