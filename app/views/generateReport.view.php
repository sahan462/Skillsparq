<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----===== Iconscout CSS ===== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="stylesheet" href="../public/assests/css/generateReport.styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://parall.ax/parallax/js/jspdf.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
    <style>
        /* Reset default styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Lexend Deca', sans-serif;
        }

        /* Page layout */
        #makepdf {
            width: 800px;
            /* Adjust as needed */
            margin: 20px auto;
            padding:20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Charts */
        canvas {
            max-width: 80%;
            height: auto;
            margin-bottom: 20px;
            margin-left: 12%;

        }



        /* Footer */
        .page-footer {
            position: fixed;
            bottom: 20px;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 10px;
            color: #888;
        }

    </style>

    <title>Admin Dashboard Panel</title>
</head>

<body>
    <div class="container">
        <div id="makepdf">
            <div class="container-two">
                <span class="heading-one">User Report </span>
            </div>
            <div class="sub-main-container">
                <div class="container-three">
                    <div class="sub-c1">
                        <span class="sp-h1">Total Users: </span>
                        <span class="sp-h2"><?php echo $userType['users']; ?></span>
                    </div>
                    <div class="sub-c2">
                        <span class="sp-h3">New Users this Month:</span>
                        <span id="newUsers"></span>
                    </div>   
                </div>

                <div class="subChart">
                    <canvas id="monthlyUsers"></canvas>
                </div><br>
            </div>
            
            <div class="container-four">
                <div class="sub-container-four">
                    <span class="heading-two"> Users by role:</span>
                </div>
                
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>New Users</th>
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
            
            
            <div class="container-five">
                <div class="sub-container-five">
                    <span class="heading-three">Orders </span>
                </div>
                
                <div class="boxes">
                    <div class=" subChart">
                        <canvas id="totalOrders"></canvas>
                    </div>
                    <div class="subChart">
                        <canvas id="orderState"></canvas>
                    </div>
                    <div class=" subChart">
                        <canvas id="orderStatePrev"></canvas>
                    </div>
                </div>
            </div>

            <div class="container-six">
                <div class="sub-container-six">
                    <span class="heading-four">Payments </span>
                </div>
                <div class="boxes">
                    <div class=" subChart">
                        <canvas id="paymentStatusCurrent"></canvas>
                    </div>
                    <div class="subChart">
                        <canvas id="totalPayments"></canvas>
                    </div>
                    <div class="subChart">
                        <canvas id="Sales"></canvas>
                    </div>
                    <div class="subChart">
                        <canvas id="noOfRefunds"></canvas>
                    </div>
                    <div class="subChart">
                        <canvas id="totalRefunds"></canvas>
                    </div>
                </div>
            </div>
            

            <div class="container-seven">
                <div class="sub-container-seven">
                    <span class="heading-five">Gigs </span>
                </div>

                <div class="boxes">
                <div class="subChart">
                    <canvas id="noOfGigs"></canvas>
                </div>
                <div class="subChart">
                    <canvas id="gigState"></canvas>
                </div>
                <div class="subChart">
                    <canvas id="gigStateCurrentMonth"></canvas>
                </div>
            </div>

            </div>
            
        </div>
    </div>
    
<div class="button-section">
    <button class="button" onclick="generatePDF()">Download</button>
</div>
    
    <!-- </div> -->

</body>

</html>

