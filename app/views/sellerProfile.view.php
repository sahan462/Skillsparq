<?php include "components/sellerHeader.component.php"; ?>

<?php
$data["profilePicture"] = "dummyprofile.jpg";
?>

<div class="container">
    <div class="profile-container">
        <div class="profile-header">
            <div class="seller">
                <div class="img"><img src="../public/assests/images/<?php echo $data["profilePicture"] ?>" alt="pro-pic"></div>
                <div class="buttons">
                    <a href="#"><button id="button">See Public View</button></a>
                    <a href="#"><button id="button">Profile Settings</button></a>
                </div>
            </div>
            <hr>
            <div class="seller-functions">
                chamal
                <!-- <div class="icons">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </div> -->
            </div>
        </div>
        <div class="seller-details">
            <div class="personal-information">
                Web Developer, Undergraduate at University of Colombo School of Computing.
            </div>
            <div class="se-professionalPulse">
            </div>
        </div>
    </div>

    <div class="other-category-container">
        <div class="other-category-header">
            <div class="Topics">Full Stack Web Developer</div>
        </div>
        <div class="">
            $20.00/hr
        </div>
        <hr>
        <div class="other-category-header">
            <div class="Topics">Work History</div>
        </div>
        <hr>
        <div class="other-category-header">
            <div class="Topics">Portfolio</div>
        </div>
        <hr>
        <div class="other-category-header">
            <div class="Topics">Skills</div>
        </div>
        <!-- <hr>
        <div class="other-category-header">
            <div class="Topics">Full Stack Web Developer</div>
        </div> -->
    </div>
    <div class="other-category-container">
        <div class="other-category-header">
            <div class="Topics">Gigs</div>
            <div class="buttons">
                <button id="button"> Add</button>
            </div>
        </div>
        <hr>
        <div class="card-container">
            <div class="card">
                <img src="../public/assests/images/gigcard3.jpg">
                <div class="card-content">
                    <h2>Gig Card</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quibusdam perspiciatis, ab inventore sunt harum.</p>
                    <a href="">Read more</a>
                </div>

            </div>
            <div class="card">
                <img src="../public/assests/images/gigcard2.jpg">
                <div class="card-content">
                    <h2>Gig Card</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quibusdam perspiciatis, ab inventore sunt harum.</p>
                    <a href="">Read more</a>
                </div>

            </div>
            <div class="card">
                <img src="../public/assests/images/gigcard3.jpg">
                <div class="card-content">
                    <h2>Gig Card</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quibusdam perspiciatis, ab inventore sunt harum.</p>
                    <a href="">Read more</a>
                </div>

            </div>
            <div class="card">
                <img src="../public/assests/images/gigcard4.jpg">
                <div class="card-content">
                    <h2>Gig Card</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quibusdam perspiciatis, ab inventore sunt harum.</p>
                    <a href="">Read more</a>
                </div>

            </div>
            <div class="card">
                <img src="../public/assests/images/gigcard4.jpg">
                <div class="card-content">
                    <h2>Gig Card</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quibusdam perspiciatis, ab inventore sunt harum.</p>
                    <a href="">Read more</a>
                </div>

            </div>
        </div>
    </div>
    <div class="other-category-container">
        <div class="other-category-header">
            <div class="Topics">Testimonials</div>
            <div class="buttons">
                <button id="button"> Add</button>
            </div>
        </div>
        <hr>
        <div class="">
        </div>
    </div>
    <div class="other-category-container">
        <div class="other-category-header">
            <div class="Topics">Certifications</div>
            <div class="buttons">
                <button id="button"> Add</button>
            </div>
        </div>
        <hr>
    </div>
    <div class="other-category-container">
        <div class="other-category-header">
            <div class="Topics">Employment History</div>

            <div class="buttons">
                <button id="button"> Add</button>
            </div>
        </div>
        <hr>
    </div>
    <div class="other-category-container">
        <div class="other-category-header">
            <div class="Topics">Other Experiences</div>
            <div class="buttons">
                <button id="button"> Add</button>
            </div>
        </div>
        <hr>
        <div>content</div>
    </div>

</div>


<?php include "components/footer.component.php"; ?>