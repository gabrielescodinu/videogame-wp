import $ from '../../node_modules/jquery';
import AOS from '../../node_modules/aos';
import Alpine from 'alpinejs'
import Swiper from '../../node_modules/swiper/swiper-bundle.esm';

// init page
window.jQuery = $;
window.$ = $;
window.Alpine = Alpine
Alpine.start()
AOS.init();

// load header and footer
$(function(){
    $("#header").load("header.html"); 
    $("#footer").load("footer.html"); 
});

// swiper
var swiper = new Swiper(".mySwiper", {
    grabCursor: true,
    scrollbar: {
        el: ".swiper-scrollbar",
        hide: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
var swiper2 = new Swiper(".mySwiper2", {
    slidesPerView: 4,
    freeMode: true,
    grabCursor: true,
    loop: true,
    spaceBetween: 10,
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
    breakpoints: {
        "@0.00": {
            slidesPerView: 2,
            spaceBetween: 10,
        },
        "@0.75": {
            slidesPerView: 4,
            spaceBetween: 10,
        },
        "@1.00": {
            slidesPerView: 4,
            spaceBetween: 10,
        },
        "@1.50": {
            slidesPerView: 4,
            spaceBetween: 10,
        },
    },
});

// block scroll
$( "#hamburger" ).click(function() {
    $('body, html').toggleClass('block-scroll');
});
$( ".menu_item" ).click(function() {
    $('body, html').removeClass('block-scroll');
});

// scroll to top
setTimeout(function() { 
    var btn = $('#button');
    
    $(window).scroll(function () {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });
    
    btn.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, '300');
    });
}, 100);
