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
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
    breakpoints: {
        992: {
            slidesPerView: 3,
        },
        768: {
            slidesPerView: 2.5,
        },
        300: {
            slidesPerView: 1.5,
        },
    },
});
var swiper = new Swiper(".swiperLike", {
  spaceBetween: 20,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
    breakpoints: {
        992: {
            slidesPerView: 3.5,
        },
        768: {
            slidesPerView: 2.5,
        },
        300: {
            slidesPerView: 1.5,
        },
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

document
    .getElementById("fileInput")
    .addEventListener("change", function (event) {
        const files = event.target.files;
        const imageContainer = document.getElementById("imageContainer");
        imageContainer.innerHTML = "";
        const maxImages = 8;
        for (let i = 0; i < Math.min(files.length, maxImages); i++) {
            const file = files[i];
            const reader = new FileReader();
            reader.onload = function (e) {
                const imgContainer = document.createElement("div");
                imgContainer.className = "image-preview";

                const img = document.createElement("img");
                img.src = e.target.result;
                img.alt = "Image";

                const removeIcon = document.createElement("span");
                removeIcon.innerHTML = "&#10006;";
                removeIcon.className = "remove-image";
                removeIcon.addEventListener("click", function () {
                    imgContainer.remove();
                });

                imgContainer.appendChild(img);
                imgContainer.appendChild(removeIcon);
                imageContainer.appendChild(imgContainer);
            };

            reader.readAsDataURL(file);
        }
    });

getReview();

function getReview(page) {
    $(".line-see-more").html("");
    let data = {};
    let product_id = $('input[name="product_id"]').val();
    data.product_id = product_id;
    data.page = page;

    $.ajax({
        url: window.location.origin + "/get-review",
        type: "GET",
        data: data,
        success: function (response) {
            if (response.status == true) {
                let reviews = response.data.data;
                let reviewContainer = $(".content-review");
                let lineSeeMore = $(".line-see-more");
                let currentPage = response.data.current_page;

                reviews.forEach(function (review) {
                    let item = $("<div>").addClass("item-content-review");
                    let left = $("<div>").addClass("item-left-review");
                    let item_header = $("<div>").addClass("d-flex align-items-center mb-2");
                    let username = $("<p>").css("font-size", "14px")
                            .css("font-weight", "bold")
                            .css("margin", "0px 15px 0px 0px").text(review.user_name);
                    let starContainer = $("<div>").addClass("product-rate");
                    let starRating = $("<div>").addClass("star-rating").css("--rating", review.star);

                    starContainer.append(starRating);
                    item_header.append(username);
                    item_header.append(starContainer);
                    left.append(item_header);
                    let comment = $("<div>")
                        .addClass("comment")
                        .text(review.content);
                    left.append(comment);

                    let swiperContainer = $("<div>").addClass(
                        "swiper mySwiperComment"
                    );
                    let swiperWrapper = $("<div>").addClass("swiper-wrapper");

                    for (let i = 0; i < review.image.length; i++) {
                        let swiperSlide = $("<div>").addClass("swiper-slide");
                        let img = $("<img>")
                            .attr(
                                "src",
                                `${
                                    window.location.origin +
                                    review.image[i].src
                                }`
                            )
                            .addClass("img-slide-review");
                        swiperSlide.append(img);
                        swiperWrapper.append(swiperSlide);
                    }

                    swiperContainer.append(swiperWrapper);
                    left.append(swiperContainer);
                    item.append(left);
                    reviewContainer.append(item);
                });

                if (reviews.length == 10) {
                    let seeMore = `<span class="btn-see-more-review">See more</span>`;
                    lineSeeMore.append(seeMore);
                }

                $(".btn-see-more-review").on("click", function () {
                    getReview(currentPage + 1);
                });

                var comment = new Swiper(".mySwiperComment", {
                    spaceBetween: 10,
                    breakpoints: {
                        992: {
                            slidesPerView: 5,
                        },
                        768: {
                            slidesPerView: 4,
                        },
                        300: {
                            slidesPerView: 3,
                        },
                    },
                });
            }
        },
        error: function (xhr, status, error) {},
    });
}
