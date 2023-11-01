<?php
$errors = $data["errors"];
?>
<?php include "components/sellerHeader.component.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GigPage</title>
    <link rel="stylesheet" href="./assests/css/addGig.styles.css">
</head>

<body>
    <div class="headTopic">
        <h1>Create new Gig</h1>
    </div>

    <div class="Add-Gig-container">
        <div class="form">
            <form method="post" id="regForm" action="<?php echo BASEURL . 'Gig/CreateGig'; ?>">
                <div class="tab">
                    <div class="bar">
                        <div class="innerbar">
                            <span class="type-1">(1) Gig Title<br /></span>
                            <span class="type-2">Give your Gig a brief title!<br /></span>
                            <span class="type-2">Keep it short and simple<br /></span>
                        </div>
                        <div class="innerbar">
                            <input type="text" name="title" placeholder="I will do flyer designing!" />
                        </div>
                    </div>
                    <div class="bar">
                        <div class="innerbar">
                            <span class="type-1">(2) Category <br /></span>
                            <span class="type-2">Which category best fits your Gig?<br /></span>
                            <span class="type-2">Choose from list<br /></span>
                        </div>
                        <div class="innerbar">
                            <select name="category" class="categories">
                                <option value="Choose Option">Choose Option</option>
                                <option value="Graphics & Design">Graphics & Design</option>
                                <option value="Programming & Tech">Programming & Tech</option>
                                <option value="Digital Marketing">Digital Marketing</option>
                                <option value="Video & Animation">Video & Animation</option>
                                <option value="Writing & Translation">
                                    Writing & Translation
                                </option>
                                <option value="Music & Audio">Music & Audio</option>
                                <option value="Business">Business</option>
                                <option value="Data">Data</option>
                                <option value="Photography">Photography</option>
                                <option value="AI Services">AI Services</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- One "tab" for each step in the form: -->
                <div class="tab">
                    <div class="innerbar">
                        <h1>Scope and Pricing</h1>
                    </div>
                    <div class="bar1">
                        <div class="innerbar">
                            <h3>Packages</h3>
                        </div>
                    </div>
                    <div class="bar1">
                        <!-- <div class="innerbar1">
                <div class="bigrow1">revision</div>
                <div class="bigrow2">price</div>
              </div> -->
                        <div class="innerbar1">
                            <div class="row1">BASIC</div>
                            <div class="row2">
                                <input type="text" name="BasicPkgName" placeholder="Name your package" />
                            </div>
                            <div class="row3">
                                <input type="text" name="BasicOffDets" placeholder="Describe the details of your offering" />
                            </div>
                            <div class="row4">
                                <select name="BasicDelDays" class="categories2">
                                    <option value="Choose Option">Delivery Time</option>
                                    <option value="1d">1 DAY DELIVERY</option>
                                    <option value="2d">2 DAYS DELIVERY</option>
                                    <option value="3d">3 DAYS DELIVERY</option>
                                    <option value="4d">4 DAYS DELIVERY</option>
                                    <option value="5d">5 DAYS DELIVERY</option>
                                    <option value="6d">6 DAYS DELIVERY</option>
                                    <option value="7d">7 DAYS DELIVERY</option>
                                    <option value="10d">10 DAYS DELIVERY</option>
                                    <option value="14d">14 DAYS DELIVERY</option>
                                    <option value="21d">21 DAYS DELIVERY</option>
                                    <option value="30d">30 DAYS DELIVERY</option>
                                    <option value="45d">45 DAYS DELIVERY</option>
                                    <option value="60d">60 DAYS DELIVERY</option>
                                    <option value="75d">75 DAYS DELIVERY</option>
                                    <option value="90d">90 DAYS DELIVERY</option>
                                </select>
                            </div>
                            <div class="row5">
                                <select name="BasicRevNum" class="categories2">
                                    <option value="Revisions">No. of Revisions</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="UNLIMITED">UNLIMITED</option>
                                </select>
                            </div>
                            <div class="row6">
                                <input type="text" name="BasicPrice" placeholder="Price in $" />
                            </div>
                        </div>
                        <div class="innerbar1">
                            <div class="row1">STANDARD</div>
                            <div class="row2">
                                <input type="text" name="StandardPkgName" placeholder="Name your package" />
                            </div>
                            <div class="row3">
                                <input type="text" name="StandardOffDets" placeholder="Describe the details of your offering" />
                            </div>
                            <div class="row4">
                                <select name="StandardDelDays" class="categories2">
                                    <option value="Choose Option">Delivery Time</option>
                                    <option value="1d">1 DAY DELIVERY</option>
                                    <option value="2d">2 DAYS DELIVERY</option>
                                    <option value="3d">3 DAYS DELIVERY</option>
                                    <option value="4d">4 DAYS DELIVERY</option>
                                    <option value="5d">5 DAYS DELIVERY</option>
                                    <option value="6d">6 DAYS DELIVERY</option>
                                    <option value="7d">7 DAYS DELIVERY</option>
                                    <option value="10d">10 DAYS DELIVERY</option>
                                    <option value="14d">14 DAYS DELIVERY</option>
                                    <option value="21d">21 DAYS DELIVERY</option>
                                    <option value="30d">30 DAYS DELIVERY</option>
                                    <option value="45d">45 DAYS DELIVERY</option>
                                    <option value="60d">60 DAYS DELIVERY</option>
                                    <option value="75d">75 DAYS DELIVERY</option>
                                    <option value="90d">90 DAYS DELIVERY</option>
                                </select>
                            </div>
                            <div class="row5">
                                <select name="StandardRevNum" class="categories2">
                                    <option value="Revisions">No. of Revisions</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="UNLIMITED">UNLIMITED</option>
                                </select>
                            </div>
                            <div class="row6">
                                <input type="text" name="StandardPrice" placeholder="Price in $" />
                            </div>
                        </div>
                        <div class="innerbar1">
                            <div class="row1">PREMIUM</div>
                            <div class="row2">
                                <input type="text" name="PremiumPkgName" placeholder="Name your package" />
                            </div>
                            <div class="row3">
                                <input type="text" name="PremiumOffDets" placeholder="Describe the details of your offering" />
                            </div>
                            <div class="row4">
                                <select name="PremiumDelDays" class="categories2">
                                    <option value="Choose Option">Delivery Time</option>
                                    <option value="1d">1 DAY DELIVERY</option>
                                    <option value="2d">2 DAYS DELIVERY</option>
                                    <option value="3d">3 DAYS DELIVERY</option>
                                    <option value="4d">4 DAYS DELIVERY</option>
                                    <option value="5d">5 DAYS DELIVERY</option>
                                    <option value="6d">6 DAYS DELIVERY</option>
                                    <option value="7d">7 DAYS DELIVERY</option>
                                    <option value="10d">10 DAYS DELIVERY</option>
                                    <option value="14d">14 DAYS DELIVERY</option>
                                    <option value="21d">21 DAYS DELIVERY</option>
                                    <option value="30d">30 DAYS DELIVERY</option>
                                    <option value="45d">45 DAYS DELIVERY</option>
                                    <option value="60d">60 DAYS DELIVERY</option>
                                    <option value="75d">75 DAYS DELIVERY</option>
                                    <option value="90d">90 DAYS DELIVERY</option>
                                </select>
                            </div>
                            <div class="row5">
                                <select name="PremiumRevNum" class="categories2">
                                    <option value="Revisions">No. of Revisions</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="UNLIMITED">UNLIMITED</option>
                                </select>
                            </div>
                            <div class="row6">
                                <input type="text" name="PremiumPrice" placeholder="Price in $" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab">
                    <div class="description-wrapper">
                        <header class="description-header">
                            <h2>Description</h2>
                            <p>Briefly Describe you Gig</p>
                        </header>
                        <div class="description-editor">
                            <div class="toolbar">
                                <button class="bold" type="button">B</button>
                                <button class="italic" type="button">I</button>
                                <button class="highlight-text" type="button">H</button>
                                <button class="list" value="ordered">O</button>
                                <button class="list" value="bullet">0</button>
                            </div>
                        </div>
                        <p>
                            <input placeholder="Description" name="GigDescription" oninput="this.className = ''" />
                        </p>
                        <div class="description-count">0/1200 Characters</div>
                    </div>
                </div>

                <!-- <div class="tab">
                    Login Info:
                    <p>
                        <input placeholder="Username..." oninput="this.className = ''" />
                    </p>
                    <p>
                        <input placeholder="Password..." oninput="this.className = ''" />
                    </p>
                </div> -->

                <div style="overflow: auto">
                    <div style="float: right">
                        <button type="button" class="btn" id="prevBtn" onclick="nextPrev(-1)">
                            Previous
                        </button>
                        <button type="button" class="btn" id="nextBtn" onclick="nextPrev(1)">
                            Next
                        </button>
                    </div>
                </div>

                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align: center; margin-top: 40px">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <!-- <span class="step"></span> -->
                </div>
            </form>


        </div>
    </div>
    <script src="./assests/js/addGig.script.js"></script>
</body>

</html>
<?php

// $this->redirect("./GigSuccess.view.php"); 
?>