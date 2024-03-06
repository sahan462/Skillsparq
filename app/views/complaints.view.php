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

    <title>Admin Dashboard Panel</title>
</head>

<body>
    <?php include "components/helpCenter.component.php"; ?>

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
                <th>inquiry_ID
                <th>Subject
                <th>description
                <th>View
            </thead>
            <tbody>
                <?php
                foreach ($recentComplaints as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['inquiry_id']; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><a href='viewComplaints?inquiry_id=<?php echo $row["inquiry_id"]; ?>'>
                                <button>View1</button>
                            </a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>


    </div>
    </section>

    <script src="../public/assests/js/helpDeskCenter.js"></script>
    </script>
</body>

</html>