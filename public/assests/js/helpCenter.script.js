
// --------------------------------Complaint Handling--------------------------------
// Function to open the modal
function openHelpRequestModal(button) 
{
  document.getElementById('overlay').style.display = 'flex';
  document.getElementById('packageModal').style.display = 'block';
}

function confirmAction(action) 
{
  var sendConfirmationOverlay = document.getElementById("sendHelpRequestOverlay");
  var sendConfirmationModal = document.getElementById("sendHelpRequest");
  var cancelConfirmationOverlay = document.getElementById("cancelHelpRequestOverlay");
  var cancelConfirmationModal = document.getElementById("cancelHelpRequest");

  if (action === "send") {

    sendConfirmationOverlay.style.display = "flex";
    sendConfirmationModal.style.display = "block";

  } else if (action === "cancel") {

    cancelConfirmationOverlay.style.display = "flex";
    cancelConfirmationModal.style.display = "block";

  }
}

// Function to handle actions based on user confirmation
function handleConfirmation(action) 
{
  var warningMessage = document.getElementsByClassName('warningMessage');
  var complaintSubject = document.getElementById('inquirySubject'); 
  var complaintDescription = document.getElementById('inquiryDescription');
  const overlay = document.getElementById('overlay');
  const packageModal = document.getElementById('packageModal');
  const sendHelpRequest = document.getElementById('sendHelpRequest');
  const sendHelpRequestOverlay = document.getElementById('sendHelpRequestOverlay');
  const cancelHelpRequest = document.getElementById('cancelHelpRequest');
  const cancelHelpRequestOverlay = document.getElementById('cancelHelpRequestOverlay');
  var fileNameSpan = document.getElementById('fileName');

  if (action === 'sendYes') {

      // Check if the input field is not empty
      if (complaintSubject.value.trim() === '') { 
        
          warningMessage[0].textContent = "Please fill in the subject field before submitting.";
          sendHelpRequest.style.display = 'none';
          sendHelpRequestOverlay.style.display = 'none';
          return; 

      }else{

          warningMessage[0].textContent = ""; 

      }

      if(complaintDescription.value.trim() === '') { 

          warningMessage[1].textContent = "Please fill in the description field before submitting.";
          sendHelpRequest.style.display = 'none';
          sendHelpRequestOverlay.style.display = 'none';
          return;

      }else{

        warningMessage[1].textContent = "";

      }

      var sendRequestForm = document.getElementById('sendRequestForm');
      sendRequestForm.submit();

  }else if (action === 'sendNo'){

      sendHelpRequest.style.display = 'none';
      sendHelpRequestOverlay.style.display = 'none';

  }else if(action === 'cancelNo'){

      cancelHelpRequestOverlay.style.display = 'none';
      cancelHelpRequest.style.display = 'none';

  }else{

      fileNameSpan.textContent = '';
      cancelHelpRequestOverlay.style.display = 'none';
      cancelHelpRequest.style.display = 'none';
      overlay.style.display = 'none';
      packageModal.style.display = 'none';
      warningMessage[0].textContent = "";
      warningMessage[1].textContent = "";
      warningMessage[2].style.display = 'none';

  }
}

// -------------------file attachements --------------------------------
function displayFileName(input) 
{
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
  