// image slider
var slide_index = 1;
displaySlides(slide_index);
            
function nextSlide(n) {
  displaySlides(slide_index += n);
}
            
function currentSlide(n) {
  displaySlides(slide_index = n);
}
            
function displaySlides(n) {
  var i;
  var slides = document.getElementsByClassName("showSlide");
  if (n > slides.length) { slide_index = 1 }
  if (n < 1) { slide_index = slides.length }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slide_index - 1].style.display = "initial";
}

setInterval(function() {
  nextSlide(1);
}, 5000);

// package tabs

function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").click();




// Modals
  
// Function to open the modal
function openModal() {
  document.getElementById('overlay').style.display = 'flex';
  document.getElementById('modal').style.display = 'block';
}

// Function to handle actions based on user confirmation
function handleConfirmation(action) {
    if (action === 'sendYes') {
        document.getElementById('requestForm').submit();
        window.location.href="manageOrders";
    }else if (action === 'sendNo'){
        document.getElementById('sendConfirmation').style.display = 'none';
        document.getElementById('sendConfirmationOverlay').style.display = 'none';
    }else if(action === 'cancelNo'){
        document.getElementById('cancelConfirmation').style.display = 'none';
    }else{
      document.getElementById('cancelConfirmationOverlay').style.display = 'none';
      document.getElementById('cancelConfirmation').style.display = 'none';
      document.getElementById('overlay').style.display = 'none';
      document.getElementById('modal').style.display = 'none';

    }

}

// Function to confirm the action
function confirmAction(action) {
    if (action === 'send') {
    
      document.getElementById('cancelConfirmationOverlay').style.display = 'none';
      document.getElementById('cancelConfirmation').style.display = 'none';
      document.getElementById('sendConfirmationOverlay').style.display = 'flex';
      document.getElementById('sendConfirmation').style.display = 'block';
    
    } else {

      document.getElementById('sendConfirmationOverlay').style.display = 'none';
      document.getElementById('sendConfirmation').style.display = 'none';
      document.getElementById('cancelConfirmationOverlay').style.display = 'flex';
      document.getElementById('cancelConfirmation').style.display = 'block';
    
    }
}
