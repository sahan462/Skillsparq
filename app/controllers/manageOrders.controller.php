<?php

//change the class name
class ManageOrders extends Controller
{

    public function index(){

        $data['var'] = "Manage Orders Page";
        $data['title'] = "SkillSparq";

        $this->view('manageOrders', $data); //change this
    }

    public function createOrder(){
        
        print_r($_GET);
        $packageType = $_GET['packageType'];
        $packagePrice = $_GET['packagePrice'];
        $noOfDeliveryDays = $_GET['noOfDeliveryDays'];
        $timePeriod = $_GET['timePeriod'];
        $packageDescription = $_GET['packageDescription'];
        $requestDescription = $_GET['requestDescription'];
        $sellerId = $_GET['sellerId'];
        $buyerId = $_GET['buyerId'];	
        $orderType = $_GET['orderType'];
    //     echo "
    //     <script>
    //         alert('Order created successfully');
    //         window.location.href = '" . BASEURL . "manageOrders';
    //     </script>
    // ";
    }

    

}

?>