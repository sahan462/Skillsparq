<?php
class Pdf extends Controller
{
    
    public function __construct()
    {
        $this->OrderHandlerHandlerModel = $this->model('orderHandler');
    }

    public function generateInvoice()
    {
        $orderId = $_GET['orderId'];
        $orderType = $_GET['orderType'];
        $buyerId = $_GET['buyerId'];
        $sellerId = $_GET['sellerId'];

        $orderDetails = $this->OrderHandlerHandlerModel->getOrderDetails($orderId, $orderType, $buyerId, $sellerId, $userRole);

        if ($orderDetails)
        {
            
        }


    }
}