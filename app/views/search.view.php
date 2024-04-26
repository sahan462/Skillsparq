<?php
    if($_SESSION['role'] == "Seller"){
        include "components/sellerHeader.component.php";
    }else if($_SESSION['role'] == "Buyer"){
        include "components/buyerSimpleHeader.component.php";
    }else{

    }

    $search = $data['SEARCH'];
?>


<div class="SkillsparqSearchMainContainer">
    <div class="SearchpPersonalizedHeader">
        Search Result
    </div>
    <div class="SkillsparqSearchDashboardContainer">
        <div class="SkillSparqSearchFeed">
            <p>sdfdsf</p>
            <?php

                // $rowIndex = 0;
                if(mysqli_num_rows($search) > 0){
                    while ($row = mysqli_fetch_assoc($search)) {
                        // $rowIndex++;
                        $searchResults[] = $row;
                    }
                    // print_r($searchResults);
                }
                print_r($searchResults);
            ?>
        </div>
    </div>
</div>

    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="/skillsparq/public/assests/js/manageOrders.script.js"></script>

<?php include "components/footer.component.php";?>