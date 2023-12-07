<?php include "components/sellerHeader.component.php";?>

<?php 


?>

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
        <form id="regForm" method="get" action="addGig/createGig" autocomplete="off">
            <!-- One "tab" for each step in the form: -->

            <div class="content">

                <!-- tab 1 -->
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

                <!-- tab 2 -->
                <div class="tab">

                    <span class="type-1">Package Details</span>
                    <span class="type-2">Describe your offer and the service you provide</span>

                    <div class="outerTab">

                        <div class="Tab">
                            <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Basic</button>
                            <button class="tablinks" onclick="openCity(event, 'Paris')">Standard</button>
                            <button class="tablinks" onclick="openCity(event, 'Tokyo')">Premium</button>
                        </div>

                        <div id="London" class="tabcontent">

                            <div class="row">
                                <span>Create a Custom Name For Your Package: </span>
                                <div class="customName"><input type="text"  oninput="this.className = ''"></div>
                            </div>

                            <div class="row">
                                <span>How long will it take to Deliver: </span>
                                <div class="noOfDeliveryDays">
                                    <input type="number" oninput="this.className = ''" id="quantity" name="quantity" min="1" max="5">
                                    <select name="timePeriod1" class="categories" required="">
                                        <option value="Days">Day(s)</option>
                                        <option value="Weeks">Week(s)</option>
                                        <option value="Months">Month(s)</option>
                                        <option value="Years">Year(s)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <span>Number of Revisions You Provide: </span>
                                <div class="noOfRevisions">
                                    <select name="revision1"  class="categories" required="">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="Unlimited">Unlimited</option>
                                    </select>
                                </div>
                            </div>


                            <span>Describe your offer and the service you provide on this package: </span>
                            <div class="packageDescription">
                                <textarea name="description" placeholder="I need.." rows="6" required="" spellcheck="false" oninput="this.className = ''"></textarea>
                            </div>

                        </div>

                        <div id="Paris" class="tabcontent">
                            <div class="row">
                                <span>Create a Custom Name For Your Package: </span>
                                <div class="customName"><input type="text"  oninput="this.className = ''"></div>
                            </div>

                            <div class="row">
                                <span>How long will it take to Deliver: </span>
                                <div class="noOfDeliveryDays">
                                    <input type="number" oninput="this.className = ''" id="quantity" name="quantity" min="1" max="5">
                                    <select name="timePeriod1" class="categories" required="">
                                        <option value="Days">Day(s)</option>
                                        <option value="Weeks">Week(s)</option>
                                        <option value="Months">Month(s)</option>
                                        <option value="Years">Year(s)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <span>Number of Revisions You Provide: </span>
                                <div class="noOfRevisions">
                                    <select name="revision1"  class="categories" required="">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="Unlimited">Unlimited</option>
                                    </select>
                                </div>
                            </div>


                            <span>Describe your offer and the service you provide on this package: </span>
                            <div class="packageDescription">
                                <textarea name="description" placeholder="I need.." rows="6" required="" spellcheck="false" oninput="this.className = ''"></textarea>
                            </div>
                        </div>

                        <div id="Tokyo" class="tabcontent">
                            <div class="row">
                                <span>Create a Custom Name For Your Package: </span>
                                <div class="customName"><input type="text"  oninput="this.className = ''"></div>
                            </div>

                            <div class="row">
                                <span>How long will it take to Deliver: </span>
                                <div class="noOfDeliveryDays">
                                    <input type="number" oninput="this.className = ''" id="quantity" name="quantity" min="1" max="5">
                                    <select name="timePeriod1" class="categories" required="">
                                        <option value="Days">Day(s)</option>
                                        <option value="Weeks">Week(s)</option>
                                        <option value="Months">Month(s)</option>
                                        <option value="Years">Year(s)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <span>Number of Revisions You Provide: </span>
                                <div class="noOfRevisions">
                                    <select name="revision1"  class="categories" required="">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="Unlimited">Unlimited</option>
                                    </select>
                                </div>
                            </div>

                            <span>Describe your offer and the service you provide on this package: </span>
                            <div class="packageDescription">
                                <textarea name="description" placeholder="I need.." rows="6" required="" spellcheck="false" oninput="this.className = ''"></textarea>
                            </div>
                        </div>
                    </div>

                    <span class="type-1">Upload Images</span>
                    <span class="type-2">add cover image and other slider images</span>

                    <div class="images">
                        <label for="coverImage">Cover Image:</label>
                        <input type="file" id="coverImage" name="coverImage"  required />

                        <label for="sliderImage1">Slider Image 1:</label>
                        <input type="file" id="sliderImage1" name="sliderImage1"   />

                        <label for="sliderImage2">Slider Image 2:</label>
                        <input type="file" id="sliderImage2" name="sliderImage2"   />

                        <label for="sliderImage3">Slider Image 3:</label>
                        <input type="file" id="sliderImage3" name="sliderImage3"   />

                        <label for="sliderImage4">Slider Image 4:</label>
                        <input type="file" id="sliderImage4" name="sliderImage4"   />
                    </div>

                </div>
            </div>

            <div class="navigation">
                <div>
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)"><span class="previous">Previous</span></button>
                        <button type="submit" id="nextBtn" onclick="nextPrev(1)"><span class="next">Next</span></button>
                    </div>
                </div>

                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                </div>

            </div>

        </form>
    </div>
</div>

<script src="/skillsparq/public/assests/js/addGig.script.js"></script>

<?php include "components/footer.component.php";?>