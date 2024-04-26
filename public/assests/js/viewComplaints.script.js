function updateUserBlacklistBuyer() {
    var selectedDays = document.getElementById('blacklistUntil').value;
    var reason = document.getElementById('blackListReason').value; // Ensure you are capturing the reason correctly
    var confirmAction = confirm("Are you sure you want to blacklist Buyer ID " + <?php echo json_encode($row['buyer_id']); ?> + " for " + selectedDays + " days?");

    if (confirmAction) {
        document.getElementById('user_id_to_blacklist').value = <?php echo json_encode($row['buyer_id']); ?>;
        document.getElementById('user_email_to_blacklist').value = <?php echo json_encode($row['buyer_email']); ?>;
        document.getElementById('blacklistUntil').value = selectedDays;
        document.getElementById('reason').value = reason;


        // Manually set the action if it's not preset or needs to be dynamic
        // Set the correct path to your processing script
        document.getElementById('blacklistForm').submit();
    } else {
        alert("Operation canceled.");
    }
}


function displayRefund() {
    document.getElementById('response').style.display = 'block';
    document.getElementById('refund').style.display = 'block';
    document.getElementById('displayRefund').style.display = 'none';
    document.getElementById('hideRefund').style.display = 'block';
}




function refund() {

    var response = document.getElementById("response").value;
    var confirmation = confirm('Are you sure that you want to send a refund request to the admin?');
    var buyerID = <?php echo $row['buyer_id']; ?>

    if (confirmation) {
        var paymentId = <?php echo $row['payment_id']; ?>; // Set the payment ID here
        document.getElementById("payment_id").value = paymentId;
        document.getElementById("sendResponse").value = response;
        document.getElementById("buyerID").value = buyerID
        document.getElementById("refundForm").submit();
    }
}

function updateUserBlacklistSeller() {
    var selectedDays = document.getElementById('blacklistUntil').value;
    var reason = document.getElementById('blackListReason').value; // Ensure you are capturing the reason correctly
    var confirmAction = confirm("Are you sure you want to blacklist Buyer ID " + <?php echo json_encode($row['seller_id']); ?> + " for " + selectedDays + " days?");

    if (confirmAction) {
        document.getElementById('user_id_to_blacklist').value = <?php echo json_encode($row['seller_id']); ?>;
        document.getElementById('user_email_to_blacklist').value = <?php echo json_encode($row['seller_email']); ?>;
        document.getElementById('blacklistUntil').value = selectedDays;
        document.getElementById('reason').value = reason;



        // Manually set the action if it's not preset or needs to be dynamic
        // Set the correct path to your processing script
        document.getElementById('blacklistForm').submit();
    } else {
        alert("Operation canceled.");
    }


}