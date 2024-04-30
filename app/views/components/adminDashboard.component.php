<nav>
    <div class="logo-name">
        <div class="logo-image">
            <img src="images/logo.png" alt="">
        </div>

        <span class="logo_name">Skillsparq</span>
    </div>

    <div class="menu-items">
        <ul class="nav-links">
            <li><a href="adminDashboard">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
            <li><a href="generateReport">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Generate Report</span>
                </a></li>
            <li><a href="IssueRefunds">
                    <i class="uil uil-files-landscapes"></i>

                    <span class="link-name">Issue Refunds</span>
                </a></li>
            <li><a href="adminManageCSA">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="link-name">Manage CSA</span>
                </a></li>
            <li><a href="adminviewDetails">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">View Details</span>
                </a></li>
            <li><a href="ratingCSA">
                    <i class="uil uil-star"></i>
                    <span class="link-name">Rating and CSA</span>
                </a></li>
        </ul>

        <ul class="logout-mode">
            <li><a href="loginUser/logout">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>


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
        <div class="profile-dropdown">
            <div onclick="toggle()" class="profile-dropdown-btn">
                <div class="profile-img">
                    <img style="height: 50px; width: 45px; border-radius: 50%;" class="profile_img" src="./assests/images/profilePictures/<?php echo $_SESSION['profilePicture'];
                                                                                                                                            ?>" alt=" student dp">
                    <i class="fa-solid fa-circle"></i>
                </div>

                <span><?php echo $_SESSION['firstName'] ?>
                    <i class="fa-solid fa-angle-down"></i>
                </span>
            </div>

            <ul class="profile-dropdown-list">
                <li class="profile-dropdown-list-item">
                    <a href="HCprofile">
                        <i class="fa-regular fa-user"></i>
                        Profile
                    </a>
                </li>

                <li class="profile-dropdown-list-item">
                    <a href="#">
                        <i class="fa-regular fa-envelope"></i>
                        Inbox

                    </a>
                </li>

                <li class="profile-dropdown-list-item">
                    <a href="adminManageCSA">
                        <i class="fa-solid fa-chart-line"></i>
                        Analytics
                    </a>
                </li>

                <li class="profile-dropdown-list-item">
                    <a href="">
                        <i class="fa-solid fa-sliders"></i>
                        Settings
                    </a>
                </li>

                <li class="profile-dropdown-list-item">
                    <a href="#">
                        <i class="fa-regular fa-circle-question"></i>
                        Help & Support
                    </a>
                </li>
                <hr />

                <li class="profile-dropdown-list-item">
                    <a href="loginUser/logout">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        Log out
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <script>
        let profileDropdownList = document.querySelector(".profile-dropdown-list");
        let btn = document.querySelector(".profile-dropdown-btn");

        let classList = profileDropdownList.classList;

        const toggle = () => classList.toggle("active");

        window.addEventListener("click", function(e) {
            if (!btn.contains(e.target)) classList.remove("active");
        });


        const body = document.querySelector("body"),
            modeToggle = body.querySelector(".mode-toggle");
        sidebar = body.querySelector("nav");
        sidebarToggle = body.querySelector(".sidebar-toggle");

        let getMode = localStorage.getItem("mode");
        if (getMode && getMode === "dark") {
            body.classList.toggle("dark");
        }

        let getStatus = localStorage.getItem("status");
        if (getStatus && getStatus === "close") {
            sidebar.classList.toggle("close");
        }

        modeToggle.addEventListener("click", () => {
            body.classList.toggle("dark");
            if (body.classList.contains("dark")) {
                localStorage.setItem("mode", "dark");
            } else {
                localStorage.setItem("mode", "light");
            }
        });

        sidebarToggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
            if (sidebar.classList.contains("close")) {
                localStorage.setItem("status", "close");
            } else {
                localStorage.setItem("status", "open");
            }
        });
    </script>