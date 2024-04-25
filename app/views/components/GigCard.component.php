<div class="gigCard" gig-url="displayGig&amp;gigId=<?php echo $row['gig_id']?>&amp;userId=<?php echo $row['seller_id']?>">

    <?php
        if($_SESSION['role'] == "Seller"){
            if(($row['ongoing_order_count']) === 0){
        
    ?>
    <div class="deleteContainer">
        <div class="dltIcon">
            <button>
                <a href="Gig/deleteGig&amp;userId=<?php echo $row['seller_id']?>&amp;gigId=<?php echo $row['gig_id']?>">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15.5303 9.53033C15.8232 9.23744 15.8232 8.76256 15.5303 8.46967C15.2374 8.17678 14.7625 8.17678 14.4696 8.46967L15.5303 9.53033ZM8.46961 14.4697C8.17672 14.7626 8.17672 15.2374 8.46961 15.5303C8.76251 15.8232 9.23738 15.8232 9.53027 15.5303L8.46961 14.4697ZM9.53039 8.46967C9.2375 8.17678 8.76263 8.17678 8.46973 8.46967C8.17684 8.76256 8.17684 9.23744 8.46973 9.53033L9.53039 8.46967ZM14.4697 15.5303C14.7626 15.8232 15.2375 15.8232 15.5304 15.5303C15.8233 15.2374 15.8233 14.7626 15.5304 14.4697L14.4697 15.5303ZM14.4696 8.46967L8.46961 14.4697L9.53027 15.5303L15.5303 9.53033L14.4696 8.46967ZM8.46973 9.53033L14.4697 15.5303L15.5304 14.4697L9.53039 8.46967L8.46973 9.53033ZM8 4.75H16V3.25H8V4.75ZM19.25 8V16H20.75V8H19.25ZM16 19.25H8V20.75H16V19.25ZM4.75 16V8H3.25V16H4.75ZM8 19.25C6.20507 19.25 4.75 17.7949 4.75 16H3.25C3.25 18.6234 5.37665 20.75 8 20.75V19.25ZM19.25 16C19.25 17.7949 17.7949 19.25 16 19.25V20.75C18.6234 20.75 20.75 18.6234 20.75 16H19.25ZM16 4.75C17.7949 4.75 19.25 6.20507 19.25 8H20.75C20.75 5.37665 18.6234 3.25 16 3.25V4.75ZM8 3.25C5.37665 3.25 3.25 5.37665 3.25 8H4.75C4.75 6.20507 6.20507 4.75 8 4.75V3.25Z" fill="#018347"></path> </g>
                    </svg>
                </a>
            </button>
        </div>
    </div>
    <?php
            }else{
    ?>  
        <!-- visibility Hidden -->
    <?php
            }
        }else if($_SESSION['role'] == "Buyer"){
            // visibility hidden
        }
    ?>
    
    <!-- Cover Image -->
    <div class="coverImg">
        <img src="./assests/images/gigImages/coverImages/<?php echo $row['cover_image']?>" alt="card-1">
    </div>
    

    <div class="title">
        <?php //echo $row['title']?>
    </div>

    <!-- User Details -->
    <div class="user-details">
        <div class="cardRow" style="align-items: center;">
            <div class="profile-pic">
                <img src="./assests/images/profilePictures/<?php echo $row['profile_pic']?>" alt="propic-1">
            </div> 
            <div class="cardRow" style="flex-direction: column;">
                <div class="username">
                    <?php
                        if($_SESSION['role'] === "Buyer" || $_SESSION['role'] === "Seller"){
                    ?>
                        <span><?php echo $row['first_name']." ".$row['last_name']?></span>
                    <?php
                        }else{
                    ?>
                        <!-- Visibility Hidden -->
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>


    <!-- title and rating -->
    <div class="gig-details">
        <div class="gigTitle">
            <?php echo $row['title'] ?>
        </div>
        <!-- Description -->
        <div class="description">
            <!-- <p>
                <?php //echo $row['description']?>
            </p> -->
        </div>
        <div class="rating">
            <?php // have to create a rating mechanism.?>
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

        <div class="links">
            <?php
                if($_SESSION['role'] === "Seller"){
            ?>
                    <button class="buttonType-1">
                        <a href="updateGig&amp;userId=<?php echo $row['seller_id']?>&amp;gigId=<?php echo $row['gig_id']?>">Update</a>
                    </button>
                    
            <?php
                    
                    //else{
            ?>
                    <!-- <a href="updateGig&amp;userId=<?php echo $row['seller_id']?>&amp;gigId=<?php echo $row['gig_id']?>" hidden><button>Update</button></a> -->
            <?php
                    //}
                }else{
            ?>
                    <!-- visibility hidden -->
            <?php 
                }
            ?>
        </div>
    </div>
</div>