<?php
    include "components/sellerHeader.component.php";
    $allProposals = $data['sentPropDets'];
    // show($allProposals);
?>

<!-- Main Container -->
<div class="sentJobPropContainer">

    <!-- Topic -->
    <div class="sentJobPropHeader">
        Seller - Sent Job Proposals
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
                <button class="tablinks" onclick="openCity(event, 'Requests')" id = "defaultOpen">Pending Acceptance</button>
                <button class="tablinks" onclick="openCity(event, 'Accepted')" id="accepted">Proposal Accepted</button>
                <!-- <bu class="tablinks" onclick="openCity(event, 'Cancelled')" id="cancelled">Cancelled Proposal</bu  tton> -->
            </div>

            <!-- Tab content -->

            <!-- Sent Proposals -->
            <div id="Requests" class="tabcontent">
                
                <div class="outerTable">
                    <table>
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
                                    if(($row['Status'] === "pending") ||($row['Status'] === "Rejected")){
                            ?>
                        <div class="Tbody">
                            <tr>
                                <td><?php echo $row['proposal_id'] ?></td>
                                <td>
                                    <a href=""><?php echo $row['first_name']."  ".$row['last_name'];?></a>
                                </td>
                                <td><?php echo $row['title'];?></td>
                                <td><?php echo $row['deadline'];?></td>
                                <td><?php echo $row['amount'];?></td>
                                <td>Job Order</td>
                            </tr>
                                <?php
                                    }else if($row['Status'] != "pending" && ($row['Status'] != "Rejected")){
                                ?>
                                        <div class="notFound">
                                            Oops! You Don't Have any pending for acceptance Job Proposals !
                                        </div>
                                        <div class="lottieAnim">
                                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script><lottie-player src="https://lottie.host/01489c27-adf9-4ed6-a209-46b0fc0585ac/hkaxKhmNSq.json" background="#f7f7f7" speed="1" style="width: 300px; height: 300px" loop autoplay direction="1" mode="normal"></lottie-player>
                                        </div>
                                <?php
                                        break;
                                    }
                                }
                                ?>
                        </div>
                    </table>
                </div>
            </div>

            <!-- Accepted Proposals -->
            <div id="Accepted" class="tabcontent">
                <div class="outerTable">
                    <table>
                        <div class="thead">
                            <tr style="position: sticky">
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
                                    <a href=""><?php echo $row['first_name']."  ".$row['last_name'];?></a>
                                </td>
                                <td><?php echo $row['title'];?></td>
                                <td><?php echo $row['deadline'];?></td>
                                <td><?php echo $row['amount'];?></td>
                                <td>Job Order</td>
                            </tr>
                                <?php
                                    }
                                    if(($row['Status'] !== "Accepted")){
                                ?>
                                        <div class="notFound">
                                            Oops! You Don't Have any Accepted Job Proposals from a Potential Buyer !
                                        </div>
                                        <div class="lottieAnim">
                                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script><lottie-player src="https://lottie.host/01489c27-adf9-4ed6-a209-46b0fc0585ac/hkaxKhmNSq.json" background="#f7f7f7" speed="1" style="width: 300px; height: 300px" loop autoplay direction="1" mode="normal"></lottie-player>
                                        </div>
                                <?php
                                        break;
                                    }
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

<script src="/skillsparq/public/assests/js/manageOrders.script.js"></script>

<?php include "components/footer.component.php";?>