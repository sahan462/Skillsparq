<?php
    if($_SESSION['role'] == 'Buyer'){
        include "components/buyerSimpleHeader.component.php";
    }else if($_SESSION['role'] == 'Seller'){
        include "components/sellerHeader.component.php";
    }
?>

<?php 
    $deliveries = $data['deliveries'];
?>

<!-- Main Container -->
<div class="sharePointContainer">

    <!-- topic -->
    <div class="sharePointHeader">
        SharePoint
    </div>

    <!-- main container -->
    <div class="container">

        <!-- modal -->
        <div class="overlay" name="sendConfirmationOverlay" id="sendConfirmationOverlay" style="z-index: 2;">
            <div class="confirmation" name="sendConfirmationModal" id="sendConfirmationModal">
                <p>Are you sure want to continue?</p>
                <div class="buttons">
                    <?php if($_SESSION['role'] == 'Buyer') :?>
                        <button onclick="handleConfirmation('sendNo')">No</button>
                        <button onclick="handleConfirmation('completeOrder')">Yes</button>
                    <?php elseif($_SESSION['role'] == 'Seller'): ?>
                        <button onclick="handleConfirmation('sendNo')">No</button>
                        <button onclick="handleConfirmation('sendDelivery')">Yes</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- left container -->
        <div class="leftContainer">

            <div class="leftUpperContainer">
                
                <!-- sub topic -->
                <p class="title">
                    <span class="darkTitle">Delivered</span>Files
                </p>

                <?php if (mysqli_num_rows($deliveries) > 0){ ?>

                    <div class="deliveryFiles" style="display:block;">

                        <?php while ($row = $deliveries->fetch_assoc()) { ?>

                            <div class="filecontainer">
                                <div class="file" style="color:#333;">

                                    <!-- left section -->
                                    <div class="fileIcon">
                                        <img class="fileimg" src="<?php echo BASEURL.'assests/images/file.png?'?>">
                                    </div>

                                    <!-- inner section-->
                                    <div class="fileDetails">

                                        <div class="type-2" style="color:#333;" >File Name :
                                            <?php echo $row['attachments']; ?>
                                        </div>

                                        <div class="type-2" style="color:#333;">File Description :
                                            <?php echo $row['delivery_description']; ?>
                                        </div>

                                        <?php 
                                            $filePath = '../public/assests/zipFiles/orderFiles/Order_' . $data['orderId'] . '/deliveries/' . $row['attachments']; 
                                            $fileSize = filesize($filePath);  

                                            if (!function_exists('formatSizeUnits')) {
                                                function formatSizeUnits($bytes) {
                                                    $units = array('B', 'KB', 'MB', 'GB', 'TB');
                                                    $i = floor(log($bytes, 1024));
                                                    return number_format($bytes / pow(1024, $i), 2) . ' ' . $units[$i];
                                                }
                                            }
                                            $file_size_formatted = formatSizeUnits($fileSize);

                                        ?>

                                        <div class="type-2" style="color:#333;">File Size :
                                            <?php echo $file_size_formatted; ?>
                                        </div>

                                        <div class="type-2" style="color:#333;">Created Date :
                                            <?php echo $row['date']; ?>
                                        </div>

                                    </div>
                                    
                                    <!-- right section -->
                                    <div class="downloadDeleteIcon">
                                        <div class="download">
                                            <a href="<?php echo $filePath?>">
                                                <img src = "<?php echo BASEURL.'assests/images/download.png?'?>" />
                                            </a>
                                        </div>
                                        <!-- <div class="delete">
                                            <a href="sharePoint/deleteDelivery&deliveryId=<?php echo $row['delivery_id'];?>">delete</a>
                                        </div> -->
                                    </div>

                                </div>
                            </div>

                        <?php } ?>
                    </div>

                <?php }else { ?>

                    <div class="deliveryFiles">
                        <div class="animation">
                            <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
                            <dotlottie-player src="https://lottie.host/d9e3e447-09c8-4c2c-a3e1-bebebc93d43f/Fq7uTTiU0m.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
                            <span class="darkTitle">You have Not Made Any Deliveries Yet !!!</span>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>

        <!-- right container -->

        <div class="rightContainer" <?php if (($data['orderState'] == "Completed") && ($_SESSION['role'] == 'Buyer')) echo 'style="pointer-events: none; opacity: 0.5;"'; ?>>
                        
            <!-- for buyer -->
            <?php if($_SESSION['role'] == 'Buyer'){ ?>

                <!-- fnish order Section -->
                <form action="<?php echo BASEURL.'order/completeOrder';?>" method="post" enctype="multipart/form-data" id="orderCompletionForm">
    
                    <div id="rateSec">

                        <!-- sub topic -->
                        <p class="title">
                            <span class="darkTitle">Rate </span>
                            The Seller
                        </p>

                        <!-- Feedback -->
                        <div class="row">
                            <div class="type-1">Your Thoughts</div>
                            <div class="type-2">Give your feedback about this seller</div>

                            <textarea class="textbox" rows="4" cols="50" style="width:100%;margin-bottom: 32px !important;" name="feedback" value=""></textarea>
                        </div>

                        <!-- Star Rating -->
                        <div class="row" style="margin-bottom: 32px !important;">
                            <div class="type-1">Overall Experience</div>
                            <div class="type-2">Considering overall expression about the seller</div>

                            <div class="innerRow" style="display:flex;align-items:center">
                                <div id="rateYo_1" class="rateYo"></div>
                                <div class="rateValue"></div>
                                <input type="hidden" id="ratingInput" class="ratingInput" name="rating" value="">
                            </div>
                        </div>

                    </div>

                    <input type="hidden" name="completeOrder" value="uploadDelivery">
                    <input type="hidden" name="orderId" value="<?php echo $data['orderId']?>">
                    <input type="hidden" name="senderId" value="<?php echo $_SESSION['userId']?>">
                    <input type="hidden" name="receiverId" value="<?php echo $data['receiverId']?>">
                    <input type="hidden" name="currentState" value="<?php echo $data['orderState']?>">
                    <input type="hidden" name="orderType" value="<?php echo $data['orderType']?>">
                    <?php if($data['orderType'] == 'milestone') { ?>
                        <input type="hidden" name="milestoneId" value="<?php echo $data['milestoneId']?>">
                    <?php } ?>

                    <input type="checkbox" name="final" id="check" onclick="activeSubmit()"> I recive my product and I want to complete this job and enableing seller to get his money.
                    <div class="submitSec">
                        <button type="submit" name="finalsave" id="btnx" class="buttonType-1">Complete The Job</button>
                    </div>

                </form>

            <!-- for seller -->
            <?php } else if(($data['orderState'] != "Completed") && ($_SESSION['role'] == 'Seller')){ ?>

                <!-- sub topic -->
                <p class="title">
                    <span class="darkTitle">Deliver</span>Your Work
                </p>

                <!-- upload a deliver -->
                <form action="<?php echo BASEURL.'sharePoint/uploadDeliveries';?>" method="post" enctype="multipart/form-data" id="deliveryUploadForm" autocomplete="off">
                    
                    <!-- upload attachments -->
                    <label class="type-1" style="margin-top:8px;">Upload Files</label>
                    <label class="type-2">File must be compressed into .zip , .rar or .tar format.</label>

                    <div class="row" style="margin-bottom:32px;">
                        <div class="innerRow" style="display: flex; flex-direction: row; align-items: center;">
                            <label for="packageAttachement" id="attachment" style="margin-right: 4px;font-weight: 500;border-radius:8px;background-color: #fff;font-size: 18px;">Attachments</label>
                            <div id="warningMessage" class="warningMessage" style="color: red; display: none;">Invalid file type. Only ZIP files are allowed.</div>
                            <span class="fileName" id="fileName"></span>
                        </div>
                        <input type="file" class="fileInput" id="packageAttachement" name="attachments" multiple onchange="displayFileName(0)">
                    </div>

                    <!-- add a description to the delivery-->
                    <label class="type-1">Delivery Description</label>
                    <label class="type-2">Please add a suitable description for your work</label>
                    <textarea  name="deliveryDescription" rows="4" cols="50" style="margin-bottom:32px !important;" autocomplete="off"></textarea>

                    <input type="hidden" name="orderId" value="<?php echo $data['orderId'] ?>">
                    <input type="hidden" name="orderType" value="<?php echo $data['orderType']?>">
                    <?php if($data['orderType'] == 'milestone') { ?>
                        <input type="hidden" name="milestoneId" value="<?php echo $data['milestoneId']?>">
                    <?php } ?>
                    <input type="hidden" name="uploadDelivery" value="uploadDelivery">
                    <!-- submit form -->
                    <div class="row" style="float:right;">
                        <button type="button" name="uploadDelivery" onclick="confirmAction('send')" class="buttonType-1" style = "width:200px;height: 40px;">Upload And Send</button>
                    </div>

                </form>
            
            <?php } else if(($data['orderState'] == "Completed") && ($_SESSION['role'] == 'Seller')){ ?>
                
                <!-- sub topic -->
                <p class="title">
                    <span class="darkTitle">Rate </span>
                    The Buyer
                </p>

                <!-- buyer rating  -->
                <form action="<?php echo BASEURL.'order/sendFeedbacks';?>" method="post" enctype="multipart/form-data" id="deliveryUploadForm" autocomplete="off">

                    <div class="row">
                        <div class="type-1">Your Thoughts</div>
                        <div class="type-2">Give your feedback about this buyer</div>

                        <textarea class="textbox" rows="4" cols="50" style="width:100%;margin-bottom: 32px !important;" name="feedback" value=""></textarea>
                    </div>

                    <div class="row" style="margin-bottom: 32px !important;">
                        <div class="type-1">Overall Experience</div>
                        <div class="type-2">Considering overall expression about the buyer</div>

                        <div class="innerRow" style="display:flex;align-items:center">
                            <div id="rateYo_2" class="rateYo"></div>
                            <div class="rateValue"></div>
                            <input type="hidden" id="ratingInput" class="ratingInput" name="userRating" value="">
                        </div>
                    </div>

                    <input type="hidden" name="sendFeedback" value="sendFeedback">
                    <input type="hidden" name="orderId" value="<?php echo $data['orderId']?>">
                    <input type="hidden" name="senderId" value="<?php echo $_SESSION['userId']?>">
                    <input type="hidden" name="receiverId" value="<?php echo $data['receiverId']?>">

                    <div class="submitSec">
                        <button type="submit" id="btnx" class="buttonType-1">Send Feedback</button>
                    </div>

                </form>

            <?php } ?>

        </div>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script src="./assests/js/sharePoint.script.js"></script>

<?php include "components/footer.component.php"; ?>
