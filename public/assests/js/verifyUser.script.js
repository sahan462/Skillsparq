// Get the modal and button
var modal1 = document.getElementById("model1");
var modal2 = document.getElementById("model2");
var modal3 = document.getElementById("model3");
var btn1 = document.getElementById("model-btn-1");
var btn2 = document.getElementById("model-btn-2");
var btn3 = document.getElementById("model-btn-3");
// When the user clicks on button close,it will close the modal
btn1.onclick = function () {
  modal1.style.display = "none";
};
btn2.onclick = function () {
  modal2.style.display = "none";
  window.location.replace("http://localhost/skillsparq/public/loginUser");
};
btn3.onclick = function () {
  modal3.style.display = "none";
  window.location.replace("http://localhost/skillsparq/public/loginUser");
};


var timeleft = 60;
var downloadTimer = setInterval(function () {
  if (timeleft <= 0) {
    clearInterval(downloadTimer);
    document.getElementById("resendbtn").style.pointerEvents = "auto";
    document.getElementById("resendbtn").style.backgroundColor = "#3d3d3d";
    document.getElementById("resendbtn").value = " Resend ";
    document.getElementById("resendbtn").onmouseover = function () {
      this.style.backgroundColor = "#f5f0f0";
    };
    document.getElementById("resendbtn").onmouseout = function () {
      this.style.backgroundColor = "#3d3d3d";
    };
  } else {
    document.getElementById("resendbtn").style.backgroundColor = "#686868";
    document.getElementById("resendbtn").style.pointerEvents = "none";
    document.getElementById("resendbtn").value =
      " Resend  In " + ("0" + timeleft).slice(-2) + " ";
  }
  timeleft -= 1;
}, 1000);