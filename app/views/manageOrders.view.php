<?php

    if($_SESSION['role'] == 'Buyer'){
        include "components/buyerSimpleHeader.component.php";
    }else if($_SESSION['role'] == 'Seller'){
        include "components/sellerHeader.component.php";
    }
?>

<?php
    $packageOrders = $data['packageOrders'];
    $jobOrders = $data['jobOrders'];
    $milestoneOrders = $data['milestoneOrders'];
    print_r($jobOrders->fetch_assoc());
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

            <!-- select order type  -->
            <div style="margin-bottom: 16px">
                <select id="orderTypeSelect" onchange="openOrderType(event)">
                    <option value="package" selected>Package Orders</option>
                    <option value="job">Job Orders</option>
                    <option value="milestone">Milestone Orders</option>
                </select>
            </div>

            <!-- package orders -->
            <div id="package" class="ordercontent">

                <!-- Tabs -->
                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'Package_Requested')" id="defaultOpen_Package">Requested</button>
                    <button class="tablinks" onclick="openCity(event, 'Package_Accepted')">Accepted</button>
                    <button class="tablinks" onclick="openCity(event, 'Package_Running')">Running</button>
                    <button class="tablinks" onclick="openCity(event, 'Package_Completed')">Completed</button>
                    <button class="tablinks" onclick="openCity(event, 'Package_Late')">Late</button>
                    <button class="tablinks" onclick="openCity(event, 'Package_Cancelled')">Cancelled</button>
                </div>

                <!-- package order states -->
                <div id="Package_Requested" class="tabcontent">

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
                                </tr>
                            </div>

                            <div class="tbody">
                                <?php 
                                    foreach($packageOrders as $row){
                                        if($row['order_state'] === 'Requested'){
                                    ?>
                                            <tr onclick="window.location='order&orderId=<?php echo $row['order_id'] ?>&orderType=<?php echo $row['order_type']?>&buyerId=<?php echo $row['buyer_id']?>&sellerId=<?php echo  $row['seller_id']?>'">

                                                <td>
                                                    <?php echo $row['order_id'] ?>
                                                </td>

                                                <td class="buyer">
                                                    <img src="../public/assests/images/profilePictures/<?php echo $row['profile_pic'];?>" alt="Avatar">
                                                    <span><?php echo ($row['first_name'] ." ". $row['last_name']) ?></span>
                                                </td>

                                                <td style="text-align:left;">
                                                    <?php echo $row['title']?>
                                                </td>

                                                <td>
                                                    <?php echo $row['deadline']?>
                                                </td>

                                                <td>
                                                    $<?php echo $row['package_price']?>
                                                </td>

                                                <td>
                                                    Package Order
                                                </td>

                                            </tr>

                                        <?php }
                                    } ?>
                            </div>
                        </table>
                    </div>

                </div>  

                <div id="Package_Accepted" class="tabcontent">

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
                                    foreach($packageOrders as $row){

                                        if($row['order_state'] == 'Accepted/Pending Payments'){

                                ?>
                                        <tr onclick="window.location='order&orderId=<?php echo $row['order_id'] ?>&orderType=<?php echo $row['order_type']?>&buyerId=<?php echo $row['buyer_id']?>&sellerId=<?php echo  $row['seller_id']?>'">
                                            
                                            <td>
                                                <?php echo $row['order_id'] ?>
                                            </td>

                                            <td class="buyer">
                                                <img src="../public/assests/images/profilePictures/<?php echo $row['profile_pic'];?>" alt="Avatar">
                                                <span><?php echo ($row['first_name'] ." ". $row['last_name']) ?></span>
                                            </td>

                                            <td style="text-align:left;">
                                                <?php echo $row['title']?>
                                            </td>

                                            <td>
                                                <?php echo $row['deadline']?>
                                            </td>

                                            <td>
                                                $<?php echo $row['package_price']?>
                                            </td>

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

                <div id="Package_Running" class="tabcontent">

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
                                    foreach($packageOrders as $row){

                                        if($row['order_state'] == 'Running'){

                                ?>
                                        <tr onclick="window.location='order&orderId=<?php echo $row['order_id'] ?>&orderType=<?php echo $row['order_type']?>&buyerId=<?php echo $row['buyer_id']?>&sellerId=<?php echo  $row['seller_id']?>'">
                                            
                                            <td>
                                                <?php echo $row['order_id'] ?>
                                            </td>

                                            <td class="buyer">
                                                <img src="../public/assests/images/profilePictures/<?php echo $row['profile_pic'];?>" alt="Avatar">
                                                <span><?php echo ($row['first_name'] ." ". $row['last_name']) ?></span>
                                            </td>
                                            
                                            <td style="text-align:left;">
                                                <?php echo $row['title']?>
                                            </td>

                                            <td>
                                                <?php echo $row['deadline']?>
                                            </td>
                                            
                                            <td>
                                                $<?php echo $row['package_price']?>
                                            </td>

                                            <td>
                                                Package Order
                                            </td>
                                        </tr>
                                <?php 
                                        }
                                    }
                                ?>
                            </div>
                        </table>
                    </div>       

                </div>  

                <div id="Package_Completed" class="tabcontent">

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
                                    <th style="width: 10%;">Completed On</th>
                                    <th style="width: 10%;">Total Amount</th>
                                    <th style="width: 10%;">Order Type</th>
                                </tr>
                            </div>
                            <div class="tbody">
                                <?php 
                                    foreach($packageOrders as $row){

                                        if($row['order_state'] == 'Completed'){

                                ?>
                                        <tr onclick="window.location='order&orderId=<?php echo $row['order_id'] ?>&orderType=<?php echo $row['order_type']?>&buyerId=<?php echo $row['buyer_id']?>&sellerId=<?php echo  $row['seller_id']?>'">
                                            
                                            <td>
                                                <?php echo $row['order_id'] ?>
                                            </td>

                                            <td class="buyer">
                                                <img src="../public/assests/images/profilePictures/<?php echo $row['profile_pic'];?>" alt="Avatar">
                                                <span><?php echo ($row['first_name'] ." ". $row['last_name']) ?></span>
                                            </td>

                                            <td style="text-align:left;">
                                                <?php echo $row['title']?>
                                            </td>

                                            <td>
                                                <?php echo $row['deadline']?>
                                            </td>

                                            <td>3 July</td>

                                            <td>
                                                $<?php echo $row['package_price']?>
                                            </td>

                                            <td>
                                                Package Order
                                            </td>
                                        </tr>
                                <?php 
                                        }
                                    }
                                ?>
                            </div>
                        </table>
                    </div>

                </div>  

                <div id="Package_Late" class="tabcontent">

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
                                    <th style="width: 10%;">Completed On</th>
                                    <th style="width: 10%;">Total Amount</th>
                                    <th style="width: 10%;">Order Type</th>
                                </tr>
                            </div>
                            <div class="tbody">
                                <?php 
                                    foreach($packageOrders as $row){

                                        if($row['order_state'] == 'Late'){

                                ?>
                                        <tr onclick="window.location='order&orderId=<?php echo $row['order_id'] ?>&orderType=<?php echo $row['order_type']?>&buyerId=<?php echo $row['buyer_id']?>&sellerId=<?php echo  $row['seller_id']?>'">
                                            
                                            <td>
                                                <?php echo $row['order_id'] ?>
                                            </td>

                                            <td class="buyer">
                                                <img src="../public/assests/images/profilePictures/<?php echo $row['profile_pic'];?>" alt="Avatar">
                                                <span><?php echo ($row['first_name'] ." ". $row['last_name']) ?></span>
                                            </td>

                                            <td style="text-align:left;">
                                                <?php echo $row['title']?>
                                            </td>
                                            
                                            <td>
                                                <?php echo $row['deadline']?>
                                            </td>

                                            <td>3 July</td>

                                            <td>
                                                $<?php echo $row['package_price']?>
                                            </td>

                                            <td>
                                                Package Order
                                            </td>
                                        </tr>
                                <?php 
                                        }
                                    }
                                ?>
                            </div>
                        </table>
                    </div>

                </div>
                
                <div id="Package_Cancelled" class="tabcontent">

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
                                    <th style="width: 10%;">Completed On</th>
                                    <th style="width: 10%;">Total Amount</th>
                                    <th style="width: 10%;">Order Type</th>
                                    <th style="width: 10%;">Remove</th>
                                </tr>
                            </div>
                            <div class="tbody">
                                <?php 
                                    foreach($packageOrders as $row){

                                        if($row['order_state'] == 'Cancelled'){
                                ?>
                                        <tr>
                                        <tr onclick="window.location='order&orderId=<?php echo $row['order_id'] ?>&orderType=<?php echo $row['order_type']?>&buyerId=<?php echo $row['buyer_id']?>&sellerId=<?php echo  $row['seller_id']?>'">
                                            
                                            <td>
                                                <?php echo $row['order_id'] ?>
                                            </td>

                                            <td class="buyer">
                                                <img src="../public/assests/images/profilePictures/<?php echo $row['profile_pic'];?>" alt="Avatar">
                                                <span><?php echo ($row['first_name'] ." ". $row['last_name']) ?></span>
                                            </td>


                                            <td style="text-align:left;">
                                                <?php echo $row['title']?>
                                            </td>

                                            <td>
                                                <?php echo $row['deadline']?>
                                            </td>


                                            <td>
                                                $<?php echo $row['package_price']?>
                                            </td>

                                            <td>Package Order</td>

                                            <td>
                                                <button>
                                                    <svg viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M154 260h568v700H154z" fill="#FF3B30"></path><path d="M624.428 261.076v485.956c0 57.379-46.737 103.894-104.391 103.894h-362.56v107.246h566.815V261.076h-99.864z" fill="#030504"></path><path d="M320.5 870.07c-8.218 0-14.5-6.664-14.5-14.883V438.474c0-8.218 6.282-14.883 14.5-14.883s14.5 6.664 14.5 14.883v416.713c0 8.219-6.282 14.883-14.5 14.883zM543.5 870.07c-8.218 0-14.5-6.664-14.5-14.883V438.474c0-8.218 6.282-14.883 14.5-14.883s14.5 6.664 14.5 14.883v416.713c0 8.219-6.282 14.883-14.5 14.883z" fill="#152B3C"></path><path d="M721.185 345.717v-84.641H164.437z" fill="#030504"></path><path d="M633.596 235.166l-228.054-71.773 31.55-99.3 228.055 71.773z" fill="#FF3B30"></path><path d="M847.401 324.783c-2.223 0-4.475-0.333-6.706-1.034L185.038 117.401c-11.765-3.703-18.298-16.239-14.592-27.996 3.706-11.766 16.241-18.288 27.993-14.595l655.656 206.346c11.766 3.703 18.298 16.239 14.592 27.996-2.995 9.531-11.795 15.631-21.286 15.631z" fill="#FF3B30"></path></g></svg>
                                                </button>
                                            </td>

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

            <!-- job orders -->
            <div id="job" class="ordercontent" style="display: none;">

                <!-- Tabs -->
                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'Job_Requested')" id="defaultOpen_Job">Requested</button>
                    <button class="tablinks" onclick="openCity(event, 'Job_Accepted')">Accepted</button>
                    <button class="tablinks" onclick="openCity(event, 'Job_Running')">Running</button>
                    <button class="tablinks" onclick="openCity(event, 'Job_Completed')">Completed</button>
                    <button class="tablinks" onclick="openCity(event, 'Job_Late')">Late</button>
                    <button class="tablinks" onclick="openCity(event, 'Job_Cancelled')">Cancelled</button>
                </div>

                <div id="Job_Requested" class="tabcontent">

                    <div class="outerTable">
                        <table>

                            <div class="thead">
                                <tr>
                                    <th style="width: 6%;">Job Id</th>

                                    <?php if($_SESSION["role"] == 'Seller') { ?>
                                        <th style="width: 26%;">Buyer</th>
                                    <?php } else { ?>
                                        <th style="width: 26%;">Seller</th>
                                    <?php }?>
                                    
                                    <th style="width: 28%;">Job Title</th>
                                    <th style="width: 10%;">Due On</th>
                                    <th style="width: 10%;">Total Amount</th>
                                    <th style="width: 10%;">Order Type</th>
                                </tr>
                            </div>

                            <div class="tbody">
                                <?php 
                                    foreach($jobOrders as $row){
                                        if($row['order_state'] === 'Requested'){
                                    ?>
                                            <tr onclick="window.location='order&orderId=<?php echo $row['order_id'] ?>&orderType=<?php echo $row['order_type']?>&buyerId=<?php echo $row['buyer_id']?>&sellerId=<?php echo  $row['seller_id']?>'">

                                                <td>
                                                    <?php echo $row['order_id'] ?>
                                                </td>

                                                <td class="buyer">
                                                    <img src="../public/assests/images/profilePictures/<?php echo $row['profile_pic'];?>" alt="Avatar">
                                                    <span><?php echo ($row['first_name'] ." ". $row['last_name']) ?></span>
                                                </td>

                                                <td style="text-align:left;">
                                                    <?php echo $row['title']?>
                                                </td>

                                                <td>
                                                    <?php  // Create DateTime object
                                                        $date = date_create($row['deadline']);
                                                        $formattedDeadline = date_format($date, "Y-m-d"); 
                                                        echo $formattedDeadline;
                                                    ?>
                                                </td>

                                                <td>
                                                    $<?php echo $row['amount']?>
                                                </td>

                                                <td>
                                                    Job Order
                                                </td>

                                            </tr>

                                        <?php }
                                    } ?>
                            </div>
                        </table>
                    </div>

                </div>  

                <div id="Job_Accepted" class="tabcontent">

                    <div class="outerTable">
                        <table>
                            <div class="thead">
                                <tr style="position: sticky">
                                    <th style="width: 6%;">Job Id</th>

                                    <?php if($_SESSION["role"] == 'Seller') { ?>
                                        <th style="width: 26%;">Buyer</th>
                                    <?php } else { ?>
                                        <th style="width: 26%;">Seller</th>
                                    <?php }?>      

                                    <th style="width: 28%;">Job Title</th>
                                    <th style="width: 10%;">Due On</th>
                                    <th style="width: 10%;">Total Amount</th>
                                    <th style="width: 10%;">Order Type</th>
                                </tr>
                            </div>
                            <div class="tbody">
                                <?php 
                                    foreach($jobOrders as $row){

                                        if($row['order_state'] == 'Accepted/Pending Payments'){

                                ?>
                                        <tr onclick="window.location='order&orderId=<?php echo $row['order_id'] ?>&orderType=<?php echo $row['order_type']?>&buyerId=<?php echo $row['buyer_id']?>&sellerId=<?php echo  $row['seller_id']?>'">
                                            
                                            <td>
                                                <?php echo $row['order_id'] ?>
                                            </td>

                                            <td class="buyer">
                                                <img src="../public/assests/images/profilePictures/<?php echo $row['profile_pic'];?>" alt="Avatar">
                                                <span><?php echo ($row['first_name'] ." ". $row['last_name']) ?></span>
                                            </td>

                                            <td style="text-align:left;">
                                                <?php echo $row['title']?>
                                            </td>

                                            <td>
                                                <?php  // Create DateTime object
                                                    $date = date_create($row['deadline']);
                                                    $formattedDeadline = date_format($date, "Y-m-d"); 
                                                    echo $formattedDeadline;
                                                ?>
                                            </td>

                                            <td>
                                                <?php echo $row['amount']?>
                                            </td>

                                            <td>
                                                Job Order
                                            </td>
                                        </tr>
                                <?php 
                                        }
                                    }
                                ?>
                            </div>
                        </table>
                    </div>

                </div>

                <div id="Job_Running" class="tabcontent">

                    <div class="outerTable">
                        <table>
                            <div class="thead">
                                <!-- <tr style="position: sticky, top: 0;"> -->
                                <tr style="position: sticky">
                                    <th style="width: 6%;">Job Id</th>

                                    <?php if($_SESSION["role"] == 'Seller') { ?>
                                        <th style="width: 26%;">Buyer</th>
                                    <?php } else { ?>
                                        <th style="width: 26%;">Seller</th>
                                    <?php }?>

                                    <th style="width: 28%;">Job Title</th>
                                    <th style="width: 10%;">Due On</th>
                                    <th style="width: 10%;">Total Amount</th>
                                    <th style="width: 10%;">Order Type</th>
                                </tr>
                            </div>
                            <div class="tbody">
                                <?php 
                                    foreach($jobOrders as $row){

                                        if($row['order_state'] == 'Running'){

                                ?>
                                        <tr onclick="window.location='order&orderId=<?php echo $row['order_id'] ?>&orderType=<?php echo $row['order_type']?>&buyerId=<?php echo $row['buyer_id']?>&sellerId=<?php echo  $row['seller_id']?>'">
                                            
                                            <td>
                                                <?php echo $row['order_id'] ?>
                                            </td>

                                            <td class="buyer">
                                                <img src="../public/assests/images/profilePictures/<?php echo $row['profile_pic'];?>" alt="Avatar">
                                                <span><?php echo ($row['first_name'] ." ". $row['last_name']) ?></span>
                                            </td>
                                            
                                            <td style="text-align:left;">
                                                <?php echo $row['title']?>
                                            </td>

                                            <td>
                                                <?php  // Create DateTime object
                                                    $date = date_create($row['deadline']);
                                                    $formattedDeadline = date_format($date, "Y-m-d"); 
                                                    echo $formattedDeadline;
                                                ?>
                                            </td>
                                            
                                            <td>
                                                <?php echo $row['amount']?>
                                            </td>

                                            <td>
                                                Job Order
                                            </td>

                                        </tr>
                                    <?php 
                                        }
                                    }
                                ?>
                            </div>
                        </table>
                    </div>     

                </div>  

                <div id="Job_Completed" class="tabcontent">

                    <div class="outerTable">
                        <table>
                            <div class="thead">
                                <tr style="position: sticky">
                                    <th style="width: 6%;">Job Id</th>
                                    
                                    <?php if($_SESSION["role"] == 'Seller') { ?>
                                        <th style="width: 26%;">Buyer</th>
                                    <?php } else { ?>
                                        <th style="width: 26%;">Seller</th>
                                    <?php }?>

                                    <th style="width: 28%;">Job Title</th>
                                    <th style="width: 10%;">Due On</th>
                                    <th style="width: 10%;">Completed On</th>
                                    <th style="width: 10%;">Total Amount</th>
                                    <th style="width: 10%;">Order Type</th>
                                </tr>
                            </div>
                            <div class="tbody">
                                <?php 
                                    foreach($jobOrders as $row){

                                        if($row['order_state'] == 'Completed'){

                                ?>
                                        <tr onclick="window.location='order&orderId=<?php echo $row['order_id'] ?>&orderType=<?php echo $row['order_type']?>&buyerId=<?php echo $row['buyer_id']?>&sellerId=<?php echo  $row['seller_id']?>'">
                                            
                                            <td>
                                                <?php echo $row['order_id'] ?>
                                            </td>

                                            <td class="buyer">
                                                <img src="../public/assests/images/profilePictures/<?php echo $row['profile_pic'];?>" alt="Avatar">
                                                <span><?php echo ($row['first_name'] ." ". $row['last_name']) ?></span>
                                            </td>

                                            <td style="text-align:left;">
                                                <?php echo $row['title']?>
                                            </td>

                                            <td>
                                                <?php  // Create DateTime object
                                                    $date = date_create($row['deadline']);
                                                    $formattedDeadline = date_format($date, "Y-m-d"); 
                                                    echo $formattedDeadline;
                                                ?>
                                            </td>

                                            <td>3 July</td>

                                            <td>
                                                <?php echo $row['amount']?>
                                            </td>

                                            <td>
                                                Job Order
                                            </td>
                                        </tr>
                                <?php 
                                        }
                                    }
                                ?>
                            </div>
                        </table>
                    </div>

                </div>

                <div id="Job_Late" class="tabcontent">

                    <div class="outerTable">
                        <table>
                            <div class="thead">
                                <tr style="position: sticky">
                                    <th style="width: 6%;">Job Id</th>

                                    <?php if($_SESSION["role"] == 'Seller') { ?>
                                        <th style="width: 26%;">Buyer</th>
                                    <?php } else { ?>
                                        <th style="width: 26%;">Seller</th>
                                    <?php }?>

                                    <th style="width: 28%;">Job Title</th>
                                    <th style="width: 10%;">Due On</th>
                                    <th style="width: 10%;">Completed On</th>
                                    <th style="width: 10%;">Total Amount</th>
                                    <th style="width: 10%;">Order Type</th>
                                </tr>
                            </div>
                            <div class="tbody">
                                <?php 
                                    foreach($jobOrders as $row){

                                        if($row['order_state'] == 'Late'){

                                ?>
                                        <tr onclick="window.location='order&orderId=<?php echo $row['order_id'] ?>&orderType=<?php echo $row['order_type']?>&buyerId=<?php echo $row['buyer_id']?>&sellerId=<?php echo  $row['seller_id']?>'">
                                            
                                            <td>
                                                <?php echo $row['order_id'] ?>
                                            </td>

                                            <td class="buyer">
                                                <img src="../public/assests/images/profilePictures/<?php echo $row['profile_pic'];?>" alt="Avatar">
                                                <span><?php echo ($row['first_name'] ." ". $row['last_name']) ?></span>
                                            </td>

                                            <td style="text-align:left;">
                                                <?php echo $row['title']?>
                                            </td>
                                            
                                            <td>
                                                <?php  // Create DateTime object
                                                    $date = date_create($row['deadline']);
                                                    $formattedDeadline = date_format($date, "Y-m-d"); 
                                                    echo $formattedDeadline;
                                                ?>
                                            </td>

                                            <td>3 July</td>

                                            <td>
                                                <?php echo $row['amount']?>
                                            </td>

                                            <td>
                                                Job Order
                                            </td>
                                        </tr>
                                <?php 
                                        }
                                    }
                                ?>
                            </div>
                        </table>
                    </div>

                </div>

                <div id="Job_Cancelled" class="tabcontent">

                    <div class="outerTable">
                        <table>
                            <div class="thead">
                                <tr style="position: sticky">
                                    <th style="width: 6%;">Job Id</th>

                                    <?php if($_SESSION["role"] == 'Seller') { ?>
                                        <th style="width: 26%;">Buyer</th>
                                    <?php } else { ?>
                                        <th style="width: 26%;">Seller</th>
                                    <?php }?>

                                    <th style="width: 28%;">Job Title</th>
                                    <th style="width: 10%;">Completed On</th>
                                    <th style="width: 10%;">Total Amount</th>
                                    <th style="width: 10%;">Order Type</th>
                                    <th style="width: 10%;">Remove</th>
                                </tr>
                            </div>
                            <div class="tbody">
                                <?php 
                                    foreach($jobOrders as $row){

                                        if($row['order_state'] == 'Cancelled'){
                                ?>
                                        <tr>
                                        <tr onclick="window.location='order&orderId=<?php echo $row['order_id'] ?>&orderType=<?php echo $row['order_type']?>&buyerId=<?php echo $row['buyer_id']?>&sellerId=<?php echo  $row['seller_id']?>'">
                                            
                                            <td>
                                                <?php echo $row['order_id'] ?>
                                            </td>

                                            <td class="buyer">
                                                <img src="../public/assests/images/profilePictures/<?php echo $row['profile_pic'];?>" alt="Avatar">
                                                <span><?php echo ($row['first_name'] ." ". $row['last_name']) ?></span>
                                            </td>


                                            <td style="text-align:left;">
                                                <?php echo $row['title']?>
                                            </td>

                                            <td>
                                                <?php  // Create DateTime object
                                                    $date = date_create($row['deadline']);
                                                    $formattedDeadline = date_format($date, "Y-m-d"); 
                                                    echo $formattedDeadline;
                                                ?>
                                            </td>

                                            <td>
                                                $<?php echo $row['amount']?>
                                            </td>

                                            <td>Job Order</td>

                                            <td>
                                                <button>
                                                    <svg viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M154 260h568v700H154z" fill="#FF3B30"></path><path d="M624.428 261.076v485.956c0 57.379-46.737 103.894-104.391 103.894h-362.56v107.246h566.815V261.076h-99.864z" fill="#030504"></path><path d="M320.5 870.07c-8.218 0-14.5-6.664-14.5-14.883V438.474c0-8.218 6.282-14.883 14.5-14.883s14.5 6.664 14.5 14.883v416.713c0 8.219-6.282 14.883-14.5 14.883zM543.5 870.07c-8.218 0-14.5-6.664-14.5-14.883V438.474c0-8.218 6.282-14.883 14.5-14.883s14.5 6.664 14.5 14.883v416.713c0 8.219-6.282 14.883-14.5 14.883z" fill="#152B3C"></path><path d="M721.185 345.717v-84.641H164.437z" fill="#030504"></path><path d="M633.596 235.166l-228.054-71.773 31.55-99.3 228.055 71.773z" fill="#FF3B30"></path><path d="M847.401 324.783c-2.223 0-4.475-0.333-6.706-1.034L185.038 117.401c-11.765-3.703-18.298-16.239-14.592-27.996 3.706-11.766 16.241-18.288 27.993-14.595l655.656 206.346c11.766 3.703 18.298 16.239 14.592 27.996-2.995 9.531-11.795 15.631-21.286 15.631z" fill="#FF3B30"></path></g></svg>
                                                </button>
                                            </td>

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

            <!-- milestone orders -->
            <div id="milestone" class="ordercontent" style="display: none;">
                milestone order
                <!-- Tabs -->
                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'Milestone_Requested')" id="defaultOpen_Milestone">Requested</button>
                    <button class="tablinks" onclick="openCity(event, 'Milestone_Accepted')">Accepted</button>
                    <button class="tablinks" onclick="openCity(event, 'Milestone_Running')">Running</button>
                    <button class="tablinks" onclick="openCity(event, 'Milestone_Completed')">Completed</button>
                    <button class="tablinks" onclick="openCity(event, 'Milestone_Late')">Late</button>
                    <button class="tablinks" onclick="openCity(event, 'Milestone_Cancelled')">Cancelled</button>
                    
                    <div id="Milestone_Requested"></div>  
                    <div id="Milestone_Accepted"></div>  
                    <div id="Milestone_Running"></div>  
                    <div id="Milestone_Completed"></div>  
                    <div id="Milestone_Late"></div>  
                    <div id="Milestone_Cancelled"></div>  
                
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