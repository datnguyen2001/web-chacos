@extends('admin.layout.index')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('main')
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    @if (session('success'))
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            {{session('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                             role="alert">
                            {{session('error')}}
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                        </div>
                    @endif
                    <form method="post" action="{{route('admin.products.update',$product->id)}}" enctype="multipart/form-data"
                          class="card p-3">
                        @csrf
                        <div class="row mb-3">
                            <div class="row mb-3 box_parameter_1">
                                <div class="col-3 d-flex align-items-center">
                                    <p class="m-0 parameter_1">Tên sản phẩm :</p>
                                </div>
                                <div class="col-9">
                                    <input class="form-control" name="name" value="{{$product->name}}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Chọn loại sản phẩm</label>
                                <div class="col-sm-9">
                                    <select class="form-select" name="type"
                                            aria-label="Default select example">
                                        <option class="bg-info" value="0" @if($product->type == 0) selected @endif>Không phân loại</option>
                                        <option class="bg-info" value="1" @if($product->type == 1) selected @endif>Medium</option>
                                        <option class="bg-info" value="2" @if($product->type == 2) selected @endif>Wide</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3 box_parameter_1">
                                <div class="col-3 d-flex align-items-center">
                                    <p class="m-0 parameter_1">Phong cách :</p>
                                </div>
                                <div class="col-9">
                                    <input class="form-control" name="style" value="{{$product->style}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-3 d-flex align-items-center">
                                    <p class="m-0">Danh mục :</p>
                                </div>
                                <div class="col-9">
                                    <div class="row m-0 border">
                                        <div class="col-md-4 pt-2 pb-2"
                                             style="border-right: 1px solid #dddddd; overflow: auto; max-height: 400px">
                                            @foreach($category as $key => $cate)
                                                <div class="d-flex align-items-center category p-1">
                                                    <div class="d-flex align-items-center" style="margin-right: 10px">
                                                        <input type="radio" style="width: 20px; height: 20px" id="cate{{$key}}" @if($cate->id == $parent_id) checked @endif
                                                               value="{{$cate->id}}" name="category"></div>
                                                    <label for="cate{{$key}}" class="m-0">{{$cate->name}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div list_category_children class="col-md-4 pb-2 pt-2"
                                             style="border-right: 1px solid #dddddd; overflow: auto; max-height: 400px">
                                            @foreach($category_2 as $value)
                                                <div class="d-flex align-items-center category list_category_children p-1">
                                                    <div class="d-flex align-items-center" style="margin-right: 10px">
                                                        <input type="radio" style="width: 20px; height: 20px"
                                                               value="{{$value->id}}"
                                                               @if($product->category_id == $value->id) checked
                                                               @endif name="category_children">
                                                    </div>
                                                    <p class="m-0">{{$value->name}}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 d-flex align-items-center">
                                <p class="m-0">Ảnh bìa sản phẩm :</p>
                            </div>
                            <div class="col-9">
                                <div
                                    class="d-flex align-items-center position-relative selector__image justify-content-center"
                                    style="width: 200px; height: 250px; background: #f0f0f0;cursor: pointer">
                                    <img src="{{asset($product->image)}}" class="position-absolute w-100 h-100"
                                         style="top: 0;left: 0; object-fit: cover">
                                    <label class="position-absolute bg-transparent clear-img text-black"
                                           style="top: 5px; right: 5px; z-index: 10; cursor: pointer"><i
                                            class="bi bi-x-circle-fill"></i></label>
                                </div>
                                <input type="file" hidden name="file_product" accept="image/*">
                            </div>
                        </div>
                        <div class="card mb-5">
                            <div class="card-header bg-info text-white">
                                Hình ảnh sản phẩm
                            </div>
                            <div class="card-body">
                                <div class="image-uploader image_product has-files mt-2">
                                    <div class="uploaded">
                                        @foreach($image_variant as $value)
                                            <div class="uploaded-images">
                                                <img src="{{asset($value->image)}}">
                                                <button type="button" value="{{$value->id}}" class="delete__image"><i
                                                        class="bi bi-x"></i></button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header bg-info text-white">
                                Cập nhập hình ảnh sản phẩm
                            </div>
                            <div class="card-body">
                                <label class="mt-2 mb-2"><i class="fa fa-upload"></i> Chọn hoặc kéo ảnh vào khung bên
                                    dưới</label>
                                <div class="input-image-product">
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <a data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false"
                               aria-controls="collapseExample1" class="btn bg-info text-white card-header">
                                <p class="d-flex align-items-center justify-content-between mb-0"><strong
                                        style="font-weight: unset">Thông tin sản phẩm</strong><i
                                        class="fa fa-angle-down"></i></p>
                            </a>
                            <div id="collapseExample1" class="collapse shadow-sm show">
                                <div class="card">
                                    <div class="card-body mt-2">
                                        <textarea name="description" id="description"
                                                  class="ckeditor">{!! $product->description !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white">
                                Thêm sản phẩm
                            </div>
                            <div class="card-body p-0 bg-white">
                                @foreach($product_color as $key => $color)
                                    @php $product_size = \App\Models\ProductSizeModel::where('color_id', $color->id)->get(); @endphp
                                <div class="mt-3 border-bottom data-variant pb-3">
                                    <input value="{{$color->id}}" hidden name="variant[{{$key}}][color_id]">
                                    <div class="row m-0">
                                        <div class="col-12 p-1">
                                            <div class="col-lg-3 p-1">
                                                <button type="button" class="btn btn-primary btn-add-color form-control"><i
                                                        class="bi bi-plus-lg"></i> Thêm Màu Sản Phẩm
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 p-1">
                                            <input type="text" name="variant[{{$key}}][name]" class="form-control" value="{{$color->name}}"
                                                   placeholder="Tên màu sản phẩm" required>
                                        </div>
                                        <div class="col-lg-2 p-1">
                                            <input type="file" name="variant[{{$key}}][image]" class="form-control" accept="image/*">
                                        </div>
                                        <div class="col-lg-2 p-1">
                                            <input type="text" name="variant[{{$key}}][price]" class="form-control format-currency" value="{{number_format($color->price)}}"
                                                   placeholder="Giá bán" required>
                                        </div>
                                        <div class="col-lg-2 p-1">
                                            <input type="text" name="variant[{{$key}}][promotional_price]" class="form-control format-currency" value="{{number_format($color->promotional_price)}}"
                                                   placeholder="Giá bán khuyến mãi" required>
                                        </div>
                                        <div class="col-lg-2 p-1">
                                            <button type="button" class="btn btn-success btn-add-size form-control"><i
                                                    class="bi bi-plus-lg"></i> Thêm Size
                                            </button>
                                        </div>
                                        @if($key > 0)
                                            <div class="col-lg-1 p-1">
                                                <a class="btn btn-danger btn-delete-name"
                                                   href="{{url('/admin/products/delete-color/'.$color->id)}}">
                                                    <i class="bi bi-trash"></i> Xóa</a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="list-size">
                                        @foreach($product_size as $k => $size)
                                        <div class="row m-0">
                                            <input value="{{$size->id}}" hidden
                                                   name="variant[{{$key}}][data][{{$k}}][size_id]">
                                            <div class="col-lg-3 p-1">
                                                <input type="text" name="variant[{{$key}}][data][{{$k}}][size]" value="{{$size->name}}"
                                                       class="form-control size" placeholder="size"
                                                       required>
                                            </div>
                                            <div class="col-lg-3 p-1">
                                                <input name="variant[{{$key}}][data][{{$k}}][quantity]" type="text" value="{{$size->quantity}}"
                                                       class="form-control quantity" placeholder="Số lượng" required>
                                            </div>
                                            @if($k > 0)
                                                <div class="col-lg-2 p-1">
                                                    <a href="{{url('admin/products/delete-size/'.$size->id)}}"
                                                       class="btn btn-danger btn-delete-color">
                                                        <i class="bi bi-trash"></i> Xóa</a>
                                                </div>
                                            @endif
                                        </div>
                                            @endforeach
                                    </div>
                                </div>
                                    @endforeach
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 col-form-label">Trạng thái: </label>
                            <div class="col-sm-8">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="display" type="checkbox" @if($product->display == 1) checked @endif
                                           id="flexSwitchCheckChecked">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Hiện </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 col-form-label">SP nổi bật: </label>
                            <div class="col-sm-8">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="is_hot" type="checkbox" @if($product->is_hot == 1) checked @endif
                                           id="flexSwitchCheckChecked">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Hiện </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 col-form-label">Hiển thị tại "Favorites": </label>
                            <div class="col-sm-8">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="isFavoritesSwiper" type="checkbox" @if($product->isFavoritesSwiper == 1) checked @endif
                                           id="flexSwitchCheckChecked">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Hiện </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label">Hiển thị tại "Picked": </label>
                            <div class="col-sm-8">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="isPickedSwiper" type="checkbox" @if($product->isPickedSwiper == 1) checked @endif
                                           id="flexSwitchCheckChecked">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Hiện </label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-success" style="margin-right: 15px">Tạo mới</button>
                            <a href="{{route('admin.products.index')}}" class="btn btn-dark">Hủy</a>
                        </div>
                    </form>

                </div>
            </div>
        </section>
    </main>
@endsection
@section('script')
    <script src="{{url('assets/admin/js/input_file.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/admin/js/format_currency.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/admin/js/create_product.js')}}" type="text/javascript"></script>
    <script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{route('admin.ckeditor.image-upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
