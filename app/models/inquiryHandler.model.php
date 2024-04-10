<?php
class InquiryHandler extends database
{

    // create new inquiry
    public function createInquiry($requestSubject, $requestDescription, $file, $currentDateTime, $clientId, $inquiryType)
    {
        $stmt1 = mysqli_prepare($GLOBALS['db'], "INSERT INTO inquiries 
        (
            subject, 
            description, 
            attachements, 
            created_at, 
            inquiry_originator_id,
            inquiry_type 
        ) 
        VALUES 
        (
            ?, ?, ?, ?, ?, ?
        )");

        if ($stmt1 === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        $stmt2 = mysqli_prepare($GLOBALS['db'], "INSERT INTO help_requests 
        (
            request_id
        ) 
        VALUES 
        (
            ?
        )");

        if ($stmt2 === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt1, "ssssis", $requestSubject, $requestDescription, $file, $currentDateTime, $clientId, $inquiryType);

        if (mysqli_stmt_execute($stmt1)) {
            $inquiryId = mysqli_insert_id($GLOBALS['db']);
            $stmt1->close();

            mysqli_stmt_bind_param($stmt2, "i", $inquiryId);
            if (mysqli_stmt_execute($stmt2)) {
                return $inquiryId;
            } else {
                throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
            }
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }
    }

    //read recently added gigs
    public function readRecentUsersTable()
    {
        $query = "SELECT user_id,user_email,role from user";

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
    public function create_table()
    {
        $result = $this->readRecentUsersTable();

        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>User ID</th><th>User Email</th><th>Role</th><th>Action</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["user_id"] . "</td>";
                echo "<td>" . $row["user_email"] . "</td>";
                echo "<td>" . $row["role"] . "</td>";
                echo "<td><button>View</button> <button>Delete</button></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No Users included";
        }
    }

    public function getRecentUsers()
    {
        $query = "SELECT user_id,user_email,role FROM user ";

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

    public function getComplaints()
    {
        $query = "SELECT i.complaint_id,i.order_id,c.inquiry_id,c.subject,c.description,c.inquiry_status,c.created_at from complaints i join inquiries c ON i.complaint_id = c.inquiry_id";;

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

    public function getHelpRequests()
    {
        $query = "SELECT i.request_id,c.inquiry_id,c.subject,c.description,c.attachements,c.response,c.inquiry_status,c.created_at from help_requests i join inquiries c ON i.request_id = c.inquiry_id";;

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

    public function viewComplaints($inquiry_id)
    {
        $query = "SELECT 
        i.*, 
        c.*, 
        o.*, 
        u1.user_id as seller_id, 
        u1.user_email as seller_email,
        u1.role as seller_role,
        u1.agreement as seller_agreement,
        u1.black_List as seller_blackList,
        u1.black_Listed_Until as seller_blackListUntil,
        u2.user_id as buyer_id,
        u2.user_email as buyer_email,
        u2.role as buyer_role,
        u2.agreement as buyer_agreement,
        u2.black_List as buyer_blackList,
        u2.black_Listed_Until as buyer_blackListUntil
    FROM inquiries i
    JOIN complaints c ON c.complaint_id = i.inquiry_id
    JOIN orders o ON o.order_id = c.order_id
    JOIN user u1 ON o.seller_id = u1.user_id
    JOIN user u2 ON o.buyer_id = u2.user_id
    WHERE i.inquiry_id = ?";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, 'i', $inquiry_id);

        if (mysqli_stmt_execute($stmt)) {
            return $stmt->get_result();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }

    public function viewHelpRequests($inquiry_id)
    {
        $query = "SELECT 
        i.*, 
        c.*,  
        u.*
        
    FROM inquiries i
    JOIN help_requests c ON c.request_id = i.inquiry_id
    JOIN user u ON u.user_id = i.inquiry_originator_id
   
    WHERE i.inquiry_id = ?";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, 'i', $inquiry_id);

        if (mysqli_stmt_execute($stmt)) {
            return $stmt->get_result();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }



    public function viewSenderDetails(int $num)

    {
        $num1 = (int) "SELECT inquiry_originator_id from inquiries where inquiry_id = $num";
        $query = "SELECT user_id,user_email,role,agreement from user where user_id = $num1";


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



    public function addNewResponse($inquiry_id, $response)
    {
        $stmt = mysqli_prepare($GLOBALS['db'], "UPDATE inquiries SET response = ?, inquiry_status = 'solved' WHERE inquiry_id = ?");


        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt, "si", $response, $inquiry_id);

        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Error updating data: " . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_close($stmt);
    }
    public function blackListBuyer($userId)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_id_to_blacklist = $_POST['user_id_to_blacklist'];
            $blacklist_until_days = $_POST['blacklistUntil'];

            // Use a prepared statement to prevent SQL injection
            $stmt = $GLOBALS['db']->prepare("UPDATE user SET black_list = 1, Black_Listed_Until = CURDATE() + INTERVAL ? DAY WHERE user_id = ?");

            if (!$stmt) {
                die('MySQL Error: ' . $GLOBALS['db']->error);
            }

            // Bind parameters
            $stmt->bind_param("ii", $blacklist_until_days, $user_id_to_blacklist);

            if ($stmt->execute()) {
                echo "User with ID $user_id_to_blacklist blacklisted successfully for $blacklist_until_days days ";
            } else {
                echo "Error updating user: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        }
    }
}
