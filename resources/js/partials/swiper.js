import Swiper from "swiper";
import { Autoplay, EffectFade, Navigation } from "swiper/modules";
import "swiper/swiper-bundle.css";

// Function to initialize Swipers
function initializeSwipers() {
 

    const featuredSlider = new Swiper(".featured-posts-slider", {
        loop: true,
        grabCursor: true,
        autoplay: {
            delay: 3500,
            disableOnInteraction: true,
            pauseOnMouseEnter: true,
        },
        modules: [Autoplay, EffectFade],
    });


    const postGallerySwiper = new Swiper(".post-gallery-swiper", {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 50,
        breakpoints: {
            650: {
                slidesPerView: 2,
            },
            1000: {
                slidesPerView: 3,
            },
            1500: {
                slidesPerView: 4,
            },
        },
        autoplay: {
            delay: 3500,
            disableOnInteraction: true,
            pauseOnMouseEnter: true,
        },
        navigation: {
            nextEl: ".post-gallery-next",
            prevEl: ".post-gallery-prev",
        },
        modules: [Autoplay, Navigation],
    });
}

document.addEventListener("livewire:navigated", () => {
    initializeSwipers();
});
