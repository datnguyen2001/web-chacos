@extends('admin.layout.index')
@section('title', 'Quản lý Adventurous')

@section('style')
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
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">"Box around" Trang chủ</h1>

            <hr>

            <form class="mt-5" action="{{ route('admin.settings.box.around.update') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề:</label>
                    <input class="form-control" type="text" id="title" name="title"
                        value="{{ old('title', $box['title']) }}" autofocus>
                </div>
                <div class="mb-3">
                    <label for="conteent" class="form-label">Nội dung:</label>
                    <input class="form-control" type="text" id="content" name="content"
                        value="{{ old('content', $box['content']) }}">
                </div>

                <hr>

                <h5>Hàng 1:</h5>

                <div class="mb-3" id="repeater1">
                    @forelse ($box['row1'] as $index => $item)
                        <div class="d-flex align-items-center row repeater-item">
                            <div class="col-md-1 delete-repeater-div">
                                @if ($index != 0)
                                    <button class="btn btn-outline-danger delete-btn-1" data-index="{{ $index }}"><i
                                            class="fa-solid fa-x"></i></button>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label for="file{{ $index }}" class="form-label">Ảnh:</label>
                                <input class="form-control" accept="image/*,.gif" type="file"
                                    id="file{{ $index }}" name="file1[]">
                            </div>
                            <div class="repeater-item col-md-4">
                                <div class="form-group">
                                    <input type="hidden" name="old_file1[{{ $index }}]" value="{{ $item }}">
                                    <img class="mt-3 viewFile" src="{{ $item }}" width="202" height="159">
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="d-flex align-items-center row repeater-item">
                            <div class="col-md-1 delete-repeater-div">
                            </div>
                            <div class="col-md-4">
                                <label for="file1" class="form-label">Ảnh:</label>
                                <input class="form-control" accept="image/*,.gif" type="file" id="file1"
                                    name="file1[]">
                            </div>
                            <div class="repeater-item col-md-4">
                                <div class="form-group">
                                    <img class="mt-3 viewFile" src="" width="202" height="159">
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>

                <button type="button" class="btn btn-outline-primary mb-3" id="addBtn1"><i
                        class="fa-solid fa-plus"></i></button>

                <hr>

                <h5>Hàng 2:</h5>

                <div class="mb-3" id="repeater2">
                    @forelse ($box['row2'] as $index => $item)
                        <div class="d-flex align-items-center row repeater-item">
                            <div class="col-md-1 delete-repeater-div">
                                @if ($index != 0)
                                    <button class="btn btn-outline-danger delete-btn-2" data-index="{{ $index }}"><i
                                            class="fa-solid fa-x"></i></button>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label for="file{{ $index }}" class="form-label">Ảnh:</label>
                                <input class="form-control" accept="image/*,.gif" type="file"
                                    id="file{{ $index }}" name="file2[]">
                            </div>
                            <div class="repeater-item col-md-4">
                                <div class="form-group">
                                    <input type="hidden" name="old_file2[{{ $index }}]"
                                        value="{{ $item }}">
                                    <img class="mt-3 viewFile" src="{{ $item }}" width="202" height="159">
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="d-flex align-items-center row repeater-item">
                            <div class="col-md-1 delete-repeater-div">
                            </div>
                            <div class="col-md-4">
                                <label for="file2" class="form-label">Ảnh:</label>
                                <input class="form-control" accept="image/*,.gif" type="file" id="file2"
                                    name="file2[]">
                            </div>
                            <div class="repeater-item col-md-4">
                                <div class="form-group">
                                    <img class="mt-3 viewFile" src="" width="202" height="159">
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>

                <button type="button" class="btn btn-outline-primary mb-3" id="addBtn2"><i
                        class="fa-solid fa-plus"></i></button>

                <hr>

                <h5>Hàng 3:</h5>

                <div class="mb-3" id="repeater3">
                    @forelse ($box['row3'] as $index => $item)
                        <div class="d-flex align-items-center row repeater-item">
                            <div class="col-md-1 delete-repeater-div">
                                @if ($index != 0)
                                    <button class="btn btn-outline-danger delete-btn-3"
                                        data-index="{{ $index }}"><i class="fa-solid fa-x"></i></button>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label for="file{{ $index }}" class="form-label">Ảnh:</label>
                                <input class="form-control" accept="image/*,.gif" type="file"
                                    id="file{{ $index }}" name="file3[]">
                            </div>
                            <div class="repeater-item col-md-4">
                                <div class="form-group">
                                    <input type="hidden" name="old_file3[{{ $index }}]"
                                        value="{{ $item }}">
                                    <img class="mt-3 viewFile" src="{{ $item }}" width="202" height="159">
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="d-flex align-items-center row repeater-item">
                            <div class="col-md-1 delete-repeater-div">
                            </div>
                            <div class="col-md-4">
                                <label for="file3" class="form-label">Ảnh:</label>
                                <input class="form-control" accept="image/*,.gif" type="file" id="file3"
                                    name="file3[]">
                            </div>
                            <div class="repeater-item col-md-4">
                                <div class="form-group">
                                    <img class="mt-3 viewFile" src="" width="202" height="159">
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>

                <button type="button" class="btn btn-outline-primary mb-3" id="addBtn3"><i
                        class="fa-solid fa-plus"></i></button>

                <hr>

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
        </div>

    </main>
