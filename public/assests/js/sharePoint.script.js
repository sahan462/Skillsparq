function showrate() {
    // Get the checkbox
    var checkBox = document.getElementById("final");
    // Get the output text
    var rateSec = document.getElementById("rateSec");
  
    // If the checkbox is checked, display the output text
    if (checkBox.checked == true) {
      rateSec.style.display = "block";
    } else {
      rateSec.style.display = "none";
    }
  }
  
function showProductName()
{
  var fileInput = document.getElementById('productf');   
  var filename = fileInput.files[0].name;
  var filesize =fileInput.files[0].filesize;
  var text=document.getElementById('productname');
  text.innerHTML="<b>File Name : </b>"+filename;
}

function showName()
{
  var fileInput = document.getElementById('file');   
  var filename = fileInput.files[0].name;
  var filesize =fileInput.files[0].filesize;
  var text=document.getElementById('filename');
  text.innerHTML="<b>File Name : </b>"+filename;
}

function activeSubmit()
{
  // Get the checkbox
  var checkBox = document.getElementById("check");
  // Get the output text
  var btn = document.getElementById("btnx");
  // If the checkbox is checked, display the output text
  if (checkBox.checked == true) {
    btn.style.pointerEvents='auto';
    btn.style.backgroundColor='#00ad2b';
  } else {
    btn.style.pointerEvents='none';
    btn.style.backgroundColor='rgb(85, 85, 85)';
  }
}


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
    
  $("#rateYo").rateYo()
              .on("rateyo.change", function (e, data) {

              var rating = data.rating;
              $(this).next().text(rating);
              });
  });