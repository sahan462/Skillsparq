<?php
class ProfileHandler extends database
{

    public function userNameCheck($userName){

        $userName=mysqli_real_escape_string($GLOBALS['db'],$userName);
        $userCheck = "SELECT * FROM profile WHERE user_name='$userName'  LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $userCheck);
        return mysqli_fetch_assoc($result);

    }

    public function addNewProfile($userName, $user_id)
    {
        // Create a prepared statement
        $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO profile (user_name, user_id) VALUES (?, ?)");
    
        if ($stmt === false) {
            // Handle the error
            throw new Exception("Failed to create prepared statement.");
        }
    
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "si", $userName, $user_id);
    
        // Execute the prepared statement
        if (!mysqli_stmt_execute($stmt)) {
            // Handle the error, e.g., log it or throw an exception
            throw new Exception("Error inserting data into profile: " . mysqli_error($GLOBALS['db']));
        }
    
        // Close the prepared statement
        mysqli_stmt_close($stmt);
    }
    


}