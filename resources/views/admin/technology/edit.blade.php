@extends('admin.layout.index')
@section('main')
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Cập nhật {{$titlePage}}</h5>
                            <!-- General Form Elements -->
                            @if (session('error'))
                                <div
                                    class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                                    role="alert">
                                    {{session('error')}}
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            @endif
                            <form action="{{url("admin/technology/update",$technology->id)}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">Tiêu đề</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="title" required class="form-control"
                                               value="{{$technology->title}}">
                                    </div>
                                </div>
                                <div class="card mb-5">
                                    <div class="card-header bg-info text-white">
                                        Mô tả
                                    </div>
                                    <div class="card-body mt-2">
                                        <textarea name="describe" rows="4" class="w-100" required>{{$technology->describe}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-3 d-flex align-items-center">
                                        <p class="m-0">Danh mục</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <select name="category_id" class="form-select" required>
                                            @foreach($category as $cate)
                                            <option value="{{$cate->id}}" @if($technology->category_id == $cate->id) selected @endif>{{$cate->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-3">Hình ảnh :</div>
                                    <div class="col-8">
                                        <div class="form-control position-relative div-parent" style="padding-top: 50%">
                                            <div class="position-absolute w-100 h-100 div-file"
                                                 style="top: 0; left: 0;z-index: 10">
                                                <button type="button"
                                                        class="position-absolute clear border-0 bg-danger p-0 d-flex justify-content-center align-items-center"
                                                        style="top: -10px;right: -10px;width: 30px;height: 30px;border-radius: 50%">
                                                    <i class="bi bi-x-lg text-white"></i></button>
                                                <img src="{{asset($technology->image)}}" class="w-100 h-100"
                                                     style="object-fit: cover">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-5">
                                    <div class="card-header bg-info text-white">
                                        Nội dung
                                    </div>
                                    <div class="card-body mt-2">
                                        <textarea name="content" class="ckeditor">{!! $technology->content !!}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-3"></div>
                                    <div class="col-8">
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                        <a href="{{route('admin.technology.index')}}" class="btn btn-danger">Hủy</a>
                                    </div>
                                    <input type="file" name="file" accept="image/x-png,image/gif,image/jpeg"
                                           hidden>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('script')
    <script>
        let parent;
        $(document).on("click", ".select-image", function () {
            $('input[name="file"]').click();
            parent = $(this).parent();
        });
        $('input[type="file"]').change(function (e) {
            imgPreview(this);
        });

        function imgPreview(input) {
            let file = input.files[0];
            let mixedfile = file['type'].split("/");
            let filetype = mixedfile[0]; // (image, video)
            if (filetype == "image") {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $("#preview-img").show().attr("src",);
                    let html = '<div class="position-absolute w-100 h-100 div-file" style="top: 0; left: 0;z-index: 10">' +
                        '<button type="button" class="position-absolute clear border-0 bg-danger p-0 d-flex justify-content-center align-items-center" style="top: -10px;right: -10px;width: 30px;height: 30px;border-radius: 50%"><i class="bi bi-x-lg text-white"></i></button>' +
                        '<img src="' + e.target.result + '" class="w-100 h-100" style="object-fit: cover">' +
                        '</div>';
                    parent.html(html);
                }
                reader.readAsDataURL(input.files[0]);
            } else if (filetype == "video" || filetype == "mp4") {
                let html = '<div class="position-absolute w-100 h-100 div-file" style="top: 0; left: 0;z-index: 10">' +
                    '<button type="button" class="position-absolute clear border-0 bg-danger p-0 d-flex justify-content-center align-items-center" style="top: -10px;right: -10px;width: 30px;height: 30px;border-radius: 50%;z-index: 14"><i class="bi bi-x-lg text-white"></i></button>' +
                    '<video class="w-100 h-100" style="object-fit: cover" controls>\n' +
                    '<source src="' + URL.createObjectURL(input.files[0]) + '"></video>' +
                    '</div>';
                parent.html(html);
            } else {
                alert("Tệp không hợp lệ");
            }
        }

        $(document).on("click", "button.clear", function () {
            parent = $(this).closest(".div-parent");
            $(".div-file").remove();
            let html = '<button type="button" class="position-absolute border-0 bg-transparent select-image" style="top: 50%;left: 50%;transform: translate(-50%,-50%)">\n' +
                '                                    <i style="font-size: 30px" class="bi bi-download"></i>\n' +
                '                                </button>';
            parent.html(html);
            $('input[type="file"]').val("");
        });
    </script>

    <script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('content', {
            filebrowserUploadUrl: "{{route('admin.ckeditor.image-upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
