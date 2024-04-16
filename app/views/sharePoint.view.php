<?php
    if($_SESSION['role'] == 'Buyer'){
        include "components/buyerSimpleHeader.component.php";
    }else if($_SESSION['role'] == 'Seller'){
        include "components/sellerHeader.component.php";
    }
?>

<?php 
$data["profilePic"]="dilan.png";
$data['files'] = array();
$files=$data['files'];
?>

<!-- Main Container -->
<div class="sharePointContainer">

    <div class="sharePointHeader">
        SharePoint
    </div>

    <div class="container">
        <div class="leftContainer">
            <div class="leftUpperContainer">

                <p class="title">
                    <span class="darkTitle">Resource</span>
                    Files
                </p>

                <div class="files">

                </div>
            </div>

            <div class="leftBottomContainer">

                <p class="title">
                    <span class="darkTitle">Add New</span>
                    Files
                </p>

                <div class="uploadSec">
                    <form action="<?php echo BASEURL.'/sharePoint/uploadFile';?>" method="post" enctype="multipart/form-data">

                        <span>File must be compressed into .zip , .rar or .tar format.</span>
                        <div class="upload_background"><input type="file" name="myfile" onchange="showName()" id="file" class="filebtn"><span id='filename'></span>
                            <button type="submit" name="save" class="uploadbtn">Upload And Send</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>

        <div class="rightContainer">
            
            <?php if($_SESSION['role'] == 'Buyer'){ ?>

                <!-- fnish order Section -->
                <form action="<?php echo BASEURL.'/sharePointBuyer/uploadFile';?>" method="post" enctype="multipart/form-data">
    
                    <div id="rateSec">

                        <p class="title">
                            <span class="darkTitle">Rate </span>
                            The Seller
                        </p>

                        <div class="subsection">
                            
                            Considering overoll expression about the seller's communication and respoding to your messages<br>
                            <span class="subsection-title">Communication Rate</span>

                            <div class="rate">
                                <input type="radio" id="star5" name="communicationRate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="communicationRate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="communicationRate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="communicationRate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="communicationRate" value="1" />
                                <label for="star1" title="text">1 star</label>
                            </div>

                        </div>
                    
                        <div class="subsection">
                            
                            Considering overall expression about the delivery time<br>
                            <span class="subsection-title">Delivery Rate</span>
                            
                            <div class="rate2">
                                <input type="radio" id="star25" name="deliveryRate" value="5" />
                                <label for="star25" title="text">5 stars</label>
                                <input type="radio" id="star24" name="deliveryRate" value="4" />
                                <label for="star24" title="text">4 stars</label>
                                <input type="radio" id="star23" name="deliveryRate" value="3" />
                                <label for="star23" title="text">3 stars</label>
                                <input type="radio" id="star22" name="deliveryRate" value="2" />
                                <label for="star22" title="text">2 stars</label>
                                <input type="radio" id="star21" name="deliveryRate" value="1" />
                                <label for="star21" title="text">1 star</label>
                            </div>

                        </div>
                    
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

                <p class="title">
                    <span class="big">Deliver </span>The Finished Product
                </p>

                <form action="<?php echo BASEURL.'/sharePoint/uploadFile';?>" method="post" enctype="multipart/form-data">

                    Discription of deliver 
                    <br><textarea class="textbox" name="dis" rows="4" cols="50"></textarea><br><br>
                    
                    File must be compressed into .zip , .rar or .tar format.<br>
                    <div class="upload_background"><input type="file" id="productf" onchange="showProductName()" name="filex" class="filebtn"><span id='productname'></span>
                        <button type="submit" name="finalsave" class="uploadbtn">Upload And Send</button>
                    </div>

                    <br>

                    <input type="checkbox" name="final" id="final" onclick="showrate()"> Consider this as a final product delivery.

                    <div id="rateSec" style="display:none">

                        <p class="title"><span class="big">Rate </span>The Buyer</p>
                        Give your rate to buyer
                        <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>
                    
                    </div>

                </form>

                
            <?php } ?>

        </div>
    </div>
</div>

<script src="./assests/js/sharePoint.script.js"></script>

<?php include "components/footer.component.php"; ?>
