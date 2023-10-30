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

    //add new buyer
    public function addNewSeller($user_id, $phoneNumber)
    {
        // Create a prepared statement
        $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO seller (seller_id, phone_number) VALUES (?, ?)");
    
        if ($stmt === false) {
            // Handle the error
            throw new Exception("Failed to create prepared statement.");
        }
    
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "is", $user_id, $phoneNumber);
    
        // Execute the prepared statement
        if (!mysqli_stmt_execute($stmt)) {
            // Handle the error, e.g., log it or throw an exception
            throw new Exception("Error inserting data into buyer: " . mysqli_error($GLOBALS['db']));
        }
    
        // Close the prepared statement
        mysqli_stmt_close($stmt);
    }
    


}