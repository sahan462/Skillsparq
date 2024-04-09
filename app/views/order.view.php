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
    $order['orderStatus'] = 'Accepted';
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

?>

<!-- Main Container -->
<div class="orderContainer"> 

    <!-- Tab Section -->
    <div class="orderContainerHeader">
        <button id="active" class="tablinks" onclick="openTab(event, 'activity')">Activity</button>
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
                <?php 

                if($_SESSION['role'] == "Buyer"){
                    
                ?>
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

                            <?php 
                                if  ($order['orderStatus'] == 'Request') {
                            ?>
                                    <span>Order Request expires in :</span>
                                    <div class="row">
                                        <button class="buttonType-1">Accept</button>
                                        <button class="buttonType-2">Reject</button>
                                    </div>

                            <?php }else if($order['orderStatus'] == 'Accepted' && $order['paymentStaus'] == "Pending"){ ?>
                                
                                <div class="row">
                                    <button class="buttonType-1">Proceed to Pay</button>
                                    <button class="buttonType-2">Cancel Order</button>
                                </div>

                            <?php }else if($order['orderStatus'] == 'Active' && $order['paymentStaus'] == "Paid"){ ?>
                                Paid
                            <?php }?>

                        </div>
                    </div>

                <?php }else if($_SESSION['role'] == "Seller") {?>
                    
                    <div class="deadline">
                        <span>Time Left to Receive :</span>
                        <div class="timer">
                            <p id="demo"></p>
                        </div>
                    </div>

                    <div class="orderStatus">

                        <div class="orderStatusHeader">
                            <span>Current Status of Order :</span>
                            <span>Waiting for Seller Response</span>
                        </div>

                        <div class="orderStatusData">

                            <?php 
                                if  ($order['orderStatus'] == 'Request') {
                            ?>
                                    <span>Order Request expires in :</span><br>
                                    <button class="buttonType-2">withdraw your request</button>

                            <?php }else if($order['orderStatus'] == 'Accepted' && $order['paymentStaus'] == "Pending"){ ?>

                                Pending Payments

                            <?php }else if($order['orderStatus'] == 'Active' && $order['paymentStaus'] == "Paid"){ ?>

                                Paid

                            <?php }?>

                        </div>
                    </div>
                    
                <?php } ?>

            </div>
            
            <!-- Animation -->
            <div class="orderDetailsBottomContainer">
                <img src="https://npm-assets.fiverrcdn.com/assets/@fiverr-private/earnings/high-five-illustration.28505d2.png" style="height: 360px; width: fit-content;">
            </div>

        </div>
    </div>
</div>

<script src="./assests/js/order.script.js"></script>

<?php include "components/footer.component.php"; ?>
