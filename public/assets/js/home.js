var swiper = new Swiper(".bannerSwiper", {
  pagination: {
    el: ".swiper-pagination",
  },
  autoplay: {
    delay: 5000,
  },
});
var swiper = new Swiper(".productSwiper", {
  slidesPerView: "auto",
  spaceBetween: 15,
  freeMode: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
  },
  breakpoints: {
    992: {
      slidesPerView: 5.5,
    },
    768: {
      slidesPerView: 4,
    },
    300: {
      slidesPerView: 1.5,
      spaceBetween: 20,
    },
  },
});
var swiper = new Swiper(".favoritesSwiper", {
  spaceBetween: 30,
  autoplay: {
    delay: 5000,
  },
  breakpoints: {
    768: {
      slidesPerView: 2.7,
      navigation: false,
    },
    300: {
      slidesPerView: 2,
      spaceBetween: 20,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    },
  },
});
var swiper = new Swiper(".photo-library1", {
  slidesPerView: 9,
  spaceBetween: 10,
  autoplay: {
    delay: 2000,
  },
  speed: 2000,
  breakpoints: {
    992: {
      slidesPerView: 9,
    },
    768: {
      slidesPerView: 4,
    },
    300: {
      slidesPerView: 2,
    },
  },
});
var swiper = new Swiper(".photo-library2", {
  slidesPerView: 9,
  spaceBetween: 10,
  autoplay: {
    delay: 2500,
  },
  speed: 2000,
  breakpoints: {
    992: {
      slidesPerView: 9,
    },
    768: {
      slidesPerView: 4,
    },
    300: {
      slidesPerView: 2,
    },
  },
});
var swiper = new Swiper(".photo-library3", {
  slidesPerView: 9,
  spaceBetween: 10,
  autoplay: {
    delay: 3000,
  },
  speed: 2000,
  breakpoints: {
    992: {
      slidesPerView: 9,
    },
    768: {
      slidesPerView: 4,
    },
    300: {
      slidesPerView: 2,
    },
  },
});
