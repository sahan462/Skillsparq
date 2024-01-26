<?php include "components/sellerHeader.component.php"; ?>

<?php
    $data['fullName'] = $data['sellerProfileDetails']['first_name']." ".$data['sellerProfileDetails']['last_name'];
    $data["profilePicture"] = "dummyprofile.jpg";
    $recentGigs = $data['recentGigs'];
?>

<!-- Main Container for Seller Profile -->

<div class="container">

    <!-- tag for -->
    <div class="profile-container">

        <!-- tag for  -->
        <div class="profile-header">

            <!-- tag for  -->
            <div class="seller">

                <!-- tag for  -->
                <div class="img-container">

                    <!-- tag for  -->
                    <div class="img">
                        <img src="../public/assests/images/<?php echo $data["profilePicture"] ?>" alt="pro-pic">
                    </div>

                    <!-- tag for  -->
                    <div class="icons-content">

                        <!-- tag for  -->
                        <div class="icon-name">
                            <?php echo $data['fullName']?>
                        </div>

                        <!-- tag for  -->
                        <div class="icon-name">
                            <?php echo '@'.$data['sellerProfileDetails']['user_name']?>
                        </div>

                        <!-- tag for  -->
                        <div class="icon-location">

                            <!-- tag for  -->
                            <div class="icon">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7">
                                    <path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                </svg>

                            </div>

                            <!-- tag for  -->
                            <div class="icon-location-value">Colombo Sri Lanka</div>

                        </div>

                        <!-- tag for  -->
                        <div class="icon-time">

                            <!-- tag for  -->
                            <div>Local Time is</div>

                            <!-- tag for  -->
                            <div class="time"></div>

                        </div>

                    </div>

                </div>

                <!-- tag for  -->
                <div class="buttons">

                    <!-- anchor tag for  -->
                    <a href="<?php echo BASEURL."editSellerProfile"?>">
                        <!-- button for  -->
                        <button id="button">Profile Update</button>
                    </a>
                </div>
            </div>
        </div>

        <!-- tag for  -->
        <div class="profile-content">

            <!-- tag for  -->
            <div class="profile-content1">

                <!-- tag for  -->
                <div class="content-category1">

                    <!-- tag for  -->
                    <div class="profile-content-category-header">

                        <!-- tag for  -->
                        <div class="Topics">About</div>

                    </div>

                    <!-- tag for  -->
                    <div class="profile-content-category-content">
                        <?php $data['sellerProfileDetails']['about']?>
                    </div>

                    <!-- tag for  -->
                    <div class="profile-content-category-header">
                        <!-- tag for  -->
                        <div class="Topics">Languages</div>
                    </div>

                    <!-- tag for  -->
                    <div class="profile-content-category-content">
                        <?php echo $data['sellerProfileDetails']['languages']?>
                    </div>

                    <!-- tag for  -->
                    <div class="profile-content-category-header">
                        <div class="Topics">Education</div>
                    </div>

                    <!-- tag for  -->
                    <div class="profile-content-category-content"  style="border-bottom: 0;">
                        
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus aspernatur commodi quidem vero harum veniam incidunt fuga cupiditate, dignissimos voluptatem corporis nihil quaerat sit ipsam deleniti accusamus animi hic architecto non error officiis nobis minima. Error maxime tempore esse alias.
                    </div>

                </div>

            </div>

            <!-- tag for  -->
            <div class="profile-content2">

                <!-- tag for  -->
                <div class="content-category2">

                    <!-- tag for  -->
                    <div class="profile-content-category-header">
                        <!-- tag for  -->
                        <div class="Topics">Portfolio</div>

                    </div>

                    <!-- tag for  -->
                    <div class="profile-content-category-content" style="border-bottom: 0;">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero iure, cupiditate magni accusamus, perferendis non enim quibusdam eius explicabo eos odio labore, consequuntur ad facilis corporis assumenda eum sit rem inventore autem. A voluptatem deleniti, rerum pariatur odio numquam minima. Veritatis impedit repudiandae explicabo sit ea repellat assumenda nulla. Sint enim consequatur nam saepe illum, earum rem amet eius aspernatur accusantium dolor ad. Reprehenderit eveniet veniam maiores qui ipsa ad laudantium quos, tempore itaque possimus debitis magni modi ducimus tenetur quia velit fugiat hic architecto libero. Quaerat, dolorum suscipit consequuntur necessitatibus dicta sapiente voluptatum optio, aspernatur, ratione saepe asperiores quam.
                    </div>

                </div>

                <!-- tag for  -->
                <div class="content-category2">

                    <!-- tag for  -->
                    <div class="profile-content-category-header">
                        <!-- tag for  -->
                        <div class="Topics">Skills</div>
                    </div>

                    <!-- tag for  -->
                    <div class="profile-content-category-content" style="border-bottom: 0;">
                        <?php echo $data['sellerProfileDetails']['skills'];?>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- tag for  -->
    <div class="other-category-container" id="gigs">

        <!-- tag for  -->
        <div class="other-category-header">

            <!-- tag for  -->
            <div class="Topics" style="padding-left: 0;">My Gigs</div>

            <!-- tag for  -->
            <div class="plus" >
                <!-- anchor tag for  -->
                <a href="addGig">
                    <!-- button for  -->
                    <button id="plus">Add New Gig</button>
                </a>

            </div>

        </div>

        <!-- tag for  -->
        <div class="recentGigs" id="content">
            <!-- tag for  -->
            <div class="recentGigsContent">
                <!--   -->
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
