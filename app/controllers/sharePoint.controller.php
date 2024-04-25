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
      
        $deliveris = $this->OrderHandlerModel->getDeliveries($orderType, $orderId, $milestoneId);

        if($deliveris){
            $data['deliveries'] = $deliveris;
        }else{
            $this->redirect("_505");
        }

        $this->view('sharePoint', $data);

    }

    //upload deliveries
    public function uploadDeliveries()
    {
        try{

            if(isset($_POST['submit'])){

                $orderFileName = "Order" . "_" . $orderId;
                $targetMainDir = "../public/assests/zipFiles/orderFiles/$orderFileName/";
                
                // Check if the directory exists, if not, create it
                if (!file_exists($targetMainDir)) {
                    mkdir($targetMainDir, 0777, true);
                }

                $targetSubDir = "../public/assests/zipFiles/orderFiles/$orderFileName/deliveries/";
                
                if (!file_exists($targetSubDir)) {
                    mkdir($targetSubDir, 0777, true);
                }
                
                $upload = 0;
        
                // Upload attachment if provided
                if($attachmentName != ""){
                    $targetFilePath = $targetDir . $attachmentName;
                    $upload = move_uploaded_file($attachment["tmp_name"], $targetFilePath);
                }else{
                    $attachmentName = "";
                }
    
            }else{

                throw new Exception("Error submitting delivery");
    
            }

        }catch(Exception $e){

            echo "Error uploading deliveries" , $e->getMessage();

        }
    }


}

?>