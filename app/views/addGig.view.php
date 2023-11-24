<?php include "components/sellerHeader.component.php";?>

<!-- Main Container -->
<div class="addGigContainer">

    <!-- left side -->
    <div class="leftContainer">

        <!-- topic -->
        <div class="addGigHeader">
            Craft and Contribute: Start Your New Gig
        </div>

        <!-- animation -->
        <div class="addGigAnimation">
            <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
            <dotlottie-player src="https://lottie.host/881eaa0d-a9ec-48c3-8d93-95f4121b411c/Hxv4H6Yonz.json" background="transparent" speed="1" style="width: 400px; height: 400px;" loop autoplay></dotlottie-player>
        </div>
    </div>

    <!-- right side -->
    <div class="rightContainer">

        <!-- form -->
        <form id="regForm" action="">
            <!-- One "tab" for each step in the form: -->
            <div class="tab">
                <span class="type-1">Title</span>
                <span class="type-2">The most crucial area to put keywords that customers are likely to use when looking for a service similar to yours is in the title of your gig shop.</span>
                <div class="title">
                    <p><input type="text" placeholder="I will create WordPress websites" oninput="this.className = ''"></p>
                </div>

                <div class="description">
                    <span class="type-1"> Description</span>
                    <span class="type-2">Describe your gig and service you provide</span>
                    <textarea name="description" placeholder="I need.." rows="16" required="" spellcheck="false" oninput="this.className = ''" style="height: 150px"></textarea>
                </div>

                <div class="category">
                    <span class="type-1">Which category best fits your project?</span>
                    <span class="type-2">Choose from the list</span>
                    <select name="category" class="categories" required="">
                        <option value="Graphics &amp; Design">Graphics &amp; Design</option>
                        <!-- ... other options ... -->
                        <option value="AI Services">AI Services</option>
                    </select>
                </div>
            </div>

            <div class="tab">
                <div class="images">
                    <div class="coverImage">
                        <div class="inputHeader">Cover Image:</div>
                        <input type="file" name="coverImage" style="margin-bottom: 32px;" required />
                    </div>
                    <div class="inputHeader">Slider Images:</div>
                    <div class="sideImages" style="margin-bottom: 32px;">
                        <input type="file" name="sideImage_1" />
                        <!-- ... other input fields ... -->
                        <input type="file" name="sideImage_4" />
                    </div>
                </div>
            </div>

            <!-- Correct placement of the closing div tag for the first tab -->
            <div class="tab">
                jygu
            </div>

            <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)"><span class="previous">Previous</span></button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)"><span class="next">Next</span></button>
                </div>
            </div>

            <!-- Circles which indicate the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
            </div>
        </form>
    </div>
</div>

<script src="/skillsparq/public/assests/js/addGig.script.js"></script>

<?php include "components/footer.component.php";?>