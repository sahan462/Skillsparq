
    // Function to toggle the visibility of the reply text box
    function toggleReplyBox() {
        var replyBox = document.getElementById('replyBox');
        replyBox.style.display = (replyBox.style.display === 'none') ? 'block' : 'none';
    }

    // Function to handle reply submission (you can customize this as needed)
    function submitReply() {
        var replyText = document.querySelector('#replyBox textarea').value;
        alert('Reply submitted: ' + replyText);
        toggleReplyBox();  // Optionally hide the reply box after submission
    }
