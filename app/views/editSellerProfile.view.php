<?php include "components/sellerHeader.component.php"; ?>

<?php
    $data['fullName'] = $data['userProfile']['first_name']." ".$data['userProfile']['last_name'];
?>

<div class="container">
    <div class="innerContainer">
        <div class="externalIconLottie">
            <div>
                <h1>Make Changes to your profile</h1>
            </div>
            <script  src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
            <dotlottie-player style="display:flex;" src="https://lottie.host/47f01f7c-caa8-46fd-9772-810f482eeeda/7tsoBoHMIW.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
        </div>         
        <div class="profile-container">
            <div class="profile-header">
                <div class="sellerEdit">
                    <div class="sellerContainer">
                        <div class="img"><img src="../public/assests/images/<?php echo $data['userProfile']['profile_pic'] ?>" alt="pro-pic">
                        </div>
                        <div class="sellerName"><?php echo $data['fullName']?></div>
                        <div class="sellerUserName">
                            <?php echo "@".$data['userProfile']['user_name'];?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-content">
                <div class="profile-content1">
                    <div class="content-category1">
                        <div class="profile-content-category-header">
                            <div class="Topics">About</div>
                            <div class="buttons">
                                <button id="button">Edit</button>
                            </div>
                        </div>
                        <div class="profile-content-category-content">
                            <textarea  name="description" placeholder="I need.." rows="8" required><?php echo $data['userProfile']['about']?>
                            </textarea>
                        </div>
                        
                        <div class="profile-content-category-header">
                            <div class="Topics">Languages</div>
                            <div class="buttons">
                                <button id="button"> Edit</button>
                            </div>
                        </div>
                        <div class="profile-content-category-content">
                        <input type="text" value="<?php echo $data['userProfile']['languages']?>">
                        </div>
                        <div class="profile-content-category-header">
                            <div class="Topics">Education</div>
                            <div class="buttons">
                                <button id="button">Edit</button>
                            </div>
                        </div>
                        <div class="profile-content-category-content"  style="border-bottom: 0;">
                            
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus aspernatur commodi quidem vero harum veniam incidunt fuga cupiditate, dignissimos voluptatem corporis nihil quaerat sit ipsam deleniti accusamus animi hic architecto non error officiis nobis minima. Error maxime tempore esse alias.
                        </div>
                    </div>
                </div>
                <div class="profile-content2">
                    <div class="content-category2">
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
                                        <input type="text" value="<?php echo $data['userProfile']['skills'];?>">
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
                               
                        </div>
                        <div class="profile-content-category-content">
                            
                        </div>
                        </div>
                </div>
            </div>

        </div>
    </div>
<script type="text/javascript" src="/skillsparq/public/assests/js/sellerProfile.js"></script>   
<?php include "components/footer.component.php"; ?>