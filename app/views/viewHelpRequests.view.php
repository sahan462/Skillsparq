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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />


    <title>Admin Dashboard Panel</title>

    <style>

    </style>
</head>

<body>
    <?php
    $recentRequests = $data['recentRequests']; // Assuming 'recentRequests' is the correct array name
    ?>
    <?php include "components/helpCenter.component.php"; ?>


    <div class="dash-content">
        <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text">HelpRequests</span>
        </div>
        <div style="margin-left: 40%; margin-bottom:16px;" ;>
            <button onclick="clickbtn()" id="solved">Unsolved</button>
            <button onclick="clickbtn()" id="unsolved" style="color: black; background: white">Solved</button>
        </div>
        <div id="tableUnsolved">
            <table class=" content-table">
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

        <div id="tableSolved" style="display: none;">
            <table class=" content-table">
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
                        if ($row['inquiry_status'] == "solved") {
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
    var count = 0;

    function clickbtn() {
        var solved = document.getElementById("solved")
        var unsolved = document.getElementById("unsolved")
        var tableSolved = document.getElementById("tableSolved")
        var tableUnsolved = document.getElementById("tableUnsolved")
        if (count == 0) {
            solved.style.background = 'white'
            solved.style.color = 'black'
            unsolved.style.background = '#1dbf73'
            unsolved.style.color = 'white'
            tableSolved.style.display = "block"
            tableUnsolved.style.display = "none"

            count = 1;

        } else {
            unsolved.style.background = 'white'
            unsolved.style.color = 'black'
            solved.style.background = '#1dbf73'
            solved.style.color = 'white'
            tableSolved.style.display = "none"
            tableUnsolved.style.display = "block"
            count = 0;
        }

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