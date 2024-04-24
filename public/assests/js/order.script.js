// -----------------------------tab function------------------------------------------------

document.getElementById("defaultOpen").click();

function openTab(evt, tabName) {

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
var x = setInterval(function() {

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

function confirmAction(action) {

  if (action === 'send') {
  
    document.getElementById('sendConfirmationOverlay').style.display = 'flex';
    document.getElementById('sendConfirmation').style.display = 'block';
  
  } else if(action === 'cancel') {

    document.getElementById('cancelConfirmationOverlay').style.display = 'flex';
    document.getElementById('cancelConfirmation').style.display = 'block';
  
  } 

}

function handleConfirmation(event, action, orderId, orderType, buyerId, sellerId) {
    
  if(event === 'withdraw request' || event === 'reject request' || event === 'cancel order') {
    
    document.getElementById('cancelConfirmation').style.display = 'none';
    document.getElementById('cancelConfirmationOverlay').style.display = 'none';

    if(action === 'yes'){

        cancelOrder(orderId, orderType, buyerId, sellerId);

    }

  }else if(event === 'accept request'){
    
    document.getElementById('sendConfirmation').style.display = 'none';
    document.getElementById('sendConfirmationOverlay').style.display = 'none';

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

async function cancelOrder(orderId, orderType, buyerId, sellerId) {
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

async function acceptOrderRequest(orderId, orderType, buyerId, sellerId) {
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

//declare variable to keep track of the clicked button
var button = "";

// Function to open the modal
function openComplaintModal(button) {
  packageForm = button.id;
  document.getElementById('overlay').style.display = 'flex';
  document.getElementById('packageModal').style.display = 'block';
}

function confirmAction(action) {
  var sendConfirmationOverlay = document.getElementById("sendComplaintOverlay");
  var sendConfirmationModal = document.getElementById("sendComplaint");
  var cancelConfirmationOverlay = document.getElementById("cancelComplaintOverlay");
  var cancelConfirmationModal = document.getElementById("cancelComplaint");

  if (action === "send") {
    sendConfirmationOverlay.style.display = "flex";
    sendConfirmationModal.style.display = "block";
  } else if (action === "cancel") {
    cancelConfirmationOverlay.style.display = "flex";
    cancelConfirmationModal.style.display = "block";
  }
}


// Function to handle actions based on user confirmation
function handleConfirmation(action) {
  if (action === 'sendYes') {

      var warningMessage = document.getElementsByClassName('warningMessage');
      var complaintSubject = document.getElementById('complaintSubject').value; // Replace 'inputField' with the actual ID of your input field
      var complaintDescription = document.getElementById('complaintDescription').value;

      // Check if the input field is not empty
      if (complaintSubject.trim() === '') { // Trim whitespace and check if empty
          warningMessage[0].textContent = "Please fill in the subject field before submitting.";

          document.getElementById('sendComplaint').style.display = 'none';
          document.getElementById('sendComplaintOverlay').style.display = 'none';

          return; // Prevent form submission
      }

      if(complaintDescription.trim() === '') { 
          warningMessage[1].textContent = "Please fill in the description field before submitting.";
          return;
      }

      var sendRequestForm = document.getElementById('sendRequestForm');
      sendRequestForm.submit();

  }else if (action === 'sendNo'){

      document.getElementById('sendComplaint').style.display = 'none';
      document.getElementById('sendComplaintOverlay').style.display = 'none';

  }else if(action === 'cancelNo'){

      document.getElementById('cancelComplaint').style.display = 'none';
      document.getElementById('cancelComplaintOverlay').style.display = 'none';

  }else{

    packageForm = "";

    var fileNameSpan = document.getElementById('fileName');

    document.getElementById('cancelComplaintOverlay').style.display = 'none';
    document.getElementById('cancelComplaint').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('packageModal').style.display = 'none';
    document.getElementById('warningMessage').style.display = 'none';

    fileNameSpan.textContent = '';
  }

}