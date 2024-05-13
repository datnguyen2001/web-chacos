document.addEventListener("DOMContentLoaded", function () {
  var headerBottoms = document.querySelectorAll(".header-bottom");
    if (headerBottoms.length > 0) {
        var currentIndex = 0;
        headerBottoms[currentIndex].classList.add("header-bottom-active");
        var interval = setInterval(function () {
            headerBottoms[currentIndex].classList.remove("header-bottom-active");
            currentIndex++;
            if (currentIndex === headerBottoms.length) {
                currentIndex = 0;
            }
            headerBottoms[currentIndex].classList.add("header-bottom-active");
        }, 5000);
    }
  var overlay = document.getElementById("overlay-search");
  var searchBoxFocus = document.getElementById("search-box-focus");
  var searchInput = document.getElementById("searchInputs");

  searchInput.addEventListener("focus", function () {
    event.preventDefault();
    overlay.style.display = "block";
    searchBoxFocus.style.display = "block";
    document.body.style.overflow = "hidden";
  });

  overlay.addEventListener("click", function () {
    overlay.style.display = "none";
    searchBoxFocus.style.display = "none";
    document.body.style.overflow = "";
  });

  for (let i = 1; i <= 10; i++) {
    const boxItemSmall = document.querySelector(`.box-item-small-${i}`);
    const menuBig = document.querySelector(`.menu-big-${i}`);
    if (boxItemSmall) {
      boxItemSmall.addEventListener("mouseover", function () {
        menuBig.classList.add("border-header-nav");
      });

      boxItemSmall.addEventListener("mouseout", function () {
        menuBig.classList.remove("border-header-nav");
      });
    }
  }
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function toggleWishlist(element) {
    var wishlist = element.parentElement.querySelector('.box-wishlist');
    wishlist.style.display = "flex";
}

function hideWishlist(element) {
    var wishlist = element.parentElement.querySelector('.box-wishlist');
    wishlist.style.display = "none";
}

function toggleHeart(heart) {
    $.ajax({
        url: window.location.origin + '/save-wish',
        data: {'product_id':heart.getAttribute('data-value')},
        type: 'post',
        dataType: 'json',
        success: function (data) {
            if (data.status) {
                if (heart.src.includes('heart-solid.svg')) {
                    heart.src = window.location.origin + '/assets/image/heart.svg';
                } else {
                    heart.src = window.location.origin + '/assets/image/heart-solid.svg';
                }
            }else {
                toastr.error(data.msg);
            }
        }
    })
}
