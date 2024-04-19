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
        preview.src = currentProfilePicture;
        firstName.value = currentFirstName;
        lastName.value = currentLastName;
        about.value = currentAbout;

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
        preview.src = currentProfilePicture;
        firstName.value = currentFirstName;
        lastName.value = currentLastName;
        about.value = currentAbout;

        document.getElementById('cancelConfirmProfDeleteOverlay').style.display = 'none';
        document.getElementById('cancelConfirmProfDelete').style.display = 'none';
        document.getElementById('overlayDelete').style.display = 'none';
        document.getElementById('ModalDelete').style.display = 'none';

    }

}

//////////////////////////////////////////////////////////////////////////////////////

//open languages modal 
function openProfileaddLanguagesModal(button){
    deleteForm = button.id;
    document.getElementById('overlayAddLanguages').style.display = 'flex';
    document.getElementById('ModalAddLanguages').style.display = 'block';
}

function confirmActionProfAddLang(action) {
    if (action === 'addLang') {
    
      document.getElementById('cancelConfirmProfAddLangOverlay').style.display = 'none';
      document.getElementById('cancelConfirmProfAddLang').style.display = 'none';
      document.getElementById('sendConfirmProfAddLangOverlay').style.display = 'flex';
      document.getElementById('sendConfirmProfAddLang').style.display = 'block';
    
    } else if(action === 'cancelAddLang') {

      document.getElementById('sendConfirmProfAddLangOverlay').style.display = 'none';
      document.getElementById('sendConfirmProfAddLang').style.display = 'none';
      document.getElementById('cancelConfirmProfAddLangOverlay').style.display = 'flex';
      document.getElementById('cancelConfirmProfAddLang').style.display = 'block';
    
    } 
}

//handleConfirmProfAddLang
function handleConfirmProfAddLan(action) {
    if (action === 'sendDeleteLangYes') {

        var profileAddLangForm = document.getElementById('languageForm');
        profileAddLangForm.submit();

    }else if (action === 'sendDeleteLangNo'){

        document.getElementById('sendConfirmProfAddLang').style.display = 'none';
        document.getElementById('sendConfirmProfAddLangOverlay').style.display = 'none';

    }else if(action === 'cancelAddLanNo'){

        document.getElementById('cancelConfirmProfAddLang').style.display = 'none';
        document.getElementById('cancelConfirmProfAddLangOverlay').style.display = 'none';

    }else{
        
        deleteForm = "";
        preview.src = currentProfilePicture;
        firstName.value = currentFirstName;
        lastName.value = currentLastName;
        about.value = currentAbout;

        document.getElementById('cancelConfirmProfAddLangOverlay').style.display = 'none';
        document.getElementById('cancelConfirmProfAddLang').style.display = 'none';
        document.getElementById('overlayAddLanguages').style.display = 'none';
        document.getElementById('ModalAddLanguages').style.display = 'none';

    }

}

const ul = document.querySelector("ul"),
input = document.getElementById("inputAddLang"),
// input = document.getElementsByClassName("inputAddLang"),
tagNumb = document.querySelector(".details span");

let maxTags = 10,
// tags = ["coding", "nepal"];
tags = [];

countTags();
createTag();

function countTags(){
    input.focus();
    tagNumb.innerText = maxTags - tags.length;
}

function countTags1(){
    input.focus();
    tagNumb.innerText = maxTags - tags.length;
    return maxTags - tags.length;
}

function createTag(){
    ul.querySelectorAll("li").forEach(li => li.remove());
    tags.slice().reverse().forEach(tag =>{
        let liTag = `<li>${tag} <i class="uit uit-multiply" onclick="remove(this, '${tag}')"></i></li>`;
        ul.insertAdjacentHTML("afterbegin", liTag);
    });
    countTags();
}

function remove(element, tag){
    let index  = tags.indexOf(tag);
    tags = [...tags.slice(0, index), ...tags.slice(index + 1)];
    element.parentElement.remove();
    countTags();
}

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

function addTag(e) {
    if (e.key === " ") {
        let tag = e.target.value.trim(); // Trim leading and trailing whitespace
        if (tag.length > 0) { // Check if tag is not empty
            let tagsToAdd = tag.split(/\s+/); // Split tag by whitespace
            tagsToAdd.forEach(tag => {
                if (!tags.includes(tag) && tags.length < 10) { // Check if tag is not already added and tags limit is not reached
                    tags.push(tag);
                    createTag();
                }
            });
        }
        if (countTags1() > 10) {
            e.target.value = "";
        }
        // e.target.value = ""; // Clear input value
    }
}

// input.addEventListener("keyup", addTag);

//////////////////////////////////////////////////////////////////////////////////////

//open Skills modal 
function openProfileaddSkillsModal(button){
    deleteForm = button.id;
    document.getElementById('overlayAddSkills').style.display = 'flex';
    document.getElementById('ModalAddSkills').style.display = 'block';
}

