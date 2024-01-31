// Image Slider

var slideIndex = 1;
displaySlides(slideIndex);

function nextSlide(n) {
  displaySlides((slideIndex += n));
}

function currentSlide(n) {
  displaySlides((slideIndex = n));
}

function displaySlides(n) {
  var i;
  var slides = document.getElementsByClassName("showSlide");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex - 1].style.display = "initial";
}

setInterval(function () {
  nextSlide(1);
}, 5000);

// Package Tabs

function openCity(evt, cityName) {
  var i, tabcontent, tablinks;

  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();

// Modals

var packageForm = "";
var orderType = "";
var packageOverlay = document.getElementsByName("packageOverlay")[0];
var packageModal = document.getElementsByName("packageModal")[0];
var milestoneOverlay = document.getElementsByName("milestoneOverlay")[0];
var milestoneModal = document.getElementsByName("milestoneModal")[0];

function openModal(button) {
  packageForm = button.id;
  var orderType = button.name;

  if (orderType === "packageOrder") {
    packageOverlay.style.display = "flex";
    packageModal.style.display = "block";
  } else {
    milestoneOverlay.style.display = "flex";
    milestoneModal.style.display = "block";
  }
}

function confirmAction(action) {
  var sendConfirmationOverlay = document.getElementById("sendConfirmationOverlay");
  var sendConfirmationModal = document.getElementById("sendConfirmationModal");
  var cancelConfirmationOverlay = document.getElementById("cancelConfirmationOverlay");
  var cancelConfirmationModal = document.getElementById("cancelConfirmationModal");

  if (action === "send") {
    sendConfirmationOverlay.style.display = "flex";
    sendConfirmationModal.style.display = "block";
  } else if (action === "cancel") {
    cancelConfirmationOverlay.style.display = "flex";
    cancelConfirmationModal.style.display = "block";
  }
}

function handleConfirmation(action) {
  var sendConfirmationModal = document.getElementById("sendConfirmationModal");
  var sendConfirmationOverlay = document.getElementById("sendConfirmationOverlay");
  var cancelConfirmationModal = document.getElementById("cancelConfirmationModal");
  var cancelConfirmationOverlay = document.getElementById("cancelConfirmationOverlay");

  if (action === "sendYes") {

    if(orderType === "packageOrder"){

      var form1 = document.getElementById(packageForm);
      var formData2 = new FormData(document.getElementById("packageRequestForm"));
  
      formData2.forEach((value, key) => {
        var input = document.createElement("input");
        input.type = "hidden";
        input.name = key;
        input.value = value;
        form1.appendChild(input);
      });
      form1.submit();
  
    }else{




    }

  } else if (action === "sendNo") {
    sendConfirmationModal.style.display = "none";
    sendConfirmationOverlay.style.display = "none";
  } else if (action === "cancelNo") {
    cancelConfirmationModal.style.display = "none";
    cancelConfirmationOverlay.style.display = "none";
  } else {
    packageForm = "";
    orderType = "";
    var fileNameSpan = document.getElementById("fileName");
    fileNameSpan.textContent = "";

    cancelConfirmationOverlay.style.display = "none";
    cancelConfirmationModal.style.display = "none";
    document.getElementById("warningMessage").style.display = "none";
    packageOverlay.style.display = "none";
    packageModal.style.display = "none";
    milestoneOverlay.style.display = "none";
    milestoneModal.style.display = "none";

  }
}

// File Attachments

function displayFileName(input) {
  var fileNameSpan = document.getElementById("fileName");
  var files = input.files;

  if (files.length > 0) {
    var file = input.files[0];

    if (file) {
      var allowedExtensions = ["zip"];
      var fileExtension = file.name.split(".").pop().toLowerCase();

      if (allowedExtensions.indexOf(fileExtension) !== -1) {
        fileNameSpan.textContent = files[0].name;
        document.getElementById("warningMessage").style.display = "none";
      } else {
        document.getElementById("warningMessage").style.display = "block";
        input.value = "";
      }
    }
  } else {
    fileNameSpan.textContent = "";
  }
}

// Dynamic Input Methods

let count = 0;
const animation = document.getElementById("animation");

if (count === 0) {
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
  const frame = document.getElementById("collapsibleTemplate");
  const name = document.getElementById("collapsible");

  const clone = frame.cloneNode(true);;

  const button = clone.querySelector(".collapsible");
  count++;
  button.innerHTML = "MileStone " + count;

  if (count !== 0) {
    animation.innerHTML = '';
  }

  document.getElementById("inputContainer").appendChild(clone);
}

//remove milestones
function removeCollapsible(button) {
  var container = button.parentElement.parentElement;

  console.log('Button:', button);
  alert('Container:', container);

  if (container) {
      container.remove();
      updateMilestoneNumbering();
  } else {
      console.error('Container not found.');
  }
}

//update numbering of the milestones
function updateMilestoneNumbering() {
  const milestones = document.querySelectorAll('.collapsibleSet .collapsible');
  milestones.forEach((milestone, index) => {
    milestone.innerHTML = "MileStone " + (index + 1);
  });
}

// Collapsible

function expand(button) {
  button.classList.toggle("collapsibleActive");
  var content = button.nextElementSibling;
  if (content.style.maxHeight) {
    content.style.maxHeight = null;
  } else {
    content.style.maxHeight = content.scrollHeight + "px";
  }
}
