document.addEventListener("livewire:navigated", () => {
    const footerYearSpan = document.querySelector(".footer-year--js");

    const today = new Date().getFullYear();

    footerYearSpan.innerHTML = today;
});