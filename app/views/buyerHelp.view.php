<?php
    if($_SESSION['role'] == 'Buyer'){
        include "components/buyerSimpleHeader.component.php";
    }else if($_SESSION['role'] == 'Seller'){
        include "components/sellerHeader.component.php";
    }
?>

<div class="buyerHelpContainer">

  <div class="buyerHelpHeader">
    <div class="primary">Help & Support</div>
  </div>

  <div class="container">

    <p class="title">Popular  <span class="dark-title">Topics</span>

    <div class="btn-group">
        <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">How Exl Exchange</div></a>
        <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Creating an Advertisemnt</div></a>
        <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">How to Start Selling on EXL</div></a>
        <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Accounts and profile  settings</div></a>
        <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Sellers FAQs</div></a>
        <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Payment FAQ's</div></a>
    </div>

    <div class="btn-group">
        <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Withdrawing Funds</div></a>
        <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Levels Statistics</div></a>
        <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Account and profile settings</div></a>
        <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Account security</div></a>
        <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Successfully Selling on Fiverr</div></a>
        <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Seller Analytics</div></a>
    </div>

    <p class="title">
      Creating <span class="dark-title">A Help Request&nbsp&nbsp</span>
    </p>
    Through a help request you can ask any question related to platform and our moderators will assits you to solve your problem.

    <div class="btncontainer">
      <a href="<?php echo BASEURL.'helpCenter' ?>"><div class="backbtn">Back To Help Center</div></a>
      <a href="<?php echo BASEURL.'/helpSubmit' ?>"><div class="createbtn">Create a request 🏷</div></a>
    </div>
  </div>
</div>

<?php include "components/footer.component.php";?>
