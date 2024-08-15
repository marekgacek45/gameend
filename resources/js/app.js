import "fslightbox";
import "./bootstrap";
import "./partials/mobileMenu";
import "./partials/swiper";


document.addEventListener("livewire:navigated", () => {
    refreshFsLightbox();
});