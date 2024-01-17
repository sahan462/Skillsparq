<?php

class GigHandler extends database
{
    public function getGig($gigId)
    {
        $query = "SELECT * FROM gigs WHERE gig_id = ? ";
        
        $stmt = mysqli_prepare($GLOBALS['db'], $query);
        
        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, "i", $gigId);

        if (mysqli_stmt_execute($stmt)) {
            return $stmt->get_result();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }
    public function getRecentGigs()
    {
        $query = "SELECT * FROM Gigs order by created_at DESC";
        
        $stmt = mysqli_prepare($GLOBALS['db'], $query);
        
        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        if (mysqli_stmt_execute($stmt)) {
            return $stmt->get_result();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

    }

    public function addNewGig($title, $description, $category, $coverImage,$customName_1, $noOfDeliveryDays_1, $timePeriod_1, $noOfRevisions_1, $packageDescription_1, $customName_2, $noOfDeliveryDays_2, $timePeriod_2, $noOfRevisions_2, $packageDescription_2, $customName_3, $noOfDeliveryDays_3, $timePeriod_3, $noOfRevisions_3, $packageDescription_3, $currentDateTime, $sellerId)
    {
        $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO gigs 
        (
            title, 
            description, 
            category, 
            cover_image, 
            custom_name_1,
            no_of_delivery_days_1, 
            time_period_1, 
            no_of_revisions_1, 
            package_description_1, 
            custom_name_2,
            no_of_delivery_days_2, 
            time_period_2, 
            no_of_revisions_2, 
            package_description_2, 
            custom_name_3,
            no_of_delivery_days_3, 
            time_period_3, 
            no_of_revisions_3, 
            package_description_3, 
            created_at, 
            seller_id
        ) 
        VALUES 
        (
            ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,?, ?, ?
        )");

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt, "sssssissssissssissssi", $title, $description, $category, $coverImage,$customName_1, $noOfDeliveryDays_1, $timePeriod_1, $noOfRevisions_1, $packageDescription_1, $customName_2, $noOfDeliveryDays_2, $timePeriod_2, $noOfRevisions_2, $packageDescription_2, $customName_3, $noOfDeliveryDays_3, $timePeriod_3, $noOfRevisions_3, $packageDescription_3, $currentDateTime, $sellerId);

        if (mysqli_stmt_execute($stmt)) {
            $gigId = mysqli_insert_id($GLOBALS['db']);
            mysqli_stmt_close($stmt);
            return $gigId;
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }
    }

    public function updateGig($gigId,$title, $description, $category, $coverImage,$customName_1, $noOfDeliveryDays_1, $timePeriod_1, $noOfRevisions_1, $packageDescription_1, $customName_2, $noOfDeliveryDays_2, $timePeriod_2, $noOfRevisions_2, $packageDescription_2, $customName_3, $noOfDeliveryDays_3, $timePeriod_3, $noOfRevisions_3, $packageDescription_3){
        $stmt = mysqli_prepare($GLOBALS['db'], "UPDATE Gigs 
            SET 
            title = ?, 
            description = ?, 
            category = ?, 
            coverImage = ?, 
            customName_1 = ?, 
            noOfDeliveryDays_1 = ?, 
            timePeriod_1 = ?, 
            noOfRevisions_1 = ?, 
            packageDescription_1 = ?,
            customName_2 = ?, 
            noOfDeliveryDays_2 = ?, 
            timePeriod_2 = ?, 
            noOfRevisions_2 = ?, 
            packageDescription_2 = ?,
            customName_3 = ?, 
            noOfDeliveryDays_3 = ?, 
            timePeriod_3 = ?, 
            noOfRevisions_3 = ?, 
            packageDescription_3 = ?,

            WHERE gigId = ?");
        
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
        mysqli_stmt_bind_param($stmt, "sssssissssissssisss",$title, $description, $category, $coverImage,$customName_1, $noOfDeliveryDays_1, $timePeriod_1, $noOfRevisions_1, $packageDescription_1, $customName_2, $noOfDeliveryDays_2, $timePeriod_2, $noOfRevisions_2, $packageDescription_2, $customName_3, $noOfDeliveryDays_3, $timePeriod_3, $noOfRevisions_3, $packageDescription_3,$gigId);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true; 
        } else {
            throw new Exception("Error occurs when updating the data: " . mysqli_error($GLOBALS['db']));
        }
    }

    public function deleteGig($gigId)
    {
        $stmt = mysqli_prepare($GLOBALS['db'], "DELETE FROM Gigs 
            WHERE gig_id = ?");
        
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
        
        mysqli_stmt_bind_param($stmt, "i", $gigId);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true; 
        } else {
            throw new Exception("Error when deleting data: " . mysqli_error($GLOBALS['db']));
        }
    }
}

















