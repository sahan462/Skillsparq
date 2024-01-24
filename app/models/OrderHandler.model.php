<?php
class OrderHandler extends database
{

    //add new job
    public function createOrder($title,$description,$file,$category,$amount,$deadline, $publishMode, $flexible_amount, $currentDateTime,$clientId)
    {
        $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO Jobs 
        (
            title, 
            description, 
            file, 
            category, 
            deadline,
            publish_mode, 
            amount, 
            flexible_amount, 
            created_at, 
            buyer_id
        ) 
        VALUES 
        (
            ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
        )");
    
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
        
        mysqli_stmt_bind_param($stmt, "sssssssssi", $title, $description, $file, $category, $deadline, $publishMode, $amount, $flexible_amount, $currentDateTime, $clientId);
        
        if (mysqli_stmt_execute($stmt)) {
            $jobId = mysqli_insert_id($GLOBALS['db']);
            mysqli_stmt_close($stmt);
            return $jobId;
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }
    }
}