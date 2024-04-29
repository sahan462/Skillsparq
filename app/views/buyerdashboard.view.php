<?php include "components/buyerHeader.component.php"; ?>

<?php
    $recentGigs = $data['recentGigs'];
    $newBieGigs = $data['newBieGigs'];
?>

<div class="buyerDashboardContent">

    <!--Header -->
        <div class="personalizedHeader">
            Hey there, <?php echo $_SESSION['firstName']?>
            <div class = "searchBar">
                <!-- Search Bar to Search for the buyer -->
                <form action="search" method="GET">
                    <input type="text" placeholder="Search.." name="searchBuyerDash">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>

    <!-- Main Container -->
    <div class="mainContent">

        <!--Container 1  -->
        <div class="recentGigs" id="content">
            <a href="">
                <div class="row">
                    <h2>Recent Gigs</h2>
                </div>
            </a>
            <div class="recentGigsContent">
                <?php
                    foreach($recentGigs as $row){
                ?>
                        <?php include "components/GigCard.component.php"?>
                <?php
                    }
                ?>
            </div>
        </div>

        <!-- Container 3 -->
        <div class="newBieGigs" id="content">
            <a href="">
                <div class="row">
                    <div class="leftSide">
                        <h2>NewBie Gigs</h2>
                    </div>
                    <div class="rightSide">
                        <svg id="left" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"></path>
                        </svg>
                        <svg id="right" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                        </svg>
                    </div>
                </div>
            </a>
            <div class="newBieGigsContent">
                <?php
                    foreach($newBieGigs as $row){
                ?>
                        <?php include "components/gigCard.component.php"?>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./assests/js/buyerDashboard.script.js"></script>
<script src="./assests/js/notifications.script.js"></script>

<?php include "components/footer.component.php"?>
