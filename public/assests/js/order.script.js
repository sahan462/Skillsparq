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

      alert("Order cancelled successfully");
      window.location.href = 'order&orderId=' + encodeURIComponent(orderId) + '&orderType=' + encodeURIComponent(orderType) + '&buyerId=' + encodeURIComponent(buyerId) + '&sellerId=' + encodeURIComponent(sellerId);
  } catch (error) {
      console.error('Error:', error);
  }
}

// ---------------------------------------Chat functionality - Web Socket--------------------------------------------------------log

var conn = new WebSocket(`ws://localhost:8080?chatId=${chatId}`);

conn.onopen = function(e) {
    console.log("Connection established!");
};

conn.onmessage = function(e) {
    console.log(e.data);

    var data = JSON.parse(e.data);
    var messageComponent = "";

    if(data.from == "Me")
    {

      var messageComponent = 
      `
      <div class="receiver-container">
          <div class="messageContainer darker">
              <div class="receiverContent">
                  <img src="./assests/images/profilePictures/${senderProfilePicture}" alt="Avatar" class="right">
                  <p class="receiver" >
                      ${data.newMessage}
                      <span class="time-left">11:01</span>
                  </p>
              </div>
          </div>
      </div>`;

    }else{

      var messageComponent = 
      `
      <div class="sender-container">
          <div class="messageContainer">
              <div class="senderContent">
                <img src="./assests/images/profilePictures/${receiverProfilePicture}" alt="Avatar" class="right">
                <p class="P" >
                  ${data.newMessage}
                  <span class="time-right">11:00</span>
                </p>
              </div>
          </div>
      </div>
      `;

    }

    document.getElementById('chatContainer').innerHTML += messageComponent;
    
};


conn.onclose = function(e){

  console.log("Connection closed!");

};



var chatForm = document.getElementById('chatForm');

chatForm.addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission behavior
    
    var userId = document.getElementById('userId').value;
    var newMessage = document.getElementById('newMessage').value;
    var attachment = document.getElementById('messageAttachement').files[0];

    var data = {
        senderId: userId,
        newMessage: newMessage
    };

    conn.send(JSON.stringify(data));
    
    // Your further logic here (e.g., sending the user ID to the server)
});



// ---------------------------------------Chat functionality - AJAX--------------------------------------------------------


var chatArea = document.getElementById('activity');

function sendMessage(chatId, senderId, receiverId){

  var newMessage = document.getElementById('newMessage').value.trim();
  
  if(senderId == null ){
    alert("sender not found");
    return;
  }

  if(receiverId == null){
    alert("receiver not found");
    return;
  }

  if(newMessage == ""){
    alert("Please type something to send");
    return;
  }

  var ajax = new XMLHttpRequest();
  ajax.onload = function(){
    if(ajax.status == 200 || ajax.readyState == 4){
        var response = JSON.parse(ajax.responseText);
        if(response.success){
            document.getElementById('newMessage').value = "";
        } else {
            alert("Failed to send message: " + response.error);
        }
    } else {
        alert("Error: " + ajax.status);
    } 
  }

  ajax.open('POST', 'chat/sendNewTextMessage', true);
  // Set the Content-Type header to specify that the data being sent is JSON
  ajax.setRequestHeader("Content-Type", "application/json");

  // Create a JavaScript object to hold the message data
  var messageData = {
    message: newMessage,
    chatId: chatId,
    senderId: senderId,
    receiverId: receiverId,
  };

  // Stringify the messageData object to JSON format
  var jsonData = JSON.stringify(messageData);

  // Send the JSON data in the request body
  ajax.send(jsonData);

}

