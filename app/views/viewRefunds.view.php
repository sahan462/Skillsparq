<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assests/css/viewComplaints.styles.css" />
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />


    <title>Admin Dashboard Panel</title>
</head>

<body>
    <?php include "components/adminDashboard.component.php"; ?>

    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">payment ID no: <?php echo $data['payment_id']
                                                    ?></span>

            </div>

        </div>

        <div style="display: flex;">
            <div class="grid">
                <p style="font-weight: bold ; font-size:large">Request Details</P>
                <?php
                foreach ($viewrefund as $row) {
                ?>
                    <ul>
                        <li>Payment_ID <span><?php echo $row['payment_id']; ?></span></li>
                        <li>Refund_Issuer_ID: <span><?php echo $row['refund_issuer_id']; ?></span></li>
                        <li>Refund_Receiver_ID: <span><?php echo $row['refund_receiver_id']; ?></span></li>
                        <li>Refund_date: <span><?php echo $row['refund_date']; ?></span></li>
                        <li>Refund_cause: <span><?php echo $row['refund_cause']; ?></span></li>
                        <li>Response CSA: <span><?php echo $row['responseCSA']; ?></span></li>
                        <li>Refund Status: <span><?php echo $row['refund_state']; ?></span></li>
                    </ul>
                <?php
                }
                ?>


            </div>

            <div class="grid">
                <p style="font-weight: bold ; font-size:large">Inquiry Details</P>
                <?php
                foreach ($viewrefund as $row) {
                ?>
                    <ul>
                        <li>Inquiry_ID <span><?php echo $row['inquiry_id']; ?></span></li>
                        <li>Subject: <span><?php echo $row['subject']; ?></span></li>
                        <li>Description: <span><?php echo $row['description']; ?></span></li>
                        <li>Attachments: <span><?php echo $row['attachements']; ?></span></li>
                        <li>Response: <span><?php echo $row['response']; ?></span></li>
                        <li>Inquiry_status: <span><?php echo $row['inquiry_status']; ?></span></li>
                        <li>Created_at: <span><?php echo $row['created_at']; ?></span></li>
                    </ul>
                <?php
                }
                ?>
            </div>

            <div class="grid">
                <p style="font-weight: bold ; font-size:large">Payment Details</P>
                <?php
                foreach ($viewrefund as $row) {
                ?>
                    <ul>
                        <li>Payment_ID <span><?php echo $row['payment_id']; ?></span></li>
                        <li>Payer_id: <span><?php echo $row['payer_id']; ?></span></li>
                        <li>Payee_id: <span><?php echo $row['payee_id']; ?></span></li>
                        <li>Amount: <span><?php echo $row['amount']; ?></span></li>
                        <li>Payment_date: <span><?php echo $row['payment_date']; ?></span></li>
                        <li>payment_description: <span><?php echo $row['payment_description']; ?></span></li>
                        <li>Payment_state: <span><?php echo $row['payment_state']; ?></span></li>
                        <li>order_id: <span><?php echo $row['order_id']; ?></span></li>

                    </ul>
                <?php
                }
                ?>
            </div>
        </div>

        <form method="post">>
            <textarea id="response" name="response" rows="4" cols="50" placeholder="Enter your Reason here"></textarea>
            <br>
            <input class="submit" type="submit" value="Refund">
        </form>
    </div>
    </div>


</html>

<script>

</script>