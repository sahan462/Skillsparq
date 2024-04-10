//---------------------------------------- Modals---------------------------------------

//declare variable to keep track of the clicked button
var button = "";

// Function to open the modal
function openPackageModal(button) {
  packageForm = button.id;
  document.getElementById('overlay').style.display = 'flex';
  document.getElementById('packageModal').style.display = 'block';
}


// Function to handle actions based on user confirmation
function handleConfirmation(action) {
  if (action === 'sendYes') {

      var sendRequestForm = document.getElementById('sendRequestForm');
      sendRequestForm.submit();

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
    document.getElementById('cancelConfirmation').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('packageModal').style.display = 'none';
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
  