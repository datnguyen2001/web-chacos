@extends('admin.layout.index')
@section('title', 'Thông tin về shop')

@section('style')

@endsection

@section('main')
    <main id="main" class="main d-flex flex-column justify-content-center">
        <div class="">
            <h1 class="h3 mb-4 text-gray-800">{{$page_title}}</h1>

            <hr>

            <form action="{{ route('admin.infor-shop.update',['type'=>$type]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề</label>
                    <input class="form-control" type="text" id="title" name="title"
                        value="{{ old('title', $data->title ?? '') }}">
                </div>
                <div class="card mb-3 p-3">
                    <label for="content" class="form-label">Nội dung</label>
                    <textarea name="content" id="content"
                              class="ckeditor">{{ old('content', $data->content ?? '') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>

    </main>
@endsection
@section('script')
    <script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('content', {
            filebrowserUploadUrl: "{{route('admin.ckeditor.image-upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
