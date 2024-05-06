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

// getReview();
// function getReview(searchKeyword, selectedStar, selectedAge, page) {
//     $(".line-see-more").html("");
//     let data = {};
//     let product_id = $('input[name="product_id"]').val();
//     data.product_id = product_id;
//     data.page = page;
//     if (searchKeyword) {
//         data.keyword = searchKeyword;
//     }
//     if (selectedStar) {
//         data.star = selectedStar;
//     }
//     if (selectedAge) {
//         data.age = selectedAge;
//     }
//
//     $.ajax({
//         url: window.location.origin + "/get-review",
//         type: "GET",
//         data: data,
//         success: function (response) {
//             if (response.error == 0) {
//                 let reviews = response.data.data;
//                 let reviewContainer = $(".content-review");
//                 let lineSeeMore = $(".line-see-more");
//                 let currentPage = response.data.current_page;
//
//                 reviews.forEach(function (review) {
//                     let item = $("<div>").addClass("item-content-review");
//                     let left = $("<div>").addClass("item-left-review");
//                     let stars = $("<div>").addClass(
//                         "d-flex align-items-center"
//                     );
//
//                     for (let i = 0; i < 5; i++) {
//                         if (i < review.star) {
//                             let starImg = $("<img>")
//                                 .attr(
//                                     "src",
//                                     `${window.location.origin}/assets/images/star.png`
//                                 )
//                                 .addClass("icon-rate-name");
//                             stars.append(starImg);
//                         } else {
//                             let starImg = $("<img>")
//                                 .attr(
//                                     "src",
//                                     `${window.location.origin}/assets/images/Icon-star.png`
//                                 )
//                                 .addClass("icon-rate-name");
//                             stars.append(starImg);
//                         }
//                     }
//
//                     stars.append(
//                         $("<span>").text("Very good").css("font-size", "14px")
//                     );
//                     left.append(stars);
//
//                     let comment = $("<div>")
//                         .addClass("comment")
//                         .text(review.content);
//                     left.append(comment);
//
//                     let swiperContainer = $("<div>").addClass(
//                         "swiper mySwiperComment"
//                     );
//                     let swiperWrapper = $("<div>").addClass("swiper-wrapper");
//
//                     for (let i = 0; i < review.image.length; i++) {
//                         let swiperSlide = $("<div>").addClass("swiper-slide");
//                         let img = $("<img>")
//                             .attr(
//                                 "src",
//                                 `${
//                                     window.location.origin +
//                                     "/" +
//                                     review.image[i].src
//                                 }`
//                             )
//                             .addClass("img-slide-review");
//                         swiperSlide.append(img);
//                         swiperWrapper.append(swiperSlide);
//                     }
//
//                     swiperContainer.append(swiperWrapper);
//                     left.append(swiperContainer);
//
//                     let accordion = $("<div>").addClass(
//                         "accordion accordion-flush"
//                     );
//                     let accordionItem = $("<div>").addClass("accordion-item");
//                     let accordionHeader = $("<h2>")
//                         .addClass("accordion-header")
//                         .attr("id", `flush-heading${review.id}`);
//                     let accordionButton = $("<p>")
//                         .addClass("accordion-button collapsed feedback-more")
//                         .attr("data-bs-toggle", "collapse")
//                         .attr("data-bs-target", `#flush-collapse${review.id}`)
//                         .attr("aria-expanded", "false")
//                         .attr("aria-controls", `flush-collapse${review.id}`)
//                         .text(`Feedback (${review.feedback.length})`);
//
//                     let accordionCollapse = $("<div>")
//                         .addClass("accordion-collapse collapse")
//                         .attr("id", `flush-collapse${review.id}`)
//                         .attr("aria-labelledby", `flush-heading${review.id}`)
//                         .attr("data-bs-parent", "#accordionFlushExample");
//
//                     let accordionBody = $("<div>").addClass("accordion-body");
//                     let contentFeedback =
//                         $("<div>").addClass("content-feedback");
//
//                     review.feedback.forEach(function (feedbackItem) {
//                         let itemFeedback = $("<div>").addClass("item-feedback");
//                         let nameUserFeedback = $("<p>")
//                             .addClass("name_user_feedback")
//                             .text(feedbackItem.name);
//                         let contentUserFeedback = $("<div>")
//                             .addClass("content-user-feedback")
//                             .text(feedbackItem.content);
//
//                         itemFeedback.append(
//                             nameUserFeedback,
//                             contentUserFeedback
//                         );
//                         contentFeedback.append(itemFeedback);
//                     });
//
//                     let feedbackForm = $("<form>")
//                         .attr(
//                             "action",
//                             `${window.location.origin}/save-review-feedback`
//                         )
//                         .attr("method", "post")
//                         .attr("enctype", "multipart/form-data");
//
//                     feedbackForm.append(
//                         $("<input>")
//                             .attr("type", "hidden")
//                             .attr("name", "_token")
//                             .val(csrfToken),
//                         $("<input>")
//                             .attr("type", "hidden")
//                             .attr("name", "review_id")
//                             .val(review.id),
//                         $("<input>")
//                             .attr("type", "text")
//                             .addClass("input-feedback")
//                             .attr("name", "name")
//                             .attr("maxlength", "255")
//                             .attr("placeholder", "Full name"),
//                         $("<textarea>")
//                             .attr("name", "content")
//                             .addClass("input-feedback")
//                             .attr("rows", "2")
//                             .attr("placeholder", "Content"),
//                         $("<div>")
//                             .addClass("line-send-feedback")
//                             .append(
//                                 $("<button>")
//                                     .attr("type", "submit")
//                                     .addClass("btn-send-feedback")
//                                     .text("Send")
//                             )
//                     );
//
//                     accordionBody.append(contentFeedback, feedbackForm);
//                     accordionCollapse.append(accordionBody);
//                     accordionHeader.append(accordionButton);
//                     accordionItem.append(accordionHeader, accordionCollapse);
//                     accordion.append(accordionItem);
//
//                     left.append(accordion);
//
//                     let right = $("<div>").addClass("item-right-review");
//                     let title = $("<p>")
//                         .css("font-size", "13px")
//                         .css("margin-bottom", "5px")
//                         .text(review.user_name + " This is your review.");
//                     let descriptionText = "";
//                     if (review.type_age == 1) {
//                         descriptionText = "age 10 years old";
//                     } else if (review.type_age == 2) {
//                         descriptionText = "age 20 years old";
//                     } else if (review.type_age == 3) {
//                         descriptionText = "age 30 years old";
//                     } else {
//                         descriptionText = "age Over 40 years old";
//                     }
//                     let description = $("<p>")
//                         .css("font-size", "13px")
//                         .css("margin-bottom", "5px")
//                         .text(descriptionText);
//                     right.append(title, description);
//
//                     item.append(left, right);
//                     reviewContainer.append(item);
//                 });
//
//                 if (reviews.length == 1) {
//                     let seeMore = `<span class="btn-see-more-review">See more</span>`;
//                     lineSeeMore.append(seeMore);
//                 }
//
//                 $(".btn-see-more-review").on("click", function () {
//                     let selectedAge = $(".item-age.active-age").data("age");
//                     let searchKeyword = $('input[name="keySearch"]').val();
//                     let selectedStar = $(
//                         ".dropdown-menu input[type='radio']:checked"
//                     ).val();
//                     getReview(
//                         searchKeyword,
//                         selectedStar,
//                         selectedAge,
//                         currentPage + 1
//                     );
//                 });
//
//                 var comment = new Swiper(".mySwiperComment", {
//                     spaceBetween: 10,
//                     breakpoints: {
//                         768: {
//                             slidesPerView: 5,
//                         },
//                         300: {
//                             slidesPerView: 3,
//                         },
//                     },
//                 });
//             }
//         },
//         error: function (xhr, status, error) {},
//     });
// }
