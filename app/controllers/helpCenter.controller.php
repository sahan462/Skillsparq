<?php

class HelpCenter extends Controller
{

    public function __construct()
    {
        $this->inquiryHandlerModel = $this->model('InquiryHandler');
    }

    public function index()
    {
        $data['var'] = "Help Center";
        $data['title'] = "SkillSparq";
        $this->view('helpCenter', $data);
    }

    public function createInquiry()
    {
        if(isset($_POST['inquirySubmit'])){

            try{
                $requestSubject = $_POST['inquirySubject'];
                $requestDescription = $_POST['inquiryDescription'];
                $userId = $_POST['userId'];
                $userName = $_POST['userName'];
                $inquiryType = $_POST['inquiryType'];

                if(isset($_POST['orderId'])){
                    $orderId = $_POST['orderId'];
                }else{
                    $orderId = null;
                }
    
                $targetDir = "../public/assests/zipFiles/inquiryFiles/";
                $inquiryAttachementName = basename($_FILES["inquiryAttachment"]["name"]); 
                $currentDateTime = date('Y-m-d H:i:s');
    
                if($inquiryAttachementName != ""){
                    $uniqueInquiryAttachementName = uniqid($inquiryAttachementName, true) . '_' . time() . '_' . $userName . '_' . $inquiryType . '.zip';
                    $targetFilePath = $targetDir . $uniqueInquiryAttachementName ;
                    move_uploaded_file($_FILES["inquiryAttachment"]["tmp_name"], $targetFilePath);
                }else{
                    $uniqueInquiryAttachementName = "";
                }
    
                $inquiry = $this->inquiryHandlerModel->createInquiry($requestSubject, $requestDescription, $uniqueInquiryAttachementName, $currentDateTime, $userId, $orderId, $inquiryType);
    
                if($inquiry){
                    $data['redirectURL'] = BASEURL . 'helpCenter';
                    $data['message'] = "Help Request is Sent Successfully";
                    $this->view('successful', $data);
                }else{
                    throw new Exception("Error creating inquiry");
                }

            }catch(Exception $e){
                echo "An error occured while creating inquiry" . $e->getMessage();
            }

        }else{
            $this->redirect("_505");
        }
    }

    
}

?>