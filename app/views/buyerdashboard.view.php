<?php include "components/buyerHeader.component.php"; ?>

<div class="buyerDashboard-content">

    <div class="personalizedHeader">
        Hey there, <?php echo $_SESSION['firstName']?>
    </div>

    <div class="userHistoryContent">
        <div class="historyHeader">
            Continue browsing
        </div>
        <div class="historyContent">
            <?php include "components/cardSlider.component.php"?>
        </div>
    </div>
    <div class="main-content">
        <?php include "components/cardSlider.component.php"?>
        <?php include "components/cardSlider.component.php"?>
        <?php include "components/cardSlider.component.php"?>
    </div>
</div>
<?php include "components/footer.component.php"?>
