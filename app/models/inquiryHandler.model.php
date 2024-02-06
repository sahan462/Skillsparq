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
            attachments, 
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
}
