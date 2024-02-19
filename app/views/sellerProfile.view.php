<?php include "components/sellerHeader.component.php"; ?>

<?php
    $username = $data['sellerProfileDetails']['user_name'];
    $profilepicture = $data['sellerProfileDetails']['profile_pic'];
    $firstname = $data['sellerProfileDetails']['first_name'];
    $lastname = $data['sellerProfileDetails']['last_name'];
    $Country = "Sri Lanka";
    $DateJoined = $data['sellerProfileDetails']['joined_date'];
    $lastSeen = $data['sellerProfileDetails']['last_seen'];
    $about = $data['sellerProfileDetails']['about'];
    // $languages = $data['sellerProfileDetails']['languages'];
    // $skills = $data['sellerProfileDetails']['skills'];
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
                        <span>
                            <b>
                                <?php echo $Country ?>
                            </b>
                        </span>

                        
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
                        
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                        </svg>
                        <span>About</span>

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

            <div class="reviews">

                <div class="sellerheader">

                    <span>My Portfolio</span>

                </div>

                <div class="review-content">

                        <?php //if(empty()){?>
                            <?php //}?>

                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M9 1.09V6H7V1.09C4.16 1.57 2 4.03 2 7c0 2.22 1.21 4.15 3 5.19V21c0 .55.45 1 1 1h4c.55 0 1-.45 1-1v-8.81c1.79-1.04 3-2.97 3-5.19c0-2.97-2.16-5.43-5-5.91m1 9.37l-1 .58V20H7v-8.96l-1-.58C4.77 9.74 4 8.42 4 7c0-1 .37-1.94 1-2.65V8h6V4.35c.63.71 1 1.65 1 2.65c0 1.42-.77 2.74-2 3.46m10.94 7.48a3.253 3.253 0 0 0 0-.89l.97-.73a.22.22 0 0 0 .06-.29l-.92-1.56c-.05-.1-.18-.14-.29-.1l-1.15.45c-.24-.17-.49-.32-.78-.44l-.17-1.19a.235.235 0 0 0-.23-.19h-1.85c-.12 0-.22.08-.24.19l-.17 1.19c-.29.12-.54.27-.78.44l-1.15-.45c-.1-.04-.24 0-.28.1l-.93 1.56c-.06.1-.03.22.06.29l.97.73c-.01.15-.03.3-.03.45s.02.29.03.44l-.97.74a.22.22 0 0 0-.06.29l.93 1.56c.04.1.18.13.28.1l1.15-.46c.24.18.49.33.78.45l.17 1.19c.02.11.12.19.24.19h1.85c.11 0 .21-.08.23-.19l.17-1.19c.29-.12.54-.27.78-.45l1.15.46c.11.03.24 0 .29-.1l.92-1.56a.22.22 0 0 0-.06-.29zM17.5 19c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5s1.5.67 1.5 1.5s-.67 1.5-1.5 1.5"/></svg>
                    <span>Setup Your Portfolio Right Now !</span>

                </div>

            </div>

        </div>
        
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/skillsparq/public/assests/js/sellerProfile.script.js"></script>


<?php include "components/footer.component.php"; ?>
