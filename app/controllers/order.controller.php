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

        $data['orderData'] = $this->OrderHandlerModel->getOrderDetails($orderId, $orderType);
        $this->view('order', $data);
    }

    public function verifyPayment()
    {
        print_r($_POST);

        // $this->view('order', $data);
    }




}

?>