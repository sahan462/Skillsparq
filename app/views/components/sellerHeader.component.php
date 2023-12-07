<?php
$data['profilePicture'] = "avishka.jpg";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKILLSPARQ</title>
    <link rel="stylesheet" href="./assests/css/sellerHeader.styles.css">
    <link rel="stylesheet" href="./assests/css/sellerDashboard.styles.css">
    <link rel="stylesheet" href="./assests/css/sellerProfile.styles.css">
    <link rel="stylesheet" href="./assests/css/jobCard.styles.css">
    <link rel="stylesheet" href="./assests/css/addGig.styles.css">
    <link rel="stylesheet" href="./assests/css/order.styles.css">
    <link rel="stylesheet" href="./assests/css/manageOrders.styles.css">
    <link rel="stylesheet" href="./assests/css/chat.styles.css">
    <link rel="stylesheet" href="./assests/css/footer.styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>

        <div class="upperHeader">
            <div class="logo">
                <a href="#">SKILLSPARQ</a>
            </div>
            <div class="navbar">
                <nav>
                    <ul class="nav-links">
                        <li class="wordLink"><a href="sellerDashboard">Dashboard</a></li>
                        <li class="wordLink"><a href="manageOrders">Orders</a></li>
                        <li class="wordLink"><a href="#">Earnings</a></li>
                        <li class="wordLink"><a href="loginUser">Buying Mode</a></li>
                    </ul>
                </nav>
                <nav>
                    <ul class="nav-links">
                        <div class="svgLinks">
                            <li>
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5" />
                                    </svg>
                                    <div class="notificationSign"></div>
                                </a>
                            </li>
                            <li>
                                <a href="chat">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                    </svg>
                                    <div class="notificationSign"></div>
                                </a>
                            </li>
                        </div>
                        <div class="wordLinks">
                            <li><a href="loginUser/logout" class="wordLink">Sign Out</a></li>
                        </div>

                        <li class="imgLinks">
                            <a href="sellerProfile" class="imgLink">
                                <img src="../public/assests/images/<?php echo $data["profilePicture"] ?>" alt="pro-pic">
                                <div class="loginSign"></div>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </header>