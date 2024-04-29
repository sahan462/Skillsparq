<?php
    if($_SESSION['role'] == "Seller"){
        include "components/sellerHeader.component.php";
    }else if($_SESSION['role'] == "Buyer"){
        include "components/buyerSimpleHeader.component.php";
    }else{
        include "components/buyerSimpleHeader.component.php";
    }

    if(!empty($data)){
        $search = $data['SEARCH'];
    }
    
?>

<?php

                // $rowIndex = 0;
                // if(isset($search)){
                //     if(mysqli_num_rows($search) > 0){
                //         while ($row = mysqli_fetch_assoc($search)) {
                //             // $rowIndex++;
                //             $searchResults[] = $row;
                //         }
                //         // print_r($searchResults);
                //     }
                //     show($searchResults);
                // }else{
                //     print_r("Search Not Found");
                // }
            ?>


    <div class="SkillsparqSearchMainContainer">
        <div class="SearchpPersonalizedHeader">
            Search Result
        </div>
        <div class="SkillsparqSearchDashboardContainer">
            <div class="SkillSparqSearchFeed">
                <!-- <div class="SkillSparqFeedContent">

                </div> -->
                
            </div>
            <div class="SkillSparqSubFeed">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit illum aliquam incidunt nostrum blanditiis eaque earum porro consequatur est ipsum nobis tenetur quos, eum explicabo quas temporibus doloremque officiis! Temporibus sed eum blanditiis distinctio nam similique explicabo a illum culpa.
            </div>
            <div class="SkillSparqSubFeed">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit illum aliquam incidunt nostrum blanditiis eaque earum porro consequatur est ipsum nobis tenetur quos, eum explicabo quas temporibus doloremque officiis! Temporibus sed eum blanditiis distinctio nam similique explicabo a illum culpa.
            </div>
            <div class="SkillSparqSubFeed">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit illum aliquam incidunt nostrum blanditiis eaque earum porro consequatur est ipsum nobis tenetur quos, eum explicabo quas temporibus doloremque officiis! Temporibus sed eum blanditiis distinctio nam similique explicabo a illum culpa.
            </div>
            <div class="SkillSparqSubFeed">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit illum aliquam incidunt nostrum blanditiis eaque earum porro consequatur est ipsum nobis tenetur quos, eum explicabo quas temporibus doloremque officiis! Temporibus sed eum blanditiis distinctio nam similique explicabo a illum culpa.
            </div>
            <div class="SkillSparqSubFeed">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit illum aliquam incidunt nostrum blanditiis eaque earum porro consequatur est ipsum nobis tenetur quos, eum explicabo quas temporibus doloremque officiis! Temporibus sed eum blanditiis distinctio nam similique explicabo a illum culpa.
            </div>
        </div>
    </div>

    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="/skillsparq/public/assests/js/manageOrders.script.js"></script>

<?php include "components/footer.component.php";?>