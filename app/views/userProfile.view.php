<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile Page Design Example</title>

    <meta name="author" content="Codeconvey" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <link rel="stylesheet" href="../public/assests/css/HCprofile.styles.css" />
    <link rel="stylesheet" href="../public/assests/css/viewComplaints.styles.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <style>
        #form-container {
            margin-left: 35%;
            border-style: solid;
            width: 50%;
            padding-left: 17%;

        }

        .scrollable-about {
            max-height: 150px;
            /* Set the maximum height */
            overflow-y: auto;
            /* Enable vertical scrolling */
            padding-right: 5px;
            /*
             Optional: for better spacing */
        }

        .recentGigs .recentGigsContent {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .recentGigs .gigCard img {
            max-width: 100%;
            /* Ensures the image is no wider than its container */
            height: auto;
            /* Maintains the aspect ratio */
            border-radius: 10px;
            /* Optional: adds rounded corners to your images */
        }

        .gigCard {
            flex: 1 1 300px;
            /* Flex item can grow and shrink from a base of 300px */
            margin: 10px;
            /* Optional: adds some space around each card */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Optional: adds shadow for better visibility */
            overflow: hidden;
            /* Ensures no content spills out */
        }

        .solved {
            background-color: red;
            color: white;
            padding: 2px 5px;
            border-radius: 5px;
            text-align: center;
        }

        .unsolved {
            background-color: red;
            color: white;
            padding: 2px 5px;
            border-radius: 5px;
            text-align: center;
        }



        .onhold {
            background-color: red;
            color: white;
            padding: 2px 5px;
            border-radius: 5px;
            text-align: center;
        }

        .completed {
            background-color: green;
            color: white;
            padding: 2px 5px;
            border-radius: 5px;
            text-align: center;
        }

        .refunded {
            background-color: orange;
            color: white;
            padding: 2px 5px;
            border-radius: 5px;
            text-align: center;

        }

        .holdForRefund {
            background-color: orangered;
            color: white;
            padding: 2px 5px;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>

<body>

    <?php include "components/helpCenter.component.php"; ?>

    <section>
        <div class="rt-container">
            <div class="col-rt-12">
                <div class="Scriptcontent">

                    <!-- Student Profile -->
                    <div class="student-profile py-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card shadow-sm">
                                        <div class="card-header bg-transparent text-center">
                                            <!-- <img class="profile_img" src="./assests/images/profilePictures/<?php echo $_SESSION['profilePicture'];
                                                                                                                ?>" alt=" student dp">
                                            <h3><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName'] ?></h3> -->
                                        </div>
                                        <div class="card-body">
                                            <?php foreach ($userProfile as $row) { ?>
                                                <p class="mb-0"><strong class="pr-1" style="color:green">User ID:</strong><?php echo $row['user_id'] ?>
                                                </p>
                                                <p class="mb-0"><strong class="pr-1" style="color:green">UserName:</strong><?php echo $row['user_name'] ?>
                                                </p>
                                                <p class=" mb-0"><strong class="pr-1" style="color:green">Email:</strong><?php echo $row['user_email'] ?>
                                                </p>
                                                <p class=" mb-0"><strong class="pr-1" style="color:green">role:</strong><?php echo $row['role'] ?>
                                                </p>
                                            <?php } ?>
                                        </div>

                                    </div>





                                    <div class="card-body">
                                        <table class="content-table">
                                            <span class="text" style="font-weight: bold; margin-left:40%; font-size :18px;  color:black">Orders</span>

                                            <thead>
                                                <tr>
                                                    <th style="max-width: 80px;">OrderID</th>
                                                    <th style="max-width: 80px;">OrderState</th>
                                                    <th> View </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($orderSeller as $order) { ?>
                                                    <tr>
                                                        <td><?php echo ($order['order_id']); ?></td>
                                                        <td><?php echo ($order['order_state']) . "              "; ?></td>
                                                        <td><a href="viewOrder.php?orderId=<?php echo htmlspecialchars($order['order_id']); ?>"><i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                                <div class=" col-lg-8">
                                    <div class="card shadow-sm">
                                        <div class="card-header bg-transparent border-0">
                                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
                                        </div>
                                        <div class="card-body pt-0">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th width="30%">FirstName</th>
                                                    <td width="2%">:</td>
                                                    <td> <?php
                                                            echo $row['first_name'];
                                                            ?></td>
                                                </tr>

                                                <tr>
                                                    <th width="30%">LastName</th>
                                                    <td width="2%">:</td>
                                                    <td> <?php
                                                            echo $row['last_name'];
                                                            ?></td>
                                                </tr>
                                                <tr>
                                                    <th width="30%">Last Seen</th>
                                                    <td width="2%">:</td>
                                                    <td> <?php
                                                            echo $row['last_seen'];
                                                            ?></td>
                                                </tr>


                                            </table>
                                        </div>
                                    </div>
                                    <div style="height: 26px"></div>
                                    <div class="card shadow-sm">
                                        <div class="card-header bg-transparent border-0">
                                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>About</h3>
                                        </div>
                                        <div class="card-body pt-0">


                                            <?php echo htmlspecialchars($row['about']); ?>

                                        </div>

                                    </div>
                                    <div class="card shadow-sm">
                                        <table class="content-table">
                                            <span class="text" style="font-weight: bold; margin-left:40%; font-size :18px;  color:black ; margin-top:20px;">Rating And reviews</span>
                                            <thead>
                                                <tr>
                                                    <th>feedback_id</th>
                                                    <th>SenderID </th>
                                                    <th>ReceiverId </th>
                                                    <th style="max-width: 350px;"> Text </th>
                                                    <th>rating</th>
                                                    <th>feedback_date</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Display only the rows for the current page
                                                foreach ($feedbacks as $feedback) {
                                                    if ($feedback['receiver_user_id'] == $row['user_id']) {

                                                ?>
                                                        <tr>
                                                            <td><?php echo $feedback['feedback_id']; ?></td>
                                                            <td><?php echo $feedback['sender_user_id']; ?></td>
                                                            <td><?php echo $feedback['receiver_user_id']; ?></td>
                                                            <td><?php echo $feedback['feedback_text']; ?></td>
                                                            <td>
                                                                <div class="star-rating">
                                                                    <?php
                                                                    $rating = $feedback['rating'];
                                                                    for ($i = 1; $i <= 5; $i++) {
                                                                        if ($i <= $rating) {
                                                                            echo '<span class="star" style="color:gold; font-size:16px;">&#9733;</span>'; // Filled star
                                                                        } else {
                                                                            echo '<span class="star" style="color:gold; font-size:16px;">&#9734;</span>'; // Empty star
                                                                        }
                                                                    }
                                                                    echo '(' . '<span style="font-size:12px;">' . $feedback['rating'] . '</span>' . ')';

                                                                    ?>
                                                                </div>
                                                            </td>

                                                            <td><?php echo $feedback['feedback_date']; ?></td>





                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>



                                        </table>

                                    </div>
                                    <div class="card shadow-sm">
                                        <table class="content-table">
                                            <span class="text" style="font-weight: bold; margin-left:45%; font-size :18px;  color:black ; margin-top:20px;">Gigs</span>
                                            <thead>
                                                <tr>
                                                    <th>feedback_id</th>
                                                    <th>SenderID </th>
                                                    <th>ReceiverId </th>
                                                    <th style="max-width: 350px;"> Text </th>
                                                    <th>View</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Display only the rows for the current page
                                                foreach ($recentGigs as $gig) {
                                                    if ($gig['seller_id'] == $row['user_id']) {

                                                ?>
                                                        <tr>
                                                            <td><?php echo $gig['gig_id']; ?></td>
                                                            <td><?php echo $gig['title']; ?></td>
                                                            <td><?php echo $gig['category']; ?></td>
                                                            <td><?php echo $gig['ongoing_order_count']; ?></td>
                                                            <td> <a href="displayGig?gigId=<?php echo urlencode($gig['gig_id']); ?>&userId=<?php echo urlencode($row['user_id']); ?>">

                                                                    <i class="fa fa-eye"></i>
                                                                </a>

                                                            </td>







                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>



                                        </table>
                                    </div>
                                    <div class="card shadow-sm">
                                        <span class="text" style="font-weight: bold; margin-left:33%; font-size :18px;  color:black ;  margin-top:20px;">Complaints About Seller</span>
                                        <table class="content-table">

                                            <thead>
                                                <tr>
                                                    <th>inquiry_ID</th>
                                                    <th>subject </th>
                                                    <th>inquiry_status </th>
                                                    <th> created At </th>
                                                    <th>View</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Display only the rows for the current page
                                                foreach ($recentComplaints as $complaint) {


                                                ?>
                                                    <tr>
                                                        <td><?php echo $complaint['inquiry_id']; ?></td>
                                                        <td><?php echo $complaint['subject']; ?></td>
                                                        <td>
                                                            <div class="<?php echo $complaint['inquiry_status']; ?>"><?php echo $complaint['inquiry_status']; ?></div>
                                                        </td>
                                                        <td><?php echo $complaint['created_at']; ?></td>
                                                        <td><a href='viewComplaints?inquiry_id=<?php echo $complaint["inquiry_id"]; ?>'><i class="fa fa-eye"></i></a></td>







                                                    </tr>
                                                <?php

                                                }
                                                ?>
                                            </tbody>



                                        </table>
                                    </div>
                                    <div class="card shadow-sm">
                                        <span class="text" style="font-weight: bold; margin-left:40%; font-size :18px;  color:black ;  margin-top:20px;">Payments</span>
                                        <table class="content-table">

                                            <thead>
                                                <tr>
                                                    <th>Payment ID</th>
                                                    <th>Payer ID </th>
                                                    <th>amount </th>
                                                    <th style="width: 200px;"> payment Status </th>
                                                    <th style="width: 160px;"> Created At </th>
                                                    <th>View</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Display only the rows for the current page
                                                foreach ($paymentSeller as $payment) {


                                                ?>
                                                    <tr>
                                                        <td><?php echo $payment['payment_id']; ?></td>
                                                        <td><?php echo $payment['payer_id']; ?></td>
                                                        <td><?php echo $payment['amount']; ?></td>
                                                        <td>
                                                            <div class="<?php echo $payment['payment_status']; ?>"><?php echo $payment['payment_status']; ?></div>
                                                        </td>
                                                        <td><?php echo $payment['payment_date']; ?></td>
                                                        <td><a href='viewComplaints?inquiry_id=<?php echo $complaint["inquiry_id"]; ?>'><i class="fa fa-eye"></i></a></td>


                                                    </tr>
                                                <?php

                                                }
                                                ?>
                                            </tbody>



                                        </table>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    </script>
</body>

</html>