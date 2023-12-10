<?php 
    include "components/buyerSimpleHeader.component.php"; 
    $jobs = $data['jobs'];
    //$profile = $data['profile'];
?>
<?php 
    $data["activeStatus"] = "display: none;";
    $data["profilePicture"] = "assests/images/dummyprofile.jpg";
    $data["fullName"] = $_SESSION['firstName']." ".$_SESSION['lastName'];
    $data["userName"] = "@".$_SESSION['userName'];
    $data["country"] = "Sri Lanka";
    $data["expertise"] = "Programming and Tech";
    $data["joinedDate"] = "July 2023";
    $data["jobs"] = array();
    $data["feedbacks"] = array();

?>
    <div class="container">
        <div class="sub-container">
            <div class="profile-container">

                <div class="profile">
                    <div class="active status" style="<?php echo $data["activeStatus"] ?>">
                        <i class="dot">.</i>
                        Online
                    </div>
                    <div class="profile-picture">
                        <img src="<?php echo $data["profilePicture"]?>" alt="pro-pic">
                        <div class="full-name">
                            <?php echo $data["fullName"] ?>
                        </div>
                        <div class="user-name">
                            <?php echo $data["userName"] ?>
                        </div>
                        <div class="star-rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span>(0)</span>
                        </div>
                    </div>
                    <div class="preview-profile">
                        <a href="updateProfile"><button>Preview Profile</button></a>
                    </div>
                    <div class="edit-profile">
                        <a href="updateProfile"><button>Edit Profile</button></a>
                    </div>
                    <div class="user-info">
                        <div class="info">
                            <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                            </svg>
                                From
                            </span>
                            <span><b><?php echo $data["country"] ?></b></span>
                        </div>
                        <div class="info">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                                </svg>
                                Member Since
                            </span>
                            <span><b>July 2023</b></span>
                        </div>
                        <div class="info">
                            <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M12.963 2.286a.75.75 0 00-1.071-.136 9.742 9.742 0 00-3.539 6.177A7.547 7.547 0 016.648 6.61a.75.75 0 00-1.152-.082A9 9 0 1015.68 4.534a7.46 7.46 0 01-2.717-2.248zM15.75 14.25a3.75 3.75 0 11-7.313-1.172c.628.465 1.35.81 2.133 1a5.99 5.99 0 011.925-3.545 3.75 3.75 0 013.255 3.717z" clip-rule="evenodd" />
                            </svg>
                                Expertise
                            </span>
                            <span><b><?php echo $data["expertise"] ?></b></span>
                        </div>
                        <div class="info">
                            <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 01.75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 019.75 22.5a.75.75 0 01-.75-.75v-4.131A15.838 15.838 0 016.382 15H2.25a.75.75 0 01-.75-.75 6.75 6.75 0 017.815-6.666zM15 6.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z" clip-rule="evenodd" />
                                <path d="M5.26 17.242a.75.75 0 10-.897-1.203 5.243 5.243 0 00-2.05 5.022.75.75 0 00.625.627 5.243 5.243 0 005.022-2.051.75.75 0 10-1.202-.897 3.744 3.744 0 01-3.008 1.51c0-1.23.592-2.323 1.51-3.008z" />
                            </svg>
                                Last Delivery
                            </span>
                            <span><b>July 2023</b></span>
                        </div>
                    </div>
                </div>

                <div class="profile">
                    <div class="description">
                        <div class="topic">
                            <span>Description</span>
                            <div class="link">
                                <a href="#">edit</a>
                                <a href="">remove</a>
                            </div>
                        </div>
                        <div class="description-content">
                            Lorem ipsum dolor sit amet, consectetur 
                            adipiscing elit, sed do eiusmod tempor 
                            incididunt ut labore et dolore magna aliqua.
                            Lorem ipsum dolor sit amet, consectetur 
                            adipiscing elit, sed do eiusmod tempor 
                            incididunt ut labore et dolore magna aliqua.
                            Lorem ipsum dolor sit amet, consectetur 
                            adipiscing elit, sed do eiusmod tempor 
                            incididunt ut labore et dolore magna aliqua.
                        </div>
                    </div>
                </div>

            </div>

            <div class="user-contribution">

                <div class="user-content">
                    <div class="header">
                        <span>Active Jobs(<?php echo sizeof($jobs)?>)</span>
                        <a href="addJob"><button>Create New Job</button></a>
                    </div>
                    <div class="content">
                        <?php
                            if(!empty($jobs)){ 
                                foreach($jobs as $job){
                                    include "components/jobCard.component.php";
                        ?>
                        <?php }} ?>
                    </div>
                </div>

                <div class="reviews">
                    <div class="header">
                        <span>Feedbacks and ratings</span>
                    </div>
                    <div class="review-content">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>No feedbacks available</span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/skillsparq/public/assests/js/profile.script.js"></script>
    
<?php include "components/footer.component.php"; ?>