import './bootstrap';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

window.initPartnersSwiper = () => {
    const swiperEl = document.querySelector('.partners-swiper');

    if (!swiperEl) return;

    new Swiper(swiperEl, {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        grabCursor: true,
        centeredSlides: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
};

document.addEventListener('DOMContentLoaded', () => {
    window.initPartnersSwiper();
});
