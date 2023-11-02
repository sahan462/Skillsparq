<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Responsiive Admin Dashboard</title>
    <link rel="stylesheet" href="../public/assests/css/manageCustomers.styles.css" />
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
          <a href="..\app\views\AdminDashboard.view.php" >
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="#" class="active">
            <i class="bx bx-box"></i>
            <span class="links_name" id="manage-users">Manage Users</span>
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

        
        <div class="personalizedHeader">
          Welcome Admin, Damitha
        </div>
        
        <div class="overview-boxes">
      
          <div class="box">
            <div class="right-side">
              <div class="box-topic"><a href="createBuyer">Add buyer</div>
           
              <div class="indicator">
                
             
              </div>
            </div>
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAUlJREFUSEvt1M0qBlEcB+CHC/AVWShkIykLWxauRJJYKZG9shUpO7FwHxa+s3YBWLgCKxt0NDS95sy87zh6F8z6zP/p9zsfHdr0dbTJlRoe5mPmY1WglPAAbtGJGTyV4angPlxiIsNC4lI8FXyExYaED5iNJU8F9+AU0w34BnaLKv8J3ItVbOMNjfg+1mL7XBcO6AUmcYKFDO/CGe4wn/pw9We1TuUGH2Mpw7vxjNeUcEDD6R0vGJpPXnWNW3pAytAA/Qo8mO1dUdKW0fBDM4croNcYi/R3iJVsfysr/lxQBQ/hvAJdblrLLSyDA3qFkcjgg+we13GjVf8qWrbH9xiNRNnDeq2YTVQdnsCibwebP0XLEhfBydBW4KRoGTyXq/MFNynqzc+ousepva95//BnFbHrVLf6b83Gqm4bvFU3WuS/b/P+3uF6B/GZOB9oFIc0AAAAAElFTkSuQmCC"/>
          </div>
          
          <div class="box">
          <a href="readBuyer">
            <div class="right-side">
              <div class="box-topic" style="text-decoration:none">View Buyer </div>
          </a>
              <div class="indicator">
          
                
              </div>
            </div>
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAUlJREFUSEvt1M0qBlEcB+CHC/AVWShkIykLWxauRJJYKZG9shUpO7FwHxa+s3YBWLgCKxt0NDS95sy87zh6F8z6zP/p9zsfHdr0dbTJlRoe5mPmY1WglPAAbtGJGTyV4angPlxiIsNC4lI8FXyExYaED5iNJU8F9+AU0w34BnaLKv8J3ItVbOMNjfg+1mL7XBcO6AUmcYKFDO/CGe4wn/pw9We1TuUGH2Mpw7vxjNeUcEDD6R0vGJpPXnWNW3pAytAA/Qo8mO1dUdKW0fBDM4croNcYi/R3iJVsfysr/lxQBQ/hvAJdblrLLSyDA3qFkcjgg+we13GjVf8qWrbH9xiNRNnDeq2YTVQdnsCibwebP0XLEhfBydBW4KRoGTyXq/MFNynqzc+ousepva95//BnFbHrVLf6b83Gqm4bvFU3WuS/b/P+3uF6B/GZOB9oFIc0AAAAAElFTkSuQmCC"/>
          </div>
        
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Update Buyer</div>
         
              <div class="indicator">
            
              </div>
            </div>
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAUlJREFUSEvt1M0qBlEcB+CHC/AVWShkIykLWxauRJJYKZG9shUpO7FwHxa+s3YBWLgCKxt0NDS95sy87zh6F8z6zP/p9zsfHdr0dbTJlRoe5mPmY1WglPAAbtGJGTyV4angPlxiIsNC4lI8FXyExYaED5iNJU8F9+AU0w34BnaLKv8J3ItVbOMNjfg+1mL7XBcO6AUmcYKFDO/CGe4wn/pw9We1TuUGH2Mpw7vxjNeUcEDD6R0vGJpPXnWNW3pAytAA/Qo8mO1dUdKW0fBDM4croNcYi/R3iJVsfysr/lxQBQ/hvAJdblrLLSyDA3qFkcjgg+we13GjVf8qWrbH9xiNRNnDeq2YTVQdnsCibwebP0XLEhfBydBW4KRoGTyXq/MFNynqzc+ousepva95//BnFbHrVLf6b83Gqm4bvFU3WuS/b/P+3uF6B/GZOB9oFIc0AAAAAElFTkSuQmCC"/>
          </div>

         

          <div class="box">
            <div class="right-side">
              <div class="box-topic">Delete buyer</div>
         
              <div class="indicator">
            
              </div>
            </div>
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAUlJREFUSEvt1M0qBlEcB+CHC/AVWShkIykLWxauRJJYKZG9shUpO7FwHxa+s3YBWLgCKxt0NDS95sy87zh6F8z6zP/p9zsfHdr0dbTJlRoe5mPmY1WglPAAbtGJGTyV4angPlxiIsNC4lI8FXyExYaED5iNJU8F9+AU0w34BnaLKv8J3ItVbOMNjfg+1mL7XBcO6AUmcYKFDO/CGe4wn/pw9We1TuUGH2Mpw7vxjNeUcEDD6R0vGJpPXnWNW3pAytAA/Qo8mO1dUdKW0fBDM4croNcYi/R3iJVsfysr/lxQBQ/hvAJdblrLLSyDA3qFkcjgg+we13GjVf8qWrbH9xiNRNnDeq2YTVQdnsCibwebP0XLEhfBydBW4KRoGTyXq/MFNynqzc+ousepva95//BnFbHrVLf6b83Gqm4bvFU3WuS/b/P+3uF6B/GZOB9oFIc0AAAAAElFTkSuQmCC"/>
          </div>


        </div>
      </div>
    </section>

    <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };
    </script>
  </body>
</html>