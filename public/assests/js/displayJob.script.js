//------------------------------------Modal Behavior------------------------------------------------
    
// Wait for the DOM to fully load

var fullName = document.getElementById('attachment');
var currentFullName = fullName.value;

const form = document.querySelector('form');
form.addEventListener('submit', handleSubmit);

function handleSubmit(event) {
  event.preventDefault();
}

var description = document.getElementById('descriptionJobProposal');
var descriptionJobProposal = description.value;

// attachment
    
//open update Modal
function openJobProposalModal(button) {
    packageForm = button.id;
    document.getElementById('overlayDisplayJob').style.display = 'flex';
    document.getElementById('modalIdDisplayJob').style.display = 'block';
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

        var sendJobProposal = document.getElementById('sendJobProposal');
        sendJobProposal.submit();

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
        about.value = currentAbout;

        document.getElementById('cancelConfirmationOverlay').style.display = 'none';
        document.getElementById('cancelConfirmation').style.display = 'none';
        document.getElementById('overlayDisplayJob').style.display = 'none';
        document.getElementById('modalIdDisplayJob').style.display = 'none';
        document.getElementById('warningMessage').style.display = 'none';

    }

}