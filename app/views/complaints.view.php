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
</head>

<body>
    <?php include "components/helpCenter.component.php"; ?>
    <?php
    $rowsPerPage = 5; // Number of rows per page
    $totalRows = $totalInquiries['complaints']; // Total number of rows
    $totalPages = ceil($totalRows / $rowsPerPage); // Total number of pages
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Current page, default is 1

    // Calculate the starting index and ending index of rows for the current page
    $start = ($currentPage - 1) * $rowsPerPage;
    $end = $start + $rowsPerPage;
    $end = min($end, $totalRows);

    $recentComplaintsArray = [];
    // Assuming $recentComplaints is the correct array name
    while ($row = $recentComplaints->fetch_assoc()) {
        $recentComplaintsArray[] = $row;
    }
    ?>

    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">Complaints</span>
            </div>
        </div>

        <p class="heading">Complaints</p>
        <table class="content-table">
            <thead>
                <tr>
                    <th><a href="?page=<?php echo $currentPage; ?>&sort=inquiry_id">inquiry_ID</a></th>
                    <th style="width:250px"><a href="?page=<?php echo $currentPage; ?>&sort=subject">Subject</a></th>
                    <th style="width:250px"><a href="?page=<?php echo $currentPage; ?>&sort=description">Description</a></th>
                    <th><a href="?page=<?php echo $currentPage; ?>&sort=inquiry_status">Status</a></th>
                    <th><a href="?page=<?php echo $currentPage; ?>&sort=created_at">Created At</a></th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display only the rows for the current page
                for ($i = $start; $i < $end && $i < count($recentComplaintsArray); $i++) {
                    $row = $recentComplaintsArray[$i];
                ?>
                    <tr>
                        <td><?php echo $row['inquiry_id']; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td>
                            <div class="<?php echo $row['inquiry_status']; ?>"><?php echo $row['inquiry_status']; ?></div>
                        </td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td><a href='viewComplaints?inquiry_id=<?php echo $row["inquiry_id"]; ?>'><i class="fa fa-eye"></i></a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

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
    </div>

    <script src="../public/assests/js/helpDeskCenter.js"></script>

</body>

</html>