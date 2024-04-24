<?php
class UserHandler extends database
{

    public function addNewUser($user_email, $user_password, $role, $agreement)
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

    public function addNewSeller($user_password, $role, $agreement)
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

        mysqli_stmt_close($stmt);
    }


    // Update the Password
    public function setPassword($userId, $userPassWord)
    {
        $query = "UPDATE user SET user_password = ? WHERE user_id = ?";

        $parameterString = "si";

        $returnedResult = $this->updateQueryPrepStmtExecTwoParams($query, $parameterString, $userPassWord, $userId);

        return $returnedResult;
    }

    // Update the Email
    public function setEmail($userId, $userEmail)
    {
        $query = "UPDATE user SET user_email = ? WHERE user_id = ?";

        $parameterString = "si";

        $returnedResult = $this->updateQueryPrepStmtExecTwoParams($query, $parameterString, $userEmail, $userId);

        return $returnedResult;
    }

    // common repeatable code for update with two parameters
    public function updateQueryPrepStmtExecTwoParams($query, $parameterString, $param1, $userId)
    {
        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt, $parameterString, $param1, $userId);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true;
        } else {
            throw new Exception("Error updating data: " . mysqli_error($GLOBALS['db']));
        }
    }


    public function addNewAdmin()
    {
    }
    public function getUsers()
    {
        $query = "SELECT user_id, user_email, role FROM user ORDER BY user_id DESC";


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

    public function deleteUser($userId)
    {
        $stmt = mysqli_prepare($GLOBALS['db'], "DELETE FROM user 
            WHERE user_id = ?");

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt, "i", $userId);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true;
        } else {
            throw new Exception("Error deleting data: " . mysqli_error($GLOBALS['db']));
        }
    }
    public function getAllUsers()
    {
        $currentMonth = date('m');
        $currentYear = date('Y');

        $query = "
        SELECT
            (SELECT COUNT(*) FROM user) AS users,
            (SELECT COUNT(*) FROM user WHERE role='seller') AS seller,
            (SELECT COUNT(*) FROM user JOIN profile ON profile.user_id = user.user_id WHERE user.role='seller' AND MONTH(profile.joined_date)=$currentMonth AND YEAR(profile.joined_date)=$currentYear) AS sellerc,
            (SELECT COUNT(*) FROM user WHERE role='buyer') AS buyer,
            (SELECT COUNT(*) FROM user JOIN profile ON profile.user_id = user.user_id WHERE user.role='buyer' AND MONTH(profile.joined_date)=$currentMonth AND YEAR(profile.joined_date)=$currentYear) AS buyerc,
            (SELECT COUNT(*) FROM user WHERE role='csa') AS csa,
            (SELECT COUNT(*) FROM user JOIN profile ON profile.user_id = user.user_id WHERE user.role='csa' AND MONTH(profile.joined_date)=$currentMonth AND YEAR(profile.joined_date)=$currentYear) AS csac,
            (SELECT COUNT(*) FROM user WHERE role='admin') AS admin,
            (SELECT COUNT(*) FROM user JOIN profile ON profile.user_id = user.user_id WHERE user.role='admin' AND MONTH(profile.joined_date)=$currentMonth AND YEAR(profile.joined_date)=$currentYear) AS adminc
        FROM user;
        ";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        if (mysqli_stmt_execute($stmt)) {
            $result = $stmt->get_result();
            $data = $result->fetch_assoc(); // Fetch the first (and only) row as an associative array
            return $data;
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }
}
