// ---------------------------------------Chat functionality - Web Socket--------------------------------------------------------log

// create a connection 
var conn = new WebSocket(`ws://localhost:8080?chatId=${chatId}`);
const chatAnimation = document.getElementById('chatAnimation');
var chatID = '';

// function which is get executed when a new message is sent
var chatForm = document.getElementById('chatForm');
chatForm.addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission behavior
    
    var senderId = document.getElementById('senderId').value;
    var receiverId = document.getElementById('receiverId').value;
    chatID = document.getElementById('chatId').value;
    var newMessage = document.getElementById('newMessage').value;
    var attachmentInput = document.getElementById('messageAttachement');
    var attachment = attachmentInput.files.length > 0 ? attachmentInput.files[0] : null;
    
    var reader = new FileReader();
    reader.onload = function(event) 
    {
        var data = {
            senderId: senderId,
            receiverId: receiverId,
            chatId: chatID,
            newMessage: newMessage,
            attachment: event.target.result, // Convert attachment to base64 and send
            command: 'private'
          };
        conn.send(JSON.stringify(data));
    };
    
    if (attachment){
        reader.readAsDataURL(attachment); // Convert attachment to base64
    } else {
        var data = {
            senderId: senderId,
            receiverId: receiverId,
            chatId: chatID,
            newMessage: newMessage,
            command: 'private'
        };
        conn.send(JSON.stringify(data));
    }
});

// Get the chat container element
const chatContainer = document.getElementById('chatContainer');

// Function to scroll the chat container to the bottom
function scrollToBottom() {
    setTimeout(function() {
        chatContainer.scrollTop = chatContainer.scrollHeight;
    }, 100);}


// onopen method
conn.onopen = function(e) {
    console.log("Connection established!");
};

// onmessage method
conn.onmessage = function(e) {

    // Get the current date and time
    var currentDate = new Date();

    // Format the date and time
    var formattedDate = currentDate.getFullYear() + '-' +
    ('0' + (currentDate.getMonth() + 1)).slice(-2) + '-' +
    ('0' + currentDate.getDate()).slice(-2) + ' ' +
    ('0' + currentDate.getHours()).slice(-2) + ':' +
    ('0' + currentDate.getMinutes()).slice(-2) + ':' +
    ('0' + currentDate.getSeconds()).slice(-2);

    if (chatAnimation) {
        chatAnimation.style.display = 'none';
    }
    console.log(e.data);
    console.log(chatID);
    var data = JSON.parse(e.data);
    var messageComponent = "";

    const from = data.from;

    //check for correct chat id
    if(chatID === data.chatId) { 

        // check for correct user
        if (from == "Me") {

            // console.log("Its me");
            if (data.attachment != null && data.newMessage != null) {

                messageComponent = `
                    <div class="receiver-container">
                        <div class="messageContainer darker">
                            <div class="receiverContent">
                                <img src="./assests/images/profilePictures/${senderProfilePicture}" alt="pro pic" class="attachment-image">
                                <p>
                                    <a href="${data.attachment}" style="display:flex;justify-content:center;align-items:center;" download>
                                    <img src="./assests/images/download.png ?>">
                                    Download Attachment
                                    </a> 
                                    ${data.newMessage}   
                                    <span class="time-left" style="color:black;font-size:12px;"><i>${formattedDate}</i></span>
                                </p>
                            </div>
                        </div>
                    </div>`;

            } else if (data.attachment == null && data.newMessage != null) { 

                messageComponent = `
                    <div class="receiver-container">
                        <div class="messageContainer darker">
                            <div class="receiverContent">
                                <img src="./assests/images/profilePictures/${senderProfilePicture}" alt="pro pic" class="attachment-image">
                                <p class="receiver" >
                                    ${data.newMessage}
                                    <span class="time-left" style="color:black;font-size:12px;"><i>${formattedDate}</i></span>
                                </p>
                            </div>
                        </div>
                    </div>`;

            }else if(data.attachment != null && data.newMessage == null){

                messageComponent = `
                <div class="receiver-container">
                    <div class="messageContainer darker">
                        <div class="receiverContent">
                            <img src="./assests/images/profilePictures/${senderProfilePicture}" alt="pro pic" class="attachment-image">
                            <p>
                                <a href="${data.attachment}" style="display:flex;justify-content:center;align-items:center;" download>
                                <img src="./assests/images/download.png ?>">
                                Download Attachment
                                </a>    
                                <span class="time-left" style="color:black;font-size:12px;"><i>${formattedDate}</i></span>
                            </p>
                        </div>
                    </div>
                </div>`;

            }

        } else {
            //for another user 
            if (data.attachment != null && data.newMessage != null) {

                    messageComponent = `
                        <div class="sender-container">
                            <div class="messageContainer">
                                <div class="senderContent">
                                    <img src="./assests/images/profilePictures/${receiverProfilePicture}" alt="pro pic" class="attachment-image">
                                    <p>
                                        <a href="${data.attachment}" style="display:flex;justify-content:center;align-items:center;" download>
                                        <img src="./assests/images/download.png ?>">
                                        Download Attachment
                                        </a> 
                                        ${data.newMessage}   
                                        <span class="time-left" style="color:black;font-size:12px;"><i>${formattedDate}</i></span>
                                    </p>
                            </div>
                        </div>
                    </div>`;

            } else if (data.attachment == null && data.newMessage != null) { 

                messageComponent = `
                    <div class="sender-container">
                        <div class="messageContainer">
                            <div class="senderContent">
                                <img src="./assests/images/profilePictures/${receiverProfilePicture}" alt="pro pic" class="attachment-image">
                                <p class="receiver" >
                                    ${data.newMessage}
                                    <span class="time-left" style="color:black;font-size:12px;"><i>${formattedDate}</i></span>
                                </p>
                            </div>
                        </div>
                    </div>`;

            }else if(data.attachment != null && data.newMessage == null){

                messageComponent = `
                <div class="sender-container">
                    <div class="messageContainer">
                        <div class="senderContent">
                            <img src="./assests/images/profilePictures/${receiverProfilePicture}" alt="pro pic" class="attachment-image">
                            <p>
                                <a href="${data.attachment}" style="display:flex;justify-content:center;align-items:center;" download>
                                <img src="./assests/images/download.png ?>">
                                Download Attachment
                                </a>    
                                <span class="time-left" style="color:black;font-size:12px;"><i>${formattedDate}</i></span>
                            </p>
                        </div>
                    </div>
                </div>`;

            }

        }
    }

    scrollToBottom();
    document.getElementById('chatContainer').innerHTML += messageComponent;
    document.getElementById('newMessage').value = "";
    document.getElementById('messageAttachement').value = "";

};


