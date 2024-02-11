<?php
class JobHandler extends database
{

    //add new job
    public function addNewJob($title,$description,$file,$category,$amount,$deadline, $publishMode, $flexible_amount, $currentDateTime,$clientId)
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

    //add auction details
    public function createAuction($starting_time, $end_time, $starting_bid, $min_bid_amount, $jobId, $userId)
    {
        $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO Auctions 
        (
            start_time,
            end_time,
            starting_bid,
            min_bid_amount,
            current_highest_bid,
            job_id,
            buyer_id
        ) 
        VALUES 
        (
            ?, ?, ?, ?, ?, ?, ?
        )");
    
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
        
        mysqli_stmt_bind_param($stmt, "sssssii", $starting_time, $end_time, $starting_bid, $min_bid_amount, $min_bid_amount, $jobId, $userId);
        
        if (mysqli_stmt_execute($stmt)) {
            $jobId = mysqli_insert_id($GLOBALS['db']);
            mysqli_stmt_close($stmt);
            return $jobId;
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }
    }

    public function getJobsForSellerDashBoard(){
        $query = "SELECT * FROM Jobs";
        
        $stmt = mysqli_prepare($GLOBALS['db'], $query);
        
        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        if (mysqli_stmt_execute($stmt)) {
            $result = $stmt->get_result();
            // Fetch associative array
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;

        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }

    //get available jobs
    public function getAllJobs($userId)
    {
        $query = "SELECT * FROM Jobs WHERE buyer_id = ? ";
        
        $stmt = mysqli_prepare($GLOBALS['db'], $query);
        
        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, "i", $userId);

        if (mysqli_stmt_execute($stmt)) {
            return $stmt->get_result();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }

    //get single job
    public function getJob($jobId)
    {
        $query = "SELECT * FROM Jobs WHERE job_id = ? ";
        
        $stmt = mysqli_prepare($GLOBALS['db'], $query);
        
        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, "i", $jobId);

        if (mysqli_stmt_execute($stmt)) {
            return $stmt->get_result();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }

    //get auction details
    public function getAuction($jobId,$userId){

        $query = "SELECT * FROM auctions WHERE job_id = ? AND buyer_id = ?;";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);
        
        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    
        mysqli_stmt_bind_param($stmt, "ii", $jobId, $userId);
    
        if (mysqli_stmt_execute($stmt)) {
            $result = $stmt->get_result();
            if ($result) {
                return $result;
            } else {
                die('Error getting result: ' . mysqli_error($GLOBALS['db']));
            }
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }

    //update job
    public function updateJob($jobId, $title, $description, $file, $category, $amount, $deadline, $publishMode, $flexibleAmount, $currentDateTime)
    {
        $updateQuery = "UPDATE Jobs 
            SET title = ?, description = ?, file = ?, category = ?, amount = ?, 
            deadline = ?, publish_mode = ?, flexible_amount = ? 
            WHERE job_id = ?";

        $stmt = mysqli_prepare($GLOBALS['db'], $updateQuery);
        
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
        
        mysqli_stmt_bind_param($stmt, "ssssssssi", $title, $description, $file, $category, $amount, $deadline, $publishMode, $flexibleAmount, $jobId);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true; 
        } else {
            throw new Exception("Error updating data: " . mysqli_error($GLOBALS['db']));
        }
    }

    //upate auction
    public function updateAuction($jobId, $buyerId, $starting_time, $end_time, $startingBid, $minBidAmount, $currentHighestBid)
    {
        $stmt = mysqli_prepare($GLOBALS['db'], "UPDATE Auctions 
            SET 
            start_time = ?,
            end_time = ?,
            starting_bid = ?, 
            min_bid_amount = ?, 
            current_highest_bid = ? 
            WHERE job_id = ?
            and buyer_id = ?");
        
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
        
        mysqli_stmt_bind_param($stmt, "ddsssii", $starting_time, $end_time, $startingBid, $minBidAmount, $currentHighestBid, $jobId, $buyerId);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true; 
        } else {
            throw new Exception("Error updating data: " . mysqli_error($GLOBALS['db']));
        }
    }

    //delete job
    public function deleteJob($jobId)
    {
        $stmt = mysqli_prepare($GLOBALS['db'], "DELETE FROM jobs 
            WHERE job_id = ?");
        
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
        
        mysqli_stmt_bind_param($stmt, "i", $jobId);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true; 
        } else {
            throw new Exception("Error deleting data: " . mysqli_error($GLOBALS['db']));
        }
    }


    //delete auction
    public function deleteAuction($jobId, $buyerId)
    {
        $stmt = mysqli_prepare($GLOBALS['db'], "DELETE FROM Auctions 
            WHERE job_id = ? AND buyer_id = ?");
        
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
        
        mysqli_stmt_bind_param($stmt, "ii", $jobId, $buyerId);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true; 
        } else {
            throw new Exception("Error deleting data: " . mysqli_error($GLOBALS['db']));
        }
    }


}