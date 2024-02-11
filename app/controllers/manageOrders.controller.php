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

    //create a package order
    public function createPackageOrder(){
        
        $orderStatus = "request";
        $orderType = $_POST['orderType'];

        date_default_timezone_set('UTC');
        $currentDateTime = date('Y-m-d H:i:s');
        
        $buyerId = $_POST['buyerId'];	
        $sellerId = $_POST['sellerId'];

        $requestDescription = $_POST['requestDescription'];
        $attachement = $_POST['attachments'];
        $gigId = $_POST['gigId'];
        $packageId = $_POST['packageId'];

        $upload = 1;

        if($upload){
            $orderId = $this->OrderHandlerModel->createOrder($orderStatus, $orderType, $currentDateTime, $buyerId, $sellerId, $requestDescription, $attachement, $gigId, $packageId);
        }

        echo "
        <script>
            alert('Order created successfully');
            window.location.href = '" . BASEURL . "manageOrders';
        </script>
    ";
    }

    //create milestone order
    public function createMilestoneOrder(){

        $milestones = $_POST['milestone'];
        print_r($milestones);
        
    }

    //read orders
    public function getOrders(){

    }

    

}

?>