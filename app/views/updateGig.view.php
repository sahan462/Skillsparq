<?php include "components/sellerHeader.component.php";?>

<?php 
    $gigDetails = $data['gigDetails'];
?>

<!-- Main Container -->
<div class="updateGigContainer">

    <!-- left side -->
    <div class="leftContainer">

        <!-- topic -->
        <div class="updateGigHeader">
            Need to Update : Update Your Gig
        </div>

        <!-- animation -->
        <div class="updateGigAnimation">
            <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
            <dotlottie-player src="https://lottie.host/881eaa0d-a9ec-48c3-8d93-95f4121b411c/Hxv4H6Yonz.json" background="transparent" speed="1" style="width: 400px; height: 400px;" loop autoplay></dotlottie-player>
        </div>
    </div>

    <!-- right side -->
    <div class="rightContainer">

        <!-- form -->
        <form id="regForm" method="get" enctype="multipart/form-data" action="<?php echo BASEURL.'Gig/updateGig'?>" autocomplete="off">
            <!-- One "tab" for each step in the form: -->

            <div class="addGigContent">

                <!-- tab 1 -->
                <div class="tab">
                    <span class="type-1">Title</span>
                    <span class="type-2">The most crucial area to put keywords that customers are likely to use when looking for a service similar to yours is in the title of your gig shop.</span>
                    <div class="title">
                        <p><input type="text" name="title" placeholder="I will create WordPress websites" value="<?php echo $data['gigDetails']['title']?>" oninput="this.className = ''"></p>
                    </div>

                    <div class="description">
                        <span class="type-1"> Description</span>
                        <span class="type-2">Describe your gig and service you provide</span>
                        <textarea name="description"  rows="16" spellcheck="false" oninput="this.className = ''" style="height: 150px" required>
                            <?php echo $gigDetails['description']?>
                        </textarea>
                    </div>

                    <div class="category">
                        <span class="type-1">Which category best fits your project?</span>
                        <span class="type-2">Choose from the list</span>
                        <select name="category" class="categories" required>
                            <option value="Graphics & Design <?php echo ($gigDetails['category'] === 'Graphics & Design') ? 'selected' : '';?>">Graphics & Design</option>
                            <option value="Programming & Tech <?php echo ($gigDetails['category'] === 'Programming & Tech') ? 'selected' : '';?>">Programming & Tech</option>
                            <option value="Digital Marketing <?php echo ($gigDetails['category'] === 'Digital Marketing') ? 'selected' : '';?>">Digital Marketing</option>
                            <option value="Video & Animation <?php echo ($gigDetails['category'] === 'Video & Animation') ? 'selected' : '';?>">Video & Animation</option>
                            <option value="Writing & Translation <?php echo ($gigDetails['category'] === 'Writing & Translation') ? 'selected' : '';?>">Writing & Translation</option>
                            <option value="Music & Audio <?php echo ($gigDetails['category'] === 'Music & Audio') ? 'selected' : '';?>">Music & Audio</option>
                            <option value="Business <?php echo ($gigDetails['category'] === 'Business') ? 'selected' : '';?>">Business</option>
                            <option value="Data <?php echo ($gigDetails['category'] === 'Data') ? 'selected' : '';?>">Data</option>
                            <option value="Photography <?php echo ($gigDetails['category'] === 'Photography') ? 'selected' : '';?>">Photography</option>
                            <option value="AI Services <?php echo ($gigDetails['category'] === 'AI Services') ? 'selected' : '';?>">AI Services</option>
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
                                <div class="customName">
                                    <input type="text"  name ="customName_1" oninput="this.className = ''">
                                </div>
                            </div>

                            <div class="row">
                                <span>How long will it take to Deliver: </span>
                                <div class="noOfDeliveryDays">
                                    <input type="number" name="noOfDeliveryDays_1" oninput="this.className = ''" id="quantity"  min="1" max="5">
                                    <select name="timePeriod_1" class="categories" >
                                        <option value="Days <?php echo ($gigDetails['time_period'] === 'AI Services') ? 'selected' : '';?>">Day(s)</option>
                                        <option value="Weeks<?php ;?>">Week(s)</option>
                                        <option value="Months <?php ;?>">Month(s)</option>
                                        <option value="Years <?php ;?>">Year(s)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <span>Number of Revisions You Provide: </span>
                                <div class="noOfRevisions">
                                    <select name="noOfRevisions_1"  class="categories" required>
                                        <option value="1 <?php ;?>">1</option>
                                        <option value="2 <?php ;?>">2</option>
                                        <option value="3 <?php ;?>">3</option>
                                        <option value="4 <?php ;?>">4</option>
                                        <option value="5 <?php ;?>">5</option>
                                        <option value="6 <?php ;?>">6</option>
                                        <option value="7 <?php ;?>">7</option>
                                        <option value="Unlimited<?php ;?>">Unlimited</option>
                                    </select>
                                </div>
                            </div>


                            <span>Describe your offer and the service you provide on this package: </span>
                            <div class="packageDescription">
                                <textarea name="packageDescription_1" placeholder="I need.." rows="6" spellcheck="false" oninput="this.className = ''" required></textarea>
                            </div>

                        </div>

                        <div id="Paris" class="tabcontent">
                            <div class="row">
                                <span>Create a Custom Name For Your Package: </span>
                                <div class="customName"><input type="text"  name ="customName_2" oninput="this.className = ''"></div>
                            </div>

                            <div class="row">
                                <span>How long will it take to Deliver: </span>
                                <div class="noOfDeliveryDays">
                                    <input type="number" name="noOfDeliveryDays_2" oninput="this.className = ''" id="quantity"  min="1" max="5">
                                    <select name="timePeriod_2" class="categories" required>
                                        <option value="Days<?php ;?>">Day(s)</option>
                                        <option value="Weeks<?php ;?>">Week(s)</option>
                                        <option value="Months<?php ;?>">Month(s)</option>
                                        <option value="Years<?php ;?>">Year(s)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <span>Number of Revisions You Provide: </span>
                                <div class="noOfRevisions">
                                    <select name="noOfRevisions_2"  class="categories" required>
                                        <option value="1<?php ;?>">1</option>
                                        <option value="2<?php ;?>">2</option>
                                        <option value="3<?php ;?>">3</option>
                                        <option value="4<?php ;?>">4</option>
                                        <option value="5<?php ;?>">5</option>
                                        <option value="6<?php ;?>">6</option>
                                        <option value="7<?php ;?>">7</option>
                                        <option value="Unlimited<?php ;?>">Unlimited</option>
                                    </select>
                                </div>
                            </div>


                            <span>Describe your offer and the service you provide on this package: </span>
                            <div class="packageDescription">
                                <textarea name="packageDescription_2" placeholder="I need.." rows="6" spellcheck="false" oninput="this.className = ''" required></textarea>
                            </div>
                        </div>

                        <div id="Tokyo" class="tabcontent">
                            <div class="row">
                                <span>Create a Custom Name For Your Package: </span>
                                <div class="customName"><input type="text"  name ="customName_3" oninput="this.className = ''" value="<?php ;?>"></div>
                            </div>

                            <div class="row">
                                <span>How long will it take to Deliver: </span>
                                <div class="noOfDeliveryDays">
                                    <input type="number" name="noOfDeliveryDays_3" oninput="this.className = ''" id="quantity"  min="1" max="5">
                                    <select name="timePeriod_3" class="categories" required>
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
                                    <select name="noOfRevisions_3"  class="categories" required>
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
                                <textarea name="packageDescription_3" placeholder="I need.." rows="6" spellcheck="false" oninput="this.className = ''" required></textarea>
                            </div>
                            
                        </div>
                    </div>

                    <span class="type-1">Upload Images</span>
                    <span class="type-2">add cover image and other slider images</span>

                    <div class="images">
                        <label for="coverImage">Cover Image:</label>
                        <input type="file" id="coverImage" name="coverImage" value="<?php echo $gigDetails['cover_image']?>" required/>

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
                        <button type="submit" id="nextBtn" name="submit" onclick="nextPrev(1)"><span class="next">Next</span></button>
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

<script src="/skillsparq/public/assests/js/updateGig.script.js"></script>

<?php include "components/footer.component.php";?>