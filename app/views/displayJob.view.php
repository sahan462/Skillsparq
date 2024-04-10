<?php 
    if($_SESSION['role'] === "Seller"){
        include "components/sellerHeader.component.php"; 
    }else if($_SESSION['role'] === "Buyer"){
        include "components/buyerSimpleHeader.component.php"; 
    }
    
    // $job = $data['job'];
    // print_r($data);
    // show($data);
    $buyerId = $data['buyerDetails']['user_id'];
    if($_SESSION['role'] !== "Buyer"){
        $sellerId = $data['sellerDetails']['user_id'];
    }
    $jobId = $data['job']['job_id'];

    if($job['publish_mode'] === "Auction Mode"){
        $givenStartingBid = substr($job['starting_bid'],1);
        // echo $givenStartingBid;
    }
?>

    <div class="displayJobContainer">
        <div class="displayJobHeader">
            <?php echo $job['title']?>
        </div>
        <div class="displayJobContent">
            <div class="displayJobMajorDetails">
                <div class="displayJobMajorDetailsCategory">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                    </svg>
                    <?php echo $job['category']?>
                </div>
                <div class="displayJobCreatedTimeDetails">
                    Job Posted :
                    <?php echo $job['created_at']?>
                </div>
                <div class="displayJobMajorDetailsDescription">
                    <?php echo $job['description']?>
                </div>
                <div class="displayJobMajorDetailsDeadline">
                    Have to be done before : 
                    <?php echo $job['deadline']?>
                </div>
                <div class="displayJobMajorDetailsNegotiability">
                    <?php 
                        if($job['flexible_amount'] === "1"){
                            echo "Negotiable";
                        }else{
                            echo "Non - Negotiable";
                        }
                    ?>
                </div>
                <div class="displayJobMajorDetailsFile">
                    Download job File : 
                </div>

                <?php if($_SESSION['role'] === "Buyer"){?>
                    <div class="displayJobBidAuction">
                        <?php 
                            $_SESSION['jobId'] = $jobId;
                        ?>
                        <button class = "sendProposalButton">
                            <a class="proposalButtonLink" href="jobproposals">See Proposals</a>
                        </button>
                    </div>
                <?php }?>

                <?php if(($job['publish_mode'] === 'Auction Mode') && ($_SESSION['role'] !== "Buyer")){?>

                <div class="displayJobBidAuction">
                    <div class="auctionDetailHeader">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M318.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-120 120c-12.5 12.5-12.5 32.8 0 45.3l16 16c12.5 12.5 32.8 12.5 45.3 0l4-4L325.4 293.4l-4 4c-12.5 12.5-12.5 32.8 0 45.3l16 16c12.5 12.5 32.8 12.5 45.3 0l120-120c12.5-12.5 12.5-32.8 0-45.3l-16-16c-12.5-12.5-32.8-12.5-45.3 0l-4 4L330.6 74.6l4-4c12.5-12.5 12.5-32.8 0-45.3l-16-16zm-152 288c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3l48 48c12.5 12.5 32.8 12.5 45.3 0l112-112c12.5-12.5 12.5-32.8 0-45.3l-1.4-1.4L272 285.3 226.7 240 168 298.7l-1.4-1.4z"/></svg>
                        Auction Details
                    </div>
                    <div class="auctionDetails">
                        <div class="auctionDetailContent">
                            <div class="auctionStartTime">
                                Auction Start at : <?php echo $job['start_time']?>
                            </div>
                            <div class="auctionEndTime">
                                Auction End at : <?php echo $job['end_time']?>
                            </div>
                            <div class="auctionStartingBid">
                                Bid Starts from : $
                                <div id="startingbid">
                                    <?php echo $givenStartingBid?>
                                </div>
                            </div>
                            <div class="auctionCurrentMinBid">
                                Current Minimum Bid : <?php echo $job['min_bid_amount']?>
                            </div>
                            <div class="auctionCurrentMaxBid">
                                Current Maximum Bid : <?php echo $job['current_highest_bid']?>
                            </div>
                        </div>
                        <div class="auctionDetialsButton">
                            <button class = "sendProposalButton" onclick="openJobProposalModalAuc(this)">
                                <a class="proposalButtonLink" href="#">Send & Bid</a>
                            </button>
                        </div>
                    </div>
                </div>

                    <!-- Modal 1 -->
                    <div class="overlayDisplayJob" id="overlayDisplayJobAuc">
                        <div class="modalDisplayJob" id="modalIdDisplayJobAuc">
                            <div>
                                <h3 class="modalDisplayJobTopic">Proposal Form for the Auction</h3>
                            </div>
                            <form id="sendJobProposalAuc" method="post" action="jobProposals" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="full-name">
                                        <div class="row">
                                            Full Name : <?php echo $data['sellerDetails']['first_name']. " " .$data['sellerDetails']['last_name']?>
                                        </div>
                                    </div>
                                    <div class="descriptionJobProposal">
                                        <div class="topic">
                                            Write a description about what you're gonna offer to get this job.
                                        </div>
                                        <textarea name="descriptionJobProposal" id="descriptionJobProposalAuc" cols="30" rows="10" required></textarea>
                                    </div>
                                    <div class="attachmentJobProposal" id="attachmentJobProposal">
                                        <input name="attachment" type="file" id="inputFile" required>
                                    </div>
                                    <div class="bidAmount">
                                        <div class="text">
                                            Your Bidding Amount : 
                                        </div>
                                        <input type="number" id="bidValue" name="biddingAmnt" min="<?php echo $givenStartingBid?>" max="1000" required>
                                        <input type="hidden" value="<?php echo $sellerId?>" name="sellerId">
                                        <input type="hidden" value="<?php echo $buyerId?>" name="buyerId">
                                        <input type="hidden" value="<?php echo $jobId?>" name="jobId">
                                        <input type="hidden" value="Auction" name="mode">
                                    </div>
                                </div>
                                <div class="buttons">
                                    <button type="button" onclick="confirmActionAuc('cancel')">Cancel Submission</button>
                                    <button type="button" onclick="confirmActionAuc('send')">Send Proposal</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Modal 2 -->
                    <div class="overlayDisplayJob" id="cancelConfirmOverlayAuc">
                        <div class="confirmation" id="cancelConfirmAuc">
                            <p>Are you sure want to cancel?</p>
                            <div class="buttons">
                                <button onclick="handleConfirmAuc('cancelNo')">No</button>
                                <button onclick="handleConfirmAuc('cancelYes')">Yes</button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal 3 -->
                    <div class="overlayDisplayJob" id="sendConfirmaOverlayAuc">
                        <div class="confirmation" id="sendConfirmAuc">
                            <p>Are you sure want to continue?</p>
                            <div class="buttons">
                                <button onclick="handleConfirmAuc('sendNo')">No</button>
                                <button onclick="handleConfirmAuc('sendYes')">Yes</button>
                            </div>
                        </div>
                    </div>

                <?php 
                }else if(($job['publish_mode'] === 'Standard Mode') && ($_SESSION['role'] !== "Buyer")){
                ?>

                <div class="displayJobSendProposal">
                    <div class="displayJobSendProposalContainer">
                        <div class="displayJobSendProposalHeader">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4"><path d="M10.026 40.974v-22h-6v22z"/><path d="M10.026 18.974c7.123-6.52 11.251-10.26 12.384-11.222c1.7-1.443 3.62-.837 3.62 2.775s-5.285 5.695-5.285 8.447c-.004.016 6.756.017 20.277.003a3 3 0 0 1 3.004 2.998v.003a3.004 3.004 0 0 1-3.004 3.004h-8.01c-1.208 7.973-1.875 12.307-2 13.004c-.188 1.044-1.185 2.988-4.054 2.988H10.026z" clip-rule="evenodd"/></g></svg>
                            <?php echo "Send Job proposal"?>
                        </div>
                        <div class="displayJobSendProposalContent">
                            Apply for the Job by sending a job proposal to the customer at the first place !
                        </div>
                    </div>
                    <div class="displayJobSendProposalButton">
                        <button class = "sendProposalButton" onclick="openJobProposalModalStd(this)" id="sendProposalButton"> 
                        <a class="proposalButtonLink" href="#">Apply</a>
                        </button>
                    </div>
                </div> 

                    <!-- Modal 4 -->
                    <div class="overlayDisplayJob" id="overlayDisplayJobStd">
                        <div class="modalDisplayJob" id="modalIdDisplayJobStd">
                            <div>
                                <h3 class="modalDisplayJobTopic">Proposal Form for the Job</h3>
                            </div>

                            <form id="sendJobProposalStd" method="post" action="jobProposals" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="full-name">
                                        <div class="row">
                                            Full Name : <?php echo $data['sellerDetails']['first_name']. " " .$data['sellerDetails']['last_name']?>
                                        </div>
                                    </div>
                                    <div class="descriptionJobProposal">
                                        <div class="topic">
                                            Write a description about what you're gonna offer to get this job.
                                        </div>
                                        <textarea name="descriptionJobProposal" id="descriptionJobProposalStd" cols="30" rows="10" required></textarea>
                                    </div>
                                    <div class="attachmentJobProposal" id="attachmentJobProposal">
                                            <input name="attachment" type="file" id="inputFileStd" required>
                                    </div>
                                    <div class="bidAmount">
                                        <input type="hidden" value="<?php echo $sellerId?>" name="sellerId">
                                        <input type="hidden" value="Standard" name="mode">
                                        <input type="hidden" value="<?php echo $buyerId?>" name="buyerId">
                                        <input type="hidden" value="<?php echo $jobId?>" name="jobId">
                                    </div>
                                </div>
                                <div class="buttons">
                                    <button type="button" onclick="confirmActionStd('cancel')">Cancel Submission</button>
                                    <button type="button" onclick="confirmActionStd('send')">Send Proposal</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Modal 5 -->
                    <div class="overlayDisplayJob" id="cancelConfirmOverlayStd">
                        <div class="confirmation" id="cancelConfirmStd">
                            <p>Are you sure want to cancel?</p>
                            <div class="buttons">
                                <button onclick="handleConfirmStd('cancelNo')">No</button>
                                <button onclick="handleConfirmStd('cancelYes')">Yes</button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal 6 -->
                    <div class="overlayDisplayJob" id="sendConfirmOverlayStd">
                        <div class="confirmation" id="sendConfirmStd">
                            <p>Are you sure want to continue?</p>
                            <div class="buttons">
                                <button onclick="handleConfirmStd('sendNo')">No</button>
                                <button onclick="handleConfirmStd('sendYes')">Yes</button>
                            </div>
                        </div>
                    </div>

            <?php }?>
            </div>
            <div class="jobViewBuyerDetailsSideBar">
                <div class="jobViewBuyerDetialsAbout">
                    <div class="jobViewBuyerDetailsHeader">
                        About The Client
                    </div>
                <div class="jobViewBuyerDetialsVerification">
                    <div class="paymentVerify">
                        <div class="VerificationIcon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 48 48" class="verify"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M42.013 12.257a21.53 21.53 0 1 1-1.676-2.234"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M34.699 19.775a11.513 11.513 0 1 1-1.473-2.641"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M40.336 10.024L24 26.36l-4.72-4.72"/></svg>
                        </div>
                        <strong class="verifyContent">
                            payment method verified
                        </strong>
                    </div>
                    <div class="phoneNumberVerify">
                        <div class="VerificationIcon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 48 48" class="verify"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M42.013 12.257a21.53 21.53 0 1 1-1.676-2.234"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M34.699 19.775a11.513 11.513 0 1 1-1.473-2.641"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M40.336 10.024L24 26.36l-4.72-4.72"/>
                            </svg>
                        </div>
                        <strong class="verifyContent">
                            Email verified
                        </strong>
                    </div>
                </div>
                <div class="jobViewBuyerDetialsRatings">
                    <div class="jobViewBuyerRatings">
                        Ratings
                        <div class="jobViewBuyerRatingStars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <div class="numeric-rating">(4.3)</div>
                    </div>
                </div>
                <div>
                    <ul class="jobViewBuyerDetialsUnOrList">
                        <li class="jobViewBuyerDetailsListItems">Country
                            <div>
                                <?php
                                    if(isset($data['buyerDetails']['country'])){
                                        echo $data['buyerDetails']['country'];
                                    }else{
                                        echo "-";
                                    }
                                ?>
                            </div>
                        </li>
                        <li class="jobViewBuyerDetailsListItems">
                            Posted Total Job Count <?php echo $data['jobCount']?>
                        </li>
                        <li class="jobViewBuyerDetailsListItems">
                            Total Spendings : 
                        </li>
                        <li class="jobViewBuyerDetailsListItems">
                            Average Hours Per Rate Paid : 
                        </li>
                        <li class="jobViewBuyerDetailsListItems">
                            Member Since : <?php echo $data['buyerDetails']['joined_date']?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
    
<script src="./assests/js/displayJob.script.js"></script>

<?php include "/xampp/htdocs/skillsparq/app/views/components/footer.component.php";?>