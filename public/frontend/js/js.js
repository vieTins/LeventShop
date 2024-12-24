/* Scroll */

window.onscroll = function () {
    showProduct();
    showTags(500, 3000);
};

function showProduct() {
    if (
        document.body.scrollTop > 30 ||
        document.documentElement.scrollTop > 30
    ) {
        document
            .getElementById("header__navbar-scroll")
            .classList.add("scroll__change-color");
        document
            .querySelector(".app__container-product")
            .classList.add("scroll__show-product");
        document
            .querySelector(".header-mobile-tablet")
            .classList.add("scroll__change-color-tablet");
    } else {
        document
            .getElementById("header__navbar-scroll")
            .classList.remove("scroll__change-color");
        document
            .querySelector(".header-mobile-tablet")
            .classList.remove("scroll__change-color-tablet");
    }

    if (
        document.body.scrollTop > 590 ||
        document.documentElement.scrollTop > 590
    ) {
        document
            .querySelector(".app__container-selling")
            .classList.add("scroll__show-product");
    }

    if (
        document.body.scrollTop > 1700 ||
        document.documentElement.scrollTop > 1700
    ) {
        document
            .querySelector(".container__trending")
            .classList.add("scroll__show-product");
    }

    if (
        document.body.scrollTop > 2350 ||
        document.documentElement.scrollTop > 2350
    ) {
        document
            .querySelector(".container__visit")
            .classList.add("scroll__show-product");
    }
}
function showTags(delay = 500, duration = 3000) {
    var notification = document.getElementById("notification");
    setTimeout(function () {
        notification.classList.add("show");
        notification.classList.remove("hidden-tags");
        setTimeout(function () {
            notification.classList.remove("show");
        }, duration);
    }, delay);
}
/* Show subnav */

/* Main */
function mouseOverMain() {
    document
        .querySelector(".header__navbar-main")
        .classList.add("header__navbar-item-subnav-show");
}

function mouseOutMain() {
    document
        .querySelector(".header__navbar-main")
        .classList.remove("header__navbar-item-subnav-show");
}

/* Shop */
function mouseOverShop() {
    document
        .querySelector(".header__navbar-shop")
        .classList.add("header__navbar-item-subnav-show");
}

function mouseOutShop() {
    document
        .querySelector(".header__navbar-shop")
        .classList.remove("header__navbar-item-subnav-show");
}

/* Product */
function mouseOverProduct() {
    document
        .querySelector(".header__navbar-product")
        .classList.add("header__navbar-item-subnav-show");
}

function mouseOutProduct() {
    document
        .querySelector(".header__navbar-product")
        .classList.remove("header__navbar-item-subnav-show");
}

/* Pages */
function mouseOverPages() {
    document
        .querySelector(".header__navbar-pages")
        .classList.add("header__navbar-item-subnav-show");
}

function mouseOutPages() {
    document
        .querySelector(".header__navbar-pages")
        .classList.remove("header__navbar-item-subnav-show");
}

/* Journal */
function mouseOverJournal() {
    document
        .querySelector(".header__navbar-journal")
        .classList.add("header__navbar-item-subnav-show");
}

function mouseOutJournal() {
    document
        .querySelector(".header__navbar-journal")
        .classList.remove("header__navbar-item-subnav-show");
}

/* Jquery*/
$(document).ready(function () {
    $(".sajid-1").owlCarousel({
        margin: 0,
        loop: true,
        items: 1,
        nav: false,
        navSpeed: 800,
        autoheight: true,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        smartSpeed: 800,
    });

    var owl = $(".sajid-1");
    owl.owlCarousel();
    $(".owl-next-one").click(function () {
        owl.trigger("next.owl.carousel", [700]);
    });
    $(".owl-prev-one").click(function () {
        owl.trigger("prev.owl.carousel", [700]);
    });

    /* Slide two */
    $(".sajid-2").owlCarousel({
        margin: 0,
        loop: true,
        items: 1,
        dots: false,
        dotsData: true,
        nav: false,
        navSpeed: 800,
        autoheight: true,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        smartSpeed: 800,
        responsive: {
            0: {
                items: 2,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 4,
            },
        },
    });

    var owlTwo = $(".sajid-2");
    owlTwo.owlCarousel();
    $(".owl-next-two").click(function () {
        owlTwo.trigger("next.owl.carousel", [700]);
    });
    $(".owl-prev-two").click(function () {
        owlTwo.trigger("prev.owl.carousel", [700]);
    });

    $(".owl-dot-two").click(function () {
        owlTwo.trigger("to.owl.carousel", [$(this).index(), 1000]);
    });

    /* BackTop */

    $(window).scroll(function () {
        if ($(this).scrollTop()) {
            $("#backtop").fadeIn();
        } else {
            $("#backtop").fadeOut();
        }
    });
    $("#backtop").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 800);
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const headers = document.querySelectorAll(".collapsible-header");

    headers.forEach((header) => {
        header.addEventListener("click", () => {
            header.classList.toggle("active");
            const content = header.nextElementSibling;

            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    });
});

window.addEventListener("load", () => {
    const loader = document.querySelector(".preloader");
    loader.classList.add("preloader-hidden");
    loader.addEventListener("transitioned", () => {
        document.body.removeChild("preloader");
    });
});
