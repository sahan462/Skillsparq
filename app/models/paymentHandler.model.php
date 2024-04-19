<?php

class PaymentHandler extends database
{

    //create new payment
    public function createPayment($paymentId, $payerId, $payeeId, $amount, $paymentDate, $paymentDescription, $paymentState, $orderId, $refundReceiverId, $refundIssuerId, $refundCause, $refundDate,  $milestoneId)
    {
        $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO payments 
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
        )");

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


    public function viewRefund()
    {
        $query = "SELECT * from payments where payment_status = 'holdForRefund'";

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
}
