<?php
class OrderHandler extends database
{

    //create new order
    public function createPackageOrder($orderState, $orderType, $currentDateTime, $buyerId, $sellerId, $requestDescription, $attachement, $gigId, $packageId)
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
            package_id
        ) 
        VALUES 
        (
            ?, ?, ?, ?, ?
        )");

        if ($stmt === false) {
            throw new Exception("Failed to create prepared statement.");
        }


        mysqli_stmt_bind_param($stmt, "issii", $orderId, $requestDescription, $attachement, $gigId, $packageId);
        if (mysqli_stmt_execute($stmt)) {
            $stmt->close();
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }


        // } else{

        //     throw new Exception("Invalid Order Type");        
        // }

        return $orderId;
    }

    //create milestone order

    public function createMilestoneOrder()
    {
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

        mysqli_stmt_bind_param($stmt, "ssdii", $orderState,  $orderType, $orderCreatedAt, $buyerId, $sellerId);

        if (mysqli_stmt_execute($stmt)) {
            $orderId = mysqli_insert_id($GLOBALS['db']);
            $stmt->close();
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }
        return $orderId;
    }

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
            // return $stmt->get_result();
            $result = $stmt->get_result();
            // Fetch associative array
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }


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
            INNER JOIN PROFILE ON gigs.seller_id = profile.user_id
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
            // return $stmt->get_result();
            $result = $stmt->get_result();
            // Fetch associative array
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }


    public function getMilestoneOrders($userId, $userRole)
    {
        if ($userRole == 'Buyer') {

            // create the logic
            $query = "SELECT * 
            FROM orders 
            INNER JOIN job_orders ON orders.order_id = job_orders.job_order_id 
            INNER JOIN jobs ON job_orders.job_id = jobs.job_id 
            INNER JOIN profile ON profile.user_id = jobs.buyer_id 
            WHERE user_id = ? 
            ORDER BY order_id DESC
            ";

        } else {

            // create the logic
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
            // return $stmt->get_result();
            $result = $stmt->get_result();
            // Fetch associative array
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
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

            $query = "SELECT * 
            FROM orders 
            INNER JOIN job_orders ON orders.order_id = job_orders.job_order_id 
            INNER JOIN jobs ON job_orders.job_id = jobs.job_id 
            INNER JOIN profile ON profile.user_id = jobs.buyer_id 
            WHERE seller_id = ? 
            ORDER BY order_id DESC
            ";
            // $query = "SELECT * FROM orders inner join profile on orders.buyer_id = profile.user_id WHERE seller_id = ? order by order_id desc";
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

            $query = "SELECT * FROM orders inner join package_orders on orders.order_id = package_orders.package_order_id inner join gigs on package_orders.gig_id = gigs.gig_id inner join packages on packages.package_id = package_orders.package_id left join chats on orders.order_id = chats.order_id where orders.order_id = ?";

        } else if ($orderType == 'milestone') {

            $query = "SELECT * FROM orders inner join package_orders on orders.order_id = package_orders.package_order_id inner join gigs on package_orders.gig_id = gigs.gig_id inner join packages on packages.package_id = package_orders.package_id left join chats on orders.order_id = chats.order_id where orders.order_id = ?";

        } else if ($orderType == 'job') {

            $query = "SELECT * FROM ORDERS INNER JOIN JOB_ORDERS ON ORDERS.ORDER_ID = JOB_ORDERS.JOB_ORDER_ID INNER JOIN JOBS ON JOB_ORDERS.JOB_ID = JOBS.JOB_ID LEFT JOIN CHATS ON ORDERS.ORDER_ID = CHATS.ORDER_ID WHERE ORDERS.ORDER_ID = ?";
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

            $query = "INSERT INTO regular_order_deliveries 
            (
                delivery_id, milestone_id
            ) 
            VALUES 
            (
                ?
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

            $query = "SELECT * FROM deliveries inner join milestone_order_deliveries on deliveries.delivery_id = milestone_order_deliveries.delivery_id where orders.order_id = ? and milestone_order_deliveries.milestone_id = ?";

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
}
