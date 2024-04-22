var hoverEffectActive = true;
var prefersReducedMotion = window.matchMedia(
  "(prefers-reduced-motion: reduce)"
).matches;
var mql = window.matchMedia("(max-width: 640px)");
var isMobile = mql.matches;
var animations = [];

mql.addListener(function (e) {
  isMobile = e.matches;
  if (isMobile) {
    hoverEffectActive = false;
    animations.forEach(function (animation) {
      animation.cancel();
    });
    animations = [];
  } else {
    hoverEffectActive = true;
    if (!prefersReducedMotion) {
      hoverEffect();
    }
  }
});
function hoverEffect() {
  if (prefersReducedMotion || isMobile) return;

  var elements = document.querySelectorAll(".parallax-wrap .lax .hover-loop");
  if (!elements.length) {
    console.error("Elements not found");
    return;
  }

  var keyframes = [
    { transform: "translate3D(0, 0, 0)" },
    { transform: "translate3D(1em, 0, 0)" },
    { transform: "translate3D(1em, 1em, 0)" },
    { transform: "translate3D(0, 1em, 0)" },
    { transform: "translate3D(0, 0, 0)" },
  ];

  elements.forEach((element, index) => {
    var timing = {
      duration: 8000,
      iterations: Infinity,
      delay: index * 1000,
      easing: "linear",
    };

    element.style.willChange = "transform";

    var animation = element.animate(keyframes, timing);
    animations.push(animation);
  });
}

function parallax(event) {
  if (prefersReducedMotion || isMobile) return;

  const homeCardsSection = document.getElementById("home-cards");
  const shifts = homeCardsSection.querySelectorAll(".parallax-wrap .lax");

  if (homeCardsSection.contains(event.target)) {
    const rect = homeCardsSection.getBoundingClientRect();

    shifts.forEach((shift) => {
      const position = shift.getAttribute("value");

      const x = ((event.clientX - window.innerWidth / 2) * position) / 90;
      const y = ((event.clientY - window.innerHeight / 2) * position) / 60;

      shift.style.transform = `translateX(${x}px) translateY(${y}px) `;
    });
  }
}
document.addEventListener("mousemove", function (event) {
  parallax(event);
  if (hoverEffectActive) {
    hoverEffect();
  }
});

window.onload = function () {
  const homeCards = document.getElementById("home-cards");

  homeCards.addEventListener("mouseenter", function () {
    if (!isMobile) {
      hoverEffectActive = true;
    }
  });

  homeCards.addEventListener("mouseleave", function () {
    hoverEffectActive = false;
  });

  if (!prefersReducedMotion && !isMobile) {
    hoverEffect();
  }
};

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
  spaceBetween: 30,
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
