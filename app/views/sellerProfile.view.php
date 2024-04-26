<?php include "components/sellerHeader.component.php"; ?>

<?php
    $Country = "Sri Lanka";
    $lastSeen = $_SESSION['status'];
    // show($data);
    // print_r($_SESSION);
    // show($Gigs);


?>

<!-- Main Container for Seller -->
<div class="sellerProfileContainer">

    <!-- ######################################################################### -->

    <!-- Modal 1 Update Profile Form -->
    <div class="overlay" id="overlayUpdate">
        <div class="modal" id="ModalUpdate">
            <form id="profileUpdateForm" method="post" action="./sellerProfile/updateSellerProfile" enctype="multipart/form-data">
                <div class="seller-profile-picture">
                    <div class="updateSellerProfilePicture">
                        <img id="previewImage" src="./assests/images/profilePictures/<?php echo $data['profileDetails']['profile_pic']?>" alt="pro-pic">
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
                            <input type="text" id="firstName" name="firstName" value="<?php echo $data['profileDetails']['first_name'] ?>" >
                        </div>
                        <div class="row">
                            <label class="type-1">Last Name:</label>
                            <input type="text" id="lastName" name="lastName" value="<?php echo $data['profileDetails']['last_name'] ?>" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label for="about" class="type-1">About:</label>
                    <textarea rows="5" id="about" name="about"><?php echo $data['profileDetails']['about']; ?></textarea>
                </div>
                <div class="buttons">
                    <button type="button" onclick="confirmActionProfUpdate('cancel')">Cancel Update</button>
                    <button type="button" onclick="confirmActionProfUpdate('send')">Update Profile</button>
                </div>

                <input type="hidden" name="userId" value="<?php echo $_SESSION['userId']?>">
                <input type="hidden" name="userName" value="<?php echo $_SESSION['userName']?>">
                <input type="hidden" name="currentProfilePicture" value="<?php echo $data['profileDetails']['profile_pic']?>">
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

    <!-- Modal Delete Profile Form -->
    <div class="overlay" id="overlayDelete">
        <div class="modal" id="ModalDelete"> 
            <form id="profileDeleteForm" method="post" action="./sellerProfile/deleteSellerProfile">
                <div class="seller-profile-picture">
                    <div class="updateSellerProfilePicture">
                        <img id="previewImage" src="./assests/images/profilePictures/<?php echo $data['profileDetails']['profile_pic']?>" alt="pro-pic">
                    </div>
                </div>
                <div class="row">
                    <div class="seller-modal-name">
                        <div class="seller-name">
                            <?php 
                                echo $data['profileDetails']['first_name'] ." ". $data['profileDetails']['last_name'];
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

    <!-- Modal Add Email -->
    <div class="overlay" id="overlayEmail">
        <div class="modalEmail" id="modalEmail">
            <form id="emailForm" method="POST" action="sellerProfile/addEmail">
                <div class="row">
                    <div class="seller-modal-name">
                        <div class="seller-question">
                            Add Your Email here.
                        </div>
                        <input type="text" name="Email" id="Email" value="<?php echo $data['mail']['user_email']?>">
                    </div>
                </div>
                <div class="buttons">
                    <button type="button" onclick="confirmEmail('cancelEmail')">Cancel</button>
                    <button type="button" onclick="confirmEmail('addEmail')">Add Email</button>
                </div>
                <input type="hidden" name="UserId" value="<?php echo $_SESSION['userId']?>">
            </form>
        </div>
    </div>

    <!-- ######################################################################### -->

    <!-- Modal Add Languages -->
    <div class="overlay" id="overlaylang">
        <div class="modalLang" id="modallang">
            <form id="lnForm" method="POST" action="sellerProfile/addProfileLanguages">
                <div class="row">
                    <div class="seller-modal-name">
                        <div class="seller-question">
                            Add Your Languages here.    
                        </div>
                        <input type="text" name="Languages" value="<?php echo $data['sellerProfileDets']['languages']?>" id="Language">
                    </div>
                </div>
                <div class="buttons">
                    <button type="button" onclick="confirmLang('canc')">Cancel</button>
                    <button type="button" onclick="confirmLang('ad')">Add</button>
                </div>
                <input type="hidden" name="userId" value="<?php echo $_SESSION['userId']?>">
                <input type="hidden" name="userName" value="<?php echo $_SESSION['userName']?>">
            </form>
        </div>
    </div>

    <!-- ######################################################################### -->

    <!-- Modal Add Skills -->
    <div class="overlay" id="overlayskill">
        <div class="modalSkill" id="modalskill">
            <form id="sklForm" method="POST" action="sellerProfile/addProfileSkills">
                <div class="row">
                    <div class="seller-modal-name">
                        <div class="seller-question">
                            Add Your Skills here.
                        </div>
                        <input type="text" name="Skills" value="<?php echo $data['sellerProfileDets']['skills']?>" id="Skill">
                    </div>
                </div>
                <div class="buttons">
                    <button type="button" onclick="confirmSkill('canc')">Cancel</button>
                    <button type="button" onclick="confirmSkill('ad')">Add</button>
                </div>
                <input type="hidden" name="userId" value="<?php echo $_SESSION['userId']?>">
                <input type="hidden" name="userName" value="<?php echo $_SESSION['userName']?>">
            </form>
        </div>
    </div>

    <!-- ######################################################################### -->

    <!-- Modal Add Education -->
    <div class="overlay" id="overlayeducation">
        <div class="modalEducation" id="modaleducation">
            <form id="educForm" method="POST" action="sellerProfile/addProfileEducation">
                <div class="row">
                    <div class="seller-modal-name">
                        <div class="seller-question">
                            Add Your Education here.
                        </div>
                        <input type="text" name="Educations" value="<?php echo $data['sellerProfileDets']['education']?>">
                    </div>
                </div>
                <div class="buttons">
                    <button type="button" onclick="confirmEducation('canc')">Cancel</button>
                    <button type="button" onclick="confirmEducation('ad')">Add</button>
                </div>
                <input type="hidden" name="userId" value="<?php echo $_SESSION['userId']?>">
                <input type="hidden" name="userName" value="<?php echo $_SESSION['userName']?>">
            </form>
        </div>
    </div>    

    <!-- ######################################################################### -->

    <?php
        if(is_null($data['mail']['user_email'])){
    ?>
    <div class="AlertButton">
        <span class="closeAlertBtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <strong>Not Setting up the email would miss to get potential opportunities </strong>
    </div>
    <?php
        }
    ?>
    <!-- Topic -->
    <div class="sellerProfileHeader">
        My Profile
    </div>

    <div class="sub-container">
        <div class="profile-container">
            <div class="profile">

                <?php if($data['profileDetails']['last_seen'] === 'online' || $_SESSION['status'] === "online") {?>

                <div class="online">
                    <span style="display:flex; align-items:center; gap: 4px; justify-content: flex-end;"><div class="onlineDot"></div>Online</span>
                </div>

                <?php }else{ ?>

                <div class="offline">
                    <span style="display:flex; align-items:center; gap: 4px; justify-content: flex-end;">
                        <div class="offlineDot">
                        </div>Last seen: <?php echo $data['profileDetails']['last_seen']?>
                    </span>
                </div>

                <?php } ?>

                <div class="seller-profile-picture">
                    <img src="../public/assests/images/profilePictures/<?php echo $data['profileDetails']['profile_pic']?>" alt="pro-pic">
                    <div class="seller-full-name">
                        <?php echo $data['profileDetails']['first_name']. " " . $data['profileDetails']['last_name']; ?>
                    </div>
                    <div class="user-name">
                        <?php echo '@'.$data['profileDetails']['user_name'] ?>
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
                <div class="editSellerProfile">
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
                        <span><b><?php echo $data['profileDetails']['joined_date'];?></b></span>
                    </div>
                    <div class="info1">
                        <div class="emailSvg">
                            <span>
                                <svg height="200px" width="200px" version="1.1" id="_x36_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="256.0002" y1="347.8895" x2="256.0002" y2="-8.003553e-011"> <stop offset="0" style="stop-color:#DA9621"></stop> <stop offset="0.7685" style="stop-color:#EAA12F"></stop> </linearGradient> <path style="fill:url(#SVGID_1_);" d="M511.972,170.467v11.507c-0.6,0.427-1.372,0.937-2.143,1.448l-19.117,13.041 c-1.285,0.853-2.828,1.875-4.371,2.984c-7.973,5.283-18.345,12.358-25.203,16.876L293.376,329.769l-5.315,3.58l-15.602,10.569 c-1.972,1.278-4.286,2.301-6.858,2.983c-1.029,0.34-2.229,0.511-3.343,0.681c-0.172,0.085-0.343,0.085-0.428,0.085 c-1.972,0.256-3.943,0.256-5.83,0.171c-1.886,0.085-3.857,0.085-5.829-0.171c-1.285-0.171-2.572-0.427-3.772-0.767 c-2.572-0.681-4.886-1.705-6.858-2.983l-7.029-4.774l-8.572-5.795L50.862,216.324c-1.886-1.279-4.029-2.728-6.429-4.262 c-6-4.006-13.03-8.779-18.774-12.614c-1.543-1.109-3.086-2.131-4.372-2.984L2.171,183.423c-0.771-0.511-1.543-1.022-2.143-1.448 v-11.507c0-1.96,0.257-3.494,0.686-4.943c0-0.084,0.086-0.084,0.086-0.084c0.429-0.341,0.857-0.597,1.371-0.939l6.172-4.262 l12.944-8.779c8.143-5.454,21.431-14.489,29.574-19.859L239.541,4.007c4.544-2.898,10.544-4.262,16.459-3.921 c0.6,0,1.114-0.085,1.715-0.085h0.086c5.315,0,10.63,1.365,14.659,4.007l188.679,127.594c6.772,4.432,17.059,11.421,25.031,16.792 c1.629,1.107,3.172,2.131,4.543,3.067l12.944,8.779l6.172,4.262c0.514,0.341,0.943,0.597,1.371,0.939 C511.715,166.888,511.972,168.507,511.972,170.467z"></path> <linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="256.0005" y1="398.9169" x2="256.0005" y2="51.0644"> <stop offset="0" style="stop-color:#DA9621"></stop> <stop offset="0.7685" style="stop-color:#EAA12F"></stop> </linearGradient> <path style="fill:url(#SVGID_2_);" d="M512,221.49v11.441c-0.625,0.443-1.429,0.976-2.141,1.508l-19.179,13.037 c-8.116,5.41-21.407,14.455-29.524,19.866L272.502,394.875c-2.051,1.33-4.371,2.305-6.868,3.015 c-3.032,0.887-6.422,1.153-9.633,0.975c-3.211,0.178-6.601-0.089-9.633-0.975c-2.498-0.71-4.817-1.685-6.868-3.015L50.845,267.341 c-8.117-5.411-21.408-14.456-29.524-19.866L2.142,234.439c-0.712-0.533-1.516-1.065-2.141-1.508V221.49 c0-1.951,0.268-3.548,0.714-4.966c0-0.089,0.089-0.089,0.089-0.089c0.446-0.355,0.892-0.622,1.337-0.977l6.245-4.257l12.934-8.78 c8.116-5.41,21.407-14.455,29.524-19.866L239.499,55.023c4.549-2.927,10.614-4.258,16.501-3.903 c5.887-0.355,12.042,0.975,16.501,3.903l188.655,127.532c8.117,5.411,21.408,14.456,29.524,19.866l12.934,8.78l6.245,4.257 c0.445,0.355,0.891,0.621,1.337,0.977C511.732,217.853,512,219.539,512,221.49z"></path> <path style="fill:#CC8529;" d="M262.258,314.513v35.968h-1.029l-11.487,0.767H0.028V173.792c0-1.96,0.257-3.58,0.686-4.944 c0-0.085,0.086-0.085,0.086-0.085c0.943-2.983,2.829-4.688,5.315-5.114l10.716,6.307l5.057,2.983l23.06,13.553l1.2,0.681 l14.659,8.609l166.819,98.359l0.343,0.171l33.089,19.433L262.258,314.513z"></path> <g> <path style="fill:#F6B75A;" d="M266.715,336.247c0,0.085-1.714,1.279-4.457,3.239c-1.715,1.108-3.858,2.558-6.258,4.262 c-1.2,0.767-2.486,1.619-3.857,2.557l-1.972,1.363l-3.772,2.557l-1.629,1.023l-26.66,17.984c-2.829,1.875-5.658,3.835-8.229,5.626 c-4.886,3.324-8.916,6.051-10.287,6.903c-1.972,1.449-10.201,6.99-18.345,12.529l-44.577,30.088l-0.172,0.171l-0.085,0.085 L27.031,498.447c-1.886,1.279-3.943,2.642-5.915,4.006c-1.115,0.767-2.229,1.449-3.343,2.216H8.515 c-4.972,0-7.801-1.108-8.401-2.983c0-0.085,0-0.085,0-0.085c0-0.341-0.086-0.597,0-1.023c-0.086-0.512-0.086-1.023-0.086-1.62 V173.792c0-1.96,0.257-3.58,0.686-4.944c0-0.085,0.086-0.085,0.086-0.085c0.943-2.983,2.829-4.688,5.315-5.114 c0.771-0.256,1.457-0.256,2.229-0.171c1.886,0.085,4.029,0.938,6.344,2.472l30.346,20.456l1.114,0.767l13.116,8.864 c0.257,0.171,0.514,0.341,0.771,0.512c8.058,5.455,20.745,14.064,28.632,19.348l153.446,103.729 c0.172,0.085,0.343,0.171,0.429,0.256c0.257,0.171,0.514,0.341,0.771,0.512c2.057,1.363,4.029,2.728,5.829,3.92 c3.001,1.96,5.401,3.665,6.858,4.688c0.857,0.512,1.458,0.852,1.543,0.937c0.343,0.255,2.486,1.705,4.715,3.324 c0.086,0,0.086,0.085,0.171,0.085C264.744,334.968,266.715,336.161,266.715,336.247z"></path> <g> <path style="fill:#F0A642;" d="M511.865,171.974c0.074,1,0.134,2.92,0.134,4.267v320.232c0,1.347,0,2.708,0,3.025 c0,0.317-0.089,1.248-0.089,1.419c0,0.171,0,0.311,0,0.666c0,0,0,0.02,0,0.044c0,0.024-0.783,0.723-1.74,1.551 c-0.957,0.829-7.747,1.507-9.094,1.507h-4.378c-1.347,0-3.365-0.612-4.486-1.359l-5.204-3.489 c-1.12-0.748-2.95-1.976-4.066-2.731L332.776,395.641c-1.116-0.754-2.942-1.988-4.058-2.742l-14.324-9.753 c-1.112-0.76-2.935-1.999-4.05-2.754l-14.412-9.754c-1.113-0.758-2.938-1.994-4.055-2.747l-24.216-16.33 c-1.117-0.753-2.944-1.984-4.062-2.736l-1.734-1.167c-1.117-0.752-2.95-1.976-4.072-2.72c0,0-0.635-0.421-1.795-1.219 c-6.155-4.257-10.704-7.362-10.704-7.451c0-0.089,1.963-1.329,4.282-2.926c2.318-1.597,2.885-1.986,2.885-1.986 c1.111-0.762,2.161-1.484,2.332-1.607c0.172-0.122,2.109-1.383,3.214-2.152c0,0,5.125-3.567,10.657-7.204 c0.268-0.178,0.268-0.178,0.268-0.178c0.294-0.195,0.595-0.394,0.668-0.443c0.073-0.049,0.954-0.617,1.74-1.153 c0.785-0.536,2.341-1.592,3.457-2.346l146.508-98.984c1.116-0.754,2.941-1.989,4.056-2.745l25.377-17.123 c1.117-0.753,2.944-1.985,4.06-2.739l40.451-27.324c1.116-0.754,3-1.892,4.187-2.529c0,0,1.065-0.637,2.169-0.881 c1.104-0.244,3.079-0.189,4.389,0.123l3.792,2.662C510.562,167.836,511.791,170.974,511.865,171.974z"></path> </g> </g> <path style="fill:#CC8529;" d="M511.999,458.657v40.265c0,0.62,0,1.153-0.089,1.685c0.089,0.355,0,0.621,0,0.976c0,0,0,0,0,0.089 c-0.625,1.862-3.48,3.014-8.385,3.014H46.383l90.001-80.084l0.089-0.089l112.657-100.216l10.972-9.668l2.942-2.661l9.723,5.677 L511.999,458.657z"></path> <path style="fill:#F6AF47;" d="M511.999,497.414v1.508c0,0.62,0,1.153-0.089,1.685c0.089,0.355,0,0.621,0,0.976c0,0,0,0,0,0.089 c-0.625,1.862-3.48,3.014-8.385,3.014H8.474c-4.905,0-7.76-1.152-8.385-3.014c0-0.089,0-0.089,0-0.089c0-0.355-0.089-0.621,0-0.976 C0,500.075,0,499.542,0,498.922v-1.508c0.803-1.064,1.963-2.128,3.479-3.193L241.549,320.57c0.089,0,0.089-0.088,0.179-0.176 c0.268-0.178,0.536-0.355,0.803-0.532c4.905-3.46,9.901-5.855,13.469-6.74c1.249,0.354,2.586,0.797,4.104,1.507 c2.854,1.153,6.154,3.016,9.365,5.233c0.356,0.265,0.624,0.443,0.981,0.708l238.069,173.651 C510.035,495.374,511.195,496.438,511.999,497.414z"></path> </g> </g></svg>
                                Email
                            </span>
                            <div class="updtIcon" onclick="openEmailUpdate(this)">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M11 4H7.2C6.0799 4 5.51984 4 5.09202 4.21799C4.71569 4.40974 4.40973 4.7157 4.21799 5.09202C4 5.51985 4 6.0799 4 7.2V16.8C4 17.9201 4 18.4802 4.21799 18.908C4.40973 19.2843 4.71569 19.5903 5.09202 19.782C5.51984 20 6.0799 20 7.2 20H16.8C17.9201 20 18.4802 20 18.908 19.782C19.2843 19.5903 19.5903 19.2843 19.782 18.908C20 18.4802 20 17.9201 20 16.8V12.5M15.5 5.5L18.3284 8.32843M10.7627 10.2373L17.411 3.58902C18.192 2.80797 19.4584 2.80797 20.2394 3.58902C21.0205 4.37007 21.0205 5.6364 20.2394 6.41745L13.3774 13.2794C12.6158 14.0411 12.235 14.4219 11.8012 14.7247C11.4162 14.9936 11.0009 15.2162 10.564 15.3882C10.0717 15.582 9.54378 15.6885 8.48793 15.9016L8 16L8.04745 15.6678C8.21536 14.4925 8.29932 13.9048 8.49029 13.3561C8.65975 12.8692 8.89125 12.4063 9.17906 11.9786C9.50341 11.4966 9.92319 11.0768 10.7627 10.2373Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></div>
                        </div>  
                        <div class="email">
                            <span><b><?php echo $data['mail']['user_email'];?></b></span>
                        </div>
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
                            if(!empty($data['profileDetails']['about'])){
                                echo $data['profileDetails']['about'];    
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
                    <div class="viewContainer">
                        <div class="topic">
                            <span>View Send Proposals</span>
                        </div>
                        <div class="sentProps" onclick="window.location=('sentJobProposals')">
                            <svg viewBox="0 0 33 33" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>send-email</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-568.000000, -254.000000)" fill="#000000"> <path d="M584,283 C584,283 580.872,276.976 580,275 L596.075,259.779 L584,283 L584,283 Z M572,270 L595,259 L579,274 C578.996,273.996 572,270 572,270 L572,270 Z M599,255 C597.844,255.563 568,270 568,270 C568,270 578.052,276.059 578,276 C577.983,275.981 584,287 584,287 C584,287 599.75,256.5 600,256 C600.219,255.375 599.75,254.688 599,255 L599,255 Z" id="send-email" sketch:type="MSShapeGroup"> </path></g></g></g>
                            </svg>
                        </div>
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
                        <div class="updtIcon" onclick="openLanguage(this)">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M11 4H7.2C6.0799 4 5.51984 4 5.09202 4.21799C4.71569 4.40974 4.40973 4.7157 4.21799 5.09202C4 5.51985 4 6.0799 4 7.2V16.8C4 17.9201 4 18.4802 4.21799 18.908C4.40973 19.2843 4.71569 19.5903 5.09202 19.782C5.51984 20 6.0799 20 7.2 20H16.8C17.9201 20 18.4802 20 18.908 19.782C19.2843 19.5903 19.5903 19.2843 19.782 18.908C20 18.4802 20 17.9201 20 16.8V12.5M15.5 5.5L18.3284 8.32843M10.7627 10.2373L17.411 3.58902C18.192 2.80797 19.4584 2.80797 20.2394 3.58902C21.0205 4.37007 21.0205 5.6364 20.2394 6.41745L13.3774 13.2794C12.6158 14.0411 12.235 14.4219 11.8012 14.7247C11.4162 14.9936 11.0009 15.2162 10.564 15.3882C10.0717 15.582 9.54378 15.6885 8.48793 15.9016L8 16L8.04745 15.6678C8.21536 14.4925 8.29932 13.9048 8.49029 13.3561C8.65975 12.8692 8.89125 12.4063 9.17906 11.9786C9.50341 11.4966 9.92319 11.0768 10.7627 10.2373Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                        </div>
                    </div>
                    <div class="description-content">
                        <?php 
                            if(!empty($data['sellerProfileDets']['languages'])){
                                // foreach($languages as $lang){
                        ?>
                            <div>
                                <?php 
                                    echo $data['sellerProfileDets']['languages'];
                                ?>
                            </div>
                        <?php  
                                // }
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
                            <div class="updtIcon" onclick="openSkill(this)">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M11 4H7.2C6.0799 4 5.51984 4 5.09202 4.21799C4.71569 4.40974 4.40973 4.7157 4.21799 5.09202C4 5.51985 4 6.0799 4 7.2V16.8C4 17.9201 4 18.4802 4.21799 18.908C4.40973 19.2843 4.71569 19.5903 5.09202 19.782C5.51984 20 6.0799 20 7.2 20H16.8C17.9201 20 18.4802 20 18.908 19.782C19.2843 19.5903 19.5903 19.2843 19.782 18.908C20 18.4802 20 17.9201 20 16.8V12.5M15.5 5.5L18.3284 8.32843M10.7627 10.2373L17.411 3.58902C18.192 2.80797 19.4584 2.80797 20.2394 3.58902C21.0205 4.37007 21.0205 5.6364 20.2394 6.41745L13.3774 13.2794C12.6158 14.0411 12.235 14.4219 11.8012 14.7247C11.4162 14.9936 11.0009 15.2162 10.564 15.3882C10.0717 15.582 9.54378 15.6885 8.48793 15.9016L8 16L8.04745 15.6678C8.21536 14.4925 8.29932 13.9048 8.49029 13.3561C8.65975 12.8692 8.89125 12.4063 9.17906 11.9786C9.50341 11.4966 9.92319 11.0768 10.7627 10.2373Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="description-content">
                        <?php 
                            if(!empty($data['sellerProfileDets']['skills'])){
                                echo $data['sellerProfileDets']['skills'];    
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
                            <div class="updtIcon" onclick="openEducation(this)">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M11 4H7.2C6.0799 4 5.51984 4 5.09202 4.21799C4.71569 4.40974 4.40973 4.7157 4.21799 5.09202C4 5.51985 4 6.0799 4 7.2V16.8C4 17.9201 4 18.4802 4.21799 18.908C4.40973 19.2843 4.71569 19.5903 5.09202 19.782C5.51984 20 6.0799 20 7.2 20H16.8C17.9201 20 18.4802 20 18.908 19.782C19.2843 19.5903 19.5903 19.2843 19.782 18.908C20 18.4802 20 17.9201 20 16.8V12.5M15.5 5.5L18.3284 8.32843M10.7627 10.2373L17.411 3.58902C18.192 2.80797 19.4584 2.80797 20.2394 3.58902C21.0205 4.37007 21.0205 5.6364 20.2394 6.41745L13.3774 13.2794C12.6158 14.0411 12.235 14.4219 11.8012 14.7247C11.4162 14.9936 11.0009 15.2162 10.564 15.3882C10.0717 15.582 9.54378 15.6885 8.48793 15.9016L8 16L8.04745 15.6678C8.21536 14.4925 8.29932 13.9048 8.49029 13.3561C8.65975 12.8692 8.89125 12.4063 9.17906 11.9786C9.50341 11.4966 9.92319 11.0768 10.7627 10.2373Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                            </div>
                        </div>
                    </div>
                    <div class="description-content">
                        <?php 
                            if(isset($data['sellerProfileDets']['education'])){
                                echo $data['sellerProfileDets']['education'];    
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
                    <span>My Gigs(
                        <?php 
                            if(isset($data['gigCount'])){
                                echo $data['gigCount']['GIGCOUNT'];
                            }else{
                                echo 0;
                            }   
                        ?>
                    )
                    </span>
                    <a href="addGig"><button>Create A New Gig</button></a>
                </div>
                <div class="Gig-content">
                    <?php
                        if(!empty($data['ALLABOUTGIG'])){ 
                            foreach($data['ALLABOUTGIG'] as $row){
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
                    <?php if (mysqli_num_rows($feedbacks) > 0){ ?>


                        <?php while ($row = $feedbacks->fetch_assoc()) { ?>

                            <?php include "components/feedback.component.php"?>

                        <?php } ?>

                    <?php }else { ?>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>No feedbacks available</span>

                    <?php } ?>

                </div>
            </div>
            <div class="reviews">
                <div class="sellerUser-content">
                    <div class="sellerheader">
                    <form action="sellerProfile/addPortfolioImgsToProfile" method="POST"
                                enctype="multipart/form-data">
                            <p>Select files to upload: 
                                <div>
                                    <label for="multipleImagesUpload">Add To Portfolio</label>
                                    <input type="file" name="files[]" multiple id="multipleImagesUpload" required>
                                </div>
                                <div>
                                    <label for="Submit">Submit</label>
                                    <input type="submit" name="submit" id="Submit" required>
                                </div>
                                <input type="hidden" name="userId" value="<?php echo $_SESSION['userId']?>">
                                <input type="hidden" name="userName" value="<?php echo $_SESSION['userName']?>">
                        </form>
                    </div>
                    <div class="review-content">
                        
                        lkjflaskdf
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M9 1.09V6H7V1.09C4.16 1.57 2 4.03 2 7c0 2.22 1.21 4.15 3 5.19V21c0 .55.45 1 1 1h4c.55 0 1-.45 1-1v-8.81c1.79-1.04 3-2.97 3-5.19c0-2.97-2.16-5.43-5-5.91m1 9.37l-1 .58V20H7v-8.96l-1-.58C4.77 9.74 4 8.42 4 7c0-1 .37-1.94 1-2.65V8h6V4.35c.63.71 1 1.65 1 2.65c0 1.42-.77 2.74-2 3.46m10.94 7.48a3.253 3.253 0 0 0 0-.89l.97-.73a.22.22 0 0 0 .06-.29l-.92-1.56c-.05-.1-.18-.14-.29-.1l-1.15.45c-.24-.17-.49-.32-.78-.44l-.17-1.19a.235.235 0 0 0-.23-.19h-1.85c-.12 0-.22.08-.24.19l-.17 1.19c-.29.12-.54.27-.78.44l-1.15-.45c-.1-.04-.24 0-.28.1l-.93 1.56c-.06.1-.03.22.06.29l.97.73c-.01.15-.03.3-.03.45s.02.29.03.44l-.97.74a.22.22 0 0 0-.06.29l.93 1.56c.04.1.18.13.28.1l1.15-.46c.24.18.49.33.78.45l.17 1.19c.02.11.12.19.24.19h1.85c.11 0 .21-.08.23-.19l.17-1.19c.29-.12.54-.27.78-.45l1.15.46c.11.03.24 0 .29-.1l.92-1.56a.22.22 0 0 0-.06-.29zM17.5 19c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5s1.5.67 1.5 1.5s-.67 1.5-1.5 1.5"/>
                        </svg>
                        <span>Setup Your Portfolio Right Now !</span>
                    </div>
                    <!-- <img src="../public/assests/images/dummyprofile.jpg" alt=""> -->
                </div>
            </div>
        </div>  
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/skillsparq/public/assests/js/sellerProfile.script.js"></script>


<?php include "components/footer.component.php";?>