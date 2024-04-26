<?php
        include "components/buyerSimpleHeader.component.php";
        $propCardDets = $data['proposal&SellerDets'];
        $jobDetails = $data['jobDets'];
?>

<div class="jobPropMainContainer">
	<div class="jobPropHeader">
			<?php echo "All Proposals for ".$jobDetails['title']; ?>
	</div>
	<div class="jobPropSubContainer">
		<div class="propSubLeftCont">
            <div class="animationImg">
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script><lottie-player src="https://lottie.host/72c07510-6f6b-459d-a4ca-bcb88a2d9abe/NCWzpCw5kh.json" background="transparent" speed="1" style="width: 300px; height: 300px" direction="1" mode="normal" loop autoplay></lottie-player>
            </div>
		</div>
		<div class="propSubRightCont">
			<div class="jobPropCardContainer">
						<?php
								foreach($propCardDets as $proposals){
                                    if(!empty($proposals)){
                                        if($proposals['Status'] === "pending" || $proposals['Status'] === "Accepted"){
						?>
				<div class="jobPropCardDetails">
					<div class="propCollapsBtnDiv">
                                <button class="collapsable" id="barbutton">Proposal # <?php echo $proposals['proposal_id']?></button>
					</div>
                    <div class="propCont">
                        <p class="paraDescription"><?php echo $proposals['description']?></p>
                        <div class="contentPropCard">
                            <div class="bidamnt">
                                    Bid Amount of Seller : <b><?php echo $proposals['bid_amount']?></b>
                            </div> 
                            <div class="attachment">
                                <button>attachments</button>
                            </div>       
                        </div>
                        <div class="buttonContainer">
                            <div>
                                <a href="">
                                    <button class="profile">Seller Profile</button>
                                </a>
                            </div>
                            <div>
                                        <?php
                                            // if there are no accepted proposals
                                            if($data['countAccepted']['count'] == 0){
                                        ?>
                                            <!-- Can accept any job proposal -->
                                            <!-- If a single job proposal have been accepted by the buyer is by default requested to job order -->
                                            <button class="accept" onclick="">
                                                <a href="jobproposals/acceptJobProposal&amp;proposalId=<?php echo $proposals['proposal_id'];?>&amp;Status=<?php echo $proposals['Status']?>&amp;jobId=<?php echo $proposals['job_id']?>&amp;sellerId=<?php echo $proposals['seller_id']?>&amp;buyerId=<?php echo $proposals['buyer_id']?>">Accept</a>
                                            </button>
                                            <button class="reject" onclick="">
                                                <a href="jobproposals/rejectJobProposal&amp;proposalId=<?php echo $proposals['proposal_id'];?>&amp;Status=<?php echo $proposals['Status']?>">Reject</a>
                                            </button>
                                        <?php
                                            // if a single job proposal is accepted
                                            }else if($data['countAccepted']['count'] == 1){
                                                if($proposals['Status'] === "Accepted"){
                                                    // and the selected proposal is the accepted one
                                        ?>
                                            <!-- Can't Reaccept the Job Proposal since it is accepted. -->
                                            <button class="accept" onclick="window.alert('This is the Job Proposal You have accepted Before ! ')">Accepted </button>
                                            <!-- Can't Reject the Job Proposal Accepted-->
                                            <button class="reject" onclick="window.alert('You can not reject the Job Proposal Accepted right now! ')"><a href="">Reject</a></button>
                                        <?php
                                                }else{
                                        ?>
                                            <!-- Can't accept other proposals since the above single proposal is accepted. -->
                                            <button class="accept" onclick="window.alert('You have accepted a Job Proposal Already! ')">Accept</button>
                                            <button class="reject" onclick="">
                                                <a href="jobproposals/rejectJobProposal&amp;proposalId=<?php echo $proposals['proposal_id'];?>&amp;Status=<?php echo $proposals['Status']?>">Reject</a>
                                            </button>
                                        <?php
                                                }
                                            }else{   
                                        ?>
                                            <!-- <button class="reject" onclick=""><a href="jobproposals/rejectJobProposal&amp;proposalId=<?php //echo $proposals['proposal_id'];?>&amp;Status=<?php //echo $proposals['Status']?>">Reject</a></button> -->
                                    <!-- </div>   
                                    </div> -->
                            </div>
						</div>
						        <?php   
                                                }
                                        }
                                    }else{
                                ?>
                        <div class="jobPropCardDetails">
                            <h1>Oops There are no such proposals yet</h1>
                        </div>
                    </div> 
                        <?php
                                    }
								}
						?>
                </div>
            </div>
		</div>	
	</div>   
</div>

<script src="/skillsparq/public/assests/js/jobProposals.script.js"></script>
<?php include "/xampp/htdocs/skillsparq/app/views/components/footer.component.php";?>