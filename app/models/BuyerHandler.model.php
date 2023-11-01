<?php
class BuyerHandler extends database
{

    //check if the e mail exists in the database
    public function emailCheck($email){
        
        $userName=mysqli_real_escape_string($GLOBALS['db'],$email);
        $userCheck = "SELECT * FROM user WHERE user_email='$email'  LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $userCheck);
        return mysqli_fetch_assoc($result);

    }

    //add new buyer
    public function addNewBuyer($user_id)
    {
        $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO buyer (buyer_id) VALUES (?)");
    
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
    
        mysqli_stmt_bind_param($stmt, "i", $user_id);
    
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Error inserting data into buyer: " . mysqli_error($GLOBALS['db']));
        }
    
        mysqli_stmt_close($stmt);
    }
    

}