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
            throw new Exception("Error inserting data into buyer: " . mysqli_error($GLOBALS['db']));
        }
    
        mysqli_stmt_close($stmt);
    }
    
    public function updateSeller(){

    }

    public function deleteSeller(){
        
    }

}