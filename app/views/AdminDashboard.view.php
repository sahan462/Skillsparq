<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/assests/css/adminDashboard.styles.css" />

  <!----===== Iconscout CSS ===== -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <title>Admin Dashboard Panel</title>
</head>

<body>
  <?php include "components/adminDashboard.component.php"; ?>


  <div class="dash-content">
    <div class="overview">
      <div class="title">
        <i class="uil uil-tachometer-fast-alt"></i>
        <span class="text">Dashboard</span>
      </div>



      <div id="invoice1">

        <div class="boxes">
          <div class="box box1">
            <i class="uil uil-thumbs-up"></i>
            <span class="text">Total Users</span>
            <span class="number"><?php echo $userType['users']; ?></span>
          </div>
          <div class="box box2">
            <i class="uil uil-comments"></i>
            <span class="text">Total Orders</span>
            <span class="number"><?php echo $order['orders'] ?></span>
          </div>
          <div class="box box3">
            <i class="uil uil-share"></i>
            <span class="text">Total Share</span>
            <span class="number"><?php $order['orders']  ?></span>
          </div>
        </div>
        <div class="boxes">
          <div class="subChart">
            <canvas id="monthlyUsers"></canvas>
          </div>
          <div class=" subChart">
            <canvas id="totalOrders"></canvas>
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
          <div class=" subChart">
            <canvas id="paymentStatusCurrent"></canvas>
          </div>
          <div class="subChart">
            <canvas id="totalPayments"></canvas>
          </div>

        </div>




      </div>





    </div>
  </div>


  </div>
  </section>

  <script>
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

    var totalOrders = [];

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
  </script>








  <script>
    function getLastSevenDays() {
      var result = [];
      for (var i = 6; i >= 0; i--) {
        var date = new Date();
        date.setDate(date.getDate() - i);
        var dateString = date.toLocaleDateString('en-US', {
          month: 'short',
          day: 'numeric'
        });
        result.push(dateString);
      }
      return result;
    }

    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    var currentDate = new Date();
    var currentMonthIndex = currentDate.getMonth();
    var rearrangedMonths = months.slice(currentMonthIndex + 1).concat(months.slice(0, currentMonthIndex + 1));

    var monthlyUsers = [];
    var monthComplaints = [];

    <?php
    foreach ($monthDataUsers as $month) {
      echo "monthlyUsers.push('$month');"; // Use push to add each month to the JavaScript array
    } ?>


    var xValues = getLastSevenDays();




    var barColors = ["red", "green", "blue", "orange", "brown"];

    new Chart("barChart", {
      type: "bar",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: monthlyUsers
        }]
      },
      options: {
        legend: {
          display: false
        },
        title: {
          display: true,
          text: "Recent Users"
        }
      }
    });
  </script>


</body>

</html>


</body>

</html>



</body>

</html>