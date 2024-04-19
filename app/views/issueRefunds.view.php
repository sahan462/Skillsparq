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
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">Dashboard</span>
            </div>

            <div>

                <table class="content-table">
                    <thead>
                        <th>order_id
                        <th>
                        <th>amount
                        <th>
                    </thead>
                    <tbody>
                        <tr>

                            <?php foreach ($refund as $row) { ?>
                                <td><?php echo $row['order_id'] ?></td>
                                <td><?php echo $row['amount'] ?></td>

                            <?php } ?>

                        </tr>


                    </tbody>
                </table>
            </div>

</body>

</html>