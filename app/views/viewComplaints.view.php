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
    <style>
        .container-details {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            margin-bottom: 2%;
            max-width: 1000px;
            /* Adjust the width as needed */
            margin: 0 auto;
            /* Center the container */
            gap: 20px;
        }

        .seller-details,
        .buyer-details {
            flex: 1;
            /* Each section takes equal width */
            background: #ffffff;
            /* White background */
            padding: 15px;
            border-radius: 8px;
            /* Rounded corners */
            border: 2px solid #dcdcdc;
            /* Light grey border */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 5px;
            /* 
            /* This makes each take roughly half the container width, you can adjust as needed */
        }

        details {
            width: 100%;
            /* Details take the full width of the section */
            display: none;
            /* Hidden by default */
            margin-top: 10px;
            /* Space between the button and the details */
            padding: 10px;
            border-top: 2px solid #dcdcdc;/
        }

        .seller-details button,
        .buyer-details button {
            display: block;
            /* Make the button a block element to fill the width of its container */
            width: 100%;
            /* Optional: if you want the button to be as wide as the container */
            margin-top: 5px;
            /* Add some space between the button and the title */
            /* Add other styles for the button here */
        }
    </style>
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
                <li>Attachments:
                    <span>
                        <?php echo htmlspecialchars($row['attachements']); ?> <!-- Assuming the correct key is 'attachments' -->
                        <a href="./assets/zipFiles/orderFiles/Order_23/deliveries/<?php echo urlencode($row['attachements']); ?>" download>
                            <i class="fa fa-download"></i>

                        </a>
                    </span>
                </li>

                <li>Response: <span><?php echo $row['response']; ?></span></li>
                <li>Inquiry_status: <span><?php echo $row['inquiry_status']; ?></span></li>
                <li>Created_at: <span><?php echo $row['created_at']; ?></span></li>
            </ul>
        <?php
        }
        ?>
        <div class=" block">
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








        </div>


    </div>

    <div class="grid">
        <div>
            <div class="container-details">
                <div class="seller-details">
                    <div style=" display: flex; justify-content:space-between; margin-bottom: 2%; width:250px">
                        <span>
                            Seller details:
                        </span>
                        <button onclick="viewSeller()">View</button>
                    </div>
                    <div id="viewSeller" class="details" style="display: none;">

                        <ul>
                            <li>User_ID <span><?php echo $row['seller_id']; ?><a href="userProfile?user_id=<?php echo $row["seller_id"]; ?>"><i class="fa fa-eye"></i></a></span></li>
                            <li>Seller_email: <span><?php echo $row['seller_email']; ?></span></li>
                            <li>Role: <span><?php echo $row['seller_role']; ?></span></li>
                            <li>Agreement: <span><?php echo $row['seller_agreement']; ?></span></li>
                            <li> </li>

                        </ul>

                    </div>
                </div>
                <div class="buyer-details">
                    <div style="display: flex; justify-content:space-between; width:250px ;margin-bottom: 2%;">
                        <span>
                            Buyer details:
                        </span>
                        <button onclick="viewBuyer()" style="margin-left:63px ;">View</button>
                        <p id="isBuyerBlocked"></p>
                    </div>

                    <div id="viewBuyer" class="details" style="display: none;">

                        <ul>
                            <li>Buyer ID <span><?php echo $row['buyer_id']; ?></span></li>
                            <li>Buyer email: <span><?php echo $row['buyer_email']; ?></span></li>
                            <li>Buyer agreement: <span><?php echo $row['buyer_agreement']; ?></span></li>

                        </ul>

                    </div>
                </div>

            </div>

            <div class="container-details">
                <div class="seller-details">
                    <div style="display: flex; justify-content:space-between; width:250px ;margin-bottom: 2%; ;">
                        <span>
                            Order details:
                        </span>
                        <button onclick="viewOrders()" style="margin-left:11px ;">View</button>
                    </div>

                    <div id="viewOrders" style="display: none;">

                        <ul>
                            <li>Order_ID <span><?php echo $row['order_id']; ?></span></li>
                            <li>Order Status: <span><?php echo $row['order_state']; ?></span></li>
                            <li>Order Type: <span><?php echo $row['order_type']; ?></span></li>
                            <li>Order Created at: <span><?php echo $row['order_created_date']; ?></span></li>
                        </ul>

                    </div>
                </div>
                <div class="buyer-details">
                    <div style="display: flex; justify-content:space-between; width:250px ;">
                        <span>
                            Payment details:
                        </span>
                        <button onclick="viewPayments()" style="margin-left:11px ;">View</button>

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

            </div>
            <div class="block" style="margin-left:25%; margin-top:100px">

                <form>

                    <textarea id="responseCSA" name="responseCSA" rows="4" cols="50" placeholder="Enter the reason to ask for refund" style="display: block;"></textarea>
                    <br>

                </form>

                <div style="margin-top: 15px; width:400px; margin-left:0%">
                    <button id="refund" onclick="refundCSA()" style="display:block">Ask for Refund</button>
                </div>
            </div>
            <form id="blacklistForm" method="post" style="display: none;">
                <input type="hidden" id="user_id_to_blacklist" name="user_id_to_blacklist" value="">
                <input type="hidden" id="user_email_to_blacklist" name="user_email_to_blacklist" value="">
                <input type="hidden" id="blacklistUntil" name="blacklistUntil" value="">
                <input type="hidden" id="reason" name="reason" value="">
            </form>


            <form id="refundForm" method="post" style="display: none;">
                <input type="hidden" id="payment_id" name="payment_id" value="">
                <input type="hidden" id="sendResponse" name="sendResponse" value="">
                <input type="hidden" id="buyerID" name="buyerID" value="">
            </form>

        </div>
        </section>

        <script>
            function updateUserBlacklistBuyer() {
                var selectedDays = document.getElementById('blacklistDuration').value;
                var reason = document.getElementById('blackListReason').value;
                var confirmation = confirm("Are you sure you want to blacklist Buyer ID for " + selectedDays + " days?");

                if (confirmation) {
                    document.getElementById('user_id_to_blacklist').value = '<?php echo $row['buyer_id']; ?>';
                    document.getElementById('user_email_to_blacklist').value = '<?php echo $row['buyer_email']; ?>';
                    document.getElementById('blacklistUntil').value = selectedDays;
                    document.getElementById('reason').value = reason;
                    document.getElementById('blacklistForm').submit();
                } else {
                    alert("Operation canceled.");
                }
            }


            function updateUserBlacklistSeller() {

                var selectedDays = document.getElementById('blacklistDuration').value;
                var reason = document.getElementById('blackListReason').value;
                var confirmation = confirm("Are you sure you want to blacklist Seller ID: <?php echo $row['seller_id']; ?> for " + selectedDays + " days?");

                if (confirmation) {
                    document.getElementById('user_id_to_blacklist').value = '<?php echo $row['seller_id']; ?>';
                    document.getElementById('user_email_to_blacklist').value = '<?php echo $row['seller_email']; ?>';
                    document.getElementById('blacklistUntil').value = selectedDays;
                    document.getElementById('reason').value = reason;

                } else {
                    alert("Operation canceled.");
                }

            }



            function refundCSA() {
                var responseCSA = document.getElementById("blacklistDuration").value;
                var confirmation = confirm('Are you sure that you want to send a refund request to the admin?');
                var buyerID = <?php echo $row['buyer_id'] ?> // Ensure this doesn't break JavaScript if null
                var paymentId = <?php echo $row['payment_id'] ?> // Ensure this doesn't break JavaScript if null

                if (confirmation) {
                    document.getElementById("payment_id").value = paymentId;
                    document.getElementById("sendResponse").value = responseCSA; // Make sure to use responseCSA
                    document.getElementById("buyerID").value = buyerID;
                    document.getElementById("refundForm").submit();
                }
            }



            function viewSeller() {
                var selectedDays = document.getElementById('viewSeller');
                selectedDays.style.display = (selectedDays.style.display === 'none') ? 'block' : 'none';

            }

            function viewBuyer() {
                var selectedDays = document.getElementById('viewBuyer');
                selectedDays.style.display = (selectedDays.style.display === 'none') ? 'block' : 'none';

            }

            function viewOrders() {
                var selectedDays = document.getElementById('viewOrders');
                selectedDays.style.display = (selectedDays.style.display === 'none') ? 'block' : 'none';

            }


            function viewPayments() {
                var selectedDays = document.getElementById('viewPayments');
                selectedDays.style.display = (selectedDays.style.display === 'none') ? 'block' : 'none';

            }
        </script>