<?php
class ProfileHandler extends database
{

    // check if the user name is already exists or not
    public function userNameCheck($userName)
    {

        $userName = mysqli_real_escape_string($GLOBALS['db'], $userName);
        $userCheck = "SELECT * FROM profile WHERE user_name='$userName'  LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $userCheck);
        return mysqli_fetch_assoc($result);
    }

    //create new profile
    public function addNewProfile($userName, $firstName, $lastName, $user_id)
    {
        $query = "INSERT INTO profile (user_name, first_name, last_name, profile_pic, joined_date, user_id) VALUES (?, ? , ?, ?, ?, ?)";
        $stmt = mysqli_prepare($GLOBALS['db'], $query);

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

    // get the profile picture
    public function getProfPic($userId)
    {
        $query = "SELECT profile_pic FROM profile WHERE user_id = ? ";

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
    public function updateProfileTable($profilePic, $firstName, $lastName, $country, $about, $userId, $userName)
    {
        $query = "UPDATE Profile 
                 SET 
                 profile_pic = ?, 
                 first_name = ?, 
                 last_name = ?, 
                 country = ?, 
                 about = ?
                 WHERE user_id = ? 
                 and user_name = ?";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);

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

    // delete a profile
    public function deleteProfile($userId)
    {
    }

    // get all profiles
    public function getAllProfiles()
    {
        $query = "SELECT * from profile";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        if (mysqli_stmt_execute($stmt)) {
            return $stmt->get_result();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }

    // 
    public function updateCSA($profilePic, $firstName, $lastName, $country, $about, $userId)
    {
        $stmt = $GLOBALS['db']->prepare("UPDATE profile SET profile_pic = ?, first_name = ?, last_name = ?, country = ?, about = ? WHERE user_id = ?");
        if (!$stmt) {
            die('MySQL Error: ' . $GLOBALS['db']->error);
        }

        $stmt->bind_param("sssssi", $profilePic, $firstName, $lastName, $country, $about, $userId);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // create new feedback
    public function sendFeedback($senderId, $receiverId, $feedback, $rating, $currentDateTime)
    {
        $query = "INSERT INTO feedbacks 
        (
            sender_user_id, 
            receiver_user_id, 
            feedback_text,  
            rating,
            feedback_date
        ) 
        VALUES 
        (
            ?, ?, ?, ?, ?
        )";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt, "iisds", $senderId,  $receiverId, $feedback, $rating, $currentDateTime);

        if (mysqli_stmt_execute($stmt)) {
            $feedbackId = mysqli_insert_id($GLOBALS['db']);
            $stmt->close();
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }

        return $feedbackId;
    }

    // get feedbacks based on user id
    public function getFeedbacks($userId)
    {
        $query = "SELECT * FROM feedbacks inner join profile on profile.user_id = feedbacks.sender_user_id where receiver_user_id = ?";

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


    // retrieve all feedbacks
    public function getAllFeedbacks($sortBy, $sortDirection)
    {
        $sortBy = isset($_GET['sort']) ? $_GET['sort'] : 'feedback_id'; // Default sorting column

        // Execute the query and fetch the results
        $query = "SELECT * 
              FROM feedbacks
            
              ORDER BY $sortBy $sortDirection ";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        if (mysqli_stmt_execute($stmt)) {
            return $stmt->get_result();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }
    public function getUserFeedback()
    {
        // Default sorting column

        // Execute the query and fetch the results
        $query = "SELECT * 
              FROM feedbacks
            
              ORDER BY rating DESC ";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        if (mysqli_stmt_execute($stmt)) {
            return $stmt->get_result();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }

    // delete a feedback
    public function deleteFeedback($feedback)
    {
        $stmt = mysqli_prepare($GLOBALS['db'], "DELETE FROM feedbacks
            WHERE feedback_id = ?");

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt, "i", $feedback);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true;
        } else {
            throw new Exception("Error deleting data: " . mysqli_error($GLOBALS['db']));
        }
    }
    //viewChat for csa
    public function viewChat($order_id)
    {
        $query = "SELECT 
       
        m.*,
        c.*
     
        
    FROM chats c
    JOIN messages m ON m.chat_id = c.chat_id
   
   
    WHERE c.order_id = ?
    ORDER BY m.date DESC";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, 'i', $order_id);

        if (mysqli_stmt_execute($stmt)) {
            return $stmt->get_result();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }
}
