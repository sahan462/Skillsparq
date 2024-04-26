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


// Wait for the DOM content to be loaded
document.addEventListener("DOMContentLoaded", function() {
    // Get all job cards
    const jobCards = document.querySelectorAll('.job-card');

    // Iterate over each job card
    jobCards.forEach(jobCard => {
        // Check if the job card contains the job data auction div
        const jobDataAuction = jobCard.querySelector('.job-data-auction');

        if (jobDataAuction) {
            // If the job data auction div is present, hide the entire job card
            jobCard.style.display = 'none';
        }
    });
});


// let selectMenu = document.querySelector("#SellerDashSelectJobType");
// let container = document.querySelector(".jobContent");
// let heading = document.querySelector(".jobs h3");

// selectMenu.addEventListener("change",function(){
//     let categoryName = this.value;
//     heading.innerHTML = this[this.selectedIndex].text;
//     let http = new XMLHttpRequest();

//     http.open('GET',"script.php");
//     http.setRequestHeader("content-type","application/x-www-form-urlencoded")
//     http.send("category="+categoryName)
// })

$(document).ready(function(){
    $('#SellerDashSelectJobType').on('change',function(){
        var value = $(this).val();
        // alert(value);

        $.ajax({
            url:"fetch.php",
            type:"GET",
            data:"request="+value;
            beforeSend:function(){
                $('.jobContent').html("<span>Working...</span>")
            },
            success:function(){
                $(".jobContent").html(data);
            }
        });
    })
})


// ---------------------------------------Change the Publish Mode--------------------------------------------------------
async function changeMode(jobId,buyerId) 
{
  var requestBody = 'jobId=' + encodeURIComponent(jobId) + '&buyerId=' + encodeURIComponent(buyerId) ;

  try {
      const response = await fetch('order/cancelOrder', {
          method: 'GET',
          headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: requestBody,
      });
      
      if (!response.ok) {
          throw new Error('Network response was not ok');
      }

      alert("Order cancelled successfully");
      window.location.href = 'order&orderId=' + encodeURIComponent(orderId) + '&orderType=' + encodeURIComponent(orderType) + '&buyerId=' + encodeURIComponent(buyerId) + '&sellerId=' + encodeURIComponent(sellerId);
  } catch (error) {
      console.error('Error:', error);
  }
}
