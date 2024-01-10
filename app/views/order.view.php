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
    $order['orderStatus'] = 'Request';
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

            <?php 

            if($_SESSION['role'] == "Buyer"){
                
            ?>
                <div class="deadline">
                    <div class="type-1">
                        <span>Time Left to Deliver :</span>
                    </div>
                    <div class="timer">
                        <p id="demo"></p>
                    </div>
                </div>

                <div class="orderStatus">
                    <div class="orderStatusHeader">
                        <div class="row">
                            <div class="type-1">
                                <span>Current Status of Order :</span>
                            </div>
                            <?php echo $order['orderStatus'] ?>
                        </div>
                    </div>
                    <div class="orderStatusData">

                        <?php 
                            if  ($order['orderStatus'] == 'Request') {
                        ?>
                                <span>Order Request expires in :</span>
                                <div class="row">
                                    <button class="acceptButton">Accept</button>
                                    <button class="rejectButton">Reject</button>
                                </div>

                        <?php }else if($order['orderStatus'] == 'Active' && $order['paymentStaus'] == "Pending"){ ?>
                            Pending Payments
                            <?php if($userRole == "buyer"){ ?>
                                <a href="payment"><button>Proceed to Payment</button></a>
                            <?php } ?>
                        <?php }else if($order['orderStatus'] == 'Active' && $order['paymentStaus'] == "Paid"){ ?>
                            Paid
                        <?php }?>

                    </div>
                </div>

            <?php }else if($_SESSION['role'] == "Seller") {?>
                
                <div class="deadline">
                    <div class="type-1">
                        <span>Time Left to Receive :</span>
                    </div>
                    <div class="timer">
                        <p id="demo"></p>
                    </div>
                </div>

                <div class="orderStatus">
                    <div class="orderStatusHeader">
                        <div class="row">
                            <span>Current Status of Order :</span>
                            <?php echo $order['orderStatus'] ?>
                        </div>
                    </div>
                    <div class="orderStatusData">

                        <?php 
                            if  ($order['orderStatus'] == 'Request') {
                        ?>
                                <span>Order Request expires in :</span><br>
                                <span>Waiting for Seller Response</span>
                                <!-- <div class="row">
                                    <button class="acceptButton">Accept</button>
                                    <button class="rejectButton">Reject</button>
                                </div> -->

                        <?php }else if($order['orderStatus'] == 'Active' && $order['paymentStaus'] == "Pending"){ ?>
                            Pending Payments
                            <?php if($userRole == "buyer"){ ?>
                                <a href="payment"><button>Proceed to Payment</button></a>
                            <?php } ?>
                        <?php }else if($order['orderStatus'] == 'Active' && $order['paymentStaus'] == "Paid"){ ?>
                            Paid
                        <?php }?>

                    </div>
                </div>
                
            <?php } ?>

            <div class="Details">
                <img src="https://npm-assets.fiverrcdn.com/assets/@fiverr-private/earnings/high-five-illustration.28505d2.png">
            </div>
        </div>
    </div>
</div>

<script src="./assests/js/order.script.js"></script>

<?php include "components/footer.component.php"; ?>
