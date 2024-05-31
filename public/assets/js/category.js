var swiper = new Swiper(".categorySwiper", {
  navigation: {
    nextEl: ".next-category",
    prevEl: ".prev-category",
  },
  pagination: {
    el: ".swiper-pagination-category",
  },
  spaceBetween: 20,
  breakpoints: {
    1041: {
      slidesPerView: 4,
    },
    992: {
      slidesPerView: 3,
    },
    768: {
      slidesPerView: 3,
    },
    300: {
      slidesPerView: 2,
    },
  },
});

var swiper = new Swiper(".swiperOptionColor", {
  slidesPerView: 6,
  spaceBetween: 20,
  navigation: {
    nextEl: ".btn-option-color-next",
    prevEl: ".btn-option-color-prev",
  },
  breakpoints: {
    1820: {
      slidesPerView: 6,
    },
    1041: {
      slidesPerView: 5,
    },
    300: {
      slidesPerView: 3,
    },
  },
});

// sp slide
var slideImageSrc;
document
  .querySelectorAll(".slide-col-item-category")
  .forEach(function (itemSpFilterSlide) {
    slideImageSrc = itemSpFilterSlide
      .querySelector(".img-big-slide-sp")
      .getAttribute("src");
    itemSpFilterSlide.addEventListener("mouseenter", function (event) {
      itemSpFilterSlide.querySelector(".link-color").style.display = "none";
      itemSpFilterSlide.querySelector(".box-option-color-style").style.display =
        "block";
    });

    itemSpFilterSlide.addEventListener("mouseleave", function (event) {
      itemSpFilterSlide.querySelector(".link-color").style.display = "flex";
      itemSpFilterSlide.querySelector(".box-option-color-style").style.display =
        "none";
    });
  });

document
  .querySelectorAll(".slide-item-option-style")
  .forEach(function (swiperSlide) {
    swiperSlide.addEventListener("mouseenter", function (event) {
      var itemSpFilter = swiperSlide.closest(".slide-col-item-category");

      itemSpFilter.querySelector(".link-color").style.display = "none";

      itemSpFilter.querySelector(".box-option-color-style").style.display =
        "block";

      var imgOptionColor = swiperSlide.querySelector(".img-option-color");
      var imgBigOption = itemSpFilter.querySelector(".img-big-slide-sp");
      imgBigOption.setAttribute("src", imgOptionColor.getAttribute("src"));
    });

    swiperSlide.addEventListener("mouseleave", function (event) {
      var itemSpFilter = swiperSlide.closest(".slide-col-item-category");
      var imgBigOption = itemSpFilter.querySelector(".img-big-slide-sp");
      imgBigOption.setAttribute("src", slideImageSrc);
    });

    swiperSlide
      .querySelectorAll(".img-option-color")
      .forEach(function (imgOptionColor) {
        imgOptionColor.addEventListener("mouseenter", function (event) {
          var itemSpFilter = swiperSlide.closest(".slide-col-item-category");
          var imgBigOption = itemSpFilter.querySelector(".img-big-option");
          imgBigOption.setAttribute("src", imgOptionColor.getAttribute("src"));
        });
      });
  });

// list sp
var originalImageSrc;
document.querySelectorAll(".item-sp-filter").forEach(function (itemSpFilter) {
  originalImageSrc = itemSpFilter
    .querySelector(".img-big-option")
    .getAttribute("src");
  itemSpFilter.addEventListener("mouseenter", function (event) {
    itemSpFilter.querySelector(".link-color").style.display = "none";
    itemSpFilter.querySelector(".box-option-color-style").style.display =
      "block";
  });

  itemSpFilter.addEventListener("mouseleave", function (event) {
    itemSpFilter.querySelector(".link-color").style.display = "flex";
    itemSpFilter.querySelector(".box-option-color-style").style.display =
      "none";
  });
});

document.querySelectorAll(".swiper-slide").forEach(function (swiperSlide) {
  swiperSlide.addEventListener("mouseenter", function (event) {
    var itemSpFilter = swiperSlide.closest(".item-sp-filter");

    itemSpFilter.querySelector(".link-color").style.display = "none";

    itemSpFilter.querySelector(".box-option-color-style").style.display =
      "block";

    var imgOptionColor = swiperSlide.querySelector(".img-option-color");
    var imgBigOption = itemSpFilter.querySelector(".img-big-option");
    imgBigOption.setAttribute("src", imgOptionColor.getAttribute("src"));
  });

  swiperSlide.addEventListener("mouseleave", function (event) {
    var itemSpFilter = swiperSlide.closest(".item-sp-filter");
    var imgBigOption = itemSpFilter.querySelector(".img-big-option");
    imgBigOption.setAttribute("src", originalImageSrc);
  });

  swiperSlide
    .querySelectorAll(".img-option-color")
    .forEach(function (imgOptionColor) {
      imgOptionColor.addEventListener("mouseenter", function (event) {
        var itemSpFilter = swiperSlide.closest(".item-sp-filter");
        var imgBigOption = itemSpFilter.querySelector(".img-big-option");
        imgBigOption.setAttribute("src", imgOptionColor.getAttribute("src"));
      });
    });
});

