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
                    <canvas id="barchartComplaints"></canvas>
                </div>
            </div>
        </div>
        <div>
            <div class=" title">

            </div>

        </div>

        <div>

            <table class="content-table">
                <caption style="font-weight: bold; height:30px; font-size :18px; background-color:#009879 ; color:white">

                    <i class=" uil uil-clock-three"></i>
                    <span class="text">Recent Requests</span>

                </caption>
                <thead>
                    <th>InquiryID</th>
                    <th>Subject</th>
                    <th>View</th>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                    foreach ($recentRequests as $row) { ?>
                        <tr>
                            <td><?php echo $row['inquiry_id']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>

                            <td>
                                <a href='viewHelpRequestDetails?inquiry_id=<?php echo $row["inquiry_id"]; ?>'><button>View</button>
                            </td>
                        </tr>
                    <?php
                        $count++;
                        if ($count == 5) {
                            break;
                        }
                    } ?>
                </tbody>
            </table>



            <table class=" content-table">
                <caption style="font-weight: bold; height:30px; font-size :18px; background-color:#009879 ; color:white">
                    <i class=" uil uil-clock-three"></i>
                    <span class="text">Recent Complaints</span>

                </caption>
                <thead>
                    <th>InquiryID</th>
                    <th>Subject</th>
                    <th>View</th>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                    foreach ($recentComplaints as $row) { ?>
                        <tr>
                            <td><?php echo $row['inquiry_id']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>

                            <td>
                                <a href='viewComplaints?inquiry_id=<?php echo $row["inquiry_id"]; ?>'><button>View</button>
                            </td>
                        </tr>
                    <?php
                        $count++;
                        if ($count == 5) {
                            break;
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src=" ../public/assests/js/helpDeskCenter.js"></script>
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
            "#b91d47",
            "#f2711c",
            "#fbca04",
            "#a333c8",
            "#6435c9",
            "#2185d0",
            "#00b5ad",
            "#a5673f",
            "#767676",
            "#1b1c1d",
            "#e03997"
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

        var monthRequests = [];
        var monthComplaints = [];

        <?php
        foreach ($monthsSortedRequests as $month) {
            echo "monthRequests.push('$month');"; // Use push to add each month to the JavaScript array
        }
        foreach ($monthsSortedComplaints as $month) {
            echo "monthComplaints.push('$month');"; // Use push to add each month to the JavaScript array
        }

        ?>







        new Chart("barchartHelpRequests", {
            type: "line",
            data: {
                labels: rearrangedMonths,
                datasets: [{
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    data: monthRequests
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Requests"
                }
            }
        });

        new Chart("barchartComplaints", {
            type: "line",
            data: {
                labels: rearrangedMonths,
                datasets: [{
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    data: monthComplaints
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Complaints"
                }
            }
        });
    </script>

</body>

</html>