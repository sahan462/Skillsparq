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

//declare variable to keep track of the clicked button
var button = "";
var packageForm = "";

var packageOverlays = document.getElementsByName('packageOverlay');
var packageOverlay = packageOverlays[0];

var packageModals = document.getElementsByName('packageModal');
var packageModal = packageModals[0];

var milestoneOverlays = document.getElementsByName('milestoneOverlay');
var milestoneOverlay = milestoneOverlays[0];

var milestoneModals = document.getElementsByName('milestoneModal');
var milestoneModal = milestoneModals[0];

// Function to open the modals
function openModal(button) {
  packageForm = button.id;
  var orderType = button.name;


  if (orderType === 'packageOrder') {

    packageOverlay.style.display = "flex";
    packageModal.style.display = "block";

  } else {

    milestoneOverlay.style.display = "flex";
    milestoneModal.style.display = "block";

  }
}

//Function to confirm the action
function confirmAction(action) {
    if (action === 'send') {
    
      document.getElementById('cancelConfirmationOverlay').style.display = 'none';
      document.getElementById('cancelConfirmationModal').style.display = 'none';
      document.getElementById('sendConfirmationOverlay').style.display = 'flex';
      document.getElementById('sendConfirmationModal').style.display = 'block';
    
    } else if(action === 'cancel') {

      document.getElementById('sendConfirmationOverlay').style.display = 'none';
      document.getElementById('sendConfirmationModal').style.display = 'none';
      document.getElementById('cancelConfirmationOverlay').style.display = 'flex';
      document.getElementById('cancelConfirmationModal').style.display = 'block';
    
    }
}

// Function to handle actions based on user confirmation
function handleConfirmation(action) {
  if (action === 'sendYes') {

      var form1 = document.getElementById(packageForm);
      var formData2 = new FormData(document.getElementById('packageRequestForm'));
      
      // Append data from form2 to form1
      formData2.forEach((value, key) => {
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = key;
        input.value = value;
        form1.appendChild(input);
      });

      form1.submit();

  }else if (action === 'sendNo'){

      document.getElementById('sendConfirmation').style.display = 'none';
      document.getElementById('sendConfirmationOverlay').style.display = 'none';

  }else if(action === 'cancelNo'){

      document.getElementById('cancelConfirmation').style.display = 'none';
      document.getElementById('cancelConfirmationOverlay').style.display = 'none';

  }else{

    packageForm = "";

    var fileNameSpan = document.getElementById('fileName');

    document.getElementById('cancelConfirmationOverlay').style.display = 'none';
    document.getElementById('cancelConfirmationModal').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('modal').style.display = 'none';
    document.getElementById('warningMessage').style.display = 'none';

    fileNameSpan.textContent = '';
  }

}

// -------------------file attachements --------------------------------
function displayFileName(input) {
  var fileNameSpan = document.getElementById('fileName');
  var files = input.files;

  if (files.length > 0) {
    var file = input.files[0];
  
    if (file) {
        var allowedExtensions = ['zip'];
        var fileExtension = file.name.split('.').pop().toLowerCase();
  
        if (allowedExtensions.indexOf(fileExtension) !== -1) {

            fileNameSpan.textContent = files[0].name;
            document.getElementById('warningMessage').style.display = 'none';

        } else {

            document.getElementById('warningMessage').style.display = 'block';  
            input.value = '';

        }
    }
  } else {
    fileNameSpan.textContent = '';
  }
}

//----------------------------------------dynamic input methods -----------------------------------

// Counter to keep track of added input fields

let inputCounter = 1;
let count = 0;
const animation = document.getElementById('animation');

if (count == 0) {
  animation.innerHTML = `
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
    <dotlottie-player src="https://lottie.host/675546e0-ec0f-47bf-94d7-80b40da8d8ed/85JHIZQ26o.json" background="transparent" speed="1" style="width: 480px; height: 420px;" loop autoplay></dotlottie-player>
  `;
} else {
  animation.innerHTML = '';
  animation.style.width = '0px';
  animation.style.height = '0px';
}


function addCollapsible() {

  // Get the template content
  const template = document.getElementById('collapsibleTemplate');
  const name = document.getElementById('collapsible');

  // Clone the template content
  const clone = document.importNode(template.content, true);

  // Update the milestone name using innerHTML
  const button = clone.querySelector('.collapsible');
  count++;
  button.innerHTML = "MileStone " + count;

    // Remove animation
    if(count != 0){
      animation.innerHTML = '';
    }

  // Append the cloned content to the inputContainer
  document.getElementById('inputContainer').appendChild(clone);

}

function removeCollapsible(button) {
  // Find the parent container
  const container = button.closest('collapsibleTemplate');

  // Log the container and button for debugging
  console.log('Container:', container);
  console.log('Button:', button);

  // Remove the container if found
  if (container) {
      container.remove();
      milestoneCount--;

      // Update the numbering of remaining milestones
      updateMilestoneNumbering();
  } else {
      console.error('Container not found.');
  }
}

function updateMilestoneNumbering() {
  const milestones = document.querySelectorAll('.collapsibleSet .collapsible');
  milestones.forEach((milestone, index) => {
      milestone.innerHTML = "MileStone " + (index + 1);
  });
}

// -------------------------collapsible-----------------------------

function expand(button){

    button.classList.toggle("collapsibleActive");
    var content = button.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  
}