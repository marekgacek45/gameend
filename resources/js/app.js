import "./bootstrap";

import "./partials/mobileMenu";

import Swiper from "swiper";
import { Autoplay, EffectFade } from "swiper/modules";
import "swiper/swiper-bundle.css";

document.addEventListener("livewire:navigated", () => {
    new Swiper(".featured-posts-slider", {
        loop: true,
       
        grabCursor: true,
       

        autoplay: {
            delay: 3500,
            disableOnInteraction: true,
            pauseOnMouseEnter: true,
        },
       

        modules: [Autoplay, EffectFade],
    });
});
