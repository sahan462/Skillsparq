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
    <div class="rightContainer">

      <p class="title">Popular  <span class="dark-title">Topics</span>
      <br>
      <br>
      <div class="btn-group">
          <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">How Exl Exchange</div></a>
          <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Creating an Advertisemnt</div></a>
          <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">How to Start Selling</div></a>
          <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Accounts and profile  settings</div></a>
          <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Withdrawing Funds</div></a>
          <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Account and profile settings</div></a>
          <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Account security</div></a>
          <a href="<?php echo BASEURL.'/helpCenter/advertisement' ?>"><div class="btn4">Successfully Selling </div></a>
      </div>

      <br><br>

      <p class="title">
        Creating <span class="dark-title">A Help Request&nbsp&nbsp</span>
      </p>

      <br>

      Through a help request you can ask any question related to platform and our moderators will assits you to solve your problem.

      <div class="btncontainer">
        <a href="<?php echo BASEURL.'/helpSubmit' ?>"><div class="createbtn">Get Customer Support Assistant Help</div></a>
      </div>

      <br>
      <br>

      <p class="title">
        Past <span class="dark-title">Customer Support Requests</span>
      </p>


    </div>

    <div class="leftContainer">
      <img alt="Community Support" width="532px" src="https://theme.zdassets.com/theme_assets/38806/bc9ae1fd5c38fdc7fda900212ba10319504284ec.svg" >
    </div>

  </div>
</div>

<?php include "components/footer.component.php";?>
