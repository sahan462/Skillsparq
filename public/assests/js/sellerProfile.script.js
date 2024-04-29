//redirecting to display gig page
document.addEventListener("DOMContentLoaded", function () {
    var clickableCards = document.querySelectorAll(".gigCard");
    
    clickableCards.forEach(function (card) {
        card.addEventListener("click", function () {
            var url = card.getAttribute("gig-url");

            if (url) {
                window.location.href = url;
            }else{
                alert("Undefined url");
            }
        });
    });
});

// Wait for the DOM to fully load
var preview = document.getElementById('previewImage');
var currentProfilePicture = preview.src;

var firstName = document.getElementById('firstName');
var currentFirstName = firstName.value;

var lastName = document.getElementById('lastName');
var currentLastName = lastName.value;

var about = document.getElementById('about');
var currentAbout = about.innerHTML;

//dynamically render profile picture
function renderImage() {
    var input = document.getElementById('newProfilePicture');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
}

//////////////////////////////////////////////////////////////////////////////////////

//open update modal
function openProfileUpdateModal(button) {
    packageForm = button.id;
    document.getElementById('overlayUpdate').style.display = 'flex';
    document.getElementById('ModalUpdate').style.display = 'block';
}
  
// Function to confirm the action
function confirmActionProfUpdate(action) {
    if (action === 'send') {
    
      document.getElementById('cancelConfirmProfUpdateOverlay').style.display = 'none';
      document.getElementById('cancelConfirmProfUpdate').style.display = 'none';
      document.getElementById('sendConfirmProfUpdateOverlay').style.display = 'flex';
      document.getElementById('sendConfirmProfUpdate').style.display = 'block';
    
    } else if(action === 'cancel') {

      document.getElementById('sendConfirmProfUpdateOverlay').style.display = 'none';
      document.getElementById('sendConfirmProfUpdate').style.display = 'none';
      document.getElementById('cancelConfirmProfUpdateOverlay').style.display = 'flex';
      document.getElementById('cancelConfirmProfUpdate').style.display = 'block';
    
    } 
}

// Function to handle actions based on user confirmation
function handleConfirmProfUpdate(action) {
    if (action === 'sendYes') {

        var profileUpdateForm = document.getElementById('profileUpdateForm');
        profileUpdateForm.submit();

    }else if (action === 'sendNo'){

        document.getElementById('sendConfirmProfUpdate').style.display = 'none';
        document.getElementById('sendConfirmProfUpdateOverlay').style.display = 'none';

    }else if(action === 'cancelNo'){

        document.getElementById('cancelConfirmProfUpdate').style.display = 'none';
        document.getElementById('cancelConfirmProfUpdateOverlay').style.display = 'none';

    }else{
        
        packageForm = "";
        document.getElementById('cancelConfirmProfUpdateOverlay').style.display = 'none';
        document.getElementById('cancelConfirmProfUpdate').style.display = 'none';
        document.getElementById('overlayUpdate').style.display = 'none';
        document.getElementById('ModalUpdate').style.display = 'none';

    }

}

//////////////////////////////////////////////////////////////////////////////////////

//open delete modal 
function openProfileDeleteModal(button){
    deleteForm = button.id;
    document.getElementById('overlayDelete').style.display = 'flex';
    document.getElementById('ModalDelete').style.display = 'block';
}

// Function to confirm the action of Deletion
function confirmActionProfDelete(action) {
    if (action === 'sendDelete') {
    
      document.getElementById('cancelConfirmProfDeleteOverlay').style.display = 'none';
      document.getElementById('cancelConfirmProfDelete').style.display = 'none';
      document.getElementById('sendConfirmProfDeleteOverlay').style.display = 'flex';
      document.getElementById('sendConfirmProfDelete').style.display = 'block';
    
    } else if(action === 'cancelDelete') {

      document.getElementById('sendConfirmProfDeleteOverlay').style.display = 'none';
      document.getElementById('sendConfirmProfDelete').style.display = 'none';
      document.getElementById('cancelConfirmProfDeleteOverlay').style.display = 'flex';
      document.getElementById('cancelConfirmProfDelete').style.display = 'block';
    
    }
}

