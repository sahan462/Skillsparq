<?php
class SellerHandler extends database
{

    //check if the e mail exists in the database
    public function phoneNumberCheck($phoneNumber){
        
        $userName=mysqli_real_escape_string($GLOBALS['db'],$phoneNumber);
        $userCheck = "SELECT * FROM seller WHERE phone_number='$phoneNumber'  LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $userCheck);
        return mysqli_fetch_assoc($result);

    }

    //add new seller
    public function addNewSeller($user_id, $phoneNumber)
    {
        $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO seller (seller_id, phone_number) VALUES (?, ?)");
    
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
    
        mysqli_stmt_bind_param($stmt, "is", $user_id, $phoneNumber);
    
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Error inserting data into seller: " . mysqli_error($GLOBALS['db']));
        }
    
        mysqli_stmt_close($stmt);
    }
    
    public function getPhoneNumber($sellerId){
        $query = "SELECT phone_number FROM seller WHERE seller_id = ?;";
        $stmt = mysqli_prepare($GLOBALS['db'],$query);
    
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
    
        mysqli_stmt_bind_param($stmt, "i", $sellerId);
    
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Error getting the required data : " . mysqli_error($GLOBALS['db']));
        }
    
        mysqli_stmt_close($stmt);
    }

    public function sellerId($phoneNumber){
        $query = "SELECT seller_id FROM seller WHERE phone_number = '$phoneNumber'  LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $query);
        return mysqli_fetch_assoc($result);
    }

    // adding the languages of the profile into seller_profile table
    public function addLanguages($sellerId,$userName,$languages)
    {
        $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO seller_profile (user_id, user_name,languages) VALUES (?, ?,?)");
    
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
    
        mysqli_stmt_bind_param($stmt, "iss", $sellerId,$userName,$languages);
    
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Error inserting data into seller: " . mysqli_error($GLOBALS['db']));
        }
    
        mysqli_stmt_close($stmt);
    }

    // adding the skills of the profile into seller_profile table
    public function addSkills($sellerId,$userName,$skills)
    {
        $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO seller_profile (user_id, user_name,education) VALUES (?, ?, ?)");
    
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
    
        mysqli_stmt_bind_param($stmt, "iss", $sellerId,$userName,$skills);
    
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Error inserting data into seller: " . mysqli_error($GLOBALS['db']));
        }
    
        mysqli_stmt_close($stmt);
    }

    // adding the education of the profile into seller_profile table
    public function addEducation($sellerId,$userName,$education)
    {
        $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO seller_profile (user_id, user_name,education) VALUES (?, ?, ?)");
    
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
    
        mysqli_stmt_bind_param($stmt, "iss", $sellerId,$userName,$education);
    
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Error inserting data into seller: " . mysqli_error($GLOBALS['db']));
        }
    
        mysqli_stmt_close($stmt);
    }

    // 
    public function updateSeller($sellerId){
        // $query = "UPDATE seller SET ";
    }

    // delete the seller profile if it doesn't contain any ongoing projects with a buyer.
    public function deleteSeller($sellerId){
        $stmt = mysqli_prepare($GLOBALS['db'], "DELETE FROM seller
            WHERE seller_id = ?");
        
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
        
        mysqli_stmt_bind_param($stmt, "i", $sellerId);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true; 
        } else {
            throw new Exception("Error deleting data: " . mysqli_error($GLOBALS['db']));
        }
    }

}