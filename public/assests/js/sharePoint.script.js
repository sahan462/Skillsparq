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