<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assests/css/adminDashboard.styles.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Document</title>
</head>

<body>
    <?php include "components/adminDashboard.component.php"; ?>
    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <!-- <i class="uil uil-tachometer-fast-alt"></i> -->
                <span class="text">Dashboard</span>
            </div>

            <div>

                <p class="heading">Refunds</p>

                <table class="content-table">
                    <thead>
                        <th>Refund ID
                        <th>
                        <th>responseCSA
                        <th>
                        <th>refund State
                        <th>
                        <th>view
                    </thead>
                    <tbody>


                        <?php foreach ($refund as $row) { ?>
                            <tr>
                                <td><?php echo $row['payment_id'] ?></td>
                                <td></td>
                                <td><?php echo $row['responseCSA'] ?></td>
                                <td></td>
                                <td><?php echo $row['refund_state'] ?></td>
                                <td></td>
                                <td><a href='viewRefunds?payment_id=<?php echo $row["payment_id"]; ?>'>
                                        <button>View</button>
                            </tr>
                            </a></td>
                            <<?php } ?> </tbody>
                </table>
            </div>

</body>

</html>