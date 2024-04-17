<?php
class OrderHandler extends database 
{

    
    //create new order
    public function createPackageOrder($orderState, $orderType, $currentDateTime, $buyerId, $sellerId, $requestDescription, $attachement, $gigId, $packageId)
    {
        $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO Orders 
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
        )");
    
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

        //insert data to package order table    
        if($orderType == "package"){

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

            mysqli_stmt_bind_param($stmt, "issii", $orderId , $requestDescription, $attachement, $gigId, $packageId);
            if (mysqli_stmt_execute($stmt)) {
                $stmt->close();
            } else {
                throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
            }

        }else{
            throw new Exception("Invalid Order Type");
        }

        return $orderId;

    }

    //create milestone order
    
    public function createMilestoneOrder()
    {
        
    }


    //get orders
    public function getOrders($userId, $userRole)
    {
        if($userRole == 'Buyer'){

            $query = "SELECT * FROM orders inner join profile on orders.seller_id = profile.user_id WHERE buyer_id = ? order by order_id desc ";

        }else{

            $query = "SELECT * FROM orders inner join profile on orders.buyer_id = profile.user_id WHERE seller_id = ? order by order_id desc";

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

    //get order details
    public function getOrderDetails($orderId, $orderType, $buyerId, $sellerId, $userRole)
    {
        //retrive order details
        if($orderType == 'package'){

            $query = "SELECT * FROM orders inner join package_orders on orders.order_id = package_orders.package_order_id inner join gigs on package_orders.gig_id = gigs.gig_id inner join packages on packages.package_id = package_orders.package_id left join chats on orders.order_id = chats.order_id where orders.order_id = ?";

        }else if($orderType == 'milestone'){

            $query = "SELECT * FROM orders inner join milestone_orders on orders.order_id = milestone_orders.milestone_order_id inner join milestones on milestones.milestone_order_id = milestone_orders.milestone_order_id where orders.order_id = ?";

        }else if($orderType == 'job'){

        }else{

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




}