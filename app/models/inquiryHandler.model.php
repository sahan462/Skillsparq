<?php
class InquiryHandler extends database
{
    // create new inquiry
    public function createInquiry($requestSubject, $requestDescription, $file, $currentDateTime, $clientId, $orderId, $inquiryType)
    {
        // inquiry table
        $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO inquiries 
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

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt, "ssssis", $requestSubject, $requestDescription, $file, $currentDateTime, $clientId, $inquiryType);

        if (mysqli_stmt_execute($stmt)) {
            $inquiryId = mysqli_insert_id($GLOBALS['db']);
            $stmt->close();
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }

        if ($inquiryType == 'help request') :

            // help request table
            $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO help_requests (request_id) VALUES ( ?)");

            if ($stmt === false) {
                throw new Exception("Failed to create prepared statement.");
            }

            mysqli_stmt_bind_param($stmt, "i", $inquiryId);

            if (mysqli_stmt_execute($stmt)) {
                $stmt->close();
            } else {
                throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
            }

        elseif ($inquiryType == 'complaint') :

            // complaint table
            $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO complaints (complaint_id, order_id) VALUES(?,?)");

            if ($stmt === false) {
                throw new Exception("Failed to create prepared statement.");
            }

            mysqli_stmt_bind_param($stmt, "ii", $inquiryId, $orderId);

            if (mysqli_stmt_execute($stmt)) {
                $stmt->close();
            } else {
                throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
            }

        endif;

