<?php include "components/sellerHeader.component.php"; ?>

<?php
    // $data['fullName'] = $_SESSION['firstName']." ".$_SESSION['lastName'];
    // $data["profilePicture"] = "dummyprofile.jpg";
    // $recentGigs = $data['recentGigs'];
?>

<?php 
?>
<div class="container">
    <div class="profile-container">
        <div class="profile-header">
            <div class="seller">
                <div class="img-container">
                    <div class="img"><img src="../public/assests/images/<?php echo $data["profilePicture"] ?>" alt="pro-pic">
                    </div>
                    <div class="icons-content">
                        <div class="icon-name"><?php echo $data['fullName']?></div>
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
                            <button id="button">Add</button>
                        </div>
                    </div>
                    <div class="profile-content-category-content">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus aspernatur commodi quidem vero harum veniam incidunt fuga cupiditate, dignissimos voluptatem corporis nihil quaerat sit ipsam deleniti accusamus animi hic architecto non error officiis nobis minima. Error maxime tempore esse alias.
                    </div>
                    <div class="profile-content-category-header">
                        <div class="Topics">Languages</div>
                        <div class="buttons">
                            <button id="button"> Add</button>
                        </div>
                    </div>
                    <div class="profile-content-category-content">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus aspernatur commodi quidem vero harum veniam incidunt fuga cupiditate, dignissimos voluptatem corporis nihil quaerat sit ipsam deleniti accusamus animi hic architecto non error officiis nobis minima. Error maxime tempore esse alias.
                    </div>
                    <div class="profile-content-category-header">
                        <div class="Topics">Education</div>
                        <div class="buttons">
                            <button id="button"> Add</button>
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
                            <button id="button"> Add</button>
                        </div>
                    </div>
                    <div class="profile-content-category-content" style="border-bottom: 0;">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero iure, cupiditate magni accusamus, perferendis non enim quibusdam eius explicabo eos odio labore, consequuntur ad facilis corporis assumenda eum sit rem inventore autem. A voluptatem deleniti, rerum pariatur odio numquam minima. Veritatis impedit repudiandae explicabo sit ea repellat assumenda nulla. Sint enim consequatur nam saepe illum, earum rem amet eius aspernatur accusantium dolor ad. Reprehenderit eveniet veniam maiores qui ipsa ad laudantium quos, tempore itaque possimus debitis magni modi ducimus tenetur quia velit fugiat hic architecto libero. Quaerat, dolorum suscipit consequuntur necessitatibus dicta sapiente voluptatum optio, aspernatur, ratione saepe asperiores quam.
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="other-category-container" id="gigs">
        <div class="other-category-header">
            <div class="Topics" style="padding-left: 0;">My Gigs</div>
            <div class="plus" >
                <a href="addGig"><button id="plus">Add New Gig</button></a>
            </div>
        </div>
        <div class="recentGigs" id="content">
            <div class="recentGigsContent">
                <?php
                    foreach($recentGigs as $row){
                ?>
                        <?php include "components/GigCard.component.php"?>
                <?php
                    }
                ?>
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
    </script>
    <?php include "components/footer.component.php"; ?>