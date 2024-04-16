<?php
$count1 = 0;
$count2 = 0;
$countCurrentMonth = 0;
$countPreviousMonth = 0;
$countCurrentMonth1 = 0;
$countPreviousMonth1 = 0;
$monthData = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$countCurrentMonth2 = 0;
$countPreviousMonth2 = 0;
$currentMonth = date('m');
$previousMonth = ($currentMonth == 1) ? 12 : $currentMonth - 1;
$currentYear = date('Y');
$previousYear = $currentYear - 1;

foreach ($recentInquiries as $row) {
    $date = new DateTime($row['created_at']);
    $inquiryMonth = $date->format('m');
    $inquiryYear = $date->format('Y');

    if (($inquiryYear == $previousYear && $inquiryMonth > $currentMonth) || $inquiryYear == $currentYear && $inquiryMonth <= $currentMonth) {
        $monthData[$inquiryMonth - 1]++;
    }
    if ($inquiryMonth == $currentMonth && $inquiryYear == $currentYear) {
        $countCurrentMonth++;
    } elseif ($inquiryMonth == $previousMonth && $inquiryYear == $previousYear) {
        $countPreviousMonth++;
    }
}

foreach ($recentRequests as $row) {
    $date = new DateTime($row['created_at']);
    $inquiryMonth = $date->format('m');
    $inquiryYear = $date->format('Y');

    if ($inquiryMonth == $currentMonth && $inquiryYear == $currentYear) {
        $countCurrentMonth1++;
    } elseif ($inquiryMonth == $previousMonth && $inquiryYear == $previousYear) {
        $countPreviousMonth1++;
    }
}

foreach ($recentComplaints as $row) {
    $date = new DateTime($row['created_at']);
    $inquiryMonth = $date->format('m');
    $inquiryYear = $date->format('Y');
    if ($inquiryMonth == $currentMonth && $inquiryYear == $currentYear) {
        $countCurrentMonth2++;
    } elseif ($inquiryMonth == $previousMonth && $inquiryYear == $previousYear) {
        $countPreviousMonth2++;
    }
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


$currentMonthIndex = date('n') - 1; // Subtract 1 to convert 1-based index to 0-based index

// Create an array of months
$months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

// Rearrange the months array
$monthsSorted = array_merge(
    array_slice($monthData, $currentMonthIndex + 1), // Get the months from current month to end
    array_slice($monthData, 0, $currentMonthIndex + 1) // Get the months from beginning to current month
);

array_reverse($monthsSorted)

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
                    <span class="text">Total Inquiries this month</span>
                    <span class="number"><?php echo $countCurrentMonth ?></span>

                </div>
                <div class="box box2">
                    <i class="uil uil-comments"></i>
                    <span class="text">Total help requests this month</span>
                    <span class="number"><?php echo $countCurrentMonth1 ?></span>

                </div>
                <div class="box box3">
                    <i class="uil uil-share"></i>
                    <span class="text">Total Complaints this month</span>
                    <span class="number"><?php echo $countCurrentMonth2 ?></span>
                </div>
            </div>


            <div class="boxes">
                <div class="subChart">
                    <canvas id="pieChart"></canvas>
                </div>
                <div class="subChart">
                    <canvas id="pieChartComplaints"></canvas>
                </div>
                <div class="subChart">
                    <canvas id="barchartHelpRequests"></canvas>
                </div>
                <div class="subChart">
                    <canvas id="pieChart"></canvas>
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
                    <th><? echo $profile['userId'] ?></th>
                    <th>user_email</th>
                    <th>role</th>
                    <th>View</th>
                </thead>
                <tbody>
                    <?php foreach ($recentUsers as $row) { ?>
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

        var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        var currentDate = new Date();
        var currentMonthIndex = currentDate.getMonth();
        var rearrangedMonths = months.slice(currentMonthIndex + 1).concat(months.slice(0, currentMonthIndex + 1));

        var monthsy = [];

        <?php
        foreach ($monthsSorted as $month) {
            echo "monthsy.push('$month');"; // Use push to add each month to the JavaScript array
        }

        ?>







        new Chart("barchartHelpRequests", {
            type: "bar",
            data: {
                labels: rearrangedMonths,
                datasets: [{
                    backgroundColor: barColors,
                    data: monthsy
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "new Inquiries"
                }
            }
        });
    </script>

</body>

</html>