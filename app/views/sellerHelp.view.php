<?php
    if($_SESSION['role'] == 'Buyer'){
        include "components/buyerSimpleHeader.component.php";
    }else if($_SESSION['role'] == 'Seller'){
        include "components/sellerHeader.component.php";
    }
?>

<div class="buyerHelpContainer">

  <!-- Send Request Modal -->
  <!-- Modal 1 / Modal for Send Complaints -->
  <div class="overlay" id="overlay">
    <div class="modal" id="packageModal">
      <form id="sendRequestForm" method="post" action="helpCenter/createInquiry" enctype="multipart/form-data">

        <div class="row">
          <label for="inquirySubject" class="type-1">Request Subject:</label>
          <label for="inquirySubject" class="type-2">Please provide a suitable overview for your request.</label>
          <input type="text" id="inquirySubject" name="inquirySubject" required></textarea>
          <div class="warningMessage" style="color: red;margin-bottom: 16px !important;"></div>
        </div>

        <div class="row">
          <label for="inquiryDescription" class="type-1">Request Description:</label>
          <label for="inquiryDescription" class="type-2">Please provide a concise description of the task you would like to accomplish.</label>
          <textarea id="inquiryDescription" name="inquiryDescription" rows="10" required></textarea>
          <div class="warningMessage" style="color: red;margin-bottom: 16px !important;"></div>
        </div>

        <div class="row">
        <label for="attachments" class="type-1">Attachments:</label>
        <label for="attachments" class="type-2">Kindly upload any attachments as a compressed ZIP file, if applicable.</label>
        <div class="innerRow" style="display: flex; flex-direction: row; align-items: center;">
          <label for="inquiryAttachment" id="attachment" style="margin-right: 4px;">Attachements</label>
          <div id="warningMessage" class="warningMessage" style="color: red; display: none;">Invalid file type. Only ZIP files are allowed.</div>
          <span id="fileName"></span>
        </div>
        <input type="file" class="fileInput" id="inquiryAttachment" name="inquiryAttachment" multiple onchange="displayFileName(this)">
        </div>

        <div class="buttons">
          <button type="button" onclick="confirmAction('cancel')">Cancel Request</button>
          <button type="button" onclick="confirmAction('send')">Send Request</button>
        </div>

        <input type="hidden" name="userId" value="<?php echo $_SESSION['userId']?>">
        <input type="hidden" name="userName" value="<?php echo $_SESSION['userName']?>">
        <input type="hidden" name="role" value="<?php echo $_SESSION['role']?>">
        <input type="hidden" name="inquiryType" value="help request">
        <input type="hidden" name="inquirySubmit" value="submit">

      </form>
    </div>
  </div>

  <!-- Modal 2-->
  <div class="overlay" id="cancelHelpRequestOverlay">
    <div class="confirmation" id="cancelHelpRequest">
      <p>Are you sure want to cancel?</p>
      <div class="buttons">
        <button onclick="handleConfirmation('cancelNo')">No</button>
        <button onclick="handleConfirmation('cancelYes')">Yes</button>
      </div>
    </div>
  </div>

  <!-- Modal 3 -->
  <div class="overlay" id="sendHelpRequestOverlay">
    <div class="confirmation" id="sendHelpRequest">
      <p>Are you sure want to continue?</p>
      <div class="buttons">
        <button onclick="handleConfirmation('sendNo')">No</button>
        <button onclick="handleConfirmation('sendYes')">Yes</button>
      </div>
    </div>
  </div>


  <div class="buyerHelpHeader">
    <div class="primary">Help & Support</div>
  </div>

    <div class="container">

      <div class="leftContainer">
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
        <p class="title">Creating <span class="dark-title">A Help Request&nbsp&nbsp</span></p>
        <br>
        Through a help request you can ask any question related to platform and our moderators will assits you to solve your problem.
        <div class="btncontainer">
          <button class="createbtn" onclick="openHelpRequestModal(this)">Get Customer Support Assistant Help</button>
        </div>
        <br>
        <br>
        <p class="title">Past <span class="dark-title">Customer Support Requests</span></p>
      </div>

      <div class="rightContainer">
        <img alt="Community Support" width="532px" src="https://theme.zdassets.com/theme_assets/38806/bc9ae1fd5c38fdc7fda900212ba10319504284ec.svg" >
      </div>

    </div>
</div>

<script src="/skillsparq/public/assests/js/helpCenter.script.js"></script>
<?php include "components/footer.component.php";?>
