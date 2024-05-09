<div class="row m-0">
    <div class="col-lg-3 p-1">
        <input type="text" name="variant[{{$index}}][data][{{$count}}][size]" required class="form-control size" placeholder="Size">
    </div>
    <div class="col-lg-3 p-1">
        <input name="variant[{{$index}}][data][{{$count}}][quantity]" type="text" class="form-control quantity" required placeholder="Số lượng">
    </div>
    <div class="col-lg-2 p-1">
        <button type="button" class="btn btn-danger btn-clear-size">
            <i class="bi bi-trash"></i> Xóa</button>
    </div>
</div>
