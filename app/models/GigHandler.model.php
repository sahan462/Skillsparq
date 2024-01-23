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

    public function addNewGig($title, $description, $category, $coverImage, $currentDateTime, $sellerId)
    {
        $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO gigs 
            (
                title, 
                description, 
                category, 
                cover_image, 
                created_at, 
                seller_id
            ) 
            VALUES 
            (
                ?, ?, ?, ?, ?, ?
            )");

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt, "sssss", $title, $description, $category, $coverImage, $currentDateTime, $sellerId);

        if (mysqli_stmt_execute($stmt)) {
            $gigId = mysqli_insert_id($GLOBALS['db']);
            mysqli_stmt_close($stmt);

            if ($gigId) {
                $packages = $this->addNewPackages($gigId, $this->customName_1, $this->noOfDeliveryDays_1, $this->timePeriod_1, $this->noOfRevisions_1, $this->packageDescription_1, $this->customName_2, $this->noOfDeliveryDays_2, $this->timePeriod_2, $this->noOfRevisions_2, $this->packageDescription_2, $this->customName_3, $this->noOfDeliveryDays_3, $this->timePeriod_3, $this->noOfRevisions_3, $this->packageDescription_3);
            }

            return [$gigId, $packages];

        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }
    }

    public function addNewPackages($customName_1, $noOfDeliveryDays_1, $timePeriod_1, $noOfRevisions_1, $packageDescription_1, $customName_2, $noOfDeliveryDays_2, $timePeriod_2, $noOfRevisions_2, $packageDescription_2, $customName_3, $noOfDeliveryDays_3, $timePeriod_3, $noOfRevisions_3, $packageDescription_3){

        $param1_values = ['Basic', 'Standard', 'Premium'];
        $param2_values = [ 100, 200, 300];
        $param3_values = [$noOfDeliveryDays_1, $noOfDeliveryDays_2, $noOfDeliveryDays_3];
        $param4_values = [$timePeriod_1, $timePeriod_2, $timePeriod_3];
        $param5_values = [$noOfRevisions_1, $noOfRevisions_2, $noOfRevisions_3];
        $param6_values = [$packageDescription_1, $packageDescription_1, $packageDescription_1];
    
        $currentDateTime = date("Y-m-d H:i:s");  
    
        $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO packages 
        (
            package_type,
            package_price,
            no_of_delivery_days, 
            time_period, 
            no_of_revisions, 
            package_description, 
            created_at,
            gig_id
        ) 
        VALUES 
        (
            ?, ?, ?, ?, ?, ?, ?, ?
        )");
    
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
        
        mysqli_stmt_bind_param($stmt, "sdisissi", $packageType, $packagePrice, $noOfDeliveryDays, $timePeriod, $noOfRevisions, $packageDescription, $currentDateTime, $gigId);
    
        $insertedIds = []; 
    
        for ($i = 0; $i < count($param3_values); $i++) {
            
            $packageType = $param1_values[$i];
            $packagePrice = $param2_values[$i];
            $noOfDeliveryDays = $param3_values[$i];
            $timePeriod = $param4_values[$i];
            $noOfRevisions = $param5_values[$i];
            $packageDescription = $param6_values[$i];
    
            if (mysqli_stmt_execute($stmt)) {
                $insertedIds[] = mysqli_insert_id($GLOBALS['db']);
            } else {
                throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
            }
        }
    
        mysqli_stmt_close($stmt);
    
        return $insertedIds; 
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

















