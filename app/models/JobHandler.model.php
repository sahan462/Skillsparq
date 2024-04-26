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
        $query = "SELECT * FROM Jobs ORDER BY created_at desc";
        
        $stmt = mysqli_prepare($GLOBALS['db'], $query);
        
        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        if (mysqli_stmt_execute($stmt)) {
            return $stmt->get_result();
            // $result = $stmt->get_result();
            // // Fetch associative array
            // $data = [];
            // while ($row = $result->fetch_assoc()) {
            //     $data[] = $row;
            // }
            // return $data;

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

    // get Job count for a single buyer
    public function getJobCount($userId)
    {
        $query = "SELECT COUNT(*) FROM jobs WHERE buyer_id = ?;";
        
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
            $fetchVal = $stmt->get_result();
            $result = mysqli_fetch_assoc($fetchVal);
            return $result;
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }

    public function getBuyerDetailsProposalDetailsOfJob($sellerId)
    {
        $retrieveQuery = "SELECT * FROM job_proposals jps INNER JOIN profile p ON jps.buyer_id = p.user_id INNER JOIN jobs jbs ON jbs.job_id = jps.job_id WHERE jps.seller_id = ?";

        $stmt = mysqli_prepare($GLOBALS['db'], $retrieveQuery);
        
        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, "i", $sellerId);

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

    public function getSellerDetailsOfJobProposals($jobId)
    {
        $query = "SELECT * FROM job_proposals j JOIN profile p ON j.seller_id = p.user_id WHERE j.job_id = ? ORDER BY bid_amount ASC";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);
        
        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, "i", $jobId);

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

    public function getCountAcceptedProps($jobId)
    {
        $retrieveQuery = "SELECT COUNT(*) AS count FROM job_proposals  WHERE job_id=? AND Status = 'Accepted';";

        $stmt = mysqli_prepare($GLOBALS['db'], $retrieveQuery);
        
        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, "i",$jobId);

        if (mysqli_stmt_execute($stmt)) {
            return $stmt->get_result()->fetch_assoc();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }

    public function getPropCountByAcceptedStatus($sellerId)
    {
        $query = "SELECT COUNT(*) AS count FROM job_proposals  WHERE seller_id=? AND Status = 'Accepted';";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);
        
        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, "i", $sellerId);

        if (mysqli_stmt_execute($stmt)) {
            return $stmt->get_result()->fetch_assoc();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }

    public function getPropCountByPendingStatus($sellerId)
    {
        $query = "SELECT COUNT(*) AS count FROM job_proposals  WHERE seller_id=? AND Status = 'pending';";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);
        
        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, "i", $sellerId);

        if (mysqli_stmt_execute($stmt)) {
            return $stmt->get_result()->fetch_assoc();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }

    public function getPropCountByRejectedStatus($sellerId)
    {
        $query = "SELECT COUNT(*) AS count FROM job_proposals  WHERE seller_id=? AND Status = 'Rejected';" ;

        $stmt = mysqli_prepare($GLOBALS['db'], $query);
        
        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, "i", $sellerId);

        if (mysqli_stmt_execute($stmt)) {
            return $stmt->get_result()->fetch_assoc();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }

    public function changeProposalStatus($Status,$proposalId)
    {
        $updateQuery = "UPDATE job_proposals SET Status = ? WHERE proposal_id = ?";

        $stmt = mysqli_prepare($GLOBALS['db'], $updateQuery);
                
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt, "si",$Status,$proposalId);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true; 
        } else {
            throw new Exception("Error updating data: " . mysqli_error($GLOBALS['db']));
        }
    }

    // After Successfully place the order all other proposals related to that job will be rejected.
    public function setRejectPropStatus($jobId)
    {
        $updateQuery = "UPDATE job_proposals SET Status = 'Rejected' WHERE job_id = ?";

        $stmt = mysqli_prepare($GLOBALS['db'], $updateQuery);
                
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt, "i",$jobId);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true; 
        } else {
            throw new Exception("Error updating data: " . mysqli_error($GLOBALS['db']));
        }
    }

    public function createJobOrdersTableRecord($orderId,$jobId,$jobProposalId)
    {
        $insertQuery = "INSERT INTO job_orders 
        (
            job_order_id,
            job_id, 
            job_proposal_id
        ) 
        VALUES 
        (
            ?, ?, ?
        )";

        $stmt = mysqli_prepare($GLOBALS['db'],$insertQuery);

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
        mysqli_stmt_bind_param($stmt, "iii",$orderId,$jobId,$jobProposalId);
        if (mysqli_stmt_execute($stmt)) {
            $orderId = mysqli_insert_id($GLOBALS['db']);
            $stmt->close();
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }
        return $orderId;
    }

    // public function getJobName($jobId)
    // {
    //     $query = "SELECT title FROM Jobs WHERE job_id = ? ";
        
    //     $stmt = mysqli_prepare($GLOBALS['db'], $query);
        
    //     if (!$stmt) {
    //         die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
    //     }

    //     mysqli_stmt_bind_param($stmt, "i", $jobId);

    //     if (mysqli_stmt_execute($stmt)) {
    //         return $stmt->get_result();
    //     } else {
    //         die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
    //     }
    // }

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

    public function createProposal($description,$bidAmount,$attachment,$jobId,$buyerId, $sellerId)
    {
        $query = "INSERT INTO job_proposals (description,bid_amount,attachments,job_id,buyer_id,seller_id) 
        VALUES (?, ?, ?, ?, ?, ?);";

        $stmt = mysqli_prepare($GLOBALS['db'],$query);

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
        
        mysqli_stmt_bind_param($stmt, "sisiii",$description,$bidAmount,$attachment, $jobId,$buyerId,$sellerId);
        
        if (mysqli_stmt_execute($stmt)) {
            $proposalId = mysqli_insert_id($GLOBALS['db']);
            mysqli_stmt_close($stmt);
            return $proposalId;
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }
    }

    public function getProposalCountForAJob($jobId,$buyerId)
    {
        $query = "SELECT COUNT(*) AS count FROM job_proposals  WHERE job_id=? AND buyer_id=?;";
        
        $stmt = mysqli_prepare($GLOBALS['db'], $query);
        
        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, "ii", $jobId,$buyerId);

        if (mysqli_stmt_execute($stmt)) {
            return $stmt->get_result();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }

    public function getJobProposals($jobId,$buyerId)
    {
        $query = "SELECT * FROM job_proposals WHERE job_id=? AND buyer_id=?";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);
        
        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    
        mysqli_stmt_bind_param($stmt, "ii", $jobId,$buyerId);
    
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

    public function getSendJobProposals($sellerId)
    {
        $query = "SELECT * FROM job_proposals WHERE seller_id=?;";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);
        
        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    
        mysqli_stmt_bind_param($stmt, "i", $sellerId);
    
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

    public function getSingleJobProposal($proposalId)
    {
        $query = "SELECT * FROM job_proposals WHERE proposal_id = ?";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);
        
        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    
        mysqli_stmt_bind_param($stmt, "i", $proposalId);
    
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

    public function deleteSingleRejectedProp($proposalId)
    {
        $deleteQuery = "DELETE FROM job_proposals WHERE proposal_id = ?";
        $stmt = mysqli_prepare($GLOBALS['db'],$deleteQuery);
        
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
        
        mysqli_stmt_bind_param($stmt, "i", $proposalId);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true; 
        } else {
            throw new Exception("Error deleting data: " . mysqli_error($GLOBALS['db']));
        }
    }

    public function deleteAllRejectedProps($sellerId,$status)
    {
        $deleteQuery = "DELETE FROM job_proposals WHERE seller_id = ? AND Status = ?";
        $stmt = mysqli_prepare($GLOBALS['db'],$deleteQuery);
        
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
        
        mysqli_stmt_bind_param($stmt, "is", $sellerId,$status);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true; 
        } else {
            throw new Exception("Error deleting data: " . mysqli_error($GLOBALS['db']));
        }
    }
}