// onclose method
conn.onclose = function(e){
  console.log("Connection closed!");
};



// var chatForm = document.getElementById('chatForm');

// chatForm.addEventListener('submit', function(e) {
//     e.preventDefault(); // Prevent the default form submission behavior
    
//     var userId = document.getElementById('userId').value;
//     var newMessage = document.getElementById('newMessage').value;
//     var attachment = document.getElementById('messageAttachement').files[0];

//     var data = {
//         senderId: userId,
//         newMessage: newMessage
//     };

//     conn.send(JSON.stringify(data));
    
//     // Your further logic here (e.g., sending the user ID to the server)
// });



// ---------------------------------------Chat functionality - AJAX--------------------------------------------------------


// var chatArea = document.getElementById('activity');

// function sendMessage(chatId, senderId, receiverId){

//   var newMessage = document.getElementById('newMessage').value.trim();
  
//   if(senderId == null ){
//     alert("sender not found");
//     return;
//   }

//   if(receiverId == null){
//     alert("receiver not found");
//     return;
//   }

//   if(newMessage == ""){
//     alert("Please type something to send");
//     return;
//   }

//   var ajax = new XMLHttpRequest();
//   ajax.onload = function(){
//     if(ajax.status == 200 || ajax.readyState == 4){
//         var response = JSON.parse(ajax.responseText);
//         if(response.success){
//             document.getElementById('newMessage').value = "";
//         } else {
//             alert("Failed to send message: " + response.error);
//         }
//     } else {
//         alert("Error: " + ajax.status);
//     } 
//   }

//   ajax.open('POST', 'chat/sendNewTextMessage', true);
//   // Set the Content-Type header to specify that the data being sent is JSON
//   ajax.setRequestHeader("Content-Type", "application/json");

//   // Create a JavaScript object to hold the message data
//   var messageData = {
//     message: newMessage,
//     chatId: chatId,
//     senderId: senderId,
//     receiverId: receiverId,
//   };

//   // Stringify the messageData object to JSON format
//   var jsonData = JSON.stringify(messageData);

//   // Send the JSON data in the request body
//   ajax.send(jsonData);

// }

