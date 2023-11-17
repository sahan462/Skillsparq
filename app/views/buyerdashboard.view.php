<?php include "components/buyerHeader.component.php"; ?>

<div class="buyerDashboard-content">

    <div class="personalizedHeader">
        Hey there, <?php echo $_SESSION['firstName']?>
    </div>

    <div class="main-content">
        <?php include "components/cardSlider.component.php"?>
        <?php include "components/cardSlider.component.php"?>
        <?php include "components/cardSlider.component.php"?>
    </div>
</div>

<script src="./assests/js/buyerDashboard.script.js"></script>

<?php include "components/footer.component.php"?>
