@extends('admin.layout.index')
@section('title', 'Quản lý Sale Along')

@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">

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
            <!-- Page Preview -->
            <h1 class="h3 mb-4 text-gray-800">"Sale along" Trang chủ</h1>
            <form class="mt-5" action="{{ route('admin.settings.sale.along.update') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề:</label>
                    <input class="form-control" type="text" id="title" name="title"
                        value="{{ old('title', $sale['title']) }}">
                </div>

                <div class="mb-3" id="repeater">
                    @forelse ($sale['list'] as $index => $item)
                        <div class="d-flex align-items-center row repeater-item">
                            <div class="col-md-1 delete-repeater-div">
                                @if ($index != 0)
                                    <button class="btn btn-outline-danger delete-btn" data-index="{{ $index }}"><i
                                            class="fa-solid fa-x"></i></button>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label for="file{{ $index }}" class="form-label">Ảnh:</label>
                                <input class="form-control" accept="image/*,.gif" type="file"
                                    id="file{{ $index }}" name="file[]">
                            </div>
                            <div class="repeater-item col-md-4">
                                <div class="form-group">
                                    <input type="hidden" name="old_file[{{ $index }}]" value="{{ $item }}">
                                    <img class="mt-3 viewFile" src="{{ $item }}" width="200" height="100">
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="d-flex align-items-center row repeater-item">
                            <div class="col-md-1 delete-repeater-div">
                                {{-- <button class="btn btn-outline-danger delete-btn" data-index="1"><i class="fa-solid fa-x"></i></button> --}}
                            </div>
                            <div class="col-md-4">
                                <label for="file" class="form-label">Ảnh:</label>
                                <input class="form-control" accept="image/*,.gif" type="file" id="file"
                                    name="file[]">
                            </div>
                            <div class="repeater-item col-md-4">
                                <div class="form-group">
                                    <img class="mt-3 viewFile" src="" width="200" height="100">
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>

                <button type="button" class="btn btn-outline-primary mb-3" id="addBtn"><i
                        class="fa-solid fa-plus"></i></button>

                <div class="mb-3">
                    <label for="isActive" class="form-label me-3">Công khai?</label>
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
            <hr>
        </div>

        <div class="">
            <!-- Page Preview -->
            <h1 class="h3 mb-4 text-gray-800">Xem trước</h1>

            <hr>

            <div class="box-shop-style box-mobile-style" style="margin-top: -40px">
                @php
                    $words = explode(' ', $sale['title']);
                    $firstWord = $words[0];
                    $otherWords = implode(' ', array_slice($words, 1));
                @endphp
                <div class="title-shop-style">{{ $firstWord }} <span style="color: #f65024;">{{ $otherWords }}</span>
                </div>
                <div class="swiper productSwiper productStyleSwiper">
                    <div class="swiper-wrapper">
                        @foreach ($sale['list'] as $index => $item)
                            <a href="{{ route('home') }}" class="swiper-slide box-item-product">
                                <img src="{{ $item }}" class="img-product-style2">
                            </a>
                        @endforeach
                    </div>
                    <div class="swiper-pagination swiper-pagination-product"></div>
                </div>
            </div>
        </div>

    </main>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/js/home.js') }}"></script>

    <script>
        //REPEATER
        $(document).ready(function() {
            var counter = 2;

            $('#addBtn').click(function() {
                var clone = $('.repeater-item:first').clone();
                clone.find('input[type="file"]').attr('name',
                    'file[]');
                clone.find('input[type="file"]').val('');
                clone.find('.delete-repeater-div').html(
                    `<button class="btn btn-outline-danger delete-btn" data-index="` + counter + `"><i
                                            class="fa-solid fa-x"></i></button>`);
                clone.find('input[type="hidden"]').remove();
                clone.find('.viewFile').attr('src', '');
                clone.appendTo('#repeater');
                counter++;
            });

            $(document).on('click', '.delete-btn', function() {
                var index = $(this).data('index');
                $(this).closest('.repeater-item').remove();
                // Update the counter and reindex the remaining items
                counter--;
                $('.delete-btn').each(function(idx) {
                    $(this).data('index', idx);
                });
            });
        });
    </script>

    <script>
        $(document).on('change', 'input[name="file[]"]', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();
            var previewImage = $(this).closest('.repeater-item').find('.viewFile');

            reader.onload = function(e) {
                previewImage.attr('src', e.target.result);
            };

            reader.readAsDataURL(file);
        });
    </script>
@endsection
