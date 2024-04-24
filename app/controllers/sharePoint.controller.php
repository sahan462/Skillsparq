<?php

class SharePoint extends Controller
{
    // private $ProfileHandlerModel;
    public function __construct()
    {
        $this->ProfileHandlerModel = $this->model('profileHandler');
        $this->OrderHandlerModel = $this->model('orderHandler');
    }

    public function index()
    {
        $data['var'] = "share Point";
        $data['title'] = "SkillSparq";

        $orderId = $_GET['orderId'];
        $orderType = $_GET['orderType'];
        if(isset($_GET['milestoneId'])){
            $milestoneId = $_GET['milestoneId'];
        }else{
            $milestoneId = null;
        }

        $data['deliveries'] = $this->OrderHandlerModel->getDeliveries($orderType, $orderId, $milestoneId);;

        $this->view('sharePoint', $data);

    }

    //upload deliveries
    public function uploadDeliveries()
    {

        if(isset($_POST['submit'])){

            $orderFileName = "Order" . "_" . $orderId;
            $targetDir = "../public/assests/zipFiles/orderFiles/$orderFileName/";
    
            //open a new order file
            mkdir($targetDir, 0777, true);
    
            $upload = 0;
    
            // Upload attachment if provided
            if($attachmentName != ""){
                $targetFilePath = $targetDir . $attachmentName;
                $upload = move_uploaded_file($attachment["tmp_name"], $targetFilePath);
            }else{
                $attachmentName = "";
            }

        }else{

        }



    }

}

?>