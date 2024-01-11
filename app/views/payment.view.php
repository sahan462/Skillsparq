<?php include "components/buyerSimpleHeader.component.php"; ?>

<div class="paymentContainer">
    <form method="post" action="https://sandbox.payhere.lk/pay/authorize">   
        <input type="hidden" name="merchant_id" value="1224879">    <!-- Replace your Merchant ID -->
        <input type="hidden" name="return_url" value="http://sample.com/return">
        <input type="hidden" name="cancel_url" value="http://sample.com/cancel">
        <input type="hidden" name="notify_url" value="http://sample.com/notify">  
        <input type="text" name="order_id" value="Order12345">
        <input type="text" name="items" value="Toy car"><br>
        <input type="text" name="currency" value="LKR">
        <input type="text" name="amount" value="1000">  
        <br><br>Customer Details<br>
        <input type="text" name="first_name" value="Saman">
        <input type="text" name="last_name" value="Perera"><br>
        <input type="text" name="email" value="samanp@gmail.com">
        <input type="text" name="phone" value="0771234567"><br>
        <input type="text" name="address" value="No.1, Galle Road">
        <input type="text" name="city" value="Colombo">
        <input type="hidden" name="country" value="Sri Lanka">
        <input type="hidden" name="hash" value="098F6BCD4621D373CADE4E832627B4F6">    <!-- Replace with generated hash -->
        <input type="submit" value="Authorize">   
    </form> 
</div>




<script src="./assests/js/displayGig.script.js"></script>

<?php include "components/footer.component.php"?>