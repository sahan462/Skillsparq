<?php

class Order extends Controller
{

    public function __construct(){
        $this->OrderHandlerModel = $this->model('orderHandler');
    }

    public function index()
    {

        $data['var'] = "Order Page";
        $data['title'] = "SkillSparq";

        $orderId = $_GET['orderId'];
        $orderType = $_GET['orderType'];
        $buyerId = $_GET['buyerId'];
        $sellerid = $_GET['sellerId'];
        $userRole = $_SESSION['role'];

        $data = $this->OrderHandlerModel->getOrderDetails($orderId, $orderType, $buyerId, $sellerid, $userRole);
        // print_r($data['order']);
        // print_r($data['buyer']);
        // print_r($data['seller']);
        $this->view('order', $data);
    }

    //Cancelling an Order
    public function cancelOrder()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            $orderId = $_POST['orderId'];
            $state = "Cancelled";
            
            $isUpdatedOrderState = $this->OrderHandlerModel->updateOrderState($orderId, $state);
    
            if($isUpdatedOrderState){
                return $isUpdatedOrderState;
            }

        } else {
            echo "Invalid request method";
        }

    }

    //Accept an order request
    public function acceptOrderRequest()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            $orderId = $_POST['orderId'];
            $state = "Accepted/Pending Payments";
            
            $isUpdatedOrderState = $this->OrderHandlerModel->updateOrderState($orderId, $state);
    
            if($isUpdatedOrderState){
                return $isUpdatedOrderState;
            }

        } else {
            echo "Invalid request method";
        }

    }

    //Payment Handling
    public function verifyPayment()
    {
        print_r($_POST);
        //look for authorize api, capture api and refund api
        $merchantId = $_POST['merchant_id'];
        $orderId = $_POST['order_id'];
        $payhereAmount = $_POST['payhere_amount'];
        $payhereCurrency = $_POST['payhere_currency'];
        $statusCode = $_POST['status_code'];
        $md5sig = $_POST['md5sig'];

        $merchant_secret = 'MzE1ODIzOTcyNDE3ODQ1NjA3MDkxNTI2MTU2OTMyMjE4MDMzMjI4MQ=='; // Replace with your Merchant Secret

        $local_md5sig = strtoupper(
            md5(
                $merchantId . 
                $orderId . 
                $payhereAmount . 
                $payhereCurrency . 
                $statusCode . 
                strtoupper(md5($merchant_secret)) 
            ) 
        );
            
        if (($local_md5sig === $md5sig) AND ($statusCode == 2) ){
                //TODO: Update your database as payment success
        }

        $state = "Running";
            
        $isUpdatedOrderState = $this->OrderHandlerModel->updateOrderState($orderId, $state);

        if($isUpdatedOrderState){
            echo "
            <script>
                alert('Payment done successfully');
                window.location.href = '" . BASEURL . "order&orderId=" . $_POST['order_id'] . "&orderType=" . $_POST['order_type'] . "&buyerId=".$_POST['buyer_id'] . "&sellerId=". $_POST['seller_id'] ."';
            </script>
        ";
        }

}




}

?>