<?php
class JobHandler extends database
{

public function addNewJob($jobId,$title,$description,$file,$category,$amount,$deadline,$flexible_amount,$currentDateTime,$clientId)
    {
        $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO Jobs 
        (
            title, 
            description, 
            file, 
            category, 
            amount, 
            deadline, 
            flexible_amount, 
            created_at, 
            client_id
        ) 
        VALUES 
        (
            ?, ?, ?, ?, ?, ?, ?, ?, ?
        )");
    
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
        
        mysqli_stmt_bind_param($stmt, "ssssdsssi", $title, $description, $file, $category, $amount, $deadline, $flexible_amount, $currentDateTime, $clientId);
        
        if (mysqli_stmt_execute($stmt)) {
            $jobId = mysqli_insert_id($GLOBALS['db']);
            mysqli_stmt_close($stmt);
            return $jobId;
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }
    }
}