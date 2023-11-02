<!DOCTYPE html>
<head>
<meta charset="UTF-8" />
    <title>Responsiive Admin Dashboard</title>
    <link rel="stylesheet" href="../public/assests/css/readBuyer.styles.css" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
    

<body>

<div class="sidebar">

<div class="logo-details">
  <span class="logo_name">SKILLSPARQ</span>
</div>

<ul class="nav-links">
  <li>
    <a href="#" >
      <i class="bx bx-grid-alt"></i>
      <span class="links_name">Dashboard</span>
    </a>
  </li>
  <li>
    <a href="manageCustomers" class="active">
      <i class="bx bx-box"></i>
      <span class="links_name" >Manage Users</span>
    </a>
  </li>
  <li>
    <a href="#">
      <i class="bx bx-list-ul"></i>
      <span class="links_name">Manage Gigs</span>
    </a>
  </li>
  <li>
    <a href="#">
      <i class="bx bx-pie-chart-alt-2"></i>
      <span class="links_name">Manage Jobs</span>
    </a>
  </li>
  <li>
    <a href="#">
      <i class="bx bx-coin-stack"></i>
      <span class="links_name">Manage Orders</span>
    </a>
  </li>
  <li>
    <a href="#">
      <i class="bx bx-book-alt"></i>
      <span class="links_name">Manage Finance</span>
    </a>
  </li>
  <li>
    <a href="#">
      <i class="bx bx-user"></i>
      <span class="links_name">Team</span>
    </a>
  </li>
  <li>
    <a href="#">
      <i class="bx bx-message"></i>
      <span class="links_name">Messages</span>
    </a>
  </li>
  <li>
    <a href="#">
      <i class="bx bx-heart"></i>
      <span class="links_name">Favrorites</span>
    </a>
  </li>
  <li>
    <a href="#">
      <i class="bx bx-cog"></i>
      <span class="links_name">Setting</span>
    </a>
  </li>
  <li class="log_out">
    <a href="#">
      <i class="bx bx-log-out"></i>
      <span class="links_name">Log out</span>
    </a>
  </li>
</ul>

</div>


<section class="home-section">
<nav>
  <div class="sidebar-button">
    <i class="bx bx-menu sidebarBtn"></i>
    <span class="dashboard">Dashboard</span>
  </div>
  <div class="search-box">
    <input type="text" placeholder="Search..." />
    <i class="bx bx-search"></i>
  </div>
  <div class="profile-details">
    <img src="images/profile.jpg" alt="" />
    <span class="admin_name">Prem Shahi</span>
    <i class="bx bx-chevron-down"></i>
  </div>
</nav>

<div class="home-content">

  
  

<p class="heading">List of Buyers</p>
    
<table class="content-table">
    <tr>
        <th>name<th>
        <th>username<th>
        <th>email<th>
        <th>shipping_address<th>
        <th>phone<th>
        <th>payment<th>
            <?php 
            $conn = mysqli_connect("localhost","root","","skillsparq");
            if($conn -> connect_error){
                die("connection failed:". $conn -> connect_error);

            }
            $sql = "SELECT name,username,email,shipping_address,phone,payment from create_buyer";
            $result = $conn -> query($sql);

            if($result ->num_rows >0){
                while($row = $result -> fetch_assoc()){
                    echo "<tr><td>".$row["name"]."<td><td>".$row["username"]."<td><td>".$row["email"]."<td><td>".$row["shipping_address"]."<td><td>".$row["phone"]."<td><td>".$row["payment"]."<td></tr>";
                }
                echo "</table>";

            }
            else{
                echo "No Buyers included";
            }
            $conn -> close();

        ?>


</body>
</html>