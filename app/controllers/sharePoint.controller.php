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
        if((!isset($_SESSION["phoneNumber"]) && !isset($_SESSION["password"])) || (!isset($_SESSION["email"]) && !isset($_SESSION["password"]))){

            header("location: home");

        }else{

            $data['var'] = "share Point";
            $data['title'] = "SkillSparq";

            $orderId = $_GET['orderId'];
            $orderType = $_GET['orderType'];

            if(isset($_GET['receiverId'])){
                $data['receiverId'] = $_GET['receiverId'];
            }

            if(isset($_GET['senderId'])){
                $data['senderId'] = $_GET['senderId'];
            }

            if(isset($_GET['sellerId'])){
                $data['sellerId'] = $_GET['sellerId'];
            }

            if(isset($_GET['buyerId'])){
                $data['buyerId'] = $_GET['buyerId'];
            }

            if(isset($_GET['orderState'])){
                $data['orderState'] = $_GET['orderState'];
            }else{
                $data['orderState'] = $this->OrderHandlerModel->getOrderState($orderId)['order_state'];
            }

            if(isset($_GET['milestoneId'])){
                $milestoneId = $_GET['milestoneId'];
                $data['milestoneId'] = $milestoneId;
            }else{
                $milestoneId = null;
            }
        
            $data['orderId'] = $orderId;
            $data['orderType'] = $orderType;

            $deliveris = $this->OrderHandlerModel->getDeliveries($orderType, $orderId, $milestoneId);

            if($deliveris){
                $data['deliveries'] = $deliveris;
            }else{
                $this->redirect("_505");
            }
            // print_r($data);
            $this->view('sharePoint', $data);
        
        }

    }

    //upload deliveries
    public function uploadDeliveries()
    {
        try{

            if(isset($_POST['uploadDelivery'])){

                $orderType = $_POST['orderType'];
                $orderId = $_POST['orderId'];
                if(isset($_POST['milestoneId'])){
                    $milestoneId = $_POST['milestoneId'];
                }else{
                    $milestoneId = null;
                }
                $deliveryDescription = $_POST['deliveryDescription'];
                $currentDateTime = date('Y-m-d H:i:s');
                $attachment = $_FILES['attachments'];
                $attachmentName = basename($attachment["name"]);
    

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
                    $uniqueAttachmentName = date('YmdHis') . "_" . $attachmentName;
                    $targetFilePath = $targetSubDir . $uniqueAttachmentName;
                    $upload = move_uploaded_file($attachment["tmp_name"], $targetFilePath);
                }else{
                    $uniqueAttachmentName = "";
                    $attachmentName = "";
                }

                if($upload){
                    $isInserted = $this->OrderHandlerModel->uploadDelivery($orderType, $orderId, $milestoneId, $deliveryDescription, $uniqueAttachmentName, $currentDateTime);
                    if($isInserted){
                        if($orderType == 'milestone'){
                            $data['redirectURL'] = BASEURL . "sharePoint&orderId=" . $orderId . "&orderType=" . $orderType . "&milestoneId=".$milestoneId;
                            $data['message'] = "Deliver Sent Successfully";
                            $this->view('successful', $data);
                        }else{
                            $data['redirectURL'] = BASEURL . "sharePoint&orderId=" . $orderId . "&orderType=" . $orderType ;
                            $data['message'] = "Deliver Sent Successfully";
                            $this->view('successful', $data);
                        }

                    }

                }else{
                    throw new Exception("Unable to upload");
                }
    
            }else{
                throw new Exception("Error submitting delivery");
            }

        }catch(Exception $e){

            echo "Error uploading deliveries: " , $e->getMessage();

        }
    }


}

?>