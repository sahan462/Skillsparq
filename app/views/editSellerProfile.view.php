<?php include "components/sellerHeader.component.php"; ?>

<?php
    $data['fullName'] = $data['sellerProfileDetails']['first_name']." ".$data['sellerProfileDetails']['last_name'];
?>

<!-- Main container for Edit Seller Profile -->
<div class="editSellerProfile_MainContainer">

    <!-- Inner Container for the Main Container -->
    <div class="editSellerProfile_InnerContainer">

        <!-- tag for External Lottie Icon -->
        <div class="editSellerProfile_ExternalIconLottie">
            <!-- tag for  -->
            <div class="editSeller_ProfileHeading">
                <h1>Make Changes to your profile</h1>
            </div>

            <script  src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
            <dotlottie-player style="display:flex;" src="https://lottie.host/47f01f7c-caa8-46fd-9772-810f482eeeda/7tsoBoHMIW.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>

        </div>        

        <!-- tag for  -->
        <div class="editSeller_ProfileSubContainer">
            <form action="">

            </form>
            <!-- tag for  -->
            <div class="editSeller_ProfileHeader">
                <!-- tag for  -->
                <div class="editSeller_ProfileEdit">
                    <!-- tag for  -->
                    <div class="editSeller_ProfileContainer">
                        <!-- tag for  -->
                        <div class="img-container"><!-- editSeller_ImageContainer  -->
                            <!-- tag for  -->
                            <div class="img"><!-- editSeller_Image  -->
                                <img src="../public/assests/images/<?php echo $data['sellerProfileDetails']['profile_pic'] ?>" alt="pro-pic">
                                <!-- <label for="">Profile Picture</label>
                                <input type="file" name="profilePic" value="<?php //echo $data['userProfile']['profile_pic'] ?>"> -->

                                <!-- tag for  -->
                                <div class="buttons"><!-- editSeller_ButtonStyle  -->

                                    <!-- button for  -->
                                    <button id="button">Edit</button><!-- editSeller_Button  -->

                                </div>

                            </div>
                        </div>

                        <!-- tag for  -->
                        <div class="sellerNameEdit"><!-- editSeller_EditSellerName  -->
                                    <!-- tag for  -->
                                    <div class="sellerNameEdit"><!-- editSeller_EditSellerName  -->
                                        Name:
                                    </div>
                                    <!-- tag for  -->
                                    <div>
                                        <!-- <input type="text" value="" class="sellerUserName"> -->
                                        <?php echo $data['fullName'];?>
                                    </div>

                                    <!-- tag for  -->
                                    <div class="buttons"><!-- editSeller_ButtonStyle  -->
                                        <!-- button for  -->
                                        <button id="button">Edit</button><!-- editSeller_Button  -->
                                    </div>
                        </div>

                        <!-- tag for  -->
                        <div class="sellerUserNameEdit"><!-- editSeller_EditSellerUserName  -->

                                    <!-- tag for  -->
                                    <div class="sellerUserNameEdit"><!-- editSeller_EditSellerUserName  -->
                                        UserName:
                                    </div>

                                    <!-- tag for  -->
                                    <div>
                                        <!-- <input type="text" value="" class="sellerUserName"> -->
                                        <?php echo "@".$data['sellerProfileDetails']['user_name'];?>
                                    </div>

                                    <!-- tag for  -->
                                    <div class="buttons"><!-- editSeller_ButtonStyle  -->
                                            <button id="button">Edit</button><!-- editSeller_Button  -->
                                    </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- tag for  -->
            <div class="profile-content"><!-- editSeller_ProfileContent  -->

                <!-- tag for  -->
                <div class="profile-content1"><!-- editSeller_SubProfileContent_1  -->

                    <!-- tag for  -->
                    <div class="content-category1"><!-- editSeller_ContentCategory_1  -->

                        <!-- tag for  -->
                        <div class="profile-content-category-header"><!-- editSeller_SubProfileContent_1  -->

                            <!-- tag for  -->
                            <div class="Topics">About</div>
                            <!-- tag for  -->
                            <div class="buttons">

                                <!-- button for  -->
                                <button id="button">Edit</button>
                            </div>
                        </div>

                        <!-- tag for  -->
                        <div class="profile-content-category-content">

                            <!-- tag for  -->
                            <textarea  name="description" placeholder="I need.." rows="8" required><?php echo $data['sellerProfileDetails']['about']?>
                            </textarea>

                        </div>
                       
                        <!-- tag for  -->
                        <div class="profile-content-category-header">

                            <!-- tag for  -->
                            <div class="Topics">Languages</div>
                            <!-- tag for  -->
                            <div class="buttons">

                                <!-- tag for  -->
                                <button id="button"> Edit</button>

                            </div>
                        </div>

                        <!-- tag for  -->
                        <div class="profile-content-category-content">
                            <!-- input for  -->
                            <input type="text" value="<?php echo $data['sellerProfileDetails']['languages']?>">
                        </div>

                        <!-- tag for  -->
                        <div class="profile-content-category-header">

                            <!-- tag for  -->
                            <div class="Topics">Education</div>
                            <div class="buttons">
                                <button id="button">Edit</button>
                            </div>
                        </div>
                        <div class="profile-content-category-content"  style="border-bottom: 0;">
                            
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus aspernatur commodi quidem vero harum veniam incidunt fuga cupiditate, dignissimos voluptatem corporis nihil quaerat sit ipsam deleniti accusamus animi hic architecto non error officiis nobis minima. Error maxime tempore esse alias.
                        </div>
                        <div class="profile-content-category-header">
                            <div class="Topics">Password</div>
                        </div>
                        <div class="profile-content-category-content">
                        <div><input type="text" value="<?php echo $data['emailAndPassWord']['user_password'];?>" class=""></div>
                        </div>
                    </div>
                </div>


                <div class="profile-content2"><!-- editSeller_SubProfileContent_1  -->
                    <div class="content-category2"><!-- editSeller_ContentCategory_2  -->

                        <div class="profile-content-category-header">
                                <div class="Topics">Skills</div>
                        </div>
                        <div class="profile-content-category-content">
                            <div class="wrapper">
                                <!-- <div class="title">
                                    <img src="../../public/assests/images/avishka.jpg" alt="tag-icon">
                                    <h2>Tags</h2>
                                </div> -->
                                <div class="tagContent">
                                    <p>Press enter or add a comma after each tag</p>
                                    <ul>
                                        <input type="text" value="<?php echo $data['sellerProfileDetails']['skills'];?>">
                                    </ul>
                                    <p><span>10</span>tags are remaining!</p>
                                </div>
                                <div class="tagDetails">
                                    <button>Remove All</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-category2">
                        <div class="profile-content-category-header">
                            <div class="Topics">Email</div>
                        </div>
                        <div class="profile-content-category-content">
                            <div><input type="text" value="<?php echo $data['emailAndPassWord']['user_email'];?>" class=""></div>
                        </div>
                    </div>
                    <!-- <div class="content-category2">
                        <div class="profile-content-category-header">
                            <div class="Topics">Email</div>
                        </div>
                        <div class="profile-content-category-content">
                            <div><input type="text" value="<?php echo $data['emailAndPassWord']['user_email'];?>" class=""></div>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="buttons">
                <button id="button">Save</button>
            </div>
        </div>
        
    </div>
    
<script type="text/javascript" src="/skillsparq/public/assests/js/sellerProfile.js"></script>   
<?php include "components/footer.component.php"; ?>