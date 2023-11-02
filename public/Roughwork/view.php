<?php

include "config.php";

$sql = "SELECT *from gig";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https.//maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>SellerGigView</title>
</head>

<body>
    <div class="container">
        <h2>Available Gigs</h2>
        <table class="table">

            <head>
                <tr>
                    <th>GigID</th>
                    <th>title</th>
                    <th>category</th>
                    <th>BasicPrice</th>
                    <th>StandardPrice</th>
                    <th>PremiumPrice</th>
                </tr>
                </thread>
            </head>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                ?>
                        <tr>
                            <td><?php echo $row['GigId']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['category']; ?></td>
                            <td><?php echo $row['BasicPrice']; ?></td>
                            <td><?php echo $row['StandardPrice']; ?></td>
                            <td><?php echo $row['PremiumPrice']; ?></td>
                            <td><a class="btn btn-info" href="update.php?GigId=<?php echo $row['GigId']; ?>">Update</a>&nbsp;<a class="btn btn-danger" href="delete.php?GigId=<?php echo $row['GigId']; ?>">Delete</a></td>
                        </tr>

                <?php }
                }

                ?>
            </tbody>

        </table>
    </div>
</body>

</html>