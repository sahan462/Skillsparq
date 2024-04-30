<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assests/css/viewComplaintDetails.styles.css" />
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
            /* Add o
            
            ther styles for the button here */
        }

        .chatBtnSeller {
            display: inline-block;
            padding: 8px 12px;
            background-color: #007BFF;
            color: white;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            /* Removes underline from links */
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .resolveBtn {
            display: inline-block;
            padding: 8px 12px;
            background-color: #ff4500;
            /* A bold color to denote action, such as resolving issues */
            color: white;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            /* Removes underline from links */
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .resolveBtn:hover,
        .resolveBtn:focus {
            background-color: #c03600;
            /* Darken color on hover for better user interaction */
            color: white;
            text-decoration: none;
            /* Ensures the underline does not reappear on hover */
        }

        .resolveBtn i {
            margin-right: 5px;
            /* Adds spacing between the icon and text */
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
                        <a href="../public/assests/zipFiles/complaints/<?php echo $row['attachements'] ?>" download="">Download File</a>
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

        <div class="container-details" style="margin-bottom:10px;">
            <div class="seller-container">

                <a href="viewChats?order_id=<?php echo $row['order_id']; ?>&buyer_id=<?php echo $row['buyer_id']; ?>&seller_id=<?php echo $row['seller_id']; ?>" class="chatBtnSeller">
                    <i class="fa fa-comments"></i> View chat History
                </a>
            </div>

        </div>

        <div class="container-details">
            <div class="seller-container">
                <button onclick="resolveComplaintfunc()" class="chatBtnSeller" style="width: 190px; background-color:green; height: 38px;">
                    <i class="fa fa-gavel"></i> Resolve Complaints
                </button>
                <form>
            </div>
        </div>
        <div class="container-details">
            <div class="seller-container">
                <form>
                    <textarea id="reasonBuyer" name="reasonBuyer" rows="4" cols="50" placeholder="Enter the reason to Buyer" style="margin-top: 5px; "></textarea>
                    <br>

                </form>
            </div>
        </div>













        <div class="container-details" style="margin-top:20px;">
            <div class="seller-details">
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
                <div class="seller-details" style=" margin-top: 15px;">
                    <button id="updateUserBlacklistBuyer" onclick="updateUserBlacklistBuyer()" style="width: 190px; height:32px; background-color:green">Black List Buyer</button>
                    <button id="updateUserBlacklistSeller" onclick="updateUserBlacklistSeller()" style="width: 190px; height:32px; background-color:green">Black List Seller</button>

                </div>
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


            </div>

            <div>
                <div class="seller-details">
                    <div style="display: flex; justify-content:space-between; width:250px ;margin-bottom: 2%;">
                        <span>
                            Buyer details:
                        </span>
                        <button onclick="viewBuyer()">View</button>

                    </div>

                    <div id="viewBuyer" class="details" style="display: none;">

                        <ul>
                            <li>Buyer ID <span><?php echo $row['buyer_id']; ?><a href="userProfileBuyer?user_id=<?php echo $row["buyer_id"]; ?>"><i class="fa fa-eye"></i></a></span></li>
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
                        <button onclick="viewOrders()">View</button>
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




            </div>

            <div class="container-details">
                <div class="buyer-details">
                    <div style="display: flex; justify-content:space-between; width:250px ;">
                        <span>
                            Payment details:
                        </span>
                        <button onclick="viewPayments()">View</button>

                    </div>


                    <div id="viewPayments" style="display: none;">

                        <ul>
                            <li>Payment ID : <span><?php echo $row['payment_id']; ?></span></li>
                            <li>amount: <span><?php echo $row['amount']; ?></span></li>
                            <li>payment_date: <span><?php echo $row['payment_date']; ?></span></li>
                            <li>payment_description: <span><?php echo $row['payment_description']; ?></span></li>
                            <li>payment_status: <span><?php echo $row['payment_state']; ?></span></li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="container-details">
                <div class="buyer-details">
                    <div style="display: flex; justify-content:space-between; width:250px ;">
                        <span>
                            Delivery details:
                        </span>
                        <button onclick="viewDeliveries()">View</button>

                    </div>


                    <div id="viewDeliveries" style="display: none;">
                        <?php foreach ($deliveries as $deliver) { ?>
                            <div style="border-style:double">
                                <ul>
                                    <li>Delivery ID : <span><?php echo $deliver['delivery_id']; ?></span></li>
                                    <li>Delivery Description: <span><?php echo $deliver['delivery_description']; ?></span></li>
                                    <li>Attachments:
                                        <span>
                                            <?php echo htmlspecialchars($deliver['attachements']); ?> <!-- Assuming the correct key is 'attachments' -->
                                            <a href="../public/assests/zipFiles/complaints/<?php echo $row['attachements'] ?>" download="">Download File</a>
                                            <i class="fa fa-download"></i>

                                            </a>
                                        </span>
                                    </li>
                                    <li>date: <span><?php echo $deliver['date']; ?></span></li>

                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="container-details">
                <div class="seller-details" style=" margin-top:30px ">

                    <form>

                        <textarea id="responseCSA" name="responseCSA" rows="4" cols="50" placeholder="Enter the reason to ask for refund" style="display: block;"></textarea>
                        <br>

                    </form>

                    <div style="margin-top: 15px; width:400px; margin-left:0%">
                        <button id="refund" onclick="refundCSA()" style="width: 190px; margin-left:27%; height:32px; background-color:green">Ask for Refund</button>
                    </div>
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

            <form id="resolveComplaint" method="post" style="display: none;">
                <input type="hidden" id="seller_id_email" name="seller_id_email" value="">
                <input type="hidden" id="buyer_id_email" name="buyer_id_email" value="">
                <input type="hidden" id="resolveBuyer" name="resolveBuyer" value="">
                <input type="hidden" id="complaint_id" name="complaint_id" value="">

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
                var confirmation = confirm("Are you sure you want to blacklist seller ID: <?php echo $row['seller_id']; ?> for " + selectedDays + " days?");

                if (confirmation) {
                    document.getElementById('user_id_to_blacklist').value = '<?php echo $row['seller_id']; ?>';
                    document.getElementById('user_email_to_blacklist').value = '<?php echo $row['seller_email']; ?>';
                    document.getElementById('blacklistUntil').value = selectedDays;
                    document.getElementById('reason').value = reason;
                    document.getElementById('blacklistForm').submit();
                } else {
                    alert("Operation canceled.");
                }

            }



            function refundCSA() {
                var responseCSA = document.getElementById("responseCSA").value;
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

            function viewDeliveries() {
                var selectedDays = document.getElementById('viewDeliveries');
                selectedDays.style.display = (selectedDays.style.display === 'none') ? 'block' : 'none';

            }

            function chatBuyer() {
                var chatBoxes = document.getElementsByClassName("chat-box");
                for (var i = 0; i < chatBoxes.length; i++) {
                    chatBoxes[i].style.display = 'block'; // Set display style to
                }
            }

            function resolveComplaintfunc() {

                var reasonBuyer = document.getElementById('reasonBuyer').value;
                if (reasonBuyer === "") {
                    alert("please enter a valid reason ")
                    return false
                }
                var confirmation = confirm("Do you want to send mails and solve the complaint");

                if (confirmation) {

                    document.getElementById('seller_id_email').value = '<?php echo $row['seller_email']; ?>';
                    document.getElementById('buyer_id_email').value = '<?php echo $row['buyer_email']; ?>';
                    document.getElementById('resolveBuyer').value = reasonBuyer;
                    document.getElementById('complaint_id').value = '<?php echo $row['inquiry_id']; ?>';

                    document.getElementById('resolveComplaint').submit();


                } else {
                    alert("Operation canceled.");
                }
            }
        </script>