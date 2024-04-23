@extends('admin.layout.index')
@section('title', 'Coupon management')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">

    <style>
        .select2-container--bootstrap-5 {
            width: 100%;
        }

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
            <h1 class="h3 mb-4 text-gray-800">Coupon list</h1>
            <hr>

            <div class="d-flex justify-content-start">
                <a type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addCoupon"><i
                        class="bi bi-plus-circle-dotted me-2"></i><span>Add more coupon</span></a>
            </div>

            <table class="table" id="tableListCoupons">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No.</th>
                        <th scope="col" class="text-center">Code</th>
                        <th scope="col" class="text-center">Discount</th>
                        <th scope="col" class="text-center">Type</th>
                        <th scope="col" class="text-center">Start date</th>
                        <th scope="col" class="text-center">End date</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coupons as $key => $cou)
                        <tr id="coupon-{{ $cou->id }}">
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-center">{{ $cou->code }}</td>
                            <td class="text-center">{{ $cou->discount }}</td>
                            <td class="text-center">{{ $cou->discount_type }}</td>
                            <td class="text-center">
                                {{ date('d/m/Y', strtotime($cou->start_date)) }}
                            </td>
                            <td class="text-center">
                                {{ date('d/m/Y', strtotime($cou->end_date)) }}
                            </td>
                            <td class="text-center">
                                <label class="switch">
                                    <input disabled type="checkbox"
                                        {{ $cou->status == \App\Enums\CouponStatus::ACTIVE ? 'checked' : '' }}>
                                    <div class="slider"></div>
                                    <div class="slider-card">
                                        <div class="slider-card-face slider-card-front"></div>
                                        <div class="slider-card-face slider-card-back"></div>
                                    </div>
                                </label>
                            </td>
                            <td class="text-center">
                                <a type="button" href="{{ route('admin.coupon.edit', ['id' => $cou->id]) }}"
                                    class="btn btn-primary me-3"><i class="bi bi-pencil-square"></i></a>
                                <button onclick="deleteCoupon({{ $cou->id }})" class="btn btn-danger"><i
                                        class="bi bi-trash3-fill"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Add coupon modal -->
        <div class="modal fade" id="addCoupon" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="addCouponLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form method="POST" action="{{ route('admin.coupon.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="addCouponLabel">Add coupon</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="code" class="form-label">Code</label>
                                <input type="text" class="form-control" id="code" name="code"
                                    value="{{ old('code') }}">
                            </div>
                            <div class="mb-3">
                                <label for="discount" class="form-label">Discount</label>
                                <input type="number" class="form-control" id="discount" name="discount"
                                    value="{{ old('discount', 0) }}">
                            </div>
                            <div class="mb-3">
                                <label for="discountType" class="form-label">Discount type: </label>
                                <select class="form-select" id="discountType" name="discount_type">
                                    <option value="amount" selected>Amount</option>
                                    <option value="percent" {{ old('discount_type') == 'percent' ? 'selected' : '' }}>
                                        Percent</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Discount time: </label>
                                <div class="input-group">
                                    <input id="date" type="text" name="date"
                                        class="form-control dateRangeInput" value="{{ old('date') }}">
                                    <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="details" class="form-label">Details</label>
                                <textarea id="details" class="form-control" name="details">{{ old('details') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="product_ids" class="form-label">Product applied:</label>
                                <select class="form-select couponParentSelector" id="product_ids" name="product_ids[]"
                                    multiple>
                                    <option value="1">Product 1</option>
                                    <option value="2">Product 2</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label me-3">Is active?</label>
                                <label class="switch">
                                    <input type="checkbox" id="status" name="status">
                                    <div class="slider"></div>
                                    <div class="slider-card">
                                        <div class="slider-card-face slider-card-front"></div>
                                        <div class="slider-card-face slider-card-back"></div>
                                    </div>
                                </label>
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

    </main>
@endsection
@section('script')
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tableListCoupons').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.couponParentSelector').each(function() {
                var width = $(this).data('width') || ($(this).hasClass('w-100') ? '100%' : 'style');

                $(this).select2({
                    theme: 'bootstrap-5',
                    width: width,
                    placeholder: $(this).data('placeholder'),
                    closeOnSelect: false
                });
            });

            $('.dateRangeInput').daterangepicker({
                opens: 'top',
                autoApply: true,
                minDate: moment().startOf('day'),
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });

            $('#code').on('input', function() {
                var inputVal = $(this).val();
                $(this).val(inputVal.toUpperCase());
            });
        });
    </script>
    <script>
        function deleteCoupon(id) {
            var couponTr = $('#coupon-' + id);
            if (confirm("Are you sure you want to delete this coupon?")) {
                $.ajax({
                    url: '{{ route('admin.coupon.destroy', ':id') }}'.replace(':id', id),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': `{{ csrf_token() }}`
                    },
                    success: function(response) {
                        if (response.error == 0) {
                            toastr.success(response.message);
                            couponTr.remove();
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
