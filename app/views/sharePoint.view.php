<?php
    if($_SESSION['role'] == 'Buyer'){
        include "components/buyerSimpleHeader.component.php";
    }else if($_SESSION['role'] == 'Seller'){
        include "components/sellerHeader.component.php";
    }
?>

<?php 

    $data['deliveries'] = array();
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

        <div class="leftContainer">

            <div class="leftUpperContainer">
                
                <!-- sub topic -->
                <p class="title">
                    <span class="darkTitle">Delivered Files</span>
                </p>

                <div class="deliveryFiles">



                </div>

            </div>

        </div>

        <div class="rightContainer">
            
            <?php if($_SESSION['role'] == 'Buyer'){ ?>

                <!-- fnish order Section -->
                <form action="<?php echo BASEURL.'/sharePointBuyer/uploadFile';?>" method="post" enctype="multipart/form-data">
    
                    <div id="rateSec">

                        <!-- sub topic -->
                        <p class="title">
                            <span class="darkTitle">Rate </span>
                            The Seller
                        </p>

                        <!-- Complete Order -->
                        <div class="subsection">

                            Considering overall expression about the seller<br>
                            <span class="subsection-title">Seller Rate</span>

                            <div class="rate3">
                                <input type="radio" id="star35" name="mainRate" value="5" />
                                <label for="star35" title="text">5 stars</label>
                                <input type="radio" id="star34" name="mainRate" value="4" />
                                <label for="star34" title="text">4 stars</label>
                                <input type="radio" id="star33" name="mainRate" value="3" />
                                <label for="star33" title="text">3 stars</label>
                                <input type="radio" id="star32" name="mainRate" value="2" />
                                <label for="star32" title="text">2 stars</label>
                                <input type="radio" id="star31" name="mainRate" value="1" />
                                <label for="star31" title="text">1 star</label>
                            </div>

                        </div>

                    </div>

                    Give a review for this adverticement
                    <textarea class="textbox" name="dis" rows="4" cols="50"></textarea>
                    <input type="checkbox" name="final" id="check" onclick="activeSubmit()"> I recive my product and I want to complete this job and enableing seller to get his money.

                    <div class="submitSec">
                        <button type="submit" name="finalsave" id="btnx" class="buttonType-1">Complete The Job</button>
                    </div>

                </form>



            <?php } else if($_SESSION['role'] == 'Seller'){ ?>

                <!-- sub topic -->
                <p class="title">
                    <span class="darkTitle">Deliver The Finished Products</span>
                </p><br>

                <!-- upload a deliver -->
                <form action="<?php echo BASEURL.'/sharePoint/uploadDeliveries';?>" method="post" enctype="multipart/form-data">

                    <!-- add a description to the delivery-->
                    <label class="type-2">Delivery Description<label>
                    <br><textarea class="textbox" name="dis" rows="4" cols="50"></textarea><br><br>
                    
                    <!-- File Uploading -->
                    <label class="type-2">File must be compressed into .zip , .rar or .tar format.</label>
                    <form id="packageRequestForm" method="post" action="order/createPackageOrder" enctype="multipart/form-data">

                        <div class="upload_background">
                            <div class="row">
                                <div class="innerRow" style="display: flex; flex-direction: row; align-items: center;">
                                    <label for="packageAttachement" id="attachment" style="margin-right: 4px;font-weight: 500;border-radius:8px;background-color: #fff;font-size: 18px;">Attachments</label>
                                    <div id="warningMessage" class="warningMessage" style="color: red; display: none;">Invalid file type. Only ZIP files are allowed.</div>
                                    <span class="fileName" id="fileName"></span>
                                </div>
                                <input type="file" class="fileInput" id="packageAttachement" name="attachments" multiple onchange="displayFileName(0)">
                            </div>
                            <button type="submit" name="finalSave" class="buttonType-1" style = "width:200px;height: 40px;">Upload And Send</button>
                        </div>

                        <!-- Rate buyer -->
                        <input type="checkbox" name="final" id="final" onclick="showrate()"> Consider this as a final product delivery.
                    
                        <div id="rateSec" style="display:none"><br><br>

                            <!-- sub topic -->
                            <p class="title">
                                <span class="darkTitle big">Rate </span>The Buyer
                            </p>
                            
                            <!-- star rating -->
                            <div id="rateYo">

                            </div>
                        
                        </div>

                    </form>

            <?php } ?>

        </div>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<script>



</script>

<script src="./assests/js/sharePoint.script.js"></script>

<?php include "components/footer.component.php"; ?>
