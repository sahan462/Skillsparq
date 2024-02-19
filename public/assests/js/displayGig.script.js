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
var orderType = "";

var packageOverlay = document.getElementsByName("packageOverlay")[0];
var packageModal = document.getElementsByName("packageModal")[0];
var milestoneOverlay = document.getElementsByName("milestoneOverlay")[0];
var milestoneModal = document.getElementsByName("milestoneModal")[0];

var animation = document.getElementById("animation");
const inputContainer = document.getElementById("inputContainer");

let count = 0;//count variable to keep track of the number of milestones


function openModal(button) {
  packageForm = button.id;
  orderType = button.name;

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

      var form1 = document.getElementById("milestoneRequestForm");
      alert(form1);
      form1.submit();
      
    }

  } else if (action === "sendNo") {

    sendConfirmationModal.style.display = "none";
    sendConfirmationOverlay.style.display = "none";

  } else if (action === "cancelNo") {

    cancelConfirmationModal.style.display = "none";
    cancelConfirmationOverlay.style.display = "none";

  } else {

    if(orderType === "packageOrder"){
      
      packageForm = "";
      var fileNameSpan = document.getElementById("fileName");
      document.getElementById("warningMessage").style.display = "none";
      fileNameSpan.textContent = ""; 

      packageOverlay.style.display = "none";
      packageModal.style.display = "none";

    }else{

      milestoneOverlay.style.display = "none";
      milestoneModal.style.display = "none";

      count = 0;
      //cloning animation div element, clearing input container an appending animation element again
      var animationClone = inputContainer.querySelector('#animation').cloneNode(true);
      inputContainer.innerHTML = "";
      inputContainer.appendChild(animationClone);

      animation = animationClone; //new animation container is the clone of the animation container

      animation.style.width = '100%';
      animation.style.height = '100%';
      animation.innerHTML = `
      <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
      <dotlottie-player src="https://lottie.host/675546e0-ec0f-47bf-94d7-80b40da8d8ed/85JHIZQ26o.json" background="transparent" speed="1" style="width: 480px; height: 420px;" loop autoplay></dotlottie-player>
    `;

    }

    orderType = "";
    cancelConfirmationModal.style.display = "none";
    cancelConfirmationOverlay.style.display = "none";
    
  }
}

// File Attachments

function displayFileName(index) {
  var fileNameSpan = document.getElementsByClassName("fileName")[index];
  var input = document.getElementsByClassName("fileInput")[index];
  var files = input.files;
  alert(index);

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
animation.innerHTML = `
<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
<dotlottie-player src="https://lottie.host/675546e0-ec0f-47bf-94d7-80b40da8d8ed/85JHIZQ26o.json" background="transparent" speed="1" style="width: 480px; height: 420px;" loop autoplay></dotlottie-player>
`;

const frame = document.getElementById("collapsibleTemplate");

function addCollapsible() {
  // Increment count if it's already declared and initialized elsewhere
  count++;

  if (count === 1) {
    animation.innerHTML = '';
    animation.style.width = '0px';
    animation.style.height = '0px';
    inputContainer.style.display = 'block';
    inputContainer.style.width = '100%';
    inputContainer.style.height = '100%';
  }

  var collapsibleTemplate = `
  <div id="collapsibleTemplate_${count}">
  <button type="button" class="collapsible" id="collapsible" onclick="expand(this)">Milestone ${count}</button>

  <div class="collapsibleContent">

      <div class="row">
          <div class="col">
              <div class="type-1">Subject</div>
              <input type="text" name="milestone[subject][]">
          </div>
      </div>

      <div class="row"  style="gap:16px;">
          <div class="col">
              <div class="type-1">Revisions</div>
              <select name="milestone[revisions][]" required="" style="width: 100%;">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="Unlimited">Unlimited</option>
              </select>
          </div>
          <div class="col">
              <div class="type-1">Delivery</div>
              <div class="row">
                  <input type="number" name="milestone[deliveryQuantity][]" min="1"  style="width: 50%;">
                  <select name="milestone[deliveryTimePeriodType][]" class="categories"  style="width: 50%;">
                      <option value="Day(s)">Day(s)</option>
                      <option value="Week(s)">Week(s)</option>
                      <option value="Month(s)">Month(s)</option>
                      <option value="Year(s)">Year(s)</option>
                  </select>
              </div>
          </div>
          <div class="col">
              <div class="type-1">Price(USD)</div>
              <input type="text" name="milestone[price][]"  style="width: 100%;">
          </div>
      </div>

      <div class="row">
          <div class="col">
              <label for="attachments" class="type-1" >Attachments:</label>
              <div class="innerRow" style="display: flex; flex-direction: row; align-items: center;">
                  <label for="milestoneAttachment_${count}" id="attachment"  style="margin-right: 4px;background-color: white;">Attachements</label>
                  <div id="warningMessage" style="color: red; display: none;">Invalid file type. Only ZIP files are allowed.</div>
                  <span class="fileName" id="fileName"></span>
              </div>
              <input type="file" class="fileInput" id="milestoneAttachment_${count}" name="milestone[attachment][]" multiple onchange="displayFileName(${count})">
          </div>
      </div>

      <div class="row">
          <div class="col">
              <div class="type-1">Milestone Description</div>
              <textarea name="milestone[description][]" placeholder="I need.." rows="4" cols="18" spellcheck="false" oninput="this.className = ''" required=""></textarea>
          </div>
      </div>

      <button type="button" class="removeButton" onclick="removeCollapsible(this)">Remove Milestone</button>

  </div>
</div>
  
  `;

  inputContainer.innerHTML += collapsibleTemplate;
}




//remove milestones
function removeCollapsible(button) {
  var container = button.parentElement.parentElement;

  if (container) {
      container.remove();
      updateMilestoneNumbering();
  } else {
      console.error('Container not found.');
  }
}

//update numbering of the milestones
function updateMilestoneNumbering() {
  count--;

  if (count === 0) {
    animation.style.width = '100%';
    animation.style.height = '100%';
    animation.innerHTML = `
      <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
      <dotlottie-player src="https://lottie.host/675546e0-ec0f-47bf-94d7-80b40da8d8ed/85JHIZQ26o.json" background="transparent" speed="1" style="width: 480px; height: 420px;" loop autoplay></dotlottie-player>
    `;
  } else {
    const milestones = document.querySelectorAll('#inputContainer .collapsible');
    milestones.forEach((milestone, index) => {
      milestone.innerHTML = "MileStone " + (index + 1);
    });
  }
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
