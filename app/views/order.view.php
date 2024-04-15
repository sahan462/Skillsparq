<?php
    if($_SESSION['role'] == 'Buyer'){
        include "components/buyerSimpleHeader.component.php";
    }else if($_SESSION['role'] == 'Seller'){
        include "components/sellerHeader.component.php";
    }
?>

<?php 
    $order = $data['order'];
    $buyer = $data['buyer'];
    $seller = $data['seller'];
    $userRole = $_SESSION['role'];
    $state = '';
?>

<!-- Main Container -->
<div class="orderContainer"> 

    <!-- Tab Section -->
    <div class="orderContainerHeader">
        <button id="defaultOpen" class="tablinks" onclick="openTab(event, 'activity')">Activity</button>
        <button class="tablinks" onclick="openTab(event, 'details')">Order Details</button>
        <button class="tablinks" onclick="openTab(event, 'orderHistory')">Order History</button>
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

                <!-- buyer -->
                <?php if($_SESSION['role'] == 'Buyer'){?>

                    <ul>

                        <li>
                            <!-- buyer requirements -->
                            <h3>Your Requirement</h3>
                            <p><?php echo $order['order_description'] ?></p>
                        </li>

                        <li>
                            <!-- attachements -->
                            <h3>Attachements</h3>
                            <div class="attachement">
                                <span><?php echo $order['order_attachement'] ?></span>
                                <span><button>Click here to Download!</button></span>
                            </div>
                        </li>

                        <li>
                            <!-- seller details -->
                            <h3>Seller Details</h3>
                            <div class="buyerDetails">
                                <div class="buyer">
                                    <img class="gig-profile-image" src="../public/assests/images/<?php echo $seller["profile_pic"]?>" loading="lazy">
                                    <div class="name&rating">
                                        <span><?php echo $seller['first_name']." ".$seller['last_name'];?></span>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>

                <!-- seller -->
                <?php }elseif($_SESSION['role'] == 'Seller') {?>

                    <ul>

                        <li>
                            <!-- buyer requirements -->
                            <h3>Buyer Requirement</h3>
                            <p><?php echo $order['order_description'] ?></p>
                        </li>

                        <li>
                            <!-- attachements -->
                            <h3>Attachements</h3>
                            <div class="attachement">
                                <span><?php echo $order['order_attachement'] ?></span>
                                <span><button>Click here to Download!</button></span>
                            </div>
                        </li>

                        <li>
                            <!-- buyer details -->
                            <h3>Buyer Details</h3>
                            <div class="buyerDetails">
                                <div class="buyer">
                                    <img class="gig-profile-image" src="../public/assests/images/<?php echo $buyer["profile_pic"]?>" loading="lazy">
                                    <div class="name&rating">
                                        <span><?php echo $buyer['first_name']." ".$buyer['last_name'];?></span>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>


                <!-- customer support asssistant -->
                <?php }elseif($_SESSION['role'] == 'csa') {?>

                    <ul>

                        <li>
                            <!-- buyer requirements -->
                            <h3>Buyer Requirement</h3>
                            <p><?php echo $order['order_description'] ?></p>
                        </li>

                        <li>
                            <!-- attachements -->
                            <h3>Attachements</h3>
                            <div class="attachement">
                                <span><?php echo $order['order_attachement'] ?></span>
                                <span><button>Click here to Download!</button></span>
                            </div>
                        </li>

                        <li>
                            <!-- buyer details -->
                            <h3>Buyer Details</h3>
                            <div class="buyerDetails">
                                <div class="buyer">
                                    <img class="gig-profile-image" src="../public/assests/images/<?php echo $buyer["profile_pic"]?>" loading="lazy">
                                    <div class="name&rating">
                                        <span><?php echo $buyer['first_name']." ".$buyer['last_name'];?></span>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <!-- seller details -->
                            <h3>Seller Details</h3>
                            <div class="buyerDetails">
                                <div class="buyer">
                                    <img class="gig-profile-image" src="../public/assests/images/<?php echo $seller["profile_pic"]?>" loading="lazy">
                                    <div class="name&rating">
                                        <span><?php echo $seller['first_name']." ".$seller['last_name'];?></span>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>
                
                <?php }else {?>

                <?php } ?>

            </div>

            <div id="orderHistory">

            </div>            


        </div>

        <!-- Right Container -->
        <div class="orderDetails">

            <!-- Right Container Upper Part -->
            <div class="orderDetailsUpperContainer">

                <!-- Buyer View -->
                <?php if($_SESSION['role'] == "Buyer") { ?>

                    <!-- Timer -->
                    <div class="deadline">

                        <span>Time Left to Deliver :</span>
                        <div class="timer">
                            <p id="demo"></p>
                        </div>

                    </div>

                    <!-- State transition -->
                    <div class="orderState">

                        <div class="orderStateHeader">
                            <span>Current Status of Order :</span>
                            <span><?php echo $order['order_state'] ?></span>
                        </div>

                        <div class="orderStateData">

                            <!-- Requested State -->
                            <?php if  ($order['order_state'] == 'Requested') { $state = 'Requested';?>

                                <button class="buttonType-2" onclick="confirmAction('cancel')">withdraw your Request</button>

                            <!-- Accepted State Waiting for Payments -->
                            <?php } else if($order['order_state'] == 'Accepted/Pending Payments'){ $state = 'Accepted/Pending Payments';?>
                                
                                <?php

                                    $merchant_id = 1224879;
                                    $order_id = $order["order_id"];

                                    if ($order['order_type'] == 'package') { 
                                        
                                        $amount = $order['package_price'];

                                    }else if($order['order_type'] == 'milestone'){



                                    }

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
                                
                                <!-- Payment https://sandbox.payhere.lk/pay/authorize -->
                                <form method="post" action="order/verifyPayment" id="paymentForm">   

                                    <input type="hidden" name="merchant_id" value="1224879">    
                                    <input type="hidden" name="return_url" value="skillsparq/public/order&orderId=11">
                                    <input type="hidden" name="cancel_url" value="skillsparq/public/order&orderId=11">
                                    <input type="hidden" name="notify_url" value="skillsparq/public/order/verifyPayment">  
                                    <input type="hidden" name="order_id" value="<?php echo $order_id?>">
                                    <input type="hidden" name="order_type" value="<?php echo $order['order_type']?>">
                                    <input type="hidden" name="buyer_id" value="<?php echo $order['buyer_id']?>">
                                    <input type="hidden" name="seller_id" value="<?php echo $order['seller_id']?>">
                                    <input type="hidden" name="items" value="<?php echo $order['title'] ?>">
                                    <input type="hidden" name="currency" value="USD">
                                    <input type="hidden" name="amount" value="<?php echo $amount?>">  
                                    <input type="hidden" name="first_name" value="<?php echo $buyer['first_name']?>">
                                    <input type="hidden" name="last_name" value="<?php echo $buyer['last_name']?>">
                                    <input type="hidden" name="country" value="<?php echo $buyer['country'] ?>">
                                    <input type="hidden" name="email" value="">
                                    <input type="hidden" name="phone" value="">
                                    <input type="hidden" name="address" value="">
                                    <input type="hidden" name="city" value="">
                                    <input type="hidden" name="hash" value="<?php echo $hash ?>">  

                                </form>


                                <div class="row">
                                    <button class="buttonType-1" onclick="submitpaymentForm()">Proceed to Pay</button>
                                    <button class="buttonType-2" onclick="confirmAction('cancel')">Cancel Order</button>
                                </div>
                                        
                            <!-- Accepted State / Paid/ Running-->
                            <?php } else if($order['order_state'] == 'Running') { ?>
                                    
                                <button class="buttonType-1" >View Share Point</button>

                            <?php } ?>

                        </div>
                    </div>


                <!-- Seller View -->
                <?php } else if($_SESSION['role'] == "Seller") { ?>
                    
                    <!-- Timer -->
                    <div class="deadline">
                        <span>Time Left to Receive :</span>
                        <div class="timer">
                            <p id="demo"></p>
                        </div>
                    </div>

                    <!-- State transition -->
                    <div class="orderState">

                        <!-- Current state -->
                        <div class="orderStateHeader">
                            <span>Current Status of Order :</span>
                            <span><?php echo $order['order_state'] ?></span>
                        </div>

                        <!-- Order States -->
                        <div class="orderStateData">

                            <!-- Requested State -->
                            <?php if  ($order['order_state'] == 'Requested') { $state = 'Requested';?>

                                <!-- <span>Order Requested expires in :</span> -->
                                <div class="row">
                                    <button class="buttonType-1" onclick="confirmAction('send')">Accept</button>
                                    <button class="buttonType-2" onclick="confirmAction('cancel')">Reject</button>
                                </div>

                            <!-- Accepted State Waiting for Payments -->
                            <?php } else if($order['order_state'] == 'Accepted/Pending Payments') { $state = 'Accepted/Pending Payments';?>

                                <button class="buttonType-2" >Waiting For Payments</button>

                            <!-- Accepted State / Paid/ Running-->
                            <?php } else if($order['order_state'] == 'Running') { ?>

                                <div class="row">
                                    <button class="buttonType-1" >Deliver</button>
                                    <button class="buttonType-2" >Deadline Extension</button>
                                </div>

                            <?php } else if($order['order_state'] == 'Pending Payments') { ?>

                            <?php } ?>

                        </div>
                    </div>
                
                    <!-- Customer support assistant view-->
                    <?php } else if($_SESSION['role'] == "csa") { ?>
                    
                    <!-- Timer -->
                    <div class="deadline">
                        <span>Time Left to Receive :</span>
                        <div class="timer">
                            <p id="demo"></p>
                        </div>
                    </div>

                    <!-- State transition -->
                    <div class="orderState">

                        <!-- Current state -->
                        <div class="orderStateHeader">
                            <span>Current Status of Order :</span>
                            <span><?php echo $order['order_state'] ?></span>
                        </div>

                        <!-- Order States -->
                        <div class="orderStateData">

                            <!-- Requested State -->
                            <?php if  ($order['order_state'] == 'Requested') { ?>

                                <!-- <span>Order Requested expires in :</span> -->
                                <div class="row">
                                    <button class="buttonType-1" onclick="confirmAction('send')">Accept</button>
                                    <button class="buttonType-2" onclick="confirmAction('cancel')">Reject</button>
                                </div>

                            <!-- Accepted State Waiting for Payments -->
                            <?php } else if($order['order_state'] == 'Accepted/Pending Payments') { ?>

                                Pending Payments

                            <!-- Accepted and Paid -->
                            <?php } else if($order['order_state'] == 'Accepted/Paid') { ?>

                            <!-- Rejected State -->
                            <?php } else if($order['order_state'] == 'Rejected') { ?>

                            <!-- Accepted State / Paid/ Running-->
                            <?php } else if($order['order_state'] == 'Running') { ?>

                                Paid

                            <?php } else if($order['order_state'] == 'Pending Payments') { ?>

                            <?php } ?>

                        </div>

                    </div>
                    
                <?php } ?>

            </div>
            
            <!-- Animation -->
            <div class="orderDetailsBottomContainer">
                <img src="https://npm-assets.fiverrcdn.com/assets/@fiverr-private/earnings/high-five-illustration.28505d2.png" style="height: 280px; width: fit-content;">
            </div>

        </div>
    </div>

    <!-- Modal 1 -->
    <div class="overlay" id="cancelConfirmationOverlay">
        <div class="confirmation" id="cancelConfirmation">

            <?php if ($_SESSION['role'] == 'Buyer') {?>
            
                <?php if($state == 'Requested') { ?>

                    <p>Are you sure want to withdraw your request?</p>
                    <div class="buttons">
                        <button onclick="handleConfirmation('withdraw request', 'no', '', '', '')">No</button>
                        <button onclick="handleConfirmation('withdraw request', 'yes', <?php echo $order['order_id']?>, '<?php echo $order['order_type']?>', '<?php echo $order['buyer_id']?>', '<?php echo $order['seller_id']?>')">Yes</button>
                    </div>

                <?php }else if($state == 'Accepted/Pending Payments') { ?>

                    <p>Are you sure want to cancel your order?</p>
                    <div class="buttons">
                        <button onclick="handleConfirmation('cancel order', 'no', '', '', '')">No</button>
                        <button onclick="handleConfirmation('cancel order', 'yes', <?php echo $order['order_id']?>, '<?php echo $order['order_type']?>', '<?php echo $order['buyer_id']?>', '<?php echo $order['seller_id']?>')">Yes</button>
                    </div>

                <?php } ?>

            <?php }else if($_SESSION['role'] == 'Seller') {?>
            
                <?php if($state == 'Requested') { ?>

                    <p>Are you sure want to reject this request?</p>
                    <div class="buttons">
                        <button onclick="handleConfirmation('reject request', 'no', '', '', '')">No</button>
                        <button onclick="handleConfirmation('reject request', 'yes', <?php echo $order['order_id']?>, '<?php echo $order['order_type']?>', '<?php echo $order['buyer_id']?>', '<?php echo $order['seller_id']?>')">Yes</button>
                    </div>

                <?php } ?>

            <?php } ?>

        </div>
    </div>

    <!-- Modal 2 -->
    <div class="overlay" id="sendConfirmationOverlay">
        <div class="confirmation" id="sendConfirmation">

            <?php if ($_SESSION['role'] == 'Buyer') {?>

            <?php }else if($_SESSION['role'] == 'Seller') {?>

                <?php if($state == 'Requested') { ?>

                    <p>Are you sure want to continue with this order?</p>
                    <div class="buttons">
                        <button onclick="handleConfirmation('accept request', 'yes', <?php echo $order['order_id']?>, '<?php echo $order['order_type']?>', '<?php echo $order['buyer_id']?>', '<?php echo $order['seller_id']?>')">Yes</button>
                        <button onclick="handleConfirmation('accept request', 'no', '', '', '')">No</button>
                    </div>

                <?php } ?> 
            
            <?php } ?>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="./assests/js/order.script.js"></script>

<?php include "components/footer.component.php"; ?>
