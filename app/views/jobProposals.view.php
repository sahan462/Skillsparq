<?php
    if ($_SESSION['role'] === "Seller") {
        include "components/sellerHeader.component.php";
    } else if ($_SESSION['role'] === "Buyer") {
        include "components/buyerSimpleHeader.component.php";
    }
?>

<div class="displayJobContainer">
    
    <?php
        if ($_SESSION['role'] === "Seller") {

        } else if ($_SESSION['role'] === "Buyer") {
    ?>
            <div class="displayJobHeader">
                <?php echo "All Proposals for {$data['jobDets']['title']}"; ?>
            </div>
            <h1>hellow there</h1>
    <?php
        }
    ?>
    
</div>


<?php //include "/xampp/htdocs/skillsparq/app/views/components/footer.component.php";?>