<?php
class UserHandler extends database
{

    public function addNewUser($user_email,$user_password,$role, $agreement)
    {
        // Create a prepared statement
        $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO User (user_email, user_password,  role, agreement) VALUES (?, ?, ?, ?)");
    
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
    
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "sssi", $user_email, $user_password, $role, $agreement);
    
        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $user_id = mysqli_insert_id($GLOBALS['db']);
            mysqli_stmt_close($stmt);
            return $user_id;
        } else {
            // Handle the error, e.g., log it or throw an exception
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }
    }
    



}