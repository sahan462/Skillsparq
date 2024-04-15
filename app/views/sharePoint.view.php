<?php
    if($_SESSION['role'] == 'Buyer'){
        include "components/buyerSimpleHeader.component.php";
    }else if($_SESSION['role'] == 'Seller'){
        include "components/sellerHeader.component.php";
    }
?>

<?php 
$data["profilePic"]="dilan.png";
$files=$data['files'];
?>

<!-- File Share -->
<div class="main-grid">

<div class="container-upper">
    <p class="title"><span class="big">Resources</span> Files</p>
    <?php if(count($files)>0){ ?>
    <div class="scrollable" id="style-1">
    <?php }else{?>
    <div class="scrollable-empty" id="style-1">
    <?php } foreach ($files as $file): ?>
    <?php if($file['final']=='0'){ ?>
    <div class="filecontainer">
        <div class="file">
        <img class="fileimg" src="<?php echo BASEURL.'/public/assets/img/icons/file.png?'?>">
        <div class="name">File Name :
            <?php echo $file['name']; ?>
        </div>
        <div class="time">
            <?php echo $file['time']; ?>
        </div>
        <div class="size">File Size :
            <?php echo floor($file['size'] / 1000) . ' KB'; ?>
        </div>
        <div class="download"><a href="<?php echo BASEURL."/public/assets/uploads/".$file['name']?>">
            <img class="downloadimg" src="<?php echo BASEURL.'/public/assets/img/icons/download.png?'?>"></a></div>
        </div>
    </div>
    <?php } else { ?>
        <div class="productcontainer">
        <div class="product">
        <img class="productimg" src="<?php echo BASEURL.'/public/assets/img/icons/file.png?'?>">
        <div class="name">
        Product Delivery <br> 
        </div>
        <div class="producttime">
            
            <?php echo $file['time']; ?>
        </div>
        <div class="size">
        File Name :
            <?php echo $file['name']; ?><br>  
        File Size :
            <?php echo floor($file['size'] / 1000) . ' KB'; ?>
            <br>
            Description :
            <?php echo $file['description']; ?>
        </div>
        <div class="download"><a href="<?php echo BASEURL."/public/assets/uploads/".$file['name']?>">
            <img class="downloadimg" src="<?php echo BASEURL.'/public/assets/img/icons/download2.png?'?>"></a></div>
        </div>
    </div>
    <?php } ?>
    <?php endforeach;?>
    </div>
</div>

<!-- Upload Section -->
<div class="upload-sec">
    <p class="title"><span class="big">Send </span>Resources Files</p>
    <form action="<?php echo BASEURL.'/sharePoint/uploadFile';?>" method="post" enctype="multipart/form-data">
    File must be compressed into .zip , .rar or .tar format.<br>
    <div class="upload_background"><input type="file" name="myfile" onchange="showName()" id="file" class="filebtn"><span id='filename'></span>
        <button type="submit" name="save" class="uploadbtn">Upload And Send</button>
    </div>
    </form>
</div>
<div class="rightside">

<!-- Product Upload Section -->
<p class="title"><span class="big">Deliver </span>The Finished Product</p>
    <form action="<?php echo BASEURL.'/sharePoint/uploadFile';?>" method="post" enctype="multipart/form-data">
    Discription of deliver 
    <br><textarea class="textbox" name="dis" rows="4" cols="50"></textarea><br><br>
    File must be compressed into .zip , .rar or .tar format.<br>
    <div class="upload_background"><input type="file" id="productf" onchange="showProductName()" name="filex" class="filebtn"><span id='productname'></span>
        <button type="submit" name="finalsave" class="uploadbtn">Upload And Send</button>
    </div>
    <br>
    <input type="checkbox" name="final" id="final" onclick="showrate()"> Consider this as a final product delivery.
    <a href="<?php echo BASEURL.'/sellerJobHandler' ?>"><div name="z" class="bkbtn" >Back To Countdown Page</div></a> 
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
</div>


</div>
<?php linkJS('sharePoint'); ?>
