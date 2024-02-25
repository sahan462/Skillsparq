<?php
class OrderHandler extends database
{

    //create new order
    public function createPackageOrder($orderStatus, $orderType, $currentDateTime, $buyerId, $sellerId, $requestDescription, $attachement, $gigId, $packageId)
    {
        $stmt_1 = mysqli_prepare($GLOBALS['db'], "INSERT INTO Orders 
        (
            order_status, 
            order_type, 
            order_created_date, 
            buyer_id,
            seller_id
        ) 
        VALUES 
        (
            ?, ?, ?, ?, ?
        )");
    
        if ($stmt_1 === false) {
            throw new Exception("Failed to create prepared statement.");
        }

        mysqli_stmt_bind_param($stmt_1, "sssii", $orderStatus,  $orderType, $currentDateTime, $buyerId, $sellerId);

        if (mysqli_stmt_execute($stmt_1)) {
            $orderId = mysqli_insert_id($GLOBALS['db']);
            $stmt_1->close();
        } else {
            throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
        }

        //insert data to package order table    
        if($orderType == "package"){

            $stmt_2 = mysqli_prepare($GLOBALS['db'], "INSERT INTO package_orders 
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
        
            if ($stmt_2 === false) {
                throw new Exception("Failed to create prepared statement.");
            }

            mysqli_stmt_bind_param($stmt_2, "issii", $orderId , $requestDescription, $attachement, $gigId, $packageId);
            mysqli_stmt_execute($stmt_2);
            $stmt_2->close();

        }else{

        }

        return $orderId;

    }

    //create milestone order


    //get orders
    public function getOrders($userId, $userRole)
    {
        if($userRole == 'Buyer'){

            $query = "SELECT * FROM orders WHERE buyer_id = ? ";

        }else{

            $query = "SELECT * FROM orders WHERE seller_id = ? ";

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



}