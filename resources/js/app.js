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


const button = document.getElementById('menu-button');
const menu = document.getElementById('menu');

button.addEventListener('click', () => {
  const isOpen = menu.classList.toggle('hidden');
  button.setAttribute('aria-expanded', !isOpen);
});

// Opcjonalnie: zamknij menu, gdy klikniesz poza nim
window.addEventListener('click', (event) => {
  if (!button.contains(event.target) && !menu.contains(event.target)) {
    menu.classList.add('hidden');
    button.setAttribute('aria-expanded', 'false');
  }
});