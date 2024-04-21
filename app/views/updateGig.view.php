<?php include "components/sellerHeader.component.php";?>

<?php 
    $gigDetails = $data['gigDetails'];

    $gigId = $gigDetails['gig_id'];
    $title = $gigDetails['title'];
    $description = $gigDetails['description'];
    $category = $gigDetails['category'];
    $coverImage = $gigDetails['cover_image'];
    $ongoingOrderCount = $gigDetails['ongoing_order_count'];
    $createdAt = $gigDetails['created_at'];
    $state = $gigDetails['state'];
    $sellerId = $gigDetails['seller_id'];

    // Details of package #1
    $package1 = $gigDetails[0];
    $packageId1 = $package1['package_id'];
    $packageName_1 = $package1['package_name'];
    $packagePrice_1 = $package1['package_price'];
    $noOfDeliveryDays_1 = $package1['no_of_delivery_days'];
    $timePeriod_1 = $package1['time_period'];
    $noOfRevisions_1 = $package1['no_of_revisions'];
    $packageDescription_1 = $package1['package_description'];
    $package_1Created = $package1['created_at'];
    $package_1GigId = $package1['gig_id'];

    // Details of package #2
    $package2 = $gigDetails[1];
    $packageId2 = $package2['package_id'];
    $packageName_2 = $package2['package_name'];
    $packagePrice_2 = $package2['package_price'];
    $noOfDeliveryDays_2 = $package2['no_of_delivery_days'];
    $timePeriod_2 = $package2['time_period'];
    $noOfRevisions_2 = $package2['no_of_revisions'];
    $packageDescription_2 = $package2['package_description'];
    $package_2Created = $package2['created_at'];
    $package_2GigId = $package2['gig_id'];

    // Details of package #3
    $package3 = $gigDetails[2];
    $packageId3 = $package3['package_id'];
    $packageName_3 = $package3['package_name'];
    $packagePrice_3 = $package3['package_price'];
    $noOfDeliveryDays_3 = $package3['no_of_delivery_days'];
    $timePeriod_3 = $package3['time_period'];
    $noOfRevisions_3 = $package3['no_of_revisions'];
    $packageDescription_3 = $package3['package_description'];
    $package_3Created = $package3['created_at'];
    $package_3GigId = $package3['gig_id'];
    
    $slideImages_id = $data["slideImages"]['side_images_id'];
    $slideImage_1 = $data["slideImages"]['side_image_1'];
    $slideImage_2 = $data["slideImages"]['side_image_2'];
    $slideImage_3 = $data["slideImages"]['side_image_3'];
    $slideImage_4 = $data["slideImages"]['side_image_4'];

    // show($data);
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
        <form id="regForm" method="POST" enctype="multipart/form-data" action="<?php echo BASEURL.'Gig/updateGig';?>" autocomplete="off">
            <!-- One "tab" for each step in the form: -->

            <div class="addGigContent">

                <!-- tab 1 -->
                <div class="tab">

                    <span class="type-1">Title</span>
                    <span class="type-2">The most crucial area to put keywords that customers are likely to use when looking for a service similar to yours is in the title of your gig shop.</span>

                    <div class="title">

                        <p><input type="text" name="title" placeholder="I will create WordPress websites" value="<?php echo $title;?>" oninput="this.className = ''"></p>

                    </div>

                    <div class="description">

                        <span class="type-1"> Description</span>
                        <span class="type-2">Describe your gig and service you provide</span>
                        <textarea name="description"  rows="16" spellcheck="false" oninput="this.className = ''" style="height: 300px"><?php echo $description;?></textarea>
                        
                    </div>

                    <div class="category" style="margin-top: 16px">

                        <span class="type-1">Which category best fits your project?</span>
                        <span class="type-2">Choose from the list</span>

                        <select name="category" class="categories">

                            <option value="Graphics & Design" <?php echo ($category === 'Graphics & Design') ? 'selected' : '';?>>Graphics & Design</option>
                            <option value="Programming & Tech" <?php echo ($category === 'Programming & Tech') ? 'selected' : '';?>>Programming & Tech</option>
                            <option value="Digital Marketing" <?php echo ($category === 'Digital Marketing') ? 'selected' : '';?>>Digital Marketing</option>
                            <option value="Video & Animation" <?php echo ($category === 'Video & Animation') ? 'selected' : '';?>>Video & Animation</option>
                            <option value="Writing & Translation" <?php echo ($category === 'Writing & Translation') ? 'selected' : '';?>>Writing & Translation</option>
                            <option value="Music & Audio" <?php echo ($category === 'Music & Audio') ? 'selected' : '';?>>Music & Audio</option>
                            <option value="Business" <?php echo ($category === 'Business') ? 'selected' : '';?>>Business</option>
                            <option value="Data" <?php echo ($category === 'Data') ? 'selected' : '';?>>Data</option>
                            <option value="Photography" <?php echo ($category === 'Photography') ? 'selected' : '';?>>Photography</option>
                            <option value="AI Services" <?php echo ($category === 'AI Services') ? 'selected' : '';?>>AI Services</option>

                        </select>

                    </div>

                </div>

                <!-- tab 2 -->
                <div class="tab">

                    <span class="type-1">Package Details</span>
                    <span class="type-2">Describe your offer and the service you provide</span>

                    <div class="outerTab">

                        <table>
                            <tr>
                                <th style="width:10%"></th>
                                <th style="width:30%">Package 1</th>
                                <th style="width:30%">Package 2</th>
                                <th style="width:30%">Package 3</th>
                            </tr>
                            <tr>
                                <td style="text-align:left">Package Name</td>
                                <td>
                                    <input type="text" name ="packageName_1" oninput="this.className = ''" value="<?php echo $packageName_1;?>">
                                </td>
                                <td>
                                    <input type="text" name ="packageName_2" oninput="this.className = ''" value='<?php echo $packageName_2?>'>
                                </td>
                                <td>
                                    <input type="text" name ="packageName_3" oninput="this.className = ''" value="<?php echo $packageName_3;?>">
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left">Package Price</td>
                                <td>
                                    <input type="number" name ="packagePrice_1" oninput="this.className = ''" min="5" max="1000" value='<?php echo $packagePrice_1;?>'>
                                </td>
                                <td>
                                    <input type="number" name ="packagePrice_2" oninput="this.className = ''" min="5" max="1000" value='<?php echo $packagePrice_2?>'>
                                </td>
                                <td>
                                    <input type="number" name ="packagePrice_3" oninput="this.className = ''" min="5" max="1000" value='<?php echo $packagePrice_3;?>'>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left">Revision Count</td>
                                <td>
                                    <div class="noOfRevisions">
                                        <select style="width:100%" name="noOfRevisions_1"  class="categories">
                                            <option value="1"<?php echo ($noOfRevisions_1 === '1') ? 'selected' : '';?>>1</option>
                                            <option value="2"<?php echo ($noOfRevisions_1 === '2') ? 'selected' : '';?>>2</option>
                                            <option value="3"<?php echo ($noOfRevisions_1 === '3') ? 'selected' : '';?>>3</option>
                                            <option value="4"<?php echo ($noOfRevisions_1 === '4') ? 'selected' : '';?>>4</option>
                                            <option value="5"<?php echo ($noOfRevisions_1 === '5') ? 'selected' : '';?>>5</option>
                                            <option value="6"<?php echo ($noOfRevisions_1 === '6') ? 'selected' : '';?>>6</option>
                                            <option value="7"<?php echo ($noOfRevisions_1 === '7') ? 'selected' : '';?>>7</option>
                                            <option value="Unlimited"<?php echo ($noOfRevisions_1 === 'Unlimited') ? 'selected' : '';?>>Unlimited</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="noOfRevisions">
                                        <select style="width:100%" name="noOfRevisions_2"  class="categories">
                                            <option value="1"<?php echo ($noOfRevisions_2 === '1') ? 'selected' : '';?>>1</option>
                                            <option value="2"<?php echo ($noOfRevisions_2 === '2') ? 'selected' : '';?>>2</option>
                                            <option value="3"<?php echo ($noOfRevisions_2 === '3') ? 'selected' : '';?>>3</option>
                                            <option value="4"<?php echo ($noOfRevisions_2 === '4') ? 'selected' : '';?>>4</option>
                                            <option value="5"<?php echo ($noOfRevisions_2 === '5') ? 'selected' : '';?>>5</option>
                                            <option value="6"<?php echo ($noOfRevisions_2 === '6') ? 'selected' : '';?>>6</option>
                                            <option value="7"<?php echo ($noOfRevisions_2 === '7') ? 'selected' : '';?>>7</option>
                                            <option value="Unlimited"<?php echo ($noOfRevisions_2 === 'Unlimited') ? 'selected' : '';?>>Unlimited</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="noOfRevisions">
                                        <select style="width:100%" name="noOfRevisions_3"  class="categories">
                                            <option value="1"<?php echo ($noOfRevisions_3 === '1') ? 'selected' : '';?>>1</option>
                                            <option value="2"<?php echo ($noOfRevisions_3 === '2') ? 'selected' : '';?>>2</option>
                                            <option value="3"<?php echo ($noOfRevisions_3 === '3') ? 'selected' : '';?>>3</option>
                                            <option value="4"<?php echo ($noOfRevisions_3 === '4') ? 'selected' : '';?>>4</option>
                                            <option value="5"<?php echo ($noOfRevisions_3 === '5') ? 'selected' : '';?>>5</option>
                                            <option value="6"<?php echo ($noOfRevisions_3 === '6') ? 'selected' : '';?>>6</option>
                                            <option value="7"<?php echo ($noOfRevisions_3 === '7') ? 'selected' : '';?>>7</option>
                                            <option value="Unlimited"<?php echo ($noOfRevisions_3 === 'Unlimited') ? 'selected' : '';?>>Unlimited</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left">Delivery Time</td>
                                <td>
                                    <div class="noOfDeliveryDays" style="display:flex; justify-content:space-between;">
                                        <input type="number" name="noOfDeliveryDays_1" oninput="this.className = ''" id="quantity"  min="1" max="5" value='<?php echo $noOfDeliveryDays_1?>'>
                                        <select name="timePeriod_1" class="categories" >
                                            <option value="Days"<?php echo ($timePeriod_1 === "Days") ? 'selected' : '';?>>Day(s)</option>
                                            <option value="Weeks"<?php echo ($timePeriod_1 === "Weeks") ? 'selected' : '';?>>Week(s)</option>
                                            <option value="Months"<?php echo ($timePeriod_1 === "Months") ? 'selected' : '';?>>Month(s)</option>
                                            <option value="Years"<?php echo ($timePeriod_1 === "Years") ? 'selected' : '';?>>Year(s)</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="noOfDeliveryDays" style="display:flex; justify-content:space-between;">
                                        <input type="number" style="width:50%" name="noOfDeliveryDays_2" oninput="this.className = ''" id="quantity"  min="1" max="5" value='<?php echo $noOfDeliveryDays_2?>'>
                                        <select style="width:50%" name="timePeriod_2" class="categories" >
                                            <option value="Days"<?php echo ($timePeriod_2 === "Days") ? 'selected' : '';?>>Day(s)</option>
                                            <option value="Weeks"<?php echo ($timePeriod_2 === "Weeks") ? 'selected' : '';?>>Week(s)</option>
                                            <option value="Months"<?php echo ($timePeriod_2 === "Months") ? 'selected' : '';?>>Month(s)</option>
                                            <option value="Years"<?php echo ($timePeriod_2 === "Years") ? 'selected' : '';?>>Year(s)</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="noOfDeliveryDays" style="display:flex; justify-content:space-between;">
                                        <input type="number" name="noOfDeliveryDays_3" oninput="this.className = ''" id="quantity"  min="1" max="5" value='<?php echo $noOfDeliveryDays_3?>'>
                                        <select name="timePeriod_3" class="categories" >
                                            <option value="Days"<?php echo ($timePeriod_3 === "Days") ? 'selected' : '';?>>Day(s)</option>
                                            <option value="Weeks"<?php echo ($timePeriod_3 === "Weeks") ? 'selected' : '';?>>Week(s)</option>
                                            <option value="Months"<?php echo ($timePeriod_3 === "Months") ? 'selected' : '';?>>Month(s)</option>
                                            <option value="Years"<?php echo ($timePeriod_3 === "Years") ? 'selected' : '';?>>Year(s)</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left">Description</td>
                                <td>
                                <div class="packageDescription">
                                    <textarea name="packageDescription_1" placeholder="I will.." rows="6" spellcheck="false" oninput="this.className = ''"><?php echo $packageDescription_1;?></textarea>
                                </div>
                                </td>
                                <td>
                                <div class="packageDescription">
                                    <textarea name="packageDescription_2" placeholder="I will.." rows="6" spellcheck="false" oninput="this.className = ''"><?php echo $packageDescription_2;?></textarea>
                                </div>
                                </td>
                                <td>
                                <div class="packageDescription">
                                    <textarea name="packageDescription_3" placeholder="I will.." rows="6" spellcheck="false" oninput="this.className = ''"><?php echo $packageDescription_3;?></textarea>
                                </div>
                                </td>
                            </tr>
                        </table>

                    </div>

                </div>

                <!-- tab 3 -->
                <div class="tab">

                    <span class="type-1">Upload Images</span>
                    <span class="type-2">Update cover image and other slider images</span>

                    <div class="images">
                        <div class="slideimg1">
                            <label for="coverImage">Cover Image:</label>
                            <input type="file" id="coverImage" name="newCoverImage" onchange="load_img_name(this.files[0],1)"/>
                            <div id="filename1"><?php echo $coverImage?></div>
                        </div>

                        <div class="slideimg1">
                            <label for="sliderImage1">Slider Image 1:</label>
                            <input type="file" id="sliderImage1" name="newSliderImage1"  onchange="load_img_name(this.files[0],2)"/>
                            <div id="filename2"><?php echo $slideImage_1;?></div>
                        </div>

                        <div class="slideimg1">
                            <label for="sliderImage2">Slider Image 2:</label>
                            <input type="file" id="sliderImage2" name="newSliderImage2" onchange="load_img_name(this.files[0],3)"/>
                            <div id="filename3"><?php echo $slideImage_2?></div>
                        </div>

                        <div class="slideimg1">
                            <label for="sliderImage3">Slider Image 3:</label>
                            <input type="file" id="sliderImage3" name="newSliderImage3" onchange="load_img_name(this.files[0],4)"/>
                            <div id="filename4"><?php echo $slideImage_3?></div>
                        </div>

                        <div class="slideimg1">
                            <label for="sliderImage4">Slider Image 4:</label>
                            <input type="file" id="sliderImage4" name="newSliderImage4" onchange="load_img_name(this.files[0],5)"/>
                            <div id="filename5"><?php echo $slideImage_4?></div>
                        </div>

                    </div>

                </div>

            </div>

            <div class="navigation">

                <div>
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)"><span class="previous">Previous</span></button>
                        <button type="submit" id="nextBtn" name="update" onclick="nextPrev(1)"><span class="next">Next</span></button>
                    </div>
                </div>

                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>

            </div>

            <input type="hidden" name="gigId" value="<?php echo $gigId;?>">
            <input type="hidden" name="packageId1" value="<?php echo $gigDetails[0]["package_id"]?>">
            <input type="hidden" name="packageId2" value="<?php echo $gigDetails[1]["package_id"]?>">
            <input type="hidden" name="packageId3" value="<?php echo $gigDetails[2]["package_id"]?>">

            <input type="hidden" name="currentSliderImg1" value="<?php echo $slides["side_image_1"]?>">
            <input type="hidden" name="currentSliderImg2" value="<?php echo $slides["side_image_2"]?>">
            <input type="hidden" name="currentSliderImg3" value="<?php echo $slides["side_image_3"]?>">
            <input type="hidden" name="currentSliderImg4" value="<?php echo $slides["side_image_4"]?>">
            <input type="hidden" name="currentCoverImage" value="<?php echo $gigDetails["cover_image"]?>">

        </form>

    </div>

</div>

<script src="/skillsparq/public/assests/js/updateGig.script.js"></script>

<?php include "components/footer.component.php";?>