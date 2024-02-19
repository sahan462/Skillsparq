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

    public function viewComplaints()
    {
        $inquiry_id = isset($_GET['inquiry_id']) ? $_GET['inquiry_id'] : null;

        $query = "SELECT * FROM inquiries WHERE inquiry_id = " . $inquiry_id;

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

    // public function viewSenderDetails(int $num)

    // {
    //     $num1 = (int) "SELECT inquiry_originator_id from inquiries where inquiry_id = $num";
    //     $query = "SELECT user_id,user_email,role,agreement from user where user_id = $num1";


    //     $stmt = mysqli_prepare($GLOBALS['db'], $query);

    //     if (!$stmt) {
    //         die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
    //     }

    //     if (mysqli_stmt_execute($stmt)) {
    //         return $stmt->get_result();
    //     } else {
    //         die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
    //     }
    // }

    public function viewSenderDetails(int $num)
    {
        $query1 = "SELECT inquiry_originator_id FROM inquiries WHERE inquiry_id = ?";
        $stmt1 = mysqli_prepare($GLOBALS['db'], $query1);

        if (!$stmt1) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt1, "i", $num);

        if (mysqli_stmt_execute($stmt1)) {
            mysqli_stmt_bind_result($stmt1, $num1);
            mysqli_stmt_fetch($stmt1);

            // Free the result set
            mysqli_stmt_free_result($stmt1);
            // Close the statement
            mysqli_stmt_close($stmt1);

            $query2 = "SELECT user_id, user_email, role, agreement FROM user WHERE user_id = ?";
            $stmt2 = mysqli_prepare($GLOBALS['db'], $query2);

            if (!$stmt2) {
                die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
            }

            mysqli_stmt_bind_param($stmt2, "i", $num1);

            if (mysqli_stmt_execute($stmt2)) {
                return $stmt2->get_result();
            } else {
                die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
            }
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
}
