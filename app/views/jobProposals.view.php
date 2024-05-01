<?php
    include "components/buyerSimpleHeader.component.php";
    $proposals = $data['filteredProps'];
    // show(mysqli_fetch_assoc($proposals));
?>

    <div class="jobPropMainContainer">
        <div class="jobPropHeader">
            Job Proposals
        </div>
        <div class="jobPropSubContainer">
            <div class="propSubLeftCont">
                <div class="animationImg">
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script><lottie-player src="https://lottie.host/72c07510-6f6b-459d-a4ca-bcb88a2d9abe/NCWzpCw5kh.json" background="transparent" speed="1" style="width: 300px; height: 300px" direction="1" mode="normal" loop autoplay></lottie-player>
                </div>
            </div>
            <div class="propSubRightCont">
                <div class="jobPropCardContainer">
                    <div class="jobPropCardContainerHeader">
                        <div class="jobPropCardContainerTitle">
                            <h3>Received Job Proposals</h3>
                        </div>
                        <div class="jobPropCardContainerFilter">
                            <form action="" method="GET">
                                <div class="PropCardSelection">
                                    <select name="proposalType" id="proposalType" >
                                        <option value="" disabled selected="">Select</option>
                                        <option value="Pending"
                                        <?php isset($_GET['proposalType']) == true ? ($_GET['proposalType'] == 'Pending' ? 'selected':''):''?>
                                        >To Review</option>
                                        <option value="Accepted"
                                        <?php isset($_GET['proposalType']) == true ? ($_GET['proposalType'] == 'Accepted' ? 'selected':''):''?>
                                        >Accepted</option>
                                    </select>
                                </div>
                                <div class="PropCardSelectBtn">
                                    <button type="submit">Filter</button>
                                </div>
                            </form>
                        </div>                        
                    </div>
                    <div class="jobPropCardContainerContent">
                    <?php
                                if ($proposals->num_rows > 0) {
                                    while($proposal = mysqli_fetch_assoc($proposals)) {
                                        // show(mysqli_fetch_assoc($proposals));
                            ?>

                        <div class="jobProposalCard">
                            <div class="jobProposalCardHead">
                                <div class="jobProposalCardTitle">
                                    <h3>
                                        <?php
                                            echo $proposal['first_name']." ".$proposal['last_name'];
                                        ?>
                                    </h3>
                                </div>
                                <div class="jobProposalSellerPic">
                                    <?php
                                        if(!empty($proposal['profile_pic'])){
                                    ?>
                                    <img src="../public/assests/images/profilePictures/<?php echo $proposal['profile_pic'];?>" alt="<?php echo $proposal['user_name']?>">
                                    <?php
                                        }else{
                                    ?>
                                    <img src="../public/assests/images/dummyprofile.jpg" alt="">
                                    <?php
                                        }
                                    ?>

                                </div>
                            </div>
                            
                            <div class="jobProposalDesc">
                                <p>
                                    <?php
                                        echo $proposal['description'];
                                    ?>
                                </p>
                            </div> 
                            <div class="jobProposalFile">
                                <label for="">Attachements</label>
                                <a href="../public/assests/images/jobProposalAttachments/<?php echo $proposal['attachments']?>"><button>Attachment</button></a>
                            </div> 

                            
                            <div class="jobProposalButtons">
                                <?php if ($data['countAccepted']['count'] == 0) : ?>
                                <div class="jobProposalAcc">
                                    <a href="jobproposals/acceptJobProposal&amp;proposalId=<?php echo $proposal['proposal_id'];?>&amp;Status=<?php echo $proposal['Status']?>&amp;jobId=<?php echo $proposal['job_id']?>&amp;sellerId=<?php echo $proposal['seller_id']?>&amp;buyerId=<?php echo $proposal['buyer_id']?>"></a>
                                </div>
                                <div class="jobProposalRej">
                                    <a href="jobproposals/rejectJobProposal&amp;proposalId=<?php echo $proposal['proposal_id'];?>&amp;Status=<?php echo $proposal['Status']?>">
                                        <button>Reject</button>
                                    </a>
                                </div>
                                <?php elseif($data['countAccepted']['count'] == 1): ?>
                                    <?php if ($proposal['Status'] == "Accepted") : ?>
                                <div class="jobProposalAcc">
                                    <!-- Can't Reaccept the Accepted proposal -->
                                    <a href="">
                                        <button onclick="alert('This is the proposal you have accepted !')">Accept</button>
                                    </a>
                                </div>
                                <div class="jobProposalRej">
                                    <!-- Can't Reject the Accepted proposal -->
                                    <a href="">
                                        <button onclick="alert('Accepted Proposal Cannot be Rejected!')">Reject</button>
                                    </a>
                                </div>
                                    <?php elseif ($proposal['Status'] == "pending") : ?>
                                <div class="jobProposalAcc">
                                    <!-- Can't Accept other proposals since the above single proposal is accepted -->
                                    <a href="">
                                        <button onclick="alert('You have accepted a Job Proposal Already!')">Accept</button>
                                    </a>
                                </div>
                                <div class="jobProposalRej">
                                    <!-- Any way you can delete a job proposal other than accepted -->
                                    <a href="jobproposals/rejectJobProposal&amp;proposalId=<?php echo $proposal['proposal_id'];?>&amp;Status=<?php echo $proposal['Status']?>">
                                        <button>Reject</button>
                                    </a>
                                </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                            <?php
                                    }
                                }else{                            
                            ?>  

                        <div class="jobProposalCard">
                            <div class="jobProposalCardHead">
                                <div class="jobProposalSellerPic">
                                    <!-- <img src="../public/assests/images/dummyprofile.jpg" alt=""> -->
                                </div>
                            </div>
                            
                            <div class="jobProposalDesc">
                                <h1 style="width: 100%; padding:240px;">
                                    No proposals So Far !
                                </h1>
                            </div> 
                        </div>

                            <?php
                                }
                            ?>
                    </div>
                </div>
            </div>	
        </div>   
    </div>

<script src="/skillsparq/public/assests/js/jobProposals.script.js"></script>
<?php include "/xampp/htdocs/skillsparq/app/views/components/footer.component.php";?>