<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assests/css/complaints.styles.css" />
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>

    <title>Admin Dashboard Panel</title>

    <style>
        button {
            width: 20%;
            height: 32px;
            margin-bottom: 16px;
            margin-left: 30%;
            color: #fff;
            border: 2px solid #1dbf73;
            background: #1dbf73;
            border-radius: 5px;
            font-size: 14px;
            transition: ease-in-out 0.3s;
        }
    </style>
</head>

<body>
    <?php
    $recentRequests = $data['recentRequests']; // Assuming 'recentRequests' is the correct array name
    ?>
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
                        <span class="link-name">Dashboard</span>
                    </a></li>
                <li><a href="complaints">
                        <i class="uil uil-files-landscapes"></i>
                        <span class="link-name">Complaints</span>
                    </a></li>
                <li><a href="viewHelpRequests">
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
        </div>

        <div class="dash-content">
            <div class="title">
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">HelpRequests</span>
            </div>
            <div id="toggle">
                <button id="unsolved" onclick="togglebtn()">Not Solved</button>
                <button id="solved" onclick="togglebtn()" style="margin-left: 0; ">Solved</button>
            </div>
            <div>
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>inquiry_ID</th>
                            <th>Subject</th>
                            <th>inquiry_status</th>
                            <th>created_at</th>
                            <th>view</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($recentRequests as $row) {
                            if ($row['inquiry_status'] == "unsolved") {
                        ?>
                                <tr>
                                    <td><?php echo $row['inquiry_id']; ?></td>
                                    <td><?php echo $row['subject']; ?></td>
                                    <td><?php echo $row['inquiry_status']; ?></td>
                                    <td><?php echo $row['created_at']; ?></td>
                                    <td><a href='viewHelpRequestDetails?inquiry_id=<?php echo $row["inquiry_id"]; ?>'>
                                            <button>View</button>
                                        </a></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script src="../public/assests/js/helpDeskCenter.js"></script>

</body>

</html>


<script>
    function togglebtn() {
        var solved = document.getElementById("solved");
        var unsolved = document.getElementById("unsolved");

        // Toggle background color for solved button
        if (solved.style.background === 'rgb(29, 191, 115)' || solved.style.background === 'green') {
            solved.style.background = 'white';

        } else {
            solved.style.background = 'rgb(29, 191, 115)';
        }

        // Toggle background color for unsolved button
        if (unsolved.style.background === 'rgb(29, 191, 115)' || unsolved.style.background === 'green') {
            unsolved.style.background = 'white';
        } else {
            unsolved.style.background = 'rgb(29, 191, 115)';
        }
    }
</script>