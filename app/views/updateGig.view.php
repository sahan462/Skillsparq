<?php include "components/sellerHeader.component.php";?>

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

                        <p><input type="text" name="title" placeholder="I will create WordPress websites" value="<?php echo $data['GIG']['gigDetails']['title'];?>" oninput="this.className = ''"></p>

                    </div>

                    <div class="description">

                        <span class="type-1"> Description</span>
                        <span class="type-2">Describe your gig and service you provide</span>
                        <textarea name="description"  rows="16" spellcheck="false" oninput="this.className = ''" style="height: 300px"><?php echo $data['GIG']['gigDetails']['description'];?></textarea>
                        
                    </div>

                    <div class="category" style="margin-top: 16px">

                        <span class="type-1">Which category best fits your project?</span>
                        <span class="type-2">Choose from the list</span>

                        <select name="category" class="categories">

                            <option value="Graphics & Design" <?php echo ($data['GIG']['gigDetails']['category'] === 'Graphics & Design') ? 'selected' : '';?>>Graphics & Design</option>
                            <option value="Programming & Tech" <?php echo ($data['GIG']['gigDetails']['category'] === 'Programming & Tech') ? 'selected' : '';?>>Programming & Tech</option>
                            <option value="Digital Marketing" <?php echo ($data['GIG']['gigDetails']['category'] === 'Digital Marketing') ? 'selected' : '';?>>Digital Marketing</option>
                            <option value="Video & Animation" <?php echo ($data['GIG']['gigDetails']['category'] === 'Video & Animation') ? 'selected' : '';?>>Video & Animation</option>
                            <option value="Writing & Translation" <?php echo ($data['GIG']['gigDetails']['category'] === 'Writing & Translation') ? 'selected' : '';?>>Writing & Translation</option>
                            <option value="Music & Audio" <?php echo ($data['GIG']['gigDetails']['category'] === 'Music & Audio') ? 'selected' : '';?>>Music & Audio</option>
                            <option value="Business" <?php echo ($data['GIG']['gigDetails']['category'] === 'Business') ? 'selected' : '';?>>Business</option>
                            <option value="Data" <?php echo ($data['GIG']['gigDetails']['category'] === 'Data') ? 'selected' : '';?>>Data</option>
                            <option value="Photography" <?php echo ($data['GIG']['gigDetails']['category'] === 'Photography') ? 'selected' : '';?>>Photography</option>
                            <option value="AI Services" <?php echo ($data['GIG']['gigDetails']['category'] === 'AI Services') ? 'selected' : '';?>>AI Services</option>

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
                                    <input type="text" name ="packageName_1" oninput="this.className = ''" value="<?php 
                                            if(isset($data['GIG']['packageDetails'][0]['package_name'])){
                                                echo $data['GIG']['packageDetails'][0]['package_name'];
                                            }else{
                                                echo "";
                                            }
                                        
                                    ?>">
                                </td>
                                <td>
                                    <input type="text" name ="packageName_2" oninput="this.className = ''" value='<?php 
                                            if(isset($data['GIG']['packageDetails'][1]['package_name'])){
                                                echo $data['GIG']['packageDetails'][1]['package_name'];
                                            }else{
                                                echo "";
                                            }
                                    ?>'>
                                </td>
                                <td>
                                    <input type="text" name ="packageName_3" oninput="this.className = ''" value="<?php
                                            if(isset($data['GIG']['packageDetails'][2]['package_name'])){
                                                echo $data['GIG']['packageDetails'][2]['package_name'];
                                            }else{
                                                echo "";
                                            }
                                    ?>">
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left">Package Price</td>
                                <td>
                                    <input type="number" name ="packagePrice_1" oninput="this.className = ''" min="5" max="1000" value='<?php echo $data['GIG']['packageDetails'][0]['package_price'];?>'>
                                </td>
                                <td>
                                    <input type="number" name ="packagePrice_2" oninput="this.className = ''" min="5" max="1000" value='<?php echo $data['GIG']['packageDetails'][1]['package_price'];?>'>
                                </td>
                                <td>
                                    <input type="number" name ="packagePrice_3" oninput="this.className = ''" min="5" max="1000" value='<?php echo $data['GIG']['packageDetails'][2]['package_price'];?>'>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left">Revision Count</td>
                                <td>
                                    <div class="noOfRevisions">
                                        <select style="width:100%" name="noOfRevisions_1"  class="categories">
                                            <option value="1"<?php echo ($data['GIG']['packageDetails'][0]['no_of_revisions'] === '1') ? 'selected' : '';?>>1</option>
                                            <option value="2"<?php echo ($data['GIG']['packageDetails'][0]['no_of_revisions'] === '2') ? 'selected' : '';?>>2</option>
                                            <option value="3"<?php echo ($data['GIG']['packageDetails'][0]['no_of_revisions'] === '3') ? 'selected' : '';?>>3</option>
                                            <option value="4"<?php echo ($data['GIG']['packageDetails'][0]['no_of_revisions'] === '4') ? 'selected' : '';?>>4</option>
                                            <option value="5"<?php echo ($data['GIG']['packageDetails'][0]['no_of_revisions'] === '5') ? 'selected' : '';?>>5</option>
                                            <option value="6"<?php echo ($data['GIG']['packageDetails'][0]['no_of_revisions'] === '6') ? 'selected' : '';?>>6</option>
                                            <option value="7"<?php echo ($data['GIG']['packageDetails'][0]['no_of_revisions'] === '7') ? 'selected' : '';?>>7</option>
                                            <option value="Unlimited"<?php echo ($data['GIG']['packageDetails'][0]['no_of_revisions'] === 'Unlimited') ? 'selected' : '';?>>Unlimited</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="noOfRevisions">
                                        <select style="width:100%" name="noOfRevisions_2"  class="categories">
                                            <option value="1"<?php echo ($data['GIG']['packageDetails'][1]['no_of_revisions'] === '1') ? 'selected' : '';?>>1</option>
                                            <option value="2"<?php echo ($data['GIG']['packageDetails'][1]['no_of_revisions'] === '2') ? 'selected' : '';?>>2</option>
                                            <option value="3"<?php echo ($data['GIG']['packageDetails'][1]['no_of_revisions'] === '3') ? 'selected' : '';?>>3</option>
                                            <option value="4"<?php echo ($data['GIG']['packageDetails'][1]['no_of_revisions'] === '4') ? 'selected' : '';?>>4</option>
                                            <option value="5"<?php echo ($data['GIG']['packageDetails'][1]['no_of_revisions'] === '5') ? 'selected' : '';?>>5</option>
                                            <option value="6"<?php echo ($data['GIG']['packageDetails'][1]['no_of_revisions'] === '6') ? 'selected' : '';?>>6</option>
                                            <option value="7"<?php echo ($data['GIG']['packageDetails'][1]['no_of_revisions'] === '7') ? 'selected' : '';?>>7</option>
                                            <option value="Unlimited"<?php echo ($data['GIG']['packageDetails'][1]['no_of_revisions'] === 'Unlimited') ? 'selected' : '';?>>Unlimited</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="noOfRevisions">
                                        <select style="width:100%" name="noOfRevisions_3"  class="categories">
                                            <option value="1"<?php echo ($data['GIG']['packageDetails'][2]['no_of_revisions'] === '1') ? 'selected' : '';?>>1</option>
                                            <option value="2"<?php echo ($data['GIG']['packageDetails'][2]['no_of_revisions'] === '2') ? 'selected' : '';?>>2</option>
                                            <option value="3"<?php echo ($data['GIG']['packageDetails'][2]['no_of_revisions'] === '3') ? 'selected' : '';?>>3</option>
                                            <option value="4"<?php echo ($data['GIG']['packageDetails'][2]['no_of_revisions'] === '4') ? 'selected' : '';?>>4</option>
                                            <option value="5"<?php echo ($data['GIG']['packageDetails'][2]['no_of_revisions'] === '5') ? 'selected' : '';?>>5</option>
                                            <option value="6"<?php echo ($data['GIG']['packageDetails'][2]['no_of_revisions'] === '6') ? 'selected' : '';?>>6</option>
                                            <option value="7"<?php echo ($data['GIG']['packageDetails'][2]['no_of_revisions'] === '7') ? 'selected' : '';?>>7</option>
                                            <option value="Unlimited"<?php echo ($data['GIG']['packageDetails'][2]['no_of_revisions'] === 'Unlimited') ? 'selected' : '';?>>Unlimited</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left">Delivery Time</td>
                                <td>
                                    <div class="noOfDeliveryDays" style="display:flex; justify-content:space-between;">
                                        <input type="number" name="noOfDeliveryDays_1" oninput="this.className = ''" id="quantity"  min="1" max="5" value='<?php echo $data['GIG']['packageDetails'][0]['no_of_delivery_days']?>'>
                                        <select name="timePeriod_1" class="categories" >
                                            <option value="Days"<?php echo ($data['GIG']['packageDetails'][0]['time_period'] === "Days") ? 'selected' : '';?>>Day(s)</option>
                                            <option value="Weeks"<?php echo ($data['GIG']['packageDetails'][0]['time_period'] === "Weeks") ? 'selected' : '';?>>Week(s)</option>
                                            <option value="Months"<?php echo ($data['GIG']['packageDetails'][0]['time_period'] === "Months") ? 'selected' : '';?>>Month(s)</option>
                                            <option value="Years"<?php echo ($data['GIG']['packageDetails'][0]['time_period'] === "Years") ? 'selected' : '';?>>Year(s)</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="noOfDeliveryDays" style="display:flex; justify-content:space-between;">
                                        <input type="number" style="width:50%" name="noOfDeliveryDays_2" oninput="this.className = ''" id="quantity"  min="1" max="5" value='<?php echo $data['GIG']['packageDetails'][1]['no_of_delivery_days']?>'>
                                        <select style="width:50%" name="timePeriod_2" class="categories" >
                                            <option value="Days"<?php echo ($data['GIG']['packageDetails'][1]['time_period'] === "Days") ? 'selected' : '';?>>Day(s)</option>
                                            <option value="Weeks"<?php echo ($data['GIG']['packageDetails'][1]['time_period'] === "Weeks") ? 'selected' : '';?>>Week(s)</option>
                                            <option value="Months"<?php echo ($data['GIG']['packageDetails'][1]['time_period'] === "Months") ? 'selected' : '';?>>Month(s)</option>
                                            <option value="Years"<?php echo ($data['GIG']['packageDetails'][1]['time_period'] === "Years") ? 'selected' : '';?>>Year(s)</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="noOfDeliveryDays" style="display:flex; justify-content:space-between;">
                                        <input type="number" name="noOfDeliveryDays_3" oninput="this.className = ''" id="quantity"  min="1" max="5" value='<?php echo $data['GIG']['packageDetails'][2]['no_of_delivery_days']?>'>
                                        <select name="timePeriod_3" class="categories" >
                                            <option value="Days"<?php echo ($data['GIG']['packageDetails'][2]['time_period'] === "Days") ? 'selected' : '';?>>Day(s)</option>
                                            <option value="Weeks"<?php echo ($data['GIG']['packageDetails'][2]['time_period'] === "Weeks") ? 'selected' : '';?>>Week(s)</option>
                                            <option value="Months"<?php echo ($data['GIG']['packageDetails'][2]['time_period'] === "Months") ? 'selected' : '';?>>Month(s)</option>
                                            <option value="Years"<?php echo ($data['GIG']['packageDetails'][2]['time_period'] === "Years") ? 'selected' : '';?>>Year(s)</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left">Description</td>
                                <td>
                                <div class="packageDescription">
                                    <textarea name="packageDescription_1" placeholder="I will.." rows="6" spellcheck="false" oninput="this.className = ''"><?php 
                                            if(isset($data['GIG']['packageDetails'][0]['package_description'])){
                                                echo $data['GIG']['packageDetails'][0]['package_description'];
                                            }else{
                                                echo "";
                                            }
                                        ?>
                                    </textarea>
                                </div>
                                </td>
                                <td>
                                <div class="packageDescription">
                                    <textarea name="packageDescription_2" placeholder="I will.." rows="6" spellcheck="false" oninput="this.className = ''"><?php 
                                            if(isset($data['GIG']['packageDetails'][1]['package_description'])){
                                                echo $data['GIG']['packageDetails'][1]['package_description'];
                                            }else{
                                                echo "";
                                            }
                                        ?>
                                    </textarea>
                                </div>
                                </td>
                                <td>
                                <div class="packageDescription">
                                    <textarea name="packageDescription_3" placeholder="I will.." rows="6" spellcheck="false" oninput="this.className = ''"><?php 
                                        if(isset($data['GIG']['packageDetails'][2]['package_description'])){
                                            echo $data['GIG']['packageDetails'][2]['package_description'];
                                        }else{
                                            echo "";
                                        }
                                    ?>
                                    </textarea>
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
                            <div id="filename1"><?php echo $data['GIG']['gigDetails']['cover_image']?></div>
                        </div>

                        <div class="slideimg1">
                            <label for="sliderImage1">Slider Image 1:</label>
                            <input type="file" id="sliderImage1" name="newSliderImage1"  onchange="load_img_name(this.files[0],2)"/>
                            <div id="filename2">
                                <?php 
                                    if(isset($data["slideImages"]['side_image_1'])){
                                        echo $data["slideImages"]['side_image_1'];
                                    }else{
                                        echo "You have not set Slide Image 1 Yet !";
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="slideimg1">
                            <label for="sliderImage2">Slider Image 2:</label>
                            <input type="file" id="sliderImage2" name="newSliderImage2" onchange="load_img_name(this.files[0],3)"/>
                            <div id="filename3">
                                <?php 
                                    if(isset($data["slideImages"]['side_image_2'])){
                                        echo $data["slideImages"]['side_image_2'];
                                    }else{
                                        echo "You have not set Slide Image 2 Yet !";
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="slideimg1">
                            <label for="sliderImage3">Slider Image 3:</label>
                            <input type="file" id="sliderImage3" name="newSliderImage3" onchange="load_img_name(this.files[0],4)"/>
                            <div id="filename4">
                                <?php 
                                    if(isset($data["slideImages"]['side_image_3'])){
                                        echo $data["slideImages"]['side_image_3'];
                                    }else{
                                        echo "You have not set Slide Image 3 Yet !";
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="slideimg1">
                            <label for="sliderImage4">Slider Image 4:</label>
                            <input type="file" id="sliderImage4" name="newSliderImage4" onchange="load_img_name(this.files[0],5)"/>
                            <div id="filename5">
                                <?php 
                                    if(isset($data["slideImages"]['side_image_4'])){
                                        echo $data["slideImages"]['side_image_4'];
                                    }else{
                                        echo "You have not set Slide Image 4 Yet !";
                                    }
                                    
                                ?>
                            </div>
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

            <input type="hidden" name="gigId" value="<?php echo $data['GIG']['gigDetails']['gig_id'];?>">
            <input type="hidden" name="packageId1" value="<?php echo $data['GIG']['packageDetails'][0]['package_id'];?>">
            <input type="hidden" name="packageId2" value="<?php echo $data['GIG']['packageDetails'][1]['package_id'];?>">
            <input type="hidden" name="packageId3" value="<?php echo $data['GIG']['packageDetails'][2]['package_id'];?>">

            <input type="hidden" name="currentSliderImg1" value="<?php echo $slides["side_image_1"]?>">
            <input type="hidden" name="currentSliderImg2" value="<?php echo $slides["side_image_2"]?>">
            <input type="hidden" name="currentSliderImg3" value="<?php echo $slides["side_image_3"]?>">
            <input type="hidden" name="currentSliderImg4" value="<?php echo $slides["side_image_4"]?>">
            <input type="hidden" name="currentCoverImage" value="<?php echo $data['GIG']['gigDetails']["cover_image"]?>">

        </form>

    </div>

</div>

<script src="/skillsparq/public/assests/js/updateGig.script.js"></script>

<?php include "components/footer.component.php";?>