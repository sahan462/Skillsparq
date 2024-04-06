<?php include "components/sellerHeader.component.php";?>

<div class="sellerEarningsContainer">
    <!-- Topic -->
    <div class="sellerEarningsHeader">
        My Earnings
    </div>

    <div class="sub-container">

        <div class="profile-container">

            <div class="profile">

                <div class="seller-profile-picture">

                    <img src="../public/assests/images/profilePictures/<?php echo $profilepicture?>" alt="pro-pic">


                </div>

                <div class="user-info">

                    <div class="info">

                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                            </svg>
                            Member Since
                        </span>

                        <span><b><?php echo $DateJoined;?></b></span>

                    </div>

                </div>

            </div>

            <div class="profile">

                <div class="description">

                    <div class="topic">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                        </svg>
                        <span>About</span>

                    </div>

                    <div class="description-content">

                        <?php echo $about;?>

                    </div>

                </div>

            </div>

        </div>

        <div class="sellerUser-contribution">

            <div class="sellerUser-content">

                <div class="sellerheader">

                    <a href="addGig"><button>Create A New Gig</button></a>

                </div>

            </div>

            <div class="reviews">

                <div class="sellerheader">

                    <span>Feedbacks and ratings</span>

                </div>

                <div class="review-content">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>No feedbacks available</span>

                </div>

            </div>

            <!-- <div class="reviews"> -->

                <div class="sellerUser-content">

                    <div class="sellerheader">

                        <span>My Portfolio</span>
                        <a href=""><button>Add to Portfolio</button></a>
                        
                    </div>

                    <div class="review-content">

                            <?php //if(empty()){?>
                                <?php //}?>

                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M9 1.09V6H7V1.09C4.16 1.57 2 4.03 2 7c0 2.22 1.21 4.15 3 5.19V21c0 .55.45 1 1 1h4c.55 0 1-.45 1-1v-8.81c1.79-1.04 3-2.97 3-5.19c0-2.97-2.16-5.43-5-5.91m1 9.37l-1 .58V20H7v-8.96l-1-.58C4.77 9.74 4 8.42 4 7c0-1 .37-1.94 1-2.65V8h6V4.35c.63.71 1 1.65 1 2.65c0 1.42-.77 2.74-2 3.46m10.94 7.48a3.253 3.253 0 0 0 0-.89l.97-.73a.22.22 0 0 0 .06-.29l-.92-1.56c-.05-.1-.18-.14-.29-.1l-1.15.45c-.24-.17-.49-.32-.78-.44l-.17-1.19a.235.235 0 0 0-.23-.19h-1.85c-.12 0-.22.08-.24.19l-.17 1.19c-.29.12-.54.27-.78.44l-1.15-.45c-.1-.04-.24 0-.28.1l-.93 1.56c-.06.1-.03.22.06.29l.97.73c-.01.15-.03.3-.03.45s.02.29.03.44l-.97.74a.22.22 0 0 0-.06.29l.93 1.56c.04.1.18.13.28.1l1.15-.46c.24.18.49.33.78.45l.17 1.19c.02.11.12.19.24.19h1.85c.11 0 .21-.08.23-.19l.17-1.19c.29-.12.54-.27.78-.45l1.15.46c.11.03.24 0 .29-.1l.92-1.56a.22.22 0 0 0-.06-.29zM17.5 19c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5s1.5.67 1.5 1.5s-.67 1.5-1.5 1.5"/></svg>
                        <span>Setup Your Portfolio Right Now !</span>

                    </div>

                </div>

        </div>
        
    </div>

    </div>

    

<script src="/skillsparq/public/assests/js/manageOrders.script.js"></script>

<?php include "components/footer.component.php";?>