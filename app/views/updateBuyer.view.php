<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Responsive Admin Dashboard</title>
    <link rel="stylesheet" href="../public/assests/css/updateBuyer.styles.css">
     
    <!----===== Iconscout CSS ===== -->
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
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Shipping Address</th>
            <th>Phone</th>
            <th>Payment</th>
            <th>Action</th> <!-- New column for update buttons -->
        </tr>
        
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
           while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["shipping_address"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["payment"] . "</td>";
            echo "<td><a href='updateBuyer.php?id=" . $row["id"] . "'>Update</a></td>"; // Add the update button
            echo "</tr>";
        }
        echo "</table>";
        ?>
    
       

</body>
</html>
