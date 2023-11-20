// Function to handle slider functionality
function setupSlider(carousel) {
    const arrowbtns = carousel.parentElement.querySelectorAll(".topgig-header svg");
    const firstClassWidth = carousel.querySelector(".card").offsetWidth;

    arrowbtns.forEach(btn => {
        btn.addEventListener("click", () => {
            carousel.scrollLeft += btn.id === "left" ? -firstClassWidth : firstClassWidth;
        });
    });

    let isDragging = false;
    let startX, startScrollLeft;

    const dragStart = (e) => {
        isDragging = true;
        carousel.classList.add("dragging");
        startX = e.pageX;
        startScrollLeft = carousel.scrollLeft;
    };

    const dragging = (e) => {
        if (!isDragging) return;
        carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
    };

    const dragStop = () => {
        isDragging = false;
        carousel.classList.remove("dragging");
    };

    carousel.addEventListener("mousedown", dragStart);
    carousel.addEventListener('mousemove', dragging);
    document.addEventListener("mouseup", dragStop);
}

// Find all carousels and set up each slider
const carousels = document.querySelectorAll(".carousel");

carousels.forEach(carousel => {
    setupSlider(carousel);
});
