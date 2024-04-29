<?php
    include "components/buyerSimpleHeader.component.php";
    if(isset($data['proposal$SellerDets'])){
        $propCardDets = $data['proposal&SellerDets'];
    }else{
        $propCardDets = '';
    }

    if(isset($data['jobDets'])){
        $jobDetails = $data['jobDets'];
    }else{
        
    }
    
    
?>

<div class="jobPropMainContainer">
    <div class="jobPropHeader">Proposals</div>
    <div class="jobPropSubContainer">
        <div class="propSubLeftCont">
            <div class="animationImg">
                <!-- Animation Player -->
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="https://lottie.host/72c07510-6f6b-459d-a4ca-bcb88a2d9abe/NCWzpCw5kh.json" background="transparent" speed="1" style="width: 300px; height: 300px" direction="1" mode="normal" loop autoplay></lottie-player>
            </div>
        </div>
        <div class="propSubRightCont">
            <div class="jobPropCardContainer">
                <?php
                if(isset($propCardDets)){
                    foreach($propCardDets as $proposals){
                        if(!empty($proposals)){
                            if($proposals['Status'] === "pending" || $proposals['Status'] === "Accepted"){
                ?>
                <div class="jobPropCardDetails">
                    <div class="propCollapsBtnDiv">
                        <!-- Proposal Button -->
                        <button class="collapsable" id="barbutton">Proposal # <?php echo $proposals['proposal_id']?></button>
                    </div>
                    <div class="propCont">
                        <!-- Proposal Description -->
                        <p class="paraDescription"><?php echo $proposals['description']?></p>
                        <div class="contentPropCard">
                            <div class="bidamnt">
                                <!-- Bid Amount -->
                                <span class="type-1">Bid Amount of Seller : <?php echo $proposals['bid_amount']?></span>
                            </div>
                            <div class="attachment">
                                <!-- Attachment Button -->
                                <button>attachments</button>
                            </div>
                        </div>
                        <div class="buttonContainer">
                            <div>
                                <!-- Seller Profile Link -->
                                <a href="">
                                    <button class="profile">Seller Profile</button>
                                </a>
                            </div>
                            <div>
                                <?php
                                // If no proposals are accepted
                                if($data['countAccepted']['count'] == 0){
                                ?>
                                <!-- Accept or Reject Proposal Buttons -->
                                <button class="accept" onclick="">
                                    <a href="jobproposals/acceptJobProposal&amp;proposalId=<?php echo $proposals['proposal_id'];?>&amp;Status=<?php echo $proposals['Status']?>&amp;jobId=<?php echo $proposals['job_id']?>&amp;sellerId=<?php echo $proposals['seller_id']?>&amp;buyerId=<?php echo $proposals['buyer_id']?>">Accept</a>
                                </button>
                                <button class="reject" onclick="">
                                    <a href="jobproposals/rejectJobProposal&amp;proposalId=<?php echo $proposals['proposal_id'];?>&amp;Status=<?php echo $proposals['Status']?>">Reject</a>
                                </button>
                                <?php
                                // If one proposal is already accepted
                                } else if($data['countAccepted']['count'] == 1){
                                    if($proposals['Status'] === "Accepted"){
                                ?>
                                <!-- Already Accepted Proposal -->
                                <button class="accept" onclick="window.alert('This is the Job Proposal You have accepted Before ! ')">Accepted </button>
                                <button class="reject" onclick="window.alert('You can not reject the Job Proposal Accepted right now! ')"><a href="">Reject</a></button>
                                <?php
                                    } else {
                                ?>
                                <!-- Can't accept other proposals since one is already accepted -->
                                <button class="accept" onclick="window.alert('You have accepted a Job Proposal Already! ')">Accept</button>
                                <button class="reject" onclick="">
                                    <a href="jobproposals/rejectJobProposal&amp;proposalId=<?php echo $proposals['proposal_id'];?>&amp;Status=<?php echo $proposals['Status']?>">Reject</a>
                                </button>
                                <?php
                                    }
                                } else {
                                ?>
                                <!-- Error Handling: No proposals -->
                                <h1>Oops There are no such proposals yet</h1>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                            }
                        }
                    }
                    
                }else{
                        // No proposals
                    ?>

                    <div class="jobPropCardDetails">
                        <h1>Oops There are no such proposals yet</h1>
                    </div>
                    <?php
                }
                
                ?>
            </div>
        </div>
    </div>
</div>

<script src="/skillsparq/public/assests/js/jobProposals.script.js"></script>
<?php include "components/footer.component.php"?>