function confirmActionProfAddSkills(action) {
    if (action === 'addSkills') {
    
      document.getElementById('cancelConfirmProfAddSkillsOverlay').style.display = 'none';
      document.getElementById('cancelConfirmProfAddSkills').style.display = 'none';
      document.getElementById('sendConfirmProfAddSkillsOverlay').style.display = 'flex';
      document.getElementById('sendConfirmProfAddSkills').style.display = 'block';
    
    } else if(action === 'cancelAddSkills') { 

      document.getElementById('sendConfirmProfAddSkillsOverlay').style.display = 'none';
      document.getElementById('sendConfirmProfAddSkills').style.display = 'none';
      document.getElementById('cancelConfirmProfAddSkillsOverlay').style.display = 'flex';
      document.getElementById('cancelConfirmProfAddSkills').style.display = 'block';
    
    } 
}

// Function to handle actions based on user confirmation
//handleConfirmProfAddSkills
function handleConfirmProfAddSkills(action) {
    if (action === 'sendAddSkillsYes') {

        var profileAddSkillsForm = document.getElementById('skillsForm');
        profileAddSkillsForm.submit();

    }else if (action === 'sendAddSkillsNo'){

        document.getElementById('sendConfirmProfAddSkills').style.display = 'none';
        document.getElementById('sendConfirmProfAddSkillsOverlay').style.display = 'none';

    }else if(action === 'cancelAddSkillsNo'){

        document.getElementById('cancelConfirmProfAddSkills').style.display = 'none';
        document.getElementById('cancelConfirmProfAddSkillsOverlay').style.display = 'none';

    }else{
        
        deleteForm = "";
        preview.src = currentProfilePicture;
        firstName.value = currentFirstName;
        lastName.value = currentLastName;
        about.value = currentAbout;

        document.getElementById('cancelConfirmProfAddSkillsOverlay').style.display = 'none';
        document.getElementById('cancelConfirmProfAddSkills').style.display = 'none';
        document.getElementById('overlayAddSkills').style.display = 'none';
        document.getElementById('ModalAddSkills').style.display = 'none';

    }

}

//////////////////////////////////////////////////////////////////////////////////////

//open Education modal 
function openProfileAddEducationModal(button){
    deleteForm = button.id;
    document.getElementById('overlayAddEduc').style.display = 'flex';
    document.getElementById('ModalAddEduc').style.display = 'block';
}

function confirmActionProfAddEduc(action) {
    if (action === 'addEducation') {
    
      document.getElementById('cancelConfirmProfAddEducOverlay').style.display = 'none';
      document.getElementById('cancelConfirmProfAddEduc').style.display = 'none';
      document.getElementById('sendConfirmProfAddEducOverlay').style.display = 'flex';
      document.getElementById('sendConfirmProfAddEduc').style.display = 'block';
    
    } else if(action === 'cancelAddEducation') { 

      document.getElementById('sendConfirmProfAddEducOverlay').style.display = 'none';
      document.getElementById('sendConfirmProfAddEduc').style.display = 'none';
      document.getElementById('cancelConfirmProfAddEducOverlay').style.display = 'flex';
      document.getElementById('cancelConfirmProfAddEduc').style.display = 'block';
    
    } 
}

// Function to handle actions based on user confirmation
//handleConfirmProfAddEduc
function handleConfirmProfAddEduc(action) {
    if (action === 'sendAddEducYes') {

        var profileAddSkillsForm = document.getElementById('educationForm');
        profileAddSkillsForm.submit();

    }else if (action === 'sendAddEducNo'){

        document.getElementById('sendConfirmProfAddEduc').style.display = 'none';
        document.getElementById('sendConfirmProfAddEducOverlay').style.display = 'none';

    }else if(action === 'cancelAddEducNo'){

        document.getElementById('cancelConfirmProfAddEduc').style.display = 'none';
        document.getElementById('cancelConfirmProfAddEducOverlay').style.display = 'none';

    }else{
        
        deleteForm = "";
        preview.src = currentProfilePicture;
        firstName.value = currentFirstName;
        lastName.value = currentLastName;
        about.value = currentAbout;

        document.getElementById('cancelConfirmProfAddEducOverlay').style.display = 'none';
        document.getElementById('cancelConfirmProfAddEduc').style.display = 'none';
        document.getElementById('overlayAddEduc').style.display = 'none';
        document.getElementById('ModalAddEduc').style.display = 'none';

    }

}

//////////////////////////////////////////////////////////////////////////////////////


// const languageInput = document.getElementById('languageInput');
// const languageTags = document.getElementById('languageTags');

// languageInput.addEventListener('keydown', function(event) {
//   if (event.key === 'Enter' || event.keyCode === 13) {
//     addLanguageTag(this.value);
//     this.value = '';
//     event.preventDefault();
//   }
// });

// function addLanguageTag(language) {
//   if (language.trim() !== '') {
//     const tag = document.createElement('div');
//     tag.classList.add('languageTag');
//     tag.textContent = language;
//     tag.addEventListener('click', function() {
//       this.remove();
//     });
//     languageTags.appendChild(tag);
//   }
// }