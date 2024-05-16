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
        data: {'product_id': heart.getAttribute('data-value')},
        type: 'post',
        dataType: 'json',
        success: function (data) {
            if (data.status) {
                if (heart.src.includes('heart-solid.svg')) {
                    heart.src = window.location.origin + '/assets/image/heart.svg';
                } else {
                    heart.src = window.location.origin + '/assets/image/heart-solid.svg';
                }
            } else {
                toastr.error(data.msg);
            }
        }
    })
}

const searchInput = document.getElementById('searchInputActive');
const searchButton = document.getElementById('searchButton');
const searchSuggestions = document.getElementById('searchSuggestions');
const searchInputMobile = document.getElementById('searchInputActiveMobile');
const searchButtonMobile = document.getElementById('searchButtonMobile');
const searchSuggestionsMobile = document.getElementById('searchSuggestionsMobile');

function loadSearchKeywords() {
    const keywords = JSON.parse(localStorage.getItem('searchKeywords')) || [];
    searchSuggestions.innerHTML = '';
    searchSuggestionsMobile.innerHTML = '';
    keywords.forEach(keyword => {
        const link = document.createElement('a');
        link.href = window.location.origin + `/${keyword}`;
        link.className = 'item-search-suggest';
        link.textContent = keyword;
        searchSuggestions.appendChild(link);
        const link_mobile = document.createElement('a');
        link_mobile.href = window.location.origin + `/${keyword}`;
        link_mobile.className = 'item-search-hot';
        link_mobile.textContent = keyword;
        searchSuggestionsMobile.appendChild(link_mobile);
    });
}

function saveSearchKeyword(keyword) {
    let keywords = JSON.parse(localStorage.getItem('searchKeywords')) || [];
    if (keywords.includes(keyword)) {
        keywords = keywords.filter(item => item !== keyword);
    }
    keywords.push(keyword);
    if (keywords.length > 5) {
        keywords = keywords.slice(-5);
    }
    localStorage.setItem('searchKeywords', JSON.stringify(keywords));
}

searchButton.addEventListener('click', function () {
    const keyword = searchInput.value.trim();
    if (keyword) {
        saveSearchKeyword(keyword);
        loadSearchKeywords();
    }
});

searchButtonMobile.addEventListener('click', function () {
    const keyword = searchInputMobile.value.trim();
    if (keyword) {
        saveSearchKeyword(keyword);
        loadSearchKeywords();
    }
});

loadSearchKeywords();

searchInput.addEventListener('keyup', function () {
    const query = searchInput.value.trim();
    if (query) {
        fetchSearchResults(query);
    } else {
        $('.box-content-search-header-left').html('');
    }
});

function fetchSearchResults(query) {
    $.ajax({
        url: window.location.origin +`/key-search?key=${query}`,
        method: 'GET',
        success: function (data) {
            let html = '';
            if (data.data.length > 0){
                for (let i=0;i<data.data.length;i++){
                    const formattedPrice = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(data.data[i].money.promotional_price != 0 ? data.data[i].money.promotional_price : data.data[i].money.price);
                    html += `
                        <a href="${window.location.origin}/chi-tiet-san-pham/${data.data[i].slug}" class="d-flex justify-content-between w-100">
                            <img src="${data.data[i].image}" style="width: 28%;object-fit: cover">
                            <div style="width: 70%">
                                <p class="item-search-suggest mb-0">${data.data[i].name}</p>
                                <span style="font-size: 14px;color: #898989">${formattedPrice}</span>
                            </div>
                        </a>`;
                }
                $('.box-content-search-header-left').html(html);
            }

        },
        error: function (error) {
            console.error('Error fetching search results:', error);
        }
    });
}

searchInputMobile.addEventListener('keyup', function () {
    const query = searchInputMobile.value.trim();
    if (query) {
        fetchSearchResultsMobile(query);
    } else {
        $('.box-content-search-header-left').html('');
    }
});

function fetchSearchResultsMobile(query) {
    $.ajax({
        url: window.location.origin +`/key-search?key=${query}`,
        method: 'GET',
        success: function (data) {
            let html = '';
            if (data.data.length > 0){
                for (let i=0;i<data.data.length;i++){
                    const formattedPrice = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(data.data[i].money.promotional_price != 0 ? data.data[i].money.promotional_price : data.data[i].money.price);
                    html += `
                        <a href="${window.location.origin}/chi-tiet-san-pham/${data.data[i].slug}" class="d-flex justify-content-between w-100">
                            <img src="${data.data[i].image}" style="width: 30%;object-fit: cover">
                            <div style="width: 67%">
                                <p class="item-search-hot mb-0">${data.data[i].name}</p>
                                <span style="font-size: 13px;color: #898989">${formattedPrice}</span>
                            </div>
                        </a>`;
                }
                $('.box-content-search-header-mobile').html(html);
            }

        },
        error: function (error) {
            console.error('Error fetching search results:', error);
        }
    });
}
