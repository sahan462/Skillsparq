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
    </style>
</head>

<body>

    <?php
    if ($_SESSION['role'] == 'csa') {
        include "components/helpCenter.component.php";
    } else {
        include "components/adminDashboard.component.php";
    } ?>
    <?php
    $rowsPerPage = 5; // Number of rows per page
    $totalRows = mysqli_num_rows($feedbacks); // Total number of rows
    $totalPages = ceil($totalRows / $rowsPerPage); // Total number of pages
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Current page, default is 1

    // Calculate the starting index and ending index of rows for the current page
    $start = ($currentPage - 1) * $rowsPerPage;
    $end = $start + $rowsPerPage;
    $end = min($end, $totalRows);

    $recentComplaintsArray = [];
    // Assuming $recentComplaints is the correct array name
    while ($row = $feedbacks->fetch_assoc()) {
        $recentComplaintsArray[] = $row;
    }
    ?>

    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">Ratings and reviews</span>
            </div>
        </div>

        <p class="heading"></p>
        <table class="content-table">
            <thead>
                <tr>
                    <th><a href="?page=<?php echo $currentPage; ?>&sort=feedback_id&dir=<?php echo $data['sortDirection']; ?>">feedback_id <i class="fa fa-sort"></i> </a></th>
                    <th><a href="?page=<?php echo $currentPage; ?>&sort=sender_user_id&dir=<?php echo $data['sortDirection']; ?>">SenderID <i class="fa fa-sort"></a></th>
                    <th><a href="?page=<?php echo $currentPage; ?>&sort=receiver_user_id&dir=<?php echo $data['sortDirection']; ?>">ReceiverId <i class="fa fa-sort"></a></th>
                    <th style="max-width: 350px;"><a href="?page=<?php echo $currentPage; ?>&sort=feedback_text&dir=<?php echo $data['sortDirection']; ?>">feedback_text <?php echo $data['sortBy'] === 'feedback_text' ? '<i class="fa fa-sort-' . ($data['sortDirection'] === 'asc' ? 'up' : 'down') . '"></i>' : ''; ?></a></th>
                    <th><a href="?page=<?php echo $currentPage; ?>&sort=rating&dir=<?php echo $data['sortDirection']; ?>">rating<i class="fa fa-sort"></a></th>
                    <th><a href="?page=<?php echo $currentPage; ?>&sort=feedback_date&dir=<?php echo $data['sortDirection']; ?>">feedback_date <i class="fa fa-sort"> </a></th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display only the rows for the current page
                for ($i = $start; $i < $end && $i < count($recentComplaintsArray); $i++) {
                    $row = $recentComplaintsArray[$i];
                ?>
                    <tr>
                        <td><?php echo $row['feedback_id']; ?></td>
                        <td><?php echo $row['sender_user_id']; ?></td>
                        <td><?php echo $row['receiver_user_id']; ?></td>
                        <td><?php echo $row['feedback_text']; ?></td>
                        <td>
                            <div class="rating">
                                <?php for ($j = 1; $j <= 5; $j++) : ?>
                                    <?php if ($j <= $row['rating']) : ?>
                                        <i class="fa fa-star" style="color: gold;"></i> <!-- Colored star for rating part -->
                                    <?php else : ?>
                                        <i class="fa fa-star" style="color: lightgray;"></i> <!-- Gray star for non-rating part -->
                                    <?php endif; ?>
                                <?php endfor;
                                echo '(' . '<span style="font-size:12px;">' . $row['rating'] . '</span>' . ')'; ?>
                            </div>
                        </td>

                        <td><?php echo $row['feedback_date']; ?></td>
                        <td>

                            <form action="" method="post" onsubmit="return confirm('Are you sure you want to delete this feedback?');">
                                <button type="submit" style="border: none; background: none; cursor: pointer;">
                                    <i class="fa fa-trash" style="color: red;"></i>
                                </button>
                                <input type="hidden" name="feedback_id" value="<?php echo $row['feedback_id']; ?>">
                            </form>

                        </td>
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