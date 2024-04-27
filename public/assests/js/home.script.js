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
    const liLinks = document.querySelectorAll('.nav-links a');
    const buttonLink = document.querySelector('.upperHeader button');
    const hrline = document.querySelector('.upperHeader');

    for (let i = 0; i < upperHeaders.length; i++) {
        const upperHeader = upperHeaders[i];
        if(verticalScrollPx === 0){
            upperHeader.style.backgroundColor = '#0b3a23';
            hrline.classList.remove('scrolled'); 
            logoLink.classList.remove('scrolled'); 
            buttonLink.classList.remove('scrolled'); 
        }else {
            upperHeader.style.backgroundColor = 'white';
            hrline.classList.add('scrolled'); 
            logoLink.classList.add('scrolled'); 
            buttonLink.classList.add('scrolled'); 
        }
    }

    for (let i = 0; i < liLinks.length; i++) {
        const liLink = liLinks[i];
        if(verticalScrollPx === 0){
            liLink.classList.remove('scrolled'); 
        }else {
            liLink.classList.add('scrolled'); 
        }
    }

});


//Card Slider
const carousel = document.querySelector(".carousel");
const arrowbtns = document.querySelectorAll(".topgig-header svg");
const firstClassWidth = document.querySelector(".card").offsetWidth;

arrowbtns.forEach(btn => {
    btn.addEventListener("click", () => {
        carousel.scrollLeft += btn.id === "left" ? -firstClassWidth : firstClassWidth;
    })
});

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

//////////////////////////////////////////// ajax syntax for inputs /////////////////////////////////////////

// $(document).ready(function(){
//     $('#searchIn').keyup(function(){
//         var input = $(this).val();
//         //alert(input);

//         if(input != ''){
//             $.ajax({

//                 url:"",
//                 method:"GET",
//                 data:{input:input},

//                 success:function(data){
//                     $("#searchResult").html(data);
//                 }
//             });
//         }else{
//             $("searchResult").css("display","none")
//         }
//     })
// })


// $(document).ready(function(){
//     $('#searchButton').click(function(){
//         // var input = $(this).val();
//         //alert(input);
//         var searchQuery = $('#searchInId').val()
//         var urlInputName = $('#searchIn').attr('name');

//         var Url = 'search' + '/' + 'services' + '?' + encodeURIComponent(urlInputName) + '=' + encodeURIComponent(searchQuery)

//         // if(input != ''){
//             $.ajax({
                
//                 url:Url, // data will come from this page if the input is not empty using ajax.
//                 method:"GET",
//                 data:{
//                     query :searchQuery,
//                     inputName:urlInputName
//                 },
//                 headers: {
//                     'Content-Type': 'application/x-www-form-urlencoded',
//                 },
//                 body: Url,

//                 success:function(data){
//                     // $("#searchResult").html(data);
//                     console.log(response);
//                     // window.location.href = "http://example.com/another-page";
//                 },
//                 error: function(xhr, status, error) {
//                     // Handle errors
//                     console.error(error);
//                 }
//             });
//         // }else{
//         //     $("searchResult").css("display","none")
//         // }
//     })
// })