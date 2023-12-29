//--------------------------------image slider--------------------------------

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

//-------------- package tabs -----------------------------------

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



//---------------------------------------- Modals---------------------------------------
  
// Function to open the modal
function openPackageModal() {
  document.getElementById('overlay').style.display = 'flex';
  document.getElementById('modal').style.display = 'block';
}

// Function to handle actions based on user confirmation
function handleConfirmation(action) {
    if (action === 'sendYes') {

        document.forms['requestForm'].submit();
        // window.location.href="manageOrders";

    }else if (action === 'sendNo'){

        document.getElementById('sendConfirmation').style.display = 'none';
        document.getElementById('sendConfirmationOverlay').style.display = 'none';

    }else if(action === 'cancelNo'){
        document.getElementById('cancelConfirmation').style.display = 'none';
        document.getElementById('cancelConfirmationOverlay').style.display = 'none';

    }else{

      var fileNameSpan = document.getElementById('fileName');

      document.getElementById('cancelConfirmationOverlay').style.display = 'none';
      document.getElementById('cancelConfirmation').style.display = 'none';
      document.getElementById('overlay').style.display = 'none';
      document.getElementById('modal').style.display = 'none';
      fileNameSpan.textContent = '';

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

// -------------------file attachements --------------------------------
function displayFileName(input) {
  var fileNameSpan = document.getElementById('fileName');
  var files = input.files;

  if (files.length > 0) {
    fileNameSpan.textContent = files[0].name;
  } else {
    fileNameSpan.textContent = '';
  }
}

//----------------------------------------dynamic input methods -----------------------------------

// Counter to keep track of added input fields
let inputCounter = 1;
let count = 1;

function openMilestoneModal() {
  document.getElementById('milestoneOverlay').style.display = 'flex';
  document.getElementById('milestoneModal').style.display = 'block';
}

function addCollapsible() {
  // Get the template content
  const template = document.getElementById('collapsibleTemplate');
  const name = document.getElementById('collapsible');

  // Clone the template content
  const clone = document.importNode(template.content, true);

  // Update the milestone name using innerHTML
  const button = clone.querySelector('.collapsible');
  button.innerHTML = "MileStone " + count;
  count++;
  // Append the cloned content to the inputContainer
  document.getElementById('inputContainer').appendChild(clone);

}

// -------------------------collapsible-----------------------------

function expand(button){

    button.classList.toggle("active");
    var content = button.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  
}


