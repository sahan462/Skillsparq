// -----------------------------tab function------------------------------------------------

document.getElementById("defaultOpen").click();

function openTab(evt, tabName) 
{

  // Declare all variables
  var i, tabContent, tablinks;

  // Get all elements with class="tabContent" and hide them
  tabContent = document.getElementsByClassName("tabContent");
  for (i = 0; i < tabContent.length; i++) {
    tabContent[i].style.display = "none";
  }

  //Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(tabName).style.display = "flex";
  evt.currentTarget.className += " active";

}


// ---------------------------------------Timer--------------------------------------------------------

// Set the date we're counting down to
var countDownDate = new Date("Oct 12, 2024 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() 
{

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);


// ---------------------------------------modals--------------------------------------------------------

function confirmAction(action) 
{

  if (action === 'send') {
  
    document.getElementById('sendComplaintOverlay').style.display = 'flex';
    document.getElementById('sendConfirmation').style.display = 'block';
  
  } else if(action === 'cancel') {

    document.getElementById('cancelComplaintOverlay').style.display = 'flex';
    document.getElementById('cancelConfirmation').style.display = 'block';
  
  } 

}

function handleConfirmation(event, action, orderId, orderType, buyerId, sellerId) 
{
    
  if(event === 'withdraw request' || event === 'reject request' || event === 'cancel order') {
    
    document.getElementById('cancelConfirmation').style.display = 'none';
    document.getElementById('cancelComplaintOverlay').style.display = 'none';

    if(action === 'yes'){

        cancelOrder(orderId, orderType, buyerId, sellerId);

    }

  }else if(event === 'accept request'){
    
    document.getElementById('sendConfirmation').style.display = 'none';
    document.getElementById('sendComplaintOverlay').style.display = 'none';

    if(action === 'yes'){

      acceptOrderRequest(orderId, orderType, buyerId, sellerId);

    }

  }

}


// ---------------------------------------Payment Form submission--------------------------------------------------------

function submitpaymentForm(){
  const paymentForm = document.getElementById('paymentForm');
  paymentForm.submit();
}


// ---------------------------------------Cancel an order--------------------------------------------------------

async function cancelOrder(orderId, orderType, buyerId, sellerId) 
{
  var requestBody = 'orderId=' + encodeURIComponent(orderId) + '&orderType=' + encodeURIComponent(orderType) ;

  try {
      const response = await fetch('order/cancelOrder', {
          method: 'POST',
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

// ---------------------------------------Accept an order request--------------------------------------------------------
async function acceptOrderRequest(orderId, orderType, buyerId, sellerId)
{
  var requestBody = 'orderId=' + encodeURIComponent(orderId) + '&orderType=' + encodeURIComponent(orderType) ;

  try {
      const response = await fetch('order/acceptOrderRequest', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: requestBody,
      });
      
      if (!response.ok) {
          throw new Error('Network response was not ok');
      }

      alert("Order Accepted successfully");
      window.location.href = 'order&orderId=' + encodeURIComponent(orderId) + '&orderType=' + encodeURIComponent(orderType) + '&buyerId=' + encodeURIComponent(buyerId) + '&sellerId=' + encodeURIComponent(sellerId);
  } catch (error) {
      console.error('Error:', error);
  }
}


// --------------------------------Complaint Handling--------------------------------
// Function to open the modal
function openComplaintModal(button) 
{
  document.getElementById('overlay').style.display = 'flex';
  document.getElementById('packageModal').style.display = 'block';
}

function confirmAction(action) 
{
  var sendComplaintOverlay = document.getElementById("sendComplaintOverlay");
  var sendComplaint = document.getElementById("sendComplaint");
  var cancelComplaintOverlay = document.getElementById("cancelComplaintOverlay");
  var cancelComplaint = document.getElementById("cancelComplaint");

  if (action === "send") {

    sendComplaintOverlay.style.display = "flex";
    sendComplaint.style.display = "block";

  } else if (action === "cancel") {

    cancelComplaintOverlay.style.display = "flex";
    cancelComplaint.style.display = "block";

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
  const sendComplaint = document.getElementById('sendComplaint');
  const sendComplaintOverlay = document.getElementById('sendComplaintOverlay');
  const cancelComplaint = document.getElementById('cancelComplaint');
  const cancelComplaintOverlay = document.getElementById('cancelComplaintOverlay');
  var fileNameSpan = document.getElementById('fileName');

  if (action === 'sendYes') {

      // Check if the input field is not empty
      if (complaintSubject.value.trim() === '') { 
        
          warningMessage[0].textContent = "Please fill in the subject field before submitting.";
          sendComplaint.style.display = 'none';
          sendComplaintOverlay.style.display = 'none';
          return; 

      }else{

          warningMessage[0].textContent = ""; 

      }

      if(complaintDescription.value.trim() === '') { 

          warningMessage[1].textContent = "Please fill in the description field before submitting.";
          sendComplaint.style.display = 'none';
          sendComplaintOverlay.style.display = 'none';
          return;

      }else{

        warningMessage[1].textContent = "";

      }

      var sendRequestForm = document.getElementById('sendRequestForm');
      sendRequestForm.submit();

  }else if (action === 'sendNo'){

      sendComplaint.style.display = 'none';
      sendComplaintOverlay.style.display = 'none';

  }else if(action === 'cancelNo'){

      cancelComplaintOverlay.style.display = 'none';
      cancelComplaint.style.display = 'none';

  }else{

      fileNameSpan.textContent = '';
      cancelComplaintOverlay.style.display = 'none';
      cancelComplaint.style.display = 'none';
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
  