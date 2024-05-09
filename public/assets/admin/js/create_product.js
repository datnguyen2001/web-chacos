$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".selector__image").click(function () {
        $('input[name="file_product"]').trigger("click");
    });
    $('input[name="file_product"]').change(function () {
        readURL(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                if (input.files[0].type == 'video/mp4') {
                    let video = '<video class="w-100 h-100" style="object-fit: cover;"><source src=" ' + e.target.result + ' " type="' + input.files[0].type + '"></video>';
                    $(".selector__image").html(video);
                } else {
                    let img = '<img src="' + e.target.result + '" class="w-100 h-100" style="object-fit: cover;">';
                    $(".selector__image").html(img);
                }
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).on("change", ".input_list_image", function () {
        let formData = new FormData();
        let totalfiles = document.getElementById('files').files.length;
        for (let index = 0; index < totalfiles; index++) {
            formData.append("files[]", document.getElementById('files').files[index]);
        }
        $.ajax({
            url: window.location.origin + '/api/upload/image-invest',
            data: formData,
            type: 'POST',
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.status) {
                    let count = 0;
                    $(".input-files").each(function () {
                        if ($(this).val() === "") {
                            $(this).val(data.files[count++]);
                        } else {
                            console.log($(this).val());
                        }
                    });
                    Object.keys(data.files).map(function (k) {
                        let img = '<img src="' + data.files[k] + '" style="width: 100%; height: 100%; object-fit: cover">' +
                            '<label class="reset-image"><i class="fa fa-times-circle"></i></label>';
                        $(".select_image").eq(k).html(img);
                        setTimeout(function () {
                            $(".data-image").eq(k).removeClass("select_image");
                        }, 300);
                    })
                } else {
                    Swal.fire({
                        title: data.msg,
                        icon: "error",
                        showCancelButton: true,
                        confirmButtonText: "Xác nhận!"
                    });
                }
            }
        });
    });
    // select category
    $('input[name="category"]').click(function () {
        let value = $(this).val();
        $('input[name="category"]').prop("checked", false);
        $(this).prop("checked", true);
        $.ajax({
            url: window.location.origin + '/api/get-children-c2',
            type: 'post',
            dataType: 'json',
            data: {"cate_id": value, "name": "category_children"},
            success: function (data) {
                $("[list_category_children]").html(data.html);
            }
        });
    });

    // add size so
    $(document).on("click", ".btn-add-size", function () {
        let parent = $(this).closest(".data-variant");
        let list_size = parent.find(".list-size");
        console.log(list_size.children())
        let data = {};
        data['count'] = list_size.children().length;
        data['index'] = parent.index();
        $.ajax({
            url: window.location.origin + '/api/variant-size',
            type: 'post',
            data: data,
            dataType: 'json',
            success: function (data) {
                list_size.append(data.html);
            }
        });
    });
    // delete size
    $(document).on("click", ".btn-clear-size", function () {
        let data_parent = $(this).closest(".data-variant");
        let parents = $(this).closest(".row");
        parents.remove();
        let index = data_parent.index();
        let list_size = data_parent.find(".list-size");
        let count = list_size.children().length;
        for (let i = 0; i < count; i++) {
            let size = 'variant[' + index + '][data][' + i + '][size]';
            let quantity = 'variant[' + index + '][data][' + i + '][quantity]';
            list_size.children().eq(i).find(".form-control.size").attr("name", size);
            list_size.children().eq(i).find(".form-control.quantity").attr("name", quantity);
        }
    });
    // add color
    $(document).on("click", ".btn-add-color", function () {
        let parent = $(this).closest(".card-body");
        $.ajax({
            url: window.location.origin + '/api/variant-color',
            type: 'post',
            data: {"count": parent.children().length},
            dataType: 'json',
            success: function (data) {
                parent.append(data.html);
            }
        });
    });
    // delete color
    $(document).on("click", ".btn-clear-color", function () {
        let parents = $(this).closest(".data-variant");
        parents.remove();
        let index = $(".card-body .data-variant").length;
        for (let i = 0; i < index; i++) {
            let name = 'variant[' + i + '][name]';
            let image = 'variant[' + i + '][image]';
            let price = 'variant[' + i + '][price]';
            let promotional_price = 'variant[' + i + '][promotional_price]';
            let select = $(".data-variant").eq(i).find(".form-control.name");
            select.attr("name", name);
            let select_image = $(".data-variant").eq(i).find(".form-control.image");
            select_image.attr("image", image);
            let select_price = $(".data-variant").eq(i).find(".form-control.price");
            select_price.attr("name", price);
            let select_promotional_price = $(".data-variant").eq(i).find(".form-control.promotional_price");
            select_promotional_price.attr("image", promotional_price);
            let list_size = $(".data-variant").eq(i).find(".list-size");
            let count = list_size.children().length;
            for (let j = 0; j < count; j++) {
                let size = 'variant[' + i + '][data][' + j + '][size]';
                let quantity = 'variant[' + i + '][data][' + j + '][quantity]';
                list_size.children().eq(j).find(".form-control.size").attr("name", size);
                list_size.children().eq(j).find(".form-control.quantity").attr("name", quantity);
            }
        }
    });

    $('button.delete__image').confirm({
        title: 'Xác nhận!',
        content: 'Bạn có chắc chắn muốn xóa bản ghi này?',
        buttons: {
            ok: {
                text: 'Xóa',
                btnClass: 'btn-danger',
                action: function(){
                    let data = {};
                    data['id'] = this.$target.attr("value");
                    $.ajax({
                        url: window.location.origin + '/admin/products/delete-img',
                        data: data,
                        dataType: 'json',
                        type: 'post',
                        success: function (data) {
                            if (data.status){
                                location.reload();
                            }
                        }
                    });
                }
            },
            close: {
                text: 'Hủy',
                action: function () {}
            }
        }
    });
    $('a.btn-delete-name').confirm({
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
    $('a.btn-delete-color').confirm({
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

});
