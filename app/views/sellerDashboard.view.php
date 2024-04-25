<?php include "components/sellerHeader.component.php"; ?>

<?php

$firstName = $data['sellerProfileDetails']['first_name'];
$lastName = $data['sellerProfileDetails']['last_name'];
$profilePicture = $data['sellerProfileDetails']['profile_pic'];
$userName = $data["sellerProfileDetails"]['user_name'];

$data["activeStatus"] = "display: block";
$data['ongoingOrders'] = 0;
$data["completedOrders"] = 0;
$data["earningsThisMonth"] = "$0";
$data["lastDelivery"] = "July 2023";
$data["expertise"] = "Tech";

$jobs = $data['AllJobs'];

?>

<div class="sellerDashboard-content">

    <div class="personalizedHeader">
        Howdy, <?php echo $firstName . " " . $lastName ?>
    </div>

    <div class="dashboard-container">
        <div class="seller-details">
            <div class="profile">
                <?php
                if ($_SESSION['status'] === "online") {
                ?>
                    <!-- <div class="active-status" style="<?php //echo $data["activeStatus"] 
                                                            ?>">
                        <i class="dot">.</i>
                        Online
                    </div> -->
                    <div class="online">
                        <span style="display:flex; align-items:center; gap: 4px; justify-content: flex-end; color:#31d65a">
                            <div class="onlineindc">
                            </div>Online
                        </span>
                    </div>
                <?php
                } else {
                ?>
                    <div class="online" style="display:none">
                        <span style="display:flex; align-items:center; gap: 4px; justify-content: flex-end; color:#31d65a">
                            <div class="onlineindc">
                            </div>Online
                        </span>
                    </div>
                <?php
                }
                ?>
                <div class="profile-picture">
                    <img src="../public/assests/images/profilePictures/<?php echo $profilePicture ?>" alt="pro-pic" loading="lazy">
                    <div class="full-name">
                        <?php echo $firstName . " " . $lastName ?>
                    </div>
                    <div class="user-name">
                        <?php echo $userName ?>
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
                    <a href="sellerProfile#gigs"><button>View My Gigs</button></a>
                </div>
                <div class="user-info">
                    <div class="info">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 01.75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 019.75 22.5a.75.75 0 01-.75-.75v-4.131A15.838 15.838 0 016.382 15H2.25a.75.75 0 01-.75-.75 6.75 6.75 0 017.815-6.666zM15 6.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z" clip-rule="evenodd" />
                                <path d="M5.26 17.242a.75.75 0 10-.897-1.203 5.243 5.243 0 00-2.05 5.022.75.75 0 00.625.627 5.243 5.243 0 005.022-2.051.75.75 0 10-1.202-.897 3.744 3.744 0 01-3.008 1.51c0-1.23.592-2.323 1.51-3.008z" />
                            </svg>
                            Ongoing Orders
                        </span>
                        <span><b><?php echo $data["ongoingOrders"] ?></b></span>
                    </div>
                    <div class="info">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 01-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004zM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 01-.921.42z" />
                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v.816a3.836 3.836 0 00-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 01-.921-.421l-.879-.66a.75.75 0 00-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 001.5 0v-.81a4.124 4.124 0 001.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 00-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 00.933-1.175l-.415-.33a3.836 3.836 0 00-1.719-.755V6z" clip-rule="evenodd" />
                            </svg>
                            Earnings(This Month)
                        </span>
                        <span><b><?php echo $data["earningsThisMonth"] ?></b></span>
                    </div>
                    <div class="info">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                            </svg>
                            Completed Orders
                        </span>
                        <span><b><?php echo $data["completedOrders"] ?></b></span>
                    </div>
                    <div class="info">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z" />
                                <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z" clip-rule="evenodd" />
                            </svg>
                            Last Delivery
                        </span>
                        <span><b><?php echo $data["lastDelivery"] ?></b></span>
                    </div>
                </div>
            </div>
            <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
            <dotlottie-player src="https://lottie.host/f7447497-2858-429b-b8c5-111d24de9b54/FQJOFIwVkX.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
        </div>
        <div class="job-feed">
            <div class="searchBar">
                <form method="get" action="Job/searchJob">
                    <input type="text" placeholder="Search for Job" name="search">
                    <button name="submit" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="jobs">
                <div class="job-header">
                    <h3>Most Recent Jobs You Might Like</h3>
                </div>
                <div class="jobContent">
                    <?php
                    if (!empty($jobs)) {
                        foreach ($jobs as $job) {
                            include "components/jobCard.component.php";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="/skillsparq/public/assests/js/sellerDashboard.js"></script>

<?php include "components/footer.component.php"; ?>