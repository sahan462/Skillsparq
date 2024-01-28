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
    
    // Update the Profile Picture
    public function setProfile_Pic($userId,$profilepic){
        $query = "UPDATE profile SET profile_pic = ? WHERE user_id = ?";

        $parameterString = "si";

        $returnedResult = $this->updateQueryPrepStmtExecTwoParams($query,$parameterString,$profilepic,$userId);

        return $returnedResult;
        
    }

    // update User Name, First Name and Last Name
    public function setNames($userId,$uname,$fname,$lname){
        $query = "UPDATE profile SET user_name = ?,first_name = ?,last_name = ? WHERE user_id = ?";
        
        $stmt = mysqli_prepare($GLOBALS['db'],$query);

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
       
        mysqli_stmt_bind_param($stmt,"sssi",$uname,$fname,$lname,$userId);
       
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true; 
        } else {
            throw new Exception("Error updating data: " . mysqli_error($GLOBALS['db']));
        }
        
    }

    // consider about updating the country field in the table.

    // Update the About
    public function setAbout($userId,$profileAbout){
        $query = "UPDATE profile SET about = ? WHERE user_id = ?";

        $parameterString = "si";

        $returnedResult = $this->updateQueryPrepStmtExecTwoParams($query,$parameterString,$profileAbout,$userId);

        return $returnedResult;
        
    }

    // Update the Languages
    public function setLanguages($userId,$profileLanuages){
        $query = "UPDATE profile SET languages = ? WHERE user_id = ?";

        $parameterString = "si";

        $returnedResult = $this->updateQueryPrepStmtExecTwoParams($query,$parameterString,$profileLanuages,$userId);

        return $returnedResult;
        
    }

    // Update the Education
    public function setEducations($userId,$profileEducations)
    {
        // doesn't have a column in the table.
        $query = "UPDATE profile SET education = ? WHERE user_id = ?";

        $parameterString = "si";

        $returnedResult = $this->updateQueryPrepStmtExecTwoParams($query,$parameterString,$profileEducations,$userId);

        return $returnedResult;
        
    }

    // Update the Skills
    public function setSkills($userId,$profileSkills){
        $query = "UPDATE profile SET skills = ? WHERE user_id = ?";

        $parameterString = "si";

        $returnedResult = $this->updateQueryPrepStmtExecTwoParams($query,$parameterString,$profileSkills,$userId);

        return $returnedResult;
        
    }

    // common repeatable code for update with two parameters
    public function updateQueryPrepStmtExecTwoParams($query,$parameterString,$param1,$userId)
    {
        $stmt = mysqli_prepare($GLOBALS['db'],$query);

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
                
        mysqli_stmt_bind_param($stmt, $parameterString,$param1, $userId);
                
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            
            return true; 
        } else {
            throw new Exception("Error updating data: " . mysqli_error($GLOBALS['db']));
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

    public function deleteProfile($userId){

    }

}