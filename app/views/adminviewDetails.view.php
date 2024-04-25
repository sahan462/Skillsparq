<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="../public/assests/css/adminDashboard.styles.css" />

    <title>Document</title>
</head>

<body>
    <?php include "components/adminDashboard.component.php"; ?>
    <div class="dash-content">
        <div class="overview">
            <div class="title">

            </div>

            <button onclick="user()">user</button>
            <button onclick="gigs()">gigs</button>
            <button onclick="orders()">Orders</button>
            <button onclick="payment()">payment</button>
        </div>
        <br>
        <br>
        <table class="content-table" id="user">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>User Email</th>
                    <th>Role</th>
                    <th>View</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($users as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['user_email']; ?></td>
                        <td><?php echo $row['role']; ?></td>

                        <td><a href='viewHelpRequestDetails?inquiry_id=<?php echo $row["inquiry_id"]; ?>'>
                                <button>View</button>
                            </a></td>
                    </tr>
                <?php
                }

                ?>
            </tbody>
        </table>

        <br>
        <br>

        <table class="content-table" id="payment">
            <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>Payer ID</th>
                    <th>Payee ID</th>
                    <th>Amount</th>
                    <th>Payment Date</th>
                    <th>View</th>


                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($payments as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['payment_id']; ?></td>
                        <td><?php echo $row['payer_id']; ?></td>
                        <td><?php echo $row['payee_id']; ?></td>
                        <td><?php echo $row['amount']; ?></td>
                        <td><?php echo $row['payment_date']; ?></td>

                        <td><a href='viewHelpRequestDetails?inquiry_id=<?php echo $row["inquiry_id"]; ?>'>
                                <button>View</button>
                            </a></td>
                    </tr>
                <?php
                }

                ?>
            </tbody>
        </table>

        <br>
        <br>

        <table class="content-table" id="gigs">
            <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>Payer ID</th>
                    <th>Payee ID</th>
                    <th>Amount</th>
                    <th>Payment Date</th>
                    <th>View</th>


                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($gigs as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['gig_id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>

                        <td><a href='viewHelpRequestDetails?inquiry_id=<?php echo $row["inquiry_id"]; ?>'>
                                <button>View</button>
                            </a></td>
                    </tr>
                <?php
                }

                ?>
            </tbody>
        </table>
        <table class="content-table" id="orders">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Order State</th>
                    <th>Order Type</th>
                    <th>Order Created Date</th>
                    <th>view
                    <th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($orders as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['order_state']; ?></td>
                        <td><?php echo $row['order_type']; ?></td>
                        <td><?php echo $row['order_created_date']; ?></td>

                        <td><a href='viewHelpRequestDetails?inquiry_id=<?php echo $row["inquiry_id"]; ?>'>
                                <button>View</button>
                            </a></td>
                    </tr>
                <?php
                }

                ?>
            </tbody>
        </table>

    </div>
</body>

</html>

<script>
    function payment() {

        document.getElementById('user').style.display = 'none';
        document.getElementById('payment').style.display = 'table';
        document.getElementById('gigs').style.display = 'none';
        document.getElementById('orders').style.display = 'none';
    }

    function user() {

        document.getElementById('user').style.display = 'table';
        document.getElementById('payment').style.display = 'none';
        document.getElementById('gigs').style.display = 'none';
        document.getElementById('orders').style.display = 'none';
    }

    function gigs() {

        document.getElementById('user').style.display = 'none';
        document.getElementById('payment').style.display = 'none';
        document.getElementById('gigs').style.display = 'table';
        document.getElementById('orders').style.display = 'none';
    }

    function orders() {

        document.getElementById('user').style.display = 'none';
        document.getElementById('payment').style.display = 'none';
        document.getElementById('gigs').style.display = 'none';
        document.getElementById('orders').style.display = 'table';

    }
</script>