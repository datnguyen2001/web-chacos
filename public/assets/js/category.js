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
