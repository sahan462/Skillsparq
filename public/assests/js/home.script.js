//Image Slider
var counter = 1;
setInterval(function(){
document.getElementById('radio' + counter).checked = true;
counter++;
if(counter > 4){
    counter = 1;
}
}, 5000);


//Home Header
window.addEventListener('scroll', () => {
    const verticalScrollPx = window.scrollY || window.pageYOffset;

    const upperHeaders = document.getElementsByClassName('upperHeader');
    const logoLink = document.querySelector('.upperHeader .logo a');
    const liLink = document.querySelector('.nav-links a');
    const buttonLink = document.querySelector('.upperHeader button');
    const hrline = document.querySelector('.upperHeader');

    for (let i = 0; i < upperHeaders.length; i++) {
        const upperHeader = upperHeaders[i];
        if(verticalScrollPx === 0){
            upperHeader.style.backgroundColor = '#0b3a23';
            hrline.classList.remove('scrolled'); 
            logoLink.classList.remove('scrolled'); 
            liLink.classList.remove('scrolled'); 
            buttonLink.classList.remove('scrolled'); 
        }else {
            upperHeader.style.backgroundColor = 'white';
            hrline.classList.add('scrolled'); 
            logoLink.classList.add('scrolled'); 
            liLink.classList.add('scrolled'); 
            buttonLink.classList.add('scrolled'); 
        }
    }
});


//Card Slider
const carousel = document.querySelector(".carousel");

let isDragging = false;
let startX, startScrollLeft;

const dragStart = (e) => {
    isDragging = true;
    carousel.classList.add("dragging");
    startX = e.pageX;
    startScrollLeft = carousel.scrollLeft;
}

const dragging = (e) => {
    if (!isDragging) return;
    carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
}

const dragStop = () => {
    isDragging = false;
    carousel.classList.remove("dragging");
}

carousel.addEventListener("mousedown", dragStart);
carousel.addEventListener('mousemove', dragging);
document.addEventListener("mouseup", dragStop);

  