$(document).ready(function() {
    $('.input-filter-0').change(function() {
        $('.input-filter-0').not(this).prop('checked', false);
    });
    $('.input-filter-1').change(function() {
        $('.input-filter-1').not(this).prop('checked', false);
    });
    $('.input-filter-2').change(function() {
        $('.input-filter-2').not(this).prop('checked', false);
    });
    $('.input-filter-3').change(function() {
        $('.input-filter-3').not(this).prop('checked', false);
    });

    $('.input-filter-mobile-0').change(function() {
        $('.input-filter-mobile-0').not(this).prop('checked', false);
    });
    $('.input-filter-mobile-1').change(function() {
        $('.input-filter-mobile-1').not(this).prop('checked', false);
    });
    $('.input-filter-mobile-2').change(function() {
        $('.input-filter-mobile-2').not(this).prop('checked', false);
    });
    $('.input-filter-mobile-3').change(function() {
        $('.input-filter-mobile-3').not(this).prop('checked', false);
    });

    let data = {};
    let url = window.location.origin + '/bo-loc';

    $('.sort-select-mobile').change(function () {
        data['key_search'] = $('.key_search').val();
        data['sort'] = $(this).val();
        data['size_name'] = $('.active-filter').data('value');
        $('.type_width:checked').each(function() {
            data['type_width'] = $(this).val();
        });
        $('.style_id:checked').each(function() {
            data['style_name'] = $(this).val();
        });
        $('.color_id:checked').each(function() {
            data['color_id'] = $(this).val();
        });
        $('.price_id:checked').each(function() {
            data['price_id'] = $(this).val();
        });
        filter(data, url);
    });

    $('.sort-select').change(function () {
        data['key_search'] = $('.key_search').val();
        data['sort'] = $(this).val();
        data['size_name'] = $('.active-filter').data('value');
        $('.type_width:checked').each(function() {
            data['type_width'] = $(this).val();
        });
        $('.style_id:checked').each(function() {
            data['style_name'] = $(this).val();
        });
        $('.color_id:checked').each(function() {
            data['color_id'] = $(this).val();
        });
        $('.price_id:checked').each(function() {
            data['price_id'] = $(this).val();
        });
        filter(data, url);
    });

    $('.size-item').click(function() {
        var data = {};
        let number = 1;
        if ($('.sort-select').val()){
            number = $('.sort-select').val();
        }else {
            number = $('.sort-select-mobile').val()
        }
        data['key_search'] = $('.key_search').val();
        data['sort'] = number;
        data['size_name'] = $(this).data('value');
        $('.type_width:checked').each(function() {
            data['type_width'] = $(this).val();
        });
        $('.style_id:checked').each(function() {
            data['style_name'] = $(this).val();
        });
        $('.color_id:checked').each(function() {
            data['color_id'] = $(this).val();
        });
        $('.price_id:checked').each(function() {
            data['price_id'] = $(this).val();
        });
        filter(data, url);
    });

    $('.type_width').change(function() {
        var data = {};
        let number = 1;
        if ($('.sort-select').val()){
            number = $('.sort-select').val();
        }else {
            number = $('.sort-select-mobile').val()
        }
        data['key_search'] = $('.key_search').val();
        data['sort'] = number;
        data['size_name'] = $('.active-filter').data('value');
        $('.type_width:checked').each(function() {
            data['type_width'] = $(this).val();
        });
        $('.style_id:checked').each(function() {
            data['style_name'] = $(this).val();
        });
        $('.color_id:checked').each(function() {
            data['color_id'] = $(this).val();
        });
        $('.price_id:checked').each(function() {
            data['price_id'] = $(this).val();
        });
        filter(data, url);
    });

    $('.style_id').change(function() {
        var data = {};
        let number = 1;
        if ($('.sort-select').val()){
            number = $('.sort-select').val();
        }else {
            number = $('.sort-select-mobile').val()
        }
        data['key_search'] = $('.key_search').val();
        data['sort'] = number;
        data['size_name'] = $('.active-filter').data('value');
        $('.type_width:checked').each(function() {
            data['type_width'] = $(this).val();
        });
        $('.style_id:checked').each(function() {
            data['style_name'] = $(this).val();
        });
        $('.color_id:checked').each(function() {
            data['color_id'] = $(this).val();
        });
        $('.price_id:checked').each(function() {
            data['price_id'] = $(this).val();
        });
        filter(data, url);
    });

    $('.color_id').change(function() {
        var data = {};
        let number = 1;
        if ($('.sort-select').val()){
            number = $('.sort-select').val();
        }else {
            number = $('.sort-select-mobile').val()
        }
        data['key_search'] = $('.key_search').val();
        data['sort'] = number;
        data['size_name'] = $('.active-filter').data('value');
        $('.type_width:checked').each(function() {
            data['type_width'] = $(this).val();
        });
        $('.style_id:checked').each(function() {
            data['style_name'] = $(this).val();
        });
        $('.color_id:checked').each(function() {
            data['color_id'] = $(this).val();
        });
        $('.price_id:checked').each(function() {
            data['price_id'] = $(this).val();
        });
        filter(data, url);
    });

    $('.price_id').change(function() {
        var data = {};
        let number = 1;
        if ($('.sort-select').val()){
            number = $('.sort-select').val();
        }else {
            number = $('.sort-select-mobile').val()
        }
        data['key_search'] = $('.key_search').val();
        data['sort'] = number;
        data['size_name'] = $('.active-filter').data('value');
        $('.type_width:checked').each(function() {
            data['type_width'] = $(this).val();
        });
        $('.style_id:checked').each(function() {
            data['style_name'] = $(this).val();
        });
        $('.color_id:checked').each(function() {
            data['color_id'] = $(this).val();
        });
        $('.price_id:checked').each(function() {
            data['price_id'] = $(this).val();
        });
        filter(data, url);
    });

    function filter(data, url) {
        $.ajax({
            url: url,
            data: data,
            type: 'post',
            dataType: 'json',
            success: function (data) {
                if (data.status) {
                    $(".box_sp_filter").html(data.prop);
                    $('.count-cate-sp').html(data.count_data+" SẢN PHẨM");
                    $('.count-filter-sp').html("( "+data.count_data+" sản phẩm )");
                }
            }
        })
    }
});
