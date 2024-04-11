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

      <div class="boxes">
        <div class="box box1">
          <i class="uil uil-thumbs-up"></i>
          <span class="text">Total Likes</span>
          <span class="number">50,120</span>
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
          <canvas id="myChart"></canvas>
        </div>
        <div class="subChart">
          <canvas id="pieChart"></canvas>
        </div>


        <div class=" subChart">
          <canvas id="barChart"></canvas>
        </div>


      </div>







    </div>
  </div>

  <div class=" activity">
    <div class="title">
      <i class="uil uil-clock-three"></i>
      <span class="text">Recent Activity</span>
    </div>

    <div class="activity-data">
      <div class="data names">
        <span class="data-title">Name</span>
        <span class="data-list">Prem Shahi</span>
        <span class="data-list">Deepa Chand</span>
        <span class="data-list">Manisha Chand</span>
        <span class="data-list">Pratima Shahi</span>
        <span class="data-list">Man Shahi</span>
        <span class="data-list">Ganesh Chand</span>
        <span class="data-list">Bikash Chand</span>
      </div>
      <div class="data email">
        <span class="data-title">Email</span>
        <span class="data-list">premshahi@gmail.com</span>
        <span class="data-list">deepachand@gmail.com</span>
        <span class="data-list">prakashhai@gmail.com</span>
        <span class="data-list">manishachand@gmail.com</span>
        <span class="data-list">pratimashhai@gmail.com</span>
        <span class="data-list">manshahi@gmail.com</span>
        <span class="data-list">ganeshchand@gmail.com</span>
      </div>
      <div class="data joined">
        <span class="data-title">Joined</span>
        <span class="data-list">2022-02-12</span>
        <span class="data-list">2022-02-12</span>
        <span class="data-list">2022-02-13</span>
        <span class="data-list">2022-02-13</span>
        <span class="data-list">2022-02-14</span>
        <span class="data-list">2022-02-14</span>
        <span class="data-list">2022-02-15</span>
      </div>
      <div class="data type">
        <span class="data-title">Type</span>
        <span class="data-list">New</span>
        <span class="data-list">Member</span>
        <span class="data-list">Member</span>
        <span class="data-list">New</span>
        <span class="data-list">Member</span>
        <span class="data-list">New</span>
        <span class="data-list">Member</span>
      </div>
      <div class="data status">
        <span class="data-title">Status</span>
        <span class="data-list">Liked</span>
        <span class="data-list">Liked</span>
        <span class="data-list">Liked</span>
        <span class="data-list">Liked</span>
        <span class="data-list">Liked</span>
        <span class="data-list">Liked</span>
        <span class="data-list">Liked</span>
      </div>
    </div>
  </div>
  </div>
  </section>

  <script>
    const myChart = new Chart("myChart", {
      type: "scatter",
      data: {},
      options: {}
    });
  </script>

  <script>
    var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
    var yValues = [55, 49, 44, 24, 15];
    var barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797",
      "#e8c3b9",
      "#1e7145"
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
          text: "World Wide Wine Production 2018"
        }
      }
    });
  </script>
  <!DOCTYPE html>
  <html>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>



  <script>
    var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
    var yValues = [55, 49, 44, 24, 15];
    var barColors = ["red", "green", "blue", "orange", "brown"];

    new Chart("myChart", {
      type: "bar",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        legend: {
          display: false
        },
        title: {
          display: true,
          text: "World Wine Production 2018"
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

    var xValues = getLastSevenDays();

    // Assuming `$sevenDaysCounts` is the PHP array containing the counts for each of the last seven days
    var yValues = <?php echo json_encode($sevenDaysCounts); ?>;

    var barColors = ["red", "green", "blue", "orange", "brown"];

    new Chart("barChart", {
      type: "bar",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
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