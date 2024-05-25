@extends('admin.layout.index')
@section('title', 'Sản phẩm quảng cáo')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css" />
@endsection

@section('main')
    <main id="main" class="main d-flex flex-column justify-content-center">
        <div class="">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Product advertising</h1>
            <hr>

            <div class="d-flex justify-content-start">
                <a type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addCategory"><i
                        class="fa-solid fa-rotate"></i>Thêm sản phẩm quảng cáo</a>
            </div>

            <table class="table" id="tableListCategories">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">STT</th>
                        <th scope="col" class="text-center">Category</th>
                        <th scope="col" class="text-center">Image</th>
                        <th scope="col" class="text-center">Url</th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($search as $key => $cate)
                        <tr id="category-{{ $cate->id }}">
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-center">
                                {{ $cate->name_category }}
                            </td>
                            <td class="text-center">
                                <img src="{{asset($cate->image)}}" width="100px">
                            </td>
                            <td class="text-center">
                                {{ $cate->url }}
                            </td>
                            <td class="text-center">
                                <a type="button" data-bs-toggle="modal" data-bs-target="#editCategory{{ $cate->id }}"
                                    class="btn btn-primary me-3"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{url('admin/settings/destroy-product-advertising/'.$cate->id)}}" class="btn btn-danger btn-delete"><i
                                        class="bi bi-trash3-fill"></i></a>
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
                    <form method="POST" action="{{ route('admin.settings.store.product-advertising') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="addCategoryLabel">Thêm sản phẩm quảng cáo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="add-category-name" class="form-label">Category</label>
                                <select name="category_id" class="form-control" required>
                                    @foreach($category as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="add-category-name" class="form-label w-100">Image</label>
                                <input type="file" name="image">
                            </div>
                            <div class="mb-3">
                                <label for="add-category-slug" class="form-label">Url</label>
                                <input type="text" class="form-control" id="add-category-slug" name="url"
                                    value="{{ old('url') }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Tạo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @foreach ($search as $key => $cate)
            <!-- Edit category modal -->
            <div class="modal fade" id="editCategory{{ $cate->id }}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="editCategoryLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('admin.settings.update.product-advertising', ['id' => $cate->id]) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="editCategoryLabel">Sửa sản phẩm quảng cáo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="edit-category-name-{{ $cate->id }}" class="form-label">Category</label>
                                    <select name="category_id" class="form-control" required>
                                        @foreach($category as $item)
                                            <option value="{{$item->id}}" @if($cate->category_id == $item->id) selected @endif>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="add-category-name" class="form-label w-100">Image</label>
                                    <input type="file" name="image">
                                </div>
                                <div class="mb-3">
                                    <label for="edit-category-slug-{{ $cate->id }}" class="form-label">Url</label>
                                    <input type="text" class="form-control edit-category-slug"
                                        id="edit-category-slug-{{ $cate->id }}" name="url"
                                        value="{{ old('url', $cate->url) }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
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
    <script>
        $(document).ready(function() {
            $('#tableListCategories').DataTable();
        });
    </script>

    <script>
        $('a.btn-delete').confirm({
            title: 'Xác nhận!',
            content: 'Bạn có chắc chắn muốn xóa bản ghi này?',
            buttons: {
                ok: {
                    text: 'Xóa',
                    btnClass: 'btn-danger',
                    action: function(){
                        location.href = this.$target.attr('href');
                    }
                },
                close: {
                    text: 'Hủy',
                    action: function () {}
                }
            }
        });
    </script>
@endsection
