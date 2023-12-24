<?php include "components/buyerSimpleHeader.component.php"; ?>

<?php
    $data["profilePicture"] = "avishka.jpg";
    $data["sliderImage-1"] = "slide1.webp";
    $data["sliderImage-2"] = "slide2.webp";
    $data["sliderImage-3"] = "slide3.webp";
    $data["sliderImage-4"] = "slide4.webp";

    $data["category"] = "Programming and Tech";
    $data["gigTitle"] = "I will do generative ai and machine learning projects using python";
    $data["sellerName"] = "Avishka Idunil";

 
?>

<!-- Display Gig Container -->
<div class="displayGigContainer">

    <!--Modal 1  -->
    <div class="overlay" id="overlay">
        <div class="modal" id="modal">
            <form id="requestForm">
                <div class="row">
                    <label for="requestDescription" class="type-1">Request Description:</label>
                    <label for="requestDescription" class="type-2">Please provide a concise overview of the task you would like to accomplish.</label>
                    <textarea id="requestDescription" name="requestDescription" rows="10" ></textarea>
                </div>

                <div class="row">
                    <label for="attachments" class="type-1">Attachments:</label>
                    <label for="attachments" class="type-2">Kindly upload any attachments as a compressed ZIP file, if applicable.</label>
                    <input type="file" id="attachments" name="attachments" multiple>
                </div>

                <div class="buttons">
                    <button type="button" onclick="confirmAction('cancel')">Cancel Request</button>
                    <button type="button" onclick="confirmAction('send')">Send Request</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal 2 -->
    <div class="overlay" id="cancelConfirmationOverlay">
        <div class="confirmation" id="cancelConfirmation">
            <p>Are you sure you want to continue?</p>
            <button onclick="handleConfirmation('cancelYes')">Yes</button>
            <button onclick="handleConfirmation('cancelNo')">No</button>
        </div>
    </div>

    <!-- Modal 3 -->
    <div class="overlay" id="sendConfirmationOverlay">
        <div class="confirmation" id="sendConfirmation">
            <p>Are you sure you want to continue?</p>
            <button onclick="handleConfirmation('sendYes')">Yes</button>
            <button onclick="handleConfirmation('sendNo')">No</button>
        </div>
    </div>



    <!-- category -->
    <div class="category">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
        </svg>
        <?php echo $data["category"]; ?> 
    </div>

    <!-- Main Container -->
    <div class="mainContainer">

        <!-- Top Container -->
        <div class="topContainer">

            <!--Top Left Container  -->
            <div class="topLeftContainer">

                <div class="gigTitle">
                    <h1>
                        <?php echo $data["gigTitle"]; ?>
                    </h1>
                </div>
                <div class="seller">
                    <div class="image">
                        <img src="../public/assests/images/<?php echo $data["profilePicture"]?>" loading="lazy">
                    </div>
                    <div class="sellerName">
                        <a href="">
                            <?php echo $data["sellerName"]; ?>
                        </a>
                    </div>
                </div>
                <div class="gigImageSlider">
                    <div class="sliderContainer">
                        <div class="showSlide fade">
                            <img src="../public/assests/images/<?php echo $data["sliderImage-1"]?>" loading="lazy">
                            <div class="content"></div>
                        </div>
                        <div class="showSlide fade">
                            <img src="../public/assests/images/<?php echo $data["sliderImage-2"]?>" loading="lazy">
                            <div class="content"></div>
                        </div>
                
                        <div class="showSlide fade">
                            <img src="../public/assests/images/<?php echo $data["sliderImage-3"]?>" loading="lazy">
                            <div class="content"></div>
                        </div>
                        <div class="showSlide fade">
                            <img src="../public/assests/images/<?php echo $data["sliderImage-4"]?>" loading="lazy">
                            <div class="content"></div>
                        </div>
                        <!-- Navigation arrows -->
                        <div class="navigationArrows">
                            <a class="left" onclick="nextSlide(-1)">&#10094;</a>
                            <a class="right" onclick="nextSlide(1)">&#10095;</a>
                        </div>
                    </div> 
                </div>
            </div>

            <!-- Top Right Container -->
            <div class="topRightContainer">

                <!--packages  -->
                <div class="packageDetails">
                    <div class="package-tabs">
                        <div class="tab">
                            <button class="tablinks" onclick="openCity(event, 'London')" id = "defaultOpen" style="border-radius: 8px 0 0 0;">Basic</button>
                            <button class="tablinks" onclick="openCity(event, 'Paris')">Standard</button>
                            <button class="tablinks" onclick="openCity(event, 'Tokyo')" style="border-radius: 0 8px 0 0;">Premium</button>
                        </div>
                    
                        <div id="London" class="tabcontent" style="display: block;">
                            <div class="columns">
                                <ul class="price">
                                    <li><b>USD 120 </b></li>
                                    <li><b>Clean and responsive</b> landing page, <b>Unique</b> and clean landing page for your business</li>
                                    <div class="package-status">
                                    <li>
                                        <div class="package-status-one">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stopwatch" viewBox="0 0 16 16">
                                                <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z"/>
                                                <path d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z"/>
                                                </svg>
                                            2 Days Delivery
                                        </div>
                                        <div class="package-status-two">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
                                                <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z"/>
                                                </svg>
                                            3 Revisions
                                        </div>
                                    </li>
                                    </div>
                                    <a href="#"><button onclick="openModal()">Request to Order</button></a>
                                </ul>
                            </div>
                        </div>
                    
                        <div id="Paris" class="tabcontent">
                            <div class="columns">
                                <ul class="price">
                                    <li class="package-cost"><b>USD 220 </b></li>
                                    <li><b>Clean and responsive</b> landing page, <b>Unique</b> and clean landing page for your business</li>
                                    <div class="package-status">
                                        <li>
                                            <div class="package-status-one">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stopwatch" viewBox="0 0 16 16">
                                                    <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z"/>
                                                    <path d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z"/>
                                                </svg>
                                                5 Days Delivery
                                            </div>
                                            <div class="package-status-two">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
                                                    <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z"/>
                                                </svg>
                                                5 Revisions
                                            </div>
                                        </li>
                                    </div>
                                    <a href="#"><button onclick="openModal()">Request to Order</button></a>
                                </ul>
                            </div>
                        </div>
                    
                        <div id="Tokyo" class="tabcontent">
                            <div class="columns">
                                <ul class="price">
                                    <li><b>USD 320 </b></li>
                                    <li><b>Clean and responsive</b> landing page, <b>Unique</b> and clean landing page for your business</li>
                                    <div class="package-status">
                                        <li>
                                            <div class="package-status-one">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stopwatch" viewBox="0 0 16 16">
                                                    <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z"/>
                                                    <path d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z"/>
                                                </svg>
                                                7 Days Delivery
                                            </div>
                                            <div class="package-status-two">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
                                                    <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z"/>
                                                </svg>
                                                Unlimited Revisions
                                            </div>
                                        </li>
                                    </div>
                                    <a href="#" onclick="openModal()"><button>Request to Order</button></a>
                                </ul>
                            </div>
                        </div>
                    </div>                    
                </div>

                <!-- Milestones-->
                <div class="milestoneApproach">
                    
                </div>
                <div class="other">

                </div>
            </div>
        </div>

        <!-- Bottom Container -->
        <div class="bottomContainer">

            <!-- Bottom Left Container -->
            <div class="bottomLeftContainer">
                <div class="aboutSeller"></div>
                <div class="gigRatings"></div>
            </div>

            <!-- Bottom Right Container -->
            <div class="bottomRightContainer">
                <div class="animation"></div>
            </div>
        </div>

    </div>
</div>

<script src="./assests/js/displayGig.script.js"></script>

<?php include "components/footer.component.php"?>
