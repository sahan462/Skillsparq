<?php
    include "components/buyerHeader.component.php"; 
?>

    <div class="displayJobContainer">
        <?php
            if($_SESSION['role'] === "seller"){
                
            }else if($_SESSION['role'] === "buyer"){
                
            }  

        ?>
        <div class="displayJobHeader">
            <?php echo "All Proposals";?>
        </div>
    </div>