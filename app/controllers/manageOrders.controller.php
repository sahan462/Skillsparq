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

        $this->view('manageOrders', $data); //change this
    }

    public function createOrder(){
        
        print_r($_GET);

        $requestDescription = $_GET['requestDescription'];
        $attachements = $_GET['attachments'];
        $orderType = $_GET['orderType'];
        $gigId = $_GET['gigId'];
        $packageId = $_GET['packageId'];
        $sellerId = $_GET['sellerId'];
        $buyerId = $_GET['buyerId'];	


    //     echo "
    //     <script>
    //         alert('Order created successfully');
    //         window.location.href = '" . BASEURL . "manageOrders';
    //     </script>
    // ";
    }

    

}

?>