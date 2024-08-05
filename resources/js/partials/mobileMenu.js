const hamburger = document.querySelector(".hamburger");
const mobileMenu = document.querySelector(".mobile-menu");
const body = document.querySelector("body");

const hamburgerHandler = () => {
    hamburger.classList.toggle("is-active");
    mobileMenu.classList.toggle("translate-y-[110%]");
    body.classList.add("overflow-hidden");
};

hamburger.addEventListener("click", hamburgerHandler);
