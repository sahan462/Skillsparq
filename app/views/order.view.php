<?php
    if($_SESSION['role'] == 'Buyer'){
        include "components/buyerSimpleHeader.component.php";
    }else if($_SESSION['role'] == 'Seller'){
        include "components/sellerHeader.component.php";
    }
?>

<?php 
    $userRole = 'buyer';
    $order['orderType'] = 'package';
    $order['orderStatus'] = 'Accepted/Pending Payments';//Requested->Accepted/Pending Payments->Accepted/Paid
    $order['paymentStaus'] = 'Pending';

?>


<?php 
    $data['buyerRequirement'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
    sed do eiusmod tempor incididunt ut labore et dolore magna 
    aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
    eiusmod tempor incididunt ut labore et dolore magna aliqua." ;
    
    $data["filename"] = "file.zip";
    $data["buyerProfilePicture"] = "chamal.jpg";
    $data["firstName"] = "Chamal";
    $data["lastName"] = "Fernando";
    $data["orderId"] = 11;
?>

<!-- Main Container -->
<div class="orderContainer"> 


    <!-- Modal 1 -->
    <div class="overlay" id="cancelConfirmationOverlay">
        <div class="confirmation" id="cancelConfirmation">
            <p>Are you sure want to cancel your order?</p>
            <div class="buttons">
                <button onclick="handleConfirmation('cancelNo', '', '')">No</button>
                <button onclick="handleConfirmation('cancelYes', <?php echo $data['orderId']?>, '<?php echo $order['orderType']?>')">Yes</button>
            </div>
        </div>
    </div>

    <!-- Tab Section -->
    <div class="orderContainerHeader">
        <button id="defaultOpen" class="tablinks" onclick="openTab(event, 'activity')">Activity</button>
        <button class="tablinks" onclick="openTab(event, 'details')">Order Details</button>
    </div>

    <!-- Tab Content -->
    <div class="orderContent">

        <!-- Left Container -->
        <div class="userActivity">

            <!-- Tab 1  -->
            <div id="activity" class="tabContent" >
                Activity
            </div>

            <!-- Tab 2 -->
            <div id="details" class="tabContent" style="display:none;">

                <!-- buyer requirements -->
                <h3>Buyer Requirement</h3>
                <p><?php echo $data['buyerRequirement'] ?></p>

                <!-- attachements -->
                <h3>Attachement</h3>
                <div class="attachement">
                    <span><?php echo $data['filename'] ?></span>
                    <span><button>Click here to Download!</button></span>
                </div>

                <!-- buyer details -->
                <h3>Buyer Details</h3>
                <div class="buyerDetails">
                    <div class="buyer">
                        <img class="gig-profile-image" src="../public/assests/images/<?php echo $data["buyerProfilePicture"]?>" loading="lazy">
                        <div class="name&rating">
                            <span><?php echo $data['firstName']." ".$data['lastName'];?></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Right Container -->
        <div class="orderDetails">

            <!-- Right Container Upper Part -->
            <div class="orderDetailsUpperContainer">

                <!-- Seller View -->
                <?php if($_SESSION['role'] == "Buyer") { ?>

                    <!-- Timer -->
                    <div class="deadline">

                        <span>Time Left to Deliver :</span>
                        <div class="timer">
                            <p id="demo"></p>
                        </div>

                    </div>

                    <div class="orderStatus">

                        <div class="orderStatusHeader">
                            <span>Current Status of Order :</span>
                            <span><?php echo $order['orderStatus'] ?></span>
                        </div>

                        <div class="orderStatusData">

                            <!-- Requested State -->
                            <?php if  ($order['orderStatus'] == 'Requested') { ?>

                                <button class="buttonType-2">withdraw your Request</button>

                            <!-- Accepted State Waiting for Payments -->
                            <?php } else if($order['orderStatus'] == 'Accepted/Pending Payments'){ ?>
                                

                                <?php

                                    $merchant_id = 1224879;
                                    $order_id = $data["orderId"];
                                    $amount = 10;
                                    $currency = "USD";
                                    $merchant_secret = "MzE1ODIzOTcyNDE3ODQ1NjA3MDkxNTI2MTU2OTMyMjE4MDMzMjI4MQ==";

                                    $hash = strtoupper(
                                        md5(
                                            $merchant_id. 
                                            $order_id . 
                                            number_format($amount, 2, '.', '') . 
                                            $currency .  
                                            strtoupper(md5($merchant_secret)) 
                                        ) 
                                    );
                                
                                ?>
                                
                                <!-- Payment https://sandbox.payhere.lk/pay/checkout -->
                                <form method="post" action="<?php echo BASEURL.'order/verifyPayment';?>" id="paymentForm">   

                                    <input type="hidden" name="merchant_id" value="1224879">    
                                    <input type="hidden" name="return_url" value="skillsparq/public/order&orderId=11">
                                    <input type="hidden" name="cancel_url" value="skillsparq/public/order&orderId=11">
                                    <input type="hidden" name="notify_url" value="skillsparq/public/order/verifyPayment">  
                                    <input type="hidden" name="order_id" value="11">
                                    <input type="hidden" name="order_type" value="<?php echo $order['orderType']?>">
                                    <input type="hidden" name="items" value="Door bell wireless">
                                    <input type="hidden" name="currency" value="USD">
                                    <input type="hidden" name="amount" value="10">  
                                    <input type="hidden" name="first_name" value="Saman">
                                    <input type="hidden" name="last_name" value="Perera">
                                    <input type="hidden" name="email" value="samanp@gmail.com">
                                    <input type="hidden" name="phone" value="0771234567">
                                    <input type="hidden" name="address" value="No.1, Galle Road">
                                    <input type="hidden" name="city" value="Colombo">
                                    <input type="hidden" name="country" value="Sri Lanka">
                                    <input type="hidden" name="hash" value="<?php echo $hash ?>">  

                        
                                </form>


                                <div class="row">
                                    <button class="buttonType-1" onclick="submitForm()">Proceed to Pay</button>
                                    <button class="buttonType-2" onclick="confirmAction('cancel')">Cancel Order</button>
                                </div>
                                        
                            <!-- Accepted and Paid -->
                            <?php } else if($order['orderStatus'] == 'Accepted/Paid'){ ?>


                            <!-- Accepted State / Paid/ Running-->
                            <?php } else if($order['orderStatus'] == 'Running') { ?>
                                    
                                Paid
                            
                            <?php } ?>

                        </div>
                    </div>


                <!-- Buyer View -->
                <?php } else if($_SESSION['role'] == "Seller") { ?>
                    
                    <div class="deadline">
                        <span>Time Left to Receive :</span>
                        <div class="timer">
                            <p id="demo"></p>
                        </div>
                    </div>

                    <div class="orderStatus">

                        <div class="orderStatusHeader">
                            <span>Current Status of Order :</span>
                            <span><?php echo $order['orderStatus'] ?></span>
                        </div>

                        <!-- Order States -->
                        <div class="orderStatusData">

                            <!-- Requested State -->
                            <?php if  ($order['orderStatus'] == 'Requested') { ?>

                                <!-- <span>Order Requested expires in :</span> -->
                                <div class="row">
                                    <button class="buttonType-1">Accept</button>
                                    <button class="buttonType-2">Reject</button>
                                </div>

                            <!-- Accepted State Waiting for Payments -->
                            <?php } else if($order['orderStatus'] == 'Accepted/Pending Payments') { ?>


                                Pending Payments
                            <!-- Accepted and Paid -->
                            <?php } else if($order['orderStatus'] == 'Accepted/Paid') { ?>

                            <!-- Rejected State -->
                            <?php } else if($order['orderStatus'] == 'Rejected') { ?>

                            <!-- Accepted State / Paid/ Running-->
                            <?php } else if($order['orderStatus'] == 'Running') { ?>

                                Paid

                            <?php } else if($order['orderStatus'] == 'Pending Payments') { ?>

                            <?php } ?>

                        </div>
                    </div>
                    
                <?php 

                    } 

                ?>

            </div>
            
            <!-- Animation -->
            <div class="orderDetailsBottomContainer">
                <img src="https://npm-assets.fiverrcdn.com/assets/@fiverr-private/earnings/high-five-illustration.28505d2.png" style="height: 360px; width: fit-content;">
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="./assests/js/order.script.js"></script>

<?php include "components/footer.component.php"; ?>
