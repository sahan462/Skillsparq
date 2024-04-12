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
        print_r($data['order']);
        print_r($data['buyer']);
        print_r($data['seller']);
        $this->view('order', $data);
    }

    //Payment Handling
    public function verifyPayment()
    {
        print_r($_POST);

        echo "
            <script>
                alert('Payment done successfully');
                window.location.href = '" . BASEURL . "order&orderId=" . $_POST['order_id'] . "&orderType=" . $_POST['order_type'] . "&buyerId=".$_POST['buyer_id'] . "&sellerId=". $_POST['seller_id'] ."';
            </script>
        ";
        
        // $this->view('order', $data);
    }

    //Cancelling an Order
    public function cancelOrder()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            $orderId = $_POST['orderId'];
            $state = "cancelled";
            
            $isUpdatedOrderState = $this->OrderHandlerModel->updateOrderState($orderId, $state);
    
            if($isUpdatedOrderState){
                return $isUpdatedOrderState;
            }

        } else {
            echo "Invalid request method";
        }

    }




}

?>