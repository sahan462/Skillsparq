<?php
class OrderHandler extends database
{

    //create new package order
    public function createPackageOrder($orderState, $orderType, $currentDateTime, $buyerId, $sellerId, $requestDescription, $attachement, $gigId, $packageId ,$deadline)
    {
        $query = "INSERT INTO Orders 
        (
            order_state, 
            order_type, 
            order_created_date, 
            buyer_id,
            seller_id
        ) 
        VALUES 
        (
            ?, ?, ?, ?, ?
        )";
        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt, "sssii", $orderState,  $orderType, $currentDateTime, $buyerId, $sellerId);

        if (mysqli_stmt_execute($stmt)) {
            $orderId = mysqli_insert_id($GLOBALS['db']);
            $stmt->close();
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }

        //insert data to package_orders table   
        $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO package_orders 
        (
            package_order_id,
            order_description, 
            order_attachement,
            gig_id,
            package_id,
            deadline
        ) 
        VALUES 
        (
            ?, ?, ?, ?, ?, ?
        )");

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt, "issiis", $orderId, $requestDescription, $attachement, $gigId, $packageId, $deadline);
        if (mysqli_stmt_execute($stmt)) {
            $stmt->close();
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }

        return $orderId;
    }


    // get package information to generate deadline
    public function getPackageDetails($packageId)
    {
        $query = "SELECT * FROM packages where package_id = ?";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt, "i", $packageId);

        if (mysqli_stmt_execute($stmt)) {
            return $stmt->get_result()->fetch_assoc();
            $stmt->close();
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }

    }

    // retrieve package orders
    public function getPackageOrders($userId, $userRole)
    {
        if ($userRole == 'Buyer') {

            // create the logic with buyer id 
            // Buyer wants to see the details of the orders which he placed through a package order from all the sellers.
            $query = "SELECT * 
            FROM orders 
            INNER JOIN package_orders ON orders.order_id = package_orders.package_order_id 
            INNER JOIN packages ON package_orders.package_id = packages.package_id 
            INNER JOIN GIGS ON packages.gig_id = gigs.gig_id
            INNER JOIN PROFILE ON orders.seller_id = profile.user_id
            WHERE orders.buyer_id = ? 
            ORDER BY order_id DESC
            ";

        } else {

            // create the logic with seller id
            // seller wants to see the details of the order and the buyer details which a buyer placed through a package order from his gig pacakges.
            $query = "SELECT * 
            FROM orders 
            INNER JOIN package_orders ON orders.order_id = package_orders.package_order_id 
            INNER JOIN packages ON package_orders.package_id = packages.package_id 
            INNER JOIN GIGS ON packages.gig_id = gigs.gig_id
            INNER JOIN PROFILE ON orders.buyer_id = profile.user_id
            WHERE orders.seller_id = ? 
            ORDER BY order_id DESC
            ";
        }

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

    //create new milestone order
    public function createMilestoneOrder($orderState, $orderType, $currentDateTime, $buyerId, $sellerId, $gigId)
    {
        $query = "INSERT INTO Orders 
        (
            order_state, 
            order_type, 
            order_created_date, 
            buyer_id,
            seller_id
        ) 
        VALUES 
        (
            ?, ?, ?, ?, ?
        )";
        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt, "sssii", $orderState,  $orderType, $currentDateTime, $buyerId, $sellerId);

        if (mysqli_stmt_execute($stmt)) {
            $orderId = mysqli_insert_id($GLOBALS['db']);
            $stmt->close();
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }


        $query = "INSERT INTO milestone_orders 
        (
            milestone_order_id, 
            gig_id
        ) 
        VALUES 
        (
            ?, ?
        )";
        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt, "ii", $orderId,  $gigId);

        if (mysqli_stmt_execute($stmt)) {
            $stmt->close();
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }


        return $orderId;
    }

    // getCurrentMilestone
    public function getCurrentMilestone($orderId){
        // Prepare the SQL query
        $query = "SELECT * FROM milestones WHERE milestone_order_id = ? AND milestone_state != 'Completed' ORDER BY milestone_id LIMIT 1";
    
        // Prepare the statement
        $stmt = mysqli_prepare($GLOBALS['db'], $query);
    
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "i", $orderId);

        if (mysqli_stmt_execute($stmt)) {
            return $stmt->get_result();
            $stmt->close();
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }
    
    }

    // update milestone state
    public function updateMileStoneState($milestoneId, $state)
    {
        $query = "Update milestones set milestone_state = ? where milestone_id = ?";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, "si", $state, $milestoneId);

        if (mysqli_stmt_execute($stmt)) {
            return true;
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }

    // add new milestones
    public function addNewMilestone($subject, $revisions, $deliveryQuantity, $deliveryTimePeriodType, $price, $description, $attachmentName, $orderId)
    {

        $query = "INSERT INTO milestones (subject, no_of_revisions, amount_of_delivery_time, time_category, milestone_price, attachements, milestone_description, milestone_order_id) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        // Prepare the statement
        $stmt = mysqli_prepare($GLOBALS['db'], $query);
    
        // Check for errors in preparing the statement
        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }
    
        // Bind parameters to the statement
        mysqli_stmt_bind_param($stmt, "siissssi", $subject, $revisions, $deliveryQuantity, $deliveryTimePeriodType, $price, $attachmentName, $description, $orderId);
    
        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Close the statement
            $stmt->close();
        } else {
            // If execution fails, throw an exception
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }

        return true;

    }
    
   
    // retrieve milestone orders
    public function getMilestoneOrders($userId, $userRole)
    {
        if ($userRole == 'Buyer') {

            $query = "SELECT * 
            FROM orders             
            INNER JOIN profile ON profile.user_id = orders.seller_id  
            INNER JOIN milestone_orders ON orders.order_id = milestone_orders.milestone_order_id 
            INNER JOIN gigs ON gigs.gig_id = milestone_orders.gig_id 
            WHERE orders.buyer_id = ? and orders.order_type = 'milestone'
            ORDER BY order_id DESC
            ";

        } else {

            $query = "SELECT * 
            FROM orders             
            INNER JOIN profile ON profile.user_id = orders.buyer_id  
            INNER JOIN milestone_orders ON orders.order_id = milestone_orders.milestone_order_id 
            INNER JOIN gigs ON gigs.gig_id = milestone_orders.gig_id 
            WHERE orders.seller_id = ? and orders.order_type = 'milestone'
            ORDER BY order_id DESC
            ";

        }

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

    // create Job Order 
    public function createJobOrderRecord($orderState, $orderType, $orderCreatedAt, $buyerId, $sellerId)
    {
        $insertQuery = "INSERT INTO orders 
        (
            order_state,
            order_type, 
            order_created_date,
            buyer_id,
            seller_id
        ) 
        VALUES 
        (
            ?, ?, ?, ?, ?
        )";

        $stmt = mysqli_prepare($GLOBALS['db'], $insertQuery);

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt, "sssii", $orderState,  $orderType, $orderCreatedAt, $buyerId, $sellerId);

        if (mysqli_stmt_execute($stmt)) {
            $orderId = mysqli_insert_id($GLOBALS['db']);
            $stmt->close();
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }

        return $orderId;
    }

    // retrieve job orders
    public function getJobOrders($userId, $userRole)
    {
        if ($userRole == 'Buyer') {

            $query = "SELECT * 
            FROM orders 
            INNER JOIN job_orders ON orders.order_id = job_orders.job_order_id 
            INNER JOIN jobs ON job_orders.job_id = jobs.job_id 
            INNER JOIN profile ON profile.user_id = jobs.buyer_id 
            WHERE user_id = ? 
            ORDER BY order_id DESC
            ";

        } else {

            $query = "SELECT * 
            FROM orders 
            INNER JOIN job_orders ON orders.order_id = job_orders.job_order_id 
            INNER JOIN jobs ON job_orders.job_id = jobs.job_id 
            INNER JOIN profile ON profile.user_id = jobs.buyer_id 
            WHERE seller_id = ? 
            ORDER BY order_id DESC
            ";
        }

        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, "i", $userId);

        if (mysqli_stmt_execute($stmt)) {
            return $stmt->get_result();
            $stmt->close();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }


    //get orders
    public function getOrders($userId, $userRole)
    {
        if ($userRole == 'Buyer') {

            $query = "SELECT * FROM orders inner join profile on orders.seller_id = profile.user_id WHERE buyer_id = ? order by order_id desc";

        } else {

            $query = "SELECT * FROM orders inner join profile on orders.buyer_id = profile.user_id WHERE seller_id = ? order by order_id desc";
        }

        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, "i", $userId);

        if (mysqli_stmt_execute($stmt)) {
            $result = $stmt->get_result();
            // Fetch associative array
            return $result;
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }

    //get order details for manageOrders view and controller.
    public function getOrderDetails($orderId, $orderType, $buyerId, $sellerId, $userRole)
    {
        //retrive order details
        if ($orderType == 'package') {

            $query = "SELECT * FROM orders inner join package_orders on orders.order_id = package_orders.package_order_id inner join gigs on package_orders.gig_id = gigs.gig_id inner join packages on packages.package_id = package_orders.package_id inner join chats on orders.order_id = chats.order_id where orders.order_id = ?";

        } else if ($orderType == 'milestone') {

            $query = "SELECT * FROM orders inner join milestone_orders on orders.order_id = milestone_orders.milestone_order_id inner join gigs on milestone_orders.gig_id = gigs.gig_id inner join chats on orders.order_id = chats.order_id where orders.order_id = ?";

        } else if ($orderType == 'job') {

            $query = "SELECT * FROM orders inner join job_orders ON orders.order_id = job_orders.job_order_id inner join jobs on jobs.job_id = job_orders.job_id inner join chats on chats.order_id = orders.order_id WHERE ORDERS.ORDER_ID = ?";
            
        } else {

            throw new Exception("Invalid Order Type: " . $orderType);
        }

        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, "i", $orderId);

        if (mysqli_stmt_execute($stmt)) {
            $data['order'] = $stmt->get_result()->fetch_assoc();
            $stmt->close();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }


        //retrieve buyer details
        $query = "SELECT * FROM profile WHERE user_id = ?";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, "i", $buyerId);

        if (mysqli_stmt_execute($stmt)) {
            $data['buyer'] = $stmt->get_result()->fetch_assoc();
            $stmt->close();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }


        //retrieve seller details
        $query = "SELECT * FROM profile WHERE user_id = ?";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, "i", $sellerId);

        if (mysqli_stmt_execute($stmt)) {
            $data['seller'] = $stmt->get_result()->fetch_assoc();
            $stmt->close();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }


        return $data;
    }


    //Update order State
    public function updateOrderState($orderId, $state)
    {
        $query = "Update orders set order_state = ? where order_id = ?";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, "si", $state, $orderId);

        if (mysqli_stmt_execute($stmt)) {
            return true;
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }

    // get order state
    public function getOrderState($orderId)
    {
        $query = "SELECT order_state FROM orders WHERE order_id = ?";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, "i", $orderId);

        if (mysqli_stmt_execute($stmt)) {
            return $stmt->get_result()->fetch_assoc();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }

    public function sendNotification()
    {

    }

    //create new payment
    public function createPayment($paymentId, $payerId, $payeeId, $amount, $paymentDate, $paymentDescription, $paymentState, $orderId, $refundReceiverId, $refundIssuerId, $refundCause, $refundDate,  $milestoneId)
    {
        //add values to payments table
        $query = "INSERT INTO payments 
        (
            payment_id, 
            payer_id, 
            payee_id,  
            amount,
            payment_date,
            payment_description,
            payment_state,
            order_id
        ) 
        VALUES 
        (
            ?, ?, ?, ?, ?, ?, ?, ?
        )";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt, "iiidsssi", $paymentId,  $payerId, $payeeId, $amount, $paymentDate, $paymentDescription, $paymentState, $orderId);

        if (mysqli_stmt_execute($stmt)) {
            $orderId = mysqli_insert_id($GLOBALS['db']);
            $stmt->close();
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }
    }


    public function orderStateCurrentMonth()
    {
        $currentMonth = date('m');
        $currentYear = date('Y');

        $query = "SELECT
                        (SELECT COUNT(*) FROM orders) AS orders,
                        (SELECT COUNT(*) FROM orders WHERE order_state = 'accepted' AND MONTH(order_created_date) = $currentMonth AND YEAR(order_created_date) = $currentYear) AS accepted_count,
                        (SELECT COUNT(*) FROM orders WHERE order_state = 'running' AND MONTH(order_created_date) = $currentMonth AND YEAR(order_created_date) = $currentYear) AS running_count,
                        (SELECT COUNT(*) FROM orders WHERE order_state = 'requested' AND MONTH(order_created_date) = $currentMonth AND YEAR(order_created_date) = $currentYear) AS requested_count,
                        (SELECT COUNT(*) FROM orders WHERE order_state = 'cancelled' AND MONTH(order_created_date) = $currentMonth AND YEAR(order_created_date) = $currentYear) AS cancelled_count,
                        (SELECT COUNT(*) FROM orders WHERE order_state = 'late' AND MONTH(order_created_date) = $currentMonth AND YEAR(order_created_date) = $currentYear) AS late_count,
                        (SELECT COUNT(*) FROM orders WHERE order_state = 'completed' AND MONTH(order_created_date) = $currentMonth AND YEAR(order_created_date) = $currentYear) AS completed_count";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        if (mysqli_stmt_execute($stmt)) {
            $result = $stmt->get_result();
            return $result->fetch_assoc(); // Fetch the first row as an associative array
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }


    public function orderStatePreviousMonth()
    {
        $currentMonth = date('m');
        $previousMonth = ($currentMonth == 1) ? 12 : $currentMonth - 1;
        $PreviousYear = ($currentMonth == 1) ? date('Y') - 1 : date('Y');

        $query = "SELECT
                        
                        (SELECT COUNT(*) FROM orders WHERE order_state = 'accepted' AND MONTH(order_created_date) = $previousMonth AND YEAR(order_created_date) = $PreviousYear) AS accepted_count,
                        (SELECT COUNT(*) FROM orders WHERE order_state = 'running' AND MONTH(order_created_date) = $previousMonth AND YEAR(order_created_date) = $PreviousYear) AS running_count,
                        (SELECT COUNT(*) FROM orders WHERE order_state = 'requested' AND MONTH(order_created_date) = $previousMonth AND YEAR(order_created_date) = $PreviousYear) AS requested_count,
                        (SELECT COUNT(*) FROM orders WHERE order_state = 'cancelled' AND MONTH(order_created_date) = $previousMonth AND YEAR(order_created_date) = $PreviousYear) AS cancelled_count,
                        (SELECT COUNT(*) FROM orders WHERE order_state = 'late' AND MONTH(order_created_date) = $previousMonth AND YEAR(order_created_date) = $PreviousYear) AS late_count,
                        (SELECT COUNT(*) FROM orders WHERE order_state = 'completed' AND MONTH(order_created_date) = $previousMonth AND YEAR(order_created_date) = $PreviousYear) AS completed_count";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        if (mysqli_stmt_execute($stmt)) {
            $result = $stmt->get_result();
            return $result->fetch_assoc(); // Fetch the first row as an associative array
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }


    // get total number of orders
    public function totalOrders()
    {
        $currentYear = date('Y');
        $currentMonth = date('m');
        $previousMonthsData = [];

        for ($i = 11; $i >= 0; $i--) {
            $month = ($currentMonth - $i) < 1 ? 12 + ($currentMonth - $i) : $currentMonth - $i;
            $year = ($currentMonth - $i) < 1 ? $currentYear - 1 : $currentYear;

            $query = "SELECT COUNT(*) AS orders FROM orders WHERE MONTH(order_created_date) = $month AND YEAR(order_created_date) = $year";

            $stmt = mysqli_prepare($GLOBALS['db'], $query);

            if (!$stmt) {
                die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
            }

            if (mysqli_stmt_execute($stmt)) {
                $result = $stmt->get_result();
                $data = $result->fetch_assoc(); // Fetch the first row as an associative array
                $previousMonthsData[] = $data['orders'];
            } else {
                die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
            }
        }

        return $previousMonthsData;
    }


    //upload a delivery
    public function uploadDelivery($orderType, $orderId, $milestoneId, $deliveryDescription, $attachmentName, $currentDateTime)
    {
        $query = "INSERT INTO deliveries 
        (
            delivery_description, 
            attachments, 
            date,
            order_id
        ) 
        VALUES 
        (
            ?, ?, ?, ?
        )";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt, "sssi", $deliveryDescription,  $attachmentName, $currentDateTime, $orderId);

        if (mysqli_stmt_execute($stmt)) {
            $deliveryId = mysqli_insert_id($GLOBALS['db']);
            $stmt->close();
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }

        // regular order deliveries table
        if ($orderType == 'package' || $orderType == 'job') :

            $query = "INSERT INTO regular_order_deliveries 
            (
                delivery_id
            ) 
            VALUES 
            (
                ?
            )";

            $stmt = mysqli_prepare($GLOBALS['db'], $query);

            if ($stmt === false) {
                throw new Exception("Failed to create prepared statement.");
            }

            mysqli_stmt_bind_param($stmt, "i", $deliveryId);

            if (mysqli_stmt_execute($stmt)) {
                $stmt->close();
            } else {
                throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
            }

        // milestone order deliveries table
        elseif ($orderType == 'milestone') :

            $query = "INSERT INTO milestone_order_deliveries 
            (
                delivery_id, milestone_id
            ) 
            VALUES 
            (
                ?, ?
            )";

            $stmt = mysqli_prepare($GLOBALS['db'], $query);

            if ($stmt === false) {
                throw new Exception("Failed to create prepared statement.");
            }

            mysqli_stmt_bind_param($stmt, "ii", $deliveryId, $milestoneId);
            if (mysqli_stmt_execute($stmt)) {
                $stmt->close();
            } else {
                throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
            }

        endif;

        return $deliveryId;
    }


    //retrieve delivered order files
    public function getDeliveries($orderType, $orderId, $milestoneId)
    {
        if ($orderType == 'package' || $orderType == 'job') :

            $query = "SELECT * FROM deliveries WHERE order_id = ?";

            $stmt = mysqli_prepare($GLOBALS['db'], $query);

            if (!$stmt) {
                die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
            }

            mysqli_stmt_bind_param($stmt, "i", $orderId);

        elseif ($orderType == 'milestone') :

            $query = "SELECT * FROM deliveries inner join milestone_order_deliveries on deliveries.delivery_id = milestone_order_deliveries.delivery_id where deliveries.order_id = ? and milestone_order_deliveries.milestone_id = ?";

            $stmt = mysqli_prepare($GLOBALS['db'], $query);

            if (!$stmt) {
                die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
            }

            mysqli_stmt_bind_param($stmt, "ii", $orderId, $milestoneId);

        endif;

        if (mysqli_stmt_execute($stmt)) {
            $deliveries = $stmt->get_result();
            $stmt->close();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        return $deliveries;
    }

    // retrieve all orders
    public function getAllOrders()
    {
        $query = "SELECT * FROM orders ORDER BY order_id DESC";


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

  
  public function getOrderSeller($user_id)
    {
        $query = "SELECT 
            o.*,  
            u.*
        FROM user u
        JOIN orders o ON o.seller_id = u.user_id
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


    public function getOrdersSorted()
    {
        $sortBy = isset($_GET['sort']) ? $_GET['sort'] : 'order_id'; // Default sorting column

        // Execute the query and fetch the results
        $query = "SELECT o.* FROM orders o ORDER BY $sortBy DESC"; // Removed the comma before FROM

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

    // update order history
    public function updateOrderHistory($orderId, $date, $description) 
    {

        $query = "INSERT INTO order_history  
        (
            date, description, order_id
        ) 
        VALUES 
        (
            ?, ?, ?
        )";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt, "ssi", $date, $description, $orderId);
        if (mysqli_stmt_execute($stmt)) {
            $stmt->close();
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }

        return true;

    }


}
