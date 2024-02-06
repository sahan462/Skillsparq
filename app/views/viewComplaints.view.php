<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assests/css/Complaints.styles.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title>
    <style>
        /* Hide the text box initially */
        #replyBox {
            display: none;
        }
    </style>
</head>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="images/logo.png" alt="">
            </div>

            <span class="logo_name">Skillsparq</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="helpDeskCenter">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Dahsboard</span>
                    </a></li>
                <li><a href="complaints">
                        <i class="uil uil-files-landscapes"></i>
                        <span class="link-name">Complaints</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-chart"></i>
                        <span class="link-name">Analytics</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="link-name">Like</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Comment</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-share"></i>
                        <span class="link-name">Share</span>
                    </a></li>
            </ul>

            <ul class="logout-mode">
                <li><a href="#">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                        <span class="link-name">Dark Mode</span>
                    </a>

                    <div class="mode-toggle">
                        <span class="switch"></span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>

            <!--<img src="images/profile.jpg" alt="">-->
        </div>


        <?php
        // Establish a database connection
        $conn = mysqli_connect("localhost", "root", "", "skillsparq");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve the inquiry_id from the query parameters
        $inquiry_id = isset($_GET['inquiry_id']) ? $_GET['inquiry_id'] : null;

        // Fetch the full row for the given inquiry_id
        $sql = "SELECT * FROM inquiries WHERE inquiry_id = " . $inquiry_id;
        $result = $conn->query($sql);

        // Check if the query was successful
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Display the full row data
            echo "<table>";
            echo "<tr><td>Inquiry ID:</td><td>" . $row["inquiry_id"] . "</td></tr>";
            echo "<tr><td>Subject:</td><td>" . $row["subject"] . "</td></tr>";
            echo "<tr><td>Description:</td><td>" . $row["description"] . "</td></tr>";
            echo "<tr><td>Attachments:</td><td>" . $row["attachements"] . "</td></tr>";
            echo "<tr><td>Response:</td><td>" . $row["response"] . "</td></tr>";
            echo "<tr><td>Inquiry Status:</td><td>" . $row["inquiry_status"] . "</td></tr>";
            echo "<tr><td>Created at:</td><td>" . $row["created_at"] . "</td></tr>";
            echo "<tr><td>Inquiry Originator ID:</td><td>" . $row["inquiry_originator_id"] . "</td></tr>";
            echo "<tr><td>Customer Support Assistant ID:</td><td>" . $row["customer_support_assistant_id"] . "</td></tr>";
            echo "<tr><td>Inquiry Type:</td><td>" . $row["inquiry_type"] . "</td></tr>";
            echo "</table>";
        } else {
            echo "No data found";
        }

        $result = $conn->query($sql);
        $conn->close();
        ?>

        <!-- Button to toggle the reply text box -->
        <button onclick="toggleReplyBox()">Reply</button>



        <label for="blacklistUntil">Select Blacklist Reason:</label>
        <select id="blacklistUntil" name="blacklistUntil">
            <option value="1">1 day</option>
            <option value="2">2 days</option>
            <option value="7">7 days</option>
            <option value="14">14 days</option>
            <option value="30">30 days</option>
            <!-- Add more options as needed -->
        </select>

        <button onclick="updateUserBlacklist()">Blacklist User</button>

        <!-- Add more options as needed -->
        </select>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "skillsparq");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_id_to_blacklist = $_POST['user_id_to_blacklist'];
            $blacklist_until_days = $_POST['blacklistUntil'];


            // Use a prepared statement to prevent SQL injection
            $update_sql = "UPDATE user SET black_list = 1, Black_Listed_Until = CURDATE() + INTERVAL ? DAY WHERE user_id = ?";
            $stmt = $conn->prepare($update_sql);

            // Bind parameters
            $stmt->bind_param("ii", $blacklist_until_days, $user_id_to_blacklist);

            if ($stmt->execute()) {
                echo "User with ID $user_id_to_blacklist blacklisted successfully for $blacklist_until_days days ";
            } else {
                echo "Error updating user: " . $stmt->error;
            }

            $stmt->close();
        }

        $conn->close();
        ?>



        <!-- Form to submit the user_id for updating the blacklist -->
        <form id="blacklistForm" method="post" style="display: none;">
            <input type="hidden" id="user_id_to_blacklist" name="user_id_to_blacklist" value="">
            <input type="hidden" id="blacklistUntil" name="blacklistUntil" value="">

        </form>


        <!-- Text box for reply -->
        <div id="replyBox">
            <textarea rows="4" cols="50" placeholder="Type your reply here..."></textarea>
            <button onclick="submitReply()">Submit</button>
        </div>


        <script>
            // Function to toggle the visibility of the reply text box
            function toggleReplyBox() {
                var replyBox = document.getElementById('replyBox');
                replyBox.style.display = (replyBox.style.display === 'none') ? 'block' : 'none';
            }

            // Function to handle reply submission (you can customize this as needed)
            function submitReply() {
                var replyText = document.querySelector('#replyBox textarea').value;
                alert('Reply submitted: ' + replyText);
                // Add logic for handling the reply submission here
                toggleReplyBox(); // Optionally hide the reply box after submission
            }
        </script>




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


</body>

</html>