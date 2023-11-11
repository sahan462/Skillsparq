<?php include "components/sellerHeader.component.php"; ?>

<?php 

    $data["fullName"] = "Damitha Sahan";
    $data["activeStatus"] = "display: none";
    $data['country'] = "Sri Lanka";
    $data["expertise"] = "Tec";
    $data["userName"] = "@DSahan";
    $data["profilePicture"] = "dummyprofile.jpg";

    $job['title'] = "Design and Create a front end for a python script on a debian virtual comptuer";
    $job['job_id'] = "125";
    $job['publish_mode'] = "StandardMode";
    $job["description"] = "Use of Chat GPT to create course materials for an IELTS course.

    Chat GPT prompts will be given to the freelancer. The freelancer doesn't need to check the exercises they just need to create them and save them to a google drive folder.
    
    Work
    
    A) Choose 12 words at random from a list that will be given to the freelancer and then use chat GPT to create exercises for this list.  
    B) 20 units of materials need to be created (3 exercises per unit)";
    $job["category"] = "programming and tech";
    $job["amount"] = "$200";
    $job["flexible_amount"] = 0;
    $job["deadline"] = 0;
    $job["buyer_id"] = 0;
?>

<div class="sellerDashboard-content">

    <div class="personalizedHeader">
        Howdy, <?php echo $_SESSION['firstName']?>
    </div>

    <div class="dashboard-container">
        <div class="seller-details">
            <div class="profile">
                <div class="active status" style="<?php echo $data["activeStatus"] ?>">
                    <i class="dot">.</i>
                    Online
                </div>
                <div class="profile-picture">
                    <img src="../public/assests/images/<?php echo $data["profilePicture"]?>" alt="pro-pic">
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
                    <a href="updateProfile"><button>Create New Gig</button></a>
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
        </div>
        <div class="job-feed">
            <div class = "searchBar">
                <form action="">
                    <input type="text" placeholder="Search for Job" name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="jobs">
                <div class="job-header">
                    <h3>Most Recent Jobs you might like</h3>
                </div>
                <div class="content">
                        <?php
                            $i = 0;
                            while($i < 10){
                           // if(!empty($jobs)){ 
                             //   foreach($jobs as $job){
                                    include "components/jobCard.component.php";
                                    $i = $i + 1;
                             }
                        ?>
                        <?php //}} ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="free-space">
            <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
            <dotlottie-player src="https://lottie.host/84544522-a07f-44a8-919e-e091bc4e958d/LECQF9SAWe.json" background="transparent" speed="1" style="width: 300px; height: 600px;" loop autoplay></dotlottie-player>
        </div>
    </div>

</div>