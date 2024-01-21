<?php include "components/sellerHeader.component.php"; ?>

<?php
    $data['fullName'] = $data['userProfile']['first_name']." ".$data['userProfile']['last_name'];
?>

<?php 
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
            
                <div class="seller">
                    <div class="img-container">
                        <div class="img"><img src="../public/assests/images/<?php echo $data['userProfile']['profile_pic'] ?>" alt="pro-pic">
                        </div>
                        <div class="icons-content">
                            <div class="icon-name"><?php echo $data['fullName']?></div>
                            <div class="icon-location">
                                <div class="icon-location-value">Colombo Sri Lanka</div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="buttons">
                        <a href="editSellerProfile"><button id="button">Profile Update</button></a>
                    </div> -->
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
                            <div class="Topics">Portfolio</div>
                            <div class="buttons">
                                <button id="button" onclick="">Edit</button>
                            </div>
                        </div>
                        <div class="profile-content-category-content" style="border-bottom: 0;">
                        <input type="text" value="" id="portfolio">
                        
                        <textarea  name="description" placeholder="I need.." rows="8" required>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero iure, cupiditate magni accusamus, perferendis non enim quibusdam eius explicabo eos odio labore, consequuntur ad facilis corporis assumenda eum sit rem inventore autem. A voluptatem deleniti, rerum pariatur odio numquam minima. Veritatis impedit repudiandae explicabo sit ea repellat assumenda nulla. Sint enim consequatur nam saepe illum, earum rem amet eius aspernatur accusantium dolor ad. Reprehenderit eveniet veniam maiores qui ipsa ad laudantium quos, tempore itaque possimus debitis magni modi ducimus tenetur quia velit fugiat hic architecto libero. Quaerat, dolorum suscipit consequuntur necessitatibus dicta sapiente voluptatum optio, aspernatur, ratione saepe asperiores quam.
                        </textarea>
                        </div>
                    </div>
                    <div class="content-category2">
                        <div class="profile-content-category-header">
                            <div class="Topics">Skills</div>
                            <div class="buttons">
                                <button id="button" onclick="">Edit</button>
                            </div>
                        </div>
                        <div class="profile-content-category-content" style="border-bottom: 0;">
                        <input type="text" value="<?php echo $data['userProfile']['skills']?>" id="portfolio">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    

    <script>

        // javascript code for view pop up modal
        const viewModal = document.querySelector('#viewModal');
        const openViewModal = document.querySelector('.open-view-modal-button');
        const closeViewModal = document.querySelector('.close-view-modal-button');

        openViewModal.addEventListener('click',()=>{
            viewModal.showModal();
        });

        closeViewModal.addEventListener('click',()=>{
            viewModal.close();
        });
        
        // javascript code for edit pop up modal
        const editModal = document.querySelector('#editModal');
        const openEditModal = document.querySelector('.open-edit-modal-button');
        const closeEditModal = document.querySelector('.close-edit-modal-button');

        openEditModal.addEventListener('click',()=>{
            editModal.showModal();
        });

        closeEditModal.addEventListener('click',()=>{
            editModal.close();
        });

        // javascript code for delete pop up modal
        const deleteModal = document.querySelector('#deleteModal');
        const openDeleteModal = document.querySelector('.open-delete-modal-button');
        const closeDeleteModal = document.querySelector('.close-delete-modal-button');

        openDeleteModal.addEventListener('click',()=>{
            deleteModal.showModal();
        });

        closeDeleteModal.addEventListener('click',()=>{
            deleteModal.close();
        });
    </script>
   
<?php include "components/footer.component.php"; ?>