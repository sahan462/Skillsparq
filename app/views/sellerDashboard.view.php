<?php include "components/sellerDashboardHeader.component.php"; ?>

<?php
$data["activeStatus"] = "display: none;";
$data["profilePicture"] = "assests/images/dummyprofile.jpg";
$data["fullName"] = "K.N.Peiris";
$data["userName"] = "@PeirisKn";
$data["country"] = "Sri Lanka";
$data["expertise"] = "Digital marketing";
$data["joinedDate"] = "August 2018";
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
                    <img src="<?php echo $data["profilePicture"] ?>" alt="pro-pic">
                    <div class="full-name">
                        <?php echo $data["fullName"] ?>
                    </div>
                    <!-- <div class="user-name">
                        <?php
                        // echo $data["userName"] 
                        ?>
                    </div> -->
                    <!-- <div class="star-rating">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span>(0)</span>
                    </div> -->
                </div>
                <!-- <div class="preview-profile">
                    <a href="updateProfile"><button>Preview Profile</button></a>
                </div>
                <div class="edit-profile">
                    <a href="updateProfile"><button>Edit Profile</button></a>
                </div> -->
                <div class="user-info">
                    <div class="info">
                        <!-- <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul> -->
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M12.963 2.286a.75.75 0 00-1.071-.136 9.742 9.742 0 00-3.539 6.177A7.547 7.547 0 016.648 6.61a.75.75 0 00-1.152-.082A9 9 0 1015.68 4.534a7.46 7.46 0 01-2.717-2.248zM15.75 14.25a3.75 3.75 0 11-7.313-1.172c.628.465 1.35.81 2.133 1a5.99 5.99 0 011.925-3.545 3.75 3.75 0 013.255 3.717z" clip-rule="evenodd" />
                            </svg>
                            <span><b>Inbox Response Rate</b></span>
                        </span>
                    </div>
                    <div class="status-bar">
                        <div class="progress-bar">
                            <div class="progress" style="width: 50%"><b>50%</b></div>
                        </div>
                    </div>
                    <div class="info">
                        <span>
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                            </svg> -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M12.963 2.286a.75.75 0 00-1.071-.136 9.742 9.742 0 00-3.539 6.177A7.547 7.547 0 016.648 6.61a.75.75 0 00-1.152-.082A9 9 0 1015.68 4.534a7.46 7.46 0 01-2.717-2.248zM15.75 14.25a3.75 3.75 0 11-7.313-1.172c.628.465 1.35.81 2.133 1a5.99 5.99 0 011.925-3.545 3.75 3.75 0 013.255 3.717z" clip-rule="evenodd" />
                            </svg>
                            <span><b>Inbox response time</b></span>
                        </span>
                        <span><b>N/A</b></span>
                    </div>
                    <div class="info">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M12.963 2.286a.75.75 0 00-1.071-.136 9.742 9.742 0 00-3.539 6.177A7.547 7.547 0 016.648 6.61a.75.75 0 00-1.152-.082A9 9 0 1015.68 4.534a7.46 7.46 0 01-2.717-2.248zM15.75 14.25a3.75 3.75 0 11-7.313-1.172c.628.465 1.35.81 2.133 1a5.99 5.99 0 011.925-3.545 3.75 3.75 0 013.255 3.717z" clip-rule="evenodd" />
                            </svg>
                            <span><b>Order response rate</b></span>
                        </span>
                        <!-- <span><b><?php
                                        echo $data["expertise"] ?></b></span> -->
                    </div>
                    <div class="status-bar">
                        <div class="progress-bar">
                            <div class="progress" style="width: 50%"><b>50%</b></div>
                        </div>
                    </div>
                    <div class="info">
                        <span>
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 01.75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 019.75 22.5a.75.75 0 01-.75-.75v-4.131A15.838 15.838 0 016.382 15H2.25a.75.75 0 01-.75-.75 6.75 6.75 0 017.815-6.666zM15 6.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z" clip-rule="evenodd" />
                                <path d="M5.26 17.242a.75.75 0 10-.897-1.203 5.243 5.243 0 00-2.05 5.022.75.75 0 00.625.627 5.243 5.243 0 005.022-2.051.75.75 0 10-1.202-.897 3.744 3.744 0 01-3.008 1.51c0-1.23.592-2.323 1.51-3.008z" />
                            </svg> -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M12.963 2.286a.75.75 0 00-1.071-.136 9.742 9.742 0 00-3.539 6.177A7.547 7.547 0 016.648 6.61a.75.75 0 00-1.152-.082A9 9 0 1015.68 4.534a7.46 7.46 0 01-2.717-2.248zM15.75 14.25a3.75 3.75 0 11-7.313-1.172c.628.465 1.35.81 2.133 1a5.99 5.99 0 011.925-3.545 3.75 3.75 0 013.255 3.717z" clip-rule="evenodd" />
                            </svg>
                            <span><b>Delivered on time</b></span>
                        </span>
                        <!-- <span><b>July 2023</b></span> -->
                    </div>
                    <div class="status-bar">
                        <div class="progress-bar">
                            <div class="progress" style="width: 50%"><b>50%</b></div>
                        </div>
                    </div>
                    <div class="info">
                        <span>
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                            </svg> -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M12.963 2.286a.75.75 0 00-1.071-.136 9.742 9.742 0 00-3.539 6.177A7.547 7.547 0 016.648 6.61a.75.75 0 00-1.152-.082A9 9 0 1015.68 4.534a7.46 7.46 0 01-2.717-2.248zM15.75 14.25a3.75 3.75 0 11-7.313-1.172c.628.465 1.35.81 2.133 1a5.99 5.99 0 011.925-3.545 3.75 3.75 0 013.255 3.717z" clip-rule="evenodd" />
                            </svg>
                            <span><b>Order completion</b></span>
                        </span>
                        <!-- <span><b>N/A</b></span> -->
                    </div>
                    <div class="status-bar">
                        <div class="progress-bar">
                            <div class="progress" style="width: 50%"><b>50%</b></div>
                        </div>
                    </div>
                </div>
                <div class="description"></div>
            </div>
            <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
            </svg> -->

            <div class="profile">
                <span>Inbox</span>
                <a href="./sellerInbox.view.php">See All</a>
                <!-- <div class="education">
                    <form method="get" action=""></form>
                </div>
                <div class="skills">
                    <form method="get" action=""></form>
                </div>
                <div class="certificates">
                    <form method="get" action=""></form>
                </div>
                <div class="languages">
                    <form method="get" action=""></form>
                </div> -->
            </div>

        </div>

        <div class="user-contribution">

            <div class="user-content">
                <div class="header">
                    <span>My Gigs</span>
                    <a href="Gig"><button>Create New Gig</button></a>
                </div>
                <div class="content">
                    <div class="job-card" job-url="home">
                    </div>
                    <div class="job-card" job-url="job-details.html">
                    </div>
                    <div class="job-card" job-url="job-details.html">
                    </div>
                    <div class="job-card" job-url="job-details.html">
                    </div>
                </div>
            </div>

            <div class="reviews">
                <div class="header">
                    <span>Feedbacks and ratings</span>
                </div>
                <div class="review-content">
                    hghjg
                </div>
            </div>
        </div>
    </div>
    <div class="slider-out-container">
        <div class="slider-container">
            <div class="slider">
                <div class="slides">
                    <!--radio buttons-->
                    <input type="radio" name="radio-btn" id="radio1">
                    <input type="radio" name="radio-btn" id="radio2">
                    <input type="radio" name="radio-btn" id="radio3">
                    <input type="radio" name="radio-btn" id="radio4">
                    <!--slide images-->
                    <div class="slide first">
                        <img src="./assests/images/silder image 1.jpeg" alt="image1">
                    </div>
                    <div class="slide">
                        <img src="./assests/images/silder image 2.jpg" alt="image2">
                    </div>
                    <div class="slide">
                        <img src="./assests/images/silder image 3.jpeg" alt="image3">
                    </div>
                    <div class="slide">
                        <img src="./assests/images/silder image 4.webp" alt="image4">
                    </div>
                    <!--automatic navigation-->
                    <div class="navigation-auto">
                        <div class="auto-btn1"></div>
                        <div class="auto-btn2"></div>
                        <div class="auto-btn3"></div>
                        <div class="auto-btn4"></div>
                    </div>

                    <!--manual navigation-->
                    <div class="navigation-manual">
                        <label for="radio1" class="manual-btn"></label>
                        <label for="radio2" class="manual-btn"></label>
                        <label for="radio3" class="manual-btn"></label>
                        <label for="radio4" class="manual-btn"></label>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/skillsparq/public/assests/js/profile.script.js"></script>
<script src="./assests/js/home.script.js"></script>
</body>

</html>