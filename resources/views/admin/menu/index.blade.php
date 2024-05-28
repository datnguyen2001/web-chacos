@extends('admin.layout.index')
@section('title', 'Quản lý Menu')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container--bootstrap-5 {
            width: 100%;
        }
    </style>
@endsection

@section('main')
    <main id="main" class="main d-flex flex-column justify-content-center">
        <div class="">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Danh sách Menu</h1>
            <hr>

            <div class="d-flex justify-content-start">
                <a type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addMenu"><i
                        class="fa-solid fa-rotate"></i>Thêm mới menu</a>
            </div>

            <table class="table" id="tableListMenus">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Thứ tự sắp xếp</th>
                        <th scope="col" class="text-center">Tên</th>
                        <th scope="col" class="text-center">Thumbnail</th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menu as $me)
                        <tr id="menu-{{ $me->id }}">
                            <td class="text-center align-middle">{{ $me->order }}</td>
                            <td class="text-center align-middle">
                                {{ $me->name }}
                            </td>
                            <td class="text-center align-middle">
                                <img width="200" src="{{ $me->thumbnail }}" alt="">
                            </td>
                            <td class="text-center align-middle">
                                <a type="button" data-bs-toggle="modal" data-bs-target="#editMenu{{ $me->id }}"
                                    class="btn btn-primary me-3"><i class="bi bi-pencil-square"></i></a>
                                <button onclick="deleteMenu({{ $me->id }})" class="btn btn-danger"><i
                                        class="bi bi-trash3-fill"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Add menu modal -->
        <div class="modal fade" id="addMenu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="addMenuLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form method="POST" action="{{ route('admin.menu.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="addMenuLabel">Thêm danh mục</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="add-menu-order" class="form-label">Thứ tự sắp xếp</label>
                                <input min="1" type="number" class="form-control" id="add-menu-order" name="order"
                                    value="{{ old('order', 1) }}">
                            </div>
                            <div class="mb-3">
                                <label for="add-menu-name" class="form-label">Tên</label>
                                <input type="text" class="form-control" id="add-menu-name" name="name"
                                    value="{{ old('name') }}">
                            </div>
                            <div class="mb-3">
                                <label for="add-menu-thumbnail" class="form-label">Thumbnail</label>
                                <input name="thumbnail" class="form-control" type="file" id="add-menu-thumbnail"
                                    accept="image/*">
                                <img id="add-thumbnail-preview" class="mt-3" src="" width="200">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @foreach ($menu as $key => $m)
            <!-- Edit menu modal -->
            <div class="modal fade editMenu" id="editMenu{{ $m->id }}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="editMenuLabel{{ $m->id }}"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('admin.menu.update', ['id' => $m->id]) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="editMenuLabel{{ $m->id }}">Chỉnh sửa menu
                                    <strong>{{ $m->name }}</strong>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="edit-menu-order{{ $key }}" class="form-label">Thứ tự sắp
                                        xếp</label>
                                    <input min="1" type="number" class="form-control"
                                        id="edit-menu-order{{ $key }}" name="order"
                                        value="{{ old('order', $m->order) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="edit-menu-name{{ $key }}" class="form-label">Tên</label>
                                    <input type="text" class="form-control" id="edit-menu-name{{ $key }}"
                                        name="name" value="{{ old('name', $m->name) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="edit-menu-thumbnail{{ $key }}"
                                        class="form-label">Thumbnail</label>
                                    <input name="thumbnail" class="form-control" type="file"
                                        id="edit-menu-thumbnail{{ $key }}" accept="image/*">
                                    <img id="edit-thumbnail-preview" class="mt-3" src="{{ $m->thumbnail }}"
                                        width="200">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </main>
@endsection
@section('script')
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @if (session('open_store_modal'))
        <script>
            $(document).ready(function() {
                openStoreMenuModal();
            });
        </script>
    @endif

    <script>
        $(document).ready(function() {
            var showModalIds = {!! json_encode(session('show_update_modal_ids', [])) !!};
            showModalIds.forEach(function(modalId) {
                var modal = $('#editMenu' + modalId);
                if (modal.length) {
                    modal.modal('show');
                }
            });
        });
    </script>

    <script>
        function openStoreMenuModal() {
            $('#addMenu').modal('show');
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#tableListMenus').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.select2Selector').each(function() {
                var width = $(this).data('width') || ($(this).hasClass('w-100') ? '100%' : 'style');

                $(this).select2({
                    theme: 'bootstrap-5',
                    width: width,
                    placeholder: $(this).data('placeholder'),
                    closeOnSelect: true,
                    dropdownParent: $("#addMenu")
                });
            });

            $('.select2EditSelector').each(function() {
                var width = $(this).data('width') || ($(this).hasClass('w-100') ? '100%' : 'style');

                $(this).select2({
                    theme: 'bootstrap-5',
                    width: width,
                    placeholder: $(this).data('placeholder'),
                    closeOnSelect: true,
                    dropdownParent: $(this).closest(".editMenu")
                });
            });
        });
    </script>
    <script>
        function deleteMenu(id) {
            var menuTr = $('#menu-' + id);
            if (confirm("Are you sure you want to delete this menu?")) {
                $.ajax({
                    url: '{{ route('admin.menu.destroy', ':id') }}'.replace(':id', id),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': `{{ csrf_token() }}`
                    },
                    success: function(response) {
                        if (response.error == 0) {
                            toastr.success(response.message);
                            menuTr.remove();

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
    <script>
        $(document).ready(function() {
            $('input[name="thumbnail"]').on('change', function(e) {
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
@endsection
