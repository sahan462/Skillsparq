<?php

class GigHandler extends database
{
    public function addNewGig($title, $category, $BasicPkgName, $BasicOffDets, $BasicDelDays, $BasicRevNum, $BasicPrice, $StandardPkgName, $StandardOffDets, $StandardDelDays, $StandardRevNum, $StandardPrice, $PremiumPkgName, $PremiumOffDets, $PremiumDelDays, $PremiumRevNum, $PremiumPrice, $currentDateTime, $sellerId)
    {
        $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO gigs 
        (
            title, 
            category, 
            BasicPkgName, 
            BasicOffDets, 
            BasicDelDays,
            BasicRevNum, 
            BasicPrice, 
            StandardPkgName, 
            StandardOffDets, 
            StandardDelDays,
            StandardRevNum,
            StandardPrice,
            PremiumPkgName,
            PremiumOffDets,
            PremiumDelDays,
            PremiumRevNum,
            PremiumPrice,
            currentDateTime,
            sellerId
        ) 
        VALUES 
        (
            ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,?
        )");

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt, "sssssssssi", $title, $category, $BasicPkgName, $BasicOffDets, $BasicDelDays, $BasicRevNum, $BasicPrice, $StandardPkgName, $StandardOffDets, $StandardDelDays, $StandardRevNum, $StandardPrice, $PremiumPkgName, $PremiumOffDets, $PremiumDelDays, $PremiumRevNum, $PremiumPrice, $currentDateTime, $sellerId);

        if (mysqli_stmt_execute($stmt)) {
            $gigId = mysqli_insert_id($GLOBALS['db']);
            mysqli_stmt_close($stmt);
            return $gigId;
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }
    }
}
