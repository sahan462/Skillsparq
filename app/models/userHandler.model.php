<?php
class UserHandler extends database
{

    public function addNewUser($user_email,$user_password,$role, $agreement)
    {
        $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO User (user_email, user_password,  role, agreement) VALUES (?, ?, ?, ?)");
    
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
    
        mysqli_stmt_bind_param($stmt, "sssi", $user_email, $user_password, $role, $agreement);
    
        if (mysqli_stmt_execute($stmt)) {
            $user_id = mysqli_insert_id($GLOBALS['db']);
            mysqli_stmt_close($stmt);
            return $user_id;
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }
    }

    public function addNewSeller($user_password,$role, $agreement)
    {
        $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO User (user_password,  role, agreement) VALUES (?, ?, ?)");
    
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
    
        mysqli_stmt_bind_param($stmt, "ssi", $user_password, $role, $agreement);
    
        if (mysqli_stmt_execute($stmt)) {
            $user_id = mysqli_insert_id($GLOBALS['db']);
            mysqli_stmt_close($stmt);
            return $user_id;
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }
    }

    // public function getEmailAndPassWord($userId){
    //     $query = "SELECT user_email,user_password FROM User WHERE user_id = ?;";
        
    //     $stmt = mysqli_prepare($GLOBALS['db'],$query);
    
    //     if (!$stmt) {
    //         die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
    //     }
    //     mysqli_stmt_bind_param($stmt, "i",$userId);
    
    //     if (mysqli_stmt_execute($stmt)) {
    //         return $stmt->get_result();
    //     } else {
    //         die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
    //     }
    
    //     mysqli_stmt_close($stmt);
    // }

    public function getUserData($userId)
    {
        $query = "SELECT * FROM User WHERE user_id = ?";
        
        $stmt = mysqli_prepare($GLOBALS['db'],$query);
    
        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
        mysqli_stmt_bind_param($stmt, "i",$userId);
    
        if (mysqli_stmt_execute($stmt)) {
            return $stmt->get_result();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    
        mysqli_stmt_close($stmt);
    }


     // Update the Password
     public function setPassword($userId,$userPassWord)
     {
        $query = "UPDATE user SET user_password = ? WHERE user_id = ?";

        $parameterString = "si";

        $returnedResult = $this->updateQueryPrepStmtExecTwoParams($query,$parameterString,$userPassWord,$userId);

        return $returnedResult;
        
    }

    // Update the Email
    public function setEmail($userId,$userEmail)
    {
        $query = "UPDATE user SET user_email = ? WHERE user_id = ?";

        $parameterString = "si";

        $returnedResult = $this->updateQueryPrepStmtExecTwoParams($query,$parameterString,$userEmail,$userId);

        return $returnedResult;
        
    }

    // common repeatable code for update with two parameters
    public function updateQueryPrepStmtExecTwoParams($query,$parameterString,$param1,$userId)
    {
        $stmt = mysqli_prepare($GLOBALS['db'],$query);

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
                
        mysqli_stmt_bind_param($stmt, $parameterString,$param1,$userId);
                
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            
            return true; 
        } else {
            throw new Exception("Error updating data: " . mysqli_error($GLOBALS['db']));
        }
    }
    
    
    public function addNewAdmin(){
        
    }

}