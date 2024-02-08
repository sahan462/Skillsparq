<?php include "components/sellerHeader.component.php"; ?>

<?php
    $username = $data['sellerProfileDetails']['user_name'];
    $profilepicture = $data['sellerProfileDetails']['profile_pic'];
    $firstname = $data['sellerProfileDetails']['first_name'];
    $lastname = $data['sellerProfileDetails']['last_name'];
    $Country = $data['sellerProfileDetails']['country'];
    $Country = "Sri Lanka";
    $DateJoined = $data['sellerProfileDetails']['joined_date'];
    $lastSeen = $data['sellerProfileDetails']['last_seen'];
    $about = $data['sellerProfileDetails']['about'];
    $languages = $data['sellerProfileDetails']['languages'];
    $skills = $data['sellerProfileDetails']['skills'];
    $userId = $data['sellerProfileDetails']['user_id'];
    $status = $data['activeStatus'];
    $Gigs = (array) $data['gigs'];
    // print_r($Gigs['gig_id']);
    // show($data);

?>

<!-- Main Container for Seller -->
<div class="sellerProfileContainer">

    <!-- Modal 1 -->
    <div class="overlay" id="overlay">
        <div class="modal" id="Modal">
            <form id="profileUpdateForm" method="post" action="sellerProfile/updateSellerProfile" enctype="multipart/form-data">

                <div class="seller-profile-picture">

                    <div class="updateSellerProfilePicture">

                        <img id="previewImage" src="./assests/images/profilePictures/<?php echo $profilepicture?>" alt="pro-pic">
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

                    <div class="seller-full-name">

                        <div class="row">
                            <label class="type-1">First Name:</label>
                            <input type="text" id="firstName" name="firstName" value="<?php echo $firstname ?>" >
                        </div>

                        <div class="row">
                            <label class="type-1">Last Name:</label>
                            <input type="text" id="lastName" name="lastName" value="<?php echo $lastname ?>" >
                        </div>

                    </div>

                </div>

                <div class="row">

                    <!-- <label for="attachments" class="type-1">Country:</label> -->

                </div>


                <div class="row">

                    <label for="attachments" class="type-1">About:</label>
                    <textarea rows="5" id="about" name="about"><?php echo $about; ?></textarea>

                </div>

                <div class="buttons">
                    <button type="button" onclick="confirmAction('cancel')">Cancel Update</button>
                    <button type="button" onclick="confirmAction('send')">Update Profile</button>
                </div>

                <input type="hidden" name="userId" value="<?php echo $_SESSION['userId']?>">
                <input type="hidden" name="userName" value="<?php echo $_SESSION['userName']?>">
                <input type="hidden" name="currentProfilePicture" value="<?php echo $profilepicture?>">

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
    <div class="sellerProfileHeader">
        My Profile
    </div>

    <div class="sub-container">
        <div class="profile-container">

            <div class="profile">

                <?php if($lastSeen == 'online') {?>
                    <div class="online">
                        <span style="display:flex; align-items:center; gap: 4px; justify-content: flex-end;"><div class="onlineDot"></div>Online</span>
                    </div>
                <?php }else{ ?>
                    <div class="offline">
                        <span style="display:flex; align-items:center; gap: 4px; justify-content: flex-end;">
                            <div class="offlineDot">

                            </div>Last seen: <?php echo $lastSeen?>
                        </span>
                    </div>
                <?php } ?>

                <div class="seller-profile-picture">
                    <img src="../public/assests/images/profilePictures/<?php echo $profilepicture?>" alt="pro-pic">
                    <div class="full-name">
                        <?php echo $firstname. " " . $lastname; ?>
                    </div>
                    <div class="user-name">
                        <?php echo '@'.$username ?>
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
                    <button onclick="openPackageModal(this)">Edit Profile</button>
                </div>
                <div class="user-info">
                    <div class="info">
                        <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                        </svg>
                            From
                        </span>
                        <span><b><?php echo $Country ?></b></span>
                    </div>
                    <div class="info">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                            </svg>
                            Member Since
                        </span>
                        <span><b><?php echo $DateJoined;?></b></span>
                    </div>
                </div>
            </div>

            <div class="profile">
                <div class="description">
                    <div class="topic">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                            </svg>
                            <span>About</span>
                        </div>
                        <div>
                            <a href="">edit</a>
                        </div>
                    </div>
                    <div class="description-content">
                        <?php echo $about;?>
                    </div>
                </div>
            </div>

        </div>

        <div class="sellerUser-contribution">

            <div class="sellerUser-content">
                <div class="sellerheader">
                    <span>My Gigs(<?php echo sizeof($Gigs)?>)</span>
                    <a href="addGig"><button>Create A New Gig</button></a>
                </div>
                <div class="Gig-content">
                    <?php
                        if(!empty($Gigs)){ 
                            foreach($Gigs as $row){
                                include "components/GigCard.component.php";
                            }
                        }
                    ?>
                    <?php    
                    ?>
                </div>
            </div>

            <div class="reviews">
                <div class="sellerheader">
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
<script src="/skillsparq/public/assests/js/sellerProfile.script.js"></script>


<?php include "components/footer.component.php"; ?>
