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

    <title>Admin Dashboard Panel</title>
</head>

<?php
$conn = mysqli_connect("localhost", "root", "", "skillsparq");
if ($conn->connect_error) {
    die("connection failed:" . $conn->connect_error);
}
$sql = "SELECT user_id from user";
$result = $conn->query($sql);
$count = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $count++;
    }
    echo "</table>";
} else {
    echo "No Buyers included";
}
$conn->close();

?>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="images/logo.png" alt="">
            </div>

            <span class="logo_name">Skillsparq</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="helpDeskCenter">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Dashboard</span>
                    </a></li>
                <li><a href="complaints">
                        <i class="uil uil-files-landscapes"></i>
                        <span class="link-name">Complaints</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-chart"></i>
                        <span class="link-name">Analytics</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="link-name">Like</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Comment</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-share"></i>
                        <span class="link-name">Share</span>
                    </a></li>
            </ul>

            <ul class="logout-mode">
                <li><a href="#">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                        <span class="link-name">Dark Mode</span>
                    </a>

                    <div class="mode-toggle">
                        <span class="switch"></span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
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
                    <span class="text">Recent Users</span>
                </div>

                <table class="content-table">
                    <tr>
                        <th>user_id
                        <th>
                        <th>user_email
                        <th>
                        <th>role
                        <th>
                        <th>View
                        <th>
                        <th>delete
                        <th>


                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "skillsparq");
                            if ($conn->connect_error) {
                                die("connection failed:" . $conn->connect_error);
                            }
                            $sql = "SELECT user_id,user_email,role from user";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["user_id"] . "<td><td>" . $row["user_email"] . "<td><td>" . $row["role"] . "<td>" . "</td><td><button>View</button></td></td>"  . "<td>" . "</td><td><button>Delete</button></td></tr>";
                                }
                                echo "</table>";
                            } else {
                                echo "No Buyers included";
                            }
                            $conn->close();

                            ?>


            </div>
        </div>
        </div>
    </section>

    <script src="../public/assests/js/helpDeskCenter.js"></script>
    < /body>

        < /html>