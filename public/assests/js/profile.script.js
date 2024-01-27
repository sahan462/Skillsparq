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
  