@endsection

@section('script')
    <script>
        //REPEATER
        $(document).ready(function() {
            var counter1 = 2;
            var counter2 = 2;
            var counter3 = 2;

            $('#addBtn1').click(function() {
                var clone = $('#repeater1').find('.repeater-item:first').clone();
                clone.find('input[type="file"]').attr('name',
                    'file1[]');
                clone.find('input[type="file"]').val('');
                clone.find('.delete-repeater-div').html(
                    `<button class="btn btn-outline-danger delete-btn" data-index="` + counter1 + `"><i
                                        class="fa-solid fa-x"></i></button>`);
                clone.find('input[type="hidden"]').remove();
                clone.find('.viewFile').attr('src', '').attr('width', 202).attr('height', 159);
                clone.appendTo('#repeater1');
                counter1++;
            });

            $('#addBtn2').click(function() {
                var clone = $('#repeater2').find('.repeater-item:first').clone();
                clone.find('input[type="file"]').attr('name',
                    'file2[]');
                clone.find('input[type="file"]').val('');
                clone.find('.delete-repeater-div').html(
                    `<button class="btn btn-outline-danger delete-btn" data-index="` + counter2 + `"><i
                            class="fa-solid fa-x"></i></button>`);
                clone.find('input[type="hidden"]').remove();
                clone.find('.viewFile').attr('src', '').attr('width', 202).attr('height', 159);
                clone.appendTo('#repeater2');
                counter2++;
            });

            $('#addBtn3').click(function() {
                var clone = $('#repeater3').find('.repeater-item:first').clone();
                clone.find('input[type="file"]').attr('name',
                    'file3[]');
                clone.find('input[type="file"]').val('');
                clone.find('.delete-repeater-div').html(
                    `<button class="btn btn-outline-danger delete-btn" data-index="` + counter3 + `"><i
                            class="fa-solid fa-x"></i></button>`);
                clone.find('input[type="hidden"]').remove();
                clone.find('.viewFile').attr('src', '').attr('width', 202).attr('height', 159);
                clone.appendTo('#repeater3');
                counter3++;
            });

            $(document).on('click', '.delete-btn-1', function() {
                var index = $(this).data('index');
                $(this).closest('.repeater-item').remove();
                // Update the counter and reindex the remaining items
                counter1--;
                $('.delete-btn').each(function(idx) {
                    $(this).data('index', idx);
                });
            });

            $(document).on('click', '.delete-btn-2', function() {
                var index = $(this).data('index');
                $(this).closest('.repeater-item').remove();
                // Update the counter and reindex the remaining items
                counter2--;
                $('.delete-btn').each(function(idx) {
                    $(this).data('index', idx);
                });
            });

            $(document).on('click', '.delete-btn-3', function() {
                var index = $(this).data('index');
                $(this).closest('.repeater-item').remove();
                // Update the counter and reindex the remaining items
                counter3--;
                $('.delete-btn').each(function(idx) {
                    $(this).data('index', idx);
                });
            });
        });
    </script>

    <script>
        $(document).on('change', 'input[type="file"]', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();
            var previewImage = $(this).closest('.repeater-item').find('.viewFile');
            var hiddenInput = $(this).closest('.repeater-item').find('input[type="hidden"]');

            // Check if the hidden input has a value and remove it
            if (hiddenInput.val()) {
                hiddenInput.remove();
            }
            reader.onload = function(e) {
                previewImage.attr('src', e.target.result);
            };

            reader.readAsDataURL(file);
        });
    </script>
@endsection
