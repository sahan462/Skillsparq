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
        $query = "SELECT * from refunds ";

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

    public function getPaymentStats()
    {
        $currentMonth = date('m');
        $currentYear = date('Y');

        $query = "
        SELECT
            (SELECT COUNT(*) FROM payments) AS payments,
            (SELECT COUNT(*) FROM payments WHERE payment_state = 'completed' AND $currentMonth = MONTH(payments.payment_date) AND $currentYear = YEAR(payments.payment_date)) AS completed,
            (SELECT COUNT(*) FROM payments WHERE payment_state = 'onhold' AND $currentMonth = MONTH(payments.payment_date) AND $currentYear = YEAR(payments.payment_date)) AS onhold,
            (SELECT COUNT(*) FROM payments WHERE payment_state = 'refunded' AND $currentMonth = MONTH(payments.payment_date) AND $currentYear = YEAR(payments.payment_date)) AS refunded,
            (SELECT COUNT(*) FROM payments WHERE payment_state = 'holdForRefund' AND $currentMonth = MONTH(payments.payment_date) AND $currentYear = YEAR(payments.payment_date)) AS holdForRefund;
          
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
    public function totalPayments()
    {
        $currentYear = date('Y');
        $currentMonth = date('m');
        $previousMonthsData = [];

        for ($i = 11; $i >= 0; $i--) {
            $month = ($currentMonth - $i) < 1 ? 12 + ($currentMonth - $i) : $currentMonth - $i;
            $year = ($currentMonth - $i) < 1 ? $currentYear - 1 : $currentYear;

            $query = "SELECT COUNT(*) AS payments FROM payments WHERE MONTH(payment_date) = $month AND YEAR(payment_date) = $year";

            $stmt = mysqli_prepare($GLOBALS['db'], $query);

            if (!$stmt) {
                die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
            }

            if (mysqli_stmt_execute($stmt)) {
                $result = $stmt->get_result();
                $data = $result->fetch_assoc(); // Fetch the first row as an associative array
                $previousMonthsData[] = $data['payments'];
            } else {
                die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
            }
        }

        return $previousMonthsData;
    }

    public function totalSales()
    {
        $currentYear = date('Y');
        $currentMonth = date('m');
        $previousMonthsData = [];

        for ($i = 11; $i >= 0; $i--) {
            $month = ($currentMonth - $i) < 1 ? 12 + ($currentMonth - $i) : $currentMonth - $i;
            $year = ($currentMonth - $i) < 1 ? $currentYear - 1 : $currentYear;

            $query = "SELECT SUM(amount) AS payments FROM payments WHERE MONTH(payment_date) = ? AND YEAR(payment_date) = ?";
            $stmt = mysqli_prepare($GLOBALS['db'], $query);

            if (!$stmt) {
                die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
            }

            mysqli_stmt_bind_param($stmt, "ii", $month, $year);
            if (mysqli_stmt_execute($stmt)) {
                $result = $stmt->get_result();
                $data = $result->fetch_assoc(); // Fetch the first row as an associative array
                $previousMonthsData[] = $data['payments'];
            } else {
                die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
            }
        }

        return $previousMonthsData;
    }

    public function viewRefundDetails($payment_id)
    {
        $query = "SELECT 
        r.*, 
        p.*, 
        o.*, 
        c.*,
        i.*,
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
    FROM refunds r
    JOIN payments p ON r.payment_id = p.payment_id
    JOIN orders o ON o.order_id = p.order_id
    JOIN complaints c ON c.order_id = o.order_id
    JOIN inquiries i ON i.inquiry_id = c.complaint_id
    JOIN user u1 ON o.buyer_id = u1.user_id
    JOIN user u2 ON o.buyer_id = u2.user_id
    WHERE r.payment_id = ?";

        $stmt = mysqli_prepare($GLOBALS['db'], $query);

        if (!$stmt) {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }

        mysqli_stmt_bind_param($stmt, 'i', $payment_id);

        if (mysqli_stmt_execute($stmt)) {
            return $stmt->get_result();
        } else {
            die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
        }
    }
    public function noOfRefunds()
    {
        $currentYear = date('Y');
        $currentMonth = date('m');
        $previousMonthsData = [];

        for ($i = 11; $i >= 0; $i--) {
            $month = ($currentMonth - $i) < 1 ? 12 + ($currentMonth - $i) : $currentMonth - $i;
            $year = ($currentMonth - $i) < 1 ? $currentYear - 1 : $currentYear;

            $query = "SELECT COUNT(*) AS payments FROM refunds WHERE MONTH(refund_date) = $month AND YEAR(refund_date) = $year AND refund_state = 'refunded'";

            $stmt = mysqli_prepare($GLOBALS['db'], $query);

            if (!$stmt) {
                die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
            }

            if (mysqli_stmt_execute($stmt)) {
                $result = $stmt->get_result();
                $data = $result->fetch_assoc(); // Fetch the first row as an associative array
                $previousMonthsData[] = $data['payments'];
            } else {
                die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
            }
        }

        return $previousMonthsData;
    }

    public function totalRefunds()
    {
        $currentYear = date('Y');
        $currentMonth = date('m');
        $previousMonthsData = [];

        for ($i = 11; $i >= 0; $i--) {
            $month = ($currentMonth - $i) < 1 ? 12 + ($currentMonth - $i) : $currentMonth - $i;
            $year = ($currentMonth - $i) < 1 ? $currentYear - 1 : $currentYear;

            $query = "SELECT SUM(p.amount) AS refunds 
                  FROM refunds r
                  INNER JOIN payments p ON r.payment_id = p.payment_id
                  WHERE MONTH(r.refund_date) = ? 
                  AND YEAR(r.refund_date) = ? 
                  AND r.refund_state = 'refunded'";
            $stmt = mysqli_prepare($GLOBALS['db'], $query);

            if (!$stmt) {
                die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
            }

            mysqli_stmt_bind_param($stmt, "ii", $month, $year);
            if (mysqli_stmt_execute($stmt)) {
                $result = $stmt->get_result();
                $data = $result->fetch_assoc(); // Fetch the first row as an associative array
                $previousMonthsData[] = $data['refunds'] ?: 0; // Use 0 if there are no refunds
            } else {
                die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
            }
        }

        return $previousMonthsData;
    }
    public function getPayments()
    {
        $query = "SELECT * FROM payments ORDER BY payment_id DESC";


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

    public function paymentsSeller($user_id)
    {
        $query = "SELECT 
       
        p.*
     
        
    FROM payments p
    JOIN user u ON p.payee_id = u.user_id
   
   
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
    public function paymentsBuyer($user_id)
    {
        $query = "SELECT 
       
        p.*
     
        
    FROM payments p
    JOIN user u ON p.payer_id = u.user_id
   
   
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
