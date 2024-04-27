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
            console.log("Its me");

            if (data.attachment) {
                if (isBase64Image(data.attachment)) {
                    messageComponent = `
                        <div class="receiver-container">
                            <div class="messageContainer darker">
                                <div class="receiverContent">
                                    <img src="./assests/images/profilePictures/${senderProfilePicture}" alt="Attachment" class="attachment-image">
                                    <p class="receiver" >
                                        ${data.newMessage}
                                        <img src="${data.attachment}" alt="Attachment" class="attachment-image">
                                        <span class="time-left">11:01</span>
                                    </p>
                                </div>
                            </div>
                        </div>`;
                } else {
                    messageComponent = `
                        <div class="receiver-container">
                            <div class="messageContainer darker">
                                <div class="receiverContent">
                                    ${data.newMessage} (Attachment: <a href="${data.attachment}" download>Download Attachment</a>)
                                    <span class="time-left">11:01</span>
                                </div>
                            </div>
                        </div>`;
                }
            } else {
                messageComponent = `
                    <div class="receiver-container">
                        <div class="messageContainer darker">
                            <div class="receiverContent">
                                <p class="receiver" >
                                    ${data.newMessage}
                                    <span class="time-left">11:01</span>
                                </p>
                            </div>
                        </div>
                    </div>`;
            }

        } else {

            console.log("another user");
            if (data.attachment) {
                if (isBase64Image(data.attachment)) {
                    messageComponent = `
                        <div class="sender-container">
                            <div class="messageContainer">
                                <div class="senderContent">
                                <img src="./assests/images/profilePictures/${senderProfilePicture}" alt="Attachment" class="attachment-image">
                                <p class="receiver" >
                                    ${data.newMessage}
                                    <img src="${data.attachment}" alt="Attachment" class="attachment-image">
                                    <span class="time-right">11:00</span>
                                </p>
                                </div>
                            </div>
                        </div>`;
                } else {
                    messageComponent = `
                        <div class="sender-container">
                            <div class="messageContainer">
                                <div class="senderContent">
                                    ${data.newMessage} (Attachment: <a href="${data.attachment}" download>Download Attachment</a>)
                                    <span class="time-right">11:00</span>
                                </p>
                            </div>
                        </div>
                    </div>`;
                }
            } else {
                messageComponent = `
                    <div class="sender-container">
                        <div class="messageContainer">
                            <div class="senderContent">
                                <p class="P" >
                                    ${data.newMessage}
                                    <span class="time-right">11:00</span>
                                </p>
                            </div>
                        </div>
                    </div>`;
            }

        }
    }

    scrollToBottom();
    document.getElementById('chatContainer').innerHTML += messageComponent;

};


// check whether the attachement is an image or not
function isBase64Image(base64) {
  return /^data:image\/(png|jpg|jpeg|gif);base64,/.test(base64);
}



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

