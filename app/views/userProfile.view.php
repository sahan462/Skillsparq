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
            /* Optional: for better spacing */
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

                                </div>

                            </div>

                        </div>

                    </div>


                    </script>
</body>

</html>