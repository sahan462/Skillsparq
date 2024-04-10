<?php
$count = 0;
foreach ($recentInquiries as $row) {
    $count++;
}
$solved = 0;
$unsolved = 0;
foreach ($recentRequests as $row) {
    if ($row['inquiry_status'] == "solved") {
        $solved++;
    } else {
        $unsolved++;
    }
}
$solved1 = 0;
$unsolved1 = 0;
foreach ($recentComplaints as $row) {
    if ($row['inquiry_status'] == "solved") {
        $solved1++;
    } else {
        $unsolved1++;
    }
}
?>

<!DOCTYPE html>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

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
            <div class="boxes">
                <div class="subChart">
                    <canvas id="pieChart"></canvas>
                </div>
                <div class="subChart">
                    <canvas id="pieChartComplaints"></canvas>
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
                    <?php foreach ($recentInquiries as $row) { ?>
                        <tr>
                            <td><?php echo $row['user_id']; ?></td>
                            <td><?php echo $row['user_email']; ?></td>
                            <td><?php echo $row['role']; ?></td>
                            <td><a href="#">View</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="../public/assests/js/helpDeskCenter.js"></script>
    <script>
        var solved = <?php echo $solved; ?>;
        var unsolved = <?php echo $unsolved; ?>;
        var xValues = ["Solved", "Unsolved"];
        var yValues = [solved, unsolved];
        var barColors = [
            "#00aba9",
            "#b91d47"
        ];

        new Chart("pieChart", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Help Requests"
                }
            }
        });
    </script>
    <script>
        var solved = <?php echo $solved1; ?>;
        var unsolved = <?php echo $unsolved1; ?>;
        var xValues = ["Solved", "Unsolved"];
        var yValues = [solved, unsolved];
        var barColors = [
            "#00aba9",
            "#b91d47"
        ];

        new Chart("pieChartComplaints", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Complaints"
                }
            }
        });
    </script>

</body>

</html>