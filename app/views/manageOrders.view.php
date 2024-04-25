<?php

    if($_SESSION['role'] == 'Buyer'){
        include "components/buyerSimpleHeader.component.php";
    }else if($_SESSION['role'] == 'Seller'){
        include "components/sellerHeader.component.php";
    }

    $myOrders = $data['myOrders'];
    // show($myOrders);


?>

<!-- Main Container -->
<div class="manageOrdersContainer">

    <!-- Topic -->
    <div class="manageOrdersHeader">
        Manage Orders
    </div>

    <!-- Content -->
    <div class="manageOrdersContent">

        <div class="leftContainer">
            <!-- Tab links -->
            <div class="tab">
                    <?php
                        if($_SESSION['role'] === "Buyer"){
                    ?>
                <button class="tablinks" onclick="openCity(event, 'Requests')" id = "defaultOpen">Pending</button>
                    <?php
                        }else if($_SESSION['role'] === "Seller"){
                    ?>
                <button class="tablinks" onclick="openCity(event, 'Requests')" id = "defaultOpen">Requests</button>
                    <?php 
                        }
                    ?>
                <button class="tablinks" onclick="openCity(event, 'Accepted')">Accepted</button>
                <button class="tablinks" onclick="openCity(event, 'Running')">Running</button>
                <button class="tablinks" onclick="openCity(event, 'Completed')">Completed</button>
                <button class="tablinks" onclick="openCity(event, 'Late')">Late</button>
                <button class="tablinks" onclick="openCity(event, 'Cancelled')">Cancelled</button>
            </div>

            <!-- Tab content -->

            <!-- order requests -->
            <div id="Requests" class="tabcontent">
                <div class="outerTable">
                    <table>
                        <div class="thead">
                            <tr>
                                <th style="width: 6%;">Order Id</th>

                                <?php if($_SESSION["role"] == 'Seller') { ?>
                                    <th style="width: 26%;">Buyer</th>
                                <?php } else { ?>
                                    <th style="width: 26%;">Seller</th>
                                <?php }?>
                                
                                <th style="width: 28%;">Gig</th>
                                <th style="width: 10%;">Due On</th>
                                <th style="width: 10%;">Total Amount</th>
                                <th style="width: 10%;">Order Type</th>
                                <th style="width: 10%;">Accept/Cancel</th>
                            </tr>
                        </div>
                        <div class="tbody">
                            <?php 
                                foreach($myOrders as $row){

                                    if($row['order_state'] === 'Requested'){

                            ?>
                                    <tr onclick="window.location='order&orderId=<?php echo $row['order_id'] ?>&orderType=<?php echo $row['order_type']?>&buyerId=<?php echo $row['buyer_id']?>&sellerId=<?php echo  $row['seller_id']?>'">

                                        <td><?php echo $row['order_id'] ?></td>
                                        <td class="buyer">
                                            <img src="<?php echo $row['profile_pic']?>" alt="Avatar">
                                            <span><?php echo ($row['first_name'] ." ". $row['last_name']) ?></span>
                                        </td>
                                        <td>I will create wordpress websites</td>
                                        <?php 
                                            if($row['order_type'] === "package"){
                                        ?>
                                        <td> - </td>
                                        <?php 
                                            }else if($row['order_type'] === "job"){
                                        ?>
                                        <td>job ending date</td>
                                        <?php 
                                            }
                                        ?>
                                        <td>$5000</td>
                                        <td>Package Order</td>

                                    </tr>
                            <?php }
                                }
                            ?>
                        </div>
                    </table>
                </div>
            </div>

            <!-- accepted orders -->
            <div id="Accepted" class="tabcontent">
                <div class="outerTable">
                    <table>
                        <div class="thead">
                            <tr style="position: sticky">
                                <th style="width: 6%;">Order Id</th>

                                <?php if($_SESSION["role"] == 'Seller') { ?>
                                    <th style="width: 26%;">Buyer</th>
                                <?php } else { ?>
                                    <th style="width: 26%;">Seller</th>
                                <?php }?>      

                                <th style="width: 28%;">Gig</th>
                                <th style="width: 10%;">Due On</th>
                                <th style="width: 10%;">Total Amount</th>
                                <th style="width: 10%;">Order Type</th>
                            </tr>
                        </div>
                        <div class="tbody">
                            <?php 
                                foreach($myOrders as $row){

                                    if($row['order_state'] == 'Accepted/Pending Payments'){

                            ?>
                                    <tr onclick="window.location='order&orderId=<?php echo $row['order_id'] ?>&orderType=<?php echo $row['order_type']?>&buyerId=<?php echo $row['buyer_id']?>&sellerId=<?php echo  $row['seller_id']?>'">
                                        <td><?php echo $row['order_id'] ?></td>
                                        <td class="buyer">
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

            <!-- running orders -->
            <div id="Running" class="tabcontent">
                <div class="outerTable">
                    <table>
                        <div class="thead">
                            <!-- <tr style="position: sticky, top: 0;"> -->
                            <tr style="position: sticky">
                                <th style="width: 6%;">Order Id</th>

                                <?php if($_SESSION["role"] == 'Seller') { ?>
                                    <th style="width: 26%;">Buyer</th>
                                <?php } else { ?>
                                    <th style="width: 26%;">Seller</th>
                                <?php }?>

                                <th style="width: 28%;">Gig</th>
                                <th style="width: 10%;">Due On</th>
                                <th style="width: 10%;">Total Amount</th>
                                <th style="width: 10%;">Order Type</th>
                            </tr>
                        </div>
                        <div class="tbody">
                            <?php 
                                foreach($myOrders as $row){

                                    if($row['order_state'] == 'Running'){

                            ?>
                                    <tr onclick="window.location='order&orderId=<?php echo $row['order_id'] ?>&orderType=<?php echo $row['order_type']?>&buyerId=<?php echo $row['buyer_id']?>&sellerId=<?php echo  $row['seller_id']?>'">
                                        <td><?php echo $row['order_id'] ?></td>
                                        <td class="buyer">
                                            <img src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?q=80&amp;w=2071&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Avatar">
                                            <span>Ann Perera</span>
                                        </td>
                                        <td>I will create wordpress websites</td>
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

            <!-- completed orders -->
            <div id="Completed" class="tabcontent">
                <div class="outerTable">
                    <table>
                        <div class="thead">
                            <tr style="position: sticky">
                                <th style="width: 6%;">Order Id</th>
                                
                                <?php if($_SESSION["role"] == 'Seller') { ?>
                                    <th style="width: 26%;">Buyer</th>
                                <?php } else { ?>
                                    <th style="width: 26%;">Seller</th>
                                <?php }?>

                                <th style="width: 28%;">Gig</th>
                                <th style="width: 10%;">Due On</th>
                                <th style="width: 10%;">Delivered At</th>
                                <th style="width: 10%;">Total Amount</th>
                                <th style="width: 10%;">Order Type</th>
                            </tr>
                        </div>
                        <div class="tbody">
                            <?php 
                                foreach($myOrders as $row){

                                    if($row['order_state'] == 'Completed'){

                            ?>
                                    <tr onclick="window.location='order&orderId=<?php echo $row['order_id'] ?>&orderType=<?php echo $row['order_type']?>&buyerId=<?php echo $row['buyer_id']?>&sellerId=<?php echo  $row['seller_id']?>'">
                                        <td><?php echo $row['order_id'] ?></td>
                                        <td class="buyer">
                                            <img src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?q=80&amp;w=2071&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Avatar">
                                            <span>Ann Perera</span>
                                        </td>
                                        <td>I will create wordpress websites</td>
                                        <td>5 Sep</td>
                                        <td>3 July</td>
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

            <!-- late delivery -->
            <div id="Late" class="tabcontent">
                <div class="outerTable">
                    <table>
                        <div class="thead">
                            <tr style="position: sticky">
                                <th style="width: 6%;">Order Id</th>

                                <?php if($_SESSION["role"] == 'Seller') { ?>
                                    <th style="width: 26%;">Buyer</th>
                                <?php } else { ?>
                                    <th style="width: 26%;">Seller</th>
                                <?php }?>

                                <th style="width: 28%;">Gig</th>
                                <th style="width: 10%;">Due On</th>
                                <th style="width: 10%;">Delivered At</th>
                                <th style="width: 10%;">Total Amount</th>
                                <th style="width: 10%;">Order Type</th>
                            </tr>
                        </div>
                        <div class="tbody">
                            <?php 
                                foreach($myOrders as $row){

                                    if($row['order_state'] == 'Late'){

                            ?>
                                    <tr onclick="window.location='order&orderId=<?php echo $row['order_id'] ?>&orderType=<?php echo $row['order_type']?>&buyerId=<?php echo $row['buyer_id']?>&sellerId=<?php echo  $row['seller_id']?>'">
                                        <td><?php echo $i+1 ?></td>
                                        <td class="buyer">
                                            <img src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?q=80&amp;w=2071&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Avatar">
                                            <span>Ann Perera</span>
                                        </td>
                                        <td>I will create wordpress websites</td>
                                        <td>5 Sep</td>
                                        <td>3 July</td>
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

            <!-- Cancelled Orders -->
            <div id="Cancelled" class="tabcontent">
                <div class="outerTable">
                    <table>
                        <div class="thead">
                            <tr style="position: sticky">
                                <th style="width: 6%;">Order Id</th>

                                <?php if($_SESSION["role"] == 'Seller') { ?>
                                    <th style="width: 26%;">Buyer</th>
                                <?php } else { ?>
                                    <th style="width: 26%;">Seller</th>
                                <?php }?>

                                <th style="width: 28%;">Gig</th>
                                <th style="width: 10%;">Delivered At</th>
                                <th style="width: 10%;">Total Amount</th>
                                <th style="width: 10%;">Order Type</th>
                                <th style="width: 10%;">Remove</th>
                            </tr>
                        </div>
                        <div class="tbody">
                            <?php 
                                foreach($myOrders as $row){

                                    if($row['order_state'] == 'Cancelled'){
                            ?>
                                    <tr>
                                    <!-- <tr onclick="window.location='order&orderId=<?php //echo $row['order_id'] ?>&orderType=<?php //echo $row['order_type']?>&buyerId=<?php //echo $row['buyer_id']?>&sellerId=<?php //echo  $row['seller_id']?>'"> -->
                                        <td><?php echo $row['order_id'] ?></td>
                                        <td class="buyer">
                                            <img src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?q=80&amp;w=2071&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Avatar">
                                            <span>Ann Perera</span>
                                        </td>
                                        <td>I will create wordpress websites</td>
                                        <td>3 July</td>
                                        <td>$5000</td>
                                        <td>Package Order</td>
                                        <td>
                                            <button>
                                            <svg viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M154 260h568v700H154z" fill="#FF3B30"></path><path d="M624.428 261.076v485.956c0 57.379-46.737 103.894-104.391 103.894h-362.56v107.246h566.815V261.076h-99.864z" fill="#030504"></path><path d="M320.5 870.07c-8.218 0-14.5-6.664-14.5-14.883V438.474c0-8.218 6.282-14.883 14.5-14.883s14.5 6.664 14.5 14.883v416.713c0 8.219-6.282 14.883-14.5 14.883zM543.5 870.07c-8.218 0-14.5-6.664-14.5-14.883V438.474c0-8.218 6.282-14.883 14.5-14.883s14.5 6.664 14.5 14.883v416.713c0 8.219-6.282 14.883-14.5 14.883z" fill="#152B3C"></path><path d="M721.185 345.717v-84.641H164.437z" fill="#030504"></path><path d="M633.596 235.166l-228.054-71.773 31.55-99.3 228.055 71.773z" fill="#FF3B30"></path><path d="M847.401 324.783c-2.223 0-4.475-0.333-6.706-1.034L185.038 117.401c-11.765-3.703-18.298-16.239-14.592-27.996 3.706-11.766 16.241-18.288 27.993-14.595l655.656 206.346c11.766 3.703 18.298 16.239 14.592 27.996-2.995 9.531-11.795 15.631-21.286 15.631z" fill="#FF3B30"></path></g></svg>
                                        </td>
                                            </button>
                                    </tr>
                            <?php 
                                    }
                                }
                            ?>
                        </div>
                    </table>
                </div>
            </div>



        </div>

        <!--
        <div class="rightContainer">
            <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
            <dotlottie-player src="https://lottie.host/d0bf7d76-fee3-4563-952d-db0f24df4d15/rBV8gQ17Tk.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
        </div>
                            -->

    </div>
</div>

<script src="/skillsparq/public/assests/js/manageOrders.script.js"></script>

<?php include "components/footer.component.php";?>