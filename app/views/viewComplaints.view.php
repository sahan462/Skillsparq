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
                <label for="blacklistUntil">BlackList User For:</label>

                <select id="blacklistUntil" name="blacklistUntil">
                    <option value="1">1 day</option>
                    <option value="2">2 days</option>
                    <option value="7">7 days</option>
                    <option value="14">14 days</option>
                    <option value="30">30 days</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div style="margin-top: 15px;">
                <button id="refund" onclick="refund()">Ask for Refund</button>
            </div>
            <div style="margin-top: 15px;">
                <button id="updateUserBlacklistBuyer" onclick="updateUserBlacklistBuyer()">Black List Buyer</button>
                <button id="updateUserBlacklistSeller" onclick="updateUserBlacklistSeller()">Black List Seller</button>

            </div>





        </div>


    </div>

    <div class="grid">
        <div>
            <div style=" display: flex; justify-content:space-between; margin-bottom: 2%; width:250px">
                <span>
                    Seller details:
                </span>
                <button onclick="viewSeller()">View</button>
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
                <button onclick="viewBuyer()" style="margin-left:63px ;">View</button>
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

        <form id="blacklistForm" method="post" style="display: none;">
            <input type="hidden" id="user_id_to_blacklist" name="user_id_to_blacklist" value="">
            <input type="hidden" id="blacklistUntil" name="blacklistUntil" value="">

        </form>

        <form id="refundForm" method="post" style="display: none;">
            <input type="hidden" id="sendRefund" name="sendRefund" value="">
            <input type="hidden" id="payment_id" name="payment_id" value="">

        </form>

    </div>
    </section>

    <script>
        const body = document.querySelector("body"),
            modeToggle = body.querySelector(".mode-toggle");
        sidebar = body.querySelector("nav");
        sidebarToggle = body.querySelector(".sidebar-toggle");

        let getMode = localStorage.getItem("mode");
        if (getMode && getMode === "dark") {
            body.classList.toggle("dark");
        }

        let getStatus = localStorage.getItem("status");
        if (getStatus && getStatus === "close") {
            sidebar.classList.toggle("close");
        }

        modeToggle.addEventListener("click", () => {
            body.classList.toggle("dark");
            if (body.classList.contains("dark")) {
                localStorage.setItem("mode", "dark");
            } else {
                localStorage.setItem("mode", "light");
            }
        });

        sidebarToggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
            if (sidebar.classList.contains("close")) {
                localStorage.setItem("status", "close");
            } else {
                localStorage.setItem("status", "open");
            }
        })
    </script>
    <script>
        function updateUserBlacklistBuyer() {
            var selectedDays = document.getElementById('blacklistUntil').value;
            var confirmAction = confirm("Are you sure you want to blackList Buyer ID <?php echo $row['buyer_id'] ?> for " + selectedDays + " days");

            if (confirmAction) {
                document.getElementById('user_id_to_blacklist').value = <?php echo $row['buyer_id']; ?>;

                // Get the selected value from the dropdown
                var selectedDays = document.getElementById('blacklistUntil').value;

                // Set the selected value in the hidden field
                document.getElementById('blacklistForm').elements['blacklistUntil'].value = selectedDays;

                // Submit the form
                document.getElementById('blacklistForm').submit();
                alert("User ID blocked successfully until " + selectedDays + " days.");
            } else {
                alert("Operation canceled.");
            }
        }

        function refund() {

            var confirmation = confirm('Are you sure that you want to send a refund request to the admin')

            if (confirmation) {

                document.getElementById("refundForm").elements['sendRefund'].value = 1
                document.getElementById("refundForm").elements['payment_id'].value = 1
                document.getElementById("refundForm").submit()

            }

        }

        function updateUserBlacklistSeller() {
            var selectedDays = document.getElementById('blacklistUntil').value;
            var confirmAction = confirm("Are you sure you want to blackList Seller ID <?php echo $row['seller_id'] ?> for" + selectedDays + " days");

            if (confirmAction) {
                document.getElementById('user_id_to_blacklist').value = <?php echo $row['seller_id']; ?>;

                // Get the selected value from the dropdown
                var selectedDays = document.getElementById('blacklistUntil').value;

                // Set the selected value in the hidden field
                document.getElementById('blacklistForm').elements['blacklistUntil'].value = selectedDays;

                // Submit the form
                document.getElementById('blacklistForm').submit();
                alert("User ID blocked successfully until " + selectedDays + " days.");
            } else {
                alert("Operation canceled.");
            }
        }
    </script>


    </div>
    </section>

    <script src="../public/assests/js/helpDeskCenter.js"></script>
    </script>
    <script>
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

        function displayBlackList() {
            var selectedDays = document.getElementById('blackList');
            blackList.style.display = (selectedDays.style.display === 'none') ? 'block' : 'none';

        }

        function blockUser(userId) {
            var confirmation = confirm("Are you sure you want to proceed further");
            if (confirmation) {

                var form = document.getElementById('blacklistForm');
                var userIdInput = document.getElementById('user_id_to_blacklist');
                var blacklistUntilInput = document.getElementById('blacklistUntil');

                // Set the user ID and other values
                userIdInput.value = userId;
                blacklistUntilInput.value = '7'; // Example value, you can set it dynamically if needed

                // Submit the form
                form.submit();




            }


        }
    </script>
    <script>
        document.getElementById("chatBtnSeller").addEventListener("click", function() {
            document.getElementById("chatBoxSeller").style.display = "block";
            document.getElementById("chatBoxBuyer").style.display = "none";

        });

        document.getElementById("closeChatBtnSeller").addEventListener("click", function() {
            document.getElementById("chatBoxSeller").style.display = "none";
        });

        document.getElementById("chatBtnBuyer").addEventListener("click", function() {
            document.getElementById("chatBoxBuyer").style.display = "block";
            document.getElementById("chatBoxSeller").style.display = "none";
        });

        document.getElementById("closeChatBtnBuyer").addEventListener("click", function() {
            document.getElementById("chatBoxBuyer").style.display = "none";
        });
    </script>