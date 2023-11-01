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
