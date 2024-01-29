<?php include "components/sellerHeader.component.php"; ?>

<?php
    $data['fullName'] = $data['sellerProfileDetails']['first_name']." ".$data['sellerProfileDetails']['last_name'];
    $data["profilePicture"] = "dummyprofile.jpg";
    $recentGigs = $data['recentGigs'];
?>

<!-- Main Container for Seller Profile -->
<!-- 
<div class="container">

<div v class="personalizedHeader">
        Howdy, <?php //echo $data['fullName'] ?>
    </div>

    <div class="profile-header">

        <div class="seller">

            <div class="img-container">

                <div class="img">
                    <img src="../public/assests/images/<?php //echo $data["profilePicture"] ?>" alt="pro-pic">
                </div>

                <div class="icons-content">

                    <div class="icon-name">
                        <?php //echo $data['fullName']?>
                    </div>

                    <div class="icon-name">
                        <?php //echo '@'.$data['sellerProfileDetails']['user_name']?>
                    </div>

                    <div class="icon-location">

                        <div class="icon">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7">
                                <path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                            </svg>

                        </div>

                        <div class="icon-location-value">Colombo Sri Lanka</div>

                    </div>

                    <div class="icon-time">

                        <div>Local Time is</div>

                        <div class="time"></div>

                    </div>

                </div>

            </div>

            <div class="buttons">

                <a href="<?php //echo BASEURL."editSellerProfile"?>">
                    <button id="button">Profile Update</button>
                </a>
            </div>
        </div>
    </div>

    <div class="profile-container">

        <div class="profile-content">

            <div class="profile-content1">

                <div class="content-category1">

                    <div class="profile-content-category-header">

                        <div class="Topics">About</div>

                    </div>

                    <div class="profile-content-category-content">
                        <?php //$data['sellerProfileDetails']['about']?>
                    </div>

                    <div class="profile-content-category-header">
                        <div class="Topics">Languages</div>
                    </div>

                    <div class="profile-content-category-content">
                        <?php //echo $data['sellerProfileDetails']['languages']?>
                    </div>

                    <div class="profile-content-category-header">
                        <div class="Topics">Education</div>
                    </div>

                    <div class="profile-content-category-content"  style="border-bottom: 0;">
                        
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus aspernatur commodi quidem vero harum veniam incidunt fuga cupiditate, dignissimos voluptatem corporis nihil quaerat sit ipsam deleniti accusamus animi hic architecto non error officiis nobis minima. Error maxime tempore esse alias.
                    </div>

                </div>

            </div>

            <div class="profile-content2">

                <div class="content-category2">

                    <div class="profile-content-category-header">
                        <div class="Topics">Portfolio</div>

                    </div>

                    <div class="profile-content-category-content" style="border-bottom: 0;">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero iure, cupiditate magni accusamus, perferendis non enim quibusdam eius explicabo eos odio labore, consequuntur ad facilis corporis assumenda eum sit rem inventore autem. A voluptatem deleniti, rerum pariatur odio numquam minima. Veritatis impedit repudiandae explicabo sit ea repellat assumenda nulla. Sint enim consequatur nam saepe illum, earum rem amet eius aspernatur accusantium dolor ad. Reprehenderit eveniet veniam maiores qui ipsa ad laudantium quos, tempore itaque possimus debitis magni modi ducimus tenetur quia velit fugiat hic architecto libero. Quaerat, dolorum suscipit consequuntur necessitatibus dicta sapiente voluptatum optio, aspernatur, ratione saepe asperiores quam.
                    </div>

                </div>

                <div class="content-category2">

                    <div class="profile-content-category-header">
                        <div class="Topics">Skills</div>
                    </div>

                    <div class="profile-content-category-content" style="border-bottom: 0;">
                        <?php //echo $data['sellerProfileDetails']['skills'];?>
                    </div>

                </div>

            </div>

        </div>

        <div class="other-category-container" id="gigs">

                <div class="other-category-header">

                    <div class="Topics" style="padding-left: 0;">My Gigs</div>

                    <div class="plus" >
                        <a href="addGig">
                            <button id="plus">Add New Gig</button>
                        </a>

                    </div>

                </div>

                <div class="recentGigs" id="content">
                    <div class="recentGigsContent">
                        <?php
                            //foreach($recentGigs as $row){
                        ?>
                                <?php //include "components/GigCard.component.php"?>
                        <?php
                            //}
                        ?>
                    </div>

                </div>
            </div>


        </div> -->

    


