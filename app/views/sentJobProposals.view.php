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
                        <div class="Tbody">
                            <?php 
                                if(!empty($row)){
                                    foreach($allProposals  as $row){
                                        if($row['Status'] === "pending"){
                            ?>
                                    <tr>
                                        <td><?php echo $row['proposal_id'] ?></td>
                                        <td><a href=""><?php echo $row['first_name']."  ".$row['last_name'];?></a></td>
                                        <td><?php echo $row['title'];?></td>
                                        <td><?php echo $row['deadline'];?></td>
                                        <td><?php echo $row['amount'];?></td>
                                        <td>Job Order</td>
                                    </tr>
                                <?php
                                        }
                                    }
                                }else if(empty($row)){
                                ?>
                                        <div>
                                            <h1>Oops You Haven't yet send any Job Proposals To a Potential Buyer !</h1>
                                        </div>
                                <?php
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
                                <th style="width: 10%;">Status</th>
                            </tr>
                        </div>
                        <div class="Tbody">
                            <?php 
                                foreach($allProposals  as $row){
                                    if($row['Status'] === "Accepted"){
                            ?>
                                    <!-- <tr onclick="window.location='manageJobOrders&orderId=<?php //echo $row['order_id'] ?>&orderType=<?php //echo $row['order_type']?>&buyerId=<?php //echo $row['buyer_id']?>&sellerId=<?php //echo  $row['seller_id']?>'"> -->
                                    <tr>
                                        <td><?php echo $row['proposal_id'] ?></td>
                                        <td class="Buyer">
                                            <span>Kumar Sanagakkara</span>
                                        </td>
                                        <td>I will architect your hotel</td>
                                        <td>5 Sep</td>
                                        <td>$5000</td>
                                        <td>Package Order</td>
                                    </tr>
                            <?php 
                                    }
                                }
                            ?>
                        </div>
                    </table>
                </div>
            </div>

            <!-- Cancelled Proposals -->
            <!-- <div id="Cancelled" class="tabcontent">
                <div class="outerTable">
                    <table>
                        <div class="thead">
                            <tr style="position: sticky">
                                <th style="width: 6%;">Proposal Id</th>
                                <th style="width: 26%;">Buyer</th>
                                <th style="width: 28%;">Job Title</th>
                                <th style="width: 10%;">Job Due On</th>
                                <th style="width: 10%;">Amount</th>
                                <th style="width: 10%;"><a href="" class="clearAllAnc">Clear All</a></th>
                            </tr>
                        </div>
                        <div class="Tbody">
                            <?php 
                                // $allProposals['Status'] === "Cancelled";
                                //foreach($allProposals  as $row){
                                    // if($allProposals['Status'] === "Cancelled"){
                            ?>
                                     <tr onclick="window.location='order&orderId=<?php //echo $row['order_id'] ?>&orderType=<?php //echo $row['order_type']?>&buyerId=<?php //echo $row['buyer_id']?>&sellerId=<?php //echo  $row['seller_id']?>'"> 
                                    <tr>
                                        <td><?php //echo $row['proposal_id'] ?></td>
                                        <td class="Buyer">
                                            <img src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?q=80&amp;w=2071&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Avatar">
                                            <span>Ann Perera</span>
                                        </td>
                                        <td>I will create wordpress websites</td>
                                        <td>5 Sep</td>
                                        <td>$5000</td>
                                        <td><button>Delete</button></td>
                                    </tr>
                            <?php 
                                    //}
                                // }
                            ?>
                        </div>
                    </table>
                </div>
            </div> -->
        </div>
    </div>
</div>

<script src="/skillsparq/public/assests/js/manageOrders.script.js"></script>

<?php include "components/footer.component.php";?>