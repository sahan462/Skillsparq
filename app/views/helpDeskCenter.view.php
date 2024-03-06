<?php
$count = 0;
foreach ($recentInquiries as $row) {
    $count++;
}

?>
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
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

    <title>Admin Dashboard Panel</title>
</head>



<body>

    <?php include "components/helpCenter.component.php"; ?>
    </div>

    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">Dashboard</span>
            </div>

            <div class="boxes">
                <div class="box box1">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="text">Total Users</span>
                    <span class="number"><?php echo $count ?></span>

                </div>
                <div class="box box2">
                    <i class="uil uil-comments"></i>
                    <span class="text">Comments</span>
                    <span class="number">20,120</span>

                </div>
                <div class="box box3">
                    <i class="uil uil-share"></i>
                    <span class="text">Total Share</span>
                    <span class="number">10,120</span>
                </div>
            </div>
        </div>

        <div class="activity">
            <div class="title">
                <i class="uil uil-clock-three"></i>
                <span class="text">Recent inquiries</span>
            </div>

            <table class="content-table">
                <thead>
                    <th>user_id</th>
                    <th>user_email</th>
                    <th>role</th>
                    <th>View</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($recentInquiries as $row) {
                    ?>
                        <tr>
                            <td><?php echo $row['user_id']; ?></td>
                            <td><?php echo $row['user_email']; ?></td>
                            <td><?php echo $row['role']; ?></td>
                            <td><a href="#">View</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>


        </div>
    </div>
    </div>
    </section>
    < /body>

        < /html>

            <script src="../public/assests/js/helpDeskCenter.js"></script>