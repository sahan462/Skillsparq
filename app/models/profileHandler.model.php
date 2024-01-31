<?php
class ProfileHandler extends database
{

    public function userNameCheck($userName){

        $userName=mysqli_real_escape_string($GLOBALS['db'],$userName);
        $userCheck = "SELECT * FROM profile WHERE user_name='$userName'  LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $userCheck);
        return mysqli_fetch_assoc($result);

    }

    //create new profile
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

    //read profile
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

    //update last seen
    public function lastSeenUpdate($lastSeen, $userId)
    {
        $query = "UPDATE profile SET last_seen = ? WHERE user_id = ?";
        
        $stmt = mysqli_prepare($GLOBALS['db'], $query);
        
        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, "si", $lastSeen, $userId);

        if (mysqli_stmt_execute($stmt)) {
            $stmt->close();
            return true;
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }


    //get profile
    public function getProfileData($userId)
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
    

    // update fields of profile
    public function updateProfileTable($profilePic, $firstName, $lastName, $country, $about, $languages, $skills, $userId, $userName){
        $query = "UPDATE Profile 
                 SET 
                 profile_pic = ?, 
                 first_name = ?, 
                 last_name = ?, 
                 country = ?, 
                 about = ?
                 WHERE user_id = ? 
                 and user_name = ?";

        $stmt = mysqli_prepare($GLOBALS['db'],$query);

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
    
        mysqli_stmt_bind_param($stmt, "sssssis", $profilePic, $firstName, $lastName, $country, $about, $userId, $userName);
    
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true; 
        } else {
            throw new Exception("Error updating data: " . mysqli_error($GLOBALS['db']));
        }
    }

    // public function updateQueryPrepStmtExec($query,$string,$fields,$userId)
    // {
    //     $stmt = mysqli_prepare($GLOBALS['db'],$query);

    //     if ($stmt === false) {
    //         throw new Exception("Failed to create prepared statement.");
    //     }
                
    //     mysqli_stmt_bind_param($stmt, $parameterString,$param1, $userId);
                
    //     if (mysqli_stmt_execute($stmt)) {
    //         mysqli_stmt_close($stmt);
            
    //         return true; 
    //     } else {
    //         throw new Exception("Error updating data: " . mysqli_error($GLOBALS['db']));
    //     }
    // } 



    public function deleteProfile($userId){

    }

}