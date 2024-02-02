<div class="gigCard" gig-url="displayGig&gigId=<?php echo $row['gig_id']?>">
    <!-- Cover Image -->
    <div class="coverImg">
        <img src="./assests/images/gigimages/<?php echo $row['cover_image']?>" alt="card-1">
    </div>

    <div class="title">
        <?php //echo $row['title']?>
        <div class="links">
            <?php
                if($_SESSION['role'] === "Seller"){
                    if(($row['ongoing_order_count'])=== 0){
            ?>
                    <a href="updateGig&amp;userId=<?php echo $row['seller_id']?>&amp;gigId=<?php echo $row['gig_id']?>">edit</a>
                    <a href="Gig/deleteGig&amp;userId=<?php echo $row['seller_id']?>&amp;gigId=<?php echo $row['gig_id']?>">delete</a>
            <?php
                    }
                    else{
            ?>
                    <a href="updateGig&amp;userId=<?php echo $row['seller_id']?>&amp;gigId=<?php echo $row['gig_id']?>" hidden>edit</a>
                    <a href="Gig/deleteGig&amp;userId=<?php echo $row['seller_id']?>&amp;gigId=<?php echo $row['gig_id']?>" hidden>delete</a>
            <?php
                    }
                }else{
            ?>
                    <!-- visibility hidden -->
            <?php 
                }
            ?>
        </div>
    </div>

    <!-- User Details -->
    <div class="user-details">
        <div class="cardRow" style="align-items: center;">
            <div class="profile-pic">
                <!-- <img src="/assests/images/profilePictures/<?php //echo $row['profile_pic']?>" alt="propic-1"> -->
                <img src="./assests/images/profilePictures/dummyprofile.jpg" alt="propic-1">
            </div>
            <div class="cardRow" style="flex-direction: column;">
                <div class="username">
                    <span><?php echo $_SESSION['firstName']." ".$_SESSION['lastName']?></span>
                </div>
            </div>
        </div>
    </div>

    

    <div class="gig-details">
        <div class="gigTitle">
            <?php echo $row['title'] ?>
        </div>
        <!-- Description -->
        <div class="description">
            <p>
                <?php echo $row['description']?>
            </p>
        </div>
        <div class="rating">
            <div class="star-rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
            <div class="numeric-rating">(4.3)</div>
        </div>
        <div class="price">
            <b><span>From 5$<span></b>
        </div>
    </div>
</div>