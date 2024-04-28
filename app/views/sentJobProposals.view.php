<?php
    include "components/sellerHeader.component.php";
    $allProposals = $data['sentPropDets'];
    // show($allProposals);
    $accepted = $data['AcceptedCount'];
    $pending = $data['PendingCount'];
    $rejected = $data['RejectedCount'];
    // show($data);
?>

<!-- Main Container -->
<div class="sentJobPropContainer">

    <!-- Topic -->
    <div class="sentJobPropHeader">
        My Proposals
    </div>
    <!-- Content -->
    <div class="sentJobPropContent">
        <?php
            if(empty($allProposals)){
        ?>
        <div class="containerNotFound">
            <div class="notFound">
                You Haven't send any Job Proposal yet !
            </div>
            <div class="lottieAnim">
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script><lottie-player src="https://lottie.host/01489c27-adf9-4ed6-a209-46b0fc0585ac/hkaxKhmNSq.json" background="#f7f7f7" speed="1" style="width: 300px; height: 300px" loop autoplay direction="1" mode="normal"></lottie-player>
            </div>
        </div>
        <?php
            }else{
        ?>
        <div class="leftContainer">
            <!-- Tab links -->
            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'Accepted')" id="defaultOpen">Proposals Accepted</button>
                <button class="tablinks" onclick="openCity(event, 'Pending')" id = "pending">Pending Proposals for Acceptance</button>
                <button class="tablinks" onclick="openCity(event, 'Rejected')" id="cancelled">Rejected Proposals</button>
            </div>

            <!-- Tab content -->

            <!-- Accepted Proposals -->
            <div id="Accepted" class="tabcontent">
                <div class="outerTable">
                    <table>
                        <?php
                            if($accepted['count'] != 0){
                        ?>
                        <div class="thead">
                            <!-- <tr onclick="window.location='order&orderId=<?php echo $row['order_id'] ?>&orderType=<?php echo $row['order_type']?>&buyerId=<?php echo $row['buyer_id']?>&sellerId=<?php echo  $row['seller_id']?>'"> -->
                            <tr style="position: sticky" onclick="window.location='manageOrders&'">
                                <th style="width: 6%;">Proposal Id</th>
                                <th style="width: 26%;">Buyer</th>
                                <th style="width: 28%;">Job Title</th>
                                <th style="width: 10%;">Job Due On</th>
                                <th style="width: 10%;">Amount</th>
                                <th style="width: 10%;">Type</th>
                            </tr>
                        </div>
                            <?php 
                                foreach($allProposals  as $row){
                                    if($row['Status'] === "Accepted"){
                            ?>
                        <div class="Tbody">
                            <tr>
                                <td><?php echo $row['proposal_id'] ?></td>
                                <td class="Buyer">
                                    <div class="BuyerImg">
                                        <img class="buyerImgsentJobProps" src="../public/assests/images/profilePictures/<?php echo $row['profile_pic'];?>" alt="">
                                    </div>
                                    <div class="BuyerText"><?php echo $row['first_name']."  ".$row['last_name'];?></div>
                                </td>
                                <td><?php echo $row['title'];?></td>
                                <td><?php echo date('Y-m-d', strtotime($row['deadline'])); ?></td>
                                <td><?php echo $row['amount'];?></td>
                                <td>Job Order</td>
                            </tr>
                                <?php
                                    }
                                }
                            }else{
                                ?>
                                <div class="notFound">
                                    Oops! You Don't Have any Accepted Job Proposals from a Potential Buyer !
                                </div>
                                <div class="lottieAnim">
                                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script><lottie-player src="https://lottie.host/01489c27-adf9-4ed6-a209-46b0fc0585ac/hkaxKhmNSq.json" background="#f7f7f7" speed="1" style="width: 300px; height: 300px" loop autoplay direction="1" mode="normal"></lottie-player>
                                </div>
                                <?php
                            }
                                ?>
                        </div>
                    </table> 
                </div>
            </div>

            <!-- Sent Proposals -->
            <div id="Pending" class="tabcontent">
                
                <div class="outerTable">
                    <table>
                        <?php
                            if($pending['count'] != 0 ){
                        ?>
                        <div class="thead">
                            <tr>
                                <th style="width: 6%;">Proposal Id</th>
                                <th style="width: 26%;">Buyer</th>
                                <th style="width: 28%;">Job Title</th>
                                <th style="width: 10%;">Job Due On</th>
                                <th style="width: 10%;">Amount</th>
                                <th style="width: 10%;">Type</th>
                            </tr>
                        </div>
                            <?php
                                foreach($allProposals  as $row){
                                    if(($row['Status'] === "pending")){
                            ?>
                        <div class="Tbody">
                            <tr>
                                <td><?php echo $row['proposal_id'] ?></td>
                                <td class="Buyer">
                                    <div class="BuyerImg">
                                        <img class="buyerImgsentJobProps" src="../public/assests/images/profilePictures/<?php echo $row['profile_pic'];?>" alt="">
                                    </div>
                                    <div class="BuyerText"><?php echo $row['first_name']."  ".$row['last_name'];?></div>
                                </td>
                                <td><?php echo $row['title'];?></td>
                                <td><?php echo date('Y-m-d', strtotime($row['deadline'])); ?></td>
                                <td><?php echo $row['amount'];?></td>
                                <td>Job Order</td>
                            </tr>
                                <?php
                                    }
                                }
                            }else{
                                ?>
                                <div class="notFound">
                                    Oops! You Don't Have any pending for acceptance Job Proposals !
                                </div>
                                <div class="lottieAnim">
                                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script><lottie-player src="https://lottie.host/01489c27-adf9-4ed6-a209-46b0fc0585ac/hkaxKhmNSq.json" background="#f7f7f7" speed="1" style="width: 300px; height: 300px" loop autoplay direction="1" mode="normal"></lottie-player>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </table>
                </div>
            </div>

            <!-- Rejected Proposals -->
            <div id="Rejected" class="tabcontent">
                <div class="outerTable">
                    <table>
                        <?php
                            if($rejected['count'] != 0){
                        ?>
                        <div class="thead">
                            <tr>
                                <th style="width: 6%;">Proposal Id</th>
                                <th style="width: 26%;">Buyer</th>
                                <th style="width: 28%;">Job Title</th>
                                <th style="width: 10%;">Job Due On</th>
                                <th style="width: 10%;">Amount</th>
                                <th style="width: 10%;">Type</th>
                                <th style="width: 10%; color:#e41f11">
                                    <button onclick="window.location=('sentJobProposals/deleteAllRejProps&sellerId=<?php echo $data['sellerId']?>')">Delete All</button>
                                </th>
                            </tr>
                        </div>
                            <?php
                                foreach($allProposals  as $row){
                                    if(($row['Status'] === "Rejected")){
                            ?>
                        <div class="Tbody">
                            <tr>
                                <td><?php echo $row['proposal_id'] ?></td>
                                <td class="Buyer">
                                    <div class="BuyerImg">
                                        <img class="buyerImgsentJobProps" src="../public/assests/images/profilePictures/<?php echo $row['profile_pic'];?>" alt="">
                                    </div>
                                    <div class="BuyerText"><?php echo $row['first_name']."  ".$row['last_name'];?></div>
                                </td>
                                <td><?php echo $row['title'];?></td>
                                <td><?php echo date('Y-m-d', strtotime($row['deadline'])); ?></td>
                                <td><?php echo $row['amount'];?></td>
                                <td>Job Order</td>
                                <td><button onclick="window.location=('sentJobProposals/deleteSingleRejProp&propId=<?php echo $row['proposal_id']?>')">Delete</button></td>
                            </tr>
                                <?php
                                    }
                                }
                            }else{
                                ?>
                                <div class="notFound">
                                    You Don't Have any Rejected Job Proposals !
                                </div>
                                <div class="lottieAnim">
                                    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script><dotlottie-player src="https://lottie.host/d36ff7e3-11cd-4d55-880f-beae1474004f/cuP15vcYMI.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </table>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</div>

<script src="/skillsparq/public/assests/js/sentJobProposals.script.js"></script>

<?php include "components/footer.component.php";?>