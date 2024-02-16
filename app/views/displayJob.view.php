<?php 
    include "/xampp/htdocs/skillsparq/app/views/components/sellerHeader.component.php";
    $job = $data['job'];
   print_r ($job);
?>

    <div class="displayJobContainer">

        <div class="displayJobHeader">
            <?php echo $job['title']?>
        </div>

        <div class="displayJobContent">

            <div class="displayJobMajorDetails">

                <div class="displayJobMajorDetailsCategory">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                    </svg>
                    <?php echo $job['category']?>

                </div>

                <div class="displayJobCreatedTimeDetails">
                    Job Posted :
                    <?php echo $job['created_at']?>
                </div>
                
                <div class="displayJobMajorDetailsDescription">
                    <?php echo $job['description']?>
                </div>

                <div class="displayJobMajorDetailsDeadline">
                    Have to be done before : 
                    <?php echo $job['deadline']?>
                </div>

                <div class="displayJobMajorDetailsNegotiability">
                    <?php 
                        if($job['flexible_amount'] === "1"){
                            echo "Negotiable";
                        }else{
                            echo "Non - Negotiable";
                        }
                    ?>
                </div>

                <div class="displayJobMajorDetailsFile">
                    Download job File : 
                </div>

            <?php if($job['publish_mode'] == 'Auction Mode'){?>

                <div class="displayJobBidAuction">

                    <div class="auctionDetailHeader">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M318.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-120 120c-12.5 12.5-12.5 32.8 0 45.3l16 16c12.5 12.5 32.8 12.5 45.3 0l4-4L325.4 293.4l-4 4c-12.5 12.5-12.5 32.8 0 45.3l16 16c12.5 12.5 32.8 12.5 45.3 0l120-120c12.5-12.5 12.5-32.8 0-45.3l-16-16c-12.5-12.5-32.8-12.5-45.3 0l-4 4L330.6 74.6l4-4c12.5-12.5 12.5-32.8 0-45.3l-16-16zm-152 288c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3l48 48c12.5 12.5 32.8 12.5 45.3 0l112-112c12.5-12.5 12.5-32.8 0-45.3l-1.4-1.4L272 285.3 226.7 240 168 298.7l-1.4-1.4z"/></svg>
                        Auction Details
                    </div>
                    
                    <div class="auctionDetailContent">

                        <div class="auctionStartTime">
                            Auction Start at : <?php echo $job['start_time']?>
                        </div>

                        <div class="auctionEndTime">
                            Auction End at : <?php echo $job['end_time']?>
                        </div>

                        <div class="auctionStartingBid">
                            Bid Starts from : <?php echo $job['starting_bid']?>
                        </div>

                        <div class="auctionCurrentMinBid">
                            Current Minimum Bid : <?php echo $job['min_bid_amount']?>
                        </div>

                        <div class="auctionCurrentMaxBid">
                            Current Maximum Bid : <?php echo $job['current_highest_bid']?>
                        </div>

                    </div>

                </div>

            <?php }else if($job['publish_mode'] == 'Standard Mode'){?>

            <?php }?>

            </div>
            <div class="jobViewBuyerDetailsSideBar">

                <div class="jobViewBuyerDetialsAbout">
                    About The Client
                    <div class="jobViewBuyerDetialsPayVer">payment method verified</div>
                    <div class="jobViewBuyerDetialsRatings">Ratings</div>
                    <div>
                    <ul class="jobViewBuyerDetialsUnOrList">
                        <li class="jobViewBuyerDetailsListItems">country</li>
                        <li class="jobViewBuyerDetailsListItems">posted job count</li>
                        <li class="jobViewBuyerDetailsListItems">total spendings</li>
                        <li class="jobViewBuyerDetailsListItems">average hrs per rate paid</li>
                        <li class="jobViewBuyerDetailsListItems">member since</li>
                    </ul>
                    </div>
                    
                </div>

            </div>

        </div>
    
    </div>

<script src="/public/assests/js/displayJob.script.js"></script>
<?php include "/xampp/htdocs/skillsparq/app/views/components/footer.component.php";?>