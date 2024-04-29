<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/assests/css/complaints.styles.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <style>
        .container-details {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            margin-bottom: 2%;
            max-width: 1000px;
            /* Adjust the width as needed */
            margin: 0 auto;
            /* Center the container */
            gap: 20px;
        }

        .seller-details,
        .buyer-details {
            flex: 1;
            /* Each section takes equal width */
            background: #ffffff;
            /* White background */
            padding: 15px;
            border-radius: 8px;
            /* Rounded corners */
            border: 2px solid #dcdcdc;
            /* Light grey border */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 5px;
            /* 
            /* This makes each take roughly half the container width, you can adjust as needed */
        }

        details {
            width: 100%;
            /* Details take the full width of the section */
            display: none;
            /* Hidden by default */
            margin-top: 10px;
            /* Space between the button and the details */
            padding: 10px;
            border-top: 2px solid #dcdcdc;/
        }

        .seller-details button,
        .buyer-details button {
            display: block;
            /* Make the button a block element to fill the width of its container */
            width: 100%;
            /* Optional: if you want the button to be as wide as the container */
            margin-top: 5px;
            /* Add some space between the button and the title */
            /* Add other styles for the button here */
        }
    </style>
    <!----===== Iconscout CSS ===== -->
</head>

<body>
    <?php include "components/helpCenter.component.php"; ?>
    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">Order ID: <?php echo $data['order_id']
                                                ?></span>

            </div>
            <div class="grid">
                <div class="seller-details">
                    <?php
                    foreach ($viewOrder as $row) {
                    ?>
                        <ul>
                            <li>Order ID <span><?php echo $row['order_id']; ?></span></li>
                            <li>Order State: <span><?php echo $row['order_state']; ?></span></li>
                            <li>Order Type: <span><?php echo $row['order_type']; ?></span></li>
                            <li>Order Created Date: <span><?php echo $row['order_created_date']; ?></span></li>
                            <li>Buyer ID: <span><?php echo $row['buyer_id']; ?></span></li>
                            <li>Seller ID: <span><?php echo $row['seller_id']; ?></span></li>

                        </ul>
                    <?php
                    }
                    ?>
                </div>
                <div> <?php if ($row['order_type'] == 'package') { ?>

                        <div class="seller-details">
                            <div style=" display: flex; justify-content:space-between; margin-bottom: 2%; width:250px">
                                <span>
                                    Package details:
                                </span>

                            </div>
                            <div id="viewSeller" class="details">
                                <?php foreach ($package as $package) { // Assuming $packages is the array containing package data 
                                ?>
                                    <ul>
                                        <li>Package Order ID: <span><?php echo ($package['package_order_id']); ?></span></li>
                                        <li>Order Description: <span><?php echo ($package['order_description']); ?></span></li> <!-- Changed 'order_description' to 'amount' -->
                                        <li>Order Attachements: <span><?php echo ($package['order_attachement']); ?></span></li> <!-- Changed 'order_attachments' to 'payment_date' -->
                                        <li>gig Id: <span><?php echo ($package['gig_id']); ?></span></li> <!-- Changed 'gig_id' to 'payment_description' -->
                                        <li>Package ID: <span><?php echo ($package['package_id']); ?></span></li> <!-- Changed 'package_id' to 'payment_status' -->
                                    </ul>
                                <?php } ?>
                            </div>
                        </div>


                    <?php }  ?>
                </div>
                <div class="seller-details">
                    <div style=" display: flex; justify-content:space-between; margin-bottom: 2%; width:250px">
                        <span>
                            Payment details:
                        </span>

                    </div>
                    <div id="viewSeller" class="details">
                        <ul>
                            <li>Payment ID : <span><?php echo $row['payment_id']; ?></span></li>
                            <li>amount: <span><?php echo $row['amount']; ?></span></li>
                            <li>payment_date: <span><?php echo $row['payment_date']; ?></span></li>
                            <li>payment_description: <span><?php echo $row['payment_description']; ?></span></li>
                            <li>payment_status: <span><?php echo $row['payment_state']; ?></span></li>
                        </ul>

                    </div>
                </div>
            </div>


            <div class="grid">


                <div class="seller-details">
                    <div style=" display: flex; justify-content:space-between; margin-bottom: 2%; width:250px">
                        <span>
                            Gig details:
                        </span>

                    </div>
                    <div id="viewSeller" class="details">
                        <ul>
                            <li>Payment ID : <span><?php echo $package['gig_id']; ?></span></li>
                            <li>amount: <span><?php echo $package['title']; ?></span></li>
                            <li>payment_date: <span><?php echo $package['description']; ?></span></li>
                            <li>payment_description: <span><?php echo $package['category']; ?></span></li>
                            <li>payment_status: <span><?php echo $package['cover_image']; ?></span></li>
                            <li>payment_status: <span><?php echo $package['ongoing_order_count']; ?></span></li>
                            <li>payment_status: <span><?php echo $package['created_at']; ?></span></li>
                            <li>payment_status: <span><?php echo $package['state']; ?></span></li>
                            <li>payment_status: <span><?php echo $package['seller_id']; ?></span></li>
                        </ul>

                    </div>

                </div>
                <div>
                    <table class="content-table">
                        <span class="text" style="font-weight: bold; font-size :18px; margin-left:35%; color:black ; margin-top:20px;">Complaints on this GIG</span>
                        <thead>
                            <tr>

                                <th>inquiry_id</th>
                                <th>description </th>
                                <th>inquiry_status </th>
                                <th>view</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Display only the rows for the current page
                            foreach ($complaint as $complaint) {


                            ?>
                                <tr>
                                    <td><?php echo $complaint['inquiry_id']; ?></td>
                                    <td><?php echo $complaint['description']; ?></td>
                                    <td><?php echo $complaint['inquiry_status']; ?></td>
                                    <td><a href='viewComplaints?inquiry_id=<?php echo $complaint["inquiry_id"]; ?>'><i class="fa fa-eye"></i></a></td>

                                </tr>
                            <?php

                            }
                            ?>
                        </tbody>



                    </table>
                </div>


            </div>


</body>

</html>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const descriptions = document.querySelectorAll('#viewSeller li span');
        descriptions.forEach(description => {
            let fullText = description.textContent;
            if (fullText.split(' ').length > 20) {
                let shortText = fullText.split(' ').slice(0, 20).join(' ') + '... ';
                let moreText = fullText.split(' ').slice(20).join(' ');
                let moreSpan = document.createElement('span');
                let moreLink = document.createElement('a');

                moreSpan.textContent = moreText;
                moreSpan.style.display = 'none';

                moreLink.textContent = 'View More';
                moreLink.href = '#';
                moreLink.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (moreSpan.style.display === 'none') {
                        moreSpan.style.display = '';
                        moreLink.textContent = 'View Less';
                    } else {
                        moreSpan.style.display = 'none';
                        moreLink.textContent = 'View More';
                    }
                });

                description.textContent = shortText;
                description.appendChild(moreLink);
                description.appendChild(moreSpan);
            }
        });
    });
</script>