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

        $subjects = $milestones['subject'];
        $revisions = $milestones['revisions'];
        $deliveryQuantities = $milestones['deliveryQuantity'];
        $deliveryTimePeriodTypes = $milestones['deliveryTimePeriodType'];
        $prices = $milestones['price'];
        $descriptions = $milestones['description'];

        print_r($milestones);
        print_r($_FILES);

        for ($i = 0; $i < count($subjects); $i++) {

            echo "Milestone: $i <br>";

            $subject = $subjects[$i];
            $revision = $revisions[$i];
            $deliveryQuantity = $deliveryQuantities[$i];
            $deliveryTimePeriodType = $deliveryTimePeriodTypes[$i];
            $price = $prices[$i];
            $description = $descriptions[$i];

            print_r($subject);
            echo "<br>";
            print_r($revision);
            echo "<br>";
            print_r($deliveryQuantity);
            echo "<br>";
            print_r($deliveryTimePeriodType);
            echo "<br>";
            print_r($price);
            echo "<br>";
            print_r($description);
            echo "<br>";

        }
        

        
    }

    //read orders
    public function getOrders(){

    }

    

}

?>