<!-- Main Container -->
<div class="buyerProfileContainer">

    <!-- Modal 1 -->
    <div class="overlay" id="overlay">
        <div class="modal" id="Modal">
            <form id="profileUpdateForm" method="post" action="buyerProfile/updateBuyerProfile" enctype="multipart/form-data">

                <div class="profile-picture">

                    <div class="updateProfilePicture">

                        <img id="previewImage" src="./assests/images/profilePictures/<?php echo $profile["profile_pic"]?>" alt="pro-pic">
                        <div class="editIcon">
                            <label for="newProfilePicture" >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>
                            </label>
                        </div>
                        <input type="file" name="newProfilePicture" id="newProfilePicture" style="display:none" accept="image/*" onchange="renderImage()" />

                    </div>

                    <label class="type-1">Update Your Profile Picture</label>
                    <label class="type-2">Update your profile picture by uploading image attachments.</label>

                </div>

                <div class="row">

                    <div class="full-name">

                        <div class="row">
                            <label class="type-1">First Name:</label>
                            <input type="text" id="firstName" name="firstName" value="<?php echo $profile['first_name'] ?>" >
                        </div>

                        <div class="row">
                            <label class="type-1">Last Name:</label>
                            <input type="text" id="lastName" name="lastName" value="<?php echo $profile['last_name'] ?>" >
                        </div>

                    </div>

                </div>

                <div class="row">

                    <!-- <label for="attachments" class="type-1">Country:</label> -->

                    <!-- <select id="country" name="country"></select> -->

                </div>


                <div class="row">

                    <label for="attachments" class="type-1">About:</label>
                    <textarea rows="5" id="about" name="about"><?php echo $profile['about']; ?></textarea>

                </div>

                <div class="buttons">
                    <button type="button" onclick="confirmAction('cancel')">Cancel Update</button>
                    <button type="button" onclick="confirmAction('send')">Update Profile</button>
                </div>

                <input type="hidden" name="userId" value="<?php echo $_SESSION['userId']?>">
                <input type="hidden" name="userName" value="<?php echo $_SESSION['userName']?>">
                <input type="hidden" name="currentProfilePicture" value="<?php echo $profile['profile_pic']?>">

            </form>
        </div>
    </div>

    <!-- Modal 2 -->
    <div class="overlay" id="cancelConfirmationOverlay">
        <div class="confirmation" id="cancelConfirmation">
            <p>Are you sure want to cancel?</p>
            <div class="buttons">
                <button onclick="handleConfirmation('cancelNo')">No</button>
                <button onclick="handleConfirmation('cancelYes')">Yes</button>
            </div>
        </div>
    </div>

    <!-- Modal 3 -->
    <div class="overlay" id="sendConfirmationOverlay">
        <div class="confirmation" id="sendConfirmation">
            <p>Are you sure want to continue?</p>
            <div class="buttons">
                <button onclick="handleConfirmation('sendNo')">No</button>
                <button onclick="handleConfirmation('sendYes')">Yes</button>
            </div>
        </div>
    </div>


    <!-- Topic -->
    <div class="buyerProfileHeader">
        My Profile
    </div>

    <div class="sub-container">
        <div class="profile-container">

            <div class="profile">

                <?php if($profile['last_seen'] == 'online') {?>
                    <div class="online">
                        <span style="display:flex; align-items:center; gap: 4px; justify-content: flex-end;"><div class="onlineDot"></div>Online</span>
                    </div>
                <?php }else{ ?>
                    <div class="offline">
                        <span style="display:flex; align-items:center; gap: 4px; justify-content: flex-end;"><div class="offlineDot"></div>Last seen: <?php echo $profile['last_seen']?></span>
                    </div>
                <?php } ?>

                <div class="profile-picture">
                    <img src="../public/assests/images/profilePictures/<?php echo $profile["profile_pic"]?>" alt="pro-pic">
                    <div class="full-name">
                        <?php echo $profile["first_name"] . " " . $profile["last_name"]; ?>
                    </div>
                    <div class="user-name">
                        <?php echo '@'.$profile['user_name'] ?>
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
                    <button>Preview Profile</button>
                </div>
                <div class="edit-profile">
                    <button   onclick="openPackageModal(this)">Edit Profile</button>
                </div>
                <div class="user-info">
                    <div class="info">
                        <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                        </svg>
                            From
                        </span>
                        <span><b><?php echo $profile['country'] ?></b></span>
                    </div>
                    <div class="info">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                            </svg>
                            Member Since
                        </span>
                        <span><b><?php echo $profile['joined_date'];?></b></span>
                    </div>
                </div>
            </div>

            <div class="profile">
                <div class="description">
                    <div class="topic">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                        </svg>
                        <span>About</span>
                    </div>
                    <div class="description-content">
                        <?php echo $profile['about'];?>
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





<!-- <script>
    // Function to update the div with the current local time
    function updateLocalTime() {
        // Get the current local time
        const currentTime = new Date();
        // Format the time as needed (for example, HH:mm:ss)
        const formattedTime = currentTime.toLocaleTimeString();
        // Select the div using the class selector and update its content
        const iconTimeDiv = document.querySelector('.time');
        iconTimeDiv.textContent = formattedTime;
    }

    // Update the time initially
    updateLocalTime();

    // Update the time every second (1000 milliseconds)
    setInterval(updateLocalTime, 1000);
</script> -->

<?php include "components/footer.component.php"; ?>
