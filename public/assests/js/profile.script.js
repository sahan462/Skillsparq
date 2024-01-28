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

function openPackageModal(button) {
    packageForm = button.id;
    document.getElementById('overlay').style.display = 'flex';
    document.getElementById('Modal').style.display = 'block';
}

var preview = document.getElementById('previewImage');
var currentProfilePicture = preview.src;

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
      document.getElementById('cancelConfirmation').style.display = 'none';
      document.getElementById('overlay').style.display = 'none';
      document.getElementById('Modal').style.display = 'none';
      document.getElementById('warningMessage').style.display = 'none';
      preview.src = currentProfilePicture;


      fileNameSpan.textContent = '';
    }

}