// Function to handle actions based on user confirmation
function handleConfirmProfDelete(action) {
    if (action === 'sendDeleteYes') {

        var profileDeleteForm = document.getElementById('profileDeleteForm');
        profileDeleteForm.submit();

    }else if (action === 'sendDeleteNo'){

        document.getElementById('sendConfirmProfDelete').style.display = 'none';
        document.getElementById('sendConfirmProfDeleteOverlay').style.display = 'none';

    }else if(action === 'cancelDeleteNo'){

        document.getElementById('cancelConfirmProfDelete').style.display = 'none';
        document.getElementById('cancelConfirmProfDeleteOverlay').style.display = 'none';

    }else{
        
        deleteForm = "";
        document.getElementById('cancelConfirmProfDeleteOverlay').style.display = 'none';
        document.getElementById('cancelConfirmProfDelete').style.display = 'none';
        document.getElementById('overlayDelete').style.display = 'none';
        document.getElementById('ModalDelete').style.display = 'none';

    }

}

//////////////////////////////////////////////////////////////////////////////////////

var Email = document.getElementById('Email');
var currentEmail = Email.value;

function openEmailUpdate(btn)
{
    emailForm = btn.id;
    document.getElementById('overlayEmail').style.display = 'flex';
    document.getElementById('modalEmail').style.display = 'block';
}

function confirmEmail(action)
{
    if (action === 'addEmail') {
        var addEmailForm = document.getElementById('emailForm');
        addEmailForm.submit();
    
        document.getElementById('modalEmail').style.display = 'none';
        document.getElementById('overlayEmail').style.display = 'none';
      
      } else if(action === 'cancelEmail') { 
        emailForm = "";
        Email.value = currentEmail
  
        document.getElementById('overlayEmail').style.display = 'none';
        document.getElementById('overlayEmail').style.display = 'none';
      
      }
}


//////////////////////////////////////////////////////////////////////////////////////

//open languages modal

var Language = document.getElementById('Language');
var currentLanguage = Language.value;

function openLanguage(btn)
{
    langForm = btn.id;
    document.getElementById('overlaylang').style.display = 'flex';
    document.getElementById('modallang').style.display = 'block';
}

function confirmLang(action)
{
    if (action === 'ad') {
        var addLangForm = document.getElementById('lnForm');
        addLangForm.submit();
    
        document.getElementById('modallang').style.display = 'none';
        document.getElementById('overlaylang').style.display = 'none';
      
      } else if(action === 'canc') { 
  
        langForm = '';
        Language.value = currentLanguage
        document.getElementById('overlaylang').style.display = 'none';
        document.getElementById('modallang').style.display = 'none';
      
      }
}


//////////////////////////////////////////////////////////////////////////////////////

//open Skills modal 

var Skill = document.getElementById('Skill');
var currentSkill = Skill.value;

function openSkill(btn)
{
    skillForm = btn.id;
    document.getElementById('overlayskill').style.display = 'flex';
    document.getElementById('modalskill').style.display = 'block';
}

function confirmSkill(action)
{
    if (action === 'ad') {
        var addEmailForm = document.getElementById('sklForm');
        addEmailForm.submit();
    
        document.getElementById('modalskill').style.display = 'none';
        document.getElementById('overlayskill').style.display = 'none';
      
      } else if(action === 'canc') { 
  
        skillForm = '';
        Skill.value = currentSkill
        document.getElementById('overlayskill').style.display = 'none';
        document.getElementById('modalskill').style.display = 'none';
      
      }
}


//////////////////////////////////////////////////////////////////////////////////////

//open Education modal 

var Skill = document.getElementById('Skill');
var currentSkill = Skill.value;

