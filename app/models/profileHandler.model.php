<?php
class ProfileHandler extends database
{

    public function userNameCheck($userName){

        $userName=mysqli_real_escape_string($GLOBALS['db'],$userName);
        $userCheck = "SELECT * FROM profile WHERE user_name='$userName'  LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $userCheck);
        return mysqli_fetch_assoc($result);

    }
    public function addNewProfile($userName, $firstName, $lastName, $user_id)
    {
        $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO profile (user_name, profile_pic, first_name, last_name,joined_date,user_id) VALUES (?, ? , ?, ?, ?, ?)");
    
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
        $joinedDate = date('Y-m-d');
        $profilePic = 'dummyprofile.jpg';
        mysqli_stmt_bind_param($stmt, "sssssi", $userName, $firstName, $lastName, $profilePic, $joinedDate, $user_id);
    
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Error inserting data into profile: " . mysqli_error($GLOBALS['db']));
        }
    
        mysqli_stmt_close($stmt);
    }
    


}