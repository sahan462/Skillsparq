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
                                        if($proposals['Status'] !== "Accepted" && $proposals['Status'] === "pending"){
						?>
						<div class="jobPropCardDetails">
								<div class="propCollapsBtnDiv">
										<button class="collapsable" id="barbutton">Proposal # <?php echo $proposals['proposal_id']?></button>
								</div>
							<!-- <div class="jobPropCardContent"> -->
                                <div class="propCont">
                                        <p class="paraDescription"><?php echo $proposals['description']?></p>
                                        <div class="content">
                                                <div class="bidamnt">
                                                        Bid Amount of Seller : <b><?php echo $proposals['bid_amount']?></b>
                                                </div> 
                                                <div class="attachment">
                                                    <button>attachments</button>
                                                </div>       
                                        </div>
                                        <div class="buttonContainer">
                                            <div>
                                                <a href=""><button class="profile">Seller Profile</button></a>
                                            </div>
                                            <div>
                                                <button class="accept" onclick=""><a href="jobproposals/acceptJobProposal&amp;proposalId=<?php echo $proposals['proposal_id'];?>&amp;Status=<?php echo $proposals['Status']?>&amp;jobId=<?php echo $proposals['job_id']?>&amp;sellerId=<?php echo $proposals['seller_id']?>&amp;BuyerId=<?php echo $proposals['buyer_id']?>">Accept</a></button>

                                                <button class="reject" onclick=""><a href="jobproposals/rejectJobProposal&amp;proposalId=<?php echo $proposals['proposal_id'];?>&amp;Status=<?php echo $proposals['Status']?>">Reject</a></button>
                                            </div>   
                                        </div>
                                </div>
							<!-- </div> -->
						</div>
						<?php
                                        }
                                    }else if(empty($proposals)){
                        ?>
                        <div class="jobPropCardDetails">
                            <h1>Oops There are no such proposals yet</h1>
                        </div>
                        <?php
                                    }
								}
						?>
				</div> 
		</div>
				
	</div>   
                
</div>

<script src="/skillsparq/public/assests/js/jobProposals.script.js"></script>
<?php include "/xampp/htdocs/skillsparq/app/views/components/footer.component.php";?>