        return true;
    }


    // read inquiries
    public function getInquiries($userId)
    {
        $query = "SELECT * from inquiries where inquiry_originator_id = ?";

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

    // read complaints
    public function getComplaints()
    {
        $query = "SELECT i.complaint_id,i.order_id,c.inquiry_id,c.subject,c.description,c.inquiry_status,c.created_at from complaints i join inquiries c ON i.complaint_id = c.inquiry_id order by c.inquiry_id desc";;

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


    // read help requestS
    public function getHelpRequests()
    {
        $sortBy = isset($_GET['sort']) ? $_GET['sort'] : 'inquiry_id'; // Default sorting column

        // Execute the query and fetch the results
        $query = "SELECT i.request_id, c.inquiry_id, c.subject, c.description, c.attachements, c.response, c.inquiry_status, c.created_at 
              FROM help_requests i 
              JOIN inquiries c ON i.request_id = c.inquiry_id 
              ORDER BY $sortBy DESC ";

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

    // public function viewComplaints($inquiry_id)
    // {
    //     // Using backticks for SQL reserved keywords and ensuring the join conditions are correctly specified.
    //     $query = "SELECT i.*, o.*, c.*,p.*
    //               FROM inquiries i  
    //               JOIN complaints c ON c.complaint_id = i.inquiry_id 
    //               JOIN `orders` o ON o.order_id = c.order_id  
    //               JOIN payments p ON p.order_id = o.order_id  
    //               WHERE i.inquiry_id = ?";

    //     $stmt = mysqli_prepare($GLOBALS['db'], $query);

    //     if (!$stmt) {
    //         die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
    //     }

    //     mysqli_stmt_bind_param($stmt, 'i', $inquiry_id);

    //     if (mysqli_stmt_execute($stmt)) {
    //         return $stmt->get_result();
    //     } else {
    //         die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
    //     }
    // }


    public function viewComplaints($inquiry_id)
    {
        $query = "SELECT 
        i.*, 
        c.*, 
        o.*,
        p.*,
        u1.user_id as seller_id, 
        u1.user_email as seller_email,
        u1.role as seller_role,
        u1.agreement as seller_agreement,
        u1.black_List as seller_blackList,
        u1.black_Listed_Until as seller_blackListUntil,
        p1.user_name as seller_userName,
        p1.profile_pic as seller_profilePic,
        p1.first_name as seller_firstName,
        p1.last_name  as seller_lastnName,
        p1.country as seller_country,
        p1.joined_date as seller_joinedDate,
        p1.last_seen as seller_lastSeen,
        p1.about as seller_about,
        p2.user_name as buyer_userName,
        p2.profile_pic as buyer_profilePic,
        p2.first_name as buyer_firstName,
        p2.last_name  as buyer_lastnName,
        p2.country as buyer_country,
        p2.joined_date as buyer_joinedDate,
        p2.last_seen as buyer_lastSeen,
        p2.about as buyer_about,
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
    JOIN payments p on p.order_id = o.order_id
    JOIN profile p1 on u1.user_id = p1.user_id
    JOIN profile p2 on u2.user_id = p2.user_id
   
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

    // view help requests
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

    // view sender details
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

    // update response
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

    public function getComplaintsSeller($user_id)
    {
        $query = "SELECT 
       
        i.*
       
    FROM user u
    join orders o ON o.seller_id = u.user_id
    JOIN complaints c ON c.order_id = o.order_id
    JOIN inquiries i on c.complaint_id = i.inquiry_id
      
    WHERE u.user_id = ?";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, 'i', $user_id);

        if (mysqli_stmt_execute($stmt)) {
            return $stmt->get_result();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }

    // black list buyers
    public function blackListBuyer()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_id_to_blacklist = $_POST['user_id_to_blacklist'];
            $blacklist_until_days = $_POST['blacklistUntil'];

            // Use a prepared statement to prevent SQL injection
            $stmt = $GLOBALS['db']->prepare("UPDATE user SET black_List = 4, Black_Listed_Until = CURDATE() + INTERVAL ? DAY WHERE user_id = ?");

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

    // make refunds
    public function refund()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $payment_id = $_POST['payment_id'];
            $response = $_POST['sendResponse'];
            $buyerID = $_POST['buyerID'];

            // Use a prepared statement to prevent SQL injection
            $stmt1 = $GLOBALS['db']->prepare("UPDATE payments SET payment_state = 'holdForRefund' WHERE payment_id = ?");
            $stmt2 = $GLOBALS['db']->prepare("INSERT INTO refunds (refund_issuer_id, refund_receiver_id, refund_date, refund_cause, responseCSA, payment_id, refund_state) VALUES (?, 3, NOW(), 'na', ?, ?, 'onHold')");

            if (!$stmt1 || !$stmt2) {
                die('MySQL Error: ' . $GLOBALS['db']->error);
            }

            // Bind parameters for the first statement
            $stmt1->bind_param("i", $payment_id);

            // Execute the first query
            if (!$stmt1->execute()) {
                die('Error executing query: ' . $stmt1->error);
            }

            // Bind parameters for the second statement
            $stmt2->bind_param("iss", $buyerID, $response, $payment_id);

            // Execute the second query
            if (!$stmt2->execute()) {
                die('Error executing query: ' . $stmt2->error);
            }

            // Close the statements
            $stmt1->close();
            $stmt2->close();
        }
    }

    // update refunds
    public function updateRefund($payment_id, $response)
    {
        $stmt = mysqli_prepare($GLOBALS['db'], "UPDATE refunds SET refund_cause= ?, refund_state = 'refunded' WHERE payment_id = ?");

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement: " . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, "si", $response, $payment_id);

        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Error updating data: " . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);
    }

    public function getUnsolvedRequests()
    {
        $query = "SELECT * from inquiries i 
        join help_requests r
        where i.inquiry_id = r.request_id ";

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
    public function totalInquiries()
    {
        $query = "
        SELECT
            (SELECT COUNT(*) FROM help_requests) AS helpRequests,
            (SELECT COUNT(*) FROM complaints) AS complaints;
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

    public function deleteFromRequests($inquiryId)
    {
        $query = "DELETE FROM help_requests WHERE request_id = ?";
        $stmt = mysqli_prepare($GLOBALS['db'], $query);
        if (!$stmt) {
            throw new Exception("Failed to create prepared statement for : " . mysqli_error($GLOBALS['db']));
        }
        mysqli_stmt_bind_param($stmt, "i", $inquiryId);
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Error deleting data from : " . mysqli_error($GLOBALS['db']));
        }
        mysqli_stmt_close($stmt);
    }


    public function deleteFromInquiries($inquiryId)
    {
        $query = "DELETE FROM inquiries WHERE inquiry_id = ?";
        $stmt = mysqli_prepare($GLOBALS['db'], $query);
        if (!$stmt) {
            throw new Exception("Failed to create prepared statement for : " . mysqli_error($GLOBALS['db']));
        }
        mysqli_stmt_bind_param($stmt, "i", $inquiryId);
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Error deleting data from : " . mysqli_error($GLOBALS['db']));
        }
        mysqli_stmt_close($stmt);
    }
    public function viewComplaintForOrder($order_id)
    {
        $query = "SELECT 
        c.*,
        i.*
        
    FROM complaints c
    JOIN inquiries i ON i.inquiry_id = c.complaint_id
   
    
   
    WHERE c.order_id = ?";

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

    public function updateInquiry()
    {
        // Check if the method is POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $complaint_id = $_POST['complaint_id'];
            $buyer_reason = $_POST['resolveBuyer'];

            // Prepare the SQL statement without including the variable directly
            $stmt = $GLOBALS['db']->prepare("UPDATE inquiries SET response = ?, inquiry_status = 'solved' WHERE inquiry_id = ?");

            // Check if the statement preparation was successful
            if (!$stmt) {
                die('MySQL prepare error: ' . $GLOBALS['db']->error);
            }

            // Bind the parameters to the statement
            // 's' for string type for buyer_reason, 'i' for integer type for complaint_id
            $stmt->bind_param("si", $buyer_reason, $complaint_id);

            // Execute the statement and check for errors
            if ($stmt->execute()) {
                echo "Inquiry updated successfully.";
            } else {
                echo "Error updating inquiry: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        }
    }

    public function getDeliverables($inquiry_id)
    {
        // Revised query with clearer aliasing and potentially avoiding field name conflicts
        $query = "SELECT d.*
                  FROM inquiries AS i
                  JOIN complaints AS c ON i.inquiry_id = c.complaint_id
                  JOIN deliveries AS d ON d.order_id = c.order_id
                  WHERE i.inquiry_id = ? ";

        // Prepare the query
        $stmt = mysqli_prepare($GLOBALS['db'], $query);
        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        // Bind the inquiry ID to the query
        mysqli_stmt_bind_param($stmt, 'i', $inquiry_id);

        // Execute the query and retrieve the results
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            return $result; // Return the result set to be processed
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }
}
