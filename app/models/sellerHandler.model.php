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
        $insertQuery = "INSERT INTO seller (seller_id, phone_number) VALUES (?, ?)";
        $stmt = mysqli_prepare($GLOBALS['db'],$insertQuery);
    
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
    
        mysqli_stmt_bind_param($stmt, "is", $user_id, $phoneNumber);
    
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Error inserting data into seller: " . mysqli_error($GLOBALS['db']));
        }
    
        mysqli_stmt_close($stmt);
    }

    // adding the user_name and user_Id of the profile into seller_profile table
    public function addUserNameAndId($sellerId,$userName)
    {
        $query = "INSERT INTO seller_profile (user_id, user_name) VALUES (?, ?);";
        $stmt = mysqli_prepare($GLOBALS['db'],$query);
    
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
    
        mysqli_stmt_bind_param($stmt, "is", $sellerId,$userName);
    
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Error inserting data into seller: " . mysqli_error($GLOBALS['db']));
        }
    
        mysqli_stmt_close($stmt);
    }
    
    public function getPhoneNumber($sellerId){
        $query = "SELECT phone_number FROM seller WHERE seller_id = ?;";
        $stmt = mysqli_prepare($GLOBALS['db'],$query);
    
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
    
        mysqli_stmt_bind_param($stmt, "i", $sellerId);
    
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Error getting the required data : " . mysqli_error($GLOBALS['db']));
        }
    
        mysqli_stmt_close($stmt);
    }

    public function getSellerProfileDets($sellerId){
        $query = "SELECT * FROM seller_profile WHERE user_id = ? ";
        
        $stmt = mysqli_prepare($GLOBALS['db'], $query);
        
        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, "i", $sellerId);

        if (mysqli_stmt_execute($stmt)) {
            return $stmt->get_result();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }

    public function sellerId($phoneNumber){
        $query = "SELECT seller_id FROM seller WHERE phone_number = '$phoneNumber'  LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $query);
        return mysqli_fetch_assoc($result);
    }

    // adding the languages of the profile into seller_profile table
    public function addLanguages($languages,$userName,$userId)
    {
        $query = "UPDATE seller_profile  SET languages = ? WHERE user_name = ? AND user_id = ?;";
        $stmt = mysqli_prepare($GLOBALS['db'] , $query);

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt, "ssi",$languages,$userName,$userId);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true; 
        } else {
            throw new Exception("Error updating data: " . mysqli_error($GLOBALS['db']));
        }
    }

    // adding the skills of the profile into seller_profile table
    public function addSkills($skills,$userName,$userId)
    {
        $query = "UPDATE seller_profile  SET skills = ? WHERE user_name = ? AND user_id = ?;";
        $stmt = mysqli_prepare($GLOBALS['db'] , $query);

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt, "ssi",$skills,$userName,$userId);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true; 
        } else {
            throw new Exception("Error updating data: " . mysqli_error($GLOBALS['db']));
        }
    }

    // adding the education of the profile into seller_profile table
    public function addEducation($education,$userName,$userId)
    {
        $query = "UPDATE seller_profile  SET education = ? WHERE user_name = ? AND user_id = ?;";
        $stmt = mysqli_prepare($GLOBALS['db'] , $query);

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt, "ssi",$education,$userName,$userId);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true; 
        } else {
            throw new Exception("Error updating data: " . mysqli_error($GLOBALS['db']));
        }
    }

    public function insertPortfolioImgs($userId,$imgContent)
    {
        // Give an insert query for this instead of using an update query. 
        $insertQuery = "INSERT INTO portfolio_images (User_Id, Image) VALUES ( ? , ? );";
        $stmt = mysqli_prepare($GLOBALS['db'],$insertQuery);
    
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
    
        mysqli_stmt_bind_param($stmt, "is",$userId,$imgContent);
    
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true;
        } else {
            throw new Exception("Error updating data: " . mysqli_error($GLOBALS['db']));
        }
    }

    public function insertSinglePortfolioImg($userId,$imgContent)
    {
        // Give an insert query for this instead of using an update query. 
        $insertQuery = "INSERT INTO portfolio_images (User_Id, Image) VALUES ( ? , ? );";
        $stmt = mysqli_prepare($GLOBALS['db'],$insertQuery);
    
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
    
        mysqli_stmt_bind_param($stmt, "is",$userId,$imgContent);
    
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true;
        } else {
            throw new Exception("Error updating data: " . mysqli_error($GLOBALS['db']));
        }
    }

    public function getPortfolioImgs($userId,$imgId)
    {
        $getQuery = "SELECT Image FROM portfolio_images WHERE User_Id = ?";
        $stmt = mysqli_prepare($GLOBALS['db'],$getQuery);
    
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
    
        mysqli_stmt_bind_param($stmt, "i",$userId);
    
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true;
        } else {
            throw new Exception("Error updating data: " . mysqli_error($GLOBALS['db']));
        }
    }

    public function deletePortfolioImgs($userId,$imgId)
    {
        $deleteQuery = "DELETE FROM portfolio_images WHERE User_Id = ? AND Image_Id = ?";
        $stmt = mysqli_prepare($GLOBALS['db'],$deleteQuery);
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
        mysqli_stmt_bind_param($stmt, "ii", $userId,$imgId);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true; 
        } else {
            throw new Exception("Error deleting data: " . mysqli_error($GLOBALS['db']));
        }
    }

    // 
    public function updateSeller($sellerId){
        // $query = "UPDATE seller SET ";
    }

    // delete the seller profile if it doesn't contain any ongoing projects with a buyer.
    public function deleteSeller($sellerId){
        $stmt = mysqli_prepare($GLOBALS['db'], "DELETE FROM seller
            WHERE seller_id = ?");
        
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
        
        mysqli_stmt_bind_param($stmt, "i", $sellerId);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true; 
        } else {
            throw new Exception("Error deleting data: " . mysqli_error($GLOBALS['db']));
        }
    }

}