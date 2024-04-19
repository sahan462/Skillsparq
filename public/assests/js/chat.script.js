// ---------------------------------------Chat functionality--------------------------------------------------------

var conn = new WebSocket('ws://localhost:8080');
conn.onopen = function(e) {
    console.log("Connection established!");
};

conn.onmessage = function(e) {
    console.log(e.data);

    var data = JSON.parse(e.data);

    if(data.from == "Me")
    {
        var messageComponent = 
        `
        <div class="receiver-container">
            <div class="messageContainer darker">
                <div class="receiverContent">
                    <img src="<?php echo $data["senderProfilePicture"] ?>" alt="Avatar" class="right">
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
                    <img src="<?php echo $data["receiverProfilePicture"] ?>" alt="Avatar">
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
