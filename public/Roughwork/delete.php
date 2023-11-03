<?php
include "config.php";

if (isset($_GET['GigId'])) {
    $gigid = $_GET['GigId'];
}

$sql = "DELETE FROM `gig` WHERE `GigId`='$gigid'";

$result = $conn->query($sql);

if ($result == TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error:" . $sql . "<br>" . $conn->error;
}