function openEducation(btn)
{
    educForm = btn.id;
    document.getElementById('overlayeducation').style.display = 'flex';
    document.getElementById('modaleducation').style.display = 'block';
}

function confirmEducation(action)
{
    if (action === 'ad') {
        var addEmailForm = document.getElementById('educForm');
        addEmailForm.submit();
    
        document.getElementById('modaleducation').style.display = 'none';
        document.getElementById('overlayeducation').style.display = 'none';
      
      } else if(action === 'canc') { 
  
        educForm = ''
        Skill.value = 
        document.getElementById('overlayeducation').style.display = 'none';
        document.getElementById('modaleducation').style.display = 'none';
      
      }
}

//////////////////////////////////////////////////////////////////////////////////////

// const ul = document.querySelector("ul"),
// input = document.getElementById("inputAddLang"),
// // input = document.getElementsByClassName("inputAddLang"),
// tagNumb = document.querySelector(".details span");

// let maxTags = 10,
// // tags = ["coding", "nepal"];
// tags = [];

// countTags();
// createTag();

// function countTags(){
//     input.focus();
//     tagNumb.innerText = maxTags - tags.length;
// }

// function countTags1(){
//     input.focus();
//     tagNumb.innerText = maxTags - tags.length;
//     return maxTags - tags.length;
// }

// function createTag(){
//     ul.querySelectorAll("li").forEach(li => li.remove());
//     tags.slice().reverse().forEach(tag =>{
//         let liTag = `<li>${tag} <i class="uit uit-multiply" onclick="remove(this, '${tag}')"></i></li>`;
//         ul.insertAdjacentHTML("afterbegin", liTag);
//     });
//     countTags();
// }

// function remove(element, tag){
//     let index  = tags.indexOf(tag);
//     tags = [...tags.slice(0, index), ...tags.slice(index + 1)];
//     element.parentElement.remove();
//     countTags();
// }

// function addTag(e){
//     if(e.key === " "){
//         let tag = e.target.value.replace(/\s+/g, '');
//         if(tag.length > 1 && !tags.includes(tag)){
//             if(tags.length < 10){
//                 tag.split(',').forEach(tag => {
//                     tags.push(tag);
//                     createTag();
//                 });
//             }
//         }
//         e.target.value = "";
//     }
// }

// function addTag(e) {
//     if (e.key === " ") {
//         let tag = e.target.value.trim(); // Trim leading and trailing whitespace
//         if (tag.length > 0) { // Check if tag is not empty
//             let tagsToAdd = tag.split(/\s+/); // Split tag by whitespace
//             tagsToAdd.forEach(tag => {
//                 if (!tags.includes(tag) && tags.length < 10) { // Check if tag is not already added and tags limit is not reached
//                     tags.push(tag);
//                     createTag();
//                 }
//             });
//         }
//         if (countTags1() > 10) {
//             e.target.value = "";
//         }
//         // e.target.value = ""; // Clear input value
//     }
// }

// input.addEventListener("keyup", addTag);

//------------------------------------------- File Attachments-----------------------------------------------


function displayFileName(index) 
{
  var fileNameSpan = document.getElementsByClassName("fileName")[index];
  var input = document.getElementsByClassName("fileInput")[index];
  var files = input.files;

  if (files.length > 0) {
    var file = input.files[0];

    if (file) {
      var allowedExtensions = ["jpg","png","jpeg"];
      var fileExtension = file.name.split(".").pop().toLowerCase();

      if (allowedExtensions.indexOf(fileExtension) !== -1) {
        fileNameSpan.textContent = files[0].name;
        document.getElementsByClassName("warningMessage")[index].style.display = "none";
      } else {
        document.getElementsByClassName("warningMessage")[index].style.display = "block";
        input.value = "";
      }
    }
  } else {
    fileNameSpan.textContent = "";
  }
}

// star rating components
$(document).ready(function() {
  $('.stars').each(function() {
      var rating = $(this).data('rating');
      $(this).rateYo({
          rating: rating,
          readOnly: true
      });
  });
});
