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
            <div class="tab">Name:

                <div class="title">
                    <p><input placeholder="First name..." oninput="this.className = ''"></p>
                </div>

                <div class="description">
                    <textarea name="description" placeholder="I need.." rows="8" required="" spellcheck="false" style="width: 100%"></textarea>                    
                </div>

                <div class="images">

                    <div class="coverImage">
                        <input type="file" name="coverImage" />
                    </div>
                    <div class="sideImages">
                        <input type="file" name="sideImage_1" />
                        <input type="file" name="sideImage_2" />
                        <input type="file" name="sideImage_3" />
                        <input type="file" name="sideImage_4" />
                    </div>

                </div>

            </div>

            <div class="tab">

            </div>

            <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
            </div>

            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            </div>

        </form>

    </div>

</div>
<script src="/skillsparq/public/assests/js/addGig.script.js"></script>
<?php include "components/footer.component.php";?>