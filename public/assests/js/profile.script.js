//--------------------- ----------View Jobs------------------------------------------------

document.addEventListener("DOMContentLoaded", function () {
    var clickableCards = document.querySelectorAll(".job-card");
    
    clickableCards.forEach(function (card) {
        card.addEventListener("click", function () {
            var url = card.getAttribute("job-url");

            if (url) {
                window.location.href = url;
            }else{
                alert("Undefined url");
            }
        });
    });
});


//------------------------------------Modal Behavior------------------------------------------------
    
// Wait for the DOM to fully load
var preview = document.getElementById('previewImage');
var currentProfilePicture = preview.src;

var firstName = document.getElementById('firstName');
var currentFirstName = firstName.value;

var lastName = document.getElementById('lastName');
var currentLastName = lastName.value;

var country = document.getElementById('country');
var currentCountry = country.value;

var about = document.getElementById('about');
var currentAbout = about.innerHTML;
    
//open update modal
function openPackageModal(button) {
    packageForm = button.id;
    document.getElementById('overlay').style.display = 'flex';
    document.getElementById('Modal').style.display = 'block';
}

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
  
// Function to confirm the action
function confirmAction(action) {
    if (action === 'send') {
    
      document.getElementById('cancelConfirmationOverlay').style.display = 'none';
      document.getElementById('cancelConfirmation').style.display = 'none';
      document.getElementById('sendConfirmationOverlay').style.display = 'flex';
      document.getElementById('sendConfirmation').style.display = 'block';
    
    } else if(action === 'cancel') {

      document.getElementById('sendConfirmationOverlay').style.display = 'none';
      document.getElementById('sendConfirmation').style.display = 'none';
      document.getElementById('cancelConfirmationOverlay').style.display = 'flex';
      document.getElementById('cancelConfirmation').style.display = 'block';
    
    } 
}

// Function to handle actions based on user confirmation
function handleConfirmation(action) {
    if (action === 'sendYes') {

        var profileUpdateForm = document.getElementById('profileUpdateForm');
        profileUpdateForm.submit();

    }else if (action === 'sendNo'){

        document.getElementById('sendConfirmation').style.display = 'none';
        document.getElementById('sendConfirmationOverlay').style.display = 'none';

    }else if(action === 'cancelNo'){

        document.getElementById('cancelConfirmation').style.display = 'none';
        document.getElementById('cancelConfirmationOverlay').style.display = 'none';

    }else{
        
        packageForm = "";
        preview.src = currentProfilePicture;
        firstName.value = currentFirstName;
        lastName.value = currentLastName;
        country.value = currentCountry;
        about.value = currentAbout;

        document.getElementById('cancelConfirmationOverlay').style.display = 'none';
        document.getElementById('cancelConfirmation').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
        document.getElementById('Modal').style.display = 'none';
        document.getElementById('warningMessage').style.display = 'none';

    }

}

//open delete modal 
function openDeleteModal(button){
    deleteForm = button.id;
    document.getElementById('overlay1').style.display = 'flex';
    document.getElementById('Modal1').style.display = 'block';
}

// Function to confirm the action of Deletion
function confirmAction(action) {
    if (action === 'sendDelete') {
    
      document.getElementById('cancelConfirmationOverlay1').style.display = 'none';
      document.getElementById('cancelConfirmation1').style.display = 'none';
      document.getElementById('sendConfirmationOverlay1').style.display = 'flex';
      document.getElementById('sendConfirmation1').style.display = 'block';
    
    } else if(action === 'cancelDelete') {

      document.getElementById('sendConfirmationOverlay1').style.display = 'none';
      document.getElementById('sendConfirmation1').style.display = 'none';
      document.getElementById('cancelConfirmationOverlay1').style.display = 'flex';
      document.getElementById('cancelConfirmation1').style.display = 'block';
    
    } 
}

// Function to handle actions based on user confirmation
function handleConfirmation(action) {
    if (action === 'sendDeleteYes') {

        var profileDeleteForm = document.getElementById('profileDeleteForm');
        profileDeleteForm.submit();

    }else if (action === 'sendDeleteNo'){

        document.getElementById('sendConfirmation1').style.display = 'none';
        document.getElementById('sendConfirmationOverlay1').style.display = 'none';

    }else if(action === 'cancelDeleteNo'){

        document.getElementById('cancelConfirmation1').style.display = 'none';
        document.getElementById('cancelConfirmationOverlay1').style.display = 'none';

    }else{
        
        deleteForm = "";
        preview.src = currentProfilePicture;
        firstName.value = currentFirstName;
        lastName.value = currentLastName;
        country.value = currentCountry;
        about.value = currentAbout;

        document.getElementById('cancelConfirmationOverlay1').style.display = 'none';
        document.getElementById('cancelConfirmation1').style.display = 'none';
        document.getElementById('overlay1').style.display = 'none';
        document.getElementById('Modal1').style.display = 'none';
        document.getElementById('warningMessage').style.display = 'none';

    }

}