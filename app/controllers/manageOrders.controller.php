<?php

//change the class name
class ManageOrders extends Controller
{

    public function __construct(){
        $this->OrderHandlerModel = $this->model('orderHandler');
    }

    public function index(){

        $data['var'] = "Manage Orders Page";
        $data['title'] = "SkillSparq";

        $this->view('manageOrders', $data); 
    }

    public function createOrder(){
        
        print_r($_GET);
        $orderStatus = "request";
        $orderType = $_GET['orderType'];

        date_default_timezone_set('UTC');
        $currentDateTime = date('Y-m-d H:i:s');
        
        $buyerId = $_GET['buyerId'];	
        $sellerId = $_GET['sellerId'];

        $requestDescription = $_GET['requestDescription'];
        $attachement = $_GET['attachments'];
        $gigId = $_GET['gigId'];
        $packageId = $_GET['packageId'];

        $upload = 1;

        if($upload){
            $orderId = $this->OrderHandlerModel->createOrder($orderStatus, $orderType, $currentDateTime, $buyerId, $sellerId, $requestDescription, $attachement, $gigId, $packageId);
        }


    //     echo "
    //     <script>
    //         alert('Order created successfully');
    //         window.location.href = '" . BASEURL . "manageOrders';
    //     </script>
    // ";
    }

    

}

?>