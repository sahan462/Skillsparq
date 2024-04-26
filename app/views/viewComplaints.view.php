<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assests/css/viewComplaints.styles.css" />
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />


    <title>Admin Dashboard Panel</title>
</head>

<body>
    <?php include "components/helpCenter.component.php"; ?>


    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">Complaint no: <?php echo $data['inquiryId']
                                                    ?></span>
            </div>

        </div>
    </div>



    <div class="grid">
        <?php
        foreach ($viewComplaint as $row) {
        ?>
            <ul>
                <li>Inquiry_ID <span><?php echo $row['inquiry_id']; ?></span></li>
                <li>Subject: <span><?php echo $row['subject']; ?></span></li>
                <li>Description: <span><?php echo $row['description']; ?></span></li>
                <li>Attachments: <span><?php echo $row['attachements']; ?></span></li>
                <li>Response: <span><?php echo $row['response']; ?></span></li>
                <li>Inquiry_status: <span><?php echo $row['inquiry_status']; ?></span></li>
                <li>Created_at: <span><?php echo $row['created_at']; ?></span></li>
            </ul>
        <?php
        }
        ?>
        <div class="block">
            <div>


                <button id="chatBtnSeller">Chat Seller</button>
                <div id="chatBoxSeller" class="chat-box">
                    <div class="chat-header">
                        <h2>Chat Seller</h2>
                        <button id="closeChatBtnSeller" style="width: 25px;"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                    <div class="chat-messages">

                        <ul>
                            <li>Inquiry_ID <span><?php echo $row['inquiry_id']; ?></span></li>
                            <li>Subject: <span><?php echo $row['subject']; ?></span></li>
                            <li>Description: <span><?php echo $row['description']; ?></span></li>
                            <li>Attachments: <span><?php echo $row['attachements']; ?></span></li>
                            <li>Response: <span><?php echo $row['response']; ?></span></li>
                            <li>Inquiry_status: <span><?php echo $row['inquiry_status']; ?></span></li>
                            <li>Created_at: <span><?php echo $row['created_at']; ?></span></li>
                        </ul>

                    </div>
                    <div class="chat-input">
                        <input type="text" placeholder="Type your message here...">
                        <button id="sendBtn">Send</button>
                    </div>
                </div>






                <button id="chatBtnBuyer">Chat Buyer</button>
                <div id="chatBoxBuyer" class="chat-box">
                    <div class="chat-header">
                        <h2>Chat Buyer</h2>
                        <button id="closeChatBtnBuyer" style="width: 25px;"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                    <div class="chat-messages">
                        <?php
                        $count = 1;
                        while ($count < 10) {
                            if ($count % 2 == 0) {
                                echo "<li style='color:green; text-align:right; margin-right:10px'>" . 'Hello Manil. How are you. Im fine' .  "</li>";
                            } else {
                                echo "<li style='color:red; text-align:left; margin-left:10px'>" .  'Hello Manil. I think Im fine. Nice to meet you'  . "</li>";
                            }
                            $count++;
                        }
                        ?>


                    </div>
                    <div class="chat-input">
                        <input type="text" placeholder="Type your message here...">
                        <button id="sendBtn">Send</button>
                    </div>
                </div>




            </div>





            <div>
                <label for="blacklistDuration">BlackList User For:</label>

                <select id="blacklistDuration" name="blacklistDuration">
                    <option value="1">1 day</option>
                    <option value="2">2 days</option>
                    <option value="7">7 days</option>
                    <option value="14">14 days</option>
                    <option value="30">30 days</option>
                    <!-- Add more options as needed -->
                </select>
                <form>

                    <textarea id="blackListReason" name="blackListReason" rows="4" cols="50" placeholder="Enter the reason to blacklist" style="margin-top: 5px;"></textarea>
                    <br>

                </form>
            </div>

            <div style=" margin-top: 15px;">
                <button id="updateUserBlacklistBuyer" onclick="updateUserBlacklistBuyer()">Black List Buyer</button>
                <button id="updateUserBlacklistSeller" onclick="updateUserBlacklistSeller()">Black List Seller</button>

            </div>


            <form>

                <textarea id="response" name="response" rows="4" cols="50" placeholder="Enter the reason to ask for refund" style="display: none;"></textarea>
                <br>

            </form>
            <div style="margin-top: 15px;">
                <button id="displayRefund" onclick="displayRefund()">Ask for Refund</button>
            </div>
            <div style="margin-top: 15px;">
                <button id="refund" onclick="refund()" style="display:none">Ask for Refund</button>
            </div>





        </div>


    </div>

    <div class="grid">
        <div>
            <div style=" display: flex; justify-content:space-between; margin-bottom: 2%; width:250px">
                <span>
                    Seller details:
                </span>
                <button onclick="toggleDisplay('viewSeller')">View</button>
            </div>
            <div id="viewSeller" style="display: none;">

                <ul>
                    <li>User_ID <span><?php echo $row['seller_id']; ?></span></li>
                    <li>Seller_email: <span><?php echo $row['seller_email']; ?></span></li>
                    <li>Role: <span><?php echo $row['seller_role']; ?></span></li>
                    <li>Agreement: <span><?php echo $row['seller_agreement']; ?></span></li>
                    <li> </li>

                </ul>

            </div>

            <div style="display: flex; justify-content:space-between; width:250px ;margin-bottom: 2%;">
                <span>
                    Buyer details:
                </span>
                <button onclick="toggleDisplay('viewBuyer')" style="margin-left:63px ;">View</button>
                <p id="isBuyerBlocked"></p>
            </div>

            <div id="viewBuyer" style="display: none;">

                <ul>
                    <li>Buyer ID <span><?php echo $row['buyer_id']; ?></span></li>
                    <li>Buyer email: <span><?php echo $row['buyer_email']; ?></span></li>
                    <li>Buyer agreement: <span><?php echo $row['buyer_agreement']; ?></span></li>

                </ul>

            </div>

            <div style="display: flex; justify-content:space-between; width:250px ;margin-bottom: 2%; ;">
                <span>
                    Order details:
                </span>
                <button onclick="toggleDisplay('viewOrders')" style="margin-left:11px ;">View</button>

            </div>

            <div id="viewOrders" style="display: none;">

                <ul>
                    <li>Order_ID <span><?php echo $row['order_id']; ?></span></li>
                    <li>Order Status: <span><?php echo $row['order_state']; ?></span></li>
                    <li>Order Type: <span><?php echo $row['order_type']; ?></span></li>
                    <li>Order Created at: <span><?php echo $row['order_created_date']; ?></span></li>
                </ul>

            </div>

            <div style="display: flex; justify-content:space-between; width:250px ;">
                <span>
                    Payment details:
                </span>
                <button onclick="toggleDisplay('viewPayments')" style="margin-left:11px ;">View</button>

            </div>


            <div id="viewPayments" style="display: none;">

                <ul>
                    <li>Payment ID : <span><?php echo $row['payment_id']; ?></span></li>
                    <li>amount: <span><?php echo $row['amount']; ?></span></li>
                    <li>payment_date: <span><?php echo $row['payment_date']; ?></span></li>
                    <li>payment_description: <span><?php echo $row['payment_description']; ?></span></li>
                    <li>payment_status: <span><?php echo $row['payment_status']; ?></span></li>
                </ul>

            </div>
        </div>
        <form id="blacklistForm" method="post" style="display: none;">
            <input type="hidden" id="user_id_to_blacklist" name="user_id_to_blacklist" value="">
            <input type="hidden" id="user_email_to_blacklist" name="user_email_to_blacklist" value="">
            <input type="hidden" id="blacklistUntil" name="blacklistUntil" value="">
            <input type="hidden" id="reason" name="reason" value="">
            <input type="hidden" id="role" name="role" value="">

        </form>


        <form id="refundForm" method="post" style="display: none;">
            <input type="hidden" id="payment_id" name="payment_id" value="">
            <input type="hidden" id="sendResponse" name="sendResponse" value="">
            <input type="hidden" id="buyerID" name="buyerID" value="">
        </form>

    </div>
    </section>

    <script>
        // Helper functions to toggle display of elements
        function toggleDisplay(elementId) {
            const element = document.getElementById(elementId);
            element.style.display = (element.style.display === 'none') ? 'block' : 'none';
        }

        // Blacklist and Refund Functionality
        function confirmAction(message, callback) {
            if (confirm(message)) {
                callback();
            } else {
                alert("Operation canceled.");
            }
        }

        function blacklistUser(userId, userEmail, role, days, reason) {
            document.getElementById('user_id_to_blacklist').value = userId;
            document.getElementById('user_email_to_blacklist').value = userEmail;
            document.getElementById('blacklistUntil').value = days;
            document.getElementById('reason').value = reason;
            document.getElementById('role').value = role;
            document.getElementById('blacklistForm').submit();
        }

        function submitRefund(paymentId, response, buyerID) {
            document.getElementById("payment_id").value = paymentId;
            document.getElementById("sendResponse").value = response;
            document.getElementById("buyerID").value = buyerID;
            document.getElementById("refundForm").submit();
        }

        // Event Handlers
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("chatBtnSeller").onclick = function() {
                toggleDisplay("chatBoxSeller");
                document.getElementById("chatBoxBuyer").style.display = "none";
            };

            document.getElementById("chatBtnBuyer").onclick = function() {
                toggleDisplay("chatBoxBuyer");
                document.getElementById("chatBoxSeller").style.display = "none";
            };

            document.getElementById("closeChatBtnSeller").onclick = function() {
                document.getElementById("chatBoxSeller").style.display = "none";
            };

            document.getElementById("closeChatBtnBuyer").onclick = function() {
                document.getElementById("chatBoxBuyer").style.display = "none";
            };

            document.getElementById("updateUserBlacklistBuyer").onclick = function() {
                const days = document.getElementById('blacklistDuration').value;
                const reason = document.getElementById('blackListReason').value;
                confirmAction(`Are you sure you want to blacklist Buyer ID for ${days} days?`, function() {
                    blacklistUser('<?php echo $row['buyer_id']; ?>', '<?php echo $row['buyer_email']; ?>', 'Buyer', days, reason);
                });
            };

            document.getElementById("updateUserBlacklistSeller").onclick = function() {
                const days = document.getElementById('blacklistDuration').value;
                const reason = document.getElementById('blackListReason').value;
                confirmAction(`Are you sure you want to blacklist Seller ID for ${days} days?`, function() {
                    blacklistUser('<?php echo $row['seller_id']; ?>', '<?php echo $row['seller_email']; ?>', 'Seller', days, reason);
                });
            };


            document.getElementById("refund").onclick = function() {
                const response = document.getElementById("response").value;
                const paymentId = '<?php echo $row['payment_id']; ?>';
                const buyerID = '<?php echo $row['buyer_id']; ?>';
                confirmAction('Are you sure that you want to send a refund request to the admin?', function() {
                    submitRefund(paymentId, response, buyerID);
                });
            };



            // View toggles
            document.getElementById("viewSeller").onclick = function() {
                toggleDisplay('viewSeller');
            };

            document.getElementById("viewBuyer").onclick = function() {
                toggleDisplay('viewBuyer');
            };

            document.getElementById("viewOrders").onclick = function() {
                toggleDisplay('viewOrders');
            };

            document.getElementById("viewPayments").onclick = function() {
                toggleDisplay('viewPayments');
            };

            document.getElementById("displayRefund").onclick = function() {
                document.getElementById('response').style.display = 'block';
                document.getElementById('refund').style.display = 'block';
                document.getElementById('displayRefund').style.display = 'none';
                document.getElementById('hideRefund').style.display = 'block';
            };
        });
    </script>