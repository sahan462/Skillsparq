//-----------------------------------------File Attachments------------------------------------------------------
function displayFileName(index) 
{
  var fileNameSpan = document.getElementsByClassName("fileName")[index];
  var input = document.getElementsByClassName("fileInput")[index];
  var files = input.files;

  if (files.length > 0) {
    var file = input.files[0];

    if (file) {
      var allowedExtensions = ["zip","rar","tar"];
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

//-------------------------------------------Star Rating----------------------------------------
$(function () {
  $("#rateYo").rateYo({
    maxValue: 5,
    numStars: 5,
  }).on("rateyo.change", function (e, data) {
    var rating = data.rating;
    $(this).next('.rateValue').text("Rating: " + rating);
    $('#ratingInput').val(rating);
  });
});

//------------------------------------handle delivery uploading--------------------------------
function confirmAction(action)
{
  var sendConfirmationOverlay = document.getElementById("sendConfirmationOverlay");
  var sendConfirmationModal = document.getElementById("sendConfirmationModal");

  if (action === "send") {
    sendConfirmationOverlay.style.display = "flex";
    sendConfirmationModal.style.display = "block";
  } else if (action === "cancel") {
    cancelConfirmationOverlay.style.display = "flex";
    cancelConfirmationModal.style.display = "block";
  }

}

function handleConfirmation(action) 
{
  var sendConfirmationModal = document.getElementById("sendConfirmationModal");
  var sendConfirmationOverlay = document.getElementById("sendConfirmationOverlay");

  if (action === "sendDelivery") {

    var input = document.getElementsByClassName("fileInput")[0];
    var files = input.files;

    if (files.length <= 0) {     
      document.getElementsByClassName("warningMessage")[0].textContent = "Please select a file";
      document.getElementsByClassName("warningMessage")[0].style.display = "block";

      sendConfirmationModal.style.display = "none";
      sendConfirmationOverlay.style.display = "none";

      return false;
    }

    var form = document.getElementById("deliveryUploadForm");
    form.submit();
      
  }else if (action === "completeOrder") {

    var form = document.getElementById("orderCompletionForm");
    form.submit();

  }else if (action === "sendNo") {

    sendConfirmationModal.style.display = "none";
    sendConfirmationOverlay.style.display = "none";

  } 

}

//-----------------------------------active order completetion--------------------------------
function activeSubmit()
{
  // Get the checkbox
  var checkBox = document.getElementById("check");
  // Get the output text
  var btn = document.getElementById("btnx");
  // If the checkbox is checked, display the output text
  if (checkBox.checked == true) {
    btn.style.pointerEvents='auto';
    btn.style.backgroundColor='#31d65a';
    btn.style.color = "white";
  } else {
    btn.style.pointerEvents='none';
    btn.style.backgroundColor='#333';
    btn.style.color = "white";
  }
} 

window.onload = activeSubmit;
