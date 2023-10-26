<?php
class JobHandler extends database
{

public function addNewJob($jobId,$title,$description,$file,$category,$amount,$deadline,$flexible_amount,$currentDateTime,$clientId)
    {
        $query = "INSERT INTO Jobs 
            (
                job_id,
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
                $jobId,
                '$title', 
                '$description', 
                '$file', 
                '$category', 
                $amount, 
                '$deadline', 
                $flexible_amount, 
                '$currentDateTime',
                '$clientId'
            )";
        mysqli_query($GLOBALS['db'], $query);
    }

}