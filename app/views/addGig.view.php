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
        <form id="regForm" method="post" enctype="multipart/form-data" action="<?php echo BASEURL.'Gig/publishGig';?>" autocomplete="off">
            <!-- One "tab" for each step in the form: -->

            <div class="addGigContent">

                <!-- tab 1 -->
                <div class="tab">

                    <span class="type-1">Title</span>
                    <span class="type-2">The most crucial area to put keywords that customers are likely to use when looking for a service similar to yours is in the title of your gig shop.</span>
                    
                    <div class="title">
                        <p><input type="text" name="title" placeholder="I will create WordPress websites" oninput="this.className = ''"></p>
                    </div>

                    <div class="description">
                        <span class="type-1"> Description</span>
                        <span class="type-2">Describe your gig and service you provide</span>
                        <textarea name="description"  rows="10" spellcheck="false" oninput="this.className = ''"  value="chamal" style="height: 300px"></textarea>
                    </div>

                    <div class="category" style="margin-top: 16px">
                        <span class="type-1">Which category best fits your project?</span>
                        <span class="type-2">Choose from the list</span>
                        <select name="category" class="categories">
                            <option value="Graphics & Design">Graphics & Design</option>
                            <option value="Programming & Tech">Programming & Tech</option>
                            <option value="Digital Marketing">Digital Marketing</option>
                            <option value="Video & Animation">Video & Animation</option>
                            <option value="Writing & Translation">Writing & Translation</option>
                            <option value="Music & Audio">Music & Audio</option>
                            <option value="Business">Business</option>
                            <option value="Data">Data</option>
                            <option value="Photography">Photography</option>
                            <option value="AI Services">AI Services</option>
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
                                    <input type="text" name ="packageName_1" oninput="this.className = ''"  >
                                </td>
                                <td>
                                    <input type="text" name ="packageName_2" oninput="this.className = ''"  >
                                </td>
                                <td>
                                    <input type="text" name ="packageName_3" oninput="this.className = ''" >
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left">Package Price</td>
                                <td>
                                    <input type="number" name ="packagePrice_1" oninput="this.className = ''" min="5" max="1000" >
                                </td>
                                <td>
                                    <input type="number" name ="packagePrice_2" oninput="this.className = ''" min="5" max="1000" >
                                </td>
                                <td>
                                    <input type="number" name ="packagePrice_3" oninput="this.className = ''" min="5" max="1000" >
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left">Revision Count</td>
                                <td>
                                    <div class="noOfRevisions">
                                        <select style="width:100%" name="noOfRevisions_1"  class="categories">
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
                                </td>
                                <td>
                                    <div class="noOfRevisions">
                                        <select style="width:100%" name="noOfRevisions_2"  class="categories">
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
                                </td>
                                <td>
                                    <div class="noOfRevisions">
                                        <select style="width:100%" name="noOfRevisions_3"  class="categories">
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
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left">Delivery Time</td>
                                <td>
                                    <div class="noOfDeliveryDays" style="display:flex; justify-content:space-between;">
                                        <input type="number" name="noOfDeliveryDays_1" oninput="this.className = ''" id="quantity"  min="1" max="5">
                                        <select name="timePeriod_1" class="categories" >
                                            <option value="Days">Day(s)</option>
                                            <option value="Weeks">Week(s)</option>
                                            <option value="Months">Month(s)</option>
                                            <option value="Years">Year(s)</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="noOfDeliveryDays" style="display:flex; justify-content:space-between;">
                                        <input type="number" style="width:50%" name="noOfDeliveryDays_2" oninput="this.className = ''" id="quantity"  min="1" max="5">
                                        <select style="width:50%" name="timePeriod_2" class="categories" >
                                            <option value="Days">Day(s)</option>
                                            <option value="Weeks">Week(s)</option>
                                            <option value="Months">Month(s)</option>
                                            <option value="Years">Year(s)</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="noOfDeliveryDays" style="display:flex; justify-content:space-between;">
                                        <input type="number" name="noOfDeliveryDays_3" oninput="this.className = ''" id="quantity"  min="1" max="5">
                                        <select name="timePeriod_3" class="categories" >
                                            <option value="Days">Day(s)</option>
                                            <option value="Weeks">Week(s)</option>
                                            <option value="Months">Month(s)</option>
                                            <option value="Years">Year(s)</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left">Description</td>
                                <td>
                                <div class="packageDescription">
                                    <textarea name="packageDescription_1" placeholder="I will.." rows="6" spellcheck="false" oninput="this.className = ''"></textarea>
                                </div>
                                </td>
                                <td>
                                <div class="packageDescription">
                                    <textarea name="packageDescription_2" placeholder="I will.." rows="6" spellcheck="false" oninput="this.className = ''"></textarea>
                                </div>
                                </td>
                                <td>
                                <div class="packageDescription">
                                    <textarea name="packageDescription_3" placeholder="I will.." rows="6" spellcheck="false" oninput="this.className = ''"></textarea>
                                </div>
                                </td>
                            </tr>
                        </table>

                    </div>

                </div>

                <div class="tab">

                    <span class="type-1">Upload Images</span>
                    <span class="type-2">add cover image and other slider images</span>

                    <div class="images">

                        </table>

                        <div class="slideimg1" style="display:flex; gap: 32px; align-items:center;">
                            <label for="coverImage">Cover Image:</label>
                            <input type="file" id="coverImage" name="coverImage" onchange="load_img_name(this.files[0],1)"/>
                            <div id="filename1"></div>
                        </div>

                        <div class="slideimg1" style="display:flex; gap: 32px; align-items:center;">
                            <label for="sliderImage1">Slider Image 1:</label>
                            <input type="file" id="sliderImage1" name="sliderImage1" onchange="load_img_name(this.files[0],2)"/>
                            <div id="filename2"></div>
                        </div>
 
                        <div class="slideimg1" style="display:flex; gap: 32px; align-items:center;">
                            <label for="sliderImage2">Slider Image 2:</label>
                            <input type="file" id="sliderImage2" name="sliderImage2" onchange="load_img_name(this.files[0],3)"/>
                            <div id="filename3"></div>
                        </div>

                        <div class="slideimg1" style="display:flex; gap: 32px; align-items:center;">
                            <label for="sliderImage3">Slider Image 3:</label>
                            <input type="file" id="sliderImage3" name="sliderImage3" onchange="load_img_name(this.files[0],4)"/>
                            <div id="filename4"></div>
                        </div>

                        <div class="slideimg1" style="display:flex; gap: 32px; align-items:center;">
                            <label for="sliderImage4">Slider Image 4:</label>
                            <input type="file" id="sliderImage4" name="sliderImage4" onchange="load_img_name(this.files[0],5)"/>
                            <div id="filename5"></div>
                        </div>

                    </div>

                </div>
                
            </div>

            <div class="navigation">
                <div>
                    <div style="float:right;">
                        <input type="hidden" name="btnSubmit" value="submit">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)"><span class="previous">Previous</span></button>
                        <button type="button" id="nextBtn" name = "btnSubmit" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>

                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>

            </div>

        </form>
    </div>
</div>

<script src="/skillsparq/public/assests/js/addGig.script.js"></script>

<?php include "components/footer.component.php";?>