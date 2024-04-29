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
        a {
            text-decoration: none;
            color: white;
        }

        div.solved,
        div.unsolved {
            padding: 5px 10px;
            border-radius: 5px;
            color: #fff;
            font-weight: bold;
            text-align: center;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }

        div.solved {
            background-color: #28a745;
            /* A nicer shade of green */
        }

        div.unsolved {
            background-color: #dc3545;
            /* A richer shade of red */
        }
    </style>
</head>

<body>
    <?php
    $rowsPerPage = 5; // Number of rows per page
    $totalRows = $totalInquiries['helpRequests']; // Total number of rows
    $totalPages = ceil($totalRows / $rowsPerPage); // Total number of pages
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Current page, default is 1

    // Assuming $recentRequests is the correct array name
    $recentRequestsArray = [];
    while ($row = $recentRequests->fetch_assoc()) {
        $recentRequestsArray[] = $row;
    }

    // Calculate the starting index and ending index of rows for the current page
    $start = ($currentPage - 1) * $rowsPerPage;
    $end = $start + $rowsPerPage;
    $end = min($end, $totalRows);

    // Modify the total pages to ensure the last page has the remaining rows
    if ($totalRows % $rowsPerPage != 0 && $currentPage == $totalPages) {
        $rowsPerPage = $totalRows % $rowsPerPage;
    }
    ?>
    <?php include "components/helpCenter.component.php"; ?>

    <div class="dash-content">
        <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text">HelpRequests</span>
        </div>

        <div id="tableUnsolved">
            <table class="content-table">
                <thead>
                    <tr>
                        <th><a href="?page=<?php echo $currentPage; ?>&sort=inquiry_id">inquiry_ID <i class="fas fa-sort-down"></i></a></th>
                        <th>Subject </i></a></th>
                        <th><a href="?page=<?php echo $currentPage; ?>&sort=inquiry_status">inquiry_status <i class="fas fa-sort-down"></i></a></th>
                        <th><a href="?page=<?php echo $currentPage; ?>&sort=created_at">created_at <i class="fas fa-sort-down"></i></a></th>
                        <th>view </th>
                        <th>delete</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                    $i = $start;
                    while ($i < $end && $i < count($recentRequestsArray)) {
                        $row = $recentRequestsArray[$i];

                    ?>
                        <tr>
                            <td><?php echo $row['inquiry_id']; ?></td>
                            <td><?php echo $row['subject']; ?></td>
                            <td>
                                <div class="<?php echo $row['inquiry_status']; ?>"><?php echo $row['inquiry_status']; ?></div>
                            </td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td><a href='viewHelpRequestDetails?inquiry_id=<?php echo $row["inquiry_id"]; ?>'>
                                    <i class="fas fa-eye" style="color: green;"></i> </a>
                            </td>
                            <td>

                                <form action="" method="post" onsubmit="return confirm('Are you sure you want to delete this feedback?');">
                                    <button type="submit" style="border: none; background: none; cursor: pointer;">
                                        <i class="fa fa-trash" style="color: red;"></i>
                                    </button>
                                    <input type="hidden" name="inquiry_id" value="<?php echo $row['inquiry_id']; ?>">
                                </form>


                            </td>
                        </tr>
                    <?php

                        $i++;
                    }
                    ?>
                </tbody>
            </table>

        </div>


    </div>
    <div class="pagination">
        <?php
        if ($currentPage > 1) {
            echo "<a href='?page=" . ($currentPage - 1) . "'>&laquo; Previous</a>";
        }
        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<a href='?page=" . $i . "' " . ($i == $currentPage ? "class='active'" : "") . ">" . $i . "</a>";
        }
        if ($currentPage < $totalPages) {
            echo "<a href='?page=" . ($currentPage + 1) . "'>Next &raquo;</a>";
        }
        ?>
    </div>

    <script src="../public/assests/js/helpDeskCenter.js"></script>

</body>

</html>

<script>
    function clickbtn() {
        var solved = document.getElementById("solved")
        var unsolved = document.getElementById("unsolved")
        var tableSolved = document.getElementById("tableSolved")
        var tableUnsolved = document.getElementById("tableUnsolved")
        if (tableSolved.style.display === "none") {
            solved.style.background = 'white'
            solved.style.color = 'black'
            unsolved.style.background = '#1dbf73'
            unsolved.style.color = 'white'
            tableSolved.style.display = "block"
            tableUnsolved.style.display = "none"



        } else {
            unsolved.style.background = 'white'
            unsolved.style.color = 'black'
            solved.style.background = '#1dbf73'
            solved.style.color = 'white'
            tableSolved.style.display = "none"
            tableUnsolved.style.display = "block"

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