<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assests/css/adminDashboard.styles.css" />
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://parall.ax/parallax/js/jspdf.js"></script>
    <title>Admin Dashboard Panel</title>
</head>

<body>
    <div>
        <div id="makepdf">
            <div id="users">
                <span style="font-size: 30px; font-weight:bold;">User Report </span><br>
                <span>Total Users: </span>
                <span><?php echo $userType['users']; ?></span><br>
                <span>New Users this Month:</span>

                <span id="newUsers"></span>



                <div class="subChart">
                    <canvas id="monthlyUsers"></canvas>
                </div><br>
                <span style="margin-left:50%; margin-bottom:30px"> Users by role:</span>
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>New Users This Month</th>
                            <th>Total Users</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        <tr>
                            <td>Seller:</td>
                            <td><?php echo $userType['sellerc']; ?></td> <!-- Placeholder value for new users this month -->
                            <td> <?php echo $userType['seller']; ?></td> <!-- Total number of seller users -->
                        </tr>
                        <tr>
                            <td>Buyer:</td>
                            <td><?php echo $userType['buyerc']; ?></td> <!-- Placeholder value for new users this month -->
                            <td> <?php echo $userType['buyer']; ?></td> <!-- Total number of seller users -->
                        </tr>
                        <tr>
                            <td>Admin:</td>
                            <td><?php echo $userType['adminc']; ?></td> <!-- Placeholder value for new users this month -->
                            <td> <?php echo $userType['admin']; ?></td> <!-- Total number of seller users -->
                        </tr>
                        <tr>
                            <td>CSA:</td>
                            <td><?php echo $userType['csac']; ?></td> <!-- Placeholder value for new users this month -->
                            <td> <?php echo $userType['csa']; ?></td> <!-- Total number of seller users -->
                        </tr>
                        <!-- Add more rows for other user types if needed -->
                    </tbody>
                </table>

                <div class=" subChart">
                    <canvas id="userTypeCurrent"></canvas>
                </div>
                <div class=" subChart">
                    <canvas id="userType"></canvas>
                </div>





            </div>
            <br><br><br>
            <div class="boxes">

                <i class="uil uil-thumbs-up"></i>
                <span>Total Users</span>
                <span><?php echo $userType['users']; ?></span><br>

                <i class="uil uil-comments"></i>
                <span>Total Orders</span>
                <span><?php echo $order['orders'] ?> </span><br>



                <span class="text">Total Share</span>
                <span>10,120</span><br>

            </div>
            <div class="boxes">
                <div class="subChart">
                    <canvas id="monthlyUsers"></canvas>
                </div>
                <div class="subChart">
                    <canvas id="orderState"></canvas>
                </div>
                <div class=" subChart">
                    <canvas id="orderStatePrev"></canvas>
                </div>
                <div class=" subChart">
                    <canvas id="userType"></canvas>
                </div>


            </div>




        </div>
        <button onclick="generatePDF()">Download</button>




    </div>

</body>

</html>

<script>
    function generatePDF() {
        var element = document.getElementById('users')

        var opt = {
            filename: 'myfile.pdf',
            html2canvas: {
                scale: 1,
                scrollY: 8
            }
        };
        html2pdf().set(opt).from(element).save();


    }




    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    var currentDate = new Date();
    var currentMonthIndex = currentDate.getMonth();
    var rearrangedMonths = months.slice(currentMonthIndex + 1).concat(months.slice(0, currentMonthIndex + 1));

    var monthlyUsers = [];
    var monthComplaints = [];

    <?php
    foreach ($monthlyUsers as $month) {
        echo "monthlyUsers.push('$month');"; // Use push to add each month to the JavaScript array
    } ?>

    document.getElementById("newUsers").innerHTML = monthlyUsers[11] + " ( +" + (monthlyUsers[11] - monthlyUsers[10]) + " users than the previous month)"

    var barColors = ["red", "green", "blue", "orange", "brown"];

    new Chart("monthlyUsers", {
        type: "line",
        data: {
            labels: rearrangedMonths,
            datasets: [{
                fill: false,
                borderColor: 'green',
                data: monthlyUsers
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "New Users Joined"
            }
        }
    });
    <?php

    $orderNumbers = [
        $order['accepted_count'],
        $order['running_count'],
        $order['requested_count'],
        $order['cancelled_count'],
        $order['late_count'],
        $order['completed_count']
    ];

    $orderJSON = json_encode($orderNumbers);
    ?>
    var orderArray = <?php echo $orderJSON ?>


    new Chart("orderState", {
        type: "pie",
        data: {
            labels: ['accepted', 'running', 'requested', 'cancelled', 'late', 'completed'],
            datasets: [{
                backgroundColor: barColors,
                data: orderArray
            }]
        },
        options: {
            title: {
                display: true,
                text: "orderState This Month (<?php echo date('m') . " 20" . date('y') ?>)"
            }
        }
    });
    <?php
    $orderNumbers = [
        $orderprev['accepted_count'],
        $orderprev['running_count'],
        $orderprev['requested_count'],
        $orderprev['cancelled_count'],
        $orderprev['late_count'],
        $orderprev['completed_count']
    ];

    $orderJSON = json_encode($orderNumbers); ?>
    var orderArrayprev = <?php echo $orderJSON ?>


    new Chart("orderStatePrev", {
        type: "pie",
        data: {
            labels: ['accepted', 'running', 'requested', 'cancelled', 'late', 'completed'],
            datasets: [{
                backgroundColor: barColors,
                data: orderArrayprev
            }]
        },
        options: {
            title: {
                display: true,
                text: "orderState Previous Month (0<?php echo (date('m') == 1) ? 12 : date('m') - 1; ?>  <?php echo (date('m') == 1) ? date('Y') - 1 : date('Y'); ?>)"

            }
        }
    });

    <?php
    $datachart4 = [
        $userType['seller'], $userType['buyer'], $userType['csa'], $userType['admin']
    ];

    $orderJson = json_encode($datachart4);

    ?>

    var userType = <?php echo $orderJson ?>;
    new Chart("userType", {
        type: "bar",
        data: {
            labels: ['seller', 'buyer', 'csa', 'admin'],
            datasets: [{
                backgroundColor: barColors,
                data: userType
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "User Types"
            }
        }
    });

    <?php
    $datachart4 = [
        $userType['sellerc'], $userType['buyerc'], $userType['csac'], $userType['adminc']
    ];

    $userTypeCurrent = json_encode($datachart4);

    ?>
    var userTypeCurrent = <?php echo $userTypeCurrent ?>;
    new Chart("userTypeCurrent", {
        type: "bar",
        data: {
            labels: ['seller', 'buyer', 'csa', 'admin'],
            datasets: [{
                backgroundColor: barColors,
                data: userTypeCurrent
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "User Type Current Month"
            }
        }
    });
</script>