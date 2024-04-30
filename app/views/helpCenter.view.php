<?php
if ($_SESSION['role'] == 'Buyer') {
    include "components/buyerSimpleHeader.component.php";
} else if ($_SESSION['role'] == 'Seller') {
    include "components/sellerHeader.component.php";
}
?>


<div class="helpCenterContainer">

    <div class="helpCenterHeader">
        Customer Assistance
    </div>

    <div class="container">
        <div class="leftContainer">
            <p class="title">Choose <span class="dark-title"> Which Help You Need</span></p><br><br>
            <div class="btn-group-1">
                <a href="<?php echo BASEURL . 'sellerHelp' ?>">
                    <div class="btn"><img src="../public/assests/images/seller.png">
                        <p class="btn-title">Seller Support</p>
                    </div>
                </a>
                <a href="<?php echo BASEURL . 'buyerHelp' ?>">
                    <div class="btn"><img src="../public/assests/images/buyer.png">
                        <p class="btn-title">Buyer Support</p>
                    </div>
                </a>
            </div>

            <br><br><br>

            <p class="title">Recommended <span class="dark-title">For You</span></p><br><br>
            <div class="btn-group-2">
                <a href="<?php echo BASEURL . 'about' ?>">
                    <div class="btn3">About SkillSparq</div>
                </a>
                <a href="<?php echo BASEURL . '/helpCenter/advertisement' ?>">
                    <div class="btn3">Creating an Advertisemnt</div>
                </a>
                <a href="<?php echo BASEURL . '/helpCenter/advertisement' ?>">
                    <div class="btn3">How to Start Selling on SkillSparq</div>
                </a>
                <a href="<?php echo BASEURL . '/helpCenter/advertisement' ?>">
                    <div class="btn3">Accounts and profile settings</div>
                </a>
                <a href="<?php echo BASEURL . '/helpCenter/advertisement' ?>">
                    <div class="btn3">Sellers FAQs</div>
                </a>
            </div>
            <p class="title">
                Creating <span class="dark-title">A Help Request&nbsp&nbsp</span>
            </p>

            <br>

            Through a help request you can ask any question related to platform and our moderators will assits you to solve your problem.

            <div class="btncontainer">
                <button class="buttonType-1" style="width:400px;" onclick="openHelpRequestModal(this)">Get Customer Support Assistant Help</button>
            </div>

            <br>
            <br>

            <p class="title" style="margin-top:32px;">
                Past <span class="dark-title">Customer Support Requests & Complaints</span>
            </p>

            <div class="inquiries" style="margin-top:32px;">

                <?php foreach ($inquiries as $row) {
                    include "components/inquiryCard.component.php";
                } ?>

            </div>

        </div>
        <div class="rightContainer">
            <img alt="Community Support" src="https://hrcdn.net/fcore/assets/svgs/support-page-bc479356b1.svg">
        </div>

    </div>

</div>

<script src="/skillsparq/public/assests/js/helpCenter.script.js"></script>
<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    }
</script>
<?php include "components/footer.component.php"; ?>