var swiper = new Swiper(".swiperImageSmall", {
  spaceBetween: 10,
  slidesPerView: 4,
  freeMode: true,
  watchSlidesProgress: true,
});
var swiper2 = new Swiper(".swiperImageBig", {
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: swiper,
  },
});
var swiper = new Swiper(".swiperTechnilogy", {
  spaceBetween: 10,
  slidesPerView: 3,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
var swiper = new Swiper(".swiperLike", {
  spaceBetween: 20,
  slidesPerView: 3.5,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

$(document).ready(function () {
  $("#lightgallery").lightGallery();
});

const stars = document.querySelectorAll(".item-star-sp");

stars.forEach((star, index) => {
  star.addEventListener("click", () => {
    for (let i = 0; i <= index; i++) {
      stars[i].classList.add("star-active");
    }

    for (let i = index + 1; i < stars.length; i++) {
      stars[i].classList.remove("star-active");
    }
  });

  star.addEventListener("mouseenter", () => {
    for (let i = 0; i <= index; i++) {
      stars[i].classList.add("star-active");
    }
  });

  star.addEventListener("mouseleave", () => {
    stars.forEach((star) => {
      star.classList.remove("star-active");
    });
  });
});
