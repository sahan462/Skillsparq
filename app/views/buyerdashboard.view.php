<?php include "components/buyerHeader.component.php"; ?>

<?php
    $recentGigs = $data['recentGigs'];
    // print_r($_SESSION);
?>

<div class="buyerDashboardContent">

    <!--Header -->
        <div class="personalizedHeader">
            Hey there, <?php echo $_SESSION['firstName']?>
            <div class = "searchBar">
                <form action="">
                    <input type="text" placeholder="Search.." name="search">
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


        <!-- Container 2 -->
        <div class="trendingGigs" id="content">
            <a href="">
                <div class="row">
                    <div class="leftSide">
                        <h2>Top Gigs</h2>
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M12.97 3.97a.75.75 0 011.06 0l7.5 7.5a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 11-1.06-1.06l6.22-6.22H3a.75.75 0 010-1.5h16.19l-6.22-6.22a.75.75 0 010-1.06z" clip-rule="evenodd" />
                        </svg> -->
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
            <?php include "components/cardSlider.component.php"?>
        </div>


        <!-- Container 3 -->
        <div class="newBieGigs" id="content">
            <a href="">
                <div class="row">
                    <div class="leftSide">
                        <h2>NewBie Gigs</h2>
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M12.97 3.97a.75.75 0 011.06 0l7.5 7.5a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 11-1.06-1.06l6.22-6.22H3a.75.75 0 010-1.5h16.19l-6.22-6.22a.75.75 0 010-1.06z" clip-rule="evenodd" />
                        </svg> -->
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
            <?php include "components/cardSlider.component.php"?>
        </div>
    </div>

</div>

<script src="./assests/js/buyerDashboard.script.js"></script>
<script src="./assests/js/notifications.script.js"></script>

<?php include "components/footer.component.php"?>
