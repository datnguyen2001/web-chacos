@extends('admin.layout.index')
@section('title', 'Quản lý Category')

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
            <h1 class="h3 mb-4 text-gray-800">Danh sách Category (Danh mục)</h1>
            <hr>

            <div class="d-flex justify-content-start">
                <a type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addCategory"><i
                        class="fa-solid fa-rotate"></i>Thêm mới danh mục</a>
            </div>

            <table class="table" id="tableListCategories">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">STT</th>
                        <th scope="col" class="text-center">Tên</th>
                        <th scope="col" class="text-center">Đường dẫn</th>
                        <th scope="col" class="text-center">Danh mục cha</th>
                        <th scope="col" class="text-center">Nằm trong menu</th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categoriesWithMenuName as $key => $cate)
                        <tr id="category-{{ $cate->id }}">
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-center">
                                {{ $cate->name }}
                            </td>
                            <td class="text-center">
                                {{ $cate->slug }}
                            </td>
                            <td class="text-center">
                                {{ $cate->parent_id == 0 ? 'Không có cha' : \App\Models\Category::find($cate->parent_id)->name }}
                            </td>
                            <td class="text-center">
                                {{ $cate->menuName ?? 'Trống' }}
                            </td>
                            <td class="text-center">
                                <a type="button" data-bs-toggle="modal" data-bs-target="#editCategory{{ $cate->id }}"
                                    class="btn btn-primary me-3"><i class="bi bi-pencil-square"></i></a>
                                <button onclick="deleteCategory({{ $cate->id }})" class="btn btn-danger"><i
                                        class="bi bi-trash3-fill"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Add category modal -->
        <div class="modal fade" id="addCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="addCategoryLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="addCategoryLabel">Thêm danh mục</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="add-category-name" class="form-label">Tên</label>
                                <input type="text" class="form-control" id="add-category-name" name="name"
                                    value="{{ old('name') }}">
                            </div>
                            <div class="mb-3">
                                <label for="add-category-slug" class="form-label">Đường dẫn</label>
                                <input type="text" class="form-control" id="add-category-slug" name="slug"
                                    value="{{ old('slug') }}">
                            </div>
                            <div class="mb-3">
                                <label for="addCategoryParentSelector" class="form-label">Danh mục cha: </label>
                                <select class="form-select select2Selector" id="addCategoryParentSelector" name="parent_id">
                                    <option value="0" {{ !old('parent_id') ? 'selected' : '' }}>Không có cha</option>
                                    @foreach ($categoriesWithMenuName as $cate)
                                        @if (!$cate->parent_id)
                                            <option value="{{ $cate->id }}"
                                                {{ old('parent_id') == $cate->id ? 'selected' : '' }}>
                                                {{ $cate->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="addCategoryMenuSelector" class="form-label">Nằm trong menu: </label>
                                <select class="form-select select2Selector" id="addCategoryMenuSelector"
                                    name="menu_belong[]" multiple>
                                    @foreach ($menu as $me)
                                        <option value="{{ $me->id }}"
                                            {{ in_array($me->id, explode(',', old('menu_belong'))) ? 'selected' : '' }}>
                                            {{ $me->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="add-category-title" class="form-label">Tiêu đề </label>
                                <input type="text" class="form-control" id="add-category-title" name="title"
                                    value="{{ old('title') }}">
                            </div>
                            <div class="mb-3">
                                <label for="add-category-describe" class="form-label">Mô tả </label>
                                <textarea name="describe" class="form-control" id="add-category-describe" rows="3">{{ old('describe') }}</textarea>
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

        @foreach ($categoriesWithMenuName as $key => $cate)
            <!-- Edit category modal -->
            <div class="modal fade editCategory" id="editCategory{{ $cate->id }}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="editCategoryLabel{{ $cate->id }}"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('admin.category.update', ['id' => $cate->id]) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="editCategoryLabel{{ $cate->id }}">Chỉnh sửa danh mục
                                    <strong>{{ $cate->name }}</strong>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="edit-category-name-{{ $cate->id }}" class="form-label">Tên</label>
                                    <input type="text" class="form-control edit-category-name"
                                        id="edit-category-name-{{ $cate->id }}" name="name"
                                        value="{{ old('name', $cate->name) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="edit-category-slug-{{ $cate->id }}" class="form-label">Đường
                                        dẫn</label>
                                    <input type="text" class="form-control edit-category-slug"
                                        id="edit-category-slug-{{ $cate->id }}" name="slug"
                                        value="{{ old('slug', $cate->slug) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="edit-category-parent-selector-{{ $cate->id }}"
                                        class="form-label">Danh
                                        mục cha: </label>
                                    <select class="form-select select2EditSelector"
                                        id="edit-category-parent-selector-{{ $cate->id }}" name="parent_id">
                                        <option value="0"
                                            {{ !old('parent_id') || $cate->parent_id == 0 ? 'selected' : '' }}>Không có cha
                                        </option>
                                        @foreach ($categoriesWithMenuName as $c)
                                            @if ($c->parent_id != 0)
                                                <option value="{{ $c->id }}"
                                                    {{ old('parent_id', $cate->parent_id) == $c->id ? 'selected' : '' }}>
                                                    {{ $c->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="editCategoryMenuSelector{{ $cate->id }}" class="form-label">Nằm trong
                                        menu: </label>
                                    <select class="form-select select2EditSelector"
                                        id="editCategoryMenuSelector{{ $cate->id }}" name="menu_belong[]" multiple>
                                        @foreach ($menu as $me)
                                            <option value="{{ $me->id }}"
                                                {{ in_array($me->id, explode(',', old('menu_belong', $cate->menu_belong))) ? 'selected' : '' }}>
                                                {{ $me->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="add-category-title" class="form-label">Tiêu đề </label>
                                    <input type="text" class="form-control" id="add-category-title" name="title"
                                        value="{{ @$cate->title }}">
                                </div>
                                <div class="mb-3">
                                    <label for="add-category-describe" class="form-label">Mô tả </label>
                                    <textarea name="describe" class="form-control" id="add-category-describe" rows="3">{{ @$cate->describe }}</textarea>
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
                openStoreCategoryModal();
            });
        </script>
    @endif

    <script>
        $(document).ready(function() {
            var showModalIds = {!! json_encode(session('show_update_modal_ids', [])) !!};
            showModalIds.forEach(function(modalId) {
                var modal = $('#editCategory' + modalId);
                if (modal.length) {
                    modal.modal('show');
                }
            });
        });
    </script>

    <script>
        function openStoreCategoryModal() {
            $('#addCategory').modal('show');
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#tableListCategories').DataTable();
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
                    dropdownParent: $("#addCategory")
                });
            });

            $('.select2EditSelector').each(function() {
                var width = $(this).data('width') || ($(this).hasClass('w-100') ? '100%' : 'style');

                $(this).select2({
                    theme: 'bootstrap-5',
                    width: width,
                    placeholder: $(this).data('placeholder'),
                    closeOnSelect: true,
                    dropdownParent: $(this).closest(".editCategory")
                });
            });
        });
    </script>
    <script>
        function removeDiacritics(str) {
            return str.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
        }

        function slugify(str) {
            return removeDiacritics(str)
                .toLowerCase()
                .replace(/\s+/g, '-')
                .replace(/[^a-z0-9-]/g, '');
        }

        $(document).ready(function() {
            $("#add-category-name").blur(function() {
                var nameValue = $(this).val();
                var slugValue = slugify(nameValue);
                $("#add-category-slug").val(slugValue);
            });

            $(".edit-category-name").blur(function() {
                var nameValue = $(this).val();
                var slugValue = slugify(nameValue);

                var slugInput = $(this).closest('.modal-body').find('.edit-category-slug');
                slugInput.val(slugValue);
            });
        });
    </script>
    <script>
        function deleteCategory(id) {
            var categoryTr = $('#category-' + id);
            if (confirm("Are you sure you want to delete this category?")) {
                $.ajax({
                    url: '{{ route('admin.category.destroy', ':id') }}'.replace(':id', id),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': `{{ csrf_token() }}`
                    },
                    success: function(response) {
                        if (response.error == 0) {
                            toastr.success(response.message);
                            categoryTr.remove();

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
