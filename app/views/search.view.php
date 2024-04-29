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
                <div class="SkillSparqFeedContent">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit illum aliquam incidunt nostrum blanditiis eaque earum porro consequatur est ipsum nobis tenetur quos, eum explicabo quas temporibus doloremque officiis! Temporibus sed eum blanditiis distinctio nam similique explicabo a illum culpa.
                </div>
                <div class="SkillSparqFeedContent">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ab ducimus debitis mollitia asperiores explicabo ad eius iste exercitationem quos atque accusamus reiciendis esse omnis, maxime perferendis soluta modi architecto optio placeat illum porro? Cum, maxime placeat. Quae, illum qui.
                </div>
                <div class="SkillSparqFeedContent">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, illum. Fuga quisquam, suscipit, perferendis vitae harum aut autem saepe velit itaque minus, voluptates veniam beatae aliquam nihil voluptas qui fugit laboriosam. Molestiae ex est non magni laborum aperiam alias voluptatum?
                </div>
            </div>
            <div class="SkillSparqSubFeed">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde, quae! Molestiae perferendis itaque, laudantium voluptatem suscipit minus numquam odit veniam libero quod possimus aspernatur autem ut, quibusdam magnam voluptates amet quos harum deleniti? Corporis enim error, ducimus vel eaque nostrum eveniet accusamus totam nulla qui dolorum ut molestiae? Eaque nihil molestiae iusto similique libero recusandae qui necessitatibus, dolor dolore iure minus unde atque. Autem, dolores? Ipsum recusandae eos vero quidem aut ipsam ut quas totam quis. Dolorem consectetur atque minus consequuntur. Asperiores impedit amet quia totam velit, eveniet praesentium veritatis modi magnam? Fugiat saepe quaerat modi tempora, a officia assumenda.
            </div>
        </div>
    </div>

    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="/skillsparq/public/assests/js/manageOrders.script.js"></script>

<?php include "components/footer.component.php";?>