<?php
class InquiryHandler extends database
{

    //create new inquiry
    public function createInquiry($requestSubject, $requestDescription, $file, $currentDateTime, $clientId, $inquiryType)
    {

        $stmt1 = mysqli_prepare($GLOBALS['db'], "INSERT INTO inquiries 
        (
            subject, 
            description, 
            attachements, 
            created_at, 
            inquiry_originator_id,
            inquiry_type 
        ) 
        VALUES 
        (
            ?, ?, ?, ?, ?, ?
        )");
    
        if ($stmt1 === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        $stmt2 = mysqli_prepare($GLOBALS['db'], "INSERT INTO helprequests 
        (
            request_id
        ) 
        VALUES 
        (
            ?
        )");
    
        if ($stmt2 === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt1, "ssssis", $requestSubject, $requestDescription, $file, $currentDateTime, $clientId, $inquiryType);
    
        if (mysqli_stmt_execute($stmt1)) {
            $inquiryId = mysqli_insert_id($GLOBALS['db']);
            $stmt1->close();

            mysqli_stmt_bind_param($stmt2, "i", $inquiryId);
            if(mysqli_stmt_execute($stmt2)) {
                return $inquiryId;
            }else{
                throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
            }
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }

    }
}    

?>