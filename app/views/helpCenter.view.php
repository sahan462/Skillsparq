<?php
    if($_SESSION['role'] == 'Buyer'){
        include "components/buyerSimpleHeader.component.php";
    }else if($_SESSION['role'] == 'Seller'){
        include "components/sellerHeader.component.php";
    }   
?>


<div class="container">

    <div class="helpCenterHeader">
        Customer Assistance
    </div>

    <div class="helpCenterContent">
        <div class="leftContainer">
            <p class="title">Choose <span class="dark-title"> Which Help You Need</span></p><br><br>
            <div class="btn-group-1">
                <a href="<?php echo BASEURL.'sellerHelp' ?>"><div class="btn"><img src="../public/assests/images/seller.png"><p class="btn-title">Seller Support</p></div></a>
                <a href="<?php echo BASEURL.'buyerHelp' ?>"><div class="btn"><img src="../public/assests/images/buyer.png"><p class="btn-title">Buyer Support</p></div></a>
            </div>
            
            <br><br><br>

            <p class="title">Recommended <span class="dark-title">For You</span></p><br><br>
            <div class="btn-group-2">
                <a href="<?php echo BASEURL.'about' ?>"><div class="btn3">About SkillSparq</div></a>
                <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn3">Creating an Advertisemnt</div></a>
                <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn3">How to Start Selling on SkillSparq</div></a>
                <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn3">Accounts and profile  settings</div></a>
                <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn3">Sellers FAQs</div></a>
            </div>
        </div>
        <div class="rightContainer">
            <img alt="Community Support" src="https://hrcdn.net/fcore/assets/svgs/support-page-bc479356b1.svg" >
        </div>

    </div>

</div>

<script src="/skillsparq/public/assests/js/addGig.script.js"></script>
<?php include "components/footer.component.php";?>
