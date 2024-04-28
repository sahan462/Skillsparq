<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/assests/css/complaints.styles.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
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
                <span class="text">Help Request no: <?php echo $data['inquiryId']
                                                    ?></span>

            </div>

        </div>

        <div style="display: flex;">
            <div class="grid">
                <p style="font-weight: bold ; font-size:large">Request Details</P>
                <?php
                foreach ($viewHelpRequests as $row) {
                ?>
                    <ul>
                        <li>Inquiry_ID: <span><?php echo $row['inquiry_id']; ?></span></li>
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


            </div>




            <!-- <table class="content-table" style="margin-top: 50px;">

            <th>inquiry_originator_id
            <th>customer_support_assistant_id
            <th>inquiry_type'



                <tbody>
                   
                    }
    ?>
    </tbody>
    </table> -->
            <div class="grid">
                <p style="font-weight: bold ; font-size:large">
                    Sender details:
                </p>
                <div id="viewSender">
                    <?php
                    foreach ($viewHelpRequests as $row) {

                    ?>
                        <ul>
                            <li>User_ID <span><?php echo $row['user_id']; ?></span></li>
                            <li>User_email: <span><?php echo $row['user_email']; ?></span></li>
                            <li>Role: <span><?php echo $row['role']; ?></span></li>
                            <li>Agreement: <span><?php echo $row['agreement']; ?></span></li>
                            <li> </li>

                        </ul>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </div>

        <form method="post">
            <textarea name="response" rows="4" cols="50" placeholder="Enter your response here"></textarea>
            <br>
            <input class="submit" type="submit" value="Reply">
        </form>



    </div>











    <!-- Form to submit the user_id for updating the blacklist -->
    <form id="blacklistForm" method="post" style="display: none;">
        <input type="hidden" id="user_id_to_blacklist" name="user_id_to_blacklist" value="">
        <input type="hidden" id="blacklistUntil" name="blacklistUntil" value="">

    </form>


    <!-- Text box for reply -->
    <!-- <div id="replyBox">
                <textarea rows="4" cols="50" placeholder="Type your reply here..."></textarea>
                <button onclick="submitReply()">Submit</button>
            </div> -->


    <!-- <script>
                // Function to toggle the visibility of the reply text box
                // function toggleReplyBox() {
                //     var replyBox = document.getElementById('replyBox');
                //     replyBox.style.display = (replyBox.style.display === 'none') ? 'block' : 'none';
                // }

                // Function to handle reply submission (you can customize this as needed)
                function submitReply() {
                    var replyText = document.querySelector('#replyBox textarea').value;
                    alert('Reply submitted: ' + replyText);
                    // Add logic for handling the reply submission here
                    toggleReplyBox(); // Optionally hide the reply box after submission
                }
            </script> -->




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
        function updateUserBlacklist() {
            var confirmAction = confirm("Are you sure you want to proceed further");

            if (confirmAction) {
                document.getElementById('user_id_to_blacklist').value = <?php echo $row['inquiry_originator_id']; ?>;

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
        function viewSender() {
            var selectedDays = document.getElementById('viewSender');
            selectedDays.style.display = (selectedDays.style.display === 'none') ? 'block' : 'none';

        }
    </script>

    <script>
        let profileDropdownList = document.querySelector(".profile-dropdown-list");
        let btn = document.querySelector(".profile-dropdown-btn");

        let classList = profileDropdownList.classList;

        const toggle = () => classList.toggle("active");

        window.addEventListener("click", function(e) {
            if (!btn.contains(e.target)) classList.remove("active");
        });
    </script>
</body>

</html>