<script>
    function generatePDF() {
        var element = document.getElementById('makepdf');


        // Open the print dialog
        window.print();

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
            borderColor: '#1dbf73',
            data: monthlyUsers
        }]
    },
    options: {
        legend: {
            display: false
        },
        title: {
            display: true,
            text: "New Users Joined",
            font: {
                family: 'Lexend Deca, sans-serif' 
            }
        },
        scales: {
            x: {
                ticks: {
                    font: {
                        family: 'Lexend Deca, sans-serif' 
                    }
                }
            },
            y: {
                ticks: {
                    font: {
                        family: 'Lexend Deca, sans-serif' 
                    }
                }
            }
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
    var totalOrders = []
    <?php
    foreach ($totalOrders as $row) {
        echo "totalOrders.push('$row');"; // Use push to add each month to the JavaScript array
    } ?>
    new Chart("totalOrders", {
        type: "line",
        data: {
            labels: rearrangedMonths,
            datasets: [{
                fill: false,
                borderColor: 'green',
                data: totalOrders
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "total Orders"
            }
        }
    });

    var paymentStatusCurrent = [];

    <?php
    $paymentStatusCurrent = [
        $paymentStats['completed'],
        $paymentStats['refunded'],
        $paymentStats['onhold'],
        $paymentStats['holdForRefund']
    ];

    $paymentStatsCurrentJSON = json_encode($paymentStatusCurrent);
    ?>

    paymentStatusCurrent = <?php echo $paymentStatsCurrentJSON; ?>;
    new Chart("paymentStatusCurrent", {
        type: "pie",
        data: {
            labels: ['completed', 'onhold', 'refunded', 'holdForRefund'],
            datasets: [{
                backgroundColor: barColors,
                data: paymentStatusCurrent
            }]
        },
        options: {
            title: {
                display: true,
                text: "payment Status Current Month (<?php echo (date('m')) ?>  <?php echo (date('Y')); ?>)"
            }
        }
    });

    var totalSales = []
    <?php
    foreach ($totalSales as $row) {
        echo "totalSales.push('$row');"; // Use push to add each month to the JavaScript array
    } ?>

    new Chart("Sales", {
        type: "line",
        data: {
            labels: rearrangedMonths,
            datasets: [{
                fill: false,
                borderColor: 'green',
                data: totalSales
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "total Sales ($)"
            }
        }
    });

    var totalPayments = []
    <?php
    foreach ($totalPayments as $row) {
        echo "totalPayments.push('$row');"; // Use push to add each month to the JavaScript array
    } ?>
    new Chart("totalPayments", {
        type: "line",
        data: {
            labels: rearrangedMonths,
            datasets: [{
                fill: false,
                borderColor: 'green',
                data: totalPayments
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "total Payments Completed"
            }
        }
    });

    var noOfRefunds = []
    <?php
    foreach ($noOfRefunds as $row) {
        echo "noOfRefunds.push('$row');"; // Use push to add each month to the JavaScript array
    } ?>
    new Chart("noOfRefunds", {
        type: "line",
        data: {
            labels: rearrangedMonths,
            datasets: [{
                fill: false,
                borderColor: 'green',
                data: noOfRefunds
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "no of Refunds Issued"
            }
        }
    });

    var totalRefunds = []
    <?php
    foreach ($totalRefunds as $row) {
        echo "totalRefunds.push('$row');"; // Use push to add each month to the JavaScript array
    } ?>
    new Chart("totalRefunds", {
        type: "line",
        data: {
            labels: rearrangedMonths,
            datasets: [{
                fill: false,
                borderColor: 'green',
                data: totalRefunds
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "total refunds ($)"
            }
        }
    });

    var noOfGigs = []
    <?php
    foreach ($noOfGigs as $row) {
        echo "noOfGigs.push('$row');"; // Use push to add each month to the JavaScript array
    } ?>
    new Chart("noOfGigs", {
        type: "line",
        data: {
            labels: rearrangedMonths,
            datasets: [{
                fill: false,
                borderColor: 'green',
                data: noOfGigs
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "New Gigs Created"
            }
        }
    });

    var gigStateCurrentMonth = [];

    <?php
    $gigStateCurrentMonth1 = [
        $gigStateCurrentMonth['Graphics & Design'],
        $gigStateCurrentMonth['Programming & Tech'],
        $gigStateCurrentMonth['Digital Marketing'],
        $gigStateCurrentMonth['Video & Animation'],
        $gigStateCurrentMonth['Writing & Translation'],
        $gigStateCurrentMonth['Music & Audio'],
        $gigStateCurrentMonth['Business'],
        $gigStateCurrentMonth['Data'],
        $gigStateCurrentMonth['Photography'],
        $gigStateCurrentMonth['AI Services']


    ];

    $gigStatsCurrentJSON = json_encode($gigStateCurrentMonth1);
    ?>
    gigStateCurrentMonth = <?php echo $gigStatsCurrentJSON; ?>;

    new Chart("gigStateCurrentMonth", {
        type: "pie",
        data: {
            labels: ['Graphics & Design', 'Programming & Tech', 'Digital Marketing', 'Video & Animation', 'Music & Audio', 'Business', 'Data', 'Photography', 'AI Services'],
            datasets: [{
                backgroundColor: barColors,
                data: gigStateCurrentMonth
            }]
        },
        options: {
            title: {
                display: true,
                text: "gig Categories Current Month (<?php echo (date('m')) ?>  <?php echo (date('Y')); ?>)"
            }
        }
    });
    var gigState = [];

    <?php
    $gigState1 = [
        $gigState['Graphics & Design'],
        $gigState['Programming & Tech'],
        $gigState['Digital Marketing'],
        $gigState['Video & Animation'],
        $gigState['Writing & Translation'],
        $gigState['Music & Audio'],
        $gigState['Business'],
        $gigState['Data'],
        $gigState['Photography'],
        $gigState['AI Services']


    ];

    $gigStatsCurrentJSON = json_encode($gigState1);
    ?>
    gigState = <?php echo $gigStatsCurrentJSON; ?>;

    new Chart("gigState", {
        type: "pie",
        data: {
            labels: ['Graphics & Design', 'Programming & Tech', 'Digital Marketing', 'Video & Animation', 'Music & Audio', 'Business', 'Data', 'Photography', 'AI Services'],
            datasets: [{
                backgroundColor: barColors,
                data: gigState
            }]
        },
        options: {
            title: {
                display: true,
                text: "gig Categories all time "
            }
        }
    });
</script>