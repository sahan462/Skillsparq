<?php

$name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $shipping_address = $_POST["shipping_address"];
    $phone= $_POST["phone"];
    $payment_info = $_POST["payment_info"];
   


if ( ! $terms) {
    die("Terms must be accepted");
}   

$host = "localhost";
$dbname = "skillsparq";
$username = "root";
$password = "";
        
$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);
        
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}           
        
$sql = "INSERT INTO message (name, body, priority, type)
        VALUES (?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssii",
                       $name,
                       $message,
                       $priority,
                       $type);

mysqli_stmt_execute($stmt);

echo "Record saved.";