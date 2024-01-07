<?php
    if($_SESSION['role'] == 'Buyer'){
        include "components/buyerSimpleHeader.component.php";
    }else if($_SESSION['role'] == 'Seller'){
        include "components/sellerHeader.component.php";
    }
?>

  <body>
    <div class="header">
      <div class="primary">&nbsp&nbspHelp&nbsp&&nbspSupport</div>
    </div>

    <br><br><br><br><br>
    <div class="container">
    <br><br>
    <p class="title">Popular  <span class="dark-title">Topics</span></p><br><br>
    <div class="btn-group">
        <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">About Skillsparq/div></a>
        <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Creating an Advertisemnt</div></a>
        <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">How to Start Selling on EXL</div></a>
        <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Accounts and profile  settings</div></a>
        <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Sellers FAQs</div></a>
        <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Payment FAQ's</div></a>
    </div><br><br>
    <div class="btn-group">
        <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Withdrawing Funds</div></a>
        <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Levels Statistics</div></a>
        <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Account and profile settings</div></a>
        <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Account security</div></a>
        <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Successfully Selling on Fiverr</div></a>
        <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Seller Analytics</div></a>
    </div>
    <br><br><br><br>
      <p class="title">
        Creating <span class="dark-title">A Help Request&nbsp&nbsp</span>
      </p>
        <br><br>
        Through a help request you can ask any question related to platform and our moderators will assits you to solve your problem.

     <br><br>
     <div class="btncontainer">
     <a href="<?php echo BASEURL.'/helpCenter' ?>"><div class="backbtn">Back To Help Center</div></a>
     <a href="<?php echo BASEURL.'/helpSubmit' ?>"><div class="createbtn">Create a request 🏷</div></a>
     </div>
  </body>
</html>