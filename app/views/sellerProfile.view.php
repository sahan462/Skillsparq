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
    $userId = $data['sellerProfileDetails']['user_id'];
    $status = $data['activeStatus'];
    $Gigs = (array) $data['gigs'];
?>

<!-- Main Container for Seller -->
<div class="sellerProfileContainer">

    <!-- ######################################################################### -->

    <!-- Modal 1 Update Profile Form Modal -->
    <div class="overlay" id="overlayUpdate">
        <div class="modal" id="ModalUpdate">
            <form id="profileUpdateForm" method="post" action="./sellerProfile/updateSellerProfile" enctype="multipart/form-data">
                <div class="seller-profile-picture">
                    <div class="updateSellerProfilePicture">
                        <img id="previewImage" src="./assests/images/profilePictures/<?php echo $profilepicture?>" alt="pro-pic">
                        <div class="editIcon">
                            <label for="newProfilePicture">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>
                            </label>
                        </div>
                        <input type="file" name="newProfilePicture" id="newProfilePicture" style="display:none" accept="image/*" onchange="renderImage()"/>
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
                    <button type="button" onclick="confirmActionProfUpdate('cancel')">Cancel Update</button>
                    <button type="button" onclick="confirmActionProfUpdate('send')">Update Profile</button>
                </div>

                <input type="hidden" name="userId" value="<?php echo $_SESSION['userId']?>">
                <input type="hidden" name="userName" value="<?php echo $_SESSION['userName']?>">
                <input type="hidden" name="currentProfilePicture" value="<?php echo $profilepicture?>">
            </form>
        </div>
    </div>

    <!-- Modal 1 Update Profile Cancel Confirmation Modal (Sub) -->
    <div class="overlay" id="cancelConfirmProfUpdateOverlay">
        <div class="confirmation" id="cancelConfirmProfUpdate">
            <p>Are you sure want to cancel?</p>
            <div class="buttons">
                <button onclick="handleConfirmProfUpdate('cancelNo')">No</button>
                <button onclick="handleConfirmProfUpdate('cancelYes')">Yes</button>
            </div>
        </div>
    </div>

    <!-- Modal 1 Update Profile Confirm Proceed Modal (Sub) -->
    <div class="overlay" id="sendConfirmProfUpdateOverlay">
        <div class="confirmation" id="sendConfirmProfUpdate">
            <p>Are you sure want to continue?</p>
            <div class="buttons">
                <button onclick="handleConfirmProfUpdate('sendNo')">No</button>
                <button onclick="handleConfirmProfUpdate('sendYes')">Yes</button>
            </div>
        </div>
    </div>

    <!-- ######################################################################### -->

    <!-- Modal 2 Delete Profile Form Modal -->
    <div class="overlay" id="overlayDelete">
        <div class="modal" id="ModalDelete"> 
            <form id="profileDeleteForm" method="post" action="./sellerProfile/deleteSellerProfile">
                <div class="seller-profile-picture">
                    <div class="updateSellerProfilePicture">
                        <img id="previewImage" src="./assests/images/profilePictures/<?php echo $profilepicture?>" alt="pro-pic">
                    </div>
                </div>
                <div class="row">
                    <div class="seller-modal-name">
                        <div class="seller-name">
                            <?php 
                                echo $firstname ." ". $lastname;
                            ?>
                        </div>
                        <div class="seller-question">
                            <?php 
                                echo "Do you want to delete your account?"; 
                            ?>
                        </div>
                    </div>
                </div>
                <div class="buttons">
                    <button type="button" onclick="confirmActionProfDelete('cancelDelete')">Cancel Delete</button>
                    <button type="button" onclick="confirmActionProfDelete('sendDelete')">Delete Profile</button>
                </div>
                <input type="hidden" name="userId" value="<?php echo $_SESSION['userId']?>">
                <input type="hidden" name="userName" value="<?php echo $_SESSION['userName']?>">
            </form>
        </div>
    </div>

    <!-- Modal 2 Delete Profile Cancel Confirmation Modal (Sub) -->
    <div class="overlay" id="cancelConfirmProfDeleteOverlay">
        <div class="confirmation" id="cancelConfirmProfDelete">
            <p>Are you sure want to cancel?</p>
            <div class="buttons">
                <button onclick="handleConfirmProfDelete('cancelDeleteNo')">No</button>
                <button onclick="handleConfirmProfDelete('cancelDeleteYes')">Yes</button>
            </div>
        </div>
    </div>

    <!-- Modal 2 Delete Profile Confirm Proceed Modal (Sub) -->
    <div class="overlay" id="sendConfirmProfDeleteOverlay">
        <div class="confirmation" id="sendConfirmProfDelete">
            <p>Are you sure want to continue?</p>
            <div class="buttons">
                <button onclick="handleConfirmProfDelete('sendDeleteNo')">No</button>
                <button onclick="handleConfirmProfDelete('sendDeleteYes')">Yes</button>
            </div>
        </div>
    </div>

    <!-- ######################################################################### -->

    <!-- Modal 3 Language Profile Form Modal (Sub) -->
    <div class="overlay" id="overlayAddLanguages">
        <div class="modal" id="ModalAddLanguages">
            <form id="languageForm" method="post" action="./sellerProfile/addProfileLanguages">
                <div class="seller-profile-picture">
                    <!-- <div class="updateSellerProfilePicture">
                        <img id="previewImage" src="./assests/images/profilePictures/<?php //echo $profilepicture?>" alt="pro-pic">
                    </div> -->
                </div>
                <div class="row">
                    <div class="seller-modal-name">
                        <div class="seller-name">
                            <?php 
                                echo $firstname ." ". $lastname;
                            ?>
                        </div>
                        <div class="seller-question">
                            Add Languages You're familiar with.
                        </div>
                        <input type="text">
                    </div>
                </div>
                <div class="buttons">
                    <button type="button" onclick="confirmActionProfAddLang('cancelAddLang')">Cancel</button>
                    <button type="button" onclick="confirmActionProfAddLang('addLang')">Add Languages</button>
                </div>

                <input type="hidden" name="userId" value="<?php echo $_SESSION['userId']?>">
                <input type="hidden" name="userName" value="<?php echo $_SESSION['userName']?>">
            </form>
        </div>
    </div>

    <!-- Modal 3 Language Profile Cancel Confirmation Modal (Sub) -->
    <div class="overlay" id="cancelConfirmProfAddLangOverlay">
        <div class="confirmation" id="cancelConfirmProfAddLang">
            <p>Are you sure want to cancel?</p>
            <div class="buttons">
                <button onclick="handleConfirmProfAddLan('cancelAddLanNo')">No</button>
                <button onclick="handleConfirmProfAddLan('cancelAddLanYes')">Yes</button>
            </div>
        </div>
    </div>

    <!-- Modal 3 Language Profile Confirm Proceed Modal (Sub) -->
    <div class="overlay" id="sendConfirmProfAddLangOverlay">
        <div class="confirmation" id="sendConfirmProfAddLang">
            <p>Are you sure want to continue?</p>
            <div class="buttons">
                <button onclick="handleConfirmProfAddLan('sendDeleteLangNo')">No</button>
                <button onclick="handleConfirmProfAddLan('sendDeleteLangYes')">Yes</button>
            </div>
        </div>
    </div>

    <!-- ######################################################################### -->

    <!-- Modal 4 Skills Profile Form Modal (Sub) -->
    <div class="overlay" id="overlayAddSkills">
        <div class="modal" id="ModalAddSkills">
            <form id="skillsForm" method="post" action="./sellerProfile/addProfileSKills">
                <div class="seller-profile-picture">
                    <!-- <div class="updateSellerProfilePicture">
                        <img id="previewImage" src="./assests/images/profilePictures/<?php //echo $profilepicture?>" alt="pro-pic">
                    </div> -->
                </div>
                <div class="row">
                    <div class="seller-modal-name">
                        <div class="seller-name">
                            <?php 
                                echo $firstname ." ". $lastname;
                            ?>
                        </div>
                        <div class="seller-question">
                            Add Skills You're familiar with.
                        </div>
                        <input type="text">
                    </div>
                </div>
                <div class="buttons">
                    <button type="button" onclick="confirmActionProfAddSkills('cancelAddSkills')">Cancel</button>
                    <button type="button" onclick="confirmActionProfAddSkills('addSkills')">Add Skills</button>
                </div>

                <input type="hidden" name="userId" value="<?php echo $_SESSION['userId']?>">
                <input type="hidden" name="userName" value="<?php echo $_SESSION['userName']?>">
            </form>
        </div>
    </div>

    <!-- Modal 4 Skills Profile Cancel Confirmation Modal (Sub) -->
    <div class="overlay" id="cancelConfirmProfAddSkillsOverlay">
        <div class="confirmation" id="cancelConfirmProfAddSkills">
            <p>Are you sure want to cancel?</p>
            <div class="buttons">
                <button onclick="handleConfirmProfAddSkills('cancelAddSkillsNo')">No</button>
                <button onclick="handleConfirmProfAddSkills('cancelAddSkillsYes')">Yes</button>
            </div>
        </div>
    </div>

    <!-- Modal 4 Skills Profile Confirm Proceed Modal (Sub) -->
    <div class="overlay" id="sendConfirmProfAddSkillsOverlay">
        <div class="confirmation" id="sendConfirmProfAddSkills">
            <p>Are you sure want to continue?</p>
            <div class="buttons">
                <button onclick="handleConfirmProfAddSkills('sendAddSkillsNo')">No</button>
                <button onclick="handleConfirmProfAddSkills('sendAddSkillsYes')">Yes</button>
            </div>
        </div>
    </div>

    <!-- ######################################################################### -->

    <!-- Modal 5 Education Profile Form Modal (Sub) -->
    <div class="overlay" id="overlayAddEduc">
        <div class="modal" id="ModalAddEduc">
            <form id="educationForm" method="post" action="./sellerProfile/addProfileEducation">
                <div class="seller-profile-picture">
                    <!-- <div class="updateSellerProfilePicture">
                        <img id="previewImage" src="./assests/images/profilePictures/<?php //echo $profilepicture?>" alt="pro-pic">
                    </div> -->
                </div>
                <div class="row">
                    <div class="seller-modal-name">
                        <div class="seller-name">
                            <?php 
                                echo $firstname ." ". $lastname;
                            ?>
                        </div>
                        <div class="seller-question">
                            Add Your Education here.
                        </div>
                        <input type="text">
                    </div>
                </div>
                <div class="buttons">
                    <button type="button" onclick="confirmActionProfAddEduc('cancelAddEducation')">Cancel</button>
                    <button type="button" onclick="confirmActionProfAddEduc('addEducation')">Add Education</button>
                </div>

                <input type="hidden" name="userId" value="<?php echo $_SESSION['userId']?>">
                <input type="hidden" name="userName" value="<?php echo $_SESSION['userName']?>">
            </form>
        </div>
    </div>

    <!-- Modal 5 Education Profile Cancel Confirmation Modal (Sub) -->
    <div class="overlay" id="cancelConfirmProfAddEducOverlay">
        <div class="confirmation" id="cancelConfirmProfAddEduc">
            <p>Are you sure want to cancel?</p>
            <div class="buttons">
                <button onclick="handleConfirmProfAddEduc('cancelAddEducNo')">No</button>
                <button onclick="handleConfirmProfAddEduc('cancelAddEducYes')">Yes</button>
            </div>
        </div>
    </div>

    <!-- Modal 5 Education Profile Confirm Proceed Modal (Sub) -->
    <div class="overlay" id="sendConfirmProfAddEducOverlay">
        <div class="confirmation" id="sendConfirmProfAddEduc">
            <p>Are you sure want to continue?</p>
            <div class="buttons">
                <button onclick="handleConfirmProfAddEduc('sendAddEducNo')">No</button>
                <button onclick="handleConfirmProfAddEduc('sendAddEducYes')">Yes</button>
            </div>
        </div>
    </div>

    <!-- ######################################################################### -->

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
                <div class="edit-profile">
                    <button onclick="openProfileUpdateModal(this)">Edit Profile</button>
                </div>
                <div class="delete-profile">
                    <button onclick="openProfileDeleteModal(this)">Delete Profile</button>
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
                        <?php 
                            if(!empty($about)){
                                echo $about;    
                            }else{
                        ?>
                            <div>Please click <b>Edit Profile</b> to edit the about!</div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="profile">
                <div class="description">
                    <div class="profileAdditionals">
                        <div class="topic">
                            <svg fill="#231515" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" stroke="#231515"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M28.969 20.771v1.38c0 2.339-1.859 4.234-4.13 4.234h-1.208l-5.438 5.615v-5.615h-11.031c-2.271 0-4.13-1.896-4.13-4.24v-1.375zM3.031 13.953h25.766v5.302h-25.766zM3.031 7.094h25.766v5.307h-25.766zM24.766 0c2.245 0 4.031 1.896 4.031 4.24v1.375h-25.766v-1.375c0-2.344 1.865-4.24 4.135-4.24z"></path></g></svg>
                            <span>Languages</span>
                        </div>
                        <div >
                            <button class="addButton" onclick="openProfileaddLanguagesModal(this)">Add</button>
                        </div>
                    </div>
                    <div class="description-content">
                        <?php 
                            if(isset($languages)){
                                echo $languages;    
                            }else{
                                echo "Add languages that you're proficient with!";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="profile">
                <div class="description">
                    <div class="profileAdditionals">
                        <div class="topic">
                            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#231F20" d="M60,6h-7V4c0-2.212-1.789-4-4-4H15c-2.211,0-4,1.788-4,4v2H4c-2.211,0-4,1.788-4,4v8 c0,6.074,4.925,11,11,11h0.096C12.01,38.659,19.477,46.395,29,47.761V56h-7c-2.211,0-4,1.788-4,4v3c0,0.552,0.447,1,1,1h26 c0.553,0,1-0.448,1-1v-3c0-2.212-1.789-4-4-4h-7v-8.239c9.523-1.366,16.985-9.1,17.899-18.761H53c6.075,0,11-4.926,11-11v-8 C64,7.788,62.211,6,60,6z M11,23c-2.762,0-5-2.239-5-5v-6h5V23z M2,18v-8c0-1.105,0.896-2,2-2h7v2H5c-0.553,0-1,0.446-1,1v7 c0,3.865,3.134,7,7,7v2C6.029,27,2,22.97,2,18z M42,58c1.104,0,2,0.895,2,2v2H20v-2c0-1.105,0.896-2,2-2H42z M31,56v-8.052 C31.334,47.964,31.662,48,32,48s0.666-0.036,1-0.052V56H31z M51,27c0,10.492-8.507,19-19,19s-19-8.508-19-19V4c0-1.105,0.896-2,2-2 h34c1.104,0,2,0.895,2,2V27z M53,12h5v6c0,2.761-2.238,5-5,5V12z M62,18c0,4.97-4.029,9-9,9v-2c3.866,0,7-3.135,7-7v-7 c0-0.554-0.447-1-1-1h-6V8h7c1.104,0,2,0.895,2,2V18z"></path> <path fill="#231F20" d="M39.147,19.36l-4.309-0.658l-1.936-4.123c-0.165-0.352-0.518-0.575-0.905-0.575s-0.74,0.224-0.905,0.575 l-1.936,4.123l-4.309,0.658c-0.37,0.058-0.678,0.315-0.797,0.671s-0.029,0.747,0.232,1.016l3.146,3.227l-0.745,4.564 c-0.062,0.378,0.099,0.758,0.411,0.979s0.725,0.243,1.061,0.059l3.841-2.123l3.841,2.123C35.99,29.959,36.157,30,36.323,30 c0.202,0,0.404-0.062,0.576-0.184c0.312-0.221,0.473-0.601,0.411-0.979l-0.745-4.564l3.146-3.227 c0.262-0.269,0.352-0.66,0.232-1.016S39.518,19.418,39.147,19.36z M34.781,23.238c-0.222,0.228-0.322,0.546-0.271,0.859 l0.495,3.029l-2.522-1.395c-0.151-0.083-0.317-0.125-0.484-0.125s-0.333,0.042-0.484,0.125l-2.522,1.395l0.495-3.029 c0.051-0.313-0.05-0.632-0.271-0.859l-2.141-2.193l2.913-0.446c0.329-0.05,0.612-0.261,0.754-0.563l1.257-2.678l1.257,2.678 c0.142,0.303,0.425,0.514,0.754,0.563l2.913,0.446L34.781,23.238z"></path> </g></g>
                            </svg>
                            <span>Skills</span>
                        </div>
                        <div>
                            <!-- <a href=""><button class="addButton">Add</button></a> -->
                            <button class="addButton" onclick="openProfileaddSkillsModal(this)">Add</button>
                        </div>
                    </div>
                </div>
                <div class="description-content">
                        <?php 
                            if(isset($skills)){
                                echo $skills;    
                            }else{
                                echo "Add skills that you're familiar with!";
                            }
                        ?>
                </div>
            </div>
            <div class="profile">
                <div class="description">
                    <div class="profileAdditionals">
                        <div class="topic">
                            <svg fill="#000000" viewBox="0 0 100.4 100.4" id="Layer_1" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M20.4,19.3L32,24.4c-2.3,3.4-3.5,7.3-3.5,11.4c0,11.2,9.1,20.4,20.4,20.4s20.4-9.1,20.4-20.4c0-4-1.2-8-3.4-11.3l10.2-4.8 l0,19.4L73,45.7c-0.2,0.5-0.2,1,0.1,1.4s0.8,0.7,1.3,0.7h5.9c0.5,0,1-0.2,1.2-0.7c0.3-0.4,0.3-0.9,0.1-1.4l-2.7-6.6V18.4 c0-0.8-0.1-1.4-1.5-2C77.1,16.3,49.6,4.1,49.6,4.1c-0.4-0.2-0.8-0.2-1.2,0l-28,12.4c-0.5,0.2-0.9,0.8-0.9,1.4S19.8,19,20.4,19.3z M66.2,35.8c0,9.6-7.8,17.4-17.4,17.4s-17.4-7.8-17.4-17.4c0-3.7,1.2-7.2,3.3-10.2l13.6,6.1c0.2,0.1,0.4,0.1,0.6,0.1s0.4,0,0.6-0.1 l13.4-6C65.1,28.7,66.2,32.2,66.2,35.8z M76.7,44.8l0.7-1.5l0.6,1.5H76.7z M49,7.1l24.3,10.8L49,28.7L24.7,17.9L49,7.1z"></path> <path d="M49.4,59.8C29.9,59.8,14,75.7,14,95.2c0,0.8,0.7,1.5,1.5,1.5h67.8c0.8,0,1.5-0.7,1.5-1.5C84.8,75.7,68.9,59.8,49.4,59.8z M17.1,93.7c0.8-17.2,15-30.9,32.4-30.9S81,76.6,81.8,93.7H17.1z"></path></g></g>
                            </svg>
                            <span>Education</span>
                        </div>
                        <div>
                            <!-- <a href=""><button class="addButton">Add</button></a> -->
                            <button class="addButton" onclick="openProfileAddEducationModal(this)">Add</button>
                        </div>
                    </div>
                    <div class="description-content">
                        <?php 
                            if(isset($education)){
                                echo $education;    
                            }else{
                                echo "Add your education";
                            }
                        ?>
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
            <!-- <div class="reviews"> -->
                <div class="sellerUser-content">
                    <div class="sellerheader">
                        <span>My Portfolio</span>
                        <a href=""><button>Add to Portfolio</button></a>
                    </div>
                    <div class="review-content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M9 1.09V6H7V1.09C4.16 1.57 2 4.03 2 7c0 2.22 1.21 4.15 3 5.19V21c0 .55.45 1 1 1h4c.55 0 1-.45 1-1v-8.81c1.79-1.04 3-2.97 3-5.19c0-2.97-2.16-5.43-5-5.91m1 9.37l-1 .58V20H7v-8.96l-1-.58C4.77 9.74 4 8.42 4 7c0-1 .37-1.94 1-2.65V8h6V4.35c.63.71 1 1.65 1 2.65c0 1.42-.77 2.74-2 3.46m10.94 7.48a3.253 3.253 0 0 0 0-.89l.97-.73a.22.22 0 0 0 .06-.29l-.92-1.56c-.05-.1-.18-.14-.29-.1l-1.15.45c-.24-.17-.49-.32-.78-.44l-.17-1.19a.235.235 0 0 0-.23-.19h-1.85c-.12 0-.22.08-.24.19l-.17 1.19c-.29.12-.54.27-.78.44l-1.15-.45c-.1-.04-.24 0-.28.1l-.93 1.56c-.06.1-.03.22.06.29l.97.73c-.01.15-.03.3-.03.45s.02.29.03.44l-.97.74a.22.22 0 0 0-.06.29l.93 1.56c.04.1.18.13.28.1l1.15-.46c.24.18.49.33.78.45l.17 1.19c.02.11.12.19.24.19h1.85c.11 0 .21-.08.23-.19l.17-1.19c.29-.12.54-.27.78-.45l1.15.46c.11.03.24 0 .29-.1l.92-1.56a.22.22 0 0 0-.06-.29zM17.5 19c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5s1.5.67 1.5 1.5s-.67 1.5-1.5 1.5"/>
                        </svg>
                        <span>Setup Your Portfolio Right Now !</span>
                    </div>
                </div>
            <!-- </div> -->
        </div>  
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/skillsparq/public/assests/js/sellerProfile.script.js"></script>


<?php include "components/footer.component.php";?>