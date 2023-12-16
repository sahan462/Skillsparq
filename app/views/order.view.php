<?php
    if($_SESSION['role'] == 'Buyer'){
        include "components/buyerSimpleHeader.component.php";
    }else if($_SESSION['role'] == 'Seller'){
        include "components/sellerHeader.component.php";
    }
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

    <div class="orderContent">

        <!-- Tab Content 1 -->
        <div class="userActivity">
            <div id="activity" class="tabContent" >
                Activity
            </div>
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

        <!-- Tab Content 2 -->
        <div class="orderDetails">
            <span>Order Info.</span>
            <div class="timer"></div>
            <div class="Details"></div>
        </div>
    </div>
</div>

<script src="./assests/js/order.script.js"></script>

<?php include "components/footer.component.php"; ?>
