document.addEventListener('DOMContentLoaded', function () {
    var mySwiper = new Swiper('.swiper-container', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 0,
        pagination: {
            el: '.swiper-pagination'
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
    });
});