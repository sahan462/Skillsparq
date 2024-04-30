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

            


    <div class="SkillsparqSearchMainContainer">
        <div class="SearchpPersonalizedHeader">
            Search Result
        </div>
        <div class="SkillsparqSearchDashboardContainer">
            
            <?php

                $rowIndex = 0;
                if(isset($search)){
                    if(mysqli_num_rows($search) > 0){
                        while ($rows = mysqli_fetch_assoc($search)) {
                            // $rowIndex++;
                            $searchResults[] = $rows;
                        }
                        foreach($search as $row)
                        {
            ?>
            <div class="SkillsparqSearchDashBlockContainer">
                <div class="SkillSparqSearchFeed">

                    <div class="SkillSparqFeedCont">
                        <div class="SkillSparqFeedHead">
                            <div class="FlexHead">
                                <div class="SkillSparqFeedImg" >
                                    <a href="sellerProfile&mode=public&userId=<?php echo $row['seller_id']?>"><img src="../public/assests/images/profilePictures/<?php echo $row['profile_pic']?>" alt="" style="width:100px;height:100px;border-radius:100%"></a>
                                    <span>See Profile</span>
                                </div>
                                <div class="SkillSparqFeedUserNamenm">
                                    <div class="Username">alkfjds</div>
                                    <div class="FnameLname">sadfsdvkjn</div>
                                </div>
                                <div class="SkillSparqFeedEmail">sadfdsf</div>
                            </div>
                        </div>
                        <div class="SkillSparqFeedContent">
                            <?php echo $row['about']?>
                        </div>
                        <div class="SkillSparqFeedContent">
                        <?php echo $row['description']?>
                        </div>
                    </div>

                </div>
            </div>

            <?php
                        }
                        // print_r($searchResults);
                    }
                    // show($searchResults);
                }else{
                    print_r("Search Not Found");
                }
            ?>
            
        </div>
    </div>

    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="/skillsparq/public/assests/js/manageOrders.script.js"></script>

<?php include "components/footer.component.php";?>