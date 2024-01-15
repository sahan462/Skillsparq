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
        $query = "INSERT INTO profile (user_name, first_name, last_name, profile_pic, joined_date, user_id) VALUES (?, ? , ?, ?, ?, ?)";
        $stmt = mysqli_prepare($GLOBALS['db'],$query);
    
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

    public function updateProfile($user_Id){

    }

    public function updateBuyerProfile(){

    }

    // public function updateJob($jobId, $title, $description, $file, $category, $amount, $deadline, $publishMode, $flexibleAmount, $currentDateTime)
    // {
    //     $stmt = mysqli_prepare($GLOBALS['db'], "UPDATE Jobs 
    //         SET 
    //         title = ?, 
    //         description = ?, 
    //         file = ?, 
    //         category = ?, 
    //         amount = ?, 
    //         deadline = ?, 
    //         publish_mode = ?, 
    //         flexible_amount = ? 
    //         WHERE job_id = ?");
        
    //     if ($stmt === false) {
    //         throw new Exception("Failed to create prepared statement.");
    //     }
        
    //     mysqli_stmt_bind_param($stmt, "ssssssssi", $title, $description, $file, $category, $amount, $deadline, $publishMode, $flexibleAmount, $jobId);
        
    //     if (mysqli_stmt_execute($stmt)) {
    //         mysqli_stmt_close($stmt);
    //         return true; 
    //     } else {
    //         throw new Exception("Error updating data: " . mysqli_error($GLOBALS['db']));
    //     }
    // }

    public function deleteProfile($userId){

    }

    //get profile
    public function getUserProfile($userId)
    {
        $query = "SELECT * FROM profile WHERE user_id = ? ";
        
        $stmt = mysqli_prepare($GLOBALS['db'], $query);
        
        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, "i", $userId);

        if (mysqli_stmt_execute($stmt)) {
            return $stmt->get_result();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }
    


}