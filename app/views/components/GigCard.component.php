<div class="gigCard" gigUrl="displayGig&gigId=<?php echo $row['gig_id']?>">
    <!-- Cover Image -->
    <div class="coverImg">
        <img src="./assests/images/gigimages/<?php echo $row['cover_image']?>" alt="card-1">
    </div>

    <div class="title">
        <?php //echo $job['title']?>
        <!-- <div class="links">
            <a href="updateGig&amp;userId=<?php echo $row['seller_id']?>&amp;jobId=<?php echo $row['gig_id']?>&amp;">edit</a>
            <a href="job/deleteJob&amp;userId=<?php echo $row['seller_id']?>&amp;jobId=<?php echo $row['gig_id']?>&amp;>delete</a>
        </div> -->
    </div>

    <!-- User Details -->
    <div class="user-details" >
        <div class="cardRow" style="align-items: center;">
            <div class="profile-pic">
                <img src="./assests/images/avishka.jpg" alt="propic-1">
            </div>
            <div class="cardRow" style="flex-direction: column;">
                <div class="username">
                    <span><?php echo $_SESSION['firstName']." ".$_SESSION['lastName']?></span>
                </div>
            </div>
        </div>
    </div>

    <!-- title and rating -->
    <div class="gig-details">
        <div class="gigTitle">
            <?php echo $row['title'] ?>
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
        <!-- starting price -->
        <div class="price">
            <b><span>From 5$<span></b>
        </div>
    </div>
</div>