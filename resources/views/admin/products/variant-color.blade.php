<div class="mt-3 border-bottom data-variant pb-3">
    <div class="row m-0">
        <div class="col-lg-3 p-1">
            <input type="text" name="variant[{{$count}}][name]" class="form-control name" placeholder="Tên màu sản phẩm"
                   required>
        </div>
        <div class="col-lg-2 p-1">
            <input type="file" name="variant[{{$count}}][image]" class="form-control image" accept="image/*"
                   placeholder="Ảnh màu sản phẩm" required>
        </div>
        <div class="col-lg-2 p-1">
            <input type="text" name="variant[{{$count}}][price]" class="form-control price format-currency"
                   placeholder="Giá bán" required>
        </div>
        <div class="col-lg-2 p-1">
            <input type="text" name="variant[{{$count}}][promotional_price]" class="form-control promotional_price format-currency" value="0"
                   placeholder="Giá bán khuyến mãi" required>
        </div>
        <div class="col-lg-2 p-1">
            <button type="button" class="btn btn-success btn-add-size form-control"><i class="bi bi-plus-lg"></i> Thêm
                Size
            </button>
        </div>
        <div class="col-lg-1 p-1">
            <button type="button" class="btn btn-danger btn-clear-color">
                <i class="bi bi-trash"></i> Xóa
            </button>
        </div>
    </div>
    <div class="list-size">
        <div class="row m-0">
            <div class="col-lg-3 p-1">
                <input type="text" name="variant[{{$count}}][data][0][size]" class="form-control size"
                       placeholder="Kích cỡ" required>
            </div>
            <div class="col-lg-3 p-1">
                <input name="variant[{{$count}}][data][0][quantity]" type="text" class="form-control quantity"
                       placeholder="Số lượng">
            </div>
        </div>
    </div>
</div>
