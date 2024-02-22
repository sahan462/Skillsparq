<?php

    if($_SESSION['role'] == 'Buyer'){
        include "components/buyerSimpleHeader.component.php";
    }else if($_SESSION['role'] == 'Seller'){
        include "components/sellerHeader.component.php";
    }

    $myOrders = $data['myOrders'];
    print_r($myOrders);

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
                <button class="tablinks" onclick="openCity(event, 'Requests')" id = "defaultOpen">Requests</button>
                <button class="tablinks" onclick="openCity(event, 'Accepted')">Accepted</button>
                <button class="tablinks" onclick="openCity(event, 'Rejected')">Rejected</button>
                <button class="tablinks" onclick="openCity(event, 'Active')">Active</button>
                <button class="tablinks" onclick="openCity(event, 'Completed')">Completed</button>
                <button class="tablinks" onclick="openCity(event, 'Late')">Late</button>
            </div>

            <!-- Tab content -->

            <!-- order requests -->
            <div id="Requests" class="tabcontent">
                <div class="outerTable">
                    <table>
                        <div class="thead">
                            <tr>
                                <th style="width: 2%;"></th>
                                <th style="width: 28%;">Buyer</th>
                                <th style="width: 30%;">Gig</th>
                                <th style="width: 10%;">Due On</th>
                                <th style="width: 10%;">Total Amount</th>
                                <th style="width: 10%;">Order Type</th>
                            </tr>
                        </div>
                        <div class="tbody">
                            <?php 
                                $i = 0;
                                while($i < 1){
                            ?>
                                    <tr onclick="window.location='order&orderId=1';">
                                        <td><?php echo $i+1 ?></td>
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
                                    $i = $i + 1;
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
                            <tr style="position: sticky, top: 0;">
                                <th style="width: 2%;"></th>
                                <th style="width: 28%;">Buyer</th>
                                <th style="width: 30%;">Gig</th>
                                <th style="width: 10%;">Due On</th>
                                <th style="width: 10%;">Total Amount</th>
                                <th style="width: 10%;">Order Type</th>
                            </tr>
                        </div>
                        <div class="tbody">
                            <?php 
                                $i = 0;
                                while($i < 20){
                            ?>
                                    <tr onclick="window.location='#';">
                                        <td><?php echo $i+1 ?></td>
                                        <td class="buyer">
                                            <span>Kumar Sanagakkara</span>
                                        </td>
                                        <td>I will architect your hotel</td>
                                        <td>5 Sep</td>
                                        <td>$5000</td>
                                        <td>Package Order</td>
                                    </tr>
                            <?php 
                                    $i = $i + 1;
                                }
                            ?>
                        </div>
                    </table>
                </div>
            </div>

            <!-- rejected orders -->
            <div id="Rejected" class="tabcontent">
                <div class="outerTable">
                    <table>
                        <div class="thead">
                            <tr style="position: sticky, top: 0;">
                                <th style="width: 2%;"></th>
                                <th style="width: 28%;">Buyer</th>
                                <th style="width: 30%;">Gig</th>
                                <th style="width: 10%;">Due On</th>
                                <th style="width: 10%;">Total Amount</th>
                                <th style="width: 10%;">Order Type</th>
                            </tr>
                        </div>
                        <div class="tbody">
                            <?php 
                                $i = 0;
                                while($i < 20){
                            ?>
                                    <tr onclick="window.location='#';">
                                        <td><?php echo $i+1 ?></td>
                                        <td class="buyer">
                                            <img src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?q=80&amp;w=2071&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Avatar">
                                            <span>Ann Perera</span>
                                        </td>
                                        <td>I will create wordpress websites</td>
                                        <td>5 Sep</td>
                                        <td>3 July</td>
                                        <td>Package Order</td>
                                    </tr>
                            <?php 
                                    $i = $i + 1;
                                }
                            ?>
                        </div>
                    </table>
                </div>
            </div>

            <!-- running orders -->
            <div id="Active" class="tabcontent">
                <div class="outerTable">
                    <table>
                        <div class="thead">
                            <tr style="position: sticky, top: 0;">
                                <th style="width: 2%;"></th>
                                <th style="width: 28%;">Buyer</th>
                                <th style="width: 30%;">Gig</th>
                                <th style="width: 10%;">Due On</th>
                                <th style="width: 10%;">Total Amount</th>
                                <th style="width: 10%;">Order Type</th>
                            </tr>
                        </div>
                        <div class="tbody">
                            <?php 
                                $i = 0;
                                while($i < 20){
                            ?>
                                    <tr onclick="window.location='#';">
                                        <td><?php echo $i+1 ?></td>
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
                                    $i = $i + 1;
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
                            <tr style="position: sticky, top: 0;">
                                <th style="width: 2%;"></th>
                                <th style="width: 28%;">Buyer</th>
                                <th style="width: 30%;">Gig</th>
                                <th style="width: 10%;">Due On</th>
                                <th style="width: 10%;">Delivered At</th>
                                <th style="width: 10%;">Total Amount</th>
                                <th style="width: 10%;">Status</th>
                            </tr>
                        </div>
                        <div class="tbody">
                            <?php 
                                $i = 0;
                                while($i < 20){
                            ?>
                                    <tr onclick="window.location='#';">
                                        <td><?php echo $i+1 ?></td>
                                        <td class="buyer">
                                            <img src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?q=80&amp;w=2071&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Avatar">
                                            <span>Ann Perera</span>
                                        </td>
                                        <td>I will create wordpress websites</td>
                                        <td>5 Sep</td>
                                        <td>3 July</td>
                                        <td>$5000</td>
                                        <td>-</td>
                                    </tr>
                            <?php 
                                    $i = $i + 1;
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
                            <tr style="position: sticky, top: 0;">
                                <th style="width: 2%;"></th>
                                <th style="width: 28%;">Buyer</th>
                                <th style="width: 30%;">Gig</th>
                                <th style="width: 10%;">Due On</th>
                                <th style="width: 10%;">Delivered At</th>
                                <th style="width: 10%;">Total Amount</th>
                                <th style="width: 10%;">Order Type</th>
                            </tr>
                        </div>
                        <div class="tbody">
                            <?php 
                                $i = 0;
                                while($i < 20){
                            ?>
                                    <tr onclick="window.location='#';">
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
                                    $i = $i + 1;
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