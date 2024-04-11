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
    
// var languages = document.getElementById('');

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
    if (action === 'Add') {
    
      document.getElementById('cancelConfirmProfAddLangOverlay').style.display = 'none';
      document.getElementById('cancelConfirmProfAddLang').style.display = 'none';
      document.getElementById('sendConfirmProfAddLangOverlay').style.display = 'flex';
      document.getElementById('sendConfirmProfAddLang').style.display = 'block';
    
    } else if(action === 'Cancel') {

      document.getElementById('sendConfirmProfAddLangOverlay').style.display = 'none';
      document.getElementById('sendConfirmProfAddLang').style.display = 'none';
      document.getElementById('cancelConfirmProfAddLangOverlay').style.display = 'flex';
      document.getElementById('cancelConfirmProfAddLang').style.display = 'block';
    
    } 
}

// Function to handle actions based on user confirmation
//handleConfirmProfDelete
function handleConfirmProfAddLan(action) {
    if (action === 'sendDeleteYes') {

        var profileAddLangForm = document.getElementById('languageForm');
        profileAddLangForm.submit();

    }else if (action === 'sendDeleteNo'){

        document.getElementById('sendConfirmProfAddLang').style.display = 'none';
        document.getElementById('sendConfirmProfAddLangOverlay').style.display = 'none';

    }else if(action === 'cancelDeleteNo'){

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

//////////////////////////////////////////////////////////////////////////////////////


const languageInput = document.getElementById('languageInput');
const languageTags = document.getElementById('languageTags');

languageInput.addEventListener('keydown', function(event) {
  if (event.key === 'Enter' || event.keyCode === 13) {
    addLanguageTag(this.value);
    this.value = '';
    event.preventDefault();
  }
});

function addLanguageTag(language) {
  if (language.trim() !== '') {
    const tag = document.createElement('div');
    tag.classList.add('languageTag');
    tag.textContent = language;
    tag.addEventListener('click', function() {
      this.remove();
    });
    languageTags.appendChild(tag);
  }
}