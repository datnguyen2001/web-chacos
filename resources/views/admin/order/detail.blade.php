@php
    use App\Enums\OrderDeliveryStatus;
@endphp
@extends('admin.layout.index')
@section('title', 'Order ' . $tracking_code)

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css" />

    <style>
        .container-xxl {
            max-width: 1560px;
        }

        .avatar {
            width: 40px;
            min-width: 40px;
            height: 40px;
        }

        .avatar.no-thumbnail {
            background-color: #E0E0E0;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .row-deck>.col,
        .row-deck>[class*='col-'] {
            display: flex;
            align-items: stretch;
        }

        .row-deck>.col .card,
        .row-deck>[class*='col-'] .card {
            flex: 1 1 auto;
        }

        .card .card-header {
            background-color: transparent;
            border-bottom: none;
        }

        .product-cart .checkout-coupon-total.checkout-coupon-total-2 .checkout-total {
            width: 30%;
        }

        .product-cart .checkout-coupon-total .checkout-total {
            width: 50%;
            border-left: 1px solid #f0f0f0;
        }

        .product-cart .checkout-coupon-total.checkout-coupon-total-2 .checkout-total .single-total {
            justify-content: space-between;
        }

        .product-cart .checkout-coupon-total .checkout-total .single-total {
            display: flex;
            padding: 0 8px;
        }

        .product-cart .checkout-coupon-total .checkout-total .single-total .value {
            font-weight: 300;
            font-size: 14px;
            line-height: 32px;
            margin-right: 16px;
        }

        .product-cart .checkout-coupon-total.checkout-coupon-total-2 .checkout-total .single-total .price {
            width: auto;
        }

        .product-cart .checkout-coupon-total .checkout-total .single-total .price {
            font-weight: 500;
            font-size: 16px;
            line-height: 32px;
        }

        .product-cart .checkout-coupon-total .checkout-total .single-total.total-payable {
            border-top: 1px solid #f0f0f0;
        }

        .product-cart .checkout-coupon-total .checkout-total .single-total.total-payable .value {
            font-weight: 500;
        }

        .product-cart .checkout-coupon-total.checkout-coupon-total-2 .checkout-total .single-total .price {
            width: auto;
        }
    </style>
@endsection

@section('main')
    <main id="main" class="main d-flex flex-column justify-content-center">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="text-black fw-bold mb-0">Order Details: #Order-78414</h3>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row g-3 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
                <div class="col">
                    <div class="alert-success alert mb-0">
                        <div class="d-flex align-items-center">
                            <div class="avatar rounded no-thumbnail bg-success text-light"><i
                                    class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i></div>
                            <div class="flex-fill ms-3 text-truncate">
                                <div class="h6 mb-0">Order Created at</div>
                                <span class="small">16/03/2021 at 04:23 PM</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="alert-danger alert mb-0">
                        <div class="d-flex align-items-center">
                            <div class="avatar rounded no-thumbnail bg-danger text-light"><i class="fa fa-user fa-lg"
                                    aria-hidden="true"></i></div>
                            <div class="flex-fill ms-3 text-truncate">
                                <div class="h6 mb-0">Name</div>
                                <span class="small">Gabrielle</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="alert-warning alert mb-0">
                        <div class="d-flex align-items-center">
                            <div class="avatar rounded no-thumbnail bg-warning text-light"><i class="fa fa-envelope fa-lg"
                                    aria-hidden="true"></i></div>
                            <div class="flex-fill ms-3 text-truncate">
                                <div class="h6 mb-0">Email</div>
                                <span class="small">gabrielle.db@gmail.com</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="alert-info alert mb-0">
                        <div class="d-flex align-items-center">
                            <div class="avatar rounded no-thumbnail bg-info text-light"><i class="fa fa-phone-square fa-lg"
                                    aria-hidden="true"></i></div>
                            <div class="flex-fill ms-3 text-truncate">
                                <div class="h6 mb-0">Contact No</div>
                                <span class="small">202-906-12354</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row g-3 mb-3 row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3 row-cols-xxl-3 row-deck">
                <div class="col">
                    <div class="card auth-detailblock">
                        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold ">Delivery Address</h6>
                            <a href="#" class="text-muted">Edit</a>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label col-6 col-sm-5">Block Number:</label>
                                    <span><strong>A-510</strong></span>
                                </div>
                                <div class="col-12">
                                    <label class="form-label col-6 col-sm-5">Address:</label>
                                    <span><strong>81 Fulton London</strong></span>
                                </div>
                                <div class="col-12">
                                    <label class="form-label col-6 col-sm-5">Pincode:</label>
                                    <span><strong>385467</strong></span>
                                </div>
                                <div class="col-12">
                                    <label class="form-label col-6 col-sm-5">Phone:</label>
                                    <span><strong>202-458-4568</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold ">Billing Address</h6>
                            <a href="#" class="text-muted">Edit</a>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label col-6 col-sm-5">Block Number:</label>
                                    <span><strong>A-510</strong></span>
                                </div>
                                <div class="col-12">
                                    <label class="form-label col-6 col-sm-5">Address:</label>
                                    <span><strong>81 Fulton London</strong></span>
                                </div>
                                <div class="col-12">
                                    <label class="form-label col-6 col-sm-5">Pincode:</label>
                                    <span><strong>385467</strong></span>
                                </div>
                                <div class="col-12">
                                    <label class="form-label col-6 col-sm-5">Phone:</label>
                                    <span><strong>202-458-4568</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold ">Invoice Deatil</h6>
                            <a href="#" class="text-muted">Download</a>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label col-6 col-sm-5">Number:</label>
                                    <span><strong>#78414</strong></span>
                                </div>
                                <div class="col-12">
                                    <label class="form-label col-6 col-sm-5">Seller GST :</label>
                                    <span><strong>AFQWEPX17390VJ</strong></span>
                                </div>
                                <div class="col-12">
                                    <label class="form-label col-6 col-sm-5">Purchase GST :</label>
                                    <span><strong>NVFQWEPX1730VJ</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row g-3 mb-3">
                <div class="col-xl-12 col-xxl-8">
                    <div class="card">
                        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold ">Order Summary</h6>
                        </div>
                        <div class="card-body">
                            <div class="product-cart">
                                <div class="checkout-table table-responsive" style="overflow: hidden">
                                    <div id="myCartTable_wrapper">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="myCartTable" class="table align-middle" style="width: 100%;">
                                                    <thead>
                                                        <tr role="row">
                                                            <th>
                                                                Product Image
                                                            </th>
                                                            <th>
                                                                Product Name
                                                            </th>
                                                            <th>
                                                                Quantity
                                                            </th>
                                                            <th>
                                                                Price
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr role="row" class="odd">
                                                            <td>
                                                                <img src="assets/images/product/product-1.jpg"
                                                                    class="avatar rounded lg" alt="Product">
                                                            </td>
                                                            <td>
                                                                <h6 class="title">Oculus VR <span
                                                                        class="d-block fs-6 text-primary">Pr-1204</span>
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                1
                                                            </td>
                                                            <td>
                                                                <p class="price">$149.00</p>
                                                            </td>
                                                        </tr>
                                                        <tr role="row" class="even">
                                                            <td>
                                                                <img src="assets/images/product/product-2.jpg"
                                                                    class="avatar rounded lg" alt="Product">
                                                            </td>
                                                            <td>
                                                                <h6 class="title">Wall Clock <span
                                                                        class="d-block fs-6 text-primary">Pr-1004</span>
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                1
                                                            </td>
                                                            <td>
                                                                <p class="price">$399.00</p>
                                                            </td>
                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td>
                                                                <img src="assets/images/product/product-3.jpg"
                                                                    class="avatar rounded lg" alt="Product">
                                                            </td>
                                                            <td>
                                                                <h6 class="title">Note Diaries <span
                                                                        class="d-block fs-6 text-primary">Pr-1224</span>
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                1
                                                            </td>
                                                            <td>
                                                                <p class="price">$149.00</p>
                                                            </td>
                                                        </tr>
                                                        <tr role="row" class="even">
                                                            <td>
                                                                <img src="assets/images/product/product-4.jpg"
                                                                    class="avatar rounded lg" alt="Product">
                                                            </td>
                                                            <td>
                                                                <h6 class="title">Flower Port <span
                                                                        class="d-block fs-6 text-primary">Pr-1414</span>
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                1
                                                            </td>
                                                            <td>
                                                                <p class="price">$399.00</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div
                                    class="checkout-coupon-total checkout-coupon-total-2 d-flex flex-wrap justify-content-end">
                                    <div class="checkout-total">
                                        <div class="single-total">
                                            <p class="value">Subotal Price:</p>
                                            <p class="price">$1096.00</p>
                                        </div>
                                        <div class="single-total">
                                            <p class="value">Shipping Cost (+):</p>
                                            <p class="price">$12.00</p>
                                        </div>
                                        <div class="single-total">
                                            <p class="value">Discount (-):</p>
                                            <p class="price">$10.00</p>
                                        </div>
                                        <div class="single-total">
                                            <p class="value">Tax(18%):</p>
                                            <p class="price">$198.00</p>
                                        </div>
                                        <div class="single-total total-payable">
                                            <p class="value">Total Payable:</p>
                                            <p class="price">$1296.00</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-xxl-4">
                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold ">Status Orders</h6>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12">
                                        <label class="form-label">Order ID</label>
                                        <input type="text" class="form-control" value="78414">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Order Status</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option value="1">Progress</option>
                                            <option value="2">Completed</option>
                                            <option selected="" value="3">Pending</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Quantity</label>
                                        <input type="text" class="form-control" value="4">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Order Transection</label>
                                        <select class="form-select" aria-label="Transection">
                                            <option value="1">Completed</option>
                                            <option value="2">Fail</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="comment" class="form-label">Comment</label>
                                        <textarea class="form-control" id="comment" rows="4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</textarea>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary mt-4 text-uppercase">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- Row end  -->
        </div>

    </main>
@endsection
@section('script')
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#myCartTable').DataTable({
                order: [],
                paging: false,
                info: false
            });
        });
    </script>
@endsection
