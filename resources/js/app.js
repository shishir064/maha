import './bootstrap';

import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

import Swiper from 'swiper';
import { Navigation, Autoplay } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/navigation';

function initializeSwipers() {
    document.querySelectorAll('.swiper-container').forEach((container) => {
        const swiperElement = container.querySelector('.swiper');

        if (!swiperElement || swiperElement.swiper) {
            return;
        }

        const nextButton = container.querySelector('.swiper-next');
        const prevButton = container.querySelector('.swiper-prev');

        new Swiper(swiperElement, {
            modules: [Navigation, Autoplay],
            slidesPerView: 2,
            spaceBetween: 16,
            speed: 600,
            loop: false,
            watchOverflow: true,

            navigation: {
                nextEl: nextButton,
                prevEl: prevButton,
            },

            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },

            breakpoints: {
                480: { slidesPerView: 3, spaceBetween: 20 },
                640: { slidesPerView: 4, spaceBetween: 24 },
                1024: { slidesPerView: 5, spaceBetween: 28 },
                1280: { slidesPerView: 6, spaceBetween: 30 },
            },
        });
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeSwipers);
} else {
    initializeSwipers();
}


window.Swal = Swal; 